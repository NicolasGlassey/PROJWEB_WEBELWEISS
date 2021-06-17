<?php
session_start();
$hashImage = null;
if(isset($_FILES["fileToUpload"])){
    require_once "Model/imageUploadingManager.php";
    $_SESSION["userID"] = 1;
    $hashImage = uploadImage($_FILES["fileToUpload"]);
    $imag = getImageByHash($hashImage);
    $_SESSION["imageID"] = $imag["id"];
    if($hashImage != null){
        ?>
        <!DOCTYPE html>
        <html>
        <body>

        <form action="testUpload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="name">
            <input type="text" name="description">
            <img src="<?=$imag["imagePath"]?>">
            <input type="submit" value="OK" name="submit">
        </form>

        </body>
        </html>
        <?php
    }
}
if(isset($_POST["name"]) && $_SESSION["imageID"]){
    require_once "Model/imageUploadingManager.php";
    changeImageInfo($_SESSION["imageID"],$_POST["name"],$_POST["description"],null,null,null);
}
?>
<?php if(($hashImage == null) && !isset($_POST["name"])):?>
    <!DOCTYPE html>
    <html>
    <body>

    <form action="testUpload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

    </body>
    </html>
<?php endif;?>