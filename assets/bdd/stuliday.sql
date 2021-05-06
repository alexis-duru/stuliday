-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 06 mai 2021 à 07:09
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
  `square_meter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rentals`
--

INSERT INTO `rentals` (`rental_id`, `rental_name`, `rental_description`, `rental_price`, `rental_adress`, `created_at`, `author`, `rental_category`, `square_meter`) VALUES
(6, 'Apartment close to ocean, BIARRITZ', 'In Biarritz, beautiful apartment located close to the city center offering a breathtaking view of the Grande Plage. Located on the 8th floor of a large holiday residence with collective swimming pool and lift on the seafront.\r\n', 250, 'BIARRITZ', '2021-05-04 13:39:48', 1, 2, 250),
(7, 'Home in the campaign, MONSTALIE', 'Single storey villa, 3 bedrooms .. 10 minutes west of Mont de Marsan and towards the beaches, come and discover this single storey villa which will seduce you with its many assets.\r\n', 300, 'Monstalie', '2021-05-04 13:43:50', 1, 1, 125),
(8, 'Apartment in the in the 18th arrondissement, PARIS', 'This property is located avenue de la porte des Poissonniers in a new building from 2005 with elevator, on the 1st floor overlooking the garden. ', 400, 'Paris', '2021-05-04 13:45:21', 1, 2, 200),
(9, 'Duplex Apartment, BORDEAUX', 'Apartment located on the first floor of a small residence with only 2 apartments. The living room is bright with kitchenette open to the living room, bedroom upstairs (duplex) with large queen size bed, storage and desk. ', 150, 'BORDEAUX', '2021-05-05 21:53:50', 7, 2, 200),
(10, 'Appartment Buttes Chaumont Park, PARIS', 'Furnished studio, equipped with 15m 2, renovated, on the 4th under the roof, apartment on the courtyard side.\r\n', 50, 'PARIS', '2021-05-05 21:56:11', 5, 2, 35),
(11, ' Villa Isis, LACANAU-OCEAN', 'Very beautiful authentic old villa, super well located, sunny location. Seasonal rental or vacation rental in Lacanau Océan\r\n', 300, 'LACANAU', '2021-05-05 21:58:18', 6, 1, 200);

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
(6, 'Sandrine', 'sandrine@sandrine.com', '$2y$10$G/6B7Q4KQ/GhBWRKUE.NBOKa06DeFBaSyGtqcLlKO0vfX1MlXecW2', 'ROLE_USER'),
(7, 'Pascal', 'pascal@pascal.com', '$2y$10$JSU4JEFCK9Tek3EUumfF8OSixYlEuuM6.p08/7ACoFgUDVh22AcuO', 'ROLE_USER');

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
  MODIFY `rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `author` FOREIGN KEY (`author`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_categories_category` FOREIGN KEY (`rental_category`) REFERENCES `categories` (`categories_id`);