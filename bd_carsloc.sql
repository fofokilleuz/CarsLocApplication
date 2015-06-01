-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Client: 127.7.22.130:3306
-- Généré le: Lun 01 Juin 2015 à 18:10
-- Version du serveur: 5.5.41
-- Version de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `carsloc`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `id_avis` int(11) NOT NULL AUTO_INCREMENT,
  `avis` text NOT NULL,
  `id` int(11) NOT NULL,
  `id_membre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_avis`),
  KEY `id` (`id`,`id_membre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`id_avis`, `avis`, `id`, `id_membre`) VALUES
(8, 'Super voiture ! Nous sommes allés visiter Cannes, elle nous a super bien guidé et conseillé. Sans elle nous n''aurions pas trouvé tous ces coins sympas!\nJe recommande !!!', 29, 'geoffray.faustine@hotmail.fr'),
(11, 'Loué un jour, je suis allé dans un circuit du coin, Flash m''a fait frétiller jusqu''aux orteils !', 39, 'jesuisun@pilote.fr'),
(9, 'super discrète pour une filature ! ', 37, 'geoffray.faustine@hotmail.fr'),
(10, 'Cette voiture est tout simplement incroyable!', 37, 'geoffray.faustine@hotmail.fr');

--
-- Déclencheurs `avis`
--
DROP TRIGGER IF EXISTS `triggernbavis`;
DELIMITER //
CREATE TRIGGER `triggernbavis` BEFORE INSERT ON `avis`
 FOR EACH ROW BEGIN
	DECLARE nbavisfin INT;

	SELECT nbavis INTO nbavisfin FROM voiture
		WHERE voiture.id=NEW.id;

	IF nbavisfin>=0 THEN
		UPDATE voiture SET nbavis=nbavisfin+1
		WHERE voiture.id=NEW.id;
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `nocontrat` int(11) NOT NULL AUTO_INCREMENT,
  `datedeb` date NOT NULL,
  `datefin` date NOT NULL,
  `prixt` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `nom` text NOT NULL,
  `idsup` text NOT NULL,
  PRIMARY KEY (`nocontrat`),
  KEY `id_membre` (`id_membre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `location`
--

INSERT INTO `location` (`nocontrat`, `datedeb`, `datefin`, `prixt`, `id_membre`, `nom`, `idsup`) VALUES
(29, '2015-06-01', '2015-06-02', 120, 11, 'Flash McQueen', '4'),
(13, '2015-05-30', '2015-05-31', 150, 1, 'Vitaly Petrov', '4'),
(19, '2015-07-22', '2015-07-25', 450, 1, 'Lewis Hamilton', '4'),
(18, '2015-07-22', '2015-07-25', 360, 1, 'Flash McQueen', '4'),
(28, '2015-06-10', '2015-06-11', 100, 1, 'Martin', '4');

--
-- Déclencheurs `location`
--
DROP TRIGGER IF EXISTS `triggernbLoc`;
DELIMITER //
CREATE TRIGGER `triggernbLoc` BEFORE INSERT ON `location`
 FOR EACH ROW BEGIN
	DECLARE nbLocfin INT;

	SELECT nbLoc INTO nbLocfin FROM membres 
		WHERE membres.id_membre=NEW.id_membre;

	IF nbLocfin>=0 THEN
		UPDATE membres SET nbLoc=nbLocfin+1 
		WHERE membres.id_membre=NEW.id_membre;
	END IF;
	IF nbLocfin>3 THEN
		UPDATE membres SET categorie='pilote'
		WHERE membres.id_membre=NEW.id_membre;
	END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id_membre` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mot_passe` varchar(45) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `categorie` set('débutant','pilote') NOT NULL DEFAULT 'débutant',
  `nbLoc` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `nom`, `prenom`, `email`, `mot_passe`, `tel`, `categorie`, `nbLoc`) VALUES
(1, 'geoffray', 'faustine', 'geoffray.faustine@hotmail.fr', '965e67d1db51f440ead9404b696cfbf2bf7cec81', '0667046188', 'pilote', 4),
(3, 'Testes', 'Valentin', 'testes_valentin@hotmail.fr', 'f8dc3bb5778368f648d967adcd012a6f78abf2d6', '0603038830', 'débutant', 0),
(4, 'Faure', 'Pierre-Louis', 'plouis.faure@gmail.com', '533ea2599cf1ce590688156cc4c584a1e1c69561', '0665647478', 'débutant', 0),
(5, 'polo', 'marco', 'marco@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', '06060606066', 'débutant', 0),
(6, 'Licette', 'AurÃ©lien', 'aurioslios@hotmail.fr', 'bfb766dc8a8d20713dbee521394d28de4c0bc055', '0659335251', 'débutant', 0),
(7, 'Lama', 'Master', 'lama@gmail.com', '7fe3c01c6cc5490b2b21aab40dbe0b4abba5eb57', '0607080901', 'débutant', 0),
(8, 'aaa', 'aaa', 'aaa@aaa.aaa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aaa', 'débutant', 0),
(10, 'test', 'testest', 'Test@laposte.net', '9cf95dacd226dcf43da376cdb6cbba7035218921', '0628801747', 'débutant', 0),
(11, 'Shumi', 'Mickael', 'jesuisun@pilote.fr', 'b529c9375b69feb37ea26cf2d31ccfea4ba540fd', '0606050522', 'débutant', 1);

-- --------------------------------------------------------

--
-- Structure de la table `supplement`
--

CREATE TABLE IF NOT EXISTS `supplement` (
  `idsup` int(11) NOT NULL AUTO_INCREMENT,
  `prixs` float NOT NULL,
  `lib` text NOT NULL,
  PRIMARY KEY (`idsup`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `supplement`
--

INSERT INTO `supplement` (`idsup`, `prixs`, `lib`) VALUES
(1, 50, 'Décoration mariage'),
(2, 30, 'Pack détective basique'),
(3, 60, 'Pack détective Premium'),
(4, 0, 'Aucun supplément');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `marque` text NOT NULL,
  `modele` text NOT NULL,
  `annee` int(11) NOT NULL,
  `prixj` float NOT NULL,
  `com` mediumtext NOT NULL,
  `photo` text NOT NULL,
  `nbavis` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `nom` (`nom`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`id`, `nom`, `marque`, `modele`, `annee`, `prixj`, `com`, `photo`, `nbavis`) VALUES
(37, 'Lewis Hamilton', 'Bat', 'Man', 1996, 150, 'Lewis Hamilton, champion des courses d''endurance, est un vainqueur dans l''âme depuis toujours. Comme toutes les jeunes voitures, il a passé son enfance à  l''école, a pris des cours de karaté, et il a même remporté le Championnat de Karting Britannique alors qu''il n''avait que 10 ans. Sportif jusqu''au bout des pare-chocs, illustrant parfaitement le flegme britannique sur les circuits, il représente la Grande-Bretagne au Grand Prix Mondial. Il porte aussi les couleurs de Grenade, que sa famille a quittée dans les années 50 pour s''installer en Angleterre.', '5569d4e032d42.jpg', 2),
(36, 'Miguel Camino', 'Cariola', 'Delavega', 2008, 145, 'La voiture la plus connue, la plus admirée et la plus captivante d''Espagne est Miguel Camino, de Pampelune. C''est en participant à  la célèbre Course des Bulldozers qu''il attira l''attention dans son pays natal. Dans l''arène, son style, sa vitesse et sa classe de toréador a inspiré une génération entière de jeunes toreros intrépides. Portant le numéro 5, sous les couleurs flamboyantes du drapeau espagnol, Miguel Camino espère se faire une place au sommet du Grand Prix.', '5569d297eb295.jpg', 0),
(28, 'Max Schnell', 'DasAuto', 'Berline', 2012, 180, 'Max Schnell débuta sa carrière comme simple berline de série, à Stuttgart en Allemagne. Grand amateur de course, Max finit par attirer l''attention d''une équipe pro. Bientôt, il fit ses premiers tours dans le circuit professionnel. Équipé d''un nouveau moteur, il se convertit à la fibre de carbone, ce qui l''aide à perdre du poids et à être en excellente forme. Il remporte plus de courses sur le Motorheimring que n''importe quelle voiture du World Torque Champion League. Ingénieur-né, il use de logique et d''analyse afin d''affiner ses réglages.', '5568bab819ed7.jpg', 0),
(24, 'Finn McMissile', 'ChocEspion', 'XC3000', 2008, 120, 'Finn McMissile est un super espion britannique. Charmeur, insaisissable, c''est un maître de la mission secrète. Son intelligence et ses années d''expérience opérationnelle en font un cauchemar pour tous les méchants, dont il passe son temps à faire capoter les plans avant de disparaitre spectaculairement. Sa carrosserie d''une élégance intemporelle cache tout un arsenal d''armes et de gadgets ultra-cool : grappins avant et arrière, lance-missiles, mines magnétiques, module de déguisement holographique.', '556815d9a0a67.jpg', 0),
(29, 'Holley Shiftwell', 'LuxurHost', 'D95', 2010, 130, 'Charmante hôtesse d''accueil anglaise, Holley Shiftwell s''est transformée en apprentie espionne à Tokyo. Cultivée, raffinée, elle connait toutes les ficelles du métier, ou du moins, elle a lu tous les manuels. Elle est équipée de la panoplie complète des derniers gadgets d''espion, depuis les caméras cachées aux armes dissimulées, jusqu''à un bras télescopique multi-usage et un paravent holographique. Holley est un agent très motivé, mais elle vient juste de sortir de l''école, et son expérience se résume à un savoir théorique.', '5568bcbb3d40d.jpg', 1),
(31, 'Raoul Caroule', 'Coupdevent', 'Rafale', 1986, 150, 'Connu pour être la plus grande voiture de rallye du monde, Raoul Caroule porte fièrement le numero 6. Né en Alsace, ce champion rugissant a fait partie du célèbre "Cirque de Voitures Français" où il a appris le gymkhana, une discipline sportive aussi élégante que surprenante qui lui permet de maitriser une conduite d''une extrème précision. Pilote expert, il n''a pas son pareil pour évoluer avec aisance dans les courses les plus difficiles. Il est le premier à avoir gagné neuf rallyes consécutifs. ', '55696e88028c9.jpg', 0),
(34, 'Martin', 'Larouille', 'Utile', 1990, 100, 'Martin, la fidèle dépanneuse rouillée, adore raconter les histoires et les légendes du coin et personne ne connait mieux le coeur et l''âme de la ville que lui. Enthousiaste, honnête et loyal jusqu''à  son dernier boulon, Martin se précipitera pour vous soutenir, ce qui finira par priver celui-ci d''un repos bien mérité pour participer au très prestigieux Grand Prix Mondial. ', '5569cca822f36.jpg', 0),
(38, 'Francesco Bernouilli', 'Panzani', 'Inimitable', 2006, 250, 'Francesco Bernoulli a grandi à côté du fameux circuit de Monza en Italie. Lui et ses amis s''y faufilaient et faisaient la course dans les célèbres virages et bancs de sable de cette piste incroyablement rapide. Il se fit instantanément un nom dans le circuit amateur et devint rapidement un champion international de Formule 1. Les dames adorent les enjoliveurs de Francesco, les jeunes admirent son esprit de compétition et les autres coureurs envient sa rapidité. Mais le plus grand fan de Francesco, c''est Francesco lui-même.', '5569d77719cb3.jpg', 0),
(39, 'Flash McQueen', 'Express', 'ZX6', 2001, 120, 'Flash McQueen (Flash pour les intimes) habite à  Radiator Springs, il est connu dans le monde entier pour avoir remporté quatre Piston Cup. Il goûte les joies d''une vie paisible aux côtés de sa douce Sally, de son meilleur ami Martin et de tous ses amis de Radiator Springs. Il a fait le tour du monde avec Martin en remorque : Japon, Italie, Angleterre... </br>\nL''aventure c''est sa vie !</br>\nRepeint à  neuf et équipé de tout nouveaux phares, Flash McQueen éclairera votre séjour. ', '5569db51e4686.jpg', 1),
(40, 'Vitaly Petrov', 'Moskovitch', 'Derap', 1990, 150, 'Vitaly Petrov est l''unique voiture de course russe à participer au Formula World Championship. Cependant, il n''a pas commencé comme coureur de Formule 1. En effet, les sports automobiles étaient peu répandus à  Vyborg, la ville d''origine de Vitaly, qui s''est principalement entrainé dans des courses de rallye ou sur glace. Après avoir remporté le Russian Rally, Vitaly a gagné toutes les courses de la Russian Lada Cup. Très vite, le coureur a fait partie des meilleurs grâce à  ses nombreuses victoires en Formule 1. Sa rapidité et ses succès lui ont valu le surnom de « Fusée de Vyborg ».', '5569dd2730d44.jpg', 0),
(41, 'Shu Todoroki', 'Kazuki', 'Tomoya', 2000, 160, 'Shu Todoroki court pour le Japon au Grand Prix Mondial et porte le numéro 7. Ayant grandi au pied du mont Asama, un volcan japonais, il en a le tempérament et s''est vite imposé comme un champion sur le circuit de Suzuka. Ses lignes élégantes sont soulignéees par un impressionnant dragon rouge : tout comme cette légendaire créature, Shu est un concenté d''énergie et de férocité sur les circuits. Son coach, une Mazda, a été la seule voiture japonaise à  remporter les 24 Heures du Mans.', '5569ded4e0c63.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
