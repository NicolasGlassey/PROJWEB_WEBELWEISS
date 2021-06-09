<?php
/**
 * Project : ProgWEB - Images upload site
 * @file    profile.php
 * @brief   This script is used to get profile information.
 * @author  Craeted by Mikael Juillet
 * @version 0.2 (26.05.2021)
 */

/**
 * @brief Display to get profile info
 * @param $profileInfo - the identifier of the profile that want to be displayed
 */
function displayProfile($profileInfo){
    require_once "Controler/navigation.php";
    $userImages = null;
    $userInfos = null;
    $error = null;
    if (isset($profileInfo["id"])){
        try {
            require_once "Model/imagesManager.php";
            $userImages =getImagesWithProfile($profileInfo["id"]);
            require_once "Model/userInfoProcess.php";
            $userInfos = getUserInfosByID($profileInfo["id"]);
        }catch (ImageManagerUserException $ex){
            $error = "L'utilisateur que vous cherchez n'existe pas.";
        }finally{
            displayProfileUser($userImages ,$userInfos, $error);
        }
    }else{
        displayHome();
    }
}