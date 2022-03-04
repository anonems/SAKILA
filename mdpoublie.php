<!-- cette page permet de modifier son mot de passe -->
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
require('cobdd.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = filter_input(INPUT_POST, "username");
    $pwd = filter_input(INPUT_POST, "pwd");
    $maRequete = $pdo->prepare(" UPDATE log SET pwd = :pwd WHERE username = :username ");
    $maRequete->execute(array(
        'username' => $username,
        'pwd' => $pwd
    ));
    $maRequete->setFetchMode(PDO::FETCH_ASSOC);
    $log = $maRequete->fetch();
        if($log['username'] != $username){
            echo " identifiant indisponnible, veuillez crée un compte <a href='ajout_compte.php'>ici</a> ";
        }else{
            echo "votre mot de passe à bien été mis à jour, veuillez vous connecter <a href='index.php'>ici</a> ";
        }
}else{
?>
<body>
<h1>BIENVENU SUR SAKILLA</h1>
<h2>Modifier votre mot de passe :</h2>
<form method="post">
    <label for="">Identifiant :</label><br>
    <input type="text" name="username"><br><br>
    <label for="">Mot de passe :</label><br>
    <input type="password" name="pwd"><br><br>
    <button type="submit">Valider</button>
</form>
<a href="index.php">retour</a>
</body>
<?php } ?>