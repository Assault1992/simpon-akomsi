			
SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+07:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


#
# TABLE STRUCTURE FOR: sys_group
#

DROP TABLE IF EXISTS sys_group;

CREATE TABLE `sys_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sys_group (`id`, `name`) VALUES (1, 'developer');
INSERT INTO sys_group (`id`, `name`) VALUES (2, 'admin');


#
# TABLE STRUCTURE FOR: sys_group_controller
#

DROP TABLE IF EXISTS sys_group_controller;

CREATE TABLE `sys_group_controller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(11) NOT NULL,
  `controller` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`),
  CONSTRAINT `sys_group_controller_ibfk_1` FOREIGN KEY (`group`) REFERENCES `sys_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (1, 1, 'controller_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (2, 1, 'menu_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (3, 1, 'user_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (4, 1, 'group_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (5, 1, 'system_setting');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (6, 1, 'database');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (7, 2, 'user_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (8, 2, 'database');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (9, 1, 'theme_roller');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (10, 2, 'theme_roller');


#
# TABLE STRUCTURE FOR: sys_menu
#

DROP TABLE IF EXISTS sys_menu;

CREATE TABLE `sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(11) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `controller` varchar(64) NOT NULL,
  `method` text NOT NULL,
  `order` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`),
  CONSTRAINT `sys_menu_ibfk_1` FOREIGN KEY (`group`) REFERENCES `sys_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (1, 1, 'controller management', 'controller_management', '[]', 2);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (2, 1, 'menu management', 'menu_management', '[]', 3);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (3, 1, 'user management', 'user_management', '[]', 1);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (4, 1, 'group management', 'group_management', '[]', 0);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (5, 1, 'system setting', 'system_setting', '[]', 6);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (6, 1, 'database', 'database', '[]', 5);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (8, 2, 'user management', 'user_management', '[]', 0);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (9, 2, 'database', 'database', '[]', 2);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (10, 1, 'theme roller', 'theme_roller', '[]', 4);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (11, 2, 'theme roller', 'theme_roller', '[]', 1);


#
# TABLE STRUCTURE FOR: sys_message
#

DROP TABLE IF EXISTS sys_message;

CREATE TABLE `sys_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `post_time` datetime NOT NULL,
  `read` int(1) NOT NULL DEFAULT '0',
  `trash` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: sys_setting
#

DROP TABLE IF EXISTS sys_setting;

CREATE TABLE `sys_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO sys_setting (`id`, `key`, `value`) VALUES (1, 'site name', 'project gallery');
INSERT INTO sys_setting (`id`, `key`, `value`) VALUES (2, 'year', '2014');
INSERT INTO sys_setting (`id`, `key`, `value`) VALUES (3, 'author', 'ryan hs &lt;mr.ryansilalahi@gmail.com&gt;');
INSERT INTO sys_setting (`id`, `key`, `value`) VALUES (4, 'theme', 'theme-jhonny-cash');
INSERT INTO sys_setting (`id`, `key`, `value`) VALUES (5, 'authorized only', '1');


#
# TABLE STRUCTURE FOR: sys_user
#

DROP TABLE IF EXISTS sys_user;

CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `token` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group` (`group`),
  CONSTRAINT `sys_user_ibfk_1` FOREIGN KEY (`group`) REFERENCES `sys_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO sys_user (`id`, `group`, `name`, `username`, `email`, `password`, `token`) VALUES (1, 1, 'dev', 'dev', 'dev@ngesruk.com', 'dev', '5d712ed5b6fe88985fc70c83740753d4');
INSERT INTO sys_user (`id`, `group`, `name`, `username`, `email`, `password`, `token`) VALUES (2, 2, 'admin default', 'admin', 'admin@ngesruk.com', 'admin', 'df38a8f3db633e2ba80f8bf3042c8e2b');


