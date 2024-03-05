# Introduction PHP et MySql

## Description du guide

Ce guide ce veut d'être un aide-mémoire pour les opérations de bases en PHP ainsi que certaines notions Sql.

## PHP

### Description

PHP: Hypertext Preprocessor, plus connu sous son sigle PHP (sigle auto-référentiel), est un langage de programmation libre, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP, mais pouvant également fonctionner comme n'importe quel langage interprété de façon locale. PHP est un langage impératif orienté objet.

### Utilisation

PHP a permis de créer un grand nombre de sites web célèbres, comme Facebook, Wikipédia et etc. Il est considéré comme une des bases de la création de sites web dits dynamiques, mais également des applications web.

### Configuration de l'environnement de travail

Se référer au [guide](https://github.com/alexis35115/bitnami-wamp).

De plus, voir le [fichier powershell](https://github.com/alexis35115/InitialSetupVisualStudioCode/blob/master/InitialSetupVisualStudioCode.ps1) pour effectuer une configuration initiale de Visal Studio Code.

### Bonnes pratiques php

Voici un [guide](https://github.com/jupeter/clean-code-php) à lire sur les bonnes pratiques en php.

### Syntaxe

#### Ajouter des commentaires

```php
<?php

    //À noter, les commentaires sont généralement en vert dans le code

    // Une ligne de commentaire simple doit commencer par "//"
    // Exemple, ceci est un commentaire simple

    // Pour faire un bloc de commentaires, il faut utiliser "/**/"
    /*
        Toute cette section est un commentaire,
        Et il n'est pas nécessaire de mettre les "//" en début de ligne
    */
?>
```

Voir le [fichier](https://github.com/alexis35115/IntroductionPHP/blob/master/src/exemples/ecrireCommentaires.php).

#### Création d'une variable

Voir le [fichier](https://github.com/alexis35115/IntroductionPHP/blob/master/src/exemples/creationVariables.php) et pour connaître les types possibles voici une [référence](https://www.php.net/manual/fr/function.gettype.php#refsect1-function.gettype-returnvalues).

#### Intruction echo

```php
<?php
    // Affiche une chaîne de caractères

    echo("Ceci est un message qui sera affiché.");

    $message = "Ceci est un message à afficher";
    echo($message);
?>
```

#### Affichier les éléments d'une liste

```php
<?php

    // Description : Affiche des informations lisibles pour une variable.

    //Liste à afficher
    $fruits = ["banane", "pomme", "fraise"];

    print_r($fruits);
    // Affiche ceci à l'écran : Array ( [0] => banane [1] => pomme [2] => fraise )
?>
```

#### Opérateur (if, while, for, foeach, égalité)

Voir le [fichier](https://github.com/alexis35115/IntroductionPHP/blob/master/src/exemples/exempleOperateurs.php).

#### Utilisation de la "->"

Voir le [fichier](https://github.com/alexis35115/IntroductionPHP/blob/master/src/exemples/flecheSyntaxe.php).

#### Concaténation

Voir le [fichier](https://github.com/alexis35115/IntroductionPHP/blob/master/src/exemples/concatenation.php).

#### Utilisation du HTML et php

Pour inclure du HTML dans un fichier avec l'extension ".php", voir la [documentation](https://www.php.net/manual/fr/faq.html.php).

#### Connexion avec une base de données MySql

```php
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $adresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $estSurServeurTim = strpos($adresseCourante, 'tim.cgmatane.qc.ca') !==false ? true : false;

    if ($estSurServeurTim) {
        $usager = 'tim_pewpew';
        $motdepasse = 'aEC%rpewpewXD';
        $hote = 'localhost';
        $base = 'tim_pewpew';
    }
    else {
        $usager = 'root';
        $motdepasse = 'admin123';
        $hote = 'localhost';
        $base = 'liste_musique';
    }

    $dsn = 'mysql:dbname='.$base.';host=' . $hote;
    $basededonnees = new PDO($dsn, $usager, $motdepasse);
    // Configurer la gestion d'erreurs
    $basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // La ligne suivante est importante pour empêcher les problèmesd'affichages
    $basededonnees->exec( 'SET CHARACTER SET UTF8' );

    return $basededonnees;
    // l'objet $basededonnees sera avec lequel que nous allons pouvoir travailler avec la base de données
?>

```

##### Obtenir des données à partir de la base de données

```php

    include "database.php"; // Correspond au code de la section précédente

    // Définir la requête
    $requeteAExecuter = "SELECT colone1 FROM nomTable";
    // Préparer la commande à exécuter
    $objetQuiContientLaRequeteAExecuter = $basededonnees->prepare($requeteAExecuter);
    // Exécute la requête
    $objetQuiContientLaRequeteAExecuter->execute();
    // Récupérer les données de la requête préalablement exécutée
    $elementsRecuperes = $objetQuiContientLaRequeteAExecuter->fetchAll();

    print_r($elementsRecuperes);
    // Le print_r() permet l'affichage de tous les données
```

#### Instruction GET

Un tableau associatif des valeurs passées au script courant via les paramètres d'URL (aussi connue sous le nom de "query string"). Notez que ce tableau n'est pas seulement rempli pour les requêtes GET, mais plutôt pour toutes les requêtes avec un query string.

$HTTP_GET_VARS contient les mêmes informations, mais n'est pas superglobale. (Notez que $HTTP_GET_VARS et $_GET sont des variables différentes et que PHP les traite comme telles.)

Exemple avec $_GET

TODO : Exemple à venir

```php
<?php
echo 'Bonjour ' . htmlspecialchars($_GET["name"]) . '!';
?>
```

En assumant que l'utilisateur a entré <http://example.com/?name=Yannick>

L'exemple ci-dessus va afficher quelque chose de similaire à :

Bonjour Yannick!

#### Instruction POST

À documenter.

## MySql

### Qu'est-ce que phpMyAdmin

phpMyAdmin est un logiciel gratuit écrit en PHP, destiné à gérer l'administration de MySQL sur le Web. phpMyAdmin prend en charge un large éventail d'opérations sur MySQL et MariaDB. Les opérations fréquemment utilisées (gestion des bases de données, des tables, des colonnes, des relations, des index, des utilisateurs, des autorisations, etc.) peuvent être effectuées via l'interface utilisateur, tout en vous permettant d'exécuter directement toute instruction SQL. Voir le [guide d'utilisation](https://docs.phpmyadmin.net/fr/latest/user.html).

### Configurations de bases de phpMyAdmin

Se référer au [guide](https://www.dropbox.com/sh/ng3cfib6mkz5vb7/AAAfjjyGkXm6k5YicMksqEOSa?dl=0&preview=Configuration+PHP+et+MySQL.pdf).

### Comment inscrire un commentaire en sql

Pour écrire une ligne de commentaire dans un fichier sql, il suffit de commencer la ligne par "--".

### Création d'une base de données

Une fois phpMyAdmin d'ouvert, il suffit de cliquer sur le bouton "Nouvelle base de données" dans le menu de gauche.

```sql
-- Instruction pour exécution en sql
CREATE DATABASE nomDeLaBaseDeDonnees;
```

### Création d'une table

#### À quoi sert une table dans une base de données

Une table est un ensemble de données organisées sous forme d'un tableau où les colonnes correspondent à des catégories d'information (une colonne peut stocker des numéros de téléphone, une autre des noms...) et les lignes à des enregistrements, également appelés entrées.

Pour créer une table via phpMyAdmin, il suffit dans le menu d'étendre la base de données dans laquelle on veut ajouter une table et cliquer sur "Nouvelle table".

```sql
-- Création via sql :
CREATE TABLE `nomTable` (
  `cleUnique` int(11) NOT NULL,
  `champ1` varchar(20) NOT NULL,
  `champ2` text NOT NULL,
  `champ3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- int        : est un type pour les numérosALTER
-- varchar(X) : est pour une chaîne de caractères avec une longueur définieALTER
-- texte      : est pour les champs textes "long"
-- Voir la documentation complète https://dev.mysql.com/doc/refman/8.0/en/data-types.html
```

### Comment procéder à la suppression d'une table

Pour supprimer une table via phpMyAdmin, il faut sélectionner la table, cliquer sur l'onglet "Opérations", trouver l'option "Supprimer la table (DROP)", cliquer sur l'hyperlien et puis confirmer la suppression.

```sql
-- Suppression via sql
DROP TABLE nomtable;
```

### Cas d'utilisations

#### Manipulations des données dans une table

Dans la section suivantes, inscrire des exemples simples comme démonstration.

##### Clé primaire

Le choix d'une clé primaire est l'une des étapes les plus importantes d'une bonne conception de base de données. Une clé primaire est une colonne de table ayant un objectif particulier. Chaque table de base de données nécessite une clé primaire, car elle garantit une accessibilité au niveau de la ligne! Les valeurs qui composent une colonne de clé primaire sont uniques et il n'y a pas deux valeurs identiques.

##### Effectuer une recherche

```sql
-- Récupérer tous les enregistrements d'une table
SELECT * FROM nomTable;
```

```sql
-- Récupérer tous les enregistrements d'une table ou l'[id] est égale à 1 
SELECT * FROM nomTable WHERE id = 1;
```

```sql
-- Récupérer seulement une colonne dans une recherche
SELECT nomColonne FROM nomTable;
```

##### Effectuer une mise à jour

```sql
-- Modifier la valeur d'une colonne dans la table
-- UPDATE nomTable SET nomColonne=[value];

UPDATE nomTable SET nomColonne="pewpew";
```

```sql
-- Modifier la valeur d'une colonne d'un enregistrement précis
UPDATE nomTable SET nomColonne="pewpew" WHERE id = 1;
```

##### Effectuer une suppression

```sql
-- Supprimer un enregistrement précis dans une table
DELETE FROM nomTable WHERE id = 1;
```

##### Effectuer une insertion

```sql
-- Insérer un enregistrement dans la table
INSERT INTO nomTable(colonne1, colonne2) VALUES ("valeur1", 1);
-- Dans l'exemple la première colonne est du texte et la seconde un nombre
```

#### Caractères d'échapement

Si vous avez à travailler avec des données en format texte, il est plus simple de mettre " au lieu de '. Le guillement simple peut causer des problèmes. Si vous devez absolumenet utiliser le guillement simple il suffit de mettre un \ devant le guillemet simple.

### Astuces

#### Exporter une base de données en un fichier sql

- Ouvrez phpMyAdmin.
- À partir de la liste de gauche, cliquez sur le nom de la base de données à exporter. La page se rafraîchira pour afficher les informations relatives à la base de données sélectionnée.
- Cliquez sur l'onglet « Exporter ». La page se rafraîchira pour afficher les options d'exportation.
- À partir du groupe « Exporter », sélectionnez l'option « MySQL » si ce n'est déjà fait.
- Dans la section « Options SQL » (SQL Options), cochez les cases jouxtant les options « Structure » et « Données ».
- Cochez la case « Transmettre » située au bas des options.
- Cliquez sur le bouton « Exécuter ».

Le fichier produit sera une requête sql qui sera exécutable pour créer une base de données identique à celle exportée.

#### Exporter les données d'une table

Suivre la procédure "Exporter une base de données en un fichier sql" sauf qu'il faut sélectionner la table cible au lieu de la base de données.

Parler comment inclure une image dynamiquement <https://gist.github.com/alexis35115/bcaa6750fe73397b9437d292d262ba1b>

#### Déterminer le type d'une variable lors de l'exécution

Parfois, il est nécessaire de déterminer le type d'une variable pour ensuite exécuter un traitement spécifique, mais également pour déboguer. Pour se faire, il existe la commande "[getype](https://www.php.net/manual/fr/function.gettype.php)".

La commande gettype retourne sous format texte le type de la variable passée en paramètre.

Voici quelques exemples :

```php
<?php

    $data = array(1, 1., NULL, new  stdClass, 'foo');

    foreach ($data as $value) {
        echo(gettype($value), "\n");
    }
?>
```

L'exemple ci-dessus va afficher quelque chose de similaire à :

- integer
- double
- NULL
- object
- string

### Problèmes

#### Impossible de mettre une colonne auto-incrément suite à sa création

Si vous avez une table déjà existante et que vous voulez mettre le champ "id" auto-incrément sans l'avoir fait lors de sa création initiale, il faut procéder par ligne de commandes et non pas l'interface de phpMyAdmin.

Voici le message d'erreur :

![Image du problème](https://raw.githubusercontent.com/alexis35115/IntroductionPHP/master/src/img/impossibleAI.PNG "Image du problème")

Voici comment faire :

```sql
-- Commencer par ajouter l'index sur le champ `id`
ALTER TABLE `nomTable` ADD INDEX(`id`);

-- Ajouter l'auto-incrément sur le champ `id`
ALTER TABLE `nomTable` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
```

voir la référence : <https://stackoverflow.com/questions/8114535/mysql-1075-incorrect-table-definition-autoincrement-vs-another-key>

#### Problème pour la mise à jour d'une date vers MySQL

Voici un exemple de comment gérer la mise à jour ou l'insertion d'une date avec PHP.

Voici le script de la base de données :

```sql
-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  jeu. 24 oct. 2019 à 19:09
-- Version du serveur :  8.0.17
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `demoproblemes`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `age` tinyint(4) DEFAULT NULL,
  `dateInscription` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `age`, `dateInscription`) VALUES
(1, 'Garon-Michaud', 'Alexis', 27, '2019-01-01'),
(2, 'Garon-Michaud', 'François', 24, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

```

Voici le fichier php :

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Demo du problème avec les dates</h1>
<?php
    // S'assurer que le champ date dans la base de données soit de type "Date" et
    // que la valeur par défaut soit "NULL".

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // La variable $dateContenueDansPost représente la valeur contenu dans le $_POST
    // Pour essayer, prendre les valeurs : NULL or "2019-01-01"
    $dateContenueDansPost = "2019-01-01";

    $requete = "UPDATE utilisateur SET dateInscription=".obtenirDateDansPost($dateContenueDansPost)." WHERE id=1";

    try {
        echo($requete);
        $succes = obtenirConnexionBd()->prepare($requete)->execute();
    } catch (Exception $e) {
        echo($e);
    }

    echo($succes ? "Tout fonctionne!" : "Oups, encore en erreur!");

    function obtenirDateDansPost($date) {
        return empty($date) ? 'NULL' : "'".date("Y-m-d", strtotime($date))."'";
    }

    function obtenirConnexionBd() {
        $identifiant = 'root';
        $motPasse = 'admin123';
        $host = 'localhost';
        $nomBd = 'demoProblemes';

        $dsn = 'mysql:dbname='.$nomBd.';host=' . $host;
        $basededonnees = new PDO($dsn, $identifiant, $motPasse);
        // Configurer la gestion d'erreurs
        $basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $basededonnees;
    }
?>
</body>
</html>
```

Références : <https://stackoverflow.com/questions/38350233/cant-update-date-field-in-mysql-using-php/38350266>

#### Problème avec la comparaison de chaînes de caractères lorsque l'on utilise des majuscules et des minuscules avec MySQL

Voici un [article](https://www.oreilly.com/library/view/mysql-cookbook/0596001452/ch04s10.html#:~:targetText=In%20summary%2C%20comparisons%20are%20case,%2C%20SET%20%2C%20or%20TEXT%20columns.) qui résume comment prévenir et contourner le problème.

#### Problème avec l'affichage d'un rendu XML à partir d'un fichier php 

Avant de donner la solution au problème, il faut comprendre comment un fureteur décide d'afficher un fichier. Tout est lié au type MIME!

Qu'est-ce qu'un "Type MIME" ou bien "Content Type" en anglais? 

Voici un extrait de la [documentation](https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types) de Mozilla :

    Le type Multipurpose Internet Mail Extensions (type MIME) est un standard permettant d'indiquer la nature et le format d'un document. Il est défini au sein de la RFC 6838. L'Internet Assigned Numbers Authority (IANA) est l'organisme officiel responsable du suivi de l'ensemble des types MIME officiels existants. Une liste exhaustive et maintenue est consultable sur la page Media Types de l'IANA.

    Les navigateurs utilisent le plus souvent le type MIME et non l'extension d'un fichier pour déterminer la façon dont ils vont traiter ou afficher un document. Il est donc important que les serveurs puissent correctement attacher le type MIME dans l'en-tête de la réponse qu'ils renvoient.

Comment puis-je savoir quel est le type MIME à partir du fureteur?

Voici un [article](https://stackoverflow.com/a/37321124) sur stackoverflow qui explique la procédure à suivre.

```php

# Prendre note qu'il faut s'assurer de mettre la fonction "header" avant de faire quoi que ce soit, sinon vous allez recevoir l'erreur "Headers already sent".

# Voici l'entête à écrire pour un fichier XML UTF-8
<?php
header("Content-Type: application/xml; charset=utf-8");

# Autres instructions ici-bas...
?>
```

En bonus, voici là [différence](https://stackoverflow.com/a/4832418) entre "text/xml" et "application/xml".

#### Problème avec l'affichage des images à partir d'un flux RSS

Pour être en mesure d'afficher des images à partir d'un flux RSS, il est important d'inclure la balise image au bon endroit.

Voici un exemple d'un flux RSS avec des images :

```xml
<rss xmlns:media="http://search.yahoo.com/mrss/" version="2.0">
    <channel>
        <title>Chexed.com</title>
        <image>
            <url>http://chexed.com/images/chexed.gif</url>
            <width>110</width>
            <height>38</height>
            <title>Chexed.com</title>
            <link>http://www.chexed.com/</link>
        </image>
        <description>Philosophy, art, technology, life.</description>
        <link>http://www.chexed.com/</link>
        <item>
            <title>Installing Xpand!2 for Reaper DAW</title>
            <description>
                <![CDATA[
                    <img align="left" hspace="8" src="http://chexed.com/a/Audio_Video_Photo/img893/sm_Xpand2_Reaper.jpg"/><br />
                ]]>
                Below lists the steps I had to take to get it working.
            </description>
            <category domain="http://chexed.com/Audio_Video_Photo">Audio Video Photo</category>
            <link>
                http://chexed.com/a/Audio_Video_Photo/Installing_Xpand_2_for_Reaper_DAW_id9514o.html
            </link>
            <pubDate>Fri, 30 Dec 2016 23:37:18 EDT</pubDate>
            <guid isPermaLink="true">
                http://chexed.com/a/Audio_Video_Photo/Installing_Xpand_2_for_Reaper_DAW_id9514o.html
            </guid>
        </item>
    </channel>
</rss>
```

Voici un extrait de code pour la génération du flux RSS :

```php
<?php
header("Content-type: application/xml; charset=utf-8");
echo('<?xml version="1.0" encoding="UTF-8"?>');

include "connexion.php";
$requeteObtenirUtilisateurs = "SELECT id, nom, description, photo from utilisateur";

$resultatRequete = $basededonnees->prepare($requeteObtenirUtilisateurs)->execute();
$utilisateurs = $resultatRequete->fetchAll();

?> 

<rss version="2.0"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
    >

<channel>
    <title>Liste des utilisateurs</title>
    <atom:link href="https://tim.cgmatane.qc.ca/tech/garonmichaud/php/exemple/nouvelles/feed" rel="self" type="application/rss+xml" />
    <link>https://tim.cgmatane.qc.ca/tech/garonmichaud/php/exemple/utilisateurs</link>
    <description>Affichage des utilisateurs</description>
    <lastBuildDate>Fri, 13 Dec 2019 14:27:41 +0000</lastBuildDate>
    <language>fr-CA</language>
    <sy:updatePeriod>hourly</sy:updatePeriod>
    <sy:updateFrequency>1</sy:updateFrequency>
    <generator>Programmation manuelle</generator>

<?php 

    foreach($utilisateurs as $utilisateur)
    {
?>
        <item>
            <title><?=$utilisateur['nom']?></title>
            <link>https://tim.cgmatane.qc.ca/tech/garonmichaud/php/exemple/utilisateurs.php?id=<?=$utilisateur['id']?></link>
            <pubDate>Mon, 18 Mar 2019 14:27:41 +0000</pubDate>
            <category><![CDATA[Utilisateurs]]></category>
            <guid isPermaLink="false">https://tim.cgmatane.qc.ca/tech/garonmichaud/php/exemple/utilisateurs.php?id=<?=$utilisateur['id']?></guid>
            <description>
                <![CDATA[<img src="https://tim.cgmatane.qc.ca/tech/garonmichaud/php/exemple/images/<?=$utilisateur['photo']?>"alt="Image de <?=$utilisateur['nom']?>" /><br>]]>
                <![CDATA[<?=$utilisateur['description']; ?>]]>
            </description>
        </item>
<?php
    }

?>

    </channel>
</rss>

```

Voici un [outil en ligne](https://codebeautify.org/rssviewer#) qui permet de visualiser votre flux RSS. 
