/*
Project : Webelwiss
Title : TestConfigBDD
Creator Mikael Juillet 
Date : 12.05.2021
Verssion : 0.1
*/

# Définis la database qui a besoin d'etre testé
USE webelweiss_cactuspic;

# Supression de données dans la table photographe 
DELETE FROM photographers;

# Supression de données dans la table photo 
DELETE FROM photos;

# Insertion d'un photographe avec manque de valleur (seul la description peux être en null) numéro d'id est fixé a 1 pour les tests.
INSERT INTO photographers (photographers.id, photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  (1, "test1@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji61", "nomtest1", "prenomtes1", NULL);
# Insertion d'un photographe avec un manque de valeur, numéro d'id est fixé a 2 pour les tests.
INSERT INTO photographers (photographers.id, photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  (2, "test2@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji62", "nomtest2", "prenomtes2", NULL);
# Insertion des potographes avec redondances entre deux insertion (seul l'email ne doit pas être en redondance)
INSERT INTO photographers (photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  ("test3@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji6", "nomtest", "prenomtest", "Hello world !");
# Deuxème insertion en redondance avec la première
INSERT INTO photographers (photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  ("test4@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji6", "nomtest", "prenomtest", "Hello world !");
	
	
# Insertion d'une photo avec manques de valleurs
# Note : Le numéro pour photographers_id à été choisi pour correspondre avec les photographers crée précédament.
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test1.jpg", "10100001101111111111111111", "image4",NULL ,NULL ,NULL  ,NULL ,  1);
# Deuxième insertion d'une photo avec un manques de valleurs
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test2.jpg", "10100001101111111111111112", "image5",NULL ,NULL ,NULL ,NULL ,  2);


# Insertion de photo avec redondances (seul imageHash ne doit pas être en redondance)
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test.jpg", "10100001101111111111111113", "image", "description", "2021-05-05", 46.787023, 6.649848, 1);
# Deuxième insertion avec redondance
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test.jpg", "10100001101111111111111114", "image", "description", "2021-05-05", 46.787023, 6.649848, 1);
# Troisième insertion avec redondance 
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test.jpg", "10100001101111111111111115", "image", "description", "2021-05-05", 46.787023, 6.649848, 2);
# Quatrième insertion avec redondance
INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("/img/test.jpg", "10100001101111111111111116", "image", "description", "2021-05-05", 46.787023, 6.649848, 2);

#update des photos
UPDATE photos SET photos.name = 'nouveau nom'  WHERE photos.name = 'image';

#update des photographes 
UPDATE photographers SET photographers.firstname = 'nouveau'  WHERE photographers.firstname = 'nomtest';

#supression en cascade
DELETE FROM photographers WHERE photographers.email = 'test1@test.test';

#Affichage du résultat de test
SELECT * FROM photos;
SELECT * FROM photographers;
SELECT * FROM photos INNER JOIN photographers ON photographers.id = photos.photographers_id;