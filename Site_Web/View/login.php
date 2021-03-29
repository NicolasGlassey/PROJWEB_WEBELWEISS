<?php
/**
 *   @file      login.php
 *   @brief     display the login form
 *   @author    Created by Jonatan PERRET
 *   @version   1.0 (08.03.2021)
 **/
$title = "connection";
ob_start();
?>


<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/img/Background1.jpg');">
        <div class="wrap-login100">
            <?php
                // show error message if it has one
                GLOBAL $_errorMsg;
                if ($_errorMsg != null) : ?>
                    <div class="alertIdentification" "> <?=$_errorMsg?> </div>
                <?php endif; ?>
            <form class="login100-form" method="post" action="index.php?action=login" id="LoginForm">

                <div class="wrap-input100 m-b-10" >
                    <input class="input100" type="Email" name="email" id="EmailInput" placeholder="Email" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
                </div>

                <div class="wrap-input100 m-b-10">
                    <input class="input100" type="password" name="password" placeholder="Mot de passe" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn" id="LoginButton" type="submit">
                        se connecter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>

<?php
$content = ob_get_clean();
require "View/gabarit.php";
?>
