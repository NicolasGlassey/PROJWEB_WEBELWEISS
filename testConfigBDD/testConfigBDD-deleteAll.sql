/*
Project : Webelwiss
Title : TestConfigBDD-Remise a vide de la BDD
Creator Mikael Juillet 
Date : 12.05.2021
Verssion : 0.1
*/

#supression de donnée dans la table photographe 
DELETE FROM photographers;

#supression de donnée dans la table photo 
DELETE FROM photos;

#Affichage de vérification
SELECT * FROM photos;
SELECT * FROM photographers;