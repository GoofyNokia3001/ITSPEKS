<?php
    require "headerGaligais.php";
    require "../assets/connect_db.php";
?>
    <section class="admin" style="background: var(--main-color);">
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
