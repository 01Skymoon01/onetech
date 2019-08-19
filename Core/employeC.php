<?PHP
include_once "../config.php";
class LivreurC {
function afficherLivreur ($livreur){
		echo "Cin: ".$livreur->getCin()."<br>";
		echo "Nom: ".$livreur->getNom()."<br>";
		echo "Prénom: ".$livreur->getPrenom()."<br>";
		echo "telephonne: ".$livreur->getTelephonne()."<br>";
		echo "email: ".$livreur->getEmail()."<br>";
        echo "zone: ".$livreur->getZone()."<br>";
	}

	function ajouterLivreur($livreur){
		$sql="insert into livreur (cin,nom,prenom,telephonne,email,zone) values (:cin, :nom,:prenom,:telephonne,:email,:zone)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

        $cin=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $telephonne=$livreur->getTelephonne();
        $email=$livreur->getEmail();
        $zone=$livreur->getZone();
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':telephonne',$telephonne);
		$req->bindValue(':email',$email);
        $req->bindValue(':zone',$zone);

            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function afficherLivreurs(){
		$sql="SElECT * From livreur order by zone";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function supprimerLivreur($cin){
		$sql="DELETE FROM livreur where cin= :cin";
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
	function modifierLivreur($livreur,$cin){
		$sql="UPDATE livreur SET cin=:cinn, nom=:nom,prenom=:prenom,telephonne=:telephonne,email=:email,zone=:zone WHERE cin=:cin";

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
		$cinn=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $telephonne=$livreur->getTelephonne();
        $email=$livreur->getEmail();
        $zone=$livreur->getZone();
		$datas = array(':cinn'=>$cinn, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':telephonne'=>$telephonne,':email'=>$email,':zone'=>$zone);
		$req->bindValue(':cinn',$cinn);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':telephonne',$telephonne);
		$req->bindValue(':email',$email);
        $req->bindValue(':zone',$zone);


            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }

	}
	function chercherLivreur($cin){
		$sql="SELECT * from livreur where cin=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function afficher1LivreurDispo(){
		$sql="SElECT cin From livreur where status=1 limit 1";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
				catch (Exception $e){
						die('Erreur: '.$e->getMessage());
				}
	}

}

?>
