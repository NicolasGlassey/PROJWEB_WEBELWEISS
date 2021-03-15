<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      usersListManager.php
     * @brief     This script is used to process information retrieved from JSON about users
     * @author    Created by Eliott.JAQUIER
     * @version   1.3 (14.03.2021)
     */

    #region REQUIRE
        require_once('../Model/jsonManager.php');
    #endregion

    #region CONSTANTS
        const pathName = '../Data/';
        const fileName = 'users.json';
    #endregion

    #region GLOBAL VARIABLES
        $usersArray = null;
    #endregion

    #region FUNCTIONS
    /**
     * @brief This function is used to give all the users in a array from JSON or from variable (to optimize the response time)
     * @return mixed - all the users in a associative array
     */
    function getAllUsersArray(): mixed
    {
        GLOBAL $usersArray;
        $usersInJson = $usersArray;
        if($usersInJson == null){
            $usersInJson = getJsonContent(pathName.fileName);
        }
        $usersArray = $usersInJson;
        return $usersInJson;
    }

    /**
     * @brief This function is used to modify the users array (also in the JSON file)
     * @param $newUsersArray - the new users array
     */
    function setAllUsersData($newUsersArray){
        GLOBAL $usersArray;
        $usersArray = $newUsersArray;
        writeInJsonFile(pathName,fileName,$usersArray);
    }

    /**
     * @brief This function is designed to allocate a new ID unused
     * @return int - new ID unused in the JSON file or array
     */
    function allocateNewCorrectID(): int
    {
        $newCorrectID = 0;
        $isFoundedCorrectID = false;
        while (!$isFoundedCorrectID){
            $doubleFounded = false;
            foreach (getAllUsersArray() as $user){
                if($user['id'] == $newCorrectID){
                    $doubleFounded = true;
                }
            }
            if($doubleFounded)
                $newCorrectID++;
            else
                $isFoundedCorrectID = true;
        }
        return $newCorrectID;
    }
    #endregion
?>