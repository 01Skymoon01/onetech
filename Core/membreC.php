<?PHP



require_once "../config.php";



class MembreC
{

	function listeclient(){
		$sql="SElECT * From membres";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


function rechercheClient($haja)
	{


		$sql= "SELECT * FROM membres WHERE cin= '$haja' or nom like '%$haja%' or email like '%$haja%' " ;
$db = config::getConnexion();
try{
$liste=$db->query($sql);
return $liste;

}
	 catch (Exception $e){
			 die('Erreur: '.$e->getMessage());
	 }
	}



	public function afficherMembre() {

		$sql="SElECT * FROM membres";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	public function selectMdp($cin) {

		$c = config::getConnexion();
    	$sql = "SELECT mdp FROM membres WHERE cin='$cin'";			
		return $c->query($sql);
		
        
	}


	
	public function ajouterMembre($Membre) {

      		$db = config::getConnexion();
   			$sql="INSERT INTO membres (cin,nom, prenom, date_naissance, sexe, email,mdp, num_tel)
							     VALUES (:cin, :nom, :prenom, :date_naissance, :sexe, :email, :mdp, :num_tel)";


			try{
        	$req=$db->prepare($sql);
        	$cin=$Membre->getCin();
        	$nom=$Membre->getNom();
			$prenom=$Membre->getPrenom();
			$date_naissance=$Membre->getDateNaiss();
			$sexe=$Membre->getSexe();
			$email=$Membre->getEmail();
			$mdp=$Membre->getMdp();
			$num_tel=$Membre->getNumTel();
			//($Membre);

			$req->bindValue(':cin',$cin);
	   		$req->bindValue(':nom',$nom);
			$req->bindValue(':prenom',$prenom);
			$req->bindValue(':date_naissance',$date_naissance);
			$req->bindValue(':sexe',$sexe);
			$req->bindValue(':email',$email);
			$req->bindValue(':mdp',$mdp);
			$req->bindValue(':num_tel',$num_tel);

			$req->execute();

	        }
	        catch (Exception $e){
	            echo 'Erreur: '.$e->getMessage();
	        }

    }


   	public function ModifierMdp($mdp,$cin) {


		$sql = 'UPDATE membres SET  mdp=:mdp WHERE cin="'.$_SESSION['cin'].'" ';

		$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':mdp',$mdp);



		//$req->bindValue(':date_naissance',$date_naissance);

		//$req->bindValue(':num_tel',$num_tel);

		try{
					$req->execute();
				 // header('Location: index.php');
			}
			catch (Exception $e){
					die('Erreur: '.$e->getMessage());
			}


   	}


   	public function ModifierNum($num_tel,$cin) {


		$sql = 'UPDATE membres SET  num_tel=:num_tel WHERE cin="'.$_SESSION['cin'].'" ';

		$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':num_tel',$num_tel);



		//$req->bindValue(':date_naissance',$date_naissance);

		//$req->bindValue(':num_tel',$num_tel);

		try{
					$req->execute();
				 // header('Location: index.php');
			}
			catch (Exception $e){
					die('Erreur: '.$e->getMessage());
			}


   	}

   	public function supprimerUser($cin) {
			$c = config::getConnexion();
   			$stmt = $c->prepare("DELETE FROM membres WHERE cin=:cin");
   			$stmt->bindValue(':cin', $cin);
   			$stmt->execute();
	}




		public function connexion($email,$mdp)
		{
		$c = config::getConnexion();
		$sql = "SELECT * FROM membres WHERE email='$email' AND mdp='$mdp'";
		return $c->query($sql);
		}

   /*
    public function modifierMembre($Membre,$cin)
   		{
			$c = config::getConnexion();
	   		$stmt = $c->prepare("UPDATE membres SET cin=:cin, nom=:nom, prenom=:prenom, email=:email,
			                     sexe=:sexe, mdp=:mdp, date_naissance=:date_naissance, num_tel=:num_tel
								 WHERE cin='$cin'");

			$stmt->bindValue(':cin', $Membre->getCin());
			$stmt->bindValue(':nom', $Membre->getNom());
			$stmt->bindValue(':prenom', $Membre->getPrenom());
			$stmt->bindValue(':email', $Membre->getEmail());
			$stmt->bindValue(':num_tel', $Membre->getNumTel());
			$stmt->bindValue(':sexe', $Membre->getSexe());
			$stmt->bindValue(':mdp', $Membre->getMdp());
			$stmt->bindValue(':date_naissance', $Membre->getDateNaiss());
			$stmt->execute();
   		}
	*/





	function supprimerMembre($cin){
		$sql="DELETE FROM membres where cin= :cin";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':cin',$cin);
		try{
            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>
