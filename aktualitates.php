<?php
    $page = "aktualitates";
    require "header.php";
?>

<div class="sadalaAktualitates">
    <div class="box-container">
    <?php
        require "assets/connect_db.php";

        $aktualitatesSQL = "SELECT * FROM itspeks_aktualitates WHERE Izdzests != 1 ORDER BY Datums DESC";
        $atlasaAktualitates = mysqli_query($savienojums, $aktualitatesSQL);

        if(mysqli_num_rows($atlasaAktualitates) > 0){
            while($aktualitate = mysqli_fetch_assoc($atlasaAktualitates)){
                echo "
                    <div class='box imgForAkt'>
                        <img src='{$aktualitate['Attels_URL']}'>
                        <p class='date'>".date("d.m.Y", strtotime($aktualitate['Datums']))."</h2>
                        <h2>{$aktualitate['Virsraksts']}</h2>
                        <button class='toggle-btn' onclick='toggleContent(this)'>Vairāk</button>
                        <div class='content'>
                            <p>{$aktualitate['Teksts']}</p>
                        </div>
                    </div>
                ";
            }
        }else{
            echo "Nav nevienas aktualitāte, ko attēlot!";
        }
    ?>
    </div>
</div>
    
<?php
    require "footer.php";
?>