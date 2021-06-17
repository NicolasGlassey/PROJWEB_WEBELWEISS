<?php
/**
 * Project : ProgWEB - Images upload site
 * @file      imagesManager.php
 * @brief     This model is used to manage images
 * @author    Created by Eliott.JAQUIER
 * @version   1.0 (22.03.2021)
 */

require_once "Model/dbConnector.php";
/**
 * @brief For returning special ImageManager Exceptions relative to the user
 * Class AccountException
 */
class ImageManagerUserException extends Exception{

}

/**
 * @brief Get all images of a user
 * @param $profileID - Id of the user
 * @return array - all images (can be a empty array is no image were found) ONE IMAGE IS :(person,name,description,url...)
 * @throws ImageManagerUserException - throw "User not exists" if the $profileID is not in the Database
 */
function getImagesWithProfile($profileID): array
{
    require_once('Model/userInfoProcess.php');
    $userProfile = getUserInfosByID($profileID);
    $imageOfProfile = array();
    if($userProfile != null){
        try {
            $imageOfProfile = executeQuerySelect("SELECT photos.id,photos.imagePath,photos.imageHash,photos.name,photos.description,photos.takenDate,photos.longitude,photos.latitude,photos.photographers_id FROM Webelweiss_CactusPic.photos WHERE photos.photographers_id=?;", array($profileID));
        } catch (ModelDataExeption $e) {
            $imageOfProfile = array();
        }
    }else{
        throw new ImageManagerUserException("User not exists",0);
    }
    return $imageOfProfile;
}

/**
 * @brief get all images on the site
 * @return mixed - all images on the site
 */
function getAllImages(){
    return executeQuerySelect("SELECT photos.id,photos.imagePath,photos.imageHash,photos.name,photos.description,photos.takenDate,photos.longitude,photos.latitude,photos.photographers_id FROM Webelweiss_CactusPic.photos",null);
}
?>