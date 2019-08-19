<?PHP
class Admins
{
//    private $id;
    private $login;
    private $mdp;
    private $mail;

    /**
     * Admins constructor.
     * @param $id
     * @param $login
     * @param $mdp
     * @param $mail
     */
    public function __construct(/*$id,*/ $login, $mdp, $mail)
    {
        //$this->id = $id;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->mail = $mail;
    }


    /**
     * @return mixed
     */
  /*  public function getId()
    {
        return $this->id;
    }*/

    /**
     * @param mixed $id
     */
    /*public function setId($id)
    {
        $this->id = $id;
    }*/

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }


}

?>