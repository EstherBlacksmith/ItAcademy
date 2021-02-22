INSERT INTO provincia VALUES 
(1,"Barcelona"),(2,"Tarragona"),(3,"Lleida"),(4,"Girona");

INSERT INTO localitat VALUES 
(1,"Barcelona",1),(2,"Hospitalet",1),(3,"Santa Coloma",1),(4,"Badalona",1);

INSERT INTO `direccions`(`DireccioAlias`, `Carrer`, `Numero`, `Pis`, `Porta`, `Codi postal`, `Provincia_idProvincia`) 
 VALUES ('Tienda Gran vía', 'Gran Vía de les Corts Catalanes', '1146',NULL, NULL, '08019', 1),
	   ('Tienda Córcega', 'Cócega', '165',NULL, NULL, '08030', 1);

INSERT INTO `client`(`Nom`, `CognomPrimer`, `CognomSegon`, `telefon`)
 VALUES ('Javier','Coll','Rodriguez','602902669'),('Esther','Herrero',NULL,'650542290'),
 ('Carlitos','García',NULL,'669063253'),('Pepita','Coll',NULL,'650542200'),('Trufa','Coll','Rodríguez','650222200');

INSERT INTO `botiga`(`Botiga`, `Direccions_idDirecciones`) 
 VALUES ('Gran Vía',1),('Córcega',2);

INSERT INTO `treballador`(`Nom`, `CognomPrimer`, `CognomSegon`, `NIF`, `Telefon`, `Ocupacio`, `Botiga_idBotiga`) 
VALUES ('Jordi','Ferrer','Salinas','43520039-H','602926587','Cuiner',1),('Sandra','Casillas','Pérez','45262039-M','665842369','Repartidor',1),
('Marta','Mercedes','García','43528739-H','698526587','Cuiner',2),('Georgina','López','Mode','41262039-M','65028941','Repartidor',2);

INSERT INTO `direccions`(`DireccioAlias`, `Carrer`, `Numero`, `Pis`, `Porta`, `Codi postal`, `Provincia_idProvincia`) 
 VALUES ('Principal', 'Roc boronat', '1146','tercer',4, '08019',4),
	   ('Principal', 'Enric granados', '39','segón', 3, '08019', 1),
       ('Principal', 'Llul', '395','tercer',4, '08019',1),
	   ('Principal', 'Ronda de la guineueta vella', '56','segón', 3, '08042', 1),
	   ('Principal', 'Diagonal', '35','entresol', '08019', 1),
	   ('Principal', 'Córcega', '200','primer',2, '08030', 1);

INSERT INTO `producte`(`Nom`, `Tipus`, `Descripcio`, `Imatge`, `Preu`) 
VALUES ('Margarita','Pizza','pizza solos amb tomàquet',null,8.5),
('Diabola','Pizza','pizza amb bitxo picant',null,11.5),
('Cocacola','Beguda','resfresc amb sabor cola',null,2.5),
('Damm','Beguda','cervesa',null,1.5),
('A caballo','Hamburguesa','hamburguesa amb ou ferrat',null,12.5);

INSERT INTO `categoria pizza`(`Categoria`) VALUES ('Promocional'),('Temporada'),('Habitual');

INSERT INTO `pizza`(`Nom`, `Producte_idProducte`, `Categoria Pizza_idCategoria Pizza`) VALUES ('Margarita',1,1),('Diabola',2,1);

INSERT INTO `beguda`(`Nom`, `Producte_idProducte`) VALUES ('Cocacola',3), ('Damm',4);

INSERT INTO `hamburguesa`( `Nom`, `Producte_idProducte`) VALUES ('A caballo',5);

INSERT INTO `comanda`(`idClient`, `Domicili`, `TotalComanda`, `Treballador_idTreballador`) VALUES (1,'Domicili',23,1), (2,'Recollida',10.5,2);

INSERT INTO `comandalinies` (`idComandaLinies`, `ComandaLinies`, `idComanda`, `idProducte`, `Quantitat`, `Comanda_idComanda`, `Producte_idProducte`) VALUES (NULL, '1', '1', '1', '1', '1', '1'), (NULL, '2', '1', '2', '1', '2', '2');