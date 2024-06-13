<?php
    $page = "parole";
    require "headerGaligais.php";
    require "../assets/connect_db.php";
?>
    <div class="container" style="background-color: var(--main-color);">
        <div class="boxcenter">
            <div class="login">
                <a href="index.php" class="loginL">IT - SPĒKS</a>
                <p>Nomainīt parole</p>
                <form method="post">
                    <div id="loginCont">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <input type="text" name="usr" placeholder="Lietotājvārds" value='<?php echo $_SESSION["lietotajvardsKRA"] ?>' required readonly>
                            <i class="fas fa-lock"></i>
                            <input type="password" name="old_password" placeholder="Vecā parole" required>
                            <i class="fas fa-lock"></i>
                            <input type="password" name="new_password" placeholder="Jaunā parole" required>
                            <i class="fas fa-lock"></i>
                            <input type="password" name="confirm_password" placeholder="Atkārtoti jaunā parole" required>
                        </div>
                    </div>
                    <div class="column">
                        <button type="submit" name="change_password" id="btn1">Nomainīt Parole</button>
                    </div>
                </form>
                <div class="info">
                    <?php
                        if (isset($_POST["change_password"])) {
                            $username = mysqli_real_escape_string($savienojums, $_POST["usr"]);
                            $oldPassword = mysqli_real_escape_string($savienojums, $_POST["old_password"]);
                            $newPassword = mysqli_real_escape_string($savienojums, $_POST["new_password"]);
                            $confirmPassword = mysqli_real_escape_string($savienojums, $_POST["confirm_password"]);

                            if ($newPassword !== $confirmPassword) {
                                echo "Jaunās paroles nesakrīt!";
                            } else {
                                // Check in the 'itspeks_administratori' table
                                $sqlAdmin = "SELECT * FROM itspeks_administratori WHERE Lietotajvards = '$username'";
                                $resultAdmin = mysqli_query($savienojums, $sqlAdmin);

                                // Check in the 'itspeks_moderatori' table
                                $sqlModerator = "SELECT * FROM itspeks_moderatori WHERE Lietotajvards = '$username' AND Izdzests != 1";
                                $resultModerator = mysqli_query($savienojums, $sqlModerator);

                                if (mysqli_num_rows($resultAdmin) == 1) {
                                    $user = mysqli_fetch_array($resultAdmin);
                                    if (password_verify($oldPassword, $user["Parole"])) {
                                        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                                        $updateSql = "UPDATE itspeks_administratori SET Parole = '$hashedNewPassword' WHERE Lietotajvards = '$username'";
                                        if (mysqli_query($savienojums, $updateSql)) {
                                            echo "<h3 style='color: var(--main-color);'>Parole veiksmīgi nomainīta!</h3>";
                                            header("Refresh: 2, url=./index.php");
                                        } else {
                                            echo "Kļūda, mainot paroli: " . mysqli_error($savienojums);
                                        }
                                    } else {
                                        echo "Nepareiza vecā parole!";
                                    }
                                } elseif (mysqli_num_rows($resultModerator) == 1) {
                                    $user = mysqli_fetch_array($resultModerator);
                                    if (password_verify($oldPassword, $user["Parole"])) {
                                        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                                        $updateSql = "UPDATE itspeks_moderatori SET Parole = '$hashedNewPassword' WHERE Lietotajvards = '$username'";
                                        if (mysqli_query($savienojums, $updateSql)) {
                                            echo "Parole veiksmīgi nomainīta!";
                                            header("Refresh: 2, url=./index.php");
                                        } else {
                                            echo "Kļūda, mainot paroli: " . mysqli_error($savienojums);
                                        }
                                    } else {
                                        echo "Nepareiza vecā parole!";
                                    }
                                } else {
                                    echo "Lietotājvārds neeksistē!";
                                }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>