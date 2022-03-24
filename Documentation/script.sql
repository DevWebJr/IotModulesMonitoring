-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le : jeu. 24 mars 2022 à 13:00
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `iotmodulesmonitoring`
--
DROP DATABASE IF EXISTS `iotmodulesmonitoring`;
CREATE DATABASE IF NOT EXISTS `iotmodulesmonitoring` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `iotmodulesmonitoring`;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
                                          (1, 'Équipement Personnel (Wearable)'),
                                          (2, 'Agriculture / Logistique'),
                                          (3, 'Sécurité'),
                                          (4, 'Chauffage / Climatisation');

-- --------------------------------------------------------

--
-- Structure de la table `energy`
--

DROP TABLE IF EXISTS `energy`;
CREATE TABLE IF NOT EXISTS `energy` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `unit_of_measure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `abbreviation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `energy`
--

INSERT INTO `energy` (`id`, `name`, `unit_of_measure`, `abbreviation`) VALUES
                                                                           (1, 'Température', 'Degrés', 'C°'),
                                                                           (2, 'Force', 'Newton', 'N'),
                                                                           (3, 'Pression', 'Bar', 'bar'),
                                                                           (4, 'Électricté', 'Kilowattheure', 'KWh'),
                                                                           (5, 'British Thermal Unit', 'BTU', 'BTU'),
                                                                           (6, 'Vitesse de Connexion Internet', 'Megabit', 'Mbit/s');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `category_id` int(11) NOT NULL,
    `energy_id` int(11) NOT NULL,
    `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `alight` tinyint(1) NOT NULL,
    `functional` tinyint(1) NOT NULL,
    `value` double NOT NULL,
    PRIMARY KEY (`id`),
    KEY `IDX_C24262812469DE2` (`category_id`),
    KEY `IDX_C242628EDDF52D` (`energy_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `category_id`, `energy_id`, `item`, `ip_address`, `alight`, `functional`, `value`) VALUES
                                                                                                                   (1, 1, 4, 'Volets Connectés', '4.31.45.54', 0, 1, 0.125),
                                                                                                                   (2, 1, 4, 'Aspirateur', '53.56.27.3', 1, 0, 0.8),
                                                                                                                   (3, 1, 6, 'Smart TV', '67.235.85.20', 0, 1, 0.25),
                                                                                                                   (4, 1, 6, 'Montre', '187.109.250.24', 1, 1, 0.5),
                                                                                                                   (5, 2, 6, 'Capteur pour arbres fruitiers', '234.120.115.205', 0, 0, 0.6),
                                                                                                                   (6, 2, 2, 'arrosage automatique', '178.246.32.39', 1, 1, 0.2),
                                                                                                                   (7, 2, 6, 'Collier bovin', '162.56.157.119', 0, 0, 0.6),
                                                                                                                   (8, 2, 6, 'Robot de binage', '18.201.184.172', 1, 1, 0.1),
                                                                                                                   (9, 3, 4, 'Caméra', '204.52.61.81', 0, 0, 0.22),
                                                                                                                   (10, 3, 4, 'Alarme', '204.214.239.106', 1, 0, 0.15),
                                                                                                                   (11, 3, 4, 'Détecteurs de mouvements', '31.52.34.66', 0, 0, 0.322),
                                                                                                                   (12, 3, 4, 'Détecteurs de fumée', '151.134.184.199', 1, 1, 0.25),
                                                                                                                   (13, 3, 3, 'Détecteurs de fuite d’eau', '122.177.12.0', 0, 0, 1),
                                                                                                                   (14, 3, 3, 'Détecteurs d’émanation toxique', '88.113.47.47', 0, 0, 1),
                                                                                                                   (15, 4, 1, 'Climatiseur', '37.203.210.91', 0, 0, 5),
                                                                                                                   (16, 4, 1, 'Radiateur', '31.131.216.111', 1, 1, 45);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
    ADD CONSTRAINT `FK_C24262812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_C242628EDDF52D` FOREIGN KEY (`energy_id`) REFERENCES `energy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
