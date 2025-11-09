<?php
require_once __DIR__ . '/../components/header.php';
?>

<!-- Hero Slider Section -->
<div class="si__slider__six__mine">
    <div class="swiper card-slider-six">
        <div class="swiper-wrapper">
            <?php if (!empty($heroSlides)): ?>
                <?php foreach ($heroSlides as $slide): ?>
                    <div class="swiper-slide">
                        <div class="si__slider__six__area" style="background: url(/<?php echo htmlspecialchars($slide['image_path']); ?>);">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="si__slider__six__content text-center">
                                            <?php if ($slide['rating'] > 0): ?>
                                                <div class="si__slider__six__icon">
                                                    <?php for ($i = 0; $i < $slide['rating']; $i++): ?>
                                                        <a href="#"><i class="fa-solid fa-star"></i></a>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (!empty($slide['subtitle'])): ?>
                                                <h6><?php echo htmlspecialchars($slide['subtitle']); ?></h6>
                                            <?php endif; ?>
                                            <h1><?php echo nl2br(htmlspecialchars($slide['title'])); ?></h1>
                                            <?php if (!empty($slide['button_text']) && !empty($slide['button_link'])): ?>
                                                <a href="/<?php echo htmlspecialchars($slide['button_link']); ?>" class="rr-btn-2">
                                                    <?php echo htmlspecialchars($slide['button_text']); ?> <i class="fa-solid fa-plus"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<!-- Check-in/Check-out Box -->
<section class="check room">
    <div class="container">
        <div class="row">
            <div class="room__cheek-box room__cheek-box-2">
                <div class="room__cheek-box-item room__cheek-box-item-2">
                    <span>Check In</span>
                    <div class="room__cheek-box-item-icon room__cheek-box-item-icon-2">
                        <div class="input-datepicker">
                            <input id="datepicker" name="date" type="text" placeholder="MM/DD/YYYY">
                        </div>
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 16H2C1.17 16 0.5 15.33 0.5 14.5V2.5C0.5 1.67 1.17 1 2 1H15C15.83 1 16.5 1.67 16.5 2.5V14.5C16.5 15.33 15.83 16 15 16ZM2 2C1.72 2 1.5 2.22 1.5 2.5V14.5C1.5 14.78 1.72 15 2 15H15C15.28 15 15.5 14.78 15.5 14.5V2.5C15.5 2.22 15.28 2 15 2H2Z" fill="white"/>
                            <path d="M5 4C4.72 4 4.5 3.78 4.5 3.5V0.5C4.5 0.22 4.72 0 5 0C5.28 0 5.5 0.22 5.5 0.5V3.5C5.5 3.78 5.28 4 5 4ZM12 4C11.72 4 11.5 3.78 11.5 3.5V0.5C11.5 0.22 11.72 0 12 0C12.28 0 12.5 0.22 12.5 0.5V3.5C12.5 3.78 12.28 4 12 4ZM16 6H1C0.72 6 0.5 5.78 0.5 5.5C0.5 5.22 0.72 5 1 5H16C16.28 5 16.5 5.22 16.5 5.5C16.5 5.78 16.28 6 16 6Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                <div class="room__cheek-box-item room__cheek-box-item-2">
                    <span>Check Out</span>
                    <div class="room__cheek-box-item-icon room__cheek-box-item-icon-2">
                        <div class="input-datepicker">
                            <input id="datepicker1" name="date" type="text" placeholder="MM/DD/YYYY">
                        </div>
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 16H2C1.17 16 0.5 15.33 0.5 14.5V2.5C0.5 1.67 1.17 1 2 1H15C15.83 1 16.5 1.67 16.5 2.5V14.5C16.5 15.33 15.83 16 15 16ZM2 2C1.72 2 1.5 2.22 1.5 2.5V14.5C1.5 14.78 1.72 15 2 15H15C15.28 15 15.5 14.78 15.5 14.5V2.5C15.5 2.22 15.28 2 15 2H2Z" fill="white"/>
                            <path d="M5 4C4.72 4 4.5 3.78 4.5 3.5V0.5C4.5 0.22 4.72 0 5 0C5.28 0 5.5 0.22 5.5 0.5V3.5C5.5 3.78 5.28 4 5 4ZM12 4C11.72 4 11.5 3.78 11.5 3.5V0.5C11.5 0.22 11.72 0 12 0C12.28 0 12.5 0.22 12.5 0.5V3.5C12.5 3.78 12.28 4 12 4ZM16 6H1C0.72 6 0.5 5.78 0.5 5.5C0.5 5.22 0.72 5 1 5H16C16.28 5 16.5 5.22 16.5 5.5C16.5 5.78 16.28 6 16 6Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                <div class="room__cheek-box-item room__cheek-box-item-2">
                    <span>Guests</span>
                    <div class="sidebar-right-info">
                        <div class="nice-select after-none select-control country" tabindex="0">
                            <span class="current">1 Children 1 Adult</span>
                            <ul class="list">
                                <li data-value="" class="option selected focus">1 Children 1 Adult</li>
                                <li data-value="vdt" class="option">2 Children 2 Adults</li>
                                <li data-value="vdt" class="option">3 Children 3 Adults</li>
                                <li data-value="can" class="option">4 Children 4 Adults</li>
                                <li data-value="uk" class="option">5 Children 5 Adults</li>
                            </ul>
                        </div>
                        <svg class="icon2" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 16H2C1.17 16 0.5 15.33 0.5 14.5V2.5C0.5 1.67 1.17 1 2 1H15C15.83 1 16.5 1.67 16.5 2.5V14.5C16.5 15.33 15.83 16 15 16ZM2 2C1.72 2 1.5 2.22 1.5 2.5V14.5C1.5 14.78 1.72 15 2 15H15C15.28 15 15.5 14.78 15.5 14.5V2.5C15.5 2.22 15.28 2 15 2H2Z" fill="white"/>
                            <path d="M5 4C4.72 4 4.5 3.78 4.5 3.5V0.5C4.5 0.22 4.72 0 5 0C5.28 0 5.5 0.22 5.5 0.5V3.5C5.5 3.78 5.28 4 5 4ZM12 4C11.72 4 11.5 3.78 11.5 3.5V0.5C11.5 0.22 11.72 0 12 0C12.28 0 12.5 0.22 12.5 0.5V3.5C12.5 3.78 12.28 4 12 4ZM16 6H1C0.72 6 0.5 5.78 0.5 5.5C0.5 5.22 0.72 5 1 5H16C16.28 5 16.5 5.22 16.5 5.5C16.5 5.78 16.28 6 16 6Z" fill="white"/>
                        </svg>
                    </div>
                </div>
                <a class="room__btn2 room__btn2-2" href="/rooms">Check Rooms<i class="fa-regular fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- Intro Text Section -->
<?php if (!empty($introText)): ?>
<section class="si__text__six__area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="si__text__six__content">
                    <h5><?php echo nl2br(htmlspecialchars($introText['content'])); ?></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- About Section -->
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

<!-- Services Section -->
<?php if (!empty($services)): ?>
<section class="si__price__six__area pt-120 pb-120">
    <div class="container six__custom">
        <div class="row">
            <div class="col-lg-12">
                <div class="si__section__title__six pb-60 text-center">
                    <h6>Best Prices</h6>
                    <h2>Extra Services</h2>
                </div>
            </div>
            <?php foreach ($services as $service): ?>
                <div class="col-lg-3">
                    <div class="si__price__six__box">
                        <div class="si__price__six__thumb">
                            <img src="/<?php echo htmlspecialchars($service['image_path']); ?>" alt="<?php echo htmlspecialchars($service['service_name']); ?>">
                        </div>
                        <div class="si__price__six__text">
                            <h6><?php echo htmlspecialchars($service['service_name']); ?></h6>
                            <span>$<?php echo number_format($service['price'], 2); ?>/<?php echo htmlspecialchars($service['price_unit']); ?></span>
                            <?php if (!empty($service['features'])): ?>
                                <ul>
                                    <?php foreach ($service['features'] as $feature): ?>
                                        <li>
                                            <i class="fa-solid fa-<?php echo $feature['is_included'] ? 'check' : 'xmark'; ?>"></i> 
                                            <?php echo htmlspecialchars($feature['feature_text']); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Rooms Section -->
<?php if (!empty($rooms)): ?>
<section class="si__room__six__area pt-120 pb-120">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="si__section__title__six pb-60 text-center">
                    <h6>Sotel Luxury Rooms</h6>
                    <h2>Luxury Rooms & Suites</h2>
                </div>
            </div>
            <div class="swiper card-room-six">
                <div class="swiper-wrapper">
                    <?php foreach ($rooms as $room): ?>
                        <div class="swiper-slide">
                            <div class="si__room__six__box">
                                <div class="si__room__six__thumb">
                                    <img src="/<?php echo htmlspecialchars($room['image_path']); ?>" alt="<?php echo htmlspecialchars($room['room_name']); ?>">
                                    <div class="si__room__six__right">
                                        <div class="si__room__six__right__inner">
                                            <div class="si__room__six__text">
                                                <h6><a href="/rooms"><?php echo htmlspecialchars($room['room_name']); ?></a></h6>
                                            </div>
                                            <div class="si__room__six__list">
                                                <ul>
                                                    <?php if (!empty($room['size'])): ?>
                                                        <li>
                                                            <a href="#"><img src="/assets/imgs/room/maximize.png" alt=""></a> 
                                                            <?php echo htmlspecialchars($room['size']); ?>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($room['max_guests'])): ?>
                                                        <li>
                                                            <a href="#"><img src="/assets/imgs/room/user.png" alt=""></a> 
                                                            <?php echo $room['max_guests']; ?> Guests
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($room['beds'])): ?>
                                                        <li>
                                                            <a href="#"><img src="/assets/imgs/room/bed.png" alt=""></a> 
                                                            <?php echo $room['beds']; ?> Bed
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if (!empty($room['bathrooms'])): ?>
                                                        <li>
                                                            <a href="#"><img src="/assets/imgs/room/bath.png" alt=""></a> 
                                                            <?php echo $room['bathrooms']; ?> Bathroom
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="si__room__six__price">
                                        <h6>$<?php echo number_format($room['price'], 0); ?>/ <?php echo strtoupper(htmlspecialchars($room['price_unit'])); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
require_once __DIR__ . '/../components/footer.php';
?>
