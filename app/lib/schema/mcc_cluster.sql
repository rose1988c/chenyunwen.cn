
CREATE DATABASE IF NOT EXISTS mcc_manage default charset utf8 COLLATE utf8_general_ci; 
use mcc_manage;

#菜单表
CREATE TABLE IF NOT EXISTS `mcc_menu` (
    `id` smallint(6) unsigned not null auto_increment,
    `parentid` smallint(6) unsigned not null default 0 COMMENT '父级ID',
    `name` varchar(255) not null COMMENT '菜单名',
    `enname` varchar(255) not null default '' COMMENT '英文名',
    `url` varchar(255) not null default '' COMMENT 'URL路径',
    `icons` varchar(100) not null default '' COMMENT '图标class',
    `sorts` smallint(6) not null default 0 COMMENT '排序号',
    `exten` varchar(255) not null default '' COMMENT '扩展字段',
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    primary key (`id`)
)engine=INNODB charset=utf8;

CREATE TABLE `mcc_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `truename` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `roleid` tinyint(3) NOT NULL DEFAULT '2',
  `ip` varchar(50) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `login_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `mcc_role` (
`id` tinyint(3) unsigned not null auto_increment,
`name` varchar(255) not null,
`created_at` datetime DEFAULT NULL,
`updated_at` datetime DEFAULT NULL,
primary key (`id`)
)engine=INNODB charset=utf8;

CREATE TABLE IF NOT EXISTS `mcc_role_panel` (
    `id` MEDIUMINT(8) unsigned not null auto_increment,
    `roleid` tinyint(3) unsigned not null COMMENT '角色ID',
    `menuid` smallint(6) unsigned not null COMMENT '菜单ID',
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    primary key (`id`),
    key `idx_rmid` (`menuid`, `roleid`)
)engine=INNODB charset=utf8;

