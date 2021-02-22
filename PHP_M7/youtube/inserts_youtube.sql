INSERT INTO `usuaris`(`email`, `password`, `nom`, `dataNaixement`, `sexe`, `país`, `codiPostal`) 
VALUES ('pepita@gmail.com','103456','pepita',1979-01-22,'dona','Espanya','08019'),
('Jordi@gmail.com','103456','Jordi',1980-01-22,'home','Espanya','08019'),
('Luz@gmail.com','103456','Luz',1989-01-01,'dona','Espanya','08019'),
('Javi@gmail.com','103456','Javi',1950-02-10,'home','Espanya','08079'),
('Charlol@gmail.com','103456','Charlol',1984-11-11,'dona','Espanya','08010'),
('Lola@gmail.com','103456','Lola',1980-01-01,'dona','Espanya','08045'),
('Carlos@gmail.com','103456','Carlos',1960-02-03,'home','Espanya','08030'),
('Purificacion@hotmail.com','103456','Purificacion',1950-03-30,'dona','Espanya','08022'),
('Porro@gmail.com','103456','Crema de porro',1962-01-14,'home','Espanya','08029'),
('Antonioa@hotmail.com','103456','Antonio',1964-05-16,'dona','Espanya','08018'),
('pere@gmail.com','103456','Pere',1980-10-24,'home','Espanya','08042');

INSERT INTO `etiquetes`(`nom`) VALUES ('Animals'),('Esports'),('Cuina'),
('DIY'),('Musica'),('Historia'),('Actualitat'),('Noticies'),('Influencers'),('Reacions');


INSERT INTO `videos`(`titol`, `descripcio`, `grandaria`, `nomArxiu`, `durada`, `thumbnail`, `estat`) 
VALUES ('Gat que menja','Un gat petit menjant',130,'gat123',20,'gat123','public'),
('Gos que menja','Un gosgat petit menjant',130,'gos123',30,'gos123','public'),
('Caigudes','caigudes divertides',130,'caigudes123',55,'cagudes123','public'),
('maquillatje ulls','com fer-se la ratlla dels ulls',130,'ulls123',20,'ojo','privat'),
('noticia xina','noticies desde Xina',200,'notXina55',20,'notXina','public'),
('noticia catalunya','noticies desde catalunya',200,'notCat',20,'notcat','ocult'),
('reaccio noticia xina','reacciones a les noticies desde Xina',200,'notXina55',20,'notXina','public');


INSERT INTO `video_tenen_etiquetes`(`Videos_idVideos`, `etiquetes_idetiquetes`) 
VALUES (1,1),(2,1),(3,2),(4,5),(5,7),(6,7),(7,10),(7,7);

INSERT INTO `usuari_publica_videos`(`Usuaris_idUsuari`, `Videos_idVideos`, `data`) 
VALUES (13,1,now()),
       (14,2,now()),
       (15,3,now()),
       (16,4,now()),
       (17,5,now()),
       (13,6,now()),
       (14,7,now());

INSERT INTO `canal`(`nom`, `dataCreació`, `descripció`, `Usuaris_idUsuari`) 
VALUES ('Animalitos',2021-01-02,'Animales graciosos',13),
('Noticias',2020-03-02,'Noticias del mundo',14);


INSERT INTO `canal_has_videos`(`canal_idcanal`, `Videos_idVideos`) 
VALUES (4,1),(4,2),(5,5),(5,6),(5,7);

INSERT INTO `usuaris_suscribeix_canal`(`Usuaris_idUsuari`, `canal_idcanal`) 
VALUES (13,5),(14,4),(17,4),(17,5),(13,4);

INSERT INTO `playlist`( `nom`, `data`, `estat`) 
VALUES ('noticias',now(),'privat'), ('video graciosos',now(),'public');

INSERT INTO `playlist_has_usuaris`(`playlist_idplaylist`, `Usuaris_idUsuari`, `publica/suscriu`) 
VALUES (1,13,'publica'),(1,14,'suscriu'),(1,15,'suscriu'),(2,13,'suscriu'),(2,17,'publica');

INSERT INTO `reproduccions`(`numero`, `Videos_idVideos`)
VALUES (99,1),(80,2),(3,4),(12,5),(13,6),(54,7);

INSERT INTO `reaccions`(`data`, `like/dislike`, `video/Comentari`, `Videos_idVideos`, `Usuaris_idUsuari`) 
VALUES (now(),'0','video',1,13),
(now(),'0','video',1,14),
(now(),'0','video',1,15),
(now(),'0','video',1,16),
(now(),'0','video',1,17),
(now(),'0','comentari',1,18),
(now(),'0','video',1,19),
(now(),'1','video',1,20),
(now(),'1','comentari',1,21),
(now(),'1','video',1,22);

INSERT INTO `reaccions`(`data`, `like/dislike`, `video/Comentari`, `Videos_idVideos`, `Usuaris_idUsuari`) 
VALUES (now(),'0','video',2,13),
(now(),'0','video',2,14),
(now(),'0','video',2,15),
(now(),'0','video',5,16),
(now(),'1','video',2,17),
(now(),'0','comentari',2,18),
(now(),'0','video',2,19),
(now(),'1','video',2,20);


INSERT INTO `comentaris`(`text`, `data`, `Videos_idVideos`, `Usuaris_idUsuari`)
VALUES ('QUe gracioso el gatete!',now(),1,15),
('QUe gracioso el perrete!',now(),2,15),
('que bueno!',now(),1,20),
('QUe gracioso el gatete!',now(),1,18),
('QUe noticia mas mala!',now(),6,15),
('Que noticia mas buena',now(),5,15),
('Ola que ase',now(),1,16),
('emosido engañaos',now(),7,13);