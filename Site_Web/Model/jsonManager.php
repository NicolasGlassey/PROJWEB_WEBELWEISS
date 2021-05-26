<?php

    /**
     * Project : ProgWEB - Images upload site
     * @file     jsonManager.php
     * @brief    This script is used to load a JSON file and modify it.
     * @author   Created by Eliott.JAQUIER
     * @version  1.3 (14.03.2021)
     */

    /**
     * @brief For returning special JsonManager Exceptions
     * Class AccountException
     */
    class JsonManagerException extends Exception{

    }

    /**
     * @brief This function is used to load a JSON file and decode it into a classic PHP array.
     * @param $path - The relative location of the JSON file
     * @return mixed - A recursive array with the contents of the JSON file (the array can be empty if the file does not exist or if the decoder has a problem)
     * @throws JsonManagerException - if the decoder has a problem
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
        try{
            $JSONarray = json_decode($fileContent,true);
            //TODO DONE gestion d'exception si le json_decode n'arrive pas à faire son travail ? https://www.php.net/manual/en/class.jsonexception.php
        }catch (JsonException $exeption){
            $JSONarray = array();
            throw new JsonManagerException("Json decoder cannot decode",0);
        }
        return $JSONarray;
    }

    /**
     * @brief This function id designed to write (replace) the contents of a JSON file with a new recursive array of objects.
     * @param $fileName - The name of the file only (not the path) //TODO DONE à écrire
     * @param $path - The relative location of the JSON file (path only)
     * @param $contentToWrite - The array to write in the JSON file
     * @throws JsonManagerException - If write cannot work
     */
    function writeInJsonFile($path,$fileName,$contentToWrite){
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $jsonFile = fopen($path.$fileName, "w");
        $jsonTextToWrite = json_encode($contentToWrite);
        if(fwrite($jsonFile, $jsonTextToWrite) == false){
            throw new JsonManagerException("Cannot write in the JSON file",1);
        }
        //TODO DONE gestion d'exception
        fclose($jsonFile);
    }