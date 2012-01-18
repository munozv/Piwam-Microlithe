INSERT INTO  `acl_module` (
`id` ,
`libelle`
)
VALUES (
9 ,  'Piwam'
);

INSERT INTO  `acl_action` (
`id` ,
`acl_module_id` ,
`libelle` ,
`code`
)
VALUES (
NULL ,  '9',  'Mettre à jour Piwam',  'update_piwam'
);

INSERT INTO `acl_action` (
`id` ,
`acl_module_id` ,
`libelle` ,
`code`
)
VALUES (
NULL ,  '9',  'Éditer les préférences',  'edit_piwam_preferences'
);
