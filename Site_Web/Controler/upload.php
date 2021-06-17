<?php
/**
 * Project : ProgWEB - Images upload site
 * @file      upload.php
 * @brief     This controller is used to manage images
 * @author    Created by Jonatan.PERRET
 * @version   1.0 (16.06.2021)
 */



/**
 * @brief display and manage the upload of an image
 * @param $image - file, Image
 */
function controlImage($image){
    if (isset($image['myFile'])) {
        require_once "Model/imageUploadingManager.php";
        $hashImage = uploadImage(($image["myFile"]));
        if ($hashImage != null) {
            global $_photoInfo;
            $_photoInfo = getImageByHash(($hashImage));
            $_SESSION["imageID"] = $_photoInfo["id"];
            require "View/uploadForm.php";
        } else {
            GLOBAL $_errorMsg;
            $_errorMsg = "Impossible d'ajouter l'image";
            require "View/uploadImage.php";
        }
    } else {
        require "View/uploadImage.php";
    }
}


/**
 * @brief display the second form to metadata of an image
 * @param $imageDatas - array, Metadata from image
 */
function controlImageDatas($imageDatas){
    if(isset($imageDatas['imageNameInput']) && isset($_SESSION["imageID"])){
        require_once "Model/imageUploadingManager.php";
        if($imageDatas["DescInput"] == ""){
            $imageDatas["DescInput"] = null;
        }
        if($imageDatas["dateImput"] == ""){
            $imageDatas["dateImput"] = null;
        }
        if($imageDatas["longitudeInput"] == ""){
            $imageDatas["longitudeInput"] = null;
        }
        if($imageDatas["latitudeInput"] == ""){
            $imageDatas["latitudeInput"] = null;
        }
        changeImageInfo($_SESSION["imageID"], $imageDatas["imageNameInput"], $imageDatas["DescInput"], $imageDatas["dateImput"] ,$imageDatas["longitudeInput"], $imageDatas["latitudeInput"]);
        require "Controler/profile.php";
        displayProfile($_SESSION['userid']);
    }else{
        require "View/uploadImage.php";
    }
}


?>