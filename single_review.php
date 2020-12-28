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
<?php $movie = $omdb->get_by_id($review['imdb_id']);
$comments = GetPublishedreviewComments($review['id']);
?>

<?php include('includes/head.php'); ?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->
    

    <!-- ========================= review-section start ========================= -->
    <section id="review" class="review-section mt-100 pt-50 pb-20">
        <div class="container  box-style review-container wow fadeInup" data-wow-delay=".2s">
            <div class="single-review">
                <div class="row">
                    <?php if (isset($review['published']) == false) : ?>
                        <h2>Sorry... This review has not been published</h2>
                        <div class="col-4 mt-20">
                            <a href="review.php" class="theme-btn readmore-btn"><i class="lni lni-arrow-left"></i>&#8192;Back to review</a>
                        </div>
                    <?php else : ?>
                        <div class="col-xl-8 col-lg-8 col-md-8 section-title">
                            <p class="wow fadeInDown" data-wow-delay=".4s"><i class="p-mask lni lni-calendar"></i>&#8192;<?php echo date("F j, Y ", strtotime($review["created_at"])); ?>&#8192;&#8192;<i class="p-mask lni lni-user"></i>&#8192;<?php echo $review["username"]  ?></p>
                            <?php
                            if (count($review["genres"]) > 1) {
                                foreach ($review["genres"] as $key => $genre) { ?>
                                    <a class="wow fadeInLeft mb-10 red" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews.php?genre=' . strtolower($review["genres"][$key]) ?>"><?php echo $review["genres"][$key] ?></a>
                                <?php }
                            } else { ?>
                                <a class="wow fadeInLeft mb-10 red" data-wow-delay=".6s" href="<?php echo BASE_URL . '/filtered_reviews.php?genre=' . strtolower($review["genres"][0]) ?>"><?php echo $review["genres"][0] ?></a>
                            <?php } ?>
                            <h1 class="wow fadeInLeft" data-wow-delay=".2s"><?php echo "'" . $review["title_of"] . "' review: " . $review["title"] ?></h1>
                            <?php if ($review["type"] == 0) : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . '/filtered_reviews.php?type=movie' ?>"><span class="wow fadeInLeft" data-wow-delay=".2s">Movie</span></a>
                            <?php else : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . '/filtered_reviews.php?type=series' ?>"><span class="wow fadeInLeft" data-wow-delay=".2s">TV/Streaming</span></a>
                            <?php endif ?>


                            <div class="wow fadeInLeft" data-wow-delay=".6s"><?php echo htmlspecialchars_decode($review['body']) ?></div>
                            <p class="wow fadeInLeft mt-10" data-wow-delay=".6s"><strong>Plot: </strong><?php echo $movie['Plot'] ?></p>
                            <a href="reviews.php" class="theme-btn readmore-btn mt-10 mb-10"><i class="lni lni-arrow-left"></i>&#8192;Back to reviews</a>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4">
                            <div class=" box-style ratings mb-20 wow fadeInRight" data-wow-delay=".7s">
                                <div class="row">
                                    <div class="col">
                                        <img class="rating-logo" src="assets/img/logo/logo.svg" alt="cinemania-logo">
                                    </div>
                                    <div class="col">
                                        <h3 class="mb-0 text-right"><?php echo $review['our_rating'] ?>/10</h3>
                                    </div>
                                </div>
                            </div>
                            <div class=" box-style ratings wow fadeInRight" data-wow-delay=".9s">
                                <div class="row">
                                    <div class="col">
                                        <img src="assets/img/logo/IMDb_logo.svg" height="48px" alt="IMDb-logo">
                                    </div>
                                    <div class="col">
                                        <h3 class="mb-0 text-right"><?php echo $movie['Ratings'][0]["Value"] ?></h3>
                                    </div>
                                </div>
                            </div>

                            <img class=" box-style p-0 poster-img wow fadeInRight" data-wow-delay="1s" src="<?php echo $review['poster']; ?>" alt="poster-<?php echo  str_replace(" ", "-", strtolower($review["title_of"])); ?>">
                        </div>
                </div>
                <div class="row mt-20">
                    <h3 class="mb-10">Comments</h3>
                    <form class="box-style" action="" method="POST">
                        <?php include('includes/errors.php') ?>
                        <h5>Leave a comment</h5>
                        <div class="form-group">
                            <textarea class="form-control" name="comment_review_text" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 138px;"></textarea>
                        </div>
                        <button type="submit" class="theme-btn mt-20 mb-20 wow fadeInUp" data-wow-delay="0.5s" name="comment_review_btn">Post Comment</button>
                        <?php foreach ($comments as $comment) { ?>
                            <div class="container box-style comment">
                                <div class="col">
                                    <p class="wow fadeInDown lead" data-wow-delay=".2s"><?php echo $comment['text'] ?></p>
                                    <p class="wow fadeInDown " data-wow-delay=".4s"><i class="p-mask lni lni-calendar"></i>&#8192;<?php echo date("F j, Y ", strtotime($comment["created_at"])); ?>&#8192;&#8192;<i class="p-mask lni lni-user"></i>&#8192;<?php echo $comment["username"]  ?></p>

                                </div>
                            </div>
                        <?php } ?>
                    </form>

                </div>
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