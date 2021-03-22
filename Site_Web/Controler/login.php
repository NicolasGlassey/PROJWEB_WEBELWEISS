<?php
/**
 *  @file      login.php
    @brief     handle to authenticate a user
    @author    Created by Jonatan PERRET, Eliott JAQUIER
    @version   0.2 (08.03.2021)
 **/


/**
 * @brief display the good page in terms of login correct or not
 * @param $userInfos
 */
function controlLogin($userInfos){
    require_once("Controler/navigation.php");
    if (!(isset($userInfos['email'])) || !(isset($userInfos['password']))){
        displayLogin();
    }else{
        try{
            require_once("Model/userAccountManager.php");
            $userResultLoginInfos = login(htmlspecialchars($userInfos['email']),htmlspecialchars($userInfos['password']));
            displayHome();
        }catch (AccountExeption $ex){
            if($ex->getCode() == 3){
                displayLogin();
            }else{
                displayLoginWithErrors('Vos données de connexion sont erronées. Veuillez réessayer.');
            }
        }
    }
}

/**
 * @brief display the good page if the register failed or success
 */
function controlRegister(){
    require_once("Controler/navigation.php");
    try{
        require_once("Model/userAccountManager.php");
        //$userResultLoginInfos = register(email,passwprd);
    }catch (AccountExeption $ex){
        /*if($ex->getCode() == 3){

        }*/
    }
}