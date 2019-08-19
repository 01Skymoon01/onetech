<?php
/**
 *
 */
 include_once "../config.php";
 include_once "../Entities/location.php";
class locationC
{


  		function ajouterlocationProc($location,$idl){




  			$sql="INSERT INTO loc (nom, prix, qte,datedeb,datefin,id_client,idLocc) VALUES (:NomProduit,:PrixProduits,:QTEProduits,:dateDebut,:dateFin,:IDClient,:idl)";

  			$db = config::getConnexion();
  			try{
  	        $req=$db->prepare($sql);


  					$IDClient=$location->get_IDClient();


  					$PrixProduits=$location->get_PrixProduits();


  					$QTEProduits=$location->get_QTEProduits();

  			  	$dateDebut=$location->get_dateDebut();


  					$dateFin=$location->get_dateFin();


$NomProduit=$location->get_NomProduit();


	$req->bindValue(':IDClient',$IDClient);
  			$req->bindValue(':NomProduit',$NomProduit);

  			$req->bindValue(':PrixProduits',$PrixProduits);
  	    	$req->bindValue(':QTEProduits',$QTEProduits);
  			$req->bindValue(':dateDebut',$dateDebut);
  				$req->bindValue(':dateFin',$dateFin);
          $req->bindValue(':idl',$idl);
  				$req->execute();

  	        }
  	        catch (Exception $e){
  	            echo 'Erreur: '.$e->getMessage();
  	        }



  		}
      function Affciher($cin){

        $sql="SELECT * FROM `loc`WHERE 	idLocc=:cin ";
    		$db = config::getConnexion();
    		try{
    		$liste=$db->query($sql);
    		return $liste;
    		}
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }


  		}

      function Afficher(){

        $sql="SELECT * FROM `loc` ";
    		$db = config::getConnexion();
    		try{
    		$liste=$db->query($sql);
    		return $liste;
    		}
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }


  		}

      function AfficherLocc(){

        $sql="SELECT * FROM `locc`ORDER BY id_Commande DESC ";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }


      }

      function SupprimerLocation($cin){



      	$sql="DELETE FROM locc WHERE 	id_commande=:cin";
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
      function ModifierEtatLocation($cin,$etat){
      $db = config::getConnexion();
      $etat =(int)$etat;
       if($etat == 0){
         $etat=1;



       $sql="update locc set 	etat_commande=:etat where id_commande=:cin";
       $req=$db->prepare($sql);
       $req->bindValue(':cin',$cin);
       $req->bindValue(':etat',$etat);
       try{
               $req->execute();
              // header('Location: index.php');
           }
           catch (Exception $e){
               die('Erreur: '.$e->getMessage());
           }
         }


     }
     
function NombreDuCommandeNonPayees(){


	$sql="SELECT COUNT(id_commande) nbr FROM locc WHERE etat_commande=0 ";


	$db = config::getConnexion();
	try{
	$liste=$db->query($sql);
	return $liste;

	}
			 catch (Exception $e){
					 die('Erreur: '.$e->getMessage());
			 }
}
     function RechercheLocation2($haja){

      $sql="SELECT * FROM locc WHERE  id_commande  LIKE '%$haja%' OR id_client=$haja ORDER BY id_Commande DESC";
     
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
     
            }
                 catch (Exception $e){
                     die('Erreur: '.$e->getMessage());
                 }
          }

     function RechercheLocation($haja){

     	$sql="SELECT * FROM loc WHERE idLocc=$haja ";


     	$db = config::getConnexion();
     	try{
     	$liste=$db->query($sql);
     	return $liste;

     	}
     			 catch (Exception $e){
     					 die('Erreur: '.$e->getMessage());
     			 }
     }

      			 // header('Location: index.php');
         function ajouterCommandeLocation($commande){
               $nbProduit=0;
               $prix=0;
               $idClient=0;

           		$sql="insert into Locc (id_client,totalPrix_commande,nbProduit_commande) values (:idClient,:prix,:nbProduit)";

           		$db = config::getConnexion();
           		try{
                   $req=$db->prepare($sql);


                   $nbProduit=$commande->get_nbProduit();
                   $prix=$commande->get_totalPrix();
                   $idClient=$commande->get_IDClient();

           		$req->bindValue(':idClient',$idClient);
           		$req->bindValue(':prix',$prix);
           		$req->bindValue(':nbProduit',$nbProduit);

                       $req->execute();

                   }
                   catch (Exception $e){
                       echo 'Erreur: '.$e->getMessage();
                   }

           	}


function afficherCommandeLEnCours($commande){

  $idClient=0;
  $idClient=$commande->get_IDClient();
  $datas=0;
  $sql="SELECT * FROM locc WHERE date_commande IN (SELECT max(date_commande) FROM locc  WHERE id_client=$idClient)  ";
  $db = config::getConnexion();
  try{
  $liste=$db->query($sql);


  foreach($liste as $row){
$datas=$row['id_commande'];

    //$liste=array($row['id_commande'],$row['date_commande'],$row['totalPrix_commande'],$row['nbProduit_commande'],$row['id_client']);
}
   return $datas;

 }


       catch (Exception $e){
           die('Erreur: '.$e->getMessage());
       }


}
}
 ?>
