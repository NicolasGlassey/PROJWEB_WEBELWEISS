<?php
/**
    @file      index.php
    @brief     redirect user where he has to go
    @author    Created by Jonatan PERRET
    @author    Updated by Mikael Juillet
    @version   0.3 (13.06.2021)
**/
require_once 'Controler/navigation.php';
session_start();
if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action){
        case 'login':
            require_once 'Controler/login.php';
            controlLogin($_POST);
            break;
        case 'profile' :
            require "Controler/profile.php";
            displayProfile($_GET);
            break;
        case 'uploadImage' :
            require "Controler/upload.php";
            controlImage($_FILES);
            break;
        case 'uploadImageDatas':
            require "Controler/upload.php";
            controlImageDatas($_POST);
            break;
        default:
            displayHome();
            break;
    }
}else{
    displayHome();
}