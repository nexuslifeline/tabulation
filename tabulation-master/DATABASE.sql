/* SQL Manager Lite for MySQL                              5.6.3.49012 */
/* ------------------------------------------------------------------- */
/* Host     : localhost                                                */
/* Port     : 3306                                                     */
/* Database : tabulation                                               */


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'latin1' */;

SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `tabulation`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `tabulation`;

/* Structure for the `contestants` table : */

CREATE TABLE `contestants` (
  `contestant_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `contestant_code` VARCHAR(55) COLLATE latin1_swedish_ci DEFAULT '',
  `lname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `fname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `mname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `bdate` DATE DEFAULT '0000-00-00',
  `birthplace` VARCHAR(555) COLLATE latin1_swedish_ci DEFAULT '',
  `email` VARCHAR(125) COLLATE latin1_swedish_ci DEFAULT '',
  `weight` VARCHAR(50) COLLATE latin1_swedish_ci DEFAULT '',
  `height` VARCHAR(50) COLLATE latin1_swedish_ci DEFAULT '',
  `nationality` VARCHAR(155) COLLATE latin1_swedish_ci DEFAULT '',
  `contact` VARCHAR(155) COLLATE latin1_swedish_ci DEFAULT '',
  `address` VARCHAR(555) COLLATE latin1_swedish_ci DEFAULT '',
  `mothers_name` VARCHAR(300) COLLATE latin1_swedish_ci DEFAULT '',
  `mothers_occupation` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `fathers_name` VARCHAR(300) COLLATE latin1_swedish_ci DEFAULT '',
  `fathers_occupation` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `gender` TINYINT(4) DEFAULT NULL COMMENT '1 -  Male, 2 - Female',
  `photo_path` VARCHAR(155) COLLATE latin1_swedish_ci DEFAULT '',
  `marital_status` VARCHAR(75) COLLATE latin1_swedish_ci DEFAULT '',
  `is_active` TINYINT(4) DEFAULT 1,
  `is_deleted` TINYINT(4) DEFAULT 0,
  `created_by` INTEGER(11) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `modified_by` INTEGER(11) DEFAULT 0,
  `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00',
  `deleted_by` INTEGER(11) DEFAULT 0,
  `date_deleted` DATETIME DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY USING BTREE (`contestant_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=7 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `events` table : */

CREATE TABLE `events` (
  `event_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_name` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `event_description` VARCHAR(755) COLLATE latin1_swedish_ci DEFAULT '',
  `site` VARCHAR(555) COLLATE latin1_swedish_ci DEFAULT '',
  `address` VARCHAR(555) COLLATE latin1_swedish_ci DEFAULT '',
  `contact_person` VARCHAR(555) COLLATE latin1_swedish_ci DEFAULT '',
  `date_schedule` DATE DEFAULT '0000-00-00',
  `remarks` VARCHAR(1000) COLLATE latin1_swedish_ci DEFAULT '',
  `is_active` TINYINT(4) DEFAULT 1,
  `is_deleted` TINYINT(4) DEFAULT 0,
  `created_by` INTEGER(11) DEFAULT 0,
  `modified_by` INTEGER(11) DEFAULT 0,
  `deleted_by` INTEGER(11) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_deleted` DATETIME DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY USING BTREE (`event_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=5 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `judges` table : */

CREATE TABLE `judges` (
  `judge_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `judge_lname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `judge_fname` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT '',
  `judge_mname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `judge_address` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `judge_contact` VARCHAR(75) COLLATE latin1_swedish_ci DEFAULT '',
  `judge_email` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `judge_occupation` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `judge_title` VARCHAR(155) COLLATE latin1_swedish_ci DEFAULT '',
  `is_active` TINYINT(4) DEFAULT 1,
  `is_deleted` TINYINT(4) DEFAULT 0,
  `created_by` INTEGER(11) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `modified_by` INTEGER(11) DEFAULT 0,
  `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00',
  `deleted_by` INTEGER(11) DEFAULT 0,
  `date_deleted` DATETIME DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY USING BTREE (`judge_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=1 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `rights_links` table : */

CREATE TABLE `rights_links` (
  `link_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `parent_code` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `link_code` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT NULL,
  `link_name` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  PRIMARY KEY USING BTREE (`link_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=52 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `user_accounts` table : */

CREATE TABLE `user_accounts` (
  `user_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `user_pword` VARCHAR(500) COLLATE latin1_swedish_ci DEFAULT '',
  `user_lname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `user_fname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `user_mname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `user_address` VARCHAR(155) COLLATE latin1_swedish_ci DEFAULT '',
  `user_email` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `user_mobile` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `user_telephone` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `user_bdate` DATE DEFAULT '0000-00-00',
  `user_group_id` INTEGER(11) DEFAULT 0,
  `photo_path` VARCHAR(555) COLLATE latin1_swedish_ci DEFAULT '',
  `file_directory` VARCHAR(666) COLLATE latin1_swedish_ci DEFAULT '',
  `is_active` BIT(1) DEFAULT 1,
  `is_deleted` BIT(1) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_modified` TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `date_deleted` INTEGER(11) DEFAULT 0,
  `modified_by_user` INTEGER(11) DEFAULT 0,
  `posted_by_user` INTEGER(11) DEFAULT 0,
  `deleted_by_user` INTEGER(11) DEFAULT 0,
  `is_online` TINYINT(4) DEFAULT 0,
  PRIMARY KEY USING BTREE (`user_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=3 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `user_group_rights` table : */

CREATE TABLE `user_group_rights` (
  `user_rights_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `user_group_id` INTEGER(11) DEFAULT 0,
  `link_code` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT '',
  PRIMARY KEY USING BTREE (`user_rights_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=249 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `user_groups` table : */

CREATE TABLE `user_groups` (
  `user_group_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `user_group` VARCHAR(135) COLLATE latin1_swedish_ci DEFAULT '',
  `user_group_desc` VARCHAR(500) COLLATE latin1_swedish_ci DEFAULT '',
  `is_active` BIT(1) DEFAULT 1,
  `is_deleted` BIT(1) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_modified` TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY USING BTREE (`user_group_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=3 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Data for the `contestants` table  (LIMIT 0,500) */

INSERT INTO `contestants` (`contestant_id`, `contestant_code`, `lname`, `fname`, `mname`, `bdate`, `birthplace`, `email`, `weight`, `height`, `nationality`, `contact`, `address`, `mothers_name`, `mothers_occupation`, `fathers_name`, `fathers_occupation`, `gender`, `photo_path`, `marital_status`, `is_active`, `is_deleted`, `created_by`, `date_created`, `modified_by`, `date_modified`, `deleted_by`, `date_deleted`) VALUES
  (4,'C201706104','Soberano','Liza','','2017-06-14','','','','','','','San Jose, San Simon, Pampanga','','','','',2,'assets/img/contestants/593bb98c779b2.jpg','',1,0,1,'2017-06-10 17:19:31',1,'2017-06-11 17:56:43',0,'0000-00-00 00:00:00'),
  (5,'C201706105','xx','xx','','2017-06-10','','','','','','','xx','','','','',NULL,'assets/img/default-user-image.png','',1,0,1,'2017-06-10 17:27:58',1,'2017-06-10 17:28:14',0,'0000-00-00 00:00:00'),
  (6,'C201706116','xx','xx1','','2017-06-11','','','','','','','xx','','','','',NULL,'assets/img/contestants/593bb98c779b2.jpg','',1,0,1,'2017-06-11 17:56:48',1,'2017-06-11 17:56:52',0,'0000-00-00 00:00:00');
COMMIT;

/* Data for the `events` table  (LIMIT 0,500) */

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `site`, `address`, `contact_person`, `date_schedule`, `remarks`, `is_active`, `is_deleted`, `created_by`, `modified_by`, `deleted_by`, `date_created`, `date_modified`, `date_deleted`) VALUES
  (3,'event 1','site',NULL,'address','person','2017-06-11','remarks',1,1,1,1,1,'2017-06-11 15:56:43','2017-06-11 16:01:58','2017-06-11 16:02:03'),
  (4,'event 1','site',NULL,'address','person','2017-06-27','remarks',1,0,1,1,0,'2017-06-11 16:03:05','2017-06-11 18:00:24','0000-00-00 00:00:00');
COMMIT;

/* Data for the `rights_links` table  (LIMIT 0,500) */

INSERT INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`) VALUES
  (1,'1','1-1','General Journal'),
  (2,'1','1-2','Cash Disbursement'),
  (3,'1','1-3','Purchase Journal'),
  (4,'1','1-4','Sales Journal'),
  (5,'1','1-5','Cash Receipt'),
  (6,'2','2-1','Purchase Order'),
  (7,'2','2-2','Purchase Invoice'),
  (8,'2','2-3','Record Payment'),
  (9,'2','2-4','Item Issuance'),
  (10,'2','2-5','Item Adjustment (In)'),
  (11,'3','3-1','Sales Order'),
  (12,'3','3-2','Sales Invoice'),
  (13,'3','3-3','Record Payment'),
  (14,'4','4-1','Category Management'),
  (15,'4','4-2','Department Management'),
  (16,'4','4-3','Unit Management'),
  (17,'5','5-1','Product Management'),
  (18,'5','5-2','Supplier Management'),
  (19,'5','5-3','Customer Management'),
  (20,'6','6-1','Setup Tax'),
  (21,'6','6-2','Setup Chart of Accounts'),
  (22,'6','6-3','Account Integration'),
  (23,'6','6-4','Setup User Group'),
  (24,'6','6-5','Create User Account'),
  (25,'6','6-6','Setup Company Info'),
  (26,'7','7-1','Purchase Order for Approval'),
  (27,'9','9-1','Balance Sheet Report'),
  (28,'9','9-2','Income Statement'),
  (29,'4','4-4','Product Types'),
  (30,'8','8-1','Sales Report'),
  (31,'8','8-2','Batch Inventory Report'),
  (32,'5','5-4','Salesperson Management'),
  (33,'2','2-6','Item Adjustment (Out)'),
  (34,'8','8-3','Export Sales Summary'),
  (35,'9','9-3','Export Trial Balance'),
  (36,'6','6-7','Setup Check Layout'),
  (37,'9','9-4','AR Schedule'),
  (38,'9','9-6','Customer Subsidiary'),
  (39,'9','9-8','Account Subsidiary'),
  (40,'9','9-7','Supplier Subsidiary'),
  (41,'9','9-5','AP Schedule'),
  (42,'8','8-4','Purchase Invoice Report'),
  (43,'4','4-4','Locations Management'),
  (44,'10','10-1','Fixed Asset Management'),
  (45,'9','9-9','Depreciation Expense'),
  (46,'6','6-8','Recurring Template'),
  (47,'9','9-10','VAT Relief Report'),
  (48,'1','1-6','Petty Cash Journal'),
  (49,'9','9-13','Replenishment Report'),
  (50,'6','6-9','Backup Database'),
  (51,'9','9-14','Book of Accounts');
COMMIT;

/* Data for the `user_accounts` table  (LIMIT 0,500) */

INSERT INTO `user_accounts` (`user_id`, `user_name`, `user_pword`, `user_lname`, `user_fname`, `user_mname`, `user_address`, `user_email`, `user_mobile`, `user_telephone`, `user_bdate`, `user_group_id`, `photo_path`, `file_directory`, `is_active`, `is_deleted`, `date_created`, `date_modified`, `date_deleted`, `modified_by_user`, `posted_by_user`, `deleted_by_user`, `is_online`) VALUES
  (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Diaz','Anna Karina','','Pampanga','annakarina@yahoo.com','0935-746-1234','','1970-01-01',1,'assets/img/user/593a366fa6c65.jpg','',1,0,'0000-00-00 00:00:00','2017-06-11 18:05:55',0,1,0,0,1),
  (2,'manny','356a192b7913b04c54574d18c28d46e6395428ab','Pacquiao','Manny','','','','','','2017-06-11',2,'assets/img/anonymous-icon.png','',1,0,'2017-06-11 18:20:01','0000-00-00 00:00:00',0,0,1,0,0);
COMMIT;

/* Data for the `user_group_rights` table  (LIMIT 0,500) */

INSERT INTO `user_group_rights` (`user_rights_id`, `user_group_id`, `link_code`) VALUES
  (1,1,'1-1'),
  (2,1,'1-2'),
  (3,1,'1-3'),
  (4,1,'1-4'),
  (5,1,'1-5'),
  (6,1,'2-1'),
  (7,1,'2-2'),
  (8,1,'2-3'),
  (9,1,'2-4'),
  (10,1,'2-5'),
  (11,1,'3-1'),
  (12,1,'3-2'),
  (13,1,'3-3'),
  (14,1,'4-1'),
  (15,1,'4-2'),
  (16,1,'4-3'),
  (17,1,'5-1'),
  (18,1,'5-2'),
  (19,1,'5-3'),
  (20,1,'6-1'),
  (21,1,'6-2'),
  (22,1,'6-3'),
  (23,1,'6-4'),
  (24,1,'6-5'),
  (25,1,'6-6'),
  (26,1,'7-1'),
  (27,1,'9-1'),
  (28,1,'9-2'),
  (29,1,'4-4'),
  (30,1,'8-1'),
  (31,1,'8-2'),
  (32,1,'5-4'),
  (33,1,'2-6'),
  (34,1,'8-3'),
  (35,1,'9-3'),
  (36,1,'6-7'),
  (37,1,'9-4'),
  (38,1,'9-6'),
  (39,1,'9-8'),
  (40,1,'9-7'),
  (41,1,'9-5'),
  (42,1,'8-4'),
  (43,1,'4-4'),
  (44,1,'10-1'),
  (45,1,'9-9'),
  (46,1,'6-8'),
  (47,1,'9-10'),
  (48,1,'1-6'),
  (49,1,'9-13'),
  (50,1,'6-9'),
  (51,1,'9-14'),
  (67,1,'1-1'),
  (68,1,'1-2'),
  (69,1,'1-3'),
  (70,1,'1-4'),
  (71,1,'1-5'),
  (72,1,'2-1'),
  (73,1,'2-2'),
  (74,1,'2-3'),
  (75,1,'2-4'),
  (76,1,'2-5'),
  (77,1,'3-1'),
  (78,1,'3-2'),
  (79,1,'3-3'),
  (80,1,'4-1'),
  (81,1,'4-2'),
  (82,1,'4-3'),
  (83,1,'5-1'),
  (84,1,'5-2'),
  (85,1,'5-3'),
  (86,1,'6-1'),
  (87,1,'6-2'),
  (88,1,'6-3'),
  (89,1,'6-4'),
  (90,1,'6-5'),
  (91,1,'6-6'),
  (92,1,'7-1'),
  (93,1,'8-1'),
  (94,1,'8-2'),
  (95,1,'1-1'),
  (96,1,'1-2'),
  (97,1,'1-3'),
  (98,1,'1-4'),
  (99,1,'1-5'),
  (100,1,'2-1'),
  (101,1,'2-2'),
  (102,1,'2-3'),
  (103,1,'2-4'),
  (104,1,'2-5'),
  (105,1,'3-1'),
  (106,1,'3-2'),
  (107,1,'3-3'),
  (108,1,'4-1'),
  (109,1,'4-2'),
  (110,1,'4-3'),
  (111,1,'5-1'),
  (112,1,'5-2'),
  (113,1,'5-3'),
  (114,1,'6-1'),
  (115,1,'6-2'),
  (116,1,'6-3'),
  (117,1,'6-4'),
  (118,1,'6-5'),
  (119,1,'6-6'),
  (120,1,'7-1'),
  (121,1,'8-1'),
  (122,1,'8-2'),
  (123,1,'4-4'),
  (124,1,'4-4'),
  (125,1,'8-3'),
  (179,2,'1-1'),
  (180,2,'1-2'),
  (181,2,'1-3'),
  (182,2,'1-4'),
  (183,2,'1-5'),
  (184,2,'8-1'),
  (185,2,'8-2'),
  (186,2,'8-3'),
  (187,2,'8-5'),
  (188,2,'8-6'),
  (189,2,'8-10'),
  (190,2,'8-11'),
  (202,5,'1-2'),
  (203,5,'3-3'),
  (204,5,'5-2'),
  (205,5,'1-3'),
  (206,5,'6-1'),
  (207,5,'8-10'),
  (208,5,'8-11'),
  (227,6,'2-1'),
  (228,6,'2-2'),
  (229,6,'3-1'),
  (230,6,'3-2'),
  (231,4,'3-2'),
  (232,4,'2-1'),
  (233,4,'2-2'),
  (234,4,'2-3'),
  (235,4,'2-4'),
  (236,4,'4-1'),
  (237,4,'4-2'),
  (238,4,'4-3'),
  (239,4,'5-1'),
  (240,4,'5-2'),
  (241,4,'5-3'),
  (242,4,'6-1'),
  (243,4,'7-1'),
  (244,4,'4-4'),
  (245,4,'4-4'),
  (246,4,'8-3'),
  (247,4,'8-4'),
  (248,4,'5-4');
COMMIT;

/* Data for the `user_groups` table  (LIMIT 0,500) */

INSERT INTO `user_groups` (`user_group_id`, `user_group`, `user_group_desc`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES
  (1,'System Administrator','Can access all features.',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (2,'Event Panel','',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;