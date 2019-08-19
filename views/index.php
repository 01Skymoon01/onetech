<?php
require_once "../config.php";
// Initialize the session
session_name("usr");
session_start();

//Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: REVENUE.php");
    exit;
}

// Include config file
//require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM admins WHERE login = :username";

        if($stmt = config::getConnexion()->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["login"];
                        $hashed_password = $row["mdp"];
                        $role = $row["role"];
                        $statut = $row["banstat"];
                        //var_dump($role);
                        //echo $username;
                        //echo $hashed_password;
                        //echo $password;
                        //$hashed_password = substr( $hashed_password, 0, 60 );
                        //if(password_verify($password, $hashed_password))
                        if ($password==$hashed_password){
                            // Password is correct, so start a new session
                            if ($statut=="actif") {
                                echo "sucess";
                                session_start();

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                $_SESSION["role"] = $role;
                                if ($role == "admin") {
                                    // Redirect user to welcome page
                                    header("location: Afficher_admins.php");
                                } else if ($role == "staff") {
                                    header("location: REVENUE.php");
                                }
                            }
                            else if ($statut=="banni")
                            {
                                $username_err = "Compte Banni.";
                                $_SESSION["loggedin"] = false;
                            }
                                                        }
                        }
                    else{
                            // Display an error message if password is not valid
                            echo "failure";
                            $password_err = "The password you entered was not valid.";
                            $_SESSION["loggedin"] = false;
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                    $_SESSION["loggedin"] = false;
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
                $_SESSION["loggedin"] = false;
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 500px;height: 400px; padding: 20px; left: 60%;top: 55%;
            margin-left: -25%;
            position: absolute;
            margin-top: -20%;
            border-width: 10px; border-style: double; border-color: #2b2a2a; }
    </style>
</head>
<body >

<div class="wrapper" >
    <h1><strong>OneTech.</strong><br>Dashboard Admin.</h1>
    <p>Veuillez saisir vos identifiants pour vous connecter.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" value="Login" ><i class="fa fa-check"></i> </button>
        </div>
    </form>
</div>
</body>
<script src="js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="js/bootstrap.min.js"></script>
</html>
