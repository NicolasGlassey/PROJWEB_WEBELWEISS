<?php
/**
 *  @file      login.php
    @brief     handle to authenticate a user
    @author    Created by Jonatan PERRET, Eliott JAQUIER
    @version   0.3 (26.05.2021)
 **/


/**
 * @brief display the good page in terms of login correct or not
 * @param $userInfos
 */
function controlLogin($userInfos){
    require_once("Controler/navigation.php");
    if (!(isset($userInfos['email'])) || !(isset($userInfos['password']))){
        displayLogin(null);
    }else{
        try{
            require_once("Model/userAccountManager.php");
            $userInfoDatabase = login(htmlspecialchars($userInfos['email']),htmlspecialchars($userInfos['password']));
            $_SESSION["username"] = $userInfoDatabase["firstname"]." ".$userInfoDatabase["lastname"];
            $_SESSION["userid"] =  $userInfoDatabase["id"];
            displayHome();
        }catch (AccountException $ex){
            displayLogin('Vos données de connexion sont erronées. Veuillez réessayer.');
        }
    }
}

/**
 * @brief - This function is used to clear the session of the user
 */
function logout(){
    $_SESSION["username"] = null;
    $_SESSION["userid"] =  null;
    session_destroy();
}