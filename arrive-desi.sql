/*
SQLyog Ultimate v13.1.1 (32 bit)
MySQL - 10.4.20-MariaDB : Database - arrive-desi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`arrive-desi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `arrive-desi`;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ci_sessions` */

insert  into `ci_sessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('tk019ilnqg54jas2ob985b14sb8min2v','::1',1696271381,'__ci_last_regenerate|i:1696271381;'),
('eskde5f8jh87ot07cu9k6l60h6rlu2jl','::1',1696271717,'__ci_last_regenerate|i:1696271717;'),
('b46nku7n9tdgs1vqiauu0dp5r216brli','::1',1696272024,'__ci_last_regenerate|i:1696272024;'),
('ift0e3b6bhk403eq9ef1460jstbh278o','::1',1696272339,'__ci_last_regenerate|i:1696272339;'),
('kftakbgqcgu0eeet6dte9guknl5tl8gh','::1',1696272849,'__ci_last_regenerate|i:1696272849;'),
('mphhbdk01613t0g127ah2a5aqt1hrci8','::1',1696273463,'__ci_last_regenerate|i:1696273463;'),
('67a169pgispvjqemm1o4s10ph3l2v1t7','::1',1696273841,'__ci_last_regenerate|i:1696273841;'),
('hfggimm5gnmobride0pkcbhj5m6gf2vu','::1',1696274145,'__ci_last_regenerate|i:1696274145;'),
('v7lhl3lginkquf9n53v4fq292eubd0hq','::1',1696274462,'__ci_last_regenerate|i:1696274462;'),
('cc9ca2s0ublvp1c92ja2lqc2eqr7ot0t','::1',1696274835,'__ci_last_regenerate|i:1696274835;'),
('ahuj114hfsnhsib8vn1pb9vb50eg3tl9','::1',1696274835,'__ci_last_regenerate|i:1696274835;');

/*Table structure for table `colleges` */

DROP TABLE IF EXISTS `colleges`;

CREATE TABLE `colleges` (
  `collegeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `status` tinyint(3) DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp(),
  `deletedAt` datetime DEFAULT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `deletedBy` int(11) DEFAULT NULL,
  PRIMARY KEY (`collegeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `colleges` */

insert  into `colleges`(`collegeId`,`name`,`status`,`createdAt`,`updatedAt`,`deletedAt`,`createdBy`,`updatedBy`,`deletedBy`) values 
(1,'College 1',1,'2023-10-03 00:27:26','2023-10-03 00:27:26',NULL,1,1,NULL),
(2,'College 2',1,'2023-10-03 00:27:32','2023-10-03 00:27:32',NULL,1,1,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
