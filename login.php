<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP language - LOGIN</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js" defer></script>
</head>
<body style="background-color: var(--main-color); background-repeat: no-repeat; height: 100vh; background-size: cover;">
        <div class="container">
                <div class="boxcenter">
                    <div class="login">
                        <a href="index.php" class="loginL">IT - SPĒKS</a>
                        <p>Ielogoties sistēmā</p>
                        <form method="post">
                            <div id="loginCont">
                                <div class="row">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="usr" placeholder="Lietotajvārds" required>
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="psswrd" placeholder="Parole" required>
                                </div>
                            </div>
                            <div class="column">
                                <button type="submit" name="auth" id="btn1">IELOGOTIES</button>
                                <button id="btn1" onclick="window.location.href = 'index.php'">DOTIES UZ GALVENO LAPU</button>
                            </div>
                        </form>
                        <div class="info">
                            <?php
                                require "assets/autorizacija.php";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>