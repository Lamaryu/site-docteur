<?php
require_once('../controller/connexion_bdd.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <title>nouveau patient</title>
</head>

<body>

    <!-- Ajouter la barre de menu -->
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
    <div class="container p-3 p-md-5">

        <h2>Nouveau patient</h2>

        <form action="../controller/traitement_newpatient.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nom">Nom</label>
                    <input id="nom" name="nom" type="text" class="form-control" placeholder="Nom">
                </div>
                <div class="form-group col-md-6">
                    <label for="prenom">Prenom</label>
                    <input id="prenom" name="prenom" type="text" class="form-control" placeholder="Prenom">
                </div>
            </div>
            <div class="form-row pl-1">
                Date de Naissance
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <select name="date1" id="date-birth" class="form-control jour">
                        
                    </select>
                </div>
                <div class="form-group col-4">
                    <select name="date2" id="date-birth" class="form-control mois">
                        
                    </select>
                </div>
                <div class="form-group col-4">
                    <select name="date3" id="date-birth" class="form-control annee">
                        
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="email">Adresse mail</label>
                    <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="taille">Taille (en cm)</label>
                    <input id="taille" name="taille" type="number" class="form-control" placeholder="Taille">
                </div>
                <div class="form-group col-md-6">
                    <label for="poids">Poids</label>
                    <input id="poids" name="poids" type="number" class="form-control" placeholder="Poids">
                </div>
            </div>
            <button type="submit" class="btn btn-success form-group col-12">valider</button>
        </form>
    </div>
    <script src="../js/new_patient.js"></script>
</body>

</html>