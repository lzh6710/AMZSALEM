/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : amz

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-07-09 07:12:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `SKU` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `packageWeight` varchar(255) DEFAULT NULL,
  `MSRP` varchar(255) NOT NULL,
  `shippingWeight` varchar(255) DEFAULT NULL,
  `description` text,
  `ASIN` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `numberOfItems` int(11) DEFAULT NULL,
  `itemPackageQuantity` int(11) DEFAULT NULL,
  `itemType` varchar(255) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`SKU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('123123', 'zzzzzz', '22', '123123', '123123123', '<p>This is Product description.</p>', '', null, null, null, null, null, null, '');
INSERT INTO `product` VALUES ('SDFGHJ324', 'ABCDEF', '1', '5', '1', '<p>ABCDEABCDEABCDEABCDEABCDEABCDE</p>', 'SDFGHJ324', 'ps', 'VietNam', 'ABCDE', '10', '10', null, '');
INSERT INTO `product` VALUES ('SDFGHJ3242', 'ABCDEF', '1', '5', '1', '<p>This is Product description.</p>', 'SDFGHJ3242', 'ps', 'VietNam', 'ABCDE', '10', '10', null, '');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `isAdmin` char(255) NOT NULL,
  `createUser` varchar(255) NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updateUser` varchar(255) NOT NULL,
  `updateDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isActive` char(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('test001', 'fa820cc1ad39a4e99283e9fa555035ec', 'Tăng Nhật Tuệ', 'test001@gmail.com', '0987654321', '182 Lý Chính Thắng P13 Quận 3', '1', '0000-00-00 00:00:00', '2014-07-03 22:51:43', '', '0000-00-00 00:00:00', '0');
INSERT INTO `user` VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Hoàng Nhật Thiên', 'i_am_me204@yahoo.com', '0977817837', '182 Lý Chính Thắng P13 Quận 3', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for `user_role`
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `username` varchar(255) NOT NULL,
  `roleid` varchar(255) NOT NULL,
  PRIMARY KEY (`username`,`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_role
-- ----------------------------
