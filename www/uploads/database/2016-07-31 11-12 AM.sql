			
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO sys_group (`id`, `name`) VALUES (1, 'developer');
INSERT INTO sys_group (`id`, `name`) VALUES (2, 'admin');
INSERT INTO sys_group (`id`, `name`) VALUES (3, 'operator');


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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (11, 2, 'hotel_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (12, 2, 'participant_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (13, 2, 'tipe_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (14, 2, 'penginapan_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (15, 2, 'cabor_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (16, 2, 'dapur_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (17, 2, 'katering_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (18, 2, 'kontingen_management');
INSERT INTO sys_group_controller (`id`, `group`, `controller`) VALUES (19, 2, 'venue_management');


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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (1, 1, 'controller management', 'controller_management', '[]', 2);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (2, 1, 'menu management', 'menu_management', '[]', 3);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (3, 1, 'user management', 'user_management', '[]', 1);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (4, 1, 'group management', 'group_management', '[]', 0);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (5, 1, 'system setting', 'system_setting', '[]', 6);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (6, 1, 'database', 'database', '[]', 5);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (10, 1, 'theme roller', 'theme_roller', '[]', 4);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (12, 2, 'Type Management', 'tipe_management', '[]', 1);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (13, 2, 'Lodging Management', 'penginapan_management', '[]', 0);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (14, 2, 'Cabor Management', 'cabor_management', '[]', 2);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (15, 2, 'Kitchen Management', 'dapur_management', '[]', 4);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (16, 2, 'Catering Management', 'katering_management', '[]', 5);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (17, 2, 'Contingent Management', 'kontingen_management', '[]', 3);
INSERT INTO sys_menu (`id`, `group`, `alias`, `controller`, `method`, `order`) VALUES (18, 2, 'Venue Management', 'venue_management', '[]', 6);


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
  `type` enum('text','numeric','boolean') NOT NULL DEFAULT 'text',
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO sys_setting (`id`, `key`, `type`, `value`) VALUES (1, 'site name', 'text', 'SIMPON Jabar 2016 AkomSi');
INSERT INTO sys_setting (`id`, `key`, `type`, `value`) VALUES (2, 'year', 'numeric', '2016');
INSERT INTO sys_setting (`id`, `key`, `type`, `value`) VALUES (3, 'author', 'text', 'KUMKM Jabar');
INSERT INTO sys_setting (`id`, `key`, `type`, `value`) VALUES (4, 'admin-theme', 'text', 'default');
INSERT INTO sys_setting (`id`, `key`, `type`, `value`) VALUES (5, 'authorized only', 'boolean', '1');


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

INSERT INTO sys_user (`id`, `group`, `name`, `username`, `email`, `password`, `token`) VALUES (1, 1, 'dev', 'dev', 'dev@ngesruk.com', 'dev', '7fccefaab1ac70f5f781cc62039e09d3');
INSERT INTO sys_user (`id`, `group`, `name`, `username`, `email`, `password`, `token`) VALUES (2, 2, 'admin default', 'admin', 'admin@ngesruk.com', 'admin', 'b9eacb906c4c96d8315bbb2adbd11ffa');


#
# TABLE STRUCTURE FOR: t_allocation
#

DROP TABLE IF EXISTS t_allocation;

CREATE TABLE `t_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `for` enum('ao','tp') NOT NULL,
  `id_cabor` int(11) NOT NULL,
  `id_ledging` int(11) NOT NULL,
  `allocation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_cabor
#

DROP TABLE IF EXISTS t_cabor;

CREATE TABLE `t_cabor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

INSERT INTO t_cabor (`id`, `name`) VALUES (1, 'AEROMODELING');
INSERT INTO t_cabor (`id`, `name`) VALUES (2, 'ANGGAR');
INSERT INTO t_cabor (`id`, `name`) VALUES (3, 'ANGKAT BESI');
INSERT INTO t_cabor (`id`, `name`) VALUES (4, 'ANGKAT BERAT');
INSERT INTO t_cabor (`id`, `name`) VALUES (5, 'BINARAGA');
INSERT INTO t_cabor (`id`, `name`) VALUES (6, 'ATLETIK');
INSERT INTO t_cabor (`id`, `name`) VALUES (7, 'BALAP SEPEDA');
INSERT INTO t_cabor (`id`, `name`) VALUES (8, 'BERMOTOR');
INSERT INTO t_cabor (`id`, `name`) VALUES (9, 'BASEBALL');
INSERT INTO t_cabor (`id`, `name`) VALUES (10, 'BERKUDA EQUISTRIAN');
INSERT INTO t_cabor (`id`, `name`) VALUES (11, 'BERKUDA PACUAN');
INSERT INTO t_cabor (`id`, `name`) VALUES (12, 'BILIAR');
INSERT INTO t_cabor (`id`, `name`) VALUES (13, 'BOLA BASKET');
INSERT INTO t_cabor (`id`, `name`) VALUES (14, 'BOLA VOLI INDOOR');
INSERT INTO t_cabor (`id`, `name`) VALUES (15, 'BOLA VOLI PANTAI');
INSERT INTO t_cabor (`id`, `name`) VALUES (16, 'BOWLING');
INSERT INTO t_cabor (`id`, `name`) VALUES (17, 'BRIGDE');
INSERT INTO t_cabor (`id`, `name`) VALUES (18, 'BULUTANGKIS');
INSERT INTO t_cabor (`id`, `name`) VALUES (19, 'CATUR');
INSERT INTO t_cabor (`id`, `name`) VALUES (20, 'CRICKET');
INSERT INTO t_cabor (`id`, `name`) VALUES (21, 'DANCE SPORT');
INSERT INTO t_cabor (`id`, `name`) VALUES (22, 'DAYUNG');
INSERT INTO t_cabor (`id`, `name`) VALUES (23, 'DRUMBBAND');
INSERT INTO t_cabor (`id`, `name`) VALUES (24, 'FUTSAL');
INSERT INTO t_cabor (`id`, `name`) VALUES (25, 'GANTOLE');
INSERT INTO t_cabor (`id`, `name`) VALUES (26, 'GOLF');
INSERT INTO t_cabor (`id`, `name`) VALUES (27, 'GULAT');
INSERT INTO t_cabor (`id`, `name`) VALUES (28, 'HOCKEY INDOOR');
INSERT INTO t_cabor (`id`, `name`) VALUES (29, 'JUDO');
INSERT INTO t_cabor (`id`, `name`) VALUES (30, 'KARATE');
INSERT INTO t_cabor (`id`, `name`) VALUES (31, 'KEMPO');
INSERT INTO t_cabor (`id`, `name`) VALUES (32, 'LAYAR');
INSERT INTO t_cabor (`id`, `name`) VALUES (33, 'MENEMBAK');
INSERT INTO t_cabor (`id`, `name`) VALUES (34, 'PANAHAN');
INSERT INTO t_cabor (`id`, `name`) VALUES (35, 'PANJAT TEBING');
INSERT INTO t_cabor (`id`, `name`) VALUES (36, 'PARALAYANG     ');
INSERT INTO t_cabor (`id`, `name`) VALUES (37, 'PENCAK SILAT');
INSERT INTO t_cabor (`id`, `name`) VALUES (38, 'SELAM KOLAM');
INSERT INTO t_cabor (`id`, `name`) VALUES (39, 'SENAM');
INSERT INTO t_cabor (`id`, `name`) VALUES (40, 'SEPAKBOLA');
INSERT INTO t_cabor (`id`, `name`) VALUES (41, 'SEPAK TAKRAW');
INSERT INTO t_cabor (`id`, `name`) VALUES (42, 'SEPATU RODA');
INSERT INTO t_cabor (`id`, `name`) VALUES (43, 'SOFTBALL PUTRA');
INSERT INTO t_cabor (`id`, `name`) VALUES (44, 'POLO AIR');
INSERT INTO t_cabor (`id`, `name`) VALUES (45, 'RENANG INDAH');
INSERT INTO t_cabor (`id`, `name`) VALUES (46, 'RENANG');
INSERT INTO t_cabor (`id`, `name`) VALUES (47, 'LONCAT INDAH');
INSERT INTO t_cabor (`id`, `name`) VALUES (48, 'RENANG PERAIRAN TERBUKA');
INSERT INTO t_cabor (`id`, `name`) VALUES (49, 'SKI AIR');
INSERT INTO t_cabor (`id`, `name`) VALUES (50, 'SQUASH');
INSERT INTO t_cabor (`id`, `name`) VALUES (51, 'TAEKWONDO');
INSERT INTO t_cabor (`id`, `name`) VALUES (52, 'TARUNG DERAJAT');
INSERT INTO t_cabor (`id`, `name`) VALUES (53, 'TENIS LAPANG');
INSERT INTO t_cabor (`id`, `name`) VALUES (54, 'TENIS MEJA');
INSERT INTO t_cabor (`id`, `name`) VALUES (55, 'TERBANG LAYANG');
INSERT INTO t_cabor (`id`, `name`) VALUES (56, 'TERJUN PAYUNG');
INSERT INTO t_cabor (`id`, `name`) VALUES (57, 'TINJU');
INSERT INTO t_cabor (`id`, `name`) VALUES (58, 'WUSHU');
INSERT INTO t_cabor (`id`, `name`) VALUES (59, 'HOCKEY OUTDOR');
INSERT INTO t_cabor (`id`, `name`) VALUES (60, 'SELAM LAUT');
INSERT INTO t_cabor (`id`, `name`) VALUES (61, 'SOFTBALL PUTRI');


#
# TABLE STRUCTURE FOR: t_catering
#

DROP TABLE IF EXISTS t_catering;

CREATE TABLE `t_catering` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kitchen` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `addrees` varchar(128) NOT NULL,
  `cp_name` varchar(64) NOT NULL,
  `cp_telp` varchar(20) NOT NULL,
  `cp_email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_checkin
#

DROP TABLE IF EXISTS t_checkin;

CREATE TABLE `t_checkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_touchdown` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id_room` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_checkout
#

DROP TABLE IF EXISTS t_checkout;

CREATE TABLE `t_checkout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_checkin` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_contingent
#

DROP TABLE IF EXISTS t_contingent;

CREATE TABLE `t_contingent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO t_contingent (`id`, `name`) VALUES (1, 'ACEH');
INSERT INTO t_contingent (`id`, `name`) VALUES (2, 'SUMATERA UTARA');
INSERT INTO t_contingent (`id`, `name`) VALUES (3, 'SUMATERA BARAT');
INSERT INTO t_contingent (`id`, `name`) VALUES (4, 'RIAU');
INSERT INTO t_contingent (`id`, `name`) VALUES (5, 'JAMBI');
INSERT INTO t_contingent (`id`, `name`) VALUES (6, 'SUMATERA SELATAN');
INSERT INTO t_contingent (`id`, `name`) VALUES (7, 'BENGKULU');
INSERT INTO t_contingent (`id`, `name`) VALUES (8, 'LAMPUNG');
INSERT INTO t_contingent (`id`, `name`) VALUES (9, 'KEPULAUAN BANGKA BELITUNG');
INSERT INTO t_contingent (`id`, `name`) VALUES (10, 'KEPULAUAN RIAU');
INSERT INTO t_contingent (`id`, `name`) VALUES (11, 'DKI JAKARTA');
INSERT INTO t_contingent (`id`, `name`) VALUES (12, 'JAWA BARAT');
INSERT INTO t_contingent (`id`, `name`) VALUES (13, 'JAWA TENGAH');
INSERT INTO t_contingent (`id`, `name`) VALUES (14, 'DI YOGYAKARTA');
INSERT INTO t_contingent (`id`, `name`) VALUES (15, 'JAWA TIMUR');
INSERT INTO t_contingent (`id`, `name`) VALUES (16, 'BANTEN');
INSERT INTO t_contingent (`id`, `name`) VALUES (17, 'BALI');
INSERT INTO t_contingent (`id`, `name`) VALUES (18, 'NUSA TENGGARA BARAT');
INSERT INTO t_contingent (`id`, `name`) VALUES (19, 'NUSA TENGGARA TIMUR');
INSERT INTO t_contingent (`id`, `name`) VALUES (20, 'KALIMANTAN BARAT');
INSERT INTO t_contingent (`id`, `name`) VALUES (21, 'KALIMANTAN TENGAH');
INSERT INTO t_contingent (`id`, `name`) VALUES (22, 'KALIMANTAN SELATAN');
INSERT INTO t_contingent (`id`, `name`) VALUES (23, 'KALIMANTAN TIMUR');
INSERT INTO t_contingent (`id`, `name`) VALUES (24, 'KALIMANTAN UTARA');
INSERT INTO t_contingent (`id`, `name`) VALUES (25, 'SULAWESI UTARA');
INSERT INTO t_contingent (`id`, `name`) VALUES (26, 'SULAWESI TENGAH');
INSERT INTO t_contingent (`id`, `name`) VALUES (27, 'SULAWESI SELATAN');
INSERT INTO t_contingent (`id`, `name`) VALUES (28, 'SULAWESI TENGGARA');
INSERT INTO t_contingent (`id`, `name`) VALUES (29, 'GORONTALO');
INSERT INTO t_contingent (`id`, `name`) VALUES (30, 'SULAWESI BARAT');
INSERT INTO t_contingent (`id`, `name`) VALUES (31, 'MALUKU');
INSERT INTO t_contingent (`id`, `name`) VALUES (32, 'MALUKU UTARA');
INSERT INTO t_contingent (`id`, `name`) VALUES (33, 'PAPUA BARAT');
INSERT INTO t_contingent (`id`, `name`) VALUES (34, 'PAPUA');


#
# TABLE STRUCTURE FOR: t_ha
#

DROP TABLE IF EXISTS t_ha;

CREATE TABLE `t_ha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO t_ha (`id`, `name`) VALUES (1, 'Bale Pare ');
INSERT INTO t_ha (`id`, `name`) VALUES (2, 'Bandara Husein Sastranegara ');
INSERT INTO t_ha (`id`, `name`) VALUES (3, 'Bandara Soekarno Hatta');
INSERT INTO t_ha (`id`, `name`) VALUES (4, 'Stasiun Kereta Api');


#
# TABLE STRUCTURE FOR: t_kitchen
#

DROP TABLE IF EXISTS t_kitchen;

CREATE TABLE `t_kitchen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `id_ledging` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `cp_name` varchar(64) NOT NULL,
  `cp_telp` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_kontingen
#

DROP TABLE IF EXISTS t_kontingen;

CREATE TABLE `t_kontingen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_ledging
#

DROP TABLE IF EXISTS t_ledging;

CREATE TABLE `t_ledging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_regional` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `id_type` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `website` varchar(20) NOT NULL,
  `coordinate` varchar(64) NOT NULL,
  `picture` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1;

INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (1, 0, '101 Dago ', 'Jl. Ir. H. Djuanda No. 3 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (2, 0, 'Ahadiat', 'Jl. Sindang Sirna ElNON * No. 9 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (3, 0, 'Alam Permai', 'Jl. Dr. Setiabudhi No. 423 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (4, 0, 'Albis Hotel Ciwidey', 'Jl. Ciwidey Ranca Bali Km. 1 No. 17, Ciwidey', 0, 1, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (5, 0, 'Alqueby', 'Jl. Terusan Jakarta Utara No. 7 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (6, 0, 'Amaris Cirebon', 'Jl. Siliwangi No. 70 Cirebon', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (7, 0, 'Amaris Hotel Cihampelas', 'Jl. Cihampelas No. 171 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (8, 0, 'Amaris Setiabudhi', 'Jl. Dr. Setiabudhi No.156 Bandung', 0, 1, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (9, 0, 'Amaroossa', 'Jl. Aceh No. 71 Bandung ', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (10, 0, 'Anggrek Gandasari', 'Jl. Seram No. 3 Bandung', 0, 1, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (11, 0, 'Antik', 'Jl. Raya Soreang Cipatik No. 9 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (12, 0, 'Apita Hotel', 'Jl. Tuparev No.323 Cirebon', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (13, 0, 'Aquila', 'Jl. Dr. Djunjunan No. 116 Bandung', 0, 5, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (14, 0, 'Arnava Bogor Hotel', 'Jl. K.H. Sholeh Iskandar No. 5 ', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (15, 0, 'Arya Duta ', 'Jl. Sumatera No.51, Bandung', 0, 5, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (16, 0, 'Asrilia Hotel', 'Jl. Pelajar Pejuang 45 No. 123 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (17, 0, 'Aston Primera Pasteur', 'Jl. Dr. Djunjunan No.96, Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (18, 0, 'Aston Tropicana', 'Jl. Cihampelas No. 125-129 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (19, 0, 'Atlantic City', 'Jl. Pasirkaliki No. 126 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (20, 0, 'Augusta Hotel Pelabuhan Ratu', 'Jl. Cikulu No.22, Sukabumi', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (21, 0, 'Bali World', 'Jl. Soekarno-Hatta No.713 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (22, 0, 'Banana Inn', 'Jl. Dr. Setiabudhi No. 191 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (23, 0, 'Batoe ', 'Jl. Pasirkaliki No. 78 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (24, 0, 'Bayu Amerta ', 'Jl. Karang Pamulang No. 31 Pelabuhan Ratu Sukabumi', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (25, 0, 'Bentani', 'Jl. Siliwangi No. 69 Cirebon', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (26, 0, 'Best Western', 'Jalan Merdeka No. 25-29, Sumur Bandung, Babakan Ciamis, Sumur Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (27, 0, 'Bogor Icon', 'Jl. Raya Baru no.1 , Bogor Utara', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (28, 0, 'Brits Hotel', 'Jl. Tarumanegara Kav. 8 Arteri Tol I, Karawang', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (29, 0, 'BTC Hotel', 'Jl. Dr. Djunjunan No. 143-149 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (30, 0, 'Bumi Perkemahan Cikole', 'Jl. Bumi perkemahan cikole', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (31, 0, 'CEMERLANG', 'Jl. HOS Tjokroaminoto No. 45, Cicendo, Arjuna, Cicendo', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (32, 0, 'Cihampelas 3', 'Jl. Cihampelas No.   Bandung', 0, 1, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (33, 0, 'Citradream', 'Jl. Pasirkaliki  Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (34, 0, 'Citradream Cirebon', 'Jl. DR. Cipto Mangunkusumo Cirebon', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (35, 0, 'City Hotel ', 'Jl. Sukalaya Barat No. 50 Tasikmalaya', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (36, 0, 'Clove Garden', 'Jl. Awiligar Raya II Cibeunying', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (37, 0, 'Crown', 'Jl. RE. Martadinata No. 45 Tasikmalaya', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (38, 0, 'Dafam Rio', 'Jl. L. L. RE.Martadinata 160 Bandung', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (39, 0, 'DeJava', 'Jl. Sukajadi No. 148 - 150 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (40, 0, 'Endah Parahyangan', 'Jl. Raya Cibeureum No. 14 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (41, 0, 'Fave Bogor', 'Jl. Cidangiang No.1, Bogor City', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (42, 0, 'Fave Braga', 'Jl. Braga No. 99 -101 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (43, 0, 'Fave Pasir Kaliki', 'Jl. Cihampelas No. 100 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (44, 0, 'Fave Premiere Cihampelas', 'Jl. Cihampelas No. 129 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (45, 0, 'Galeri Ciumbuleuit ', 'Jl. Ciumbuleuit No. 42 A Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (46, 0, 'Golden Flower', 'Jl. Asia Afrika No. 15-17 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (47, 0, 'Grand Cordella', 'Jalan Soekarno-Hatta No. 791, Babakan Penghulu, Cinambo, Babakan Penghulu, Cinambo', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (48, 0, 'Grand Guci ', 'Jl. Pasirkaliki No. 53 - 55 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (49, 0, 'Grand Hani', 'Jl Raya Lembang Km 12,1 No 15 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (50, 0, 'Grand Ori', 'Jl. Mayor NON *ing Citeureup No.1, Bogor', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (51, 0, 'Grand Pangestu', 'Jl. Raya Klari Kosambi No. 9, Kabupaten Karawang', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (52, 0, 'Grand Pasundan', 'Jl. Peta No. 147-149 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (53, 0, 'Grand Serela', 'Jl. Hegarmanah No. 9-15, Hegarmanah, Cidadap', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (54, 0, 'Grand Serela Cihampelas ', 'Jl. Cihampelas No. 147 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (55, 0, 'Grand Serela Merdeka', 'Jl. Purnawarwarman No. 23 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (56, 0, 'Grand Setiabudhi', 'Jl. Dr. Setiabudhi No. 130-134 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (57, 0, 'Grand Tebu', 'Jl. L. L. RE.Martadinata No.207, Cihapit, Bandung Wetan', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (58, 0, 'Grand Tjokro', 'Jl. Cihampelas No. 211 - 217, Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (59, 0, 'Grand Tryas', 'Jl. Tentara Pelajar No. 103-107, Cirebon ', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (60, 0, 'Grandia ', 'Jl. Cihampelas No.80, Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (61, 0, 'Grant Subang', 'Jl. Ahmad Yani Subang', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (62, 0, 'Green Batara ', 'Jl. Cihampelas No. 145 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (63, 0, 'Gumilang Regency ', 'Jl. Dr. Setiabudhi No. 323 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (64, 0, 'Handayani', 'Jl. Kembar 204 Indramayu', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (65, 0, 'Harmoni', 'Jl. H.Z. Mustofa 326, Tasikmalaya', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (66, 0, 'Harper Pasteur', 'Jl. Dr. Djunjunan No. 162 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (67, 0, 'Harper Purwakarta', 'Jl. Bougenville II No.122, Purwakarta', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (68, 0, 'Harris Bogor', 'Jl. Jendral Sudirman No. 1, Sentul City', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (69, 0, 'Harris Ciumbuleuit', 'Jl. Raya Ciumbuleuit No. 50-58 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (70, 0, 'Harris Festival Citylink', 'Jl. Peta No. 241, Pasir Koja Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (71, 0, 'Hemangini', 'Jl. Dr. Setiabudhi No. 66 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (72, 0, 'Holiday Inn', 'Jl. Ir. H. Djuanda No. 31-33 Bandung ', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (73, 0, 'Horison ', 'Jl. Pelajar Pejuang 45 No. 121 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (74, 0, 'Horison Bandung', 'Jl. Pelajar Pejuang 45 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (75, 0, 'Hotel 88 Kopo', 'Jl. Raya Kopo No.459 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (76, 0, 'Hotel Bumi Asih Jaya Bandung', 'Jl. Soekarno Hatta No. 368 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (77, 0, 'Hotel California Bandung ', 'Jl. Wastukencana No. 48 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (78, 0, 'Hotel Dafam Betha Subang', 'Jl. Jendral Ahmad Yani No. 28-30, Kec. Subang', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (79, 0, 'Hotel Sapadia', 'Ciwidey', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (80, 0, 'Ibis Budget Asia Afrika', 'Jl. Asia Afrika No.128 Kota Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (81, 0, 'Ibis Pasteur', 'Jl. Djunjunan No. 22 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (82, 0, 'Ibis Style Braga ', 'Jl. Braga No. 8 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (83, 0, 'iBis Trans', 'Jl. Jenderal Gatot Subroto No. 289, Cibangkong, Batununggal, Cibangkong, Batununggal', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (84, 0, 'Inna Samudera Beach', 'Jl. Raya CisolNON * Km. 7, Pelabuhan Ratu, Sukabumi', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (85, 0, 'Isola', 'Jl. Dr. Setiabudi No. 229 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (86, 0, 'Istana Bangung Jagat', 'Jl. Raya Balongan No. 8 Indramayu', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (87, 0, 'Jatinangor Hotel ', 'Jl. Raya Jatinangor 13-15', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (88, 0, 'Jayakarta Hotel', 'Jl. Ir. H. Djuanda No. 381 A Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (89, 0, 'Kampung Pago', 'Jl. Raya Soreang Ciwidey Km. 25, Soreang', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (90, 0, 'Kampung Toga', 'Jl. Kampung Toga KM. 25 Sumedang', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (91, 0, 'Karang Sari', 'Jl. Raya CisolNON *, Pelabuhan Ratu, Sukabumi', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (92, 0, 'Karang Setra', 'Jl. Bungur No. 2 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (93, 0, 'Kedaton Hotel', 'Jl. Suniaraja No. 14 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (94, 0, 'Krisna Beach', 'Jl. Pantai Barat No. 21, Ciamis, Pangandaran', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (95, 0, 'La Vasa', '', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (96, 0, 'Ladiva Hotel', 'Jl. Pangeran Surya Atmaja No. 36, Sumedang Selatan', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (97, 0, 'Lanud TNI AU', 'Jl. Ters. Kopo Km. 11 Soreang Kab. Bandung', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (98, 0, 'Lingga Hotel', 'Jl. Soekarno Hatta No. 464 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (99, 0, 'Lotus', 'Jl. Letjen Suprapto Subang', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (100, 0, 'M-One', 'Jl. Raya Jakarta Bogor KM 49,5  Sentul, Bogor', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (101, 0, 'Mahkota', 'Jl. Raya Citepus KM 4 Pelabuhan ratu Sukabumi', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (102, 0, 'Maja House Hotel', 'Jl. Sersan Bajuri No. 5B · (022) 91277218', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (103, 0, 'Mason Pine', 'Jl. Raya Parahyangan KM. 1,8 Kota Baru ', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (104, 0, 'Meize Hotel', 'Jl. Sumbawa No.7, Sumur Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (105, 0, 'Mercure Karawang', 'Jl. Galuh MAS Raya, Kabupaten Karawang', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (106, 0, 'Mutiara', 'Jl. Kebon Kawung No. 60-62 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (107, 0, 'Nalendra', 'Jl. Cihampelas No. 225-229 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (108, 0, 'Narapati', 'Jl. Pelajar Pejuang 45 No. 32 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (109, 0, 'Naripan ', 'Jl. Naripan No. 31-33 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (110, 0, 'Newton', 'Jl. RE.Martadinata No. 223-225 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (111, 0, 'Nexa', 'Jl. Supratman No. 66 - 68 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (112, 0, 'Oak Tree', 'Jl. Jawa No. 3 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (113, 0, 'Oasis', 'Jl. Sabang No. 101 Bandung', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (114, 0, 'Panghegar', 'Jl. Merdeka No. 2 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (115, 0, 'Pantai Indah', 'Jl. Kidang Pananjung No. 151, Pantai Timur, Pangandaran', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (116, 0, 'PASAR BARU SQUARE HOTEL', 'Jalan Otto Iskandar Dinata No. 81 - 89, Braga, Sumur Bandung', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (117, 0, 'PERDANA WISATA', 'Jl. Jend. Sudirman No. 66-68, Kb. Jeruk, Andir', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (118, 0, 'Pondok Dewata', 'JL Raya Pelabuhan Ratu', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (119, 0, 'POP Citylink', 'Jalan Peta No.241, Pasir Koja, Suka Asih, Bandung', 0, 1, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (120, 0, 'Prima', 'Jl. DI Panjaitan No.16, Kabupaten Indramayu', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (121, 0, 'Prime Park Hotel Bandung', 'Jl. P.H.H Mustofa No. 47 - 57 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (122, 0, 'Primebiz hotel karawang', 'BlNON * C, Kota Bukit Indah, Kabupaten Karawang', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (123, 0, 'Puri Khatulistiwa ', 'Jl. Raya Bandung Sumedang km.20 Jatinangor', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (124, 0, 'Puri Mutiara', 'l. Prabu Geusan Ulun No.22, Regol Wetan, Sumedang Sel., Kabupaten Sumedang, Jawa Barat', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (125, 0, 'Putri Gunung', 'Jl. Tangkuban Perahu No. 24 Jayagiri - Lembang', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (126, 0, 'Ramayana', 'Jl. RE. Martadinata No. 333 Tasikmalaya', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (127, 0, 'Rangga Inn', 'Jl. Ahmad Yani No. 100 Pasirkeumbi Subang', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (128, 0, 'Regata', 'Jl. Dr. Setiabudhi No.35 Bandung ', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (129, 0, 'Regata (38)', 'Jl. Dr. Setiabudhi No.35 Bandung ', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (130, 0, 'Royal Merdeka', 'Jl. Merdeka, Babakan Ciamis, Sumur Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (131, 0, 'Sabita', 'Jl.Raya Kalijati - Subang', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (132, 0, 'Santika Bandung ', 'Jl. Sumatera No. 52-54 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (133, 0, 'Santika Tasikmalaya ', 'Jl. Yuda Negara no. 57 Tasikmalaya', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (134, 0, 'Sari Ater Hotel & Resort', 'Jl. Raya Ciater, Subang', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (135, 0, 'Sartika Asri Jatinangor', 'Jatinangor', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (136, 0, 'Savoy Homan Bidakara', 'Jl. Asia Afrika No. 112 Bandung', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (137, 0, 'Scarlet ', 'Jl. Siliwangi No. 5 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (138, 0, 'Sheo Hotel', 'Jl. Ciumbuleuit No. 152, Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (139, 0, 'Simply Valore Hotel', 'Jl. Raya Baros No. 57', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (140, 0, 'Sindang Reret Hotel & Restaurant Cikole Lembang', 'Jl. Raya Cikole KM. 22, Lembang, Cikole, Lembang, Kabupaten Bandung Barat', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (141, 0, 'Sukajadi Hotel ', 'Jl. Sukajadi No. 176 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (142, 0, 'Sutan Raja', 'Jl. Raya Soreang No. 10 km. 17 Soreang ', 0, 4, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (143, 0, 'Swiss Bell Inn.', 'Jl. A. Yani No.29, Kabupaten Karawang', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (144, 0, 'The BNB', 'Metro Indah Mall Lantai 2, Jl. Soekarno Hatta No. 590 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (145, 0, 'The Garden Cipaku', 'Jl. Cipaku Indah XI No.2 Cidadap, Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (146, 0, 'The Summit Siliwangi', 'Jl. Seram No. 5 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (147, 0, 'Topas Galeria', 'Jl. Djunjunan No. 153 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (148, 0, 'TravelDay Bandung', 'Jl. Cipaku Indah II BlNON * A 20-21 Setiabudhi Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (149, 0, 'Travelo', 'Jl. Dr. Setiabudhi No. 268 Bandung', 0, 3, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (150, 0, 'Tyara Plaza ', 'Jl. Jenderal Sudirman No.185, Ciamis', 0, 0, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (151, 0, 'Verona', 'Jl. Surya Sumantri No. 36 Bandung', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (152, 0, 'Vio Pasteur', 'Jl. Djunjunan No. 154 Bandung', 0, 1, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (153, 0, 'Whiz Prime', 'Jl. Cikuray No. 47, Padjajaran, 16143 Bogor', 0, 2, '', '', '', '', '', '');
INSERT INTO t_ledging (`id`, `id_regional`, `name`, `address`, `id_type`, `star`, `telp`, `email`, `fax`, `website`, `coordinate`, `picture`) VALUES (154, 0, 'Wiwi Perkasa 2 ', 'Jl. Tridaya Barat 2 Indramayu', 0, 2, '', '', '', '', '', '');


#
# TABLE STRUCTURE FOR: t_menu
#

DROP TABLE IF EXISTS t_menu;

CREATE TABLE `t_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_menu` int(11) NOT NULL,
  `menu` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_order
#

DROP TABLE IF EXISTS t_order;

CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_lo` int(11) NOT NULL,
  `tempat` int(11) NOT NULL,
  `id_contingent` int(11) NOT NULL,
  `id_cabor` int(11) NOT NULL,
  `status` enum('false','true') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_org_details
#

DROP TABLE IF EXISTS t_org_details;

CREATE TABLE `t_org_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ledging` int(11) NOT NULL,
  `company` varchar(164) NOT NULL,
  `signature` varchar(128) NOT NULL,
  `position` varchar(128) NOT NULL,
  `sign_telp` varchar(20) NOT NULL,
  `sign_email` varchar(64) NOT NULL,
  `npwp` varchar(64) NOT NULL,
  `pic` varchar(64) NOT NULL,
  `pic_pon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_participant
#

DROP TABLE IF EXISTS t_participant;

CREATE TABLE `t_participant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contingent` int(11) NOT NULL,
  `id_cabor` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `registration` varchar(64) NOT NULL,
  `nik` varchar(64) NOT NULL,
  `blood` enum('A','AB','B','O') NOT NULL,
  `gender` enum('female','male') NOT NULL,
  `dob` date NOT NULL,
  `type_participant` enum('athlete','contingent','cabor') NOT NULL,
  `position` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_position
#

DROP TABLE IF EXISTS t_position;

CREATE TABLE `t_position` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO t_position (`id`, `name`) VALUES (0, '');
INSERT INTO t_position (`id`, `name`) VALUES (1, 'manager');
INSERT INTO t_position (`id`, `name`) VALUES (2, 'teknisi');
INSERT INTO t_position (`id`, `name`) VALUES (3, 'pelatih');
INSERT INTO t_position (`id`, `name`) VALUES (4, 'paramedis');
INSERT INTO t_position (`id`, `name`) VALUES (5, 'mekanik');
INSERT INTO t_position (`id`, `name`) VALUES (6, 'masseure');
INSERT INTO t_position (`id`, `name`) VALUES (7, 'fisioterapis');
INSERT INTO t_position (`id`, `name`) VALUES (8, 'dokter');
INSERT INTO t_position (`id`, `name`) VALUES (9, 'asisten_pelatih');
INSERT INTO t_position (`id`, `name`) VALUES (10, 'asisten_manager');
INSERT INTO t_position (`id`, `name`) VALUES (11, 'ahli_gizi');
INSERT INTO t_position (`id`, `name`) VALUES (12, 'staff_contingent');
INSERT INTO t_position (`id`, `name`) VALUES (13, 'ketua_contingent');
INSERT INTO t_position (`id`, `name`) VALUES (14, 'chef_de_mission');


#
# TABLE STRUCTURE FOR: t_ra
#

DROP TABLE IF EXISTS t_ra;

CREATE TABLE `t_ra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_regional
#

DROP TABLE IF EXISTS t_regional;

CREATE TABLE `t_regional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO t_regional (`id`, `name`) VALUES (1, 'KABUPATEN BOGOR');
INSERT INTO t_regional (`id`, `name`) VALUES (2, 'KABUPATEN SUKABUMI');
INSERT INTO t_regional (`id`, `name`) VALUES (3, 'KABUPATEN CIANJUR');
INSERT INTO t_regional (`id`, `name`) VALUES (4, 'KABUPATEN BANDUNG');
INSERT INTO t_regional (`id`, `name`) VALUES (5, 'KABUPATEN GARUT');
INSERT INTO t_regional (`id`, `name`) VALUES (6, 'KABUPATEN TASIKMALAYA');
INSERT INTO t_regional (`id`, `name`) VALUES (7, 'KABUPATEN CIAMIS');
INSERT INTO t_regional (`id`, `name`) VALUES (8, 'KABUPATEN KUNINGAN');
INSERT INTO t_regional (`id`, `name`) VALUES (9, 'KABUPATEN CIREBON');
INSERT INTO t_regional (`id`, `name`) VALUES (10, 'KABUPATEN MAJALENGKA');
INSERT INTO t_regional (`id`, `name`) VALUES (11, 'KABUPATEN SUMEDANG');
INSERT INTO t_regional (`id`, `name`) VALUES (12, 'KABUPATEN INDRAMAYU');
INSERT INTO t_regional (`id`, `name`) VALUES (13, 'KABUPATEN SUBANG');
INSERT INTO t_regional (`id`, `name`) VALUES (14, 'KABUPATEN PURWAKARTA');
INSERT INTO t_regional (`id`, `name`) VALUES (15, 'KABUPATEN KARAWANG');
INSERT INTO t_regional (`id`, `name`) VALUES (16, 'KABUPATEN BEKASI');
INSERT INTO t_regional (`id`, `name`) VALUES (17, 'KABUPATEN BANDUNG BARAT');
INSERT INTO t_regional (`id`, `name`) VALUES (18, 'KABUPATEN PANGANDARAN');
INSERT INTO t_regional (`id`, `name`) VALUES (19, 'KOTA BOGOR');
INSERT INTO t_regional (`id`, `name`) VALUES (20, 'KOTA SUKABUMI');
INSERT INTO t_regional (`id`, `name`) VALUES (21, 'KOTA BANDUNG');
INSERT INTO t_regional (`id`, `name`) VALUES (22, 'KOTA CIREBON');
INSERT INTO t_regional (`id`, `name`) VALUES (23, 'KOTA BEKASI');
INSERT INTO t_regional (`id`, `name`) VALUES (24, 'KOTA DEPOK');
INSERT INTO t_regional (`id`, `name`) VALUES (25, 'KOTA CIMAHI');
INSERT INTO t_regional (`id`, `name`) VALUES (26, 'KOTA TASIKMALAYA');
INSERT INTO t_regional (`id`, `name`) VALUES (27, 'KOTA BANJAR');


#
# TABLE STRUCTURE FOR: t_room
#

DROP TABLE IF EXISTS t_room;

CREATE TABLE `t_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_allocation` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `id_contingent` int(11) NOT NULL,
  `gender` enum('Female','Male') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_touchdown
#

DROP TABLE IF EXISTS t_touchdown;

CREATE TABLE `t_touchdown` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `id_contingent` int(11) NOT NULL,
  `id_cabor` int(11) NOT NULL,
  `id_ha` int(11) NOT NULL,
  `id_ra` int(11) NOT NULL,
  `status_hotel` enum('false','true') NOT NULL,
  `status_venue` enum('false','true') NOT NULL,
  `id_participant` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_type
#

DROP TABLE IF EXISTS t_type;

CREATE TABLE `t_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO t_type (`id`, `name`) VALUES (1, 'Hotel');
INSERT INTO t_type (`id`, `name`) VALUES (2, 'Apartment');
INSERT INTO t_type (`id`, `name`) VALUES (3, 'Guest House');


#
# TABLE STRUCTURE FOR: t_type_menu
#

DROP TABLE IF EXISTS t_type_menu;

CREATE TABLE `t_type_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: t_venue
#

DROP TABLE IF EXISTS t_venue;

CREATE TABLE `t_venue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `id_cabor` int(11) NOT NULL,
  `coordinate` varchar(64) NOT NULL,
  `picture` varchar(64) NOT NULL,
  `id_regional` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (1, 'Lanud TNI AU Sulaeman', '', 1, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (2, 'Hotel Haris', '', 2, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (3, 'GOR Jalak Harupat', '', 3, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (4, 'GOR Jalak Harupat', '', 4, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (5, 'Lapangan Atletik Cibinong', '', 6, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (6, 'Sirkuit Hutan Kota Cigembor', '', 7, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (7, 'Cikole - Lembang', '', 7, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (8, 'Jl.  Raya KBB - PWK - Subang - KBB', '', 7, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (9, 'Velodrome Munaip Saleh', '', 7, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (10, 'Lap. Base Ball Arcamanik', '', 9, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (11, 'Pusenkav Parongpong, Lembang', '', 10, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (12, 'Trek Pacuan Kuda Pangandaran', '', 11, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (13, 'Bukit Peusar Kota Tasikmalaya', '', 8, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (14, 'Arena Billiar Graha Siliwangi', '', 12, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (15, 'GOR Jalak Harupat', '', 5, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (16, 'GOR Citra Arena', '', 13, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (17, 'GSG Sijalak Harupat', '', 14, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (18, 'Lap. Volley Pasir Arcamanik', '', 15, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (19, 'Arena Bowling Graha Siliwangi', '', 16, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (20, 'Hotel Horison', '', 17, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (21, 'Bima, Cirebon', '', 18, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (22, 'Hotel Savoy Homan', '', 19, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (23, 'Stadion Siliwangi', '', 20, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (24, 'Hotel Haris', '', 21, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (25, 'Situ Cipule', '', 22, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (26, 'Stadion Pakansari Cibinong', '', 23, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (27, 'Lapangan Footsal ITB Jatinangor', '', 24, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (28, 'Cihampelas - Singajaya ', '', 25, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (29, 'Gunung Lingga - Sumedang ', '', 25, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (30, 'BGG Jatinangor', '', 26, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (31, 'GOR Saparua', '', 27, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (32, 'Gymnasium FPOK UPI', '', 28, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (33, 'Lapangan Hockey Jalak Harupat', '', 59, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (34, 'GOR Saparua', '', 29, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (35, 'Sabuga ITB', '', 30, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (36, 'Sabuga ITB', '', 31, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (37, 'Pantai Balongan Indah', '', 32, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (38, 'Kolam Renang FPOK UPI', '', 47, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (39, 'Lapangan Tembak Cisangkan', '', 33, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (40, 'Lapangan Panahan Jalak Harupat', '', 34, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (41, 'Cikole - Lembang', '', 35, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (42, 'Gunung Lingga - Sumedang ', '', 36, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (43, 'Graha Laga Satria ITB Jatinangor', '', 37, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (44, 'Kolam Renang Jalak Harupat', '', 44, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (45, 'Kolam Renang FPOK UPI', '', 46, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (46, 'Kolam Renang FPOK UPI', '', 45, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (47, 'Pantai Tirtamaya Indramayu', '', 48, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (48, 'Kolam Renang Catrine', '', 38, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (49, 'Pantai Tirtamaya Indramayu', '', 60, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (50, 'Gymnasium Sport Arcamanik', '', 39, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (51, 'Sporthall FPOK UPI', '', 41, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (52, 'Stadion Sepakbola Cibinong', '', 40, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (53, 'Stadion Sepakbola Kota Bekasi', '', 40, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (54, 'Stadion Sepakbola Kab. Bekasi', '', 40, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (55, 'Lapangan sepatu roda saparua', '', 42, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (56, 'Larangtapa Kota Baru ', '', 49, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (57, 'Lapangan Soft Balla Jalak Harupat', '', 43, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (58, 'Lapang Softball FPOK UPI', '', 61, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (59, 'Arena Squash Graha Siliwangi', '', 50, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (60, 'Gymnasium FPOK UPI', '', 51, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (61, 'GOR Padjadjaran', '', 52, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (62, 'Lapangan Tenis Siliwangi', '', 53, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (63, 'Telkom Univercity Convention Hall', '', 54, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (64, 'Lanud TNI AU Suryadarma', '', 55, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (65, 'Lanud Nusa Wiru', '', 56, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (66, 'GOR Tinju Pelabuhan Ratu', '', 57, '', '', 0);
INSERT INTO t_venue (`id`, `name`, `address`, `id_cabor`, `coordinate`, `picture`, `id_regional`) VALUES (67, 'GOR Padjadjaran', '', 58, '', '', 0);


