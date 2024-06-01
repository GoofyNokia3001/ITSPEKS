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
                    <th colspan="2">Pievienot aktualitāte:</th>
                </tr>
                <form method="POST">
                    <tr>
                        <th>Attēls_URL</th>
                        <td><input type="text" name="attels-url" placeholder="Attēls_URL"></td>
                    </tr>
                    <tr>
                        <th>Virsraksts</th>
                        <td><input type="text" name="virsraksts" placeholder="Virsraksts *" required></td>
                    </tr>
                    <tr>
                        <th>Datums</th>
                        <td><input type="date" name="datumsAkt" placeholder="Datums *" required></td>
                    </tr>
                    <tr>
                        <th>Teksts</th>
                        <td><textarea class="adminTextArea" name="teksts" placeholder="Teksts *" required></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn" name="pievienotAkt">Pievienot</button></td>
                    </tr>
                </form>
            </table>
            <?php
                if(isset($_POST['pievienotAkt'])){
                    $attels = $_POST['attels-url'];
                    $virsraksts = $_POST['virsraksts'];
                    $datums = $_POST['datumsAkt'];
                    $teksts = $_POST['teksts'];

                    if($virsraksts != '' && $datums != '' && $teksts != ''){
                        $par = password_hash($parole1, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO itspeks_aktualitates (Virsraksts, Teksts, Attels_URL, Datums) VALUES ('$virsraksts', '$teksts', '$attels', '$datums')";
                        if(mysqli_query($savienojums, $sql)){
                            echo "<div class='notif green'>Pievienošana ir veiksmīga!</div>";
                            header("Refresh: 2, url=./aktualitates.php");
                        }else{
                            echo "<div class='notif red'>Pievienošana nav veiksmīga!</div>";
                            header("Refresh: 2, url=./aktualitates.php");
                        }
                    }else{
                        echo "Kaut kas nav ievadīts!";
                    }
                }
            ?>
        </div>
    </section>
    
<?php
    require "footerAdmin.php";
?>