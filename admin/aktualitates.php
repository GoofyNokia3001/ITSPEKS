<?php
    $page = "aktualitates";
    require "headerGaligais.php";
    require "../assets/connect_db.php";
?>
<body>
<section class="admin">
        <div class="moderatoriAdmin">
            <table>
                <tr class="heading">
                    <th>Attēls</th>
                    <th>Virsraksts</th>
                    <th>Datums</th>
                    <th id="tdApraksts">Teksts</th>
                    <th class="thButton">Rediģet</th>
                    <th class="thButton">Dzēst</th>
                </tr>
                <?php
                    $aktualitates_SQL = "SELECT * FROM itspeks_aktualitates  WHERE Izdzests != 1 ORDER BY Datums DESC";
                    $atlasa_aktualitates_SQL = mysqli_query($savienojums, $aktualitates_SQL);

                    while($ieraksts = mysqli_fetch_array($atlasa_aktualitates_SQL)){
                        if(empty($ieraksts['Attels_URL'])){
                            $attels = "<i class='fas fa-times'></i>";
                        }else{
                            $attels = "<i class='fas fa-check'></i>";
                        }

                        $teksts_words = explode(' ', $ieraksts['Teksts']);
                        if(count($teksts_words) > 15){
                            $teksts_limited = implode(' ', array_slice($teksts_words, 0, 15)) . '...';
                        } else {
                            $teksts_limited = $ieraksts['Teksts'];
                        }

                        echo "
                            <tr>
                                <td>$attels</td>
                                <td><h4>{$ieraksts['Virsraksts']}</h4></td>
                                <td>".date("d.m.Y", strtotime($ieraksts['Datums']))."</td>
                                <td>$teksts_limited</td>
                                <td>
                                    <form method='POST' action='edit_aktualitate.php'>
                                        <button type='submit' name='apskatitIeraksts' class='Tbtn' value='{$ieraksts['Aktualitates_ID']}'><i class='fas fa-edit'></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method='POST' onsubmit='return confirm(\"Vai tiešām vēlēs dzēst?\");'>
                                        <input type='hidden' name='delete_id' value='{$ieraksts['Aktualitates_ID']}'>
                                        <button type='submit' name='nodzestIeraksts' class='Tbtn' value='{$ieraksts['Aktualitates_ID']}'><i class='fas fa-trash'></i></button>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                ?>
                <tr>
                    <td colspan="6">
                        <form method='POST' action='pievienot_aktualitate.php'>
                            <button type='submit' class="btn"><i class="fas fa-add"></i></button>
                        </form>
                    </td>
                </tr>
            </table>
            <?php
                if(isset($_POST['nodzestIeraksts'])){
                    $id = $_POST['delete_id'];
                    $sql = "UPDATE itspeks_aktualitates SET Izdzests = 1 WHERE Aktualitates_ID = '$id'";
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