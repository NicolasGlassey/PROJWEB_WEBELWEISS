<?php
/**
 * Project : ProgWEB - Images upload site
 * @file      profilUser.php
 * @brief     This view is designed to display the profil of a user
 * @author    Created by Jonatan.PERRET
 * @version   1.0 (22.03.2021)
 */
$title = "profil";
ob_start();

$userProfile = array(
    "name" => "Eliott",
    "url" => "https://c8.alamy.com/comp/2BHG705/colourful-conceptual-images-2BHG705.jpg"
);


?>

<?php if(isset($profilError)) {?>
    <div><?=$profilError?></div>
<?php }?>
<?php if (isset($userProfile)){?>
<div class="home-blog-area section-padding30">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="single-team mb-30">
                    <div class="team-img">
                        <img src="<?=$userProfile['url']?>" alt="">
                    </div>
                    <div class="team-caption">
                        <span>HEALTH & CARE</span>
                        <h3><a href="blog.html">The Best SPA Salons For
                                Your Relaxation</a></h3>
                        <p>October 6, 2020by Steve</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>






















<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
