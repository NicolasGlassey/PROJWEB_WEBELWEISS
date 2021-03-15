<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      userAccountManager.php
     * @brief     This model is used to manage the login and the register
     * @author    Created by Eliott.JAQUIER
     * @version   1.4 (03.03.2021)
     */

    /**
     * @brief This class is used to have a special class Exeption for managing Error in the account
     * Class AccountExeption
     */
    class AccountExeption extends Exception{

    }

    /**
     * @brief This function is designed to Log the user in the website
     * @param $email
     * @param $pwd
     * @return array|null - Associative array (userInfos) if the user is correct
     * @throws AccountExeption
     */
    function login($email,$pwd){
        $result = null;
        if(isset($email) && isset($pwd)){
            require_once("../Model/userInfoProcess.php");
            if(str_contains($email, "@") && str_contains($email, ".")){
                if(isUserExists($email)){
                    $userID = getUserIDPlace($email);
                    $userInfos = getUserInfo($userID);
                    require_once("../Model/passwordManagement.php");
                    if(verifyPassword($pwd,$userInfos['password'])){

                        $result = $userInfos;
                    }else{
                        throw new AccountExeption("PWD_NOT_CORRESPOND",0);
                    }
                }else{
                    throw new AccountExeption("EMAIL_NOT_FOUND",1);
                }
            }else{
                throw new AccountExeption("EMAIL_IS_NOT_CORRECT",2);
            }
        }else{
            throw new AccountExeption("USERFORMINFOS_NOT_FOUND",3);
        }
        return $result;
    }

    /**
     * @brief This function is designed to register a new user in the website
     * @param $email
     * @param $pwd
     * @return array|string[] - Associative array (UserInfos) if no error occurred
     * @throws AccountExeption
     */
    function register($email,$pwd){
        $result = null;
        if(isset($email) && isset($pwd)) {
            require_once("../Model/userInfoProcess.php");
            if(str_contains($email, "@") && str_contains($email, ".")) {
                if (!isUserExists($email)) {
                    require_once("../Model/passwordManagement.php");
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