-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.14 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para imoveis
CREATE DATABASE IF NOT EXISTS `imoveis` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `imoveis`;

-- Copiando estrutura para tabela imoveis.address
CREATE TABLE IF NOT EXISTS `address` (
  `id_address` int(11) NOT NULL AUTO_INCREMENT,
  `zipcode` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `neighborhood` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`id_address`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela imoveis.images
CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `url` longtext NOT NULL,
  `id_property` int(11) NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_property` (`id_property`),
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id_property`) REFERENCES `property` (`id_property`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela imoveis.owner
CREATE TABLE IF NOT EXISTS `owner` (
  `id_owner` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_owner`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela imoveis.property
CREATE TABLE IF NOT EXISTS `property` (
  `id_property` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `contract` tinyint(1) NOT NULL,
  `children` tinyint(1) NOT NULL,
  `pets` tinyint(1) NOT NULL,
  `individual` tinyint(1) NOT NULL,
  `energy` tinyint(1) NOT NULL,
  `water` tinyint(1) NOT NULL,
  `monthly_payment` double NOT NULL,
  `deposit` double DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `garage` int(11) DEFAULT NULL,
  `id_address` int(11) DEFAULT NULL,
  `id_owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_property`),
  KEY `id_address` (`id_address`),
  KEY `id_owner` (`id_owner`),
  CONSTRAINT `property_ibfk_1` FOREIGN KEY (`id_address`) REFERENCES `address` (`id_address`),
  CONSTRAINT `property_ibfk_2` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`id_owner`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
