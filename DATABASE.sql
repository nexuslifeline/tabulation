/* SQL Manager Lite for MySQL                              5.6.3.49012 */
/* ------------------------------------------------------------------- */
/* Host     : localhost                                                */
/* Port     : 3306                                                     */
/* Database : tabulation                                               */


DROP DATABASE IF EXISTS `tabulation`;

CREATE DATABASE `tabulation`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `tabulation`;

DROP TABLE IF EXISTS `voters_accounts`;
DROP TABLE IF EXISTS `user_groups`;
DROP TABLE IF EXISTS `user_group_rights`;
DROP TABLE IF EXISTS `user_accounts`;
DROP TABLE IF EXISTS `tabulation_submitted`;
DROP TABLE IF EXISTS `tabulation`;
DROP TABLE IF EXISTS `rights_links`;
DROP TABLE IF EXISTS `judges`;
DROP TABLE IF EXISTS `events_vote`;
DROP TABLE IF EXISTS `events_judge`;
DROP TABLE IF EXISTS `events_criteria`;
DROP TABLE IF EXISTS `events_contestant`;
DROP TABLE IF EXISTS `events`;
DROP TABLE IF EXISTS `criteria_types`;
DROP TABLE IF EXISTS `criteria`;
DROP TABLE IF EXISTS `contestants`;

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
AUTO_INCREMENT=27 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

CREATE TABLE `criteria` (
  `criteria_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `criteria` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `description` VARCHAR(755) COLLATE latin1_swedish_ci DEFAULT '',
  `is_active` TINYINT(4) DEFAULT 1,
  `criteria_type_id` INTEGER(11) DEFAULT 0,
  `is_deleted` TINYINT(4) DEFAULT 0,
  `created_by` INTEGER(11) DEFAULT 0,
  `modified_by` INTEGER(11) DEFAULT 0,
  `deleted_by` INTEGER(11) DEFAULT 0,
  `date_created` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_modified` DATETIME DEFAULT '0000-00-00 00:00:00',
  `date_deleted` DATETIME DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY USING BTREE (`criteria_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=7 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

CREATE TABLE `criteria_types` (
  `criteria_type_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `criteria_type` VARCHAR(155) COLLATE latin1_swedish_ci DEFAULT '',
  `description` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  `is_deleted` TINYINT(4) DEFAULT 0,
  `is_active` TINYINT(4) DEFAULT 1,
  PRIMARY KEY USING BTREE (`criteria_type_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=4 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

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
  `is_voting_closed` TINYINT(4) DEFAULT 0,
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
AUTO_INCREMENT=19 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

CREATE TABLE `events_contestant` (
  `event_contestant_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `contestant_id` INTEGER(11) DEFAULT 0,
  `contestant_no` VARCHAR(55) COLLATE latin1_swedish_ci DEFAULT '',
  PRIMARY KEY USING BTREE (`event_contestant_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=81 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

CREATE TABLE `events_criteria` (
  `event_criteria_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `criteria_id` INTEGER(11) DEFAULT 0,
  `percentage` DECIMAL(11,2) DEFAULT 0.00,
  `max_score` DECIMAL(11,2) DEFAULT 0.00,
  PRIMARY KEY USING BTREE (`event_criteria_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=323 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

CREATE TABLE `events_judge` (
  `event_judge_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `judge_id` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`event_judge_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=2 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

CREATE TABLE `events_vote` (
  `event_vote_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `contestant_id` INTEGER(11) DEFAULT 0,
  `voter_id` INTEGER(11) DEFAULT 0,
  `event_id` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`event_vote_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=24 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

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

CREATE TABLE `rights_links` (
  `link_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `parent_code` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `link_code` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT NULL,
  `link_name` VARCHAR(255) COLLATE latin1_swedish_ci DEFAULT '',
  PRIMARY KEY USING BTREE (`link_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=12 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

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
AUTO_INCREMENT=447 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

CREATE TABLE `tabulation_submitted` (
  `tabulation_submitted_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `event_id` INTEGER(11) DEFAULT 0,
  `contestant_id` INTEGER(11) DEFAULT 0,
  `judge_id` INTEGER(11) DEFAULT 0,
  PRIMARY KEY USING BTREE (`tabulation_submitted_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=29 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

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
AUTO_INCREMENT=4 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

CREATE TABLE `user_group_rights` (
  `user_rights_id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `user_group_id` INTEGER(11) DEFAULT 0,
  `link_code` VARCHAR(20) COLLATE latin1_swedish_ci DEFAULT '',
  PRIMARY KEY USING BTREE (`user_rights_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=14 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

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

CREATE TABLE `voters_accounts` (
  `voter_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `voter_fname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `voter_lname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `voter_mname` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `voter_username` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `voter_pword` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `voter_mobile` VARCHAR(55) COLLATE latin1_swedish_ci DEFAULT '',
  `verification_code` VARCHAR(100) COLLATE latin1_swedish_ci DEFAULT '',
  `is_verified` TINYINT(4) DEFAULT 0,
  PRIMARY KEY USING BTREE (`voter_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=31 CHARACTER SET 'latin1' COLLATE 'latin1_swedish_ci'
;

INSERT INTO `criteria_types` (`criteria_type_id`, `criteria_type`, `description`, `is_deleted`, `is_active`) VALUES
  (1,'Voting','Pre-configure criteria for Voting System',0,1),
  (2,'Pageant','Pre-configure criteria for Pageant System',0,1),
  (3,'Others','Others',0,1);
COMMIT;

INSERT INTO `rights_links` (`link_id`, `parent_code`, `link_code`, `link_name`) VALUES
  (1,'1','1-1','Register Candidate'),
  (2,'1','1-2','Tabulation System'),
  (6,'2','2-1','Manage User Account'),
  (7,'2','2-2','Manage User Group'),
  (8,'2','2-3','Manage Events'),
  (9,'2','2-4','Setup Criteria'),
  (10,'3','3-1','Print Ranking'),
  (11,'2','2-5','Type of Criteria');
COMMIT;

INSERT INTO `user_accounts` (`user_id`, `user_name`, `user_pword`, `user_lname`, `user_fname`, `user_mname`, `user_address`, `user_email`, `user_mobile`, `user_telephone`, `user_bdate`, `user_group_id`, `photo_path`, `file_directory`, `is_active`, `is_deleted`, `date_created`, `date_modified`, `date_deleted`, `modified_by_user`, `posted_by_user`, `deleted_by_user`, `is_online`) VALUES
  (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','Diaz','Anna Karina','','Pampanga','annakarina@yahoo.com','0935-746-1234','','1970-01-01',1,'assets/img/user/593a366fa6c65.jpg','',1,0,'0000-00-00 00:00:00','2017-08-26 09:58:20',0,1,0,0,1),
  (2,'judge1','356a192b7913b04c54574d18c28d46e6395428ab','User','Judge','','','','','','2017-06-11',2,'assets/img/anonymous-icon.png','',1,0,'2017-06-11 18:20:01','2017-08-27 22:57:43',0,1,1,0,1),
  (3,'joy','356a192b7913b04c54574d18c28d46e6395428ab','Santos','Joy','','','','','','2017-08-29',2,'assets/img/anonymous-icon.png','',1,0,'2017-08-29 12:49:51','2017-09-02 20:42:41',0,1,1,0,1);
COMMIT;

INSERT INTO `user_group_rights` (`user_rights_id`, `user_group_id`, `link_code`) VALUES
  (1,1,'1-1'),
  (2,1,'1-2'),
  (6,1,'2-1'),
  (7,1,'2-2'),
  (8,1,'2-3'),
  (9,1,'2-4'),
  (10,1,'3-1'),
  (11,1,'2-5'),
  (12,2,'1-2'),
  (13,2,'3-1');
COMMIT;

INSERT INTO `user_groups` (`user_group_id`, `user_group`, `user_group_desc`, `is_active`, `is_deleted`, `date_created`, `date_modified`) VALUES
  (1,'Organizer','Can access all features. Acts as the System Administrator of the system.',1,0,'0000-00-00 00:00:00','2018-01-18 21:30:08'),
  (2,'Judge','',1,0,'0000-00-00 00:00:00','2018-01-18 21:30:08'),
  (3,'Admin','Admin',1,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
COMMIT;

