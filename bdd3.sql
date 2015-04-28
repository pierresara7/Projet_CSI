
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT,
  `PSEUDO_ADMIN` varchar(15) NOT NULL,
  `MDP_ADMIN` varchar(15) NOT NULL,
  `EMAIL_ADMIN` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`),
  UNIQUE KEY `ADMINISTRATEUR_PK` (`ID_ADMIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `ID_ADRESSE` int(11) NOT NULL AUTO_INCREMENT,
  `NUM_RUE` int(11) DEFAULT NULL,
  `NOM_VOIE` mediumtext,
  `CP` smallint(6) DEFAULT NULL,
  `VILLE` mediumtext,
  PRIMARY KEY (`ID_ADRESSE`),
  UNIQUE KEY `ADRESSE_PK` (`ID_ADRESSE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `authentificationclient`
--

CREATE TABLE IF NOT EXISTS `authentificationclient` (
  `LOGIN` char(15) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `MDP` char(20) NOT NULL,
  PRIMARY KEY (`LOGIN`),
  UNIQUE KEY `AUTHENTIFICATIONCLIENT_PK` (`LOGIN`),
  KEY `AVOIR3_FK` (`ID_CLIENT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

CREATE TABLE IF NOT EXISTS `avoir` (
  `ID_PROD` int(11) NOT NULL,
  `ID_PRIX` int(11) NOT NULL,
  PRIMARY KEY (`ID_PROD`,`ID_PRIX`),
  KEY `AVOIR_FK` (`ID_PROD`),
  KEY `AVOIR6_FK` (`ID_PRIX`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `avoir`
--

--
-- Structure de la table `avoir`
--



-- --------------------------------------------------------

--
-- Structure de la table `avoir1`
--

CREATE TABLE IF NOT EXISTS `avoir1` (
  `ID_CLIENT` int(11) NOT NULL,
  `ID_ADRESSE` int(11) NOT NULL,
  PRIMARY KEY (`ID_CLIENT`,`ID_ADRESSE`),
  KEY `AVOIR1_FK` (`ID_CLIENT`),
  KEY `AVOIR5_FK` (`ID_ADRESSE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

CREATE TABLE IF NOT EXISTS `bilan` (
  `ID_BILAN` int(11) NOT NULL AUTO_INCREMENT,
  `DATE_DEB_BILAN` date NOT NULL,
  `DATE_FIN_BILAN` date NOT NULL,
  `quantite_panier` int(11) NOT NULL,
  `montant_total` float NOT NULL,
  PRIMARY KEY (`ID_BILAN`),
  UNIQUE KEY `BILAN_PK` (`ID_BILAN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `bilan`
--



-- --------------------------------------------------------

--
-- Structure de la table `categorieproduit`
--

CREATE TABLE IF NOT EXISTS `categorieproduit` (
  `ID_CATPROD` int(11) NOT NULL AUTO_INCREMENT,
  `INTITULE_CAT` varchar(30) NOT NULL,
  PRIMARY KEY (`ID_CATPROD`),
  UNIQUE KEY `CATEGORIEPRODUIT_PK` (`ID_CATPROD`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `ID_CLIENT` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` char(15) NOT NULL,
  `NOM_CLIENT` mediumtext NOT NULL,
  `PRENOM_CLIENT` mediumtext NOT NULL,
  `PSEUDO_CLIENT` varchar(15) NOT NULL,
  `MDP_CLIENT` varchar(15) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `SEXE` char(1) NOT NULL,
  `TEL` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENT`),
  UNIQUE KEY `CLIENT_PK` (`ID_CLIENT`),
  KEY `AVOIR2_FK` (`LOGIN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `estproposer1`
--

CREATE TABLE IF NOT EXISTS `estproposer1` (
  `ID_CLIENT` int(11) NOT NULL,
  `ID_OFFREREDUC` int(11) NOT NULL,
  PRIMARY KEY (`ID_CLIENT`,`ID_OFFREREDUC`),
  KEY `ESTPROPOSER1_FK` (`ID_CLIENT`),
  KEY `ESTPROPOSER3_FK` (`ID_OFFREREDUC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `est_retirer`
--

CREATE TABLE IF NOT EXISTS `est_retirer` (
  `IDHORAIRER` int(11) NOT NULL,
  `IDPANIER` int(11) NOT NULL,
  PRIMARY KEY (`IDHORAIRER`,`IDPANIER`),
  KEY `EST_RETIRER_FK` (`IDHORAIRER`),
  KEY `EST_RETIRER2_FK` (`IDPANIER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hebdomadaire`
--

CREATE TABLE IF NOT EXISTS `hebdomadaire` (
  `ID_BILAN` int(11) NOT NULL,
  `ID_HEBDO` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_BILAN`,`ID_HEBDO`),
  UNIQUE KEY `HEBDOMADAIRE_PK` (`ID_BILAN`,`ID_HEBDO`),
  KEY `HERITAGE_1_FK` (`ID_BILAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hebdomadaire`
--

INSERT INTO `hebdomadaire` (`ID_BILAN`, `ID_HEBDO`) VALUES
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1);

-- --------------------------------------------------------

--
-- Structure de la table `historiser`
--

CREATE TABLE IF NOT EXISTS `historiser` (
  `IDPANIER` int(11) NOT NULL,
  `ID_BILAN` int(11) NOT NULL,
  `DATE_SAUVEGARDE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `MONTANT_TOT_PANIER_VALIDER` float NOT NULL,
  `QUANTITE_TOT_PANIER_VALIDER` float NOT NULL,
  PRIMARY KEY (`IDPANIER`,`ID_BILAN`),
  KEY `HISTORISER_FK` (`IDPANIER`),
  KEY `HISTORISER2_FK` (`ID_BILAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historiser`
--

INSERT INTO `historiser` (`IDPANIER`, `ID_BILAN`, `DATE_SAUVEGARDE`, `MONTANT_TOT_PANIER_VALIDER`, `QUANTITE_TOT_PANIER_VALIDER`) VALUES
(5, 9, '2015-04-26 13:58:35', 0, 0),
(0, 9, '2015-04-26 13:59:35', 0, 0),
(5, 10, '2015-04-26 14:09:57', 0, 0),
(5, 11, '2015-04-26 14:10:44', 0, 0),
(5, 12, '2015-04-26 14:11:23', 0, 0),
(5, 15, '2015-04-26 15:13:09', 0, 0),
(5, 0, '2015-04-26 15:14:56', 0, 0),
(5, 16, '2015-04-26 15:19:44', 0, 0),
(5, 17, '2015-04-26 15:20:46', 0, 0),
(5, 18, '2015-04-26 15:22:38', 0, 0),
(5, 19, '2015-04-26 15:25:10', 0, 0),
(5, 20, '2015-04-26 16:02:52', 0, 0),
(5, 21, '2015-04-26 16:02:52', 0, 0),
(5, 22, '2015-04-26 16:03:41', 0, 0),
(5, 23, '2015-04-26 16:06:25', 0, 0),
(5, 24, '2015-04-26 16:07:00', 0, 0),
(5, 25, '2015-04-26 16:07:09', 0, 0),
(5, 26, '2015-04-26 16:07:57', 0, 0),
(5, 27, '2015-04-26 16:11:15', 0, 0),
(5, 28, '2015-04-26 16:12:02', 0, 0),
(5, 29, '2015-04-26 16:13:11', 0, 0),
(5, 30, '2015-04-26 16:13:53', 0, 0),
(5, 31, '2015-04-26 16:14:25', 0, 0),
(5, 33, '2015-04-26 16:17:59', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `horaireretrait`
--

CREATE TABLE IF NOT EXISTS `horaireretrait` (
  `IDHORAIRER` int(11) NOT NULL AUTO_INCREMENT,
  `HORAIRE_DEB_RETRAIT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `HORAIRE_FIN_RETRAIT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `NBRE_RETRAIT` int(11) NOT NULL,
  PRIMARY KEY (`IDHORAIRER`),
  UNIQUE KEY `HORAIRERETRAIT_PK` (`IDHORAIRER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `journaliere`
--

CREATE TABLE IF NOT EXISTS `journaliere` (
  `ID_BILAN` int(11) NOT NULL,
  `ID_JOURNALIER` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_BILAN`,`ID_JOURNALIER`),
  UNIQUE KEY `JOURNALIERE_PK` (`ID_BILAN`,`ID_JOURNALIER`),
  KEY `HERITAGE_2_FK` (`ID_BILAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `journaliere`
--

INSERT INTO `journaliere` (`ID_BILAN`, `ID_JOURNALIER`) VALUES
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mensuelle`
--

CREATE TABLE IF NOT EXISTS `mensuelle` (
  `ID_BILAN` int(11) NOT NULL,
  `ID_MENSUEL` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_BILAN`,`ID_MENSUEL`),
  UNIQUE KEY `MENSUELLE_PK` (`ID_BILAN`,`ID_MENSUEL`),
  KEY `HERITAGE_3_FK` (`ID_BILAN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `mensuelle`
--

INSERT INTO `mensuelle` (`ID_BILAN`, `ID_MENSUEL`) VALUES
(0, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(33, 1);

-- --------------------------------------------------------

--
-- Structure de la table `offre_promotionnelle`
--

CREATE TABLE IF NOT EXISTS `offre_promotionnelle` (
  `IDOP` int(11) NOT NULL AUTO_INCREMENT,
  `DATEDEBUT_OFFRE` date NOT NULL,
  `DATEFIN_OFFRE` DATE NOT NULL,
  `CODE_PROMOTION` decimal(10,0) NOT NULL,
  `POURCENTAGEOP` float DEFAULT NULL,
  PRIMARY KEY (`IDOP`),
  UNIQUE KEY `OFFRE_PROMOTIONNELLE_PK` (`IDOP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `offre_reductionnelle`
--

CREATE TABLE IF NOT EXISTS `offre_reductionnelle` (
  `ID_OFFREREDUC` int(11) NOT NULL AUTO_INCREMENT,
  `DATE_DEB_REDUC` date not null,
  `DATE_FIN_REDUC` date NOT NULL,
  `POURCENTAGEOR` float NOT NULL,
  PRIMARY KEY (`ID_OFFREREDUC`),
  UNIQUE KEY `OFFRE_REDUCTIONNELLE_PK` (`ID_OFFREREDUC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `IDPANIER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENT` int(11) NOT NULL,
  `MONTANT_TTC` float DEFAULT NULL,
  `STATUT_PANIER` varchar(10) NOT NULL,
  `QUANTITE_PANIER` int(11) NOT NULL,
  `A_REDUCTION` smallint(6) DEFAULT NULL,
  `DATE_COMMANDE` date DEFAULT NULL,
  PRIMARY KEY (`IDPANIER`),
  UNIQUE KEY `PANIER_PK` (`IDPANIER`),
  KEY `APPARTIENT_FK` (`ID_CLIENT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prix_produit`
--

CREATE TABLE IF NOT EXISTS `prix_produit` (
  `ID_PRIX` int(11) NOT NULL AUTO_INCREMENT,
  `PRIX` float DEFAULT NULL,
  PRIMARY KEY (`ID_PRIX`),
  UNIQUE KEY `PRIX_PRODUIT_PK` (`ID_PRIX`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `prix_produit`
--

INSERT INTO `prix_produit` (`ID_PRIX`, `PRIX`) VALUES
(1, 50000),
(2, 53),
(3, 88),
(4, 8585),
(5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `ID_PROD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_OFFREREDUC` int(11) DEFAULT NULL,
  `IDOP` int(11) DEFAULT NULL,
  `ID_CATPROD` int(11) NOT NULL,
  `NOM_PROD` varchar(30) NOT NULL,
  `A_REDUCTION` smallint(6) NOT NULL,
  PRIMARY KEY (`ID_PROD`),
  UNIQUE KEY `PRODUIT_PK` (`ID_PROD`),
  KEY `APPARTENIR_FK` (`ID_CATPROD`),
  KEY `ESTPROPOSER2_FK` (`IDOP`),
  KEY `CONCERNER_FK` (`ID_OFFREREDUC`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`ID_PROD`, `ID_OFFREREDUC`, `IDOP`, `ID_CATPROD`, `NOM_PROD`, `A_REDUCTION`) VALUES
(1, NULL, NULL, 0, 'dqsdqs', 0),
(2, NULL, NULL, 0, 'lkjlkj', 0),
(3, NULL, NULL, 0, 'kjhkh', 0),
(4, NULL, NULL, 0, 'jhkj', 0),
(5, NULL, NULL, 0, 'nbn,b', 0);

CREATE TABLE IF NOT EXISTS `avoir4` (
  `ID_PROD` int(11) NOT NULL,
  `IDPANIER` int(11) NOT NULL,
  QUANTITE_PROD int(11) NOT NULL,
  PRIMARY KEY (`ID_PROD`,`IDPANIER`)
) 