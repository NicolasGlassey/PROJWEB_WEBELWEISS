<?php
/**
     @file      navigation.php
     @brief     redirecting user
     @author    Created by Jonatan PERRET, Eliott JAQUIER
     @version   0.1 (08.03.2021)
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
