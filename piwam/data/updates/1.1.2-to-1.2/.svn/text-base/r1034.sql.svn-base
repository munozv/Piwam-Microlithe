

CREATE TABLE IF NOT EXISTS `piwam_member_extra_row` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `association_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `association_id_idx` (`association_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `piwam_member_extra_value`
--

CREATE TABLE IF NOT EXISTS `piwam_member_extra_value` (
  `row_id` int(11) NOT NULL DEFAULT '0',
  `member_id` int(11) NOT NULL DEFAULT '0',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`row_id`,`member_id`),
  KEY `piwam_member_extra_value_member_id_piwam_member_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `piwam_member_extra_row`
--
ALTER TABLE `piwam_member_extra_row`
  ADD CONSTRAINT `piwam_member_extra_row_association_id_piwam_association_id` FOREIGN KEY (`association_id`) REFERENCES `piwam_association` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `piwam_member_extra_value`
--
ALTER TABLE `piwam_member_extra_value`
  ADD CONSTRAINT `piwam_member_extra_value_member_id_piwam_member_id` FOREIGN KEY (`member_id`) REFERENCES `piwam_member` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `piwam_member_extra_value_row_id_piwam_member_extra_row_id` FOREIGN KEY (`row_id`) REFERENCES `piwam_member_extra_row` (`id`) ON DELETE CASCADE;