<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer(true);
include "../Core/employeC.php";
var_dump($_POST['destination']);
var_dump($_POST['livreur']);
var_dump($_POST['client']);


if (isset($_POST['destination']) and isset($_POST['livreur'])){

		$db = config::getConnexion();
try{

    $a=$_POST['destination'];
    $b=$_POST['client'];
   $livreurC=new LivreurC();
    $result=$livreurC->chercherLivreur($_POST['livreur']);
    foreach($result as $row){
    $m=$row['email'] ;
    }
    var_dump($m);

$mail = new PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "mehdi.hmaidi@esprit.tn";
$mail->Password = "23584248Aa";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "mehdi.hmaidi@esprit.tn";
$mail->FromName = "Hmaidi mehdi";

$mail->addAddress("$m");

$mail->isHTML(true);

$mail->Subject = "Livraison a faire";
$mail->Body = "Vous avez une livraison a faire a l'adresse suivante : $a id commande: $b ";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message has been sent successfully";

}
           // header('Location: index.php');
        }

        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
//header ('location: product-list.php');
}
else {
    echo "erreur";
}

?>
