<section class="page-banner-section pt-30 pb-15 img-bg wow fadeInDown" style="background-image: url('assets/img/bg/common-bg.svg')">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="banner-content">
          <h2 class="text-white"><?php echo $title ?> </h2>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item wow fadeInLeft" data-wow-delay=".2s" aria-current="page"><a href="index">Cinemania</a></li>
                <?php if (isset($_GET['topic'])) : ?>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><a href="blog">Blog</a></li>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><?php echo "Topic: " . $title ?></li>
                <?php elseif (isset($_GET['post-slug'])) : ?>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><a href="blog">Blog</a></li>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><?php echo $post['slug'] ?></li>
                <?php elseif (isset($_GET['genre'])) : ?>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><a href="reviews">Reviews</a></li>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><?php echo "Genre: " . $title ?></li>
                <?php elseif (isset($_GET['type'])) : ?>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><a href="reviews">Reviews</a></li>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><?php echo "Type: " . $title ?></li>
                <?php else : ?>
                  <li class="breadcrumb-item active  wow fadeInLeft" data-wow-delay=".4s"" aria-current=" page"><?php echo $title ?> </li>
                <?php endif ?>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
