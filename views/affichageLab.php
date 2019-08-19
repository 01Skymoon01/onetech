<?php
include "../Entities/Lab.php";
include "../Core/labC.php";

$LabC1=new LabC();

$listeLab=$LabC1->afficherTouTLab();


 ?>


<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Lab |OneTech</title>
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

<?php require 'header.php' ?>

        <!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->

<!-- Stat with graph         ----------------------------------->

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    client=tr[i].getElementsByTagName("td")[2];
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

        <!-- HOUNII COMMANDE§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§-->
        <div class="product-status mg-b-30" style="margin-top:10px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                          <div>
                            <h4>Liste</h4>
                          </div>
  <form action="CommandeList.php" method="GET">
    <div style="display: flex;">
<div class="input-group mb-3" >
  <div class="breadcome-heading">
      <form role="search" class="">
          <input id="myInput" style="color:white;"  type="text" placeholder="Search..."  onkeyup="myFunction()" class="form-control">
      </form>
  </div></div>


</div>
</form>


                            <div class="add-product">

                            </div>
                            <table id="myTable">
                                <tr>
                                   <th>   </th>
                                    <th>N°</th>
                                    <th>nom</th>
                                    <th>prenom</th>
                                    <th>Ram</th>
                                    <th>cpu</th>
                                    <th>stokage</th>
                                    <th>datedebut</th>
                                    <th>datefin</th>
                                    <th>departement</th>
                                    <th>OS</th>
                                    <th>nom VM</th>
                                    <th>@IP</th>

                                </tr>


<form action="supprimerLab.php" method="GET">


<?php


foreach($listeLab as $row){
 ?>
  <?PHP if($row['datefin'] >=  date("Y-m-d")){

    ?>
                                  <tr style="background-color:#3B6B9A;">

  <?PHP } else if($row['datefin'] <  date("Y-m-d")) {
     ?>

                                  <tr style="background-color:#365D84;">
      <?php }      ?>

                                    <td>
                                    <form action="supprimerLab.php" method="GET">
                              <button data-toggle="tooltip" title="Supprimer" type="submit" class="btn waves-effect btn-sm " name="supprimer" style="background-color:#fe5f55;" ><i class="fa fa-trash-o"></i></button>
                                     <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                                     </form>
                                                                        </td>
                                    <td><?PHP echo $row['id']; ?></td>
                                    <td><?PHP echo $row['nom']; ?></td>
                                    <td><?PHP echo $row['prenom']; ?> </td>
                                    <td><?PHP echo $row['ram']; ?></td>
                                    <td><?PHP echo $row['cpu']; ?></td>
                                    <td>
                                      <?PHP echo $row['stokage']; ?>
                            </td>
                                    <td> <?PHP echo $row['datedebut']; ?></td>
                                                                        <td>
                                    <?PHP echo $row['datefin']; ?>
                                                                    </td>
                                      <td> <?PHP echo $row['depart']; ?></td>
                                      <td> <?PHP echo $row['OS']; ?></td>
                                      <td> <?PHP echo $row['nomVM']; ?></td>
                                      <td> <?PHP echo $row['adresseIP']; ?></td>


                                </tr>
<?php }?>
                            </table>
</form>



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


    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>

    <!-- Modernizr JS -->
    <script src="../views/js/modernizr-2.6.2.min.js"></script>
    <!-- jQuery -->
    <script src="../views/js/jquery.min.js"></script>
    <!-- jQuery Easing -->
    <script src="../views/js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="../views/js/bootstrap.min.js"></script>
    <!-- Waypoints -->
    <script src="../views/js/jquery.waypoints.min.js"></script>
    <!-- Carousel -->
    <script src="../views/js/owl.carousel.min.js"></script>
    <!-- countTo -->
    <script src="../views/js/jquery.countTo.js"></script>
    <!-- Flexslider -->
    <script src="../views/js/jquery.flexslider-min.js"></script>
    <!-- Main -->

    <script src="../views/js/main.js"></script>

      <script type="text/javascript" src="app.js" ></script>
</body>

</html>
