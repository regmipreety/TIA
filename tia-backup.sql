/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.6.19 : Database - tia
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tia` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tia`;

/*Table structure for table `add_bay` */

DROP TABLE IF EXISTS `add_bay`;

CREATE TABLE `add_bay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bay_no` varchar(10) NOT NULL,
  `flight_type` enum('1','2') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `add_bay` */

insert  into `add_bay`(`id`,`bay_no`,`flight_type`,`created_at`,`updated_at`) values (1,'Bay 1','1','2019-03-28 10:22:56','2019-03-28 10:22:56'),(2,'Bay 2','1','2019-03-28 10:23:24','2019-03-28 10:23:24'),(3,'Bay 3','2','2019-03-28 10:23:48','2019-03-28 10:23:48'),(4,'Bay 4','2','2019-03-28 10:24:12','2019-03-28 10:24:12'),(5,'Bay 5','2','2019-03-28 10:24:55','2019-03-28 10:24:55'),(6,'Bay 6','1','2019-03-28 10:25:06','2019-03-28 10:25:06'),(7,'Bay 7','1','2019-03-28 10:25:17','2019-03-28 10:25:17'),(8,'Bay 8','1','2019-03-28 10:25:30','2019-03-28 10:31:45'),(19,'Bay 9','1','2019-03-28 10:32:21','2019-03-28 10:32:21');

/*Table structure for table `bay` */

DROP TABLE IF EXISTS `bay`;

CREATE TABLE `bay` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bay_number` int(10) unsigned NOT NULL,
  `eta` time NOT NULL COMMENT 'arrival time',
  `etd` time NOT NULL COMMENT 'departure time',
  `flight_type` varchar(20) NOT NULL,
  `days` varchar(20) NOT NULL COMMENT 'operation days (1 for monday)',
  `operation_date` date NOT NULL COMMENT 'date of operation',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

/*Data for the table `bay` */

insert  into `bay`(`id`,`bay_number`,`eta`,`etd`,`flight_type`,`days`,`operation_date`,`created_at`,`updated_at`) values (1,1,'08:40:00','09:50:00','RA 240','6','2019-03-11','2019-03-14 11:51:57','2019-03-14 06:07:15'),(2,1,'10:20:00','11:50:00','QR 652','6','2019-03-11','2019-03-11 12:41:57','2019-03-11 06:07:51'),(4,2,'08:10:00','09:10:00','OMA 332','6','2019-03-11','2019-03-11 12:42:04','2019-03-11 06:20:01'),(5,2,'11:40:00','13:40:00','RA 412','6','2019-03-11','2019-03-11 12:42:19','2019-03-11 06:20:57'),(6,3,'08:50:00','09:50:00','H9 560','6','2019-03-11','2019-03-11 10:00:33','2019-03-11 10:00:33'),(7,1,'10:20:00','11:30:00','MA 525','7','2019-03-12','2019-03-11 10:33:37','2019-03-11 10:33:37'),(8,3,'08:40:00','09:40:00','A319','1,3,5,6,7','2019-03-17','2019-03-17 05:16:24','2019-03-17 05:16:24'),(9,1,'08:20:00','09:30:00','A319','2','2019-03-17','2019-03-17 05:27:43','2019-03-17 05:27:43'),(10,1,'17:45:00','18:45:00','A319','2','2019-03-17','2019-03-17 05:29:55','2019-03-17 05:29:55'),(11,2,'01:00:00','02:00:00','B738','2','2019-03-10','2019-03-17 05:31:30','2019-03-17 05:31:30'),(12,4,'21:00:00','22:00:00','B738','2','2019-03-17','2019-03-17 05:32:01','2019-03-17 05:32:01'),(13,2,'01:00:00','02:40:00','B738','2','2019-03-17','2019-03-17 05:33:34','2019-03-17 05:33:34'),(14,4,'04:10:00','05:20:00','B738','2','2019-03-11','2019-03-18 05:38:07','2019-03-18 05:38:07'),(15,5,'01:20:00','02:20:00','A319','2','2019-03-11','2019-03-18 15:09:23','2019-03-18 09:24:23'),(16,6,'03:30:00','04:20:00','A319','2','2019-03-11','2019-03-18 05:39:30','2019-03-18 05:39:30'),(17,7,'13:20:00','14:50:00','B738','2','2019-03-11','2019-03-18 05:40:05','2019-03-18 05:40:05'),(18,1,'05:40:00','06:40:00','A319','2','2019-03-18','2019-03-18 08:53:28','2019-03-18 08:53:28'),(19,7,'18:20:00','22:00:00','B738','2','2019-03-11','2019-03-18 09:26:54','2019-03-18 09:26:54'),(20,1,'08:50:00','09:50:00','H9 560','2','2019-03-26','2019-03-26 05:14:56','2019-03-26 05:14:56'),(21,1,'10:20:00','11:40:00','QR 652','2','2019-03-26','2019-03-26 05:15:40','2019-03-26 05:15:40'),(22,1,'12:20:00','13:30:00','TG 319','2','2019-03-26','2019-03-26 05:16:13','2019-03-26 05:16:13'),(23,1,'16:30:00','17:30:00','CES 2594','2','2019-03-26','2019-03-26 05:16:42','2019-03-26 05:16:42'),(24,1,'18:10:00','19:30:00','CZ 3067','2','2019-03-26','2019-03-26 05:17:10','2019-03-26 05:17:10'),(25,1,'20:00:00','20:50:00','RA 411','2','2019-03-26','2019-03-26 05:17:40','2019-03-26 05:17:40'),(26,2,'08:40:00','13:00:00','RA 240','2','2019-03-26','2019-03-26 05:18:19','2019-03-26 05:18:19'),(27,2,'15:10:00','15:50:00','BV 427','2','2019-03-26','2019-03-26 05:19:07','2019-03-26 05:19:07'),(28,2,'16:40:00','17:30:00','H9 679','2','2019-03-26','2019-03-26 05:19:48','2019-03-26 05:19:48'),(29,2,'17:50:00','20:50:00','Ra 218','2','2019-03-26','2019-03-26 05:20:19','2019-03-26 05:20:19'),(30,3,'06:00:00','08:10:00','9W 263','2','2019-03-26','2019-03-26 05:21:09','2019-03-26 05:21:09'),(31,3,'09:10:00','10:00:00','RA 230','2','2019-03-26','2019-03-26 05:21:59','2019-03-26 05:21:59'),(32,3,'10:30:00','11:50:00','TK 726','2','2019-03-26','2019-03-26 05:22:20','2019-03-26 05:22:20'),(33,3,'15:20:00','16:20:00','CES 758','2','2019-03-26','2019-03-26 05:22:43','2019-03-26 05:22:43'),(34,3,'18:10:00','19:30:00','KE 695','2','2019-03-26','2019-03-26 05:23:07','2019-03-26 05:23:07'),(35,3,'21:10:00','23:50:00','A319','2','2019-03-26','2019-03-26 11:16:25','2019-03-26 05:31:29'),(36,4,'08:20:00','09:20:00','QR 644','2','2019-03-26','2019-03-26 05:26:41','2019-03-26 05:26:41'),(37,4,'10:00:00','12:50:00','H9 564','2','2019-03-26','2019-03-26 05:27:03','2019-03-26 05:27:03'),(38,4,'14:00:00','15:00:00','SL 220','2','2019-03-26','2019-03-26 05:27:21','2019-03-26 05:27:21'),(39,4,'16:10:00','17:10:00','9W 268','2','2019-03-26','2019-03-26 05:27:44','2019-03-26 05:27:44'),(40,4,'18:10:00','19:10:00','MXD 181','2','2019-03-26','2019-03-26 05:28:10','2019-03-26 05:28:10'),(41,4,'19:40:00','20:40:00','OMA 335','2','2019-03-26','2019-03-26 05:28:32','2019-03-26 05:28:32'),(42,5,'08:20:00','09:00:00','RA 418','2','2019-03-26','2019-03-26 05:29:35','2019-03-26 05:29:35'),(43,5,'09:30:00','10:30:00','AIC 213','2','2019-03-26','2019-03-26 05:32:29','2019-03-26 05:32:29'),(44,5,'10:30:00','11:10:00','RA 401','2','2019-03-26','2019-03-26 05:33:01','2019-03-26 05:33:01'),(45,5,'11:50:00','12:50:00','DG 071','2','2019-03-26','2019-03-26 05:33:25','2019-03-26 05:33:25'),(46,5,'14:20:00','15:20:00','OMA 337','2','2019-03-26','2019-03-26 05:33:45','2019-03-26 05:33:45'),(47,5,'16:40:00','17:40:00','9W 261','2','2019-03-26','2019-03-26 05:34:03','2019-03-26 05:34:03'),(48,5,'19:10:00','20:10:00','RA 402','2','2019-03-26','2019-03-26 05:34:25','2019-03-26 05:34:25'),(49,6,'06:00:00','08:00:00','RA 205','2','2019-03-26','2019-03-26 05:35:00','2019-03-26 05:35:00'),(50,6,'09:10:00','10:10:00','KB 400','2','2019-03-26','2019-03-26 05:35:19','2019-03-26 05:35:19'),(51,6,'11:10:00','12:10:00','CA 407','2','2019-03-26','2019-03-26 05:35:42','2019-03-26 05:35:42'),(52,6,'12:30:00','13:20:00','RA 206','2','2019-03-26','2019-03-26 05:36:03','2019-03-26 05:36:03'),(53,6,'14:30:00','15:30:00','A3C 215','2','2019-03-26','2019-03-26 05:36:26','2019-03-26 05:36:26'),(54,6,'16:10:00','17:10:00','EY 291','2','2019-03-26','2019-03-26 05:36:50','2019-03-26 05:36:50'),(55,6,'18:30:00','19:30:00','FZ 2573','2','2019-03-26','2019-03-26 05:37:10','2019-03-26 05:37:10'),(56,6,'20:20:00','21:20:00','H9 891','2','2019-03-26','2019-03-26 05:37:32','2019-03-26 05:37:32'),(57,7,'08:10:00','10:00:00','H9 566','2','2019-03-26','2019-03-26 05:37:56','2019-03-26 05:37:56'),(58,7,'10:30:00','11:30:00','3V 8719','2','2019-03-26','2019-03-26 05:38:17','2019-03-26 05:38:17'),(59,7,'12:20:00','13:20:00','MA5 171','2','2019-03-26','2019-03-26 05:38:38','2019-03-26 05:38:38'),(60,7,'13:50:00','14:50:00','6E 031','2','2019-03-26','2019-03-26 05:38:58','2019-03-26 05:38:58'),(61,7,'15:30:00','16:30:00','QR 646','2','2019-03-26','2019-03-26 05:39:15','2019-03-26 05:39:15'),(62,7,'18:10:00','19:10:00','QR 651','2','2019-03-26','2019-03-26 05:39:31','2019-03-26 05:39:31'),(63,7,'19:40:00','20:40:00','FZ 2573','2','2019-03-26','2019-03-26 05:39:50','2019-03-26 05:39:50'),(64,8,'08:20:00','09:20:00','FDB 8017','2','2019-03-26','2019-03-26 05:40:24','2019-03-26 05:40:24'),(65,8,'09:40:00','10:20:00','ABY 539','2','2019-03-26','2019-03-26 05:40:45','2019-03-26 05:40:45'),(66,8,'10:50:00','11:50:00','CZ 6067','2','2019-03-26','2019-03-26 05:41:07','2019-03-26 05:41:07'),(67,8,'15:30:00','16:20:00','AIC 247','2','2019-03-26','2019-03-26 05:41:26','2019-03-26 05:41:26'),(68,8,'16:50:00','17:50:00','TB 6020','2','2019-03-26','2019-03-26 05:41:43','2019-03-26 05:41:43'),(69,8,'18:30:00','19:10:00','ABy 538','2','2019-03-26','2019-03-26 05:41:59','2019-03-26 05:41:59'),(70,8,'19:50:00','20:30:00','MI 413','2','2019-03-26','2019-03-26 05:42:17','2019-03-26 05:42:17'),(71,8,'20:40:00','21:30:00','H9 563','2','2019-03-26','2019-03-26 05:42:42','2019-03-26 05:42:42'),(72,9,'09:40:00','10:40:00','CA 437','2','2019-03-26','2019-03-26 05:43:42','2019-03-26 05:43:42'),(73,9,'11:20:00','12:20:00','9W 250','2','2019-03-26','2019-03-26 05:44:35','2019-03-26 05:44:35'),(74,9,'13:00:00','14:00:00','MXD 183','2','2019-03-26','2019-03-26 05:44:57','2019-03-26 05:44:57'),(75,9,'14:50:00','15:50:00','9w 260','2','2019-03-26','2019-03-26 05:45:19','2019-03-26 05:45:19'),(76,9,'16:20:00','17:00:00','BHA 161','2','2019-03-26','2019-03-26 05:45:39','2019-03-26 05:45:39'),(77,9,'17:50:00','18:50:00','MAS 115','2','2019-03-26','2019-03-26 05:46:00','2019-03-26 05:46:00'),(78,9,'19:20:00','20:00:00','BHA 162','2','2019-03-26','2019-03-26 05:46:18','2019-03-26 05:46:18'),(79,9,'20:30:00','21:30:00','H9 565','2','2019-03-26','2019-03-26 05:46:39','2019-03-26 05:46:39');

/*Table structure for table `counter` */

DROP TABLE IF EXISTS `counter`;

CREATE TABLE `counter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `counter_number` varchar(10) NOT NULL,
  `flight_type` varchar(20) DEFAULT NULL,
  `airlines` varchar(50) NOT NULL,
  `days` varchar(20) DEFAULT NULL COMMENT '1 for monday',
  `flight_date` date NOT NULL,
  `eta` time NOT NULL COMMENT 'arrival time',
  `etd` time NOT NULL COMMENT 'departure time',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `counter` */

insert  into `counter`(`id`,`counter_number`,`flight_type`,`airlines`,`days`,`flight_date`,`eta`,`etd`,`created_at`,`updated_at`) values (1,'A1',NULL,'Oman 332','4','2019-03-14','05:10:00','08:20:00','2019-03-14 16:48:28','2019-03-14 11:03:33'),(2,'A1',NULL,'Biman','All','2019-03-14','09:10:00','12:10:00','2019-03-14 10:52:39','2019-03-14 10:52:39'),(3,'A2',NULL,'Oman 332','1,3,5,6,7','2019-03-14','06:50:00','08:50:00','2019-03-14 10:53:19','2019-03-14 10:53:19'),(4,'A2','QR 652','Biman','7','2019-03-17','10:20:00','09:40:00','2019-03-17 05:18:01','2019-03-17 05:18:01');

/*Table structure for table `flight` */

DROP TABLE IF EXISTS `flight`;

CREATE TABLE `flight` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flight_type` varchar(20) NOT NULL,
  `category` enum('1','2','3') NOT NULL COMMENT '''1'' for wide, ''2'' for narrow',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `flight` */

insert  into `flight`(`id`,`flight_type`,`category`,`created_at`,`updated_at`) values (1,'B738','1','2019-03-15 08:55:23','2019-03-15 08:55:23'),(2,'A319','','2019-03-15 14:46:33','2019-03-15 09:01:42');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`description`,`entry_by`,`status`,`created_at`,`updated_at`) values (1,'Main Menu','Main Menu',1,'1','2018-12-04 15:04:49','0000-00-00 00:00:00'),(2,'Footer Menu','footer menu',NULL,'1','2018-12-07 14:50:50','0000-00-00 00:00:00');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tbl_admin_groups` */

DROP TABLE IF EXISTS `tbl_admin_groups`;

CREATE TABLE `tbl_admin_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin_groups` */

insert  into `tbl_admin_groups`(`id`,`title`,`description`,`status`,`created_at`,`updated_at`) values (1,'admin\r\n',NULL,1,NULL,NULL),(2,'Manager','manager',1,'2018-11-28 10:59:52','2018-11-28 10:59:52'),(4,'Super Admin','superadmin',1,'2019-03-21 06:11:34','2019-03-21 06:11:34'),(5,'User','user',1,'2019-03-21 06:25:11','2019-03-21 06:25:11');

/*Table structure for table `tbl_admin_menus` */

DROP TABLE IF EXISTS `tbl_admin_menus`;

CREATE TABLE `tbl_admin_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `menu_controller` varchar(200) DEFAULT NULL,
  `menu_name` varchar(256) DEFAULT NULL,
  `menu_link` varchar(256) DEFAULT NULL,
  `style` varchar(256) DEFAULT NULL,
  `menu_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin_menus` */

insert  into `tbl_admin_menus`(`id`,`parent_id`,`menu_controller`,`menu_name`,`menu_link`,`style`,`menu_order`,`status`) values (1,0,'','UserGroup','','fas fa-users',1,1),(2,1,'AdminGroupController','User Group','usergroup.index','fas fa-list-ul',1,1),(3,1,'AdminRoleAccessController','Role','role-access.index','fas fa-list-ul',2,1),(9,0,NULL,'Bay',NULL,'fas fa-file-alt',4,1),(10,9,'AdminBayController','All Bay','bay.index','fas fa-list-ul',1,1),(11,9,'AdminBayController','Add Bay','bay.create','fas fa-plus',2,1),(12,0,'','Counter',NULL,'fas fa-file-alt',5,1),(13,12,'AdminCounterController','All Counter','counter.index','fas fa-list-ul',1,1),(14,12,'AdminCounterController','Add Counter','counter.create','fas fa-plus',2,1),(15,0,NULL,'Flight Type',NULL,'fas fa-file-alt',3,1),(16,15,'AdminFlightTypeController','All Flight Type','flighttype.index','fas fa-list-ul',1,1),(17,15,'AdminFlightTypeController','Add Flight Type','flighttype.create','fas fa-plus',2,1),(18,9,'AdminFindAvailableBayController','Find Available Bay','findbay.index','fas fa-list-ul',3,1),(19,9,'AdminBayGraphController','Bay Graph','baygraph.index','fa fa-list-ul',4,1),(20,0,NULL,'Bay Type',NULL,'fas fa-file-alt',6,1),(21,20,'AdminAddbayController','All Bay','addbay.index','fas fa-list-ul',1,1),(22,20,'AdminAddbayController','Add Bay','addbay.create','fas fa-plus',2,1);

/*Table structure for table `tbl_admin_roles` */

DROP TABLE IF EXISTS `tbl_admin_roles`;

CREATE TABLE `tbl_admin_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `allow_view` int(11) DEFAULT NULL,
  `allow_add` int(11) DEFAULT NULL,
  `allow_edit` int(11) DEFAULT NULL,
  `allow_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin_roles` */

insert  into `tbl_admin_roles`(`id`,`user_group_id`,`menu_id`,`allow_view`,`allow_add`,`allow_edit`,`allow_delete`) values (2,1,1,1,1,1,1),(3,1,2,1,1,1,1),(4,2,1,0,0,0,0),(5,2,2,0,0,0,0),(6,1,3,1,1,1,1),(7,2,3,0,0,0,0),(8,3,1,0,0,0,0),(9,3,2,0,0,0,0),(10,3,3,0,0,0,0),(16,1,9,1,1,1,1),(17,1,10,1,1,1,1),(18,1,11,1,1,1,1),(19,1,12,1,1,1,1),(20,1,13,1,1,1,1),(21,1,14,1,1,1,1),(22,1,15,1,1,1,1),(23,1,16,1,1,1,1),(24,1,17,1,1,1,1),(25,4,1,1,1,1,1),(26,4,2,1,1,1,1),(27,4,3,1,1,1,1),(28,4,9,1,1,1,1),(29,4,10,1,1,1,1),(30,4,11,1,1,1,1),(31,4,12,1,1,1,1),(32,4,13,1,1,1,1),(33,4,14,1,1,1,1),(34,4,15,1,1,1,1),(35,4,16,1,1,1,1),(36,4,17,1,1,1,1),(37,5,1,0,0,0,0),(38,5,2,0,0,0,0),(39,5,3,0,0,0,0),(40,5,9,1,0,0,0),(41,5,10,1,0,0,0),(42,5,11,0,0,0,0),(43,5,12,1,0,0,0),(44,5,13,1,0,0,0),(45,5,14,0,0,0,0),(46,5,15,1,0,0,0),(47,5,16,1,0,0,0),(48,5,17,0,0,0,0),(49,1,18,0,0,0,0),(50,1,19,0,0,0,0),(51,1,20,1,1,1,1),(52,1,21,1,1,1,1),(53,1,22,1,1,1,1),(54,4,18,1,1,1,1),(55,4,19,1,1,1,1),(56,4,20,0,0,0,0),(57,4,21,0,0,0,0),(58,4,22,0,0,0,0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`mobileno`,`email_verified_at`,`password`,`remember_token`,`status`,`user_group_id`,`created_at`,`updated_at`) values (1,'sudeep shrestha','sudeepsth@outlook.com','9840064816',NULL,'$2y$10$VrpgSy4O6LwgGhXSk.FjO.W4RbnRrBxHUWxNBTE1ItLFtGidVjIaG','PtybBSap2ThrrCM9rJXAnx3vrZ5s3UV6uaCZ9NIqBmRNsVf1avkogTAvzEQq','1',4,'2018-10-26 04:33:48','2018-11-05 08:58:00'),(2,'preety','pregmi@pcs.com.np','9841414141',NULL,'$2y$10$f3ylhKF7g4CGImP7/Fi.iOVvwRmz6MamF6e6u1rFjkUlSsclnSnUm',NULL,'1',1,'2019-03-28 09:53:53','2019-03-28 09:53:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
