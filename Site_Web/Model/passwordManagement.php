<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      PasswordManager.php
     * @brief     This script is used for hashing complex passwords et check it
     * @author    Created by Eliott.JAQUIER
     * @version   1.4 (17.02.2021)
     */

    /**
     * @brief This function is used to check if a password is strong enough to accept it.
     * @param $plainTextPassword - The password in plain text
     * @return bool - True if the password respect the constraints
     */
    function isPasswordGood($plainTextPassword){
        $isPwdGood = true;

        //Constraints of strong password
        //TODO revoir cette liste de if. Il y a la possiblilité de tout tester à l'aide d'un seul appel. Le résultat étant tout le temps le même en cas de non respect des contraintes.
        if(strlen($plainTextPassword) < 8){
            $isPwdGood = false;
        }
        if(!preg_match('@[A-Z]@', $plainTextPassword)){
            $isPwdGood = false;
        }
        if(!preg_match('@[a-z]@', $plainTextPassword)){
            $isPwdGood = false;
        }
        if(!preg_match('@[0-9]@', $plainTextPassword)){
            $isPwdGood = false;
        }
        if(!preg_match('@[^\w]@', $plainTextPassword)){
            $isPwdGood = false;
        }

        //Check for specials chars unsupported in the JSON file system
        $unwantedChars = ['[', ']', '{', '}',';',':','"'];
        if(preg_match('/[' . preg_quote(implode(',', $unwantedChars)) . ']+/', $plainTextPassword)) {
            $isPwdGood = false;
        }
        return $isPwdGood;
    }

    /**
     * @brief This function is used to hash a password
     * @param $plainTextPassword
     * @return false|string - The hashed password / false if the password failed to create / verify
     */
    function hashPassword($plainTextPassword){
        $hashedPassword = password_hash($plainTextPassword,PASSWORD_DEFAULT);

        //Verify if the PWD can be re-verified
        if(!(password_verify($plainTextPassword,$hashedPassword))) {
            $hashedPassword = false;
        }
        return $hashedPassword;
    }

    /**
     * @brief Checks if the given hash matches the given password plain text
     * @param $passwordToVerify - password plain text
     * @param $passwordHashed - true hash of password
     * @return bool - If the password correspond
     */
    function verifyPassword($passwordToVerify,$passwordHashed){
        //TODO pourquoi ne pas intégrer iic la validation du password à l'aide de preg match à l'aide d'un seul appel ?
        return password_verify($passwordToVerify,$passwordHashed);
    }