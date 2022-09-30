<?php 

require_once "config.php";

    if (isset($_POST['update'])) {

        $firstname = data_validator($_POST['firstname']);
        $user_id = data_validator($_POST['user_id']);
        $lastname = data_validator($_POST['lastname']);
        $email = data_validator($_POST['email']);
        $gender = data_validator($_POST['gender']);

        $query = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`gender`='$gender' WHERE `id`='$user_id'"; 
        try{

            $result = $pdo->prepare($query);
            $result->execute();
            header('Location: index.php');
        
            }catch(Exception $e){
                echo "Erreur! " .$e->getMessage();
            }
    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $query = "SELECT * FROM `users` WHERE `id`='$user_id'";

    try{

        $result = $pdo->prepare($query);
        $result->execute();
    
        }catch(Exception $e){
            echo "Erreur! " .$e->getMessage();
        }

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $first_name = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $gender = $row['gender'];
            $id = $row['id'];
        } 

    ?>


<?php

include "base/template_top.php"

?>
    <div class="global-container">

        <h1>Modifier un utilisateur</h1>

        <form action="" method="post">
            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" pattern="[A-Za-z '-]+$" minlength="2" maxlength="63" value="<?php echo $first_name; ?>">
            <input type="hidden" name="user_id" value="<?php echo $id; ?>">
            <label for="lastname">Nom</label>
            <input type="text" name="lastname" pattern="[A-Za-z '-]+$" maxlength="63" value="<?php echo $lastname; ?>">
            <label for="email">Email</label>
            <input type="email" name="email" maxlength="180" value="<?php echo $email; ?>">
            <div class="radio_container">
            <label for="gender">Genre</label>
            <input type="radio" name="gender" value="Homme" <?php if($gender == 'Homme'){ echo "checked";} ?> >
            <label for="Homme">Homme</label>
            <input type="radio" name="gender" value="Femme" <?php if($gender == 'Femme'){ echo "checked";} ?>>
            <label for="Femme">Femme</label>
            </div>
            <div class="submit_container">
            <input class="submit-btn edit-valid-btn action-btn" type="submit" value="Editer" name="update">
            </div>


        </form> 

    </div>
        <?php

        include "base/template_bottom.php"

        ?>

<?php

}

?> 