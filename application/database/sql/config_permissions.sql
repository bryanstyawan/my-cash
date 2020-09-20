/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 100411
Source Host           : localhost:3306
Source Database       : sikerja_future

Target Server Type    : MYSQL
Target Server Version : 100411
File Encoding         : 65001

Date: 2020-09-01 21:19:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config_permissions
-- ----------------------------
DROP TABLE IF EXISTS `config_permissions`;
CREATE TABLE `config_permissions` (
  `id_menus` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  `id_config_specialized` int(5) NOT NULL,
  `read` int(5) NOT NULL,
  `create` int(5) NOT NULL,
  `update` int(5) NOT NULL,
  `delete` int(5) NOT NULL,
  `notify` int(5) DEFAULT NULL,
  `verify` int(5) DEFAULT NULL,
  `created_by_nip` varchar(100) NOT NULL,
  `updated_by_nip` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config_permissions
-- ----------------------------
INSERT INTO `config_permissions` VALUES ('1', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('2', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('3', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('4', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('5', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('6', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('7', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('8', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('49', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('9', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('10', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('25', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('11', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('12', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('21', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('22', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('23', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('24', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('45', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('27', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('26', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('43', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('44', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('18', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('14', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('15', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('16', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('17', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('19', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('20', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('35', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('28', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('29', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('38', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('39', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('40', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('32', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('30', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('31', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('46', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('36', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('33', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('34', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('50', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('47', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('48', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('51', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('52', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('1', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('2', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('3', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('4', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('5', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('6', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('7', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('8', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('49', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('9', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('10', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('25', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('11', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('12', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('21', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('22', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('23', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('24', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('45', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('27', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('26', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('43', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('44', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('18', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('14', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('15', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('16', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('17', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('19', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('20', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('35', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('28', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('29', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('38', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('39', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('40', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('32', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('30', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('31', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('46', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('36', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('33', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('34', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('50', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('47', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('48', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('51', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('52', '2', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('1', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('2', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('3', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('4', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('5', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('6', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('7', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('8', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('49', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('9', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('10', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('25', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('11', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('12', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('21', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('22', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('23', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('24', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('45', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('27', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('26', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('43', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('44', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('18', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('14', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('15', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('16', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('17', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('19', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('20', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('35', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('28', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('29', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('38', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('39', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('40', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('32', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('30', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('31', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('46', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('36', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('33', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('34', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('50', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('47', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('48', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('51', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('52', '3', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('1', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('2', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('3', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('4', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('5', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('6', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('7', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('8', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('49', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('9', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('10', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('25', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('11', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('12', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('21', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('22', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('23', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('24', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('45', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('27', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('26', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('43', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('44', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('18', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('14', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('15', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('16', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('17', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('19', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('20', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('35', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('28', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('29', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('38', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('39', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('40', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('32', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('30', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('31', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('46', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('36', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('33', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('34', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('50', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('47', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('48', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('51', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('52', '4', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('1', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('2', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('3', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('4', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('5', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('6', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('7', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('8', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('49', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('9', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('10', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('25', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('11', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('12', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('21', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('22', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('23', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('24', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('45', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('27', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('26', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('43', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('44', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('18', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('14', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('15', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('16', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('17', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('19', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('20', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('35', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('28', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('29', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('38', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('39', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('40', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('32', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('30', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('31', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('46', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('36', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('33', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('34', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('50', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('47', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('48', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('51', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('52', '5', '0', '0', '0', '0', '0', '0', '0', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('53', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('54', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('55', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
INSERT INTO `config_permissions` VALUES ('56', '1', '0', '1', '1', '1', '1', '1', '1', '', '', '0000-00-00', '0000-00-00');
SET FOREIGN_KEY_CHECKS=1;
