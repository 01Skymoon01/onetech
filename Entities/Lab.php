<?PHP
class Lab{

	private $nom;
	private $prenom;
	private $RAM;
  private $CPU;
  private $Stokage;
  private $DateDebut;
  private $DateFin;
  private $Depart;
  private $descLab;
  private $os;
	private $nomVM;
	private $adresseIP;

  function __construct($nom,$prenom,$RAM,$CPU,$Stokage,$DateDebut,$DateFin,$Depart,$descLab,$os,$nomVM,$adresseIP){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->RAM=$RAM;
    $this->CPU=$CPU;
    $this->Stokage=$Stokage;
    $this->DateDebut=$DateDebut;
    $this->DateFin=$DateFin;
    $this->Depart=$Depart;
    $this->descLab=$descLab;
    $this->os=$os;
		$this->nomVM=$nomVM;
		$this->adresseIP=$adresseIP;
	}

	function get_nom(){
		return $this->nom;
	}
	function get_prenom(){
		return $this->prenom;
	}
	function get_RAM(){
		return $this->RAM;
	}
  function get_CPU(){
    return $this->CPU;
  }

  function get_Stokage(){
    return $this->Stokage;
  }
  function get_DateDebut(){
    return $this->DateDebut;
  }
  function get_DateFin(){
    return $this->DateFin;
  }
  function get_descLab(){
    return $this->descLab;
  }

  function get_Depart(){
    return $this->Depart;
  }

  function get_os(){
    return $this->os;
  }
	function get_nomVM(){
		return $this->nomVM;
	}
	function get_adresseIP(){
		return $this->adresseIP;
	}


	function set_nom($nom){
		$this->nom=$nom;
	}
	function set_prenom($prenom){
		$this->prenom=$prenom;
	}
	function set_RAM($RAM){
		$this->RAM=$RAM;
	}
  function set_CPU($CPU){
    $this->CPU=$CPU;
  }

  function set_Stokage($Stokage){
    $this->Stokage=$Stokage;
  }

  function set_DateDebut($DateDebut){
    $this->DateDebut=$DateDebut;
  }
  function set_DateFin($DateFin){
    $this->DateFin=$DateFin;
  }
  function set_Depart($Depart){
    $this->Depart=$Depart;
  }
  function set_descLab($descLab){
    $this->descLab=$descLab;
  }
  function set_os($os){
    $this->os=$os;
  }

	function set_nomVM($nomVM){
		$this->nomVM=$nomVM;
	}

}

?>
