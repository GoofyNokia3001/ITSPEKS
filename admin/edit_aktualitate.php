<?php
    $page = "vakances";
    require "headerGaligais.php";
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
                    <th>Nosaukums</th>
                    <td><input type="text" value="TOP Web Development Companies in 2024"></td>
                </tr>
                <tr>
                    <th>Datums</th>
                    <td><input type="text" value="18/05/2024"></td>
                </tr>
                <tr>
                    <th>Apraksts</th>
                    <td><input type="text" value="Text"></td>
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