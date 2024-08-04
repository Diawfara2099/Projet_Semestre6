-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: immobilier
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bailleur`
--

DROP TABLE IF EXISTS `bailleur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bailleur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `CIN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bailleur`
--

LOCK TABLES `bailleur` WRITE;
/*!40000 ALTER TABLE `bailleur` DISABLE KEYS */;
INSERT INTO `bailleur` VALUES (1,'Diaw','Ibou','Dakar','780655878','1429199900012'),(2,'Sow','Mamadou','Dakar','765287341','1323464744778');
/*!40000 ALTER TABLE `bailleur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `CIN` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CIN` (`CIN`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Ndiaye','Abdou','abdou@gmail.com','765287343','6938838439849'),(3,'Ndoye','Fatoumata','ndoye@gmail.com','774553234','1264747487467');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrat`
--

DROP TABLE IF EXISTS `contrat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_DEB` date NOT NULL,
  `date_FIN` date NOT NULL,
  `modePaiement` varchar(50) NOT NULL,
  `id_client` int NOT NULL,
  `id_location` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_contrat_client` (`id_client`),
  KEY `FK_contrat_location` (`id_location`),
  CONSTRAINT `FK_contrat_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  CONSTRAINT `FK_contrat_location` FOREIGN KEY (`id_location`) REFERENCES `location` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrat`
--

LOCK TABLES `contrat` WRITE;
/*!40000 ALTER TABLE `contrat` DISABLE KEYS */;
INSERT INTO `contrat` VALUES (1,'2024-08-04','2027-06-04','Carte bancaire ',3,3),(2,'2024-08-04','2024-08-17','Wave',1,2);
/*!40000 ALTER TABLE `contrat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `type` enum('maison','studio','appartement') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prix` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `id_bailleur` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_bailleur` (`id_bailleur`),
  CONSTRAINT `location_bailleur` FOREIGN KEY (`id_bailleur`) REFERENCES `bailleur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (2,'R+4','HLM DIOURBEL','studio',500000.000000,1),(3,'r+2','PIKINE','maison',30000.000000,2);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paiements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_paiement` date DEFAULT NULL,
  `contrat_id` int DEFAULT NULL,
  `gestionnaire_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_paiement_contrat` (`contrat_id`),
  KEY `FK_paiement_user` (`gestionnaire_id`),
  CONSTRAINT `FK_paiement_contrat` FOREIGN KEY (`contrat_id`) REFERENCES `contrat` (`id`),
  CONSTRAINT `FK_paiement_user` FOREIGN KEY (`gestionnaire_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paiements`
--

LOCK TABLES `paiements` WRITE;
/*!40000 ALTER TABLE `paiements` DISABLE KEYS */;
INSERT INTO `paiements` VALUES (1,'2024-08-04',1,2),(2,'2024-08-04',2,2);
/*!40000 ALTER TABLE `paiements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL DEFAULT '0',
  `prenom` varchar(50) NOT NULL DEFAULT '0',
  `login` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `type` enum('administrateur','gestionnaire') NOT NULL DEFAULT 'administrateur',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'DIAW','ibrahima','Fara','diawibrahima313@gmail.com','$2y$10$fAdTSSJgrt6KxBOdpj/.A.WfaGTUurWb/hIC3xJmLhLBc0KWeUS0K','administrateur'),(2,'sow','mamadou','SowM','sowmamadou@gmail.com','$2y$10$fAdTSSJgrt6KxBOdpj/.A.WfaGTUurWb/hIC3xJmLhLBc0KWeUS0K','gestionnaire');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-04 14:59:40
