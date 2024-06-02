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
                    <th colspan="2">Pievienot vakanci:</th>
                </tr>
                <form method="POST">
                <tr>
                        <th>Attēls_URL</th>
                        <td><input type="text" name="attels_url" placeholder="Attēls_URL"></td>
                    </tr>
                    <tr>
                        <th>Amats</th>
                        <td><input type="text" name="amats" placeholder="Amats *" required></td>
                    </tr>
                    <tr>
                        <th>Uzņēmums</th>
                        <td><input type="text" name="uznemums" placeholder="Uzņēmums *" required></td>
                    </tr>
                    <tr>
                        <th>Adrese</th>
                        <td><input type="text" name="adrese" placeholder="Adrese *" required></td>
                    </tr>
                    <tr>
                        <th>Darba veids</th>
                        <td><input type="text" name="darba_veids" placeholder="Darba veids *" required></td>
                    </tr>
                    <tr>
                        <th>Apraksts</th>
                        <td><textarea class="adminTextArea" name="apraksts" placeholder="Apraksts"></textarea></td>
                    </tr>
                    <tr>
                        <th>Pienākumi</th>
                        <td><textarea class="adminTextArea" name="pienakumi" placeholder="Pienākumi"></textarea></td>
                    </tr>
                    <tr>
                        <th>Prasmes</th>
                        <td><textarea class="adminTextArea" name="prasmes" placeholder="Prasmes *" required></textarea></td>
                    </tr>
                    <tr>
                        <th>Valodas</th>
                        <td><input type="text" name="valodas" placeholder="Valodas"></td>
                    </tr>
                    <tr>
                        <th>Alga</th>
                        <td><input type="number" name="alga" placeholder="Alga *" required min=1></td>
                    </tr>
                    <tr>
                        <th>Kontaktpersona</th>
                        <td><input type="text" name="kontaktpersona" placeholder="Kontaktpersona *" required></td>
                    </tr>
                    <tr>
                        <th>E-pasts</th>
                        <td><input type="email" name="epasts" placeholder="E-pasts *" required></td>
                    </tr>
                    <tr>
                        <th>Tālrunis</th>
                        <td><input type="text" name="talrunis" placeholder="Tālrunis *" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn" name="pievienotVak">Pievienot</button></td>
                    </tr>
                </form>
            </table>
            <?php
                if(isset($_POST['pievienotVak'])){
                    $amats = $_POST['amats'];
                    $uznemums = $_POST['uznemums'];
                    $alga = $_POST['alga'];
                    $apraksts = $_POST['apraksts'];
                    $atrasanas_vieta = $_POST['adrese'];
                    $darba_veids = $_POST['darba_veids'];
                    $pienakumi = $_POST['pienakumi'];
                    $prasmes = $_POST['prasmes'];
                    $valodas = $_POST['valodas'];
                    $kontaktpersona = $_POST['kontaktpersona'];
                    $epasts = $_POST['epasts'];
                    $talrunis = $_POST['talrunis'];
                    $attels_url = $_POST['attels_url'];

                    if($amats != '' && $uznemums != '' && $alga != '' && $atrasanas_vieta != '' && $darba_veids != '' && $prasmes != '' && $kontaktpersona != '' && $epasts != '' && $talrunis != ''){
                        $sqlVak = "INSERT INTO itspeks_vakances (Amats, Uznemums, Alga, Apraksts, Atrasanas_vieta, Darba_veids, Pienakumi, Prasmes, Valodas, Kontaktpersona, Epasts, Talrunis, Attels_URL) VALUES ('$amats', '$uznemums', '$alga', '$apraksts', '$atrasanas_vieta', '$darba_veids', '$pienakumi', '$prasmes', '$valodas', '$kontaktpersona', '$epasts', '$talrunis', '$attels_url')";
                        if(mysqli_query($savienojums, $sqlVak)){
                            echo "<div class='notif green'>Pievienošana ir veiksmīga!</div>";
                            header("Refresh: 2, url=./vakances.php"); 
                        }else{
                            echo "<div class='notif red'>Pievienošana nav veiksmīga!</div>";
                            header("Refresh: 2, url=./vakances.php");
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