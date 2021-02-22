-- MySQL Workbench Synchronization
-- Generated: 2021-02-17 17:18
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Esther

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `youtube` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `youtube`.`Usuaris` (
  `idUsuari` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) BINARY NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `dataNaixement` DATE NOT NULL,
  `sexe` SET('dona', 'home', 'no binari') NOT NULL COMMENT 'Dona, home o no binari',
  `país` VARCHAR(45) NULL ,
  `codiPostal` VARCHAR(9) NULL ,
  PRIMARY KEY (`idUsuari`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `nom` (`nom` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`Videos` (
  `idVideos` INT(11) NOT NULL AUTO_INCREMENT,
  `titol` VARCHAR(45) NOT NULL,
  `descripcio` VARCHAR(120) NULL  ,
  `grandaria` FLOAT(11) NOT NULL COMMENT 'El tamany que ocupa el vídeo',
  `nomArxiu` VARCHAR(120) NOT NULL,
  `durada` FLOAT(11) NULL  COMMENT 'Minuts i segons de durada',
  `thumbnail` VARCHAR(220) NULL  COMMENT 'imatge inicial',
  `estat` SET('public', 'privat', 'ocult') NOT NULL DEFAULT 'public',
  PRIMARY KEY (`idVideos`),
  INDEX `titol` (`titol` ASC) ,
  INDEX `nomArxiu` (`nomArxiu` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`etiquetes` (
  `idetiquetes` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL COMMENT 'Nom de l\'etiqueta',
  PRIMARY KEY (`idetiquetes`),
  INDEX `nom` (`nom` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`Usuari_Publica_Videos` (
  `Usuaris_idUsuari` INT(11) NOT NULL,
  `Videos_idVideos` INT(11) NOT NULL,
  `data` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Usuaris_idUsuari`, `Videos_idVideos`),
  INDEX `fk_Usuaris_has_Videos_Videos1_idx` (`Videos_idVideos` ASC) ,
  INDEX `fk_Usuaris_has_Videos_Usuaris_idx` (`Usuaris_idUsuari` ASC) ,
  CONSTRAINT `fk_Usuaris_has_Videos_Usuaris`
    FOREIGN KEY (`Usuaris_idUsuari`)
    REFERENCES `youtube`.`Usuaris` (`idUsuari`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuaris_has_Videos_Videos1`
    FOREIGN KEY (`Videos_idVideos`)
    REFERENCES `youtube`.`Videos` (`idVideos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`canal` (
  `idcanal` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `dataCreació` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripció` VARCHAR(120) NOT NULL,
  `Videos_idVideos` INT(11) NOT NULL,
  `Usuaris_idUsuari` INT(11) NOT NULL COMMENT 'Propietari del canal',
  PRIMARY KEY (`idcanal`, `Usuaris_idUsuari`),
  INDEX `fk_canal_Videos1_idx` (`Videos_idVideos` ASC) ,
  INDEX `fk_canal_Usuaris1_idx` (`Usuaris_idUsuari` ASC) ,
  CONSTRAINT `fk_canal_Videos1`
    FOREIGN KEY (`Videos_idVideos`)
    REFERENCES `youtube`.`Videos` (`idVideos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_canal_Usuaris1`
    FOREIGN KEY (`Usuaris_idUsuari`)
    REFERENCES `youtube`.`Usuaris` (`idUsuari`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`reaccions` (
  `data` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `like/dislike` TINYINT(4) NULL DEFAULT 0 COMMENT '0 és dislike, 1 és like',
  `video/Comentari` SET('V', 'C') NULL ,
  `Videos_idVideos` INT(11) NOT NULL,
  `Usuaris_idUsuari` INT(11) NOT NULL,
  PRIMARY KEY (`Videos_idVideos`, `Usuaris_idUsuari`),
  UNIQUE INDEX `uniqueUsuariTipus` (`like/dislike` ASC) ,
  INDEX `fk_reaccions_Videos1_idx` (`Videos_idVideos` ASC) ,
  INDEX `fk_reaccions_Usuaris1_idx` (`Usuaris_idUsuari` ASC) ,
  CONSTRAINT `fk_reaccions_Videos1`
    FOREIGN KEY (`Videos_idVideos`)
    REFERENCES `youtube`.`Videos` (`idVideos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reaccions_Usuaris1`
    FOREIGN KEY (`Usuaris_idUsuari`)
    REFERENCES `youtube`.`Usuaris` (`idUsuari`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`playlist` (
  `idplaylist` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `data` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `estat` SET('public', 'privat') NULL DEFAULT 'public',
  PRIMARY KEY (`idplaylist`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`comentaris` (
  `idcomentaris` INT(11) NOT NULL AUTO_INCREMENT,
  `text` VARCHAR(254) NOT NULL,
  `data` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `Videos_idVideos` INT(11) NOT NULL,
  `Usuaris_idUsuari` INT(11) NOT NULL,
  PRIMARY KEY (`idcomentaris`, `Videos_idVideos`, `Usuaris_idUsuari`),
  INDEX `fk_comentaris_Videos1_idx` (`Videos_idVideos` ASC) ,
  INDEX `fk_comentaris_Usuaris1_idx` (`Usuaris_idUsuari` ASC) ,
  CONSTRAINT `fk_comentaris_Videos1`
    FOREIGN KEY (`Videos_idVideos`)
    REFERENCES `youtube`.`Videos` (`idVideos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentaris_Usuaris1`
    FOREIGN KEY (`Usuaris_idUsuari`)
    REFERENCES `youtube`.`Usuaris` (`idUsuari`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`playlist_has_Usuaris` (
  `playlist_idplaylist` INT(11) NOT NULL,
  `Usuaris_idUsuari` INT(11) NOT NULL,
  `publica/suscriu` SET('P', 'S') NULL  COMMENT 'P per usuari que publica la playList i S per usuai que suscriu la playList.',
  PRIMARY KEY (`playlist_idplaylist`, `Usuaris_idUsuari`),
  INDEX `fk_playlist_has_Usuaris_Usuaris1_idx` (`Usuaris_idUsuari` ASC) ,
  INDEX `fk_playlist_has_Usuaris_playlist1_idx` (`playlist_idplaylist` ASC) ,
  CONSTRAINT `fk_playlist_has_Usuaris_playlist1`
    FOREIGN KEY (`playlist_idplaylist`)
    REFERENCES `youtube`.`playlist` (`idplaylist`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_playlist_has_Usuaris_Usuaris1`
    FOREIGN KEY (`Usuaris_idUsuari`)
    REFERENCES `youtube`.`Usuaris` (`idUsuari`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`video_tenen_etiquetes` (
  `Videos_idVideos` INT(11) NOT NULL,
  `etiquetes_idetiquetes` INT(11) NOT NULL,
  PRIMARY KEY (`Videos_idVideos`, `etiquetes_idetiquetes`),
  INDEX `fk_Videos_has_etiquetes_etiquetes1_idx` (`etiquetes_idetiquetes` ASC) ,
  INDEX `fk_Videos_has_etiquetes_Videos1_idx` (`Videos_idVideos` ASC) ,
  CONSTRAINT `fk_Videos_has_etiquetes_Videos1`
    FOREIGN KEY (`Videos_idVideos`)
    REFERENCES `youtube`.`Videos` (`idVideos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Videos_has_etiquetes_etiquetes1`
    FOREIGN KEY (`etiquetes_idetiquetes`)
    REFERENCES `youtube`.`etiquetes` (`idetiquetes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`Usuaris_suscribeix_canal` (
  `Usuaris_idUsuari` INT(11) NOT NULL,
  `canal_idcanal` INT(11) NOT NULL,
  PRIMARY KEY (`Usuaris_idUsuari`, `canal_idcanal`),
  INDEX `fk_Usuaris_has_canal_canal1_idx` (`canal_idcanal` ASC) ,
  INDEX `fk_Usuaris_has_canal_Usuaris1_idx` (`Usuaris_idUsuari` ASC) ,
  CONSTRAINT `fk_Usuaris_has_canal_Usuaris1`
    FOREIGN KEY (`Usuaris_idUsuari`)
    REFERENCES `youtube`.`Usuaris` (`idUsuari`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuaris_has_canal_canal1`
    FOREIGN KEY (`canal_idcanal`)
    REFERENCES `youtube`.`canal` (`idcanal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `youtube`.`reproduccions` (
  `numero` BIGINT(255) NULL  COMMENT 'Número de reproduccions',
  `Videos_idVideos` INT(11) NOT NULL COMMENT 'Canal de les reproduccions',
  PRIMARY KEY (`Videos_idVideos`),
  CONSTRAINT `fk_reproduccions_Videos1`
    FOREIGN KEY (`Videos_idVideos`)
    REFERENCES `youtube`.`Videos` (`idVideos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `youtube`.`canal_has_Videos` (
  `canal_idcanal` INT(11) NOT NULL,
  `Videos_idVideos` INT(11) NOT NULL,
  PRIMARY KEY (`canal_idcanal`, `Videos_idVideos`),
  INDEX `fk_canal_has_Videos_Videos1_idx` (`Videos_idVideos` ASC) ,
  INDEX `fk_canal_has_Videos_canal1_idx` (`canal_idcanal` ASC) ,
  CONSTRAINT `fk_canal_has_Videos_canal1`
    FOREIGN KEY (`canal_idcanal`)
    REFERENCES `youtube`.`canal` (`idcanal`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_canal_has_Videos_Videos1`
    FOREIGN KEY (`Videos_idVideos`)
    REFERENCES `youtube`.`Videos` (`idVideos`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

ALTER TABLE `canal` DROP INDEX `fk_canal_Videos1_idx`;
ALTER TABLE youtube.canal DROP FOREIGN KEY fk_canal_Videos1;
ALTER TABLE `canal` DROP `Videos_idVideos`;

ALTER TABLE `youtube`.`reaccions` DROP INDEX `uniqueUsuariTipus`, ADD UNIQUE `uniqueUsuariTipus` (`like/dislike`, `Videos_idVideos`, `Usuaris_idUsuari`) USING BTREE;

ALTER TABLE videos ADD FULLTEXT(titol, descripcio);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;