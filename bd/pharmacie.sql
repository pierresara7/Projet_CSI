-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 16 Juin 2014 à 18:29
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `pharmacie`
--
CREATE DATABASE IF NOT EXISTS `pharmacie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pharmacie`;

-- --------------------------------------------------------

--
-- Structure de la table `bon_commande`
--

CREATE TABLE IF NOT EXISTS `bon_commande` (
  `idbc` int(11) NOT NULL AUTO_INCREMENT,
  `idfour` int(11) NOT NULL,
  `datecom` date NOT NULL,
  `dateliv` date NOT NULL,
  PRIMARY KEY (`idbc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `bon_commande`
--

INSERT INTO `bon_commande` (`idbc`, `idfour`, `datecom`, `dateliv`) VALUES
(1, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idcli` int(11) DEFAULT NULL,
  `nomcli` varchar(30) NOT NULL,
  `pnomcli` varchar(30) NOT NULL,
  `adrcli` varchar(30) NOT NULL,
  `telcli` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idcli`, `nomcli`, `pnomcli`, `adrcli`, `telcli`) VALUES
(0, 'Fall', 'Adama', 'Mermouz', '77 7975211');

-- --------------------------------------------------------

--
-- Structure de la table `commande_client`
--

CREATE TABLE IF NOT EXISTS `commande_client` (
  `idcom` int(11) NOT NULL,
  `idcli` int(11) NOT NULL,
  `datecom` date NOT NULL,
  `dateliv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande_client`
--

INSERT INTO `commande_client` (`idcom`, `idcli`, `datecom`, `dateliv`) VALUES
(0, 0, '2014-06-16', '2014-06-17');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `idfour` int(11) NOT NULL AUTO_INCREMENT,
  `nomfour` varchar(30) NOT NULL,
  `pnomfour` varchar(30) NOT NULL,
  `adrfour` varchar(30) NOT NULL,
  `telfour` varchar(30) NOT NULL,
  `societe` varchar(30) NOT NULL,
  PRIMARY KEY (`idfour`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_client`
--

CREATE TABLE IF NOT EXISTS `ligne_client` (
  `idlign_com` int(11) NOT NULL AUTO_INCREMENT,
  `idcom` int(11) NOT NULL,
  `refprod` int(11) NOT NULL,
  `qtecom` varchar(30) NOT NULL,
  `qteliv` varchar(30) NOT NULL,
  `prixcom` varchar(30) NOT NULL,
  `montant_com` varchar(30) NOT NULL,
  `montant_paye` varchar(30) NOT NULL,
  PRIMARY KEY (`idlign_com`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lign_bon`
--

CREATE TABLE IF NOT EXISTS `lign_bon` (
  `idlign_bon` int(11) NOT NULL AUTO_INCREMENT,
  `idcom` int(11) NOT NULL,
  `refprod` int(11) NOT NULL,
  `qtecom` varchar(30) NOT NULL,
  `qteliv` varchar(30) NOT NULL,
  `prixcom` varchar(20) NOT NULL,
  `montant_com` varchar(20) NOT NULL,
  `montant_pay` varchar(20) NOT NULL,
  PRIMARY KEY (`idlign_bon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `refprod` int(11) NOT NULL AUTO_INCREMENT,
  `libprd` varchar(50) NOT NULL,
  `qtestock` varchar(20) NOT NULL,
  `prix` varchar(20) NOT NULL,
  PRIMARY KEY (`refprod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`refprod`, `libprd`, `qtestock`, `prix`) VALUES
(1, 'ParacÃ©tamol', '100', '1600');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
