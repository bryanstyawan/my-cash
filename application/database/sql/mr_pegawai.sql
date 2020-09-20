/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 100411
Source Host           : localhost:3306
Source Database       : my-cash

Target Server Type    : MYSQL
Target Server Version : 100411
File Encoding         : 65001

Date: 2020-09-14 00:53:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mr_pegawai
-- ----------------------------
DROP TABLE IF EXISTS `mr_pegawai`;
CREATE TABLE `mr_pegawai` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT '',
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT '',
  `id_agama` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_role` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `id_status_pegawai` int(11) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `created_by_nip` varchar(50) DEFAULT '',
  `updated_by_nip` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `id_agama` (`id_agama`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mr_pegawai
-- ----------------------------
INSERT INTO `mr_pegawai` VALUES ('999', 'Bryan Setyawan Putra', 'Jakarta', '1995-08-27', 'test', 'L', '1', 'avatar-2.png', '74ea8f29cc1fddd788218080cc716597', '1', '1', '1', null, null, 'bryanstyawan@hotmail.com', '999', '999', '2020-04-27 08:04:36', '2020-04-27 08:04:36', null);
SET FOREIGN_KEY_CHECKS=1;
