<?php
    require "header.php";
?>
    <section id="galvena">
        <div class="content">
            <h1>SMAGS DARBS IR PANĀKUMU ATSLĒGA.</h1>
            <p>Darba meklējumi IT - Spēks vietnē ļauj Jums daudzkārt saīsināt savu laiku, izvairīties no gaidīšanas rindās un dokumentu sagatavošanas, jo Jūs varat vienkārši atrast interesējošo vakanci un atbildēt uz to. Un Jūs to varat darīt, sēžot mājās pie datora un dzerot savu iecienītāko zaļo tēju.</p>
        </div>
        <video autoplay muted loop poster id="myVideo">
            <source src="images/video.mp4" type="video/mp4">
        </video>
    </section>
    <section id="vakances">
        <div class="content">
            <h2>JAUNS <span>DARBS</span> - JAUNA <span>DZĪVE</span></h2>
            <p>Mūsu vietnes sadaļa "Vakances" ir Jūsu uzticams palīgs IT darba vietu meklēšanā Latvijā. Šeit Jūs varat viegli un ātri atrast aktuālos piedāvājumus no vadošajiem uzņēmumiem. Lietotājam draudzīgā saskarne un uzlabotie filtri ļaus Jums atlasīt vakances pēc dažādiem kritērijiem. Nepalaidiet garām iespēju atrast savu sapņu darbu - izmantojiet mūsu darba meklēšanas rīku un sāciet jaunu profesionālās karjeras posmu jau šodien!</p>
            <a href="vakances.php" class="btn">Skatīt vakances</a>
        </div>
        <img src="images/newJob.png">
    </section>
    <section id="aktualitates">
        <h2>AKTUALITĀTES</h2>
        <p>IEPAZĪSTIETIES AR JAUNĀKAJĀM AKTUALITĀTĒM IT JOMĀ.</p>
        <div class="box-container">
            <?php
                require "assets/connect_db.php";

                $aktualitatesSQL = "SELECT * FROM itspeks_aktualitates ORDER BY Datums DESC LIMIT 3";
                $atlasaAktualitates = mysqli_query($savienojums, $aktualitatesSQL);

                if(mysqli_num_rows($atlasaAktualitates) > 0){
                    while($aktualitate = mysqli_fetch_assoc($atlasaAktualitates)){
                        echo "
                            <div class='box radius'>
                                <img src='{$aktualitate['Attels_URL']}'>
                                <p>".date("d.m.Y", strtotime($aktualitate['Datums']))."</h2>
                                <a href='aktualitates.php' class='aktualVirsraksts'>{$aktualitate['Virsraksts']}</div>
                            </div>
                        ";
                    }
                }else{
                    echo "Nav nevienas aktualitāte, ko attēlot!";
                }
            ?>
        </div>
        <a href="aktualitates.php" class="btn">Skatīt vairāk</a>
    </section>
<?php
    require "footer.php";
?>