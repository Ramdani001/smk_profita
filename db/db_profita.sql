-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_profita
CREATE DATABASE IF NOT EXISTS `db_profita` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_profita`;

-- Dumping structure for table db_profita.berkas
CREATE TABLE IF NOT EXISTS `berkas` (
  `id_berkas` int NOT NULL AUTO_INCREMENT,
  `kk` varchar(255) DEFAULT NULL,
  `akta` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `kip` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
) ENGINE=InnoDB AUTO_INCREMENT=2419 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_profita.berkas: ~2 rows (approximately)
REPLACE INTO `berkas` (`id_berkas`, `kk`, `akta`, `ijazah`, `kip`, `profile`) VALUES
	(-1, '667ac7afc4f72.png', '66798954d6608.jpg', '', '-', '667ac73c49052.png');

-- Dumping structure for table db_profita.master_message
CREATE TABLE IF NOT EXISTS `master_message` (
  `id_m` int DEFAULT NULL,
  `pesan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_profita.master_message: ~0 rows (approximately)

-- Dumping structure for table db_profita.parents
CREATE TABLE IF NOT EXISTS `parents` (
  `id_parent` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int DEFAULT NULL,
  `nik_ayah` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `lhir_ayah` varchar(80) DEFAULT NULL,
  `tgl_lhr_ayah` date DEFAULT NULL,
  `pendidikan_ayah` varchar(30) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `penghasilan_ayah` varchar(255) DEFAULT NULL,
  `status_ayah` varchar(60) DEFAULT NULL,
  `nik_ibu` varchar(60) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `lhir_ibu` varchar(60) DEFAULT NULL,
  `tgl_lhr_ibu` date DEFAULT NULL,
  `no_ibu` varchar(20) DEFAULT NULL,
  `pendidikan_ibu` varchar(20) DEFAULT NULL,
  `penghasilan_ibu` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=1321 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_profita.parents: ~2 rows (approximately)
REPLACE INTO `parents` (`id_parent`, `id_siswa`, `nik_ayah`, `nama_ayah`, `lhir_ayah`, `tgl_lhr_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `status_ayah`, `nik_ibu`, `nama_ibu`, `lhir_ibu`, `tgl_lhr_ibu`, `no_ibu`, `pendidikan_ibu`, `penghasilan_ibu`) VALUES
	(162, 3692, '345345345345345', 'Robert', 'Bandung', '2024-06-25', 'D3', 'Pengusaha', '1.000.000 - 2.000.000', 'Meninggal', '567342545656', 'Cindy', 'Canada', '2024-06-18', '764656546456', 'S3', '1.000.000 - 2.000.000');

-- Dumping structure for table db_profita.person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipe` int DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `desa` varchar(60) DEFAULT NULL,
  `kecamatan` varchar(60) DEFAULT NULL,
  `kab_kota` varchar(60) DEFAULT NULL,
  `provinsi` varchar(60) DEFAULT NULL,
  `kode_pos` varchar(60) DEFAULT NULL,
  `kewarganegaraan` varchar(60) DEFAULT NULL,
  `tempat_lhir` varchar(60) DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `rt` varchar(10) DEFAULT NULL,
  `rw` varchar(10) DEFAULT NULL,
  `id_berkas` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=6913 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_profita.person: ~3 rows (approximately)
REPLACE INTO `person` (`id_person`, `nama`, `no_telp`, `email`, `tipe`, `agama`, `alamat`, `desa`, `kecamatan`, `kab_kota`, `provinsi`, `kode_pos`, `kewarganegaraan`, `tempat_lhir`, `jk`, `tanggal_lahir`, `rt`, `rw`, `id_berkas`, `created_at`, `updated_at`) VALUES
	(6, 'Administrator', '', 'profita.admin@gmail.com', 1, '', '', '', '', '', '', '', '', '', '', '2024-06-25', '', '', 0, '2024-06-25 07:17:32', '2024-06-25 07:17:32'),
	(192, 'Rizkan Ramdani', '098787867878', 'rizkan@gmail.com', 3, 'Islam                                             ', 'Jl. Soekarno Hatta 2039', 'Gumuruh', 'Batununggal', 'Kota Bandung', 'Jawa Barat', '40866', 'Indonesia', 'Bandung', 'Laki-laki', '2024-06-25', '12', '32', -1, '2024-05-25 06:02:52', '2024-06-25 14:13:31');

-- Dumping structure for table db_profita.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `id_person` int DEFAULT NULL,
  `no_pendaftaran` varchar(60) DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `npsn_sekolah_asal` varchar(100) DEFAULT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `biaya_sekolah` varchar(50) DEFAULT NULL,
  `sd` varchar(50) DEFAULT NULL,
  `smp` varchar(50) DEFAULT NULL,
  `kip` varchar(50) DEFAULT NULL,
  `cita_cita` varchar(50) DEFAULT NULL,
  `hobi` varchar(50) DEFAULT NULL,
  `anak_ke` varchar(50) DEFAULT NULL,
  `transportasi` varchar(50) DEFAULT NULL,
  `jarak_sekolah` varchar(50) DEFAULT NULL,
  `waktu_tempuh` varchar(50) DEFAULT NULL,
  `jml_saudara` varchar(50) DEFAULT NULL,
  `no_kk` varchar(50) DEFAULT NULL,
  `kepala_keluarga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `jurusan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=4691 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_profita.siswa: ~2 rows (approximately)
REPLACE INTO `siswa` (`id_siswa`, `id_person`, `no_pendaftaran`, `asal_sekolah`, `npsn_sekolah_asal`, `nisn`, `nik`, `biaya_sekolah`, `sd`, `smp`, `kip`, `cita_cita`, `hobi`, `anak_ke`, `transportasi`, `jarak_sekolah`, `waktu_tempuh`, `jml_saudara`, `no_kk`, `kepala_keluarga`, `status`, `jurusan`, `created_at`, `updated_at`) VALUES
	(3692, 192, '787867867867', 'SMP 12 Jakarta                  ', '203498', '03945032945', '000099388577848', 'Orang Tua', 'SD 888', 'SMP 90 Jakarta', '-', 'Penyanyi', 'Baca, Tidur', '2', 'Mobil', '2 Km', '2 Jam', '1', '0000949595800284', 'Husein', 1, 'Akuntansi', '2024-05-25 18:15:10', '2024-06-30 08:57:43');

-- Dumping structure for table db_profita.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `id_person` int DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2305 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_profita.user: ~3 rows (approximately)
REPLACE INTO `user` (`id_user`, `id_person`, `password`, `created_at`, `updated_at`) VALUES
	(6, 6, '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '2024-06-25 00:17:32', '2024-06-25 00:17:32'),
	(192, 192, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '2024-05-25 06:02:52', '2024-05-25 06:02:52');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
