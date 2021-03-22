<?php
/**
 * Project : ProgWEB - Images upload site
 * @file      imagesManager.php
 * @brief     This model is used to manage images
 * @author    Created by Eliott.JAQUIER
 * @version   1.0 (22.03.2021)
 */

#region REQUIRE
require_once('Model/jsonManager.php');
#endregion

#region CONSTANTS
const pathNameImage = 'Data/';
const fileNameImage = 'images.json';
#endregion

/**
 * @brief For returning special ImageManager Exeptions
 * Class AccountExeption
 */
class ImageManagerExeption extends Exception{

}

/**
 * @brief get all images of a user
 * @param $profileID
 * @return array - all images (can be 0 lenght) ONE IMAGE IS :(person,name,description,url)
 */
function getImagesWithProfile($profileID){
    require_once('Model/userInfoProcess.php');
    $userProfile = getUserInfo($profileID);
    $imageOfProfile = array();

    if($userProfile != false){
        $images = getAllImages();
        foreach ($images as $image) {
            if($image["person"] == $profileID){
                array_push($imageOfProfile,$image);
            }
        }
    }else{
        throw new ImageManagerExeption("User not exists",0);
    }
    return $imageOfProfile;
}

/**
 * @brief get all images on the site
 * @return mixed - all images on the site
 */
function getAllImages(){
    return getJsonContent(pathNameImage.fileNameImage);
}
?>