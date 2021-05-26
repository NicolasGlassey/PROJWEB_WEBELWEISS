<?php
/**
     @file      navigation.php
     @brief     redirecting user
     @author    Created by Jonatan PERRET, Eliott JAQUIER, Mikael Juillet
     @version   0.3 (26.05.2021)
**/

/**
 * @brief display the home page
 */
function displayHome(){
    require 'View/home.php';
}

/**
 * @brief display the login page
 * @param $errors - get errors
 */
function displayLogin($errors){
    GLOBAL $_errorMsg;
    $_errorMsg = $errors;
    require 'View/login.php';
}

/**
 * @brief display the login page
 * @param $userImages - retrieve images and their information from an user
 * @param $userInfos - get information about an user
 * @param $error - get errors
 * //TODO DONE les paramètres ne sont pas documentés
 */
function displayProfileUser($userImages, $userInfos, $error){
    Global $userProfileImages;
    Global $userProfileInfos;
    Global $profileError;

    $profileError = $error;
    $userProfileImages = $userImages;
    $userProfileInfos = $userInfos;
    require "View/profileUser.php";
}
