CREATE DATABASE  IF NOT EXISTS `gallery` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gallery`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: gallery
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CatName` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CatName` (`CatName`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Animals'),(2,'Social'),(3,'Space');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ImgName` varchar(200) NOT NULL,
  `ImgAlbumId` int(11) NOT NULL,
  `ImgComment` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Images_ImgAlbums` (`ImgAlbumId`),
  CONSTRAINT `FK_Images_ImgAlbums` FOREIGN KEY (`ImgAlbumId`) REFERENCES `imgalbums` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imgalbums`
--

DROP TABLE IF EXISTS `imgalbums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imgalbums` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
`UserId` int(11) NOT NULL,
  `AlbumName` varchar(100) NOT NULL,
  `IsPublic` tinyint(1) DEFAULT '0',
  `AlbumComment` text,
  PRIMARY KEY (`ID`),
  KEY `FK_Categories_ImgAlbums` (`CategoryId`),
  CONSTRAINT `FK_Categories_ImgAlbums` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`ID`),
CONSTRAINT `FK_Users_ImgAlbums` FOREIGN KEY (`UserId`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imgalbums`
--

LOCK TABLES `imgalbums` WRITE;
/*!40000 ALTER TABLE `imgalbums` DISABLE KEYS */;
INSERT INTO `imgalbums` VALUES (1,1,2,'my bold cat',1,'The pictures of my bold cat'),(2,1,3,'my dog Rex',1,'The pictures of my brave dog Rex, saving a human life'),(3,2,2,'Pesho`s birthday',1,'The pictures of the drunken friends of Pesho');
/*!40000 ALTER TABLE `imgalbums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Pass` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `gallery`.`users` (`ID`, `UserName`, `Pass`) VALUES ('1', 'pesho', 'ppass');
INSERT INTO `gallery`.`users` (`ID`, `UserName`, `Pass`) VALUES ('2', 'gosho', 'gpass');
INSERT INTO `gallery`.`users` (`ID`, `UserName`, `Pass`) VALUES ('3', 'misho', 'mpass');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `VoteValue` tinyint(4) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ImgId` int(11) NOT NULL,
  `VoteDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `FK_Votes_Users` (`UserId`),
  KEY `FK_Votes_Images` (`ImgId`),
  CONSTRAINT `FK_Votes_Images` FOREIGN KEY (`ImgId`) REFERENCES `images` (`ID`),
  CONSTRAINT `FK_Votes_Users` FOREIGN KEY (`UserId`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-27 21:28:25
