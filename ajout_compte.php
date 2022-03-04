<!-- cette page permet de crée de nouveaux comptes -->
<?php
require('cobdd.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username");
    $pwd = filter_input(INPUT_POST, "pwd");
    $maRequete = $pdo->prepare("INSERT INTO log (username,pwd) VALUES(:username,:pwd)");
    $maRequete->execute(array(
        'username' => $username,
        'pwd' => $pwd
    ));
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>sakila</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<h1>BIENVENU SUR SAKILLA</h1>

<h2>Pour naviger dans la base de donnée sakila,<br> créer un compte :</h2>
<form method="post">
    <label for="">Identifiant :</label><br>
    <input type="text" name="username"><br><br>
    <label for="">Mot de passe :</label><br>
    <input type="password" name="pwd"><br><br>
    <button type="submit">Valider</button>
</form>
<a href="index.php">Vous aver déjà un compte ?</a>
 
</body>
