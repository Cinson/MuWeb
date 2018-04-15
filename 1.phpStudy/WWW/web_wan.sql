/*
Navicat MySQL Data Transfer

Source Server         : MU
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : web_wan

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-02-24 14:58:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` int(11) DEFAULT '1' COMMENT '优先级',
  `img_url` varchar(200) DEFAULT NULL COMMENT '图片地址',
  `link_url` varchar(200) DEFAULT NULL COMMENT '连接地址',
  `is_show` int(11) DEFAULT NULL COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------

-- ----------------------------
-- Table structure for `blockip`
-- ----------------------------
DROP TABLE IF EXISTS `blockip`;
CREATE TABLE `blockip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `isban` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of blockip
-- ----------------------------

-- ----------------------------
-- Table structure for `exchange_log`
-- ----------------------------
DROP TABLE IF EXISTS `exchange_log`;
CREATE TABLE `exchange_log` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `rmb` int(11) DEFAULT NULL,
  `order_yb` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `server_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT '1' COMMENT '1:兑换,2:福利',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of exchange_log
-- ----------------------------
INSERT INTO `exchange_log` VALUES ('1', 'guangyou88', '1', '1000', '1', '1', '1', '2018-02-03 20:42:18', '1');
INSERT INTO `exchange_log` VALUES ('2', 'guangyou88', '1', '1000', '1', '1', '1', '2018-02-03 20:42:27', '1');
INSERT INTO `exchange_log` VALUES ('3', 'guangyou88', '1', '1000', '1', '1', '1', '2018-02-03 20:42:35', '1');
INSERT INTO `exchange_log` VALUES ('4', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:42:35', '1');
INSERT INTO `exchange_log` VALUES ('5', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:43:40', '1');
INSERT INTO `exchange_log` VALUES ('6', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:44:43', '1');
INSERT INTO `exchange_log` VALUES ('7', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:45:00', '1');
INSERT INTO `exchange_log` VALUES ('8', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:45:29', '1');
INSERT INTO `exchange_log` VALUES ('9', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:46:14', '1');
INSERT INTO `exchange_log` VALUES ('10', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:46:45', '1');
INSERT INTO `exchange_log` VALUES ('11', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:47:59', '1');
INSERT INTO `exchange_log` VALUES ('12', '123456', '1', '1000', '1', '1', '1', '2018-02-24 10:48:54', '1');
INSERT INTO `exchange_log` VALUES ('13', '123456', '999', '999000', '1', '1', '1', '2018-02-24 10:49:39', '1');
INSERT INTO `exchange_log` VALUES ('14', '123456', '1000', '1000000', '1', '1', '1', '2018-02-24 10:56:19', '1');
INSERT INTO `exchange_log` VALUES ('15', '8793933', '100000', '100000000', '1', '1', '1', '2018-02-24 14:17:11', '1');
INSERT INTO `exchange_log` VALUES ('16', '879393', '999', '999000', '1', '1', '1', '2018-02-24 14:50:44', '1');

-- ----------------------------
-- Table structure for `game_list`
-- ----------------------------
DROP TABLE IF EXISTS `game_list`;
CREATE TABLE `game_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` int(11) DEFAULT '1' COMMENT '权重',
  `gid` int(11) DEFAULT NULL COMMENT '游戏唯一标识',
  `game_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '游戏中文名称',
  `is_recom` int(11) DEFAULT NULL COMMENT '是否推荐',
  `game_jianjie` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '游戏简介',
  `game_tag` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '游戏类型',
  `is_online` int(11) DEFAULT '0' COMMENT '是否正式上线',
  `game_img_1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '游戏图片',
  `game_img_2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_img_3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_img_4` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_img_5` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_img_6` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_img_7` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `danye` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dlq` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '登录器下载地址',
  `welfare` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '新手福利简介',
  `pay_api_url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '充值地址',
  `pay_api_key` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '充值Key',
  `pay_content` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '充值内容',
  `awardset` varchar(200) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '充值优惠',
  `tg_content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '推广内容',
  `login_api_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '登录接口',
  `login_api_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '登录key',
  `pay_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '充值地址',
  `qq` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'QQ',
  `qqq` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'QQ群',
  `res_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '资源地址',
  `res_url1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '资源地址',
  `server_api_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '游戏api',
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `des` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of game_list
-- ----------------------------
INSERT INTO `game_list` VALUES ('1', '1', '1', '大天使之剑', '1', '新手任务送《雷霆霹雳》套装，送4级境界，送85级！', '大天使之剑', '角色扮演', '1', '/upload/tiantu/tiantu1.jpg', '/upload/tiantu/tiantu2.jpg', '/upload/tiantu/tiantu3.jpg', '/upload/tiantu/tiantu4.png', '/upload/tiantu/tiantu5.png', '/upload/tiantu/tiantu6.jpg', '/upload/tiantu/tiantu7.jpg', '', '', '', 'http://127.0.0.1:7517', '', '1000', '1000', '上线送等级85，上线送《雷霆霹雳》套装，上线送2阶血符，3阶命珠，4阶神石，4级境界，4阶翅膀，5阶护盾，5阶斗笠。', 'http://127.0.0.1:7517', '5499e5dd63be5fe571eb7ad80d4d7570', 'http://127.0.0.1:7517', '331323369', '56695222', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `link`
-- ----------------------------
DROP TABLE IF EXISTS `link`;
CREATE TABLE `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weight` int(11) DEFAULT '1',
  `link_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `link_img` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isshow` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='友情链接';

-- ----------------------------
-- Records of link
-- ----------------------------
INSERT INTO `link` VALUES ('1', '1', '大天使之剑', 'http://www.9378wan.com', '', '1');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `is_toutiao` int(11) DEFAULT '0',
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '大天使开区信息', '<p>	</p><p>测试</p><p>	</p>', '热门', '1000', '0', '2018-01-02 20:39:10');
INSERT INTO `news` VALUES ('2', '大天使之剑福利来啦！', '&lt;p&gt;测试&lt;/p&gt;', '热门', '0', '0', '2018-02-24 14:36:32');

-- ----------------------------
-- Table structure for `pay_log`
-- ----------------------------
DROP TABLE IF EXISTS `pay_log`;
CREATE TABLE `pay_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `pay_rmb` int(11) DEFAULT NULL COMMENT '充值的金额',
  `pay_zuanshi` int(11) DEFAULT NULL COMMENT '得到的钻石数量',
  `pay_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pay_log
-- ----------------------------

-- ----------------------------
-- Table structure for `pintai`
-- ----------------------------
DROP TABLE IF EXISTS `pintai`;
CREATE TABLE `pintai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platform` varchar(50) DEFAULT NULL,
  `site_name` varchar(80) DEFAULT NULL,
  `web_site` varchar(80) DEFAULT NULL,
  `bei_no` varchar(80) DEFAULT NULL,
  `pay_url` varchar(100) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `qqqun` varchar(20) DEFAULT NULL,
  `supname` varchar(20) DEFAULT NULL,
  `logo_pic` varchar(255) DEFAULT '/images/logo.png' COMMENT '网站logo图片',
  `suppass` varchar(20) DEFAULT NULL,
  `tjdm` varchar(255) DEFAULT NULL COMMENT '统计代码',
  `qdm` varchar(255) DEFAULT NULL COMMENT '群代码',
  `guanjianzi` varchar(255) DEFAULT NULL,
  `miaoxu` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pintai
-- ----------------------------
INSERT INTO `pintai` VALUES ('1', 'tg', '大天使之剑', '127.0.0.1', '苏icp备12028596号-7', '', '331323369', '56695222', 'admin', '/Images/logo.png', 'aazyw', 'http://s23.cnzz.com/z_stat.php?id=1252947738&web_id=1252947738', 'http://shang.qq.com/wpa/qunwpa?idkey=bbcb851b6181a1ed7776172ccc92275454c9e3527c9dcfc692964fa4917c4eba', '', '');

-- ----------------------------
-- Table structure for `rmb`
-- ----------------------------
DROP TABLE IF EXISTS `rmb`;
CREATE TABLE `rmb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `order_rmb` int(11) DEFAULT NULL COMMENT '?????',
  `order_zuanshi` int(11) DEFAULT NULL COMMENT '????',
  `order_yb` int(11) DEFAULT NULL COMMENT '????',
  `server_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_server_id` int(11) DEFAULT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rmb
-- ----------------------------

-- ----------------------------
-- Table structure for `rmb_log`
-- ----------------------------
DROP TABLE IF EXISTS `rmb_log`;
CREATE TABLE `rmb_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `pay_game` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `order_rmb` int(11) DEFAULT NULL COMMENT '人民币金额',
  `order_zuanshi` int(11) DEFAULT NULL COMMENT '钻石数量',
  `order_yb` int(11) DEFAULT NULL COMMENT '元宝数量',
  `server_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_server_id` int(11) DEFAULT NULL,
  `log_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rmb_log
-- ----------------------------

-- ----------------------------
-- Table structure for `send_log`
-- ----------------------------
DROP TABLE IF EXISTS `send_log`;
CREATE TABLE `send_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `send_rmb` int(11) DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `server_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sendmsg` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of send_log
-- ----------------------------

-- ----------------------------
-- Table structure for `server`
-- ----------------------------
DROP TABLE IF EXISTS `server`;
CREATE TABLE `server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL COMMENT '游戏ID',
  `server_id` int(11) DEFAULT NULL COMMENT '服务器ID',
  `server_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_server_id` int(11) DEFAULT NULL,
  `wt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dx` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `port` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '游戏中的fu1',
  `pid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '平台ID',
  `res_url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `zuixin` int(11) DEFAULT NULL COMMENT '是否推荐',
  `login_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of server
-- ----------------------------
INSERT INTO `server` VALUES ('1', '1', '1', '大天使之剑1区', null, '', '', '', '', '', 'http://127.0.0.1/res/', '2018-01-05 15:30:00', '1', '127.0.0.1:32001');
INSERT INTO `server` VALUES ('2', '1', '2', '大天使之剑2区', null, null, null, null, null, null, '', '2018-01-17 13:10:00', '1', '');
INSERT INTO `server` VALUES ('3', '1', '3', '大天使之剑3区', null, null, null, null, null, null, '', '2018-01-17 20:20:00', '1', '');
INSERT INTO `server` VALUES ('4', '1', '4', '大天使之剑4区', null, '', '', '', '', '', '', '2018-01-17 20:20:00', '1', null);
INSERT INTO `server` VALUES ('5', '1', '5', '大天使之剑业5区', null, '', '', '', '', '', '', '2018-01-17 20:20:00', '1', null);
INSERT INTO `server` VALUES ('6', '1', '6', '大天使之剑6区', null, '', '', '', '', '', '', '2018-01-05 15:30:00', '1', null);
INSERT INTO `server` VALUES ('7', '1', '7', '大天使之剑7区', null, '', '', '', '', '', '', '2018-01-05 15:30:00', '1', null);
INSERT INTO `server` VALUES ('8', '1', '8', '大天使之剑8区', null, '', '', '', '', '', '', '2018-01-05 15:30:00', '1', null);
INSERT INTO `server` VALUES ('9', '1', '9', '大天使之剑9区', null, '', '', '', '', '', '', '2018-01-05 15:30:00', '1', null);

-- ----------------------------
-- Table structure for `server_login_log`
-- ----------------------------
DROP TABLE IF EXISTS `server_login_log`;
CREATE TABLE `server_login_log` (
  `username` varchar(30) NOT NULL,
  `gid` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `login_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`,`gid`,`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of server_login_log
-- ----------------------------
INSERT INTO `server_login_log` VALUES ('guangyou00', '1', '1', '2018-02-13 22:26:49', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('guangyou00', '2', '1', '2016-04-11 22:32:24', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('guangyou00', '1', '3', '2017-05-22 23:45:40', '::1');
INSERT INTO `server_login_log` VALUES ('atop885', '1', '1', '2018-01-04 20:44:49', '115.227.30.248');
INSERT INTO `server_login_log` VALUES ('guangyou00', '1', '2', '2018-01-28 18:31:27', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('guangyou00', '1', '5', '2017-05-23 22:04:55', '::1');
INSERT INTO `server_login_log` VALUES ('qwe5439', '1', '4', '2017-12-21 14:29:09', '182.38.188.22');
INSERT INTO `server_login_log` VALUES ('qwe5439', '1', '1', '2017-12-21 14:28:57', '182.38.188.22');
INSERT INTO `server_login_log` VALUES ('amwjepl', '1', '1', '2018-01-01 12:34:31', '123.173.57.226');
INSERT INTO `server_login_log` VALUES ('qq111111', '1', '4', '2017-12-31 16:09:18', '58.217.79.106');
INSERT INTO `server_login_log` VALUES ('qq111111', '1', '1', '2018-01-04 20:32:03', '58.217.78.222');
INSERT INTO `server_login_log` VALUES ('qq111111', '1', '3', '2017-12-22 08:46:43', '180.118.227.58');
INSERT INTO `server_login_log` VALUES ('q1999001', '1', '4', '2017-12-22 14:18:06', '222.85.110.131');
INSERT INTO `server_login_log` VALUES ('q1999001', '1', '1', '2018-01-06 20:26:44', '59.54.242.87');
INSERT INTO `server_login_log` VALUES ('ok728392184', '1', '1', '2018-01-08 15:43:33', '124.228.181.226');
INSERT INTO `server_login_log` VALUES ('ok728392184', '1', '4', '2017-12-23 19:11:16', '125.44.52.134');
INSERT INTO `server_login_log` VALUES ('zfkeji', '1', '4', '2017-12-24 10:26:29', '112.253.27.16');
INSERT INTO `server_login_log` VALUES ('zfkeji', '1', '1', '2017-12-24 10:31:03', '112.253.27.16');
INSERT INTO `server_login_log` VALUES ('zfkeji', '1', '3', '2017-12-24 10:31:43', '112.253.27.16');
INSERT INTO `server_login_log` VALUES ('qqq333', '1', '4', '2017-12-26 12:36:59', '113.234.93.238');
INSERT INTO `server_login_log` VALUES ('qq111111', '1', '5', '2017-12-31 15:33:58', '58.217.79.106');
INSERT INTO `server_login_log` VALUES ('123456', '1', '1', '2018-02-24 11:24:54', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('5201314', '1', '1', '2017-12-31 20:16:31', '171.91.67.152');
INSERT INTO `server_login_log` VALUES ('qq8793933', '1', '1', '2018-01-08 05:41:21', '114.239.32.93');
INSERT INTO `server_login_log` VALUES ('amwjepl1', '1', '1', '2018-01-01 12:37:06', '123.173.57.226');
INSERT INTO `server_login_log` VALUES ('ceshiyong', '1', '1', '2018-01-01 20:35:42', '180.172.177.249');
INSERT INTO `server_login_log` VALUES ('ayiui4566', '1', '1', '2018-01-02 11:15:30', '27.188.217.36');
INSERT INTO `server_login_log` VALUES ('a5360111', '1', '1', '2018-01-03 00:34:43', '124.115.253.117');
INSERT INTO `server_login_log` VALUES ('guangyou66', '1', '1', '2018-01-28 09:39:13', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('guangyou23', '1', '1', '2018-01-02 12:40:38', '175.20.89.27');
INSERT INTO `server_login_log` VALUES ('guangyou55', '1', '1', '2018-01-04 14:09:45', '123.173.57.224');
INSERT INTO `server_login_log` VALUES ('guangyou0011', '1', '1', '2018-01-02 12:42:43', '175.20.89.26');
INSERT INTO `server_login_log` VALUES ('guangyou22', '1', '1', '2018-01-02 12:43:08', '175.20.89.27');
INSERT INTO `server_login_log` VALUES ('guangyou33', '1', '1', '2018-01-02 12:43:29', '122.142.16.198');
INSERT INTO `server_login_log` VALUES ('guangyou44', '1', '1', '2018-01-02 12:43:54', '122.142.16.198');
INSERT INTO `server_login_log` VALUES ('guangyou77', '1', '1', '2018-01-02 12:44:16', '122.142.16.198');
INSERT INTO `server_login_log` VALUES ('guangyou88', '1', '1', '2018-01-28 09:35:39', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('guangyou26', '1', '1', '2018-01-02 14:53:12', '1.62.179.30');
INSERT INTO `server_login_log` VALUES ('tang88d', '1', '1', '2018-01-08 09:48:13', '218.76.102.91');
INSERT INTO `server_login_log` VALUES ('cooxie', '1', '1', '2018-01-07 12:23:23', '180.124.69.19');
INSERT INTO `server_login_log` VALUES ('qq11121', '1', '1', '2018-01-03 10:17:03', '119.36.187.102');
INSERT INTO `server_login_log` VALUES ('00qwe00', '1', '1', '2018-01-02 21:45:33', '183.2.91.1');
INSERT INTO `server_login_log` VALUES ('wsyangcunzhi', '1', '1', '2018-01-05 15:51:52', '183.25.133.18');
INSERT INTO `server_login_log` VALUES ('qndy888', '1', '1', '2018-01-02 22:37:27', '219.132.75.38');
INSERT INTO `server_login_log` VALUES ('19821120', '1', '1', '2018-01-09 12:40:38', '115.218.113.131');
INSERT INTO `server_login_log` VALUES ('asdasd123', '1', '1', '2018-01-02 21:45:54', '157.0.142.218');
INSERT INTO `server_login_log` VALUES ('dzh123', '1', '1', '2018-01-02 21:46:07', '124.88.168.173');
INSERT INTO `server_login_log` VALUES ('likolpkaka', '1', '1', '2018-01-05 16:23:52', '182.149.207.33');
INSERT INTO `server_login_log` VALUES ('xx920517', '1', '1', '2018-01-02 21:48:52', '183.131.116.68');
INSERT INTO `server_login_log` VALUES ('qq5478099', '1', '1', '2018-01-02 21:47:13', '125.67.37.38');
INSERT INTO `server_login_log` VALUES ('xuwikang', '1', '1', '2018-01-02 21:51:38', '122.137.247.123');
INSERT INTO `server_login_log` VALUES ('m861206m', '1', '1', '2018-01-02 21:55:16', '171.213.108.240');
INSERT INTO `server_login_log` VALUES ('qq8675', '1', '1', '2018-01-02 21:56:13', '183.69.193.60');
INSERT INTO `server_login_log` VALUES ('bjhyn886', '1', '1', '2018-01-02 23:02:39', '218.57.44.8');
INSERT INTO `server_login_log` VALUES ('w970213273', '1', '1', '2018-01-02 22:21:25', '58.52.18.205');
INSERT INTO `server_login_log` VALUES ('asz198510', '1', '1', '2018-01-02 22:19:34', '113.109.30.143');
INSERT INTO `server_login_log` VALUES ('798701067', '1', '1', '2018-01-03 00:15:22', '183.53.109.164');
INSERT INTO `server_login_log` VALUES ('3553205', '1', '1', '2018-01-02 22:39:56', '171.113.95.77');
INSERT INTO `server_login_log` VALUES ('qw123321', '1', '1', '2018-01-02 22:41:01', '123.180.77.194');
INSERT INTO `server_login_log` VALUES ('qq1231', '1', '1', '2018-01-02 22:45:21', '116.117.134.19');
INSERT INTO `server_login_log` VALUES ('zc727699856', '1', '1', '2018-01-02 22:53:26', '183.25.133.242');
INSERT INTO `server_login_log` VALUES ('wadsdz519', '1', '1', '2018-01-02 22:58:29', '183.25.133.242');
INSERT INTO `server_login_log` VALUES ('tianshinihao2', '1', '1', '2018-01-03 00:09:12', '114.233.21.177');
INSERT INTO `server_login_log` VALUES ('wasd666', '1', '1', '2018-01-02 23:17:44', '183.25.133.242');
INSERT INTO `server_login_log` VALUES ('aospjf1981', '1', '1', '2018-01-02 23:18:17', '183.25.133.242');
INSERT INTO `server_login_log` VALUES ('hlhjlhtut', '1', '1', '2018-01-02 23:28:17', '183.25.133.242');
INSERT INTO `server_login_log` VALUES ('23hgh11', '1', '1', '2018-01-02 23:28:55', '183.25.133.242');
INSERT INTO `server_login_log` VALUES ('a198411', '1', '1', '2018-01-06 01:32:19', '183.214.190.202');
INSERT INTO `server_login_log` VALUES ('z3190273', '1', '1', '2018-01-03 13:46:18', '218.29.7.50');
INSERT INTO `server_login_log` VALUES ('pqmak23', '1', '1', '2018-01-07 16:57:11', '123.130.48.33');
INSERT INTO `server_login_log` VALUES ('huangg60', '1', '1', '2018-01-03 08:18:11', '112.27.254.55');
INSERT INTO `server_login_log` VALUES ('zou123456', '1', '1', '2018-01-03 15:08:49', '1.204.18.51');
INSERT INTO `server_login_log` VALUES ('890119', '1', '1', '2018-01-03 10:38:49', '111.38.205.233');
INSERT INTO `server_login_log` VALUES ('pqmak22', '1', '1', '2018-01-03 09:19:13', '221.0.112.108');
INSERT INTO `server_login_log` VALUES ('zy00735', '1', '1', '2018-01-03 09:37:03', '61.185.95.56');
INSERT INTO `server_login_log` VALUES ('llgf007', '1', '1', '2018-01-05 15:22:18', '183.190.46.146');
INSERT INTO `server_login_log` VALUES ('a15944935686', '1', '1', '2018-01-03 10:06:30', '175.18.88.237');
INSERT INTO `server_login_log` VALUES ('flex888', '1', '1', '2018-01-03 10:28:52', '123.160.246.101');
INSERT INTO `server_login_log` VALUES ('houlimeng', '1', '1', '2018-01-03 10:35:58', '111.206.110.8');
INSERT INTO `server_login_log` VALUES ('aa135790', '1', '1', '2018-01-03 11:08:58', '117.37.203.75');
INSERT INTO `server_login_log` VALUES ('0220202020', '1', '1', '2018-01-04 18:58:35', '222.133.154.103');
INSERT INTO `server_login_log` VALUES ('jin123', '1', '1', '2018-01-03 11:36:28', '114.30.167.148');
INSERT INTO `server_login_log` VALUES ('yufei2017', '1', '1', '2018-01-03 11:43:15', '113.83.248.224');
INSERT INTO `server_login_log` VALUES ('qq11qqw2345', '1', '1', '2018-01-03 11:45:54', '112.27.254.54');
INSERT INTO `server_login_log` VALUES ('wychg2011', '1', '1', '2018-01-03 11:46:11', '39.84.103.164');
INSERT INTO `server_login_log` VALUES ('15543987232', '1', '1', '2018-01-03 12:27:15', '222.160.225.56');
INSERT INTO `server_login_log` VALUES ('yao95978', '1', '1', '2018-01-03 13:01:31', '180.104.25.76');
INSERT INTO `server_login_log` VALUES ('tgswl2', '1', '1', '2018-01-05 11:09:36', '113.25.164.21');
INSERT INTO `server_login_log` VALUES ('m8855260', '1', '1', '2018-01-03 13:12:42', '180.104.25.76');
INSERT INTO `server_login_log` VALUES ('kiss20004', '1', '1', '2018-01-03 14:18:49', '120.229.126.29');
INSERT INTO `server_login_log` VALUES ('503487212', '1', '1', '2018-01-07 13:39:11', '171.217.115.2');
INSERT INTO `server_login_log` VALUES ('a1303213', '1', '1', '2018-01-03 15:27:11', '183.93.146.56');
INSERT INTO `server_login_log` VALUES ('sunjzh', '1', '1', '2018-01-03 16:01:15', '119.251.186.221');
INSERT INTO `server_login_log` VALUES ('xq123456', '1', '1', '2018-01-03 17:35:00', '119.39.143.213');
INSERT INTO `server_login_log` VALUES ('wo355455802', '1', '1', '2018-01-03 17:36:58', '14.118.158.113');
INSERT INTO `server_login_log` VALUES ('rbrb1026', '1', '1', '2018-01-07 18:28:19', '182.240.91.35');
INSERT INTO `server_login_log` VALUES ('lyfwxl123', '1', '1', '2018-01-03 18:43:12', '220.165.17.232');
INSERT INTO `server_login_log` VALUES ('lin550', '1', '1', '2018-01-03 19:06:57', '27.156.132.121');
INSERT INTO `server_login_log` VALUES ('n123456789', '1', '1', '2018-01-03 19:56:27', '27.20.8.129');
INSERT INTO `server_login_log` VALUES ('zkh1314', '1', '1', '2018-01-03 20:33:34', '59.63.206.213');
INSERT INTO `server_login_log` VALUES ('qaz2530qaz', '1', '1', '2018-01-06 19:54:18', '112.116.72.155');
INSERT INTO `server_login_log` VALUES ('qishahyw123', '1', '1', '2018-01-03 22:38:09', '113.128.93.220');
INSERT INTO `server_login_log` VALUES ('asd5628569', '1', '1', '2018-01-03 23:26:08', '106.5.118.58');
INSERT INTO `server_login_log` VALUES ('s139871', '1', '1', '2018-01-03 23:25:47', '61.185.115.215');
INSERT INTO `server_login_log` VALUES ('qwe111111', '1', '1', '2018-01-04 07:32:16', '182.124.247.168');
INSERT INTO `server_login_log` VALUES ('sharpkey', '1', '1', '2018-01-04 09:06:06', '113.88.159.56');
INSERT INTO `server_login_log` VALUES ('qqqsml', '1', '1', '2018-01-04 09:06:57', '113.88.159.56');
INSERT INTO `server_login_log` VALUES ('zhang4618', '1', '1', '2018-01-04 09:23:19', '124.95.144.55');
INSERT INTO `server_login_log` VALUES ('z438901165', '1', '1', '2018-01-04 09:27:44', '119.39.143.213');
INSERT INTO `server_login_log` VALUES ('nihao5188', '1', '1', '2018-01-04 09:32:08', '221.206.245.231');
INSERT INTO `server_login_log` VALUES ('s130981', '1', '1', '2018-01-04 11:52:48', '61.185.115.215');
INSERT INTO `server_login_log` VALUES ('w5367820', '1', '1', '2018-01-04 13:11:55', '183.64.112.46');
INSERT INTO `server_login_log` VALUES ('zhang1', '1', '1', '2018-01-04 13:48:39', '171.214.243.137');
INSERT INTO `server_login_log` VALUES ('jianshe61', '1', '1', '2018-01-05 10:45:28', '182.201.178.36');
INSERT INTO `server_login_log` VALUES ('zaq4446', '1', '1', '2018-01-04 15:10:37', '180.125.183.26');
INSERT INTO `server_login_log` VALUES ('babcyut', '1', '1', '2018-01-04 15:43:06', '101.81.67.230');
INSERT INTO `server_login_log` VALUES ('299288', '1', '1', '2018-01-04 16:12:25', '182.124.128.243');
INSERT INTO `server_login_log` VALUES ('q245525628', '1', '1', '2018-01-04 16:50:52', '123.14.194.145');
INSERT INTO `server_login_log` VALUES ('snzdy0', '1', '1', '2018-01-04 16:58:03', '111.124.228.177');
INSERT INTO `server_login_log` VALUES ('3053119', '1', '1', '2018-01-04 18:34:58', '220.161.227.12');
INSERT INTO `server_login_log` VALUES ('liufei005240', '1', '1', '2018-01-04 18:43:18', '180.109.177.235');
INSERT INTO `server_login_log` VALUES ('qq5321879', '1', '1', '2018-01-04 19:59:53', '222.86.247.5');
INSERT INTO `server_login_log` VALUES ('q18158962', '1', '1', '2018-01-04 20:10:59', '124.95.144.52');
INSERT INTO `server_login_log` VALUES ('heheng', '1', '1', '2018-01-04 21:02:43', '36.102.236.29');
INSERT INTO `server_login_log` VALUES ('boopkik', '1', '1', '2018-01-08 09:53:35', '125.124.248.103');
INSERT INTO `server_login_log` VALUES ('ly1984108', '1', '1', '2018-01-04 21:59:06', '42.236.140.92');
INSERT INTO `server_login_log` VALUES ('p12345671', '1', '1', '2018-01-04 22:19:04', '27.25.135.112');
INSERT INTO `server_login_log` VALUES ('zl2388007', '1', '1', '2018-01-04 22:38:39', '139.205.178.194');
INSERT INTO `server_login_log` VALUES ('zl6022025', '1', '1', '2018-01-04 22:39:29', '139.205.178.194');
INSERT INTO `server_login_log` VALUES ('ss728392184', '1', '1', '2018-01-04 23:39:39', '59.63.28.48');
INSERT INTO `server_login_log` VALUES ('116132128', '1', '1', '2018-01-05 08:53:59', '219.138.63.116');
INSERT INTO `server_login_log` VALUES ('guangyoucq', '1', '1', '2018-01-05 10:24:33', '123.173.57.224');
INSERT INTO `server_login_log` VALUES ('qqq111', '1', '1', '2018-01-07 10:49:37', '175.166.184.52');
INSERT INTO `server_login_log` VALUES ('y407772770', '1', '1', '2018-01-05 12:41:11', '221.130.82.185');
INSERT INTO `server_login_log` VALUES ('hoesang', '1', '1', '2018-01-07 22:58:16', '42.242.15.117');
INSERT INTO `server_login_log` VALUES ('heye12', '1', '1', '2018-01-05 16:37:58', '223.74.223.71');
INSERT INTO `server_login_log` VALUES ('llgf008', '1', '1', '2018-01-05 14:56:33', '183.190.46.146');
INSERT INTO `server_login_log` VALUES ('8838251', '1', '1', '2018-01-05 14:54:37', '144.255.145.128');
INSERT INTO `server_login_log` VALUES ('35449501ll', '1', '1', '2018-01-05 14:57:16', '183.190.46.146');
INSERT INTO `server_login_log` VALUES ('andydna', '1', '1', '2018-01-06 17:10:40', '27.18.167.188');
INSERT INTO `server_login_log` VALUES ('yangz2008', '1', '1', '2018-01-06 10:12:40', '119.39.159.143');
INSERT INTO `server_login_log` VALUES ('asddsa', '1', '1', '2018-01-05 16:59:35', '119.251.176.230');
INSERT INTO `server_login_log` VALUES ('asdasd', '1', '1', '2018-01-08 15:27:22', '59.39.142.111');
INSERT INTO `server_login_log` VALUES ('599215', '1', '1', '2018-01-05 23:50:15', '60.191.156.163');
INSERT INTO `server_login_log` VALUES ('b123123', '1', '1', '2018-01-05 15:40:15', '120.203.2.43');
INSERT INTO `server_login_log` VALUES ('3484385745', '1', '1', '2018-01-05 15:41:57', '27.29.254.238');
INSERT INTO `server_login_log` VALUES ('a7551366', '1', '1', '2018-01-05 15:50:07', '36.62.180.207');
INSERT INTO `server_login_log` VALUES ('a1984112', '1', '1', '2018-01-05 16:12:12', '183.214.186.169');
INSERT INTO `server_login_log` VALUES ('a4562632', '1', '1', '2018-01-05 16:15:44', '121.27.235.233');
INSERT INTO `server_login_log` VALUES ('w1203510', '1', '1', '2018-01-05 16:26:33', '1.194.90.60');
INSERT INTO `server_login_log` VALUES ('qq1150', '1', '1', '2018-01-05 16:43:51', '183.2.88.234');
INSERT INTO `server_login_log` VALUES ('qq11500', '1', '1', '2018-01-05 16:47:51', '183.2.88.234');
INSERT INTO `server_login_log` VALUES ('jef410', '1', '1', '2018-01-05 17:01:19', '36.22.29.238');
INSERT INTO `server_login_log` VALUES ('xie430422', '1', '1', '2018-01-05 17:06:14', '113.71.196.124');
INSERT INTO `server_login_log` VALUES ('qw123455', '1', '1', '2018-01-05 17:12:29', '106.92.117.145');
INSERT INTO `server_login_log` VALUES ('w130981', '1', '1', '2018-01-05 17:13:17', '61.185.115.215');
INSERT INTO `server_login_log` VALUES ('AI1999', '1', '1', '2018-01-05 17:43:46', '123.53.129.87');
INSERT INTO `server_login_log` VALUES ('xcvsx11', '1', '1', '2018-01-05 17:51:17', '125.42.180.237');
INSERT INTO `server_login_log` VALUES ('emzangai', '1', '1', '2018-01-05 17:56:03', '1.82.110.178');
INSERT INTO `server_login_log` VALUES ('zxw115', '1', '1', '2018-01-05 17:58:11', '223.12.228.212');
INSERT INTO `server_login_log` VALUES ('zxc645', '1', '1', '2018-01-07 20:25:23', '118.119.229.19');
INSERT INTO `server_login_log` VALUES ('zxc123', '1', '1', '2018-01-07 20:20:56', '118.119.229.19');
INSERT INTO `server_login_log` VALUES ('mm2665287', '1', '1', '2018-01-05 18:20:50', '118.120.163.76');
INSERT INTO `server_login_log` VALUES ('abc4512077', '1', '1', '2018-01-05 18:38:35', '112.49.30.85');
INSERT INTO `server_login_log` VALUES ('shehua', '1', '1', '2018-01-05 18:44:26', '113.14.8.216');
INSERT INTO `server_login_log` VALUES ('x26559912', '1', '1', '2018-01-05 21:02:57', '218.57.228.132');
INSERT INTO `server_login_log` VALUES ('qaw320922', '1', '1', '2018-01-05 21:26:20', '113.80.12.44');
INSERT INTO `server_login_log` VALUES ('haa110', '1', '1', '2018-01-07 17:15:10', '49.77.207.223');
INSERT INTO `server_login_log` VALUES ('a5252859', '1', '1', '2018-01-05 21:46:55', '14.223.127.61');
INSERT INTO `server_login_log` VALUES ('8548414', '1', '1', '2018-01-05 22:40:46', '14.223.184.215');
INSERT INTO `server_login_log` VALUES ('695948', '1', '1', '2018-01-05 22:41:35', '14.223.184.215');
INSERT INTO `server_login_log` VALUES ('dahai111', '1', '1', '2018-01-06 00:03:38', '222.162.11.92');
INSERT INTO `server_login_log` VALUES ('q5746185', '1', '1', '2018-01-06 11:42:45', '183.4.26.93');
INSERT INTO `server_login_log` VALUES ('lese1011', '1', '1', '2018-01-06 11:45:12', '27.38.140.79');
INSERT INTO `server_login_log` VALUES ('w123144', '1', '1', '2018-01-06 11:47:55', '111.50.104.41');
INSERT INTO `server_login_log` VALUES ('yensss', '1', '1', '2018-01-07 09:53:31', '116.23.96.76');
INSERT INTO `server_login_log` VALUES ('a821049', '1', '1', '2018-01-06 13:23:35', '183.215.43.192');
INSERT INTO `server_login_log` VALUES ('cixiaolong', '1', '1', '2018-01-06 16:04:16', '110.181.197.3');
INSERT INTO `server_login_log` VALUES ('2198686', '1', '1', '2018-01-06 14:25:59', '111.15.42.237');
INSERT INTO `server_login_log` VALUES ('695969333', '1', '1', '2018-01-06 14:39:31', '49.67.146.49');
INSERT INTO `server_login_log` VALUES ('6959693333', '1', '1', '2018-01-06 14:40:05', '49.67.146.49');
INSERT INTO `server_login_log` VALUES ('lewpay', '1', '1', '2018-01-09 15:17:08', '61.52.63.119');
INSERT INTO `server_login_log` VALUES ('qq909088890', '1', '1', '2018-01-06 14:55:37', '60.180.177.200');
INSERT INTO `server_login_log` VALUES ('c33333', '1', '1', '2018-01-06 14:56:41', '144.255.29.13');
INSERT INTO `server_login_log` VALUES ('aq4646', '1', '1', '2018-01-06 15:08:17', '183.228.32.151');
INSERT INTO `server_login_log` VALUES ('xcxy645', '1', '1', '2018-01-06 15:46:00', '36.102.236.207');
INSERT INTO `server_login_log` VALUES ('tangge', '1', '1', '2018-01-06 15:53:58', '36.105.27.193');
INSERT INTO `server_login_log` VALUES ('95801348', '1', '1', '2018-01-06 16:03:12', '220.173.182.154');
INSERT INTO `server_login_log` VALUES ('GJQ1102', '1', '1', '2018-01-06 16:06:11', '221.1.83.66');
INSERT INTO `server_login_log` VALUES ('chenxi001', '1', '1', '2018-01-06 16:07:24', '27.186.229.180');
INSERT INTO `server_login_log` VALUES ('bai0215', '1', '1', '2018-01-06 16:11:26', '111.196.29.252');
INSERT INTO `server_login_log` VALUES ('nihao99', '1', '1', '2018-01-06 16:31:30', '123.179.14.242');
INSERT INTO `server_login_log` VALUES ('942661521', '1', '1', '2018-01-06 18:06:09', '121.19.226.190');
INSERT INTO `server_login_log` VALUES ('zc901129', '1', '1', '2018-01-06 18:36:21', '171.211.199.238');
INSERT INTO `server_login_log` VALUES ('ZHAN888', '1', '1', '2018-01-08 13:26:42', '116.116.175.52');
INSERT INTO `server_login_log` VALUES ('zhan555', '1', '1', '2018-01-06 19:58:41', '116.116.196.145');
INSERT INTO `server_login_log` VALUES ('aw1991', '1', '1', '2018-01-06 20:41:08', '39.190.250.64');
INSERT INTO `server_login_log` VALUES ('qwe123123', '1', '1', '2018-01-06 20:54:37', '182.204.250.107');
INSERT INTO `server_login_log` VALUES ('454296', '1', '1', '2018-01-06 20:55:32', '116.28.3.198');
INSERT INTO `server_login_log` VALUES ('zxwf123', '1', '1', '2018-01-06 21:56:30', '27.17.38.130');
INSERT INTO `server_login_log` VALUES ('z321321', '1', '1', '2018-01-06 23:32:59', '112.97.59.69');
INSERT INTO `server_login_log` VALUES ('q469884166', '1', '1', '2018-01-06 23:40:15', '58.222.50.27');
INSERT INTO `server_login_log` VALUES ('qwe999', '1', '1', '2018-01-07 00:29:08', '116.19.25.68');
INSERT INTO `server_login_log` VALUES ('zooz926253', '1', '1', '2018-01-07 00:33:16', '182.117.119.49');
INSERT INTO `server_login_log` VALUES ('a6876428', '1', '1', '2018-01-07 01:08:20', '39.186.166.210');
INSERT INTO `server_login_log` VALUES ('wwbbsshi', '1', '1', '2018-01-07 11:35:20', '110.166.248.15');
INSERT INTO `server_login_log` VALUES ('cj931023', '1', '1', '2018-01-07 15:33:22', '183.131.116.69');
INSERT INTO `server_login_log` VALUES ('ham789', '1', '1', '2018-01-07 13:35:15', '183.160.120.0');
INSERT INTO `server_login_log` VALUES ('xdxkzk', '1', '1', '2018-01-07 14:25:41', '123.139.139.232');
INSERT INTO `server_login_log` VALUES ('guangyou88', '1', '2', '2018-01-09 21:43:05', '123.173.57.226');
INSERT INTO `server_login_log` VALUES ('cj931023', '1', '2', '2018-01-07 17:36:51', '58.217.140.149');
INSERT INTO `server_login_log` VALUES ('xiaole', '1', '2', '2018-01-07 14:40:17', '218.29.108.190');
INSERT INTO `server_login_log` VALUES ('yc1989', '1', '2', '2018-01-07 14:59:39', '14.204.68.48');
INSERT INTO `server_login_log` VALUES ('zz523328', '1', '1', '2018-01-07 14:40:52', '119.86.28.137');
INSERT INTO `server_login_log` VALUES ('cooxie', '1', '2', '2018-01-07 14:41:24', '180.124.69.19');
INSERT INTO `server_login_log` VALUES ('ok728392184', '1', '2', '2018-01-10 12:57:41', '111.74.215.88');
INSERT INTO `server_login_log` VALUES ('pqmak23', '1', '2', '2018-01-07 14:55:00', '112.249.202.70');
INSERT INTO `server_login_log` VALUES ('xx920517', '1', '2', '2018-01-07 15:06:51', '58.217.161.237');
INSERT INTO `server_login_log` VALUES ('hoesang', '1', '2', '2018-01-09 14:40:37', '222.220.49.173');
INSERT INTO `server_login_log` VALUES ('nihaolxj', '1', '2', '2018-01-10 09:51:33', '60.223.103.255');
INSERT INTO `server_login_log` VALUES ('aaa112233', '1', '1', '2018-01-07 16:16:15', '39.68.236.106');
INSERT INTO `server_login_log` VALUES ('qq11qqw23455', '1', '2', '2018-01-07 16:27:58', '58.217.177.239');
INSERT INTO `server_login_log` VALUES ('15295675282', '1', '2', '2018-01-07 16:28:27', '121.227.242.249');
INSERT INTO `server_login_log` VALUES ('xxbnet', '1', '2', '2018-01-07 16:55:57', '123.149.27.150');
INSERT INTO `server_login_log` VALUES ('haa110', '1', '2', '2018-01-08 09:24:16', '117.62.231.143');
INSERT INTO `server_login_log` VALUES ('770357046', '1', '2', '2018-01-07 17:48:47', '117.71.180.98');
INSERT INTO `server_login_log` VALUES ('ctow22', '1', '2', '2018-01-07 18:03:38', '115.235.249.108');
INSERT INTO `server_login_log` VALUES ('258258', '1', '2', '2018-01-07 18:09:24', '122.6.224.168');
INSERT INTO `server_login_log` VALUES ('qqq11122', '1', '2', '2018-01-07 18:20:43', '175.166.184.52');
INSERT INTO `server_login_log` VALUES ('a20360', '1', '1', '2018-01-07 18:26:51', '171.12.116.115');
INSERT INTO `server_login_log` VALUES ('rbrb1026', '1', '2', '2018-01-07 18:28:58', '182.240.91.35');
INSERT INTO `server_login_log` VALUES ('amrszh', '1', '1', '2018-01-07 18:47:16', '113.83.65.181');
INSERT INTO `server_login_log` VALUES ('frt110', '1', '2', '2018-01-07 18:50:45', '123.170.75.252');
INSERT INTO `server_login_log` VALUES ('123321', '1', '1', '2018-01-07 18:51:03', '106.109.53.182');
INSERT INTO `server_login_log` VALUES ('a1212121', '1', '2', '2018-01-07 18:56:29', '122.137.245.130');
INSERT INTO `server_login_log` VALUES ('a2658059', '1', '1', '2018-01-07 19:03:56', '175.20.89.27');
INSERT INTO `server_login_log` VALUES ('a26580590', '1', '1', '2018-01-07 19:23:42', '122.142.16.198');
INSERT INTO `server_login_log` VALUES ('a84890772', '1', '1', '2018-01-07 19:14:56', '124.115.135.28');
INSERT INTO `server_login_log` VALUES ('qq2915056', '1', '2', '2018-01-08 12:56:13', '59.45.152.96');
INSERT INTO `server_login_log` VALUES ('5924041', '1', '2', '2018-01-07 19:53:07', '180.162.204.176');
INSERT INTO `server_login_log` VALUES ('shaojiao', '1', '2', '2018-01-07 20:20:53', '115.234.12.228');
INSERT INTO `server_login_log` VALUES ('w256qwe', '1', '2', '2018-01-07 20:00:09', '14.222.100.214');
INSERT INTO `server_login_log` VALUES ('qq2915056', '1', '1', '2018-01-07 20:01:59', '175.20.88.150');
INSERT INTO `server_login_log` VALUES ('zxc123', '1', '2', '2018-01-07 20:21:17', '118.119.229.19');
INSERT INTO `server_login_log` VALUES ('zxc645', '1', '2', '2018-01-07 20:31:33', '118.119.229.19');
INSERT INTO `server_login_log` VALUES ('DXIA56', '1', '1', '2018-01-07 20:42:01', '125.84.102.201');
INSERT INTO `server_login_log` VALUES ('214320', '1', '2', '2018-01-07 21:19:30', '110.52.105.207');
INSERT INTO `server_login_log` VALUES ('602000', '1', '2', '2018-01-07 22:41:37', '180.142.22.167');
INSERT INTO `server_login_log` VALUES ('wwwwww', '1', '2', '2018-01-08 00:17:57', '175.4.246.15');
INSERT INTO `server_login_log` VALUES ('q1999001', '1', '2', '2018-01-10 11:46:23', '115.151.73.163');
INSERT INTO `server_login_log` VALUES ('sharpkey', '1', '2', '2018-01-10 09:03:31', '113.88.157.24');
INSERT INTO `server_login_log` VALUES ('tang88d', '1', '2', '2018-01-08 09:48:32', '218.76.102.91');
INSERT INTO `server_login_log` VALUES ('2624353726', '1', '2', '2018-01-08 11:05:23', '116.252.22.34');
INSERT INTO `server_login_log` VALUES ('boopkik', '1', '2', '2018-01-08 09:53:30', '125.124.248.103');
INSERT INTO `server_login_log` VALUES ('zz001zzx', '1', '1', '2018-01-08 10:09:57', '219.145.173.16');
INSERT INTO `server_login_log` VALUES ('3053119', '1', '2', '2018-01-08 12:01:16', '220.161.227.12');
INSERT INTO `server_login_log` VALUES ('aa4418106', '1', '2', '2018-01-08 14:08:54', '123.180.79.178');
INSERT INTO `server_login_log` VALUES ('xdt790209', '1', '2', '2018-01-08 14:52:13', '39.187.111.236');
INSERT INTO `server_login_log` VALUES ('xdt790209', '1', '1', '2018-01-08 14:53:15', '39.187.111.236');
INSERT INTO `server_login_log` VALUES ('q18227346731', '1', '2', '2018-01-08 21:48:39', '115.214.66.7');
INSERT INTO `server_login_log` VALUES ('zhenwunai', '1', '1', '2018-01-08 15:40:17', '180.107.247.33');
INSERT INTO `server_login_log` VALUES ('zhenwunai', '1', '2', '2018-01-08 15:42:36', '180.107.247.33');
INSERT INTO `server_login_log` VALUES ('lc2017', '1', '2', '2018-01-08 16:32:46', '60.191.149.234');
INSERT INTO `server_login_log` VALUES ('sbb317', '1', '2', '2018-01-08 16:09:51', '123.52.55.19');
INSERT INTO `server_login_log` VALUES ('xuehen1122', '1', '2', '2018-01-09 19:15:34', '175.42.100.132');
INSERT INTO `server_login_log` VALUES ('xuehen1122', '1', '1', '2018-01-09 17:07:21', '175.42.100.132');
INSERT INTO `server_login_log` VALUES ('jshwd951', '1', '2', '2018-01-08 16:24:54', '112.49.30.83');
INSERT INTO `server_login_log` VALUES ('jshwd951', '1', '1', '2018-01-08 16:24:58', '112.49.30.83');
INSERT INTO `server_login_log` VALUES ('LE520134', '1', '2', '2018-01-08 16:44:41', '171.91.155.1');
INSERT INTO `server_login_log` VALUES ('wwbbsshi1', '1', '1', '2018-01-08 16:55:33', '218.95.230.194');
INSERT INTO `server_login_log` VALUES ('wwbbsshi1', '1', '2', '2018-01-10 11:45:07', '218.95.230.194');
INSERT INTO `server_login_log` VALUES ('zyp2099', '1', '2', '2018-01-08 17:09:32', '180.152.143.183');
INSERT INTO `server_login_log` VALUES ('qw13525', '1', '2', '2018-01-09 15:19:37', '218.29.96.34');
INSERT INTO `server_login_log` VALUES ('qw13525', '1', '1', '2018-01-09 15:19:23', '218.29.96.34');
INSERT INTO `server_login_log` VALUES ('a314321906', '1', '2', '2018-01-08 17:43:15', '220.188.21.100');
INSERT INTO `server_login_log` VALUES ('z802364', '1', '2', '2018-01-08 17:50:37', '223.73.37.39');
INSERT INTO `server_login_log` VALUES ('jdpx0001', '1', '2', '2018-01-08 17:51:50', '111.2.102.43');
INSERT INTO `server_login_log` VALUES ('jin123456', '1', '1', '2018-01-08 17:53:33', '218.98.52.121');
INSERT INTO `server_login_log` VALUES ('sx6698589', '1', '2', '2018-01-08 17:58:57', '42.184.121.192');
INSERT INTO `server_login_log` VALUES ('anhei1', '1', '2', '2018-01-08 18:48:56', '122.143.151.142');
INSERT INTO `server_login_log` VALUES ('a7008145', '1', '1', '2018-01-08 18:50:27', '27.18.137.5');
INSERT INTO `server_login_log` VALUES ('w5652089', '1', '2', '2018-01-08 18:53:52', '120.15.36.145');
INSERT INTO `server_login_log` VALUES ('aa370282', '1', '2', '2018-01-08 20:28:46', '144.123.32.20');
INSERT INTO `server_login_log` VALUES ('qq745200', '1', '2', '2018-01-08 22:28:39', '118.123.153.126');
INSERT INTO `server_login_log` VALUES ('qq74520', '1', '2', '2018-01-09 02:21:12', '175.20.89.13');
INSERT INTO `server_login_log` VALUES ('wei133', '1', '2', '2018-01-09 00:57:18', '61.185.167.73');
INSERT INTO `server_login_log` VALUES ('ceshizhanghao', '1', '2', '2018-01-09 02:17:41', '123.173.57.227');
INSERT INTO `server_login_log` VALUES ('nihaolxj', '1', '1', '2018-01-09 10:12:27', '60.223.152.34');
INSERT INTO `server_login_log` VALUES ('19821120', '1', '2', '2018-01-09 12:40:31', '115.218.113.131');
INSERT INTO `server_login_log` VALUES ('xx4897946', '1', '2', '2018-01-09 13:20:19', '116.28.202.16');
INSERT INTO `server_login_log` VALUES ('qazwsx', '1', '2', '2018-01-09 14:53:24', '123.185.215.41');
INSERT INTO `server_login_log` VALUES ('weiwei', '1', '2', '2018-01-09 14:52:27', '112.250.135.105');
INSERT INTO `server_login_log` VALUES ('lewpay', '1', '2', '2018-01-09 15:17:41', '61.52.63.119');
INSERT INTO `server_login_log` VALUES ('a102176', '1', '2', '2018-01-09 19:05:44', '115.193.112.255');
INSERT INTO `server_login_log` VALUES ('a00000', '1', '2', '2018-01-09 17:18:40', '59.45.149.85');
INSERT INTO `server_login_log` VALUES ('a102176', '1', '1', '2018-01-09 19:10:13', '115.193.112.255');
INSERT INTO `server_login_log` VALUES ('ok728392184', '1', '3', '2018-01-10 15:21:43', '111.74.215.92');
INSERT INTO `server_login_log` VALUES ('guangyou88', '1', '6', '2018-01-27 16:34:41', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('guangyou66', '1', '6', '2018-01-28 09:37:13', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('8793933', '1', '1', '2018-02-24 14:38:58', '127.0.0.1');
INSERT INTO `server_login_log` VALUES ('879393', '1', '1', '2018-02-24 14:52:38', '127.0.0.1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `reg_ip` varchar(50) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `last_ip` varchar(50) DEFAULT NULL,
  `last_time` datetime DEFAULT NULL,
  `jifen` int(11) DEFAULT '0',
  `tg_name` varchar(50) DEFAULT NULL,
  `rmb` bigint(19) DEFAULT '0',
  `rmb_dts` bigint(19) DEFAULT '0',
  `tid` int(15) DEFAULT '0',
  `touxiang` varchar(50) DEFAULT '../images/tx11.jpg',
  `tuiguang` varchar(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'guangyou00', '803288', '127.0.0.1', '2018-02-03 19:25:20', '127.0.0.1', '2018-02-22 21:06:45', '3', '', '0', '0', '0', '../images/tx11.jpg', '1');
INSERT INTO `user` VALUES ('2', 'guangyou88', '803288', '127.0.0.1', '2018-02-03 19:33:51', '127.0.0.1', '2018-02-03 20:42:53', '1', 'guangyou00', '0', '0', '0', '../images/tx11.jpg', '0');
INSERT INTO `user` VALUES ('3', 'guangyou89', '803288', '127.0.0.1', '2018-02-13 22:39:33', '127.0.0.1', '2018-02-13 22:39:33', '1', '', '0', '0', '0', '../images/tx11.jpg', '0');
INSERT INTO `user` VALUES ('4', '123456', '123456', '127.0.0.1', '2018-02-24 10:09:15', '127.0.0.1', '2018-02-24 11:19:59', '1', '', '99000', '0', '0', '../images/tx11.jpg', '0');
INSERT INTO `user` VALUES ('5', '8793933', '198923', '127.0.0.1', '2018-02-24 14:13:11', '127.0.0.1', '2018-02-24 14:26:43', '1', '', '9899999', '0', '0', '../images/tx11.jpg', '0');
INSERT INTO `user` VALUES ('6', '879393', '198923', '127.0.0.1', '2018-02-24 14:48:25', '127.0.0.1', '2018-02-24 14:51:52', '1', '', '0', '0', '0', '../images/tx11.jpg', '0');

-- ----------------------------
-- Table structure for `welfare`
-- ----------------------------
DROP TABLE IF EXISTS `welfare`;
CREATE TABLE `welfare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `gid` int(11) NOT NULL DEFAULT '0',
  `game_server_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `log_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='新手福利表';

-- ----------------------------
-- Records of welfare
-- ----------------------------
INSERT INTO `welfare` VALUES ('1', '123456', '1', '1', '0', '2018-02-24 11:27:10');
INSERT INTO `welfare` VALUES ('2', '8793933', '1', '1', '0', '2018-02-24 14:16:52');
