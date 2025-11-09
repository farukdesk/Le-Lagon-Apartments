<?php
// Load footer data
$footerModel = new FooterContent();
$socialModel = new SocialLinks();

$footerSections = $footerModel->getActiveFooter();
$socialLinks = $socialModel->getActiveLinks();
?>
</main>
<!-- Main Content End -->

<!-- Footer Area -->
<footer>
    <section class="footer__area footer__area-2 footer-bg-2 pt-100 pb-60" 
             style="background-image: url(/assets/imgs/footer/bg3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer__widget footer__widget-item-2">
                        <div class="footer__widget-title">
                            <div class="footer-logo pb-20">
                                <a href="/">
                                    <img src="/assets/imgs/logo/footer-logo2.png" alt="Footer Logo">
                                </a>
                            </div>
                        </div>
                        <p><?php echo $settings['site_description'] ?? 'Hotel booking is the process of reserving and securing accommodations in hotels'; ?></p>
                        
                        <div class="footer__social mt-30">
                            <?php if (!empty($socialLinks)): ?>
                                <?php foreach ($socialLinks as $social): ?>
                                    <a href="<?php echo htmlspecialchars($social['platform_url']); ?>">
                                        <i class="<?php echo htmlspecialchars($social['icon_class']); ?>"></i>
                                    </a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget footer__widget-item-2">
                        <div class="footer__widget-title">
                            <h4>Experiences</h4>
                        </div>
                        <div class="footer__link">
                            <ul>
                                <li><a href="/about">Dining</a></li>
                                <li><a href="/rooms">Swimming Pool</a></li>
                                <li><a href="/contact">Spa & Massage</a></li>
                                <li><a href="/rooms">Events Spaces</a></li>
                                <li><a href="/about">The Restaurant</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="footer__widget footer__widget-item-3">
                        <div class="footer__widget-title">
                            <h4>Quick links</h4>
                        </div>
                        <div class="footer__link">
                            <ul>
                                <li><a href="/about">About Us</a></li>
                                <li><a href="/rooms">Rooms</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                                <li><a href="/about">Services</a></li>
                                <li><a href="/rooms">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer__widget footer__widget-item-4">
                        <div class="footer__widget-title">
                            <h4>Contact</h4>
                        </div>

                        <div class="footer__subscribe subscribe-2 d-flex mt-15">
                            <ul>
                                <li>
                                    <a href="mailto:<?php echo $settings['site_email'] ?? 'info@lelagon.com'; ?>">
                                        <span class="icon">
                                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.6875 0.976562C13.3984 0.976562 14 1.57812 14 2.28906C14 2.72656 13.7812 3.10938 13.4531 3.35547L7.51953 7.8125C7.19141 8.05859 6.78125 8.05859 6.45312 7.8125L0.519531 3.35547C0.191406 3.10938 0 2.72656 0 2.28906C0 1.57812 0.574219 0.976562 1.3125 0.976562H12.6875ZM5.93359 8.52344C6.5625 8.98828 7.41016 8.98828 8.03906 8.52344L14 4.03906V9.72656C14 10.7109 13.207 11.4766 12.25 11.4766H1.75C0.765625 11.4766 0 10.7109 0 9.72656V4.03906L5.93359 8.52344Z" fill="#AF8C3E"/>
                                            </svg>                                                
                                        </span>
                                        <span class="text"><?php echo $settings['site_email'] ?? 'info@lelagon.com'; ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.google.com/maps">
                                        <span class="icon">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.59375 13.8984C3.17188 12.1211 0 7.88281 0 5.47656C0 2.57812 2.32422 0.226562 5.25 0.226562C8.14844 0.226562 10.5 2.57812 10.5 5.47656C10.5 7.88281 7.30078 12.1211 5.87891 13.8984C5.55078 14.3086 4.92188 14.3086 4.59375 13.8984ZM5.25 7.22656C6.20703 7.22656 7 6.46094 7 5.47656C7 4.51953 6.20703 3.72656 5.25 3.72656C4.26562 3.72656 3.5 4.51953 3.5 5.47656C3.5 6.46094 4.26562 7.22656 5.25 7.22656Z" fill="#AF8C3E"/>
                                            </svg>
                                        </span>
                                        <span class="mail"><?php echo nl2br($settings['site_address'] ?? '3891 Ranchview Dr. Richardson'); ?></span>
                                    </a>
                                </li>
                                <li class="gap-10">
                                    <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $settings['site_phone'] ?? '+123456789'); ?>">
                                        <span class="icon">
                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.9688 12.5703L15.2188 15.7266C15.125 16.1953 14.75 16.5078 14.2812 16.5078C6.40625 16.4766 0 10.0703 0 2.19531C0 1.72656 0.28125 1.35156 0.75 1.25781L3.90625 0.507812C4.34375 0.414062 4.8125 0.664062 5 1.07031L6.46875 4.47656C6.625 4.88281 6.53125 5.35156 6.1875 5.60156L4.5 6.97656C5.5625 9.13281 7.3125 10.8828 9.5 11.9453L10.875 10.2578C11.125 9.94531 11.5938 9.82031 12 9.97656L15.4062 11.4453C15.8125 11.6641 16.0625 12.1328 15.9688 12.5703Z" fill="#AF8C3E"/>
                                            </svg>                                                
                                        </span>
                                    </a>
                                    <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $settings['site_phone'] ?? '+123456789'); ?>">
                                        <?php echo $settings['site_phone'] ?? '+123 456 789'; ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer__bottom-wrapper">
            <div class="container">
                <div class="footer__bottom footer__bottom-home-1-bg">
                    <div class="footer__copyright">
                        <p>© <?php echo $settings['site_name'] ?? 'Le Lagon Apartments'; ?> <?php echo date('Y'); ?> | All Rights Reserved</p>
                    </div>

                    <div class="footer__copyright-menu">
                        <ul>
                            <li><a href="/about">Terms & Condition</a></li>
                            <li><a href="/about">Privacy Policy</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!-- Footer Area End -->

<!-- JavaScript Files -->
<script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/assets/js/plugins/waypoints.min.js"></script>
<script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins/meanmenu.min.js"></script>
<script src="/assets/js/plugins/swiper.min.js"></script>
<script src="/assets/js/plugins/wow.js"></script>
<script src="/assets/js/vendor/magnific-popup.min.js"></script>
<script src="/assets/js/vendor/type.js"></script>
<script src="/assets/js/vendor/vanilla-tilt.js"></script>
<script src="/assets/js/plugins/nice-select.min.js"></script>
<script src="/assets/js/vendor/odometer.min.js"></script>
<script src="/assets/js/vendor/jquery-ui.min.js"></script>
<script src="/assets/js/plugins/parallax-scroll.js"></script>
<script src="/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="/assets/js/vendor/smooth-scroll.js"></script>
<script src="/assets/js/plugins/isotope-docs.min.js"></script>
<script src="/assets/js/plugins/slick.min.js"></script>
<script src="/assets/js/vendor/ajax-form.js"></script>
<script src="/assets/js/main.js"></script>

</body>
</html>
