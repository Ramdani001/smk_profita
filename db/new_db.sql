
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
  `kelakuan` varchar(255) DEFAULT NULL,
  `ortu` varchar(255) DEFAULT NULL,
  `sehat` varchar(255) DEFAULT NULL,
  `pas_foto` varchar(255) DEFAULT NULL,
  `lulus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_berkas`)
);

REPLACE INTO `berkas` (`id_berkas`, `kk`, `akta`, `ijazah`, `kip`, `profile`, `kelakuan`, `ortu`, `sehat`, `pas_foto`, `lulus`) VALUES
	(-1, '667ac7afc4f72.png', '66798954d6608.jpg', '66a4b09d9e1a3.png', '66a4b2e7a9ec0.png', '66a4bad28f6df.png', '66a4b09d9fdcb.png', '66a4b09da0811.png', '66a4b09da13d0.png', '66a4b672b3018.png', '66a4b09da281b.png');

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
  `penghasilan_ibu` varchar(100) DEFAULT NULL,
  `name_wali` varchar(100) DEFAULT NULL,
  `no_wali` varchar(20) DEFAULT NULL,
  `hubungan_wali` varchar(100) DEFAULT NULL,
  `pekerjaan_wali` varchar(100) DEFAULT NULL,
  `alamat_wali` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_parent`)
);

-- Dumping data for table db_profita.parents: ~1 rows (approximately)
REPLACE INTO `parents` (`id_parent`, `id_siswa`, `nik_ayah`, `nama_ayah`, `lhir_ayah`, `tgl_lhr_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `status_ayah`, `nik_ibu`, `nama_ibu`, `lhir_ibu`, `tgl_lhr_ibu`, `no_ibu`, `pendidikan_ibu`, `penghasilan_ibu`, `name_wali`, `no_wali`, `hubungan_wali`, `pekerjaan_wali`, `alamat_wali`) VALUES
	(-53, 61, '', 'Yusuf', 'fdsg', '2024-07-27', 'SD', 'sdfg', '1.000.000 - 2.000.000', 'Hidup', '', 'sfd', 'sdf', '2024-07-29', '234', 'SD', '1.000.000 - 2.000.000', 'sf', '234', 'sdf', 'sfd', 'sdf'),
	(162, 3692, '', 'Robert', 'Bandung', '2024-07-27', 'D3', 'Pengusaha', '1.000.000 - 2.000.000', 'Hidup', '', 'Cindy', 'Canada', '2024-06-26', '764656546456', 'S3', '1.000.000 - 2.000.000', 'Aul', '234234234', 'Sodara', 'Wiraswasta', 'Alamat isi');

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
);

-- Dumping data for table db_profita.person: ~2 rows (approximately)
REPLACE INTO `person` (`id_person`, `nama`, `no_telp`, `email`, `tipe`, `agama`, `alamat`, `desa`, `kecamatan`, `kab_kota`, `provinsi`, `kode_pos`, `kewarganegaraan`, `tempat_lhir`, `jk`, `tanggal_lahir`, `rt`, `rw`, `id_berkas`, `created_at`, `updated_at`) VALUES
	(6, 'Administrator', '', 'profita.admin@gmail.com', 1, '', '', '', '', '', '', '', '', '', '', '2024-06-25', '', '', 0, '2024-06-25 07:17:32', '2024-06-25 07:17:32'),
	(126, 'Dita', '87685674', 'dita@gmail.com', 3, 'sg                                        ', '-', '-', '-', '-', '-', '78', 'INdonesia', 'adf', 'adf', '2024-07-27', '6', '7', 0, '2024-07-27 07:14:18', '2024-07-27 15:04:36'),
	(192, 'Rizkan Ramdani', '098787867878', 'rizkan@gmail.com', 3, 'Islam                                             ', 'Jl. Soekarno Hatta 2039', 'Gumuruh', 'Batununggal', 'Kota Bandung', 'Jawa Barat', '40866', 'Indonesia', 'Bandung', 'Laki-laki', '2024-06-25', '12', '32', -1, '2024-05-25 06:02:52', '2024-07-27 10:31:08');

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
  `kepala_keluarga` varchar(255) DEFAULT NULL,
  `st` int DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
);

-- Dumping data for table db_profita.siswa: ~1 rows (approximately)
REPLACE INTO `siswa` (`id_siswa`, `id_person`, `no_pendaftaran`, `asal_sekolah`, `npsn_sekolah_asal`, `nisn`, `nik`, `biaya_sekolah`, `sd`, `smp`, `kip`, `cita_cita`, `hobi`, `anak_ke`, `transportasi`, `jarak_sekolah`, `waktu_tempuh`, `jml_saudara`, `no_kk`, `kepala_keluarga`, `st`, `jurusan`, `created_at`, `updated_at`) VALUES
	(61, 126, '1768', 'asd                                    ', '', '234234', '', '', '', '', '-', 'd                                    ', 'fd                                    ', '1                                    ', '-', '-', '34', '3                                            ', '', '', 2, 'Penjualan', '2024-07-27 14:18:41', '2024-07-27 15:04:36'),
	(3692, 192, '9', ' SD                                                                       ', '', '324234', '', '', '', '', '-', 'hjj                                               ', 'rty                                               ', '23                                                ', 'sdf', '345', '34', '2                                                 ', '', '', 1, 'Akuntansi', '2024-05-25 18:15:10', '2024-07-27 13:59:31');

-- Dumping structure for table db_profita.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `id_person` int DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`)
);

-- Dumping data for table db_profita.user: ~2 rows (approximately)
REPLACE INTO `user` (`id_user`, `id_person`, `password`, `created_at`, `updated_at`) VALUES
	(6, 6, '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '2024-06-25 00:17:32', '2024-06-25 00:17:32'),
	(126, 126, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '2024-07-27 07:14:18', '2024-07-27 07:14:18'),
	(192, 192, 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '2024-05-25 06:02:52', '2024-05-25 06:02:52');