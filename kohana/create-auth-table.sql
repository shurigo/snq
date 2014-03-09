CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `name`, `description`) VALUES(1, 'login', 'Login privileges, granted after account confirmation');
INSERT INTO `roles` (`id`, `name`, `description`) VALUES(2, 'admin', 'Administrative user, has access to everything.');

CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(127) NOT NULL,
  `password` varchar(64) NOT NULL,
  `first_name` varchar(127) NOT NULL,
  `last_name` varchar(127) NOT NULL,
  `patronymic` varchar(127) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(14) NOT NULL,
  `subscribe_sms` int(100) NOT NULL,
  `subscribe_email` int(1) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `card_no` int(12) NOT NULL,
  `discount` int(11) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `city` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL,
  `activation_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_email` (`email`),
  KEY `email` (`email`),
  KEY `card_no` (`card_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created` int(10) UNSIGNED NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

