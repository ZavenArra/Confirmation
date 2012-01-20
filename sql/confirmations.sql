CREATE TABLE `confirmations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `confirmation_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(100) CHARACTER SET latin1 NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 NOT NULL,
  `arguments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeouthours` int(11) NOT NULL DEFAULT '5',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`confirmation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
