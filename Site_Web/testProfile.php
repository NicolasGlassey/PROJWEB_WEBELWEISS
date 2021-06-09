<?php
/**
 * @file    test.php
 * @brief   To test models
 * @author  Craeted by Eliott
 * @author  Updated by Eliott
 * @version 09.06.2021
 */

require "Model/dbConnector.php";
try {
    print_r(openDBConnexion());
} catch (ModelDataExeption $e) {
    echo $e."<p>".$e->getMessage();
}
?>