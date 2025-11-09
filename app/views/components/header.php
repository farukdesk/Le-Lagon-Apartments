<?php
// Load header data
$headerModel = new HeaderContent();
$navModel = new NavigationMenu();
$socialModel = new SocialLinks();

$headerData = $headerModel->getActiveHeader();
$menuItems = $navModel->getActiveMenu();
$socialLinks = $socialModel->getActiveLinks();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Le Lagon Apartments'; ?></title>
    <meta name="description" content="<?php echo $settings['site_description'] ?? 'Luxury apartment hotel booking'; ?>">
    <meta name="author" content="Le Lagon Apartments">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/imgs/logo/favicon.svg">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="/assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="/assets/css/vendor/animate.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/odometer.min.css">
    <link rel="stylesheet" href="/assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="/assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/vendor/fontawesome-pro.css"> 
    <link rel="stylesheet" href="/assets/css/vendor/spacing.css">
    <link rel="stylesheet" href="/assets/css/vendor/custom-font.css">
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>

<!-- Preloader -->
<div id="preloader">
    <div class="preloader-close">x</div>
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>

<!-- Back to Top -->
<div class="backtotop-wrap cursor-pointer">
    <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- Offcanvas Area -->
<div class="fix">
    <div class="offcanvas__area">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="/">
                            <img src="/<?php echo $headerData['logo_path'] ?? 'assets/imgs/logo/offcanvas-logo.png'; ?>" 
                                 alt="<?php echo $headerData['logo_alt'] ?? 'Logo'; ?>">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button class="offcanvas-close-icon animation--flip">
                            <span class="offcanvas-m-lines">
                                <span class="offcanvas-m-line line--1"></span>
                                <span class="offcanvas-m-line line--2"></span>
                                <span class="offcanvas-m-line line--3"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix"></div>
                <div class="offcanvas__social">
                    <h3 class="offcanvas__title mb-20">Subscribe & Follow</h3>
                    <ul>
                        <?php if (!empty($socialLinks)): ?>
                            <?php foreach ($socialLinks as $social): ?>
                                <li>
                                    <a href="<?php echo htmlspecialchars($social['platform_url']); ?>">
                                        <i class="<?php echo htmlspecialchars($social['icon_class']); ?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>
<div class="offcanvas__overlay-white"></div>

<!-- Header Area -->
<header>
    <div id="header-sticky" class="header__area header2 rs-sticky-2">
        <div class="container">
            <div class="mega__menu-wrapper header2__bg p-relative">
                <div class="header__main header2__main">
                    <div class="header__left header2__left">
                        <div class="header__logo">
                            <a href="/">
                                <div class="logo">
                                    <img src="/<?php echo $headerData['logo_path'] ?? 'assets/imgs/logo/logo.png'; ?>" 
                                         alt="<?php echo $headerData['logo_alt'] ?? 'Logo'; ?>">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="header__middle">
                        <div class="mean__menu-wrapper d-none d-xl-block">
                            <div class="main-menu header2__menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <?php if (!empty($menuItems)): ?>
                                            <?php foreach ($menuItems as $menuItem): ?>
                                                <li>
                                                    <a href="/<?php echo htmlspecialchars($menuItem['menu_url']); ?>">
                                                        <?php echo htmlspecialchars($menuItem['menu_title']); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="header__right header2__right">
                        <div class="header__action d-flex align-items-center">
                            <div class="search-icon search-icon-2 dl-search-icon">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="path-1-inside-1_7769_1475" fill="white">
                                    <path d="M20.5312 18.8438C21.1172 19.4688 21.1172 20.4453 20.5312 21.0703C19.9062 21.6562 18.9297 21.6562 18.3047 21.0703L13.6562 16.3828C12.0547 17.4375 10.1016 17.9844 7.99219 17.7109C4.39844 17.2031 1.50781 14.2734 1.03906 10.7188C0.375 5.40625 4.86719 0.914062 10.1797 1.57812C13.7344 2.04688 16.6641 4.9375 17.1719 8.53125C17.4453 10.6406 16.8984 12.5938 15.8438 14.1562L20.5312 18.8438ZM4.08594 9.625C4.08594 12.3984 6.3125 14.625 9.08594 14.625C11.8203 14.625 14.0859 12.3984 14.0859 9.625C14.0859 6.89062 11.8203 4.625 9.08594 4.625C6.3125 4.625 4.08594 6.89062 4.08594 9.625Z"/>
                                    </mask>
                                    <path d="M20.5312 18.8438C21.1172 19.4688 21.1172 20.4453 20.5312 21.0703C19.9062 21.6562 18.9297 21.6562 18.3047 21.0703L13.6562 16.3828C12.0547 17.4375 10.1016 17.9844 7.99219 17.7109C4.39844 17.2031 1.50781 14.2734 1.03906 10.7188C0.375 5.40625 4.86719 0.914062 10.1797 1.57812C13.7344 2.04688 16.6641 4.9375 17.1719 8.53125C17.4453 10.6406 16.8984 12.5938 15.8438 14.1562L20.5312 18.8438ZM4.08594 9.625C4.08594 12.3984 6.3125 14.625 9.08594 14.625C11.8203 14.625 14.0859 12.3984 14.0859 9.625C14.0859 6.89062 11.8203 4.625 9.08594 4.625C6.3125 4.625 4.08594 6.89062 4.08594 9.625Z" fill="white"/>
                                    <path d="M20.5312 18.8438L21.2608 18.1598L21.2498 18.148L21.2384 18.1366L20.5312 18.8438ZM20.5312 21.0703L21.2152 21.7999L21.2387 21.7778L21.2608 21.7543L20.5312 21.0703ZM18.3047 21.0703L17.5946 21.7745L17.6075 21.7874L17.6207 21.7999L18.3047 21.0703ZM13.6562 16.3828L14.3663 15.6787L13.7899 15.0974L13.1063 15.5476L13.6562 16.3828ZM7.99219 17.7109L7.85226 18.7012L7.86363 18.7026L7.99219 17.7109ZM1.03906 10.7188L0.046762 10.8428L0.0476453 10.8495L1.03906 10.7188ZM10.1797 1.57812L10.3104 0.586685L10.3037 0.585847L10.1797 1.57812ZM17.1719 8.53125L18.1636 8.40269L18.162 8.39134L17.1719 8.53125ZM15.8438 14.1562L15.0149 13.5968L14.5535 14.2803L15.1366 14.8634L15.8438 14.1562ZM19.8017 19.5277C20.027 19.768 20.027 20.146 19.8017 20.3864L21.2608 21.7543C22.2073 20.7446 22.2073 19.1695 21.2608 18.1598L19.8017 19.5277ZM19.8473 20.3408C19.607 20.5661 19.229 20.5661 18.9886 20.3408L17.6207 21.7999C18.6304 22.7464 20.2055 22.7464 21.2152 21.7999L19.8473 20.3408ZM19.0147 20.3662L14.3663 15.6787L12.9462 17.087L17.5946 21.7745L19.0147 20.3662ZM13.1063 15.5476C11.6871 16.4822 9.97225 16.9592 8.12074 16.7192L7.86363 18.7026C10.2309 19.0095 12.4223 18.3928 14.2062 17.218L13.1063 15.5476ZM8.1321 16.7208C4.98182 16.2756 2.44038 13.6964 2.03048 10.588L0.0476453 10.8495C0.575245 14.8505 3.81506 18.1306 7.85227 18.7011L8.1321 16.7208ZM2.03134 10.5947C1.44816 5.92929 5.39023 1.98722 10.0557 2.5704L10.3037 0.585847C4.34415 -0.1591 -0.698162 4.88321 0.0467846 10.8428L2.03134 10.5947ZM10.049 2.56954C13.1574 2.97944 15.7366 5.52088 16.1817 8.67116L18.162 8.39134C17.5916 4.35412 14.3114 1.11431 10.3104 0.586708L10.049 2.56954ZM16.1802 8.6598C16.4205 10.5135 15.9415 12.224 15.0149 13.5968L16.6726 14.7157C17.8554 12.9635 18.4702 10.7677 18.1636 8.4027L16.1802 8.6598ZM15.1366 14.8634L19.8241 19.5509L21.2384 18.1366L16.5509 13.4491L15.1366 14.8634ZM3.08594 9.625C3.08594 12.9507 5.76022 15.625 9.08594 15.625V13.625C6.86478 13.625 5.08594 11.8462 5.08594 9.625H3.08594ZM9.08594 15.625C12.3675 15.625 15.0859 12.9558 15.0859 9.625H13.0859C13.0859 11.8411 11.2731 13.625 9.08594 13.625V15.625ZM15.0859 9.625C15.0859 6.33834 12.3726 3.625 9.08594 3.625V5.625C11.268 5.625 13.0859 7.44291 13.0859 9.625H15.0859ZM9.08594 3.625C5.75514 3.625 3.08594 6.34343 3.08594 9.625H5.08594C5.08594 7.43782 6.86986 5.625 9.08594 5.625V3.625Z" fill="white" mask="url(#path-1-inside-1_7769_1475)"/>
                                </svg>                                    
                            </div>
                            <div class="header__btn-wrap d-none d-sm-inline-flex">
                                <a href="/contact" class="rr-btn-3">Get a quote <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <div class="header__hamburger ml-20 d-xl-none">
                                <div class="sidebar__toggle">
                                    <button class="bar-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Search Popup -->
<div id="popup-search-box">
    <div class="box-inner-wrap d-flex align-items-center">
        <form id="form" action="#" method="get" role="search">
            <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
        </form>
        <div class="search-close"><i class="fa-sharp fa-regular fa-xmark"></i></div>
    </div>
</div>

<!-- Main Content Start -->
<main>
