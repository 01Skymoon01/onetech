<?PHP



require_once "../config.php";



class favorisC
{
/*
	function listeFavoris(){
		$sql="SElECT * From favoris";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/

  function listeFavoris($cin){
    $c = config::getConnexion();
      $sql = "SELECT * FROM favoris WHERE id_client='$cin'";
    return $c->query($sql);

  }



  	public function ajouterFavoris($Membre) {

        		$db = config::getConnexion();
     			$sql="INSERT INTO favoris (id_client, nom_prod,id_produit,price)
  							     VALUES ( :nom, :prenom, :date_naissance,:price)";


  			try{
          	$req=$db->prepare($sql);
          	$idClient=$Membre->get_idClient();
  			$nomProd=$Membre->get_nomProd();
  			$idProd=$Membre->get_idProd();
        $price=$Membre->get_price();

  			//($Membre);

  	   		$req->bindValue(':nom',$idClient);
  			$req->bindValue(':prenom',$nomProd);
  			$req->bindValue(':date_naissance',$idProd);
                $req->bindValue(':price',$price);


  			$req->execute();

  	        }
  	        catch (Exception $e){
  	            echo 'existe';
  	        }

      }

      public function supprimerFavoris($cin) {
        $c = config::getConnexion();
          $stmt = $c->prepare("DELETE FROM favoris WHERE id_produit=:cin");
          $stmt->bindValue(':cin', $cin);
          $stmt->execute();
    }

    function supprimerFavorisClient($cin){



  $sql="DELETE FROM favoris WHERE id_client=:cin";
  $db = config::getConnexion();
      $req=$db->prepare($sql);
  $req->bindValue(':cin',$cin);
  try{
          $req->execute();
         // header('Location: index.php');
      }
      catch (Exception $e){
          die('Erreur: '.$e->getMessage());
      }
}

    function supprimerCommClient($cin){



  $sql="DELETE FROM commentaires WHERE pseudo=:cin";
  $db = config::getConnexion();
      $req=$db->prepare($sql);
  $req->bindValue(':cin',$cin);
  try{
          $req->execute();
         // header('Location: index.php');
      }
      catch (Exception $e){
          die('Erreur: '.$e->getMessage());
      }
}

}

?>
