<?php
    session_start();

    include "../connexion.php";

    $error = false;
    $messageErreur = "";

    // name de la partie identité du formulaire
    if(!empty($_POST['modification-identite'])){
   // print_r($_POST['modification-identite']);
  
        $filtreMembre = array(
            'prenom' => FILTER_SANITIZE_ENCODED,
            'nom' => FILTER_SANITIZE_ENCODED,
            'organisation' => FILTER_SANITIZE_STRING,
            'courriel' => FILTER_SANITIZE_EMAIL,
        );
        
        $identite = filter_var_array($_POST, $filtreMembre);

     

        if(!empty($identite['organisation']) && !empty($identite['courriel'])){
          
            $_SESSION["membre"]["organisation"] = $identite["organisation"];
            $_SESSION["membre"]["courriel"] = $identite["courriel"];

            $MODIFIER_MEMBRE = "UPDATE membre SET organisation = :organisation, courriel = :courriel WHERE pseudonyme = :pseudonyme";
           
           
            $requeteModifierMembre = $basededonnees->prepare($MODIFIER_MEMBRE); 

            $requeteModifierMembre->bindParam(':organisation', $identite['organisation'], PDO::PARAM_STR);
            $requeteModifierMembre->bindParam(':courriel', $identite['courriel'], PDO::PARAM_STR);
            $requeteModifierMembre->bindParam(':pseudonyme', $_SESSION["membre"]['pseudonyme'], PDO::PARAM_STR);
            $requeteModifierMembre->execute();

          
    
            
        } else {
           $error = true;
            $messageErreur = "Tout les champs doivent être remplit";
        }
        // name de la partie sécurité du formulaire
    } else if(!empty($_POST['modification-securite'])){
       
        
        $filtreMembre = array(
            'motdepasse' => FILTER_SANITIZE_ENCODED,
            'motdepasse-confirmation' => FILTER_SANITIZE_ENCODED,
            'pseudonyme' => FILTER_SANITIZE_ENCODED,
        );
        
        $securite = filter_var_array($_POST, $filtreMembre);

        //strcmp — Comparaison binaire de chaînes https://www.php.net/manual/fr/function.strcmp.php

        if(strcmp($securite["motdepasse"],$securite["motdepasse-confirmation"]) == 0){

            $_SESSION['membre']['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
            $_SESSION["membre"]["pseudonyme"] = $securite["pseudonyme"];

            $MODIFIER_MEMBRE = "UPDATE membre SET motdepasse = :motdepasse WHERE pseudonyme = :pseudonyme";
            
            $requeteModifierMembre = $basededonnees->prepare($MODIFIER_MEMBRE); 

            $requeteModifierMembre->bindParam(":motdepasse", $_SESSION['membre']['motdepasse'], PDO::PARAM_STR);
            $requeteModifierMembre->bindParam(":pseudonyme", $securite['pseudonyme'], PDO::PARAM_STR);
            $requeteModifierMembre->execute();
        } else {
            $erreur = true;
            $messageErreur = "Les mots de passes ne sont pas identiques";
        }

    } else{
        $error = true;
        $messageErreur = "Action invalide";
    }

    if(!$error){
        echo "Modification du compte effectué avec succès";
       // header('Location: modifier-compte.php');
    } else {
        echo $messageErreur;
    }
?>