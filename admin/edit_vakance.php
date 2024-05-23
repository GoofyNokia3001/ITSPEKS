<?php
// session_start();
// if (!isset($_SESSION['admin'])) {
//     header("Location: login.php");
//     exit();
// }
?>

<?php
    $page = "vakances";
    require "headerAdmin.php";
?>
<body>
    <section class="admin">
        <div class="moderatoriAdmin">
            <table>
                <tr class="heading">
                    <th colspan="2">Rediģēt vakanci:</th>
                </tr>
                <tr>
                    <th>Bilde</th>
                    <td><input type="text" placeholder="Attēla URL saite"></td>
                </tr>
                <tr>
    <th>Vakance</th>
    <td><input type="text" value="INFORMĀCIJAS SISTĒMU PROGRAMMĒTĀJS"></td>
</tr>
<tr>
    <th>Uzņēmums</th>
    <td><input type="text" value="Valsts akciju sabiedrība 'Latvijas dzelzceļš'"></td>
</tr>
<tr>
    <th>Adrese</th>
    <td><input type="text" value="LATVIJA, Vilhelma Purvīša iela 21, Rīga"></td>
</tr>
<tr>
    <th>Apraksts</th>
    <td><input type="text" placeholder="Amata apraksts"></td>
</tr>
<tr>
    <th>Prasmes</th>
    <td><input type="text" placeholder="Nepieciešamās prasmes"></td>
</tr>
<tr>
    <th>Valodas</th>
    <td><input type="text" value="Valsts valodas..."></td>
</tr>
<tr>
    <th>Alga</th>
    <td><input type="text" value="2700 EUR"></td>
</tr>
<tr>
    <th>Papildus info</th>
    <td><input type="text" value="Darbinieka amats..."></td>
</tr>
<tr>
    <td colspan="2"><button class="btn">Atjaunināt</button></td>
</tr>
            </table>
        </div>
    </section>
    
<?php
    require "footerAdmin.php";
?>