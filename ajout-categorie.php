<!-- cette page permet d'ajouter une categorie -->
<?php
require('nav.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name");
    if($name) {
        $name = strip_tags($name);
        $name = htmlentities($name);
        require('cobdd.php');
        $maRequete = $pdo->prepare("INSERT INTO category (name) VALUES(:name)");
        $maRequete->execute([
            ":name" => $name
        ]);
        http_response_code(302); 
        header('liste.php?nav=category');
        exit();
    }
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>
    <form method="POST">
        <label for="category_name">Nom de la catégorie à ajouter :</label>
        <input type="text" id="category_name" name="name" />
        <button type="submit">Valider</button>
    </form>
</body>
</html>