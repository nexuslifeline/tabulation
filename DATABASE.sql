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
AUTO_INCREMENT=8 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=3 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
  `is_open` TINYINT(4) DEFAULT 0,
  `is_deleted` TINYINT(4) DEFAULT 0,
  `created_by` INTEGER(11) DEFAULT 0,
  `modified_by` INTEGER(11) DEFAULT 0,
  `deleted_by` INTEGER(11) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_deleted` DATETIME DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY USING BTREE (`event_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=9 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `events_contestant` table : */

CREATE TABLE `events_contestant` (
  `event_contestant_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `contestant_id` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`event_contestant_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=16 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=39 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `events_judge` table : */

CREATE TABLE `events_judge` (
  `event_judge_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `judge_id` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`event_judge_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=2 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=10 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

/* Structure for the `tabulation` table : */

CREATE TABLE `tabulation` (
  `tabulation_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `judge_id` INTEGER(11) DEFAULT 0,
  `criteria_id` INTEGER(11) DEFAULT 0,
  `contestant_id` INTEGER(11) DEFAULT 0,
  `score` DECIMAL(10,0) DEFAULT 0,
  `is_finalized` TINYINT(4) DEFAULT 0,
  PRIMARY KEY USING BTREE (`tabulation_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=65 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
AUTO_INCREMENT=11 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
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
  (6,'C201706116','xx','xx1','','2017-06-11','','','','','','','xx','','','','',NULL,'assets/img/contestants/593bb98c779b2.jpg','',1,0,1,'2017-06-11 17:56:48',1,'2017-06-11 17:56:52',0,'0000-00-00 00:00:00'),
  (7,'C201707157','','cccc2','ccc','2017-07-15','','','','','','','ccccc','','','','',NULL,'assets/img/default-user-image.png','',1,0,1,'2017-07-15 21:59:37',1,'2017-07-15 21:59:43',0,'0000-00-00 00:00:00');
COMMIT;

/* Data for the `criteria` table  (LIMIT 0,500) */

INSERT INTO `criteria` (`criteria_id`, `criteria`, `description`, `is_active`, `is_deleted`, `created_by`, `modified_by`, `deleted_by`, `date_created`, `date_modified`, `date_deleted`) VALUES
  (1,'Vote','This criteria automatically computes the percentage from the Voting system.',1,0,1,1,1,'2017-06-17 12:50:53','2017-06-17 12:51:37','2017-06-17 12:51:44'),
  (2,'Voting1','',1,0,1,1,0,'2017-06-17 20:41:33','2017-06-18 20:13:09','0000-00-00 00:00:00');
COMMIT;

/* Data for the `events` table  (LIMIT 0,500) */

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `site`, `address`, `contact_person`, `date_schedule`, `remarks`, `is_active`, `is_open`, `is_deleted`, `created_by`, `modified_by`, `deleted_by`, `date_created`, `date_modified`, `date_deleted`) VALUES
  (4,'event 1','site',NULL,'address','person','2017-06-27','remarks',1,1,0,1,1,0,'2017-06-11 16:03:05','2017-06-11 18:00:24','0000-00-00 00:00:00'),
  (5,NULL,NULL,NULL,NULL,NULL,'1970-01-01',NULL,1,0,1,1,0,1,'2017-06-17 16:28:41','0000-00-00 00:00:00','2017-06-17 20:49:46'),
  (6,'x','x',NULL,'','','2017-07-15','',1,0,0,1,0,0,'2017-07-15 15:32:34','0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (7,'c2','c',NULL,'','','2017-07-15','',1,0,0,1,1,0,'2017-07-15 15:33:12','2017-07-15 15:39:10','0000-00-00 00:00:00'),
  (8,'ddd1','dd',NULL,'','','2017-07-15','',1,0,0,1,1,0,'2017-07-15 15:39:01','2017-07-15 15:39:06','0000-00-00 00:00:00');
COMMIT;

/* Data for the `events_contestant` table  (LIMIT 0,500) */

INSERT INTO `events_contestant` (`event_contestant_id`, `event_id`, `contestant_id`) VALUES
  (6,4,5),
  (9,8,4),
  (10,8,5),
  (11,8,6),
  (13,4,4),
  (14,6,7),
  (15,6,4);
COMMIT;

/* Data for the `events_criteria` table  (LIMIT 0,500) */

INSERT INTO `events_criteria` (`event_criteria_id`, `event_id`, `criteria_id`, `percentage`, `max_score`) VALUES
  (33,4,2,0.00,100.00),
  (38,6,2,100.00,100.00);
COMMIT;

/* Data for the `events_judge` table  (LIMIT 0,500) */

INSERT INTO `events_judge` (`event_judge_id`, `event_id`, `judge_id`) VALUES
  (1,4,1);
COMMIT;

/* Data for the `rights_links` table  (LIMIT 0,500) */

INSERT INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`) VALUES
  (1,'1','1-1','Register Candidate'),
  (2,'1','1-2','Tabulation System'),
  (6,'2','2-1','Manage User Account'),
  (7,'2','2-2','Manage User Group'),
  (8,'2','2-3','Manage Events'),
  (9,'2','2-4','Setup Criteria');
COMMIT;

/* Data for the `tabulation` table  (LIMIT 0,500) */

INSERT INTO `tabulation` (`tabulation_id`, `event_id`, `judge_id`, `criteria_id`, `contestant_id`, `score`, `is_finalized`) VALUES
  (36,4,1,2,6,12,0),
  (40,4,1,1,6,90,0),
  (54,4,1,1,5,0,0),
  (56,6,1,2,4,12,0),
  (58,4,1,2,4,89,0),
  (62,4,1,2,5,95,0),
  (64,4,2,2,5,95,0);
COMMIT;

/* Data for the `user_accounts` table  (LIMIT 0,500) */

INSERT INTO `user_accounts` (`user_id`, `user_name`, `user_pword`, `user_lname`, `user_fname`, `user_mname`, `user_address`, `user_email`, `user_mobile`, `user_telephone`, `user_bdate`, `user_group_id`, `photo_path`, `file_directory`, `is_active`, `is_deleted`, `date_created`, `date_modified`, `date_deleted`, `modified_by_user`, `posted_by_user`, `deleted_by_user`, `is_online`) VALUES
  (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Diaz','Anna Karina','','Pampanga','annakarina@yahoo.com','0935-746-1234','','1970-01-01',1,'assets/img/user/593a366fa6c65.jpg','',1,0,'0000-00-00 00:00:00','2017-07-25 16:40:44',0,1,0,0,1),
  (2,'manny','356a192b7913b04c54574d18c28d46e6395428ab','Pacquiao','Manny','','','','','','2017-06-11',2,'assets/img/anonymous-icon.png','',1,0,'2017-06-11 18:20:01','2017-07-25 16:40:22',0,1,1,0,0);
COMMIT;

/* Data for the `user_group_rights` table  (LIMIT 0,500) */

INSERT INTO `user_group_rights` (`user_rights_id`, `user_group_id`, `link_code`) VALUES
  (1,1,'1-1'),
  (2,1,'1-2'),
  (6,1,'2-1'),
  (7,1,'2-2'),
  (8,1,'2-3'),
  (9,1,'2-4'),
  (10,2,'1-2');
COMMIT;

/* Data for the `user_groups` table  (LIMIT 0,500) */

INSERT INTO `user_groups` (`user_group_id`, `user_group`, `user_group_desc`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES
  (1,'System Administrator','Can access all features.',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
  (2,'Event Panel','',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;