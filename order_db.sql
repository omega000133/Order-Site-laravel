/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - regene_naritaps
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`regene_naritaps` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `regene_naritaps`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2014_10_12_100000_create_password_resets_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2019_12_14_000001_create_personal_access_tokens_table',1),
(6,'2024_03_07_162236_create_orders_table',2);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1631 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`email`,`order_date`,`created_at`,`updated_at`) values 
(1442,'everybodycando123@gmail.com','2024-04-01','2024-03-08 16:49:24','2024-03-08 16:49:24'),
(1443,'everybodycando123@gmail.com','2024-04-02','2024-03-08 16:49:24','2024-03-08 16:49:24'),
(1444,'everybodycando123@gmail.com','2024-04-03','2024-03-08 16:49:24','2024-03-08 16:49:24'),
(1445,'everybodycando123@gmail.com','2024-04-04','2024-03-08 16:49:24','2024-03-08 16:49:24'),
(1446,'everybodycando123@gmail.com','2024-04-05','2024-03-08 16:49:24','2024-03-08 16:49:24'),
(1447,'everybodycando123@gmail.com','2024-04-06','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1448,'everybodycando123@gmail.com','2024-04-07','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1449,'everybodycando123@gmail.com','2024-04-08','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1450,'everybodycando123@gmail.com','2024-04-09','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1451,'everybodycando123@gmail.com','2024-04-10','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1452,'everybodycando123@gmail.com','2024-04-11','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1453,'everybodycando123@gmail.com','2024-04-12','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1454,'everybodycando123@gmail.com','2024-04-13','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1455,'everybodycando123@gmail.com','2024-04-14','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1456,'everybodycando123@gmail.com','2024-04-15','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1457,'everybodycando123@gmail.com','2024-04-16','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1458,'everybodycando123@gmail.com','2024-04-17','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1459,'everybodycando123@gmail.com','2024-04-18','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1460,'everybodycando123@gmail.com','2024-04-19','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1461,'everybodycando123@gmail.com','2024-04-20','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1462,'everybodycando123@gmail.com','2024-04-21','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1463,'everybodycando123@gmail.com','2024-04-22','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1464,'everybodycando123@gmail.com','2024-04-23','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1465,'everybodycando123@gmail.com','2024-04-24','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1466,'everybodycando123@gmail.com','2024-04-25','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1467,'everybodycando123@gmail.com','2024-04-26','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1468,'everybodycando123@gmail.com','2024-04-27','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1469,'everybodycando123@gmail.com','2024-04-28','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1470,'everybodycando123@gmail.com','2024-04-29','2024-03-08 16:49:25','2024-03-08 16:49:25'),
(1471,'everybodycando123@gmail.com','2024-04-30','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1472,'everybodycando123@gmail.com','2024-05-01','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1473,'everybodycando123@gmail.com','2024-05-02','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1474,'everybodycando123@gmail.com','2024-05-03','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1475,'everybodycando123@gmail.com','2024-05-04','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1476,'everybodycando123@gmail.com','2024-05-05','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1477,'everybodycando123@gmail.com','2024-05-06','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1478,'everybodycando123@gmail.com','2024-05-07','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1479,'everybodycando123@gmail.com','2024-05-08','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1480,'everybodycando123@gmail.com','2024-05-09','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1481,'everybodycando123@gmail.com','2024-05-10','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1482,'everybodycando123@gmail.com','2024-05-11','2024-03-08 16:49:26','2024-03-08 16:49:26'),
(1483,'everybodycando123@gmail.com','2024-05-12','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1484,'everybodycando123@gmail.com','2024-05-13','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1485,'everybodycando123@gmail.com','2024-05-14','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1486,'everybodycando123@gmail.com','2024-05-15','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1487,'everybodycando123@gmail.com','2024-05-16','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1488,'everybodycando123@gmail.com','2024-05-17','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1489,'everybodycando123@gmail.com','2024-05-18','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1490,'everybodycando123@gmail.com','2024-05-19','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1491,'everybodycando123@gmail.com','2024-05-20','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1492,'everybodycando123@gmail.com','2024-05-21','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1493,'everybodycando123@gmail.com','2024-05-22','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1494,'everybodycando123@gmail.com','2024-05-23','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1495,'everybodycando123@gmail.com','2024-05-24','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1496,'everybodycando123@gmail.com','2024-05-25','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1497,'everybodycando123@gmail.com','2024-05-26','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1498,'everybodycando123@gmail.com','2024-05-27','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1499,'everybodycando123@gmail.com','2024-05-28','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1500,'everybodycando123@gmail.com','2024-05-29','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1501,'everybodycando123@gmail.com','2024-05-30','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1502,'everybodycando123@gmail.com','2024-05-31','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1503,'everybodycando123@gmail.com','2024-06-01','2024-03-08 16:49:27','2024-03-08 16:49:27'),
(1504,'everybodycando123@gmail.com','2024-06-02','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1505,'everybodycando123@gmail.com','2024-06-03','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1506,'everybodycando123@gmail.com','2024-06-04','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1507,'everybodycando123@gmail.com','2024-06-05','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1508,'everybodycando123@gmail.com','2024-06-06','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1509,'everybodycando123@gmail.com','2024-06-07','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1510,'everybodycando123@gmail.com','2024-06-08','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1511,'everybodycando123@gmail.com','2024-06-09','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1512,'everybodycando123@gmail.com','2024-06-10','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1513,'everybodycando123@gmail.com','2024-06-11','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1514,'everybodycando123@gmail.com','2024-06-12','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1515,'everybodycando123@gmail.com','2024-06-13','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1516,'everybodycando123@gmail.com','2024-06-14','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1517,'everybodycando123@gmail.com','2024-06-15','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1518,'everybodycando123@gmail.com','2024-06-16','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1519,'everybodycando123@gmail.com','2024-06-17','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1520,'everybodycando123@gmail.com','2024-06-18','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1521,'everybodycando123@gmail.com','2024-06-19','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1522,'everybodycando123@gmail.com','2024-06-20','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1523,'everybodycando123@gmail.com','2024-06-21','2024-03-08 16:49:28','2024-03-08 16:49:28'),
(1524,'everybodycando123@gmail.com','2024-06-22','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1525,'everybodycando123@gmail.com','2024-06-23','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1526,'everybodycando123@gmail.com','2024-06-24','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1527,'everybodycando123@gmail.com','2024-06-25','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1528,'everybodycando123@gmail.com','2024-06-26','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1529,'everybodycando123@gmail.com','2024-06-27','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1530,'everybodycando123@gmail.com','2024-06-28','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1531,'everybodycando123@gmail.com','2024-06-29','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1532,'everybodycando123@gmail.com','2024-06-30','2024-03-08 16:49:29','2024-03-08 16:49:29'),
(1571,'fantastic.dev0106@gmail.com','2024-04-01','2024-03-10 05:46:29','2024-03-10 05:46:29'),
(1572,'fantastic.dev0106@gmail.com','2024-04-08','2024-03-10 05:46:29','2024-03-10 05:46:29'),
(1573,'fantastic.dev0106@gmail.com','2024-04-15','2024-03-10 05:46:29','2024-03-10 05:46:29'),
(1574,'fantastic.dev0106@gmail.com','2024-04-22','2024-03-10 05:46:29','2024-03-10 05:46:29'),
(1575,'fantastic.dev0106@gmail.com','2024-04-29','2024-03-10 05:46:29','2024-03-10 05:46:29'),
(1576,'fantastic.dev0106@gmail.com','2024-04-02','2024-03-10 05:46:29','2024-03-10 05:46:29'),
(1577,'fantastic.dev0106@gmail.com','2024-04-09','2024-03-10 05:46:29','2024-03-10 05:46:29'),
(1578,'fantastic.dev0106@gmail.com','2024-04-16','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1579,'fantastic.dev0106@gmail.com','2024-04-23','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1580,'fantastic.dev0106@gmail.com','2024-04-30','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1581,'fantastic.dev0106@gmail.com','2024-04-03','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1582,'fantastic.dev0106@gmail.com','2024-04-10','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1583,'fantastic.dev0106@gmail.com','2024-04-17','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1584,'fantastic.dev0106@gmail.com','2024-04-24','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1585,'fantastic.dev0106@gmail.com','2024-05-01','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1586,'fantastic.dev0106@gmail.com','2024-05-08','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1587,'fantastic.dev0106@gmail.com','2024-05-15','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1588,'fantastic.dev0106@gmail.com','2024-05-22','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1589,'fantastic.dev0106@gmail.com','2024-05-29','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1590,'fantastic.dev0106@gmail.com','2024-05-02','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1591,'fantastic.dev0106@gmail.com','2024-05-09','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1592,'fantastic.dev0106@gmail.com','2024-05-16','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1593,'fantastic.dev0106@gmail.com','2024-05-23','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1594,'fantastic.dev0106@gmail.com','2024-05-30','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1595,'fantastic.dev0106@gmail.com','2024-04-25','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1596,'fantastic.dev0106@gmail.com','2024-04-18','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1597,'fantastic.dev0106@gmail.com','2024-04-11','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1598,'fantastic.dev0106@gmail.com','2024-04-04','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1599,'fantastic.dev0106@gmail.com','2024-04-05','2024-03-10 05:46:30','2024-03-10 05:46:30'),
(1600,'fantastic.dev0106@gmail.com','2024-04-12','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1601,'fantastic.dev0106@gmail.com','2024-04-01','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1602,'fantastic.dev0106@gmail.com','2024-04-02','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1603,'fantastic.dev0106@gmail.com','2024-04-03','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1604,'fantastic.dev0106@gmail.com','2024-04-04','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1605,'fantastic.dev0106@gmail.com','2024-04-05','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1606,'fantastic.dev0106@gmail.com','2024-04-06','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1607,'fantastic.dev0106@gmail.com','2024-04-07','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1608,'fantastic.dev0106@gmail.com','2024-04-08','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1609,'fantastic.dev0106@gmail.com','2024-04-09','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1610,'fantastic.dev0106@gmail.com','2024-04-10','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1611,'fantastic.dev0106@gmail.com','2024-04-11','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1612,'fantastic.dev0106@gmail.com','2024-04-12','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1613,'fantastic.dev0106@gmail.com','2024-04-13','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1614,'fantastic.dev0106@gmail.com','2024-04-14','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1615,'fantastic.dev0106@gmail.com','2024-04-15','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1616,'fantastic.dev0106@gmail.com','2024-04-16','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1617,'fantastic.dev0106@gmail.com','2024-04-17','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1618,'fantastic.dev0106@gmail.com','2024-04-18','2024-03-10 05:46:31','2024-03-10 05:46:31'),
(1619,'fantastic.dev0106@gmail.com','2024-04-19','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1620,'fantastic.dev0106@gmail.com','2024-04-20','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1621,'fantastic.dev0106@gmail.com','2024-04-21','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1622,'fantastic.dev0106@gmail.com','2024-04-22','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1623,'fantastic.dev0106@gmail.com','2024-04-23','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1624,'fantastic.dev0106@gmail.com','2024-04-24','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1625,'fantastic.dev0106@gmail.com','2024-04-25','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1626,'fantastic.dev0106@gmail.com','2024-04-26','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1627,'fantastic.dev0106@gmail.com','2024-04-27','2024-03-10 05:46:32','2024-03-10 05:46:32'),
(1628,'fantastic.dev0106@gmail.com','2024-04-28','2024-03-10 05:46:33','2024-03-10 05:46:33'),
(1629,'fantastic.dev0106@gmail.com','2024-04-29','2024-03-10 05:46:33','2024-03-10 05:46:33'),
(1630,'fantastic.dev0106@gmail.com','2024-04-30','2024-03-10 05:46:33','2024-03-10 05:46:33');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `c_name1` varchar(255) NOT NULL,
  `c_name2` varchar(255) NOT NULL,
  `c_grade` int(11) NOT NULL,
  `p_name1` varchar(255) NOT NULL,
  `p_name2` varchar(255) NOT NULL,
  `p_phone` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `prefecture` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `card` varchar(255) NOT NULL,
  `role` int(5) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`c_name1`,`c_name2`,`c_grade`,`p_name1`,`p_name2`,`p_phone`,`postcode`,`prefecture`,`address`,`building`,`card`,`role`,`remember_token`,`created_at`,`updated_at`) values 
(1,'admin@gmail.com','$2y$10$rqom66jeUMC8jW9DUd96R.zkro1ulW127Xw.iPyCJY77JhIDATgWu','','',0,'','','','','','','','',1,NULL,NULL,NULL),
(2,'everybodycando123@gmail.com','$2y$12$HDZITGIxLUIqmozNzombI.vUKnfU7dN8237UxE/mqUqnCVr.rvWVy','aaa','aaa',1,'aaa','aaa','111-1111-1110','11111','青森県','aaaaa','aa1','11111111',2,NULL,'2024-03-08 23:58:25','2024-03-08 16:17:55'),
(3,'fantastic.dev0106@gmail.com','$2y$12$578pnqG.pgpef3706UZIDuyIN8OQnjhn.5UUDPjAvqNNWdsGBH//e','bbb','bbbb',2,'bbbb','bbbb','222-2222-2222','22222','宮城県','bbbbb','bb1','22222222',2,NULL,'2024-03-08 23:59:26','2024-03-08 23:59:29');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
