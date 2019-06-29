/*
Navicat MySQL Data Transfer

Source Server         : 12345678
Source Server Version : 50045
Source Host           : 192.168.132.129:3306
Source Database       : 12345

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-02-06 21:57:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zheng`
-- ----------------------------
DROP TABLE IF EXISTS `zheng`;
CREATE TABLE `zheng` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(50) default NULL,
  `dates` date default NULL,
  `contents` text,
  `hits` int(11) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of zheng
-- ----------------------------
