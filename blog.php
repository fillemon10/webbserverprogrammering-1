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
  <?php include("includes/post.php"); ?>

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
