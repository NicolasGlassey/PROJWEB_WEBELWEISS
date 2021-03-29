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
 */
function displayLoginWithErrors($errors){
    GLOBAL $_errorMsg;
    $_errorMsg = $errors;
    displayLogin();
}

/**
 * @brief display the profile page with error message
 */
function displayProfileUserWithErrors($error)
{
    Global $profileError;
    $profileError = $error;
    require "view/profileUser.php";
}

/**
 * @brief display the login page
 */
function displayProfileUser($userImages, $userInfos){
    Global $userProfileImage;
    Global $userProfileInfos;
    $userProfileImage = $userImages;
    $userProfileInfos = $userInfos;
    require "view/profileUser.php";
}
