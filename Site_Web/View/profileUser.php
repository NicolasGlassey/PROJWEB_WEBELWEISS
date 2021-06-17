<?php
/**
 * Project : ProgWEB - Images upload site
 * @file      profileUser.php
 * @brief     This view is designed to display the profil of a user
 * @author    Created by Jonatan.PERRET
 * @version   1.0 (22.03.2021)
 */
$title = "profil";
ob_start();
GLOBAL $userProfileImages;
GLOBAL $userProfileInfos;
?>



<body class="backgroundProfile">
<?php if(isset($profileError)) {?>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 UserProfileInfos">
        <div><h5 class="color-white"><?=$profileError?></h5></div>
    </div>
<?php }?>

        <!-- Blog Ara Start -->
        <?php if (isset($userProfileImages)&&(isset($userProfileInfos))){?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 UserProfileInfos">
            <div><h1 class="color-white"><?=$userProfileInfos['firstname']?> <?=$userProfileInfos['lastname']?></h1></div>
            <div><p class="color-white"><?=$userProfileInfos['email']?></p></div>
        </div>

            <?php if(count($userProfileImages) == 0):?>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 UserProfileInfos">
                    <div><h5 class="color-white">Cet utilisateur n'a pas d'images</h5></div>
                </div>
            <?php else:?>
                <div class="home-blog-area section-padding30" style="margin: 30px">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($userProfileImages as $postInfos) {?>
                                <div class="col-lg-5 col-md-10 col-sm-10 post">
                                    <div class="mb-10 single-team">
                                        <div class="team-caption">
                                            <div class="UserName"><?=$postInfos['name']?></div>
                                        </div>
                                        <div class="team-img coin">
                                            <img src="<?=$postInfos['imagePath']?>" class="img-cropped">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 1px; margin-bottom: 10px">
                                        <div class="PostDescription"><?=$postInfos['description']?>
                                            <p><?=$postInfos['takenDate']?></p>
                                            <?php if(isset($postInfos['longitude'])):?>
                                            <p>Lon:<?=$postInfos['longitude']?>
                                                Lat:<?=$postInfos['latitude']?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            <?php endif;?>
        <!-- Blog Ara End -->
        <?php }?>

</body>

<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
