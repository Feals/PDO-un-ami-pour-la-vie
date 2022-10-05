<?php
//Prepare Data to Display

require_once '_connect.php';
$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Friends</title>
</head>
<body>
        <main>
        <h1>Friends</h1>
        <ul>
            <?php foreach($friends as $friend) : ?>
                <li>
                    <h2><?= $friend["id"] ?></h2>
                    <p><?= $friend["firstname"] ?></p>
                    <p><?= $friend["lastname"] ?></p>
                </li>
            <?php endforeach ?>
        </ul>

        <?php if(!empty($_POST)){
    $firstName = $_POST["firstname"] ? $_POST["firstname"] : "";
    $lastName = $_POST["lastname"] ? $_POST["lastname"] : "";
    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':firstname', $firstName, PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastName, PDO::PARAM_STR);
    $statement->execute();
    }
?>




<form action="" method="post">
            <div>
                <label for="firstname">Prénom</label>
                <input 
                    type="text" 
                    id="firstname" 
                    name="firstname" 
                    minLength="1" 
                    maxlength="255" 
                    required
                >
            </div>
            <div>
                <label for="lastname">Nom</label>
                <input 
                type="text" 
                id="lastname" 
                name="lastname"  
                minLength="1"
                maxlength="255" 
                required></input>
            </div>
       
            <button type="submit">Ajouter un Friends</button>
</form>
    </main>
    <?php

if (isset($_POST['firstname']) && $_POST['lastname'])
{
header("Location: /");} 

/* Redirection du navigateur */

/* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
;
?>
</body>
</html>


