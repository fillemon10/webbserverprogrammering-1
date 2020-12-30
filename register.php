<?php
require_once("config.php");
include('includes/registration_login.php');
$title = "Sign up";
require_once("includes/head.php");
?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= page-banner-section start ========================= -->
    <?php include("includes/banner.php") ?>
    <!-- ========================= page-banner-section end ========================= -->

    <!-- ========================= -section start ========================= -->
    <section class="form-section pt-50 pb-20 wow fadeInUp" data-wow-delay=".8s">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 mx-auto"></div>
                <div class="col-xl-8 col-lg-8 col-md-8 mx-auto">
                    <div class="container  box-style pt-15 pb-15">

                        <form class="form-form" method="post" action="register">
                            <div class="container">
                                <h2>Register on Cinemania</h2>

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <label class="mb-10 wow fadeInLeft" data-wow-delay="0.9s" for="username">Username</label>
                                        <input class="wow fadeInLeft" data-wow-delay="0.9s" type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                                        <label class="wow fadeInLeft" data-wow-delay="0.9s" for="email">Email</label>
                                        <input class="wow fadeInLeft" data-wow-delay="0.9s" type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <label class="wow fadeInLeft" data-wow-delay="0.9s" for="password">Password</label>
                                        <input class="wow fadeInLeft" data-wow-delay="0.9s" type="password" name="password_1" placeholder="Password">
                                        <label class="wow fadeInLeft" data-wow-delay="0.9s" for="password_2">Confirm password</label>
                                        <input class="wow fadeInLeft" data-wow-delay="0.9s" type="password" name="password_2" placeholder="Confirm password">
                                        <?php include('includes/errors.php') ?>
                                        <button type="submit" class="theme-btn mt-20 mb-20 wow fadeInUp float-right" data-wow-delay="1.1s" name="reg_user">Register</button>
                                    </div>
                                </div>
                        </form>
                        <div class="row">
                            <p class="wow fadeInUp text-right" data-wow-delay="1.3s">Already a member? <a class="red" href="<?php ROOT_PATH ?>/login"> Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-2 mx-auto"></div>
        </div>
        </div>
    </section>
    <!-- ========================= -section end ========================= -->

    <!-- ========================= subscribe-section start ========================= -->
    <?php include("includes/subscribe.php") ?>
    <!-- ========================= subscribe-section end ========================= -->

    <!-- ========================= footer start  ========================= -->
    <?php include("includes/footer.php") ?>
    <!-- ========================= footer end  ========================= -->

    <?php include("includes/js.php") ?>
</body>

</html>
<div class="container  box-style w-50 pt-15">


    <p>Already a member? <a href="<?php ROOT_PATH ?>/login">Sign in</a></p>
</div>
