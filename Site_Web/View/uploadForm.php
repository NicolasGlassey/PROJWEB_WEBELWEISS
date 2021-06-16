<?php
/**
 * @file    uploadForm.php
 * @brief   This script is used for make user anser an form for upload an image
 * @author  Craeted by Mikael Juillet
 * @version 16.06.2021 // 0.3
 */

$title = "connection";
ob_start();
?>
    <body class="uploadImage_body">
            <div class="container-login200">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 UserProfileInfos">
                    <div><h1 class=" color-white">Ajout d'une image</h1></div>
                </div>
            </div>
            <form method="post" action="index.php?action=uploadImage" class="uploadImage_form">
                <h3 class="uploadImage_title col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3">Informations</h3>
                <?php
                GLOBAL $_photoInfo;
                ?>
                <div class="uploadImageView">
                    <img src="<?php $_photoInfo["imagePath"]?>">
                    <div class="fileName"><?php $_photoInfo["fileName"] ?></div>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3 upload_require">Nom <strong>*</strong></div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-xs-8" type="text" name="imageNameInput"  required>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3">Lieu</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-xs-8" type="text" name="placesInput" >
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3">Longitude</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-xs-8" type="text" name="longitudeInput" >
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3">Latitude</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-xs-8" type="text" name="latitudeInput" >
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3">Date</div>
                    <input class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-8" type="date" name="dateImput">
                </div>
                <div class="row uploadImage_formDesc">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3">Description</div>
                    <textarea class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-xs-8" type="text" name="DescInput"></textarea>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-xs-3"></div>
                    <button type="submit" class="btn">Poster</button>
                </div>
            </form>
    </body>
<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
