<?php
    $page = "moderatori";
    require "headerGaligais.php";

    if ($_SESSION['userRole'] !== 'admin') {
        header("location:./");
        exit();
    }

    require "../assets/connect_db.php";
?>
<body>
    <section class="admin">
        <div class="moderatoriAdmin">
            <table>
                <tr class="heading">
                    <th colspan="2">Pievienot moderatoru:</th>
                </tr>
                <form method="POST">
                    <tr>
                        <th>Lietotājvārds</th>
                        <td><input type="text" name="lietotajvardsMod" placeholder="Lietotājvārds" required></td>
                    </tr>
                    <tr>
                        <th>E-pasts</th>
                        <td><input type="email" name="epastsMod" placeholder="E-pasts"></td>
                    </tr>
                    <tr>
                        <th>Parole</th>
                        <td><input type="password" name="paroleMod" placeholder="Parole" required></td>
                    </tr>
                    <tr>
                        <th>Parole (atkārtotī)</th>
                        <td><input type="password" name="paroleAtkartotMod" placeholder="Parole (atkārtotī)" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn" name="pievienotMod">Pievienot</button></td>
                    </tr>
                </form>
            </table>
            <?php
                if(isset($_POST['pievienotMod'])){
                    $lietotajvards = mysqli_real_escape_string($savienojums ,$_POST["lietotajvardsMod"]);
                    $sql = "SELECT Lietotajvards FROM itspeks_moderatori WHERE Lietotajvards = '$lietotajvards'";
                    $rezultatsLV = mysqli_query($savienojums, $sql);

                    $epasts = $_POST['epastsMod'];

                    $parole1 = mysqli_real_escape_string($savienojums ,$_POST["paroleMod"]);
                    $parole2 = mysqli_real_escape_string($savienojums ,$_POST["paroleAtkartotMod"]);

                    if($lietotajvards != '' && $parole1 != '' && $parole2 != ''){
                        if(mysqli_num_rows($rezultatsLV) > 0){
                            echo "<div class='notif red'>Šis lietotājvārds jau eksistē!</div>";
                        }else if($parole1 != $parole2){
                            echo "<div class='notif red'>Paroles nav vienādas!</div>";
                        }else{
                            $par = password_hash($parole1, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO itspeks_moderatori(Lietotajvards, Epasts, Parole, Izdzests) VALUES ('$lietotajvards', '$epasts', '$par', 0)";
                            if(mysqli_query($savienojums, $sql)){
                                echo "<div class='notif green'>Pievienošana ir veiksmīga!</div>";
                                header("Refresh: 2, url=./moderatori.php");
                            }else{
                                echo "<div class='notif red'>Pievienošana nav veiksmīga!</div>";
                                header("Refresh: 2, url=./moderatori.php");
                            }
                        }
                    }else{
                        echo "<div class='notif red'>Kaut kas nav ievadīts!</div>";
                    }
                }
            ?>
        </div>
    </section>
    
<?php
    require "footerAdmin.php";
?>