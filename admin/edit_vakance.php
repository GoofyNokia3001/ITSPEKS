<?php
    $page = "vakances";
    require "headerGaligais.php";
    require "../assets/connect_db.php";
?>
<body>
    <section class="admin">
        <div class="moderatoriAdmin">
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['apskatitVakance'])) {
                        $vakanci_ID = $_POST['apskatitVakance'];
                        
                        $atlasit_vakanci_SQL = "SELECT * FROM itspeks_vakances WHERE Vakances_ID = $vakanci_ID";
                        $atlasa_vakanci = mysqli_query($savienojums, $atlasit_vakanci_SQL);
                        
                        if (!$atlasa_vakanci) {
                            echo "Kļūda: " . mysqli_error($savienojums);
                        } else {
                            $vakanci = mysqli_fetch_array($atlasa_vakanci);
                            if ($vakanci) {
            ?>
            <table>
                <tr class="heading">
                    <th colspan="2">Rediģēt vakanci:</th>
                </tr>
                <form method="POST">
                    <input type="hidden" name="vakance_ID" value="<?php echo $vakanci_ID; ?>">
                    <tr>
                        <th>Attēls_URL</th>
                        <td><input type="text" name="attels_url" value='<?php echo $vakanci['Attels_URL']; ?>'></td>
                    </tr>
                    <tr>
                        <th>Amats</th>
                        <td><input type="text" name="amats" value='<?php echo $vakanci['Amats']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>Uzņēmums</th>
                        <td><input type="text" name="uznemums" value='<?php echo $vakanci['Uznemums']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>Adrese</th>
                        <td><input type="text" name="adrese" value='<?php echo $vakanci['Atrasanas_vieta']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>Darba veids</th>
                        <td><input type="text" name="darba_veids" value='<?php echo $vakanci['Darba_veids']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>Apraksts</th>
                        <td><textarea class="adminTextArea" name="apraksts"><?php echo $vakanci['Apraksts']; ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Pienākumi</th>
                        <td><textarea class="adminTextArea" name="pienakumi"><?php echo $vakanci['Pienakumi']; ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Prasmes</th>
                        <td><textarea class="adminTextArea" name="prasmes" required><?php echo $vakanci['Prasmes']; ?></textarea></td>
                    </tr>
                    <tr>
                        <th>Valodas</th>
                        <td><input type="text" name="valodas" value='<?php echo $vakanci['Valodas']; ?>'></td>
                    </tr>
                    <tr>
                        <th>Alga</th>
                        <td><input type="text" name="alga" value='<?php echo $vakanci['Alga']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>Kontaktpersona</th>
                        <td><input type="text" name="kontaktpersona" value='<?php echo $vakanci['Kontaktpersona']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>E-pasts</th>
                        <td><input type="email" name="epasts" value='<?php echo $vakanci['Epasts']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>Tālrunis</th>
                        <td><input type="text" name="talrunis" value='<?php echo $vakanci['Talrunis']; ?>' required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn" name="atjauninatVak">Atjaunināt</button></td>
                    </tr>
                </form>
            </table>
            <?php
                        } else {
                            echo "No $vakanci_ID";
                        }
                    }
                } elseif (isset($_POST['atjauninatVak'])) {
                    $vakanci_ID = $_POST['vakance_ID'];
                    $amats = mysqli_real_escape_string($savienojums, $_POST['amats']);
                    $uznemums = mysqli_real_escape_string($savienojums, $_POST['uznemums']);
                    $alga = mysqli_real_escape_string($savienojums, $_POST['alga']);
                    $apraksts = mysqli_real_escape_string($savienojums, $_POST['apraksts']);
                    $atrasanas_vieta = mysqli_real_escape_string($savienojums, $_POST['adrese']);
                    $darba_veids = mysqli_real_escape_string($savienojums, $_POST['darba_veids']);
                    $pienakumi = mysqli_real_escape_string($savienojums, $_POST['pienakumi']);
                    $prasmes = mysqli_real_escape_string($savienojums, $_POST['prasmes']);
                    $valodas = mysqli_real_escape_string($savienojums, $_POST['valodas']);
                    $kontaktpersona = mysqli_real_escape_string($savienojums, $_POST['kontaktpersona']);
                    $epasts = mysqli_real_escape_string($savienojums, $_POST['epasts']);
                    $talrunis = mysqli_real_escape_string($savienojums, $_POST['talrunis']);
                    $attels_url = mysqli_real_escape_string($savienojums, $_POST['attels_url']);
                    $update_sql = "UPDATE itspeks_vakances SET Amats = '$amats', Uznemums = '$uznemums', Alga = '$alga', Apraksts = '$apraksts', Atrasanas_vieta = '$atrasanas_vieta', Darba_veids = '$darba_veids', Pienakumi = '$pienakumi', Prasmes = '$prasmes', Valodas = '$valodas', Kontaktpersona = '$kontaktpersona', Epasts = '$epasts', Talrunis = '$talrunis', Attels_URL = '$attels_url' WHERE Vakances_ID = '$vakanci_ID'";
        
                    if(mysqli_query($savienojums, $update_sql)){
                        echo "<div class='notif green'>Rediģēšana ir veiksmīga!</div>";
                        header("Refresh: 2, url=./vakances.php");
                    }else{
                        echo "<div class='notif red'>Rediģēšana nav veiksmīga!</div>";
                        header("Refresh: 2, url=./vakances.php");
                    }
                } else {
                    header("Location: ./vakances.php");
                }
            } else {
                header("Location: ./vakances.php");
            }
            ?>
        </div>
    </section>
    
<?php
    require "footerAdmin.php";
?>