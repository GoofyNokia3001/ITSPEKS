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
                    <th class="thButton">Apstiprināt</th>
                    <th class="thButton">Dzēst</th>
                    
                </tr>
                <tr>
                    <td>Jānis</td>
                    <td>Bērziņš</td>
                    <td>123456-78901</td>
                    <td>12345678</td>
                    <td>janis.berzins@gmail.com</td>
                    <td>Bakalaurs ekonomikā</td>
                    <td>5 gadi banku sektorā</td>
                    <td><i class='fas fa-times'></i></td>
                    <td><i class='fas fa-times'></i></td>
                    <td><i class='fas fa-check'></i></td>
                    <td><button class="Tbtn"><i class="fas fa-check"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>Elīna</td>
                    <td>Kalniņa</td>
                    <td>234567-89012</td>
                    <td>23456789</td>
                    <td>elina.kalnina@gmail.com</td>
                    <td>Maģistrs informācijas tehnoloģijās</td>
                    <td>3 gadi IT projektos</td>
                    <td><i class='fas fa-check'></i></td>
                    <td><i class='fas fa-times'></i></td>
                    <td><i class='fas fa-times'></i></td>
                    <td><button class="Tbtn"><i class="fas fa-check"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>Raimonds</td>
                    <td>Ozoliņš</td>
                    <td>345678-90123</td>
                    <td>34567890</td>
                    <td>raimonds.ozolins@gmail.com</td>
                    <td>Vidējā izglītība</td>
                    <td>10 gadi celtniecībā</td>
                    <td><i class='fas fa-times'></i></td>
                    <td><i class='fas fa-check'></i></td>
                    <td><i class='fas fa-times'></i></td>
                    <td><button class="Tbtn"><i class="fas fa-check"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>Laura</td>
                    <td>Vītola</td>
                    <td>456789-01234</td>
                    <td>45678901</td>
                    <td>laura.vitola@gmail.com</td>
                    <td>Bakalaurs psiholoģijā</td>
                    <td>2 gadi cilvēkresursu vadībā</td>
                    <td><i class='fas fa-check'></i></td>
                    <td><i class='fas fa-check'></i></td>
                    <td><i class='fas fa-check'></i></td>
                    <td><button class="Tbtn"><i class="fas fa-check"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
                <tr>
                    <td>Andris</td>
                    <td>Liepiņš</td>
                    <td>567890-12345</td>
                    <td>56789012</td>
                    <td>andris.liepins@gmail.com</td>
                    <td>Doktora grāds ķīmijā</td>
                    <td>5 gadi pētniecībā</td>
                    <td><i class='fas fa-check'></i></td>
                    <td><i class='fas fa-check'></i></td>
                    <td><i class='fas fa-check'></i></td>
                    <td><button class="Tbtn"><i class="fas fa-check"></i></button></td>
                    <td><button class="Tbtn"><i class="fas fa-trash"></i></button></td>
                </tr>
            </table>
        </div>
    </section>
    
    <?php
        require "footerAdmin.php";
    ?>