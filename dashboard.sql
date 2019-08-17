-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.26 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dash_tik
CREATE DATABASE IF NOT EXISTS `dash_tik` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dash_tik`;

-- Dumping structure for table dash_tik.dashboard
CREATE TABLE IF NOT EXISTS `dashboard` (
  `id_dashboard` int(11) NOT NULL AUTO_INCREMENT,
  `id_dashboard1` int(11) NOT NULL,
  `nilai` decimal(11,2) NOT NULL,
  `periode` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_dashboard`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table dash_tik.dashboard: ~13 rows (approximately)
/*!40000 ALTER TABLE `dashboard` DISABLE KEYS */;
INSERT INTO `dashboard` (`id_dashboard`, `id_dashboard1`, `nilai`, `periode`) VALUES
	(1, 1, 0.00, '2017-12-28 09:50:35'),
	(2, 2, 1.00, '2017-12-28 09:50:38'),
	(3, 3, 12.00, '2017-12-28 09:50:40'),
	(4, 4, 24.00, '2017-12-28 09:50:42'),
	(5, 5, 48.00, '2017-12-28 09:50:44'),
	(6, 6, 4.42, '2017-12-28 09:50:46'),
	(7, 7, 80.00, '2017-12-28 09:50:48'),
	(8, 8, 95.00, '2017-12-28 09:50:49');
/*!40000 ALTER TABLE `dashboard` ENABLE KEYS */;

-- Dumping structure for table dash_tik.dashboard1
CREATE TABLE IF NOT EXISTS `dashboard1` (
  `id_dashboard1` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perangkat` varchar(50) NOT NULL,
  PRIMARY KEY (`id_dashboard1`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dash_tik.dashboard1: ~8 rows (approximately)
/*!40000 ALTER TABLE `dashboard1` DISABLE KEYS */;
INSERT INTO `dashboard1` (`id_dashboard1`, `nama_perangkat`) VALUES
	(1, 'Tes Beban UPS Bulanan'),
	(2, 'Tes Genset Bulanan'),
	(3, 'Formasi TIK'),
	(4, 'Suhu DC (Celcius)'),
	(5, 'Humidity DC (% RH)'),
	(6, 'RISK (%)'),
	(7, 'UPS (%)'),
	(8, 'Battery (%)');
/*!40000 ALTER TABLE `dashboard1` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
