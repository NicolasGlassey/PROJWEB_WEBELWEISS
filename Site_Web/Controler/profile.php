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
 * @param $profileInfo
 */
function displayProfile($profileInfo){
    if (isset($profileInfo["id"])){
        try {
           //require_once "Model/imagesManager.php";
           // $userImages =getImagesWithProfile($profileInfo["id"]);
            require_once "Model/userInfoProcess.php";
            $userInfos =getUserInfo($profileInfo["id"]);
            require_once "controler/navigation.php";
            displayProfileUser(null ,$userInfos);
        }catch (ImageManagerExeption $ex){
            $error = "L'utilisateur que vous cherchez n'existe pas.";
            require_once "controler/navigation.php";
            displayProfileUserWithErrors($error);
        }
    }else{
        require_once "controler/navigation.php";
        displayHome();
    }
}
?>