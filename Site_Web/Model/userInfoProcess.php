<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      userInfoProcess.php
     * @brief     This script is used to process information retrieved from 'UserContent'
     * @author    Created by Eliott.JAQUIER
     * @version   1.2 (15.02.2021)
     */

    #region REQUIRE
        require_once('Model/usersListManager.php');
    #endregion

    #region Check (Is)

    /**
     * @brief This function is designed to know if the selected user exists
     * @param $userEmail - Name to compare in the JSON array
     * @return bool - If the user exists
     */
    function isUserExists($userEmail){
        $userExists = false;
        $usersInJson = getAllUsersArray();
        foreach ($usersInJson as $singleUser){
            if($singleUser['email'] == $userEmail){
                $userExists = true;
            }
        }
        return $userExists;
    }

    #endregion

    #region Get Infos (Get)
    /**
     * @brief This function is designed to obtain all the information of the user by his identifier
     * @param $userID - The identifier
     * @return null|mixed - Associative array if the user is found and 'null' if the user is not found
     */
    function getUserInfo($userID){
        $userInfos = null;
        $usersInJson = getAllUsersArray();
        foreach ($usersInJson as $singleUser){
            if($singleUser['id'] == $userID){
                $userInfos = $singleUser;
            }
        }
        return $userInfos;
    }

    /**
     * @brief This function is designed to obtain all the information of the user by his identifier
     * @param $userEmail - name to compare in the JSON array
     * @return false|mixed - ID number if the user is found and 'false' if the user is not found
     */
    function getUserID($userEmail){
        $userID = false;
        $usersInJson = getAllUsersArray();
        foreach ($usersInJson as $singleUser){
            if($singleUser['email'] == $userEmail){
                $userID = $singleUser['id'];
            }
        }
        return $userID;
    }

    /**
     * @brief This function is designed to get the place of the user (based on the UserID) in the JSON array
     * @param $userID - Unique ID of the user
     * @return false|int - Place in the JSON array (or false if not found)
     */
    function getUserIDPlace($userID){
        $place = false;
        $usersInJson = getAllUsersArray();
        $count = 0;
        foreach ($usersInJson as $singleUser){
            if($singleUser['id'] == $userID){
                $place = $count;
            }
            $count++;
        }
        return $place;
    }
    #endregion

    #region Add (Add)
    /**
     * @brief This function is designed to add a user (replacing the actual id)
     * @param $userProfileInfo - New profile of the user (Associative array)
     * @return int - The new user ID in the JSON file
     * @throws JsonManagerException
     */
    function addUser($userProfileInfo){
        $newUserID = allocateNewCorrectID();
        $userProfileInfo['id'] = $newUserID;
        $usersInJson = getAllUsersArray();
        array_push($usersInJson,$userProfileInfo);
        setAllUsersData($usersInJson);
        return $newUserID;
    }
    #endregion

    #region Update (Update)
/**
 * @brief This function is designed to edit the userInfo
 * @param $userProfileInfo - New profile of the user (Associative array)
 * @throws JsonManagerException
 */
    function updateUserInfos($userProfileInfo){
        $userID = $userProfileInfo['id'];
        $placeInArray = getUserIDPlace($userID);
        $usersInJson = getAllUsersArray();
        array_splice($usersInJson, $placeInArray, 1);
        array_push($usersInJson,$userProfileInfo);
        setAllUsersData($usersInJson);
    }
    #endregion

    #region Delete (Delete)
    /**
     * @brief This function is designed to delete the user with his ID
     * @param $userID
     * @throws JsonManagerException
     */
    function deleteUser($userID){
        $placeInArray = getUserIDPlace($userID);
        $usersInJson = getAllUsersArray();
        array_splice($usersInJson, $placeInArray, 1);
        setAllUsersData($usersInJson);
    }
    #endregion