<?php
include "connexion.php"; 
$MESSAGE_SQL_LISTE_FILM = "SELECT id, titre, resume, realisateur from film";
$requeteListeFilms = $basededonnees->prepare($MESSAGE_SQL_LISTE_FILM);
$requeteListeFilms->execute();
$listeFilms = $requeteListeFilms->fetchAll();
print_r($listeFilms);

// https://support.google.com/webmasters/answer/183668?hl=en
?>

<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
  <url>
    <loc>http://localhost/cinema-referencement/</loc>
    <lastmod>2019-03-23</lastmod>
  </url>
  <url>
    <loc>http://localhost/cinema-referencement/liste-films.php</loc>
    <lastmod>2019-03-23</lastmod>
  </url>

  <?php 
  foreach($listeFilms as $film)
  {
  ?>
  <url>
    <loc>http://localhost/cinema-referencement/film.php?film=<?=$film['id']?></loc>
    <lastmod>2019-03-23</lastmod>
  </url>  
  <?php 
  }
  ?>
  
  
  
</urlset>