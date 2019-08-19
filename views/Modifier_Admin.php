<HTML>
<head>
    <title></title>
</head>
<body>
<?PHP
include "../Entities/Admins.php";
include "../Core/AdminsC.php";
$adminC=new AdminsC();
if (isset($_GET['id'])){
    $result=$adminC->recupererAdmin($_GET['id']);
    foreach($result as $row){
        $id=$row['id'];
        $login=$row['login'];
        $mdp=$row['mdp'];
        $email=$row['email'];
        ?>
        <form method="POST">
            <table>
                <caption>Modifier Admin</caption>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="nom" value="<?PHP echo $id ?>"></td>
                </tr>
                <tr>
                    <td>Login</td>
                    <td><input type="text" name="num" value="<?PHP echo $login ?>"></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="text" name="prix" value="<?PHP echo $mdp ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="qte" value="<?PHP echo $email ?>"></td>
                </tr>
                <td></td>
                    <td><input type="submit" name="modifier" value="modifier"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="id_admin" value="<?PHP echo $_GET['idadmin'];?>"></td>
                </tr>
            </table>
        </form>
        <?PHP
    }
}
if (isset($_POST['sauvegarder'])){
    $admin=new Admins(/*$_POST['idadmin'],*/$_POST['logadmin'],$_POST['mdpadmin'],$_POST['mail']);
    $adminC->modifier_Admin($admin,$_POST['idadmin']);
    echo $_POST['idadmin'];
    header('Location: Afficher_admins.php');
}
?>
</body>
</HTMl>