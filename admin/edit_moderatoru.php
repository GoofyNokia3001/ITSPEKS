<?php
    $page = "vakances";
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
        <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['apskatitModeratoru'])) {
                    $moderators_ID = $_POST['apskatitModeratoru'];
                    
                    $atlasit_moderatoru_SQL = "SELECT * FROM itspeks_moderatori WHERE ModeratorsID = $moderators_ID";
                    $atlasa_moderatoru = mysqli_query($savienojums, $atlasit_moderatoru_SQL);
                    
                    if (!$atlasa_moderatoru) {
                        echo "Kļūda: " . mysqli_error($savienojums);
                    } else {
                        $moderators = mysqli_fetch_array($atlasa_moderatoru);
                        if ($moderators) {
        ?>
            <table>
                <tr class="heading">
                    <th colspan="2">Rediģēt vakanci:</th>
                </tr>
                <form method="POST">
                    <input type="hidden" name="moderators_ID" value="<?php echo $moderators_ID; ?>">
                    <tr>
                        <th>Lietotājvārds</th>
                        <td><input type="text" name="lietotajvardsMod" value='<?php echo $moderators['Lietotajvards']; ?>' required></td>
                    </tr>
                    <tr>
                        <th>E-pasts</th>
                        <td><input type="email" name="epastsMod" value='<?php echo $moderators['Epasts']; ?>'></td>
                    </tr>
                    <tr>
                        <td colspan="2"><button type="submit" class="btn" name="atjauninatMod">Atjaunināt</button></td>
                    </tr>
                </form>
            </table>
            <?php
                        } else {
                            echo "No $moderators_ID";
                        }
                    }
                } elseif (isset($_POST['atjauninatMod'])) {
                    $moderators_ID = $_POST['moderators_ID'];
                    $lietotajvards = mysqli_real_escape_string($savienojums, $_POST['lietotajvardsMod']);
                    $epasts = mysqli_real_escape_string($savienojums, $_POST['epastsMod']);
                    $update_sql = "UPDATE itspeks_moderatori SET Lietotajvards = '$lietotajvards', Epasts = '$epasts' WHERE ModeratorsID = '$moderators_ID'";
        
                    if(mysqli_query($savienojums, $update_sql)){
                        echo "<div class='notif green'>Rediģēšana ir veiksmīga!</div>";
                        header("Refresh: 2, url=./moderatori.php");
                    }else{
                        echo "<div class='notif red'>Rediģēšana nav veiksmīga!</div>";
                        header("Refresh: 2, url=./moderatori.php");
                    }
                } else {
                    header("Location: ./moderatori.php");
                }
            } else {
                header("Location: ./moderatori.php");
            }
            ?>
        </div>
    </section>
    
<?php
    require "footerAdmin.php";
?>