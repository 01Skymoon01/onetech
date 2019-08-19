<?PHP
class Livreur{
	private $cin;
	private $nom;
	private $prenom;
	private $telephonne;
	private $email;
    private $zone;
	function __construct($cin,$nom,$prenom,$telephonne,$email,$zone){
		$this->cin=$cin;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->telephonne=$telephonne;
		$this->email=$email;
        $this->zone=$zone;
	}
	
	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getTelephonne(){
		return $this->telephonne;
	}
	function getEmail(){
		return $this->email;
	}
    function getZone(){
		return $this->zone;
	}

    function setCin($cin){
		$this->cin=$cin;
	}
	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setTelephonne($telephonne){
		$this->telephonne=$telephonne;
	}
	function setEmail($email){
		$this->email=$email;
	}
    function setZone($zone){
		$this->zone=$zone;
	}
	
}

?>