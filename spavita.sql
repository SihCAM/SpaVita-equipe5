-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 08 avr. 2025 à 01:15
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
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `fonction` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `competences` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `fonction`, `role`, `email`, `telephone`, `competences`, `description`, `created_at`, `user_id`) VALUES
(1, 'Lebon', 'Sarah', 'Masseuse Certifiée', 'employe', 'sarah.lebon@spavita.fr', '0601020301', 'Massage relaxant, Massage aux pierres chaudes', 'Sarah a acquis son expertise en Thaïlande puis s\'est perfectionnée en Suisse. Son approche douce et personnalisée est très appréciée.', '2025-03-31 20:28:27', 2),
(2, 'Ferre', 'Lucas', 'Thérapeute bien-être', 'employe', 'lucas.ferre@spavita.fr', '0601020302', 'Réflexologie, Massage sportif', 'Lucas s\'est formé dans les Alpes suisses. Il adapte chaque séance selon la morphologie et le rythme du client.', '2025-03-31 20:28:27', 3),
(3, 'Dubois', 'Claire', 'Esthéticienne', 'employe', 'claire.dubois@spavita.fr', '0601020303', 'Soins visage, Rituels aux plantes alpines', 'Claire sélectionne minutieusement des plantes locales pour ses soins. Douceur et sens du détail la définissent.', '2025-03-31 20:28:27', 4),
(4, 'Buy', 'Julien', 'Hydrothérapeute', 'employe', 'julien.buy@spavita.fr', '0601020304', 'Hydrothérapie, Bain aux huiles essentielles', 'Julien a étudié en Autriche. Il crée des ambiances sonores et olfactives uniques lors de ses séances.', '2025-03-31 20:28:27', 5),
(5, 'Rousset', 'Amélie', 'Spécialiste hammam', 'employe', 'amelie.rousset@spavita.fr', '0601020305', 'Hammam, Gommage au savon noir', 'Formée à Marrakech, Amélie est reconnue pour sa gestuelle fluide et ses rituels enveloppants.', '2025-03-31 20:28:27', 6),
(6, 'Betin', 'Nicolas', 'Coach de respiration', 'employe', 'nicolas.betin@spavita.fr', '0601020306', 'Respiration consciente, Relaxation guidée', 'Nicolas a travaillé avec alpinistes et plongeurs. Sa voix apaisante est un atout lors des séances.', '2025-03-31 20:28:27', 7),
(7, 'Garcia', 'Elena', 'Thérapeute holistique', 'employe', 'elena.garcia@spavita.fr', '0601020307', 'Aromathérapie, Reiki', 'Elena utilise des plantes des Bauges et propose des soins énergétiques alignés aux cycles lunaires.', '2025-03-31 20:28:27', 8),
(8, 'Vidal', 'Thomas', 'Spécialiste jacuzzi', 'employe', 'thomas.vidal@spavita.fr', '0601020308', 'Jacuzzi extérieur, Relaxation sensorielle', 'Thomas coordonne des séances sur mesure mêlant lumière, sons et huiles essentielles.', '2025-03-31 20:28:27', 9),
(9, 'Martel', 'Héloïse', 'Experte en soins du corps', 'employe', 'heloise.martel@spavita.fr', '0601020309', 'Enveloppements, Drainage lymphatique', 'Héloïse, formée à Annecy et Lyon, est saluée pour sa précision et sa bienveillance naturelle.', '2025-03-31 20:28:27', 10),
(10, 'Chardon', 'Marc', 'Naturopathe & Coach bien-être', 'employe', 'marc.chardon@spavita.fr', '0601020310', 'Phytothérapie, Massages aux huiles bio', 'Marc valorise les produits locaux et accompagne chaque client vers un équilibre durable.', '2025-03-31 20:28:27', 11),
(11, 'Moreau', 'Isabelle', 'Responsable des soins', 'admin', 'isabelle.moreau@spavita.fr', '0601020311', 'Gestion équipe, Planification, Expertise massage', 'Responsable du pôle bien-être, Isabelle assure la coordination de l\'équipe et la qualité des soins.', '2025-03-31 20:28:27', 12),
(12, 'Durand', 'Alexandre', 'Responsable adjoint', 'admin', 'alexandre.durand@spavita.fr', '0601020312', 'Support opérationnel, Logistique, Supervision', 'Bras droit d\'Isabelle, Alexandre veille à la bonne organisation quotidienne du SpaVita.', '2025-03-31 20:28:27', 13),
(13, 'Camara', 'Sihya', 'etu LPMI', 'admin', 'sihyacamara29@gmail.com', '0601020300', 'Developpement, front-end, backend', 'Camara supervise le bon fonctionnement de SpaVita.', '2025-04-03 01:56:27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `date_reservation` datetime NOT NULL,
  `statut` enum('confirme','annule') DEFAULT 'confirme'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `date_reservation`, `statut`) VALUES
(1, 22, '2025-04-09 00:00:00', 'confirme'),
(2, 17, '2025-04-10 00:00:00', 'confirme'),
(3, 16, '2025-04-10 00:00:00', 'confirme'),
(4, 14, '2025-04-10 00:00:00', 'confirme'),
(5, 16, '2025-04-11 00:00:00', 'confirme'),
(6, 21, '2025-04-12 00:00:00', 'confirme'),
(7, 21, '2025-04-13 00:00:00', 'confirme'),
(8, 23, '2025-04-13 00:00:00', 'confirme'),
(9, 18, '2025-04-14 00:00:00', 'confirme'),
(10, 20, '2025-04-16 00:00:00', 'confirme'),
(11, 19, '2025-04-16 00:00:00', 'confirme'),
(12, 22, '2025-04-18 00:00:00', 'confirme'),
(13, 16, '2025-04-18 00:00:00', 'confirme'),
(14, 22, '2025-04-18 00:00:00', 'confirme'),
(15, 16, '2025-04-19 00:00:00', 'confirme'),
(16, 21, '2025-04-19 00:00:00', 'confirme'),
(17, 19, '2025-04-20 00:00:00', 'confirme'),
(18, 19, '2025-04-20 00:00:00', 'confirme'),
(19, 16, '2025-04-22 00:00:00', 'confirme'),
(20, 21, '2025-04-22 00:00:00', 'confirme');

-- --------------------------------------------------------

--
-- Structure de la table `reservation_soins`
--

CREATE TABLE `reservation_soins` (
  `id` int(10) UNSIGNED NOT NULL,
  `reservation_id` int(10) UNSIGNED NOT NULL,
  `soin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation_soins`
--

INSERT INTO `reservation_soins` (`id`, `reservation_id`, `soin_id`) VALUES
(1, 1, 3),
(2, 2, 7),
(3, 2, 2),
(4, 2, 8),
(5, 3, 1),
(6, 4, 6),
(7, 4, 1),
(8, 4, 4),
(9, 5, 2),
(10, 5, 3),
(11, 6, 8),
(12, 7, 3),
(13, 8, 7),
(14, 8, 5),
(15, 9, 3),
(16, 9, 6),
(17, 9, 7),
(18, 10, 8),
(19, 11, 6),
(20, 11, 7),
(21, 12, 1),
(22, 13, 7),
(23, 14, 2),
(24, 14, 1),
(25, 14, 6),
(26, 15, 2),
(27, 15, 4),
(28, 15, 8),
(29, 16, 2),
(30, 16, 5),
(31, 16, 1),
(32, 17, 3),
(33, 17, 2),
(34, 18, 7),
(35, 18, 2),
(36, 18, 7),
(37, 19, 8),
(38, 19, 8),
(39, 20, 5),
(40, 20, 6),
(41, 20, 4);

-- --------------------------------------------------------

--
-- Structure de la table `soins`
--

CREATE TABLE `soins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `categorie` varchar(100) NOT NULL DEFAULT 'Massage',
  `duree` int(11) NOT NULL DEFAULT 60,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `soins`
--

INSERT INTO `soins` (`id`, `nom`, `description`, `prix`, `categorie`, `duree`, `image`) VALUES
(1, 'Massage Relaxant', 'Un massage doux et enveloppant qui permet de relacher les tensions et retrouver un bien-etre profond.', 75.00, 'Massage', 60, 'massage-relaxant.jpg'),
(2, 'Massage aux Pierres Chaudes', 'Un soin qui allie le massage manuel et l\'utilisation de pierres volcaniques chaudes pour une detente absolue.', 120.00, 'Massage', 75, 'massage-pierres.jpg'),
(3, 'Massage Suedois', 'Un massage dynamique qui favorise la circulation sanguine et soulage les douleurs musculaires.', 85.00, 'Massage', 60, 'massage-suedois.jpg'),
(4, 'Soin du visage Hydratant', 'Un soin hydratant en profondeur pour une peau eclatante et revitalisee.', 65.00, 'Soin Visage', 45, 'soin-hydratant.jpg'),
(5, 'Soin Anti-Age', 'Un soin raffermissant qui stimule la production de collagene et reduit visiblement les rides et ridules.', 90.00, 'Soin Visage', 60, 'soin-anti-age.jpg'),
(6, 'Soin Detox', 'Un soin purifiant qui elimine les toxines et impuretes pour une peau nette et un teint eclatant.', 70.00, 'Soin Visage', 50, 'soin-detox.jpg'),
(7, 'Rituel Hammam', 'Un rituel complet incluant gommage au savon noir, enveloppement a l\'argile et massage aux huiles essentielles.', 130.00, 'Hammam', 90, 'hammam-rituel.jpg'),
(8, 'Bain a remous', 'Profitez d\'un bain a remous chaud, ideal pour detendre les muscles et apaiser l\'esprit.', 90.00, 'Jacuzzi', 45, 'bain-a-remous.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','employe','client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'camara', 'sihyacamara29@gmail.com', '$2y$10$8zjXhtQqcU1t/MkuPiXcaOvxaF0S8wDcN6c2LBH4hyANro6WI8lOi', 'admin'),
(2, 'Sarah Lebon', 'sarah.lebon@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(3, 'Lucas Ferre', 'lucas.ferre@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(4, 'Claire Dubois', 'claire.dubois@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(5, 'Julien Buy', 'julien.buy@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(6, 'Amélie Rousset', 'amelie.rousset@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(7, 'Nicolas Betin', 'nicolas.betin@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(8, 'Elena Garcia', 'elena.garcia@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(9, 'Thomas Vidal', 'thomas.vidal@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(10, 'Héloïse Martel', 'heloise.martel@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(11, 'Marc Chardon', 'marc.chardon@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'employe'),
(12, 'Isabelle Moreau', 'isabelle.moreau@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'admin'),
(13, 'Alexandre Durand', 'alexandre.durand@spavita.fr', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'admin'),
(14, 'Julie Martin', 'julie.martin@example.com', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'client'),
(15, 'Thomas Leroy', 'thomas.leroy@example.com', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'client'),
(16, 'Camille Dupont', 'camille.dupont@example.com', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'client'),
(17, 'Alexandre Morel', 'alexandre.morel@example.com', '$2y$10$WzFx2a5k/8FYpqxSxWv3h0A70f9XxhPtPzUxJr.G6tKp8ShP6iL6i', 'client'),
(18, 'Manon Girard', 'manon.girard@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(19, 'Hugo Delcourt', 'hugo.delcourt@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(20, 'Léa Fontaine', 'lea.fontaine@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(21, 'Romain Barre', 'romain.barre@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(22, 'Chloé Lefèvre', 'chloe.lefevre@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(23, 'Maxime Perrot', 'maxime.perrot@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(24, 'Sophie Richard', 'sophie.richard@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(25, 'Nicolas Lambert', 'nicolas.lambert@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(26, 'Émilie Renault', 'emilie.renault@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(27, 'Antoine Dubreuil', 'antoine.dubreuil@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(28, 'Marie Besson', 'marie.besson@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(29, 'Louis Garnier', 'louis.garnier@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(30, 'Emma Petit', 'emma.petit@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(31, 'Lucas Caron', 'lucas.caron@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(32, 'Clara Millet', 'clara.millet@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(33, 'Gabriel Colin', 'gabriel.colin@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(34, 'Inès Roy', 'ines.roy@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(35, 'Axel Loiseau', 'axel.loiseau@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(36, 'Lola Chartier', 'lola.chartier@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client'),
(37, 'Enzo Maillard', 'enzo.maillard@example.com', '$2y$10$abcdef123456abcdef123456abcdef123456abcdef123456abcdef12', 'client');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `reservation_soins`
--
ALTER TABLE `reservation_soins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`),
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
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `reservation_soins`
--
ALTER TABLE `reservation_soins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `soins`
--
ALTER TABLE `soins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `reservation_soins`
--
ALTER TABLE `reservation_soins`
  ADD CONSTRAINT `fk_reservation` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_soin` FOREIGN KEY (`soin_id`) REFERENCES `soins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
