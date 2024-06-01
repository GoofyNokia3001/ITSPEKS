<?php
    require("connect_db.php");

    if (isset($_POST["auth"])) {
        session_start();
        
        $lietotajvards = mysqli_real_escape_string($savienojums, $_POST["usr"]);
        $parole = mysqli_real_escape_string($savienojums, $_POST["psswrd"]);
        
        $sqlAdmin = "SELECT * FROM itspeks_administratori WHERE Lietotajvards = '$lietotajvards'";
        $rezultatsAdmin = mysqli_query($savienojums, $sqlAdmin);

        $sqlModerator = "SELECT * FROM itspeks_moderatori WHERE Lietotajvards = '$lietotajvards' AND Izdzests != 1";
        $rezultatsModerator = mysqli_query($savienojums, $sqlModerator);

        if (mysqli_num_rows($rezultatsAdmin) == 1) {
            $user = mysqli_fetch_array($rezultatsAdmin);
            if (password_verify($parole, $user["Parole"])) {
                $_SESSION["lietotajvardsKRA"] = $user["Lietotajvards"];
                $_SESSION["userRole"] = "admin";
                header("location:./admin/index.php");
            } else {
                echo "Nepareizs lietotajvārds vai parole!";
            }
        } elseif (mysqli_num_rows($rezultatsModerator) == 1) {
            $user = mysqli_fetch_array($rezultatsModerator);
            if (password_verify($parole, $user["Parole"])) {
                $_SESSION["lietotajvardsKRA"] = $user["Lietotajvards"];
                $_SESSION["userRole"] = "moderator";
                header("location:./admin/index.php");
            } else {
                echo "Nepareizs lietotajvārds vai parole!";
            }
        } else {
            echo "Nepareizs lietotajvārds vai parole!";
        }
    }
?>
