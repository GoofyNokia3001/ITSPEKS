<?php
session_start();

$page = "pieteikumi";
require "headerGaligais.php";
require "../assets/connect_db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['mainitStatusu'])) {
        $pieteikums_ID = $_POST['mainitStatusu'];
        $atlasitais_stauss = $_POST['Statuss'];

        $atjaunot_statusu_SQL = "UPDATE itspeks_pieteikumi SET Statuss = '$atlasitais_stauss' WHERE Pieteikums_ID = $pieteikums_ID";
        if (mysqli_query($savienojums, $atjaunot_statusu_SQL)) {
            echo "<div class='notif green'>Statuss ir mainīts veiksmīgi</div>";
        } else {
            echo "<div class='notif red'>Sistēmas kļūda, lūdzu, mēģiniet vēlreiz vēlāk</div>";
        }
        header("Refresh: 3; url=pieteikumi.php");
        exit(); 
    } else if (isset($_POST['change'])) {
        $pieteikums_ID = $_POST['change'];
        $pieteikums_SQL = "SELECT * FROM itspeks_pieteikumi WHERE Pieteikums_ID = $pieteikums_ID";
        $result = mysqli_query($savienojums, $pieteikums_SQL);

        if ($row = mysqli_fetch_assoc($result)) {
?>
<section class="admin">
    <div class="moderatoriAdmin">
        <table style="margin-top: 5%;">
        <tr style="background-color: var(--main-color); color: white;">
            <th colspan="2">
                Pieteikuma statusa maiņa
            </th>
        </tr>
            <tr>
                <th>Vārds, uzvārds</th>
                <td><?php echo $row['Vards'] . ' ' . $row['Uzvards']; ?></td>
            </tr>
            <tr>
                <th>Personas kods</th>
                <td><?php echo $row['Personas_kods']; ?></td>
            </tr>
            <tr>
                <th>E-pasts</th>
                <td><?php echo $row['Epasts']; ?></td>
            </tr>
            <tr>
                <th>Izglītība</th>
                <td><?php echo $row['Izglitiba']; ?></td>
            </tr>
            <tr>
                <th>Uzņemšanas statuss</th>
                <td><?php echo $row['Statuss']; ?></td>
            </tr>
            <tr>
                <th>Statusu maiņa</th>
                <td>
                <form method="POST">
                    <input type="hidden" name="mainitStatusu" value="<?php echo $row['Pieteikums_ID']; ?>">
                    <select name="Statuss" class="styled-select">
                        <option value="1" <?php if ($row['Statuss'] == 1) echo 'selected'; ?>>Iesniegts pieteikumu</option>
                        <option value="2" <?php if ($row['Statuss'] == 2) echo 'selected'; ?>>Apstiprināts pieteikums</option>
                        <option value="3" <?php if ($row['Statuss'] == 3) echo 'selected'; ?>>Pārbaudīti dokumenti</option>
                        <option value="4" <?php if ($row['Statuss'] == 4) echo 'selected'; ?>>Norādīts | Dzēsts</option>
                    </select>
                    <button type="submit" class="styled-button">Mainīt statusu</button>
                </form>
                </td>
            </tr>
        </table>
    </div>
</section>
<?php
        } else {
            echo "<div class='notif red'>Nav datu atrasti norādītajam ID</div>";
        }
    } else {
        echo "<div class='notif red'>Nederīgs pieprasījums</div>";
    }
} else {
    header("Location: pieteikumi.php");
    exit();
}

require "footerAdmin.php";
?>
