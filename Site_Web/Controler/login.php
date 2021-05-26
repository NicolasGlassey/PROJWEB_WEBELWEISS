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
            //TODO cette varialbe $userResultLoginInfos n'est jamais utilisée. A revoir.
            $userResultLoginInfos = login(htmlspecialchars($userInfos['email']),htmlspecialchars($userInfos['password']));
            displayHome();
        }catch (AccountException $ex){
            if($ex->getCode() == 3){
                displayLogin();
            }else{
                //TODO cette fonction doit être revue. Utilisation d'une exception à la place de cette fonction"WithErrors".
                //TODO en cas d'erreur, la vue affiche des données confidentielles et techniques à l'utilisateur.
                displayLoginWithErrors('Vos données de connexion sont erronées. Veuillez réessayer.');
            }
        }
    }
}

/**
 * @brief display the good page if the register failed or success
 */
//TODO cette fonction n'est jamais appelée. A supprimer.
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