-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : Dim 21 mars 2021 à 23:06
-- Version du serveur :  8.0.22
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema`
--
CREATE DATABASE IF NOT EXISTS `cinema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `cinema`;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `id_film` int NOT NULL COMMENT 'Clé primaire de la table film',
  `titre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Le titre du film',
  `resume` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Un résumé du film',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'La description complète',
  `realisateur` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Le nom du réalisateur',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nom de l''image physique'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `resume`, `description`, `realisateur`, `image`) VALUES
(1, 'Avatar', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home.', '\r\nAvatar\r\nOn the upper half of the poster are the faces of a man and a female blue alien with yellow eyes, with a giant planet and a moon in the background and the text at the top: \"From the director of Terminator 2 and Titanic\". Below is a dragon-like animal flying across a landscape with floating mountains at sunset; helicopter-like aircraft are seen in the distant background. The title \"James Cameron\'s Avatar\", film credits and the release date appear at the bottom\r\nTheatrical release poster\r\nDirected by	James Cameron\r\nProduced by	\r\nJames Cameron\r\nJon Landau\r\nWritten by	James Cameron\r\nStarring	\r\nSam Worthington\r\nZoe Saldana\r\nStephen Lang\r\nMichelle Rodriguez\r\nSigourney Weaver\r\nMusic by	James Horner\r\nCinematography	Mauro Fiore\r\nEdited by	\r\nStephen Rivkin\r\nJohn Refoua\r\nJames Cameron\r\nProduction\r\ncompany\r\nLightstorm Entertainment[1]\r\nDune Entertainment[1]\r\nIngenious Film Partners[1]\r\nDistributed by	20th Century Fox[1]\r\nRelease date\r\nDecember 10, 2009 (London premiere)\r\nDecember 17, 2009 (United Kingdom)\r\nDecember 18, 2009 (United States)\r\nRunning time\r\n161 minutes[2]\r\nCountry	\r\nUnited States\r\nUnited Kingdom[3]\r\nLanguage	English\r\nBudget	$237 million[4]\r\n$9 million+ (re-release)[5]\r\nBox office	$2.788 billion[6][7]\r\nAvatar, marketed as James Cameron\'s Avatar, is a 2009 American[8][9] epic science fiction film directed, written, produced, and co-edited by James Cameron, and stars Sam Worthington, Zoe Saldana, Stephen Lang, Michelle Rodriguez, and Sigourney Weaver. The film is set in the mid-22nd century, when humans are colonizing Pandora, a lush habitable moon of a gas giant in the Alpha Centauri star system, in order to mine the mineral unobtanium,[10][11] a room-temperature superconductor.[12] The expansion of the mining colony threatens the continued existence of a local tribe of Na\'vi – a humanoid species indigenous to Pandora. The film\'s title refers to a genetically engineered Na\'vi body operated from the brain of a remotely located human that is used to interact with the natives of Pandora.[13]\r\n\r\nDevelopment of Avatar began in 1994, when Cameron wrote an 80-page treatment for the film.[14][15] Filming was supposed to take place after the completion of Cameron\'s 1997 film Titanic, for a planned release in 1999,[16] but, according to Cameron, the necessary technology was not yet available to achieve his vision of the film.[17] Work on the language of the film\'s extraterrestrial beings began in 2005, and Cameron began developing the screenplay and fictional universe in early 2006.[18][19] Avatar was officially budgeted at $237 million.[4] Other estimates put the cost between $280 million and $310 million for production and at $150 million for promotion.[20][21][22] The film made extensive use of new motion capture filming techniques, and was released for traditional viewing, 3D viewing (using the RealD 3D, Dolby 3D, XpanD 3D, and IMAX 3D formats), and for \"4D\" experiences in select South Korean theaters.[23] The stereoscopic filmmaking was touted as a breakthrough in cinematic technology.[24]\r\n\r\nAvatar premiered in London on December 10, 2009, and was internationally released on December 16 and in the United States and Canada on December 18, to positive critical reviews, with critics highly praising its groundbreaking visual effects.[25][26][27] During its theatrical run, the film broke several box office records and became the highest-grossing film of all time, as well as in the United States and Canada,[28] surpassing Cameron\'s Titanic, which had held those records for twelve years.[29] It also became the first film to gross more than $2 billion[30] and the best-selling film of 2010 in the United States. Avatar was nominated for nine Academy Awards, including Best Picture and Best Director,[31] and won three, for Best Art Direction, Best Cinematography and Best Visual Effects.\r\n\r\nFollowing the film\'s success, Cameron signed with 20th Century Fox to produce four sequels: Avatar 2 and Avatar 3 are currently filming, and will be released on December 18, 2020, and December 17, 2021, respectively; subsequent sequels will start shooting as soon as they wrap filming, and will be released in 2024 and 2025.[32] Several cast members are expected to return, including Worthington, Saldana, Lang, and Weaver.', 'James Cameron', 'placeholder-image.png'),
(2, 'Retour vers le futur', 'L\'intrigue relate le voyage dans le passé d\'un adolescent, Marty McFly, à bord d\'une machine à voyager dans le temps fabriquée par le docteur Emmett Brown à partir d\'une voiture de modèle DeLorean DMC-12. Parti de l\'année 1985 et propulsé en 1955, Marty, aidé du « Doc » de 1955, doit résoudre les paradoxes temporels provoqués par ses interventions dans le passé et trouver le moyen de faire fonctionner la machine pour retourner à son époque d\'origine.', '\r\nDécor de la façade de l\'Hôtel de ville de Hill Valley dans le film, avec son horloge.\r\nHill Valley, le 25 octobre 1985. Marty McFly, adolescent typique des années 1980, mène une existence d\'un garçon de son âge. Son père, George McFly, timide, couard, et ne supportant pas le conflit, s\'écrase sans cesse devant son chef de bureau, Biff Tannen, qui l\'oblige à rédiger ses propres comptes-rendus. Sa mère, Lorraine Baines McFly, boit beaucoup, son mariage avec George lui pesant ; très possessive, elle s\'indigne que son fils sorte avec Jennifer et lui fait souvent des remontrances. Marty a un frère, Dave, et une sœur, Linda.\r\n\r\nMarty a pour ami un extravagant scientifique, le docteur Emmett Brown, dit « Doc ». Ce dernier a mis au point une machine à voyager dans le temps au terme de trente ans de recherches, machine prenant la forme d\'une voiture DeLorean DMC-12 modifiée (parce que, explique-t-il, « quitte à voyager à travers le temps au volant d\'une voiture, autant en choisir une qui ait de la gueule ! »). Un soir, sur un parking d\'un centre commercial, Doc invite Marty à venir le rejoindre pour lui faire une démonstration de son invention, et envoie son propre chien Einstein une minute en avance dans le temps, sous l\'œil effaré de Marty. Il lui explique que la machine a besoin de plutonium pour alimenter en énergie le convecteur temporel de la DeLorean — le dispositif qui permet de voyager dans le temps —, celui-ci ayant besoin de 1,21 gigawatts (2,21 en VF)Note 1 d’énergie électrique pour fonctionner.\r\n\r\nPeu après, des terroristes libyens surgissent en fourgonnette et abattent Doc, car ce dernier les avait trompés en leur subtilisant le plutonium, qu\'il devait utiliser pour leur construire une bombe. Marty, qui s\'était caché, s\'échappe avec la voiture, poursuivi par les Libyens. Lors de la poursuite, il met involontairement en marche les circuits temporels de la DeLorean ; franchissant la barre des 88 miles par heure (141,62 km/h) avec la voiture — vitesse nécessaire pour activer le convecteur temporel —, il se retrouve projeté à Hill Valley à la dernière date entrée par Doc sur le boitier de contrôle du convecteur, date correspondant au matin de la révélation qui l\'a amené à créer celui-ci… le 5 novembre 1955. Marty « atterrit », trente ans en arrière, dans la grange d\'un fermier, qui, le prenant pour un martien du fait de sa tenue (combinaison anti-radiations jaune avec un énorme casque et un masque à gaz), lui tire dessus au fusil de chasse. Marty se sauve avec la DeLorean.\r\n\r\n\r\nDécor du Lyon Estate, lieu de résidence de la famille McFly dans le film.\r\nMarty, déboussolé, poursuit sa route mais, reprenant ses esprits, freine brutalement et arrive devant le « Lotissement Lyon » — le lieu où il habite en 1985 —, à cette époque encore un lotissement en construction. Puis, il se rend en ville où il croise ses parents, qui, en 1955 sont encore des adolescents. Tout d\'abord, il rencontre son père Georges dans un café et le sauve ensuite d\'un accident de la circulation, étant renversé à sa place par la voiture de son futur grand-père maternel, et tombe inconscient. Marty se réveille le soir, neuf heures plus tard, dans la chambre de sa mère, Lorraine Baines, alors une adolescente en fleur ; celle-ci tombe sous le charme de Marty, au grand effarement de celui-ci. Invité à rester manger à la maison des Baines, il part en catastrophe quand sa mère (qui ne sait évidemment pas que c\'est son fils) commence à le draguer avec insistance.', 'Robert Zemeckis', 'placeholder-image.png'),
(3, 'Forest Gump', 'Forrest Gump est une comédie dramatique américaine réalisée par Robert Zemeckis, sortie en 1994. Il s’agit de l’adaptation du roman éponyme de Winston Groom (1986).\r\n\r\nLe film relate l\'histoire mouvementée des États-Unis entre les années 1950 et les années 1980 au travers du regard d\'un « simple d\'esprit », Forrest Gump, qui devient involontairement l\'acteur central, voire l\'instigateur des principaux événements de cette époque en Amérique.', 'Le film débute par la scène où une plume d\'oiseau, volant dans les airs, atterrit aux pieds de Forrest Gump, un jeune homme simplet, assis sur un banc dans la ville de Savannah, en Géorgie, attendant le bus. Au fil des différents interlocuteurs qui viennent s’asseoir tour à tour à côté de lui sur le banc, Forrest Gump va raconter la fabuleuse histoire de sa vie. Sa vie est à l\'image de la plume (que l\'on aperçoit au début et à la fin du film) qui se laisse porter par le vent, tout comme Forrest se laisse porter par les événements qu\'il traverse dans l\'Amérique de la seconde moitié du xxe siècle.\r\n\r\n\r\nCarte des États-Unis ou figure le trajet de Forrest Gump quand celui-ci se met à courir sans s\'arrêter pendant des années.\r\nDe son enfance, mis à l\'écart par les enfants de son âge à cause de ses handicaps mentaux et physiques, jusqu\'au moment où, devenu milliardaire, il raconte son histoire, Forrest Gump sera tour à tour champion de football américain, diplômé d\'une université, soldat durant la guerre du Viêt Nam (recevant la médaille d\'Honneur du Congrès), champion de ping-pong dans l\'équipe militaire américaine, capitaine de crevettier, marathonien exceptionnel (courant sans s\'arrêter pendant plus de trois ans) et fera la couverture du magazine Fortune.\r\n\r\nSe trouvant au cœur des principaux événements de l\'histoire des États-Unis entre les années 1950 et 1980, il en devient un des acteurs décisifs de cette époque, bien qu\'involontairement, inspirant notamment à Elvis Presley sa façon de se déhancher, à John Lennon les paroles d’Imagine, étant reçu à la Maison-Blanche par trois présidents successifs, participant à la reprise des relations diplomatiques entre la Chine et les États-Unis, révélant à son insu le scandale du Watergate et étant à l\'origine de quelques-unes des principales tendances socio-culturelles des années 1980.', 'Robert Zemeckis', 'placeholder-image.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT COMMENT 'Clé primaire de la table film', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
