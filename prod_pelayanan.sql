/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - prod_pelayanan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prod_pelayanan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `prod_pelayanan`;

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `id_galeri` int NOT NULL AUTO_INCREMENT,
  `Tanggal_galeri` date DEFAULT NULL,
  `Nama_galeri` varchar(100) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `galeri` */

insert  into `galeri`(`id_galeri`,`Tanggal_galeri`,`Nama_galeri`,`Foto`) values 
(1,'2023-05-20','Festival Desa','foto_festival.jpg');

/*Table structure for table `informasi` */

DROP TABLE IF EXISTS `informasi`;

CREATE TABLE `informasi` (
  `id_informasi` int NOT NULL AUTO_INCREMENT,
  `Tanggal_informasi` date DEFAULT NULL,
  `Nama_informasi` varchar(100) DEFAULT NULL,
  `Isi` text,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `informasi` */

insert  into `informasi`(`id_informasi`,`Tanggal_informasi`,`Nama_informasi`,`Isi`,`Foto`) values 
(1,'2023-05-20','Pembangunan Jalan Desa','Pembangunan jalan desa akan dimulai pada bulan Juni.','foto_pembangunan.jpg');

/*Table structure for table `keterangan_kelahiran` */

DROP TABLE IF EXISTS `keterangan_kelahiran`;

CREATE TABLE `keterangan_kelahiran` (
  `id_keterangankelahiran` int NOT NULL AUTO_INCREMENT,
  `Tanggal_keterangankelahiran` date DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Ttl` varchar(100) DEFAULT NULL,
  `Jenis_kelamin` varchar(100) DEFAULT NULL,
  `Agama` varchar(100) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Nama_ayah` varchar(100) DEFAULT NULL,
  `Nama_ibu` varchar(100) DEFAULT NULL,
  `kk` varchar(100) DEFAULT NULL,
  `Status_keterangankelahiran` varchar(100) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  PRIMARY KEY (`id_keterangankelahiran`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `keterangan_kelahiran` */

insert  into `keterangan_kelahiran`(`id_keterangankelahiran`,`Tanggal_keterangankelahiran`,`Nama`,`Ttl`,`Jenis_kelamin`,`Agama`,`Alamat`,`Nama_ayah`,`Nama_ibu`,`kk`,`Status_keterangankelahiran`,`created_id`,`updated_id`) values 
(1,'2023-05-20','Bayu','Jakarta, 3 Maret 2023','Laki-laki','Islam','Jl. Merdeka No. 20','Bapak Bayu','Ibu Bayu','kk_bayu.jpg','Terverifikasi',NULL,NULL);

/*Table structure for table `keterangan_kematian` */

DROP TABLE IF EXISTS `keterangan_kematian`;

CREATE TABLE `keterangan_kematian` (
  `id_keterangankematian` int NOT NULL AUTO_INCREMENT,
  `Tanggal_keterangankematian` date DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Ttl` varchar(100) DEFAULT NULL,
  `Jenis_kelamin` varchar(100) DEFAULT NULL,
  `Pekerjaan` varchar(100) DEFAULT NULL,
  `Agama` varchar(100) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Hari_kematian` varchar(100) DEFAULT NULL,
  `Tanggal_kematian` date DEFAULT NULL,
  `ktp` varchar(100) DEFAULT NULL,
  `Nama_pelapor` varchar(100) DEFAULT NULL,
  `Hubungan_pelapor` varchar(100) DEFAULT NULL,
  `Status_keterangankematian` varchar(100) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  PRIMARY KEY (`id_keterangankematian`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `keterangan_kematian` */

insert  into `keterangan_kematian`(`id_keterangankematian`,`Tanggal_keterangankematian`,`Nik`,`Nama`,`Ttl`,`Jenis_kelamin`,`Pekerjaan`,`Agama`,`Alamat`,`Hari_kematian`,`Tanggal_kematian`,`ktp`,`Nama_pelapor`,`Hubungan_pelapor`,`Status_keterangankematian`,`created_id`,`updated_id`) values 
(1,'2023-05-20',1234567890123456,'Udin','Jakarta, 4 April 1950','Perempuan','Pensiunan','Islam','Jl. Merdeka No. 30','Senin','2023-04-15','galeri1.jpg','Abdur','Anak kandung','Terverifikasi',NULL,NULL),
(2,'2024-06-04',9223372036854775807,'NO NAME','Karanganyar,22 Maret 2004','Laki-laki','Karyawan','Islam','jL DLL','Senin','2024-06-04','Screenshot_2024-02-19_152108.png','aBDUR','ANAK',NULL,7,NULL);

/*Table structure for table `keterangan_tidak_mampu` */

DROP TABLE IF EXISTS `keterangan_tidak_mampu`;

CREATE TABLE `keterangan_tidak_mampu` (
  `id_keterangantidakmampu` int NOT NULL AUTO_INCREMENT,
  `Tanggal_keterangantidakmampu` date DEFAULT NULL,
  `No_kk` bigint DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Ttl` varchar(100) DEFAULT NULL,
  `Jenis_kelamin` varchar(100) DEFAULT NULL,
  `Agama` varchar(100) DEFAULT NULL,
  `Pekerjaan` varchar(100) NOT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `kk` varchar(100) DEFAULT NULL,
  `Status_keterangantidakmampu` varchar(100) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  PRIMARY KEY (`id_keterangantidakmampu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `keterangan_tidak_mampu` */

insert  into `keterangan_tidak_mampu`(`id_keterangantidakmampu`,`Tanggal_keterangantidakmampu`,`No_kk`,`Nik`,`Nama`,`Ttl`,`Jenis_kelamin`,`Agama`,`Pekerjaan`,`Alamat`,`kk`,`Status_keterangantidakmampu`,`created_id`,`updated_id`) values 
(1,'2023-05-20',1234567890123456,1234567890123456,'Siti','Jakarta, 2 Februari 2000','Perempuan','Islam','','Jl. Merdeka No. 10','kk_siti.jpg','Terverifikasi',5,NULL),
(3,'2024-06-01',1234567890111111,1111111111111111,'magfira','lauwa 98-09-0900','Perempuan','Buddha','hfgf','kh','galeri1.jpg',NULL,NULL,NULL),
(4,'2024-06-04',331313131,3313112203040001,'Ulik','Karanganyar,22 Maret 2004','Laki-laki','Islam','','Jl manggarai','Screenshot_2024-02-19_161758.png',NULL,7,NULL);

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id_kontak` int NOT NULL AUTO_INCREMENT,
  `Alamat` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Telepon` bigint DEFAULT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id_kontak`,`Alamat`,`Email`,`Telepon`) values 
(1,'Jl. Raya Desa No. 1','kontak@desa.id',123456789012);

/*Table structure for table `pengaduan` */

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `id_pengaduan` int NOT NULL AUTO_INCREMENT,
  `Tanggal_pengaduan` date DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Isi_pengaduan` text,
  PRIMARY KEY (`id_pengaduan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`id_pengaduan`,`Tanggal_pengaduan`,`Nama`,`Isi_pengaduan`) values 
(1,'2023-05-20','Ani','Jalan desa rusak parah.');

/*Table structure for table `pengantar_nikah` */

DROP TABLE IF EXISTS `pengantar_nikah`;

CREATE TABLE `pengantar_nikah` (
  `id_pengantarnikah` int NOT NULL AUTO_INCREMENT,
  `Tanggal_pengantarnikah` date DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Ttl` varchar(100) DEFAULT NULL,
  `Jenis_kelamin` varchar(100) DEFAULT NULL,
  `Pekerjaan` varchar(100) DEFAULT NULL,
  `Agama` varchar(100) DEFAULT NULL,
  `Status_kawin` varchar(100) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Ktp` varchar(100) DEFAULT NULL,
  `Kk` varchar(100) DEFAULT NULL,
  `Status_pengantarnikah` varchar(100) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  PRIMARY KEY (`id_pengantarnikah`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengantar_nikah` */

insert  into `pengantar_nikah`(`id_pengantarnikah`,`Tanggal_pengantarnikah`,`Nik`,`Nama`,`Ttl`,`Jenis_kelamin`,`Pekerjaan`,`Agama`,`Status_kawin`,`Alamat`,`Ktp`,`Kk`,`Status_pengantarnikah`,`created_id`,`updated_id`) values 
(1,'2023-05-20',1212121234345656,'Joko','Jakarta, 5 Mei 1990','Laki-laki','Karyawan Swasta','Islam','Belum Kawin','Jl. Merdeka No. 40','ktp_joko.jpg','kk_joko.jpg','Terverifikasi',NULL,NULL),
(2,'2024-06-01',1111111111111111,'rosa','lauwa 98-09-0900','Laki-laki','bekerja','Islam','Belum Kawin','bbbb','download.png','galeri1.jpg','Terverifikasi',NULL,NULL);

/*Table structure for table `penghasilan_orang_tua` */

DROP TABLE IF EXISTS `penghasilan_orang_tua`;

CREATE TABLE `penghasilan_orang_tua` (
  `id_penghasilan` int NOT NULL AUTO_INCREMENT,
  `Tanggal_penghasilan` date DEFAULT NULL,
  `No_kk` bigint DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Ttl` varchar(100) DEFAULT NULL,
  `Jenis_kelamin` varchar(100) DEFAULT NULL,
  `Agama` varchar(100) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `Pekerjaan` varchar(100) DEFAULT NULL,
  `Nik_ayah` bigint DEFAULT NULL,
  `Nama_ayah` varchar(100) DEFAULT NULL,
  `Ttl_ayah` varchar(100) DEFAULT NULL,
  `Agama_ayah` varchar(100) DEFAULT NULL,
  `Pekerjaan_ayah` varchar(100) DEFAULT NULL,
  `Penghasilan_ayah` int DEFAULT NULL,
  `Nik_ibu` bigint DEFAULT NULL,
  `Nama_ibu` varchar(100) DEFAULT NULL,
  `Ttl_ibu` varchar(100) DEFAULT NULL,
  `Agama_ibu` varchar(100) DEFAULT NULL,
  `Pekerjaan_ibu` varchar(100) DEFAULT NULL,
  `Penghasilan_ibu` int DEFAULT NULL,
  `ktp` varchar(100) DEFAULT NULL,
  `kk` varchar(100) DEFAULT NULL,
  `Status_penghasilanorangtua` varchar(100) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  PRIMARY KEY (`id_penghasilan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `penghasilan_orang_tua` */

insert  into `penghasilan_orang_tua`(`id_penghasilan`,`Tanggal_penghasilan`,`No_kk`,`Nik`,`Nama`,`Ttl`,`Jenis_kelamin`,`Agama`,`Alamat`,`Pekerjaan`,`Nik_ayah`,`Nama_ayah`,`Ttl_ayah`,`Agama_ayah`,`Pekerjaan_ayah`,`Penghasilan_ayah`,`Nik_ibu`,`Nama_ibu`,`Ttl_ibu`,`Agama_ibu`,`Pekerjaan_ibu`,`Penghasilan_ibu`,`ktp`,`kk`,`Status_penghasilanorangtua`,`created_id`,`updated_id`) values 
(1,'2023-05-20',1234567890123456,1234567890123456,'Andi','Jakarta, 1 Januari 2000','Laki-laki','Islam','Jl. Mawar Indah No. 13','Wiraswasta',2345678901234567,'Bapak Andi','Bandung, 1 Januari 1970','Islam','Petani',3000000,3456789012345678,'Ibu Andi','Surabaya, 1 Januari 1975','Islam','Ibu Rumah Tangga',2000000,'ktp_andi.jpg','kk_andi.jpg','Terverifikasi',NULL,NULL),
(2,'2024-06-01',1234567890111111,1111111111111111,'rosa','belopa 20 april 19998','Perempuan','Islam','lauwa','mahssh',228377,'sjshjs','jhysg','Hindu','djdjd',500000,92887782,'jdhjdh','dkjdid','Kristen Protestan','dkjdd',500000,'download.png','20240113_214135_0000.png','Terverifikasi',NULL,NULL),
(3,'2024-06-04',33131,2121313,'Haerul Fatah','Karanganyar,22 Maret 2004','Laki-laki','Islam','jl lawu','Karyawan',331311,'Teguh','Karanganyar,20 Oktober 1975','Islam','Pegawai Swasta',3000000,3313131,'Dwi','Solo,12 September 1976','Islam','Ibu Rumah Tangga',2000000,'Screenshot_2024-02-24_223426.png','Screenshot_2024-02-22_205059.png','Terverifikasi',5,NULL);

/*Table structure for table `profil` */

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id_profil` int NOT NULL AUTO_INCREMENT,
  `Tanggal_profil` date DEFAULT NULL,
  `Sambutan_kepaladesa` text,
  `Visi` text,
  `Misi` text,
  `Jam_kerja` text,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `profil` */

insert  into `profil`(`id_profil`,`Tanggal_profil`,`Sambutan_kepaladesa`,`Visi`,`Misi`,`Jam_kerja`) values 
(1,'2023-05-20','Selamat datang di kantorDesa Lauwa.','Menjadi desa yang makmur dan sejahtera.','Meningkatkan kesejahteraan masyarakat.','Senin-Jumat 08:00-16:00');

/*Table structure for table `spkck` */

DROP TABLE IF EXISTS `spkck`;

CREATE TABLE `spkck` (
  `id_pengantarskck` int NOT NULL AUTO_INCREMENT,
  `Tanggal_pengantarskck` date DEFAULT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Ttl` varchar(100) DEFAULT NULL,
  `Jenis_kelamin` varchar(100) DEFAULT NULL,
  `Pekerjaan` varchar(100) DEFAULT NULL,
  `Agama` varchar(100) DEFAULT NULL,
  `Status_kawin` varchar(100) DEFAULT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `No_kk` bigint DEFAULT NULL,
  `Nik` bigint DEFAULT NULL,
  `Ktp` varchar(100) DEFAULT NULL,
  `Status_pengantarskck` varchar(100) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  PRIMARY KEY (`id_pengantarskck`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `spkck` */

insert  into `spkck`(`id_pengantarskck`,`Tanggal_pengantarskck`,`Nama`,`Ttl`,`Jenis_kelamin`,`Pekerjaan`,`Agama`,`Status_kawin`,`Alamat`,`No_kk`,`Nik`,`Ktp`,`Status_pengantarskck`,`created_id`,`updated_id`) values 
(1,'2023-05-20','Tono','Jakarta, 6 Juni 1985','Perempuan','Wiraswasta','Islam','Belum Kawin','Jl. Merdeka No. 50',6543211234567890,1234567890123456,'ktp_tono.jpg','Terverifikasi',NULL,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `Nama_user` varchar(100) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `level` int DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`Nama_user`,`Username`,`Password`,`level`) values 
(1,'Magfira Islamia','admin','0192023a7bbd73250516f069df18b500',1),
(5,'Sayyid','sayyid','653ac11ca60b3e021a8c609c7198acfc',0),
(6,'Tiara','tiara','827ccb0eea8a706c4c34a16891f84e7b',0),
(7,'Dika','dika','202cb962ac59075b964b07152d234b70',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
