<?php
require_once('../controller/connexion_bdd.php');
session_start();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$date = $_POST['date1'] . '/' . $_POST['date2'] . '/' . $_POST['date3'];
$email = $_POST['email'];
$taille = $_POST['taille'];
$poids = $_POST['poids'];
$id_medecin = $_SESSION['id'];

$insert = "INSERT INTO patient (nom, prenom, date_de_naissance, email, taille, poids, id_medecin) VALUES(?, ?, ?, ?, ?, ?, ?)";
$insert = $connexion->prepare($insert);
$insert -> bind_param("ssssiii", $nom, $prenom, $date, $email, intval($taille) ,intval($poids), intval($id_medecin));
$insert -> execute();

header('Location: ../View/principal.php');
die();
