INSERT INTO estilmusical( `nom`) VALUES ('Rock'),('Pop'),('Metal'),('Clasica'),('Underground'),('Indie');

INSERT INTO `usuaris`( `password`, `mail`, `nom`, `dataNaixement`, `sexe`, `pais`, `codiPostal`) 
VALUES ('12345','Pepon@gmail','Pepon',1979-01-01,'Home','Italia','09019'),
('12346','Pepe@gmail','Pepe',1989-10-12,'Home','Portugal','09009'),
('12347','Ana@gmail','Ana',1969-04-04,'Dona','Romania','07819'),
('12348','Maria@gmail','Maria',1979-11-04,'Dona','Italia','02154'),
('12349','Toni@gmail','Toni',1974-01-11,'Home','Romania','09019'),
('123441','Pol@gmail','Pol',1981-01-11,'Home','Italia','08079'),
('123411','Esther@gmail','Esther',1979-01-04,'Dona','Espanya','02154'),
('123104','Cris@gmail','Cris',2000-05-30,'Dona','Espanya','12345'),
('123124','Zoe@gmail','Zoe',2001-04-01,'Dona','Espanya','69854'),
('1244734','Jesus@gmail','Jesus',1956-02-01,'Home','Espanya','09042');

INSERT INTO subcripcions(dataInici, dataRenovacio, Premium, usuaris_idusuaris) 
VALUES (now(),now(),1,11),
(2020-01-01,2021-01-01,0,12),
(2020-01-12,now(),1,13),
(2020-02-05,now(),0,14),
(2020-02-05,2020-03-05,0,15),
(2002-05-06,now(),0,16),
(2020-12-05,2020-03-05,0,17),
(2020-10-05,2020-03-05,1,18),
(2020-02-105,2020-03-05,0,19),
(2020-02-05,2020-03-05,1,20);

INSERT INTO `paypal`(`usuariPaypal`, `subcripcions_idsubcripcions`) VALUES ('yolopagoya',11) ,('pagoluegoexisto',13) ;

INSERT INTO `tarjeta`(`numTarjeta`, `mesCaducitat`, `anyCaducitat`, `codiSeg`, `subcripcions_idsubcripcions`) 
VALUES ('12344567789',12,2022,180,18),
('12344511789',04,2023,010,20);
INSERT INTO `cancons`(`titol`, `durada`) 
VALUES ('In the Dark',5),
('Mi carro',3),
('Donde esta la mosca',2),
('Kiss by a rose',5),
('Cancion del pirata',3.5),
('Blue dabadi dabada',4.2),
('Hijo de la luna',5.2),
('Viva la numeracion',6),
('Reyes del metal',4.5),
('Unplugued',2.3),
('NorwegianReggeaton',10.3),
('Call of Cthulu',6.66),
('Valhalleluya',2.3),
('Sanctified with dynamite',2.5),
('Yekil and Hyde',4.2),
('Lost in my insanity',5),
('Holy diva',3.1),
('Thor',2.3),
('Odin',3.2),
('Freya',2.5),
('Loki',2.4);

INSERT INTO `artistes`( `nom`, `imatgeArtista`) 
VALUES ('Patukis','Patukis.jpg'),
('Aatxe','Aatxe.jpg'),
('Dimonietita','Dimonietita.jpg'),
('Quinteto afonia','Quinteto.jpg'),
('Destripando la historia','Destripando.jpg'),
('Dio','Dio.jpg'),
('Five death punch','Five.jpg'),
('North Kings','North.jpg'),
('Manolo Escobar','Manolo.jpg'),
('Reno Renardo','RenoRenardo.jpg'),
('Madonna','Madonna.jpg'),
('Mecano','Mecano.jpg');


INSERT INTO `album`(`any`, `titol`, `imatgePortada`) 
VALUES (1979,'blanco y megro mix','mix.jpg'),
(1980,'Dio',null),
(2020,'La mosca','mosca.png'),
(1985,'Lo mejor del Reno',null),
(1996,'Recopilatorio metal','metal.png'),
(2021,'Covers','cover'),
(1980,"pede. Nunc sed","album-52.png"),
(2001,"ultricies sem magna","album-54.png"),
(1995,"blandit. Nam nulla","album-73.png"),
(1980,"sed consequat auctor,","album-74.png");

INSERT INTO `cancons_has_album`(`cancons_idcancons`, `album_idalbum`) 
VALUES (1,1),(1,2),(1,3),(2,4),(12,4),(2,2),(2,1),
(10,10),(10,1),(10,2),(12,10),(12,7),(12,2),(12,1),
(11,1),(11,2),(11,3),(21,4),(11,5),(10,6),(2,7);

INSERT INTO `estilsmusicals`(`idestilMusical`, `idartistes`) VALUES (1,11),(1,12),(1,3),
(2,11),(2,10),(2,5),(2,4),
(3,1),(3,6),(3,5),(3,3),
(4,12),(4,3),(4,1),(4,2),
(5,7),(5,6),(5,10),(5,2),
(6,8),(6,9),(6,2),(6,12);

INSERT INTO `playlist`( `titol`, `dataCreacio`, `activa`, `dataEliminacio`, `idusuariCrea`) 
VALUES ('Temaso',2020-01-02,1,null,11),
('Metal',2000-01-20,1,null,20),
('Pachanga',2010-11-12,1,null,13);

INSERT INTO `llistareproduccio`(`idcancons`, `idPlaylist`, `idUsuariAfegeix`, `dataAfegeix`) 
VALUES (1,4,1,now()),(1,5,1,2020-01-02),(12,4,13,now());

INSERT INTO `pagaments`(`data`, `cost`, `usuaris_idusuaris`) 
VALUES (2000-01-05,100,11),
(1895-02-03,8,13),
(2020-01-01,20.3,20),(2021-01-01,20.3,20);

INSERT INTO `reproducions`(`numReproduccio`, `cancons_idcancons`) 
VALUES (100,1),(10,2),(56,3),(1023,4),(110,5),(99,6),(12,7),(1,8),(23,9),(945,10),
(45,11),(8,12),(26,13),(54,14),(49,15),(65,16),(52,17),(113,18),(30,19),(7,20),(77,21);

INSERT INTO `usuari_segueix`(`idartistes`, `idusuaris`) 
VALUES (1,11),(1,12),(1,13),(2,11),(2,12),(1,14),(2,13),(3,11),(3,12),(3,14);

INSERT INTO `artistes_favorits_usuaris`(`artistes_idartistes`, `usuaris_idusuaris`) 
VALUES (1,11),(1,12),(1,13),(2,11),(2,12),(1,14),(2,13),(3,11),(3,12),(3,14);

INSERT INTO `cancons_favorits_usuaris`(`cancons_idcancons`, `usuaris_idusuaris`) 
VALUES (1,11),(1,12),(1,13),(2,11),(2,12),(1,14),(2,13),(3,11),(3,12),(3,14);

