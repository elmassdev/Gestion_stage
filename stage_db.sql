-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 10:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `civilite`
--

CREATE TABLE `civilite` (
  `titre` varchar(255) NOT NULL,
  `civilite` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `civilite`
--

INSERT INTO `civilite` (`titre`, `civilite`, `genre`, `sexe`, `created_at`, `updated_at`) VALUES
('M.', 'Monsieur', '', 'Masculin', NULL, NULL),
('Mlle', 'Mademoiselle', 'e', 'Féminin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `encadrants`
--

CREATE TABLE `encadrants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `encadrants`
--

INSERT INTO `encadrants` (`id`, `titre`, `prenom`, `nom`, `phone`, `email`, `service`, `created_at`, `updated_at`) VALUES
(52, '-', '-', '-', '-', '-', '-', NULL, NULL),
(54, 'M.', 'TestEncadrant', 'NomEncadrant', '+212661667799', 'encadrant@gmail.com', '0', '2023-03-04 08:55:35', '2023-03-04 08:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `etablissements`
--

CREATE TABLE `etablissements` (
  `sigle_etab` varchar(255) NOT NULL,
  `Etab` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `article` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL DEFAULT 'Maroc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etablissements`
--

INSERT INTO `etablissements` (`sigle_etab`, `Etab`, `statut`, `type`, `article`, `Pays`, `created_at`, `updated_at`) VALUES
('AIAC', 'Académie Internationale Mohamed VI de l\'Aviation Civile', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('AUI', 'Al Akhawayn University', 'ETATIQUE', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('CASSADAKA', 'CLUB ASSADAKA', 'ETATIQUE', 'CQP', 'au', 'Maroc', NULL, NULL),
('CBTS', 'Centre de Brevet de Technichnicien Supérieur', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('CDCHT', 'Centre de Dévelopement des Compétences en Hôtellerie et Tourisme', 'ETATIQUE', 'OFPPT', 'au', 'Maroc', NULL, NULL),
('CESA', 'Centre D\'Enseignement Des Sciences Appliquées', 'PRIVEE', 'ECOLE SUPERIEURE', 'au', 'Maroc', NULL, NULL),
('CFJMRA', 'centre de formation des jeunes dans les metier de reparation automobile', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('CFMB', 'Centre de Formation des Métiers de Bâtiment', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('CFPM', 'Centre de Formation Professionnelle Multidisciplinaire', 'ETATIQUE', 'OFPPT', 'au', 'Maroc', NULL, NULL),
('CFPMS', 'Centre de Formation Professionnelle Multidisciplinaire SIDI MOUMEN', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('CFQP', 'Centre de Formation de Qualification Professionnelle', 'ETATIQUE', 'CQP', 'au', 'Maroc', NULL, NULL),
('CICP', 'Centre  d\'Instruction Aux Carrieres Paramedicales', 'PRIVEE', 'OFPPT', 'au', 'Maroc', NULL, NULL),
('CNAM', 'Centre d\'enseignement  du Cnam', 'ETRANGER', 'ECOLE NORMALE', 'au', 'Maroc', NULL, NULL),
('CPGE', 'Classes Preparatoires Aux Grandes Ecoles', 'ETATIQUE', 'ECOLE NORMALE', 'au', 'Maroc', NULL, NULL),
('CQA', 'Centre de Qualification Agricole', 'ETATIQUE', 'CQP', 'au', 'Maroc', NULL, NULL),
('CQP', 'Centre de Qalification Professionnelle', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('CREA', 'Centre de Recherche et d\'Engineering de l\'Automobile', 'ETATIQUE', 'OFPPT', 'au', 'Maroc', NULL, NULL),
('CRMEF', 'Centre Régional des Métiers de l\'Education et de la Formation', 'ETATIQUE', 'ECOLE SUPERIEURE', 'au', 'Maroc', NULL, NULL),
('CRS', 'Centre Rhamna Skills', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('CSE', 'Centrale Supélec', 'ETRANGERES', 'ECOLES SUPERIEURES', 'au', 'Maroc', NULL, NULL),
('CSM', 'Centre Sociale Multidisciplinaire', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('CSP', 'Centre Social de Proximité', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('DEE', 'Centre de Qualification Professionnelle', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('E M G', 'Ecole Marocaine d\'Ingénierie', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('E P P', 'Ecole Polytechnique Privée', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('E S A G I', 'Ecole S A G I', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('E SAGIM', 'Ecole SAGIM', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('E2IM', 'Ecole de l\'Ingénierie et de l\'Innovation', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EC', 'Ecole Centrale', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ECE', 'Ecole Centrale d\'Electronique', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ECIG', 'Ecole Casablancaise d\'Informatique et de Gestion', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EEP', 'Ecole EGI-Pro', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EFA', 'Ecole Française des Affaires', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EFET', 'Ecole Française d\'Enseignement Technique', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EFETC', 'Ecole Française d\'Enseignement Technique et Commerce', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EGE', 'Ecole de Gouvernance et d\'Economie', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EHEEC', 'Ecole des Hautes Etudes Economiques et Commerciales', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EHEI', 'Ecole des Hautes Etudes d\'Ingénierie', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EHTP', 'Ecole Hassania des Travaux Publics', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EIGSI', 'Ecole d\'Ingénierie en Génie des Systèmes Industriels', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EILCO', 'École d\'ingénieurs du Littoral-Côte-d\'Opale', 'ETRANGER', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('EIM', 'Ecole d\'Informatique et de Management', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EITIA', 'Ecole Internationale Privée des Technologies Informatiques Avancées', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EMBCI', 'Ecole Marocaine De Banque et de Commerce International', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EMBTP', 'Ecole des Métiers du Bâtiment et Travaux Publics', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('EMEGA', 'Etablissement MEGA School', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EMG', 'Ecole Moulik Group', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EMI', 'Ecole Mohammadia d\'Ingénieurs', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EMM', 'Euromed Management Maroc', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EMP', 'Ecole MIAGE Privé', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EMSET-P', 'Ecole Marocaine de l\'Enseignement Technique - Privée', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EMSI', 'Ecole Marocaine des Sciences de l\'Ingénieur', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENAM', 'Ecole Nationale d\'Agriculture', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENCC', 'Etablissement Nadifi de Coupe et Coûture', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ENCG', 'Ecole Nationale de Commerce et de Gestion', 'ETATIQUE', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('ENI', 'Ecole Nationale d\'Ingénieurs', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENIM', 'Ecole Nationale d\'Industrie Minérale', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENMIG', 'Ecole Nadir de management et d\'informatique de gestion', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ENS', 'Ecole Normal Supérieure', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSA', 'Ecole Nationale des Sciences Appliquées', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSAM', 'Ecole Nationale Supérieure d\'Arts et Métiers', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSEEIHT', 'Ecole Nationale Supérieure d\'électri. éléctron. informat. Hydrauli. et télécom', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSEIRB', 'Ecole Nationale Supérieure d’Electronique, Informatique, Télécommunications, Mathématique et Mécanique', 'ETRANGER', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('ENSEM', 'Ecole Nationale Supérieure d\'Electricité et de Mécanique', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSEMM', 'Ecole Nationale Supérieure de Mécanique et des Microtechniques', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSET', 'Ecole Normale Supérieure de l\'Enseignement Technique', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSIAS', 'Ecole Nationale Supérieure d\'Informatique et d\'Analyse des Systèmes', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSM', 'Ecole Nationale Supérieure des MINES de Saint-Etienne', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ENSMR', 'Ecole Nationale Supérieures des Mines de Rabat', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EP', 'Ecole Pigier', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EPEAGI', 'Ecole Privée d\'Enseignement Appliqué de Gestion Informatisée', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EPETP', 'Ecole Privée d\'Enseignement Technique et Paramédical', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EPFP', 'Ecole Privé de Formation Professionnelle', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EPP', 'Ecole Privée de Formation  Paramédicale', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ERETEC', 'Institut EURETECH', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ERPE', 'Ecole Racine Plus Privée', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ES-INFO', 'Ecole Scientifique d\' Informatique et de Gestion', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESC', 'Ecole Superieure de Commerce', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESCA', 'Ecole supérieure du commerce et des affaires', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESCIA', 'Ecole Specialisée de Comptabilité et d\'Informatique Appliquée', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESET', 'Ecole Spécialisée en Etudes Techniques', 'PRIVEE', 'ECOLE NORMALE', 'à l\'', 'Maroc', NULL, NULL),
('ESG', 'Ecole Supérieure de Gestion', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESGT', 'Ecole Spéciale de la Géomatique et de la Topographie', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESI', 'Ecole des Sciences de l\'Information', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESIAG', 'Ecole Supérieure d\'Informatique Appliquée à la Gestion', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESIG', 'Ecole Supérieure Internationale de Gestion', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESIGELEC', 'Ecole Supérieure d\'Ingénieurs Rouen', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESIMA', 'Ecole Supérieure d\'Informatique et de Management des Affaires', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESISA', 'Ecole Supérieure d\'Ingénierie en Sciences Appliquées', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESITH', 'Ecole Supérieure des Industries du Textile et de l\'Habillement', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESMA', 'Ecole Supérieure de Management et de Technologie Informatique Appliqués', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESMIA', 'Ecole Spécialisée de Management et d\'Infrmatique Appliquée', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESSEP', 'Ecole Spécialisée en Etudes Professionnelles', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESSIGE', 'Ecole Spécialisée des  Sciences Informatique et Gestion d\'Entreprise', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESSTM', 'Ecole Supérieure des Sciences Techniques et de Management', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('EST', 'Ecole Supérieure de Technologie', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESTI', 'Institut des Sciences et Techniques d\'Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ESTIA', 'Ecole Supérieure des Technologies Industrielles Avancées', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ESTIG', 'Ecole Spéciale de Technologie et d\'Informatique de Gestion', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ETA', 'Ecole de Technologie et d\'Administration', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ETAGIS', 'Ecole Tech. de l\'Atlas de Gestion d\'Informatique et de Secrétariat', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ETEM', 'Ecole -Telecom Ecole de Management', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ETIGE', 'Ecole Technique d\'Informatique de Gestion et d\'Electronique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EUM-IAE', 'Ecole Universitaire de Management-IAE Auvergne', 'ETRANGERES', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('EURELEC', 'Institut européenne', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('FEG', 'Faculté d\'économie et de gestion', 'ETATIQUE', 'FACULTE', 'à la', 'Maroc', NULL, NULL),
('FFA', 'Foyer Féminin - Azli -', 'ETATIQUE', 'CQP', 'au', 'Maroc', NULL, NULL),
('FGSES', 'Faculté de Gouvernance, Sciences Économiques et Sociales', 'ETATIQUE', 'FACULTE', 'à la', 'Maroc', NULL, NULL),
('FLSH', 'Faculté des Lettres et des Sciences Humaines', 'ETATIQUE', 'FACULTES', 'à la', 'Maroc', NULL, NULL),
('FMED', 'Faculté de Médcine', 'ETATIQUE', 'FACULTES', 'à la', 'Maroc', NULL, NULL),
('FP', 'Faculté Polydisciplinaire', 'ETATIQUE', 'FACULTES', 'à la', 'Maroc', NULL, NULL),
('FPSG', 'Faculté Privée des Sciences de Gestion', 'PRIVEE', 'FACULTES', 'à la', 'Maroc', NULL, NULL),
('FS', 'Faculté des Sciences', 'ETATIQUE', 'FACULTES', 'à la', 'Maroc', NULL, NULL),
('FSA', 'Faculté des Sciences Appliquées', 'ETATIQUE', 'FACULTE', 'à la', 'Maroc', NULL, NULL),
('FSJES', 'Faculté des Sciences Juridiques, Economiques et Sociales', 'ETATIQUE', 'FACULTES', 'à la', 'Maroc', NULL, NULL),
('FSS', 'Faculté des Sciences Semlalia', 'ETATIQUE', 'FACULTES', 'à la', 'Maroc', NULL, NULL),
('FST', 'Faculté des Sciences et Techniques', 'ETATIQUE', 'FACULTES', 'à la', 'Maroc', NULL, NULL),
('GESGM', 'Groupe ESG Maroc', 'PRIVEE', 'ECOLES SUPERIEURES', 'au', 'Maroc', NULL, NULL),
('GRP', 'Groupe Pigier', 'PRIVEE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('HBF', 'Hautes Etudes Bancaires Financières et Managériales', 'PRIVEE', 'ECOLES SUPERIEURES', 'à la', 'Maroc', NULL, NULL),
('HECI', 'Institut des Hautes Etudes Commerciales et Informatiques', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('HEEC', 'Ecole des Hautes Etudes Economiques et Commerciales', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('HEGI', 'Hotline des Etudes de Gestion et Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à', 'Maroc', NULL, NULL),
('HEM', 'Institut des Hautes Etudes de Management', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('I.F.PRO', 'Institut Privée de Formation Professionnelle', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IAGE', 'Institut de Gestion et d\'Informatique, Administration et Gestion', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IAM', 'Institut Architec de Marrakech', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IAT', 'Institut des Arts Traditionnels', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('IAVH-II', 'Institut Agronomique et Vétérinaire Hassan II', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IBZI', 'Institut Ibn Zaidoun d\'Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ICAM', 'Institut Catholique des Arts et des Métiers', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ICF', 'Institut Central de Formation', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IDS', 'Institut Delta', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IEEI', 'Institut Européen d\'Electronique et d\'Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IES', 'Institut Excel de Santé', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IESG', 'Institut Excel des Sciences de Gestion', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IFEER', 'Institut de Formation aux Engins et à l\'Entretien Routier', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IFIAG', 'Institut de Formation d\'Informatique Appliquée et de Gestion', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IFIAM', 'Institut Micro Syst.', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IFMEREE', 'Institut de Formation des Energies Renouvelables et Efficacité Energétique', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('IFMIA', 'Institut de Formation aux Métiers de l\'Industrie Automobile', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('IFPS', 'Institut de Formation du Personnel de Santé', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IFTC', 'Institut de Formation Technologique des Chantiers Privé', 'PRIVEE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('IFTSAU', 'Institut de Formation des Techniciens Spécialisés en Architecture et en Urbanisme', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IGA', 'Institut Supérieur du Génie Appliqué', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IGIA', 'Institut de Gestion et d\'Informatique Appliquée', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IGIAM', 'Institut de Gestion d\'Iformatique Appliquée et de Management', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IGIAP', 'Institut privé de gestion et d\'informatique appliquée & paramédical', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IGQ', 'Institut Groupe QUASAR', 'PRIVEE', 'ECOLES NORMALES', 'à', 'Maroc', NULL, NULL),
('IHEM', 'Institut des Hautes Etudes de Management', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IHFP', 'Institut Hachime de Formation Parmedicale', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IIHEM', 'International Institute for Higher Education in Morocco', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IINPGI', 'Institut Iqraa Net Privé de Gestion et d\'Informatique', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IIPM', 'Institut Ingénierie Poly Métiers', 'PRIVEE', 'ECOLE NORMALE', 'à l\'', 'Maroc', NULL, NULL),
('IKI', 'Institut Kiram Info', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ILEIC', 'Institut Libre des Etudes Informatiques et Commerciales', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ILGST', 'Institut Louis le Grand des Sciences et Techniques', 'ETRANGERES', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IMI', 'Institut Merise d\'Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IMM', 'Institut des Mines de Marrakech', 'ETATIQUE', 'IMM', 'à l\'', 'Maroc', NULL, NULL),
('IMMF', 'Institut Marrakech de Management et Finance', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IMPST', 'Institution Marocaine Privée des Sciences et Techniques', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IMS', 'Institut Micro-Système', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IMStec', 'Institution Marocaine  des Sciences et Techniques', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IMT', 'Institut  des Mines de Touissit', 'ETATIQUE', 'IMT', 'à l\'', 'Maroc', NULL, NULL),
('IMTA', 'Institut Medi Technology Avicenne', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IMV', 'INSTITUT DES METIERS DES VETEMENTS', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('IN.FOR.SYS', 'Institut d\'Informatique IN.FOR.SYS', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('In.O.A.K', 'Institut Omar Al  Khalifa', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('INATE', 'Institut d\'Administration et de Technologie', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('INFTR', 'Institut National de Formation aux Métiers du Transport Routier', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('INI-APP', 'Institut National d\'Informatique Appliquée', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('INP', 'Institut National Polytechnique', 'ETRANGER', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('INPT', 'Institut National des Postes et Télécommunications', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('INSA', 'Institut National des Sciences Appliquées', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('INSEA', 'Institut National de Statistique et d\'Economie Appliquée', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IOK', 'Institut Omar Al Khalifa', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IPESGP', 'Institut de Production d\'Energies et les Systèmes de Gestion Polytechnique', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IPFTDIG', 'Institut de Formation des Techniques de developpement Informatique et Gestion', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IPHT', 'Institut des Professionnels de l\'Hotellerie et du Tourisme', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IPIRNET', 'Institut Privé d\'Informatique,Réseau et Nouvelles Etudes de Télécommunication', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IPLT', 'Institut de Transport et de Logistique', 'PRIVEE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('IPO', 'Institut Privé ORDICIEL', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('IPSM', 'Institut Prince Sidi Mohammed', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ISB', 'Institut Spécialisé de Bâtiment', 'PRIVEE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISBTP', 'Institut Spécialisé du Batiment et des Travaux Publics', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISCAE', 'Institut Superieur du Commerce et d\'Administration des Entreprises', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ISEM', 'Institut Supérieur d’Etudes Maritimes', 'ETATIQUE', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('ISERT', 'Institut Supérieur d\'Electronique et des Réseaux et Télécommunications', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ISFO', 'INSTITUT SPECIALISE DE FORMATION DE L\'OFFSHORING', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISFPA', 'INSTITUT SPECIALISE EN FABRICATION DES PRODUITS AGROALIMENTAIRES', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISG', 'Institut superieur de gestion', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ISGA', 'Institut Supérieur d\'Ingénierie des Affaires', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à', 'Maroc', NULL, NULL),
('ISGI', 'Institut Spécilisé de Gestion et Informatique', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISGTF', 'Institut Spécialisé Génie Thermique et Froid', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISHR', 'Institut Spécialisé en Hôtellerie et Restauration', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISHT', 'Institut Spécialisé en Hôtellerie et Tourisme', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISI', 'Institut Supérieur Industriel', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISIAM', 'Institut Supérieur d\'Informatique Appliqée et de Management', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ISIC', 'Institut Spécialisé Industriel', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISIHR', 'Institut Supérieur d\'Industrie Hôteliere et de Restauration', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISIMA', 'Institut Spécialisé d\'Informatique de Modélisation et de leurs Applications', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ISIT', 'Institut Supérieur International du Tourisme', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ISMA', 'Institut Supérieur de Management et des Affaires', 'PRIVEE', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('ISMALA', 'Institut Spécialisé des Métiers de l\'Aéronautique et de la Logistique Aéroportuaire', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ISMC', 'Institut Spécialisé des Métiers du Cuir', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISMO', 'Institut Spécialisé dans les Métiers de l\'Offshoring', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISMTR', 'Institut Spécialisé dans les Métiers de Transport Routier', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISMTRL', 'Institut Spécialisé dans les métiers de transport routier et de la logistique', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISPITS', 'Institut Supérieur des Professions Infirmières et Techniques de Santé', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISPMR', 'Institut Supérieur des Pêches Maritimes', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISQE', 'Institut Supérieur de la Qualité et de l\'Environnement', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ISS', 'Institut des Sciences du Sport', 'ETATIQUE', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('IST', 'Institut des Sciences de la Terre', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ISTA', 'Institut Spécialisé de Technologie Appliquée', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISTA IE', 'Institut Spécialisé de Technologie Appliquée Inter-Entreprise', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISTA NTIC', 'Institut Spécialisé de Technologie Appliquée NTIC', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISTA-GM', 'Institut Spécialisé de Technologie Appliquée en Génie Mécanique', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISTAGEO', 'Institut Spécialisé en Topographie, Architecture et Géomatique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ISTAHT', 'Institut Spécialisé de Technologie Appliquée Hotelière et Touristique', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ISTAMH', 'Institut Supérieur de Technologie Appliquée Maintenance Hôtelière', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISTAT', 'Institut Spécialisé de Technologie Appliquée de Transport', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ISTI', 'Institut des Sciences et des Techniques d\'Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ISTIC', 'Institut Spécialisé des Technologies d\'Information et de Communication', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISTICG', 'Institut Spécialisé en Techniques Informatique, Commerce et Gestion', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ISTL', 'Institut Supérieur de Transport et de la Logistique', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('ISTP', 'Institut Spécialisé des Travaux Publics', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ISTT C', 'Institut Spécialisé de Tannerie et de Transformation de Cuir', 'ETATIQUE', 'CQP', 'à l\'', 'Maroc', NULL, NULL),
('ITA', 'Institut de Technologie Appliquée', 'ETATIQUE', 'CQP', 'à l\'', 'Maroc', NULL, NULL),
('ITA - MR', 'Institut de Technologie Appliquée - Moulay Rachid', 'ETATIQUE', 'CQP', 'à l\'', 'Maroc', NULL, NULL),
('ITA-A', 'Institut de Technologie Appliquée - Azli', 'ETATIQUE', 'CQP', 'à l\'', 'Maroc', NULL, NULL),
('ITAC', 'Etablissement Technique Agricole de la Chaouia', 'ETATIQUE', 'CQP', 'à l\'', 'Maroc', NULL, NULL),
('ITAG', 'Institut de Technologie Appliquée et de Gestion', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ITAJ', 'Institut deTechnologie Appliquée Jbel Lakhdar', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ITAJS', 'Institut Technique Agricole', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ITAMH', 'Institut de Technologie Appliquée Maintenance Hôtelière', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ITAP', 'Institut Technique Axer', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ITHT', 'Institut de Technologie Hôtelière et Touristique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ITPM', 'Institut deTechnologie des Pêches Maritimes', 'ETATIQUE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('ITSA', 'Institut Technique Spécialisé en Agriculture', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ITSGRT', 'Institut des Techniciens Spécialisés en Génie Rural et Topographie', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('ITSMAER', 'Institut des Techniques Spécialisé en Mécanique Agricole et Equipements Rurale', 'ETATIQUE', 'OFPPT', 'à l\'', 'Maroc', NULL, NULL),
('IUT', 'Institut Universitaire de Technologie', 'ETRANGERES', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('IUT SM', 'IUT DE SAINT- MALO', 'ETRANGERES', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('K.Sys', 'Institut Kanal Systèmes', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('LAK', 'Lycée Technique Al Khawarizmi', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LBP', 'Lycée Bernard Palissy', 'ETRANGERES', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LCB', 'Lycée CESAR BAGGIO', 'ETRANGERES', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LIA', 'Lycée Imam Al Ghazali', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LIAB', 'Lycée Imam Al Boukhari', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LIE', 'Lycée Ibn Elwafid', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LJBH', 'Lycée Jabir Ben Hayane', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LKH', 'Lycée Al Khansa', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LKY', 'Lycée Kachkat', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LM5', 'Lycée Mohammed 5', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LM6', 'Lycée Mohammed VI', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LPG', 'Lycée Polyvalent Gaston Bachelard Paris', 'ETRANGERES', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LQH II', 'Lycée Qualifiant Hassan II', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LQIBM', 'Lycée Qualifiant Ibn al Bannae el Morrakochi', 'ETATIQUE', 'ECOLES NORMALES', 'à', 'Maroc', NULL, NULL),
('LQM', 'Lycée Guy Mollet', 'ETRANGERES', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LQM-VI', 'LYCEE QUALIFIANT MOHAMED VI', 'ETATIQUE', 'ECOLE NORMALE', 'au', 'Maroc', NULL, NULL),
('LQMI', 'Lycée Qualifiant Moulay Ismail', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LQT', 'Lycée Qualifiant Technique', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LQTS', 'Lycée Qualifiant Tassaout', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LTA', 'LYCEE TECHNIQUE ALIDRISSI', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LTE', 'Lycée Technique Er-razi', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LTIS', 'Lycée Technique Ibn Sina', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LTMBB', 'Lycée Téchnique Mehdi Ben Berka', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LTPA', 'Lycée Technique Prince my Abdellah', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LTPMA', 'Lycée Tech. Prince My Abdellah', 'ETATIQUE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('LV', 'La Vision', 'PRIVEE', 'ECOLES NORMALES', 'à', 'Maroc', NULL, NULL),
('MCO', 'Cabinet Management Club Offshore', 'PRIVEE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('Mines ParisTech', 'Ecole Nationale Supérieure des Mines de Paris', 'ETRANGER', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('MS', 'MEGA School', 'PRIVEE', 'ECOLES NORMALES', 'à', 'Maroc', NULL, NULL),
('PIIMT', 'Private International Institute of Management and Technology', 'PRIVEE', 'ECOLES NORMALES', 'au', 'Maroc', NULL, NULL),
('PSB', 'Paris School of Business', 'ETRANGER', 'ECOLE SUPERIEURE', 'à', 'Maroc', NULL, NULL),
('RACINE', 'Ecole RACINE', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('RACINE PLUS', 'Ecole RACINE plus', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('SAGAM', 'Institut SAGAM', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('SAGI', 'Ecole Soft Art de Gestion et Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('Sup de Co', 'Ecole Supérieure de Commerce', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('SUP MTI', 'Ecole Supérieure de Management, de Télécommunication et d’Informatique', 'PRIVEE', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('SUPTEM', 'Ecole Supérieure des Sciences Techniques et de Management', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('T2I', 'Tensift Institut Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à', 'Maroc', NULL, NULL),
('Test', 'Test', 'Etatique', 'OFPPT', 'au', 'Maroc', '2023-01-27 22:26:16', '2023-01-27 22:26:16'),
('UBO', 'Université de Bretagne Occidentale', 'ETRANGER', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('UCLA', 'Université Clermont Auvergne', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UDL', 'Université de Lorraine', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UDP', 'Université de Paris 8', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UEMF', 'Université Euromed de Fes', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('UEMPR', 'Université d\'état de médecine dentaire Pavlov de Riazan', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UGA', 'Université Grenoble Alpes', 'ETRANGER', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('UIA', 'UNIVERSITE INTERNATIONALE D\'AGADIR', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('UIC', 'Université Internationale de Casablanca', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('UIR', 'Université Internationale de Rabat', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('UJMSE', 'Université Jean Monnet', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UL', 'Université Nationale Polytechnique de Lviv', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UM2', 'Université Montpellier 2', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UM6P', 'Université Mohammed VI Polytechnique', 'ETATIQUE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('UMD', 'Université MUNDIAPOLIS', 'PRIVEE', 'ECOLES SUPERIEURES', 'à l\'', 'Maroc', NULL, NULL),
('UNAPCK', 'Université Nationale de l\'Automobile et de Ponts et Chaussées de Kharkov', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UNI-TEC', 'Institut UNI-TEC d\'Informatique', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('UP-A', 'Université Panthéon-Assas', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UPD', 'Université Paris Diderot', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UPF', 'Université Privée de Fes', 'PRIVEE', 'ECOLE SUPERIEURE', 'à l\'', 'Maroc', NULL, NULL),
('UPM', 'UNIVERSITE PRIVEE DE MARRAKECH', 'PRIVEE', 'ECOLES NORMALES', 'à l\'', 'Maroc', NULL, NULL),
('UPRP', 'Université de Perpignan', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('UR', 'Université de la Rochelle', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('URCA', 'Université de Reims Champagne-Ardenne', 'ETRANGERES', 'FACULTES', 'à l\'', 'Maroc', NULL, NULL),
('WISIG', 'Wafa Institut Privé Spécialisé en Informatique et en Gestion', 'PRIVEE', 'OFPPT', 'au', 'Maroc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filieres`
--

CREATE TABLE `filieres` (
  `filiere` varchar(255) NOT NULL,
  `profil` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filieres`
--

INSERT INTO `filieres` (`filiere`, `profil`, `created_at`, `updated_at`) VALUES
('Administration et organisation de l\'entreprise', 'Administration', NULL, NULL),
('Agent Magasinier', 'GESTION', NULL, NULL),
('Agent Qualifié en Restauration', 'SERVICES', NULL, NULL),
('Agent Technique de Vente', 'ECONOMIE', NULL, NULL),
('Agro-industrie, Agroalimentaire et Management Industriel', 'Agriculture', NULL, NULL),
('Agroéconomie', 'ECONOMIE', NULL, NULL),
('AGROEQUIPEMENTS', 'MECANIQUE AGRICOLE', NULL, NULL),
('Aide à la Décision et R.O', 'GESTION', NULL, NULL),
('Aide Jardinier', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Aide Soignante', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Aménagement et Exploitation des Sols et Sous Sol', 'MINES', NULL, NULL),
('Aménagement et Gestion de l\'Environnement', 'ENVIRONNEMENT', NULL, NULL),
('Aménagement, Exploitation et Protect°. des Sols et sous Sols', 'MINES', NULL, NULL),
('Analyse Chimique et Qualité', 'CHIMIE', NULL, NULL),
('Analyse économique et financière', 'Economie', NULL, NULL),
('analyse et Gestion de Qualité', 'Qualité', NULL, NULL),
('Analyse et Gestion des Données Massives', 'INFORMATIQUE', NULL, NULL),
('Analyste en Informatique de Gestion', 'GESTION', NULL, NULL),
('Animateur HSE', 'HSE', NULL, NULL),
('Architecture', 'ARCHITECTURE', NULL, NULL),
('Architecture des Systèmes et Sécurité des Réseaux Informatiques', 'informatique', NULL, NULL),
('Architecture et en Urbanisme', 'GENIE CIVIL', NULL, NULL),
('Arts et Métiers', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Assistant en Gestion Administrative et Comptable', 'GESTION', NULL, NULL),
('Assistant en Gestion des Ressources Humaines', '', NULL, NULL),
('Assistant Manager', 'Management', NULL, NULL),
('Assistante Sociale', '', NULL, NULL),
('Attaché Commercial', '', NULL, NULL),
('Audit Contrôle Comptabilité', 'comptabilité', NULL, NULL),
('Audit et Contrôle de Gestion', '', NULL, NULL),
('Audit et Ingénierie Financière', '', NULL, NULL),
('Automation Industrielle', '', NULL, NULL),
('Automatique et Automatisme Industriel', 'Automatisme', NULL, NULL),
('Automatique et Informatique Industrielle', '', NULL, NULL),
('Automatique Traitement de Signal Informatique Industrielle', '', NULL, NULL),
('Automatisation et Informatique Industrielle', '', NULL, NULL),
('Automatisation et Instrumentation Industrielle', '', NULL, NULL),
('Automatisme Automatique et gestion des Bâtiments', '', NULL, NULL),
('Automatisme et Gestion des Bâtiments', '', NULL, NULL),
('Automatisme et Informatique Industrielle', 'automatisme', NULL, NULL),
('Automatisme et Instrumentation Industrielle', '', NULL, NULL),
('Automatsation et Instrumentation Industrielle', '', NULL, NULL),
('Bachelor of Science in Engineering & Management Science', '', NULL, NULL),
('Batiment', 'GENIE CIVIL', NULL, NULL),
('Big Data et Intelligence Artificielle', 'Big data', NULL, NULL),
('Biochimie Génétique et Microbiologie', '', NULL, NULL),
('Biologie', '', NULL, NULL),
('Biologie - Chimie - Géologie', '', NULL, NULL),
('Biologie Géologie', '', NULL, NULL),
('Biotechnologie des Plantes d\'Intérêt Agro-Economiques', '', NULL, NULL),
('Bureau d\'Etude en Construction Métalli', '', NULL, NULL),
('Bureauticien Certifié en MOS', '', NULL, NULL),
('Caractérisation et Valorisation des Matériaux à Base de Terres Rares', 'Valorisation Terres', NULL, NULL),
('Cariste d\'entrepôt', 'Conducteur', NULL, NULL),
('Certificat des Compétences Professionnelles', '', NULL, NULL),
('Changement Climatique et Developpement Durable', '', NULL, NULL),
('Chaudronnerie Tôles Fines', '', NULL, NULL),
('Chef de Chantier Travaux Publics', '', NULL, NULL),
('Chef Produit', '', NULL, NULL),
('Chimie', 'CHIMIE', NULL, NULL),
('Chimie Analyse Contrôle', 'CHIMIE', NULL, NULL),
('Chimie Analytique', 'CHIMIE', NULL, NULL),
('Chimie Analytique et Démarche Qualité', 'Qualité', NULL, NULL),
('Chimie Analytique et Formulation', 'CHIMIE', NULL, NULL),
('Chimie appliquée', 'chimie', NULL, NULL),
('Chimie Appliquée et Environnement', 'CHIMIE', NULL, NULL),
('Chimie de Matériaux et d\'Applications', 'CHIMIE', NULL, NULL),
('Chimie des Matériaux', 'Chimie', NULL, NULL),
('Chimie des Matériaux et ses Applications Industrielles', 'CHIMIE', NULL, NULL),
('Chimie du Solide et des Matériaux', 'CHIMIE', NULL, NULL),
('Chimie Industrielle', 'CHIMIE', NULL, NULL),
('Chimie Organique et Bioorganique', 'CHIMIE', NULL, NULL),
('Chimiométrie et Analyses Chimiques', 'CHIMIE', NULL, NULL),
('Commande et Management Industriel', '', NULL, NULL),
('Commerce', 'ECONOMIE', NULL, NULL),
('Commerce et Gestion', 'ECONOMIE', NULL, NULL),
('Commerce International', '', NULL, NULL),
('Commerce International et logistiques', 'ECONOMIE', NULL, NULL),
('Communication production multimédia', 'ECONOMIE', NULL, NULL),
('Communication, Gestion des Ressources Humaines, et Psychologie de Travail en Ingénierie.', 'ECONOMIE', NULL, NULL),
('Comptabilité d\'Entreprise', '', NULL, NULL),
('Comptabilité d\'Entreprises', 'ECONOMIE', NULL, NULL),
('Comptabilité et Gestion', 'ECONOMIE', NULL, NULL),
('Comptabilité et Gestion d\'Entreprise', 'ECONOMIE', NULL, NULL),
('Comptabilité, Contrôle et Audit', 'ECONOMIE', NULL, NULL),
('Comptable d\'Entreprises', '', NULL, NULL),
('Conception de Produit Industriel', 'TECHNIQUE', NULL, NULL),
('Conception de Prouduits Industriels', 'TECHNIQUE', NULL, NULL),
('Conception Développement et Architecture des Systèmes', 'TECHNIQUE', NULL, NULL),
('Conception et Analyse Mécanique', 'TECHNIQUE', NULL, NULL),
('Conception et Production Industrielles', 'TECHNIQUE', NULL, NULL),
('CONCEPTION ET PRODUCTION INTEGREES', 'GENIE MECANIQUE', NULL, NULL),
('Conception Mécanique , Génie Industriel', 'Mécanique', NULL, NULL),
('Conception Mécanique Assistée par Ordinateur', 'TECHNIQUE', NULL, NULL),
('Conception Mécanique et Innovation', 'TECHNIQUE', NULL, NULL),
('Conception Mécanique et Production Integrée', 'MECANIQUE', NULL, NULL),
('Conception Mécanique et Productique', 'TECHNIQUE', NULL, NULL),
('Conducteur d\'Engins', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Conducteur de Travaux', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Conducteur Routier de Voyageur', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Conducteur Routier de Voyageurs', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Conducteur Routier des Marchandises', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Conduite et Opération de la Pelle Hydraulique', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Conduite et Opération du Bulldozer', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Construction Mécanique & Production Intégrée', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Construction Métallique', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Contrôle de Gestion', 'GESTION', NULL, NULL),
('Contrôle de Gestion et Nouveaux Systèmes Technologiques', 'Contrôle de Gestion', NULL, NULL),
('Contrôle de Qualité', 'GESTION', NULL, NULL),
('Contrôle des Systèmes Electriques', 'TECHNIQUE', NULL, NULL),
('Contrôle Informatique Systèmes et Signaux', 'informatique', NULL, NULL),
('Contrôle, Informatique Industrielle, Signaux et Systèmes', 'TECHNIQUE', NULL, NULL),
('Contrôleur de Gestion et Audit', 'GESTION', NULL, NULL),
('Coupe et coûture', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Cuisine', 'SERVICES', NULL, NULL),
('Cuisine et Restauration', '', NULL, NULL),
('Cycle Préparatoire', '', NULL, NULL),
('Data & Software Engineering', 'data', NULL, NULL),
('Défense et Systèmes de Télécommunications Embarqées', '', NULL, NULL),
('Dessin de Batiment', '', NULL, NULL),
('Dessinateur de Batiment', '', NULL, NULL),
('Dessinateur en Construction Métallique', '', NULL, NULL),
('Développement des Systèmes d\'Information', '', NULL, NULL),
('Développement Digital', '', NULL, NULL),
('Développement Humain', '', NULL, NULL),
('Développement informatique', '', NULL, NULL),
('Développement Multimédia', '', NULL, NULL),
('Développement Web', '', NULL, NULL),
('Diagnostic Electronique Embarquée Automobile', '', NULL, NULL),
('Diagnostic et Electronique Embarqué Automobile', '', NULL, NULL),
('Diagnostic et Electronique Embarquée', '', NULL, NULL),
('Droit de la Distribution et du Marketing', 'JURIDIQUE', NULL, NULL),
('Droit des Affaires', 'JURIDIQUE', NULL, NULL),
('Droit et Gestion de l\'Entreprise', 'JURIDIQUE', NULL, NULL),
('Droit Privé', 'JURIDIQUE', NULL, NULL),
('Droit Public', 'JURIDIQUE', NULL, NULL),
('Dynamique des Milieux et Gestion des Ressources Naturelles au Maroc', '', NULL, NULL),
('e-Management et Business Intelligence', 'Management', NULL, NULL),
('Eau et développement durable', '', NULL, NULL),
('Eau et Environnement', '', NULL, NULL),
('Ecole polytechnique', '', NULL, NULL),
('Economie', 'ECONOMIE', NULL, NULL),
('Economie Appliquée en Environnement et changement climatique', 'ECONOMIE', NULL, NULL),
('Economie Appliquée et Statistique', 'ECONOMIE', NULL, NULL),
('Economie d\'Entreprise', 'ECONOMIE', NULL, NULL),
('Economie de l\'Environnement', 'ECONOMIE', NULL, NULL),
('Economie et Commerce', 'ECONOMIE', NULL, NULL),
('Economie et Gestion', 'ECONOMIE', NULL, NULL),
('Economie Sociale et Développement Durable', 'ECONOMIE', NULL, NULL),
('Elaboration et Transformation des Polymères', '', NULL, NULL),
('Electonique Electrotechnique Automatique', '', NULL, NULL),
('Electricité', 'ELECTRICITE', NULL, NULL),
('Electricité d\'Entretien', 'ELECTRICITE', NULL, NULL),
('Electricité d\'Entretien Industriel', 'ELECTRICITE', NULL, NULL),
('Electricité d\'Installation', 'ELECTRICITE', NULL, NULL),
('Electricité de Bâtiment', 'ELECTRICITE', NULL, NULL),
('Electricité de la Maintenance Industrielle', 'ELECTRICITE', NULL, NULL),
('Electricité de Maintenance Industrielle', 'ELECTRICITE', NULL, NULL),
('ELECTRICITE GENERALE', 'ELECTRICITE', NULL, NULL),
('Electricité Industrielle', 'ELECTRICITE', NULL, NULL),
('Electromécanique', 'ELECTRICITE', NULL, NULL),
('Electromécanique & Maintenance Industrielle', '', NULL, NULL),
('Electromécanique des Systèmes Automatisés', '', NULL, NULL),
('Electromécanique des Systèmes industriels', '', NULL, NULL),
('Electromécanique et Systèmes Automat', '', NULL, NULL),
('Electromécanique et Systèmes Automatisés', '', NULL, NULL),
('Electronics and optics e-eurning for Embedded Systems', '', NULL, NULL),
('Electronique', 'ELECTRONIQUE', NULL, NULL),
('Electronique  Industrielle', 'ELECTRONIQUE', NULL, NULL),
('Electronique Automatique et Automatisme', 'ELECTRONIQUE', NULL, NULL),
('Electronique Embarquée pour l\'Automobile', 'ELECTRONIQUE', NULL, NULL),
('Electronique et Informatique Industrielle', 'ELECTRONIQUE', NULL, NULL),
('Electronique et systèmes embarqués', 'electronique', NULL, NULL),
('Electronique et Télécommunication', 'ELECTRONIQUE', NULL, NULL),
('Electronique, Automatique et Automatisme Industriel', 'ELECTRONIQUE', NULL, NULL),
('Electronique, Electrotechnique, Automatique', 'ELECTRONIQUE', NULL, NULL),
('Electronique, Energie, Systèmes Embarqués', 'ELECTRONIQUE', NULL, NULL),
('Electrotech. des Energies Rnvlbe et Efficacité Energétique', 'ELECTRONIQUE', NULL, NULL),
('Electrotechnique et Electronique de Puissance', 'ELECTRONIQUE', NULL, NULL),
('Electrotechnique et Electronique Industrielle', 'ELECTRONIQUE', NULL, NULL),
('Electrotechnique et Energies Renouvelables', 'Energie', NULL, NULL),
('Electrotechnique et Informatique Industrielle', 'ELECTRONIQUE', NULL, NULL),
('Electrotechniques', 'ELECTRONIQUE', NULL, NULL),
('Employé Polyvalent Grande Distribution', '', NULL, NULL),
('Energétique', 'ENERGIE', NULL, NULL),
('Energétique Electronique et Automatique', 'ENERGIE', NULL, NULL),
('Energétique et Energies Renouvelables', 'ENERGIE', NULL, NULL),
('Energie et Matériaux', 'ENERGIE', NULL, NULL),
('Energie Renouvelable et Mobilité Electrique', '', NULL, NULL),
('Energies Renouvelables', 'ENERGIE', NULL, NULL),
('Energies Renouvelables et Efficacité Energétique', 'ENERGIE', NULL, NULL),
('Energies Renouvelables et Mobilité Electrique', '', NULL, NULL),
('Energies Renouvelables et Réseaux Intelligents', 'Ingénierie Electrique', NULL, NULL),
('Entreprenariat et Management des Organisations', 'Management', NULL, NULL),
('Entreprenariat et Stratégie des PME', 'ENERGIE', NULL, NULL),
('Environnement', 'Environnement', NULL, NULL),
('Environnement et Sécurité Industriels', '', NULL, NULL),
('Environnement et Techniques de l\'Eau', '', NULL, NULL),
('Etudes Juridiques et Politique Arabe', 'JURIDIQUE', NULL, NULL),
('Exploitation en Transport', '', NULL, NULL),
('Exploration et Valorisation des Géoressources', '', NULL, NULL),
('Exploration et Valorisation des Ressources Minérales', '', NULL, NULL),
('Fabrication en Electronique', 'Electronique', NULL, NULL),
('Fabrication Mécanique', 'MAINTENANCE', NULL, NULL),
('Finance', 'ECONOMIE', NULL, NULL),
('Finance - Comptabilité - Fiscalité', 'ECONOMIE', NULL, NULL),
('Finance Audit et Contrôle de Gestion', 'ECONOMIE', NULL, NULL),
('Finance et Audit', 'ECONOMIE', NULL, NULL),
('Finance et Comptabilité', 'ECONOMIE', NULL, NULL),
('Finance et Gestion d\'Entreprises', 'ECONOMIE', NULL, NULL),
('Finances, Banque et Assurances', 'ECONOMIE', NULL, NULL),
('Froid Commercial et Climatisation', '', NULL, NULL),
('Froid et Climatisation', '', NULL, NULL),
('Génie Chimique', 'CHIMIE', NULL, NULL),
('Génie Civil', 'GENIE CIVIL', NULL, NULL),
('Génie Civil, Bâtiments et Travaux Publics', 'GENIE CIVIL', NULL, NULL),
('Génie civil, Génie Urbain et Environnement', 'Génie civil', NULL, NULL),
('Génie Climatique', '', NULL, NULL),
('Génie de l\'Eau et de l\'Environnement', 'environnement', NULL, NULL),
('GENIE DE L\'ENVIRONNEMENT', 'ENVIRONNEMENT', NULL, NULL),
('Génie de l\'Hydraulique, Environnement et de la Ville', '', NULL, NULL),
('Génie des Connaissances et des Données', '', NULL, NULL),
('Génie des Données et Veille', 'informatique', NULL, NULL),
('Génie des Energies Renouvelables et Systèmes Energétiques', 'Energie', NULL, NULL),
('Génie des Matériaux', '', NULL, NULL),
('Génie des Matériaux pour Plasturgie et Métallurgie', 'Métallurgie', NULL, NULL),
('Génie des Matériaux Qualité et Environnement', '', NULL, NULL),
('Génie des Mines', 'MINES', NULL, NULL),
('Génie des Procédés', '', NULL, NULL),
('Génie des Procédés de l\'Energie et de l\'Environnement', '', NULL, NULL),
('Génie des Procédés et d\'Environnement', '', NULL, NULL),
('Génie des Procédés et Matériaux Céramiques', '', NULL, NULL),
('Génie des Procédés Industriels', '', NULL, NULL),
('Génie des Procédés Industriels et Digitalisation', 'Digitalisation', NULL, NULL),
('Génie des Systèmes Automatiques Industriels', '', NULL, NULL),
('Génie des Systèmes de Management Qualité, Sécurité et Environnement', '', NULL, NULL),
('Génie des Systèmes Electriques', '', NULL, NULL),
('Génie des Systèmes Electroniques et Automatiques', '', NULL, NULL),
('Génie des Systèmes Industriels', '', NULL, NULL),
('Génie des Systèmes Mécaniques', '', NULL, NULL),
('Génie Documentaire et des Connaissances', 'Génie des Connaissances et des Données', NULL, NULL),
('Génie Electrique', '', NULL, NULL),
('Génie Electrique  Systèmes Mécatronique', 'Electrique', NULL, NULL),
('Génie Electrique - Génie Mécanique', '', NULL, NULL),
('Génie Electrique Electronique et Télécommunications', '', NULL, NULL),
('Génie Electrique et Automatique', '', NULL, NULL),
('Génie Electrique et Contrôle des Systèmes Industriels', '', NULL, NULL),
('Génie Electrique et Contrôle Industriel', 'Electricité', NULL, NULL),
('Génie Electrique et Informatique Industrielle', '', NULL, NULL),
('Génie Electrique et Systèmes Automatisés', '', NULL, NULL),
('Génie Electrique et Systèmes Embarqués', '', NULL, NULL),
('Génie Electrique et Télécommunications', '', NULL, NULL),
('Génie Electrique, Systèmes Embarqués et Télécommunications', 'Génie Electrique', NULL, NULL),
('Génie Electromécanique', '', NULL, NULL),
('Génie Electromécanique et Systèmes Industriels', '', NULL, NULL),
('Génie Electronique', '', NULL, NULL),
('Génie Electronique et Informatique Industrielle', '', NULL, NULL),
('Génie Energétique', '', NULL, NULL),
('Génie Energétique et Electrique', '', NULL, NULL),
('Génie Energétique et Environnement', '', NULL, NULL),
('Génie Energie Electrique', '', NULL, NULL),
('Génie Environnement', '', NULL, NULL),
('Génie et Chimie des Matériaux', '', NULL, NULL),
('Génie Géoingénierie', '', NULL, NULL),
('Génie Géologique, Hydrogéotechnique et Minier', '', NULL, NULL),
('Génie Industriel', '', NULL, NULL),
('Génie Industriel : Intelligence Artificielle et Data Science', 'AI', NULL, NULL),
('Génie Industriel & Logistique', '', NULL, NULL),
('Génie Industriel & Productique', '', NULL, NULL),
('Génie Industriel et Energies Renouvlables', '', NULL, NULL),
('Génie Industriel et Logistique', '', NULL, NULL),
('Génie Industriel et Maintenance', '', NULL, NULL),
('Génie Industriel et Technologies Numériques', 'Digitalisation', NULL, NULL),
('Génie Industriel Option Logistique Internationale', '', NULL, NULL),
('Génie Industriel, Option Productique', 'Génie Industriel', NULL, NULL),
('Génie Informatique', '', NULL, NULL),
('Génie Informatique et Industriel', '', NULL, NULL),
('Génie Logiciel', '', NULL, NULL),
('Génie logiciel et Système Informatique distribués', '', NULL, NULL),
('Génie Logistique', '', NULL, NULL),
('Génie Mathématique et Modélisation', '', NULL, NULL),
('Génie Mécanique', '', NULL, NULL),
('Génie Mécanique Energétique', '', NULL, NULL),
('Génie Mécanique et Productique', '', NULL, NULL),
('Génie Mécanique et Structures', '', NULL, NULL),
('Génie Mécanique et Systèmes Automatisés', 'Génie Mécanique', NULL, NULL),
('Génie Mécanique et Systèmes Industriels', 'Génie Mécanique', NULL, NULL),
('Génie Mécanique pour l\'Industrie Aéronautique', '', NULL, NULL),
('Génie Mécatronique', '', NULL, NULL),
('Génie Minéral', '', NULL, NULL),
('Génie Minéral et Environnement', '', NULL, NULL),
('Génie Minier', 'Mine', NULL, NULL),
('Génie Modélisation et Informatique Scientifique', '', NULL, NULL),
('Génie Physique : Matériaux et Energie', '', NULL, NULL),
('Génie Réseaux et Télécommunications', '', NULL, NULL),
('Génie Rural', '', NULL, NULL),
('Génie Thermique et Energétique', '', NULL, NULL),
('Génie Thermique et Energie', '', NULL, NULL),
('Génie Urbain et Environnement', 'Environnement', NULL, NULL),
('Géodynamique, Géoressources et Environnement', '', NULL, NULL),
('Géographie', '', NULL, NULL),
('Géoingénierie', '', NULL, NULL),
('Géologie', '', NULL, NULL),
('Géologie Appliquée', '', NULL, NULL),
('Géologie Appliquée à la Prospection des Ressources Minières', 'Géologie', NULL, NULL),
('Géologie Appliquée aux Ressources Minières', '', NULL, NULL),
('Géologie de Conception', '', NULL, NULL),
('Géomat et Aménagement du Territoire', '', NULL, NULL),
('Géomatique Appliquée', '', NULL, NULL),
('Géomètre', '', NULL, NULL),
('Géomètre Topographe', '', NULL, NULL),
('Géoressources Energétiques et Réservoirs', 'GEORESSOURCES', NULL, NULL),
('Géoressources et environnement', '', NULL, NULL),
('Géoressources et Milieu Naturel', '', NULL, NULL),
('Géorisque, Géomatique, Géomatériaux et Géoenvironnement', '', NULL, NULL),
('Géosciences Appliquées aux Ressources Minérales', 'Mine', NULL, NULL),
('Géosciences de l\'environnement', '', NULL, NULL),
('Géosciences de l\'Environnement et Genie Civil', '', NULL, NULL),
('Géosciences des Ressources Naturelles', 'MINES', NULL, NULL),
('Géosciences et Ressources Minérales', '', NULL, NULL),
('Géotechnique et Génie Géologique', '', NULL, NULL),
('Géotechnique et Mines', '', NULL, NULL),
('Gestion', 'GESTION', NULL, NULL),
('GESTION ADMINISTRATIVE ET COMMERCIALE', 'GESTION', NULL, NULL),
('Gestion Chaine Logistique', 'GESTION', NULL, NULL),
('Gestion Commerce', 'GESTION', NULL, NULL),
('Gestion d\'Entreprise', '', NULL, NULL),
('Gestion de l\'Assainissement Liquide en Milieu Urbain', 'GESTION', NULL, NULL),
('Gestion de l\'Environnement & Développement', '', NULL, NULL),
('Gestion de la Maintenance Industrielle', 'GESTION', NULL, NULL),
('Gestion de la Qualité', 'GESTION', NULL, NULL),
('Gestion de Maintenance Industrielle', 'GESTION', NULL, NULL),
('Gestion De Production En Habillement', 'GESTION', NULL, NULL),
('Gestion de Production en Textile', 'GESTION', NULL, NULL),
('Gestion des Affaires Maritimes', 'Mer', NULL, NULL),
('Gestion des Entreprises et des Administrations', 'GESTION', NULL, NULL),
('Gestion des Organisations et des Destinations Touristiques', 'GESTION', NULL, NULL),
('Gestion des PME-PMI', 'GESTION', NULL, NULL),
('Gestion des Ressources Humaines', 'GESTION', NULL, NULL),
('Gestion des Ressources Naturelles et Développement Durable', 'GESTION', NULL, NULL),
('Gestion des Risques Naturels et Technologiques', 'GESTION', NULL, NULL),
('Gestion des Systèmes et Réseaux', 'GESTION', NULL, NULL),
('Gestion et Administration des Entreprises', 'GESTION', NULL, NULL),
('Gestion et Analyse des Données Massives', 'Big Data', NULL, NULL),
('Gestion et Conservation de la biodiversité', 'GESTION', NULL, NULL),
('Gestion et Organisation Industrielles', 'GESTION', NULL, NULL),
('Gestion et Valorisation des Géoressources', 'GESTION', NULL, NULL),
('Gestion Financière et Comptable', 'GESTION', NULL, NULL),
('Gestion Générale', 'GESTION', NULL, NULL),
('Gestion Hôtelière', 'TOURISME', NULL, NULL),
('Gestion Industrielle et Logistique', 'GESTION', NULL, NULL),
('Gestion Informatisée', 'GESTION', NULL, NULL),
('Gestion Logistique et Transport', 'GESTION', NULL, NULL),
('Gestion PME', 'Economie', '2023-01-29 18:51:28', '2023-01-29 18:51:28'),
('Gestionnaire Comptable et Financier', 'GESTION', NULL, NULL),
('Gouvernance des Projets dans le Territoire Fragile au Maroc et en Afrique Subsaharienne', 'gouvernance', NULL, NULL),
('Gouvernance et Economie', 'GESTION', NULL, NULL),
('Gros Oeuvres', 'GENIE CIVIL', NULL, NULL),
('Hôtelerie', 'TOURISME', NULL, NULL),
('Hydrogéologie et Géologie de l\'Ingénieur', 'MINES', NULL, NULL),
('Hygiène Sécurité Environnement', 'HSE', NULL, NULL),
('ICMAO', NULL, NULL, NULL),
('Industrie Agro-Alimentaire', 'Agriculture', NULL, NULL),
('Industrie des ressources minérales et societé', 'Mine', NULL, NULL),
('Infermière polyvalente', 'SANTE', NULL, NULL),
('Infirmier', 'SANTE', NULL, NULL),
('Infirmier Auxiliaire', 'SANTE', NULL, NULL),
('Infirmière Aide Soignante', 'SANTE', NULL, NULL),
('Infirmière Auxiliaire', 'SANTE', NULL, NULL),
('Informa et Nouvelles Techno d\'Information et de Communica', 'INFORMATIQUE', NULL, NULL),
('Informat., Electronique,Electrotech.et Automatique', 'INFORMATIQUE', NULL, NULL),
('Informatique', 'INFORMATIQUE', NULL, NULL),
('Informatique Appliquée à la Gestion', 'INFORMATIQUE', NULL, NULL),
('Informatique Bureautique', 'INFORMATIQUE', NULL, NULL),
('Informatique de Gestion', 'INFORMATIQUE', NULL, NULL),
('Informatique Décisionnelle', 'INFORMATIQUE', NULL, NULL),
('Informatique et Analyse des Systèmes', 'INFORMATIQUE', NULL, NULL),
('Informatique et Bureatique', 'INFORMATIQUE', NULL, NULL),
('Informatique et Gestion d\'Entreprises', 'INFORMATIQUE', NULL, NULL),
('Informatique et Gestion Industrielle', 'INFORMATIQUE', NULL, NULL),
('Informatique et Logistique', 'INFORMATIQUE', NULL, NULL),
('Informatique et Management', 'INFORMATIQUE', NULL, NULL),
('Informatique et Management des Systèmes', 'INFORMATIQUE', NULL, NULL),
('Informatique et Réseaux', 'INFORMATIQUE', NULL, NULL),
('Informatique Industrielle', 'INFORMATIQUE', NULL, NULL),
('Informatiste', 'INFORMATIQUE', NULL, NULL),
('Informatiste Spécialisé', 'INFORMATIQUE', NULL, NULL),
('Ing. Mécanique Energétique', 'ENERGIE', NULL, NULL),
('Ingénerie de la Chimie Industrielle', 'Chimie', NULL, NULL),
('Ingénerie Informatique et Réseaux', 'INFORMATIQUE', NULL, NULL),
('Ingénerie Mécanique', 'Mécanique', NULL, NULL),
('Ingénerie Minière', 'MINES', NULL, NULL),
('Ingénierie', NULL, NULL, NULL),
('Ingénierie Chimique et Sciences des Matériaux', 'Chimie', NULL, NULL),
('Ingénierie de Conception et de Développement d\'Applications', 'INFORMATIQUE', NULL, NULL),
('Ingénierie de l\'aéronautique', 'Aéronautique', NULL, NULL),
('Ingénierie de l\'Automatisme et Informatique Industrielle', 'INFORMATIQUE', NULL, NULL),
('Ingénierie de l’Hydraulique et de l\'Environnement', NULL, NULL, NULL),
('Ingénierie de la Finance et de l\'Assurance', 'ECONOMIE', NULL, NULL),
('Ingénierie des Automatismes et Informatique Industrielle', NULL, NULL, NULL),
('Ingénierie des Connaissances et des Données', NULL, NULL, NULL),
('Ingénierie des Procédés', NULL, NULL, NULL),
('Ingénierie des Procédés Industriels', NULL, NULL, NULL),
('Ingénierie des Réseaux Infrmatiques et des Systèmes de Télécommunications Inélégantes', 'Informatique', NULL, NULL),
('Ingénierie des Systèmes & Réseaux Informatiques', 'INFORMATIQUE', NULL, NULL),
('Ingénierie des Systèmes Automatisés', NULL, NULL, NULL),
('Ingénierie des Systèmes Automobiles', NULL, NULL, NULL),
('Ingénierie des Systèmes d\'Information', NULL, NULL, NULL),
('Ingénierie des Systèmes Informatiques', 'INFO', NULL, NULL),
('Ingénierie des Technologies de l\'Information et Réseaux de Communication', NULL, NULL, NULL),
('Ingénierie Ecologique et Méthodologies d\'Analyse et de Gestion de la Biodiversité', NULL, NULL, NULL),
('Ingénierie Electrique', NULL, NULL, NULL),
('Ingénierie en Actuariat Finances', 'ECONOMIE', NULL, NULL),
('Ingénierie en Actuariat Finances et Calcul Scientifique', NULL, NULL, NULL),
('Ingénierie en Génie Civil', 'GENIE CIVIL', NULL, NULL),
('Ingénierie en Génie des Matériaux', NULL, NULL, NULL),
('Ingénierie en Intelligence Artificielle', NULL, NULL, NULL),
('Ingénierie en Mécatronique', NULL, NULL, NULL),
('Ingénierie en Réseaux Informatique et Systèmes d\'Informations', NULL, NULL, NULL),
('Ingénierie en Sciences Appliquées', NULL, NULL, NULL),
('Ingénierie en Systèmes Electriques et Télécommunications', NULL, NULL, NULL),
('Ingénierie et la Gestion de l\'Environnement Industriel', NULL, NULL, NULL),
('Ingénierie et Management du Développement', NULL, NULL, NULL),
('Ingénierie et Technologies pour l\'Education et Formation', NULL, NULL, NULL),
('Ingénierie Financière', NULL, NULL, NULL),
('Ingénierie Financière et Audit', NULL, NULL, NULL),
('Ingénierie Informatique', NULL, NULL, NULL),
('Ingénierie Informatique Electronique et Automatique', NULL, NULL, NULL),
('Ingénierie Informatique et Electronique', NULL, NULL, NULL),
('Ingénierie Informatique et Réseaux', NULL, NULL, NULL),
('Ingénierie Informatique, Big data et Cloud Computing-II-BDCC', NULL, NULL, NULL),
('Ingénierie Mathématique et Info. Appliquée à l\'Economie', NULL, NULL, NULL),
('ingénierie Mécanique Pour l\'Industrie Aeronautique', 'AERONAUTIQUE', NULL, NULL),
('Ingénierie Réseaux et Télécommunications', NULL, NULL, NULL),
('Ingénierie Systèmes, Réseaux et Sécurité', NULL, NULL, NULL),
('Ingénieur des Systèmes & Services Numériques', NULL, NULL, NULL),
('Ingénieur Généraliste', NULL, NULL, NULL),
('ingénieur Innovation & AMOA', 'DIGITALISATION', NULL, NULL),
('Ingénieur Innovation et AMOA', 'Innovation', NULL, NULL),
('Inorganiques, Physico-chimie et Analyse des Matériaux', 'Chimie', NULL, NULL),
('Installation Thermique et Sanitaire', NULL, NULL, NULL),
('Installations Sanitaires et Thermiques', NULL, NULL, NULL),
('INSTITUT SPECIALISE INDUSTRUEL', 'GESTION', NULL, NULL),
('INSTRUMENATION ET SYSEMES', NULL, NULL, NULL),
('Instrumentation et Systèmes', NULL, NULL, NULL),
('Instrumentation Réseaux et Energie Renouvelable', 'Energie', NULL, NULL),
('Jardinier', NULL, NULL, NULL),
('LOGISTIQUE', NULL, NULL, NULL),
('Logistique Aéroportuaire', NULL, NULL, NULL),
('LOGISTIQUE DE DISTRIBUTION', NULL, NULL, NULL),
('Logistique de Distribution et Supply Chain Management', NULL, NULL, NULL),
('Logistique et Commerce', 'Economie', NULL, NULL),
('Logistique et Transport', NULL, NULL, NULL),
('Maintenance de Véhicule Automobile', 'MAINTENANCE', NULL, NULL),
('Maintenance des Appareils Informatiques et Réseaux', 'MAINTENANCE', NULL, NULL),
('Maintenance des Engins Lourds et Véhicules Industriels', 'MAINTENANCE', NULL, NULL),
('Maintenance des Equipements Industriels', 'MAINTENANCE', NULL, NULL),
('Maintenance des Installations Automatisées', 'MAINTENANCE', NULL, NULL),
('Maintenance des Installations et Exploitation des Usines et Réseaux d\'eau', 'Maintenance', NULL, NULL),
('Maintenance des Machines Outils et Autres Machines de Production Automatisée', 'MAINTENANCE', NULL, NULL),
('Maintenance des Machines-Outils et Autres Machines de Product° Automatisées', 'MAINTENANCE', NULL, NULL),
('Maintenance des Systèmes Automatisés', 'MAINTENANCE', NULL, NULL),
('Maintenance Electromécanique et Gestion d\'Energie', 'Maintenance', NULL, NULL),
('Maintenance Electronique', 'MAINTENANCE', NULL, NULL),
('Maintenance en Industrie Agoalimentaire', 'Maintenance', NULL, NULL),
('Maintenance et Exploitation des Installations Industrielles', 'MAINTENANCE', NULL, NULL),
('Maintenance et Gestion des Systèmes Industriels', 'MAINTENANCE', NULL, NULL),
('Maintenance et Support Informatique et Réseaux', 'MAINTENANCE', NULL, NULL),
('Maintenance Hôtelière', 'MAINTENANCE', NULL, NULL),
('Maintenance Industrielle', 'MAINTENANCE', NULL, NULL),
('Maintenance Informatique', 'MAINTENANCE', NULL, NULL),
('Maîtrise Sciences et Techniques', 'SCIENCE', NULL, NULL),
('Maitrise,GénieChimique', 'CHIMIE', NULL, NULL),
('Management', 'MANAGEMENT', NULL, NULL),
('Management Bancaire et Financier', 'MANAGEMENT', NULL, NULL),
('Management Commercial', 'MANAGEMENT', NULL, NULL),
('Management d\'Environnement et Développement Durable', 'MANAGEMENT', NULL, NULL),
('Management de la Logistique Industriel', 'MANAGEMENT', NULL, NULL),
('Management de la Qualité', 'MANAGEMENT', NULL, NULL),
('Management de la Qualité, Hygiène Sécurité et Environnement', 'MANAGEMENT', NULL, NULL),
('Management de la Sécurité, de l\'Hygiène, de l\'Environnement', 'MANAGEMENT', NULL, NULL),
('Management des Organisations', 'MANAGEMENT', NULL, NULL),
('Management des Ressources Humaines', 'MANAGEMENT', NULL, NULL),
('Management des Systèmes d\'Information et de Production', NULL, NULL, NULL),
('Management des Systèmes Électriques Intelligents', 'Enérgie', NULL, NULL),
('Management du Sport', 'Sport', NULL, NULL),
('Management et Ingénierie Logistique', 'MANAGEMENT', NULL, NULL),
('Management et techniques logistiques du commerce international', 'management', NULL, NULL),
('Management Financier de l\'Entreprise', 'Management', NULL, NULL),
('Management Fondamental', 'Management', NULL, NULL),
('Management Industriel', 'MANAGEMENT', NULL, NULL),
('Management industriel et excellence opérationnelle', 'Management', NULL, NULL),
('Management international et logistique', 'management', NULL, NULL),
('Management Logistique', 'MANAGEMENT', NULL, NULL),
('Management Logistique et Stratégie', 'MANAGEMENT', NULL, NULL),
('Management Logistique et Transport', 'MANAGEMENT', NULL, NULL),
('Management Spécialisé', 'Management', NULL, NULL),
('Management Stratégique et Logistique', 'MANAGEMENT', NULL, NULL),
('Management Touristique', 'MANAGEMENT', NULL, NULL),
('Manager Commercial', 'MANAGEMENT', NULL, NULL),
('Manintenance Industrielle des Systémes Eléctromécaniques', 'MAINTENANCE', NULL, NULL),
('Marketing', 'ECONOMIE', NULL, NULL),
('Marketing et Commerce', 'ECONOMIE', NULL, NULL),
('Marketing et Communication Commerciale', 'ECONOMIE', NULL, NULL),
('Marketing et Management Opérationnel', 'ECONOMIE', NULL, NULL),
('Marketing Management Commerce', 'ECONOMIE', NULL, NULL),
('Marketing stratégique et négociations', 'ECONOMIE', NULL, NULL),
('Matériaux Avancés Multifonctionnels et Environnement', 'MAINTENANCE', NULL, NULL),
('Matériaux de construction', 'MAINTENANCE', NULL, NULL),
('Matériaux et Application pour l\'Energie Photovoltaïque', NULL, NULL, NULL),
('Matériaux et Contrôle Qualité', NULL, NULL, NULL),
('Matériaux et Technologie de soudage', 'Soudage', NULL, NULL),
('Matériaux Fonctionnels', 'MAINTENANCE', NULL, NULL),
('Mathématiques et Informatiques', 'INFORMATIQUE', NULL, NULL),
('Mathématiques Physiques et Sciences de l\'ingénieur', 'SCIENCES', NULL, NULL),
('Matière Condensée - Rayonnement et Modélisation des Systèmes', 'SCIENCES', NULL, NULL),
('Matières Plastiques et Composites', 'SCIENCES', NULL, NULL),
('Mécanicien Général Polyvalent', 'MAINTENANCE', NULL, NULL),
('Mécanicien Polyvalent en Usinage et Réglage', 'MAINTENANCE', NULL, NULL),
('Mécanique', 'MAINTENANCE', NULL, NULL),
('Mécanique Agricole', 'MAINTENANCE', NULL, NULL),
('Mécanique Auto', 'Mécanique', NULL, NULL),
('Mécanique Automobile', 'MAINTENANCE', NULL, NULL),
('Mécanique Automobile et Engins', 'MECANIQUE', NULL, NULL),
('Mécanique d\'Entretien', 'MAINTENANCE', NULL, NULL),
('Mécanique et Ingénierie', 'MAINTENANCE', NULL, NULL),
('Mécanique Marine', 'MAINTENANCE', NULL, NULL),
('Menuiserie d\'Art', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Menuiserie Métallique', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Mesures et Contrôles Physico-Chimie', 'CHIMIE', NULL, NULL),
('Méthodes de Cuir', NULL, NULL, NULL),
('méthodes en fabrication mécanique', 'MECANIQUE', NULL, NULL),
('Méthodes Informatiques Appliquées à la Gestion d\'Entreprises', 'GESTION', NULL, NULL),
('Métier Chef Comptable', 'ECONOMIE', NULL, NULL),
('Métier Fiscaliste', 'ECONOMIE', NULL, NULL),
('Métrologie et Qualité', NULL, NULL, NULL),
('Mines', 'MINES', NULL, NULL),
('Mines & Carrières', 'MINES', NULL, NULL),
('Mise en Œuvre et Administration des Systèmes et Réseaux', 'GESTION', NULL, NULL),
('Modélisation et Informatique Scientifique', 'INFORMATIQUE', NULL, NULL),
('Monteur Dépanneur Frigoriste', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Mouliste', 'MAINTENANCE', NULL, NULL),
('MST, Mathematiques Appliquées', 'SCIENCES', NULL, NULL),
('Multimédia et Conception des Sites Web', 'INFORMATIQUE', NULL, NULL),
('Nurse', 'SANTE', NULL, NULL),
('Opérateur de Saisie', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Opérateur Logistique', NULL, NULL, NULL),
('Opérateur sur Machines Outils à Commande Numérique', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Opérations Industrielles et Digitalisation', 'industrie', NULL, NULL),
('Ouvrier Polyvalent en Construction Métallique', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Ouvrier Polyvalent en Soudure', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Ouvrier Qualifie en Construction Metallique', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Ouvrier Qualifie en Menuiserie Bois Aluminuim', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Ouvrier Qualifier en Espace Vert', 'QUALIFICATION PROFESSIONNELLE', NULL, NULL),
('Physico-Chimie des Matériaux', 'CHIMIE', NULL, NULL),
('Physico-Chimie et Analyse des Matériaux', 'CHIMIE', NULL, NULL),
('Physique', 'CHIMIE', NULL, NULL),
('Physique Chimie', 'CHIMIE', NULL, NULL),
('physique Informatique', 'physique', NULL, NULL),
('Plasturgie', NULL, NULL, NULL),
('Plomberie Sanitaire', NULL, NULL, NULL),
('Politiques Publiques et Ingénierie Territoriale', NULL, NULL, NULL),
('Polyvalent d\'Usinage', NULL, NULL, NULL),
('Postes et Télécommunications', NULL, NULL, NULL),
('Poyculture - Elevage', NULL, NULL, NULL),
('Procédés et Ingénierie Chimique', NULL, NULL, NULL),
('Procédés Industriels et Plasturgie', 'Procédé', NULL, NULL),
('Production d\'Energie et des Systèmes de Gestion', NULL, NULL, NULL),
('Production en Costruction Métallique', NULL, NULL, NULL),
('Production et Valorisation des Substances Natur.et Biopoly.', NULL, NULL, NULL),
('Production industrielle/Mécatronique', 'production', NULL, NULL),
('Productique', NULL, NULL, NULL),
('Productique et Management', NULL, NULL, NULL),
('Productique mécatronique', 'mécatronique', NULL, NULL),
('Programme Informatique', NULL, NULL, NULL),
('Prospection et Valorisation des Ressources Minerales', NULL, NULL, NULL),
('Protection de l\'Environnement', NULL, NULL, NULL),
('Psychologie du Travail, Management des Relations Humaines et des Communications Organisationnelles', NULL, NULL, NULL),
('Psychologie Sociale', NULL, NULL, NULL),
('Qualification Agricole', NULL, NULL, NULL),
('Qualité Maintenance Sécurité Industrielle', NULL, NULL, NULL),
('Qualité, Sécurité et Environnement', NULL, NULL, NULL),
('Réception Hôtel', NULL, NULL, NULL),
('Recherche Opérationnelle et Aide à la Décision', NULL, NULL, NULL),
('Relations Internationales - Economie politique', 'Gouvernance', NULL, NULL),
('Réparateur de Véhicules Automobiles', NULL, NULL, NULL),
('Réparateur des Engins à Moteur', NULL, NULL, NULL),
('Réparateur Engins à Moteur (Poids Lourds)', NULL, NULL, NULL),
('Réparation Automobile', NULL, NULL, NULL),
('Réparation des Engins à Moteur (Option : Automobile)', NULL, NULL, NULL),
('Réparation des Engins à Moteur Option : Poids Lourds', NULL, NULL, NULL),
('Réparation des Engins a Moteur Option Réparti', NULL, NULL, NULL),
('Réseau et Energies Electriques', 'energie', NULL, NULL),
('Réseau, Système & Services Programmables', 'informatique', NULL, NULL),
('Réseaux', 'INFORMATIQUE', NULL, NULL),
('Réseaux et système informatique', 'INFORMATIQUE', NULL, NULL),
('Réseaux et Systèmes de Télécommunication', 'INFORMATIQUE', NULL, NULL),
('Réseaux et systèmes informatiques', 'INFORMATIQUE', NULL, NULL),
('Reseaux et Télécommunication', 'INFORMATIQUE', NULL, NULL),
('Réseaux Informatiques', NULL, NULL, NULL),
('Réseaux sécurité et systèmes informatiques', NULL, NULL, NULL),
('Responsable d\'Exploitation Logistique', NULL, NULL, NULL),
('Responsable en Logistique', NULL, NULL, NULL),
('Responsable QHSE', 'HSE', NULL, NULL),
('Systèmes Eoliens', '', NULL, NULL),
('Systèmes et Réseaux', '', NULL, NULL),
('Systèmes et Réseaux Informatiques', '', NULL, NULL),
('systèmes Industriels Automatisés', '', NULL, NULL),
('Systèmes Informatiques Répartis', '', NULL, NULL),
('Systèmes Microélectroniques de Télécom. & de l\'Info. Indus.', '', NULL, NULL),
('Technico-Commercial', '', NULL, NULL),
('Technico-commerciales en vente de Vh et pièces de rechange', '', NULL, NULL),
('Technique Comptables et Financière', '', NULL, NULL),
('Technique d\'exploration et d\'exploitation des géo ressources', 'Geologie', NULL, NULL),
('Technique de Commercialisation', '', NULL, NULL),
('Technique des Systèmes Electroniques et Informatiques', '', NULL, NULL),
('Technique Douanières et Logistique Internationale', 'logistique', NULL, NULL),
('Techniques Administratives', '', NULL, NULL),
('Techniques Comptable et Financières', '', NULL, NULL),
('Techniques Comptables', '', NULL, NULL),
('Techniques d\'Analyses et Contrôle de Qualité', '', NULL, NULL),
('Techniques d\'Exploiatation des Energies Renouvelables', '', NULL, NULL),
('Techniques d\'Exploitation des Energies Renouvelables', '', NULL, NULL),
('Techniques de Commercialisation', '', NULL, NULL),
('Techniques de Commercialisation et de Communication', '', NULL, NULL),
('Techniques de Développement Informatique', 'INFORMATIQUE', NULL, NULL),
('Techniques de Développement Multimédia', 'INFORMATIQUE', NULL, NULL),
('Techniques de Management', '', NULL, NULL),
('Techniques de Réseaux Informatiques', 'INFORMATIQUE', NULL, NULL),
('Techniques de Secrétariat de Direction', '', NULL, NULL),
('Techniques de Vente', '', NULL, NULL),
('Techniques des Réseaux Informatiques', '', NULL, NULL),
('Techniques Dévelop. Informatique', '', NULL, NULL),
('Techniques en Maintenance & Support Inf. & Rés', '', NULL, NULL),
('Techniques et Réseaux Informatiques', '', NULL, NULL),
('Techniques Instrumentales et Contrôle Qualité', '', NULL, NULL),
('Techniques Instrumentales et Management-Qualité', '', NULL, NULL),
('Techniques Numériques et Multimédia', '', NULL, NULL),
('Techniques Physiques des Energies', '', NULL, NULL),
('Technologie des Energies Renouvelables et Efficacité Energétique', '', NULL, NULL),
('Technologie et Coordination dans le Bâtiment et les Travaux Publics', '', NULL, NULL),
('Technologies Industrielles pour l’Usine du Futur', 'Informatique', NULL, NULL),
('Télé-conseiller Centres d\'Appels', '', NULL, NULL),
('Télécommunication et Réseaux', '', NULL, NULL),
('Telecommunication Systems Engineering', '', NULL, NULL),
('Télécommunications', '', NULL, NULL),
('Télécoms', '', NULL, NULL),
('Thermique Industrielle', '', NULL, NULL),
('Tôlerie Chaudronnerie', '', NULL, NULL),
('Topographe', 'TOPOGRAPHIE', NULL, NULL),
('Topographie', 'TOPOGRAPHIE', NULL, NULL),
('Traduction et Communication Interculturelle', '', NULL, NULL),
('Traitement des Eaux et Déchets Solides', '', NULL, NULL),
('Transformation des Materiaux Composite', '', NULL, NULL),
('Transformation Digitale Industrielle', 'Digitalisation', NULL, NULL),
('Translation and Cross-Cultural Communication Studies', '', NULL, NULL),
('Tronc Commun', '', NULL, NULL),
('Usinage sur Machine-outil à Commande Numérique', '', NULL, NULL),
('Valorisation des Ressources Minérales', 'Traitement', NULL, NULL),
('web Marketing', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_06_115617_create_civilite_table', 1),
(6, '2023_01_06_115640_create_stagiaires_table', 1),
(7, '2023_01_06_115702_create_encadrants_table', 1),
(8, '2023_01_06_115731_create_etablissements_table', 1),
(9, '2023_01_06_115753_create_services_table', 1),
(10, '2023_01_06_115812_create_filieres_table', 1),
(11, '2023_01_06_115910_create_villes_table', 1),
(12, '2023_01_08_142612_drop_stagiaire_table', 2),
(13, '2023_01_08_142635_drop_stagiaires_table', 2),
(14, '2023_01_08_142752_create_stagiaires_table', 3),
(15, '2023_01_08_143008_create_stagiaires_table', 4),
(16, '2023_01_08_164108_drop_stagiaires_table', 5),
(17, '2023_01_08_164204_create_stagiaires_table', 6),
(18, '2023_01_16_131500_drop_stagiaires_table', 7),
(19, '2023_01_16_131536_drop_stagiaires_table', 7),
(20, '2023_01_16_131629_drop_stagiaires_table', 7),
(21, '2023_01_16_131650_create_stagiaires_table', 8),
(22, '2023_01_20_000649_add__e_i_to_stagiaires_table', 9),
(23, '2023_01_30_195815_add_site_to_users_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sigle_service` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `entite` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `EPI` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sigle_service`, `libelle`, `entite`, `site`, `direction`, `EPI`, `created_at`, `updated_at`) VALUES
('ACG', 'ACT4COMMUNITY', 'ACG', 'Benguerir', 'Direction du Site Gantour', 0, NULL, NULL),
('CCI/B', 'Centres De Compétences Indus.', 'CCI/B', 'Benguerir', 'Direction du Site Gantour', 0, NULL, NULL),
('CHI/K/Y', 'Développement Projets Immobiliers Khouribga Et Gantour', 'CHI/K', 'Youssoufia', 'Direction du Site Gantour', 0, NULL, NULL),
('DIG/C/Y', 'Project Control', 'DIG/C', 'Youssoufia', 'Direction du Site Gantour', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stagiaires`
--

CREATE TABLE `stagiaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` int(11) NOT NULL,
  `date_demande` date NOT NULL,
  `site` varchar(255) DEFAULT NULL,
  `civilite` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `cin` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(300) DEFAULT 'storage/images/profile/default.png',
  `niveau` varchar(255) NOT NULL,
  `diplome` varchar(255) DEFAULT NULL,
  `filiere` varchar(255) NOT NULL,
  `etablissement` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `type_stage` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `encadrant` int(11) DEFAULT 52,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `sujet` text DEFAULT NULL,
  `remunere` tinyint(1) DEFAULT NULL,
  `EI` tinyint(1) DEFAULT NULL,
  `annule` tinyint(1) DEFAULT NULL,
  `prolongation` tinyint(1) DEFAULT NULL,
  `date_fin_finale` date DEFAULT NULL,
  `Attestation_remise` date DEFAULT NULL,
  `Att_remise_a` varchar(255) DEFAULT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stagiaires`
--

INSERT INTO `stagiaires` (`id`, `code`, `date_demande`, `site`, `civilite`, `prenom`, `nom`, `cin`, `phone`, `email`, `photo`, `niveau`, `diplome`, `filiere`, `etablissement`, `ville`, `type_stage`, `service`, `encadrant`, `date_debut`, `date_fin`, `sujet`, `remunere`, `EI`, `annule`, `prolongation`, `date_fin_finale`, `Attestation_remise`, `Att_remise_a`, `observation`, `created_at`, `updated_at`) VALUES
(101, 1, '2023-03-04', 'Benguerir', 'M.', 'Test', 'TEST', 'EA111111', '+212661667799', 'test@test.com', 'TEST-Test-1677923655.png', '3ème année', 'Cycle d\'ingénieur', 'Big Data et Intelligence Artificielle', 'EMI', 'RABAT', 'stage d\'application', 'CCI/B', 52, '2023-03-06', '2023-03-31', 'test sujet', 1, 1, 0, NULL, NULL, NULL, NULL, 'Ras', '2023-03-04 08:54:15', '2023-03-04 08:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `site`) VALUES
(4, 'test', 'test@test.com', NULL, '$2y$10$Q6hEhY2U2i/xilP5tJv/ZOGlgUcNQhOIf.ymvEqQW8YMEIpP/fBGy', NULL, '2023-03-04 08:00:51', '2023-03-04 08:00:51', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`ville`, `pays`, `created_at`, `updated_at`) VALUES
('AGADIR', 'MAROC', NULL, NULL),
('Ain Borja', 'Maroc', '2023-01-26 08:08:21', '2023-01-26 08:08:21'),
('Ain chock - Casablanca', 'MAROC', NULL, NULL),
('AIT MELLOUL', 'MAROC', NULL, NULL),
('AL HOCEIMA', 'MAROC', NULL, NULL),
('Alnif', 'Maroc', '2023-01-26 08:42:37', '2023-01-26 08:42:37'),
('Assa zzag', 'Maroc', '2023-01-25 17:49:04', '2023-01-25 17:49:04'),
('AZEMMOUR', 'MAROC', NULL, NULL),
('AZILAL', 'MAROC', NULL, NULL),
('AZROU', 'MAROC', NULL, NULL),
('BEN AHMED', 'MAROC', NULL, NULL),
('BEN MELLAL', 'MAROC', NULL, NULL),
('BENGUERIR', 'MAROC', NULL, NULL),
('BENI MELLAL', 'MAROC', NULL, NULL),
('BERRECHID', 'MAROC', NULL, NULL),
('BESENCON', 'FRANCE', NULL, NULL),
('BIDART', 'FRANCE', NULL, NULL),
('BIOUGRA', 'MAROC', NULL, NULL),
('Bordeaux', 'France', NULL, NULL),
('BOUJAAD', 'MAROC', NULL, NULL),
('BOUKNADEL', 'MAROC', NULL, NULL),
('BOUZNIKA', 'MAROC', NULL, NULL),
('BREST', 'FRANCE', NULL, NULL),
('CASABLANCA', 'MAROC', NULL, NULL),
('CHIBOUGAMAU', 'CANADA', NULL, NULL),
('CHICHAOUA', 'MAROC', NULL, NULL),
('CLERMONT-FERRAND', 'FRANCE', NULL, NULL),
('DAKAR', 'SENEGAL', NULL, NULL),
('DAKHLA', 'MAROC', NULL, NULL),
('DEMNATE', 'MAROC', NULL, NULL),
('EL HAOUZIA', 'MAROC', NULL, NULL),
('EL JADIDA', 'MAROC', NULL, NULL),
('ERRACHIDIA', 'MAROC', NULL, NULL),
('ESSAOUIRA', 'MAROC', NULL, NULL),
('EVRY', 'FRANCE', NULL, NULL),
('FES', 'MAROC', NULL, NULL),
('Fkih Ben Salah', 'MAROC', NULL, NULL),
('FNIDEQ', 'MAROC', NULL, NULL),
('GRENOBLE', 'France', NULL, NULL),
('GUELMIM', 'MAROC', NULL, NULL),
('GUELMIMA', 'MAROC', NULL, NULL),
('HATTANE', 'MAROC', NULL, NULL),
('IFRANE', 'MAROC', NULL, NULL),
('JEMAA-SHIM', 'MAROC', NULL, NULL),
('KASBA TADLA', 'MAROC', NULL, NULL),
('KELAA DES SRAGHNA', 'MAROC', NULL, NULL),
('KENITRA', 'MAROC', NULL, NULL),
('KHARKOV', 'UKRAINE', NULL, NULL),
('KHEMISSET', 'MAROC', NULL, NULL),
('KHENIFRA', 'MAROC', NULL, NULL),
('KHOURIBGA', 'MAROC', NULL, NULL),
('LA ROCHELLE', 'FRANCE', NULL, NULL),
('LAAYOUNE', 'MAROC', NULL, NULL),
('LARACHE', 'MAROC', NULL, NULL),
('LILLE', 'FRANCE', NULL, NULL),
('LONGUENESSE', 'FRANCE', NULL, NULL),
('LONGWY', 'FRANCE', NULL, NULL),
('LORRAINE', 'FRANCE', NULL, NULL),
('LYON', 'FRANCE', NULL, NULL),
('MARRAKECH', 'MAROC', NULL, NULL),
('MEKNES', 'MAROC', NULL, NULL),
('MOHAMMEDIA', 'MAROC', NULL, NULL),
('MONTPELLIER', 'FRANCE', NULL, NULL),
('NADOR', 'MAROC', NULL, NULL),
('NANCY', 'FRANCE', NULL, NULL),
('NANTES', 'FRANCE', NULL, NULL),
('NOUACEUR', 'MAROC', NULL, NULL),
('OUARZAZATE', 'MAROC', NULL, NULL),
('OUED-ZEM', 'MAROC', NULL, NULL),
('OUJDA', 'MAROC', NULL, NULL),
('Oulad Ayad', 'Maroc', '2023-01-26 08:32:04', '2023-01-26 08:32:04'),
('OULED FENNANE', 'MAROC', NULL, NULL),
('PARIS', 'FRANCE', NULL, NULL),
('RABAT', 'MAROC', NULL, NULL),
('REIMS', 'FRANCE', NULL, NULL),
('RENNES', 'FRANCE', NULL, NULL),
('RIAZAN', 'RUSSIE', NULL, NULL),
('ROUEN', 'FRANCE', NULL, NULL),
('SAFI', 'MAROC', NULL, NULL),
('SAINT DENIS', 'FRANCE', NULL, NULL),
('SAINT-ETIENNE', 'FRANCE', NULL, NULL),
('SALA AL JADIDA', 'MAROC', NULL, NULL),
('SALE', 'MAROC', NULL, NULL),
('SEFROU', 'MAROC', NULL, NULL),
('SETTAT', 'MAROC', NULL, NULL),
('SIDI BENNOUR', 'MAROC', NULL, NULL),
('SIDI KACEM', 'MAROC', NULL, NULL),
('SIDI SLIMANE', 'MAROC', NULL, NULL),
('SKHIRAT', 'MAROC', NULL, NULL),
('SMARA', 'MAROC', NULL, NULL),
('SOUK SEBT', 'MAROC', NULL, NULL),
('TAHANNAOUT', 'MAROC', NULL, NULL),
('TAMENSOURT', 'MAROC', NULL, NULL),
('TANGER', 'MAROC', NULL, NULL),
('TANTAN', 'MAROC', NULL, NULL),
('TAOURIRT', 'MAROC', NULL, NULL),
('TARBES', 'FRANCE', NULL, NULL),
('TAROUDANT', 'MAROC', NULL, NULL),
('TATA', 'MAROC', NULL, NULL),
('TAZA', 'MAROC', NULL, NULL),
('TEMARA', 'MAROC', NULL, NULL),
('Test', 'Test', '2023-01-25 18:06:01', '2023-01-25 18:06:01'),
('TETOUAN', 'MAROC', NULL, NULL),
('TIFLET', 'MAROC', NULL, NULL),
('TINGHIR', 'MAROC', NULL, NULL),
('TIZNIT', 'MAROC', NULL, NULL),
('TOULOUSE', 'FRANCE', NULL, NULL),
('VAL DE LOIRE', 'FRANCE', NULL, NULL),
('YOUSSOUFIA', 'MAROC', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `civilite`
--
ALTER TABLE `civilite`
  ADD PRIMARY KEY (`titre`);

--
-- Indexes for table `encadrants`
--
ALTER TABLE `encadrants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`sigle_etab`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`filiere`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sigle_service`);

--
-- Indexes for table `stagiaires`
--
ALTER TABLE `stagiaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`ville`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `encadrants`
--
ALTER TABLE `encadrants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stagiaires`
--
ALTER TABLE `stagiaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
