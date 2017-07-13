/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-13 18:00:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adminname` char(20) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '120', '202cb962ac59075b964b07152d234b70');

-- ----------------------------
-- Table structure for good
-- ----------------------------
DROP TABLE IF EXISTS `good`;
CREATE TABLE `good` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` text,
  `sex` int(3) DEFAULT '1' COMMENT '1男2 女',
  `hobby` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of good
-- ----------------------------
INSERT INTO `good` VALUES ('3', 'ff', './assets/upfile/file_1498729123_6641.jpg', '1', 'sda', '1', '4');
INSERT INTO `good` VALUES ('7', '鞋子', './assets/upfile/file_1499063883_9060.jpg', '4', '信息', '1', null);
INSERT INTO `good` VALUES ('8', '新', null, '2', '休息休息', '1', '6');
INSERT INTO `good` VALUES ('9', '新22', './assets/upfile/file_1499221260_7293.jpg', '1', '新22', '1', '2');

-- ----------------------------
-- Table structure for goodcategory
-- ----------------------------
DROP TABLE IF EXISTS `goodcategory`;
CREATE TABLE `goodcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goodcategory
-- ----------------------------
INSERT INTO `goodcategory` VALUES ('1', '手机');
INSERT INTO `goodcategory` VALUES ('2', '衣服');
INSERT INTO `goodcategory` VALUES ('4', '裤子');

-- ----------------------------
-- Table structure for photo
-- ----------------------------
DROP TABLE IF EXISTS `photo`;
CREATE TABLE `photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of photo
-- ----------------------------
INSERT INTO `photo` VALUES ('1', './assets/photo/file_14993990169.jpg');
INSERT INTO `photo` VALUES ('2', './assets/photo/file_14993990180.jpg');
INSERT INTO `photo` VALUES ('3', './assets/photo/file_14996586636.png');
INSERT INTO `photo` VALUES ('4', './assets/photo/file_14996587089.jpg');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) CHARACTER SET latin1 NOT NULL,
  `password` char(32) CHARACTER SET latin1 NOT NULL,
  `last_ip` char(32) CHARACTER SET latin1 DEFAULT NULL,
  `last_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('17', 'admin', '202cb962ac59075b964b07152d234b70', null, null);
INSERT INTO `user` VALUES ('19', 'user', 'e10adc3949ba59abbe56e057f20f883e', '127.0.0.1', '1498614664');
INSERT INTO `user` VALUES ('20', '120', '202cb962ac59075b964b07152d234b70', '127.0.0.1', '1498614676');

-- ----------------------------
-- Table structure for video
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES ('1', './assets/upfile/file_1499408061_3414.jpg');
INSERT INTO `video` VALUES ('2', './assets/upfile/file_1499408113_2450.jpg');
INSERT INTO `video` VALUES ('4', './assets/upfile/file_1499408203_3319.mp4');
INSERT INTO `video` VALUES ('5', '9031868223008583254');
INSERT INTO `video` VALUES ('6', '9031868223008583508');
INSERT INTO `video` VALUES ('7', '9031868223008734411');
