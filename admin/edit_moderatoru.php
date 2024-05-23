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
                    <th>Lietotājvārds</th>
                    <td><input type="text" placeholder="Lietotājvārds" value="RavaldsKristaps"></td>
                </tr>
                <tr>
                    <th>E-pasts</th>
                    <td><input type="text" value="ManPatikOrandzasPrezentacijas@iamnerd.com"></td>
                </tr>
                <tr>
                    <th>Admins</th>
                    <td><input type="text" value="Elina"></td>
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