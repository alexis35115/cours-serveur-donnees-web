<?php

include "connexion.php"; // copie-colle le code qui est dans connexion
// prepare l'objet $basededonnees pour qu'on puisse parler à la base de données

$MESSAGE_SQL_LISTE_FILM = "SELECT id, titre, resume, realisateur from film";
//echo $MESSAGE_SQL_LISTE_FILM;

$requeteListeFilms = $basededonnees->prepare($MESSAGE_SQL_LISTE_FILM);
$requeteListeFilms->execute();
$listeFilms = $requeteListeFilms->fetchAll();
print_r($listeFilms);
echo '<?xml version="1.0" encoding="UTF-8"?>';
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
	<title>Liste des nouveaux films</title>
	<atom:link href="http://localhost/journal/feed/" rel="self" type="application/rss+xml" />
	<link>http://localhost/cinema-referencement/</link>
	<description>Les meilleurs films de l'annee</description>
	<lastBuildDate>Mon, 18 Mar 2019 14:27:41 +0000	</lastBuildDate>
	<language>fr-CA</language>
	<sy:updatePeriod> hourly	</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator>Programmation manuelle</generator>
<?php 

	foreach($listeFilms as $film)
	{
	?>
	<item>
		<title><?=$film['titre']?></title>
		<link>http://localhost/cinema-referencement/film.php?film=<?=$film['id']?></link>
		<pubDate>Mon, 18 Mar 2019 14:27:41 +0000</pubDate>
		<category><![CDATA[Film]]></category>
		<guid isPermaLink="false">http://localhost/cinema-referencement/film.php?film=<?=$film['id']?></guid>
		<description><![CDATA[<?=$film['resume']; ?>]]></description>
		<content:encoded><![CDATA[<?=$film['resume']; ?>]]></content:encoded>
	</item>
	<?php
	}

?>
							
	</channel>
</rss>