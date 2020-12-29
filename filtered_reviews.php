<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>
<?php $filtered_reviews = array() ?>
<?php
// Get posts under a particular topic
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    if ($type == 'movie') {
        $type_id = 0;
        $title = "Movie";
    } else {
        $type_id = 1;
        $title = "Streaming/TV";
    }
    if (isset($_GET['best'])) {
        $best = $_GET['best'];
        if ($best == 1) {
            if ($type == 'movie') {
                $title = "Best Movies";
            } else {
                $title = "Best Streaming/TV";
            }
            $reviews = GetBestReviews($type_id);
        }
    } else {
        $reviews = array_reverse(GetPublishedReviewsByType($type_id));
    }
} elseif (isset($_GET['genre'])) {
    $genre = ucfirst($_GET['genre']);
    $title = $genre;
    $reviews = array_reverse(GetPublishedReviewsByGenre($genre));
}

?>
<?php include('includes/head.php'); ?>

<body>

    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= page-banner-section start ========================= -->
    <?php include("includes/banner.php") ?>
    <!-- ========================= page-banner-section end ========================= -->

    <!-- ========================= blog-section start ========================= -->
    <section class="review-section pt-50 pb-20">
        <?php foreach ($reviews as $review) : ?>
            <div class="container  box-style review-container wow fadeInup" data-wow-delay=".2s">
                <div class="single-review all-published">
                    <div class="row">
                        <div class="col-xl-10 col-lg-9 col-md-8 section-title">
                            <p class="wow fadeInDown" data-wow-delay=".4s"><i class="p-mask lni lni-calendar"></i>&#8192;<?php echo date("F j, Y ", strtotime($review["created_at"])); ?>&#8192;&#8192;<i class="p-mask lni lni-user"></i>&#8192;<?php echo $review["username"]  ?></p>
                            <?php
                            if (count($review["genres"]) > 1) {
                                foreach ($review["genres"] as $key => $genre) { ?>
                                    <a class="font-weight-bold wow fadeInLeft mb-0 mt-10 red" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews?genre=' . strtolower($review["genres"][$key]) ?>"><?php echo $review["genres"][$key] ?></a>
                                <?php }
                            } else { ?>
                                <a class="wow fadeInLeft red" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews?genre=' . strtolower($review["genres"][0]) ?>"><?php echo $review["genres"][0] ?></a>
                            <?php } ?>
                            <div class="row">
                                <a class="mb-0" href="single_review?review-slug=<?php echo $review['slug']; ?>">
                                    <h2 class="wow fadeInLeft mt-10 mb-0" data-wow-delay=".2s"><?php echo "'" . $review["title_of"] . "' review: " . $review["title"] ?></h2>
                                </a>
                            </div>
                            <?php if ($review["type"] == 0) : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . '/filtered_reviews?type=movie' ?>"><span class="wow fadeInLeft" data-wow-delay=".2s">Movie</span></a>
                            <?php else : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . '/filtered_reviews?type=series' ?>"><span class="wow fadeInLeft" data-wow-delay=".2s">TV/Streaming</span></a>
                            <?php endif ?>
                            <div class="row">
                                <div col-2>
                                    <a href="single_review?review-slug=<?php echo $review['slug']; ?>" class="theme-btn readmore-btn wow fadeInUp mb-10 " data-wow-delay=".4s">Read review</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 text-right">
                            <img class=" box-style p-0 poster-img wow fadeInRight" data-wow-delay=".4s" src="<?php echo $review['poster']; ?>" alt="poster-<?php echo  str_replace(" ", "-", strtolower($review["title_of"])); ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </section>
    <!-- ========================= blog-section end ========================= -->

    <!-- ========================= subscribe-section start ========================= -->
    <?php include("includes/subscribe.php") ?>
    <!-- ========================= subscribe-section end ========================= -->

    <!-- ========================= footer start  ========================= -->
    <?php include("includes/footer.php") ?>
    <!-- ========================= footer end  ========================= -->

    <?php include("includes/js.php") ?>
</body>

</html>