<?PHP
include "../Core/AdminsC.php";
require_once "session.php";
$admin1C=new AdminsC();
$listeAdmins=$admin1C->afficherAdmins();
//var_dump($listeEmployes->fetchAll());
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liste Admins| Geoconcept</title>
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
<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            client=tr[i].getElementsByTagName("td")[3];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                }
                else  if (client) {
                    txtValue = client.textContent || client.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    }

</script>



    <div class="product-status mg-b-30" style="margin-top:10px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Admins :</h4>
                        <div class="container" style="border: white;border-width: 4px;margin-bottom: 30px;">
                            <a data-toggle="tooltip" title="Ajouter admin" href="admins-edit.php" class="fa fa-user-plus fa-2x" style="position: absolute;right: 10%;top: 4%;color: #8ed081;"></a>
                        </div>
                        <table class="table-bordered" id="myTable" style="background-color: #365D84">
                            <tr>
                                <th>Id</th>
                                <th>Login</th>
                                <th>Mdp</th>
                                <th>Email</th>
                                <th>Debut Service</th>
                                <th>Date Payement</th>
                                <th>Statut Ban</th>
                                <th>Role</th>
                            </tr>

                            <?PHP
                            foreach($listeAdmins as $row){
                                ?>
                                <tr>
                                    <td><?PHP echo $row['id']; ?></td>
                                    <td><?PHP echo $row['login']; ?></td>
                                    <td><?PHP echo $row['mdp']; ?></td>
                                    <td><?PHP echo $row['email']; ?></td>
                                    <td><?PHP echo $row['dateserv']; ?></td>
                                    <td><?PHP $temp =  strtotime($row['dateserv']);
                                        $var3 = $admin1C->jjg_calculate_next_month($temp);
                                        echo date("Y-m-d", $var3); ?></td>
                                    <td><button class="pd-setting" id="banstat" name="banstat" value="<?PHP echo $row['banstat']; ?>"><?PHP echo $row['banstat']; ?></button></td>
                                    <td><?PHP echo $row['role']; ?></td>
                                    <script>
                                        var temp = document.getElementsByName("banstat");
                                        for (i=0 ; i<temp.length ; i++)
                                        if (temp[i].value == "banni") {
                                                //banstat.classList.remove('pd-setting');
                                                //banstat.classList.add('ds-setting');
                                                temp[i].style.background='#000000';
                                            }

                                    </script>
                                    <td><form method="POST" action="supprimer_admin.php">
                                            <button data-toggle="tooltip" title="Supprimer" type="submit" class="btn waves-effect btn-sm " name="supprimer" style="background-color:#fe5f55;" ><i class="fa fa-trash-o"></i></button>
                                            <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                        </form>
                                    </td>
                                    <td><a data-toggle="tooltip" title="Modifier" style="background-color: #e0e1dd;" class="btn btn-sm" href="Page_UpdateAdmin.php?id=<?PHP echo $row['id']; ?>&amp;login=<?PHP echo $row['login']; ?>&amp;mdp=<?PHP echo $row['mdp']; ?>&amp;email=<?PHP echo $row['email']; ?>">
                                     <i class="fa fa-edit"></i>       </a></td>
                                    <td><form method="POST" action="Ban_admin.php">
                                           <button data-toggle="tooltip" title="Bannir" type="submit" class="btn  btn-sm" name="Ban" style="background-color: #edd382;"> <i class="fa fa-ban"></i></button>
                                            <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                        </form>
                                    </td>
                                </tr>
                                <?PHP
                            }
                            ?>
                        </table>

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
