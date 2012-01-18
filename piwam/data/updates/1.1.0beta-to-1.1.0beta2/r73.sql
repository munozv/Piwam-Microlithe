-- Tables permettant la configuration


CREATE TABLE IF NOT EXISTS `config_categorie` (
  `code` varchar(25) collate utf8_bin NOT NULL,
  `libelle` varchar(255) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


INSERT INTO `config_categorie` (`code`, `libelle`) VALUES
('affichage', 'Affichage'),
('mailing', 'Mailing');


CREATE TABLE IF NOT EXISTS `config_value` (
  `config_variable_id` int(11) NOT NULL,
  `association_id` int(11) NOT NULL,
  `custom_value` varchar(255) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`config_variable_id`,`association_id`),
  KEY `config_value_FI_2` (`association_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE IF NOT EXISTS `config_variable` (
  `id` int(11) NOT NULL auto_increment,
  `code` varchar(25) collate utf8_bin NOT NULL,
  `categorie_code` varchar(25) collate utf8_bin NOT NULL,
  `libelle` varchar(255) collate utf8_bin NOT NULL,
  `description` text collate utf8_bin,
  `type` varchar(255) collate utf8_bin NOT NULL,
  `default_value` varchar(255) collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `config_variable_FI_1` (`categorie_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



INSERT INTO `config_variable` (`id`, `code`, `categorie_code`, `libelle`, `description`, `type`, `default_value`) VALUES
(1, 'address', 'mailing', 'Adresse expéditeur', 0x4c657320656d61696c7320656e766f79c3a97320617070617261c3ae74726f6e7420636f6d6d6520657870c3a96469c3a973206176656320636574746520616472657373652e, 'EMAIL', 'info@piwam.org'),
(2, 'method', 'mailing', 'Méthode', 0x4dc3a974686f64652061766563206c617175656c6c65207365726f6e7420656e766f79c3a973206c657320652d6d61696c73, '{mail,smtp,gmail,sendmail}', 'mail'),
(3, 'gmail_username', 'mailing', 'Gmail: Identifiant', 0x4164726573736520474d61696c2064616e73206c65206361647265206427756e20656e766f69206176656320474d61696c, 'EMAIL', ''),
(4, 'gmail_password', 'mailing', 'GMail: Password', 0x4d6f7420646520706173736520706f757220656e766f796572206c6573206d61696c732076696120474d61696c, 'VARCHAR', ''),
(5, 'smtp_server', 'mailing', 'SMTP: Serveur', 0x5365727665757220534d5450207574696c6973c3a920706f7572206c27656e766f69206465206d61696c73, 'VARCHAR', ''),
(6, 'smtp_username', 'mailing', 'SMTP: Identifiant', 0x4964656e74696669616e7420706f757220736520636f6e6e6563746572206175207365727665757220534d5450, 'VARCHAR', ''),
(7, 'smtp_password', 'mailing', 'SMTP: Mot de passe', 0x4d6f74206465207061737365207574696c6973c3a920706f757220736520636f6e6e6563746572206175207365727665757220534d54502e, 'VARCHAR', ''),
(8, 'sendmail_path', 'mailing', 'Sendmail', 0x416363c3a8732061752062696e616972652053656e646d61696c, 'VARCHAR', '/usr/bin/sendmail'),
(9, 'users_by_page', 'affichage', 'Membres par page', 0x4e6f6d627265206465206d656d6272657320c3a02061666669636865722070617220706167652064616e73206c65206c697374696e672e, 'INTEGER', '20');


ALTER TABLE `config_value`
  ADD CONSTRAINT `config_value_FK_1` FOREIGN KEY (`config_variable_id`) REFERENCES `config_variable` (`id`),
  ADD CONSTRAINT `config_value_FK_2` FOREIGN KEY (`association_id`) REFERENCES `association` (`id`);

ALTER TABLE `config_variable`
  ADD CONSTRAINT `config_variable_FK_1` FOREIGN KEY (`categorie_code`) REFERENCES `config_categorie` (`code`);
