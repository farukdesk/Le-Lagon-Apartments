<?php
require_once __DIR__ . '/../components/header.php';
?>

<section class="breadcrumb__area pt-200 pb-150" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(/assets/imgs/slider/bg-10.jpg); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__content text-center">
                    <h1 class="text-white">Our Rooms</h1>
                    <p class="text-white">Choose from our luxury accommodations</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="rooms__area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="si__section__title__six pb-60 text-center">
                    <h6>Our Luxury Rooms</h6>
                    <h2>Rooms & Suites</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
            <?php if (!empty($rooms)): ?>
                <?php foreach ($rooms as $room): ?>
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="si__room__six__box">
                            <div class="si__room__six__thumb">
                                <img src="/<?php echo htmlspecialchars($room['image_path']); ?>" alt="<?php echo htmlspecialchars($room['room_name']); ?>" style="width: 100%; height: 300px; object-fit: cover;">
                                <div class="si__room__six__right">
                                    <div class="si__room__six__right__inner">
                                        <div class="si__room__six__text">
                                            <h6><?php echo htmlspecialchars($room['room_name']); ?></h6>
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
                                                        <?php echo $room['beds']; ?> Bed<?php echo $room['beds'] > 1 ? 's' : ''; ?>
                                                    </li>
                                                <?php endif; ?>
                                                <?php if (!empty($room['bathrooms'])): ?>
                                                    <li>
                                                        <a href="#"><img src="/assets/imgs/room/bath.png" alt=""></a> 
                                                        <?php echo $room['bathrooms']; ?> Bathroom<?php echo $room['bathrooms'] > 1 ? 's' : ''; ?>
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
                            <?php if (!empty($room['description'])): ?>
                                <div style="padding: 20px;">
                                    <p><?php echo htmlspecialchars($room['description']); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-lg-12">
                    <p class="text-center">No rooms available at the moment. Please check back later.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/../components/footer.php';
?>
