<?php
require_once("config.php");
$title = "Reviews";
require_once("includes/head.php");
require_once('includes/public_functions.php');
$reviews = array_reverse(getPublishedReviews());
?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= page-banner-section start ========================= -->
    <?php include("includes/banner.php") ?>
    <!-- ========================= page-banner-section end ========================= -->

    <!-- ========================= -section start ========================= -->
    <section class="review-section pt-50 pb-20">
        <?php foreach ($reviews as $review) : ?>

            <div class="container feature-box box-style review-container wow fadeInup" data-wow-delay=".2s">
                <div class="single-review all-published">
                    <div class="row">
                        <div class="col-xl-10 col-lg-9 col-md-8 section-title">
                            <?php
                            if (count($review["genres"]) > 1) {
                                foreach ($review["genres"] as $key => $genre) { ?>
                                    <a class="wow fadeInLeft mb-10 red" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews.php?genre=' . strtolower($review["genres"][$key]) ?>"><?php echo $review["genres"][$key] ?></a>
                                <?php }
                            } else { ?>
                                <a class="wow fadeInLeft red" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews.php?genre=' . strtolower($review["genres"][0]) ?>"><?php echo $review["genres"][0] ?></a>
                            <?php } ?>
                            <div class="row">
                                <a href="single_review.php?review-slug=<?php echo $review['slug']; ?>">
                                    <h1 class="wow fadeInLeft mt-10" data-wow-delay=".2s"><?php echo "'" . $review["title_of"] . "' review: " . $review["title"] ?></h1>
                                </a>
                            </div>
                            <?php if ($review["type"] == 0) : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . '/filtered_reviews.php?type=movie' ?>"><span class="wow fadeInLeft" data-wow-delay=".2s">Movie</span></a>
                            <?php else : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . '/filtered_reviews.php?type=series' ?>"><span class="wow fadeInLeft" data-wow-delay=".2s">TV/Streaming</span></a>
                            <?php endif ?>
                            <div class="row">
                                <div col-2>
                                    <a href="single_review.php?review-slug=<?php echo $review['slug']; ?>" class="theme-btn readmore-btn wow fadeInUp mb-10 " data-wow-delay=".8s">Read review</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 text-right">
                            <img class="poster-img wow fadeInRight mt-10" data-wow-delay=".4s" src="<?php echo $review['poster']; ?>" alt="poster-<?php echo  str_replace(" ", "-", strtolower($review["title_of"])); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-8">
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4  text-right">
                            <p class="wow fadeInUp" data-wow-delay=".8s"><?php echo date("F j, Y ", strtotime($review["created_at"])); ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
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