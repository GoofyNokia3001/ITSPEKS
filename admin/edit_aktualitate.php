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
                if (isset($_POST['apskatitIeraksts'])) {
                    $ieraksts_ID = $_POST['apskatitIeraksts'];
                    
                    $atlasit_ierakstu_SQL = "SELECT * FROM itspeks_aktualitates WHERE Aktualitates_ID = $ieraksts_ID";
                    $atlasa_ierakstu = mysqli_query($savienojums, $atlasit_ierakstu_SQL);
                    
                    if (!$atlasa_ierakstu) {
                        echo "Kļūda: " . mysqli_error($savienojums);
                    } else {
                        $ieraksts = mysqli_fetch_array($atlasa_ierakstu);
                        if ($ieraksts) {
        ?>
            <table>
                <tr class="heading">
                    <th colspan="2">Rediģēt aktualitāte:</th>
                </tr>
                <form method="POST">
                    <input type="hidden" name="aktualitate_ID" value="<?php echo $ieraksts_ID; ?>">
                    <tr>
                        <th>Attēls_URL</th>
                        <td><input type="text" name="attels-url" value='<?php echo $ieraksts['Attels_URL']; ?>'></td>
                    </tr>
                    <tr>
                        <th>Virsraksts</th>
                        <td><input type="text" name="virsraksts" value='<?php echo $ieraksts['Virsraksts']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>Datums</th>
                        <td><input type="date" name="datumsAkt" value='<?php echo $ieraksts['Datums']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>Teksts</th>
                        <td><textarea class="adminTextArea" name="teksts" required><?php echo $ieraksts['Teksts']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn" name="atjauninatAkt">Atjaunināt</button></td>
                    </tr>
                </form>
            </table>
            <?php
                        } else {
                            echo "No $ieraksts_ID";
                        }
                    }
                } elseif (isset($_POST['atjauninatAkt'])) {
                    $ieraksts_ID = $_POST['aktualitate_ID'];
                    $attels_url = mysqli_real_escape_string($savienojums, $_POST['attels-url']);
                    $virsraksts = mysqli_real_escape_string($savienojums, $_POST['virsraksts']);
                    $datums = mysqli_real_escape_string($savienojums, $_POST['datumsAkt']);
                    $teksts = mysqli_real_escape_string($savienojums, $_POST['teksts']);
                    $update_sql = "UPDATE itspeks_aktualitates SET Virsraksts = '$virsraksts', Teksts = '$teksts', Attels_URL = '$attels_url', Datums = '$datums' WHERE Aktualitates_ID = '$ieraksts_ID'";
        
                    if(mysqli_query($savienojums, $update_sql)){
                        echo "<div class='notif green'>Rediģēšana ir veiksmīga!</div>";
                        header("Refresh: 2, url=./aktualitates.php");
                    }else{
                        echo "<div class='notif red'>Rediģēšana nav veiksmīga!</div>";
                        header("Refresh: 2, url=./aktualitates.php");
                    }
                } else {
                    header("Location: ./aktualitates.php");
                }
            } else {
                header("Location: ./aktualitates.php");
            }
            ?>
        </div>
    </section>
    
<?php
    require "footerAdmin.php";
?>