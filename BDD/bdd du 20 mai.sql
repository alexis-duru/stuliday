-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 20 mai 2021 à 20:02
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `stuliday`
--
CREATE DATABASE IF NOT EXISTS `stuliday` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stuliday`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(1, 'Home'),
(2, 'Appartment');

-- --------------------------------------------------------

--
-- Structure de la table `rentals`
--

CREATE TABLE `rentals` (
  `rental_id` int(11) NOT NULL,
  `rental_name` varchar(255) NOT NULL,
  `rental_description` text NOT NULL,
  `rental_price` int(11) NOT NULL,
  `rental_adress` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` int(11) NOT NULL,
  `rental_category` int(11) NOT NULL,
  `square_meter` int(11) NOT NULL,
  `image` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rentals`
--

INSERT INTO `rentals` (`rental_id`, `rental_name`, `rental_description`, `rental_price`, `rental_adress`, `created_at`, `author`, `rental_category`, `square_meter`, `image`) VALUES
(18, 'Villa Isis, LACANAU-OCEAN', 'It\'s a very beautiful authentic old villa, super well loc...\r\n', 250, 'LACANAU-OCEAN', '2021-05-07 11:40:38', 1, 2, 250, '60950b16c3dd7_6.jpg'),
(19, 'Home in the campaign, MELINE', 'Hsssome in the campaign with a beautiful view', 200, 'MELINE', '2021-05-07 11:44:54', 1, 2, 250, '60950c16bb8a4_10.jpg'),
(20, 'Home in the campaign, MONSTALIE', 'Single villa, 3 bedrooms .. 10 minutes west of Mont de Marsan and towards the beaches, come and discover this single storey villa which will seduce you with its many assets.', 30, 'MONSTALIE', '2021-05-07 13:37:11', 1, 1, 200, '6095266735a1f_1.jpg'),
(21, 'Apartment close to ocean, BIARRITZ', 'In Biarritz, beautiful apartment located close to the city center offering a breathtaking view of the Grande Plage. Located on the 8th floor of a large holiday residence with collective swimming pool and lift on the seafront.', 250, 'BIARRITZ', '2021-05-07 13:38:22', 1, 2, 200, '609526ae3b1a0_7.jpg'),
(22, 'Duplex Apartment, BORDEAUX', 'Apartment located on the first floor of a small residence with only 2 apartments. The living room is bright with kitchenette open to the living room, bedroom upstairs (duplex) with large queen size bed, storage and desk.', 300, 'BORDEAUX', '2021-05-07 13:39:14', 1, 2, 200, '609526e2ee7dc_9.jpg'),
(24, 'Home Campaign, Pessac', 'Beautiful home in a sweet spot', 300, 'BORDEAUX', '2021-05-07 18:32:01', 1, 1, 200, '60956b8123c1a_8.jpg'),
(25, 'House near Mont Saint Michel', 'House 8km from Mont Saint Michel\r\n10 pieces - 190 m²\r\n', 200, 'COURTILS', '2021-05-09 18:10:33', 6, 1, 220, '6098097983f09_11.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'ROLE_USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'Alexis', 'alexis@alexis.com', '$2y$10$OfEKZ8r6qLMhaunMkWdtH.XrKKLrKrtmX4LyocB5n5FCZd.7PJvGW', 'ROLE_ADMIN'),
(5, 'Aline', 'aline@aline.com', '$2y$10$o.bwpQ88A0aobNJyQREvIu6V1wcOfQq33fPF9lo88SJbWfB4ZFzYm', 'ROLE_USER'),
(6, 'Sandrine', 'sandrine@sandrine.com', '$2y$10$G/6B7Q4KQ/GhBWRKUE.NBOKa06DeFBaSyGtqcLlKO0vfX1MlXecW2', 'ROLE_USER');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Index pour la table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `author` (`author`),
  ADD KEY `fk_categories_category` (`rental_category`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `author` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_categories_category` FOREIGN KEY (`rental_category`) REFERENCES `categories` (`categories_id`);
