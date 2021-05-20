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
     * @throws AccountException : If the email / password is not correct or already taken //TODO DONE on a besion de savoir dans quel cas l'exception est levée
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
                    if (verifyPassword($pwd, $userInfos['password'])) {
                        $result = $userInfos;
                    }
                }
            }
        }
        if($result == null){
            //TODO cette liste d'exception doit être simplifiée car in fine, le résultat est le même (on redemande le login à l'utilisateur, sans lui spécifier la nature de l'erreur).
            throw new AccountExeption("LOGIN-ERROR",0);
        }
        return $result;
    }

    /**
     * @brief This function is designed to register a new user in the website
     * @param $email
     * @param $pwd
     * @return array|string[] - Associative array (UserInfos) if no error occurred
     * @throws AccountException : If the user form is not found, email is not correct, email is already taken or the password dont have the security rules//TODO DONE on a besion de savoir dans quel cas l'exception est levée
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
                        addUser($userProfile);
                        $userID = getUserID($email);
                        $userInfos = getUserInfo($userID);
                        $result = $userInfos;
                    } else {
                        throw new AccountExeption("PWD_POLICY",4);
                    }
                }else{
                    throw new AccountExeption("EMAIL_ALREADY_TAKEN",5);
                }
            }else{
                throw new AccountExeption("EMAIL_IS_NOT_CORRECT",2);
            }
        }else{
            throw new AccountExeption("USERFORMINFOS_NOT_FOUND",3);
        }
        return $result;
    }
?>