<?php
/**
 * @file    uploadImage.php
 * @brief   This script is used for upload an image.
 * @author  Craeted by Mikael Juillet
 * @version 09.06.2021 // 0.1
 */

$title = "connection";
ob_start();
?>
    <body class="uploadImage_body">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 UserProfileInfos">
            <div><h1 class="color-white">Ajout d'une image</h1></div>
        </div>
        <!-- drag and drop Start -->
        <form class="box" method="post" action="" enctype="multipart/form-data">
            <div class="box__input">
                <input class="box__file" type="file" name="files[]" id="file" data-multiple-caption="{count} files selected" multiple />
                <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
                <button class="box__button" type="submit">Upload</button>
            </div>
            <div class="box__uploading">Uploading…</div>
            <div class="box__success">Done!</div>
            <div class="box__error">Error! <span></span>.</div>
        </form>

        <!-- drag and drop End -->
    </body>
<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
