<?PHP
class Livraison{
	private $id;
	private $destination;
	private $client;
	private $livreur;
	private $localisation;
	function __construct($id,$destination,$client,$livreur,$localisation){
		$this->id=$id;
		$this->destination=$destination;
		$this->client=$client;
		$this->livreur=$livreur;
		$this->localisation=$localisation;
	}
	
	function getId(){
		return $this->id;
	}
	function getClient(){
		return $this->client;
	}
	function getDestination(){
		return $this->destination;
	}
	function getLivreur(){
		return $this->livreur;
	}
	function getLocalisation(){
		return $this->localisation;
	}
	function setId($id){
		$this->id=$id;
	}
	function setDestination($destination){
		$this->destination;
	}
	function setClient($client){
		$this->client=$client;
	}
	function setLivreur($livreur){
		$this->livreur=$livreur;
	}
    function setLocalisation($localisation){
		$this->localisation=$localisation;
	}
	
}

?>