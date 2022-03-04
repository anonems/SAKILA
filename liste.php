<!-- cette page permet d'afficher une liste d'elements selon un thème selectionner  -->
<?php
$nav = $_GET['nav'];
require('nav.php');
require('cobdd.php');
$maRequete = $pdo->prepare("SELECT * FROM $nav");
$maRequete->execute();
$choix = $maRequete->fetchAll();
if ($nav=='actor'){echo "<h1>Acteurs et actrices</h1>";?>
        <table>
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Prénom Nom</th>
                    <th>Dernière modif</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($choix as $choi): ?>
                    <tr>
                        <td><?= $choi["actor_id"] ?></td>
                        <td>
                            <a href="detail.php?type=actor&id=<?= $choi["actor_id"] ?>">
                                <?= $choi["first_name"] ?>
                                <?= $choi["last_name"] ?>
                            </a>
                        </td>
                        <td><?= $choi["last_update"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
<?php }elseif($nav=='category'){echo "<h1>Categories</h1>"; ?>
<table>
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Dernière modif</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($choix as $choi): ?>
                    <tr>
                        <td><?= $choi["category_id"] ?></td>
                        <td>
                            <a href="detail.php?type=category&id=<?= $choi["category_id"] ?>">
                                <?= htmlentities($choi["name"]) ?>
                            </a>
                        </td>
                        <td><?= $choi["last_update"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form action="ajout-categorie.php"><button value="submit">AJOUTER UNE CATEGORIE</button></form>

<?php }else{echo "<h1>404 ERREUR</h1><br><h2>La page que vous demandez n'est pas disponible !</h2>";}?>
