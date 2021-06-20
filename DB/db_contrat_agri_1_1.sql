-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 27 Décembre 2019 à 15:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db_contrat_agri_1.1`
--

-- --------------------------------------------------------

--
-- Structure de la table `codeur`
--

CREATE TABLE IF NOT EXISTS `codeur` (
  `code` varchar(100) NOT NULL,
  `nbre` varchar(100) NOT NULL,
  `id_code` varchar(100) NOT NULL,
  PRIMARY KEY (`id_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `codeur`
--

INSERT INTO `codeur` (`code`, `nbre`, `id_code`) VALUES
('yeswecan', '145', '00001');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

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

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`num_contrat`, `objet_contrat`, `delai_execution`, `source_finance`, `exercice`, `section`, `chapitre`, `nature`, `approuv_par`, `representant_dfm`, `total_ht`, `tva`, `nb_produit`, `total_ttc`, `enlettre`, `id2`, `date_contrat`, `adresse`, `id_titulaire`, `fonction`, `fonction_approuv`, `conclu_par`, `nom_conlu_par`, `profession_conclu`, `pourcentage_tva`, `date_approbation`, `date_notification`, `service_benef`, `code_programme`, `identifiant`) VALUES
('000001', 'Achat de Telephone pour le ministere de l''agriculture', '20', 'Budget National', '2019', '34 4990', '2019', '2017', 'COULIBALY ADAMA', 'TRAORE OUSMANE', '4600', '1058', '2', '5658', '      cinq milles six cents cinquante huit     ', 'ad_ad_ad_00_00_00', '2019-12-23', '', '083203945_M_88213654_05', 'le Directeur des finances et du materiel', 'Directeur adjoint', 'Kone Alou', 'CISSE Arouna', 'Informatien', '23', '2019-12-18', '2019-12-13', 'DFM', '000001', '20192090 Departement informatique'),
('000002', 'Achat de Telephone pour le ministere de l''agriculture', '20', 'Budget National', '2019', '34 4990', '2019', '2017', 'COULIBALY ADAMA', 'TRAORE OUSMANE', '271706', '62492.38', '2', '334198', '    trois cents trente quatre milles cent quatre-vingts dix huit     ', 'ad_ad_ad_00_00_00', '2019-12-23', '', '_09', 'le Directeur des finances et du materiel', 'Directeur adjoint', 'Kone Alou', 'CISSE Arouna', 'Informatien', '23', '2019-12-18', '2019-12-13', 'DFM', '000001', '20192090 Departement informatique'),
('000003', 'Achat de Telephone pour le ministere de l''agriculture', '20', 'Budget National', '2019', '34 4990', '2019', '2017', 'COULIBALY ADAMA', 'TRAORE OUSMANE', '11261', '2590.03', '2', '13851', '      treize milles huit cents cinquante et un     ', 'ad_ad_ad_00_00_00', '2019-12-23', '', 'P598452_55_70636247_06', 'le Directeur des finances et du materiel', 'Directeur adjoint', 'Kone Alou', 'CISSE Arouna', 'Informatien', '23', '2019-12-18', '2019-12-13', 'DFM', '000001', '20192090 Departement informatique');

-- --------------------------------------------------------

--
-- Structure de la table `cotation`
--

CREATE TABLE IF NOT EXISTS `cotation` (
  `id_cotation` varchar(200) NOT NULL,
  ` num_cotation` varchar(200) NOT NULL,
  `nombre_cotation` varchar(200) NOT NULL,
  PRIMARY KEY (`id_cotation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cotation`
--

INSERT INTO `cotation` (`id_cotation`, ` num_cotation`, `nombre_cotation`) VALUES
('000001', '', '3'),
('000002', '', '3'),
('000003', '', '3');

-- --------------------------------------------------------

--
-- Structure de la table `cotation_contrat`
--

CREATE TABLE IF NOT EXISTS `cotation_contrat` (
  `num_contrat` varchar(200) NOT NULL,
  `id_cotation` varchar(200) NOT NULL,
  `code_cot_contrat` varchar(200) NOT NULL,
  PRIMARY KEY (`code_cot_contrat`),
  KEY `num_contrat` (`num_contrat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cotation_contrat`
--

INSERT INTO `cotation_contrat` (`num_contrat`, `id_cotation`, `code_cot_contrat`) VALUES
('000001', '000001', '000001'),
('000002', '000002', '000002'),
('000003', '000003', '000003');

-- --------------------------------------------------------

--
-- Structure de la table `cotation_fours`
--

CREATE TABLE IF NOT EXISTS `cotation_fours` (
  `code_cot_fours` varchar(200) NOT NULL,
  `id_cotation` varchar(200) NOT NULL,
  `id_titulaire` varchar(200) NOT NULL,
  `montant` double NOT NULL,
  `etat` varchar(200) NOT NULL,
  `rang_fours` int(200) NOT NULL,
  PRIMARY KEY (`code_cot_fours`),
  KEY `id_cotation` (`id_cotation`),
  KEY `id_titulaire` (`id_titulaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cotation_fours`
--

INSERT INTO `cotation_fours` (`code_cot_fours`, `id_cotation`, `id_titulaire`, `montant`, `etat`, `rang_fours`) VALUES
('000001', '000003', '083203945_M_88213654_05', 334652, 'choisi', 2),
('000002', '000003', 'P598452_55_70636247_06', 13851, 'choisi', 1),
('000003', '000003', '70636247_08', 359006, 'choisi', 3),
('000004', '000002', '_09', 334198, 'choisi', 1),
('000005', '000002', '083203945_M_70636247_01', 359006, 'choisi', 2),
('000006', '000002', '2569AMP_70636247_03', 1079805, 'choisi', 3),
('000007', '000001', '083203945_M_88213654_05', 5658, 'choisi', 1),
('000008', '000001', 'P598452_55_70636247_06', 67650, 'choisi', 3),
('000009', '000001', '083203945_M_70636247_01', 64759, 'choisi', 2);

-- --------------------------------------------------------

--
-- Structure de la table `fours_produit`
--

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
-- Contenu de la table `fours_produit`
--

INSERT INTO `fours_produit` (`id_titulaire`, `code_fours_produit`, `code_produit`, `prix`, `montant_int`, `num_contrat`) VALUES
('083203945_M_88213654_05', '000001', '000005', '54334', '271670', '000003'),
('083203945_M_88213654_05', '000002', '000006', '45', '405', '000003'),
('P598452_55_70636247_06', '000003', '000005', '2245', '11225', '000003'),
('P598452_55_70636247_06', '000004', '000006', '4', '36', '000003'),
('70636247_08', '000005', '000005', '54334', '271670', '000003'),
('70636247_08', '000006', '000006', '2245', '20205', '000003'),
('_09', '000007', '000003', '54334', '271670', '000002'),
('_09', '000008', '000004', '4', '36', '000002'),
('083203945_M_70636247_01', '000009', '000003', '54334', '271670', '000002'),
('083203945_M_70636247_01', '000010', '000004', '2245', '20205', '000002'),
('2569AMP_70636247_03', '000011', '000003', '77777', '388885', '000002'),
('2569AMP_70636247_03', '000012', '000004', '54334', '489006', '000002'),
('083203945_M_88213654_05', '000013', '000001', '200', '1000', '000001'),
('083203945_M_88213654_05', '000014', '000002', '400', '3600', '000001'),
('P598452_55_70636247_06', '000015', '000001', '2000', '10000', '000001'),
('P598452_55_70636247_06', '000016', '000002', '5000', '45000', '000001'),
('083203945_M_70636247_01', '000017', '000001', '450', '2250', '000001'),
('083203945_M_70636247_01', '000018', '000002', '5600', '50400', '000001');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

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
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`code_membre`, `nom_membre`, `prenom_membre`, `fonction_membre`, `id_cotation`, `type_membre`) VALUES
('000001', 'TRAORE', 'AMINATA', 'Directrice', '000003', 'President'),
('000002', 'TRAORE', 'AMINATA', ' ', '000003', 'Reporteur'),
('000003', 'TRAORE', 'AMINATA', ' ', '000003', 'Simple'),
('000004', 'TRAORE', 'AMINATA', 'Non defini', '000003', 'Simple'),
('000005', 'TRAORE', 'AMINATA', 'Non defini', '000002', 'President'),
('000006', 'DIARRA', 'Sitan', 'Non defini', '000002', 'Reporteur'),
('000007', 'DIARRA', 'Oumar', 'Non defini', '000002', 'Simple'),
('000008', 'TRAORE', 'AMINATA', 'Non defini', '000001', 'President'),
('000009', 'TRAORE', 'AMINATA', 'Non defini', '000001', 'Reporteur'),
('000010', 'TRAORE', 'AMINATA', 'Non defini', '000001', 'Simple');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

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
-- Structure de la table `piece_jointe`
--

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
-- Structure de la table `produit_contrat`
--

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
-- Contenu de la table `produit_contrat`
--

INSERT INTO `produit_contrat` (`designation`, `prix_unitaire`, `code_produit`, `quantite`, `montant`, `p_enlettre`, `num_contrat`) VALUES
('SAMSUNG J7 PRO', '200', '000001', '5', '1000', '      deux cents       ', '000001'),
('IPHONE XR', '400', '000002', '9', '3600', '      quatre cents       ', '000001'),
('SAMSUNG J7 PRO', '54334', '000003', '5', '271670', '     cinquante quatre milles trois cents trente quatre     ', '000002'),
('IPHONE XR', '4', '000004', '9', '36', '        quatre     ', '000002'),
('SAMSUNG J7 PRO', '2245', '000005', '5', '11225', '      deux milles deux cents quarante cinq     ', '000003'),
('IPHONE XR', '4', '000006', '9', '36', '        quatre     ', '000003');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

CREATE TABLE IF NOT EXISTS `programme` (
  `code_programme` varchar(200) NOT NULL,
  `identifiant` varchar(200) NOT NULL,
  PRIMARY KEY (`code_programme`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `programme`
--

INSERT INTO `programme` (`code_programme`, `identifiant`) VALUES
('000001', '20192090 Departement informatique'),
('000002', '5566-HHHHYYY-778990066777-000002');

-- --------------------------------------------------------

--
-- Structure de la table `titulaire`
--

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
-- Contenu de la table `titulaire`
--

INSERT INTO `titulaire` (`id_titulaire`, `nif_titulaire`, `rc_titulaire`, `tel_titulaire`, `num_compte_banque`, `nom_banque`, `representant_titulaire`, `adresse`, `nom_titulaire`) VALUES
('00000000_07', '                                            Non_defini', 'Non_defini', '00-00-00-00', '                                            Non_defini', 'NON_DEFINI', 'Non_defini', 'Non_defini', '                                                          Non_defini'),
('083203945_M_70636247_01', '                             083203945 M', '25698315', '70-63-62-47', '                             569DAMPOF8897R', 'ECOBANK', 'Zoumana  TRAORE', 'Kalaban Coura', '                                   Smartech'),
('083203945_M_88213654_05', '                     083203945 M', '89452136', '88-21-36-54', '                     AA85GG66666DGGML', 'BNDA', 'ABDOULAYE KONTAO', 'Soukounikoura', '                            ADA_TECH'),
('2569AMP_66995588_02', '                  2569AMP', '25698315', '66-99-55-88', '                  569DAMPOF8897R', 'BNDA', 'Mahamadou KAMATE', 'Soukounikoura', '                       BKT_ELECTRO'),
('2569AMP_70636247_03', '                 2569AMP', '6597', '70-63-62-47', '                 ML 0016 01 201 026501011862-32', 'ECOBANK', 'Karim kone', 'Kalaban Coura', '                       Diabistore'),
('70636247_08', 'AAADD333', '4500099', '70-63-62-47', '49800EEEHUD', 'ECOBANK', 'Amadou Kone', 'Kalaban Coura', 'ZZZZZSTORE'),
('P598452_55_70636247_06', '      P598452 55', '25698315', '70-63-62-47', '      569DAMPOF8897R', 'BDM SA', 'Seydou DOUCOURE', 'Kalaban Coura', '        DOUC_TECH'),
('P598452_76055070_04', '      P598452', '6597', '76-05-50-70', '      DTFEGY85U4M69', 'BDM SA', 'Awa Sanogo', 'DIBIDA', '        Infotech'),
('_09', 'AAADD333', 'Non_defini', '70636247', '49800EEEHUD', 'JPOO', 'Amadou Kone', 'Kalaban Coura', 'ADA_TECHYYYYYYYYYYYY');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

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
-- Contenu de la table `user`
--

INSERT INTO `user` (`id2`, `username`, `password`, `nom_user`, `prenom_user`, `tel_user`, `email_user`, `type_compte`, `etat`) VALUES
('ad_ad_ad_00_00_00', 'admin', 'admin', 'DOUMBIA', 'Adama', '79291734', 'doumbia@gmail.com', 'administrateur', '1'),
('am_tr_am_ami_06', 'ami', 'ami', 'TRAORE', 'Aminata', '90897867', 'ffffffffffff@gmail.com', 'user', '0'),
('do_ d_ s_douc_03', 'douc', 'douc', 'DOUCOURE', ' Seydou', '72856932', ' nnn@gmail.com', 'administrateur', '1'),
('do_tr_am_dou_05', 'dou', 'dou', 'TRAORE', 'Amadou', '90897867', 'ffffffffffff@gmail.com', 'user', '0'),
('si_tr_si_sidif_05', 'sidif', 'f', 'TRAORE', 'Sidikif', '55555555', 'ffffffffffff@gmail.com', 'administrateur', '1'),
('si_tr_si_sidi_04', 'sidi', 'sidi', 'TRAORE', 'Sidiki', '55555555', 'ffffffffffff@gmail.com', 'user', '1');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`id2`) REFERENCES `user` (`id2`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrat_ibfk_2` FOREIGN KEY (`id_titulaire`) REFERENCES `titulaire` (`id_titulaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cotation_contrat`
--
ALTER TABLE `cotation_contrat`
  ADD CONSTRAINT `cotation_contrat_ibfk_1` FOREIGN KEY (`num_contrat`) REFERENCES `contrat` (`num_contrat`);

--
-- Contraintes pour la table `cotation_fours`
--
ALTER TABLE `cotation_fours`
  ADD CONSTRAINT `cotation_fours_ibfk_1` FOREIGN KEY (`id_cotation`) REFERENCES `cotation` (`id_cotation`),
  ADD CONSTRAINT `cotation_fours_ibfk_2` FOREIGN KEY (`id_titulaire`) REFERENCES `titulaire` (`id_titulaire`);

--
-- Contraintes pour la table `fours_produit`
--
ALTER TABLE `fours_produit`
  ADD CONSTRAINT `fours_produit_ibfk_1` FOREIGN KEY (`id_titulaire`) REFERENCES `titulaire` (`id_titulaire`),
  ADD CONSTRAINT `fours_produit_ibfk_2` FOREIGN KEY (`code_produit`) REFERENCES `produit_contrat` (`code_produit`),
  ADD CONSTRAINT `fours_produit_ibfk_3` FOREIGN KEY (`num_contrat`) REFERENCES `contrat` (`num_contrat`);

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `membre_ibfk_1` FOREIGN KEY (`id_cotation`) REFERENCES `cotation` (`id_cotation`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id2`) REFERENCES `user` (`id2`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `piece_jointe`
--
ALTER TABLE `piece_jointe`
  ADD CONSTRAINT `piece_jointe_ibfk_1` FOREIGN KEY (`num_contrat`) REFERENCES `contrat` (`num_contrat`);

--
-- Contraintes pour la table `produit_contrat`
--
ALTER TABLE `produit_contrat`
  ADD CONSTRAINT `produit_contrat_ibfk_1` FOREIGN KEY (`num_contrat`) REFERENCES `contrat` (`num_contrat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
