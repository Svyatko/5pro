# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.38)
# Database: googleapi
# Generation Time: 2019-02-07 23:52:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(5,'Kyiv City','2019-02-08 01:05:11','2019-02-08 01:05:11'),
	(6,'Kharkiv','2019-02-08 01:05:35','2019-02-08 01:05:35'),
	(7,'Odesa','2019-02-08 01:05:55','2019-02-08 01:05:55'),
	(8,'L\'viv','2019-02-08 01:06:14','2019-02-08 01:06:14'),
	(9,'Ukraine','2019-02-08 01:45:47','2019-02-08 01:45:47');

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table geolocates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `geolocates`;

CREATE TABLE `geolocates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `geolocates` WRITE;
/*!40000 ALTER TABLE `geolocates` DISABLE KEYS */;

INSERT INTO `geolocates` (`id`, `lat`, `lng`, `address`, `city_id`, `region_id`, `created_at`, `updated_at`)
VALUES
	(7,'49.9935','36.2304','Rymars\'ka St, 2, Kharkiv, Kharkivs\'ka oblast, Ukraine, 61000',6,6,'2019-02-08 01:05:35','2019-02-08 01:05:35'),
	(8,'46.4825','30.7233','Koval\'s\'ka St, 1, Odesa, Odes\'ka oblast, Ukraine, 65000',7,7,'2019-02-08 01:05:55','2019-02-08 01:05:55'),
	(9,'49.8499','24.0223','Pid Dubom Street, 7Б, L\'viv, L\'vivs\'ka oblast, Ukraine, 79000',8,8,'2019-02-08 01:06:14','2019-02-08 01:06:14'),
	(10,'50.4501','30.5234','Unnamed Road, Kyiv, Ukraine, 02000',5,9,'2019-02-08 01:10:17','2019-02-08 01:10:17'),
	(11,'48.970443','23.478510','T1424, L\'vivs\'ka oblast, Ukraine',9,8,'2019-02-08 01:48:49','2019-02-08 01:48:49');

/*!40000 ALTER TABLE `geolocates` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2019_02_07_223559_create_cities_table',1),
	(2,'2019_02_07_223621_create_regions_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table regions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;

INSERT INTO `regions` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(6,'Kharkivs\'ka oblast','2019-02-08 01:05:35','2019-02-08 01:05:35'),
	(7,'Odes\'ka oblast','2019-02-08 01:05:55','2019-02-08 01:05:55'),
	(8,'L\'vivs\'ka oblast','2019-02-08 01:06:14','2019-02-08 01:06:14'),
	(9,'Kyiv City','2019-02-08 01:10:17','2019-02-08 01:10:17');

/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
