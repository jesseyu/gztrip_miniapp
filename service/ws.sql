/*
 Navicat MySQL Data Transfer

 Source Server         : 本地
 Source Server Version : 50627
 Source Host           : localhost
 Source Database       : ws

 Target Server Version : 50627
 File Encoding         : utf-8

 Date: 06/19/2017 18:55:33 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `role` int(255) DEFAULT NULL COMMENT '角色',
  `login_time` int(11) DEFAULT NULL COMMENT '登录时间',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `admin`
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES ('13', 'test', '51abb9636078defbf888d8457a7c76f85c8f114c', '1', '1', '1'), ('14', 'xiangdong', '51abb9636078defbf888d8457a7c76f85c8f114c', null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cate_name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `category`
-- ----------------------------
BEGIN;
INSERT INTO `category` VALUES ('1', '川菜', '1');
COMMIT;

-- ----------------------------
--  Table structure for `city`
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '城市名称',
  `imgs` text NOT NULL COMMENT '图片',
  `desc` text COMMENT '描述',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态 0 下线 1 正常',
  `must_food` text NOT NULL COMMENT '必吃美食',
  `must_view` text NOT NULL COMMENT '必去景点',
  `guide` text NOT NULL COMMENT '城市指南',
  `play` text NOT NULL COMMENT '怎么玩',
  `code` varchar(10) DEFAULT NULL COMMENT '邮编',
  `ctime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `city`
-- ----------------------------
BEGIN;
INSERT INTO `city` VALUES ('1', '贵阳', '[\"3dbe27b4d60b8c59a964f97301929ffe1.jpg\"]', '1', '1', '7', '4,5', '', '', '0851', '1496978324'), ('2', '遵义市', '[\"d70daa2e11cdb7dca82f9e9784ee40c21.jpg\"]', '遵义', '1', '', '', '', '', '0851', '1496209761');
COMMIT;

-- ----------------------------
--  Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `fid` int(11) DEFAULT NULL COMMENT '食物文章id',
  `uid` int(11) DEFAULT NULL COMMENT '评论用户id',
  `content` varchar(255) DEFAULT NULL COMMENT '评论内容',
  `citme` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `food`
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `fid` int(11) NOT NULL AUTO_INCREMENT COMMENT '美食ID',
  `uid` int(11) DEFAULT NULL COMMENT '作者id',
  `cata_id` int(11) DEFAULT NULL COMMENT '分类id',
  `content` varchar(255) DEFAULT NULL COMMENT '文字内容',
  `imgs` text COMMENT '图片',
  `ctime` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `is_top` tinyint(4) DEFAULT NULL COMMENT '是否置顶',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `home_page`
-- ----------------------------
DROP TABLE IF EXISTS `home_page`;
CREATE TABLE `home_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slogan` text NOT NULL COMMENT '首页标语',
  `video_url` text NOT NULL COMMENT '视频链接',
  `banner` text NOT NULL COMMENT 'bannner 图片',
  `season_view` text NOT NULL COMMENT '当季景点',
  `recommend_view` text NOT NULL COMMENT '推荐景点',
  `recommend_food` text NOT NULL COMMENT '推荐食物',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `home_page`
-- ----------------------------
BEGIN;
INSERT INTO `home_page` VALUES ('1', '贵州欢迎你', 'www.baidu.com', '7decc1e6edcb0135169bc483ff9a1cc71.jpg,1e275c6c4d989ceba608879c358e03ec1.png', '4,5,6', '4,5,6', '7', '1497869689');
COMMIT;

-- ----------------------------
--  Table structure for `like`
-- ----------------------------
DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `fid` int(11) DEFAULT NULL COMMENT '文章id',
  `uid` int(11) DEFAULT NULL COMMENT '点赞用户id',
  `ctime` int(11) DEFAULT NULL COMMENT '点赞时间',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `login_log`
-- ----------------------------
DROP TABLE IF EXISTS `login_log`;
CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `point`
-- ----------------------------
DROP TABLE IF EXISTS `point`;
CREATE TABLE `point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_id` int(11) NOT NULL COMMENT '所属城市',
  `type` varchar(100) NOT NULL COMMENT '类型',
  `name` varchar(255) NOT NULL COMMENT '名称',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '状态 0下线 1 正常',
  `obj` text NOT NULL COMMENT '字段内容',
  `ctime` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `point`
-- ----------------------------
BEGIN;
INSERT INTO `point` VALUES ('4', '1', 'view', '大山1', '1', '{\"son_views\":\"1,2\",\"fee\":\"100\",\"traffic\":\"21\",\"video\":\"1\",\"des\":\"1\",\"score\":\"1\",\"open_time\":\"1\",\"phone\":\"1\",\"tip\":\"1\",\"imgs\":[\"http:\\/\\/ws.com\\/local\\/cbe5b038e740fc9586b4eca02dfdea431.jpg\"]}', '1495870849'), ('5', '0', 'view', '大河', '1', '{\"fee\":\"100\",\"traffic\":\"1\",\"video\":\"2\",\"des\":\"1\",\"score\":\"11\",\"open_time\":\"11\",\"phone\":\"1\",\"tip\":\"111\",\"imgs\":[\"56624b54f860be2177c2195301ef094c1.png\"]}', '1496199625'), ('6', '0', 'view', '长江', '1', '{\"fee\":\"1\",\"traffic\":\"1\",\"video\":\"1\",\"des\":\"1\",\"score\":\"1\",\"open_time\":\"1\",\"phone\":\"1\",\"tip\":\"1\",\"imgs\":[\"http:\\/\\/ws.com\\/local\\/fa2aa5d34e742169c5cb206a43f8ad931.jpg\",\"http:\\/\\/ws.com\\/local\\/827884da538aed106de035c79da340e31.png\"]}', '1496200212'), ('7', '2', 'food', '锅包肉', '1', '{\"fee\":\"1\",\"traffic\":\"1\",\"video\":\"1\",\"des\":\"1\",\"score\":\"1\",\"open_time\":\"1\",\"phone\":\"1\",\"tip\":\"1\",\"imgs\":[\"2c5750bf2c0b73964053422916ace8521.jpg\",\"4022ad733c3d752a94fcc678e4743dad1.png\"]}', '1496200653'), ('9', '1', 'specialty', '土豆片', '1', '{\"taste\":\"2\",\"where\":\"1\",\"imgs\":[\"bc55568f9ecb4802a63894ab201d2c3e1.png\"]}', '1496838907');
COMMIT;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `avator` varchar(255) DEFAULT NULL COMMENT '头像',
  `sex` int(255) DEFAULT NULL COMMENT '性别',
  `age` int(11) DEFAULT NULL COMMENT '年龄',
  `zone` varchar(255) DEFAULT NULL COMMENT '地区',
  `sign` varchar(255) DEFAULT NULL COMMENT '个人签名',
  `point` int(11) DEFAULT NULL COMMENT '积分',
  `type` tinyint(4) DEFAULT NULL COMMENT '类型',
  `status` tinyint(255) DEFAULT NULL COMMENT '状态',
  `ctime` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
