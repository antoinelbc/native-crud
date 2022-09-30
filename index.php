<?php

require_once "config.php";

$query = "SELECT * FROM users ";

try{
    $result = $pdo->prepare($query);
    $result->execute();
}catch(Exception $e){
    echo "Erreur! " .$e->getMessage();
}

?>

<?php

include "base/template_top.php"

?>

    <div class="global-container">
        <h1>Liste des utilisateurs</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>Action</th>
                </tr>
               </thead>
                <tbody>
                    <?php
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
    
                            ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['firstname'];?></td>
                                <td><?php echo $row['lastname'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['gender'];?></td>
                                <td>
                                    <a class="action-btn btn-edit" href="update.php?id=<?php echo $row['id']; ?>">Modifier</a>
                                    <a class="action-btn btn-delete" href="delete.php?id=<?php echo $row['id']; ?>">Supprimer</a>
                                </td>
                            </tr>

                            <?php
                           
                            }
                        
                        ?>

                </tbody>
        </table>
    
    <a class = "action-btn btn-create " href="create.php">Créer un nouvel utilisateur</a>
    </div>
<?php

include "base/template_bottom.php"

?>
