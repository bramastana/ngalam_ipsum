/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 50516
Source Host           : 127.0.0.1:3306
Source Database       : ngalam

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2015-01-02 10:20:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for data_kata
-- ----------------------------
DROP TABLE IF EXISTS `data_kata`;
CREATE TABLE `data_kata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kata` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','NOT_ACTIVE') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_kata
-- ----------------------------
INSERT INTO `data_kata` VALUES ('1', 'ngalam', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('2', 'ipsum', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('3', 'mengandung', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('4', 'mbois', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('5', 'ilakes', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('6', 'tahes', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('7', 'ladub', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('8', 'kodew', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('9', 'ayas', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('10', 'memes', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('11', 'ebes', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('12', 'arema', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('13', 'nganem', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('14', 'hebak', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('15', 'nuwus', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('16', 'sam', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('17', 'oyi', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('18', 'ongis', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('19', 'nade', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('20', 'umak', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('21', 'utab', 'ACTIVE');
INSERT INTO `data_kata` VALUES ('22', 'ladub', 'NOT_ACTIVE');
INSERT INTO `data_kata` VALUES ('24', 'soak', 'NOT_ACTIVE');
INSERT INTO `data_kata` VALUES ('26', 'sinam', 'ACTIVE');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `menu` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `child` enum('TIDAK','ADA') DEFAULT NULL,
  `flag` enum('NOT_ACTIVE','ACTIVE') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '1', 'fa-dashboard', 'bg-danger', 'beranda', 'home_cms', 'TIDAK', 'ACTIVE');
INSERT INTO `menu` VALUES ('3', '4', 'fa-th-list', 'bg-warning', 'sistem parameter', null, 'ADA', 'ACTIVE');
INSERT INTO `menu` VALUES ('4', '5', 'fa-gear', 'bg-dark', 'Pengaturan', null, 'ADA', 'ACTIVE');

-- ----------------------------
-- Table structure for menu_detil
-- ----------------------------
DROP TABLE IF EXISTS `menu_detil`;
CREATE TABLE `menu_detil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) DEFAULT NULL,
  `id_parent` int(11) DEFAULT '0',
  `menu` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `flag` enum('NOT_ACTIVE','ACTIVE') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu_detil
-- ----------------------------
INSERT INTO `menu_detil` VALUES ('4', '1', '4', 'menu', 'menu_web/', 'ACTIVE');
INSERT INTO `menu_detil` VALUES ('11', '1', '3', 'data kata', 'data_kata/', 'ACTIVE');

-- ----------------------------
-- Table structure for pengurus
-- ----------------------------
DROP TABLE IF EXISTS `pengurus`;
CREATE TABLE `pengurus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_reg` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` text,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `tingkat` varchar(255) DEFAULT NULL,
  `ttd` varchar(255) DEFAULT NULL,
  `flag` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pengurus
-- ----------------------------
INSERT INTO `pengurus` VALUES ('1', '21474836479', 'bram', 'e4fa3adecabcf036f6f95da68bfe76bb', 'bram', 'astana', 'bram@bram.com', 'jl.bram no 1', '2014-11-14', '029834587', 'ADMIN', 'tMi4zNiAxNyAtNCBjIDQuODIgLTEuNCA5LjIxIC0zLjYzIDE0IC01IGwgMTQgLTMiLz48L3N2Zz4=', 'ACTIVE', '2014-08-13 13:01:14');
INSERT INTO `pengurus` VALUES ('3', '20141103140726', 'dzxf', '289dff07669d7a23de0ef88d2f7129e7', 'asda', 'asdfasdf', 'asd@asdf.com', 'sadf', '1971-10-21', '2354234', 'APOTEKER', 'image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj48c3ZnIHhtbG5zPSJodHRwOi8vd3d3Ln', 'ACTIVE', '2014-11-04 17:10:36');
INSERT INTO `pengurus` VALUES ('4', '20141103142501', 'coba', '5bb352aa0983fe81d1ab84a49b7a902f', 'coba', 'coba', 'asdf@coba.com', 'asdf', '1962-09-09', '23554', 'BIDAN', 'image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+PCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj48c3ZnIHhtbG5zPSJodHRwOi8vd3d3Ln', 'ACTIVE', '2014-11-03 14:25:35');
