<!-- barre de navigatio et ouverture de session -->
<?php
session_start();
if(!$_SESSION["connecte"]) {
    http_response_code(302);
    header('Location: index.php');
    exit();
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
    <!--MENU DE NAVIGATION-->
    <div class="menu" >  
        
    <a href="liste.php?nav=actor">ACTEURS</a> |
    <a href="compte.php">HOME</a> |
    <a href="liste.php?nav=category">CATEGORIES</a>
   
    </div>  

