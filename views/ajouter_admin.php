<?php
include "../Entities/Admins.php";
include "../Core/AdminsC.php";


if (isset(/*$_POST['idadmin'],*/$_POST['logadmin'],$_POST['mdpadmin'],$_POST['mail'])){
    $admin1=new Admins(
        /*$_POST['idadmin'],*/$_POST['logadmin'],$_POST['mdpadmin'],$_POST['mail']
    );

    //Partie2
    /*
    var_dump($produit1);
    }
    */
    //Partie3
    $Admin1C=new AdminsC();
    $Admin1C->ajouterAdmin($admin1);
    header('Location: Afficher_admins.php');

}else{
    //echo $_POST['idadmin'];
    echo $_POST['logadmin'];
    echo $_POST['mdpadmin'];
    echo $_POST['mail'];
    echo "vérifier les champs";
}
//*/

?>
