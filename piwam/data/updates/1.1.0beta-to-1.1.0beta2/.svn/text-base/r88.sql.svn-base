-- Suppression des ACL en cascande
-- Important pour le bon fonctionnement du modele, et notamment pour le bon
-- deroulement des tests

ALTER TABLE  `acl_credential` DROP FOREIGN KEY  `acl_credential_FK_1` ;

ALTER TABLE  `acl_credential` ADD FOREIGN KEY (  `membre_id` ) REFERENCES  `membre` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `acl_credential` DROP FOREIGN KEY  `acl_credential_FK_2` ;

ALTER TABLE  `acl_credential` ADD FOREIGN KEY (  `acl_action_id` ) REFERENCES `acl_action` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;
