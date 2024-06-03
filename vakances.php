<?php
    $page = "vakances";
    require "header.php";
?>
    <div class="square">
        <div class="filter radius">
            <form method="POST">
                <input type="text" placeholder="Uzņēmums" class="radius">
                <select name="atrasanasVieta" class="radius">
                    <option value="liepaja">Liepāja</option>
                    <option value="riga">Rīga</option>
                    <option value="ventspils">Ventspils</option>
                </select>
                <select name="amats" class="radius">
                    <option value="programmetajs">Programmētājs</option>
                    <option value="testetajs">Testētājs</option>
                </select>
                <input type="number" placeholder="Algas diapazons sākums" class="radius">
                <input type="number" placeholder="Algas diapazons beigums" class="radius">
                <div class="radio">
                    <input type="radio" id="html" name="kartosana" value="aug">
                    <label>Augošā</label>
                </div>
                <div class="radio">
                    <input type="radio" name="kartosana" value="dil">
                    <label id="dil">Disltošā</label>
                </div>
                <button type="submit" class="btn">Meklēt</button>
            </form>
        </div>
        <div class="sarakstsArVakancem">
            <?php
                require "assets/connect_db.php";

                $vakancesSQL = "SELECT * FROM itspeks_vakances";
                $atlasaVakances = mysqli_query($savienojums, $vakancesSQL);

                if(mysqli_num_rows($atlasaVakances) > 0){
                    while($vakanci = mysqli_fetch_assoc($atlasaVakances)){
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
                }else{
                    echo "Nav nevienas specialitātēs, ko attēlot!";
                }
            ?>
        </div>
    </div>
    
<?php
    require "footer.php";
?>