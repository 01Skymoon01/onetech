
<?PHP
include_once "../config.php";
class LabC {

	function ajouterLab($lab){


		$sql="INSERT INTO lab (nom, prenom, ram, cpu, stokage, datedebut, datefin, depart, descLab,OS,nomVM,adresseIP) VALUES
      (:nom,:prenom,:Ram,:cpu,:stokage,:datedebut,:datefin,:depart,:descLab,:os,:nomVM,:adresseIP)";

		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);


         $nom=$lab->get_nom();
         $prenom=$lab->get_prenom();
         $Ram=$lab->get_RAM();
         $cpu=$lab->get_CPU();
         $Stokage=$lab->get_Stokage();
         $datedebut=$lab->get_DateDebut();
         $datefin=$lab->get_DateFin();
         $depart= $lab->get_Depart();
         $descLab= $lab->get_descLab();
         $os= $lab->get_os();
         $nomVM= $lab->get_nomVM();
				 $adresseIP= $lab->get_adresseIP();

		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':Ram',$Ram);
		$req->bindValue(':cpu',$cpu);
    $req->bindValue(':stokage',$Stokage);
    $req->bindValue(':datedebut',$datedebut);
    $req->bindValue(':datefin',$datefin);
    $req->bindValue(':depart',$depart);
    $req->bindValue(':descLab',$descLab);
    $req->bindValue(':os',$os);
		$req->bindValue(':nomVM',$nomVM);
		$req->bindValue(':adresseIP',$adresseIP);
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}
  function afficherTouTLab(){

    $sql="SElECT * From lab ORDER BY datedebut DESC";
    $db = config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
  }

  function SupprimerLab($cin){



  	$sql="DELETE FROM lab WHERE id=:cin";
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

	function RechercheIP($adresseIP){




		$sql="SELECT * from lab where adresseIP='$adresseIP'";
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
