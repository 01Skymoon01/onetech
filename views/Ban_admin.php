<?PHP
include "../Core/AdminsC.php";
$adminC=new AdminsC();
echo "hello";
if (isset($_POST["id"])){
    $adminC->Bannir_admin($_POST["id"]);
    header('Location: Afficher_admins.php');
}
?>