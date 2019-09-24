-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 18 Juillet 2019 à 16:46
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `membres`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_articles` int(11) NOT NULL,
  `nom_articles` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix_articles` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_articles`, `nom_articles`, `prix_articles`) VALUES
(1, 'montre', 150),
(2, 'chaussures', 70),
(3, 'tee-shirt', 20),
(4, 'short', 30),
(5, 'jean\'s', 40);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_client` int(5) NOT NULL,
  `nom_client` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_objet` int(5) NOT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` int(5) NOT NULL,
  `date_commande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_inscription` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(13, 'abdou', '$2y$10$7T6Q7N668DXPLK8vpknDF.ZhykYhn6rAE4i.O1FMHuwxCDOGn8W5m', 'abdou.abdoul@gmail.com', '2019-07-18'),
(14, 'cyprien', '$2y$10$fUSztw7Hnqh7hZb.tAcuZOeGfmL2lP4FNaP7diRfi9qV7QWK2MTnK', 'cyprien.sauvage974@gmail.com', '2019-07-18');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_articles`),
  ADD KEY `id_articles` (`id_articles`),
  ADD KEY `nom_articles` (`nom_articles`),
  ADD KEY `prix_articles` (`prix_articles`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `nom_client` (`nom_client`),
  ADD KEY `id_objet` (`id_objet`),
  ADD KEY `objet` (`objet`),
  ADD KEY `prix` (`prix`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`nom_client`) REFERENCES `membre` (`pseudo`),
  ADD CONSTRAINT `commande_ibfk_3` FOREIGN KEY (`id_objet`) REFERENCES `articles` (`id_articles`),
  ADD CONSTRAINT `commande_ibfk_4` FOREIGN KEY (`objet`) REFERENCES `articles` (`nom_articles`),
  ADD CONSTRAINT `commande_ibfk_5` FOREIGN KEY (`prix`) REFERENCES `articles` (`prix_articles`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
