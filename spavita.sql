-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 13 mars 2025 à 23:13
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `spavita`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `soin_id` int(11) DEFAULT NULL,
  `date_reservation` datetime NOT NULL,
  `statut` enum('confirmé','annulé') DEFAULT 'confirmé'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `soins`
--

CREATE TABLE `soins` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `categorie` varchar(100) NOT NULL DEFAULT 'Massage',
  `duree` int(11) NOT NULL DEFAULT 60,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `soins`
--

INSERT INTO `soins` (`id`, `nom`, `description`, `prix`, `categorie`, `duree`, `image`) VALUES
(1, 'Massage Relaxant', 'Un massage doux et enveloppant qui permet de relâcher les tensions et retrouver un bien-être profond.', 75.00, 'Massage', 60, 'massage-relaxant.jpg'),
(2, 'Massage aux Pierres Chaudes', 'Un soin qui allie le massage manuel et l\'utilisation de pierres volcaniques chaudes pour une détente absolue.', 120.00, 'Massage', 75, 'massage-pierres.jpg'),
(3, 'Massage Suédois', 'Un massage dynamique qui favorise la circulation sanguine et soulage les douleurs musculaires.', 85.00, 'Massage', 60, 'massage-suedois.jpg'),
(4, 'Soin du visage Hydratant', 'Un soin hydratant en profondeur pour une peau éclatante et revitalisée.', 65.00, 'Soin Visage', 45, 'soin-hydratant.jpg'),
(5, 'Soin Anti-Âge', 'Un soin raffermissant qui stimule la production de collagène et réduit visiblement les rides et ridules.', 90.00, 'Soin Visage', 60, 'soin-anti-age.jpg'),
(6, 'Soin Détox', 'Un soin purifiant qui élimine les toxines et impuretés pour une peau nette et un teint éclatant.', 70.00, 'Soin Visage', 50, 'soin-detox.jpg'),
(7, 'Rituel Hammam', 'Un rituel complet incluant gommage au savon noir, enveloppement à l’argile et massage aux huiles essentielles.', 130.00, 'Hammam', 90, 'hammam-rituel.jpg'),
(8, 'Bain à remous', 'Profitez d’un bain à remous chaud, idéal pour détendre les muscles et apaiser l’esprit.', 90.00, 'Jacuzzi', 45, 'bain-a-remous.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','client') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `soin_id` (`soin_id`);

--
-- Index pour la table `soins`
--
ALTER TABLE `soins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `soins`
--
ALTER TABLE `soins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
