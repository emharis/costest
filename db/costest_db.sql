-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table app_project_cost_est.employee
DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table app_project_cost_est.employee: ~3 rows (approximately)
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` (`id`, `created_at`, `updated_at`, `nama`) VALUES
	(1, '2014-11-05 15:46:58', '2014-11-05 15:47:46', 'Sistem Analis'),
	(2, '2014-11-05 15:47:07', '2014-11-05 15:47:07', 'Programmer'),
	(3, '2014-11-05 15:47:20', '2014-11-05 15:47:20', 'Tester');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;


-- Dumping structure for table app_project_cost_est.fitur
DROP TABLE IF EXISTS `fitur`;
CREATE TABLE IF NOT EXISTS `fitur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `modul_id` int(11) DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table app_project_cost_est.fitur: ~53 rows (approximately)
/*!40000 ALTER TABLE `fitur` DISABLE KEYS */;
INSERT INTO `fitur` (`id`, `created_at`, `updated_at`, `modul_id`, `nama`, `bobot`) VALUES
	(1, '2014-11-06 13:18:29', '2014-11-06 16:48:39', 1, 'Login', 4),
	(2, '2014-11-06 13:18:37', '2014-11-06 16:48:47', 1, 'User', 4),
	(3, '2014-11-06 13:18:45', '2014-11-06 13:18:46', 1, 'user group', 4),
	(4, '2014-11-06 13:18:52', '2014-11-06 13:18:52', 1, 'tahun akademik', 4),
	(5, '2014-11-06 16:25:48', '2014-11-06 16:25:48', 1, 'semester', 4),
	(6, '2014-11-06 16:32:56', '2014-11-06 16:32:56', 1, 'jenjang', 4),
	(7, '2014-11-06 16:33:37', '2014-11-06 16:33:37', 1, 'program studi', 4),
	(8, '2014-11-06 16:34:32', '2014-11-06 16:34:32', 1, 'mata kuliah', 4),
	(9, '2014-11-06 16:35:41', '2014-11-06 16:35:41', 1, 'mahasiswa', 4),
	(10, '2014-11-06 16:36:37', '2014-11-06 16:36:37', 1, 'dosen', 4),
	(11, '2014-11-06 16:39:04', '2014-11-06 16:39:04', 1, 'pengaturan matakuliah per semester per program studi', 6),
	(12, '2014-11-06 16:49:17', '2014-11-06 16:49:17', 1, 'Home', 4),
	(13, '2014-11-06 16:49:29', '2014-11-06 16:49:29', 1, 'Setting', 4),
	(14, '2014-11-06 16:49:56', '2014-11-06 16:49:56', 1, 'Pengaturan Penerbitan Kelas MK per Semester', 6),
	(15, '2014-11-06 16:50:06', '2014-11-06 16:50:06', 1, 'Pengaturan Kalender Akademik', 6),
	(16, '2014-11-06 16:50:14', '2014-11-06 16:50:14', 1, 'Pengaturan Jadwal Kuliah', 10),
	(17, '2014-11-06 16:50:21', '2014-11-07 11:15:17', 1, 'KRS', 10),
	(18, '2014-11-06 16:50:29', '2014-11-06 16:50:29', 1, 'Input Nilai', 8),
	(19, '2014-11-06 16:50:35', '2014-11-06 16:50:35', 1, 'Report Akademik', 10),
	(20, '2014-11-06 16:50:42', '2014-11-07 11:15:27', 1, 'KHS', 8),
	(21, '2014-11-06 16:50:49', '2014-11-06 16:50:49', 1, 'Absensi Mahasiswa', 4),
	(22, '2014-11-06 16:50:55', '2014-11-06 16:50:55', 1, 'Master Angkatan', 4),
	(23, '2014-11-06 16:52:29', '2014-11-06 16:52:29', 2, 'Master Biaya', 4),
	(24, '2014-11-06 16:52:38', '2014-11-06 16:52:38', 2, 'Pengaturan Biaya Per Prodi Per Semester/Angkatan', 6),
	(25, '2014-11-06 16:52:47', '2014-11-07 10:48:05', 2, 'Pembayaran Mahasiswa', 10),
	(26, '2014-11-06 16:52:53', '2014-11-07 10:46:31', 2, 'Report Administrasi', 10),
	(27, '2014-11-07 10:27:14', '2014-11-07 10:27:14', 13, 'Info Biodata', 4),
	(28, '2014-11-07 10:28:03', '2014-11-07 10:28:03', 13, 'Info Nilai', 6),
	(30, '2014-11-07 10:28:38', '2014-11-07 10:47:27', 13, 'KRS Online', 10),
	(31, '2014-11-07 10:43:05', '2014-11-07 10:43:05', 13, 'info jadwal kuliah', 4),
	(32, '2014-11-07 10:43:31', '2014-11-07 10:43:31', 13, 'info jadwal ujian', 4),
	(33, '2014-11-07 10:43:39', '2014-11-07 10:43:39', 13, 'Kalender Akademik', 4),
	(34, '2014-11-07 10:44:08', '2014-11-07 10:44:08', 13, 'Info Administrasi/Keuangan', 6),
	(35, '2014-11-07 10:46:18', '2014-11-07 10:46:18', 2, 'Pendapatan', 6),
	(36, '2014-11-07 10:46:24', '2014-11-07 10:46:24', 2, 'Pengeluaran', 6),
	(37, '2014-11-07 10:48:25', '2014-11-08 12:06:06', 12, 'Master Karyawan', 4),
	(38, '2014-11-07 10:48:35', '2014-11-07 10:48:35', 12, 'Master Tunjangan', 4),
	(39, '2014-11-07 10:48:43', '2014-11-07 10:48:43', 12, 'Master Potongan', 4),
	(40, '2014-11-07 10:49:26', '2014-11-07 11:08:16', 12, 'Proses Penggajian', 8),
	(41, '2014-11-07 11:07:29', '2014-11-07 11:07:29', 12, 'Absensi Karyawan', 4),
	(42, '2014-11-07 11:08:46', '2014-11-07 11:08:46', 1, 'setting', 4),
	(43, '2014-11-07 11:12:29', '2014-11-07 11:12:29', 13, 'login', 4),
	(44, '2014-11-07 11:24:03', '2014-11-07 11:24:03', 13, 'Info Absensi/Presensi', 4),
	(45, '2014-11-07 15:32:44', '2014-11-07 15:32:44', 14, 'Info Profil', 4),
	(46, '2014-11-07 15:32:56', '2014-11-07 15:32:56', 14, 'Info Jadwal Mengajar', 4),
	(47, '2014-11-07 15:33:10', '2014-11-07 15:33:10', 14, 'Penilaian', 8),
	(48, '2014-11-07 15:33:47', '2014-11-07 15:33:47', 14, 'Info Absensi/Presensi', 4),
	(49, '2014-11-08 11:45:46', '2014-11-08 11:45:46', 2, 'Pembayaran Registrasi', 6),
	(50, '2014-11-08 12:06:22', '2014-11-08 12:06:22', 12, 'Pengaturan Gaji & Tunjangan Karyawan', 6),
	(51, '2014-11-08 12:09:24', '2014-11-08 12:09:24', 14, 'Info data mahasiswa', 4),
	(52, '2014-11-08 12:09:37', '2014-11-08 12:09:37', 14, 'Kalender Akademik', 4),
	(53, '2014-11-08 12:09:47', '2014-11-08 12:09:47', 14, 'Info Jadwal Ujian', 4),
	(54, '2014-11-08 12:20:59', '2014-11-08 12:20:59', 12, 'Master Gaji', 4);
/*!40000 ALTER TABLE `fitur` ENABLE KEYS */;


-- Dumping structure for table app_project_cost_est.modul
DROP TABLE IF EXISTS `modul`;
CREATE TABLE IF NOT EXISTS `modul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table app_project_cost_est.modul: ~5 rows (approximately)
/*!40000 ALTER TABLE `modul` DISABLE KEYS */;
INSERT INTO `modul` (`id`, `created_at`, `updated_at`, `project_id`, `nama`, `desc`) VALUES
	(1, '2014-11-06 08:41:47', '2014-11-06 08:55:01', 1, 'Akademik', 'Mengelola data akademik mahasiswa'),
	(2, '2014-11-06 08:42:06', '2014-11-06 08:55:18', 1, 'Administrasi', 'Mengelola pembayaran mahasiswa dan keuangan'),
	(12, '2014-11-06 12:19:02', '2014-11-06 12:19:02', 1, 'Payroll', 'Mengelola data karyawan dan penggajian'),
	(13, '2014-11-06 12:19:16', '2014-11-06 12:19:16', 1, 'Mahasiswa/SIOMA', 'Menampilkan informasi administrasi akademik untuk mahasiswa'),
	(14, '2014-11-07 11:23:39', '2014-11-07 11:23:39', 1, 'Dosen', 'Memberikan informasi tentang kegiatan dosen');
/*!40000 ALTER TABLE `modul` ENABLE KEYS */;


-- Dumping structure for table app_project_cost_est.project
DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama_project` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_client` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cp` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT NULL,
  `margin` int(11) DEFAULT NULL,
  `margin_2` int(11) DEFAULT NULL,
  `icon_str` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hour_per_month` int(11) DEFAULT NULL,
  `pph` int(11) DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table app_project_cost_est.project: ~1 rows (approximately)
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`id`, `created_at`, `updated_at`, `nama_project`, `nama_client`, `alamat`, `cp`, `telp`, `status`, `margin`, `margin_2`, `icon_str`, `desc`, `hour_per_month`, `pph`, `ppn`) VALUES
	(1, '2014-11-05 11:59:27', '2014-11-07 13:31:22', 'SIAM STKW Surabaya', 'STKW Surabaya', 'Perum Wisma Mukti Klampis Surabaya', 'Iemah & Taufik', NULL, 'Y', 100, 75, 'icon-calendar', 'Sistem Informasi Administrasi Akademik', 160, 2, 10);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


-- Dumping structure for table app_project_cost_est.project_employees
DROP TABLE IF EXISTS `project_employees`;
CREATE TABLE IF NOT EXISTS `project_employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `cost_per_month` int(11) DEFAULT NULL,
  `cost_per_hour` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table app_project_cost_est.project_employees: ~3 rows (approximately)
/*!40000 ALTER TABLE `project_employees` DISABLE KEYS */;
INSERT INTO `project_employees` (`id`, `created_at`, `updated_at`, `project_id`, `employee_id`, `cost_per_month`, `cost_per_hour`) VALUES
	(4, '2014-11-06 06:31:49', '2014-11-06 06:39:16', 1, 1, 4000000, NULL),
	(5, '2014-11-06 06:31:55', '2014-11-06 06:31:55', 1, 2, 3500000, NULL),
	(7, '2014-11-06 06:32:19', '2014-11-06 16:32:22', 1, 3, 3000000, NULL);
/*!40000 ALTER TABLE `project_employees` ENABLE KEYS */;


-- Dumping structure for table app_project_cost_est.project_variable_cost
DROP TABLE IF EXISTS `project_variable_cost`;
CREATE TABLE IF NOT EXISTS `project_variable_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `variablecost_id` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table app_project_cost_est.project_variable_cost: ~4 rows (approximately)
/*!40000 ALTER TABLE `project_variable_cost` DISABLE KEYS */;
INSERT INTO `project_variable_cost` (`id`, `created_at`, `updated_at`, `project_id`, `variablecost_id`, `cost`) VALUES
	(6, '2014-11-05 18:37:27', '2014-11-07 10:24:41', 1, 4, 400000),
	(7, '2014-11-05 18:37:34', '2014-11-07 11:22:18', 1, 5, 2000000),
	(8, '2014-11-05 18:37:40', '2014-11-05 18:37:40', 1, 6, 1500000),
	(12, '2014-11-06 05:46:37', '2014-11-06 05:46:37', 1, 1, 1000000);
/*!40000 ALTER TABLE `project_variable_cost` ENABLE KEYS */;


-- Dumping structure for table app_project_cost_est.variable_cost
DROP TABLE IF EXISTS `variable_cost`;
CREATE TABLE IF NOT EXISTS `variable_cost` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='biaya yang di bebankan pada setiap pengerjaan project..yang tidak dipengaruhi oleh banyaknya modul..bertambah atau berkurangnya modul nilai ini tetap sama';

-- Dumping data for table app_project_cost_est.variable_cost: ~8 rows (approximately)
/*!40000 ALTER TABLE `variable_cost` DISABLE KEYS */;
INSERT INTO `variable_cost` (`id`, `created_at`, `updated_at`, `nama`) VALUES
	(1, '2014-11-05 15:38:42', '2014-11-05 15:38:42', 'User Guide'),
	(2, '2014-11-05 15:38:53', '2014-11-05 15:39:15', 'Back End Template Design'),
	(3, '2014-11-05 15:39:27', '2014-11-05 15:39:27', 'Front End Template Design'),
	(4, '2014-11-05 15:39:35', '2014-11-05 15:39:35', 'Internet'),
	(5, '2014-11-05 15:39:54', '2014-11-05 15:39:54', 'Training'),
	(6, '2014-11-05 15:40:03', '2014-11-05 15:40:03', 'Instalasi'),
	(7, '2014-11-07 11:11:01', '2014-11-07 11:11:01', 'VPS'),
	(8, '2014-11-07 11:11:13', '2014-11-07 11:11:13', 'Shared Hosting');
/*!40000 ALTER TABLE `variable_cost` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;