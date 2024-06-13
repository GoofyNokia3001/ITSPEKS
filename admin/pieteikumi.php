<?php
    $page = "pieteikumi";
    require "headerGaligais.php";
    require "../assets/connect_db.php";
?>
<body>
    <section class="admin">
        <div class="moderatoriAdmin">
            <table>
                <tr class="heading">
                    <th>Vārds</th>
                    <th>Uzvārds</th>
                    <th>Personas kods</th>
                    <th>Tālrunis</th>
                    <th>E-pasts</th>
                    <th class="Trows">Izglitība</th>
                    <th class="Trows">Darba pieredze</th>
                    <th>CV</th>
                    <th class="Trows">Motivācijas vēstule:</th>
                    <th>Komentāri</th>
                    <th class="thButton">Statuss</th>
                </tr>

                <?php
                // Fetch records from the database
                $sql = "SELECT * FROM itspeks_pieteikumi WHERE Statuss IN (1, 2, 3);";
                $result = mysqli_query($savienojums, $sql);

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["Vards"] . "</td>
                            <td>" . $row["Uzvards"] . "</td>
                            <td>" . $row["Personas_kods"] . "</td>
                            <td>" . $row["Talrunis"] . "</td>
                            <td>" . $row["Epasts"] . "</td>
                            <td>" . $row["Izglitiba"] . "</td>
                            <td>" . $row["Darba_pieredze"] . "</td>
                            <td><i class='fas fa-" . ($row["CV"] ? "check" : "times") . "'></i></td>
                            <td><i class='fas fa-" . ($row["Motivacijas_vestule"] ? "check" : "times") . "'></i></td>
                            <td>" . $row["Komentari"] . "</td>
                            <td>
                                <form method='POST' action='status_change.php'>
                                <button type='submit' name='change' value='{$row['Pieteikums_ID']}' class='btn'><i class='fas fa-edit'></i></button>
                                </form>
                            </td>
                        </tr>";
                }
                ?>
            </table>
        </div>
    </section>
    <?php
        require "footerAdmin.php";
    ?>
