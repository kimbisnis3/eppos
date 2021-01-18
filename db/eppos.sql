/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : eppos

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 28/09/2020 10:23:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for makses
-- ----------------------------
DROP TABLE IF EXISTS `makses`;
CREATE TABLE `makses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_level` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `add` tinyint(1) NULL DEFAULT NULL,
  `edit` tinyint(1) NULL DEFAULT NULL,
  `del` tinyint(1) NULL DEFAULT NULL,
  `option` tinyint(1) NULL DEFAULT NULL,
  `other` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of makses
-- ----------------------------
INSERT INTO `makses` VALUES (1, '2020-06-23 09:52:04', NULL, NULL, NULL, NULL, '2', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (6, '2020-06-23 09:59:18', NULL, NULL, NULL, NULL, '13', '8', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (8, '2020-06-23 10:00:02', NULL, NULL, NULL, NULL, '11', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (9, '2020-06-30 16:28:55', NULL, NULL, NULL, NULL, '1', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (10, '2020-06-30 16:28:56', NULL, NULL, NULL, NULL, '20', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (11, '2020-06-30 16:28:57', NULL, NULL, NULL, NULL, '13', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (12, '2020-06-30 16:28:59', NULL, NULL, NULL, NULL, '18', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (13, '2020-06-30 16:29:00', NULL, NULL, NULL, NULL, '14', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (14, '2020-06-30 16:29:01', NULL, NULL, NULL, NULL, '19', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (15, '2020-06-30 16:29:02', NULL, NULL, NULL, NULL, '8', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (16, '2020-06-30 16:29:03', NULL, NULL, NULL, NULL, '12', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (17, '2020-06-30 16:29:04', NULL, NULL, NULL, NULL, '16', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (18, '2020-06-30 16:29:05', NULL, NULL, NULL, NULL, '17', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (19, '2020-06-30 16:29:06', NULL, NULL, NULL, NULL, '3', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (20, '2020-06-30 16:29:07', NULL, NULL, NULL, NULL, '10', '2', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (21, '2020-06-30 16:29:28', NULL, NULL, NULL, NULL, '18', '8', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (22, '2020-06-30 16:29:30', NULL, NULL, NULL, NULL, '19', '8', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (23, '2020-06-30 16:29:33', NULL, NULL, NULL, NULL, '8', '8', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (24, '2020-06-30 16:33:32', NULL, NULL, NULL, NULL, '13', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (25, '2020-06-30 16:33:33', NULL, NULL, NULL, NULL, '18', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (28, '2020-06-30 16:33:36', NULL, NULL, NULL, NULL, '20', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (29, '2020-06-30 16:33:37', NULL, NULL, NULL, NULL, '1', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (30, '2020-06-30 16:33:38', NULL, NULL, NULL, NULL, '14', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (31, '2020-06-30 16:34:26', NULL, NULL, NULL, NULL, '19', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (32, '2020-06-30 16:34:26', NULL, NULL, NULL, NULL, '17', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (33, '2020-06-30 16:34:27', NULL, NULL, NULL, NULL, '16', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (34, '2020-06-30 16:34:29', NULL, NULL, NULL, NULL, '12', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (35, '2020-06-30 16:34:29', NULL, NULL, NULL, NULL, '11', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (36, '2020-06-30 16:34:30', NULL, NULL, NULL, NULL, '10', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (37, '2020-06-30 16:34:31', NULL, NULL, NULL, NULL, '8', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (38, '2020-06-30 16:34:32', NULL, NULL, NULL, NULL, '3', '9', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (39, '2020-06-30 16:34:32', NULL, NULL, NULL, NULL, '2', '9', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for mcustomer
-- ----------------------------
DROP TABLE IF EXISTS `mcustomer`;
CREATE TABLE `mcustomer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0),
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `prov_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kec_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kel_id` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodepos` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodesales` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_bidang` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hp` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `img_profil` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `desc_img_profil` varchar(0) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confirmcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mcustomer
-- ----------------------------
INSERT INTO `mcustomer` VALUES (7, '2019-12-28 00:32:10', '2020-03-28 19:34:11', NULL, 'q', 'Justin Foley', 'Solo', '33', '3372', '3372040', '3372040004', '5t54t', '001', '1', '085879136416', 'google@gmail.com', 'aaa', 'aaa', '/uploads/mcustomer/img1578281137.png', NULL, NULL, 1, NULL);
INSERT INTO `mcustomer` VALUES (8, '2019-12-28 03:02:34', '2020-02-26 16:32:37', NULL, 'q', 'Clay Jensen', 'Jakarta', NULL, NULL, NULL, NULL, '', '001', '1', '085879136416', 'google@gmail.com', 'bbb', 'bbb', '', NULL, NULL, 1, NULL);
INSERT INTO `mcustomer` VALUES (9, '2019-12-30 13:35:20', '2020-01-07 08:12:20', NULL, 'q', 'Jessica', 'Jakarta', NULL, NULL, NULL, NULL, NULL, '001', '1', '082257119911', 'google@gmail.com', 'ccc', 'ccc', '', NULL, NULL, 1, NULL);

-- ----------------------------
-- Table structure for mindukmenu
-- ----------------------------
DROP TABLE IF EXISTS `mindukmenu`;
CREATE TABLE `mindukmenu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `urutan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aktif` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mindukmenu
-- ----------------------------
INSERT INTO `mindukmenu` VALUES (1, '2020-06-25 12:11:28', '2020-06-25 12:11:28', NULL, NULL, 'MASTER', 'Master', 'fa fa-database', NULL, 'master', '4', '1');
INSERT INTO `mindukmenu` VALUES (2, '2020-06-25 12:11:30', '2020-06-25 12:11:30', NULL, NULL, 'TRANS', 'Transaksi', 'fas fa-tags', NULL, 'trans', '6', '1');
INSERT INTO `mindukmenu` VALUES (3, '2020-06-22 14:07:22', '2020-06-22 14:07:22', NULL, NULL, 'REPORT', 'Laporan', 'far fa-file-alt', NULL, 'report', '9', '1');
INSERT INTO `mindukmenu` VALUES (4, '2020-06-25 12:11:29', '2020-06-25 12:11:29', NULL, NULL, 'PRODUK', 'Produk', 'fas fa-box', NULL, 'produk', '5', '1');

-- ----------------------------
-- Table structure for mktgproduk
-- ----------------------------
DROP TABLE IF EXISTS `mktgproduk`;
CREATE TABLE `mktgproduk`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT NULL,
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `artikel` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `aktif` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mktgproduk
-- ----------------------------
INSERT INTO `mktgproduk` VALUES (5, '2020-01-17 11:28:15', '2020-06-22 13:34:02', 'q', 'q', '3', 'Kategori 3', '/uploads/mktgproduk/img-1592807641.png', '3', 'vvvv', 1);
INSERT INTO `mktgproduk` VALUES (58, '2020-06-22 13:34:52', NULL, 'q', NULL, 'ddd', 'ddd', NULL, NULL, 'ddd', 1);

-- ----------------------------
-- Table structure for mlevel
-- ----------------------------
DROP TABLE IF EXISTS `mlevel`;
CREATE TABLE `mlevel`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `super` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mlevel
-- ----------------------------
INSERT INTO `mlevel` VALUES (1, '2020-06-22 12:33:47', '2020-06-22 12:33:47', NULL, NULL, 'PUSAT', 'ADMIN SUPER', '1', 'ssss');
INSERT INTO `mlevel` VALUES (2, '2020-06-24 13:13:26', '2020-06-24 13:13:26', 'q', NULL, NULL, 'Administrator', NULL, '-');
INSERT INTO `mlevel` VALUES (8, '2020-06-24 13:11:23', '2020-06-24 13:11:23', 'q', NULL, NULL, 'Kasir', NULL, '-');
INSERT INTO `mlevel` VALUES (9, '2020-06-24 13:13:31', NULL, 'q', NULL, NULL, 'Pimpinan', NULL, '-');

-- ----------------------------
-- Table structure for mmenu
-- ----------------------------
DROP TABLE IF EXISTS `mmenu`;
CREATE TABLE `mmenu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_indukmenu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `urutan` int(100) NULL DEFAULT NULL,
  `aktif` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mmenu
-- ----------------------------
INSERT INTO `mmenu` VALUES (1, '2020-06-22 13:22:05', '2020-06-22 13:22:05', NULL, NULL, NULL, 'Kategori Produk', 'far fa-circle', 'mktgproduk', 'mktgproduk', 'PRODUK', 1, '1', NULL);
INSERT INTO `mmenu` VALUES (2, '2020-01-03 12:57:09', '2020-01-03 12:57:09', NULL, NULL, NULL, 'Master User', 'far fa-circle', 'muser', 'muser', 'MASTER', 99, '1', NULL);
INSERT INTO `mmenu` VALUES (3, '2020-06-22 17:18:32', '2020-06-22 17:18:32', NULL, NULL, NULL, 'Data Perusahaan', 'far fa-circle', 'company', 'company', 'MASTER', 99, '1', NULL);
INSERT INTO `mmenu` VALUES (4, '2020-06-22 19:44:05', '2020-06-22 19:44:05', NULL, NULL, NULL, 'Master Sub Kategori Produk', 'far fa-circle', 'msubktgproduk', 'msubktgproduk', 'MASTER', 3, '0', NULL);
INSERT INTO `mmenu` VALUES (8, '2020-06-22 13:22:15', '2020-06-22 13:22:15', NULL, NULL, NULL, 'Produk', 'far fa-circle', 'mproduk', 'mproduk', 'PRODUK', 3, '1', NULL);
INSERT INTO `mmenu` VALUES (10, '2020-06-22 11:31:18', '2020-06-22 11:31:18', NULL, NULL, NULL, 'Master Level', 'far fa-circle', 'mlevel', 'mlevel', 'MASTER', 9999, '1', NULL);
INSERT INTO `mmenu` VALUES (11, '2020-06-22 12:45:42', '2020-06-22 12:45:42', NULL, NULL, NULL, 'Supplier', 'far fa-user', 'msupplier', 'msupplier', 'N', 2, '1', NULL);
INSERT INTO `mmenu` VALUES (12, '2020-06-25 12:10:50', '2020-06-25 12:10:50', NULL, NULL, NULL, 'Customer', 'fas fa-plane', 'mcustomer', 'mcustomer', 'N', 3, '1', NULL);
INSERT INTO `mmenu` VALUES (13, '2020-06-22 11:46:35', '2020-06-22 11:46:35', NULL, NULL, NULL, 'Dashboard', 'fas fa-tachometer-alt', 'dashboard', 'dashboard', 'N', 1, '1', NULL);
INSERT INTO `mmenu` VALUES (14, '2020-06-22 11:49:57', '2020-06-22 11:49:57', NULL, NULL, NULL, 'Satuan', 'far fa-circle', 'msatuan', 'msatuan', 'PRODUK', 2, '1', NULL);
INSERT INTO `mmenu` VALUES (16, '2020-06-22 16:34:43', '2020-06-22 16:34:43', NULL, NULL, NULL, 'Stok In', 'far fa-circle', 'tstokin', 'tstokin', 'TRANS', 4, '1', NULL);
INSERT INTO `mmenu` VALUES (17, '2020-06-22 16:35:16', '2020-06-22 16:35:16', NULL, NULL, NULL, 'Stok Out', 'far fa-circle', 'tstokout', 'tstokout', 'TRANS', 5, '1', NULL);
INSERT INTO `mmenu` VALUES (18, '2020-06-23 11:10:48', '2020-06-23 11:10:48', NULL, NULL, NULL, 'Penjualan', 'fas fa-shopping-cart', 'sales', 'sales', 'TRANS', 1, '1', NULL);
INSERT INTO `mmenu` VALUES (19, '2020-06-24 13:34:53', '2020-06-24 13:34:53', NULL, NULL, NULL, 'Data Penjualan', 'far fa-circle', 'order', 'order', 'TRANS', 2, '1', NULL);
INSERT INTO `mmenu` VALUES (20, '2020-06-25 12:23:12', '2020-06-25 12:23:12', NULL, NULL, NULL, 'Laporan Penjualan', 'far fa-circle', 'lapsale', 'lapsale', 'REPORT', 1, '1', NULL);

-- ----------------------------
-- Table structure for mproduk
-- ----------------------------
DROP TABLE IF EXISTS `mproduk`;
CREATE TABLE `mproduk`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT NULL,
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_ktgproduk` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_subktgproduk` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_anakktgproduk` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_satuan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `berat` int(255) NULL DEFAULT NULL,
  `brand` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `artikel` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `harga` float(255, 0) NULL DEFAULT NULL,
  `diskon` int(255) NULL DEFAULT NULL,
  `stok` int(255) NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `aktif` tinyint(1) NULL DEFAULT 0,
  `tampildepan` tinyint(1) NULL DEFAULT NULL,
  `fitur` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mproduk
-- ----------------------------
INSERT INTO `mproduk` VALUES (6, '2020-03-27 12:06:13', '2020-06-22 15:07:01', 'q', 'q', '11112', '58', NULL, NULL, '6', 'Produk A', NULL, NULL, '', 'deskripsi', 200000, NULL, 12, 'Keterangan', 1, NULL, 1);
INSERT INTO `mproduk` VALUES (7, '2020-03-27 12:06:13', '2020-06-22 19:38:49', 'q', 'q', '11113', '5', NULL, NULL, '4', 'Produk B', NULL, NULL, '/uploads/mproduk/img-1592829529.jpeg', 'deskripsi', 200001, NULL, -3, 'Keterangan', 1, NULL, 1);
INSERT INTO `mproduk` VALUES (8, '2020-03-27 12:06:13', '2020-06-22 15:05:15', 'q', 'q', '5555', '5', NULL, NULL, '6', 'Produk C', NULL, NULL, '', 'deskripsi', 200002, NULL, 12, 'Keterangan', 1, NULL, 1);
INSERT INTO `mproduk` VALUES (9, '2020-03-27 12:06:13', '2020-06-22 17:14:19', 'q', 'q', '11115', '5', NULL, NULL, '4', 'Produk D', NULL, NULL, '', 'deskripsi', 200003, NULL, 71, 'Keterangan', 1, NULL, NULL);
INSERT INTO `mproduk` VALUES (10, '2020-03-27 12:06:13', '2020-06-22 15:18:30', 'q', 'q', '11116', '5', NULL, NULL, '4', 'Produk E', NULL, NULL, '', 'deskripsi', 200004, NULL, -3, 'Keterangan', 1, NULL, NULL);
INSERT INTO `mproduk` VALUES (11, '2020-03-27 12:06:13', '2020-06-22 15:19:24', 'q', 'q', '11117', '58', NULL, NULL, '4', 'Produk F', NULL, NULL, '', 'deskripsi', 200005, NULL, 30, 'Keterangan', 1, NULL, NULL);
INSERT INTO `mproduk` VALUES (12, '2020-03-27 12:06:13', '2020-06-22 15:19:31', 'q', 'q', '11118', '58', NULL, NULL, '4', 'Produk A', NULL, NULL, '', 'deskripsi', 200006, NULL, 6, 'Keterangan', 1, NULL, NULL);
INSERT INTO `mproduk` VALUES (13, '2020-03-27 12:06:13', '2020-06-22 15:19:40', 'q', 'q', '11119', '58', NULL, NULL, '4', 'Produk A', NULL, NULL, '', 'deskripsi', 200007, NULL, 66, 'Keterangan', 1, NULL, NULL);

-- ----------------------------
-- Table structure for msatuan
-- ----------------------------
DROP TABLE IF EXISTS `msatuan`;
CREATE TABLE `msatuan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0),
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `konversisatuan` int(255) NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of msatuan
-- ----------------------------
INSERT INTO `msatuan` VALUES (4, '2020-06-22 13:51:29', '2020-06-22 15:19:04', 'q', 'q', NULL, 'Pack', NULL, 'cascascsacas');
INSERT INTO `msatuan` VALUES (6, '2020-06-22 13:51:36', '2020-06-22 15:18:54', 'q', 'q', NULL, 'Pieces', NULL, 'zxzxzx');

-- ----------------------------
-- Table structure for msupplier
-- ----------------------------
DROP TABLE IF EXISTS `msupplier`;
CREATE TABLE `msupplier`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0),
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kodepos` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodesales` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hp` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `confirmcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of msupplier
-- ----------------------------
INSERT INTO `msupplier` VALUES (4, '2020-06-23 10:09:54', NULL, 'q', NULL, 'PT A', 'xx', NULL, NULL, NULL, '232', NULL, NULL, 1, 'sdad');
INSERT INTO `msupplier` VALUES (5, '2020-06-23 10:10:06', NULL, 'q', NULL, 'PT B', 'dsadsa', NULL, NULL, NULL, '3242342', NULL, NULL, 1, 'sdsadsad');

-- ----------------------------
-- Table structure for muser
-- ----------------------------
DROP TABLE IF EXISTS `muser`;
CREATE TABLE `muser`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_level` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aktif` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 't',
  `lastlogin` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `super` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of muser
-- ----------------------------
INSERT INTO `muser` VALUES (2, '2020-09-03 16:15:00', '2020-09-03 16:15:00', 'x', 'q', 'USR001', 'edo', 'qq', NULL, 'q', 'q', '/uploads/muser/a.png', 'qqq', '1', 't', '2020-09-03 16:15:00', 1);
INSERT INTO `muser` VALUES (4, '2020-06-30 16:31:55', '2020-06-30 16:31:55', NULL, 'q', NULL, 'Admin', 'admin@admin.com', NULL, 'admin', 'admin', '/uploads/muser/img-1578301538.png', '', '2', 't', '2020-06-30 16:31:55', NULL);
INSERT INTO `muser` VALUES (5, '2020-03-18 14:30:28', '2020-03-18 14:30:28', 'q', NULL, 'USR003', 'i', 'i', NULL, 'i', 'i', NULL, 'i', '8', 't', '2020-03-18 14:30:28', NULL);
INSERT INTO `muser` VALUES (6, '2020-07-02 11:58:24', '2020-07-02 11:58:24', 'q', NULL, 'USR004', 'Edo', 'edo@gmail.com', NULL, 'edo1', 'edo1', NULL, '-', '8', 't', '2020-07-02 11:58:24', NULL);
INSERT INTO `muser` VALUES (7, '2020-06-30 16:34:49', '2020-06-30 16:34:49', 'q', NULL, 'USR005', 'Edo', '', NULL, 'edo2', 'edo2', NULL, '-', '9', 't', '2020-06-30 16:34:49', NULL);

-- ----------------------------
-- Table structure for tcompany
-- ----------------------------
DROP TABLE IF EXISTS `tcompany`;
CREATE TABLE `tcompany`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_short` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telp2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `splash` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `artikel` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `prov_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `prov_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dist_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dist_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `openreg` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tcompany
-- ----------------------------
INSERT INTO `tcompany` VALUES (1, 'EPPOS', 'aaa', 'Menlo Park, New York and San Francisco.', '98589949595', NULL, 'zzz', NULL, '/uploads/company/img-1592979503.jpeg', '/uploads/company/img-1578301402.jpg', NULL, 'zzz', '10', 'Jawa Tengah', '445', 'Surakarta (Solo)', '6165', 'Pasar Kliwon', 0);

-- ----------------------------
-- Table structure for tconfig
-- ----------------------------
DROP TABLE IF EXISTS `tconfig`;
CREATE TABLE `tconfig`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `key` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `value` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `value2` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `value3` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tconfig
-- ----------------------------
INSERT INTO `tconfig` VALUES (1, '2020-01-01 03:48:26', '2020-01-01 03:48:26', NULL, NULL, NULL, 'splash', '/uploads/config/splash.png', NULL, NULL, NULL, NULL);
INSERT INTO `tconfig` VALUES (2, '2020-05-18 11:31:25', '2020-05-18 11:31:25', NULL, 'q', NULL, 'eula', 'title', 'rrrr', 'EULA', 'EULA', '<b>6666666</b>');
INSERT INTO `tconfig` VALUES (3, '2020-05-18 11:31:26', '2020-05-18 11:31:26', NULL, NULL, NULL, 'tos', NULL, NULL, 'Term Of Service', 'Term Of Service', 'dasd');
INSERT INTO `tconfig` VALUES (4, '2020-05-18 11:31:27', '2020-05-18 11:31:27', NULL, NULL, NULL, 'privacy', NULL, NULL, 'Privacy & Policy', 'Privacy & Policy', 'adasd');

-- ----------------------------
-- Table structure for torder
-- ----------------------------
DROP TABLE IF EXISTS `torder`;
CREATE TABLE `torder`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT NULL,
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `tglwaktu` datetime(0) NULL DEFAULT NULL,
  `tglorder` date NULL DEFAULT NULL,
  `ref_cust` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total` float NULL DEFAULT NULL,
  `diskon` float NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `void` tinyint(1) NULL DEFAULT 0,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `cash` float NULL DEFAULT NULL,
  `cashback` float NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of torder
-- ----------------------------
INSERT INTO `torder` VALUES (19, '2020-06-24 13:02:37', NULL, 'q', NULL, '202006240001', '2020-06-24', NULL, NULL, '0', '2', 4680070, NULL, NULL, 0, 'xxxxx', NULL, NULL);
INSERT INTO `torder` VALUES (20, '2020-06-24 13:03:55', NULL, 'q', NULL, '202006240002', '2020-06-24', NULL, NULL, '0', '2', 540004, 10, NULL, 0, 'xxxx', NULL, NULL);
INSERT INTO `torder` VALUES (21, '2020-06-24 13:04:58', NULL, 'q', NULL, '202006240003', '2020-06-24', NULL, NULL, '0', '2', 600005, 0, NULL, 0, 'gggg', NULL, NULL);
INSERT INTO `torder` VALUES (22, '2020-06-24 13:07:05', NULL, 'q', NULL, '202006240004', '2020-06-24', NULL, NULL, '0', '2', 4600030, 0, NULL, 0, '', NULL, NULL);
INSERT INTO `torder` VALUES (23, '2020-06-24 13:09:26', NULL, 'q', NULL, '202006240005', '2020-06-24', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', NULL, NULL);
INSERT INTO `torder` VALUES (24, '2020-06-24 13:56:28', NULL, 'q', NULL, '202006240006', '2020-06-24', NULL, NULL, '7', '2', 400004, 0, NULL, 0, '', NULL, NULL);
INSERT INTO `torder` VALUES (25, '2020-06-24 14:07:12', NULL, 'q', NULL, '202006240007', '2020-06-24', NULL, NULL, '7', '2', 0, 0, NULL, 0, '', NULL, NULL);
INSERT INTO `torder` VALUES (26, '2020-06-24 14:08:06', NULL, 'q', NULL, '202006240008', '2020-06-24', NULL, NULL, '0', '2', 0, 0, NULL, 0, '', NULL, NULL);
INSERT INTO `torder` VALUES (27, '2020-06-24 14:08:32', NULL, 'q', NULL, '202006240009', '2020-06-24', NULL, NULL, '0', '2', 200001, 0, NULL, 0, '', NULL, NULL);
INSERT INTO `torder` VALUES (28, '2020-06-24 14:11:41', NULL, 'q', NULL, '202006240010', '2020-06-24', NULL, NULL, '0', '2', 200001, 0, NULL, 0, '', NULL, NULL);
INSERT INTO `torder` VALUES (29, '2020-06-24 14:18:47', NULL, 'q', NULL, '202006240011', '2020-06-24', NULL, NULL, '7', '2', 400004, 0, NULL, 0, '', 100000, 0);
INSERT INTO `torder` VALUES (30, '2020-06-24 14:20:42', NULL, 'q', NULL, '202006240012', '2020-06-24', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 300000, 0);
INSERT INTO `torder` VALUES (31, '2020-06-24 14:24:15', NULL, 'q', NULL, '202006240013', '2020-06-24', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 300000, 99997);
INSERT INTO `torder` VALUES (32, '2020-06-24 14:27:17', NULL, 'q', NULL, '202006240014', '2020-06-24', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 100000000, 99800000);
INSERT INTO `torder` VALUES (33, '2020-06-24 14:28:22', NULL, 'q', NULL, '202006240015', '2020-06-24', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 10000000, 9800000);
INSERT INTO `torder` VALUES (34, '2020-06-30 16:16:19', NULL, 'q', NULL, '202006300001', '2020-06-30', NULL, NULL, '0', '2', 2400030, 0, NULL, 0, '', 2500000, 99967);
INSERT INTO `torder` VALUES (35, '2020-06-30 16:23:32', NULL, 'q', NULL, '202006300002', '2020-06-30', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 250000, 49997);
INSERT INTO `torder` VALUES (36, '2020-06-30 16:24:58', NULL, 'q', NULL, '202006300003', '2020-06-30', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 250000, 49997);
INSERT INTO `torder` VALUES (37, '2020-06-30 16:25:55', NULL, 'q', NULL, '202006300004', '2020-06-30', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 250000, 49997);
INSERT INTO `torder` VALUES (38, '2020-06-30 16:26:22', NULL, 'q', NULL, '202006300005', '2020-06-30', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 250000, 49997);
INSERT INTO `torder` VALUES (39, '2020-06-30 16:26:57', NULL, 'q', NULL, '202006300006', '2020-06-30', NULL, NULL, '0', '2', 200003, 0, NULL, 0, '', 250000, 49997);
INSERT INTO `torder` VALUES (40, '2020-06-30 16:27:34', NULL, 'q', NULL, '202006300007', '2020-06-30', NULL, NULL, '0', '2', 400010, 0, NULL, 0, '', 500000, 99990);

-- ----------------------------
-- Table structure for torderdet
-- ----------------------------
DROP TABLE IF EXISTS `torderdet`;
CREATE TABLE `torderdet`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_order` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_produk` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` float NULL DEFAULT NULL,
  `harga` float NULL DEFAULT NULL,
  `hrgbayar` float NULL DEFAULT NULL,
  `diskon` float NULL DEFAULT NULL,
  `total` float NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 68 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of torderdet
-- ----------------------------
INSERT INTO `torderdet` VALUES (38, '2020-06-24 13:02:37', NULL, NULL, NULL, '19', '7', 2, 200001, NULL, NULL, 400002, NULL);
INSERT INTO `torderdet` VALUES (39, '2020-06-24 13:02:37', NULL, NULL, NULL, '19', '9', 24, 200003, NULL, NULL, 4800070, NULL);
INSERT INTO `torderdet` VALUES (40, '2020-06-24 13:03:55', NULL, NULL, NULL, '20', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (41, '2020-06-24 13:03:55', NULL, NULL, NULL, '20', '7', 2, 200001, NULL, NULL, 400002, NULL);
INSERT INTO `torderdet` VALUES (42, '2020-06-24 13:04:58', NULL, NULL, NULL, '21', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (43, '2020-06-24 13:04:58', NULL, NULL, NULL, '21', '7', 2, 200001, NULL, NULL, 400002, NULL);
INSERT INTO `torderdet` VALUES (44, '2020-06-24 13:07:05', NULL, NULL, NULL, '22', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (45, '2020-06-24 13:07:05', NULL, NULL, NULL, '22', '11', 1, 200005, NULL, NULL, 200005, NULL);
INSERT INTO `torderdet` VALUES (46, '2020-06-24 13:07:05', NULL, NULL, NULL, '22', '7', 21, 200001, NULL, NULL, 4200020, NULL);
INSERT INTO `torderdet` VALUES (47, '2020-06-24 13:09:26', NULL, NULL, NULL, '23', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (48, '2020-06-24 13:56:28', NULL, NULL, NULL, '24', '7', 1, 200001, NULL, NULL, 200001, NULL);
INSERT INTO `torderdet` VALUES (49, '2020-06-24 13:56:28', NULL, NULL, NULL, '24', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (50, '2020-06-24 14:08:32', NULL, NULL, NULL, '27', '7', 1, 200001, NULL, NULL, 200001, NULL);
INSERT INTO `torderdet` VALUES (51, '2020-06-24 14:11:41', NULL, NULL, NULL, '28', '7', 1, 200001, NULL, NULL, 200001, NULL);
INSERT INTO `torderdet` VALUES (52, '2020-06-24 14:18:47', NULL, NULL, NULL, '29', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (53, '2020-06-24 14:18:47', NULL, NULL, NULL, '29', '7', 1, 200001, NULL, NULL, 200001, NULL);
INSERT INTO `torderdet` VALUES (54, '2020-06-24 14:20:42', NULL, NULL, NULL, '30', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (55, '2020-06-24 14:24:15', NULL, NULL, NULL, '31', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (56, '2020-06-24 14:27:17', NULL, NULL, NULL, '32', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (57, '2020-06-24 14:28:22', NULL, NULL, NULL, '33', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (58, '2020-06-30 16:16:19', NULL, NULL, NULL, '34', '7', 4, 200001, NULL, NULL, 800004, NULL);
INSERT INTO `torderdet` VALUES (59, '2020-06-30 16:16:19', NULL, NULL, NULL, '34', '9', 3, 200003, NULL, NULL, 600009, NULL);
INSERT INTO `torderdet` VALUES (60, '2020-06-30 16:16:19', NULL, NULL, NULL, '34', '10', 5, 200004, NULL, NULL, 1000020, NULL);
INSERT INTO `torderdet` VALUES (61, '2020-06-30 16:23:32', NULL, NULL, NULL, '35', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (62, '2020-06-30 16:24:58', NULL, NULL, NULL, '36', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (63, '2020-06-30 16:25:55', NULL, NULL, NULL, '37', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (64, '2020-06-30 16:26:22', NULL, NULL, NULL, '38', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (65, '2020-06-30 16:26:57', NULL, NULL, NULL, '39', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (66, '2020-06-30 16:27:34', NULL, NULL, NULL, '40', '9', 1, 200003, NULL, NULL, 200003, NULL);
INSERT INTO `torderdet` VALUES (67, '2020-06-30 16:27:34', NULL, NULL, NULL, '40', '13', 1, 200007, NULL, NULL, 200007, NULL);

-- ----------------------------
-- Table structure for tstokin
-- ----------------------------
DROP TABLE IF EXISTS `tstokin`;
CREATE TABLE `tstokin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_produk` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_supplier` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `tglwaktu` datetime(6) NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `qty` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tstokin
-- ----------------------------
INSERT INTO `tstokin` VALUES (2, '2020-06-22 17:01:44', NULL, 'q', NULL, NULL, '7', '3', '2020-06-22', NULL, NULL, 56);
INSERT INTO `tstokin` VALUES (3, '2020-06-22 17:05:45', NULL, 'q', NULL, NULL, '7', '3', '2020-06-22', NULL, NULL, 5);
INSERT INTO `tstokin` VALUES (4, '2020-06-22 17:06:49', NULL, 'q', NULL, NULL, '7', '3', '2020-06-22', NULL, NULL, 3);
INSERT INTO `tstokin` VALUES (6, '2020-06-22 17:15:40', NULL, 'q', NULL, NULL, '9', '3', '2020-06-22', NULL, NULL, 23);
INSERT INTO `tstokin` VALUES (7, '2020-06-22 17:16:01', NULL, 'q', NULL, NULL, '9', '3', '2020-06-22', NULL, 'qq', 1);
INSERT INTO `tstokin` VALUES (8, '2020-06-23 10:16:00', NULL, 'q', NULL, NULL, '9', '4', '2020-06-23', NULL, 'dqwdwq', 20);
INSERT INTO `tstokin` VALUES (9, '2020-06-23 10:17:03', NULL, 'q', NULL, NULL, '11', '4', '2020-06-23', NULL, 'efefe', 25);
INSERT INTO `tstokin` VALUES (10, '2020-06-23 10:20:22', NULL, 'q', NULL, NULL, '9', '4', '2020-06-23', NULL, 'rusak', 34);

-- ----------------------------
-- Table structure for tstokout
-- ----------------------------
DROP TABLE IF EXISTS `tstokout`;
CREATE TABLE `tstokout`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT current_timestamp(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_produk` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_supplier` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl` date NULL DEFAULT NULL,
  `tglwaktu` datetime(6) NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `qty` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tstokout
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
