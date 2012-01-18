
--
-- We add a prefix to the tables
--

SET FOREIGN_KEY_CHECKS=0;
RENAME TABLE `acl_action`       TO `piwam_acl_action` ;
RENAME TABLE `acl_credential`   TO `piwam_acl_credential` ;
RENAME TABLE `acl_module`       TO `piwam_acl_module` ;
RENAME TABLE `activite`         TO `piwam_activite` ;
RENAME TABLE `association`      TO `piwam_association` ;
RENAME TABLE `compte`           TO `piwam_compte` ;
RENAME TABLE `config_categorie` TO `piwam_config_categorie` ;
RENAME TABLE `config_value`     TO `piwam_config_value` ;
RENAME TABLE `config_variable`  TO `piwam_config_variable` ;
RENAME TABLE `cotisation`       TO `piwam_cotisation` ;
RENAME TABLE `cotisation_type`  TO `piwam_cotisation_type` ;
RENAME TABLE `depense`          TO `piwam_depense` ;
RENAME TABLE `recette`          TO `piwam_recette` ;
RENAME TABLE `membre`           TO `piwam_membre` ;
RENAME TABLE `statut`           TO `piwam_statut` ;
SET FOREIGN_KEY_CHECKS=1;
