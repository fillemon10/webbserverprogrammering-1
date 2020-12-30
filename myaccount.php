<?php
require_once("config.php");
$title = "My Account";
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
    <?php if (isset($_SESSION['user']['username'])) { ?>
        <section class="myaccount-section pt-50 pb-20">
            <div class="container  box-style pt-15">
                <div class="row">
                    <div class="col-2">
                        <ul>
                            <li>
                                <a class="red mt-10" href="<?php ROOT_PATH ?>/myaccount?page=edit">Edit Account</a>
                            </li>
                            <li>
                                <a class="red mt-10" href="<?php ROOT_PATH ?>/myaccount?page=email">Email Preferences</a>
                            </li>
                            <li>
                                <a class="red mt-10" href="<?php ROOT_PATH ?>/myaccount?page=contributions">View Contributions</a>
                            </li>
                            <li>
                                <a class="red mt-10" href="<?php ROOT_PATH ?>/myaccount?page=delete">Delete Account</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-10">
                        <h3 class="mt-10">Edit Account</h3>
                        <ul>
                            <li>
                                <div class="mt-20 mb-20 row">
                                    <div class="col-9">
                                        <p>Username:</p>
                                        <p><?php echo $_SESSION['user']['username'] ?></p>
                                    </div>
                                    <div class="col-3">
                                        <a href="javascript:void(0)" class="theme-btn float-right">Edit</a>
                                    </div>
                                </div>
                                <hr>
                            </li>
                            <li>

                                <div class="mt-20 mb-20 row">
                                    <div class="col-9">
                                        <p>Email:</p>
                                        <p><?php echo $_SESSION['user']['email'] ?></p>
                                    </div>
                                    <div class="col-3">
                                        <a href="javascript:void(0)" class="theme-btn float-right">Edit</a>
                                    </div>
                                </div>
                                <hr>
                            </li>
                            <li>
                                <div class="mt-20 mb-20 row">
                                    <div class="col-9">
                                        <p>Password:</p>
                                        <p>**********</p>
                                    </div>
                                    <div class="col-3">
                                        <a href="javascript:void(0)" class="theme-btn float-right">Edit</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="mt-20 mb-20 row">
                                    <div class="col-9">
                                        <p>Role:</p>
                                        <p><?php echo $_SESSION['user']['role'] ?></p>
                                    </div>
                                </div>
                                <hr>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <?php } else {
        echo "Login to see this page";
    } ?>
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
