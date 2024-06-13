<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT - Spēks (MODERATORS)</title>
    <link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/script.js" defer></script>
</head>
<body>
    <header>
        <a href="#" class="logo">IT - SPĒKS</a>
        <nav class="navbar">
            <a href="./">Sākumlapa</a>
            <a href="nomainit_parole.php" class="<?php echo ($page == 'parole' ? 'current' : '') ?>" >Nomainīt parole</a>
            <a href="vakances.php" class="<?php echo ($page == 'vakances' ? 'current' : '') ?>" >Vakances</a>
            <a href="aktualitates.php" class="<?php echo ($page == 'aktualitates' ? 'current' : '') ?>" >Jaunākās aktualitātes</a>
            <a href="pieteikumi.php" class="<?php echo ($page == 'pieteikumi' ? 'current' : '') ?>" >Pieteikumi</a>
            <a id="navphone" href="logout.php"><?php echo $_SESSION["lietotajvardsKRA"]; ?> <i class="fas fa-power-off"></i></a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>