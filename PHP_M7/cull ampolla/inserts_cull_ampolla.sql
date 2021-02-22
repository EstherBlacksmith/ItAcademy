INSERT INTO `adresses`( `carrer`, `pis`, `porta`, `ciutat`, `codiPostal`, `pais`) 
VALUES ('Llul','tercer','quarta','Barcelona','08019','Espanya'),
	    ('Valencia','Baixos',null,'Barcelona','08030','Espanya'),
        ('Trafalgar','local','A','Valencia','08019','Espanya');

INSERT INTO `adresses`( `carrer`, `pis`, `porta`, `ciutat`, `codiPostal`, `pais`) 
VALUES ('Llul 129','tercer','quarta','Barcelona','08019','Espanya'),
	    ('Mare de deu','56',"primer",'Barcelona','08030','Espanya'),
        ('Ronda Universitat','3','A','Badalona','08129','Espanya');


INSERT INTO `proveidors`(`nom`, `telefon`, `CIF`,'idAdresses') 
VALUES ('Ojales','652547896','123456789-A',4),
        ('La niña de tus ojos','235647859','325689749-B',5),
        ('Ojo de pollo','123456789','123456798-D',6);


INSERT INTO `marques`( `nom`, `proveidors_idproveidors`) 
VALUES ('Gafitas',1),('Gafotas',1),('Ojo de gato',1),('4 ojos',2),('Horus',3),('3 en un burro',3);

INSERT INTO `dadespersonals`( `nom`, `primerCognom`, `segonCognom`, `telefon`, `mail`, `dataregistre`, `tipus`, `idClientAmic`, `idAdresses`) 
VALUES ('Pedro','Garcia','Gomez','12345897','pedro@gmail.com', NOW(),'client',null,1),
('Para Pepin','Pon','Pan','12345127','pepin@gmail.com', NOW(),'client',null,2);

INSERT INTO `dadespersonals`( `nom`, `primerCognom`, `segonCognom`, `telefon`, `mail`, `dataregistre`, `tipus`, `idClientAmic`, `idAdresses`) 
VALUES ('Cristina','Cifuentes',null,'12345897','miMaster@gmail.com', NOW(),'treballador',null,3),
('Lola','Lolita',NUll,'666666666','LaLola@gmail.com', NOW(),'treballador',null,null);

INSERT INTO `ulleres`(`grausD`,`grausE`,`colorE`,`colorD`,`colorMontura`,`tipusMontura`,`preu`,`marques_idmarques`) 
VALUES(3.2,2.2,'sense', 'sense', 'vermell','pasta',1201),
 (0.2,2.2,'sense','sense','transparents','pasta',90,1),
 (0,0,'verds','verds','negre','pasta',220.20,2),
 (3.2,2.2,'sense','sense','vermell','pasta',100,2),
 (3.2,1.2,'sense','sense','daurat','metàl·lica',122,2),
(3.2,2.2,'sense','sense','gris','metàl·lica',85.2,5),
(3.2,2.2,'mirall','mirall','negre','pasta',130,5),
(3.8,1.2,'sense','sense','blau','pasta',115,6),
(3.2,5.2,'sense','sense','gris','pasta',120,6),
(3.2,2.2,'sense','sense','groga','pasta',47,6);

INSERT INTO `treballador_a_client`(`dadesPersonals_iddadesPersonals`, `dadesPersonals_iddadesPersonals1`, `idUlleres`) VALUES 
(1,3,1),(1,4,3);
INSERT INTO `treballador_a_client`(`dadesPersonals_iddadesPersonals`, `dadesPersonals_iddadesPersonals1`, `idUlleres`) VALUES 
(2,3,1),(1,3,6);

UPDATE `dadespersonals` SET `idClientAmic` = '1' WHERE `dadespersonals`.`iddadesPersonals` = 2;