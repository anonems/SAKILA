<!-- cette page permet de supprimer un compte -->
<?php 
    require('cobdd.php');
    session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $username = filter_input(INPUT_POST, "username");
    $pwd = filter_input(INPUT_POST, "pwd");
    $maRequete1 = $pdo->prepare("SELECT * FROM log WHERE username = :username ");
    $maRequete1->execute([
        ":username" => $username
    ]);
    $maRequete1->setFetchMode(PDO::FETCH_ASSOC);
    $log = $maRequete1->fetch();

if ($log['username'] == $username && $log['pwd'] == $pwd && $username == $_SESSION["username"]){
    $maRequete = $pdo->prepare("DELETE FROM log WHERE username = :username");
    $maRequete->execute([
        ":username" => $username
    ]);
    header('Location: index.php');
}elseif($log['username'] != $username or $log['pwd'] != $pwd or $username !=$_SESSION["username"]){
if($log['username'] != $username or $username !=$_SESSION["username"]){
    echo "identifiant incorrect";
}elseif($log['pwd'] != $pwd){
    echo "mot de passe incorrecte";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>sakila</title>
</head>
<body>
    <h1>Supression de compte</h1>
    <p>pour supprimer votre compte veuillez renseigner de nouveau vos identifiants</p>
    <form method="post">
    <label for="">Identifiant :</label><br>
    <input type="text" name="username" require><br><br>
    <label for="">Mot de passe :</label><br>
    <input type="password" name="pwd" require><br><br>
    <button onclick="confirmation()" type="submit">Valider</button>
</form>
<form action="compte.php"><button type="submit">ANNULER</button></form>

<script>function confirmation(){alert('êtes vous sûre ? cette action est irreversible');}</script>
</body>
</html>