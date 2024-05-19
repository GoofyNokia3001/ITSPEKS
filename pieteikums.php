<?php
    require "header.php";
?>

<div class="pieteikties">
    <h1>PIETEIKŠANA VAKANCĒM</h1>
    <form method="POST">
        <input type="text" name="vards" placeholder="Vārds" required>
        <input type="text" name="uzvards" placeholder="Uzvārds" required>
        <input type="text" name="persKods" placeholder="Personas kods" required>
        <input type="text" name="talrunis" placeholder="Tālrunis" required>
        <input type="email" name="epasts" placeholder="E-pasts" required>
        <input type="text" name="izglitiba" placeholder="Izglitība" required>
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
        <button type="submit" class="btn">Pieteikties</button>
    </form>
</div>

<?php
    require "footer.php";
?>