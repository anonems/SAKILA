<!-- cette page permet de voir les details d'un film -->
<?php 
require('nav.php');
$film_id = filter_input(INPUT_GET, "film_id", FILTER_VALIDATE_INT);
require('cobdd.php');
$maRequete = $pdo->prepare("SELECT * FROM film WHERE film_id = :film_id");
$maRequete->execute([
    ":film_id" => $film_id
]);
$maRequete->setFetchMode(PDO::FETCH_ASSOC);
$filme = $maRequete->fetch();
?>
<h1><?= $filme["title"] ?></h1>
<table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Date de sortie</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>
                                <?=$filme["description"]?>
                        </td>
                        <td><?= $filme["release_year"]?></td>
                    </tr>
            </tbody>
        </table>