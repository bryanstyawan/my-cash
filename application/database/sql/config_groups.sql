/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 100411
Source Host           : localhost:3306
Source Database       : sikerja_future

Target Server Type    : MYSQL
Target Server Version : 100411
File Encoding         : 65001

Date: 2020-07-21 20:55:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config_groups
-- ----------------------------
DROP TABLE IF EXISTS `config_groups`;
CREATE TABLE `config_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created_by_nip` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `updated_by_nip` varchar(100) NOT NULL,
  `date_updated` datetime NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config_groups
-- ----------------------------
INSERT INTO `config_groups` VALUES ('1', 'Fullstack Developer', '', 'system', '2020-04-23 00:00:00', '', '0000-00-00 00:00:00', '1');
INSERT INTO `config_groups` VALUES ('2', 'Administrator', '', 'system', '2020-04-23 00:00:00', '', '0000-00-00 00:00:00', '1');
INSERT INTO `config_groups` VALUES ('3', 'Superuser', '', 'system', '2020-04-23 00:00:00', '', '0000-00-00 00:00:00', '1');
INSERT INTO `config_groups` VALUES ('4', 'User', '', 'system', '2020-04-23 00:00:00', '', '0000-00-00 00:00:00', '1');
INSERT INTO `config_groups` VALUES ('5', 'Komponen', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '1');
SET FOREIGN_KEY_CHECKS=1;
