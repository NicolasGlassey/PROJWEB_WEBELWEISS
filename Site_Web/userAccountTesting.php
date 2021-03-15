<?php
    /**
     * Project : ProgWEB - Images upload site
     * @file      userAccountTesting.php
     * @brief     This model is used to test the userAccountManager
     * @author    Created by Eliott.JAQUIER
     * @version   1.4 (03.03.2021)
     */

    require_once("Model/userAccountManager.php");

    if(isset($_GET['email']) && isset($_GET['pwd'])){
        $registerResult = register($_GET['email'],$_GET['pwd']);
    }
    //$loginResult = login("eliott.jaquier@cpnv.ch","Hey!ThisIs@T3ST");
    $dumb = 0;
?>