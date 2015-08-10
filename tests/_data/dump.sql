# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.25)
<<<<<<< HEAD
# Database: chopbox_testing
# Generation Time: 2015-08-03 14:28:22 +0000
=======
<<<<<<< HEAD
# Database: test
# Generation Time: 2015-08-03 11:25:13 +0000
=======
# Database: chopbox_testing
# Generation Time: 2015-08-03 14:28:22 +0000
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table chops
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `chops`;

CREATE TABLE `chops` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_chops` (
=======
DROP TABLE IF EXISTS `chops`;

CREATE TABLE `chops` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `chops_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `chops_user_id_foreign` (`user_id`),
<<<<<<< HEAD
  CONSTRAINT `chops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
=======
<<<<<<< HEAD
  CONSTRAINT `chops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `cb_users` (`id`)
=======
  CONSTRAINT `chops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table comments
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_comments` (
=======
DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `chops_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_chops_id_foreign` (`chops_id`),
<<<<<<< HEAD
  CONSTRAINT `comments_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `chops` (`id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
=======
<<<<<<< HEAD
  CONSTRAINT `comments_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `cb_chops` (`id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `cb_users` (`id`)
=======
  CONSTRAINT `comments_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `chops` (`id`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table favourites
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `favourites`;

CREATE TABLE `favourites` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_favourites` (
=======
DROP TABLE IF EXISTS `favourites`;

CREATE TABLE `favourites` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chops_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `favourites_chops_id_foreign` (`chops_id`),
<<<<<<< HEAD
  CONSTRAINT `favourites_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `chops` (`id`) ON DELETE CASCADE
=======
<<<<<<< HEAD
  CONSTRAINT `favourites_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `cb_chops` (`id`) ON DELETE CASCADE
=======
  CONSTRAINT `favourites_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `chops` (`id`) ON DELETE CASCADE
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table follows
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `follows`;

CREATE TABLE `follows` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_follows` (
=======
DROP TABLE IF EXISTS `follows`;

CREATE TABLE `follows` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `follower_id` int(10) unsigned NOT NULL,
  `followee_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `follows_follower_id_foreign` (`follower_id`),
  KEY `follows_followee_id_foreign` (`followee_id`),
<<<<<<< HEAD
  CONSTRAINT `follows_followee_id_foreign` FOREIGN KEY (`followee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `follows_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`)
=======
<<<<<<< HEAD
  CONSTRAINT `follows_followee_id_foreign` FOREIGN KEY (`followee_id`) REFERENCES `cb_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `follows_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `cb_users` (`id`)
=======
  CONSTRAINT `follows_followee_id_foreign` FOREIGN KEY (`followee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `follows_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`)
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `migrations`;

=======
<<<<<<< HEAD
=======
DROP TABLE IF EXISTS `migrations`;

>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_password_resets` (
=======
DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table roles
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_roles` (
=======
DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table uploads
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `uploads`;

CREATE TABLE `uploads` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_uploads` (
=======
DROP TABLE IF EXISTS `uploads`;

CREATE TABLE `uploads` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chops_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `uploads_chops_id_foreign` (`chops_id`),
  KEY `uploads_user_id_foreign` (`user_id`),
<<<<<<< HEAD
  CONSTRAINT `uploads_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `chops` (`id`),
  CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
=======
<<<<<<< HEAD
  CONSTRAINT `uploads_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `cb_chops` (`id`),
  CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `cb_users` (`id`)
=======
  CONSTRAINT `uploads_chops_id_foreign` FOREIGN KEY (`chops_id`) REFERENCES `chops` (`id`),
  CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table user_roles
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_user_roles` (
=======
DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_roles_user_id_foreign` (`user_id`),
  KEY `user_roles_role_id_foreign` (`role_id`),
<<<<<<< HEAD
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
=======
<<<<<<< HEAD
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `cb_roles` (`id`),
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `cb_users` (`id`)
=======
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

<<<<<<< HEAD
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
=======
<<<<<<< HEAD
CREATE TABLE `cb_users` (
=======
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
>>>>>>> Implemented functional and unit test for login and auth
>>>>>>> master
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `best_food` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `image_uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_state` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_name_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
