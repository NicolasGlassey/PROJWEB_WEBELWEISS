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
    //TODO refactor in live (DRY)
    require_once("Controler/navigation.php");
    if (!(isset($userInfos['email'])) || !(isset($userInfos['password']))){
        //TODO update displayLogin with optional parameter to remove null parameter
        displayLogin(null);
    }else{
        try{
            require_once("Model/userAccountManager.php");
            login(htmlspecialchars($userInfos['email']),htmlspecialchars($userInfos['password']));
            displayHome();
        }catch (AccountException $ex){
            displayLogin('Vos données de connexion sont erronées. Veuillez réessayer.');
        }
    }
}
