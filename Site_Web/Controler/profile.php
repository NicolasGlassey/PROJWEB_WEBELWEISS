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
    if (isset($profileInfo)){
        try {
            require_once "Model/imagesManager.php";
            $userProfile = getImagesWithProfile($profileInfo);
            require_once "controler/navigation.php";
            displayProfile();
        }catch (ImageManagerExeption $ex){
            $error = "L'utilisateur que vous cherchez n'existe pas.";
            require_once "controler/navigation.php";
            displayProfileWithErrors($error);
        }
    }else{
        require_once "controler/navigation.php";
        displayHome();
    }
}




?>