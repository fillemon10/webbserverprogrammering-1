<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>
<?php
// Get posts under a particular topic
if (isset($_GET['topic'])) {
    $topic_id = $_GET['topic'];
    $posts = array_reverse(getPublishedPostsByTopic($topic_id));
}
$title = getTopicNameById($topic_id);
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
    <section id="blog" class="blog-section pt-50 pb-20">
        <?php foreach ($posts as $post) : ?>
            <div class="container feature-box box-style blog-container wow fadeInup" data-wow-delay=".2s">
                <div class="single-blog">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-8 section-title">
                            <div class="row">
                                <a href="single_review.php?review-slug=<?php echo $review['slug']; ?>">
                                    <h1 class="wow fadeInLeft" data-wow-delay=".2s"><?php echo $post['title'] ?></h1>
                                </a>
                            </div> 
                            <?php if (isset($post['topic']['name'])) : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"> <span class="wow fadeInLeft" data-wow-delay=".4s"> <?php echo $post['topic']['name'] ?></span></a>
                            <?php endif ?>
                            <div class="wow fadeInLeft" data-wow-delay=".6s"><?php echo htmlspecialchars_decode($post['body']) ?></div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 text-right">
                            <img class="blog-img wow fadeInRight" data-wow-delay=".4s" src="<?php echo $post['image']; ?>" alt="post-image">
                        </div>
                    </div>
                    <div class="row mt-10">
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" class="theme-btn readmore-btn wow fadeInUp" data-wow-delay=".8s">Read more</a>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <p class="wow fadeInUp" data-wow-delay=".8s"><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></p>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2  text-right">
                            <p class="wow fadeInUp" data-wow-delay=".8s"><?php echo "username" ?></p>
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