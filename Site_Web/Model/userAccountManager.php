<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      userAccountManager.php
     * @brief     This model is used to manage the login and the register
     * @author    Created by Eliott.JAQUIER
     * @version   1.4 (03.03.2021)
     */

    /**
     * @brief This class is used to have a special class Exception for managing Error in the account
     * Class AccountException
     */
    class AccountException extends Exception{

    }

    /**
     * @brief This function is designed to Log the user in the website
     * @param $email
     * @param $pwd
     * @return array|null - Associative array (userInfos) if the user is correct
     * @throws AccountException : If the email / password is not correct or already taken
     */
    function login($email,$pwd){
        $result = null;
        if(isset($email) && isset($pwd)) {
            require_once("Model/userInfoProcess.php");
            if (str_contains($email, "@") && str_contains($email, ".")) {
                if (isUserExists($email)) {
                    $userID = getUserIDPlace($email);
                    $userInfos = getUserInfo($userID);
                    require_once("Model/passwordManagement.php");
                    if ($userInfos != null && verifyPassword($pwd, $userInfos['password'])) {
                        $result = $userInfos;
                    }
                }
            }
        }
        if($result == null){
            throw new AccountException("LOGIN-ERROR",0);
        }
        return $result;
    }

    /**
     * @brief This function is designed to register a new user in the website
     * @param $email
     * @param $pwd
     * @return array|string[] - Associative array (UserInfos) if no error occurred
     * @throws AccountException : If the user form is not found, email is not correct, email is already taken or the password dont have the security rules
     */
    function register($email,$pwd){
        $result = null;
        if(isset($email) && isset($pwd)) {
            require_once("Model/userInfoProcess.php");
            if(str_contains($email, "@") && str_contains($email, ".")) {
                if (!isUserExists($email)) {
                    require_once("Model/passwordManagement.php");
                    if (isPasswordGood($pwd)) {
                        $hashedPassword = hashPassword($pwd);
                        $userProfile = array(
                            "email" => $email
                          , "password" => $hashedPassword
                        );
                        try{
                            addUser($userProfile);
                        }catch (JsonManagerException $ex){//Cannot write in the JSON file
                            throw new AccountException("USER_NOT_CREATED",6);
                        }
                        $userID = getUserID($email);
                        $userInfos = getUserInfo($userID);
                        if($userInfos == null){
                            throw new AccountException("USER_NOT_CREATED",6);
                        }
                        $result = $userInfos;
                    } else {
                        throw new AccountException("PWD_POLICY",4);
                    }
                }else{
                    throw new AccountException("EMAIL_ALREADY_TAKEN",5);
                }
            }else{
                throw new AccountException("EMAIL_IS_NOT_CORRECT",2);
            }
        }else{
            throw new AccountException("USERFORMINFOS_NOT_FOUND",3);
        }
        return $result;
    }
?>