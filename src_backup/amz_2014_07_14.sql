/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : amz

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-07-14 00:21:49
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
-- Table structure for `order`
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `amazonOrderId` varchar(255) NOT NULL,
  `purchaseDate` datetime DEFAULT NULL,
  `lastUpdateDate` datetime DEFAULT NULL,
  `orderStatus` varchar(255) DEFAULT NULL,
  `fulfillmentChannel` varchar(255) DEFAULT NULL,
  `salesChannel` varchar(255) DEFAULT NULL,
  `shipServiceLevel` varchar(255) DEFAULT NULL,
  `shippingAddressName` varchar(255) DEFAULT NULL,
  `shippingAddressAddressLine1` varchar(255) DEFAULT NULL,
  `shippingAddressAddressLine2` varchar(255) DEFAULT NULL,
  `shippingAddressStateOrRegion` varchar(255) DEFAULT NULL,
  `shippingAddressPostalCode` varchar(255) DEFAULT NULL,
  `shippingAddressCountryCode` varchar(255) DEFAULT NULL,
  `shippingAddressPhone` varchar(255) DEFAULT NULL,
  `orderTotalCurrencyCode` varchar(255) DEFAULT NULL,
  `orderTotalAmount` double DEFAULT NULL,
  `numberOfItemsShipped` int(11) DEFAULT NULL,
  `numberOfItemsUnshipped` int(11) DEFAULT NULL,
  `paymentExecutionDetail` varchar(255) DEFAULT NULL,
  `paymentMethod` varchar(255) DEFAULT NULL,
  `marketplaceId` varchar(255) DEFAULT NULL,
  `buyerEmail` varchar(255) DEFAULT NULL,
  `buyerName` varchar(255) DEFAULT NULL,
  `shipmentServiceLevelCategory` varchar(255) DEFAULT NULL,
  `shippedByAmazonTFM` varchar(255) DEFAULT NULL,
  `orderType` varchar(255) DEFAULT NULL,
  `earliestShipDate` datetime DEFAULT NULL,
  `latestShipDate` datetime DEFAULT NULL,
  `earliestDeliveryDate` datetime DEFAULT NULL,
  `latestDeliveryDate` datetime DEFAULT NULL,
  `isView` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`amazonOrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO order VALUES ('249-0009240-1635071', '2014-07-05 15:09:12', '2014-07-07 06:45:21', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '船橋市習志野1-3-4', '0', '千葉県', '274-0071', 'JP', '0474613470', 'JPY', '2380', '1', '0', '', 'Other', 'A1VC38T7YXB528', '86ftqs24nd3hxk3@m.marketplace.amazon.co.jp', '吉村 恵子', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-08 14:59:59', '2014-07-18 15:00:00', '2014-07-26 14:59:59', '0');
INSERT INTO order VALUES ('249-0831604-4199866', '2014-07-13 06:20:04', '2014-07-13 06:50:26', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '豊島区南大塚1-51-7', '1', '東京都', '170-0005', 'JP', '0339453422', 'JPY', '3534', '0', '1', '', 'Other', 'A1VC38T7YXB528', 'v32x83fwvx3nrxy@marketplace.amazon.co.jp', '中村　敦', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('249-1041217-3040646', '2014-07-01 06:58:29', '2014-07-04 08:23:52', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '神戸市中央区元町通６ー２ー１４', '1', '兵庫県', '650-0022', 'JP', '09037006354', 'JPY', '2280', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'bf6cc5s7lkmpbgq@marketplace.amazon.co.jp', '笠谷 英芳', 'Standard', 'false', 'StandardOrder', '2014-07-01 15:00:00', '2014-07-03 14:59:59', '2014-07-13 15:00:00', '2014-07-20 14:59:59', '0');
INSERT INTO order VALUES ('249-1515089-0959831', '2014-07-10 05:01:56', '2014-07-10 05:32:25', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '所沢市中富1338-2', '0', '埼玉県', '359-0002', 'JP', '04-2942-0478', 'JPY', '2312', '0', '2', '', 'Other', 'A1VC38T7YXB528', 'cbkmhrlhzf4x9hb@marketplace.amazon.co.jp', '加藤由香子', 'Standard', 'false', 'StandardOrder', '2014-07-10 15:00:00', '2014-07-14 14:59:59', '2014-07-23 15:00:00', '2014-08-01 14:59:59', '0');
INSERT INTO order VALUES ('249-2325258-6594255', '2014-07-07 01:32:17', '2014-07-09 04:53:38', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Chubu', '', '豊橋市花田町築地34', '1', '愛知県', '441-8019', 'JP', '08051620858', 'JPY', '2280', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'jpbtlzrnwgwjf59@m.marketplace.amazon.co.jp', '荻野彰子', 'Standard', 'false', 'StandardOrder', '2014-07-07 15:00:00', '2014-07-09 14:59:59', '2014-07-19 15:00:00', '2014-07-27 14:59:59', '0');
INSERT INTO order VALUES ('249-2531888-5499851', '2014-07-11 08:35:23', '2014-07-11 09:05:58', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', 'ひたちなか市新光町23', '1', '茨城県', '312-0005', 'JP', '09026775275', 'JPY', '3940', '0', '2', '', 'Other', 'A1VC38T7YXB528', 'xm4k4nhp6s3r23s@m.marketplace.amazon.co.jp', '桜井友梨', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('249-2823870-9312640', '2014-07-13 14:17:06', '2014-07-13 14:47:36', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Chubu', '', '島田市横岡', '1', '静岡県', '428-0004', 'JP', '0547455630', 'JPY', '1690', '0', '1', '', 'Other', 'A1VC38T7YXB528', 'nv186d05n7xgbh2@m.marketplace.amazon.co.jp', '舩島きよみ', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('249-2926010-4149442', '2014-07-01 00:40:43', '2014-07-03 04:06:32', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '船橋市飯山満町2-401-10', '0', '千葉県', '274-0822', 'JP', '0474649034', 'JPY', '3940', '1', '0', '', 'CVS', 'A1VC38T7YXB528', '3f746rpkxhwtvdj@marketplace.amazon.co.jp', '古川恵美子', 'Standard', 'false', 'StandardOrder', '2014-07-01 15:00:00', '2014-07-14 14:59:59', '2014-07-13 15:00:00', '2014-08-01 14:59:59', '0');
INSERT INTO order VALUES ('249-4337651-0050241', '2014-07-07 07:00:30', '2014-07-11 05:07:27', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '三鷹市下連雀8-6-15', '1', '東京都', '181-0013', 'JP', '09018536649', 'JPY', '1990', '1', '0', '', 'CVS', 'A1VC38T7YXB528', 'y11yv4q15d852vt@m.marketplace.amazon.co.jp', '吉野 遥', 'Standard', 'false', 'StandardOrder', '2014-07-07 15:00:00', '2014-07-18 14:59:59', '2014-07-19 15:00:00', '2014-08-05 14:59:59', '0');
INSERT INTO order VALUES ('249-7361346-7664632', '2014-07-13 09:43:59', '2014-07-13 10:14:32', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '江別市元江別本町9-12', '0', '北海道', '067-0041', 'JP', '011-383-2829', 'JPY', '1970', '0', '1', '', 'Other', 'A1VC38T7YXB528', '2nmf4vz7t9t38z9@marketplace.amazon.co.jp', '佐藤　哉子', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('249-7677491-5470410', '2014-07-03 16:22:51', '2014-07-07 01:56:40', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '愛知郡愛荘町沓掛６６１−１０', '0', '滋賀県', '529-1315', 'JP', '09018183398', 'JPY', '1440', '1', '0', '', 'Other', 'A1VC38T7YXB528', 't0t4hnt30lvn2l2@marketplace.amazon.co.jp', '三冨 太洋', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-08 14:59:59', '2014-07-18 15:00:00', '2014-07-26 14:59:59', '0');
INSERT INTO order VALUES ('249-8157201-5516652', '2014-07-04 13:16:47', '2014-07-10 12:47:32', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '池田市畑', '1', '大阪府', '563-0021', 'JP', '09043082870', 'JPY', '4440', '0', '1', '', 'CVS', 'A1VC38T7YXB528', '9n7lqqqbsbs90cr@marketplace.amazon.co.jp', '淡路　和央', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-17 14:59:59', '2014-07-18 15:00:00', '2014-08-04 14:59:59', '0');
INSERT INTO order VALUES ('249-8516502-0419844', '2014-07-12 13:07:28', '2014-07-12 13:37:37', 'Pending', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '', '0', '', '', '', '', '', '0', '0', '1', '', '', 'A1VC38T7YXB528', '', '', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-25 14:59:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
INSERT INTO order VALUES ('249-9556179-8733458', '2014-07-05 16:17:27', '2014-07-09 04:50:30', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '千葉市花見川区検見川町', '1', '千葉県', '262-0023', 'JP', '08050922888', 'JPY', '4540', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'g3b7m44t8q95yvp@marketplace.amazon.co.jp', '岩崎美江', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-08 14:59:59', '2014-07-18 15:00:00', '2014-07-26 14:59:59', '0');
INSERT INTO order VALUES ('249-9983522-1884668', '2014-07-10 12:52:59', '2014-07-10 13:23:30', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Hokuriku', '', '鯖江市糺町17-97', '0', '福井県', '916-0004', 'JP', '08030493045', 'JPY', '1316', '0', '2', '', 'Other', 'A1VC38T7YXB528', 'tk39031p850ccjr@m.marketplace.amazon.co.jp', '伊藤 早希', 'Standard', 'false', 'StandardOrder', '2014-07-10 15:00:00', '2014-07-14 14:59:59', '2014-07-23 15:00:00', '2014-08-01 14:59:59', '0');
INSERT INTO order VALUES ('250-2037288-1950224', '2014-07-07 23:59:25', '2014-07-09 05:10:45', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Shikoku', '', '徳島市国府町日開８１８−９', '0', 'Tokushima-ken', '779-3117', 'JP', '080-5665-9929', 'JPY', '2757', '1', '0', '', 'Other', 'A1VC38T7YXB528', '9yj4rpyyt71t6gc@marketplace.amazon.co.jp', 'Yukari Shigemura', 'Standard', 'false', 'StandardOrder', '2014-07-08 15:00:00', '2014-07-10 14:59:59', '2014-07-21 15:00:00', '2014-07-28 14:59:59', '0');
INSERT INTO order VALUES ('250-2544857-7547013', '2014-07-06 04:38:16', '2014-07-13 05:20:23', 'Canceled', 'MFN', 'Amazon.co.jp', 'Std JP Kita Tohoku', '', '', '0', '', '', '', '', '', '0', '0', '0', '', '', 'A1VC38T7YXB528', '', '', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-17 14:59:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
INSERT INTO order VALUES ('250-3206950-6611849', '2014-07-08 01:00:12', '2014-07-11 05:13:47', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '大阪市鶴見区横堤4-12-20', '0', '大阪府', '538-0052', 'JP', '090-5177-0760', 'JPY', '1970', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'n8n4gznsdtg3qp3@marketplace.amazon.co.jp', '近藤弘孝', 'Standard', 'false', 'StandardOrder', '2014-07-08 15:00:00', '2014-07-10 14:59:59', '2014-07-21 15:00:00', '2014-07-28 14:59:59', '0');
INSERT INTO order VALUES ('250-3232676-5472645', '2014-07-01 18:15:53', '2014-07-04 02:41:00', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '葛飾区水元3-19-16', '1', '東京都', '125-0032', 'JP', '080-3610-9498', 'JPY', '1480', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'rlk6l2bssvkkdvr@marketplace.amazon.co.jp', '五十嵐慎治', 'Standard', 'false', 'StandardOrder', '2014-07-02 15:00:00', '2014-07-04 14:59:59', '2014-07-14 15:00:00', '2014-07-22 14:59:59', '0');
INSERT INTO order VALUES ('250-3291958-8992037', '2014-07-13 06:58:27', '2014-07-13 07:28:43', 'Pending', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '', '0', '', '', '', '', '', '0', '0', '1', '', '', 'A1VC38T7YXB528', '', '', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-25 14:59:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
INSERT INTO order VALUES ('250-4517141-4181620', '2014-07-02 11:45:18', '2014-07-07 01:55:03', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '鎌ヶ谷市初富本町1-17-30', '0', '千葉県', '273-0125', 'JP', '090-4716-8820', 'JPY', '1490', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'ncyknhv26lcg36q@marketplace.amazon.co.jp', '坂田一貴', 'Standard', 'false', 'StandardOrder', '2014-07-02 15:00:00', '2014-07-04 14:59:59', '2014-07-14 15:00:00', '2014-07-22 14:59:59', '0');
INSERT INTO order VALUES ('250-4822120-1756636', '2014-07-08 06:23:10', '2014-07-09 04:56:51', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '生駒郡斑鳩町龍田西6-2-38', '0', '奈良県', '636-0154', 'JP', '0745752316', 'JPY', '3946', '3', '0', '', 'Other', 'A1VC38T7YXB528', 'qv7hh792lmm7jf0@marketplace.amazon.co.jp', '増井和美', 'Standard', 'false', 'StandardOrder', '2014-07-08 15:00:00', '2014-07-10 14:59:59', '2014-07-21 15:00:00', '2014-07-28 14:59:59', '0');
INSERT INTO order VALUES ('250-5447149-4651063', '2014-07-11 15:48:01', '2014-07-12 14:22:28', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '須賀川市高久田境96-1', '1', '福島県', '962-0837', 'JP', '0248637940', 'JPY', '1970', '0', '1', '', 'CVS', 'A1VC38T7YXB528', '3rvn4jc1r4yzlml@marketplace.amazon.co.jp', '菅原聡子', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-25 14:59:59', '2014-07-26 15:00:00', '2014-08-11 14:59:59', '0');
INSERT INTO order VALUES ('250-5523742-8844002', '2014-07-05 18:53:56', '2014-07-08 04:51:00', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '土浦市木田余4786-3', '0', '茨城県', '300-0026', 'JP', '0298994566', 'JPY', '1690', '1', '0', '', 'Other', 'A1VC38T7YXB528', '91qxr6zy73hpdzl@marketplace.amazon.co.jp', '高橋　由美子', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-08 14:59:59', '2014-07-18 15:00:00', '2014-07-26 14:59:59', '0');
INSERT INTO order VALUES ('250-6749467-6665419', '2014-07-12 11:50:29', '2014-07-12 12:20:54', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '千葉市中央区青葉町1264-8', '0', '千葉県', '260-0852', 'JP', '043-208-0062', 'JPY', '2380', '0', '1', '', 'Other', 'A1VC38T7YXB528', 'vhtw8xhnyh8tdgh@marketplace.amazon.co.jp', '仲野敦子', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('250-7486768-8857409', '2014-07-08 05:06:31', '2014-07-08 05:37:00', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '名古屋市守山区高島町181', '0', '愛知県', '463-0095', 'JP', '052-791-4794', 'JPY', '1970', '0', '1', '', 'Other', 'A1VC38T7YXB528', 'jg79d1lbb4q5k92@marketplace.amazon.co.jp', '邉田玲子', 'Standard', 'false', 'StandardOrder', '2014-07-08 15:00:00', '2014-07-10 14:59:59', '2014-07-21 15:00:00', '2014-07-28 14:59:59', '0');
INSERT INTO order VALUES ('250-7801273-1288837', '2014-07-06 08:28:04', '2014-07-08 04:48:39', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Ritou', '', '宮古島市城辺字福里1936-1', '0', '沖縄県', '906-0103', 'JP', '09082939660', 'JPY', '1857', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'tnkdhmbncd7gz5l@marketplace.amazon.co.jp', '池田　勝弥', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-08 14:59:59', '2014-07-18 15:00:00', '2014-07-26 14:59:59', '0');
INSERT INTO order VALUES ('250-8372702-9724829', '2014-07-09 06:49:21', '2014-07-11 05:24:35', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '東大阪市大蓮南5-11-16', '0', '大阪府', '577-0825', 'JP', '09050645072', 'JPY', '5980', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'z3clpr6h75xfqpk@marketplace.amazon.co.jp', 'スガハラヤスヒコ', 'Standard', 'false', 'StandardOrder', '2014-07-09 15:00:00', '2014-07-11 14:59:59', '2014-07-22 15:00:00', '2014-07-29 14:59:59', '0');
INSERT INTO order VALUES ('250-8789760-4668667', '2014-07-01 08:50:24', '2014-07-01 08:52:16', 'Canceled', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '', '0', '', '', '', '', '', '0', '0', '0', '', '', 'A1VC38T7YXB528', '', '', 'Standard', '', 'StandardOrder', '2014-07-01 15:00:00', '2014-07-03 14:59:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
INSERT INTO order VALUES ('250-9447154-3320615', '2014-07-13 02:36:47', '2014-07-13 03:07:05', 'Pending', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '', '0', '', '', '', '', '', '0', '0', '1', '', '', 'A1VC38T7YXB528', '', '', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-25 14:59:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
INSERT INTO order VALUES ('250-9705271-1911804', '2014-07-02 14:21:58', '2014-07-09 15:04:31', 'Canceled', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '', '0', '', '', '', '', '', '0', '0', '0', '', '', 'A1VC38T7YXB528', '', '', 'Standard', 'false', 'StandardOrder', '2014-07-02 15:00:00', '2014-07-15 14:59:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
INSERT INTO order VALUES ('503-0578004-5607054', '2014-07-09 15:07:44', '2014-07-10 02:33:40', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '目黒区中目黒5―6―18', '0', '東京都', '153-0061', 'JP', '0337136337', 'JPY', '1380', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'ykrm574x0mrkmfz@m.marketplace.amazon.co.jp', '稲田和子', 'Standard', 'false', 'StandardOrder', '2014-07-10 15:00:00', '2014-07-14 14:59:59', '2014-07-23 15:00:00', '2014-08-01 14:59:59', '0');
INSERT INTO order VALUES ('503-0636430-8812656', '2014-07-05 12:38:18', '2014-07-10 02:29:07', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '大阪市住吉区苅田1-6-24藤本様方', '0', '大阪府', '558-0011', 'JP', '09050900531', 'JPY', '3830', '2', '0', '', 'Other', 'A1VC38T7YXB528', 'yvtw71mnxxwpdgb@m.marketplace.amazon.co.jp', '松本陽子', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-08 14:59:59', '2014-07-18 15:00:00', '2014-07-26 14:59:59', '0');
INSERT INTO order VALUES ('503-0880172-6683846', '2014-07-12 12:30:54', '2014-07-12 13:01:26', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '結城郡八千代町若62', '0', '茨城県', '300-3544', 'JP', '090-2538-7518', 'JPY', '3940', '0', '1', '', 'Other', 'A1VC38T7YXB528', '0yrjhsmm77rx2z8@marketplace.amazon.co.jp', '永田あけみ', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('503-0925469-7538442', '2014-07-12 10:48:18', '2014-07-12 11:18:53', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '大津市国分２丁目１−１１', '0', '滋賀県', '520-0844', 'JP', '077-534-4157', 'JPY', '1970', '0', '1', '', 'Other', 'A1VC38T7YXB528', 'tpwzjsr10myqny9@marketplace.amazon.co.jp', '吉田　俊彦', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('503-1431601-7110214', '2014-07-04 12:05:46', '2014-07-07 06:44:04', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Shikoku', '', '新居浜市泉宮町１−５', '0', '愛媛県', '792-0021', 'JP', '0897-37-6154', 'JPY', '1180', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'y1wqpbz98q1xytd@marketplace.amazon.co.jp', '妻鳥　裕子', 'Standard', 'false', 'StandardOrder', '2014-07-06 15:00:00', '2014-07-08 14:59:59', '2014-07-18 15:00:00', '2014-07-26 14:59:59', '0');
INSERT INTO order VALUES ('503-1587094-7339816', '2014-07-08 04:57:20', '2014-07-11 05:12:22', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Hokkaido', '', '札幌市中央区北3条西17丁目2-16', '1', '北海道', '060-0003', 'JP', '011-615-7235', 'JPY', '2380', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'n1crqyvz08pqr5d@marketplace.amazon.co.jp', '田代　修子', 'Standard', 'false', 'StandardOrder', '2014-07-08 15:00:00', '2014-07-10 14:59:59', '2014-07-21 15:00:00', '2014-07-28 14:59:59', '0');
INSERT INTO order VALUES ('503-2653065-7838439', '2014-07-01 12:17:42', '2014-07-03 04:01:32', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '宇陀市室生無山100', '0', '奈良県', '632-0207', 'JP', '0743821138', 'JPY', '4470', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'wddwjs4wdwrfk8m@marketplace.amazon.co.jp', '山本由記江', 'Standard', 'false', 'StandardOrder', '2014-07-01 15:00:00', '2014-07-03 14:59:59', '2014-07-13 15:00:00', '2014-07-20 14:59:59', '0');
INSERT INTO order VALUES ('503-2986114-3515839', '2014-07-12 04:32:38', '2014-07-12 05:03:10', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Kansai', '', '長浜市下坂浜町1-2', '1', '滋賀県', '526-0047', 'JP', '09069395385', 'JPY', '1490', '0', '1', '', 'Other', 'A1VC38T7YXB528', 'pgw062y8d57jb4l@marketplace.amazon.co.jp', '小吹洋平', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('503-3205925-8655039', '2014-07-10 13:29:48', '2014-07-10 14:00:13', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Okinawa', '', '那覇市長田2ー33ー48', '1', '沖縄県', '902-0077', 'JP', '098-836-2785', 'JPY', '1181', '0', '1', '', 'Other', 'A1VC38T7YXB528', 'gz3sqn60342v659@marketplace.amazon.co.jp', '中村　伸', 'Standard', 'false', 'StandardOrder', '2014-07-10 15:00:00', '2014-07-14 14:59:59', '2014-07-23 15:00:00', '2014-08-01 14:59:59', '0');
INSERT INTO order VALUES ('503-3591944-4202451', '2014-07-03 09:30:49', '2014-07-04 02:43:25', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '台東区東上野', '1', '東京都', '110-0015', 'JP', '0358174891', 'JPY', '854', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'p0dlgz8r0cgwyj2@marketplace.amazon.co.jp', '串田美恵子', 'Standard', 'false', 'StandardOrder', '2014-07-03 15:00:00', '2014-07-07 14:59:59', '2014-07-15 15:00:00', '2014-07-25 14:59:59', '0');
INSERT INTO order VALUES ('503-3953138-8899825', '2014-07-10 16:13:32', '2014-07-10 16:43:56', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '土浦市中村南', '1', '茨城県', '300-0843', 'JP', '09044349846', 'JPY', '1840', '0', '1', '', 'Other', 'A1VC38T7YXB528', '7mhm2ltknyn5fs4@m.marketplace.amazon.co.jp', '圓城寺 智子', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('503-4373129-0652014', '2014-07-05 08:32:25', '2014-07-11 05:01:55', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Hokuriku', '', '高岡市福岡町下蓑新20―2', '0', '富山県', '939-0115', 'JP', '09097692460', 'JPY', '1670', '2', '0', '', 'CVS', 'A1VC38T7YXB528', '3fhcc49j6n3266f@m.marketplace.amazon.co.jp', '中野敦子', 'Standard', 'false', 'StandardOrder', '2014-07-07 15:00:00', '2014-07-18 14:59:59', '2014-07-19 15:00:00', '2014-08-05 14:59:59', '0');
INSERT INTO order VALUES ('503-5307089-8631864', '2014-07-01 03:49:20', '2014-07-04 04:23:41', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '川崎市宮前区野川3-1-307', '0', '神奈川県', '216-0001', 'JP', '09055560727', 'JPY', '1690', '1', '0', '', 'CVS', 'A1VC38T7YXB528', '8t0cv69cw6c2ccd@m.marketplace.amazon.co.jp', '鈴木めぐみ', 'Standard', 'false', 'StandardOrder', '2014-07-01 15:00:00', '2014-07-14 14:59:59', '2014-07-13 15:00:00', '2014-08-01 14:59:59', '0');
INSERT INTO order VALUES ('503-7925966-0337425', '2014-07-12 03:44:38', '2014-07-12 04:15:04', 'Unshipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '日立市西成沢町4-29-1', '0', '茨城県', '316-0032', 'JP', '0294372428', 'JPY', '1490', '0', '1', '', 'Other', 'A1VC38T7YXB528', 'rpn69k5nf3cyw43@marketplace.amazon.co.jp', '西裕志', 'Standard', 'false', 'StandardOrder', '2014-07-13 15:00:00', '2014-07-15 14:59:59', '2014-07-26 15:00:00', '2014-08-02 14:59:59', '0');
INSERT INTO order VALUES ('503-8382184-6175810', '2014-07-01 02:45:05', '2014-07-04 00:41:17', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Kanto8', '', '中野区南台3ー6ー22', '1', '東京都', '164-0014', 'JP', '0333835786', 'JPY', '2380', '1', '0', '', 'Other', 'A1VC38T7YXB528', 'n4y0b2gwmz1wmzb@m.marketplace.amazon.co.jp', '平田枝里子', 'Standard', 'false', 'StandardOrder', '2014-07-02 15:00:00', '2014-07-04 14:59:59', '2014-07-14 15:00:00', '2014-07-22 14:59:59', '0');
INSERT INTO order VALUES ('503-9583945-3035845', '2014-07-07 16:06:55', '2014-07-11 05:18:06', 'Shipped', 'MFN', 'Amazon.co.jp', 'Std JP Domestic', '', '仙台市宮城野区鶴巻一丁目', '1', '宮城県', '983-0024', 'JP', '08031964780', 'JPY', '1970', '1', '0', '', 'CVS', 'A1VC38T7YXB528', '4ww42sppbw4yzxf@m.marketplace.amazon.co.jp', '辻知里', 'Standard', 'false', 'StandardOrder', '2014-07-08 15:00:00', '2014-07-22 14:59:59', '2014-07-21 15:00:00', '2014-08-08 14:59:59', '0');

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
