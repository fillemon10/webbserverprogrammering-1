<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="<?php ROOT_PATH ?>/index">
                        <img src="<?php ROOT_PATH ?>/assets/img/logo/logo.svg" alt="Logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar float-right" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="page-scroll" href="<?php ROOT_PATH ?>/index">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="<?php ROOT_PATH ?>/reviews">Reviews</a>

                                <ul class="sub-menu">
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/type/movie">Latests Movie</a></li>
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/type/movie?best=1">Best Movies</a></li>
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/type/series">Latests TV/Streaming</a></li>
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/type/series?best=1">Best TV/Streaming</a></li>
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/genres">Genres</a></li>
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/reviews">All</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="<?php ROOT_PATH ?>/blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php ROOT_PATH ?>/about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="<?php ROOT_PATH ?>/contact">Contact</a>
                            </li>
                            <!--                          <li class="nav-item">
                                <form action="search?<?php // echo $_POST["search"]  
                                                        ?>" class="search-form">
                                    <input name="search" type="text" placeholder="Search" />
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </li> -->
                            <?php if (isset($_SESSION['user']['username'])) { ?>
                                <li class="nav-item">
                                    <a class="page-scroll dd-menu" href="javascript:void(0)"><?php echo $_SESSION['user']['username'] ?></a>

                                    <ul class="sub-menu">
                                        <li class="nav-item"> <a class="page-scroll" href="<?php ROOT_PATH ?>/myaccount"><i class="fas fa-cog dark-red"></i>&#8192;My Account</a></li>
                                        <?php if (in_array($_SESSION['user']['role'], ["Admin", "Author", "Moderator"])) { ?>
                                            <li class="nav-item"> <a class="page-scroll" href="<?php ROOT_PATH ?>/admin/dashboard"><i class="fas fa-users-cog dark-red"></i>&#8192;CineAdmin</a></li>
                                        <?php } ?>
                                        <li class="nav-item"> <a class="page-scroll" href="<?php ROOT_PATH ?>/logout"><i class="fas fa-sign-out-alt dark-red"></i>&#8192;Logout</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="page-scroll theme-btn login-btn" href="<?php ROOT_PATH ?>/login"><i class="fas fa-sign-in-alt"></i>&#8192;Login</a>
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
