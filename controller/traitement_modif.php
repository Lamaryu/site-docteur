<?php
session_start();
require_once('connexion_bdd.php');

$colonne = htmlspecialchars($_GET['col']);
$modif = htmlspecialchars($_POST['modif']);
$id = htmlspecialchars($_GET['id']);

switch ($colonne) {
    case "nom":
        $requete = "UPDATE `medecin` 
                    SET nom = ?
                    WHERE `medecin`.`id` = ? ";
        break;
    case "prenom":
        $requete = "UPDATE `medecin` 
                    SET prenom = ?
                    WHERE `medecin`.`id` = ? ";
        break;
    case "email":
        $requete = "UPDATE `medecin` 
                    SET email = ?
                    WHERE `medecin`.`id` = ? ";
        break;
    case "mdp":
        $requete = "UPDATE `medecin` 
                    SET mdp = ?
                    WHERE `medecin`.`id` = ? ";
                    break;
}
$result = $connexion->prepare($requete);
$result->bind_param("si", $modif, intval($id));
$result->execute();

$_SESSION[$colonne] = $modif;
header('Location:../View/profil.php');
