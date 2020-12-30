<?php require_once("../config.php");
$title = "404 Not Found";
?>
<?php require_once("../includes/head.php") ?>

<body>

    <!-- ========================= header start ========================= -->
    <?php include("../includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= page-banner-section start ========================= -->
    <?php include("../includes/banner.php") ?>
    <!-- ========================= page-banner-section end ========================= -->

    <!-- ========================= page-404-section end ========================= -->
    <section class="page-404-section pt-130 pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-404-content text-center">
                        <h2 class="mb-30">404</h2>
                        <h4 class="mb-40">
                            <?php
                            $path = str_replace("/filip/cinemania", "", $_SERVER['REQUEST_URI']);
                            echo $path;
                            ?> does not exist, sorry.</h4>
                        <a href="<?php ROOT_PATH ?>/index" class="theme-btn">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= page-404-section end ========================= -->

    <!-- ========================= footer start ========================= -->
    <?php include("../includes/footer.php") ?>
    <?php include("../includes/js.php") ?>
</body>

</html>
