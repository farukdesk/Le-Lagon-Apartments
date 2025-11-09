<?php
require_once __DIR__ . '/../components/header.php';
?>

<section class="breadcrumb__area pt-200 pb-150" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/public/assets/imgs/slider/bg-8.jpg); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__content text-center">
                    <h1 class="text-white">Contact Us</h1>
                    <p class="text-white">Get in touch with us</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact__area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact__info">
                    <h2>Get in Touch</h2>
                    <p>Feel free to contact us for any inquiries or booking information.</p>
                    
                    <div class="contact__item mt-40">
                        <h4><i class="fa fa-map-marker"></i> Address</h4>
                        <p><?php echo nl2br(htmlspecialchars($settings['site_address'] ?? '3891 Ranchview Dr. Richardson')); ?></p>
                    </div>
                    
                    <div class="contact__item mt-30">
                        <h4><i class="fa fa-phone"></i> Phone</h4>
                        <p><?php echo htmlspecialchars($settings['site_phone'] ?? '+123 456 789'); ?></p>
                    </div>
                    
                    <div class="contact__item mt-30">
                        <h4><i class="fa fa-envelope"></i> Email</h4>
                        <p><?php echo htmlspecialchars($settings['site_email'] ?? 'info@lelagon.com'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="contact__form">
                    <h2>Send Message</h2>
                    
                    <?php if (isset($success) && $success): ?>
                        <div style="padding: 15px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
                            <?php echo htmlspecialchars($message); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="/contact">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-20">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-20">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-20">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-20">
                                    <textarea name="message" class="form-control" rows="6" placeholder="Your Message" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="rr-btn-2">Send Message <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/../components/footer.php';
?>
