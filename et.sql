-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: et
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
-- Table structure for table `truck`
--

DROP TABLE IF EXISTS `truck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `number_plate` varchar(16) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `type` varchar(32) DEFAULT NULL,
  `capacity` varchar(32) DEFAULT NULL,
  `model` varchar(32) DEFAULT NULL,
  `photo` varchar(32) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number_plate` (`number_plate`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck`
--

LOCK TABLES `truck` WRITE;
/*!40000 ALTER TABLE `truck` DISABLE KEYS */;
INSERT INTO `truck` VALUES (1,'KAQ 123R','FUSO','Wide Load','15','FAW 116T','Tulips.jpg',1,'2017-12-16 16:08:34'),(3,'KBX 342C','Actross 711','Ac711','850 Kg','SSX','Screenshot_2017-09-19-18-31-24-6',1,'2017-12-17 15:09:42'),(4,'XGK','Landrover','4 Wheel','200Kg','Toyota Landrover','15135236213674.png',1,'2017-12-17 15:13:41'),(5,'ZB 342C','Fuso ','Double Axel','21 tons','-','15136064974016.jpg',4,'2017-12-18 14:14:57');
/*!40000 ALTER TABLE `truck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_admin`
--

DROP TABLE IF EXISTS `truck_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_admin` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `full_name` varchar(40) DEFAULT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_admin`
--

LOCK TABLES `truck_admin` WRITE;
/*!40000 ALTER TABLE `truck_admin` DISABLE KEYS */;
INSERT INTO `truck_admin` VALUES (1,7,'James Ndegwa','112, Race Course - Nakuru','james@gmail.com','15137589099622.png','2017-12-20 08:35:09');
/*!40000 ALTER TABLE `truck_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_booking`
--

DROP TABLE IF EXISTS `truck_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_booking` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `booking_id` int(9) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cust_id` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `duplicate_booking_detected` (`booking_id`,`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_booking`
--

LOCK TABLES `truck_booking` WRITE;
/*!40000 ALTER TABLE `truck_booking` DISABLE KEYS */;
INSERT INTO `truck_booking` VALUES (1,3,'2017-12-22 16:00:08',5),(3,7,'2017-12-22 20:47:41',1),(4,3,'2017-12-24 10:06:54',1);
/*!40000 ALTER TABLE `truck_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_creator`
--

DROP TABLE IF EXISTS `truck_creator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_creator` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `full_name` varchar(40) DEFAULT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_creator`
--

LOCK TABLES `truck_creator` WRITE;
/*!40000 ALTER TABLE `truck_creator` DISABLE KEYS */;
/*!40000 ALTER TABLE `truck_creator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_customer`
--

DROP TABLE IF EXISTS `truck_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_customer` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `full_name` varchar(40) DEFAULT NULL,
  `id_no` varchar(16) DEFAULT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_customer`
--

LOCK TABLES `truck_customer` WRITE;
/*!40000 ALTER TABLE `truck_customer` DISABLE KEYS */;
INSERT INTO `truck_customer` VALUES (1,3,'Hannah Karanu','2589632','12 Bumala','jkaranu@gmail.com','','2017-12-17 09:51:07');
/*!40000 ALTER TABLE `truck_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_driver`
--

DROP TABLE IF EXISTS `truck_driver`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_driver` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `full_name` varchar(40) DEFAULT NULL,
  `id_no` varchar(32) DEFAULT NULL,
  `license_no` varchar(32) DEFAULT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_driver`
--

LOCK TABLES `truck_driver` WRITE;
/*!40000 ALTER TABLE `truck_driver` DISABLE KEYS */;
INSERT INTO `truck_driver` VALUES (1,2,'Felix Kimtai','28252634','25897/2017','P.O. Box 27 Langalanga, Nakuru','kimtai@gmail.com','','2017-12-17 07:43:34'),(2,5,'Jacs Mwenyewe','2425896','4616551','145, Pasaka','jacs@gmail.com','15136070391533.jpg','2017-12-18 14:23:59');
/*!40000 ALTER TABLE `truck_driver` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_driving`
--

DROP TABLE IF EXISTS `truck_driving`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_driving` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `driver_id` int(9) DEFAULT NULL,
  `truck_id` int(9) DEFAULT NULL,
  `truck_owner_id` int(9) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `truck_driver_duplication` (`truck_id`,`driver_id`),
  KEY `truck_driver_ref` (`driver_id`),
  CONSTRAINT `truck_driving_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `truck_driver` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `truck_driving_ibfk_2` FOREIGN KEY (`truck_id`) REFERENCES `truck` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_driving`
--

LOCK TABLES `truck_driving` WRITE;
/*!40000 ALTER TABLE `truck_driving` DISABLE KEYS */;
INSERT INTO `truck_driving` VALUES (6,2,1,1,'2017-12-17 14:58:39',1),(14,2,4,1,'2017-12-17 15:51:38',1),(23,5,1,1,'2017-12-18 17:37:24',1),(24,5,5,4,'2017-12-22 13:54:22',1);
/*!40000 ALTER TABLE `truck_driving` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_inbox`
--

DROP TABLE IF EXISTS `truck_inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_inbox` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `msgfrom` int(9) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `msgto` int(9) DEFAULT NULL,
  `message` text,
  `status` varchar(2) DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_inbox`
--

LOCK TABLES `truck_inbox` WRITE;
/*!40000 ALTER TABLE `truck_inbox` DISABLE KEYS */;
INSERT INTO `truck_inbox` VALUES (1,2,'--truck assignment detail--',1,'Name : Felix Kimtai','0','2017-12-17 12:01:06'),(2,2,'>>truck driver assignment',1,'Name : Felix Kimtai\r\n Vehicle : KBY 112A Volvo \r\n Tel:765560465','0','2017-12-17 12:52:09'),(3,1,'>>truck driver assignment',2,'Name : \r\n Vehicle : KAQ 123R FUSO \r\n Tel:726939482','0','2017-12-17 14:58:39'),(4,1,'>>truck driver assignment',2,'Name : \r\n Vehicle : XGK Landrover \r\n Tel:726939482','0','2017-12-17 15:51:38'),(5,4,'>>truck driver assignment',5,'Name : \r\n Vehicle : ZB 342C Fuso  \r\n Tel:728884737','0','2017-12-18 14:24:29'),(6,4,'>>truck driver assignment',5,'Name : \r\n Vehicle : ZB 342C Fuso  \r\n Tel:728884737','0','2017-12-18 14:26:47'),(7,4,'>>truck driver assignment',5,'Name : \r\n Vehicle : ZB 342C Fuso  \r\n Tel:728884737','0','2017-12-18 14:28:56'),(8,5,'>>truck driver assignment',1,'Name : Jacs Mwenyewe\r\n Vehicle : KAQ 123R FUSO \r\n Tel:700616145','0','2017-12-18 17:37:24'),(9,4,'>>truck driver assignment',5,'Name : Jacs Mwenyewe\r\n Vehicle : ZB 342C Fuso  \r\n Tel:728884737','0','2017-12-22 13:54:22'),(10,4,'>>truck driver assignment',2,'Name : Felix Kimtai\r\n Vehicle : ZB 342C Fuso  \r\n Tel:728884737','0','2017-12-22 13:54:57'),(11,1,'>>eTrip Notification',0,'\nDispatch success\nPlease check your request schedule.','0','2018-01-02 21:47:08'),(12,1,'>>eTrip Notification',0,'\nDispatch success\nPlease check your request schedule.','0','2018-01-02 21:48:40'),(13,1,'>>eTrip Notification',3,'\nDispatch success\nPlease check your request schedule.','0','2018-01-02 21:48:57');
/*!40000 ALTER TABLE `truck_inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_owner`
--

DROP TABLE IF EXISTS `truck_owner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_owner` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `full_name` varchar(40) DEFAULT NULL,
  `regno` varchar(32) DEFAULT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `photo` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_owner`
--

LOCK TABLES `truck_owner` WRITE;
/*!40000 ALTER TABLE `truck_owner` DISABLE KEYS */;
INSERT INTO `truck_owner` VALUES (1,1,'Benard Gg','ndk-5245632589','1000 Street, Oyugis- Kenya','fourty400@gmail.com','Lighthouse.jpg','2017-12-16 15:45:13'),(2,4,'Akily Creative ','AKC236-1','Box 71, Nakuru','akc@gmail.com','15136064397235.jpg','2017-12-18 14:13:59');
/*!40000 ALTER TABLE `truck_owner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_request`
--

DROP TABLE IF EXISTS `truck_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_request` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `customer_id` int(9) DEFAULT NULL,
  `truck_type` int(9) DEFAULT NULL,
  `status` int(3) DEFAULT '0',
  `fleet_owner_id` int(9) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `transit_date` varchar(32) DEFAULT NULL,
  `load_capacity` int(9) DEFAULT NULL,
  `purpose` text,
  `town_from` int(9) DEFAULT NULL,
  `town_to` int(9) DEFAULT NULL,
  `truck_id` int(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `duplicate_request` (`customer_id`,`transit_date`,`status`,`truck_type`,`town_from`,`town_to`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_request`
--

LOCK TABLES `truck_request` WRITE;
/*!40000 ALTER TABLE `truck_request` DISABLE KEYS */;
INSERT INTO `truck_request` VALUES (1,1,NULL,1,1,'2018-01-02 21:14:49','2017-12-30',515,'15615',NULL,NULL,1),(4,1,NULL,0,NULL,'2018-01-02 21:14:34','2017-12-30',234,'pasdnjsd',NULL,NULL,NULL),(6,3,2,1,1,'2018-01-02 21:47:08','2018-01-11',112,'ferrying books',1,4,1);
/*!40000 ALTER TABLE `truck_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_schedule`
--

DROP TABLE IF EXISTS `truck_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_schedule` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `town_from` int(9) DEFAULT NULL,
  `truck_id` int(9) DEFAULT NULL,
  `town_to` int(9) DEFAULT NULL,
  `dep_time` varchar(32) DEFAULT NULL,
  `eta` int(9) DEFAULT NULL,
  `transit_date` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `truck_already_assigned_route` (`truck_id`,`town_from`,`town_to`,`transit_date`),
  UNIQUE KEY `truck_destination_error` (`truck_id`,`town_from`,`town_to`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_schedule`
--

LOCK TABLES `truck_schedule` WRITE;
/*!40000 ALTER TABLE `truck_schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `truck_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_schedule_old`
--

DROP TABLE IF EXISTS `truck_schedule_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_schedule_old` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `town_from` int(9) DEFAULT NULL,
  `truck_id` int(9) DEFAULT NULL,
  `town_to` int(9) DEFAULT NULL,
  `dep_time` varchar(32) DEFAULT NULL,
  `eta` int(9) DEFAULT NULL,
  `transit_date` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `truck_already_assigned_route` (`truck_id`,`town_from`,`town_to`,`transit_date`),
  UNIQUE KEY `truck_destination_error` (`truck_id`,`town_from`,`town_to`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_schedule_old`
--

LOCK TABLES `truck_schedule_old` WRITE;
/*!40000 ALTER TABLE `truck_schedule_old` DISABLE KEYS */;
INSERT INTO `truck_schedule_old` VALUES (7,6,4,3,'13:01',2,'2017-12-27','2017-12-22 20:44:59'),(10,1,4,6,'16:00',6,'2017-12-25','2017-12-24 11:07:02');
/*!40000 ALTER TABLE `truck_schedule_old` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `dest_error` BEFORE INSERT ON `truck_schedule_old`
 FOR EACH ROW BEGIN
if NEW.town_from = NEW.town_to then
SIGNAL SQLSTATE "45000" SET MESSAGE_TEXT = "Destination Error";
end if;
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `truck_shipment`
--

DROP TABLE IF EXISTS `truck_shipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_shipment` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `customer_id` int(9) DEFAULT NULL,
  `driver_id` int(9) DEFAULT NULL,
  `truck_id` int(9) DEFAULT NULL,
  `transit_date` varchar(32) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `notes` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_shipment`
--

LOCK TABLES `truck_shipment` WRITE;
/*!40000 ALTER TABLE `truck_shipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `truck_shipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_sub`
--

DROP TABLE IF EXISTS `truck_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_sub` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `sub_month` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_sub`
--

LOCK TABLES `truck_sub` WRITE;
/*!40000 ALTER TABLE `truck_sub` DISABLE KEYS */;
INSERT INTO `truck_sub` VALUES (1,1,'2017-12-22 12:23:44',1),(2,4,'2017-12-22 12:30:38',0),(3,5,'2017-12-22 12:47:40',1),(4,3,'2017-12-22 12:51:04',0);
/*!40000 ALTER TABLE `truck_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_towns`
--

DROP TABLE IF EXISTS `truck_towns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_towns` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `town` varchar(32) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_towns`
--

LOCK TABLES `truck_towns` WRITE;
/*!40000 ALTER TABLE `truck_towns` DISABLE KEYS */;
INSERT INTO `truck_towns` VALUES (1,'Busia','2017-12-18 08:17:09'),(2,'Bungoma','2017-12-18 08:17:14'),(3,'Mombasa','2017-12-18 08:17:20'),(4,'Malindi','2017-12-18 08:17:25'),(5,'Kisumu','2017-12-18 08:17:49'),(6,'Malaba','2017-12-22 15:49:41');
/*!40000 ALTER TABLE `truck_towns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_types`
--

DROP TABLE IF EXISTS `truck_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_types` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `names` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_types`
--

LOCK TABLES `truck_types` WRITE;
/*!40000 ALTER TABLE `truck_types` DISABLE KEYS */;
INSERT INTO `truck_types` VALUES (1,'heavy load'),(2,'light carriage');
/*!40000 ALTER TABLE `truck_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truck_users`
--

DROP TABLE IF EXISTS `truck_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truck_users` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `tel` int(9) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usertype` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tel` (`tel`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truck_users`
--

LOCK TABLES `truck_users` WRITE;
/*!40000 ALTER TABLE `truck_users` DISABLE KEYS */;
INSERT INTO `truck_users` VALUES (1,726939482,'$2y$10$LtOH6xke3EMNRGeNwLbIm.EGJuhTAe935V14xnxL6JyqfrEZ0KmGa','2017-12-16 14:40:55',1),(2,765560465,'$2y$10$KukJkRdL6sMdMvIiZO0yr.SvhxpPuVifsZ1D3je93FNd3N9EosyGK','2017-12-17 07:03:02',2),(3,775372444,'$2y$10$LtOH6xke3EMNRGeNwLbIm.EGJuhTAe935V14xnxL6JyqfrEZ0KmGa','2017-12-17 09:46:34',3),(4,728884737,'$2y$10$.XaofoK7y9HgP219AZJCEeia9Hmz09QBCTSJSaEcwzMykKZbaqTXe','2017-12-18 14:11:31',1),(5,700616145,'$2y$10$R1J3894fqS3244NwATL7t.sFDU6TiwH9QiyCYga8Bv9DKwa2FeKuO','2017-12-18 14:23:08',2),(6,726939393,'$2y$10$LtOH6xke3EMNRGeNwLbIm.EGJuhTAe935V14xnxL6JyqfrEZ0KmGa','2017-12-20 06:27:46',5),(7,726949494,'$2y$10$LtOH6xke3EMNRGeNwLbIm.EGJuhTAe935V14xnxL6JyqfrEZ0KmGa','2017-12-20 06:30:18',4);
/*!40000 ALTER TABLE `truck_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-02 23:05:27
