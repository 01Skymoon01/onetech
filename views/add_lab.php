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


    }
    ?>


    <?php
    //header('Location: affichageLab.php');


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
