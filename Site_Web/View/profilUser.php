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
        "posts" => array(
            "post1" => array(
                "url" => "https://c8.alamy.com/comp/2BHG705/colourful-conceptual-images-2BHG705.jpg",
                "location" => "Concise",
                "date" => "28/03/2021"),
            "post2" => array(
                "url" => "https://c8.alamy.com/comp/2BHG705/colourful-conceptual-images-2BHG705.jpg",
                "location" => "Yverdon",
                "date" => "27/03/2021"),
            "post3" => array(
                "url" => "https://c8.alamy.com/comp/2BHG705/colourful-conceptual-images-2BHG705.jpg",
                "location" => "Yverdon",
                "date" => "27/03/2021")
        )
);


?>

<?php if(isset($profilError)) {?>
    <div><?=$profilError?></div>
<?php }?>
<?php if (isset($userProfile)){?>
<body class="backgroundProfile">
        <!-- Blog Ara Start -->
        <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 UserProfileInfos">
            <div><strong><?=$userProfile['name']?></strong></div>

        </div>



        <div class="home-blog-area section-padding30" style="margin: 30px">
            <div class="container">
                <div class="row">
                    <?php foreach ($userProfile['posts'] as $postInfos) {?>
                    <div class="col-xl-4 col-lg-5 col-md-10 col-sm-10 post">
                        <div class="mb-10 single-team">
                            <div class="team-caption">
                                <div class="UserName"><?=$userProfile['name']?></div>
                            </div>
                            <div class="team-img coin">
                                <img src="<?=$postInfos['url']?>">
                            </div>
                        </div>
                        <div class="row" style="margin-left: 1px; margin-bottom: 10px">
                            <div class="PostLocation"><?=$postInfos['location']?>&nbsple&nbsp</div>
                            <div class="PostDate"><?=$postInfos['date']?></div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- Blog Ara End -->

</body>
<?php }?>






















<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
