<?php
    $page = "vakances";
    require "header.php";
?>

<div class="pieteikties">
    <?php
        require("assets/connect_db.php");

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['iesniegt'])) {
                $vakanci_ievade = mysqli_real_escape_string($savienojums, $_POST['vakanci']);
                $vards_ievade = mysqli_real_escape_string($savienojums, $_POST['vards']);
                $uzvards_ievade = mysqli_real_escape_string($savienojums, $_POST['uzvards']);
                $personas_kods_ievade = mysqli_real_escape_string($savienojums, $_POST['persKods']);
                $talrunis_ievade = mysqli_real_escape_string($savienojums, $_POST['talrunis']);
                $epasts_ievade = mysqli_real_escape_string($savienojums, $_POST['epasts']);
                $izglitiba_ievade = mysqli_real_escape_string($savienojums, $_POST['izglitiba']);
                $darba_pieredze_ievade = mysqli_real_escape_string($savienojums, $_POST['darbaPieredze']);
                $cv_ievade = mysqli_real_escape_string($savienojums, $_POST['cv']);
                $motivacijas_vestule_ievade = mysqli_real_escape_string($savienojums, $_POST['motVestule']);
                $komentars_ievade = mysqli_real_escape_string($savienojums, $_POST['komentari']);

                if ($vards_ievade != "" && $uzvards_ievade != "" && $personas_kods_ievade != "" && $talrunis_ievade != "" && $epasts_ievade != "" && $izglitiba_ievade != "") {
                    $pieteikums_SQL = "INSERT INTO itspeks_pieteikumi (Vakance_ID, Vards, Uzvards, Personas_kods, Talrunis, Epasts, Izglitiba, Darba_pieredze, CV, Motivacijas_vestule, Komentari, Statuss) VALUES ('$vakanci_ievade', '$vards_ievade', '$uzvards_ievade', '$personas_kods_ievade', '$talrunis_ievade', '$epasts_ievade', '$izglitiba_ievade', '$darba_pieredze_ievade', '$cv_ievade', '$motivacijas_vestule_ievade', '$komentars_ievade', default)";

                    if (mysqli_query($savienojums, $pieteikums_SQL)) {
                        echo "<div class='notif green'>Pieteikšanās ir nosūtīta veiksmīgi! Tuvākajā laikā sazināsimies ar Jums!</div>";
                        header("Refresh: 2, url=./vakances.php");
                    } else {
                        echo "<div class='notif red'>Pieteikšana nav veiksmīga!</div>";
                        header("Refresh: 2, url=./vakances.php");
                    }
                } else {
                    echo "<div class='notif red'>Kaut kas nav ievadīts!</div>";
                    header("Refresh: 2, url=./vakances.php");
                }
            } else {
                $idAmats = $_POST['pieteikties'];
                $amatsSQL = "SELECT Amats FROM itspeks_vakances WHERE Vakances_ID = '$idAmats'";
                $amatsResult = mysqli_query($savienojums, $amatsSQL);
                $amatsRow = mysqli_fetch_assoc($amatsResult);
                $amats = $amatsRow['Amats'];
        ?>
    <h1>PIETEIKŠANĀS VAKANCĒM <br>
        <span><?php echo $amats; ?></span>
    </h1>
    <form method="POST">
        <input type="text" name="vakanci" class="box" value="<?php echo $amats; ?>" readonly required>
        <input type="text" name="vards" placeholder="Vārds *" required>
        <input type="text" name="uzvards" placeholder="Uzvārds *" required>
        <input type="text" name="persKods" placeholder="Personas kods *" required>
        <input type="text" name="talrunis" placeholder="Tālrunis *" required>
        <input type="email" name="epasts" placeholder="E-pasts *" required>
        <input type="text" name="izglitiba" placeholder="Izglītība *" required>
        <input type="text" name="darbaPieredze" placeholder="Darba pieredze">
        <div class="inputs">
            <label>CV: </label>
            <input type="file" name="cv" class="inputFile">
        </div>
        <div class="inputs">
            <label>Motivācijas vēstule: </label>
            <input type="file" name="motVestule" class="inputFile">
        </div>
        <textarea name="komentari" placeholder="Komentāri" class="box"></textarea>
        <button type="submit" class="btn" name="iesniegt">Pieteikties</button>
    </form>
    <?php
            }
        } else {
            echo "<div class='notif red'>Kaut kas nogāja greizi! Atgriezies sākumlapā, un mēģini vēlreiz</div>";
            header("Refresh: 2, url=./vakances.php");
        }
    ?>
</div>

<?php
    require "footer.php";
?>