/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50626
 Source Host           : 127.0.0.1:3306
 Source Schema         : apps

 Target Server Type    : MySQL
 Target Server Version : 50626
 File Encoding         : 65001

 Date: 31/12/2019 13:07:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for makses
-- ----------------------------
DROP TABLE IF EXISTS `makses`;
CREATE TABLE `makses`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
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
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of makses
-- ----------------------------
INSERT INTO `makses` VALUES (1, '2019-12-25 11:07:17', '2019-12-25 11:07:17', NULL, NULL, NULL, '1', 'PUSAT', 1, 1, 1, 1, 1);
INSERT INTO `makses` VALUES (26, '2019-12-31 10:42:11', '2019-12-31 10:42:11', NULL, NULL, NULL, '2', 'PUSAT', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `makses` VALUES (27, '2019-12-31 10:42:11', '2019-12-31 10:42:11', NULL, NULL, NULL, '3', 'PUSAT', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for mbidang
-- ----------------------------
DROP TABLE IF EXISTS `mbidang`;
CREATE TABLE `mbidang`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mbidang
-- ----------------------------
INSERT INTO `mbidang` VALUES (1, '2019-12-12 15:01:52', NULL, NULL, NULL, NULL, 'bidang1', NULL, 1);
INSERT INTO `mbidang` VALUES (2, '2019-12-12 15:01:54', NULL, NULL, NULL, NULL, 'bidang2', NULL, 1);
INSERT INTO `mbidang` VALUES (3, '2019-12-12 15:01:57', NULL, NULL, NULL, NULL, 'bidang3', NULL, 1);

-- ----------------------------
-- Table structure for mcustomer
-- ----------------------------
DROP TABLE IF EXISTS `mcustomer`;
CREATE TABLE `mcustomer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kodesales` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_bidang` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hp` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `img_ktp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `img_npwp` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `img_bgn_1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `img_bgn_2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `img_bgn_3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `confirmcode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mcustomer
-- ----------------------------
INSERT INTO `mcustomer` VALUES (7, '2019-12-27 09:32:10', NULL, NULL, NULL, 'Steven Wiaji', 'Jl Rinjani Dalam 5 No 1', '001', '1', '085879136416', 'stevenwiaji@gmail.com', 'a', 'stnwj6', '/uploads/mcustomer/img1577457509.png', './uploads/mcustomer/img1577457534.png', './uploads/mcustomer/img1577457590.png', './uploads/mcustomer/img1577457590.png', './uploads/mcustomer/img1577457590.png', NULL, 1);
INSERT INTO `mcustomer` VALUES (8, '2019-12-27 12:02:34', NULL, NULL, NULL, 'Steven Wiaji', 'Jl Rinjani Dalam 5 No 1', '001', '1', '085879136416', 'stevenwiaji18@gmail.com', NULL, 'stevenwiaji18', '/uploads/mcustomer/img1577466162.png', './uploads/mcustomer/img1577466169.png', './uploads/mcustomer/img1577466182.png', NULL, NULL, NULL, 1);
INSERT INTO `mcustomer` VALUES (9, '2019-12-29 22:35:20', NULL, NULL, NULL, 'Peter Kristiawan', 'Jakarta', '001', '1', '082257119911', 'kristiawanpeter@gmail.com', NULL, 'Brino111', '/uploads/mcustomer/img1577676978.png', './uploads/mcustomer/img1577677001.png', './uploads/mcustomer/img1577677056.png', './uploads/mcustomer/img1577677062.png', './uploads/mcustomer/img1577677068.png', NULL, 1);
INSERT INTO `mcustomer` VALUES (10, '2019-12-30 09:06:03', NULL, NULL, NULL, 'test', '1gdjfk', '001', '1', '123456789', 'aviator.bionvis@gmail.com', NULL, '12345678', '/uploads/mcustomer/img1577714789.png', './uploads/mcustomer/img1577714811.png', './uploads/mcustomer/img1577714837.png', './uploads/mcustomer/img1577714838.png', './uploads/mcustomer/img1577714839.png', NULL, 1);

-- ----------------------------
-- Table structure for mindukmenu
-- ----------------------------
DROP TABLE IF EXISTS `mindukmenu`;
CREATE TABLE `mindukmenu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mindukmenu
-- ----------------------------
INSERT INTO `mindukmenu` VALUES (1, '2019-10-12 16:06:26', '2019-10-12 16:06:26', NULL, NULL, 'MASTER', 'Master', 'fa fa-database', NULL, 'master', '2', '1');
INSERT INTO `mindukmenu` VALUES (2, '2019-10-15 18:21:24', '2019-10-15 18:21:24', NULL, NULL, 'TRANS', 'Transaksi', 'fas fa-tags', NULL, 'trans', '1', '1');
INSERT INTO `mindukmenu` VALUES (3, '2019-12-30 11:00:39', '2019-12-30 11:00:39', NULL, NULL, 'REPORT', 'Laporan', 'far fa-file-alt', NULL, 'report', '3', '1');

-- ----------------------------
-- Table structure for mkategori
-- ----------------------------
DROP TABLE IF EXISTS `mkategori`;
CREATE TABLE `mkategori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ref_bidang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mktgproduk
-- ----------------------------
INSERT INTO `mktgproduk` VALUES (3, NULL, NULL, NULL, NULL, NULL, 'a', NULL, NULL, NULL, 0);
INSERT INTO `mktgproduk` VALUES (4, NULL, NULL, NULL, NULL, NULL, 'a', NULL, NULL, NULL, 0);

-- ----------------------------
-- Table structure for mlevel
-- ----------------------------
DROP TABLE IF EXISTS `mlevel`;
CREATE TABLE `mlevel`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `super` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mlevel
-- ----------------------------
INSERT INTO `mlevel` VALUES (1, '2019-12-24 10:37:24', '2019-12-24 10:37:24', NULL, NULL, 'PUSAT', 'pusat', '1', NULL);

-- ----------------------------
-- Table structure for mmenu
-- ----------------------------
DROP TABLE IF EXISTS `mmenu`;
CREATE TABLE `mmenu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `dateu` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `class` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_indukmenu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `urutan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aktif` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mmenu
-- ----------------------------
INSERT INTO `mmenu` VALUES (1, '2019-12-31 10:41:26', '2019-12-31 10:41:26', NULL, NULL, NULL, 'Master Kategori', 'far fa-circle', 'mkategori', 'mkategori', 'MASTER', '2', '1', 'fa fa-box');
INSERT INTO `mmenu` VALUES (2, '2019-12-31 10:41:26', '2019-12-31 10:41:26', NULL, NULL, NULL, 'Master User', 'far fa-circle', 'muser', 'muser', 'MASTER', '99', '1', 'fa fa-users');
INSERT INTO `mmenu` VALUES (3, '2019-12-31 10:41:27', '2019-12-31 10:41:27', NULL, NULL, NULL, 'Company', 'far fa-circle', 'company', 'company', 'MASTER', '999', '1', NULL);

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
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `artikel` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `aktif` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for msales
-- ----------------------------
DROP TABLE IF EXISTS `msales`;
CREATE TABLE `msales`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT NULL,
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of msales
-- ----------------------------
INSERT INTO `msales` VALUES (1, NULL, NULL, NULL, NULL, '001', NULL);
INSERT INTO `msales` VALUES (2, NULL, NULL, NULL, NULL, '002', NULL);

-- ----------------------------
-- Table structure for msubktgproduk
-- ----------------------------
DROP TABLE IF EXISTS `msubktgproduk`;
CREATE TABLE `msubktgproduk`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT NULL,
  `dateu` timestamp(0) NULL DEFAULT NULL,
  `useri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `useru` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ref_ktgproduk` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `artikel` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ket` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `aktif` tinyint(1) NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for muser
-- ----------------------------
DROP TABLE IF EXISTS `muser`;
CREATE TABLE `muser`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of muser
-- ----------------------------
INSERT INTO `muser` VALUES (2, '2019-12-31 11:01:58', '2019-12-31 11:01:58', 'x', 'q', 'USR001', 'aaa', 'qq', NULL, 'q', 'q', '/uploads/muser/img-1577764885.png', 'qqq', '1', 't', '2019-12-31 11:01:58', 1);
INSERT INTO `muser` VALUES (3, '2019-12-31 11:01:25', '2019-12-31 11:01:25', 'q', 'q', 'USR002', 'z', 'z', NULL, 'z', 'z', '/uploads/muser/img-1577764885.png', 'z', '1', 'f', '2019-12-31 11:01:25', NULL);
INSERT INTO `muser` VALUES (4, '2019-12-24 10:51:14', '2019-12-24 10:51:14', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', NULL, NULL, '3', 't', '2019-12-24 10:51:14', NULL);

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
INSERT INTO `tcompany` VALUES (1, 'Brino', 'aaa', 'zz', 'xxxx', 'xxx', 'zzz', 'zzz', '/uploads/company/img-1577761968.png', NULL, 'zzz', '10', 'Jawa Tengah', '445', 'Surakarta (Solo)', '6165', 'Pasar Kliwon', 0);

-- ----------------------------
-- Table structure for tconfig
-- ----------------------------
DROP TABLE IF EXISTS `tconfig`;
CREATE TABLE `tconfig`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datei` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tconfig
-- ----------------------------
INSERT INTO `tconfig` VALUES (1, '2019-12-31 12:48:26', '2019-12-31 12:48:26', NULL, NULL, NULL, 'splash', '/uploads/config/splash.png', NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
