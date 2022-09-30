<?php

//Connexion à la base de données

try{
    $user = ""; // utilisateur bdd
    $pass = "";  // mp bdd
    $pdo = new PDO( 'mysql:host=;dbname=', $user, $pass); //mysql:host="hôte" / dbname = nom de ma bdd
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;

}catch(PDOException $e){
    print "Erreur !: " . $e->getMessage();
    die();
}


//Fonction de sécurisation des données
function data_validator($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    return $donnees;
}

