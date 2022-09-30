<?php

require_once "config.php";

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "DELETE FROM `users` WHERE `id` = '$user_id' ";

try{

$result = $pdo->prepare($query);
$result->execute();
header('Location: index.php');

}catch(Exception $e){
    echo "Erreur! " .$e->getMessage();
}

}



