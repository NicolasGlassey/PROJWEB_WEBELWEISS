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
            if (str_contains($email, "@") && str_contains($email, ".")) {
                require_once("Model/userInfoProcess.php");
                $userInfo = getUserInfosByEmail($email);
                require_once("Model/passwordManagement.php");
                if ($userInfo != null && verifyPassword($pwd, $userInfo['passwordHash'])) {
                    $result = $userInfo;
                }
            }
        }
        if($result == null){
            throw new AccountException("LOGIN-ERROR",0);
        }
        return $result;
    }
?>