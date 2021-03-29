<?php

/**
    @file      index.php
    @brief     redirect user where he has to go
    @author    Created by Jonatan PERRET
    @version   0.1 (08.03.2021)
**/
require_once 'Controler/navigation.php';

$_GET['userId'] = 2;

if(isset($_GET['action'])){
    $action = $_GET['action'];
    switch ($action){
        case 'home':
            displayHome();
            break;
        case 'login':
            require_once 'Controler/login.php';
            $userInfos = $_POST;
            controlLogin($userInfos);
            break;
        case 'profile' :
            //require "View/profileUser.php";
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