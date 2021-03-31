# PROJWEB_WEBELWEISS

## Introduction 
Ce project est crée par Webelweiss. 
Il consiste à crée un site web sur le thème de l'observation de la nature. 

## A propos de Webelweiss
Webelweiss est un site web crée par des élèves du CPNV, il a pour but de créer une platforme sur la quelle des utilisateurs peuvent partager une observation de nature faite à un endroit et une date précise. 

## Accès direct à la plateforme en ligne
| Le site web suivant possède la dernière version de la branche develop : webelweiss.diduno.education

## Télécharger le projet localement  
### Prérequis obligatoires
- Intérpreteur PHP (Version utilisée : 8.0.1)

### Prérequis conseillés
- Git-scm (Conseillé pour GitFlow)
- XDebug pour PHP
- XDebug extension chrome
- Celenium IDE
- PHPStorm (Version utilisée : 2020.3.2)
- Un serveur web (Apache...)

### Commencer le travail sur GIT
Commencez par cloner le projet avec 'git clone https://github.com/NicolasGlassey/PROJWEB_WEBELWEISS/'
Pour ce projet, la méthode de travail avec GitFLow est utilisée.
Initialisez GitFlow avec 'git flow init' en utilisant les paramètres par défaut.
Vous êtes maintenant sur la branche develop. *Remarque : utilisez 'git checkout' pour changer de branche (fonctionnalités...)*
Vous pouvez mainteant ouvrir le projet (sur PHPStorm par exemple).

### Mettre en place un serveur WEB sur PHPStorm
Commencez par renseiger la version de PHP utilisée dans PHPStorm (Sous : File/Settings/Languages & Frameworks/PHP) vous pouvez ajouter une configuration en haut à gauche du projet.
Une fois votre version de PHP renseignée, ajoutez une configuration en haut à gauche de votre éditeur en cliquant sur 'Edit configuration' puis sur le bouton d'ajout (+) en séléctionnant 'PHP Built-In Web Server'. Donnez lui un nom puis configurez le host (localhost pour le mode développement). Configurez le port sur 8080 au lieu de 80 (il est probable que le port 80 soit déjà pris ou bloqué sur la machine). Finalement, cliquez sur OK.
Sous "File/Settings/Build, Execution, Deployment/Deployment/" ajouter la référence du serveur web local en cliquant sur Add (+) puis In Place. 
Vous pouvez maintenant lancer votre serveur WEB en haut à gauche en cliquant sur sur le logo play en vert. Il est maintenant possible d'ouvrir un fichier PHP sur le serveur WEB.

### Collaboration
https://icescrum.cpnv.ch/p/PROJWEBWEB/#/taskBoard/948
