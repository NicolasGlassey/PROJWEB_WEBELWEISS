/*
Project : Webelwiss
Title : JsonToBdd_PopulationData.sql
Creator Mikael Juillet 
Date : 15.06.2021
Verssion : 0.1
*/

USE webelweiss_cactuspic;

INSERT INTO photographers (photographers.email, photographers.passwordHash, photographers.firstname, photographers.lastname, photographers.description) VALUES  ("Test1@test.test", "$2y$10$4lfvjo2ReAvYDezexab80ul8\/69sMuDJcabCIfODjG8qJK.BU.Ji6", "Test1", "Test1", NULL);

INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	VALUES ("https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg", "5335EA0631394DEBF571E3BA77B1FFC5", "Grapefruit", "description", NULL, NULL, NULL, 1);

INSERT INTO photos (photos.imagePath, photos.imageHash, photos.name, photos.description, photos.takenDate, photos.longitude, photos.latitude, photos.photographers_id)	
VALUES ("https://upload.wikimedia.org/wikipedia/commons/a/a9/Edelweiss_(5).JPG", "BBB0239744B3B61F676CFF3D84FAC7D7", "edelweiss", "Une belle edelweiss", "2021-05-05", 17.35, 03.06, 1);


