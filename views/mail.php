<?php

require_once "PHPMailer-5.2-stable/PHPMailerAutoload.php";



        $mail = new PHPMailer;
        $mail->SMTPDebug = 2;// TCP port to connect to
        //echo $row['email'];
        $mail->isSMTP();                            // Set mailer to use SMTP

        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->SMTPSecure = false;
$mail->SMTPAutoTLS = false;
        //$mail->Username = 'elreb7chich';          // SMTP username
        //$mail->Password = 'plataoplomo1994';
        $mail->Username = 'nourkhadher537@gmail.com';          // SMTP username
        $mail->Password = '1Nounour';// SMTP password
        $mail->SMTPSecure = 'smtp';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;


        $mail->setFrom('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
        $mail->addReplyTo('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
        //$mail->addAddress('nour.khedher@esprit.tn ');
        //$mail->addAddress('elreb7chich@gmail.com ');
        $mail->addAddress('nour.khedher@esprit.tn');// Add a recipient
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML
        //$mail->addAttachment('img/img.png');
        $bodyContent = '<h1>Stock en alerte</h1>';
        $bodyContent .= '<h2>Au moins un article est en rupture de stock.</h2>';
        $bodyContent .= '<h3>Visitez Votre Dashboard Admin.</h3>';
        $mail->Subject = 'Rupture de stock';
        $mail->Body = $bodyContent;

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            //echo nl2br ('Message has been sent to : ' . $row['login'] ) ."<br>" ;
            echo "<script>
alert('E-mails Envoyé(s)');

</script>";
        }


?>
