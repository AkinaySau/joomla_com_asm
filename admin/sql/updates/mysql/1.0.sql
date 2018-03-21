CREATE TABLE IF NOT EXISTS `#__asm_pages` (
  `id`       INT(11)                               NOT NULL AUTO_INCREMENT,
  `title`    VARCHAR(255)                          NULL,
  `condent`  LONGTEXT                              NULL,
  `custom`   LONGTEXT                              NULL,
  `params`   LONGTEXT                              NULL,
  `created`  DATETIME                              NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

PRIMARY KEY (`id`)

)
  ENGINE = InnoDB
DEFAULT CHARSET = utf8mb4
DEFAULT COLLATE = utf8mb4_unicode_ci;