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
        return hash_file('md5', $file["tmp_name"]);
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
        $canUpload = true;
        $imageFileType = strtolower(pathinfo(basename($file["name"]), PATHINFO_EXTENSION));
        $target_dir = "Images/";
        $target_name = getHashFile($file);
        $target_file = $target_dir . $target_name. ".". $imageFileType;



        //Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($file["tmp_name"]);
            if ($check !== false) {
                $canUpload = true;
            } else {
                $canUpload = false;
            }
        }

        //Check if file already exists
        if (file_exists($target_file)) {
            $canUpload = false;
        }

        // Check file size
        if ($file["size"] > 500000) {
            $canUpload = false;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $canUpload = false;
        }

        if($canUpload){
            require_once "Model/dbConnector.php";
            try {
                $resultBDD = executeQuerySelect("SELECT photos.imageHash FROM Webelweiss_CactusPic.photos WHERE photos.imageHash = ?;", array($target_name));
                $canUpload = (count($resultBDD) == 0);
            } catch (ModelDataExeption $e) {
                $canUpload = false;
            }
        }
        return $canUpload;
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

