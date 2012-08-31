
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- snapshot
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `snapshot`;

CREATE TABLE `snapshot`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `order_nr` int(11) unsigned NOT NULL,
    `display_name` VARCHAR(255) NOT NULL,
    `visible` tinyint(1) unsigned DEFAULT 1 NOT NULL,
    `restricted` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `organization_id` int(11) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `snapshot_organization_id_fk` (`organization_id`),
    CONSTRAINT `snapshot_organization_id_fk`
        FOREIGN KEY (`organization_id`)
        REFERENCES `organization` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- action
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `action`;

CREATE TABLE `action`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `action_type_id` int(11) unsigned NOT NULL,
    `non_conformance_id` int(11) unsigned,
    `action_left` int(11) unsigned,
    `action_right` int(11) unsigned,
    `action_level` int(11) unsigned,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `check_due` DATE NOT NULL,
    `checked_at` DATE,
    `result` int(11) unsigned,
    `result_description` TEXT,
    PRIMARY KEY (`id`),
    INDEX `action_snapshot_id_fk` (`snapshot_id`),
    INDEX `action_non_conformance_id_fk` (`non_conformance_id`),
    INDEX `action_action_type_id` (`action_type_id`),
    CONSTRAINT `action_action_type_id`
        FOREIGN KEY (`action_type_id`)
        REFERENCES `action_type` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `action_non_conformance_id_fk`
        FOREIGN KEY (`non_conformance_id`)
        REFERENCES `non_conformance` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `action_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- action_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `action_type`;

CREATE TABLE `action_type`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `code` VARCHAR(45),
    `category_left` int(11) unsigned,
    `category_right` int(11) unsigned,
    `category_level` int(11) unsigned,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`),
    INDEX `category_snapshot_id_fk` (`snapshot_id`),
    CONSTRAINT `category_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- completed_event
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `completed_event`;

CREATE TABLE `completed_event`
(
    `event_id` int(11) unsigned NOT NULL,
    `person_id` int(11) unsigned NOT NULL,
    `completed_date` DATE NOT NULL,
    PRIMARY KEY (`event_id`,`person_id`),
    INDEX `completed_event_event_id_fk` (`event_id`),
    INDEX `completed_event_person_id_fk` (`person_id`),
    INDEX `completed_event_I_3` (`person_id`),
    CONSTRAINT `completed_event_event_id_fk`
        FOREIGN KEY (`event_id`)
        REFERENCES `event` (`id`)
        ON UPDATE CASCADE,
    CONSTRAINT `completed_event_person_id_fk`
        FOREIGN KEY (`person_id`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- configuration
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `configuration`;

CREATE TABLE `configuration`
(
    `id` VARCHAR(255) NOT NULL,
    `organization_id` int(11) unsigned,
    `snapshot_id` int(11) unsigned,
    `content_type` int(11) unsigned NOT NULL,
    `content_subtype` int(11) unsigned,
    `order_nr` int(11) unsigned NOT NULL,
    `section_group` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `content` TEXT,
    `is_organization_preference` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `is_snapshot_preference` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `configuration_organization_id_fk` (`organization_id`),
    INDEX `configuration_snapshot_id_fk` (`snapshot_id`),
    CONSTRAINT `configuration_organization_id_fk`
        FOREIGN KEY (`organization_id`)
        REFERENCES `organization` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `configuration_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- folder_delivery
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `folder_delivery`;

CREATE TABLE `folder_delivery`
(
    `folder_id` int(11) unsigned NOT NULL,
    `delivery_id` int(11) unsigned NOT NULL,
    `order_nr` int(11) unsigned NOT NULL,
    PRIMARY KEY (`folder_id`,`delivery_id`),
    INDEX `folder_delivery_folder_id_fk` (`folder_id`),
    INDEX `folder_delivery_delivery_id_fk` (`delivery_id`),
    INDEX `folder_delivery_I_3` (`delivery_id`),
    CONSTRAINT `folder_delivery_folder_id_fk`
        FOREIGN KEY (`folder_id`)
        REFERENCES `folder` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `folder_delivery_delivery_id_fk`
        FOREIGN KEY (`delivery_id`)
        REFERENCES `delivery` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- delivery
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `delivery`;

CREATE TABLE `delivery`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `profile_id` int(11) unsigned,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `creation_date` DATETIME NOT NULL,
    `current_revision_id` int(11) unsigned,
    `public_token` VARCHAR(45),
    PRIMARY KEY (`id`),
    INDEX `delivery_snapshot_id_fk` (`snapshot_id`),
    INDEX `delivery_current_revision_id_fk` (`current_revision_id`),
    INDEX `delivery_profile_id_fk` (`profile_id`),
    CONSTRAINT `delivery_profile_id_fk`
        FOREIGN KEY (`profile_id`)
        REFERENCES `profile` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `delivery_current_revision_id_fk`
        FOREIGN KEY (`current_revision_id`)
        REFERENCES `revision` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `delivery_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- document
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `revision_id` int(11) unsigned NOT NULL,
    `download_filename` VARCHAR(255) NOT NULL,
    `extension_id` VARCHAR(45),
    `download_path` TEXT NOT NULL,
    `download_filesize` int(11) unsigned,
    `binary_data` LONGBLOB,
    PRIMARY KEY (`id`),
    INDEX `document_revision_id_fk` (`revision_id`),
    INDEX `document_extension_fk` (`extension_id`),
    CONSTRAINT `document_extension_fk`
        FOREIGN KEY (`extension_id`)
        REFERENCES `file_extension` (`id`),
    CONSTRAINT `document_revision_id_fk`
        FOREIGN KEY (`revision_id`)
        REFERENCES `revision` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- organization
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `organization`;

CREATE TABLE `organization`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `display_name` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- event
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `from_week` int(11) unsigned NOT NULL,
    `duration` int(11) unsigned NOT NULL,
    `is_automatic` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `is_manual` tinyint(1) unsigned DEFAULT 1 NOT NULL,
    `is_visible` tinyint(1) unsigned DEFAULT 1 NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `event_snapshot_id_fk` (`snapshot_id`),
    CONSTRAINT `event_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- event_delivery
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `event_delivery`;

CREATE TABLE `event_delivery`
(
    `event_id` int(11) unsigned NOT NULL,
    `delivery_id` int(11) unsigned NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`event_id`,`delivery_id`),
    INDEX `event_delivery_event_id_fk` (`event_id`),
    INDEX `event_delivery_delivery_id_fk` (`delivery_id`),
    INDEX `event_delivery_I_3` (`delivery_id`),
    CONSTRAINT `event_delivery_delivery_id_fk`
        FOREIGN KEY (`delivery_id`)
        REFERENCES `delivery` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `event_delivery_event_id_fk`
        FOREIGN KEY (`event_id`)
        REFERENCES `event` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- event_folder
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `event_folder`;

CREATE TABLE `event_folder`
(
    `event_id` int(11) unsigned NOT NULL,
    `folder_id` int(11) unsigned NOT NULL,
    `description` TEXT,
    `is_mandatory` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    PRIMARY KEY (`event_id`,`folder_id`),
    INDEX `event_folder_event_id_fk` (`event_id`),
    INDEX `event_folder_folder_id_fk` (`folder_id`),
    INDEX `event_folder_I_3` (`folder_id`),
    CONSTRAINT `event_folder_event_id_fk`
        FOREIGN KEY (`event_id`)
        REFERENCES `event` (`id`)
        ON UPDATE CASCADE,
    CONSTRAINT `event_folder_folder_id_fk`
        FOREIGN KEY (`folder_id`)
        REFERENCES `folder` (`id`)
        ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- activity
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `activity`;

CREATE TABLE `activity`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`),
    INDEX `activity_snapshot_id_fk` (`snapshot_id`),
    CONSTRAINT `activity_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- activity_event
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `activity_event`;

CREATE TABLE `activity_event`
(
    `activity_id` int(11) unsigned NOT NULL,
    `event_id` int(11) unsigned NOT NULL,
    `order_nr` int(11) unsigned NOT NULL,
    PRIMARY KEY (`activity_id`,`event_id`),
    INDEX `activity_event_event_id_fk` (`event_id`),
    INDEX `activity_event_activity_id_fk` (`activity_id`),
    INDEX `activity_event_I_3` (`event_id`),
    CONSTRAINT `activity_event_activity_id_fk`
        FOREIGN KEY (`activity_id`)
        REFERENCES `activity` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `activity_event_event_id_fk`
        FOREIGN KEY (`event_id`)
        REFERENCES `event` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- activity_profile_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `activity_profile_group`;

CREATE TABLE `activity_profile_group`
(
    `activity_id` int(11) unsigned NOT NULL,
    `profile_group_id` int(11) unsigned NOT NULL,
    PRIMARY KEY (`activity_id`,`profile_group_id`),
    INDEX `activity_profile_group_event_id_fk` (`activity_id`),
    INDEX `activity_profile_group_profile_group_id_fk` (`profile_group_id`),
    INDEX `activity_profile_group_I_3` (`profile_group_id`),
    CONSTRAINT `activity_profile_group_activity_id_fk`
        FOREIGN KEY (`activity_id`)
        REFERENCES `activity` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `activity_profile_group_event_id_fk`
        FOREIGN KEY (`profile_group_id`)
        REFERENCES `profile_group` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- file_extension
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `file_extension`;

CREATE TABLE `file_extension`
(
    `id` VARCHAR(45) NOT NULL,
    `mime` VARCHAR(255) NOT NULL,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `icon` VARCHAR(255) NOT NULL,
    `convertible` TINYINT(1) DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- category_folder
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category_folder`;

CREATE TABLE `category_folder`
(
    `category_id` int(11) unsigned NOT NULL,
    `folder_id` int(11) unsigned NOT NULL,
    `order_nr` int(11) unsigned NOT NULL,
    PRIMARY KEY (`category_id`,`folder_id`),
    INDEX `category_folder_category_id_fk` (`category_id`),
    INDEX `category_folder_folder_id_fk` (`folder_id`),
    INDEX `category_folder_I_3` (`folder_id`),
    CONSTRAINT `category_folder_category_id_fk`
        FOREIGN KEY (`category_id`)
        REFERENCES `category` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `category_folder_folder_id_fk`
        FOREIGN KEY (`folder_id`)
        REFERENCES `folder` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- folder
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `folder`;

CREATE TABLE `folder`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `category_id` int(11) unsigned NOT NULL,
    `order_nr` int(11) unsigned NOT NULL,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `is_divided` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `is_private` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `filter` VARCHAR(255),
    `filter_description` TEXT,
    `mandatory_review` tinyint(1) unsigned NOT NULL,
    `mandatory_approval` tinyint(1) unsigned NOT NULL,
    `review_notes` TEXT,
    `approval_notes` TEXT,
    `show_revision_nr` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `autoclean` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `max_uploads` int(11) unsigned DEFAULT 0 NOT NULL,
    `public_token` VARCHAR(45),
    PRIMARY KEY (`id`),
    INDEX `folder_snapshot_id_fk` (`snapshot_id`),
    CONSTRAINT `folder_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- non_conformance
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `non_conformance`;

CREATE TABLE `non_conformance`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `non_conformance_type_id` int(11) unsigned NOT NULL,
    `non_conformity_type_detail` VARCHAR(255),
    `description` TEXT,
    `opened_at` DATE NOT NULL,
    `opened_by` int(11) unsigned NOT NULL,
    `closed_at` DATE,
    `closed_by` int(11) unsigned,
    `close_comment` TEXT,
    PRIMARY KEY (`id`),
    INDEX `non_conformance_snapshot_id_fk` (`snapshot_id`),
    INDEX `non_conformance_opened_by_fk` (`opened_by`),
    INDEX `non_conformance_closed_by_fk` (`closed_by`),
    INDEX `non_conformance_type_fk` (`non_conformance_type_id`),
    CONSTRAINT `non_conformance_closed_by_fk`
        FOREIGN KEY (`closed_by`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `non_conformance_opened_by_fk`
        FOREIGN KEY (`opened_by`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `non_conformance_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `non_conformance_type_fk`
        FOREIGN KEY (`non_conformance_type_id`)
        REFERENCES `non_conformance_type` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- non_conformance_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `non_conformance_type`;

CREATE TABLE `non_conformance_type`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- person
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `person`;

CREATE TABLE `person`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(50) NOT NULL,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `password` VARCHAR(41),
    `gender` int(11) unsigned DEFAULT 0 NOT NULL,
    `email` VARCHAR(255),
    `email_enabled` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `is_global_administrator` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `token` VARCHAR(45),
    `token_expiration` DATETIME,
    `token_operation` int(11) unsigned,
    `token_data` VARCHAR(255),
    `bad_password_count` int(11) unsigned DEFAULT 0 NOT NULL,
    `blocked_access` DATETIME,
    `last_login` DATETIME,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- person_organization
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `person_organization`;

CREATE TABLE `person_organization`
(
    `person_id` int(11) unsigned NOT NULL,
    `organization_id` int(11) unsigned NOT NULL,
    `is_active` tinyint(1) unsigned DEFAULT 1 NOT NULL,
    `is_local_administrator` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    PRIMARY KEY (`person_id`,`organization_id`),
    INDEX `person_organization_person_id_fk` (`person_id`),
    INDEX `person_organization_organization_id_fk` (`organization_id`),
    INDEX `person_organization_I_3` (`organization_id`),
    CONSTRAINT `person_organization_organization_id_fk`
        FOREIGN KEY (`organization_id`)
        REFERENCES `organization` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `person_organization_person_id_fk`
        FOREIGN KEY (`person_id`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- person_preferences
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `person_preferences`;

CREATE TABLE `person_preferences`
(
    `person_id` int(11) unsigned NOT NULL,
    `preference` VARCHAR(255) NOT NULL,
    `value` VARCHAR(255),
    PRIMARY KEY (`person_id`,`preference`),
    INDEX `person_preferences_person_id_fk` (`person_id`),
    CONSTRAINT `person_preferences_person_id_fk`
        FOREIGN KEY (`person_id`)
        REFERENCES `person` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- person_profile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `person_profile`;

CREATE TABLE `person_profile`
(
    `person_id` int(11) unsigned NOT NULL,
    `profile_id` int(11) unsigned NOT NULL,
    PRIMARY KEY (`person_id`,`profile_id`),
    INDEX `person_profile_person_fk` (`person_id`),
    INDEX `person_profile_profile_fk` (`profile_id`),
    INDEX `person_profile_I_3` (`profile_id`),
    CONSTRAINT `person_profile_profile_fk`
        FOREIGN KEY (`profile_id`)
        REFERENCES `profile` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `person_profile_person_fk`
        FOREIGN KEY (`person_id`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- profile
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `profile_group_id` int(11) unsigned NOT NULL,
    `order_nr` int(11) unsigned NOT NULL,
    `display_name` VARCHAR(255) DEFAULT '' NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`),
    INDEX `profile_profile_group_id_fk` (`profile_group_id`),
    CONSTRAINT `profile_profile_group_id_fk`
        FOREIGN KEY (`profile_group_id`)
        REFERENCES `profile_group` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- profile_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `profile_group`;

CREATE TABLE `profile_group`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `display_name_male` VARCHAR(255) NOT NULL,
    `display_name_female` VARCHAR(255) NOT NULL,
    `display_name_neutral` VARCHAR(255) NOT NULL,
    `abbreviation` VARCHAR(5),
    `is_manager` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    `description` TEXT,
    PRIMARY KEY (`id`),
    INDEX `snapshot_profile_group_fk` (`snapshot_id`),
    CONSTRAINT `snapshot_profile_group_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- revision
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `revision`;

CREATE TABLE `revision`
(
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `delivery_id` int(11) unsigned NOT NULL,
    `order_nr` int(11) unsigned NOT NULL,
    `revision_nr` int(11) unsigned,
    `uploader_person_id` int(11) unsigned NOT NULL,
    `reviewer_person_id` int(11) unsigned,
    `approver_person_id` int(11) unsigned,
    `upload_date` DATETIME NOT NULL,
    `review_date` DATETIME,
    `approval_date` DATETIME,
    `upload_comment` TEXT NOT NULL,
    `review_comment` TEXT,
    `approval_comment` TEXT,
    `original_document` int(11) unsigned,
    `autogenerated_date` DATETIME,
    `template` int(11) unsigned,
    `template_instance` int(11) unsigned,
    PRIMARY KEY (`id`),
    INDEX `revision_delivery_id_fk` (`delivery_id`),
    INDEX `revision_uploader_person_id_fk` (`uploader_person_id`),
    INDEX `revision_reviewer_person_id_fk` (`reviewer_person_id`),
    INDEX `revision_approver_person_id_fk` (`approver_person_id`),
    CONSTRAINT `revision_approver_person_id_fk`
        FOREIGN KEY (`approver_person_id`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `revision_delivery_id_fk`
        FOREIGN KEY (`delivery_id`)
        REFERENCES `delivery` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `revision_reviewer_person_id_fk`
        FOREIGN KEY (`reviewer_person_id`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `revision_uploader_person_id_fk`
        FOREIGN KEY (`uploader_person_id`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- grouping
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `grouping`;

CREATE TABLE `grouping`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `snapshot_id` int(11) unsigned NOT NULL,
    `order_nr` int(11) unsigned NOT NULL,
    `display_name` VARCHAR(255) NOT NULL,
    `description` TEXT,
    `guest_access` tinyint(1) unsigned DEFAULT 0 NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `grouping_snapshot_id_fk` (`snapshot_id`),
    CONSTRAINT `grouping_snapshot_id_fk`
        FOREIGN KEY (`snapshot_id`)
        REFERENCES `snapshot` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- grouping_folder
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `grouping_folder`;

CREATE TABLE `grouping_folder`
(
    `grouping_id` int(11) unsigned NOT NULL,
    `folder_id` int(11) unsigned NOT NULL,
    `order_nr` int(11) unsigned DEFAULT 0 NOT NULL,
    `alt_display_name` VARCHAR(255),
    PRIMARY KEY (`grouping_id`,`folder_id`),
    INDEX `activity_folder_grouping_id_fk` (`grouping_id`),
    INDEX `activity_folder_folder_id_fk` (`folder_id`),
    INDEX `grouping_folder_I_3` (`folder_id`),
    CONSTRAINT `activity_folder_folder_id_fk`
        FOREIGN KEY (`folder_id`)
        REFERENCES `folder` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `activity_folder_grouping_id_fk`
        FOREIGN KEY (`grouping_id`)
        REFERENCES `grouping` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- grouping_profile_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `grouping_profile_group`;

CREATE TABLE `grouping_profile_group`
(
    `grouping_id` int(11) unsigned NOT NULL,
    `profile_group_id` int(11) unsigned NOT NULL,
    PRIMARY KEY (`grouping_id`,`profile_group_id`),
    INDEX `grouping_profile_group_grouping_id` (`grouping_id`),
    INDEX `grouping_profile_group_profile_group_id` (`profile_group_id`),
    INDEX `grouping_profile_group_I_3` (`profile_group_id`),
    CONSTRAINT `grouping_profile_group_profile_group_id_fk`
        FOREIGN KEY (`profile_group_id`)
        REFERENCES `profile_group` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `grouping_profile_group_grouping_id_fk`
        FOREIGN KEY (`grouping_id`)
        REFERENCES `grouping` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- event_profile_group
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `event_profile_group`;

CREATE TABLE `event_profile_group`
(
    `event_id` int(11) unsigned NOT NULL,
    `profile_group_id` int(11) unsigned NOT NULL,
    PRIMARY KEY (`event_id`,`profile_group_id`),
    INDEX `event_profile_group_event_id` (`event_id`),
    INDEX `event_profile_group_profile_group_id` (`profile_group_id`),
    INDEX `event_profile_group_I_3` (`profile_group_id`),
    CONSTRAINT `event_profile_group_profile_group_id_fk`
        FOREIGN KEY (`profile_group_id`)
        REFERENCES `profile_group` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `event_profile_group_event_id_fk`
        FOREIGN KEY (`event_id`)
        REFERENCES `event` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- folder_permission
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `folder_permission`;

CREATE TABLE `folder_permission`
(
    `folder_id` int(11) unsigned NOT NULL,
    `profile_group_id` int(11) unsigned NOT NULL,
    `permission` TINYINT NOT NULL,
    PRIMARY KEY (`folder_id`,`profile_group_id`,`permission`),
    INDEX `folder_permission_folder_id` (`folder_id`),
    INDEX `folder_permission_group_id` (`profile_group_id`),
    INDEX `folder_permission_permission` (`permission`),
    CONSTRAINT `folder_permission_profile_group_id_fk`
        FOREIGN KEY (`profile_group_id`)
        REFERENCES `profile_group` (`id`)
        ON DELETE CASCADE,
    CONSTRAINT `folder_permission_folder_id_fk`
        FOREIGN KEY (`folder_id`)
        REFERENCES `folder` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- session
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `session`;

CREATE TABLE `session`
(
    `id` VARCHAR(64) NOT NULL,
    `person_id` int(11) unsigned NOT NULL,
    `organization_id` int(11) unsigned NOT NULL,
    `expiration` DATETIME NOT NULL,
    PRIMARY KEY (`id`,`person_id`),
    INDEX `session_person_fk` (`person_id`),
    INDEX `session_organization_id_fk` (`organization_id`),
    CONSTRAINT `session_person_fk`
        FOREIGN KEY (`person_id`)
        REFERENCES `person` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `session_organization_id_fk`
        FOREIGN KEY (`organization_id`)
        REFERENCES `organization` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- log
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log`
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `ip` VARCHAR(32),
    `when` DATETIME NOT NULL,
    `person_id` int(11) unsigned,
    `organization_id` int(11) unsigned,
    `category_id` int(11) unsigned,
    `grouping_id` int(11) unsigned,
    `activity_id` int(11) unsigned,
    `event_id` int(11) unsigned,
    `folder_id` int(11) unsigned,
    `delivery_id` int(11) unsigned,
    `revision_id` int(11) unsigned,
    `document_id` int(11) unsigned,
    `kind` VARCHAR(255),
    `detail` VARCHAR(255),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
