
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- Compatible WAMP et hébergement o2switch

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Structure de la table `users`
CREATE TABLE users (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','client') NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY email (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Structure de la table `soins`
CREATE TABLE soins (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  prix DECIMAL(10,2) NOT NULL,
  categorie VARCHAR(100) NOT NULL DEFAULT 'Massage',
  duree INT NOT NULL DEFAULT 60,
  image VARCHAR(255) NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Données de la table `soins`
INSERT INTO soins (id, nom, description, prix, categorie, duree, image) VALUES
(1, 'Massage Relaxant', 'Un massage doux et enveloppant qui permet de relacher les tensions et retrouver un bien-etre profond.', 75.00, 'Massage', 60, 'massage-relaxant.jpg'),
(2, 'Massage aux Pierres Chaudes', 'Un soin qui allie le massage manuel et l''utilisation de pierres volcaniques chaudes pour une detente absolue.', 120.00, 'Massage', 75, 'massage-pierres.jpg'),
(3, 'Massage Suedois', 'Un massage dynamique qui favorise la circulation sanguine et soulage les douleurs musculaires.', 85.00, 'Massage', 60, 'massage-suedois.jpg'),
(4, 'Soin du visage Hydratant', 'Un soin hydratant en profondeur pour une peau eclatante et revitalisee.', 65.00, 'Soin Visage', 45, 'soin-hydratant.jpg'),
(5, 'Soin Anti-Age', 'Un soin raffermissant qui stimule la production de collagene et reduit visiblement les rides et ridules.', 90.00, 'Soin Visage', 60, 'soin-anti-age.jpg'),
(6, 'Soin Detox', 'Un soin purifiant qui elimine les toxines et impuretes pour une peau nette et un teint eclatant.', 70.00, 'Soin Visage', 50, 'soin-detox.jpg'),
(7, 'Rituel Hammam', 'Un rituel complet incluant gommage au savon noir, enveloppement a l''argile et massage aux huiles essentielles.', 130.00, 'Hammam', 90, 'hammam-rituel.jpg'),
(8, 'Bain a remous', 'Profitez d''un bain a remous chaud, ideal pour detendre les muscles et apaiser l''esprit.', 90.00, 'Jacuzzi', 45, 'bain-a-remous.jpg');

-- Structure de la table `reservations`
CREATE TABLE reservations (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT UNSIGNED,
  date_reservation DATETIME NOT NULL,
  statut ENUM('confirme','annule') DEFAULT 'confirme',
  PRIMARY KEY (id),
  KEY user_id (user_id),
  CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Structure de la table `reservation_soins`
CREATE TABLE reservation_soins (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  reservation_id INT UNSIGNED NOT NULL,
  soin_id INT UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  KEY reservation_id (reservation_id),
  KEY soin_id (soin_id),
  CONSTRAINT fk_reservation FOREIGN KEY (reservation_id) REFERENCES reservations(id) ON DELETE CASCADE,
  CONSTRAINT fk_soin FOREIGN KEY (soin_id) REFERENCES soins(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;