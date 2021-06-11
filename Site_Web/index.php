<?php
/**
    @file      index.php
    @brief     redirect user where he has to go
    @author    Created by Jonatan PERRET
    @author    Updated by Mikael Juillet
    @version   0.2 (09.06.2021)
**/
session_start();
require_once 'Controler/navigation.php';

if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action){
        case 'login':
            require_once 'Controler/login.php';
            controlLogin($_POST);
            break;
        case 'logout':
            require_once 'Controler/login.php';
            logout();
            displayHome();
            break;
        case 'profile' :
            require "Controler/profile.php";
            displayProfile($_GET);
            break;
        case 'uploadImage' :
            require "view/uploadImage.php";
            break;
        default:
            displayHome();
            break;
    }
}else{
    displayHome();
}