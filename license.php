<?php
require_once("config.php");
$title = "License";
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
    <section class="-section pt-50 pb-20">
        <span>Photo by <a href="<?php ROOT_PATH ?>/https://unsplash.com/@kilyan_s?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Kilyan Sockalingum</a> on <a href="<?php ROOT_PATH ?>/https://unsplash.com/s/photos/cinema?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span>
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
