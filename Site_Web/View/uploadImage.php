<?php
/**
 * @file    uploadImage.php
 * @brief   This script is used for upload an image.
 * @author  Craeted by Mikael Juillet
 * @version 09.06.2021 // 0.2
 */

$title = "connection";
ob_start();
?>
    <body class="uploadImage_body">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 UserProfileInfos">
            <div><h1 class=" color-white">Ajout d'une image</h1></div>
        </div>
        <!-- drag and drop Start -->
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 drop-zone">
            <span class="drop-zone__prompt"></span>
            <input type="file" name="myFile" class="drop-zone__input">
        </div>
        <form action="/action_page.php" class="uploadImage_choseFile">
                <input type="file" id="myFile" name="filename">
        </form>

        <!-- drag and drop End -->
    </body>
<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
