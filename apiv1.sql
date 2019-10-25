-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: apiv1
-- ------------------------------------------------------
-- Server version	5.7.19-log

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
-- Table structure for table `dbcategories`
--

DROP TABLE IF EXISTS `dbcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbcategories`
--

LOCK TABLES `dbcategories` WRITE;
/*!40000 ALTER TABLE `dbcategories` DISABLE KEYS */;
INSERT INTO `dbcategories` VALUES (1,'Tamales','Ricos Tamales Oaxaqueños'),(4,'Abarrotes','Articulos para el hogar'),(5,'Abarrotes','Articulos para el hogar'),(7,'Abarrotes','Articulos para el hogar'),(8,'Limpieza','Articulos para el aseo del hogar'),(10,'Limpieza','Articulos para el aseo del hogar'),(11,'Peliculas','Renta de peliculas'),(13,'Informatica','Articulos tecnologicos'),(20,'Deportes','Articulos deportivos');
/*!40000 ALTER TABLE `dbcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dbuser`
--

DROP TABLE IF EXISTS `dbuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dbuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dbuser`
--

LOCK TABLES `dbuser` WRITE;
/*!40000 ALTER TABLE `dbuser` DISABLE KEYS */;
INSERT INTO `dbuser` VALUES (1,'Francisco','Quijada',21,'Enrique Segobiano','fran@gmail.com','12345'),(5,'Memo','Cruz',25,'Moderna Norte','memo@gmail.com','12345'),(16,'Cristian Alejandro','Quijada Cruz',25,'Guadalajara','vencees.dlp@gmail.com','12345'),(17,'Pedro','Armendariz',54,'ya tu sabe','elpedricola@gmail.com','12345');
/*!40000 ALTER TABLE `dbuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'apiv1'
--

--
-- Dumping routines for database 'apiv1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-02 17:47:37
