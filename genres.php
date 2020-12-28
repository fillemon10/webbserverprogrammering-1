<?php
require_once("config.php");
$title = "Genres";
require_once("includes/head.php");
require_once('includes/public_functions.php');
$genres = getAllGenres();
$genres = array_unique($genres);
?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= page-banner-section start ========================= -->
    <?php include("includes/banner.php") ?>
    <!-- ========================= page-banner-section end ========================= -->

    <!-- ========================= -section start ========================= -->
    <section class="genres-section pt-20 pb-20">
        <div class="container">
            <div class="row">
                <ul>
                    <?php foreach ($genres as $genre) { ?>
                        <li>
                            <a class="wow fadeInLeft mb-10" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews.php?genre=' . strtolower($genre) ?>"><h3 class="red"><?php echo $genre ?></h3></a>
                        </li>
                    <?php } ?>
                </ul>
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