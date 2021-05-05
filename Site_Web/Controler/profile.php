<?php
/**
 * Project : ProgWEB - Images upload site
 * @file    profile.php
 * @brief   This script is used to get profile information.
 * @author  Craeted by Mikael Juillet
 * @version 0.1 (27.03.2021)
 */

/**
 * @brief Display to get profile info
 * @param $profileInfo : //TODO expliquer ce qu'est un profileInfo
 */
function displayProfile($profileInfo){
    require_once "Controler/navigation.php";
    if (isset($profileInfo["id"])){
        try {
            require_once "Model/imagesManager.php";
            $userImages =getImagesWithProfile($profileInfo["id"]);
            require_once "Model/userInfoProcess.php";
            $userInfos =getUserInfo($profileInfo["id"]);
            displayProfileUser($userImages ,$userInfos);
        }catch (ImageManagerExeption $ex){
            $error = "L'utilisateur que vous cherchez n'existe pas.";
            //TODO cette fonction doit être revue. Utiliser une fonction "withErrors" n'est pas une bonne idée. Levée une exception avec "throw new Exception". Laissez là remonter jusqu'à la fonction qui est censé la traiter.
            displayProfileUserWithErrors($error);
        }finally{
            displayHome();
        }
    }else{
        displayHome();
    }
}