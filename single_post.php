<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>
<?php
if (isset($_GET['post-slug'])) {
    $post = getPost($_GET['post-slug']);
}
$topics = getAllTopics();
?>
<?php if (isset($post['published']) == false) {
    $title = "Not Published";
} else {
    $title = $post['title'];
}
$comments = GetPublishedPostComments($post['id']);

?>
<?php include('includes/head.php'); ?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->


    <!-- ========================= blog-section start ========================= -->
    <section id="blog" class="blog-section mt-100 pt-50 pb-20">
        <div class="container  box-style blog-container wow fadeInup" data-wow-delay=".2s">
            <div class="single-blog">
                <div class="row">
                    <?php if (isset($post['published']) == false) : ?>
                        <h2>Sorry... This post has not been published</h2>
                        <div class="col-4 mt-20">
                            <a href="blog.php" class="theme-btn readmore-btn"><i class="lni lni-arrow-left"></i>&#8192;Back to blog</a>
                        </div>
                    <?php else : ?>
                        <div class="col-xl-8 col-lg-8 col-md-8 section-title">
                            <p class="wow fadeInDown" data-wow-delay=".8s"><i class="p-mask lni lni-calendar"></i>&#8192;<?php echo date("F j, Y ", strtotime($post["created_at"])); ?>&#8192;&#8192;<i class="p-mask lni lni-user"></i>&#8192;<?php echo $post["username"]  ?></p>
                            <h1 class="wow fadeInLeft" data-wow-delay=".2s"><?php echo $post['title'] ?></h1>
                            <?php if (isset($post['topic']['name'])) : ?>
                                <a class="mb-10 mt-10" href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"> <span class="wow fadeInLeft" data-wow-delay=".4s"> <?php echo $post['topic']['name'] ?></span></a>
                            <?php endif ?>
                            <div class="wow fadeInLeft mb-20" data-wow-delay=".6s"><?php echo htmlspecialchars_decode($post['body']) ?></div>
                            <a href="blog.php" class="theme-btn readmore-btn"><i class="lni lni-arrow-left"></i>&#8192;Back to blog</a>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 text-right">
                            <img class=" box-style p-0 blog-img wow fadeInRight" data-wow-delay=".4s" src="<?php echo $post['image']; ?>" alt="post-image">
                        </div>
                </div>
                <div class="row mt-20">
                    <h3 class="mb-10">Comments</h3>
                    <form class="box-style" action="" method="POST">
                        <?php include('includes/errors.php') ?>
                        <h5>Leave a comment</h5>
                        <div class="form-group">
                            <textarea class="form-control" name="comment_post_text" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: 138px;"></textarea>
                        </div>
                        <button type="submit" class="theme-btn mt-20 mb-20 wow fadeInUp" data-wow-delay="0.5s" name="comment_post_btn">Post Comment</button>
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