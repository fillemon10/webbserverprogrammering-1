<?php
require_once("config.php");
$title = "About Us";
require_once("includes/head.php");

?>

<body class="<?php echo $themeClass ?>">

    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= page-banner-section start ========================= -->
    <?php include("includes/banner.php") ?>
    <!-- ========================= page-banner-section end ========================= -->


    <!-- ========================= feature-section start ========================= -->
    <section class="feature-section pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-7 col-md-9 mx-auto">
                    <div class="section-title text-center mb-55">
                        <span class="wow fadeInDown" data-wow-delay=".2s">Feature</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Why Chose Us?</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">At vero eos et accusamus et iusto odio dignissimos ducimus quiblanditiis praesentium</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class=" box-style">
                        <div class="feature-icon box-icon-style">
                            <i class="fas fa-layers"></i>
                        </div>
                        <div class="box-content-style feature-content">
                            <h4>Responsive Design</h4>
                            <p>Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt
                                labor dolore magna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class=" box-style">
                        <div class="feature-icon box-icon-style">
                            <i class="fas fa-code-alt"></i>
                        </div>
                        <div class="box-content-style feature-content">
                            <h4>Web Development</h4>
                            <p>Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt
                                labor dolore magna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class=" box-style">
                        <div class="feature-icon box-icon-style">
                            <i class="fas fa-agenda"></i>
                        </div>
                        <div class="box-content-style feature-content">
                            <h4>Business Analysis</h4>
                            <p>Lorem ipsum dolor sit amet, adipscing elitr, sed diam nonumy eirmod tempor ividunt
                                labor dolore magna.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= feature-section end ========================= -->

    <!--========================= about-section start========================= -->
    <section id="about" class="pt-100">
        <div class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-img-wrapper">
                            <div class="about-img position-relative d-inline-block wow fadeInLeft" data-wow-delay=".3s">
                                <img src="assets/img/about/about-img.png" alt="">

                                <div class="about-experience">
                                    <h3>5 Year Of Working Experience</h3>
                                    <p>We Crafted an aweso design library that is robust and intuitive to use.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-content-wrapper">
                            <div class="section-title">
                                <span class="wow fadeInUp" data-wow-delay=".2s">About Us</span>
                                <h2 class="mb-40 wow fadeInRight" data-wow-delay=".4s">Built-With Boostrap 5, a New Experiance</h2>
                            </div>
                            <div class="about-content">
                                <p class="mb-45 wow fadeInUp" data-wow-delay=".6s">We Crafted an awesome design library
                                    that is robust and intuitive to use. No matter you're building a business
                                    presentation websit or a complex web application our design</p>
                                <div class="counter-up wow fadeInUp" data-wow-delay=".5s">
                                    <div class="counter">
                                        <span id="secondo" class="countup count color-1" cup-end="30" cup-append="k">10</span>
                                        <h4>Happy Client</h4>
                                        <p>We Crafted an awesome design <br class="d-none d-md-block d-lg-none d-xl-block"> library that is robust and</p>
                                    </div>
                                    <div class="counter">
                                        <span id="secondo" class="countup count color-2" cup-end="42" cup-append="k">5</span>
                                        <h4>Project Done</h4>
                                        <p>We Crafted an awesome design <br class="d-none d-md-block d-lg-none d-xl-block"> library that is robust and</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================= about-section end========================= -->

    <section id="contact" class="contact-section cta-bg img-bg pt-110 pb-100" style="background-image: url('assets/img/bg/cta-bg.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-7">
                    <div class="section-title mb-60">
                        <span class="text-white wow fadeInDown" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">Space Free Lite</span>
                        <h2 class="text-white wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">You are using free lite version of Space</h2>
                        <p class="text-white wow fadeInUp" data-wow-delay=".6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Please, purchase full version of the template to get all pages, features and commercial license</p>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-5">
                    <div class="contact-btn text-left text-lg-right">
                        <a href="https://rebrand.ly/space-gg" rel="nofollow" class="theme-btn">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ========================= client-logo-section start ========================= -->
    <section class="client-logo-section pt-100 pb-130">
        <div class="container">
            <div class="client-logo-wrapper">
                <div class="client-logo-carousel d-flex align-items-center justify-content-between">
                    <div class="client-logo">
                        <img src="assets/img/client-logo/uideck-logo.svg" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="assets/img/client-logo/pagebulb-logo.svg" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="assets/img/client-logo/lineicons-logo.svg" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="assets/img/client-logo/graygrids-logo.svg" alt="">
                    </div>
                    <div class="client-logo">
                        <img src="assets/img/client-logo/lineicons-logo.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= client-logo-section end ========================= -->

    <!-- ========================= subscribe-section start ========================= -->
    <?php include("includes/subscribe.php") ?>
    <!-- ========================= subscribe-section end ========================= -->

    <!-- ========================= footer start  ========================= -->
    <?php include("includes/footer.php") ?>
    <!-- ========================= footer end  ========================= -->

    <?php include("includes/js.php") ?>
</body>

</html>
