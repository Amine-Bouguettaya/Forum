-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.40 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_amine
CREATE DATABASE IF NOT EXISTS `forum_amine` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_amine`;

-- Listage de la structure de table forum_amine. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) NOT NULL,
  `categoryDescription` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_amine.category : ~10 rows (environ)
INSERT INTO `category` (`id_category`, `categoryName`, `categoryDescription`) VALUES
	(1, 'Technology', 'Découvrez les dernières innovations, gadgets, et tendances technologiques qui transforment le monde et façonnent notre futur.'),
	(2, 'Health', 'Explorez des conseils, des astuces et des informations pour améliorer votre bien-être physique et mental au quotidien.'),
	(3, 'Travel', 'Inspirez-vous de destinations incontournables, de conseils de voyage et d’expériences uniques à travers le globe.'),
	(4, 'Science', 'Plongez dans l’univers fascinant de la science, des découvertes révolutionnaires aux mystères de l’univers.'),
	(5, 'Sports', 'Suivez l’actualité sportive, les performances d’athlètes, et les grands événements qui font vibrer le monde entier.'),
	(6, 'Art', 'Laissez-vous inspirer par la créativité à travers des œuvres, des artistes et des mouvements artistiques marquants.'),
	(7, 'Education', 'Accédez à des ressources, des idées et des solutions pour apprendre, enseigner et s’épanouir intellectuellement.'),
	(8, 'Gaming', 'Découvrez les dernières sorties, les tendances et tout l’univers passionnant des jeux vidéo et de l’e-sport.'),
	(9, 'Food', 'Savourez des recettes délicieuses, des inspirations culinaires et des découvertes gastronomiques du monde entier.'),
	(10, 'Finance', 'Informez-vous sur la gestion de vos finances, l’investissement et les stratégies pour atteindre vos objectifs financiers.');

-- Listage de la structure de table forum_amine. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  `topic_id` int NOT NULL,
  PRIMARY KEY (`id_post`) USING BTREE,
  KEY `FKuserid` (`user_id`),
  KEY `FK_topicid` (`topic_id`),
  CONSTRAINT `FK_topicid` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`) ON DELETE CASCADE,
  CONSTRAINT `FKuserid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_amine.post : ~16 rows (environ)
INSERT INTO `post` (`id_post`, `text`, `creationDate`, `user_id`, `topic_id`) VALUES
	(2, 'Artificial Intelligence is revolutionizing industries!', '2025-01-13 14:38:22', 1, 1),
	(3, 'Quantum computers could change everything we know.', '2025-01-13 14:38:22', 4, 2),
	(4, 'Eating healthy and staying active is key to well-being.', '2025-01-13 14:38:22', 2, 3),
	(5, 'Yoga is great for both the mind and body.', '2025-01-13 14:38:22', 5, 4),
	(6, 'Visit Japan for a mix of tradition and modernity.', '2025-01-13 14:38:22', 3, 5),
	(7, 'Traveling on a budget is easier than you think.', '2025-01-13 14:38:22', 8, 6),
	(8, 'Mars colonization could happen within our lifetime.', '2025-01-13 14:38:22', 4, 7),
	(9, 'Regular exercise improves mental health.', '2025-01-13 14:38:22', 6, 8),
	(10, 'Video games have come a long way since the 80s.', '2025-01-13 14:38:22', 9, 9),
	(11, 'Start saving early to secure your financial future.', '2025-01-13 14:38:22', 10, 10),
	(12, 'Machine learning is a subset of AI.', '2025-01-13 14:38:22', 1, 1),
	(13, 'Quantum computing challenges encryption.', '2025-01-13 14:38:22', 4, 2),
	(14, 'Remember to hydrate and stretch regularly.', '2025-01-13 14:38:22', 5, 4),
	(15, 'Italy has amazing food and architecture.', '2025-01-13 14:38:22', 3, 5),
	(16, 'Investing in stocks requires research.', '2025-01-13 14:38:22', 10, 10),
	(31, 'oigfhfdoighfdoighfd', '2025-01-14 16:09:13', NULL, 1);

-- Listage de la structure de table forum_amine. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `closed` varchar(50) NOT NULL DEFAULT 'OPEN',
  PRIMARY KEY (`id_topic`),
  KEY `FK_category_id` (`category_id`),
  KEY `FK_user_id` (`user_id`),
  CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE CASCADE,
  CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_amine.topic : ~10 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `user_id`, `category_id`, `closed`) VALUES
	(1, 'Introduction to AI', '2025-01-13 14:38:22', 1, 1, 'OPEN'),
	(2, 'Advancements in Quantum Computing', '2025-01-13 14:38:22', 4, 1, 'OPEN'),
	(3, 'Healthy Living Tips', '2025-01-13 14:38:22', 2, 2, 'OPEN'),
	(4, 'Yoga for Beginners', '2025-01-13 14:38:22', 5, 2, 'OPEN'),
	(5, 'Top Travel Destinations for 2025', '2025-01-13 14:38:22', 3, 3, 'OPEN'),
	(6, 'Budget Travel Tips', '2025-01-13 14:38:22', 8, 3, 'OPEN'),
	(7, 'Space Exploration in the 21st Century', '2025-01-13 14:38:22', 4, 4, 'OPEN'),
	(8, 'Benefits of Daily Exercise', '2025-01-13 14:38:22', 6, 2, 'OPEN'),
	(9, 'The Evolution of Video Games', '2025-01-13 14:38:22', 9, 8, 'OPEN'),
	(10, 'Best Practices for Personal Finance', '2025-01-13 14:38:22', 10, 10, 'OPEN');

-- Listage de la structure de table forum_amine. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'ROLE_USER',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_amine.user : ~14 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `email`, `creationDate`, `password`, `role`) VALUES
	(1, 'amine', 'amine@exemple.fr', '2025-01-13 14:37:32', 'password123', 'ROLE_USER'),
	(2, 'sara', 'sara@exemple.fr', '2025-01-13 14:37:32', 'password456', 'ROLE_MOD'),
	(3, 'alex', 'alex@exemple.fr', '2025-01-13 14:37:32', 'password789', 'ROLE_USER'),
	(4, 'noah', 'noah@exemple.fr', '2025-01-13 14:37:32', 'password321', 'ROLE_USER'),
	(5, 'emma', 'emma@exemple.fr', '2025-01-13 14:37:32', 'password654', 'ROLE_USER'),
	(6, 'liam', 'liam@exemple.fr', '2025-01-13 14:37:32', 'password987', 'ROLE_USER'),
	(7, 'olivia', 'olivia@exemple.fr', '2025-01-13 14:37:32', 'password111', 'ROLE_USER'),
	(8, 'elias', 'elias@exemple.fr', '2025-01-13 14:37:32', 'password222', 'ROLE_USER'),
	(9, 'mia', 'mia@exemple.fr', '2025-01-13 14:37:32', 'password333', 'ROLE_USER'),
	(10, 'lucas', 'lucas@exemple.fr', '2025-01-13 14:37:32', 'password444', 'ROLE_USER'),
	(31, 'amine68', 'amine@test.fr', '2025-01-17 08:50:44', '$2y$10$8XuZTfFfT6/hamtV8kwBvuPA4k7VgEmgSzHWxUB.XmcHpqwe20ByC', 'ROLE_ADMIN'),
	(32, 'amine2', 'amine2@test.fr', '2025-01-17 08:58:45', '$2y$10$JGW5.uoxxSP3fv2KKJ7qye9Ntz1YwUZHBCjTJB0dfmfex2MmlmsYq', 'ROLE_USER'),
	(33, '12', 'test@test.fr', '2025-01-17 11:01:18', '$2y$10$y8WsXMQ48RSATyDAw3Ee6OJdGvl8anl7wFGF5kPZMRRC/mUzZYaae', 'ROLE_USER'),
	(34, 'rrrz', 'test2@test.fr', '2025-01-17 11:06:29', '$2y$10$AZZohH8wIiBcHf5XP69RUuz0c0mwJPogGr0JcCdw4uMOCygzq480u', 'ROLE_MOD');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
