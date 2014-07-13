/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : amz

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-07-13 23:41:15
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `image`
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `SKU` varchar(100) NOT NULL,
  `ImageType` varchar(10) DEFAULT NULL,
  `ImageLocation` varchar(255) DEFAULT NULL,
  `feedSubmissionId` varchar(20) DEFAULT NULL,
  `feedStatus` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of image
-- ----------------------------

-- ----------------------------
-- Table structure for `inventory`
-- ----------------------------
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE `inventory` (
  `SKU` varchar(20) NOT NULL,
  `quantity` varchar(10) DEFAULT NULL,
  `fulfillmentLatency` varchar(10) DEFAULT NULL,
  `feedSubmissionId` varchar(20) DEFAULT NULL,
  `feedStatus` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inventory
-- ----------------------------
INSERT INTO inventory VALUES ('48UftXeWZkEuYJh6f', '9', '3', '1059025489', '_SUCCESS_', '1');

-- ----------------------------
-- Table structure for `price`
-- ----------------------------
DROP TABLE IF EXISTS `price`;
CREATE TABLE `price` (
  `SKU` varchar(20) NOT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `feedSubmissionId` varchar(20) DEFAULT NULL,
  `feedStatus` varchar(20) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of price
-- ----------------------------

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
  `productData` text,
  `categories` varchar(255) DEFAULT NULL,
  `feedSubmissionId` varchar(30) DEFAULT NULL,
  `feedStatus` varchar(255) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`SKU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO product VALUES ('48UftXeWZkEuYJh6f', 'quan 1', '', '20', '', 'lalalal', '', 'brand', 'vn', 'nunu', '0', '1', null, '0', '<ProductData>\r\n	<ClothingAccessories>\r\n		<VariationData>\r\n			<Parentage>parent</Parentage>\r\n			<Size>10</Size>\r\n			<Color>green</Color>\r\n			<VariationTheme>Size</VariationTheme>\r\n		</VariationData>\r\n		<ClassificationData>\r\n			<Department>aaa</Department>\r\n			<ColorMap>dsa</ColorMap>\r\n			<SpecialSizeType>aaa</SpecialSizeType>\r\n		</ClassificationData>\r\n	</ClothingAccessories>\r\n</ProductData>\r\n', 'ClothingAccessories', '1057238091', '_SUCCESS_', null);

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
INSERT INTO user VALUES ('test001', 'fa820cc1ad39a4e99283e9fa555035ec', 'Tăng Nhật Tuệ', 'test001@gmail.com', '0987654321', '182 Lý Chính Thắng P13 Quận 3', '1', '0000-00-00 00:00:00', '2014-07-03 22:51:43', '', '0000-00-00 00:00:00', '0');
INSERT INTO user VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'Nguyễn Hoàng Nhật Thiên', 'i_am_me204@yahoo.com', '0977817837', '182 Lý Chính Thắng P13 Quận 3', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '1');

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
