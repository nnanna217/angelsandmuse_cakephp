/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  HP
 * Created: Mar 7, 2018
 */

CREATE DATABASE angelsandmuse;

use angelsan_angmuse;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event  VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    event_desc TEXT NOT NULL,
    featured_img VARCHAR(255) NOT NULL,
    created_by int NOT NULL,
    created DATETIME,
    modified DATETIME
);

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` DOUBLE(4,2) NOT NULL DEFAULT '0.00',
  `slug` VARCHAR(6) COLLATE utf8_unicode_ci NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `coupons_used` */

DROP TABLE IF EXISTS `coupons_used`;

CREATE TABLE `coupons_used` (
  `id` INT(10)  NOT NULL AUTO_INCREMENT,
  `user_id` INT(10)  NOT NULL,
  `coupon_id` INT(10) NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `updated` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coupons_used_user_id_foreign` (`user_id`),
  KEY `coupons_used_coupon_id_foreign` (`coupon_id`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO users (email, password, created, modified) VALUES ('info@angelsandmuse.com', 'sekret', NOW(), NOW());

ALTER TABLE angelsan_angmuse.events
ADD registration_label VARCHAR(255) NULL DEFAULT NULL;

ALTER TABLE angelsan_angmuse.events
ADD registration_link VARCHAR(255) NULL DEFAULT NULL;

ALTER TABLE angelsan_angmuse.events
ADD gallery_label VARCHAR(255) NULL DEFAULT NULL;

ALTER TABLE angelsan_angmuse.events
ADD gallery_link VARCHAR(255) NULL DEFAULT NULL;

ALTER TABLE angelsan_angmuse.events
ADD last_edited_by INT NULL DEFAULT NULL;

ALTER TABLE angelsan_angmuse.coupons
ADD `end` DATE NULL,
ADD `start` DATE NULL;

ALTER TABLE angelsan_angmuse.coupons_used
DROP COLUMN `user_id`,
ADD `email` VARCHAR(255);

ALTER TABLE `angelsandmuse`.`coupons` CHANGE `slug` `slug` VARCHAR(12) CHARSET utf8 COLLATE utf8_unicode_ci NOT NULL; 