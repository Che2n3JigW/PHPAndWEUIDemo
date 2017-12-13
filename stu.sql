/*
Navicat MySQL Data Transfer

Source Server         : demo
Source Server Version : 50123
Source Host           : localhost:3306
Source Database       : stu

Target Server Type    : MYSQL
Target Server Version : 50123
File Encoding         : 65001

Date: 2017-12-06 09:38:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_order
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('1', '骆驼登山鞋', 'assets/images/2.jpg', '1');
INSERT INTO `t_order` VALUES ('2', '优衣库', 'assets/images/1.jpg', '1');
INSERT INTO `t_order` VALUES ('3', '可乐', '/', '4');
INSERT INTO `t_order` VALUES ('4', '辣条', '/', '4');
INSERT INTO `t_order` VALUES ('5', '华为V10', '/', '4');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `no` varchar(36) NOT NULL,
  `name` varchar(36) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `dept` varchar(36) DEFAULT NULL,
  `password` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('N001', '杨浪01', '男', '电子与信息工程学院', '888888');
INSERT INTO `t_user` VALUES ('N002', '张三', '女', '人文学院', '000000');
INSERT INTO `t_user` VALUES ('N003', '杨浪03', '男', '电子与信息工程学院', null);
INSERT INTO `t_user` VALUES ('N004', '杨浪04', '男', '电子与信息工程学院', null);
INSERT INTO `t_user` VALUES ('N005', '杨浪05', '男', '电子与信息工程学院', null);
INSERT INTO `t_user` VALUES ('N006', '杨浪06', '男', '人文学院', null);
INSERT INTO `t_user` VALUES ('N007', '杨浪07', '男', '人文学院', null);
INSERT INTO `t_user` VALUES ('N008', '杨浪08', '男', '人文学院', null);
INSERT INTO `t_user` VALUES ('N010', '杨浪10', '男', '人文学院', null);
INSERT INTO `t_user` VALUES ('N011', '杨浪11', '男', '人文学院', null);
INSERT INTO `t_user` VALUES ('N012', '杨浪12', '男', '管理学院', null);
INSERT INTO `t_user` VALUES ('N013', '杨浪13', '男', '管理学院', null);
INSERT INTO `t_user` VALUES ('N014', '杨浪14', '男', '管理学院', null);
INSERT INTO `t_user` VALUES ('N015', '杨浪15', '男', '管理学院', null);
INSERT INTO `t_user` VALUES ('N016', '杨浪16', '男', '管理学院', null);
INSERT INTO `t_user` VALUES ('N017', '杨浪17', '男', '管理学院', null);
INSERT INTO `t_user` VALUES ('N018', '杨浪18', '男', '管理学院', null);
INSERT INTO `t_user` VALUES ('N019', '杨浪19', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N020', '杨浪20', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N021', '杨浪21', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N022', '杨浪22', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N023', '杨浪23', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N024', '杨浪24', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N025', '杨浪25', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N026', '杨浪26', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N027', '杨浪27', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N028', '杨浪28', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N029', '杨浪29', '男', '艺术设计学院', null);
INSERT INTO `t_user` VALUES ('N030', '杨浪30', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N031', '杨浪31', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N032', '杨浪32', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N033', '杨浪33', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N034', '杨浪34', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N035', '杨浪35', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N036', '杨浪36', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N037', '杨浪37', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N038', '杨浪38', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N039', '杨浪39', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N040', '杨浪40', '男', '机电工程学院', null);
INSERT INTO `t_user` VALUES ('N041', '杨浪41', '男', '机电工程学院', null);
