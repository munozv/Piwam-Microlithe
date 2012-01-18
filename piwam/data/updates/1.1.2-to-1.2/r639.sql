CREATE TABLE piwam_association_copy AS SELECT * FROM piwam_association;
CREATE TABLE piwam_acl_action_copy AS SELECT * FROM piwam_acl_action;
CREATE TABLE piwam_acl_credential_copy AS SELECT * FROM piwam_acl_credential;
CREATE TABLE piwam_acl_module_copy AS SELECT * FROM piwam_acl_module;
CREATE TABLE piwam_activite_copy AS SELECT * FROM piwam_activite;
CREATE TABLE piwam_compte_copy AS SELECT * FROM piwam_compte;
CREATE TABLE piwam_config_categorie_copy AS SELECT * FROM piwam_config_categorie;
CREATE TABLE piwam_config_value_copy AS SELECT * FROM piwam_config_value;
CREATE TABLE piwam_config_variable_copy AS SELECT * FROM piwam_config_variable;
CREATE TABLE piwam_cotisation_copy AS SELECT * FROM piwam_cotisation;
CREATE TABLE piwam_cotisation_type_copy AS SELECT * FROM piwam_cotisation_type;
CREATE TABLE piwam_data_copy AS SELECT * FROM piwam_data;
CREATE TABLE piwam_depense_copy AS SELECT * FROM piwam_depense;
CREATE TABLE piwam_membre_copy AS SELECT * FROM piwam_membre;
CREATE TABLE piwam_recette_copy AS SELECT * FROM piwam_recette;
CREATE TABLE piwam_statut_copy AS SELECT * FROM piwam_statut;



RENAME TABLE `piwam_statut_copy`  TO `piwam_status` ;
RENAME TABLE `piwam_recette_copy`  TO `piwam_income` ;
RENAME TABLE `piwam_depense_copy`  TO `piwam_expense` ;
RENAME TABLE `piwam_activite_copy`  TO `piwam_activity` ;
RENAME TABLE `piwam_compte_copy`  TO `piwam_account` ;
RENAME TABLE `piwam_cotisation_copy`  TO `piwam_due` ;
RENAME TABLE `piwam_cotisation_type_copy`  TO `piwam_due_type` ;
RENAME TABLE `piwam_config_categorie_copy`  TO `piwam_config_category` ;
RENAME TABLE `piwam_membre_copy`  TO `piwam_member` ;

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE `piwam_acl_action`, `piwam_acl_credential`, `piwam_acl_module`, `piwam_activite`, `piwam_association`, `piwam_compte`, `piwam_config_categorie`, `piwam_config_value`, `piwam_config_variable`, `piwam_cotisation`, `piwam_cotisation_type`, `piwam_data`, `piwam_depense`, `piwam_membre`, `piwam_recette`, `piwam_statut`;




RENAME TABLE `piwam_association_copy`  TO `piwam_association` ;
RENAME TABLE `piwam_config_value_copy`  TO `piwam_config_value` ;
RENAME TABLE `piwam_config_variable_copy`  TO `piwam_config_variable` ;
RENAME TABLE `piwam_data_copy`  TO `piwam_data` ;
RENAME TABLE `piwam_acl_credential_copy`  TO `piwam_acl_credential` ;
RENAME TABLE `piwam_acl_module_copy`  TO `piwam_acl_module` ;
RENAME TABLE `piwam_acl_action_copy`  TO `piwam_acl_action` ;


ALTER TABLE `piwam_association`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_config_category`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_config_value`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_config_variable`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_data`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_acl_credential`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_acl_module`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_acl_action`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_account`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_activity`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_due`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_due_type`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_expense`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_income`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_member`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE `piwam_status`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;


ALTER TABLE `piwam_account` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_association` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_acl_action` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_acl_credential` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_acl_module` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_activity` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_config_variable` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_data` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_due` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_due_type` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_expense` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_income` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_member` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;
ALTER TABLE `piwam_status` CHANGE `id` `id` INT( 11 ) NOT NULL AUTO_INCREMENT;



ALTER TABLE `piwam_due` CHANGE `compte_id` `account_id` INT( 11 ) NOT NULL;
ALTER TABLE `piwam_due` CHANGE `membre_id` `member_id` INT( 11 ) NOT NULL;
ALTER TABLE `piwam_due` CHANGE `cotisation_type_id` `due_type_id` INT( 11 ) NOT NULL;
ALTER TABLE `piwam_due` CHANGE `enregistre_par` `created_by` INT( 11 ) NOT NULL;
ALTER TABLE `piwam_due` CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NOT NULL;


ALTER TABLE `piwam_due_type` CHANGE `valide` `period` INT( 11 ) NOT NULL ,
CHANGE `montant` `amount` DECIMAL( 10, 2 ) NOT NULL ,
CHANGE `actif` `state` TINYINT( 4 ) NULL DEFAULT '1',
CHANGE `enregistre_par` `created_by` INT( 11 ) NOT NULL ,
CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NULL DEFAULT NULL ;


ALTER TABLE `piwam_account` CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
CHANGE `actif` `state` TINYINT( 4 ) NULL DEFAULT '1',
CHANGE `enregistre_par` `created_by` INT( 11 ) NULL DEFAULT NULL ,
CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NULL DEFAULT NULL ;


ALTER TABLE `piwam_acl_action` CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ;
ALTER TABLE `piwam_acl_credential` CHANGE `membre_id` `member_id` INT( 11 ) NULL DEFAULT NULL ;
ALTER TABLE `piwam_acl_module` CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ;


ALTER TABLE `piwam_activity` CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
CHANGE `actif` `state` TINYINT( 4 ) NULL DEFAULT '1',
CHANGE `enregistre_par` `created_by` INT( 11 ) NULL DEFAULT NULL ,
CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NULL DEFAULT NULL ;

ALTER TABLE `piwam_association` CHANGE `nom` `name` VARCHAR( 120 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
CHANGE `site_web` `website` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL ,
CHANGE `enregistre_par` `created_by` INT( 11 ) NULL DEFAULT NULL ,
CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NULL DEFAULT NULL ;


ALTER TABLE `piwam_config_category` CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ;
ALTER TABLE `piwam_config_variable` CHANGE `categorie_code` `category_code` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ;

ALTER TABLE `piwam_data` CHANGE `key` `config_key` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ;
ALTER TABLE `piwam_due` CHANGE `montant` `amount` DECIMAL( 10, 2 ) NOT NULL ;
ALTER TABLE `piwam_due_type` CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ;


ALTER TABLE `piwam_expense` CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
CHANGE `montant` `amount` DECIMAL( 10, 2 ) NOT NULL ,
CHANGE `compte_id` `account_id` INT( 11 ) NOT NULL ,
CHANGE `activite_id` `activity_id` INT( 11 ) NOT NULL ,
CHANGE `payee` `paid` TINYINT( 4 ) NULL DEFAULT '1',
CHANGE `enregistre_par` `created_by` INT( 11 ) NOT NULL ,
CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NOT NULL ;


ALTER TABLE `piwam_income` CHANGE `libelle` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
CHANGE `montant` `amount` DECIMAL( 10, 2 ) NOT NULL ,
CHANGE `compte_id` `account_id` INT( 11 ) NOT NULL ,
CHANGE `activite_id` `activity_id` INT( 11 ) NOT NULL ,
CHANGE `percue` `received` TINYINT( 4 ) NULL DEFAULT '1',
CHANGE `enregistre_par` `created_by` INT( 11 ) NOT NULL ,
CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NOT NULL ;

ALTER TABLE `piwam_member` CHANGE `nom` `lastname` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
CHANGE `prenom` `firstname` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
CHANGE `pseudo` `username` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL, 
CHANGE `statut_id` `status_id` INT(11) NOT NULL, 
CHANGE `date_inscription` `subscription_date` DATE NOT NULL, 
CHANGE `exempte_cotisation` `due_exempt` TINYINT(4) NOT NULL, 
CHANGE `rue` `street` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL, 
CHANGE `cp` `zipcode` VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL, 
CHANGE `ville` `city` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL, 
CHANGE `pays` `country` VARCHAR(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL, 
CHANGE `tel_fixe` `phone_home` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL, 
CHANGE `tel_portable` `phone_mobile` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
CHANGE `actif` `state` TINYINT( 4 ) NULL DEFAULT '1',
CHANGE `enregistre_par` `created_by` INT( 11 ) NOT NULL ,
CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NOT NULL ;


ALTER TABLE `piwam_status` CHANGE `nom` `label` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
CHANGE `actif` `state` TINYINT( 4 ) NULL DEFAULT '1',
CHANGE `enregistre_par` `created_by` INT( 11 ) NULL DEFAULT NULL ,
CHANGE `mis_a_jour_par` `updated_by` INT( 11 ) NULL DEFAULT NULL ;


ALTER TABLE `piwam_due` CHANGE `created_by` `created_by` INT( 11 ) NULL ;
ALTER TABLE `piwam_due_type` CHANGE `created_by` `created_by` INT( 11 ) NULL ;


ALTER TABLE `piwam_expense` CHANGE `created_by` `created_by` INT( 11 ) NULL ,
CHANGE `updated_by` `updated_by` INT( 11 ) NULL ;


ALTER TABLE `piwam_income` CHANGE `created_by` `created_by` INT( 11 ) NULL ,
CHANGE `updated_by` `updated_by` INT( 11 ) NULL ;


ALTER TABLE `piwam_member` CHANGE `created_by` `created_by` INT( 11 ) NULL ,
CHANGE `updated_by` `updated_by` INT( 11 ) NULL;

-- Some processes
-- to clean tables

ALTER TABLE `piwam_due` CHANGE `updated_by` `updated_by` INT( 11 ) NULL ;
UPDATE `piwam_due` SET `updated_by` = NULL WHERE `piwam_due`.`updated_by` =0 ;
UPDATE `piwam_member` SET `updated_by` = NULL WHERE `piwam_member`.`updated_by` =0 ;
UPDATE `piwam_member` SET `created_by` = NULL WHERE `piwam_member`.`created_by` =0 ;




--
-- Add indexes and PK
--

ALTER TABLE piwam_account ADD INDEX association_id_idx (association_id), ADD INDEX created_by_idx (created_by), ADD INDEX updated_by_idx (updated_by), ADD PRIMARY KEY(id);
ALTER TABLE piwam_acl_action  ADD INDEX acl_module_id_idx (acl_module_id), ADD PRIMARY KEY(id);
ALTER TABLE piwam_acl_credential   ADD INDEX acl_action_id_idx (acl_action_id), ADD INDEX member_id_idx (member_id), ADD PRIMARY KEY(id);
ALTER TABLE piwam_acl_module ADD PRIMARY KEY(id);
ALTER TABLE piwam_activity ADD INDEX association_id_idx (association_id), ADD INDEX created_by_idx (created_by), ADD INDEX updated_by_idx (updated_by), ADD PRIMARY KEY(id); 
ALTER TABLE piwam_association ADD PRIMARY KEY(id);
ALTER TABLE piwam_config_category ADD PRIMARY KEY(code);
ALTER TABLE piwam_config_value ADD PRIMARY KEY(config_variable_id, association_id); 
ALTER TABLE piwam_config_variable ADD INDEX category_code_idx (category_code), ADD PRIMARY KEY(id);
ALTER TABLE piwam_data ADD PRIMARY KEY(id);
ALTER TABLE piwam_due ADD INDEX account_id_idx (account_id), ADD INDEX due_type_id_idx (due_type_id), ADD INDEX member_id_idx (member_id), ADD INDEX created_by_idx (created_by), ADD INDEX updated_by_idx (updated_by), ADD PRIMARY KEY(id); 
ALTER TABLE piwam_due_type ADD INDEX association_id_idx (association_id), ADD INDEX created_by_idx (created_by), ADD INDEX updated_by_idx (updated_by), ADD PRIMARY KEY(id);
ALTER TABLE piwam_expense ADD INDEX association_id_idx (association_id), ADD INDEX account_id_idx (account_id), ADD INDEX activity_id_idx (activity_id), ADD INDEX created_by_idx (created_by), ADD INDEX updated_by_idx (updated_by), ADD PRIMARY KEY(id);
ALTER TABLE piwam_income ADD INDEX association_id_idx (association_id), ADD INDEX account_id_idx (account_id), ADD INDEX activity_id_idx (activity_id), ADD INDEX created_by_idx (created_by), ADD INDEX updated_by_idx (updated_by), ADD PRIMARY KEY(id);
ALTER TABLE piwam_member ADD INDEX association_id_idx (association_id), ADD INDEX status_id_idx (status_id), ADD INDEX created_by_idx (created_by), ADD INDEX updated_by_idx (updated_by), ADD PRIMARY KEY(id);


ALTER TABLE piwam_status 
ADD INDEX association_id_idx (association_id), 
ADD INDEX created_by_idx (created_by),
ADD INDEX updated_by_idx (updated_by), 
ADD PRIMARY KEY(id);

UPDATE piwam_member SET status_id=1 WHERE status_id=0;

ALTER TABLE `piwam_config_category` CHANGE `code` `code` VARCHAR( 25 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

ALTER TABLE piwam_account ADD CONSTRAINT piwam_account_updated_by_piwam_member_id FOREIGN KEY (updated_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_account ADD CONSTRAINT piwam_account_created_by_piwam_member_id FOREIGN KEY (created_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_account ADD CONSTRAINT piwam_account_association_id_piwam_association_id FOREIGN KEY (association_id) REFERENCES piwam_association(id) ON DELETE CASCADE;
ALTER TABLE piwam_acl_action ADD CONSTRAINT piwam_acl_action_acl_module_id_piwam_acl_module_id FOREIGN KEY (acl_module_id) REFERENCES piwam_acl_module(id) ON DELETE CASCADE;
ALTER TABLE piwam_acl_credential ADD CONSTRAINT piwam_acl_credential_member_id_piwam_member_id FOREIGN KEY (member_id) REFERENCES piwam_member(id) ON DELETE CASCADE;
ALTER TABLE piwam_acl_credential ADD CONSTRAINT piwam_acl_credential_acl_action_id_piwam_acl_action_id FOREIGN KEY (acl_action_id) REFERENCES piwam_acl_action(id) ON DELETE CASCADE;
ALTER TABLE piwam_activity ADD CONSTRAINT piwam_activity_updated_by_piwam_member_id FOREIGN KEY (updated_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_activity ADD CONSTRAINT piwam_activity_created_by_piwam_member_id FOREIGN KEY (created_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_activity ADD CONSTRAINT piwam_activity_association_id_piwam_association_id FOREIGN KEY (association_id) REFERENCES piwam_association(id) ON DELETE CASCADE;
ALTER TABLE piwam_config_value ADD CONSTRAINT piwam_config_value_config_variable_id_piwam_config_variable_id FOREIGN KEY (config_variable_id) REFERENCES piwam_config_variable(id) ON DELETE CASCADE;
ALTER TABLE piwam_config_value ADD CONSTRAINT piwam_config_value_association_id_piwam_association_id FOREIGN KEY (association_id) REFERENCES piwam_association(id) ON DELETE CASCADE;
ALTER TABLE piwam_config_variable ADD CONSTRAINT piwam_config_variable_category_code_piwam_config_category_code FOREIGN KEY (category_code) REFERENCES piwam_config_category(code) ON DELETE CASCADE;
ALTER TABLE piwam_due ADD CONSTRAINT piwam_due_updated_by_piwam_member_id FOREIGN KEY (updated_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_due ADD CONSTRAINT piwam_due_member_id_piwam_member_id FOREIGN KEY (member_id) REFERENCES piwam_member(id) ON DELETE CASCADE;
ALTER TABLE piwam_due ADD CONSTRAINT piwam_due_due_type_id_piwam_due_type_id FOREIGN KEY (due_type_id) REFERENCES piwam_due_type(id) ON DELETE CASCADE;
ALTER TABLE piwam_due ADD CONSTRAINT piwam_due_created_by_piwam_member_id FOREIGN KEY (created_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_due ADD CONSTRAINT piwam_due_account_id_piwam_account_id FOREIGN KEY (account_id) REFERENCES piwam_account(id) ON DELETE CASCADE;
ALTER TABLE piwam_due_type ADD CONSTRAINT piwam_due_type_updated_by_piwam_member_id FOREIGN KEY (updated_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_due_type ADD CONSTRAINT piwam_due_type_created_by_piwam_member_id FOREIGN KEY (created_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_due_type ADD CONSTRAINT piwam_due_type_association_id_piwam_association_id FOREIGN KEY (association_id) REFERENCES piwam_association(id) ON DELETE CASCADE;
ALTER TABLE piwam_expense ADD CONSTRAINT piwam_expense_updated_by_piwam_member_id FOREIGN KEY (updated_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_expense ADD CONSTRAINT piwam_expense_created_by_piwam_member_id FOREIGN KEY (created_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_expense ADD CONSTRAINT piwam_expense_association_id_piwam_association_id FOREIGN KEY (association_id) REFERENCES piwam_association(id) ON DELETE CASCADE;
ALTER TABLE piwam_expense ADD CONSTRAINT piwam_expense_activity_id_piwam_activity_id FOREIGN KEY (activity_id) REFERENCES piwam_activity(id) ON DELETE CASCADE;
ALTER TABLE piwam_expense ADD CONSTRAINT piwam_expense_account_id_piwam_account_id FOREIGN KEY (account_id) REFERENCES piwam_account(id) ON DELETE CASCADE;
ALTER TABLE piwam_income ADD CONSTRAINT piwam_income_updated_by_piwam_member_id FOREIGN KEY (updated_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_income ADD CONSTRAINT piwam_income_created_by_piwam_member_id FOREIGN KEY (created_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_income ADD CONSTRAINT piwam_income_association_id_piwam_association_id FOREIGN KEY (association_id) REFERENCES piwam_association(id) ON DELETE CASCADE;
ALTER TABLE piwam_income ADD CONSTRAINT piwam_income_activity_id_piwam_activity_id FOREIGN KEY (activity_id) REFERENCES piwam_activity(id) ON DELETE CASCADE;
ALTER TABLE piwam_income ADD CONSTRAINT piwam_income_account_id_piwam_account_id FOREIGN KEY (account_id) REFERENCES piwam_account(id) ON DELETE CASCADE;
ALTER TABLE piwam_member ADD CONSTRAINT piwam_member_updated_by_piwam_member_id FOREIGN KEY (updated_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_member ADD CONSTRAINT piwam_member_status_id_piwam_status_id FOREIGN KEY (status_id) REFERENCES piwam_status(id) ON DELETE CASCADE;
ALTER TABLE piwam_member ADD CONSTRAINT piwam_member_created_by_piwam_member_id FOREIGN KEY (created_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_member ADD CONSTRAINT piwam_member_association_id_piwam_association_id FOREIGN KEY (association_id) REFERENCES piwam_association(id) ON DELETE CASCADE;
ALTER TABLE piwam_status ADD CONSTRAINT piwam_status_updated_by_piwam_member_id FOREIGN KEY (updated_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_status ADD CONSTRAINT piwam_status_created_by_piwam_member_id FOREIGN KEY (created_by) REFERENCES piwam_member(id) ON DELETE SET NULL;
ALTER TABLE piwam_status ADD CONSTRAINT piwam_status_association_id_piwam_association_id FOREIGN KEY (association_id) REFERENCES piwam_association(id) ON DELETE CASCADE;
