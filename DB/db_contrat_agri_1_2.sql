-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 03, 2021 at 12:15 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_contrat_agri_1.1`
--

-- --------------------------------------------------------

--
-- Table structure for table `codeur`
--

DROP TABLE IF EXISTS `codeur`;
CREATE TABLE IF NOT EXISTS `codeur` (
  `code` varchar(100) NOT NULL,
  `nbre` varchar(100) NOT NULL,
  `id_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codeur`
--

INSERT INTO `codeur` (`code`, `nbre`, `id_code`) VALUES
('yeswecan', '155', '00001');

-- --------------------------------------------------------

--
-- Table structure for table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
CREATE TABLE IF NOT EXISTS `contrat` (
  `num_contrat` varchar(200) NOT NULL,
  `objet_contrat` varchar(100) NOT NULL,
  `delai_execution` varchar(100) NOT NULL,
  `source_finance` varchar(100) NOT NULL,
  `exercice` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `chapitre` varchar(100) NOT NULL,
  `nature` varchar(100) NOT NULL,
  `approuv_par` varchar(100) NOT NULL,
  `representant_dfm` varchar(100) NOT NULL,
  `total_ht` varchar(100) NOT NULL,
  `tva` varchar(100) NOT NULL,
  `nb_produit` varchar(100) NOT NULL,
  `total_ttc` varchar(100) NOT NULL,
  `enlettre` varchar(500) NOT NULL,
  `id2` varchar(100) NOT NULL,
  `date_contrat` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `id_titulaire` varchar(200) NOT NULL,
  `fonction` varchar(200) NOT NULL,
  `fonction_approuv` varchar(200) NOT NULL,
  `conclu_par` varchar(200) NOT NULL,
  `nom_conlu_par` varchar(200) NOT NULL,
  `profession_conclu` varchar(200) NOT NULL,
  `pourcentage_tva` varchar(100) NOT NULL,
  `date_approbation` varchar(100) NOT NULL,
  `date_notification` varchar(100) NOT NULL,
  `service_benef` varchar(200) NOT NULL,
  `code_programme` varchar(200) NOT NULL,
  `identifiant` varchar(200) NOT NULL,
  PRIMARY KEY (`num_contrat`),
  KEY `id_user` (`id2`),
  KEY `id_titulaire` (`id_titulaire`),
  KEY `code_programme` (`code_programme`),
  KEY `code_programme_2` (`code_programme`),
  KEY `code_programme_3` (`code_programme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cotation`
--

DROP TABLE IF EXISTS `cotation`;
CREATE TABLE IF NOT EXISTS `cotation` (
  `id_cotation` varchar(200) NOT NULL,
  ` num_cotation` varchar(200) NOT NULL,
  `nombre_cotation` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cotation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cotation`
--

INSERT INTO `cotation` (`id_cotation`, ` num_cotation`, `nombre_cotation`) VALUES
('000001', '', ''),
('000002', '', ''),
('000003', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cotation_contrat`
--

DROP TABLE IF EXISTS `cotation_contrat`;
CREATE TABLE IF NOT EXISTS `cotation_contrat` (
  `num_contrat` varchar(200) NOT NULL,
  `id_cotation` varchar(200) NOT NULL,
  `code_cot_contrat` varchar(200) NOT NULL,
  `dateDepot` varchar(200) NOT NULL,
  `heureDepot` varchar(200) NOT NULL,
  `dateOuverture` varchar(200) NOT NULL,
  `heureOuverture` varchar(200) NOT NULL,
  PRIMARY KEY (`code_cot_contrat`),
  KEY `num_contrat` (`num_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cotation_fours`
--

DROP TABLE IF EXISTS `cotation_fours`;
CREATE TABLE IF NOT EXISTS `cotation_fours` (
  `code_cot_fours` varchar(200) NOT NULL,
  `id_cotation` varchar(200) NOT NULL,
  `id_titulaire` varchar(200) NOT NULL,
  `montant` double NOT NULL,
  `etat` varchar(200) NOT NULL,
  `rang_fours` int(200) NOT NULL,
  `etatFacure` varchar(300) NOT NULL,
  `etatPieces` varchar(300) NOT NULL,
  PRIMARY KEY (`code_cot_fours`),
  KEY `id_cotation` (`id_cotation`),
  KEY `id_titulaire` (`id_titulaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fours_produit`
--

DROP TABLE IF EXISTS `fours_produit`;
CREATE TABLE IF NOT EXISTS `fours_produit` (
  `id_titulaire` varchar(200) NOT NULL,
  `code_fours_produit` varchar(200) NOT NULL,
  `code_produit` varchar(200) NOT NULL,
  `prix` varchar(200) NOT NULL,
  `montant_int` varchar(200) NOT NULL,
  `num_contrat` varchar(200) NOT NULL,
  PRIMARY KEY (`code_fours_produit`),
  KEY `id_titulaire` (`id_titulaire`),
  KEY `code_produit` (`code_produit`),
  KEY `num_contrat` (`num_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `code_membre` varchar(200) NOT NULL,
  `nom_membre` varchar(200) NOT NULL,
  `prenom_membre` varchar(200) NOT NULL,
  `fonction_membre` varchar(200) NOT NULL,
  `id_cotation` varchar(200) NOT NULL,
  `type_membre` varchar(200) NOT NULL,
  PRIMARY KEY (`code_membre`),
  KEY `id_cotation` (`id_cotation`),
  KEY `id_cotation_2` (`id_cotation`),
  KEY `id_cotation_3` (`id_cotation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id2` varchar(200) NOT NULL,
  `nom_expedi` varchar(200) NOT NULL,
  `date_msg` varchar(200) NOT NULL,
  `code_msg` varchar(200) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `tel` varchar(200) NOT NULL,
  PRIMARY KEY (`code_msg`),
  KEY `id2` (`id2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `piece_jointe`
--

DROP TABLE IF EXISTS `piece_jointe`;
CREATE TABLE IF NOT EXISTS `piece_jointe` (
  `code_pj` varchar(200) NOT NULL,
  `num_ref` varchar(200) NOT NULL,
  `nom_piece` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `num_contrat` varchar(200) NOT NULL,
  PRIMARY KEY (`code_pj`),
  KEY `num_contrat` (`num_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produit_contrat`
--

DROP TABLE IF EXISTS `produit_contrat`;
CREATE TABLE IF NOT EXISTS `produit_contrat` (
  `designation` varchar(100) NOT NULL,
  `prix_unitaire` varchar(100) NOT NULL,
  `code_produit` varchar(100) NOT NULL,
  `quantite` varchar(100) NOT NULL,
  `montant` varchar(100) NOT NULL,
  `p_enlettre` varchar(500) NOT NULL,
  `num_contrat` varchar(200) NOT NULL,
  PRIMARY KEY (`code_produit`),
  KEY `num_contrat` (`num_contrat`),
  KEY `num_contrat_2` (`num_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `code_programme` varchar(200) NOT NULL,
  `identifiant` varchar(200) NOT NULL,
  PRIMARY KEY (`code_programme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `titulaire`
--

DROP TABLE IF EXISTS `titulaire`;
CREATE TABLE IF NOT EXISTS `titulaire` (
  `id_titulaire` varchar(200) NOT NULL,
  `nif_titulaire` varchar(200) NOT NULL,
  `rc_titulaire` varchar(200) NOT NULL,
  `tel_titulaire` varchar(200) NOT NULL,
  `num_compte_banque` varchar(200) NOT NULL,
  `nom_banque` varchar(200) NOT NULL,
  `representant_titulaire` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `nom_titulaire` varchar(200) NOT NULL,
  PRIMARY KEY (`id_titulaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titulaire`
--

INSERT INTO `titulaire` (`id_titulaire`, `nif_titulaire`, `rc_titulaire`, `tel_titulaire`, `num_compte_banque`, `nom_banque`, `representant_titulaire`, `adresse`, `nom_titulaire`) VALUES
('00000000_07', '                                                                                                                                                                         Non_defini', 'Non_defini', '00-00-00-00', '                                                                                                                                                                         Non_defini', 'NON_DEFINI', 'Non_defini', 'Non_defini', '                                                                                                                                                                                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id2` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `tel_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `type_compte` varchar(200) NOT NULL,
  `etat` varchar(200) NOT NULL,
  PRIMARY KEY (`id2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id2`, `username`, `password`, `nom_user`, `prenom_user`, `tel_user`, `email_user`, `type_compte`, `etat`) VALUES
('ad_ad_ad_00_00_00', 'admin', 'admino', 'DOUMBIA', 'Adama', '79291734', 'doumbia@gmail.com', 'administrateur', '1'),
('am_tr_am_ami_06', 'ami', 'ami', 'TRAORE', 'Aminata', '90897867', 'ffffffffffff@gmail.com', 'user', '0'),
('do_ d_ s_douc_03', 'douc', 'douc', 'DOUCOURE', ' Seydou', '72856932', ' nnn@gmail.com', 'administrateur', '1'),
('do_tr_am_dou_05', 'dou', 'dou', 'TRAORE', 'Amadou', '90897867', 'ffffffffffff@gmail.com', 'user', '0'),
('si_tr_si_sidif_05', 'sidif', 'f', 'TRAORE', 'Sidikif', '55555555', 'ffffffffffff@gmail.com', 'administrateur', '1'),
('si_tr_si_sidi_04', 'sidi', 'sidi', 'TRAORE', 'Sidiki', '55555555', 'ffffffffffff@gmail.com', 'user', '0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`id2`) REFERENCES `user` (`id2`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrat_ibfk_2` FOREIGN KEY (`id_titulaire`) REFERENCES `titulaire` (`id_titulaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cotation_contrat`
--
ALTER TABLE `cotation_contrat`
  ADD CONSTRAINT `cotation_contrat_ibfk_1` FOREIGN KEY (`num_contrat`) REFERENCES `contrat` (`num_contrat`);

--
-- Constraints for table `cotation_fours`
--
ALTER TABLE `cotation_fours`
  ADD CONSTRAINT `cotation_fours_ibfk_1` FOREIGN KEY (`id_cotation`) REFERENCES `cotation` (`id_cotation`),
  ADD CONSTRAINT `cotation_fours_ibfk_2` FOREIGN KEY (`id_titulaire`) REFERENCES `titulaire` (`id_titulaire`);

--
-- Constraints for table `fours_produit`
--
ALTER TABLE `fours_produit`
  ADD CONSTRAINT `fours_produit_ibfk_1` FOREIGN KEY (`id_titulaire`) REFERENCES `titulaire` (`id_titulaire`),
  ADD CONSTRAINT `fours_produit_ibfk_2` FOREIGN KEY (`code_produit`) REFERENCES `produit_contrat` (`code_produit`),
  ADD CONSTRAINT `fours_produit_ibfk_3` FOREIGN KEY (`num_contrat`) REFERENCES `contrat` (`num_contrat`);

--
-- Constraints for table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`id_cotation`) REFERENCES `cotation` (`id_cotation`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id2`) REFERENCES `user` (`id2`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD CONSTRAINT `piece_jointe_ibfk_1` FOREIGN KEY (`num_contrat`) REFERENCES `contrat` (`num_contrat`);

--
-- Constraints for table `produit_contrat`
--
ALTER TABLE `produit_contrat`
  ADD CONSTRAINT `produit_contrat_ibfk_1` FOREIGN KEY (`num_contrat`) REFERENCES `contrat` (`num_contrat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
