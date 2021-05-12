/*
Project : Webelwiss
Title : TestConfigBDD
Creator Mikael Juillet 
Date : 12.05.2021
Verssion : 0.1
*/

#supression de donnée dans la table photographe 
DELETE FROM photographers;

#supression de donnée dans la table photo 
DELETE FROM photos;

#Insertion des photographe avce manque de valleurs (seul la description peux être en null)
INSERT INTO photographers (photographers.id, photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  (1, "test1@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji61", "nomtest1", "prenomtes1", NULL);
INSERT INTO photographers (photographers.id, photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  (2, "test2@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji62", "nomtest2", "prenomtes2", NULL);

#Insertion des potographe avec redondances (seul email ne doit pas être en redondance)
INSERT INTO photographers (photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  ("test3@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji6", "nomtest", "prenomtest", "Hello world !");
INSERT INTO photographers (photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  ("test4@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji6", "nomtest", "prenomtest", "Hello world !");
	
#Insertion des photos avec manques de valleurs (seul description, takenDate, longitude et latitude peuvent être en null)
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test1.jpg", "10100001101111111111111111", "image4",NULL ,NULL ,NULL  ,NULL ,  1);
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test2.jpg", "10100001101111111111111112", "image5",NULL ,NULL ,NULL ,NULL ,  2);

#Inserzion des photos avec redondances (seul imageHash ne doit pas être en redondance)
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test.jpg", "10100001101111111111111113", "image", "description", "2021-05-05", 46.787023, 6.649848, 1);
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test.jpg", "10100001101111111111111114", "image", "description", "2021-05-05", 46.787023, 6.649848, 1);
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test.jpg", "10100001101111111111111115", "image", "description", "2021-05-05", 46.787023, 6.649848, 2);
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test.jpg", "10100001101111111111111116", "image", "description", "2021-05-05", 46.787023, 6.649848, 2);
#update des photos
UPDATE photos SET photos.name = 'nouveau nom'  WHERE photos.name = 'image';

#update des photographes 
UPDATE photographers SET photographers.firstname = 'nouveau'  WHERE photographers.firstname = 'nomtest';

#supression en cascade
DELETE FROM photographers WHERE photographers.email = 'test1@test.test';

#Affichage du résultat
SELECT * FROM photos;
SELECT * FROM photographers;
SELECT * FROM photos INNER JOIN photographers ON photographers.id = photos.photographers_id;