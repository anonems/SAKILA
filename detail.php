<!-- cette page permet d'acceder aux detail concerné une selection precedente -->
<?php
require('nav.php');
$type = filter_input(INPUT_GET, 'type');
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
require('cobdd.php');
$maRequete = $pdo->prepare("SELECT * FROM $type WHERE $type"."_id = :id");
$maRequete->execute([
    ":id" => $id
]);

$maRequete->setFetchMode(PDO::FETCH_ASSOC);
$tipe = $maRequete->fetch();
if ($type=='actor'){
    $maRequete4 = $pdo->prepare("SELECT * FROM  film_actor WHERE actor_id = $id");
    $maRequete4->execute([
        ":id" => $id
    ]);
    $films = $maRequete4->fetchAll();
?>

    <h1><?= $tipe["first_name"] ?> <?= $tipe["last_name"] ?></h1>
    <table>
            <thead>
                <tr>
                    <th>Id du film</th>
                    <th>A travailler dans...</th>
                    <th>Dernière modif</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($films as $chois):
                    $idfa = $chois["film_id"];
                    $maRequete5 = $pdo->prepare("SELECT * FROM film WHERE film_id = $idfa");
                    $maRequete5->execute();
                    $nomfilm = $maRequete5->fetch();
                     ?>

                    <tr>
                        <td><?= $chois["film_id"] ?></td>
                        <td>
                            <a href="focus.php?film_id=<?=$chois["film_id"]?>">
                                <?=$nomfilm["title"]?>
                            </a>
                        </td>
                        <td><?= $chois["last_update"]?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <br><em>Dernière mise à jour : <?= $tipe["last_update"] ?></em>
</body>
</html>
<?php }
elseif ($type=='category'){ 
    $maRequete2 = $pdo->prepare("SELECT * FROM  film_category WHERE category_id = $id");
    $maRequete2->execute([
        ":id" => $id
    ]);
    $films = $maRequete2->fetchAll();
    ?>
    
    <h1><?= $tipe["name"] ?></h1>
    <table>
            <thead>
                <tr>
                    <th>Id du film</th>
                    <th>Titre du film</th>
                    <th>Dernière modif</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($films as $chois):
                    $idfc = $chois["film_id"];
                    $maRequete3 = $pdo->prepare("SELECT * FROM film WHERE film_id = $idfc");
                    $maRequete3->execute();
                    $nomfilm = $maRequete3->fetch();
                     ?>

                    <tr>
                        <td><?= $chois["film_id"] ?></td>
                        <td>
                            <a href="focus.php?film_id=<?=$chois["film_id"]?>">
                                <?=$nomfilm["title"]?>
                            </a>
                        </td>
                        <td><?= $chois["last_update"]?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <br><em>Dernière mise à jour : <?= $tipe["last_update"] ?></em>
</body>
</html>
<?php }else{echo "<h1>404 ERREUR</h1><br><h2>La page que vous demandez n'est pas disponible !</h2>";} ?>
</body>
