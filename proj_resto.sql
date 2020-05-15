-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 15 mai 2020 à 16:49
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `proj_resto`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `email` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`email`, `pwd`) VALUES
('admin', 'admin'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `isConfirm` int(11) NOT NULL,
  `nbCount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `Commande`
--

INSERT INTO `Commande` (`id`, `nom`, `email`, `isConfirm`, `nbCount`) VALUES
(5, 'meteor314', 'meteor31415@gmail.com', 1, 7),
(6, 'meteor314', 'meteor31415@gmail.com', 1, 3),
(7, 'meteor314', 'meteor31415@gmail.com', 1, 3),
(8, 'meteor314', 'meteor31415@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(150) NOT NULL,
  `date_time_register` date NOT NULL,
  `vide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `email`, `pwd`, `date_time_register`, `vide`) VALUES
(1, 'meteor314', 'meteor31415@gmail.com', '$2y$11$N5uIUKIbuW2OAb5fYs6xAucTEJrLlbMslglwHcNg6mEqkmo7XsTHi', '2020-05-15', 0),
(2, 'segfried', 'bastien.ponroy@cfautec.fr', '$2y$11$lv4xVc7z8BjnmNOWXyczm.BG3cqzdu1OEuDrSSyg129CfCMWFkPsa', '2020-05-15', 0),
(10, 'siafall', 'faysel.menan@cfautec.fr', '$2y$11$dsl6d62GYBdmEF9b7Yj6vuRljWZ8Tobx5xWVLSj1p7VA15aeujzf.', '2020-05-15', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
