

<?php
include_once "../config.php";
echo "bg";
if (isset($_GET['cin'])){
    echo $_GET['cin'];
$sql="update livreur set status = case when status=0 then 1 else 0 end where cin=:cinn";

		$db = config::getConnexion();
try{
        $req=$db->prepare($sql);

    $req->bindValue(':cinn',$_GET['cin']);
    $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
header ('location: employeBACK.php');

}
else {
    echo "erreur";
}

?>
