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
  `entity_code` VARCHAR(55) COLLATE latin1_swedish_ci DEFAULT '',
  `entity_name` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `desc_1` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `desc_2` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `desc_3` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `desc_4` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `desc_5` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `desc_6` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT '',
  `photo_path` VARCHAR(155) COLLATE latin1_swedish_ci DEFAULT '',
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

/* Structure for the `criteria` table : */

CREATE TABLE `criteria` (
  `criteria_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `criteria` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `description` VARCHAR(755) COLLATE latin1_swedish_ci DEFAULT '',
  `is_active` TINYINT(4) DEFAULT 1,
  `is_deleted` TINYINT(4) DEFAULT 0,
  `created_by` INTEGER(11) DEFAULT 0,
  `modified_by` INTEGER(11) DEFAULT 0,
  `deleted_by` INTEGER(11) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_deleted` DATETIME DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY USING BTREE (`criteria_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=28 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
  `is_open` TINYINT(4) DEFAULT 1,
  `is_locked` TINYINT(4) DEFAULT 0,
  `is_deleted` TINYINT(4) DEFAULT 0,
  `is_completed` TINYINT(4) DEFAULT 0,
  `created_by` INTEGER(11) DEFAULT 0,
  `modified_by` INTEGER(11) DEFAULT 0,
  `deleted_by` INTEGER(11) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_deleted` DATETIME DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY USING BTREE (`event_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=10 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `events_contestant` table : */

CREATE TABLE `events_contestant` (
  `event_contestant_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `contestant_id` INTEGER(11) DEFAULT 0,
  `contestant_no` VARCHAR(55) COLLATE latin1_swedish_ci DEFAULT '',
  PRIMARY KEY USING BTREE (`event_contestant_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=36 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `events_criteria` table : */

CREATE TABLE `events_criteria` (
  `event_criteria_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `criteria_id` INTEGER(11) DEFAULT 0,
  `percentage` DECIMAL(11,2) DEFAULT 0.00,
  `max_score` DECIMAL(11,2) DEFAULT 0.00,
  PRIMARY KEY USING BTREE (`event_criteria_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=133 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `events_judge` table : */

CREATE TABLE `events_judge` (
  `event_judge_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `judge_id` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`event_judge_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=7 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=11 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `tabulation` table : */

CREATE TABLE `tabulation` (
  `tabulation_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `judge_id` INTEGER(11) DEFAULT 0,
  `criteria_id` INTEGER(11) DEFAULT 0,
  `contestant_id` INTEGER(11) DEFAULT 0,
  `score` DECIMAL(10,0) DEFAULT 0,
  `criteria_rate` DECIMAL(11,2) DEFAULT 0.00,
  PRIMARY KEY USING BTREE (`tabulation_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=147 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `tabulation_submitted` table : */

CREATE TABLE `tabulation_submitted` (
  `tabulation_submitted_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `contestant_id` INTEGER(11) DEFAULT 0,
  `judge_id` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`tabulation_submitted_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=6 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=12 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=4 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Data for the `contestants` table  (LIMIT 0,500) */

INSERT INTO `contestants` (`contestant_id`, `entity_code`, `entity_name`, `desc_1`, `desc_2`, `desc_3`, `desc_4`, `desc_5`, `desc_6`, `photo_path`, `is_active`, `is_deleted`, `created_by`, `date_created`, `modified_by`, `date_modified`, `deleted_by`, `date_deleted`) VALUES
  (5,'C201708275','Manny Pacquiao','','','','','','','assets/img/default-user-image.png',1,0,1,'2017-08-27 22:58:47',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),
  (6,'C201708276','Jeff Horn','','','','','','','assets/img/default-user-image.png',1,0,1,'2017-08-27 22:58:54',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
COMMIT;

/* Data for the `criteria` table  (LIMIT 0,500) */

INSERT INTO `criteria` (`criteria_id`, `criteria`, `description`, `is_active`, `is_deleted`, `created_by`, `modified_by`, `deleted_by`, `date_created`, `date_modified`, `date_deleted`) VALUES
  (1,'Vote','This criteria automatically computes the percentage from the Voting system.',1,0,0,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (16,'ROUND 1','',1,0,1,0,0,'2017-08-27 22:55:21','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (17,'ROUND 2','',1,0,1,0,0,'2017-08-27 22:55:27','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (18,'ROUND 3','',1,0,1,0,0,'2017-08-27 22:56:13','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (19,'ROUND 4','',1,0,1,0,0,'2017-08-27 22:56:18','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (20,'ROUND 5','',1,0,1,0,0,'2017-08-27 22:56:22','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (21,'ROUND 6','',1,0,1,0,0,'2017-08-27 22:56:27','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (22,'ROUND 7','',1,0,1,0,0,'2017-08-27 22:56:31','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (23,'ROUND 8','',1,0,1,0,0,'2017-08-27 22:56:35','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (24,'ROUND 9','',1,0,1,0,0,'2017-08-27 22:56:39','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (25,'ROUND 10','',1,0,1,0,0,'2017-08-27 22:56:43','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (26,'ROUND 11','',1,0,1,0,0,'2017-08-27 22:56:49','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (27,'ROUND 12','',1,0,1,0,0,'2017-08-27 22:56:53','0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

/* Data for the `events` table  (LIMIT 0,500) */

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `site`, `address`, `contact_person`, `date_schedule`, `remarks`, `is_active`, `is_open`, `is_locked`, `is_deleted`, `is_completed`, `created_by`, `modified_by`, `deleted_by`, `date_created`, `date_modified`, `date_deleted`) VALUES
  (9,'BOXING','',NULL,'','','2017-08-27','',1,1,0,0,0,1,0,0,'2017-08-27 22:57:03','0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

/* Data for the `events_contestant` table  (LIMIT 0,500) */

INSERT INTO `events_contestant` (`event_contestant_id`, `event_id`, `contestant_id`, `contestant_no`) VALUES
  (34,9,6,''),
  (35,9,5,'');
COMMIT;

/* Data for the `events_criteria` table  (LIMIT 0,500) */

INSERT INTO `events_criteria` (`event_criteria_id`, `event_id`, `criteria_id`, `percentage`, `max_score`) VALUES
  (87,9,16,10.00,10.00),
  (112,9,25,10.00,10.00),
  (114,9,26,10.00,10.00),
  (116,9,27,10.00,10.00),
  (118,9,17,10.00,10.00),
  (120,9,18,10.00,10.00),
  (122,9,19,10.00,10.00),
  (124,9,20,10.00,10.00),
  (126,9,21,10.00,10.00),
  (128,9,22,10.00,10.00),
  (130,9,23,10.00,10.00),
  (132,9,24,10.00,10.00);
COMMIT;

/* Data for the `events_judge` table  (LIMIT 0,500) */

INSERT INTO `events_judge` (`event_judge_id`, `event_id`, `judge_id`) VALUES
  (6,9,2);
COMMIT;

/* Data for the `rights_links` table  (LIMIT 0,500) */

INSERT INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`) VALUES
  (1,'1','1-1','Register Candidate'),
  (2,'1','1-2','Tabulation System'),
  (6,'2','2-1','Manage User Account'),
  (7,'2','2-2','Manage User Group'),
  (8,'2','2-3','Manage Events'),
  (9,'2','2-4','Setup Criteria'),
  (10,'3','3-1','Print Ranking');
COMMIT;

/* Data for the `tabulation` table  (LIMIT 0,500) */

INSERT INTO `tabulation` (`tabulation_id`, `event_id`, `judge_id`, `criteria_id`, `contestant_id`, `score`, `criteria_rate`) VALUES
  (79,9,2,16,6,9,9.00),
  (81,9,2,17,6,9,9.00),
  (83,9,2,18,6,9,9.00),
  (86,9,2,19,6,9,9.00),
  (89,9,2,20,6,9,9.00),
  (92,9,2,21,6,9,9.00),
  (95,9,2,22,6,9,9.00),
  (98,9,2,23,6,9,9.00),
  (101,9,2,24,6,9,9.00),
  (104,9,2,25,6,9,9.00),
  (107,9,2,26,6,9,9.00),
  (109,9,2,27,6,9,9.00),
  (113,9,2,16,5,10,10.00),
  (116,9,2,17,5,10,10.00),
  (119,9,2,18,5,10,10.00),
  (122,9,2,19,5,10,10.00),
  (125,9,2,20,5,10,10.00),
  (128,9,2,21,5,10,10.00),
  (131,9,2,22,5,10,10.00),
  (134,9,2,23,5,10,10.00),
  (137,9,2,24,5,10,10.00),
  (140,9,2,25,5,10,10.00),
  (143,9,2,26,5,10,10.00),
  (146,9,2,27,5,10,10.00);
COMMIT;

/* Data for the `user_accounts` table  (LIMIT 0,500) */

INSERT INTO `user_accounts` (`user_id`, `user_name`, `user_pword`, `user_lname`, `user_fname`, `user_mname`, `user_address`, `user_email`, `user_mobile`, `user_telephone`, `user_bdate`, `user_group_id`, `photo_path`, `file_directory`, `is_active`, `is_deleted`, `date_created`, `date_modified`, `date_deleted`, `modified_by_user`, `posted_by_user`, `deleted_by_user`, `is_online`) VALUES
  (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Diaz','Anna Karina','','Pampanga','annakarina@yahoo.com','0935-746-1234','','1970-01-01',1,'assets/img/user/593a366fa6c65.jpg','',1,0,'0000-00-00 00:00:00','2017-08-26 09:58:20',0,1,0,0,1),
  (2,'judge1','356a192b7913b04c54574d18c28d46e6395428ab','User','Judge','','','','','','2017-06-11',2,'assets/img/anonymous-icon.png','',1,0,'2017-06-11 18:20:01','2017-08-27 22:57:43',0,1,1,0,1);
COMMIT;

/* Data for the `user_group_rights` table  (LIMIT 0,500) */

INSERT INTO `user_group_rights` (`user_rights_id`, `user_group_id`, `link_code`) VALUES
  (1,1,'1-1'),
  (2,1,'1-2'),
  (6,1,'2-1'),
  (7,1,'2-2'),
  (8,1,'2-3'),
  (9,1,'2-4'),
  (10,1,'3-1'),
  (11,2,'1-2');
COMMIT;

/* Data for the `user_groups` table  (LIMIT 0,500) */

INSERT INTO `user_groups` (`user_group_id`, `user_group`, `user_group_desc`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES
  (1,'System Administrator','Can access all features.',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (2,'Event Panel','',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (3,'Admin','Admin',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;