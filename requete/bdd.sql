-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
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
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_amine.category : ~0 rows (environ)
INSERT INTO `category` (`id_category`, `categoryName`) VALUES
	(1, 'Technology'),
	(2, 'Health'),
	(3, 'Travel'),
	(4, 'Science'),
	(5, 'Sports'),
	(6, 'Art'),
	(7, 'Education'),
	(8, 'Gaming'),
	(9, 'Food'),
	(10, 'Finance');

-- Listage de la structure de table forum_amine. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL,
  PRIMARY KEY (`id_post`) USING BTREE,
  KEY `FKuserid` (`user_id`),
  KEY `FK_topicid` (`topic_id`),
  CONSTRAINT `FK_topicid` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FKuserid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_amine.post : ~15 rows (environ)
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
	(16, 'Investing in stocks requires research.', '2025-01-13 14:38:22', 10, 10);

-- Listage de la structure de table forum_amine. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `FK_user_id` (`user_id`),
  KEY `FK_category_id` (`category_id`),
  CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`),
  CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_amine.topic : ~10 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `user_id`, `category_id`) VALUES
	(1, 'Introduction to AI', '2025-01-13 14:38:22', 1, 1),
	(2, 'Advancements in Quantum Computing', '2025-01-13 14:38:22', 4, 1),
	(3, 'Healthy Living Tips', '2025-01-13 14:38:22', 2, 2),
	(4, 'Yoga for Beginners', '2025-01-13 14:38:22', 5, 2),
	(5, 'Top Travel Destinations for 2025', '2025-01-13 14:38:22', 3, 3),
	(6, 'Budget Travel Tips', '2025-01-13 14:38:22', 8, 3),
	(7, 'Space Exploration in the 21st Century', '2025-01-13 14:38:22', 4, 4),
	(8, 'Benefits of Daily Exercise', '2025-01-13 14:38:22', 6, 2),
	(9, 'The Evolution of Video Games', '2025-01-13 14:38:22', 9, 8),
	(10, 'Best Practices for Personal Finance', '2025-01-13 14:38:22', 10, 10);

-- Listage de la structure de table forum_amine. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table forum_amine.user : ~10 rows (environ)
INSERT INTO `user` (`id_user`, `username`, `creationDate`, `password`) VALUES
	(1, 'amine', '2025-01-13 14:37:32', 'password123'),
	(2, 'sara', '2025-01-13 14:37:32', 'password456'),
	(3, 'alex', '2025-01-13 14:37:32', 'password789'),
	(4, 'noah', '2025-01-13 14:37:32', 'password321'),
	(5, 'emma', '2025-01-13 14:37:32', 'password654'),
	(6, 'liam', '2025-01-13 14:37:32', 'password987'),
	(7, 'olivia', '2025-01-13 14:37:32', 'password111'),
	(8, 'elias', '2025-01-13 14:37:32', 'password222'),
	(9, 'mia', '2025-01-13 14:37:32', 'password333'),
	(10, 'lucas', '2025-01-13 14:37:32', 'password444');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
