<?php
/**
 * @file    uploadForm.php
 * @brief   This script is used for make user anser an form for upload an image
 * @author  Craeted by Mikael Juillet
 * @version 09.06.2021 // 0.1
 */

$title = "connection";
ob_start();
?>
    <body class="uploadImage_body">
        <div class="uploadImage_form">
            <form method="post" action="index.php?action=login">
                <div class="wrap-input100 m-b-10" >
                    <input class="input100" type="" name="" id="" placeholder="" required>
                </div>
            </form>
        </div>
    </body>
<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
