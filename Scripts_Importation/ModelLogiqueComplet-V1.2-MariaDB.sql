/*

	Projet : Webelweiss - CactusPic - Projet complet
	Version : 1.2 (12.05.2021) - Ajout de commentaires 
	Auteur : Eliott Jaquier
	Relecture : -
	Fichier : ModelLogiqueComplet - ATTENTION! NON-TESTE
    
*/

CREATE SCHEMA IF NOT EXISTS Webelweiss_CactusPic DEFAULT CHARACTER SET utf8 ;
USE `Webelweiss_CactusPic` ;

-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** _CactusPic`.`photographers`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS Webelweiss_CactusPic.photographers (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(320) NOT NULL,
  `passwordHash` VARCHAR(256) NOT NULL,
  `firstname` VARCHAR(50) NOT NULL,
  `lastname` VARCHAR(50) NOT NULL,
  `description` TEXT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `UniquePhotographer` UNIQUE  (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- SQLINES DEMO *** ------------------------------------
-- SQLINES DEMO *** _CactusPic`.`photos`
-- SQLINES DEMO *** ------------------------------------
-- SQLINES LICENSE FOR EVALUATION USE ONLY
CREATE TABLE IF NOT EXISTS Webelweiss_CactusPic.photos (
  `id` INT NOT NULL AUTO_INCREMENT,
  `imagePath` TINYTEXT NOT NULL,
  `imageHash` VARCHAR(64) NOT NULL,
  `name` VARCHAR(50) NOT NULL,
  `description` VARCHAR(2048) NULL,
  `takenDate` DATETIME NULL,
  `longitude` DECIMAL(10,8) NULL,
  `latitude` DECIMAL(10,8) NULL,
  `photographers_id` INT NOT NULL,
  PRIMARY KEY (`id`)
  CREATE INDEX `fk_photos_photographers_idx` ON Webelweiss_CactusPic.photos (`photographers_id` ASC) VISIBLE,
  UNIQUE INDEX `UniqueImage` (`imageHash` ASC) VISIBLE,
  CONSTRAINT `fk_photos_photographers`
    FOREIGN KEY (`photographers_id`)
    REFERENCES `Webelweiss_CactusPic`.`photographers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;