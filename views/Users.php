<?php

include "../Entities/membre.php";
include "../Core/membreC.php";



$membre = new MembreC();
$ListetooC= $membre->afficherMembre();

?>


<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Clients</title>
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


    <script >
        function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    client=tr[i].getElementsByTagName("td")[5];
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

</head>

<body>
<?php require 'header.php' ?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper" style="margin-left:2px">


        <!-- clieeeeeeeeeeeeeennnnnnnnnts-->
        <div class="product-status mg-b-30" style="margin-top:50px; margin-left:2px">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap" style="width: 105%;">
                          <div>
                            <h4>Liste des Clients</h4>
                          </div>


    <form action = "rechercheClient.php" method ="GET">
          <div style="display: flex;">
        <div class="input-group mb-3" >
          <input type="text" id="myInput" class="form-control" placeholder="Search..." onkeyup="myFunction()" style="color:white;" name="terme">
        </div>

        </div>
    </form>


    <form action="Users.php" method="GET">
    <div style="display: flex;">
    </div>
    </form>


                            <div class="add-product">

                            </div>
                            <table style="background-color:#6090; width: 90%;" id="myTable" >
                               <tr >

                                    <th>CIN</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Email</th>
                                    <th>Mdp</th>
                                    <th>Num tél</th>
                                    <th>Sexe</th>
                                    <th>Date_naissance</th>
                                    <th>Suppression</th>


                                </tr>


                                <tr>



                                <?php
                                     foreach ($ListetooC as $row)
                                    {
                                        $now= date("m-d");
                                        $bday=substr($row['date_naissance'], 5,5);
                                        if ($bday == $now) { echo '<tr style="background-color:#5d95cc;">'; }
                                        else {
                                        echo '<tr style="background-color:#365D84;">'; }
                                        echo '<td class="td2" >'.$row['cin'].'</td>';
                                        echo '<td class="td2">'.$row['nom'].'</td>';
                                        echo '<td class="td2">'.$row['prenom'].'</td>';
                                        echo '<td class="td2">'.$row['email'].'</td>';
                                        echo '<td class="td2">'.$row['mdp'].'</td>';
                                        echo '<td class="td2">'.$row['num_tel'].'</td>';
                                        echo '<td class="td2">'.$row['sexe'].'</td>';
                                        echo '<td class="td2">'.$row['date_naissance'].'</td>';
                                  
                                        echo '<td class="td2">'?> <button data-toggle="tooltip" title="Supprimer" class="btn waves-effect btn-sm" type="submit" nom="supprimer"
                                            style="background-color:#fe5f55;"  onclick="location.href='supprimerUsers.php?cin=<?php echo $row['cin']; ?>&prenom=<?php echo $row['prenom']; ?>'"> <i class="fa fa-trash-o"></i></button><?php '</td>';
                                        

                                        echo '</tr>';

                                           
                                    }
                                 ?>
                                            


                                </tr>
                            </table>



                            <div class="custom-pagination">
                                <ul class="pagination">
                                    <a class="page-link" href="index.php"><img src="img/retour.png" style="height: 30px; width: 30px; background: none; margin-left: 40%;"></a>
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


    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>
<script src="js/vendor/modernizr-2.8.3.min.js"></script>
</body>

</html>
