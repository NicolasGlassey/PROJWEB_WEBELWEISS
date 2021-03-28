<?php
/**
 * Project : ProgWEB - Images upload site
 * @file      testImages.php
 * @brief     This test is used to test the image model
 * @author    Created by Eliott.JAQUIER
 * @version   1.0 (22.03.2021)
 */
require_once "Model/imagesManager.php";

try{
    echo '<pre>' , var_dump(getImagesWithProfile(0)) , '</pre>';
}catch (Exception $e){
    die($e->getMessage());
}

?>