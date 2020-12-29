<?php
require_once("config.php");
$title = "Contact";
require_once("includes/head.php");
?>

<body>
    <!-- ========================= header start ========================= -->
    <?php include("includes/navbar.php") ?>
    <!-- ========================= header end ========================= -->

    <!-- ========================= page-banner-section start ========================= -->
    <?php include("includes/banner.php") ?>
    <!-- ========================= page-banner-section end ========================= -->

    <!-- ========================= contact-section start ========================= -->
    <section class="contact-section pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="contact-item-wrapper">
                        <div class="row">
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h4>Contact</h4>
                                        <p>0984537278623</p>
                                        <p>yourmail@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h4>Address</h4>
                                        <p>175 5th Ave, New York, NY 10010 </p>
                                        <p>United States</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-xl-12">
                                <div class="contact-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-alarm-clock"></i>
                                    </div>
                                    <div class="contact-content">
                                        <h4>Shedule</h4>
                                        <p>24 Hours / 7 Days Open </p>
                                        <p>Office time: 10 AM - 5:30 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="contact-form-wrapper">
                        <div class="row">
                            <div class="col-xl-10 col-lg-8 mx-auto">
                                <div class="section-title text-center mb-50">
                                    <span class="wow fadeInDown" data-wow-delay=".2s">Get in Touch</span>
                                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Ready to Get Started</h2>
                                    <p class="wow fadeInUp" data-wow-delay=".6s">At vero eos et accusamus et iusto odio dignissimos ducimus quiblanditiis praesentium</p>
                                </div>
                            </div>
                        </div>
                        <form action="assets/php/mail" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name" placeholder="Name" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" id="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="phone" id="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="subject" id="email" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="message" id="message" placeholder="Type Message" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="button text-center">
                                        <button type="submit" class="theme-btn">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================= contact-section end ========================= -->

    <!-- ========================= map-section end ========================= -->
    <section class="map-section">
        <div class="map-container">
            <object style="border:0; height: 690px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3102.7887109309127!2d-77.44196278417968!3d38.95165507956235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDU3JzA2LjAiTiA3N8KwMjYnMjMuMiJX!5e0!3m2!1sen!2sbd!4v1545420879707"></object>
        </div>
        </div>
    </section>
    <!-- ========================= map-section end ========================= -->

    <!-- ========================= subscribe-section start ========================= -->
    <?php include("includes/subscribe.php") ?>
    <!-- ========================= subscribe-section end ========================= -->

    <!-- ========================= footer start  ========================= -->
    <?php include("includes/footer.php") ?>
    <!-- ========================= footer end  ========================= -->

    <?php include("includes/j.phps") ?>
</body>

</html>
