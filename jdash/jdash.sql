-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 16 Février 2015 à 19:28
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `jdash`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `NoPlugin` int(11) NOT NULL,
  `NoCategorie` int(11) NOT NULL,
  PRIMARY KEY (`NoPlugin`,`NoCategorie`),
  KEY `FK_AVOIR_NoCategorie` (`NoCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `NoCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  PRIMARY KEY (`NoCategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `NoUtilisateur` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `noter`
--

CREATE TABLE IF NOT EXISTS `noter` (
  `NoUtilisateur` int(11) NOT NULL,
  `NoPlugin` int(11) NOT NULL,
  PRIMARY KEY (`NoUtilisateur`,`NoPlugin`),
  KEY `FK_NOTER_NoPlugin` (`NoPlugin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `plugin`
--

CREATE TABLE IF NOT EXISTS `plugin` (
  `NoPlugin` int(11) NOT NULL AUTO_INCREMENT,
  `NoCategorie` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `NoUtilisateur` int(11) NOT NULL,
  PRIMARY KEY (`NoPlugin`),
  KEY `FK_Plugin_NoUtilisateur` (`NoUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `telecharger`
--

CREATE TABLE IF NOT EXISTS `telecharger` (
  `NoUtilisateur` int(11) NOT NULL,
  `NoPlugin` int(11) NOT NULL,
  PRIMARY KEY (`NoUtilisateur`,`NoPlugin`),
  KEY `FK_TELECHARGER_NoPlugin` (`NoPlugin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `NoUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `mail` varchar(35) NOT NULL,
  `mail_secondaire` varchar(30) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `question` varchar(25) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`NoUtilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`NoUtilisateur`, `nom`, `prenom`, `mail`, `mail_secondaire`, `tel`, `login`, `password`, `question`, `salt`) VALUES
(1, 'lafosse', 'vincent', 'swip_delta@gmail.com', NULL, NULL, 'ileossa', '21232f297a57a5a743894a0e4a801fc3', 'mdp: admin', ''),
(3, '', '', '', NULL, NULL, 'toto', 'toto', '', ''),
(4, '', '', 'ileossa@mail.fr', NULL, NULL, 'ileossa', '5f98fc29a55280d5ebc60bd1bc0e3971', '', '6a9fa1aee3b0b589845332512cdcf99bccd972130cc787eef52187cd097a52f64312084b73c0688f682252517c400d27e7a61e086b791f08289bd91b6cf129a7'),
(8, '', '', 'toto@mail.fr', NULL, NULL, 'toto', '334d736ae70805da8ffe67fa49d80ccd', '', '456f4ff3722b6f1a8fc6f10574ee43d1e06934c1a89944e6b737847b0f3da69b9b898c06554f7958d59412a99b28335378920ce84a42ca4cfa9cf1232b863bee');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avoir`
--
ALTER TABLE `avoir`
  ADD CONSTRAINT `FK_AVOIR_NoCategorie` FOREIGN KEY (`NoCategorie`) REFERENCES `categorie` (`NoCategorie`),
  ADD CONSTRAINT `FK_AVOIR_NoPlugin` FOREIGN KEY (`NoPlugin`) REFERENCES `plugin` (`NoPlugin`);

--
-- Contraintes pour la table `noter`
--
ALTER TABLE `noter`
  ADD CONSTRAINT `FK_NOTER_NoPlugin` FOREIGN KEY (`NoPlugin`) REFERENCES `plugin` (`NoPlugin`),
  ADD CONSTRAINT `FK_NOTER_NoUtilisateur` FOREIGN KEY (`NoUtilisateur`) REFERENCES `utilisateur` (`NoUtilisateur`);

--
-- Contraintes pour la table `plugin`
--
ALTER TABLE `plugin`
  ADD CONSTRAINT `FK_Plugin_NoUtilisateur` FOREIGN KEY (`NoUtilisateur`) REFERENCES `utilisateur` (`NoUtilisateur`);

--
-- Contraintes pour la table `telecharger`
--
ALTER TABLE `telecharger`
  ADD CONSTRAINT `FK_TELECHARGER_NoPlugin` FOREIGN KEY (`NoPlugin`) REFERENCES `plugin` (`NoPlugin`),
  ADD CONSTRAINT `FK_TELECHARGER_NoUtilisateur` FOREIGN KEY (`NoUtilisateur`) REFERENCES `utilisateur` (`NoUtilisateur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
