<?php
require_once("config.php");
$title = "Blog";
require_once("includes/head.php");
require_once('includes/public_functions.php');
$posts = array_reverse(getPublishedPosts());
?>

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
      <div class="container  box-style blog-container wow fadeInup" data-wow-delay=".2s">
        <div class="single-blog all-published">
          <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-8 section-title">
              <p class="wow fadeInDown" data-wow-delay=".4s"><i class="p-mask lni lni-calendar"></i>&#8192;<?php echo date("F j, Y ", strtotime($post["created_at"])); ?>&#8192;&#8192;<i class="p-mask lni lni-user"></i>&#8192;<?php echo $post["username"]  ?></p>

              <div class="row">
                <a class="mb-0" href="single_post?post-slug=<?php echo $post['slug']; ?>">
                  <h2 class="mb-0 wow fadeInLeft" data-wow-delay=".2s"><?php echo $post['title'] ?></h2>
                </a>
              </div>
              <?php if (isset($post['topic']['name'])) : ?>
                <a class="mb-0" href="<?php echo BASE_URL . '/filtered_posts?topic=' . $post['topic']['id'] ?>"> <span class="wow fadeInLeft" data-wow-delay=".4s"> <?php echo $post['topic']['name'] ?></span></a>
              <?php endif ?>
              <div class="mb-10 wow fadeInLeft" data-wow-delay=".6s"><?php echo htmlspecialchars_decode(shorten_string($post['body'], 40)) ?></div>
              <a href="single_post?post-slug=<?php echo $post['slug']; ?>" class="theme-btn readmore-btn wow fadeInUp" data-wow-delay=".4s">Read more</a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 text-right">
              <img class=" box-style p-0 blog-img wow fadeInRight mb-0" data-wow-delay=".4s" src="<?php echo $post['image']; ?>" alt="post-image">
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
