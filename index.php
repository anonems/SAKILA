<!-- page principale permettant la connection a son compte -->
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
<?php
session_start();
require('cobdd.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username");
    $pwd = filter_input(INPUT_POST, "pwd");
    $maRequete = $pdo->prepare("SELECT * FROM log WHERE username = :username ");
    $maRequete->execute([
        ":username" => $username
    ]);
    $maRequete->setFetchMode(PDO::FETCH_ASSOC);
    $log = $maRequete->fetch();
    if ($log['username'] == $username && $log['pwd'] == $pwd){
            $_SESSION["connecte"] = true;
            $_SESSION["username"] = $username;
            http_response_code(302);
            header('Location: compte.php');
            exit();
    }elseif($log['username'] != $username or $log['pwd'] != $pwd){
        if($log['username'] != $username){
            echo "identifiant indisponnible, veuillez crée un compte <a href='ajout_compte.php'>ici</a> ";
        }elseif($log['pwd'] != $pwd){
            echo "mot de passe incorrecte, veuillez reinitialiser votre mot de passe <a href='mdpoublie.php'>ici</a> ";
        }
    }
}else{
?>
<body>
<h1>BIENVENU SUR SAKILLA</h1>
<h2>Pour naviger dans la base de donnée sakila,<br> connectez-vous :</h2>
<form method="post">
    <label for="">Identifiant :</label><br>
    <input type="text" name="username"><br><br>
    <label for="">Mot de passe :</label><br>
    <input type="password" name="pwd"><br><br>
    <button type="submit">Valider</button>
</form>
<a href="mdpoublie.php">Mot de passe oublie ?</a>
 | <a href="ajout_compte.php">Pas encore de compte ?</a> 
</body>
<?php } ?>