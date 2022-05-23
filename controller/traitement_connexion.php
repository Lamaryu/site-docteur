<?php

require_once('connexion_bdd.php');
session_start();


if (isset($_POST['email']) && isset($_POST['password'])) {

   $email = htmlspecialchars($_POST['email']);
   $password = htmlspecialchars($_POST['password']);

   if ($email !== "" && $password !== "") {
      $requete = "SELECT count(*) FROM medecin
                  where email = '" . $email . "' and mdp = '" . $password . "' ";
      $exec_requete = mysqli_query($connexion, $requete);
      $reponse      = mysqli_fetch_array($exec_requete);
      $count = $reponse['count(*)'];

      if ($count != 0) {

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
         

         $_SESSION['id'] = $id;
         $_SESSION['nom'] = $nom;
         $_SESSION['prenom'] = $prenom;
         $_SESSION['email'] = $email;
         $_SESSION['mdp'] = $mdp;
         
         header('Location: ../View/principal.php?success=true');
         die();
      } else {
         header('Location: ../View/connexion.php?erreur=1');
         die();
      }
   } else {
      header('Location: ../View/connexion.php?erreur=2');
      die();
   }
} else {
   header('Location: ../View/connexion.php');
   die();
}
