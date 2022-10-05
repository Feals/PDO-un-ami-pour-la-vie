<?php 
require_once '_connect.php';
$pdo = new \PDO(DSN, USER, PASS);


//GET inputs

//Prepare queries and execute
if($_POST){
    $firstName = $_POST["firstname"] ? $_POST["firstname"] : "";
    $lastName = $_POST["lastname"] ? $_POST["lastname"] : "";
    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':firstname', $firstName, PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastName, PDO::PARAM_STR);
    $statement->execute();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friends</title>
</head>
<body>
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