<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      imageUploadingManager.php
     * @brief     This model is used to managee the uploading to the server and the database
     * @author    Created by Eliott.JAQUIER
     * @version   1.0 (09.06.2021)
     */

    /**
     * @brief - Change the infos of image
     * @param $id
     * @param $name
     * @param $description
     * @param $takenDate
     * @param $longitude
     * @param $latitude
     */
    function changeImageInfo($id, $name, $description, $takenDate, $longitude, $latitude){
        require_once "Model/dbConnector.php";
        $infos = array($name,$description,$takenDate, $longitude, $latitude,$id);
        try {
            executeQuery("UPDATE `Webelweiss_CactusPic`.`photos` SET `name` = ?, `description` = ?, `takenDate` = ?, `longitude` = ?, `latitude` = ? WHERE (`id` = ?);", $infos);
        } catch (ModelDataExeption $e) {
        }
    }

    /**
     * @brief - Managing the image uploading to the server
     * @param $file - A file to upload
     * @return string|null - Return the unique hash of the file uploaded
     */
    function uploadImage($file){
        $hash = null;
        require_once "Model/imageUploader.php";
        if(canBeUploaded($file)){
            $hash = getHashFile($file);
            try {
                $pathToImage = uploadToServer($file);
                $userID = $_SESSION["userid"];
                require_once "Model/dbConnector.php";
                $datas = array($pathToImage,$hash,substr($file["name"], 0, 50),$userID);
                executeQuery("INSERT INTO `Webelweiss_CactusPic`.`photos` (`imagePath`, `imageHash`, `name`, `photographers_id`) VALUES (?, ?, ?, ?)",$datas);
            } catch (ImageUploaderExeption | ModelDataExeption $e) {
            }
        }
        return $hash;
    }

    /**
     * @brief This function is designed to obtain all the information of an image by his hash
     * @param $hash - The hash of image
     * @return null|mixed - Associative array if the image is found and 'null' if the image is not found
     */
    function getImageByHash($hash)
    {
        $imageInfos = null;
        try {
            $potentialImage = executeQuerySelect("SELECT photos.id,photos.imagePath,photos.imageHash,photos.name,photos.description,photos.takenDate,photos.longitude,photos.latitude,photos.photographers_id FROM Webelweiss_CactusPic.photos WHERE photos.imageHash = ?;", array($hash));
            if(count($potentialImage) == 1){
                $imageInfos = $potentialImage[0];
            }
        } catch (ModelDataExeption $e) {
        }
        return $imageInfos;
    }

    /**
     * @brief This function is designed to obtain all the information of an image by his hash
     * @param $imageID - The id of image
     * @return null|mixed - Associative array if the image is found and 'null' if the image is not found
     */
    function getImageByID($imageID)
    {
        $imageInfos = null;
        try {
            $potentialImage = executeQuerySelect("SELECT photos.id,photos.imagePath,photos.imageHash,photos.name,photos.description,photos.takenDate,photos.longitude,photos.latitude,photos.photographers_id FROM Webelweiss_CactusPic.photos WHERE photos.id = ?;", array($imageID));
            if(count($potentialImage) == 1){
                $imageInfos = $potentialImage[0];
            }
        } catch (ModelDataExeption $e) {

        }
        return $imageInfos;
    }

    /**
     * @brief For returning special Uploading management Exceptions relative to an image
     * Class ImageUploadingManagerExeption
     */
    class ImageUploadingManagerExeption extends Exception{

    }
?>