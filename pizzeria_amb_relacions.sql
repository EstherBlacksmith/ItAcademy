-- MySQL Workbench Synchronization
-- Generated: 2021-02-12 20:10
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Esther

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `pizzeria` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Provincia` (
  `idProvincia` INT(11) NOT NULL AUTO_INCREMENT,
  `Provincia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idProvincia`),
  UNIQUE INDEX `idProvincia_UNIQUE` (`idProvincia` ASC) ,
  UNIQUE INDEX `Provincia_UNIQUE` (`Provincia` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Localitat` (
  `idLocalitat` INT(11) NOT NULL AUTO_INCREMENT,
  `Localitat` VARCHAR(45) NOT NULL,
  `Provincia_idProvincia` INT(11) NOT NULL,
  PRIMARY KEY (`idLocalitat`, `Provincia_idProvincia`),
  UNIQUE INDEX `idLocalitat_UNIQUE` (`idLocalitat` ASC) ,
  UNIQUE INDEX `Localitat_UNIQUE` (`Localitat` ASC) ,
  INDEX `fk_Localitat_Provincia_idx` (`Provincia_idProvincia` ASC) ,
  CONSTRAINT `fk_Localitat_Provincia`
    FOREIGN KEY (`Provincia_idProvincia`)
    REFERENCES `pizzeria`.`Provincia` (`idProvincia`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Client` (
  `idClient` INT(11) NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(60) NOT NULL,
  `CognomPrimer` VARCHAR(60) NOT NULL,
  `CognomSegon` VARCHAR(60) NULL  ,
  `telefon` CHAR(9) NULL  ,
  `Direccions_idDirecciones` INT(11) NULL,
  PRIMARY KEY (`idClient`),
  INDEX `telefon` (`telefon` ASC) ,
  INDEX `NomCognom` (`Nom` ASC, `CognomPrimer` ASC),
  INDEX `fk_Client_Direccions1_idx` (`Direccions_idDirecciones` ASC)  )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Direccions` (
  `idDirecciones` INT(11) NOT NULL AUTO_INCREMENT,
  `DireccioAlias` VARCHAR(45) NOT NULL,
  `Carrer` VARCHAR(60) NOT NULL,
  `Numero` INT(11) NULL  ,
  `Pis` VARCHAR(20) NULL  COMMENT 'Número de pis, baixos, entresol...',
  `Porta` INT(11) NULL  ,
  `Codi postal` CHAR(5) NOT NULL, 
  `Provincia_idProvincia` INT(11) NOT NULL,
  PRIMARY KEY (`idDirecciones`),
  INDEX `alias` (`DireccioAlias` ASC) ,
  INDEX `fk_Direccions_Provincia1_idx` (`Provincia_idProvincia` ASC) ,
  CONSTRAINT `fk_Direccions_Provincia1`
    FOREIGN KEY (`Provincia_idProvincia`)
    REFERENCES `pizzeria`.`Provincia` (`idProvincia`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Producte` (
  `idProducte` INT(11) NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(45) NOT NULL,
  `Tipus` SET('pizza', 'hamburguesa', 'beguda') NOT NULL DEFAULT 'pizza',
  `Descripcio` VARCHAR(80) NULL ,
  `Imatge` VARCHAR(60) NULL  COMMENT 'URL de la imatge',
  `Preu` FLOAT(11) NULL ,
  PRIMARY KEY (`idProducte`),
  UNIQUE INDEX `Nom_UNIQUE` (`Nom` ASC),
  INDEX `Tipus` (`Tipus` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Categoria Pizza` (
  `idCategoria Pizza` INT(11) NOT NULL AUTO_INCREMENT,
  `Categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria Pizza`),
  UNIQUE INDEX `Categoria_UNIQUE` (`Categoria` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Pizza` (
  `idPizza` INT(11) NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(45) NOT NULL,
  `Producte_idProducte` INT(11) NOT NULL,
  `Categoria Pizza_idCategoria Pizza` INT(11) NOT NULL,
  PRIMARY KEY (`idPizza`, `Producte_idProducte`),
  UNIQUE INDEX `Nom_UNIQUE` (`Nom` ASC) ,
  INDEX `fk_Pizza_Producte1_idx` (`Producte_idProducte` ASC) ,
  INDEX `fk_Pizza_Categoria Pizza1_idx` (`Categoria Pizza_idCategoria Pizza` ASC) ,
  CONSTRAINT `fk_Pizza_Producte1`
    FOREIGN KEY (`Producte_idProducte`)
    REFERENCES `pizzeria`.`Producte` (`idProducte`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Pizza_Categoria Pizza1`
    FOREIGN KEY (`Categoria Pizza_idCategoria Pizza`)
    REFERENCES `pizzeria`.`Categoria Pizza` (`idCategoria Pizza`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


CREATE TABLE IF NOT EXISTS `pizzeria`.`Beguda` (
  `IdBeguda` INT(11) NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(45) NOT NULL,
  `Producte_idProducte` INT(11) NOT NULL,
  PRIMARY KEY (`idBeguda`, `Producte_idProducte`),
  UNIQUE INDEX `Nom_UNIQUE` (`Nom` ASC) ,
  INDEX `fk_Beguda_Producte1_idx` (`Producte_idProducte` ASC) ,
  CONSTRAINT `fk_Beguda_Producte1`
    FOREIGN KEY (`Producte_idProducte`)
    REFERENCES `pizzeria`.`Producte` (`idProducte`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Hamburguesa` (
  `idHamburguesa` INT(11) NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(45) NOT NULL,
  `Producte_idProducte` INT(11) NOT NULL,
  PRIMARY KEY (`idHamburguesa`, `Producte_idProducte`),
  UNIQUE INDEX `Nom_UNIQUE` (`Nom` ASC) ,
  INDEX `fk_Hamburguesa_Producte1_idx` (`Producte_idProducte` ASC) ,
  CONSTRAINT `fk_Hamburguesa_Producte1`
    FOREIGN KEY (`Producte_idProducte`)
    REFERENCES `pizzeria`.`Producte` (`idProducte`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Botiga` (
  `idBotiga` INT(11) NOT NULL AUTO_INCREMENT,
  `Botiga` VARCHAR(45) NOT NULL,
  `Direccions_idDirecciones` INT(11) NOT NULL,
  PRIMARY KEY (`idBotiga`, `Direccions_idDirecciones`),
  INDEX `Botiga` (`Botiga` ASC) ,
  INDEX `fk_Botiga_Direccions1_idx` (`Direccions_idDirecciones` ASC) ,
  CONSTRAINT `fk_Botiga_Direccions1`
    FOREIGN KEY (`Direccions_idDirecciones`)
    REFERENCES `pizzeria`.`Direccions` (`idDirecciones`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Treballador` (
  `idTreballador` INT(11) NOT NULL AUTO_INCREMENT,
  `Nom` VARCHAR(45) NOT NULL,
  `CognomPrimer` VARCHAR(45) NOT NULL,
  `CognomSegon` VARCHAR(45) NULL ,
  `NIF` CHAR(12) NOT NULL,
  `Telefon` CHAR(9) NULL ,
  `Ocupacio` SET('Cuiner', 'Repartidor') NULL ,
  `Botiga_idBotiga` INT(11) NOT NULL,
  PRIMARY KEY (`idTreballador`),
  UNIQUE INDEX `NIF_UNIQUE` (`NIF` ASC) ,
  INDEX `NomCognom` (`Nom` ASC, `CognomPrimer` ASC) ,
  INDEX `fk_Treballador_Botiga1_idx` (`Botiga_idBotiga` ASC) ,
  CONSTRAINT `fk_Treballador_Botiga1`
    FOREIGN KEY (`Botiga_idBotiga`)
    REFERENCES `pizzeria`.`Botiga` (`idBotiga`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`Comanda` (
  `idComanda` INT(11) NOT NULL AUTO_INCREMENT,
  `DataHora` DATETIME DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `idClient` INT(11) NOT NULL,
  `Domicili` SET('Domilici', 'Recollida') NULL  COMMENT 'Si és una recollida a botiga o és repartiment a domicili',
  `TotalComanda` FLOAT(11) NOT NULL DEFAULT 0 COMMENT 'Preu total',
  `Treballador_idTreballador` INT(11) NOT NULL,
  PRIMARY KEY (`idComanda`),
  INDEX `fk_Comanda_Treballador1_idx` (`Treballador_idTreballador` ASC) ,
  CONSTRAINT `fk_Comanda_Treballador1`
    FOREIGN KEY (`Treballador_idTreballador`)
    REFERENCES `pizzeria`.`Treballador` (`idTreballador`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `pizzeria`.`ComandaLinies` (
  `idComandaLinies` INT(11) NOT NULL AUTO_INCREMENT,
  `ComandaLinies` INT(11) NOT NULL,
  `idComanda` INT(11) NOT NULL,
  `idProducte` INT(11) NOT NULL COMMENT 'IdPizza,IdHambiurguesa o IdBeguda',
  `Quantitat` INT(11) NULL,
  `Producte_idProducte` INT(11) NOT NULL,
  PRIMARY KEY (`idComandaLinies`, `Comanda_idComanda`),
  INDEX `idComanda` (`idComanda` ASC) ,
  INDEX `ComandaMesLinia` (`idComanda` ASC, `ComandaLinies` ASC) ,
  INDEX `fk_ComandaLinies_Producte1_idx` (`Producte_idProducte` ASC) ,
  CONSTRAINT `fk_ComandaLinies_Comanda1`
    FOREIGN KEY (`Comanda_idComanda`)
    REFERENCES `pizzeria`.`Comanda` (`idComanda`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_ComandaLinies_Producte1`
    FOREIGN KEY (`Producte_idProducte`)
    REFERENCES `pizzeria`.`Producte` (`idProducte`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
