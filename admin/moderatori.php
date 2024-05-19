<?php
// session_start();
// if (!isset($_SESSION['admin'])) {
//     header("Location: login.php");
//     exit();
// }
?>

<?php
    $page = "moderatori";
    require "headerAdmin.php";
?>
<body>
    <section class="admin">
        <div class="moderatoriAdmin">
            <table>
                <tr>
                    <th>Lietotājvārds</th>
                    <th>E-pasts</th>
                    <th>Admins kurš iedeva atļauju</th>
                </tr>
                <tr>
                    <td>RavaldsKristaps</td>
                    <td>ManPatikOrandzasPrezentacijas@iamnerd.com</td>
                    <td>Elina</td>
                </tr>
                <tr>
                    <td>KristovskisRaimonds</td>
                    <td>MilakaisITSkolotajs@iambest.com</td>
                    <td>Klim</td>
                </tr>
                <tr>
                    <td>LiepaAnna</td>
                    <td>GitarasVirtuozs@rockon.lv</td>
                    <td>Zane</td>
                </tr>
                <tr>
                    <td>ZilgalvisMiks</td>
                    <td>VirtuvesEksperiments@chefmaster.com</td>
                    <td>Astra</td>
                </tr>
                <tr>
                    <td>VilksJanis</td>
                    <td>LasisKungs@fishingfanatic.net</td>
                    <td>Teodors</td>
                </tr>
                <tr>
                    <td>OzolinaLiene</td>
                    <td>Ciemakukulis@bakerylove.com</td>
                    <td>Rūta</td>
                </tr>
                <tr>
                    <td>BerzinsMartins</td>
                    <td>LeopardaPukains@junglefever.com</td>
                    <td>Dace</td>
                </tr>
                <tr>
                    <td>KuzminsViktors</td>
                    <td>SpagetiEntuziasts@pastalover.com</td>
                    <td>Inese</td>
                </tr>
            </table>
        </div>
    </section>
    
</body>
</html>