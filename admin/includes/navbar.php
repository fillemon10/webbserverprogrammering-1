<header class="header navbar-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="<?php ROOT_PATH ?>/admin/dashboard">
                        <img src="<?php ROOT_PATH ?>/assets/img/logo/logo_admin.svg" alt="Logo" /> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse sub-menu-bar justify-content-end" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="javascript:void(0)">Manage Reviews</a>

                                <ul class="sub-menu">
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/admin/create_review">Create Review</a></li>
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/admin/reviews">Manage Reviews</a></li>
                                </ul>
                            <li class="nav-item">
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="javascript:void(0)">Manage Blog</a>

                                <ul class="sub-menu">
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/admin/create_post">Create Posts</a></li>
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/admin/posts">Manage Posts</a></li>
                                    <li class="nav-item"><a href="<?php ROOT_PATH ?>/admin/topics">Manage Topics</a></li>
                                </ul>
                            <li class="nav-item">
                            </li>
                            <li class="nav-item">
                                <a href="<?php ROOT_PATH ?>/admin/users">Manage Users</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php ROOT_PATH ?>/admin/comments">Manage Comments</a>
                            </li>

                            <li class="nav-item">
                                <a class="page-scroll dd-menu" href="javascript:void(0)"><?php echo $_SESSION['user']['username'] ?></a>

                                <ul class="sub-menu">
                                    <li class="nav-item"> <a class="page-scroll" href="<?php ROOT_PATH ?>/myaccount"><i class="fas fa-cog dark-red"></i>&#8192;My Account</a></li>
                                    <li class="nav-item"> <a class="page-scroll" href="<?php ROOT_PATH ?>/index"><i class="fas fa-arrow-circle-left dark-red"></i>&#8192;Back to Cinemania</a></li>
                                    <li class="nav-item"> <a class="page-scroll" href="<?php ROOT_PATH ?>/logout"><i class="fas fa-sign-out-alt dark-red"></i>&#8192;Logout</a></li>
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
