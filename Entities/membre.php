<?PHP

require_once "../config.php";

class Membre{
	
	private $cin;
	private $nom;
	private $prenom;
	private $date_naissance;
	private $sexe;
	private $email;
	private $mdp;
	private $num_tel;

	function __construct($cin,$nom,$prenom,$date_naissance,$sexe,$email,$mdp,$num_tel){
		$this->cin=$cin;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->date_naissance=$date_naissance;
		$this->sexe=$sexe;
		$this->email=$email;
		$this->mdp=$mdp;
		$this->num_tel=$num_tel;
	}
	
/*__________________________________LES GET__________________________________*/

	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getDateNaiss(){
		return $this->date_naissance;
	}
	function getSexe(){
		return $this->sexe;
	}
	function getEmail(){
		return $this->email;
	}
	function getMdp(){
		return $this->mdp;
	}
	function getNumTel(){
		return $this->num_tel;
	}

/*__________________________________LES SET__________________________________*/

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom;
	}
	function setDateNaiss($date_naissance){
		$this->date_naissance=$date_naissance;
	}
	function setEmail($email){
		$this->email=$email;
	}
	function setMdp($mdp){
		$this->mdp=$mdp;
	}
	function setNumTel($num_tel){
		$this->num_tel=$num_tel;
	}

   	
}

?>