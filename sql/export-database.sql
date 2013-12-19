-- phpMyAdmin SQL Dump
-- version 4.1.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 19 Décembre 2013 à 12:32
-- Version du serveur :  5.5.34-MariaDB-log
-- Version de PHP :  5.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `guillemine`
--

-- --------------------------------------------------------

--
-- Structure de la table `expositions`
--

CREATE TABLE IF NOT EXISTS `expositions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `debut` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `lieu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `expositions`
--

INSERT INTO `expositions` (`id`, `nom`, `debut`, `fin`, `lieu`) VALUES
(1, 'Inauguration du restaurant "Le donjon"', NULL, NULL, 'Argentan'),
(2, 'Vernissage avec le Lions club Léopard', '2012-05-18', NULL, 'Place des Art, 9 rue des Croisiers, Caen'),
(3, 'Vernissage Galerie de Tourgeville', NULL, NULL, 'Tourgeville'),
(4, 'Exposition Hôtel de Banville', '2013-06-07', '2013-06-29', '22, rue Jean Eudes, Caen');

-- --------------------------------------------------------

--
-- Structure de la table `galeries`
--

CREATE TABLE IF NOT EXISTS `galeries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `annee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `galeries`
--

INSERT INTO `galeries` (`id`, `nom`, `annee`) VALUES
(1, 'Quand le noir et blanc invite le taupe', 2013),
(2, 'Une touche de couleur', 2012),
(3, 'Éclats', 2011),
(4, 'Gris béton', 2010),
(5, 'Expression du spalter', 2010),
(6, 'Zénitude', 2009),
(7, 'La force du rouge', 2008),
(8, 'Sphères', NULL),
(9, 'Centre', 2009),
(10, 'Nébuleuse', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `oeuvres`
--

CREATE TABLE IF NOT EXISTS `oeuvres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `largeur` int(11) DEFAULT NULL,
  `longueur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `oeuvres`
--

INSERT INTO `oeuvres` (`id`, `nom`, `largeur`, `longueur`) VALUES
(1, 'Œuvre commandée 120 P', 114, 195),
(2, 'Commande 100F', 130, 162);

-- --------------------------------------------------------

--
-- Structure de la table `peintures`
--

CREATE TABLE IF NOT EXISTS `peintures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `largeur` float DEFAULT NULL,
  `hauteur` float DEFAULT NULL,
  `annee` int(4) DEFAULT NULL,
  `technique` varchar(50) DEFAULT NULL,
  `commentaire` varchar(2000) DEFAULT NULL,
  `id_galerie` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_galerie` (`id_galerie`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `peintures`
--

INSERT INTO `peintures` (`id`, `nom`, `largeur`, `hauteur`, `annee`, `technique`, `commentaire`, `id_galerie`, `type`) VALUES
(1, 'Éclaircie', 72.5, 100, NULL, NULL, NULL, 1, 1),
(2, 'Architecture', 81, 100, NULL, NULL, NULL, 1, 1),
(3, 'Nouveau souffle', 72.5, 100, NULL, NULL, NULL, 1, 1),
(4, 'Échanges (2)', 89, 116, NULL, NULL, NULL, 1, 1),
(5, 'Échanges', 89, 116, NULL, NULL, NULL, 1, 1),
(6, 'Fenêtre de vie', 81, 116, NULL, NULL, NULL, 1, 1),
(7, 'Architecture', 81, 100, NULL, NULL, NULL, 1, 1),
(8, 'Nouveau souffle (2)', 72.5, 100, NULL, NULL, NULL, 1, 1),
(9, 'Fluidité', 89, 116, NULL, NULL, NULL, 1, 1),
(10, 'Nouveau Monde', 89, 125, NULL, NULL, NULL, 1, 1),
(11, 'Mirage', 73, 100, NULL, NULL, NULL, 1, 1),
(12, 'Équilibre', 72.5, 116, NULL, NULL, NULL, 2, 1),
(13, 'Fusion', 72.5, 116, NULL, NULL, NULL, 2, 1),
(14, 'Étincelles', NULL, NULL, NULL, NULL, NULL, 3, 1),
(15, 'Régénérescence', NULL, NULL, NULL, NULL, NULL, 3, 1),
(16, 'Chaleur', 80, 80, NULL, NULL, NULL, 4, 1),
(17, 'Création', 90, 90, NULL, NULL, NULL, 4, 1),
(18, 'Horizon', 92, 73, NULL, NULL, NULL, 4, 1),
(19, 'Labyrinthe', 81, 100, NULL, NULL, NULL, 4, 1),
(20, 'Miroir', 80, 116, NULL, NULL, NULL, 5, 1),
(21, 'Libération', 81, 116, NULL, NULL, NULL, 5, 1),
(22, 'Éclats', 81, 116, NULL, NULL, NULL, 5, 1),
(23, 'Zénitude', 116, 89, NULL, NULL, NULL, 6, 1),
(24, 'Écritures lointaines', 90, 90, NULL, NULL, NULL, 7, 1),
(25, 'Émergence', 80, 80, NULL, NULL, NULL, 7, 1),
(26, 'Liberté', 50, 50, NULL, NULL, NULL, 7, 1),
(27, 'Silhouettes amérindiennes', 701, 70, NULL, NULL, NULL, 7, 1),
(28, 'Puissance', 81, 100, NULL, NULL, NULL, 8, 1),
(29, 'Source', 73, 116, NULL, NULL, NULL, 8, 1),
(30, 'Comme une ville qui prend vie', 50, 100, 2008, NULL, NULL, 9, 1),
(31, 'Suspension azur', 80, 80, NULL, NULL, NULL, 9, 1),
(32, 'Nébuleuse', 70, 70, NULL, NULL, NULL, 10, 1),
(33, 'Œuvre commandée 120 P', 114, 195, NULL, NULL, NULL, 1, 2),
(34, 'Œuvre commandée 120 P', 114, 195, NULL, NULL, NULL, 1, 2),
(35, 'Œuvre commandée 120 P', 114, 195, NULL, NULL, NULL, 1, 2),
(36, 'Œuvre commandée 120 P', 114, 195, NULL, NULL, NULL, 1, 2),
(37, 'Œuvre commandée 120 P', 114, 195, NULL, NULL, NULL, 1, 2),
(38, 'Œuvre commandée 120 P', 114, 195, NULL, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_exposition` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_exposition` (`id_exposition`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `nom`, `id_exposition`) VALUES
(1, '', 2),
(2, '', 2),
(3, '', 2),
(4, '', 2),
(5, '', 2),
(6, '', 2),
(7, '', 2),
(8, '', 2),
(9, '', 2),
(10, '', 2),
(11, '', 3),
(12, '', 3),
(13, '', 3),
(14, '', 3),
(15, '', 3),
(16, '', 1),
(17, '', 1),
(18, '', 1),
(19, '', 1),
(20, '', 1),
(21, '', 1),
(22, '', 4),
(23, '', 4),
(24, '', 4);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `peintures`
--
ALTER TABLE `peintures`
  ADD CONSTRAINT `peintures_ibfk_1` FOREIGN KEY (`id_galerie`) REFERENCES `galeries` (`id`);

--
-- Contraintes pour la table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`id_exposition`) REFERENCES `expositions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
