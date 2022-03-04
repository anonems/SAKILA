<!-- cette page permet de se connecter à la base de donnée -->
<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbName = "sakila";
$username = "root";
$password = "";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName", $username, $password);
?>