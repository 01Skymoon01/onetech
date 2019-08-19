<?PHP
require_once "../config.php";
class AdminsC {
    function afficherAdmin ($Admin){
        echo "ID: ".$Admin->getId()."<br>";
        echo "Login: ".$Admin->getLogin()."<br>";
        echo "Mdp: ".$Admin->getMdp()."<br>";
        echo "Email: ".$Admin->getEmail()."<br>";
    }

    function ajouterAdmin($Admin){
        $sql="insert into admins (login,mdp,email) values (:login,:mdp,:email)";
        $db = config::getConnexion();
        try{
            $req=$db->prepare($sql);

            //$Id=$Admin->getId();
            $Login=$Admin->getLogin();
            $Mdp=$Admin->getMdp();
            $email=$Admin->getMail();
            //$req->bindValue(':id',$Id);
            $req->bindValue(':login',$Login);
            $req->bindValue(':mdp',$Mdp);
            $req->bindValue(':email',$email);


            $req->execute();
            echo"Admin Ajouté";

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }
    function afficherAdmins(){
        $sql="SElECT * From admins";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerAdmin($id){
        $sql="DELETE FROM admins where id= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function Bannir_admin($id){
        $sql="update admins 
                set banstat =
                case banstat 
                when 'actif' then 'banni'
                when 'banni' then 'actif'
                end 
                where id= :id";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function rechercherAdmin($login){
        $sql="SELECT * FROM admins WHERE login LIKE '%$login%' OR email LIKE '%$login%' OR id LIKE '%$login%'";
        $db = config::getConnexion();
        try{
            return $db->query($sql);

            // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }

    function modifier_Admin($Admin, $id){
        $sql="UPDATE admins SET id=:id,login=:login,mdp=:mdp,email=:email WHERE id=:id";

        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
            $req=$db->prepare($sql);
            //$id=$Admin->getId();
            $login=$Admin->getLogin();
            $mdp=$Admin->getMdp();
            $email=$Admin->getMail();

            $datas = array(':id'=>$id, ':login'=>$login, ':mdp'=>$mdp,':email'=>$email);
            $req->bindValue(':id',$id);
            $req->bindValue(':login',$login);
            $req->bindValue(':mdp',$mdp);
            $req->bindValue(':email',$email);


            $s=$req->execute();

            // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }

    }
    function recupererAdmin($id){
        $sql="SELECT * from admins where id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function getsuperadmin()
    {

        $sql = "SElECT login From admins";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            $sudo=$liste->fetch();
            return $sudo;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }


    }

    function jjg_calculate_next_month($start_date = FALSE)
    {
        if ($start_date) {
            $now = $start_date; // Use supplied start date.
        } else {
            $now = time(); // Use current time.
        }
        //var_dump($now);

    // Get the current month (as integer).
        $current_month = date('n', $now);

    // If the we're in Dec (12), set current month to Jan (1), add 1 to year.
        if ($current_month == 12) {
            $next_month = 1;
            $plus_one_month = mktime(0, 0, 0, 1, date('d', $now), date('Y', $now) + 1);
        } // Otherwise, add a month to the next month and calculate the date.
        else {
            $next_month = $current_month + 1;
            $plus_one_month = mktime(0, 0, 0, date('m', $now) + 1, date('d', $now), date('Y', $now));
        }

        $i = 1;
    // Go back a day at a time until we get the last day next month.
        while (date('n', $plus_one_month) != $next_month) {
            $plus_one_month = mktime(0, 0, 0, date('m', $now) + 1, date('d', $now) - $i, date('Y', $now));
            $i++;
        }

        return $plus_one_month;

    }

}

?>