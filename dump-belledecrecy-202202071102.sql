-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: belledecrecy
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collections` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (1,'héroïnes',1);
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (90,'noir'),(91,'rose'),(97,'Jaune'),(98,'Vert'),(99,'Bleu');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `page` varchar(100) NOT NULL,
  `left_title` varchar(100) DEFAULT NULL,
  `left_subtitle` varchar(100) DEFAULT NULL,
  `left_description` text DEFAULT NULL,
  `right_title` varchar(100) DEFAULT NULL,
  `right_subtitle` varchar(100) DEFAULT NULL,
  `right_description` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` VALUES (1,'a_propos','À propos','Coulisses','Belle de Crécy est une maison de lingerie parisienne fondée en 2020 qui propose une vision singulière et authentique. Au cœur de notre philosophie, il y a la rencontre entre nos créations et vous. Nos dessous se découvrent et s’essayent lors d’un rendez-vous particulier où l’on s’affranchit des tailles imposées et où tous les corps sont célébrés. La confection en sur mesure permet de produire dans une démarche responsable et raisonnée.\r\n\r\nCréatrice de la marque, Bérangère repense la lingerie d’exception en s’inspirant de son expérience de costumière pour l’Opéra de Paris, avec la volonté d’effacer la frontière entre le vêtement et la lingerie. Elle travaille les dentelles françaises de Calais-Caudry, les tulles & soies issus de la tradition des soyeux lyonnais.\r\n\r\nPrenez rendez-vous pour découvrir les dessous Belle de Crécy et nous rencontrer.','Newsletter','Nous contacter','Contactez-nous par téléphone ou par mail si vous avez une demande particulière. La prochaine vente aura lieu du 3 au 5 décembre 2021 au 73 Rue du Faubourg Saint-Honoré, 75008 Paris.','contact@belledecrecy.com','+33 6 12 74 45 28'),(2,'reservation','Point de vente','Expérience','Entrez dans notre univers et laissez-nous vous présenter nos collections lors d’un essayage privé.\r\n\r\nUn moment suspendu pour apprécier la beauté des dentelles et des soies.\r\n\r\nNous avons fait le choix du sur mesure et d’un rendez-vous physique pour que nos créations s’adaptent à toutes les silhouettes. Notre atelier parisien confectionne à votre mesure les pièces dans un délai de une à trois semaines selon la demande.\r\n\r\nPlusieurs lieux vous permettent d’essayer nos créations : lors de nos ventes éphémères, dans une chambre d’hôtel privatisée à Paris ou ailleurs, ou tout simplement chez vous.','Réservez votre essayage','Dès maintenant','Merci de votre réservation.',NULL,NULL);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_list`
--

DROP TABLE IF EXISTS `email_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_list`
--

LOCK TABLES `email_list` WRITE;
/*!40000 ALTER TABLE `email_list` DISABLE KEYS */;
INSERT INTO `email_list` VALUES (8,'gauthier.delhaye@hotmail.com','1643716533');
/*!40000 ALTER TABLE `email_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lingerie_colors`
--

DROP TABLE IF EXISTS `lingerie_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lingerie_colors` (
  `lingerie_id` int(11) NOT NULL,
  `color_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`lingerie_id`,`color_id`),
  KEY `lingerie_colors_FK` (`color_id`),
  CONSTRAINT `lingerie_colors_FK` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  CONSTRAINT `lingerie_colors_FK_1` FOREIGN KEY (`lingerie_id`) REFERENCES `lingeries` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lingerie_colors`
--

LOCK TABLES `lingerie_colors` WRITE;
/*!40000 ALTER TABLE `lingerie_colors` DISABLE KEYS */;
INSERT INTO `lingerie_colors` VALUES (72,90),(72,91),(79,90),(79,99);
/*!40000 ALTER TABLE `lingerie_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lingeries`
--

DROP TABLE IF EXISTS `lingeries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lingeries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link_name` varchar(100) DEFAULT NULL,
  `collection` tinyint(4) DEFAULT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `left_image` varchar(255) DEFAULT NULL,
  `right_image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `lingeries_FK` (`collection`),
  CONSTRAINT `lingeries_FK` FOREIGN KEY (`collection`) REFERENCES `collections` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lingeries`
--

LOCK TABLES `lingeries` WRITE;
/*!40000 ALTER TABLE `lingeries` DISABLE KEYS */;
INSERT INTO `lingeries` VALUES (72,'zélie','body-zélie',1,'Body en tulle irisé et dentelle de Calais-Caudry, échancré ou non.',390,'7432c5a015ceacb0522399f1f1bbd82f.jpg','da8b6a2438d9097c2498be7f6c3afaba.jpg',1),(79,'Test','Test',1,'trhrrttrhdsefzefezrezrzr',300,'eb6376f7c7e0f1f900680206de22db23.jpg','5f7a464fa9fc370a72555294d0190678.jpg',1);
/*!40000 ALTER TABLE `lingeries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `popup`
--

DROP TABLE IF EXISTS `popup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `popup` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `collection` tinyint(4) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `pop_up_FK` (`collection`),
  CONSTRAINT `pop_up_FK` FOREIGN KEY (`collection`) REFERENCES `collections` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `popup`
--

LOCK TABLES `popup` WRITE;
/*!40000 ALTER TABLE `popup` DISABLE KEYS */;
INSERT INTO `popup` VALUES (7,'Noël',1,'Noël 2021','','Pour Noël,\r\nune boîte Isadora,\r\nun ensemble Mérode ou un essayage privé','','','6a8b5bf2d0d8555994eab5a88a30fa91.png','e5886d7a9970de2d79f082f3a2bdaf9b.png',1);
/*!40000 ALTER TABLE `popup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (58,'1643802953','1672995600','Gauthier','Delhaye','0686003550','gauthier.delhaye@hotmail.com','pending'),(59,'1643811006','1643792400','Gauthier','Delhaye','0686003550','gauthier.delhaye@hotmail.com','pending'),(60,'1643811051','1643792400','Gauthier','Delhaye','0686003550','gauthier.delhaye@hotmail.com','pending'),(61,'1643830652','1651478400','Gauthier','Delhaye','0686003550','gauthier.delhaye@hotmail.com','pending'),(62,'1643830755','1643796000','Gauthier','Delhaye','0686003550','gauthier.delhaye@hotmail.com','pending'),(63,'1643967935','1645808400','Gauthier','Delhaye','0686003550','gauthier.delhaye@hotmail.com','pending');
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deletable` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Gauthier','gauthier.delhaye@hotmail.com','$2y$10$i8yn/01IqCeKD53NkxYAw.uJ3yVmxmAOAuIbUHJYK.KASUpslpVT2',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'belledecrecy'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-07 11:02:13
