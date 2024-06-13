<?php
require("../assets/connect_db.php");

if (isset($_GET['id']) && isset($_GET['type'])) {
    $pieteikums_id = intval($_GET['id']);
    $file_type = $_GET['type'];

    $column_name = ($file_type == 'cv') ? 'CV' : 'Motivacijas_vestule';

    $query = "SELECT $column_name FROM itspeks_pieteikumi WHERE Pieteikums_ID = $pieteikums_id";
    $result = mysqli_query($savienojums, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $file_data = $row[$column_name];

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$file_type.'_'.$pieteikums_id.'.pdf"');
        echo $file_data;
    } else {
        echo "Failu nevarēja atrast.";
    }
} else {
    echo "Nederīgi parametri.";
}
?>
