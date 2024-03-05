<?php
session_start();

     // Traitement de inscription-informations.php
     //On envoi le name du bouton submit de la page 2 du formulaire
    if(!empty($_POST['inscription-identification'])){

       $filtreMembre = array(
		'pseudonyme' => FILTER_SANITIZE_ENCODED,
        'motdepasse' => FILTER_SANITIZE_ENCODED,
    );

    
       $informations = filter_input_array(INPUT_POST, $filtreMembre);
     
       $_SESSION['membre']['pseudonyme'] = $informations['pseudonyme'];

       //$_SESSION['membre']['motdepasse'] = $informations['motdepasse'];
  
      $_SESSION['membre']['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
      
	   
  

        $AJOUTER_MEMBRE = "INSERT into membre(prenom, nom, pseudonyme, motdepasse, courriel, organisation) VALUES(:prenom, :nom, :pseudonyme, :motdepasse, :courriel, :organisation)";
         //echo $AJOUTER_MEMBRE;
        
         include "../connexion.php";

        $requeteAjouterMembre = $basededonnees->prepare($AJOUTER_MEMBRE); 
        

        $requeteAjouterMembre->bindParam(':prenom',  $_SESSION['membre']['prenom'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':nom', $_SESSION['membre']['nom'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':courriel', $_SESSION['membre']['courriel'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':organisation', $_SESSION['membre']['organisation'], PDO::PARAM_STR);
        $requeteAjouterMembre->bindParam(':pseudonyme',  $informations['pseudonyme'], PDO::PARAM_STR);
        //$requeteAjouterMembre->bindParam(':motdepasse', $informations['motdepasse'], PDO::PARAM_STR);
       $requeteAjouterMembre->bindParam(':motdepasse', $_SESSION['membre']['motdepasse'], PDO::PARAM_STR);
        $requeteAjouterMembre->execute();

        
      

        if(!empty($_SESSION['membre']['pseudonyme']) && !empty($_SESSION['membre']['motdepasse']))
          header('Location: ../index.php');
        else
            header('Location: inscription-identification.php');
    
    }  

        
?>


