<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      userInfoProcess.php
     * @brief     This script is used to process information retrieved from 'UserContent'
     * @author    Created by Eliott.JAQUIER
     * @version   1.3 (15.02.2021) - SQL CHANGES
     */
    require_once "Model/dbConnector.php";
    /**
     * @brief This function is designed to obtain all the information of the user by his identifier
     * @param $userID - The identifier
     * @return null|mixed - Associative array if the user is found and 'null' if the user is not found
     */
    function getUserInfosByID($userID){
        $userInfos = null;
        try {
            $potentialUser = executeQuerySelect("SELECT photographers.id,photographers.email,photographers.passwordHash,photographers.firstname,photographers.lastname,photographers.description FROM webelweiss_cactuspic.photographers WHERE photographers.id=?;", array($userID));
            if(count($potentialUser) == 1){
                $userInfos = $potentialUser[0];
            }
        } catch (ModelDataExeption $e) {

        }
        return $userInfos;
    }

    /**
     * @brief This function is designed to obtain all the information of the user by his email
     * @param $userEmail - The mail of the user
     * @return null|mixed - Associative array if the user is found and 'null' if the user is not found
     */
    function getUserInfosByEmail($userEmail){
        $userInfos = null;
        try {
            $potentialUser = executeQuerySelect("SELECT photographers.id,photographers.email,photographers.passwordHash,photographers.firstname,photographers.lastname,photographers.description FROM webelweiss_cactuspic.photographers WHERE photographers.email=?;", array($userEmail));
            if(count($potentialUser) == 1){
                $userInfos = $potentialUser[0];
            }
        } catch (ModelDataExeption $e) {

        }
        return $userInfos;
    }

?>