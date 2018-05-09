-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: Used_Cars
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1-log

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
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owner` (
  `user` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `com` float DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner`
--

LOCK TABLES `owner` WRITE;
/*!40000 ALTER TABLE `owner` DISABLE KEYS */;
INSERT INTO `owner` VALUES ('testOwner','Billy','Johnson','1234567890',0.15);
/*!40000 ALTER TABLE `owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reps`
--

DROP TABLE IF EXISTS `reps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reps` (
  `user` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `com` float DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reps`
--

LOCK TABLES `reps` WRITE;
/*!40000 ALTER TABLE `reps` DISABLE KEYS */;
INSERT INTO `reps` VALUES ('kd','Khari','Davis',1234567890,0.19),('kdavis','Khari','Davis',12345,0.12),('khari','k','d',123,0.12),('test','test','test',1234,0.12),('test123','1','1',1,1),('testRep','Kyle','Burnstein',1234555555,0.23);
/*!40000 ALTER TABLE `reps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `vin` varchar(255) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`vin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES ('2','testRep','2018-02-13'),('30498','testRep','2018-04-05'),('32984','kdavis','2018-03-12'),('4','testRep','2018-03-06'),('43989','kdavis','2018-03-27'),('5','testRep','2016-07-13');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sold`
--

DROP TABLE IF EXISTS `sold`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sold` (
  `vin` varchar(255) NOT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `miles` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `trans` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`vin`),
  CONSTRAINT `sold_ibfk_1` FOREIGN KEY (`vin`) REFERENCES `vehicle` (`vin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sold`
--

LOCK TABLES `sold` WRITE;
/*!40000 ALTER TABLE `sold` DISABLE KEYS */;
INSERT INTO `sold` VALUES ('2','Ford','Focus',2002,160000,'Coupe','Blue','Manual',2500),('30498','Toyota','Prius',2007,34000,'Sedan','Orange','Automatic',13000),('32984','Hummer','H2',2005,56000,'SUV','Yellow','Manual',23),('4','Jeep','Cherokee',2013,66000,'SUV','Yellow','Manual',13000),('43989','Audi','A3',2008,89332,'Coupe','Silver','Manual',9000),('49548','Honda','Odyssey',2013,87000,'SUV','Blue','Automatic',8000),('5','Honda','Accord',2003,189000,'Coupe','Red','Manual',3000);
/*!40000 ALTER TABLE `sold` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unsold`
--

DROP TABLE IF EXISTS `unsold`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unsold` (
  `vin` varchar(255) NOT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `miles` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `trans` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`vin`),
  CONSTRAINT `unsold_ibfk_1` FOREIGN KEY (`vin`) REFERENCES `vehicle` (`vin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unsold`
--

LOCK TABLES `unsold` WRITE;
/*!40000 ALTER TABLE `unsold` DISABLE KEYS */;
INSERT INTO `unsold` VALUES ('1','Honda','Civic',2005,170000,'Sedan','Silver','Automatic',3000),('1001','Chrysler','Sebring',2007,65300,'Coupe','Red','Manual',4500),('3','Tesla','Model S',2015,56000,'Sedan','Black','N/A',25000);
/*!40000 ALTER TABLE `unsold` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('kd','$2y$10$n6MQl2G82NCJikbzPrH6tOstwWPGWOT.FmqJ8q9kDAARP8XOb4rE.'),('kdavis','$2y$10$TY95yloFCOjoP19Nd7Hoe.7HJVwTrXSMgKioUIbTyy10Mi3NcvyAi'),('khari','$2y$10$uYf.X5kD.AXHiqpPpepUGOSbjlfxD2UZJUDCgp8NsJEHaYCpouROS'),('test','$2y$10$xQatL5WGeh0wo2s3GXPbnOPe3v55gIDwhincv9XdLAmyAsPK/6cLS'),('test123','$2y$10$qd0szVkGlqe1YRTFxNh09uSGIFiz.Z7NKUXr4cyrsyPX0fWUmBa.G'),('testOwner','$2y$10$F1fO1j.e6ahGQqUKKAx6LOmuuq83OR03dy2hf3MzsJjA1Hht6Z4Cm'),('testRep','$2y$10$Pcr9mGa79sFqPOYVic1DFuvOiQakZukBzik1eKwCLxUpJGSIq9Ih2');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle` (
  `vin` varchar(255) NOT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `miles` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `trans` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`vin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES ('1','Honda','Civic',2005,170000,'Sedan','Silver','Automatic',3000),('1001','Chrysler','Sebring',2007,65300,'Coupe','Red','Manual',4500),('2','Ford','Focus',2002,160000,'Coupe','Blue','Manual',2500),('3','Tesla','Model S',2015,56000,'Sedan','Black','N/A',25000),('30498','Toyota','Prius',2007,34000,'Sedan','Orange','Automatic',13000),('32984','Hummer','H2',2005,56000,'SUV','Yellow','Manual',23),('4','Jeep','Cherokee',2013,66000,'SUV','Yellow','Manual',13000),('43989','Audi','A3',2008,89332,'Coupe','Silver','Manual',9000),('49548','Honda','Odyssey',2013,87000,'SUV','Blue','Automatic',8000),('5','Honda','Accord',2003,189000,'Coupe','Red','Manual',3000);
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-09 19:46:18
