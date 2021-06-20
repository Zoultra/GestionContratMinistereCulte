-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 16, 2021 at 03:08 AM
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
('yeswecan', '160', '00001');

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
  `type_produit` varchar(300) NOT NULL,
  `localisation` varchar(300) NOT NULL,
  PRIMARY KEY (`num_contrat`),
  KEY `id_user` (`id2`),
  KEY `id_titulaire` (`id_titulaire`),
  KEY `code_programme` (`code_programme`),
  KEY `code_programme_2` (`code_programme`),
  KEY `code_programme_3` (`code_programme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contrat`
--

INSERT INTO `contrat` (`num_contrat`, `objet_contrat`, `delai_execution`, `source_finance`, `exercice`, `section`, `chapitre`, `nature`, `approuv_par`, `representant_dfm`, `total_ht`, `tva`, `nb_produit`, `total_ttc`, `enlettre`, `id2`, `date_contrat`, `adresse`, `id_titulaire`, `fonction`, `fonction_approuv`, `conclu_par`, `nom_conlu_par`, `profession_conclu`, `pourcentage_tva`, `date_approbation`, `date_notification`, `service_benef`, `code_programme`, `identifiant`, `type_produit`, `localisation`) VALUES
('000001', 'Achat de the', '30', 'Budjet National', '2021', '340', '2021', '20298', 'Toure Karim', 'Toure Karim', '1170000', '210600', '0', '1451400', '     un million quatre cents cinquante et un milles quatre cents       ', 'ad_ad_ad_00_00_00', '2021-06-05', '', '_04', 'le Directeur des finances et du materiel', 'DG', 'DG Adjoint', 'Keita Solo', '', '18', '', '', 'DFM', '000001', 'TEST PROGRAMME', '', ''),
('000002', 'Achat de the', '60', 'Budjet National', '2021', '340', '2021', '20298', 'Toure Karim', 'Toure Karim', '290000', '52200', '2', '342200', '    trois cents quarante deux milles deux cents       ', 'ad_ad_ad_00_00_00', '2021-06-05', '', '_03', 'le Directeur des finances et du materiel', 'DG', 'DG Adjoint', 'Keita Solo', '', '18', '', '', 'DFM', '000001', 'TEST PROGRAMME', '', ''),
('000003', 'Achat de the', '60', 'Budjet National', '2022', '340', '2021', '20298', '', 'Toure Karim', '40000', '7200', '1', '47200', '     quarante sept milles deux cents       ', 'ad_ad_ad_00_00_00', '2021-06-06', '', '_03', 'le Directeur des finances et du materiel', 'Responsable du programme 1', 'le Directeur des finances et du materiel', 'Keita Solo', '', '18', '', '', 'DFM', '000001', 'TEST PROGRAMME', '', ''),
('000004', 'Achat de the', 'sept(07)', 'Budjet National', '2022', '340', '2021', '20298', '', 'Toure Karim', '600000', '108000', '1', '708000', '    sept cents  huit milles        ', 'ad_ad_ad_00_00_00', '2021-06-08', '', '_03', 'le Directeur des finances et du materiel', 'Responsable du programme 1', 'le Directeur des finances et du materiel', 'Keita Solo', '', '18', '', '', 'DFM', '000001', 'TEST PROGRAMME', '', ''),
('000005', 'Achat de the', '60', 'Budjet National', '2022', '340', '2021', '20298', '', 'Toure Karim', '600000', '108000', '1', '708000', '    sept cents  huit milles        ', 'ad_ad_ad_00_00_00', '2021-06-13', '', '_03', 'le Directeur des finances et du materiel', 'le Directeur des finances et du materiel', 'le Directeur des finances et du materiel', 'Keita Solo', '', '18', '', '', 'DFM', '000001', 'TEST PROGRAMME', 'Les pieces', ''),
('000006', 'Achat de the test last', '20', 'Budjet National', '2021', '340', '2021', '20298', '', 'Toure Karim', '800000', '144000', '1', '944000', '    neuf cents quarante quatre milles        ', 'ad_ad_ad_00_00_00', '2021-06-13', '', '_03', 'le Directeur des finances et du materiel', 'le Directeur des finances et du materiel', 'le Directeur des finances et du materiel', 'Keita Solo', '', '18', '', '', 'DFM', '000002', 'Programme1.05', 'Les  pieces', ''),
('000007', 'Achat de the test last', '20', 'Budjet National', '2021', '340', '2021', '20298', '', 'Toure Karim', '800000', '144000', '1', '944000', '    neuf cents quarante quatre milles        ', 'ad_ad_ad_00_00_00', '2021-06-13', '', '_03', 'le Directeur des finances et du materiel', 'le Directeur des finances et du materiel', 'le Directeur des finances et du materiel', 'Keita Solo', '', '18', '', '', 'DFM', '000002', 'Programme1.05', 'Les  pieces', ''),
('000008', 'Achat de the', '20', 'Budjet National', '2022', '340', '2021', '20298', '', 'Toure Karim', '0', '0', '1', '0', '             ', 'ad_ad_ad_00_00_00', '2021-06-13', '', '00000000_07', 'le Directeur des finances et du materiel', 'le Directeur des finances et du materiel', 'le Directeur des finances et du materiel', 'Keita Solo', '', '18', '', '', 'DFM', '000001', 'TEST PROGRAMME', 'Les  pieces', '');

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
('000003', '', ''),
('000004', '', '3'),
('000005', '', '3'),
('000006', '', '3'),
('000007', '', '3'),
('000008', '', '3'),
('000009', '', ''),
('000010', '', ''),
('000011', '', ''),
('000012', '', '3'),
('000013', '', '3'),
('000014', '', ''),
('000015', '', ''),
('000016', '', ''),
('000017', '', ''),
('000018', '', '');

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

--
-- Dumping data for table `cotation_contrat`
--

INSERT INTO `cotation_contrat` (`num_contrat`, `id_cotation`, `code_cot_contrat`, `dateDepot`, `heureDepot`, `dateOuverture`, `heureOuverture`) VALUES
('000002', '000005', '000002', '', '', '', ''),
('000003', '000006', '000003', '2021-06-11', '22:40', '2021-06-17', '22:40'),
('000004', '000007', '000004', '', '', '', ''),
('000005', '000008', '000005', '', '', '', ''),
('000006', '000012', '000006', '', '', '', ''),
('000007', '000013', '000007', '2021-06-17', '22:42', '2021-06-16', '20:45'),
('000008', '000014', '000008', '', '', '', '');

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

--
-- Dumping data for table `cotation_fours`
--

INSERT INTO `cotation_fours` (`code_cot_fours`, `id_cotation`, `id_titulaire`, `montant`, `etat`, `rang_fours`, `etatFacure`, `etatPieces`) VALUES
('000001', '000004', '_03', 1380600, 'choisi', 1, 'Fournie', 'Fournies'),
('000002', '000004', '_04', 1451400, 'choisi', 2, 'Fournie', 'Fournies'),
('000003', '000004', '_02', 1876200, 'choisi', 3, 'Fournie', 'Fournies'),
('000004', '000005', '_03', 342200, 'choisi', 1, 'Fournie', 'Fournies'),
('000005', '000005', '_04', 672600, 'choisi', 3, 'Fournie', 'Fournies'),
('000006', '000005', '_02', 531000, 'choisi', 2, 'Fournie', 'Fournies'),
('000007', '000006', '_03', 47200, 'choisi', 1, 'Fournie', 'Fournies'),
('000008', '000006', '_04', 283200, 'choisi', 3, 'Fournie', 'Fournies'),
('000009', '000006', '_02', 212400, 'choisi', 2, 'Fournie', 'Fournies'),
('000010', '000007', '_03', 708000, 'choisi', 1, 'Fournie', 'Fournies'),
('000011', '000007', '_04', 708021, 'choisi', 3, 'Fournie', 'Fournies'),
('000012', '000007', '_02', 708007, 'choisi', 2, 'Fournie', 'Fournies'),
('000013', '000008', '_03', 708000, 'choisi', 1, 'Fournie', 'Fournies'),
('000014', '000008', '_04', 7080009, 'choisi', 3, 'Fournie', 'Fournies'),
('000015', '000008', '_02', 2124000, 'choisi', 2, 'Fournie', 'Fournies'),
('000016', '000012', '_03', 944000, 'choisi', 1, 'Fournie', 'Fournies'),
('000017', '000012', '_04', 3540000, 'choisi', 2, 'Fournie', 'Fournies'),
('000018', '000012', '_02', 3540000, 'choisi', 3, 'Fournie', 'Fournies'),
('000019', '000013', '_03', 944000, 'choisi', 1, 'Fournie', 'Fournies'),
('000020', '000013', '_04', 1416000, 'choisi', 2, 'Fournie', 'Fournies'),
('000021', '000013', '_02', 3540000, 'choisi', 3, 'Fournie', 'Fournies');

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

--
-- Dumping data for table `fours_produit`
--

INSERT INTO `fours_produit` (`id_titulaire`, `code_fours_produit`, `code_produit`, `prix`, `montant_int`, `num_contrat`) VALUES
('_03', '000001', '000001', '90000', '270000', '000001'),
('_03', '000002', '000002', '300000', '300000', '000001'),
('_03', '000003', '000003', '300000', '600000', '000001'),
('_04', '000004', '000001', '300000', '900000', '000001'),
('_04', '000005', '000002', '90000', '90000', '000001'),
('_04', '000006', '000003', '120000', '240000', '000001'),
('_02', '000007', '000001', '300000', '900000', '000001'),
('_02', '000008', '000002', '90000', '90000', '000001'),
('_02', '000009', '000003', '300000', '600000', '000001'),
('_03', '000010', '000004', '90000', '270000', '000002'),
('_03', '000011', '000005', '20000', '20000', '000002'),
('_04', '000012', '000004', '90000', '270000', '000002'),
('_04', '000013', '000005', '300000', '300000', '000002'),
('_02', '000014', '000004', '120000', '360000', '000002'),
('_02', '000015', '000005', '90000', '90000', '000002'),
('_03', '000016', '000006', '20000', '40000', '000003'),
('_04', '000017', '000006', '120000', '240000', '000003'),
('_02', '000018', '000006', '90000', '180000', '000003'),
('_03', '000019', '000007', '300000', '600000', '000004'),
('_04', '000020', '000007', '300009', '600018', '000004'),
('_02', '000021', '000007', '300003', '600006', '000004'),
('_03', '000022', '000008', '300000', '600000', '000005'),
('_04', '000023', '000008', '3000004', '6000008', '000005'),
('_02', '000024', '000008', '900000', '1800000', '000005'),
('_03', '000025', '000009', '800000', '800000', '000006'),
('_04', '000026', '000009', '3000000', '3000000', '000006'),
('_02', '000027', '000009', '3000000', '3000000', '000006'),
('_03', '000028', '000010', '800000', '800000', '000007'),
('_04', '000029', '000010', '1200000', '1200000', '000007'),
('_02', '000030', '000010', '3000000', '3000000', '000007');

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

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`code_membre`, `nom_membre`, `prenom_membre`, `fonction_membre`, `id_cotation`, `type_membre`) VALUES
('000001', 'TRAORE', 'ZOU', 'CEO SMARTECH', '000004', 'President'),
('000002', 'TRAORE', 'Idriss', 'Non defini', '000004', 'Rapporteur'),
('000003', 'Konate', 'Ibrahim', 'Non defini', '000004', 'Membre'),
('000004', 'TRAORE', 'ZOU', 'Non defini', '000005', 'President'),
('000005', 'TRAORE', 'ZOUdd', 'Non defini', '000005', 'Rapporteur'),
('000006', 'Test', 'bad', 'Non defini', '000005', 'Membre'),
('000007', 'TRAORE', 'ZOU', 'Non defini', '000006', 'President'),
('000008', 'Test', 'yes', 'Non defini', '000006', 'Rapporteur'),
('000009', 'sasa', 'OK', 'Non defini', '000006', 'Membre'),
('000010', 'TRAORE', 'Salif', 'CEO SMARTECH', '000013', 'President'),
('000011', 'Konate', 'Hamidou', 'Non defini', '000013', 'Rapporteur'),
('000012', 'KONE', 'Abdoulaye', 'Non defini', '000013', 'Membre');

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

--
-- Dumping data for table `produit_contrat`
--

INSERT INTO `produit_contrat` (`designation`, `prix_unitaire`, `code_produit`, `quantite`, `montant`, `p_enlettre`, `num_contrat`) VALUES
('LIPTON', '90000', '000001', '3', '270000', '     quatre-vingts dix milles        ', '000001'),
('THE ACHOURA', '300000', '000002', '1', '300000', '    trois cents   milles        ', '000001'),
('THE FARAKO', '300000', '000003', '2', '600000', '    trois cents   milles        ', '000001 '),
('LIPTON', '90000', '000004', '3', '270000', '     quatre-vingts dix milles        ', '000002'),
('THE ACHOURA', '20000', '000005', '1', '20000', '     vingt  milles        ', '000002'),
('THE ACHOURA', '20000', '000006', '2', '40000', '     vingt  milles        ', '000003'),
('THE ACHOURA', '300000', '000007', '2', '600000', '    trois cents   milles        ', '000004'),
('THE ACHOURA', '300000', '000008', '2', '600000', '    trois cents   milles        ', '000005'),
('THE ACHOURA', '800000', '000009', '1', '800000', '    huit cents   milles        ', '000006'),
('THE ACHOURA', '800000', '000010', '1', '800000', '    huit cents   milles        ', '000007'),
('THE ACHOURA', '', '000011', '1', '*1', '             ', '000008');

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

--
-- Dumping data for table `programme`
--

INSERT INTO `programme` (`code_programme`, `identifiant`) VALUES
('000001', 'TEST PROGRAMME'),
('000002', 'Programme1.05');

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
('00000000_07', '                                                                                                                                                                                                        ', 'Non_defini', '00-00-00-00', '                                                                                                                                                                                                        ', 'NON_DEFINI', 'Non_defini', 'Non_defini', '                                                                                                                                                                                                        '),
('_02', '083203945 M', 'MA.BKO.2019.A.13002', '76975136', 'AA85GG66666DGGML', 'ECOBANK', 'Seydou Doucoure', 'Kalaban Coura ACI', 'SmarTech Mali'),
('_03', '083203945 M', 'QQQOPLKFI90876', '90898989', 'AA85GG66666DGGML', 'ECOBANK', 'Oumar Toure', 'Kalaban Coura ACI', 'ADA TECH'),
('_04', '90NJFLJ', 'DDDOP0098', '22200998', 'HFJUS8742973 8', 'ECOBANK', 'Koureichi', 'Hamdalaye ACI', 'LOGA ENGINEERING');

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
('ad_ad_ad_00_00_00', 'admin', 'admin', 'DOUMBIA', 'Adama', '79291734', 'doumbia@gmail.com', 'administrateur', '1'),
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
