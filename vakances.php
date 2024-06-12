<?php
$page = "vakances";
require "header.php";
?>
<div class="square">
    <div class="filter radius">
        <form method="POST">
            <input type="text" name="uznemums" placeholder="Uzņēmums" class="radius" value="<?php echo isset($_POST['uznemums']) ? $_POST['uznemums'] : ''; ?>">
            <select name="atrasanasVieta" class="radius">
                <option value="" selected>Atrašanās vieta</option>
                <option value="liepaja" <?php if (isset($_POST['atrasanasVieta']) && $_POST['atrasanasVieta'] == 'liepaja') echo 'selected'; ?>>Liepāja</option>
                <option value="riga" <?php if (isset($_POST['atrasanasVieta']) && $_POST['atrasanasVieta'] == 'riga') echo 'selected'; ?>>Rīga</option>
                <option value="ventspils" <?php if (isset($_POST['atrasanasVieta']) && $_POST['atrasanasVieta'] == 'ventspils') echo 'selected'; ?>>Ventspils</option>
            </select>
            <select name="amats" class="radius">
                <option value="" disabled selected>Amats</option>
                <?php
                    require "assets/connect_db.php";
                    $amatsQuery = "SELECT DISTINCT Amats FROM itspeks_vakances";
                    $result = mysqli_query($savienojums, $amatsQuery);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = isset($_POST['amats']) && $_POST['amats'] == $row['Amats'] ? 'selected' : '';
                            echo "<option value='{$row['Amats']}' $selected>{$row['Amats']}</option>";
                        }
                    }
                ?>
            </select>
            <input type="number" name="algaMin" placeholder="Algas diapazons sākums" class="radius" value="<?php echo isset($_POST['algaMin']) ? $_POST['algaMin'] : ''; ?>">
            <input type="number" name="algaMax" placeholder="Algas diapazons beigums" class="radius" value="<?php echo isset($_POST['algaMax']) ? $_POST['algaMax'] : ''; ?>">
            <div class="radio">
                <input type="radio" id="html" name="kartosana" value="aug" <?php if (isset($_POST['kartosana']) && $_POST['kartosana'] == 'aug') echo 'checked'; ?>>
                <label>Augošā</label>
            </div>
            <div class="radio">
                <input type="radio" name="kartosana" value="dil" <?php if (isset($_POST['kartosana']) && $_POST['kartosana'] == 'dil') echo 'checked'; ?>>
                <label id="dil">Dilstošā</label>
            </div>
            <button type="submit" class="btn">Meklēt</button>
            <button type="button" class="btn" onclick="window.location.href='?';">Izdzēst filtrus</button>
        </form>
    </div>
    <div class="sarakstsArVakancem">
        <?php
        require "assets/connect_db.php";

        $conditions = [];
        if (!empty($_POST['uznemums'])) {
            $uznemums = mysqli_real_escape_string($savienojums, $_POST['uznemums']);
            $conditions[] = "Uznemums LIKE '%$uznemums%'";
        }
        if (!empty($_POST['atrasanasVieta'])) {
            $atrasanasVieta = mysqli_real_escape_string($savienojums, $_POST['atrasanasVieta']);
            $conditions[] = "Atrasanas_vieta LIKE '%$atrasanasVieta%'";
        }
        if (!empty($_POST['amats'])) {
            $amats = mysqli_real_escape_string($savienojums, $_POST['amats']);
            $conditions[] = "Amats = '$amats'";
        }
        if (!empty($_POST['algaMin'])) {
            $algaMin = (int)$_POST['algaMin'];
            $conditions[] = "Alga >= $algaMin";
        }
        if (!empty($_POST['algaMax'])) {
            $algaMax = (int)$_POST['algaMax'];
            $conditions[] = "Alga <= $algaMax";
        }

        $order = "";
        if (!empty($_POST['kartosana'])) {
            $kartosana = mysqli_real_escape_string($savienojums, $_POST['kartosana']);
            $order = $kartosana == 'aug' ? "ORDER BY Alga ASC" : "ORDER BY Alga DESC";
        }

        $vakancesSQL = "SELECT * FROM itspeks_vakances";
        if (count($conditions) > 0) {
            $vakancesSQL .= " WHERE " . implode(' AND ', $conditions);
        }
        $vakancesSQL .= " " . $order;

        $atlasaVakances = mysqli_query($savienojums, $vakancesSQL);

        if ($atlasaVakances && mysqli_num_rows($atlasaVakances) > 0) {
            while ($vakanci = mysqli_fetch_assoc($atlasaVakances)) {
                $pienakumiArray = array_filter(array_map('trim', explode(';', $vakanci['Pienakumi'])));
                $prasmesArray = array_filter(array_map('trim', explode(';', $vakanci['Prasmes'])));
                $valodasArray = array_filter(array_map('trim', explode(';', $vakanci['Valodas'])));

                $pienakumiList = "";
                if (!empty($pienakumiArray)) {
                    $pienakumiList = "<p><span>Pienākumi:</span></p><ul>";
                    foreach ($pienakumiArray as $pienakums) {
                        $pienakumiList .= "<li>" . $pienakums . "</li>";
                    }
                    $pienakumiList .= "</ul>";
                }

                $prasmesList = "<ul>";
                foreach ($prasmesArray as $prasme) {
                    $prasmesList .= "<li>" . $prasme . "</li>";
                }
                $prasmesList .= "</ul>";

                $valodasList = "";
                if (!empty($valodasArray)) {
                    $valodasList = "<p><span>Valodas:</span></p><ul>";
                    foreach ($valodasArray as $valoda) {
                        $valodasList .= "<li>" . $valoda . "</li>";
                    }
                    $valodasList .= "</ul>";
                }

                echo "
                    <div class='ieraksts box radius shadow'>
                        <img src='{$vakanci['Attels_URL']}'>
                        <h2>{$vakanci['Amats']}</h2>
                        <h3>{$vakanci['Uznemums']}</h3>
                        <button class='toggle-btn' onclick='toggleContent(this)'>Vairāk</button>
                        <div class='content'>
                            <h4>{$vakanci['Atrasanas_vieta']}</h4>
                            <p>{$vakanci['Apraksts']}</p>
                            {$pienakumiList}
                            <p><span>Prasmes:</span></p>
                            {$prasmesList}
                            {$valodasList}
                            <p><span>{$vakanci['Alga']} EUR</span></p>
                            <p>{$vakanci['Darba_veids']}</p>
                            <p>{$vakanci['Kontaktpersona']}, {$vakanci['Epasts']}, {$vakanci['Talrunis']}</p>
                            <a href='pieteikums.php' class='btn'>Pieteikties</a>
                        </div>
                    </div>
                ";
            }
        } else {
            echo "Nav nevienas specialitātēs, ko attēlot!";
        }
        ?>
    </div>
</div>
<?php
require "footer.php";
?>
