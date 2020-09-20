/*
Navicat MySQL Data Transfer

Source Server         : MySql
Source Server Version : 100411
Source Host           : localhost:3306
Source Database       : sikerja_future

Target Server Type    : MYSQL
Target Server Version : 100411
File Encoding         : 65001

Date: 2020-09-01 21:18:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config_menus
-- ----------------------------
DROP TABLE IF EXISTS `config_menus`;
CREATE TABLE `config_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` int(3) NOT NULL,
  `sort_number` int(11) NOT NULL,
  `created_by_nip` varchar(100) NOT NULL,
  `updated_by_nip` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of config_menus
-- ----------------------------
INSERT INTO `config_menus` VALUES ('1', '0', 'Dashboard', 'dashboard/ajax_home/', 'dashboard', '1', '1', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('2', '0', 'Internal', '#', 'account_circle', '1', '2', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('3', '2', 'spaceY', 'internal/project_management/', 'apps', '1', '1', 'system', '999', '2020-03-23', '2020-06-11');
INSERT INTO `config_menus` VALUES ('4', '0', 'Config', '#', 'settings', '1', '3', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('5', '4', 'Menu & Submenu', 'config/menus/', 'menu', '1', '1', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('6', '4', 'Groups', 'config/groups/', 'group', '1', '2', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('7', '4', 'Permissions', 'config/permissions/', 'security', '1', '3', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('8', '4', 'Slider', 'config/slider/', 'slideshow', '1', '4', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('9', '0', 'Fondasi', '#', 'assignment', '1', '4', 'system', '999', '2020-03-23', '2020-04-17');
INSERT INTO `config_menus` VALUES ('10', '9', 'Organisasi', '#', 'domain', '1', '1', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('11', '25', 'Grade', 'master/grade/', 'assessment', '1', '1', 'system', '999', '2020-03-23', '2020-04-17');
INSERT INTO `config_menus` VALUES ('12', '25', 'Pangkat/Golongan', 'master/pangkat/', 'card_membership', '1', '2', 'system', '999', '2020-03-23', '2020-04-17');
INSERT INTO `config_menus` VALUES ('13', '10', 'Struktur Organisasi', 'master/struktur_organisasi/', 'domain', '0', '5', 'system', '999', '2020-03-23', '2020-06-17');
INSERT INTO `config_menus` VALUES ('14', '27', 'Pendidikan', '#', 'school', '1', '2', 'system', '999', '2020-03-23', '2020-04-23');
INSERT INTO `config_menus` VALUES ('15', '14', 'Akademik', 'master/akademik', 'school', '1', '1', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('16', '14', 'Jurusan/Fakultas', 'master/jurusan/', 'local_library', '1', '2', 'system', '999', '2020-03-23', '2020-03-23');
INSERT INTO `config_menus` VALUES ('17', '27', 'Data Pegawai', 'master/pegawai/', 'people', '1', '3', 'system', '999', '2020-03-23', '2020-04-17');
INSERT INTO `config_menus` VALUES ('18', '26', 'Agama', 'master/agama/', 'layers', '1', '4', 'system', '999', '2020-03-23', '2020-04-17');
INSERT INTO `config_menus` VALUES ('19', '27', 'Tugas Belajar', 'master/tugas_belajar/', 'local_library', '1', '5', 'system', '999', '2020-03-23', '2020-04-17');
INSERT INTO `config_menus` VALUES ('20', '27', 'Tunjangan Profesi', 'master/tunjangan_profesi/', 'view_comfy', '1', '6', 'system', '999', '2020-03-23', '2020-04-17');
INSERT INTO `config_menus` VALUES ('21', '25', 'Jenis Eselon', 'master/jenis_eselon', 'domain', '1', '4', '999', '999', '2020-03-25', '2020-04-17');
INSERT INTO `config_menus` VALUES ('22', '25', 'Jenis Jabatan', 'master/jenis_jabatan', 'domain', '1', '5', '198312252014021002', '999', '2020-03-26', '2020-04-17');
INSERT INTO `config_menus` VALUES ('23', '10', 'Komponen', 'master/komponen', 'domain', '1', '2', '198312252014021002', '999', '2020-03-26', '2020-04-17');
INSERT INTO `config_menus` VALUES ('24', '10', 'Jabatan', 'master/jabatan', 'domain', '1', '3', '999', '999', '2020-04-04', '2020-04-17');
INSERT INTO `config_menus` VALUES ('25', '10', 'Fondasi Organisasi', '#', 'domain', '1', '1', '999', '', '2020-04-17', '0000-00-00');
INSERT INTO `config_menus` VALUES ('26', '27', 'Umum', '#', 'domain', '1', '1', '999', '', '2020-04-17', '2020-04-23');
INSERT INTO `config_menus` VALUES ('27', '9', 'Pegawai', '#', 'people', '1', '3', '999', '999', '2020-04-17', '2020-04-17');
INSERT INTO `config_menus` VALUES ('28', '35', 'Fondasi Manual IKU', '#', 'book', '1', '1', '999', '999', '2020-04-17', '2020-04-17');
INSERT INTO `config_menus` VALUES ('29', '28', 'Ketentuan', '#', 'bookmark', '1', '1', '999', '999', '2020-04-17', '2020-04-17');
INSERT INTO `config_menus` VALUES ('30', '28', 'Kualitas', 'strategi/kualitas', 'bookmark', '1', '3', '999', '999', '2020-04-17', '2020-04-21');
INSERT INTO `config_menus` VALUES ('31', '28', 'Cascading', 'strategi/cascading', 'bookmark', '1', '3', '999', '999', '2020-04-17', '2020-04-21');
INSERT INTO `config_menus` VALUES ('32', '28', 'Komponen Manual IKU', 'strategi/komponen_manual', 'bookmark', '1', '2', '999', '999', '2020-04-17', '2020-04-21');
INSERT INTO `config_menus` VALUES ('33', '35', 'Manual IKU', 'strategi/manual_iku', 'beenhere', '1', '4', '999', '999', '2020-04-17', '2020-04-22');
INSERT INTO `config_menus` VALUES ('34', '0', '', '', '', '0', '0', '999', '999', '2020-04-17', '2020-04-22');
INSERT INTO `config_menus` VALUES ('35', '0', 'Strategi', '#', 'beenhere', '1', '5', '999', '', '2020-04-17', '0000-00-00');
INSERT INTO `config_menus` VALUES ('36', '35', 'Sasaran Strategi', 'strategi/sasaran_strategi', 'beenhere', '1', '2', '999', '999', '2020-04-17', '2020-04-22');
INSERT INTO `config_menus` VALUES ('38', '29', 'Satuan Pengukuran', 'strategi/satuan_pengukuran', 'bookmark', '1', '1', '999', '999', '2020-04-18', '2020-04-21');
INSERT INTO `config_menus` VALUES ('39', '29', 'Jumlah Maksimal IKU', 'strategi/jumlah_maksimal_iku', 'bookmark', '1', '2', '999', '999', '2020-04-18', '2020-04-21');
INSERT INTO `config_menus` VALUES ('40', '29', 'Jenis Aspek Target', 'strategi/jenis_aspek_target', 'bookmark', '1', '3', '999', '999', '2020-04-18', '2020-05-10');
INSERT INTO `config_menus` VALUES ('43', '26', 'Tipe Jabatan Pegawai', 'master/tipe_jabatan_pegawai', 'domain', '1', '2', '999', '', '2020-04-21', '2020-04-23');
INSERT INTO `config_menus` VALUES ('44', '26', 'Status Pegawai', 'master/status_pegawai', 'domain', '1', '2', '999', '', '2020-04-21', '2020-04-23');
INSERT INTO `config_menus` VALUES ('45', '10', 'Peta Jabatan', 'master/peta_jabatan/', 'domain', '1', '4', '999', '999', '2020-05-28', '2020-05-28');
INSERT INTO `config_menus` VALUES ('46', '28', 'Perspektif', 'strategi/perspektif', 'bookmark', '1', '6', '999', '999', '2020-05-31', '2020-05-31');
INSERT INTO `config_menus` VALUES ('47', '0', 'Aktifitas', '#', 'domain', '1', '6', '999', '', '2020-06-19', '0000-00-00');
INSERT INTO `config_menus` VALUES ('48', '47', 'Object Key Result', 'aktifitas/okr', 'domain', '1', '1', '999', '999', '2020-06-19', '2020-06-26');
INSERT INTO `config_menus` VALUES ('49', '4', 'FAQ', 'config/faq', 'domain', '1', '5', '999', '', '2020-06-19', '0000-00-00');
INSERT INTO `config_menus` VALUES ('50', '35', 'Inisiatif Strategi', 'strategi/inisiatif_strategi_v2', 'beenhere', '1', '6', '999', '999', '2020-06-27', '2020-06-27');
INSERT INTO `config_menus` VALUES ('51', '48', 'Jenis Kegiatan', 'aktifitas/okr_jenis_kegiatan', 'domain', '1', '1', '999', '999', '2020-08-03', '2020-08-03');
INSERT INTO `config_menus` VALUES ('52', '48', 'Kegiatan', 'aktifitas/okr_kegiatan', 'domain', '1', '2', '999', '', '2020-08-03', '0000-00-00');
INSERT INTO `config_menus` VALUES ('53', '35', 'Sasaran Strategi v2', 'strategi/sasaran_strategi_v2', 'beenhere', '1', '3', '999', '999', '2020-08-31', '2020-08-31');
INSERT INTO `config_menus` VALUES ('54', '35', 'Manual IKU v2', 'strategi/manual_iku_v2', 'beenhere', '1', '5', '999', '999', '2020-08-31', '2020-08-31');
INSERT INTO `config_menus` VALUES ('55', '35', 'Indikator Kinerja Individu', 'strategi/manual_iki', 'beenhere', '1', '7', '999', '999', '2020-08-31', '2020-08-31');
INSERT INTO `config_menus` VALUES ('56', '4', 'Background Login', 'config/background_login', 'slideshow', '1', '5', '999', '999', '2020-09-01', '2020-09-01');
SET FOREIGN_KEY_CHECKS=1;
