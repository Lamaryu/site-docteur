<?php 
session_start();
require_once('connexion_bdd.php');

$idp = $_GET['key'];

if ($_GET['del'] == 1) {

$requete = "DELETE FROM `patient` WHERE `id` = ? ";
$insert = $connexion->prepare($requete);
$insert->bind_param("i", intval($idp));
$insert->execute();
header("location:../view/principal.php?val=delete");
die();
}

elseif ($_GET['del'] == 0) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $email = $_POST['email'];
    $taille = $_POST['taille'];
    $poids = $_POST['poids'];

    $requete = "UPDATE `patient` 
                SET nom = '" . $nom . "', prenom = '" . $prenom . "', date_de_naissance = '" . $date . "', email = '" . $email . "', taille = '" . $taille . "', poids = '" . $poids . "'
                WHERE `patient`.`id` = " . $idp ;
    $exec_requete = mysqli_query($connexion, $requete);
    header("location:../view/principal.php?val=modif");
    die();
}
?>
