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
                <tr class="heading">
                    <th>Lietotājvārds</th>
                    <th>E-pasts</th>
                    <th>Admins kurš iedeva atļauju</th>
                    <th class="thButton">Rediģet</th>
                    <th class="thButton">Dzēst</th>
                    
                </tr>
                <tr>
                    <td>RavaldsKristaps</td>
                    <td>ManPatikOrandzasPrezentacijas@iamnerd.com</td>
                    <td>Elina</td>
                    <td><button class="Tbtn"><i class="fas fa-edit"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>KristovskisRaimonds</td>
                    <td>MilakaisITSkolotajs@iambest.com</td>
                    <td>Klim</td>
                    <td><button class="Tbtn"><i class="fas fa-edit"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>LiepaAnna</td>
                    <td>GitarasVirtuozs@rockon.lv</td>
                    <td>Zane</td>
                    <td><button class="Tbtn"><i class="fas fa-edit"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>ZilgalvisMiks</td>
                    <td>VirtuvesEksperiments@chefmaster.com</td>
                    <td>Astra</td>
                    <td><button class="Tbtn"><i class="fas fa-edit"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>VilksJanis</td>
                    <td>LasisKungs@fishingfanatic.net</td>
                    <td>Teodors</td>
                    <td><button class="Tbtn"><i class="fas fa-edit"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>OzolinaLiene</td>
                    <td>Ciemakukulis@bakerylove.com</td>
                    <td>Rūta</td>
                    <td><button class="Tbtn"><i class="fas fa-edit"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>BerzinsMartins</td>
                    <td>LeopardaPukains@junglefever.com</td>
                    <td>Dace</td>
                    <td><button class="Tbtn"><i class="fas fa-edit"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>KuzminsViktors</td>
                    <td>SpagetiEntuziasts@pastalover.com</td>
                    <td>Inese</td>
                    <td><button class="Tbtn"><i class="fas fa-edit"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td colspan="5"><button class="btn"><i class="fas fa-add"></i></button></td>
                </tr>
            </table>
        </div>
    </section>
    
    <?php
        require "footerAdmin.php";
    ?>