/*
Navicat MySQL Data Transfer

Source Server         : blog
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-10-28 17:56:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text,
  `image` varchar(255) DEFAULT '',
  `classify_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `createtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('3', '浪漫', '1111111111111111111111111111111', './public/upload/img_15086405154321900.png', '5', '1', '2017-10-22 10:48:35', '0000-00-00 00:00:00');
INSERT INTO `blog` VALUES ('4', '哈哈哈', '哈哈哈哈哈哈哈哈哈哈哈', './public/upload/img_15086424911614380.png', '6', '1', '2017-10-22 11:21:31', '0000-00-00 00:00:00');
INSERT INTO `blog` VALUES ('5', '啦啦啦啦啦啦啦', '啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦', './public/upload/img_15086518593491822.png', '6', '1', '2017-10-22 13:57:39', '0000-00-00 00:00:00');
INSERT INTO `blog` VALUES ('6', '啊啊啊', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', './public/upload/img_15086518809063416.png', '6', '1', '2017-10-22 13:58:00', '0000-00-00 00:00:00');
INSERT INTO `blog` VALUES ('7', '11111111111111111', '11111111111111111111111111', './public/upload/img_15088474704769288.png', '3', '1', '2017-10-24 20:17:50', '0000-00-00 00:00:00');
INSERT INTO `blog` VALUES ('8', '22222222222', '222222222222222', './public/upload/img_15088498888381043.png', '4', '1', '2017-10-24 20:58:08', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for classify
-- ----------------------------
DROP TABLE IF EXISTS `classify`;
CREATE TABLE `classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of classify
-- ----------------------------
INSERT INTO `classify` VALUES ('1', '慢生活', '0', '1');
INSERT INTO `classify` VALUES ('2', '网站建设', '0', '0');
INSERT INTO `classify` VALUES ('3', 'css', '2', '0');
INSERT INTO `classify` VALUES ('4', 'php', '2', '0');
INSERT INTO `classify` VALUES ('5', '日记', '1', '0');
INSERT INTO `classify` VALUES ('6', '欣赏', '1', '1');
INSERT INTO `classify` VALUES ('7', '啦啦啦啦', '0', '0');
INSERT INTO `classify` VALUES ('8', '啦1', '7', '0');
INSERT INTO `classify` VALUES ('9', 'html', '2', '1');
INSERT INTO `classify` VALUES ('10', 'java', '2', '1');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `content` text,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('3', '1', '8', '0', '哈哈哈鼠标的许华升本次USA本次USA本次USABC尿酸', '2017-10-26 18:42:58');
INSERT INTO `comment` VALUES ('4', '1', '8', '0', '哈哈哈哈哈', '0000-00-00 00:00:00');
INSERT INTO `comment` VALUES ('5', '5', '8', '0', '666666666666666666', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT '',
  `status` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '闫宇轩', '1@qq.com', '1', './public/upload/img_15089004788684388.png', '0', '2017-10-25 11:01:18', null);
INSERT INTO `user` VALUES ('2', '1@qq.com', '', '', '', '0', '2017-10-25 11:17:43', null);
INSERT INTO `user` VALUES ('3', '1@qq.com', '', '', '', '0', '2017-10-25 11:17:56', null);
INSERT INTO `user` VALUES ('4', '1@qq.com', '', '', '', '0', '2017-10-25 11:18:54', null);
INSERT INTO `user` VALUES ('5', '牛顿', '2@qq.com', '2', './public/upload/img_15090179659774781.png', '0', '2017-10-26 19:39:25', null);
INSERT INTO `user` VALUES ('6', '牛顿', '2@qq.com', '2', './public/upload/img_15090179942030945.png', '0', '2017-10-26 19:39:54', null);
