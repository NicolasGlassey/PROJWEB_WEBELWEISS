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
            <div class="container-login200">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 UserProfileInfos">
                    <div><h1 class=" color-white">Ajout d'une image</h1></div>
                </div>
            </div>

            <form method="post" action="index.php?action=login" class="uploadImage_form">
                <h3 class="uploadImage_title col-xl-2 col-lg-2 col-md-3 col-sm-3">hdskjhadkjshkdjh</h3>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3">hgfdhfghfhgfh</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8" type="text" name="" placeholder="" checked>
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3">hgfdhfghfhgfh</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8" type="text" name="" placeholder="">
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3">hgfdhfghfhgfh</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8" type="text" name="" placeholder="">
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3">hgfdhfghfhgfh</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8" type="text" name="" placeholder="">
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3">hgfdhfghfhgfh</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8" type="date" name="" placeholder="">
                </div>
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3">hgfdhfghfhgfh</div>
                    <input class="col-xl-5 col-lg-5 col-md-8 col-sm-8" type="text" name="" placeholder="">
                </div>
                    <button type="submit" class="btn btn-secondary">Poster</button>
            </form>
    </body>
<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
