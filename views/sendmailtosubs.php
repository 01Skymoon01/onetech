


<?php
require_once "PHPMailer-5.2-stable/PHPMailerAutoload.php";
require_once "../Core/ProduitIntC.php";
require_once "../Core/MembreC.php";

$temp = new MembreC();
$listeadmins = $temp->afficherMembre();
//$produit1C=new ProduitIntC();
//$rupture=$produit1C->RuptureStock();
//var_dump($rupture);
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 2;// TCP port to connect to
        //echo $row['email'];
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        //$mail->Username = 'elreb7chich';          // SMTP username
        //$mail->Password = 'plataoplomo1994';
        $mail->Username = 'hatem.temimi@esprit.tn';          // SMTP username
        $mail->Password = 'neverbackdownX512';// SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

    foreach($listeadmins as $row) {
        $mail->setFrom('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
        $mail->addReplyTo('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
        //$mail->addAddress('nour.khedher@esprit.tn ');
        //$mail->addAddress('elreb7chich@gmail.com ');
        $mail->addAddress($row['email'],$row['prenom']);// Add a recipient
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML
        //$mail->addAttachment('img/img.png');
        $bodyContent = $_POST['msg'];

        $mail->Subject = $_POST['mtitle'];
        $mail->Body = $bodyContent;



        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            

        } else {
            echo nl2br ('Message has been sent to : ' . $row['prenom'] ) ."<br>" ;
        }
      }
?>
