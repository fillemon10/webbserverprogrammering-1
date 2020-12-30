<section class="review-section pt-50 pb-20">
    <?php foreach ($reviews as $review) { ?>
        <div class="container  box-style review-container ">
            <div class="single-review all-published">
                <div class="row">
                    <div class="col-xl-10 col-lg-9 col-md-8 section-title">
                        <p class="wow fadeInDown" data-wow-delay=".4s"><i class="p-mask fas fa-calendar-alt"></i>&#8192;<?php echo date("F j, Y ", strtotime($review["created_at"])); ?>&#8192;&#8192;<i class="p-mask fas fa-user"></i>&#8192;<?php echo $review["username"]  ?></p>
                        <?php
                        if (count($review["genres"]) > 1) {
                            foreach ($review["genres"] as $key => $genre) { ?>
                                <a class="font-weight-bold wow fadeInLeft mb-0 mt-10 red" data-wow-delay=".6s" href="<?php ROOT_PATH ?>/genre/<?php echo strtolower($review["genres"][$key]) ?>"><?php echo $review["genres"][$key] ?></a>
                            <?php }
                        } else { ?>
                            <a class="font-weight-bold wow fadeInLeft red mb-0 mt-10" data-wow-delay=".6s" href="<?php ROOT_PATH ?>/genre/<?php echo strtolower($review["genres"][0]) ?>"><?php echo $review["genres"][0] ?></a>
                        <?php } ?>
                        <div class="row">
                            <a class="mb-0" href="<?php ROOT_PATH ?>/review/<?php echo $review['slug']; ?>">
                                <h2 class="wow fadeInLeft mt-10 mb-0" data-wow-delay=".2s"><?php echo "'" . $review["title_of"] . "' review: " . $review["title"] ?></h2>
                            </a>
                        </div>
                        <?php if ($review["type"] == 0) : ?>
                            <a class="mt-10" href="<?php ROOT_PATH ?>/type/movie"><span class="wow fadeInLeft" data-wow-delay=".2s">Movie</span></a>
                        <?php else : ?>
                            <a class="mt-10" href="<?php ROOT_PATH ?>/type/series"><span class="wow fadeInLeft" data-wow-delay=".2s">TV/Streaming</span></a>
                        <?php endif ?>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 text-right">
                        <a class="mb-0" href="<?php ROOT_PATH ?>/review/<?php echo $review['slug']; ?>">
                            <img class=" box-style p-0 poster-img wow fadeInRight mb-0" data-wow-delay=".4s" src="<?php echo $review['poster']; ?>" alt="poster-<?php echo  str_replace(" ", "-", strtolower($review["title_of"])); ?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
