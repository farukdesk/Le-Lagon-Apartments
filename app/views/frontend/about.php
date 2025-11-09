<?php
require_once __DIR__ . '/../components/header.php';
?>

<section class="breadcrumb__area pt-200 pb-150" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/assets/imgs/slider/bg-9.jpg); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__content text-center">
                    <h1 class="text-white">About Us</h1>
                    <p class="text-white">Learn more about Le Lagon Apartments</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (!empty($aboutSection)): ?>
<section class="si__about__six__area pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="si__about__six__thumb">
                    <img src="/<?php echo htmlspecialchars($aboutSection['image_path']); ?>" alt="About">
                </div>
            </div>
            <div class="col-lg-6">
                <?php if ($aboutSection['rating'] > 0): ?>
                    <div class="si__about__six__star">
                        <?php for ($i = 0; $i < $aboutSection['rating']; $i++): ?>
                            <a href="#"><i class="fa-solid fa-star"></i></a>
                        <?php endfor; ?>
                    </div>
                <?php endif; ?>
                <div class="si__section__title__six">
                    <?php if (!empty($aboutSection['section_title'])): ?>
                        <h6><?php echo htmlspecialchars($aboutSection['section_title']); ?></h6>
                    <?php endif; ?>
                    <h2><?php echo nl2br(htmlspecialchars($aboutSection['main_heading'])); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($aboutSection['description'])); ?></p>
                </div>
                <div class="si__about__six__content">
                    <?php if (!empty($aboutSection['button_text']) && !empty($aboutSection['button_link'])): ?>
                        <div class="si__about__six__btn">
                            <a href="/<?php echo htmlspecialchars($aboutSection['button_link']); ?>" class="rr-btn-2">
                                <?php echo htmlspecialchars($aboutSection['button_text']); ?> <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($aboutSection['phone'])): ?>
                        <div class="si__about__six__right">
                            <div class="si__about__six__phone">
                                <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $aboutSection['phone']); ?>">
                                    <i class="fa-light fa-phone-volume"></i>
                                </a>
                            </div>
                            <div class="si__about__six__text">
                                <h6>Booking Now</h6>
                                <span><?php echo htmlspecialchars($aboutSection['phone']); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
require_once __DIR__ . '/../components/footer.php';
?>
