<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/SMTP.php';
    require 'PHPMailer-master/src/PHPMailer.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    if(isset($_POST["nosutit"])){
        try {
            //Server settings
            $mail->CharSet = 'UTF-8';
            $mail->SMTPDebug = 0;//1 - Lai redzet error 0 - Lai pasleptu//Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'itspeksteam@gmail.com';                //SMTP username
            $mail->Password   = 'uohv xcse hhdh kraj';                             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('itspeksteam@gmail.com', 'LVT uzņemšanas sistēma');
            $mail->addAddress('itspeksteam@gmail.com', 'LVT uzņemšanas sistēma');     //Add a recipient
        

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'IT SPEKS, Jauna ziņa no IT SPEKS kontaktu sadaļa';
            $mail->Body    = 'Ziņas sūtītāja vārds, uzvārds: <b>'.$_POST['vards'].'</b><br>
                                Ziņas sūtītāja epasts: <b>'.$_POST['epasts'].'</b><br>
                                Ziņas sūtītāja tālrunis: <b>'.$_POST['talrunis'].'</b><br>
                                Ziņojums: <b>'.$_POST['zinojums'].'</b><br>';

            $mail->send();
            echo "<div id='pazinojums'>
                    <p>
                    Ziņa nosūtīta! Sazināsimies ar jums pavisam drīz!
                    <a onclick='x()'><i class='fas fa-times'></i></a>
                    </p>
                </div>";
        } catch (Exception $e) {
            echo "System Error: {$mail->ErrorInfo}";
        }
    }
?>