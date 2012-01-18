--
-- Table which stores private Piwam data
--

DROP TABLE IF EXISTS `piwam_data`;

CREATE TABLE `piwam_data`
(
    `id` INTEGER  NOT NULL AUTO_INCREMENT,
    `key` VARCHAR(255)  NOT NULL,
    `value` VARCHAR(255)  NOT NULL,
    PRIMARY KEY (`id`)
)Type=InnoDB;

INSERT INTO `piwam_data` (`id`, `key`, `value`) VALUES
(1, 'dbversion', '99');