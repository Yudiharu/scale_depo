/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.19 : Database - scale-depo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`scale-depo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `scale-depo`;

/*Table structure for table `barangs` */

DROP TABLE IF EXISTS `barangs`;

CREATE TABLE `barangs` (
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `barangs` */

insert  into `barangs`(`kode_barang`,`nama_barang`,`tipe_barang`,`created_at`,`updated_at`) values 
('01','BAJA','RAW MATERIAL','2018-11-19 10:15:37','2018-11-27 09:13:04'),
('02','SOLAR','FINISH GOOD','2018-11-19 10:56:53','2018-11-19 10:56:53'),
('03','SPARE PART','RAW MATERIAL','2018-11-19 10:57:11','2018-11-19 10:57:11'),
('04','BAN TRUK','RAW MATERIAL','2018-11-19 10:58:27','2018-11-19 10:58:27');

/*Table structure for table `company` */

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `kode_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_company`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `company` */

insert  into `company`(`kode_company`,`nama_company`,`alamat`,`no_telepon`,`created_at`,`updated_at`) values 
('01','PT. GEMILANG UNGGUL INTERNASIONAL','JLN. SLAMET RIADY LR. LAWANG KIDUL LAUT NO. 1977 R...','0','2018-11-01 11:12:24','2018-11-27 09:15:12'),
('02','PT. GAJAH UNGGUL INTERNASIONAL','JL. SLAMET RIYADI LR. LAWANG KIDUL LAUT NO. 1977 R...','0711-654321','2018-11-01 11:13:05','2018-11-01 11:13:05'),
('03','PT. GEMILANG UTAMA INTERNASIONAL','JL. SLAMET RIYADY LR. LAWANG KIDUL LAUT NO. 1977 R...','0711-123456','2018-11-01 11:14:01','2018-11-01 11:14:01'),
('04','PT. GAJAH UTAMA INTERNSIONAL','JLN. SLAMET RIADY LR. LAWANG KIDUL LAUT NO. 1977 R...',NULL,'2018-11-01 11:24:43','2018-11-01 11:24:43'),
('05','PT. LAUTAN JAYA MANGGALA','JLN. SLAMET RIADY LR. LAWANG KIDUL LAUT NO. 1977 R...',NULL,'2018-11-01 11:25:32','2018-11-01 11:25:32'),
('06','PT. SELARAS UNGGUL BERSAMA','JLN. SLAMET RIADY LR. LAWANG KIDUL LAUT NO. 1977 R...',NULL,'2018-11-01 11:25:53','2018-11-01 11:25:53');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `kode_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `customer` */

insert  into `customer`(`kode_customer`,`nama_customer`,`no_telepon`,`created_at`,`updated_at`) values 
('01','EGGI','0711879231','2018-11-19 09:58:08','2018-11-27 09:13:31'),
('02','MARIO','089744221133','2018-11-19 09:58:31','2018-11-19 09:58:31'),
('03','ANDRE','085266219045','2018-11-19 09:59:16','2018-11-19 09:59:16'),
('04','FAUZAN','085787342211','2018-11-19 10:00:15','2018-11-19 10:00:15'),
('05','RUDI','085611457698','2018-11-19 10:00:44','2018-11-19 10:00:44');

/*Table structure for table `kategori_coa` */

DROP TABLE IF EXISTS `kategori_coa`;

CREATE TABLE `kategori_coa` (
  `kode_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kategori_coa` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(32,'2014_10_12_000000_create_users_table',1),
(33,'2014_10_12_100000_create_password_resets_table',1),
(34,'2018_09_18_025728_laratrust_setup_tables',1),
(35,'2018_09_18_030309_table_permissions_add_field_tab',1),
(36,'2018_10_06_032849_create_table_kategori_coa',1),
(37,'2018_10_09_024656_create_customer_table',1),
(38,'2018_10_09_062342_create_company_table',1),
(39,'2018_10_10_040143_create_barang_table',1),
(40,'2018_10_11_013212_create_barangs_table',1),
(41,'2018_10_11_070300_create_transaksis_table',1),
(42,'2018_10_17_110318_create_size_tipe_masters_table',1),
(43,'2018_10_20_133749_create_suppliers_table',2);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values 
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(6,1),
(7,1),
(8,1),
(9,1),
(10,1),
(1,2),
(2,2),
(3,2),
(4,2),
(9,2),
(10,2),
(9,3),
(10,3);

/*Table structure for table `permission_user` */

DROP TABLE IF EXISTS `permission_user`;

CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_user` */

insert  into `permission_user`(`permission_id`,`user_id`,`user_type`) values 
(9,4,'App\\User'),
(10,4,'App\\User'),
(11,4,'App\\User');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`display_name`,`tab`,`description`,`created_at`,`updated_at`) values 
(1,'create-users','Create Users','Users','Create Users','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(2,'read-users','Read Users','Users','Read Users','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(3,'update-users','Update Users','Users','Update Users','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(4,'delete-users','Delete Users','Users','Delete Users','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(5,'create-acl','Create Acl','Acl','Create Acl','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(6,'read-acl','Read Acl','Acl','Read Acl','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(7,'update-acl','Update Acl','Acl','Update Acl','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(8,'delete-acl','Delete Acl','Acl','Delete Acl','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(9,'read-profile','Read Profile','Profile','Read Profile','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(10,'update-profile','Update Profile','Profile','Update Profile','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(11,'create-profile','Create Profile',NULL,'Create Profile','2018-10-17 13:37:27','2018-10-17 13:37:27');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`,`user_type`) values 
(1,1,'App\\User'),
(2,2,'App\\User'),
(3,3,'App\\User');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_at`,`updated_at`) values 
(1,'superadministrator','Superadministrator','Superadministrator','2018-10-17 13:37:25','2018-10-17 13:37:25'),
(2,'administrator','Administrator','Administrator','2018-10-17 13:37:26','2018-10-17 13:37:26'),
(3,'user','User','User','2018-10-17 13:37:26','2018-10-17 13:37:26');

/*Table structure for table `size_tipe_masters` */

DROP TABLE IF EXISTS `size_tipe_masters`;

CREATE TABLE `size_tipe_masters` (
  `id_size` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `size_type` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_size`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `size_tipe_masters` */

insert  into `size_tipe_masters`(`id_size`,`size_type`,`deskripsi`,`created_at`,`updated_at`) values 
(6,'10FT ST','10 FEET STANDARD','2018-11-23 08:47:39','2018-11-23 08:47:39'),
(7,'20FT FR','20 FEET FLAT RACK','2018-11-23 08:48:22','2018-11-23 08:55:07'),
(8,'20FT OT','20 FEET OPEN TOP','2018-11-23 08:48:52','2018-11-23 08:55:20'),
(9,'20FT ST','20 FEET STANDARD','2018-11-23 08:50:58','2018-11-23 08:54:40'),
(10,'40FT FR','40 FEET FLAT RACK','2018-11-23 08:51:39','2018-11-23 08:51:39'),
(11,'40FT HC','40 FEET HIGH CUBE','2018-11-23 08:52:24','2018-11-23 08:52:24'),
(12,'40FT OT','40 FEET OPEN TOP','2018-11-23 08:58:22','2018-11-23 08:58:22'),
(13,'40FT RF','40 FEET REEFER','2018-11-23 08:58:49','2018-11-23 08:58:49'),
(14,'40FT ST','40 FEET STANDARD','2018-11-23 08:59:34','2018-11-23 08:59:34'),
(15,'45FT HC','45 FEET HIGH CUBE','2018-11-23 08:59:57','2018-11-23 08:59:57'),
(16,'45FT RF','45 FEET REEFER','2018-11-23 09:00:13','2018-11-23 09:00:13'),
(17,'45FT ST','45 FEET STANDARD','2018-11-23 09:00:29','2018-11-23 09:00:29');

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `kode_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `suppliers` */

insert  into `suppliers`(`kode_supplier`,`nama_supplier`,`alamat`,`created_at`,`updated_at`) values 
('01','PT. TIMAH','Jln.Slamat Riadi No 34','2018-10-22 08:52:33','2018-11-27 09:14:09'),
('02','PT.ABADI','Jln.Slamet Riadi No 12','2018-10-22 10:50:51','2018-11-19 09:55:46'),
('03','PT.BAJA ABADI','Jln.Soekarno Hatta','2018-11-19 09:56:19','2018-11-19 09:56:19'),
('04','PT.UNGGAL LOGAM','Jln.Tanjung Api-Api','2018-11-19 09:56:54','2018-11-19 09:56:54'),
('05','PT.SUMBER ENERGI','Jln.Raya Talang Kramat','2018-11-19 09:57:21','2018-11-19 09:57:21'),
('06','PT.BAJA TUNGGAL, tbk.','Jln.Slamet Riadi','2018-11-19 11:12:18','2018-11-19 11:12:18');

/*Table structure for table `tb_company` */

DROP TABLE IF EXISTS `tb_company`;

CREATE TABLE `tb_company` (
  `company_code` char(6) DEFAULT NULL,
  `kode_lokasi` varchar(30) DEFAULT NULL,
  `company_name` varchar(300) DEFAULT NULL,
  `alamat` varchar(600) DEFAULT NULL,
  `kota` varchar(90) DEFAULT NULL,
  `kode_pos` varchar(30) DEFAULT NULL,
  `telepon_1` varchar(60) DEFAULT NULL,
  `telepon_2` varchar(60) DEFAULT NULL,
  `fax` varchar(60) DEFAULT NULL,
  `npwp` varchar(90) DEFAULT NULL,
  `tgl_pengukuhan` date DEFAULT NULL,
  `contact_person` varchar(150) DEFAULT NULL,
  `waktu` varchar(30) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_company` */

insert  into `tb_company`(`company_code`,`kode_lokasi`,`company_name`,`alamat`,`kota`,`kode_pos`,`telepon_1`,`telepon_2`,`fax`,`npwp`,`tgl_pengukuhan`,`contact_person`,`waktu`,`tanggal`) values 
('01','HO','PT. GEMILANG UNGGUL INTERNASIONAL','JLN. SLAMET RIADY LR. LAWANG KIDUL LAUT NO. 1977 RT. 022 KEL. LAWANG KIDUL KEC. ILIR TIMUR II','PALEMBANG','30114','0711-717959','','-','03.103.981.1-301.000','2000-01-01','','8:36 am','2015-07-31'),
('02','HO','PT. GAJAH UNGGUL INTERNASIONAL','JL. SLAMET RIYADI LR. LAWANG KIDUL LAUT NO. 1977 RT. 022 KEL. LAWANG KIDUL KEC. ILIR TIMUR II','PALEMBANG','30114','0711-654321','','-','03.103.981.1-301.000','2000-01-01','','1:19 pm','2015-11-05'),
('03','HO','PT. GEMILANG UTAMA INTERNASIONAL','JL. SLAMET RIYADY LR. LAWANG KIDUL LAUT NO. 1977 RT. 022 KEL. LAWANG KIDUL KEC. ILIR TIMUR II','PALEMBANG','30114','0711-123456','','-','03.103.981.1-301.000','2000-01-01','','9:41 am','2015-11-18'),
('04','HO','PT. GAJAH UTAMA INTERNSIONAL','JLN. SLAMET RIADY LR. LAWANG KIDUL LAUT NO. 1977 RT. 022 KEL. LAWANG KIDUL KEC. ILIR TIMUR II','PALEMBANG','','-','-','-','00.000.000.0-000.000','2018-08-25','','9:20 am','2018-08-25'),
('05','HO','PT. LAUTAN JAYA MANGGALA','JLN. SLAMET RIADY LR. LAWANG KIDUL LAUT NO. 1977 RT. 022 KEL. LAWANG KIDUL KEC. ILIR TIMUR II','PALEMBANG','','-','-','-','00.000.000.0-000.000','2018-08-25','','9:21 am','2018-08-25'),
('06','HO','PT. SELARAS UNGGUL BERSAMA','JLN. SLAMET RIADY LR. LAWANG KIDUL LAUT NO. 1977 RT. 022 KEL. LAWANG KIDUL KEC. ILIR TIMUR II','PALEMBANG','','-','-','-','00.000.000.0-000.000','2018-08-25','','9:26 am','2018-08-25');

/*Table structure for table `transaksis` */

DROP TABLE IF EXISTS `transaksis`;

CREATE TABLE `transaksis` (
  `no_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_po` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_polisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tidak Ada',
  `no_container` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tidak Ada',
  `no_seal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tidak Ada',
  `id_size` int(10) DEFAULT NULL,
  `muatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tidak Ada',
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '--',
  `kode_supplier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '--',
  `kode_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '--',
  `kode_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '--',
  `nama_supir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `berat1` int(11) NOT NULL,
  `berat2` int(11) DEFAULT NULL,
  `total_berat` int(11) DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`no_transaksi`),
  KEY `kode_barang` (`kode_barang`),
  KEY `kode_company` (`kode_company`),
  KEY `kode_customer` (`kode_customer`),
  KEY `kode_supplier` (`kode_supplier`),
  CONSTRAINT `transaksis_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barangs` (`kode_barang`),
  CONSTRAINT `transaksis_ibfk_2` FOREIGN KEY (`kode_company`) REFERENCES `company` (`kode_company`),
  CONSTRAINT `transaksis_ibfk_3` FOREIGN KEY (`kode_customer`) REFERENCES `customer` (`kode_customer`),
  CONSTRAINT `transaksis_ibfk_4` FOREIGN KEY (`kode_supplier`) REFERENCES `suppliers` (`kode_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transaksis` */

insert  into `transaksis`(`no_transaksi`,`no_po`,`no_polisi`,`no_container`,`no_seal`,`id_size`,`muatan`,`kode_barang`,`kode_supplier`,`kode_customer`,`kode_company`,`nama_supir`,`tanggal_masuk`,`berat1`,`berat2`,`total_berat`,`keterangan`,`created_at`,`updated_at`) values 
('1TBN0319000001','1','BG 1234 AE','AWEQEE32144','QWERTY4555',NULL,'MINYAK SOLAR','02','02',NULL,NULL,'SUPARNO','2019-03-25 15:00:49',12000,10000,NULL,'WQEWQEWEQ','2019-03-25 15:00:49','2019-03-25 15:00:49');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kode_company` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`kode_company`) values 
(1,'Superadministrator','superadministrator@app.com','$2y$10$PpYetBtTGllAmTwp.WiPd.ob7UZfIf0T/sBPCGA0DH/VrJKpmq.Qi','TVsbp0XRK49EaIzH3WyCbNyrJOA4bA5xr57DWI4uHPp6BLZOfV8gtDBUQDg1','2018-10-17 13:37:26','2018-10-17 13:37:26',NULL),
(2,'Administrator','administrator@app.com','$2y$10$vzLnXRUBo3RpxYAay1G2yOEb8nQD5gVOYvFzZiP2hXkyAq112JtXK',NULL,'2018-10-17 13:37:26','2018-10-17 13:37:26',NULL),
(3,'User','user@app.com','$2y$10$C6di8T9qTIZHAeOO29JV2eX/AJtdFFzybaThzZssJxMxmf.hTd5VS',NULL,'2018-10-17 13:37:27','2018-10-17 13:37:27',NULL),
(4,'Cru User','cru_user@app.com','$2y$10$jKWth4NLSt4HCvJ3L2CjAeZhH5oYI/4AEHYJEx7eXwEWtGw/gqnQ6','z4f9Khqth5','2018-10-17 13:37:27','2018-10-17 13:37:27',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
