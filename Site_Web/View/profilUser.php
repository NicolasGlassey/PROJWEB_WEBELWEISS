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


$userProfileImages = array(
        array(
            "name" => "Belle photo",
            "url" => "https://i.pinimg.com/originals/0b/ac/f6/0bacf62a4bd456d02d02c6b8a5c98f67.jpg",
            "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ),
        array("name" => "Belle photo",
            "url" => "https://images.unsplash.com/photo-1616120026677-62b6b565cc97?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1351&q=80",
            "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ),
        array("name" => "Belle photo",
            "url" => "https://styles.redditmedia.com/t5_ddlj6/styles/profileIcon_snoo8a8b106f-bb46-4064-9f0f-6ab4749e3c0e-headshot.png?width=256&height=256&crop=256:256,smart&s=fa5922af1fbf06cf0c2075bea57e591464fa0b61",
            "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ),
        array("name" => "Belle photo",
            "url" => "https://images.unsplash.com/photo-1616120026677-62b6b565cc97?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1351&q=80",
            "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ),
);
$userProfileInfos = array(
    "email" => "jonatan.perret@cpnv.ch"

);


?>

<?php if(isset($profileError)) {?>
    <div><?=$profileError?></div>
<?php }?>
<?php if (isset($userProfileImages)&&(isset($userProfileInfos))){?>
<body class="backgroundProfile">
        <!-- Blog Ara Start -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 UserProfileInfos">
            <div><h1 class="color-white"><?=$userProfileInfos['email']?></h1></div>

        </div>



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
                                <img src="<?=$postInfos['url']?>" class="img-cropped">
                            </div>
                        </div>
                        <div class="row" style="margin-left: 1px; margin-bottom: 10px">
                            <div class="PostDescription"><?=$postInfos['description']?></div>
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
