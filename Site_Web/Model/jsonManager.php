<?php

    /**
     * Project : ProgWEB - Images upload site
     * @file     jsonManager.php
     * @brief    This script is used to load a JSON file and modify it.
     * @author   Created by Eliott.JAQUIER
     * @version  1.3 (14.03.2021)
     */


    /**
     * @brief This function is used to load a JSON file and decode it into a classic PHP array.
     * @param $path - The relative location of the JSON file
     * @return mixed - A recursive array with the contents of the JSON file (the array can be empty if the file does not exist)
     */
    function getJsonContent($path){
        $fileContent = "";
        $fExist = is_file($path);
        if($fExist){
            $jsonFile = fopen($path, "r+");
            while (($line = fgets($jsonFile)) !== false) {
                $fileContent = $fileContent . $line;
            }
            fclose($jsonFile);
        }else{
            $fileContent = "[]";
        }
        $JSONarray = json_decode($fileContent,true);
        return $JSONarray;
    }

    /**
     * @brief This function id designed to write (replace) the contents of a JSON file with a new recursive array of objects.
     * @param $path - The relative location of the JSON file
     * @param $contentToWrite - The array to write in the JSON file
     */
    function writeInJsonFile($path,$fileName,$contentToWrite){
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $jsonFile = fopen($path.$fileName, "w");
        $jsonTextToWrite = json_encode($contentToWrite);
        fwrite($jsonFile, $jsonTextToWrite);
        fclose($jsonFile);
    }
?>