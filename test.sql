/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-06-29 17:44:32
*/

SET FOREIGN_KEY_CHECKS=0;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of good
-- ----------------------------
INSERT INTO `good` VALUES ('2', 'ff', '/assets/upfile/file_1498728922_33.jpg', '1', 'sadsf');
INSERT INTO `good` VALUES ('3', 'ff', './assets/upfile/file_1498729123_6641.jpg', '1', 'sda');
INSERT INTO `good` VALUES ('4', 'ff', './assets/upfile/file_1498729357_3485.jpg', '1', '');

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
