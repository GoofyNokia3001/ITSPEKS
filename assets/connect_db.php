<?php
    $serveris = "localhost";
    $lietotajs = "grobina1_kraine";
    $parole = "26FZOc!24";
    $db_nosaukums = "grobina1_kraine";

    $savienojums = mysqli_connect($serveris, $lietotajs, $parole, $db_nosaukums);

    // if(!$savienojums){
    //     die("Kļūda ar datu bāzi: ".mysqli_connect_error());
    // }else{
    //     echo "Savienojums veiksmīgs";
    // }
?>