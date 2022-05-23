<?php
require_once('../controller/connexion_bdd.php');
session_start();

$idm = $_SESSION["id"];

$requete = "SELECT `id`,`nom`,`prenom`,`date_de_naissance`,`email`,`taille`,`poids` 
            FROM `patient` 
            WHERE `patient`.`id_medecin` = ? ";
$result = $connexion->prepare($requete);
$result->bind_param("i", intval($idm));
$result->execute();
$result->bind_result($id, $nom, $prenom, $date, $email, $taille, $poids);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Accueil</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="principal.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="new_patient.php">Nouveau Patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="profil.php">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_GET['val'])) {
        $val = htmlspecialchars($_GET['val']);

        switch ($val) {

            case 'modif':
    ?>
                <div class="alert alert-warning">
                    Les données du patient ont bien étaient modifier. 
                </div>
            <?php
                break;

            case 'delete':
            ?>
                <div class="alert alert-danger">
                    Le patient a bien été supprimé.  
                </div>
            <?php
                break;
            }
        }

    if (isset($_GET['success'])) :
        if ($_GET['success'] == true) : ?>
            <div class="alert alert-success" role="alert" style="margin: 0%;">
                <strong>Bienvenue DR.<?= $_SESSION['nom'] ?> </strong> vous étez bien connecté
            </div>
        <?php endif ?>
    <?php endif ?>

    </div>
    <table class="text-center table table-striped table-hover">
        <thead>
            <tr style="padding: 20px;">
                <th class="tablenom2" scope="col" style="padding: 10px;">Nom</th>
                <th class="tablenom2" scope="col" style="padding: 10px;">Prénom </th>
                <th class="tablenom2" scope="col" style="padding: 10px;">Date de naissance</th>
                <th class="tablenom2" scope="col" style="padding: 10px;">Email</th>
                <th class="tablenom2" scope="col" style="padding: 10px;">Taille</th>
                <th class="tablenom2" scope="col" style="padding: 10px;">Poids</th>
                <th class="tablenom2" scope="col" style="padding: 10px;">IMC</th>
            </tr>
        </thead>
        <tbody>

            <?php
            
            while ($result -> fetch()) : ?>

                <tr style="padding: 20px;" class="patient">
                    <?php if (isset($_GET['key']) && ($_GET['del'] == 0) && ($id == $_GET['key'])) : ?>
                        <form action="../Controller/traitement_patient.php?key=<?= $id?>&del=0" method="POST">
                            <td class="tablenom2"><input type="text" value="<?= $nom ?>" name="nom"></td>
                            <td class="tablenom2"><input type="text" value="<?= $prenom ?>" name="prenom"></td>
                            <td class="tablenom2"><input type="text" value="<?= $date ?>" name="date"></td>
                            <td class="tablenom2"><input type="text" value="<?= $email ?>" name="email"></td>
                            <td class="tablenom2"><input type="text" value="<?= $taille ?>" name="taille"></td>
                            <td class="tablenom2"><input type="text" value="<?= $poids ?>" name="poids"></td>
                            <td class="tablenom2" id="imc">0</td>
                            <td colspan="2" class="table-active"><input class="btn btn-success" type="submit" value="valider"></td>
                        </form>
                    <?php else : ?>
                        <td class="tablenom2" id="nom"><?= $nom?></td>
                        <td class="tablenom2" id="prenom"><?= $prenom ?></td>
                        <td class="tablenom2" id="date"><?= $date ?></td>
                        <td class="tablenom2" id="email"><?= $email ?></td>
                        <td class="tablenom2" id="taille"><?= $taille ?></td>
                        <td class="tablenom2" id="poids"><?= $poids ?></td>
                        <td class="tablenom2" id="imc">0</td>
                        <td><a class="btn btn-warning" href="principal.php?key=<?= $id?>&del=0" role="button">Modifier</a></td>
                        <td><a class="btn btn-danger" href="../controller/traitement_patient.php?key=<?= $id?>&del=1" role="button">Supprimer</a></td>
                </tr>
            <?php endif ?>
        <?php endwhile ?>
        </tbody>
    </table>
    </div>
    <script src="../js/principal.js"></script>
</body>

</html>