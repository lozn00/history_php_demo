/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50045
Source Host           : localhost:3306
Source Database       : 12345

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-05-20 12:44:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `qqreg`
-- ----------------------------
DROP TABLE IF EXISTS `qqreg`;
CREATE TABLE `qqreg` (
  `id` int(5) NOT NULL auto_increment,
  `qq` varchar(50) default NULL,
  `dates` date default NULL,
  `contents` text,
  `hits` int(11) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of qqreg
-- ----------------------------
