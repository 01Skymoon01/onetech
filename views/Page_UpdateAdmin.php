<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gestion Admins | OneTech</title>
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
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<?php require 'header.php' ?>


    <!-- Single pro tab start-->
    <div class="single-product-tab-area mg-b-30" style="margin-top:10px;">
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-tab-pro-inner">
                            <ul id="myTab3" class="tab-review-design">
                                <li class="active"><a href="#description"><i class="icon nalika-edit"
                                                                             aria-hidden="true"></i> Modifier Admin</a></li>

                            </ul>

                            <div id="myTabContent" class="tab-content custom-product-edit">

                                <form method="post" action="Modifier_Admin.php">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user"
                                                                                           aria-hidden="true"></i></span>

                                                        <input type="text" class="form-control" name="idadmin"
                                                               id="idadmin" placeholder="ID.." readonly autofocus
                                                               onblur="verifnum(this)"  value="<?php echo $_GET['id'] ?> "
                                                        style="background-color: #e4b9b9;">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit"
                                                                                           aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control"
                                                               name="logadmin" id="logadmin" placeholder="Login.."
                                                               onblur="verifLog(this)" value="<?php echo $_GET['login'] ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd"
                                                                                           aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" id="mdpadmin"
                                                               name="mdpadmin" placeholder="Mot de Passe.."
                                                               onblur="verifLog(this)" value="<?php echo $_GET['mdp'] ?>">
                                                    </div>

                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites"
                                                                                           aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="mail"
                                                               id="mail" placeholder="#####@mail.###"
                                                               onblur="verifMail(this)" value="<?php echo $_GET['email'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" id="sauvegarder" name="sauvegarder"
                                                            class="btn btn-custon-rounded-four btn-danger"
                                                            onclick="return verifformAdmin()">Sauvegarder
                                                    </button>
                                                    <button type="button"
                                                            class="btn btn-default btn-md">Annuler
                                                    </button>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
