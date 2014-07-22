/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : amz

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2014-07-14 00:16:24
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `order_item`
-- ----------------------------
DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `amazonOrderId` varchar(255) NOT NULL,
  `orderItemId` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `quantityOrdered` int(11) DEFAULT NULL,
  `quantityShipped` int(11) DEFAULT NULL,
  `itemPriceCurrencyCode` varchar(255) DEFAULT NULL,
  `itemPriceAmount` double DEFAULT NULL,
  `shippingPriceCurrencyCode` varchar(255) DEFAULT NULL,
  `shippingPriceAmount` double DEFAULT NULL,
  `giftWrapPriceCurrencyCode` varchar(255) DEFAULT NULL,
  `giftWrapPriceAmount` double DEFAULT NULL,
  `itemTaxCurrencyCode` varchar(255) DEFAULT NULL,
  `itemTaxAmount` double DEFAULT NULL,
  `shippingTaxCurrencyCode` varchar(255) NOT NULL,
  `shippingTaxAmount` double DEFAULT NULL,
  `giftWrapTaxCurrencyCode` varchar(255) DEFAULT NULL,
  `giftWrapTaxAmount` double DEFAULT NULL,
  `shippingDiscountCurrencyCode` varchar(255) DEFAULT NULL,
  `shippingDiscountAmount` double DEFAULT NULL,
  `promotionDiscountCurrencyCode` varchar(255) DEFAULT NULL,
  `promotionDiscountAmount` double DEFAULT NULL,
  `PromotionIds` varchar(255) DEFAULT NULL,
  `ConditionId` varchar(255) DEFAULT NULL,
  `ConditionSubtypeId` varchar(255) NOT NULL,
  `ASIN` varchar(255) NOT NULL,
  `SellerSKU` varchar(255) NOT NULL,
  PRIMARY KEY (`orderItemId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order_item
-- ----------------------------
