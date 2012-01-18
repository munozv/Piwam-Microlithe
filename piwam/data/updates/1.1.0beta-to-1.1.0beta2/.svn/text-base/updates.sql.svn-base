-- #############################################################################

-- Ce fichier contient toutes les modifications de la base de donnees entre la
-- version 1.1.0 beta et la 1.1 finale

-- #############################################################################


-- Fixe les types des champs de montant

ALTER TABLE `cotisation` CHANGE  `montant` `montant` DECIMAL( 10, 2 ) NOT NULL AFTER `cotisation_type_id` ;
ALTER TABLE `depense` CHANGE  `montant` `montant` DECIMAL( 10, 2 ) NOT NULL AFTER `libelle` ;
ALTER TABLE `recette` CHANGE  `montant` `montant` DECIMAL( 10, 2 ) NOT NULL AFTER `libelle` ;

-- Rajoute 2 nouveaux champs dans les tables recettes et depenses

ALTER TABLE `depense` ADD `payee` TINYINT( 4 ) NOT NULL DEFAULT '1' AFTER `date` ;
ALTER TABLE `recette` ADD `percue` TINYINT( 4 ) NOT NULL DEFAULT '1' AFTER `date` ;

-- Tables permettant de gerer les droits utilisateur

CREATE TABLE IF NOT EXISTS `acl_action` (
  `id` int(11) NOT NULL auto_increment,
  `acl_module_id` int(11) default NULL,
  `libelle` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `acl_action_FI_1` (`acl_module_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `acl_credential` (
  `id` int(11) NOT NULL auto_increment,
  `membre_id` int(11) default NULL,
  `acl_action_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `acl_credential_FI_1` (`membre_id`),
  KEY `acl_credential_FI_2` (`acl_action_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `acl_module` (
  `id` int(11) NOT NULL auto_increment,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE `acl_action`
  ADD CONSTRAINT `acl_action_FK_1` FOREIGN KEY (`acl_module_id`) REFERENCES `acl_module` (`id`);

ALTER TABLE `acl_credential`
  ADD CONSTRAINT `acl_credential_FK_1` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`),
  ADD CONSTRAINT `acl_credential_FK_2` FOREIGN KEY (`acl_action_id`) REFERENCES `acl_action` (`id`);
  
  
-- Modules et droits accordables aux utilisateurs

  INSERT INTO `acl_module` (`id`, `libelle`) VALUES
(1, 'Association'),
(2, 'Membre'),
(3, 'Compte'),
(4, 'Activité'),
(5, 'Dépense'),
(6, 'Recette'),
(7, 'Cotisations'),
(8, 'Statuts');


INSERT INTO `acl_action` (`id`, `acl_module_id`, `libelle`, `code`) VALUES
(1, 1, 'Éditer l''association', 'edit_association'),
(2, 1, 'Utiliser l''outil de mailing', 'mailing'),
(3, 1, 'Utiliser l''outil d''export', 'export'),
(4, 1, 'Voir les bilans', 'bilan'),
(5, 4, 'Enregistrer une activité', 'add_activite'),
(6, 4, 'Éditer une activité', 'edit_activite'),
(7, 4, 'Supprimer une activité', 'del_activite'),
(8, 4, 'Lister les activités', 'list_activite'),
(9, 4, 'Voir les détails d''une activités', 'show_activite'),
(10, 2, 'Enregistrer un membre', 'add_membre'),
(11, 2, 'Éditer un membre', 'edit_membre'),
(12, 2, 'Supprimer un membre', 'del_membre'),
(13, 2, 'Lister les membres', 'list_membre'),
(14, 2, 'Afficher les détails d''un membre', 'show_membre'),
(15, 8, 'Ajouter un statut', 'add_statut'),
(16, 8, 'Éditer un statut', 'edit_statut'),
(17, 8, 'Supprimer un statut', 'del_statut'),
(18, 8, 'Lister les statuts', 'list_statut'),
(19, 7, 'Enregistrer une cotisation', 'add_cotisation'),
(20, 7, 'Éditer une cotisation', 'edit_cotisation'),
(21, 7, 'Supprimer une cotisation', 'del_cotisation'),
(22, 7, 'Lister les cotisations', 'list_cotisation'),
(23, 7, 'Gérer les types de cotisations', 'config_cotisations'),
(24, 3, 'Enregistrer un compte', 'add_compte'),
(25, 3, 'Éditer un compte', 'edit_compte'),
(26, 3, 'Supprimer un compte', 'del_compte'),
(27, 3, 'Lister les comptes', 'list_compte'),
(28, 6, 'Enregistrer une recette', 'add_recette'),
(29, 6, 'Éditer une recette', 'edit_recette'),
(30, 6, 'Supprimer une recette', 'del_recette'),
(31, 6, 'Lister les recettes', 'list_recette'),
(32, 5, 'Enregistrer une dépense', 'add_depense'),
(33, 5, 'Éditer une dépense', 'edit_depense'),
(34, 5, 'Supprimer une dépense', 'del_depense'),
(35, 5, 'Lister les dépenses', 'list_depense'),
(36, 2, 'Gérer les droits', 'edit_acl');


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
  
UPDATE `piwam`.`acl_action` SET `libelle` = 'Éditer et configurer l''association' WHERE `acl_action`.`id` =1 LIMIT 1 ;
