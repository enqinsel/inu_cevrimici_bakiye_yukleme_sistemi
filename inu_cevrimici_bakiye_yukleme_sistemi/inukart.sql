/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - inukart
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inukart` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci */;

USE `inukart`;

/*Table structure for table `aylikmenu` */

DROP TABLE IF EXISTS `aylikmenu`;

CREATE TABLE `aylikmenu` (
  `yil` smallint(5) unsigned NOT NULL,
  `ay` tinyint(3) unsigned NOT NULL,
  `gun` tinyint(3) unsigned NOT NULL,
  `yemek1` smallint(5) unsigned NOT NULL,
  `yemek2` smallint(5) unsigned NOT NULL,
  `yemek3` smallint(5) unsigned NOT NULL,
  `yemek4` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

/*Data for the table `aylikmenu` */

insert  into `aylikmenu`(`yil`,`ay`,`gun`,`yemek1`,`yemek2`,`yemek3`,`yemek4`) values 
(2022,1,11,1005,1006,1007,1008),
(2022,1,12,1001,1002,1003,1004);

/*Table structure for table `ucret` */

DROP TABLE IF EXISTS `ucret`;

CREATE TABLE `ucret` (
  `utip` char(1) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1',
  `ucret` tinyint(4) NOT NULL DEFAULT 6
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

/*Data for the table `ucret` */

insert  into `ucret`(`utip`,`ucret`) values 
('1',3),
('2',8);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `numara` varchar(11) COLLATE utf8mb4_turkish_ci NOT NULL,
  `utip` char(1) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1' COMMENT '1: Öğrenci 2: personel',
  `ad` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `soyad` varchar(40) COLLATE utf8mb4_turkish_ci NOT NULL,
  `bolum` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `bakiye` bigint(20) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`numara`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

/*Data for the table `users` */

insert  into `users`(`numara`,`utip`,`ad`,`soyad`,`bolum`,`bakiye`) values 
('1234','1','İbo','İÇLİ','Bilgisayar',55),
('4321','1','testAD','testSAD','Matematik',25);

/*Table structure for table `usertip` */

DROP TABLE IF EXISTS `usertip`;

CREATE TABLE `usertip` (
  `id` tinyint(3) unsigned NOT NULL,
  `tip` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

/*Data for the table `usertip` */

insert  into `usertip`(`id`,`tip`) values 
(1,'Öğrenci'),
(2,'Personel');

/*Table structure for table `y_katalog` */

DROP TABLE IF EXISTS `y_katalog`;

CREATE TABLE `y_katalog` (
  `y_id` smallint(8) unsigned NOT NULL,
  `tip` tinyint(3) NOT NULL,
  `ad` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kalori` smallint(6) NOT NULL DEFAULT 1,
  `resim` varchar(30) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`y_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

/*Data for the table `y_katalog` */

insert  into `y_katalog`(`y_id`,`tip`,`ad`,`kalori`,`resim`) values 
(1001,1,'Fasulye',540,'fasulye.jpg'),
(1002,1,'Pilav',325,'pilav.jpg'),
(1003,2,'Kırmızı Salata',60,'kirmizisalata.jpg'),
(1004,3,'Kırmızı Şarap',75,'kirmizisarap.jpg'),
(1005,1,'Patlıcan Kebabi',610,'patlicankebap.jpg'),
(1006,4,'Mercimek Çorbası',105,'mercimekcorbasi.jpg'),
(1007,3,'Yeşil Salata',15,'yesilsalata.jpg'),
(1008,3,'Maden Suyu',1,'madensuyu.jpg');

/*Table structure for table `y_tip` */

DROP TABLE IF EXISTS `y_tip`;

CREATE TABLE `y_tip` (
  `tip_id` tinyint(4) NOT NULL,
  `tip_ad` varchar(30) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`tip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

/*Data for the table `y_tip` */

insert  into `y_tip`(`tip_id`,`tip_ad`) values 
(1,'Ana Yemek'),
(2,'Salata'),
(3,'İçecek'),
(4,'Çorbalar');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
