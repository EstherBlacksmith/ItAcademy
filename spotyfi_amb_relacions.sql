-- MySQL Workbench Synchronization
-- Generated: 2021-02-19 15:56
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Esther

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `spotify` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `spotify`.`usuaris` (
  `idusuaris` INT(11) NOT NULL AUTO_INCREMENT,
  `password` BINARY(60) NOT NULL,
  `mail` VARCHAR(60) NOT NULL,
  `nom` VARCHAR(60) NOT NULL,
  `dataNaixement` DATE NOT NULL ,
  `sexe` ENUM('Dona', 'Home', 'No binari') NOT NULL ,
  `pais` VARCHAR(45) NULL ,
  `codiPostal` CHAR(9) NULL ,
  `subcripcions_idsubcripcions` INT(11) NOT NULL,
  PRIMARY KEY (`idusuaris`),
  UNIQUE INDEX `idusuaris_UNIQUE` (`idusuaris` ASC) ,
  UNIQUE INDEX `mail_UNIQUE` (`mail` ASC) ,
  INDEX `pais` (`pais` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`subcripcions` (
  `idsubcripcions` INT(11) NOT NULL AUTO_INCREMENT,
  `dataInici` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataRenovacio` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Premium` TINYINT(4) NULL DEFAULT 0 COMMENT 'Premium (pagament) -> 1, Free (sense pagament) -> 0',
    `usuaris_idusuaris` INT(11) NOT NULL,
 PRIMARY KEY (`idsubcripcions`, `usuaris_idusuaris`),
  INDEX `fk_subcripcions_usuaris1_idx` (`usuaris_idusuaris` ASC) ,
  CONSTRAINT `fk_subcripcions_usuaris1`
    FOREIGN KEY (`usuaris_idusuaris`)
    REFERENCES `spotify`.`usuaris` (`idusuaris`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)  
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`tarjeta` (
  `numTarjeta` VARCHAR(12) NOT NULL,
  `mesCaducitat` INT(11) NOT NULL,
  `anyCaducitat` INT(11) NOT NULL,
  `codiSeg` INT(11) NOT NULL,
  `subcripcions_idsubcripcions` INT(11) NOT NULL,
  PRIMARY KEY (`numTarjeta`, `subcripcions_idsubcripcions`),
  UNIQUE INDEX `numTarjeta_UNIQUE` (`numTarjeta` ASC) ,
  INDEX `fk_tarjeta_subcripcions1_idx` (`subcripcions_idsubcripcions` ASC) ,
  CONSTRAINT `fk_tarjeta_subcripcions1`
    FOREIGN KEY (`subcripcions_idsubcripcions`)
    REFERENCES `spotify`.`subcripcions` (`idsubcripcions`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`paypal` (
  `usuariPaypal` VARCHAR(60) NOT NULL,
  `subcripcions_idsubcripcions` INT(11) NOT NULL,
  PRIMARY KEY (`usuariPaypal`, `subcripcions_idsubcripcions`),
  UNIQUE INDEX `usuariPaypal_UNIQUE` (`usuariPaypal` ASC) ,
  INDEX `fk_paypal_subcripcions1_idx` (`subcripcions_idsubcripcions` ASC) ,
  CONSTRAINT `fk_paypal_subcripcions1`
    FOREIGN KEY (`subcripcions_idsubcripcions`)
    REFERENCES `spotify`.`subcripcions` (`idsubcripcions`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`pagaments` (
  `idpagaments` INT(11) NOT NULL AUTO_INCREMENT,
  `data` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` FLOAT(11) NOT NULL DEFAULT 0 COMMENT 'Cost en euros del pagament',
  `usuaris_idusuaris` INT(11) NOT NULL,
  PRIMARY KEY (`idpagaments`, `usuaris_idusuaris`),
  INDEX `fk_pagaments_usuaris1_idx` (`usuaris_idusuaris` ASC) ,
  CONSTRAINT `fk_pagaments_usuaris1`
    FOREIGN KEY (`usuaris_idusuaris`)
    REFERENCES `spotify`.`usuaris` (`idusuaris`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`Playlist` (
  `idPlaylist` INT(11) NOT NULL AUTO_INCREMENT,
  `titol` VARCHAR(45) NOT NULL,
  `dataCreacio` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activa` TINYINT(4) NULL DEFAULT 1 COMMENT '1-> activa, 0-> esborrada',
  `dataEliminacio` DATETIME NULL ,
  `idusuariCrea` INT(11) NOT NULL,
  PRIMARY KEY (`idPlaylist`, `idusuariCrea`),
  INDEX `titol` (`titol` ASC) ,
  INDEX `fk_Playlist_usuaris1_idx` (`idusuariCrea` ASC) ,
  CONSTRAINT `fk_Playlist_usuaris1`
    FOREIGN KEY (`idusuariCrea`)
    REFERENCES `spotify`.`usuaris` (`idusuaris`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`cancons` (
  `idcancons` INT(11) NOT NULL AUTO_INCREMENT,
  `titol` VARCHAR(60) NULL ,
  `durada` FLOAT(11) NULL ,
  PRIMARY KEY (`idcancons`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`reproducions` (
  `numReproduccio` INT(11) NULL DEFAULT 0,
  `cancons_idcancons` INT(11) NOT NULL,
  PRIMARY KEY (`cancons_idcancons`),
  INDEX `fk_reproducions_cancons1_idx` (`cancons_idcancons` ASC) ,
  CONSTRAINT `fk_reproducions_cancons1`
    FOREIGN KEY (`cancons_idcancons`)
    REFERENCES `spotify`.`cancons` (`idcancons`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`album` (
  `idalbum` INT(11) NOT NULL AUTO_INCREMENT,
  `any` INT(11) NULL ,
  `titol` VARCHAR(45) NOT NULL,
  `imatgePortada` VARCHAR(120) NULL  COMMENT 'url de la imatge',
  PRIMARY KEY (`idalbum`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`artistes` (
  `idartistes` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `imatgeArtista` VARCHAR(120) NULL  COMMENT 'url de la imatge',
  PRIMARY KEY (`idartistes`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`favorits` (
  `idUsuari` INT(11) NOT NULL,
  `idAlbum` INT(11) NULL ,
  `idCanco` INT(11) NULL ,
  PRIMARY KEY (`idUsuari`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



CREATE TABLE IF NOT EXISTS `spotify`.`cancons_has_album` (
  `cancons_idcancons` INT(11) NOT NULL,
  `album_idalbum` INT(11) NOT NULL,
  PRIMARY KEY (`cancons_idcancons`, `album_idalbum`),
  INDEX `fk_cancons_has_album_album1_idx` (`album_idalbum` ASC) ,
  INDEX `fk_cancons_has_album_cancons1_idx` (`cancons_idcancons` ASC) ,
  CONSTRAINT `fk_cancons_has_album_cancons1`
    FOREIGN KEY (`cancons_idcancons`)
    REFERENCES `spotify`.`cancons` (`idcancons`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cancons_has_album_album1`
    FOREIGN KEY (`album_idalbum`)
    REFERENCES `spotify`.`album` (`idalbum`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`llistaReproduccio` (
  `idcancons` INT(11) NOT NULL,
  `idPlaylist` INT(11) NOT NULL,
  `idUsuariAfegeix` INT(11) NOT NULL,
  `dataAfegeix` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcancons`, `idPlaylist`),
  INDEX `fk_cancons_has_Playlist_Playlist1_idx` (`idPlaylist` ASC) ,
  INDEX `fk_cancons_has_Playlist_cancons1_idx` (`idcancons` ASC) ,
  CONSTRAINT `fk_cancons_has_Playlist_cancons1`
    FOREIGN KEY (`idcancons`)
    REFERENCES `spotify`.`cancons` (`idcancons`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cancons_has_Playlist_Playlist1`
    FOREIGN KEY (`idPlaylist`)
    REFERENCES `spotify`.`Playlist` (`idPlaylist`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`usuari_segueix` (
  `idartistes` INT(11) NOT NULL,
  `idusuaris` INT(11) NOT NULL,
  PRIMARY KEY (`idartistes`, `idusuaris`),
  INDEX `fk_artistes_has_usuaris_usuaris1_idx` (`idusuaris` ASC) ,
  INDEX `fk_artistes_has_usuaris_artistes1_idx` (`idartistes` ASC) ,
  CONSTRAINT `fk_artistes_has_usuaris_artistes1`
    FOREIGN KEY (`idartistes`)
    REFERENCES `spotify`.`artistes` (`idartistes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_artistes_has_usuaris_usuaris1`
    FOREIGN KEY (`idusuaris`)
    REFERENCES `spotify`.`usuaris` (`idusuaris`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`cancons_favorits_usuaris` (
  `cancons_idcancons` INT(11) NOT NULL,
  `usuaris_idusuaris` INT(11) NOT NULL,
  PRIMARY KEY (`cancons_idcancons`, `usuaris_idusuaris`),
  INDEX `fk_cancons_has_usuaris_usuaris1_idx` (`usuaris_idusuaris` ASC) ,
  INDEX `fk_cancons_has_usuaris_cancons1_idx` (`cancons_idcancons` ASC) ,
  CONSTRAINT `fk_cancons_has_usuaris_cancons1`
    FOREIGN KEY (`cancons_idcancons`)
    REFERENCES `spotify`.`cancons` (`idcancons`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_cancons_has_usuaris_usuaris1`
    FOREIGN KEY (`usuaris_idusuaris`)
    REFERENCES `spotify`.`usuaris` (`idusuaris`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`artistes_favorits_usuaris` (
  `artistes_idartistes` INT(11) NOT NULL,
  `usuaris_idusuaris` INT(11) NOT NULL,
  PRIMARY KEY (`artistes_idartistes`, `usuaris_idusuaris`),
  INDEX `fk_artistes_favorits_usuaris_usuaris1_idx` (`usuaris_idusuaris` ASC) ,
  INDEX `fk_artistes_favorits_usuaris_artistes1_idx` (`artistes_idartistes` ASC) ,
  CONSTRAINT `fk_artistes_favorits_usuaris_artistes1`
    FOREIGN KEY (`artistes_idartistes`)
    REFERENCES `spotify`.`artistes` (`idartistes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_artistes_favoritss_usuaris_usuaris1`
    FOREIGN KEY (`usuaris_idusuaris`)
    REFERENCES `spotify`.`usuaris` (`idusuaris`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `spotify`.`estilMusical` (
  `idestilMusical` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL ,
  PRIMARY KEY (`idestilMusical`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `spotify`.`estilsMusicals` (
  `idestilMusical` INT(11) NOT NULL,
  `idartistes` INT(11) NOT NULL,
  PRIMARY KEY (`idestilMusical`, `idartistes`),
  INDEX `fk_estilMusical_has_artistes_artistes1_idx` (`idartistes` ASC) ,
  INDEX `fk_estilMusical_has_artistes_estilMusical1_idx` (`idestilMusical` ASC) ,
  CONSTRAINT `fk_estilMusical_has_artistes_estilMusical1`
    FOREIGN KEY (`idestilMusical`)
    REFERENCES `spotify`.`estilMusical` (`idestilMusical`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_estilMusical_has_artistes_artistes1`
    FOREIGN KEY (`idartistes`)
    REFERENCES `spotify`.`artistes` (`idartistes`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `usuaris`
  DROP `subcripcions_idsubcripcions`;

  ALTER TABLE `favorits` DROP PRIMARY KEY;

  ALTER TABLE `usuaris_favorits` CHANGE `idcancons` `idcancons` INT(11) NULL;
  ALTER TABLE `usuaris_favorits` CHANGE `idArtistes` `idArtistes` INT(11) NULL;

  DROP TABLE ` usuaris_favorits` IF EXISTS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
