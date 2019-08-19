<?PHP
class commande{

	private $nbProduit;
	private $totalPrix;
	private $IDClient;
	function __construct($nbProduit,$totalPrix,$IDClient){
		$this->nbProduit=$nbProduit;
		$this->totalPrix=$totalPrix;
		$this->IDClient=$IDClient;
	}

	function get_nbProduit(){
		return $this->nbProduit;
	}
	function get_totalPrix(){
		return $this->totalPrix;
	}
	function get_IDClient(){
		return $this->IDClient;
	}

	function set_nbProduit($nbProduit){
		$this->nbProduit=$nbProduit;
	}
	function set_totalPrix($totalPrix){
		$this->totalPrix=$totalPrix;
	}
	function set_IDClient($IDClient){
		$this->IDClient=$IDClient;
	}

}
class commandeDetails {

	private $IdCommande ;
	private $NomProduit= array();
	private $IdProduit= array();
	private $PrixProduits= array();
  private $QTEProduits= array();

	function __construct($IdCommande,$NomProduit,$IdProduit,$PrixProduits,$QTEProduits){
		$this->IdCommande=$IdCommande;
		$this->NomProduit=$NomProduit;
		$this->IdProduit=$IdProduit;
		$this->PrixProduits=$PrixProduits;
		$this->QTEProduits=$QTEProduits;
	}

	function get_IdCommande(){
		return $this->IdCommande;
	}
	function get_NomProduit(){
		return $this->NomProduit;
	}
	function get_IdProduit(){
		return $this->IdProduit;
	}
	function get_PrixProduits(){
		return $this->PrixProduits;
	}
	function get_QTEProduits(){
		return $this->QTEProduits;
	}

	function set_IdCommande($IdCommande){
		$this->IdCommande=$IdCommande;
	}
	function set_NomProduit($NomProduit){
		$this->NomProduit=$NomProduit;
	}
	function set_IdProduit($IdProduit){
		$this->IdProduit=$IdProduit;
	}
	function set_PrixProduits($PrixProduits){
		$this->PrixProduits=$PrixProduits;
	}
	function set_QTEProduits($QTEProduits){
		$this->QTEProduits=$QTEProduits;
	}

}

?>
