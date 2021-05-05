<?php
/**
     @file      navigation.php
     @brief     redirecting user
     @author    Created by Jonatan PERRET, Eliott JAQUIER, MIkael Juillet
     @version   0.2 (27.03.2021)
**/

/**
 * @brief display the home page
 */
function displayHome(){
    require 'View/home.php';
}

/**
 * @brief display the login page
 */
function displayLogin(){
    require 'View/login.php';
}

/**
 * @brief display the login page with error message
 * //TODO cette fonction sera remplacée par une gestion d'exception dans displayLogin
 */
function displayLoginWithErrors($errors){
    GLOBAL $_errorMsg;
    $_errorMsg = $errors;
    displayLogin();
}

/**
 * @brief display the profile page with error message
 * //TODO cette fonction sera remplacée par une gestion d'exception dans displayProfileUser
 */
function displayProfileUserWithErrors($error)
{
    Global $profileError;
    $profileError = $error;
    require "View/profileUser.php";
}

/**
 * @brief display the login page
 * //TODO les paramètres ne sont pas documentés
 */
function displayProfileUser($userImages, $userInfos){
    Global $userProfileImages;
    Global $userProfileInfos;
    $userProfileImages = $userImages;
    $userProfileInfos = $userInfos;
    require "View/profileUser.php";
}
