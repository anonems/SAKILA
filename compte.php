<!-- cette page permet d'acceder au contenu de la base de donnée en cas de connection reussi -->
<?php require('nav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sakila</title>
</head>
<body>
    <h1>Bienvenue sur votre dashboard</h1>
    <p>Vous êtes connecté(e) en tant que <?= $_SESSION["username"] ?></p>
    <a href="logout.php">Se deconnecter.</a><br><br>
    <a href="delcompte.php">Supprimer le compte.</a>

</body>
</html>