<div class="container box-style comment mb-10 mt-10 wow fadeInDown " data-wow-delay=".1s">
    <div class=" row">
        <div class="col-xl-10 col-lg-10 col-md-10">
            <div class="row">
                <p class="comment-info wow fadeInDown " data-wow-delay=".1s">
                    <i class="p-mask fas fa-user comment-info"></i>&#8192;<?php echo $comment["username"];   ?>&#8192;&#8192;<i class="p-mask fas fa-calendar-alt comment-info"></i>&#8192;<?php echo date("F j, Y ", strtotime($comment["created_at"])); ?>
                </p>
            </div>
            <p class="wow fadeInDown" data-wow-delay=".3s"><?php echo $comment['text'] ?></p>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-2">
            <?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
                <a class="delete btn btn-danger float-right" style="margin-left: 10px;" href="<?php ROOT_PATH ?>/comments?delete-comment-<?php echo $review_or_post ?>=<?php echo $comment['id'] ?>">
                    <i class=" fas fa-trash"></i>
                </a>
            <?php } ?>
            <?php if ($comment['published'] == true) : ?>
                <a class="publish  btn btn-success float-right" href="<?php ROOT_PATH ?>/comments?publish_<?php echo $review_or_post ?>=<?php echo $comment['id'] ?>">
                    <i class="fas fa-check"></i> </a>
            <?php else : ?>

                <a class="unpublish btn btn-warning float-right" href="<?php ROOT_PATH ?>/comments?unpublish_<?php echo $review_or_post ?>=<?php echo $comment['id'] ?>">
                    <i class="fas fa-times"></i> </a>
            <?php endif ?>
        </div>
    </div>

    <?php foreach ($replies as $reply) { ?>
        <div class="row ">
            <div class="col-xl-1 col-lg-1 col-md-1 pr-0 pl-0">
            </div>
            <div class="col-xl-11 col-lg-11 col-md-11 pl-0">
                <div class="container box-style comment reply mt-10 mb-0 wow fadeInDown " data-wow-delay=".3s">
                    <div class="row">
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="row">
                                <p class="wow fadeInDown comment-info" data-wow-delay=".1s">
                                    <i class="p-mask fas fa-user comment-info"></i>&#8192;<?php echo $reply["username"];   ?>&#8192;&#8192;<i class="p-mask fas fa-calendar-alt comment-info"></i>&#8192;<?php echo date("F j, Y ", strtotime($reply["created_at"])); ?>
                                </p>
                            </div>
                            <p class="wow fadeInDown" data-wow-delay=".3s"><?php echo $reply['text'] ?></p>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <?php if (in_array($_SESSION['user']['role'], ["Admin"])) { ?>
                                <a class="delete btn btn-danger float-right" style="margin-left: 10px;" href="<?php ROOT_PATH ?>/comments?delete-reply-<?php echo $review_or_post ?>=<?php echo $reply['id'] ?>">
                                    <i class=" fas fa-trash"></i>
                                </a>
                            <?php } ?>
                            <?php if ($reply['published'] == true) : ?>
                                <a class="publish  btn btn-success float-right" href="<?php ROOT_PATH ?>/comments?publish_reply_<?php echo $review_or_post ?>=<?php echo $reply['id'] ?>">
                                    <i class="fas fa-check"></i> </a>
                            <?php else : ?>

                                <a class="unpublish btn btn-warning float-right" href="<?php ROOT_PATH ?>/comments?unpublish_reply_<?php echo $review_or_post ?>=<?php echo $reply['id'] ?>">
                                    <i class="fas fa-times"></i> </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
