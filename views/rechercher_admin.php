<?PHP
include "../Core/AdminsC.php";
$adminC=new AdminsC();
$listeAdmin=$adminC->rechercherAdmin($_POST['searchadmin']);

//var_dump($listeEmployes->fetchAll());
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Recherche Admins</title>
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
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<?php require 'header.php' ?>
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            



                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-report">
                                    <form role="search" class="" method="POST" action="rechercher_admin.php">
                                        <input name="searchadmin" type="text" placeholder="Rechercher Admins.." class="form-control" style="width: 40%;margin-left: 3%;color: white;">
                                        <button type="submit" class="btn btn-custon-four btn-default" style="position: absolute; top: 9%; left: 40%;margin-left: 5%;border: none;" ><i class="fa fa-search"></i></button>
                                    </form>
                                    
                                    <a href="TelechargerListe.php" class="button" target="_blank" >
                                        <button  data-toggle="tooltip" data-placement="left"  title="Telecharger Liste Produits PDF" class="btn"><i class="icon nalika-download" ></i></button>
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Resultats de Recherche :</h4>
                        <div class="add-product">
                            <a href="product-edit.php">Ajouter Produit</a>
                        </div>
                        <table >
                            <tr>
                                <th>ID</th>
                                <th>Login</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Statut Ban</th>
                            </tr>
                           <?PHP
                            foreach($listeAdmin as $row){
                                ?>
                            <tr style="background-color:#3B6B9A; ">
                                <td><?PHP echo $row['id']; ?></td>
                                <td><?PHP echo $row['login']; ?></td>
                                <td><?PHP echo $row['mdp']; ?></td>
                                <td><?PHP echo $row['email']; ?></td>
                                <td><button class="pd-setting" id="banstat" style="background-color: #3b9953; width: 71px;" name="banstat" value="<?PHP echo $row['banstat']; ?>"><?PHP echo $row['banstat']; ?></button></td>

                                <script>
                                    var temp = document.getElementsByName("banstat");
                                    for (i=0 ; i<temp.length ; i++)
                                        if (temp[i].value == "true") {
                                            //banstat.classList.remove('pd-setting');
                                            //banstat.classList.add('ds-setting');
                                            temp[i].style.background='#c64f4f';
                                        }

                                </script>
                                <td><form method="POST" action="supprimer_admin.php">
                                        <input type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10" style="background:none; border:none;" name="supprimer" value="X">
                                        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                    </form>
                                </td>
                                <td><button class="btn btn-default btn-sm"><a href="Page_UpdateAdmin.php?id=<?PHP echo $row['id']; ?>&amp;login=<?PHP echo $row['login']; ?>&amp;mdp=<?PHP echo $row['mdp']; ?>&amp;email=<?PHP echo $row['email']; ?>">
                                            Modifier</a></button></td>
                                <td><form method="POST" action="Ban_admin.php">
                                        <input type="submit" class="btn btn-warning btn-sm" name="Ban" value="Revert Ban">
                                        <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                    </form>
                                </td>
                            </tr>
                            <?PHP
                            }
                            ?>
                        </table>
                        <div class="custom-pagination">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
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
<!-- plugins JS
    ============================================ -->
<script src="js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="js/main.js"></script>
</body>

</html>



