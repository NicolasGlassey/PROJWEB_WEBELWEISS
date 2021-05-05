<?php

/**
    @file      index.php
    @brief     redirect user where he has to go
    @author    Created by Jonatan PERRET
    @version   0.1 (08.03.2021)
**/
require_once 'Controler/navigation.php';

$_GET['userId'] = 2;//TODO à supprimer - ne jamais écrire dans les variables $_GET ou $_POST

if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action){
        case 'login':
            require_once 'Controler/login.php';
            controlLogin($_POST);
            break;
        case 'profile' :
            //require "View/profileUser.php";//TODO supprimer cette ligne en commentaire
            require "Controler/profile.php";
            displayProfile($_GET);
            break;
        default:
            displayHome();
            break;
    }
}else{
    displayHome();
}