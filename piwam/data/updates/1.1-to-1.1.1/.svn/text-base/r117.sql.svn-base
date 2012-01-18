ALTER TABLE `piwam_data`  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

--
-- Nouvelle rubrique de configuration
--

INSERT INTO `piwam`.`piwam_config_categorie` (
`code` ,
`libelle`
)
VALUES (
'services', 'services'
);

-- 
-- Nouvelle variable de configuration : Google map key 
--

INSERT INTO `piwam_config_variable` (
`id` ,
`code` ,
`categorie_code` ,
`libelle` ,
`description` ,
`type` ,
`default_value`
)
VALUES (
NULL , 'googlemap_key', 'services', 'Clé Google Map', 'Clé utilisée pour accéder à Google Map. Générez la votre sur http://code.google.com/intl/fr-FR/apis/maps/signup.html.', 'VARCHAR', 'ABQIAAAAL8IvKFhg9nRCwpMHeoYEKhQu6C5tfcTOznQAfibWXRksA7VQJxQAvTbET15fVW6RQnHsk3BmZqGKLw'
)