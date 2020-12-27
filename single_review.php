<?php include('config.php'); ?>
<?php include('includes/public_functions.php');
include("includes/omdb.php");
?>

<?php
if (isset($_GET['review-slug'])) {
    $review = getReview($_GET['review-slug']);
}
?>
<?php if (isset($review['published']) == false) {
    $title = "Not Published";
} else {
    $title = $review['title'];
}
?>
<?php $movie = $omdb->get_by_id($review['imdb_id']); ?>

<?php include('includes/head.php'); ?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= review-section start ========================= -->
    <section id="review" class="review-section mt-100 pt-50 pb-20">
        <div class="container feature-box box-style review-container wow fadeInup" data-wow-delay=".2s">
            <div class="single-review">
                <div class="row">
                    <?php if (isset($review['published']) == false) : ?>
                        <h2>Sorry... This review has not been published</h2>
                        <div class="col-4 mt-20">
                            <a href="review.php" class="theme-btn readmore-btn"><i class="lni lni-arrow-left"></i>&#8192;Back to review</a>
                        </div>
                    <?php else : ?>
                        <div class="col-xl-8 col-lg-8 col-md-8 section-title">
                            <?php
                            if (count($review["genres"]) > 1) {
                                foreach ($review["genres"] as $key => $genre) { ?>
                                    <a class="wow fadeInLeft mb-10 red" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews.php?genre=' . strtolower($review["genres"][$key]) ?>"><?php echo $review["genres"][$key] ?></a>
                                <?php }
                            } else { ?>
                                <a class="wow fadeInLeft mb-10 red" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews.php?genre=' . strtolower($review["genres"][0]) ?>"><?php echo $review["genres"][0] ?></a>
                            <?php } ?>
                            <h1 class="wow fadeInLeft" data-wow-delay=".2s"><?php echo "'" . $review["title"] . "' review: " . $review["title"] ?></h1>
                            <?php if ($review["type"] == 0) : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . '/filtered_reviews.php?type=movie' ?>"><span class="wow fadeInLeft" data-wow-delay=".2s">Movie</span></a>
                            <?php else : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . '/filtered_reviews.php?type=series' ?>"><span class="wow fadeInLeft" data-wow-delay=".2s">TV/Streaming</span></a>
                            <?php endif ?>
                            <p class="wow fadeInLeft mb-10" data-wow-delay=".6s"><strong>IMDb rating: <?php echo $movie['Ratings'][0]["Value"] ?></strong></p>
                            <p class="wow fadeInLeft mb-10" data-wow-delay=".6s"><strong>Cinemania Rating: <?php echo $review['our_rating'] ?>/10</strong></p>


                            <div class="wow fadeInLeft" data-wow-delay=".6s"><?php echo htmlspecialchars_decode($review['body']) ?></div>
                            <p class="wow fadeInLeft mt-10" data-wow-delay=".6s"><strong>Plot: </strong><?php echo $movie['Plot'] ?></p>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 ">
                            <img class="poster-img wow fadeInRight mt-10" data-wow-delay=".4s" src="<?php echo $review['poster']; ?>" alt="poster-<?php echo  str_replace(" ", "-", strtolower($review["title_of"])); ?>">
                        </div>
                </div>
                <div class="row mt-10">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <a href="reviews.php" class="theme-btn readmore-btn"><i class="lni lni-arrow-left"></i>&#8192;Back to reviews</a>

                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <p class="wow fadeInUp" data-wow-delay=".8s"><?php echo date("F j, Y ", strtotime($review["created_at"])); ?></p>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2  text-right">
                        <p class="wow fadeInUp" data-wow-delay=".8s"><?php echo "username" ?></p>
                    </div>
                <?php endif ?>
                </div>

            </div>
        </div>
    </section>
    <!-- ========================= review-section end ========================= -->

    <!-- ========================= subscribe-section start ========================= -->
    <?php include("includes/subscribe.php") ?>
    <!-- ========================= subscribe-section end ========================= -->

    <!-- ========================= footer start  ========================= -->
    <?php include("includes/footer.php") ?>
    <!-- ========================= footer end  ========================= -->

    <?php include("includes/js.php") ?>
</body>

</html>