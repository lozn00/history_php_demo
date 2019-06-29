/*
Navicat MySQL Data Transfer

Source Server         : 12345678
Source Server Version : 50045
Source Host           : 192.168.132.129:3306
Source Database       : 12345

Target Server Type    : MYSQL
Target Server Version : 50045
File Encoding         : 65001

Date: 2014-02-06 22:11:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zheng_user`
-- ----------------------------
DROP TABLE IF EXISTS `zheng_user`;
CREATE TABLE `zheng_user` (
  `userid` int(6) NOT NULL auto_increment,
  `username` varchar(10) NOT NULL,
  `userpwd` varchar(20) NOT NULL,
  `useremail` varchar(30) default NULL,
  `userphone` varchar(11) default NULL,
  `userinfo` text,
  `usersex` varchar(1) default NULL,
  `nickname` varchar(20) default NULL,
  `usersid` varchar(50) default NULL,
  PRIMARY KEY  (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of zheng_user
-- ----------------------------
INSERT INTO `zheng_user` VALUES ('1', 'admin', '123456', 'mrphj@mrphj.com', '15576334267', '我来自湖南', '男', '情随事迁', '17c8752748d5b9689203e2da7fe72c73');
INSERT INTO `zheng_user` VALUES ('10', 'mrphj', 'mrphjcom', '694886526@qq.com', '13262274631', '我是情迁', '男', '情迁', null);
