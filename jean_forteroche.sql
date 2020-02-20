-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 15 fév. 2020 à 20:02
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jean_forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

DROP TABLE IF EXISTS `chapitres`;
CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `resum` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapitres`
--

INSERT INTO `chapitres` (`id`, `slug`, `title`, `resum`, `date`, `content`) VALUES
(1, 'title1', 'title', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Molestie id non dignissim sagittis, lectus vulputate velit.', '2020-02-15', 'Enim lectus vitae ultrices mattis quisque placerat. Ut scelerisque cursus nisi molestie turpis convallis tellus risus. Eget amet eros, elementum lectus. Libero eu sed aliquam, dolor donec ullamcorper ultrices. Non feugiat convallis amet, vel eget ut. Lacus fermentum purus malesuada molestie facilisis cras. Quam arcu ac amet sed dolor. At pharetra interdum nunc nunc sed. Sit turpis feugiat amet proin eget imperdiet molestie. Adipiscing tortor donec ultrices pharetra.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa sint natus architecto dolor accusantium, minus consectetur voluptate ratione cum sequi?\r\n\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit assumenda nulla quidem obcaecati labore non ut id modi ducimus error accusantium sequi perspiciatis, ipsa, commodi voluptatum ea. Corporis iusto aliquid quia atque aspernatur, quisquam saepe obcaecati dolore, dignissimos quod pariatur qui veritatis ducimus nam maxime non enim nihil voluptates dolorum recusandae doloremque!\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Eum molestiae et voluptatibus accusamus facere quos reiciendis omnis libero dolorum quibusdam nemo eaque, officia alias neque quaerat ratione iure accusantium! Fugiat voluptates cum deserunt corporis distinctio, voluptate culpa placeat id ad a fuga? Molestias suscipit saepe praesentium consequatur. Fugit voluptatibus at quam illo quas deserunt doloremque consequuntur molestias. Maiores nobis impedit dolore aut suscipit atque facilis, dolor quasi tempore!\r\n\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Iure consequuntur iste officia tenetur unde expedita, libero dolor sint, quidem id adipisci voluptatum laborum in porro quasi minima cumque itaque ut impedit? Aspernatur sunt ad, dolor, cupiditate facere quis reiciendis suscipit rerum enim expedita ullam? Alias iure tempora omnis quia neque.');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapitreid` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chapitreid` (`chapitreid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `romans`
--

DROP TABLE IF EXISTS `romans`;
CREATE TABLE IF NOT EXISTS `romans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `romans`
--

INSERT INTO `romans` (`id`, `title`, `content`) VALUES
(1, 'BILLET SIMPLE POUR L\'ALASKA', '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Molestie id non dignissim sagittis, lectus vulputate velit.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`chapitreid`) REFERENCES `chapitres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
