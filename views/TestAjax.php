<?php
include "../config.php";
    $db = config::getConnexion();
    $sql = "SELECT * FROM  produits";
    $req = $db->prepare($sql);
    $req->execute();
    $liste = $req->fetchAll();

    //Convert Array to JSON Obj
    $someJSON = json_encode($liste);
    echo $someJSON;
    //var_dump($someJSON);

    ?>


