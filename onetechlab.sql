-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 19 Août 2019 à 11:55
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `onetechlab`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `banstat` enum('banni','actif') NOT NULL DEFAULT 'actif',
  `dateserv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) NOT NULL DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `login`, `mdp`, `email`, `banstat`, `dateserv`, `role`) VALUES
(12, 'nour', '0000', 'nour.kheder@esprit.tn', 'actif', '2019-04-05 21:21:50', 'staff'),
(17, 'sys', '0000', 'sys@gmail.com', 'actif', '2019-04-14 09:22:14', 'admin'),
(20, 'nourKhedhergr', 'grerg7', 'gonklovox@gmail.com', 'banni', '2019-04-21 01:59:00', 'staff');

-- --------------------------------------------------------

--
-- Structure de la table `lab`
--

CREATE TABLE `lab` (
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `ram` int(11) NOT NULL,
  `cpu` varchar(25) NOT NULL,
  `stokage` varchar(25) NOT NULL,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `depart` varchar(25) NOT NULL,
  `descLab` varchar(2000) NOT NULL,
  `id` int(11) NOT NULL,
  `OS` varchar(25) NOT NULL DEFAULT 'windows',
  `nomVM` varchar(100) NOT NULL,
  `adresseIP` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lab`
--

INSERT INTO `lab` (`nom`, `prenom`, `ram`, `cpu`, `stokage`, `datedebut`, `datefin`, `depart`, `descLab`, `id`, `OS`, `nomVM`, `adresseIP`) VALUES
('nour', 'nour', 256, 'windows', '266', '2019-08-15', '2019-08-24', 'Stagiaire', 'test0', 1, 'windows', '', ''),
('sysTest', 'sysTest', 600, 'linux', '200', '2019-08-15', '2019-08-09', 'Stagiaire', 'test1', 2, 'windows', '', ''),
('nour', 'nour', 256, 'linux', '266', '2019-08-09', '2019-08-22', 'RAS', 'test00', 4, 'windows', '', ''),
('adam', 'adam', 125, 'windows', '266', '2019-08-22', '2019-08-24', 'UC', 'testA', 5, 'win', 'adam', '225.225.255.255m'),
('idkonow', 'idkonow', 256, 'linux', '266', '2019-08-16', '2019-08-15', 'Systeme', 'testip', 6, 'win', 'adam', '225.225.255.255'),
('idkonow', 'idkonow', 256, 'linux', '266', '2019-08-16', '2019-08-15', 'Systeme', 'testip', 7, 'win', 'adam', '225.225.255.255'),
('nour', 'nour', 256, 'linux', '200', '2019-08-01', '2019-08-08', 'Systeme', 'testip', 8, 'win', 'adam', '255.255.255.255'),
('nour', 'nour', 256, 'linux', '200', '2019-08-01', '2019-08-08', 'Systeme', 'testip', 9, 'win', 'adam', '255.255.255.255'),
('nour', 'nour', 256, 'linux', '200', '0000-00-00', '0000-00-00', 'Systeme', 'test1', 10, 'win', 'adam', '225.225.255.255'),
('nour', 'nour', 256, 'linux', '266', '0000-00-00', '0000-00-00', 'Systeme', 'test1', 11, 'win', 'adam', '255.255.255.255'),
('nour', 'nour', 256, 'linux', '266', '2019-08-09', '2019-08-18', 'Systeme', 'test1', 12, 'win', 'adam', '255.255.2.01'),
('nour', 'nour', 256, 'linux', '1589', '0000-00-00', '0000-00-00', 'Systeme', 'test1', 13, 'win', 'adam', '255.255.2.02');

-- --------------------------------------------------------

--
-- Structure de la table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `superadmin`
--

INSERT INTO `superadmin` (`id`, `username`, `password`) VALUES
(1, 'sys', '0000');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
