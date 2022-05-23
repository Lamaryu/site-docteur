<?php
require_once('connexion_bdd.php');
session_start();


if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['prenom'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $prenom = htmlspecialchars($_POST['prenom']);

    $requete = "SELECT count(*) FROM medecin WHERE email = '" . $email . "'";
    $exec_requete = mysqli_query($connexion, $requete);
    $reponse      = mysqli_fetch_array($exec_requete);
    $count = $reponse['count(*)'];

    $email = strtolower($email);

    if ($count == '0') {
        if (strlen($email) <= 100) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $insert = "INSERT INTO medecin (nom, prenom, email, mdp) VALUES(?, ?, ?, ?)";
                $insert = $connexion->prepare($insert);
                $insert->bind_param("ssss", $nom, $prenom, $email, $password);
                $insert->execute();

                $requete2 = "SELECT `id` , `nom`, `prenom`, `email`, `mdp`
                            FROM medecin 
                            WHERE email = '" . $email . "' ";
                $exec_requete2 = mysqli_query($connexion, $requete2);
                $reponse2      = mysqli_fetch_array($exec_requete2);
                $id = $reponse2['id'];
                $nom = $reponse2['nom'];
                $prenom = $reponse2['prenom'];
                $email = $reponse2['email'];
                $mdp = $reponse2['mdp'];
                $is_admin = $reponse2['is_admin'];

                $_SESSION['id'] = $id;
                $_SESSION['nom'] = $nom;
                $_SESSION['prenom'] = $prenom;
                $_SESSION['email'] = $email;
                $_SESSION['mdp'] = $mdp;
                header('Location: ../View/principal.php?success=true');
                die();
            } else {
                header('Location: ../View/inscription.php?reg_err=email');
                die();
            }
        } else {
            header('Location: ../View/inscription.php?reg_err=email_length');
            die();
        }
    } else {
        header('Location: ../View/inscription.php?reg_err=already');
        die();
    }
} else {
    header('Location: ../View/inscription.php?reg_err=void');
    die();
}
