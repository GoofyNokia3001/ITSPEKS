<?php
    $page = "vakances";
    require "headerGaligais.php";
    require "../assets/connect_db.php";
?>
<body>
    <section class="admin">
        <div class="moderatoriAdmin">
            <table>
                <tr class="heading">
                    <th>Attēls</th>
                    <th>Amats</th>
                    <th>Uzņēmums</th>
                    <th class="phoneHide">Adrese</th>
                    <th class="phoneHide">Apraksts</th>
                    <th class="phoneHide">Pienākumi</th>
                    <th class="phoneHide">Prasmes</th>
                    <th class="phoneHide">Valodas</th>
                    <th>Alga</th>
                    <th class="phoneHide">Kontaktpersona</th>
                    <th class="thButton">Rediģet</th>
                    <th class="thButton">Dzēst</th>
                </tr>
                <?php
                    $vakances_SQL = "SELECT * FROM itspeks_vakances WHERE Izdzests != 1";
                    $atlasa_vakances_SQL = mysqli_query($savienojums, $vakances_SQL);

                    while($vakance = mysqli_fetch_array($atlasa_vakances_SQL)){
                        if(empty($vakance['Attels_URL'])){
                            $attels = "<i class='fas fa-times'></i>";
                        }else{
                            $attels = "<i class='fas fa-check'></i>";
                        }

                        if(empty($vakance['Apraksts'])){
                            $apraksts = "<i class='fas fa-times'></i>";
                        }else{
                            $apraksts = "<i class='fas fa-check'></i>";
                        }

                        if(empty($vakance['Pienakumi'])){
                            $pienakumi = "<i class='fas fa-times'></i>";
                        }else{
                            $pienakumi = "<i class='fas fa-check'></i>";
                        }

                        if(empty($vakance['Prasmes'])){
                            $prasmes = "<i class='fas fa-times'></i>";
                        }else{
                            $prasmes = "<i class='fas fa-check'></i>";
                        }

                        if(empty($vakance['Valodas'])){
                            $valodas = "<i class='fas fa-times'></i>";
                        }else{
                            $valodas = "<i class='fas fa-check'></i>";
                        }

                        echo "
                            <tr>
                                <td class='phoneHide'>$attels</td>
                                <td>{$vakance['Amats']}</td>
                                <td>{$vakance['Uznemums']}</td>
                                <td>{$vakance['Atrasanas_vieta']}</td>
                                <td class='phoneHide'>$apraksts</td>
                                <td class='phoneHide'>$pienakumi</td>
                                <td class='phoneHide'>$prasmes</td>
                                <td class='phoneHide'>$valodas</td>
                                <td>{$vakance['Alga']}</td>
                                <td class='phoneHide'>{$vakance['Kontaktpersona']}</td>
                                <td>
                                    <form method='POST' action='edit_vakance.php'>
                                        <button type='submit' name='apskatitVakance' class='Tbtn' value='{$vakance['Vakances_ID']}'><i class='fas fa-edit'></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method='POST' onsubmit='return confirm(\"Vai tiešām vēlēs dzēst?\");'>
                                        <input type='hidden' name='delete_id' value='{$vakance['Vakances_ID']}'>
                                        <button type='submit' name='nodzestVakance' class='Tbtn' value='{$vakance['Vakances_ID']}'><i class='fas fa-trash'></i></button>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                ?>
                <tr>
                    <td colspan="11" class="hid">
                        <form method='POST' action='pievienot_vakance.php'>
                            <button type='submit' class="btn"><i class="fas fa-add"></i></button>
                        </form>
                    </td>
                </tr>
            </table>
            <?php
                if(isset($_POST['nodzestVakance'])){
                    $id = $_POST['delete_id'];
                    $sql = "UPDATE itspeks_vakances SET Izdzests = 1 WHERE Vakances_ID = '$id'";
                    mysqli_query($savienojums, $sql);
                    echo "<script>
                            window.location.href = window.location.href;
                            if(window.performance){
                                if(window.performance.navigation.type == 1){
                                    location.reload(true);
                                }
                            }
                        </script>";
                }
            ?>
        </div>
    </section>
    
<?php
    require "footerAdmin.php";
?>
