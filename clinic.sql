-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: clinic
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `doctor_id` int NOT NULL,
  `status` enum('pending','Confirmed','Rejected') DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (1,'youssef','yousefsafwat367@gmail.com','11236787911','2023-09-12 23:29:29',16,'Confirmed'),(3,'youssef','yousefsafwat367@gmail.com','11236787911','2023-09-12 23:30:34',24,'Rejected'),(4,'youssef','yousefsafwat367@gmail.com','11236','2023-09-12 23:30:50',24,'Confirmed'),(5,'youssef','yousefsafwat367@gmail.com','11236787911','2023-09-12 23:59:09',25,'Rejected'),(6,'youssef','yousefsafwat367@gmail.com','11236787911','2023-09-13 18:53:37',17,'pending'),(7,'youssef','yousefsafwat367891011@gmail.com','011236787911','2023-09-14 14:44:16',16,'pending'),(8,'','yousefsafwat367891011@gmail.com','011236787911','2023-09-14 14:44:22',16,'pending'),(9,'youssef','yousefsafwat367891011@gmail.com','011236787911','2023-09-14 14:44:23',16,'pending'),(10,'Ahme','yousefsafwat367891011@gmail.com','','2023-09-14 14:44:33',16,'pending');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'youssef','yousefsafwat367@gmail.com','011236787911','dadsadsad','adsadsadasd'),(3,'youssef','yousefsafwat367@gmail.com','011236787911','dadsadsad','ADADSAFSAF'),(5,'youssef','yousefsafwat367@gmail.com','011236787911','Welcome','hello i&amp;#039;m youssef');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `bio` varchar(2000) NOT NULL,
  `major_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `major_id` (`major_id`),
  CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`major_id`) REFERENCES `major` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (16,'Mohsen','youssef@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','1694626617.jpg','Hello I\'m  Youssef',1),(17,'mohammed','mohammed@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','mohammed.jpg','Hello I\'m  Mohammed ',2),(18,'ahmed','ahmed@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','ahmed.jpg','Hello I\'m Ahmed ',3),(19,'mona','mona@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','mona.jpg','Hello I\'m Mona ',4),(20,'mayar','mayar@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','mayar.jpg','Hello I\'m Mayar ',5),(21,'hussein','hussein@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','hussein.jpg','Hello I\'m Hussein ',6),(22,'menna','menna@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','menna.jpg','Hello I\'m Menna ',11),(24,'omnia','omnia@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','omnia.jpg','Hello I\'m omnia ',1),(25,'morkos','morkos@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','morkos.jpg','Hello I\'m morkos ',2),(26,'ziad','ziad@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','ziad.jpg','Hello I\'m ziad',3),(27,'lobna','lobna@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','lobna.jpg','Hello I\'m lobna ',4),(29,'osama','osama@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','osama.jpg','Hello I\'m osama ',12),(30,'Mina',NULL,NULL,'1694638880.jpg','Hello i\'m Mina',2);
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `major`
--

DROP TABLE IF EXISTS `major`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `major` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major`
--

LOCK TABLES `major` WRITE;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
INSERT INTO `major` VALUES (1,'Cardiology','OIP.jpg'),(2,'Dermatology','download.jpg'),(3,'Pediatrics','Pediatrics.jpg'),(4,'Orthopedic Surgery','Orthopedic Surgery.jpg'),(5,'Neurology','Neurology.jpg'),(6,'Ophthalmology','Ophthalmology.jpg'),(11,'Psychiatry','Psychiatry.jpg'),(12,'Obstetrics and Gynecology','Obstetrics and Gynecology.jpg');
/*!40000 ALTER TABLE `major` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `phone` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Ahmed','Youssef@gmail.com','88ea39439e74fa27c09a4fc0bc8ebe6d00978392','admin','11236787911'),(8,'hussein','yousefsafwat367@gmail.com','01b307acba4f54f55aafc33bb06bbbf6ca803e9a','user','011236787911');
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

-- Dump completed on 2023-09-14 15:58:47
