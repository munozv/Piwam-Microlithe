CREATE TABLE IF NOT EXISTS `piwampg_debt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `income_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id_idx` (`member_id`),
  KEY `income_id_idx` (`income_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `piwampg_debt`
  ADD CONSTRAINT `piwampg_debt_income_id_piwam_income_id` FOREIGN KEY (`income_id`) REFERENCES `piwam_income` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `piwampg_debt_member_id_piwam_member_id` FOREIGN KEY (`member_id`) REFERENCES `piwam_member` (`id`) ON DELETE CASCADE;