<?php
class Locc{

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
class location {
	private $IDClient;
	//private $IdLocation ;
	private $NomProduit;
	//private $IdProduit= array();
	private $PrixProduits;
    private $QTEProduits;
	private $dateDebut;
	private $dateFin;
	function __construct($IDClient,$NomProduit,$PrixProduits,$QTEProduits,$dateDebut,$dateFin){
		//$this->IdLocation=$IdLocation;
		$this->NomProduit=$NomProduit;
		//$this->IdProduit=$IdProduit;
		$this->PrixProduits=$PrixProduits;
		$this->QTEProduits=$QTEProduits;
		$this->dateDebut=$dateDebut;
		$this->dateFin=$dateFin;
    $this->IDClient=$IDClient;
	}

  function get_IDClient(){
		return $this->IDClient;
	}
	function get_NomProduit(){
		return $this->NomProduit;
	}
	/*function get_IdProduit(){
		return $this->IdProduit;
	}*/
	function get_PrixProduits(){
		return $this->PrixProduits;
	}
	function get_QTEProduits(){
		return $this->QTEProduits;
	}
	function get_dateDebut(){
		return $this->dateDebut;
	}
	function get_dateFin(){
		return $this->dateFin;
	}


	function set_dateFin($dateFin){
		$this->dateFin=$dateFin;
	}
	function set_dateDebut($dateDebut){
		$this->dateDebut=$dateDebut;
	}
	function set_IdLocation($IdLocation){
		$this->IdLocation=$IdLocation;
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
