<?php

require_once "config.php";


if(isset($_POST["submit"])) {
    $first_name = data_validator($_POST['firstname']);
    $last_name = data_validator($_POST['lastname']);
    $email = data_validator($_POST['email']);
    $password = data_validator($_POST['password']);
    $gender = data_validator($_POST['gender']);

    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
    $password = $pass_hash;

$query = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) 
            VALUES ('$first_name', '$last_name', '$email', '$password', '$gender')";

//EXECUTION DE LA REQUETE
try{

$result = $pdo->prepare($query);
$result->execute();
header('Location: index.php');

}catch(Exception $e){
    echo "Erreur! " .$e->getMessage();
}

}

?>

<?php

include "base/template_top.php"

?>

<div class="global-container">

<h2>Inscrire un nouvel utilisateur</h2>

<form action="" method="POST">
<input type="text" name="firstname" placeholder="Prénom" required pattern="[A-Za-z '-]+$" minlength="2" maxlength="63">
<input type="text" name="lastname" placeholder="Nom" required pattern="[A-Za-z '-]+$" maxlength="63">
<input type="email" name="email" placeholder="email" required maxlength="180">
<input type="password" name="password" placeholder="Mot de passe" required minlength="6" maxlength="100">
<div class="radio_container">
<label for="gender">Sexe : </label>
<input type="radio" name="gender" value="Homme">
<label for="Homme">Homme</label>
<input type="radio" name="gender" value="Femme">
<label for="Femme">Femme</label>
</div>
<div class="submit_container">
<input class="submit-btn create-valid-btn action-btn" type="submit" name="submit" value="Valider">
</div>


</form>

</div>

<?php

include "base/template_bottom.php"

?>