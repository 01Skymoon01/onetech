<?php
require_once "PHPMailer-5.2-stable/PHPMailerAutoload.php";
require_once "../Core/ProduitIntC.php";
require_once "../Core/AdminsC.php";
$temp = new AdminsC();
$listeadmins = $temp->afficherAdmins();
$produit1C=new ProduitIntC();
$rupture=$produit1C->RuptureStock();
//var_dump($rupture);
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liste Produits| Geoconcept</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/geoconcept.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- nalika Icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <!-- animate CSS
		============================================ -->
    <!-- normalize CSS
		============================================ -->
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <!-- morrisjs CSS
		============================================ -->
    <!-- mCustomScrollbar CSS
		============================================ -->
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- modernizr JS
		============================================ -->
    <!--<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

</head>

<body>
<?php require 'header.php'; ?>

<div class="product-status mg-b-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<br><br><br>
                <fieldset >
                    <legend style="color: white;">Mail Status : </legend>
                    <p style="color: white;">
            <?php
if ($rupture >= 1) {
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 2;// TCP port to connect to
        //echo $row['email'];
        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        //$mail->Username = 'elreb7chich';          // SMTP username
        //$mail->Password = 'plataoplomo1994';
        $mail->Username = 'hatem.temimi@esprit.tn';          // SMTP username
        $mail->Password = 'hatemtemimi25300189';// SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;

    foreach($listeadmins as $row) {
        $mail->setFrom('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
        $mail->addReplyTo('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
        //$mail->addAddress('nour.khedher@esprit.tn ');
        //$mail->addAddress('elreb7chich@gmail.com ');
        $mail->addAddress($row['email'],$row['login']);// Add a recipient
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        $mail->isHTML(true);  // Set email format to HTML
        $mail->addAttachment('img/img.png');
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
window.location.href='Afficher_admins.php';
</script>";
        }
    }

}
else {
    echo "Pas d'article en rupture de stock.";
}
?>
                    </p></fieldset> </div></div></div></div></body></html>


