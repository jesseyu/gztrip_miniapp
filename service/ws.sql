/*
 Navicat MySQL Data Transfer

 Source Server         : 本地
 Source Server Version : 50627
 Source Host           : localhost
 Source Database       : ws

 Target Server Version : 50627
 File Encoding         : utf-8

 Date: 06/09/2017 10:02:08 AM
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
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
