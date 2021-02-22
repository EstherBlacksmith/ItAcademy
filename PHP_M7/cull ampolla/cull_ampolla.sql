-- MySQL Workbench Synchronization
-- Generated: 2021-02-16 18:33
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Esther

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `cullAmpolla` DEFAULT CHARACTER SET utf8 ;



CREATE TABLE IF NOT EXISTS `cullAmpolla`.`dadesPersonals` (
  `iddadesPersonals` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `primerCognom` VARCHAR(45) NOT NULL,
  `segonCognom` VARCHAR(45) NULL  ,
  `telefon` CHAR(9) NULL  ,
  `mail` VARCHAR(45) NULL  ,
  `dataregistre` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `tipus` ENUM('treballador', 'client') NULL DEFAULT 'client',
  `idClientAmic` INT(11) NULL   COMMENT 'Identificador del client que l\'ha recomanat',
  INDEX `cognom` (`primerCognom` ASC) ,
  INDEX `telefon` (`telefon` ASC) ,
  PRIMARY KEY (`iddadesPersonals`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cullAmpolla`.`proveidors` (
  `idproveidors` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `telefon` CHAR(9) NULL  ,
  `CIF` CHAR(12) NOT NULL,
  PRIMARY KEY (`idproveidors`),
  INDEX `nom` (`nom` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `cullAmpolla`.`adresses` (
  `idadresses` INT(11) NOT NULL AUTO_INCREMENT,
  `carrer` VARCHAR(60) NOT NULL,
  `pis` VARCHAR(12) NULL  ,
  `porta` VARCHAR(12) NULL  ,
  `ciutat` VARCHAR(60) NULL  ,
  `codiPostal` CHAR(9) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `proveidors_idproveidors` INT(11) NOT NULL,
   PRIMARY KEY (`idadresses`)
    )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cullAmpolla`.`marques` (
  `idmarques` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `proveidors_idproveidors` INT(11) NOT NULL,
  PRIMARY KEY (`idmarques`),
  INDEX `fk_marques_proveidors1_idx` (`proveidors_idproveidors` ASC) ,
  CONSTRAINT `fk_marques_proveidors1`
    FOREIGN KEY (`proveidors_idproveidors`)
    REFERENCES `cullAmpolla`.`proveidors` (`idproveidors`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `cullAmpolla`.`ulleres` (
  `idulleres` INT(11) NOT NULL AUTO_INCREMENT,
  `grausD` FLOAT(11) NOT NULL DEFAULT 0 COMMENT 'Graus del vidre dret',
  `grausE` FLOAT(11) NOT NULL COMMENT 'Graus del vidre esquerre',
  `colorE` VARCHAR(45) NOT NULL DEFAULT 'sense' COMMENT 'Color del vidre esquerre',
  `colorD` VARCHAR(45) NOT NULL DEFAULT 'sense' COMMENT 'Color del vidre dret',
  `colorMontura` VARCHAR(45) NULL DEFAULT NULL COMMENT 'Color de la montura',
  `tipusMontura` ENUM('flotant', 'pasta', 'metàl·lica') NULL DEFAULT 'pasta',
  `preu` FLOAT(11) NOT NULL DEFAULT 0,
  `marques_idmarques` INT(11) NOT NULL,
  PRIMARY KEY (`idulleres`),
  INDEX `fk_ulleres_marques1_idx` (`marques_idmarques` ASC) ,
  CONSTRAINT `fk_ulleres_marques1`
    FOREIGN KEY (`marques_idmarques`)
    REFERENCES `cullAmpolla`.`marques` (`idmarques`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `cullAmpolla`.`treballador_a_client` (
  `dadesPersonals_iddadesPersonals` INT(11) NOT NULL,
  `dadesPersonals_iddadesPersonals1` INT(11) NOT NULL,
  `idUlleres` INT(11) NULL  ,
  PRIMARY KEY (`dadesPersonals_iddadesPersonals`, `dadesPersonals_iddadesPersonals1`),
  INDEX `fk_dadesPersonals_has_dadesPersonals_dadesPersonals2_idx` (`dadesPersonals_iddadesPersonals1` ASC) ,
  INDEX `fk_dadesPersonals_has_dadesPersonals_dadesPersonals1_idx` (`dadesPersonals_iddadesPersonals` ASC) ,
  INDEX `ulleres` (`idUlleres` ASC) ,
  CONSTRAINT `fk_dadesPersonals_has_dadesPersonals_dadesPersonals1`
    FOREIGN KEY (`dadesPersonals_iddadesPersonals`)
    REFERENCES `cullAmpolla`.`dadesPersonals` (`iddadesPersonals`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_dadesPersonals_has_dadesPersonals_dadesPersonals2`
    FOREIGN KEY (`dadesPersonals_iddadesPersonals1`)
    REFERENCES `cullAmpolla`.`dadesPersonals` (`iddadesPersonals`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `proveidors` ADD `idAdresses` INT NULL AFTER `CIF`, ADD INDEX `fk_Adresses` (`idAdresses`);

ALTER TABLE `dadespersonals` ADD `idAdresses` INT NULL AFTER `idClientAmic`, ADD INDEX `fk_Adresses` (`idAdresses`);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
