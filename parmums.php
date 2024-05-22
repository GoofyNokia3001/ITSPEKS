<?php
    $page = "parmums";
    require "header.php";
?>

    <div class="parMums">
        <div class="infoParmums">
            <div class="tekstsParMums">
                <p id='mazais'>PAR MUMS</p>
                <h1>UZZINI VAIRĀK PAR MUMS IT - SPĒKS, DARBA IEKĀRTOŠANA AĢENTŪRA IT NOZARĒ</h1>
                <p>IT - Spēks ir uzņēmums, kas izsludina vakances IT nozarē Latvijā. Mēs piedāvājam plašu vakanču klāstu dažāda līmeņa speciālistiem - no iesācējiem līdz pieredzējušiem profesionāļiem. Mūsu mērķis ir savienot talantīgus kandidātus ar vadošajiem uzņēmumiem valstī, veicinot viņu profesionālo izaugsmi un IT nozares attīstību kopumā.</p>
            </div>
            <img src="images/logo.jpg">
        </div>
        <div class="biedri">
            <h2>IEPAZĪTIES AR DAŽĀM <span>IT - SPĒKS</span></h2>
            <div class="box-container">
                <div class="box">
                    <img src="images/ken.png">
                    <div class="hoverText">Ken</div>
                </div>
                <div class="box">
                    <img src="images/eric.png">
                    <div class="hoverText">Ēriks</div>
                </div>
                <div class="box">
                    <img src="images/sharon.png">
                    <div class="hoverText">Šarona</div>
                </div>
                <div class="box">
                    <img src="images/bupa.png">
                    <div class="hoverText">Bejlija Būpa</div>
                </div>
            </div>
        </div>
        <div class="kontakti">
            <h1>IR JAUTĀJUMI?</h1>
            <div class="row">
                <iframe class="map shadow radius" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10470.442222770127!2d21.002115878284684!3d56.517029433265265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46faa63e5ebbd14f%3A0x26a803cb28d0d0b2!2sAldaru%20iela%2040%2C%20Liep%C4%81ja%2C%20LV-3401!5e0!3m2!1sru!2slv!4v1716110172010!5m2!1sru!2slv" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <form action="" method="post" class="shadow radius">
                    <input type="text" name="vards" placeholder="Vārds, uzvārds" class="box" required>
                    <input type="email" name="epasts" placeholder="E-pasts" class="box" required>
                    <input type="tel" name="talrunis" placeholder="Tālrunis" class="box" required>
                    <textarea name="zinojums" placeholder="Ziņa" class="box" required></textarea>
                    <button type="submit" class="btn" name="nosutit">Sazināties</button>
                </form>
            </div>
        </div>
    </div>
    <footer class="parmumsFooter">
        <div class="pirmais">
            <img src="images/logo.jpg">
            <br>
            IT - Spēks &copy; 2024
        </div>
        <div class="otrais">
            <div class="icon">
                <i class="fas fa-phone"></i>
                <h3>Tālrunis</h3>
                <p>+371 12345678</p>
                <p>+371 87654321</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
                <h3>E-pasts</h3>
                <p>elinakraine@itspeks.lv</p>
                <p>klimskulacenoks@itspeks.lv</p>
            </div>
            <div class="icon">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Adrese</h3>
                <p>Aldaru iela 50 <br>Liepāja, LV-3401, Latvija</p>
            </div>
        </div>
    </footer>
</body>
</html>