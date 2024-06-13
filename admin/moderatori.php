<?php
    $page = "moderatori";
    require "headerGaligais.php";

    if ($_SESSION['userRole'] !== 'admin') {
        header("location:./");
        exit();
    }

    require "../assets/connect_db.php";
?>

<body>
    <section class="admin">
        <div class="moderatoriAdmin">
            <table style="margin-top: 8.5%;">
                <tr class="heading">
                    <th>Lietotājvārds</th>
                    <th>E-pasts</th>
                    <th class="thButton">Rediģet</th>
                    <th class="thButton">Dzēst</th>
                </tr>
                <?php
                    $moderatori_SQL = "SELECT * FROM itspeks_moderatori WHERE Izdzests != 1";
                    $atlasa_moderatori_SQL = mysqli_query($savienojums, $moderatori_SQL);

                    while($moderators = mysqli_fetch_array($atlasa_moderatori_SQL)){
                        echo "
                            <tr>
                                <td>{$moderators['Lietotajvards']}</td>
                                <td>{$moderators['Epasts']}</td>
                                <td>
                                    <form method='POST' action='edit_moderatoru.php'>
                                        <button type='submit' name='apskatitModeratoru' class='Tbtn' value='{$moderators['ModeratorsID']}'><i class='fas fa-edit'></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method='POST' onsubmit='return confirm(\"Vai tiešām vēlēs dzēst?\");'>
                                        <input type='hidden' name='delete_id' value='{$moderators['ModeratorsID']}'>
                                        <button type='submit' name='nodzestModeratoru' class='Tbtn' value='{$moderators['ModeratorsID']}'><i class='fas fa-trash'></i></button>
                                    </form>
                                </td>
                            </tr>
                        ";
                    }
                ?>
                <tr>
                    <td colspan="5">
                        <form method='POST' action='pievienot_moderatoru.php'>
                            <button type='submit' class="btn"><i class="fas fa-add"></i></button>
                        </form>
                    </td>
                </tr>
            </table>
            <?php
                if(isset($_POST['nodzestModeratoru'])){
                    $id = $_POST['delete_id'];
                    $sql = "UPDATE itspeks_moderatori SET Izdzests = 1 WHERE ModeratorsID = '$id'";
                    mysqli_query($savienojums, $sql);
                    echo "<script>
                            window.location.href = window.location.href;
                            if(window.performance){
                                if(window.performance.navigation.type == 1){
                                    location.reload(true);
                                }
                            }
                        </script>";
                }
            ?>
        </div>
    </section>
    
    <?php
        require "footerAdmin.php";
    ?>