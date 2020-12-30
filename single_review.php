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
    $review_or_post = "review";
}
?>
<?php $movie = $omdb->get_by_id($review['imdb_id']);
$comments = GetPublishedComments($review['id'], "review");
?>

<?php include('includes/head.php'); ?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->



    <!-- ========================= review-section start ========================= -->
    <section id="review" class="review-section mt-100 pt-20 pb-20">
        <div class="container  box-style review-container wow fadeInUp">
            <div class="single-review pb-15">
                <div class="row">
                    <?php include('includes/errors.php') ?>
                    <?php include(ROOT_PATH . '/includes/messages.php') ?>
                    <?php if (isset($review['published']) == false) : ?>
                        <h2>Sorry... This review has not been published</h2>
                        <div class="col-4 mt-20">
                            <a href="<?php ROOT_PATH ?>/reviews" class="theme-btn readmore-btn"><i class="fas fa-arrow-left"></i>&#8192;Back to review</a>
                        </div>
                    <?php else : ?>
                        <div class="col-xl-8 col-lg-8 col-md-8 section-title">
                            <p class="wow fadeInDown" data-wow-delay=".4s"><i class="p-mask fas fa-calendar-alt"></i>&#8192;<?php echo date("F j, Y ", strtotime($review["created_at"])); ?>&#8192;&#8192;<i class="p-mask fas fa-user"></i>&#8192;<?php echo $review["username"]  ?></p>
                            <?php
                            if (count($review["genres"]) > 1) {
                                foreach ($review["genres"] as $key => $genre) { ?>
                                    <a class="wow fadeInLeft mb-10 red" data-wow-delay=".6s" href="<?php ROOT_PATH ?>/genre/<?php echo strtolower($review["genres"][$key]) ?>"><?php echo $review["genres"][$key] ?></a>
                                <?php }
                            } else { ?>
                                <a class="wow fadeInLeft mb-10 red" data-wow-delay=".6s" href="<?php ROOT_PATH ?>/genre/<?php echo strtolower($review["genres"][0]) ?>"><?php echo $review["genres"][0] ?></a>
                            <?php } ?>
                            <h1 class="wow fadeInLeft" data-wow-delay=".2s"><?php echo "'" . $review["title_of"] . "' review: " . $review["title"] ?></h1>
                            <?php if ($review["type"] == 0) : ?>
                                <a class="mb-10 mt-10" href="<?php ROOT_PATH ?>/type/movie"><span class="wow fadeInLeft" data-wow-delay=".2s">Movie</span></a>
                            <?php else : ?>
                                <a class="mb-10 mt-10" href="<?php ROOT_PATH ?>/type/series"><span class="wow fadeInLeft" data-wow-delay=".2s">TV/Streaming</span></a>
                            <?php endif ?>


                            <div class="wow fadeInLeft" data-wow-delay=".6s"><?php echo htmlspecialchars_decode($review['body']) ?></div>
                            <p class="wow fadeInLeft mt-10" data-wow-delay=".6s"><strong>Plot: </strong><?php echo $movie['Plot'] ?></p>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class=" box-style ratings mb-20 wow fadeInRight" data-wow-delay=".7s">
                                <div class="row">
                                    <div class="col">
                                        <img class="rating-logo" src="<?php ROOT_PATH ?>/assets/img/logo/logo.svg" alt="cinemania-logo">
                                    </div>
                                    <div class="col">
                                        <h3 class="mb-0 text-right"><?php echo $review['our_rating'] ?>/10</h3>
                                    </div>
                                </div>
                            </div>
                            <div class=" box-style ratings wow fadeInRight" data-wow-delay=".9s">
                                <div class="row">
                                    <div class="col">
                                        <img src="<?php ROOT_PATH ?>/assets/img/logo/IMDb_logo.svg" height="48px" alt="IMDb-logo">
                                    </div>
                                    <div class="col">
                                        <h3 class="mb-0 text-right"><?php echo $movie['Ratings'][0]["Value"] ?></h3>
                                    </div>
                                </div>
                            </div>

                            <img class=" box-style p-0 poster-img wow fadeInRight" data-wow-delay="1s" src="<?php echo $review['poster']; ?>" alt="poster-<?php echo  str_replace(" ", "-", strtolower($review["title_of"])); ?>">
                        </div>
                </div>
                <!-- ========================= comment-section start ========================= -->
                <?php include("includes/comments.php") ?>
                <!-- ========================= comment-section end ========================= -->
            <?php endif ?>
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
