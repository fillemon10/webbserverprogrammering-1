<?php
require_once("config.php");
include('includes/registration_login.php');
$title = "Login";
require_once("includes/head.php");
?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= page-banner-section start ========================= -->
    <?php include("includes/banner.php");
    ?>
    <!-- ========================= page-banner-section end ========================= -->

    <!-- ========================= -section start ========================= -->
    <section class="form-section pt-50 pb-20 wow fadeInUp" data-wow-delay=".8s">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-2 mx-auto"></div>
                <div class="col-xl-6 col-lg-6 col-md-8 mx-auto">
                    <div class="container feature-box box-style pt-15 pb-15">
                        <div class="row">
                            <div class="container">
                                <h3>Login on Cinemania</h3>
                                <form class="form-form" method="post" action="">
                                    <label class=" mb-10 wow fadeInLeft" data-wow-delay="0.9s" for="username">Username</label>
                                    <input class="wow fadeInLeft" data-wow-delay="0.9s" type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
                                    <label class="wow fadeInLeft" data-wow-delay="0.9s" for="password">Password</label>
                                    <input class="wow fadeInLeft" data-wow-delay="0.9s" type="password" name="password" placeholder="Password">
                                    <?php include('includes/errors.php') ?>
                                    <button type="submit" class="theme-btn mt-20 mb-20 wow fadeInUp float-right" data-wow-delay="1.1s" name="login_btn">Login</button>
                                </form>

                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <p class="wow fadeInUp" data-wow-delay="1.3s">Not yet a member? <a class="red" href="register.php">Sign up</a></p>

                                </div>
                                <div class="col-5">
                                    <a class="red text-right wow fadeInUp float-right" data-wow-delay="1.3s" href="forgot_password.php">Forgotten Password?</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-2 mx-auto"></div>
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