<?php
include "../Entities/Lab.php";
include "../Core/labC.php";



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
    //Partie3
    $LabC=new LabC();
    $LabC->ajouterLab($lab);
    ?>


    <?php
    header('Location: affichageLab.php');


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

?>
