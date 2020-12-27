<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="<?php echo BASE_URL . 'admin/dashboard.php' ?>">
                        <img src="../assets/img/logo/logo_admin.svg" alt="Logo" /> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="javascript:void(0)">Manage Reviews</a>

                                <ul class="sub-menu">
                                    <li class="nav-item"><a href="<?php echo BASE_URL . 'admin/create_review.php' ?>">Create Review</a></li>
                                    <li class="nav-item"><a href="<?php echo BASE_URL . 'admin/reviews.php' ?>">Manage Reviews</a></li>
                                </ul>
                            <li class="nav-item">
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="javascript:void(0)">Manage Blog</a>

                                <ul class="sub-menu">
                                    <li class="nav-item"><a href="<?php echo BASE_URL . 'admin/create_post.php' ?>">Create Posts</a></li>
                                    <li class="nav-item"><a href="<?php echo BASE_URL . 'admin/posts.php' ?>">Manage Posts</a></li>
                                    <li class="nav-item"><a href="<?php echo BASE_URL . 'admin/topics.php' ?>">Manage Topics</a></li>
                                </ul>
                            <li class="nav-item">
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo BASE_URL . 'admin/users.php' ?>">Manage Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo BASE_URL . 'index.php' ?>">Back to Cinemania</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="javascript:void(0)"><?php echo $_SESSION['user']['username'] ?></a>

                                <ul class="sub-menu">
                                    <li class="nav-item"> <a class="page-scroll" href="../myaccount.php"><i class="lni lni-cog dark-red"></i>&#8192;My Account</a></li>
                                    <li class="nav-item"> <a class="page-scroll" href="../logout.php"><i class="lni lni-exit dark-red"></i>&#8192;Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- navbar collapse -->
                </nav>
                <!-- navbar -->
            </div>
        </div>
    </div>
</header>
<?php require_once("../includes/registration_login.php");
?>