<?PHP
include "../Entities/Lab.php";
include "../Core/labC.php";
$LabC=new LabC();

if (isset($_GET["id"])){

//  var_dump($_GET["cin"]);

	$LabC->SupprimerLab($_GET["id"]);

}


header('Location:affichageLab.php');
?>
