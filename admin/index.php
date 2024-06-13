<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT - Spēks</title>
    <link rel="shortcut icon" href="../images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/script.js" defer></script>
</head>
<body style="background-color: var(--main-color);">
    <header>
        <a href="../" class="logo">IT - SPĒKS</a>
        <nav class="navbar adminNav">
            <a href="./">Sākumlapa</a>
            <a href="vakances.php" class="<?php echo ($page == 'vakances' ? 'current' : '') ?>" >Vakances</a>
            <a href="aktualitates.php" class="<?php echo ($page == 'aktualitates' ? 'current' : '') ?>" >Jaunākās aktualitātes</a>
            <a href="moderatori.php" class="<?php echo ($page == 'moderatori' ? 'current' : '') ?>" >Moderatori</a>
            <a href="pieteikumi.php" class="<?php echo ($page == 'pieteikumi' ? 'current' : '') ?>" >Pieteikumi</a>
            <a id="navphone" href="logout.php"><?php echo $_SESSION['username']; ?> 1<i class="fas fa-power-off"></i></a>
        </nav>
        <div id="menu-btn" class="fas fa-bars"></div>
    </header>
    
    <?php
    require "../assets/connect_db.php";
?>
    <section class="admin">
        <div class="indexTables">
        <div id="day"></div>
            <div class="indexAdmin">
                <table class="main">
                    <tr class="heading">
                        <th>Popularakas aktualitātes</th>
                        <th>Datums</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM itspeks_aktualitates ORDER BY Datums DESC LIMIT 3";
                    $result = mysqli_query($savienojums, $sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["Virsraksts"] . "</td>
                                <td>" . $row["Datums"] . "</td>
                            </tr>";
                    }
                    ?>
                </table>
                <table class="main">
                    <tr class="heading">
                        <th>Visaugstāk atalgotās vakances</th>
                        <th>Uzņēmums</th>
                        <th>Alga</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM itspeks_vakances ORDER BY Alga DESC LIMIT 3";
                    $result = mysqli_query($savienojums, $sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["Amats"] . "</td>
                                <td>" . $row["Uznemums"] . "</td>
                                <td>" . $row["Alga"] . "</td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>
            <div class="indexAdmin">
                <table class="main wideT">
                    <tr class="heading">
                        <th>Pēdējie pieteikumi</th>
                        <th>Vards</th>
                        <th>E-pasts</th>
                        <th>Darba pieredze</th>
                    </tr>

                    <?php
                    $sql = "SELECT * FROM itspeks_pieteikumi ORDER BY Pieteikums_ID DESC LIMIT 3";
                    $result = mysqli_query($savienojums, $sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["Pieteikums_ID"] . "</td>
                                <td>" . $row["Vards"] . "</td>
                                <td>" . $row["Epasts"] . "</td>
                                <td>" . $row["Darba_pieredze"] . "</td>
                            </tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
    <?php
        require "footerAdmin.php";
    ?>
</body>
</html>
