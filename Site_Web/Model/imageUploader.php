<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      imageUploader.php
     * @brief     This model is used to upload image in the server
     * @author    Created by Eliott.JAQUIER
     * @version   1.0 (09.06.2021)
     */

    /**
     * @brief For returning special Upload Exceptions relative to image
     * Class ImageUploaderExeption
     */
    class ImageUploaderExeption extends Exception{

    }

    /**
     * @brief - Get the sha256 hash from a file
     * @return int|null
     */
    function getHashFile($file){
        return hash_file('crc32b', $file["tmp_name"]);
    }

    /**
     * @brief - This function determine if the file can be uploaded
     * @param $file - A file to upload (ex - $_FILES["fileToUpload"])
     * @return bool - if the file can be upload
     * @link - https://www.w3schools.com/php/php_file_upload.asp
     * @link - https://www.php.net/manual/fr/function.hash-file.php
     */
    function canBeUploaded($file): bool
    {
        if($file["error"] == 1){
            return false;
        }
        $imageFileType = strtolower(pathinfo(basename($file["name"]), PATHINFO_EXTENSION));

        //Check if image file is a actual image or fake image
        //TODO : $POST ! ICI
        if (isset($_POST["submit"])) {
            $check = getimagesize($file["tmp_name"]);
            if ($check == false) {
                return false;
            }
        }

        // Check file size
        if ($file["size"] > 50000000) {
            return false;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            return false;
        }


        require_once "Model/dbConnector.php";
        try {
            $target_name = getHashFile($file);
            $resultBDD = executeQuerySelect("SELECT photos.imageHash FROM Webelweiss_CactusPic.photos WHERE photos.imageHash = ?;", array($target_name));
            return (count($resultBDD) == 0);
        } catch (ModelDataExeption $e) {
            return false;
        }
    }

    /**
     * @param $file - A file to upload (ex : $_FILES["fileToUpload"])
     * @return string - The relative path in the server
     * @throws ImageUploaderExeption - if upload cannot be done
     * @link - https://www.php.net/manual/fr/function.hash-file.php
     * @link - https://www.w3schools.com/php/php_file_upload.asp
     */
    function uploadToServer($file){
        $imageFileType = strtolower(pathinfo(basename($file["name"]), PATHINFO_EXTENSION));
        $target_dir = "Images/";
        $target_name = getHashFile($file);
        $target_file = $target_dir . $target_name. ".". $imageFileType;
        if (!move_uploaded_file($file["tmp_name"], $target_file)) {
            throw new ImageUploaderExeption("Upload Problem",0);
        }
        return $target_file;
    }
?>

