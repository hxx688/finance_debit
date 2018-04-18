/*
 Navicat Premium Data Transfer

 Source Server         : app
 Source Server Type    : MySQL
 Source Server Version : 50546
 Source Host           : localhost
 Source Database       : cps

 Target Server Type    : MySQL
 Target Server Version : 50546
 File Encoding         : utf-8

 Date: 11/18/2017 16:50:38 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `apply`
-- ----------------------------
DROP TABLE IF EXISTS `apply`;
CREATE TABLE `apply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) NOT NULL DEFAULT '0',
  `product_id` int(10) NOT NULL DEFAULT '0',
  `money` decimal(10,2) DEFAULT NULL,
  `long` smallint(6) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `members`
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '0',
  `openid` varchar(100) DEFAULT NULL,
  `mobile` char(11) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `realname` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`) USING BTREE,
  UNIQUE KEY `mobile` (`mobile`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1'), ('2014_10_12_100000_create_password_resets_table', '1');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(10) DEFAULT '0',
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `permissions`
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES ('1', '0', '#perminssions', 'fa-list-alt', '0', '菜单', '', '1', '2017-11-08 10:16:44', '2017-11-08 02:21:35'), ('2', '1', 'admin.permissions.create', 'fa-plus', '0', '添加', '', '1', '2017-11-08 10:17:29', '2017-11-08 02:22:39'), ('3', '1', 'admin.permissions.index', 'fa-eye', '0', '查看', '', '1', '2017-11-08 10:17:57', '2017-11-08 02:41:06'), ('5', '1', 'admin.permissions.edit', '', '0', '更新', '', '0', '2017-11-08 02:27:02', '2017-11-08 02:27:02'), ('7', '0', 'admin', 'fa-home', '200', 'Dashboard', '', '1', '2017-11-08 02:28:59', '2017-11-08 11:21:57'), ('8', '0', '#slides', 'fa-barcode', '99', '轮播', '', '1', '2017-11-08 02:38:12', '2017-11-08 02:38:12'), ('9', '8', 'admin.slides.create', 'fa-plus', '0', '添加', '', '1', '2017-11-08 02:39:37', '2017-11-08 02:39:37'), ('10', '8', 'admin.slides.index', 'fa-eye', '0', '查看', '', '1', '2017-11-08 02:39:54', '2017-11-08 02:40:54'), ('11', '8', 'admin.slides.edit', '', '0', '更新', '', '0', '2017-11-08 02:40:15', '2017-11-08 02:40:15'), ('12', '0', '#tags', 'fa-tags', '98', '标签', '', '1', '2017-11-08 02:43:20', '2017-11-08 02:43:55'), ('13', '12', 'admin.tags.create', 'fa-plus', '0', '添加', '', '1', '2017-11-08 02:44:42', '2017-11-08 02:44:42'), ('14', '12', 'admin.tags.index', 'fa-eye', '0', '查看', '', '1', '2017-11-08 02:46:26', '2017-11-08 02:46:26'), ('15', '12', 'admin.tags.edit', 'fa-eye', '0', '更新', '', '0', '2017-11-08 02:46:44', '2017-11-08 02:46:44'), ('16', '0', '#member', 'fa-user', '101', '用户', '', '1', '2017-11-08 11:14:54', '2017-11-08 11:14:54'), ('17', '16', 'admin.members.index', 'fa-eye', '0', '查看', '', '1', '2017-11-08 11:22:34', '2017-11-08 11:22:34'), ('18', '0', '#products', 'fa-product-hunt', '100', '产品', '', '1', '2017-11-08 11:28:49', '2017-11-08 11:28:49'), ('20', '18', 'admin.products.create', 'fa-plus', '0', '添加', '', '1', '2017-11-08 12:06:43', '2017-11-08 12:07:38'), ('21', '18', 'admin.products.index', 'fa-eye', '0', '查看', '', '1', '2017-11-08 12:07:00', '2017-11-08 12:07:00'), ('22', '18', 'admin.products.edit', 'fa-eye', '0', '更新', '', '0', '2017-11-08 12:07:14', '2017-11-08 12:07:14'), ('23', '0', '#applys', 'fa-check', '199', '记录', '', '1', '2017-11-08 14:47:49', '2017-11-08 16:45:50'), ('24', '23', 'admin.applys.index', 'fa-eye', '0', '查看', '', '1', '2017-11-08 14:52:10', '2017-11-08 14:52:10');
COMMIT;

-- ----------------------------
--  Table structure for `product_tag`
-- ----------------------------
DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag` (
  `product_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `logo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `introduction` varchar(225) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `quota` varchar(100) CHARACTER SET latin1 NOT NULL,
  `rate` decimal(5,2) NOT NULL,
  `term` varchar(100) CHARACTER SET latin1 NOT NULL,
  `loan` varchar(20) NOT NULL,
  `content` longtext NOT NULL,
  `link` varchar(225) NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `slides`
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `sort` smallint(6) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'admin', '123456@qq.com', '$2y$10$IhHntZmPNjL8oC4DBREZu.PyJKInaDiJuIfIyvPU8rT/L4/v4BAj6', null, '2017-11-07 05:52:26', '2017-11-07 05:52:26');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
