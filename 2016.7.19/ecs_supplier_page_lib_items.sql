/*
Navicat MySQL Data Transfer

Source Server         : shenlin
Source Server Version : 50027
Source Host           : localhost:3306
Source Database       : project1

Target Server Type    : MYSQL
Target Server Version : 50027
File Encoding         : 65001

Date: 2016-07-19 21:45:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ecs_supplier_page_lib_items
-- ----------------------------
DROP TABLE IF EXISTS `ecs_supplier_page_lib_items`;
CREATE TABLE `ecs_supplier_page_lib_items` (
  `sysid` varchar(20) NOT NULL,
  `supplier_id` mediumint(10) NOT NULL,
  `page_id` int(4) NOT NULL,
  `row` double(10,1) NOT NULL default '0.0',
  `lib_id` int(4) NOT NULL,
  `lib_title` varchar(255) default NULL,
  `lib_text` text,
  `img_url1` varchar(255) default NULL,
  `img_url2` varchar(255) default NULL,
  `img_url3` varchar(255) default NULL,
  `img_url4` varchar(255) default NULL,
  `item_url1` varchar(255) default NULL,
  `item_url2` varchar(255) default NULL,
  `item_url3` varchar(255) default NULL,
  `item_url4` varchar(255) default NULL,
  `lib_num` smallint(3) NOT NULL,
  `lib_num_max` smallint(3) NOT NULL,
  `visibility` tinyint(4) NOT NULL,
  PRIMARY KEY  (`sysid`,`supplier_id`,`page_id`,`row`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ecs_supplier_page_lib_items
-- ----------------------------
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '1.0', '12', '标题', '', './files/top-bg.jpg', '', '', '', '', '', '', '', '1', '1', '1');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '2.0', '41', '大图2', '', './files/dcr-default-bg504.jpg', './files/dcr-default-bg504.jpg', './files/dcr-default-bg504.jpg', './files/dcr-default-bg504.jpg', '', '', '', '', '2', '4', '1');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '3.0', '23', '文字模块', '<p>Hello, World!a</p>', '', '', '', '', '', '', '', '', '2', '2', '1');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '4.0', '23', '文字模块', '<p><span style=\"color: #33cccc;\">aaaaald!</span></p>', '', '', '', '', '', '', '', '', '2', '2', '1');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '5.0', '42', '导航4', '', '', '', '', '', 'https://www.google.com', '', '', '', '1', '3', '1');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '6.0', '41', '', '', './files/27145152-050e5ad473754109a607f5d3ae1578c5.jpg', './files/20111113102027320420.jpg', './files/dcr-default-bg504.jpg', './files/dcr-default-bg504.jpg', 'https://www.baidu.com', 'https://www.google.com', '', '', '2', '4', '1');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '7.0', '0', '增加框', '', '', '', '', '', '', '', '', '', '1', '1', '1');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '8.0', '41', '图片导航', '', './files/user.png', '', '', '', '', '', '', '', '2', '4', '0');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '9.0', '42', '文字导航', '', '', '', '', '', '', '', '', '', '1', '3', '0');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '10.0', '41', '图片导航', '', './files/user.png', '', '', '', '', '', '', '', '2', '4', '0');
INSERT INTO `ecs_supplier_page_lib_items` VALUES ('cheyikai', '0', '1', '11.0', '42', '文字导航', '', '', '', '', '', '', '', '', '', '1', '3', '0');
