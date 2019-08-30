
<?php
if(isset($_POST['adresseIP'])){
  require_once "../Views/PHPMailer-5.2-stable/PHPMailerAutoload.php";
require_once "../Core/AdminsC.php";
include "../Entities/Lab.php";
include "../Core/labC.php";

//Recherche @
$pos=0;
$LabC1=new LabC();
$listeLab=$LabC1->RechercheIP($_POST['adresseIP']);
foreach($listeLab as $row){

  $pos++;

}

if($pos==0){
    $lab=new Lab(
        $_POST['nom'],$_POST['prenom'],$_POST['RAM'],$_POST['cpu'],$_POST['stokage'],$_POST['DateDebut'],
        $_POST['DateFin'],$_POST['Departement'],$_POST['DescLab'],$_POST['OS'],$_POST['nomVM'],$_POST['adresseIP']
    );
    //:nom,:prenom,:Ram,:cpu,:stokage,:datedebut,:datefin,:depart,:descLab,:os,:nomVM,:adresseIP)
    //Partie2
    /*
    var_dump($produit1);
    }
    */
    /*

        $temp = new AdminsC();
        $listeadmins = $temp->afficherAdmins();

        //var_dump($rupture);

                $mail = new PHPMailer;
                //$mail->SMTPDebug = 2;// TCP port to connect to
                //echo $row['email'];
                $mail->isSMTP();                            // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                     // Enable SMTP authentication
                //$mail->Username = 'elreb7chich';          // SMTP username
                //$mail->Password = 'plataoplomo1994';
                $mail->Username = 'skymoon2598@gmail.com';          // SMTP username
                $mail->Password = '1Nounour';// SMTP password
                $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;


                $mail->setFrom('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
                $mail->addReplyTo('GeoconceptDashBoardAdmin@gmail.com', 'GeoConcept');
                //$mail->addAddress('nour.khedher@esprit.tn ');
                //$mail->addAddress('elreb7chich@gmail.com ');
                $mail->addAddress('nour.khedher@esprit.tn');// Add a recipient
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                $mail->isHTML(true);  // Set email format to HTML
                //$mail->addAttachment('img/img.png');
                $bodyContent = '<h1>Une Reclamation Recu</h1>';
                $bodyContent .= '<h2>Ce mail represente votre ticket de reclamation</h2>';
                $bodyContent .= '<h3>Do noot Delete.</h3>';
                $mail->Subject = 'Reclaamtion Recu';
                $mail->Body = $bodyContent;

                if (!$mail->send()) {
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                    echo nl2br ('Message has been sent to : ' . 'nour' ) ."<br>" ;
                }


*/

    //Partie3
    $LabC=new LabC();
    $LabC->ajouterLab($lab);
  //  header('Location: affichageLab.php');
  require_once "/turbo_send_email_code/turbo_send_email_code/lib/TurboApiClient.php";



  $email = new Email();
  $email->setFrom("onetech.admin@onetech.tn");
  $email->setToList($_POST['email'], $_POST['email']);
  $email->setCcList("dd@domain.com,ee@domain.com");
  $email->setBccList("ffi@domain.com,rr@domain.com");
  $email->setSubject("Inscreption lab");
  $email->setContent("");
  $email->setHtmlContent("<p>Thank you for registering to the lab</p><p>.onetech</p>");




  $turboApiClient = new TurboApiClient("nour.khedher@esprit.tn", "pHQg0W0I");


  $response = $turboApiClient->sendEmail($email);

  var_dump($response);

  require_once "../Core/AdminsC.php";
  $temp = new AdminsC();
  $listeadmins = $temp->afficherAdmins();

  foreach($listeadmins as $row) {
  $email->setFrom("onetech.admin@onetech.tn");
  $email->setToList($row['email'], $row['email']);
  $email->setCcList("dd@domain.com,ee@domain.com");
  $email->setBccList("ffi@domain.com,rr@domain.com");
  $email->setSubject("Inscreption lab");
  $email->setContent("");
  $email->setHtmlContent("<p>they is a new user </p><p>.Lab.Onetech</p>");




  $turboApiClient = new TurboApiClient("nour.khedher@esprit.tn", "pHQg0W0I");


  $response = $turboApiClient->sendEmail($email);
  var_dump($response);

  }
  }else
  {
    ?>
<script type="text/javascript">
  alert("cette adresse ip est deja utilisé!!");
</script>
    <?php
  }
    ?>

    <?php
    /*


    echo $_POST['nom'];
    //echo $_POST['nprod'];
    echo $_POST['prenom'];
    echo $_POST['RAM'];
    echo $_POST['cpu'];
    echo $_POST['stokage'];
    echo $_POST['DateDebut'];
    echo $_POST['DateFin'];
    echo $_POST['Departement'];
    echo $_POST['DescLab'];

	echo "vérifier les champs";

//*/
}
?>




<?php require_once "session.php"; ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gestion Lab | OneTech</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
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
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> </script>

</head>

<body>

<?php require_once 'header.php' ?>

    <!-- Single pro tab start-->
    <div class="single-product-tab-area mg-b-30" style="margin-top:10px;">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">

                <div class="row" >
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >



                            <div id="myTabContent" class="tab-content custom-product-edit" style="padding-top:50px;" >

                                <form method="post" action="AjouterLab.php">
                                    <div class="product-tab-list tab-pane fade active in" id="description" style="margin-top:5px;margin-bottom:20px;">
                                        <div class="row">
                                          <fieldset >
                                              <legend style="color: white; text-align: center;font-stretch: expanded"><!--h2><i class="icon nalika-edit" aria-hidden="true">

                                              </i></h2-->
                                              </legend>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">

<?php //**********************************************************************Nom************************************************ ?>
                                                    <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"><i class="icon nalika-user"
                                                                                           aria-hidden="true"></i></span>

                                                        <input type="text" class="form-control" name="nom"
                                                               id="nom" placeholder="Nom .."
                                                               onblur="verifnom(this)" required>
                                                    </div>
<?php //**********************************************************************Prenom************************************************ ?>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="text" class="form-control" id="prenom"
                                                               name="prenom" placeholder="   Prenom .."
                                                               onblur="verifPrenom(this)" required>
                                                    </div>
    <?php //**********************************************************************Adresse IP************************************************ ?>
                                                        <div class="input-group mg-b-pro-edt">
                                                      <span class="input-group-addon"></span>
                                                      <input type="text" class="form-control" id="adresseIP"
                                                     name="adresseIP" placeholder="   adresse IP .."
                                                       required>
                                                      </div>
<?php //**********************************************************************RAM************************************************ ?>

                                                    <div class="input-group mg-b-pro-edt">
                                                      <span class="input-group-addon"></span>
                                                      <input type="text" class="form-control" id="RAM"
                                                             name="RAM" placeholder="   RAM .."
                                                             onblur="verifRAM(this)" required>
                                                    </div>
<?php //**********************************************************************CPU************************************************ ?>

                                                    <div class="input-group mg-b-pro-edt">
                                                      <span class="input-group-addon"></span>
                                                      <input type="text" class="form-control" id="cpu"
                                                             name="cpu" placeholder="   CPU .."
                                                             onblur="verifCPU(this)" required>
                                                    </div>
  <?php //**********************************************************************OS************************************************ ?>
                                                    <div class="input-group mg-b-pro-edt">
                                                     <span class="input-group-addon"></span>
                                                     <input type="text" class="form-control"
                                                     name="OS" placeholder="   OS .."
                                                     required>
                                                             </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
<?php //**********************************************************************Stokage************************************************ ?>
                                                  <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control"
                                                           name="stokage" placeholder="   Stokage .."
                                                           onblur="verifprix(this)" required>
                                                  </div>
  <?php //**********************************************************************nomVM************************************************ ?>
                                                        <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"></span>
                                                        <input type="text" class="form-control"
                                                     name="nomVM" placeholder="   nomVM .."
                                                      required>
                                                      </div>
<?php //**********************************************************************Date************************************************ ?>

                                                    <div class="input-group mg-b-pro-edt">
                                                      <table>

                                                        <th >
                                                        <td > <p style="margin-right:20px;">Du:</p></td>
                                                        <td>  <input type="date" class="form-control" name="DateDebut"
                                                         id="DateDebut" onblur="verifDateDebut(this)"></td>
                                                        </th>

                                                        <th>

                                                          <td> <p style="margin-right:20px;margin-left:20px;"> au:</p></td>
                                                          <td>  <input type="date" class="form-control" name="DateFin"
                                                                   id="DateFin" placeholder="Description Produit"
                                                                   onblur="verifDateFin(this)"></td>                                              </th>
                                                          <th>

                                                                   <td> <input type="checkbox" id="Withdate" name="WithDate" checked style="margin-left:10px;">
                                                                   <label for="scales" style="color:white;">Pas de date</label></td>

                                                          </th>

                                                      </table>

                                                    </div>
<?php //**********************************************************************Departement************************************************ ?>


                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-like"
                                                                                           aria-hidden="true"></i></span>
                                                        <!--<input type="text" class="form-control" name="CatProd"
                                                               id="CatProd" placeholder="Catégorie"
                                                               onblur="verifnom(this)">-->
                                                        <SELECT name="Departement" id ="Departement" size="1" class="form-control" required>
                                                            <OPTION>Systeme
                                                            <OPTION>R&S
                                                            <OPTION>UC
                                                            <option>Filodoxia
                                                            <option>Stagiaire
                                                        </SELECT>
                                                    </div>

  <?php //**********************************************************************Stokage************************************************ ?>
                                                   <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" class="form-control"
                                                    name="DescLab" placeholder="   Description .."
                                                    required>
                                                            </div>

  <?php //**********************************************************************email************************************************ ?>
<div class="input-group mg-b-pro-edt">
<span class="input-group-addon"></span>
<input type="text" class="form-control"
placeholder="   email .." name="email"
required>
</div>



                                                </div>




                                <br>




                            </div>
                            <div style="" >
                                <div class="text-center custom-pro-edt-ds"style="margin-bottom:50px;margin-top:20px;">
                                    <button type="submit" id="sauvegarder" name="sauvegarder"
                                             class="btn btn-sm waves-effect" style="background-color: #24caa1;"
                                             onclick="return verifform()"><i class="fa fa-check-circle fa-2x"></i>
                                    </button>

                                </div>


                                    </div>
</form>
                                            </div>
                                        </div>

                </div>

                </fieldset>
        </div>
    </div>

</div>

<!-- jquery
    ============================================ -->
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="js/metisMenu/metisMenu.min.js"></script>
<script src="js/metisMenu/metisMenu-active.js"></script>
<!-- morrisjs JS
    ============================================ -->
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<script src="js/sparkline/jquery.charts-sparkline.js"></script>
<!-- calendar JS
    ============================================ -->
<script src="js/calendar/moment.min.js"></script>
<script src="js/calendar/fullcalendar.min.js"></script>
<script src="js/calendar/fullcalendar-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="js/tab.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>

<script src="js/saisie.js"></script>


<script type="text/javascript">

    /*var nom = document.getElementById('nomprod');
    var nom1 = document.getElementById('nomprod');
    var titre = document.getElementById('TitreProd');
    var qte = document.getElementById('QteProd');
    var desc = document.getElementById('DescProd');
    var prix = document.getElementById('PrixProd');
    var categorie = document.getElementById('CatProd');
    var valider = document.getElementById('sauvegarder');
    valider.onclick = function()
    {
      if (nom.value==null || nom.value=="")
        {
         nom.style.backgroundColor = "#fba";
         alert("Please Fill All Required Field");
        }
       else if (titre.value==null || titre.value=="")
         {
         titre.style.backgroundColor = "#fba";
        }
       else if (qte.value==null || qte.value=="")
       {
        qte.style.backgroundColor = "#fba";
       }
       else if (desc.value==null || desc.value=="")
       {
        desc.style.backgroundColor = "#fba";
       }
        else if (prix.value==null || prix.value=="")
         {
            prix.style.backgroundColor = "#fba";
         }
      else if (categorie.value==null || categorie.value=="")
         {
               categorie.style.backgroundColor = "#fba";
         }
         else
         {
            alert('Produit Sauvegardé !');
         }

    } */

    /*function colorish(champ, erreur)
    {
    if(erreur)
      champ.style.backgroundColor = "#fba";
    else
      champ.style.backgroundColor = "";
    }


    function verifnom(champ)

        {
            var regex = /[a-zA-Z]/
        if(!regex.test(champ.value) || champ.value.length < 4 || champ.value.length > 25)

        {

        colorish(champ, true);

        return false;

        }

        else

        {

         colorish(champ, false);

         return true;

        }

        }

    function verifprix(champ)
    {
        var regex = /[0-9.,]/;

   if(!regex.test(champ.value) || champ.value.length < 2 || champ.value.length > 4)

   {

      colorish(champ, true);

      return false;

   }

   else

   {

      colorish(champ, false);

      return true;

   }

    }

    function verifnum(champ)
    {
    var regex = /[0-9a-zA-Z]/;

   if(!regex.test(champ.value) || champ.value.length < 6)

   {

      colorish(champ, true);

      return false;

   }

   else

   {

      colorish(champ, false);

      return true;

   }

    }

   function verifform()

{
        var nom = document.getElementById('nomprod');
        var numero = document.getElementById('NumProd');
        var qte = document.getElementById('QteProd');
        var desc = document.getElementById('DescProd');
        var prix = document.getElementById('PrixProd');
        var categorie = document.getElementById('CatProd');

        var NomOk = verifnom(nom);

        var qteOk = verifnum(qte);

        var descOK = verifnom(desc);

        var PrixOk = verifprix(prix);

        var NumOk = verifnum(numero);

        var CatOK = verifnom(categorie);

        if(NomOk && PrixOk && NumOk && qteOk && descOK && CatOK)

      {
        alert("Produit Ajouté");
        return true;
      }

   else

     {

      alert("Veuillez remplir correctement tous les champs");

      return false;

   }

}*/


</script>



</body>

</html>
