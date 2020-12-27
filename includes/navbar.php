<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.php">
                        <img src="assets/img/logo/logo.svg" alt="Logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="page-scroll" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="reviews.php">Reviews</a>

                                <ul class="sub-menu">
                                    <li class="nav-item"><a href="filtered_reviews.php?type=movie">Latests Movie</a></li>
                                    <li class="nav-item"><a href="filtered_reviews.php?type=movie&best=1">Best Movies</a></li>
                                    <li class="nav-item"><a href="filtered_reviews.php?type=series">Latests TV/Streaming</a></li>
                                    <li class="nav-item"><a href="filtered_reviews.php?type=series&best=1">Best TV/Streaming</a></li>
                                    <li class="nav-item"><a href="genres.php">Genres</a></li>
                                    <li class="nav-item"><a href="reviews.php">All</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="blog.php">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="javascript:void(0)">About</a>

                                <ul class="sub-menu">
                                    <li class="nav-item"><a href="about.php">About Us</a></li>
                                    <li class="nav-item"><a href="license.php">License</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="contact.php">Contact</a>
                            </li>
                            <li class="nav-item">
                                <form action="search.php?<?php echo $_POST["search"]  ?>" class="search-form">
                                    <input name="search" type="text" placeholder="Search" />
                                    <button type="submit"><i class="lni lni-search-alt"></i></button>
                                </form>
                            </li>
                            <?php if (isset($_SESSION['user']['username'])) { ?>
                                <li class="nav-item">
                                    <a class="page-scroll dd-menu" href="javascript:void(0)"><?php echo $_SESSION['user']['username'] ?></a>

                                    <ul class="sub-menu">
                                        <li class="nav-item"> <a class="page-scroll" href="myaccount.php"><i class="lni lni-cog dark-red"></i>&#8192;My Account</a></li>
                                        <li class="nav-item"> <a class="page-scroll" href="logout.php"><i class="lni lni-exit dark-red"></i>&#8192;Logout</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="page-scroll theme-btn login-btn" href="login.php"><i class="lni lni-user"></i>&#8192;Login</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- navbar collapse -->
                </nav>
                <!-- navbar -->
            </div>
        </div>
    </div>
</header>