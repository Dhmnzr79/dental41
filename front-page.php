<?php
/**
 * Главная страница v2
 * Блоки добавляются по одному по схеме этапов
 */

// Временно отключено для разработки
// get_header();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('v2-site'); ?>>

<header class="v2-header" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="v2-header__topbar" aria-label="Верхняя панель сайта">
        <div class="v2-container">
            <div class="v2-header__topbar-inner">
                <a class="v2-header__logo" href="<?php echo home_url(); ?>" aria-label="На главную" itemprop="url">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="ЦЭСИ" class="v2-header__logo-img" width="40" height="40" itemprop="logo">
                </a>

                <div class="v2-header__actions">
                    <a class="v2-header__icon-btn" href="tel:+74152500129" aria-label="Позвонить" itemprop="telephone">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M22 17.5v2a2 2 0 0 1-2.18 2 19.77 19.77 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.77 19.77 0 0 1 2.5 3.18 2 2 0 0 1 4.5 1h2a2 2 0 0 1 2 1.72c.12.93.32 1.84.59 2.72a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l1.36-1.36a2 2 0 0 1 2.11-.45c.88.27 1.79.47 2.72.59A2 2 0 0 1 22 17.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>

                    <button class="v2-header__icon-btn" id="v2-menu-open" aria-label="Открыть меню" aria-haspopup="dialog" aria-controls="v2-menu-dialog">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="v2-header__overlay" id="v2-menu-dialog" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="v2-menu-title">
        <div class="v2-header__overlay-head">
            <span class="v2-header__overlay-title" id="v2-menu-title">Меню</span>
            <button class="v2-header__overlay-close" id="v2-menu-close" aria-label="Закрыть меню">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M18 6 6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        <div class="v2-header__overlay-body">
            <button type="button" class="v2-btn v2-btn--primary v2-header__overlay-cta" onclick="openPopup()">Записаться на консультацию</button>

            <nav class="v2-header__nav" role="navigation" aria-label="Основная навигация">
                <ul class="v2-header__nav-list" role="list">
                    <li class="v2-header__nav-item"><a href="<?php echo home_url(); ?>" class="v2-header__nav-link">Главная <span class="v2-header__nav-desc">о клинике</span></a></li>
                    <li class="v2-header__nav-item"><a href="<?php echo home_url('/implantatsiya'); ?>" class="v2-header__nav-link">Имплантация <span class="v2-header__nav-desc">восстановление зубов</span></a></li>
                    <li class="v2-header__nav-item"><a href="<?php echo home_url('/doctor'); ?>" class="v2-header__nav-link">Врачи <span class="v2-header__nav-desc">опыт, дипломы</span></a></li>
                    <li class="v2-header__nav-item v2-header__nav-item--dropdown">
                        <a href="<?php echo home_url('/o-klinike'); ?>" class="v2-header__nav-link v2-header__nav-link--toggle">О клинике <span class="v2-header__nav-desc">информация</span></a>
                        <ul class="v2-header__dropdown">
                            <li class="v2-header__dropdown-item"><a href="<?php echo home_url('/o-klinike'); ?>" class="v2-header__dropdown-link">Информация</a></li>
                            <li class="v2-header__dropdown-item"><a href="<?php echo home_url('/rekvizity'); ?>" class="v2-header__dropdown-link">Реквизиты</a></li>
                            <li class="v2-header__dropdown-item"><a href="<?php echo home_url('/litsenzii'); ?>" class="v2-header__dropdown-link">Лицензии</a></li>
                        </ul>
                    </li>
                    <li class="v2-header__nav-item"><a href="<?php echo home_url('/blog'); ?>" class="v2-header__nav-link">Блог</a></li>
                    <li class="v2-header__nav-item"><a href="<?php echo home_url('/kontakty'); ?>" class="v2-header__nav-link">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="v2-header__content">
        <div class="v2-container">
            <div class="v2-row v2-header__top">
                <div class="v2-col-sm-12 v2-col-lg-8 v2-header__left">
                    <a class="v2-header__brand" href="<?php echo home_url(); ?>" itemprop="url">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="Логотип ЦЭСИ" class="v2-header__brand-img" itemprop="logo">
                    </a>
                    <div class="v2-header__info" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <div class="v2-header__name" itemprop="name">Центр эстетической стоматологии и имплантации</div>
                        <div class="v2-header__address" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</div>
                    </div>
                </div>

                <div class="v2-col-sm-12 v2-col-lg-4 v2-header__right">
                    <div class="v2-header__contacts">
                        <div class="v2-header__phone-block">
                            <a href="tel:+74152500129" class="v2-header__phone" itemprop="telephone">+7(4152) 50-01-29</a>
                            <a href="https://wa.me/79084952424" class="v2-header__whatsapp" target="_blank" rel="noopener" aria-label="Написать в WhatsApp" title="Написать в WhatsApp">
                                <svg class="v2-header__whatsapp-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                            </a>
                        </div>
                        <div class="v2-header__hours" itemprop="openingHours">Звоните 8:00-20:00, сб. 08:00-14:00</div>
                    </div>
                </div>
            </div>

            <div class="v2-row v2-header__bottom">
                <div class="v2-col-sm-12 v2-col-lg-10 v2-header__menu-col">
                    <nav class="v2-header__menu" role="navigation" aria-label="Основное меню">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'v2-header__menu-list',
                                'walker' => new Dental_Clinic_Walker_Nav_Menu(),
                                'fallback_cb' => 'dental_clinic_v2_fallback_menu'
                            ));
                        } else {
                            dental_clinic_v2_fallback_menu();
                        }
                        ?>
                    </nav>
                </div>

                <div class="v2-col-sm-12 v2-col-lg-2 v2-header__button-col">
                    <button type="button" class="v2-btn v2-btn--secondary v2-header__cta" onclick="openPopup()">
                        <span class="v2-btn__text">Заказать звонок</span>
                        <svg class="v2-btn__arrow" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M15.7347 6.6483C15.9046 6.47928 16 6.25007 16 6.01108C16 5.77208 15.9046 5.54287 15.7347 5.37385L10.6085 0.275158C10.5249 0.189074 10.4249 0.120411 10.3144 0.073174C10.2038 0.0259374 10.0849 0.00107371 9.96458 3.37663e-05C9.84426 -0.00100618 9.72493 0.0217987 9.61357 0.0671172C9.5022 0.112436 9.40103 0.179361 9.31595 0.263987C9.23086 0.348613 9.16358 0.449245 9.11802 0.560012C9.07245 0.67078 9.04952 0.789464 9.05057 0.909139C9.05162 1.02881 9.07661 1.14708 9.1241 1.25705C9.1716 1.36701 9.24063 1.46646 9.32718 1.54961L12.9065 5.10977L0.906168 5.10977C0.665837 5.10977 0.435349 5.20473 0.26541 5.37376C0.0954706 5.54278 3.39719e-07 5.77203 3.2927e-07 6.01108C3.18821e-07 6.25012 0.0954705 6.47937 0.26541 6.6484C0.435349 6.81742 0.665837 6.91238 0.906167 6.91238L12.9065 6.91238L9.32718 10.4725C9.16211 10.6425 9.07078 10.8702 9.07284 11.1065C9.07491 11.3428 9.17021 11.5689 9.33822 11.736C9.50623 11.9031 9.73351 11.9979 9.9711 12C10.2087 12.002 10.4376 11.9112 10.6085 11.747L15.7347 6.6483Z" fill="#23BFCF"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Мобильный Hero Section -->
<section class="v2-section v2-hero-mobile" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="v2-container">
        <div class="v2-hero-mobile__wrapper">
            <div class="v2-hero-mobile__content">
                <h1 class="v2-hero-mobile__title" itemprop="name">Стоматология нового поколения на Камчатке</h1>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/khan-mob-1.png" alt="Александр Хан" class="v2-hero-mobile__image" itemprop="image" loading="lazy">
            </div>
            
            <div class="v2-hero-mobile__text">
                <h2 class="v2-hero-mobile__subtitle" itemprop="description">Все виды лечения. Бережная имплантация. С максимальным комфортом, без боли и переплат.</h2>
                
                <div class="v2-hero-mobile__description">
                    <div class="v2-hero-mobile__benefit">
                        <svg class="v2-hero-mobile__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_hero_mobile_1)">
                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_hero_mobile_1">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span>Без боли — идете домой с красивыми зубами</span>
                    </div>
                    
                    <div class="v2-hero-mobile__benefit">
                        <svg class="v2-hero-mobile__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_hero_mobile_2)">
                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_hero_mobile_2">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span>Без переплат — прозрачные цены</span>
                    </div>
                    
                    <div class="v2-hero-mobile__benefit">
                        <svg class="v2-hero-mobile__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_hero_mobile_3)">
                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_hero_mobile_3">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <span>99,8% приживаемость + пожизненная гарантия на импланты</span>
                    </div>
                    
                    <div class="v2-hero-mobile__conclusion">Ешьте любимую еду. Выглядите на 10 лет моложе.</div>
                </div>
            </div>
        </div>
        
        <div class="v2-hero-mobile__index">
            <div class="v2-hero-mobile__index-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/25-1.svg" alt="25 000 имплантов" loading="lazy">
                <span>25 000 имплантов установили мы за 26 лет работы</span>
            </div>
        </div>
        
        <div class="v2-hero-mobile__actions">
            <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Вернуть улыбку">Вернуть улыбку</button>
            <button type="button" class="v2-btn v2-btn--whatsapp" onclick="window.open('https://wa.me/79084952424', '_blank')" aria-label="Рассчитать стоимость в WhatsApp">Рассчитать стоимость в WhatsApp</button>
        </div>
    </div>
</section>

<section class="v2-hero v2-section" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-6 v2-hero__left">
                <h1 class="v2-hero__title" itemprop="name">
                Стоматология нового поколения на Камчатке
                </h1>
        
                <h2 class="v2-hero__subtitle" itemprop="description">
                Все виды лечения. Бережная имплантация. С максимальным комфортом, без боли и переплат.
                </h2>
                
                <div class="v2-hero__description">
                    <div class="v2-hero__benefit">
                        <svg class="v2-hero__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <g clip-path="url(#clip0_2345_50)">
                    <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                </g>
                <defs>
                    <clipPath id="clip0_2345_50">
                        <rect width="24" height="24" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <span>Без боли — идете домой с красивыми зубами</span>
        </div>
            
                    <div class="v2-hero__benefit">
                        <svg class="v2-hero__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_2345_51)">
                    <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                </g>
                <defs>
                                <clipPath id="clip0_2345_51">
                        <rect width="24" height="24" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <span>Без переплат — прозрачные цены</span>
        </div>
            
                    <div class="v2-hero__benefit">
                        <svg class="v2-hero__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_2345_52)">
                            <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                        </g>
                        <defs>
                                <clipPath id="clip0_2345_52">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <span>99,8% приживаемость + пожизненная гарантия на импланты</span>
                </div>
                    
                    <div class="v2-hero__conclusion">
                    Ешьте любимую еду. Выглядите на 10 лет моложе.
                </div>
            </div>
            
                <div class="v2-hero__actions">
                    <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Записаться на консультацию">Вернуть улыбку</button>
                    <button type="button" class="v2-btn v2-btn--whatsapp" onclick="window.open('https://wa.me/79084952424', '_blank')" aria-label="Связаться через WhatsApp">Рассчитать стоимость в WhatsApp</button>
            </div>
        </div>
        
            <div class="v2-col-sm-12 v2-col-lg-6 v2-hero__right">
                <div class="v2-hero__photo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bg-action.png" alt="Александр Хан - Главный врач стоматологической клиники" class="v2-hero__doctor-photo" itemprop="image" loading="lazy">
            </div>
            
                <div class="v2-hero__stats">
                    <div class="v2-hero__stats-list" itemscope itemtype="https://schema.org/ItemList">
                        <div class="v2-hero__stat v2-hero__stat--first" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <meta itemprop="position" content="1">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/25.svg" alt="25 000 имплантаций" loading="lazy">
                            <p itemprop="name">имплантаций за 26 лет<br>работы на Камчатке</p>
                    </div>
                        <div class="v2-hero__stat v2-hero__stat--second" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                            <meta itemprop="position" content="2">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/99.svg" alt="99.8% приживаемость" loading="lazy">
                            <p itemprop="name">приживаемость<br>имплантов</p>
                    </div>
                </div>
                
                    <div class="v2-hero__testimonial" itemscope itemtype="https://schema.org/Review">
                        <p itemprop="reviewBody"><strong itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">Лилия Питерская</span>:</strong><br>"Делюсь историей своей новой улыбки"</p>
                        <a href="<?php echo home_url('/istoriya-moei-ulybki'); ?>" class="v2-hero__testimonial-link" aria-label="Читать отзыв Лилии Питерской">Читать</a>
            </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="v2-indices v2-section" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-6 v2-col-lg-3 v2-indices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="1">
                <div class="v2-indices__icon">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rating-icon.png" alt="Рейтинг" loading="lazy">
            </div>
                <div class="v2-indices__content">
                    <div class="v2-indices__number">01</div>
                    <p itemprop="name">Применяем технологии нового поколения для точной диагностики, как в ведущих клиниках Москвы и Европы</p>
            </div>
        </div>

            <div class="v2-col-sm-6 v2-col-lg-3 v2-indices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="2">
                <div class="v2-indices__content">
                    <div class="v2-indices__number">02</div>
                    <p itemprop="name">Помогаем в сложных случаях, когда другие бессильны</p>
            </div>
        </div>

            <div class="v2-col-sm-6 v2-col-lg-3 v2-indices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="3">
                <div class="v2-indices__content">
                    <div class="v2-indices__number">03</div>
                    <p itemprop="name">Изготавливаем протезы у себя - это быстрее, точнее и надёжнее.</p>
            </div>
        </div>

            <div class="v2-col-sm-6 v2-col-lg-3 v2-indices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="4">
                <div class="v2-indices__content">
                    <div class="v2-indices__number">04</div>
                    <p itemprop="name">Входим в ТОП рейтинга Яндекса, ПроДокторов и Google</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="v2-section v2-works" aria-labelledby="v2-works-title" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row v2-works__head">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-works__head-main">
                <h2 id="v2-works-title" class="v2-works__title" itemprop="name">
                    Посмотрите, как мы<br>
                    возвращаем людям улыбку и<br>
                    уверенность
                </h2>
            </div>
            <div class="v2-col-sm-12 v2-col-lg-4 v2-works__head-aside">
                <p class="v2-works__subtitle" itemprop="description">
                    Настоящие истории наших пациентов. Эти результаты достигнуты у нас, в клинике ЦЭСИ.
                </p>
            </div>
        </div>

        <div class="v2-works__slider" data-slider="works" aria-roledescription="carousel" aria-label="Наши работы">
            <div class="v2-row v2-works__list">
                <div class="v2-col-sm-12 v2-col-lg-4 v2-works__col">
                    <article class="v2-works__card" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="1">
                        <div class="v2-works__media">
                            <img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/be-after01.jpg"
                                alt="Улыбка для свадьбы - результат"
                                loading="lazy"
                                itemprop="image"
                            >
                        </div>
                        <div class="v2-works__content">
                            <h3 class="v2-works__card-title" itemprop="name">Улыбка для свадьбы</h3>
                            <p class="v2-works__card-text" itemprop="description">
                                Виктория, 32 года, п. Палана. Перед свадьбой прилетела к нам, чтобы быть безупречной в важный день. В ЦЭСИ выполнили: костную пластику верхней челюсти; установку имплантов Impro (Германия); полное лечение своих зубов; протезирование коронками из диоксида циркония.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="v2-col-sm-12 v2-col-lg-4 v2-works__col">
                    <article class="v2-works__card" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="2">
                        <div class="v2-works__media">
                            <img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/be-after02.jpg"
                                alt="Перерождение улыбки - результат"
                                loading="lazy"
                                itemprop="image"
                            >
                        </div>
                        <div class="v2-works__content">
                            <h3 class="v2-works__card-title" itemprop="name">Перерождение улыбки</h3>
                            <p class="v2-works__card-text" itemprop="description">
                                Комплексное лечение: импланты, виниры и коронки. Работали Моисеев К.Н. и Ларин К.Е. Результат — естественная и надёжная улыбка.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="v2-col-sm-12 v2-col-lg-4 v2-works__col">
                    <article class="v2-works__card" itemscope itemprop="itemListElement" itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="3">
                        <div class="v2-works__media">
                            <img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/be-after03.jpg"
                                alt="Новая улыбка — новая уверенность - результат"
                                loading="lazy"
                                itemprop="image"
                            >
                        </div>
                        <div class="v2-works__content">
                            <h3 class="v2-works__card-title" itemprop="name">Новая улыбка — новая уверенность</h3>
                            <p class="v2-works__card-text" itemprop="description">
                                Зубы пролечены под микроскопом. Установлены импланты. Установлены коронки из циркония. Результат — восстановлены здоровье и эстетика, пациент снова улыбается без стеснения.
                            </p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="v2-row v2-works__pagination-row">
                <div class="v2-col-sm-12 v2-col-lg-12">
                    <div class="v2-works__pagination" aria-label="Пагинация слайдера по работам">
                        <button class="v2-works__dot" type="button" aria-label="Слайд 1" aria-current="true" data-slider-dot="1"></button>
                        <button class="v2-works__dot" type="button" aria-label="Слайд 2" data-slider-dot="2"></button>
                        <button class="v2-works__dot" type="button" aria-label="Слайд 3" data-slider-dot="3"></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="v2-row v2-works__cta-row">
            <div class="v2-col-sm-12 v2-col-lg-12">
                <button
                    type="button"
                    class="v2-btn v2-btn--primary v2-works__cta-button"
                    onclick="openPopup()"
                >
                    Я хочу также
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Блок консультации -->
<section class="v2-consultation v2-section">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-6 v2-col-lg-6 v2-consultation__left">
                <div class="v2-consultation__promo">
                    <div class="v2-consultation__circles">
                        <div class="v2-consultation__circle">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-04.jpg" alt="Лицо" loading="lazy">
                    </div>
                        <div class="v2-consultation__circle">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/circle-date.svg" alt="Дата" loading="lazy">
                    </div>
                </div>
                    <div class="v2-consultation__date">
                        <span class="v2-consultation__date-text">Акция до 30 ноября</span>
                </div>
            </div>
            
                <h2 class="v2-consultation__title">
                    <span class="v2-consultation__highlight">Бесплатная</span>
                    консультация<br>
                    по имплантации
            </h2>
            
                <div class="v2-consultation__benefits">
                    <div class="v2-consultation__benefit">
                        <div class="v2-consultation__benefit-icon">
                            <svg width="45" height="64" viewBox="0 0 45 50" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M22.9463 34.8935L20.8895 36.9504C20.6837 37.1568 20.4391 37.3204 20.1699 37.4319C19.9007 37.5434 19.612 37.6006 19.3206 37.6002C19.0292 37.6006 18.7406 37.5434 18.4714 37.4319C18.2022 37.3204 17.9577 37.1568 17.7519 36.9504L14.1991 33.3978C13.3484 32.5471 13.2855 31.161 14.1054 30.2807C14.9663 29.3565 16.4139 29.3373 17.2991 30.2225L19.0475 31.9709C19.0834 32.0068 19.126 32.0352 19.1728 32.0546C19.2197 32.0741 19.2699 32.0841 19.3207 32.0841C19.3714 32.0841 19.4216 32.0741 19.4685 32.0546C19.5154 32.0352 19.558 32.0068 19.5938 31.9709L27.7509 23.8139C28.6173 22.9474 30.0221 22.9474 30.8884 23.8139C31.7548 24.6803 31.7548 26.085 30.8884 26.9514L25.0393 32.8005" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M44.0501 34.2491V46.1026C44.0501 47.7027 42.7528 49 41.1527 49H3.89738C2.29725 49 1 47.7027 1 46.1026V42.0721" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M33.2705 46.1026H3.90221C2.29938 46.1026 1 44.8032 1 43.2004V7.21239C1 5.60956 2.29938 4.31018 3.90221 4.31018H41.1478C42.7507 4.31018 44.0501 5.60956 44.0501 7.21239V35.323C44.0501 36.0927 43.7443 36.831 43.2 37.3752L35.3227 45.2525C35.0532 45.522 34.7332 45.7358 34.3811 45.8817C34.029 46.0275 33.6516 46.1026 33.2705 46.1026Z" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M32.0811 46.1026C33.3943 46.1026 34.459 45.038 34.459 43.7246V38.8896C34.459 37.5763 35.5236 36.5116 36.8369 36.5116H41.6721C42.9854 36.5116 44.0499 35.447 44.0499 34.1337" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.72635 14.6616H1" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M44.0501 14.6616H11.6238" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.20197 8.64264C8.38549 8.64264 7.72363 7.98078 7.72363 7.1643V2.47836C7.72363 1.66188 8.38549 1.00002 9.20197 1.00002H9.5345C10.351 1.00002 11.0128 1.66188 11.0128 2.47836V4.31018" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M35.5157 8.64264C34.6992 8.64264 34.0374 7.98078 34.0374 7.1643V2.47836C34.0374 1.66188 34.6992 1.00002 35.5157 1.00002H35.8482C36.6647 1.00002 37.3266 1.66188 37.3266 2.47836V4.31018" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                        <p class="v2-consultation__benefit-text">Составим для вас понятный план: 3 варианта по бюджету, этапы, сроки</p>
                </div>
                    
                    <div class="v2-consultation__benefit">
                        <div class="v2-consultation__benefit-icon">
                            <svg width="51" height="64" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M6.76001 40.36L14.85 19.0643C15.0153 18.659 15.5874 18.6584 15.7535 19.0634L23.77 40.36M9.28302 35.0563H21.2876M30.2799 18.7601V40.36" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.0868 49H2.8529C1.82914 49 1 48.181 1 47.1697V11.9503C1 10.94 1.82914 10.12 2.8529 10.12H31.2455M40.3598 19.3191V47.1697C40.3598 48.181 39.5297 49 38.5069 49H31.9228" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M41.9059 1.91659L44.2597 6.22027L48.5634 8.57409C49.7854 9.24243 49.7854 10.9976 48.5634 11.666L44.2597 14.0198L41.9059 18.3235C41.2376 19.5455 39.4823 19.5455 38.814 18.3235L36.4602 14.0198L32.1565 11.666C30.9345 10.9976 30.9345 9.24243 32.1565 8.57409L36.4602 6.22027L38.814 1.91659C39.4824 0.69447 41.2376 0.69447 41.9059 1.91659Z" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                        <p class="v2-consultation__benefit-text">При необходимости проведём КТ с высокоточной диагностикой. Это позволит составить точный план и рекомендации по каждому зубу. КТ оплачивается отдельно.</p>
                </div>
                    
                    <div class="v2-consultation__benefit">
                        <div class="v2-consultation__benefit-icon">
                            <svg width="50" height="64" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M38.9678 7.19247V15.3129" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M34.9075 11.2527H43.028" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M24.2168 0.99999H17.2601C13.9846 0.99999 11.3291 3.65547 11.3291 6.93102V10.8798C11.3291 11.3664 11.6617 11.788 12.134 11.905C12.5318 12.0036 13.0059 12.1954 13.3819 12.5675C13.5492 12.7331 13.8335 12.6123 13.8335 12.3769V8.86753C13.8335 7.65047 14.6041 6.61349 15.6839 6.21757C15.9128 6.13357 16.1689 6.20065 16.33 6.38373C17.6063 7.83548 19.3351 8.98034 21.6137 8.98034H27.0553C27.2113 8.98034 27.3609 9.04231 27.4712 9.15261C27.5815 9.26292 27.6435 9.41252 27.6435 9.56852V12.3769C27.6435 12.6123 27.9278 12.7331 28.0951 12.5675C28.4712 12.1954 28.9452 12.0036 29.343 11.905C29.8153 11.788 30.1479 11.3664 30.1479 10.8798V6.93102C30.1479 3.65547 27.4925 0.99999 24.2168 0.99999Z" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12.7151 12.1104V17.792C12.7603 20.0556 14.3229 21.53 15.6804 22.876C16.9295 24.1145 18.3461 25.5772 20.7384 25.6059C23.1307 25.5772 24.5472 24.1145 25.7964 22.876C27.1539 21.53 28.7164 20.0556 28.7617 17.792V12.1104" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.5972 11.5814C11.3691 11.6295 11.1547 11.7285 10.97 11.8709C10.5122 12.2248 10.3114 12.8198 10.4148 13.3891L10.8039 15.5315C11.0439 16.7932 12.2353 16.5944 12.7149 16.4595" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M28.7617 16.4594C29.2414 16.5943 30.4327 16.7932 30.6728 15.5314L31.0619 13.389C31.1652 12.8197 30.9644 12.2247 30.5067 11.8708C30.322 11.7284 30.1076 11.6295 29.8794 11.5813" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1.57038 39.5601L1.00626 46.8041C0.914144 47.9882 1.85011 49 3.03789 49H38.4388C39.6265 49 40.5625 47.9882 40.4703 46.8041L39.5788 35.3546C39.4065 33.1407 37.9485 31.1498 35.8185 30.1772C32.8492 28.8213 29.7106 27.8721 26.4875 27.3554C23.5934 31.149 17.8832 31.149 14.989 27.3554C11.766 27.8722 8.62741 28.8213 5.65818 30.1772C3.52815 31.1498 2.07012 33.1407 1.89777 35.3546L1.79801 36.635" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.7885 23.9341V26.4215C16.7884 26.5739 16.7471 26.7235 16.6688 26.8543C16.5906 26.9851 16.4784 27.0923 16.3442 27.1645C16.1322 27.1906 15.9205 27.2184 15.709 27.2481C15.6822 27.2519 15.2025 27.3219 14.9897 27.356" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M26.4872 27.356C26.2746 27.3219 25.7947 27.2519 25.7678 27.2481C25.5563 27.2186 25.3447 27.1904 25.1329 27.1646H25.1327C24.9985 27.0924 24.8864 26.9852 24.8081 26.8544C24.7299 26.7236 24.6886 26.574 24.6885 26.4216V23.9341" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.8811 28.559L12.4542 30.405C12.8691 30.7026 12.8433 31.3278 12.4051 31.5901L11.4096 32.1864C11.271 32.2693 11.1649 32.397 11.1088 32.5485C11.0526 32.6999 11.0498 32.866 11.1009 33.0192L16.4231 49L14.9887 27.3554" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M31.5955 28.559L29.0224 30.405C28.6075 30.7026 28.6333 31.3278 29.0714 31.5901L30.067 32.1864C30.2056 32.2693 30.3117 32.397 30.3678 32.5485C30.424 32.6999 30.4267 32.866 30.3756 33.0192L25.0535 49L26.4879 27.3554" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M35.0764 42.5902H30.7864C30.6129 42.5902 30.4464 42.5212 30.3237 42.3985C30.201 42.2758 30.1321 42.1094 30.1321 41.9359V40.2843C30.1321 40.1108 30.201 39.9444 30.3237 39.8216C30.4464 39.6989 30.6128 39.63 30.7864 39.6299H35.0764C35.25 39.6299 35.4164 39.6989 35.5391 39.8216C35.6618 39.9443 35.7308 40.1108 35.7308 40.2843V41.9359C35.7308 42.1094 35.6618 42.2759 35.5391 42.3986C35.4164 42.5213 35.2499 42.5902 35.0764 42.5902Z" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M30.7129 20.6096H35.9341L35.4654 25.4847C35.4247 25.9078 35.9163 26.1684 36.2437 25.8973L42.6268 20.6096H45.0681C47.2622 20.6096 49.0406 18.8311 49.0406 16.6371V7.20718C49.0406 5.01317 47.2622 3.2346 45.0681 3.2346H31.738" stroke="#23BFCF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                        <p class="v2-consultation__benefit-text">Осмотр врачом с 20-ти летним стажем, который провел более 20 000 имплантации.</p>
                </div>
            </div>
                </div>
        
            <div class="v2-col-sm-6 v2-col-lg-6 v2-consultation__right">
                <div class="v2-consultation__quote" itemscope itemtype="https://schema.org/Review">
                    <div class="v2-consultation__quote-photo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/moiseev-small.png" alt="Доктор" class="v2-consultation__quote-img" loading="lazy">
                </div>
                    <div class="v2-consultation__quote-text">
                        <div itemprop="author" itemscope itemtype="https://schema.org/Person">
                            <meta itemprop="name" content="Доктор">
                        </div>
                        <p class="v2-consultation__quote-content" itemprop="reviewBody">
                    "Чем дольше ждёте — тем сложнее и дороже будет лечение"
                </p>
                </div>
            </div>
            
                <div class="v2-consultation__form">
                    <h3 class="v2-consultation__form-title">Оставьте заявку<br><span class="v2-consultation__form-subtitle">– и мы всё подробно объясним</span></h3>
                    <p class="v2-consultation__form-description">Мы перезвоним вам в ближайшее время, разберём вашу ситуацию, подскажем подходящие варианты имплантации и запишем на консультацию, если захотите.</p>
                    
                    <?php
                    // Contact Form 7 форма
                    echo do_shortcode('[contact-form-7 id="351" title="Контактная форма"]');
                    ?>
                    
                    <p class="v2-consultation__form-privacy">
                        * Нажимая кнопку, вы даете согласие на обработку <a href="https://dental41.ru/privacy.pdf" target="_blank" rel="noopener" class="v2-consultation__form-link">персональных данных</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок "Наши услуги" -->
<section class="v2-services v2-section" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-services__title-col">
                <h2 class="v2-services__title">Все виды стоматологических услуг в одном месте</h2>
        </div>
            <div class="v2-col-sm-12 v2-col-lg-4 v2-services__description-col">
                <div class="v2-services__description">
                    <svg class="v2-services__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <g clip-path="url(#clip0_2345_50)">
                            <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_2345_50">
                                <rect width="24" height="24" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                    <p class="v2-services__description-text">Более 20 000 улыбок мы подарили нашим клиентам за 26 лет работы</p>
            </div>
        </div>
    </div>

        <div class="v2-services__cards">
            <div class="v2-row">
                <div class="v2-col-sm-12 v2-col-lg-6 v2-services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="1">
                    <div class="v2-services__card-body">
                        <div class="v2-services__circles">
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-01.jpg" alt="Лицо" loading="lazy">
                        </div>
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-06.svg" alt="Иконка услуги" loading="lazy">
                        </div>
                    </div>
                        <h3 class="v2-services__card-title" itemprop="name">Бережная имплантация</h3>
                        <p class="v2-services__card-text" itemprop="description">Используем только проверенные имплантаты зубов от ведущих мировых производителей. Возможна установка за одно посещение. Пожизненная гарантия на модели имплантов Nobel (Швейцария) и Impro (Германия). Опытные имплантологи, прошедшие обучение за границей.</p>
                        <p class="v2-services__card-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer"><meta itemprop="price" content="76200"><meta itemprop="priceCurrency" content="RUB">От 76 200 тыс.</p>
                </div>
                    <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Узнать подробнее о бережной имплантации">Узнать подробнее</button>
            </div>

                <div class="v2-col-sm-12 v2-col-lg-6 v2-services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="2">
                    <div class="v2-services__card-body">
                        <div class="v2-services__circles">
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-02.jpg" alt="Лицо" loading="lazy">
                        </div>
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-05.svg" alt="Вопрос" loading="lazy">
                        </div>
                    </div>
                        <h3 class="v2-services__card-title" itemprop="name">Коронки</h3>
                        <p class="v2-services__card-text" itemprop="description">Коронки изготавливаются из импортных материалов в собственной лаборатории. Быстрое изготовление конструкции — в большинстве случаев всего за 1 день! Мы предлагаем все виды коронок с гарантией до 5 лет.</p>
                        <p class="v2-services__card-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer"><meta itemprop="price" content="25000"><meta itemprop="priceCurrency" content="RUB">От 25 000 тыс.</p>
                </div>
                    <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Узнать подробнее о коронках">Узнать подробнее</button>
            </div>
        </div>

            <div class="v2-row">
                <div class="v2-col-sm-12 v2-col-lg-6 v2-services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="3">
                    <div class="v2-services__card-body">
                        <div class="v2-services__circles">
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-09.jpg" alt="Лицо" loading="lazy">
                </div>
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-01.svg" alt="Вопрос" loading="lazy">
            </div>
                        </div>
                        <h3 class="v2-services__card-title" itemprop="name">Виниры</h3>
                        <p class="v2-services__card-text" itemprop="description">Только у нас виниры, созданные по технологии ведущего мирового специалиста в области реставрации Назария Махайлюка. Полная реставрация всего за 1–2 визита, без дискомфорта.</p>
                        </div>
                    <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Узнать подробнее о винирах">Узнать подробнее</button>
                    </div>

                <div class="v2-col-sm-12 v2-col-lg-6 v2-services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="4">
                    <div class="v2-services__card-body">
                        <div class="v2-services__circles">
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-04.jpg" alt="Лицо" loading="lazy">
                </div>
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-04.svg" alt="Вопрос" loading="lazy">
            </div>
        </div>
                        <h3 class="v2-services__card-title" itemprop="name">Все виды лечения</h3>
                        <p class="v2-services__card-text" itemprop="description">Все виды лечения зубов без боли с гарантией результата. Мы используем самую современную анестезию, в том числе электронную. Применяем надёжные пломбировочные материалы.</p>
                        <p class="v2-services__card-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer"><meta itemprop="price" content="8500"><meta itemprop="priceCurrency" content="RUB">От 8 500 тыс.</p>
                        </div>
                    <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Узнать подробнее о всех видах лечения">Узнать подробнее</button>
                        </div>
                    </div>

            <div class="v2-row">
                <div class="v2-col-sm-12 v2-col-lg-6 v2-services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="5">
                    <div class="v2-services__card-body">
                        <div class="v2-services__circles">
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-06.jpg" alt="Лицо" loading="lazy">
                </div>
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-03.svg" alt="Вопрос" loading="lazy">
            </div>
                        </div>
                        <h3 class="v2-services__card-title" itemprop="name">Отбеливание</h3>
                        <p class="v2-services__card-text" itemprop="description">Красивые белые зубы без вреда для эмали! Зубы светлее на 7–10 тонов всего за 1 посещение. Эффект сохраняется на 3–5 лет.</p>
                        <p class="v2-services__card-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer"><meta itemprop="price" content="18000"><meta itemprop="priceCurrency" content="RUB">От 18 000 тыс.</p>
                        </div>
                    <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Узнать подробнее об отбеливании">Узнать подробнее</button>
    </div>

                <div class="v2-col-sm-12 v2-col-lg-6 v2-services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="6">
                    <div class="v2-services__card-body">
                        <div class="v2-services__circles">
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-05.jpg" alt="Лицо" loading="lazy">
                </div>
                            <div class="v2-services__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-02.svg" alt="Вопрос" loading="lazy">
                </div>
            </div>
                        <h3 class="v2-services__card-title" itemprop="name">Миорелаксация жевательных мышц (TENS-терапия)</h3>
                        <p class="v2-services__card-text" itemprop="description">Безболезненная процедура, которая расслабляет жевательные мышцы и восстанавливает правильное положение челюсти. Подходит при бруксизме, болях, щелчках и напряжении в лице. За 40 минут мягкие импульсы улучшают кровоток, снимают спазмы и восстанавливают симметрию лица.</p>
                        <p class="v2-services__card-price"></p>
                </div>
                    <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Узнать подробнее о миорелаксации жевательных мышц">Узнать подробнее</button>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- Блок плюсов -->
<section class="v2-plus v2-section">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-plus__header">
                <h2 class="v2-plus__title">Премиум-лечение<br>по адекватной цене</h2>
        </div>
            <div class="v2-col-sm-12 v2-col-lg-4 v2-plus__header-plus">
                <svg class="v2-plus__header-icon" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <g clip-path="url(#clip0_2340_161)">
                    <path d="M7.5 15.5L0 8L2.5 5.5L7.5 10.5L17.5 0.5L20 3" fill="#23BFCF"/>
                </g>
                <defs>
                    <clipPath id="clip0_2340_161">
                        <rect width="20" height="16" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
                <h3 class="v2-plus__header-text">Мы используем только проверенные системы имплантов и гарантируем результат.</h3>
            </div>
        </div>
        
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-plus__left">
                <div class="v2-row v2-plus__left-row">
                    <div class="v2-col-sm-12 v2-col-lg-6 v2-plus__card">
                        <div class="v2-plus__icon">
                            <svg width="74" height="66" viewBox="0 0 74 66" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.7817 4.3284C30.9138 4.3284 30.1197 1.13263 24.2968 1.00245C17.7524 0.856267 12.0546 7.27922 12.0546 14.253C12.0546 17.8715 13.2935 21.1851 15.3459 23.7455C15.6881 24.1724 16.0127 24.5911 16.3185 25.0108C22.5901 27.7338 29.5087 29.2465 36.7817 29.2465C44.0547 29.2465 50.9734 27.7337 57.2449 25.0108C57.5509 24.5911 57.8755 24.1725 58.2177 23.7455C60.2701 21.1851 61.509 17.8716 61.509 14.253C61.509 7.27922 55.8113 0.856267 49.2668 1.00245C43.444 1.13263 42.6496 4.3284 36.7817 4.3284Z" stroke="black" stroke-width="2" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M42.3098 9.51733C40.5866 9.93697 38.8004 10.1467 36.7818 10.1467C34.7632 10.1467 32.977 9.93697 31.2538 9.51733M48.8427 28.2793L44.7021 57.0797C44.0823 61.3911 41.1377 65 36.782 65C32.2905 65 29.4566 61.2183 28.8617 57.0797L24.7211 28.2794M24.4335 35.6699H49.1301M25.4616 42.8206H48.1021M26.4896 49.9713H47.074M27.5443 57.1219H46.0191M12.4487 18.5006C9.65378 17.1202 3.9725 18.1096 1 21.0821M61.1149 18.5006C63.9098 17.1202 69.591 18.1096 72.5636 21.0821" stroke="black" stroke-width="2" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
                        <h3 class="v2-plus__card-title">Оригинальные импланты с пожизненной гарантией</h3>
                        <p class="v2-plus__card-text">Nobel (Швейцария) и Impro (Германия) — никаких подделок и дешёвых аналогов.</p>
        </div>
        
                    <div class="v2-col-sm-12 v2-col-lg-6 v2-plus__card">
                        <div class="v2-plus__icon">
                            <svg width="51" height="67" viewBox="0 0 51 67" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M19.5021 24.7367V25.7689" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M31.8892 24.7367V25.7689" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M22.5989 31.9629C23.2216 32.5774 24.3682 32.9951 25.6956 32.9951C27.0231 32.9951 28.1696 32.5774 28.7925 31.9629" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.2753 27.7441C12.2753 35.1553 18.2833 41.1633 25.6945 41.1633C32.7575 41.1633 38.533 35.7036 39.0618 28.7763H40.5161C41.8661 28.7763 43.0961 27.805 43.2307 26.4617C43.3852 24.917 42.1764 23.615 40.6633 23.615C36.0181 23.615 33.9536 13.2924 33.9536 13.2924" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.502 40.1311V44.864C19.502 45.2911 19.3695 45.7077 19.1228 46.0564C18.8761 46.405 18.5274 46.6686 18.1246 46.8108L6.0858 51.0598C3.6095 51.9337 1.95361 54.2743 1.95361 56.9002V65.9375" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M49.4375 65.9375V56.9002C49.4375 54.2742 47.7815 51.9337 45.3053 51.0598L33.2665 46.8108C32.8637 46.6686 32.515 46.4051 32.2683 46.0564C32.0216 45.7077 31.8891 45.2911 31.8892 44.864V40.1311" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.6919 47.266L22.5986 65.9375" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M33.6991 47.266L28.7924 65.9375" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M31.997 53.4867C30.0294 54.1959 27.9076 54.5825 25.6954 54.5825C23.4437 54.5825 21.2854 54.1819 19.288 53.4482" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12.2761 27.744C12.2761 20.3328 18.2841 14.3248 25.6954 14.3248H29.8245C32.8943 14.3248 35.4424 12.0936 35.9328 9.16342" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M31.8892 44.1682C38.5246 41.6647 43.2439 35.2556 43.2439 27.7441V16.3892C43.2439 8.40777 36.7738 1.93759 28.7923 1.93759H24.6633C15.5417 1.93759 8.14709 9.3321 8.14709 18.4537C8.14709 34.9698 11.2439 44.2603 11.2439 44.2603H19.502" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M45.3085 65.9375V60.26C45.3085 57.1246 42.7667 54.5827 39.6311 54.5827C36.4956 54.5827 33.9536 57.1246 33.9536 60.26V65.9375" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M39.6311 54.5825V49.4212" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13.3086 48.7257V59.7439" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16.4052 62.8408C16.4052 61.1305 15.0188 59.7441 13.3085 59.7441C11.5982 59.7441 10.2117 61.1305 10.2117 62.8408C10.2117 64.551 11.5982 65.9375 13.3085 65.9375C15.0188 65.9375 16.4052 64.551 16.4052 62.8408Z" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.4697 21.5503H20.5342" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M30.8568 21.5503H32.9213" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
                        <h3 class="v2-plus__card-title">Опытные врачи</h3>
                        <p class="v2-plus__card-text">Более 20 000 установленных имплантов, регулярное обучение в Европе и Москве.</p>
                    </div>
        </div>
        
                <div class="v2-row v2-plus__left-row">
                    <div class="v2-col-sm-12 v2-col-lg-6 v2-plus__card v2-plus__card--bg" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/plus-bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
        </div>
        
                    <div class="v2-col-sm-12 v2-col-lg-6 v2-plus__card">
                        <div class="v2-plus__icon">
                            <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M57.8829 34.365V16.1256C57.8829 14.6744 58.4714 13.3596 59.423 12.4093C60.3747 11.4576 61.6881 10.8691 63.1394 10.8691C64.167 10.8691 65.0002 11.7023 65.0002 12.7299V37.4646C65.0002 38.4548 64.7091 39.4232 64.1644 40.2486L62.9514 42.0862M49.5951 65C49.7911 62.9403 50.4898 60.9603 51.6297 59.2336L60.4674 45.8477" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M35.3201 65C35.2649 63.4151 34.8823 61.8588 34.1964 60.4289C33.409 58.7872 33.0002 56.9897 33.0003 55.169C33.0003 53.5632 33.3182 51.9734 33.9359 50.4911C34.5535 49.0089 35.4586 47.6636 36.5988 46.533L51.5359 31.7218C52.9857 30.2843 55.3224 30.2818 56.7753 31.7159C58.2025 33.1247 58.2581 35.4105 56.9011 36.887L46.4131 48.2996M1.00012 25.3934V37.4646C1.00012 38.4548 1.29115 39.4232 1.83586 40.2486L10.2125 52.9353M1.00012 20.8864V12.7299C1.00012 11.7023 1.83328 10.8691 2.86089 10.8691C4.31216 10.8691 5.62564 11.4576 6.57727 12.4093C7.5289 13.3596 8.11739 14.6744 8.11739 16.1256V34.365M12.6965 56.6981L14.3706 59.2336C15.5105 60.9603 16.2091 62.9403 16.4052 65" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M30.6801 65C30.7354 63.4151 31.1179 61.8587 31.8038 60.4288C32.5912 58.7872 33 56.9897 32.9999 55.169C33 53.5632 32.682 51.9733 32.0643 50.4911C31.4467 49.0088 30.5417 47.6636 29.4014 46.533L14.4643 31.7219C13.0146 30.2844 10.6779 30.2819 9.22491 31.716C7.79772 33.1248 7.74209 35.4106 9.0991 36.8871L19.5871 48.2997" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M44.6914 27.4435V21.6294C44.6914 19.0758 42.8628 16.8893 40.3505 16.436L35.9155 15.6363C35.412 16.9858 34.2054 17.6593 33.0001 17.6593C31.7948 17.6593 30.5882 16.9858 30.0847 15.6363L25.6498 16.436C23.1374 16.8893 21.3088 19.0758 21.3088 21.6294V37.5451C21.3088 38.8225 22.3444 39.8581 23.6219 39.8581C24.8993 39.8581 25.9349 38.8225 25.9349 37.5449L25.9347 24.4715M44.6914 38.3686V31.9505M33.0001 38.3679V55.1691M35.9157 15.6357L35.5726 12.8347M30.0846 15.6358L30.4191 12.904M31.576 13.408C32.0201 13.627 32.5085 13.7411 33.0037 13.7413C33.4988 13.7416 33.9874 13.628 34.4317 13.4094C36.4655 12.4087 37.8385 10.4273 38.0629 8.16878L38.203 6.75859C38.5094 3.67693 36.0909 1.00155 32.9975 1C29.9042 0.998455 27.4885 3.67126 27.7978 6.75318L27.9393 8.16363C28.0508 9.27452 28.4431 10.3388 29.0793 11.2562C29.7155 12.1737 30.5747 12.9142 31.576 13.408Z" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.3088 27.4429V37.545C21.3088 38.8224 22.3444 39.858 23.6219 39.858C24.8993 39.858 25.9349 38.8224 25.9349 37.5448L25.9347 24.4714M44.6914 31.9506L44.6915 37.5451C44.6915 38.8225 43.6559 39.8581 42.3785 39.8581C41.1011 39.8581 40.0655 38.8225 40.0655 37.545L40.0656 24.4716" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
                        <h3 class="v2-plus__card-title">Куратор рядом</h3>
                        <p class="v2-plus__card-text">Вы не одни: вас сопровождает специалист, который отвечает на все вопросы - до полного завершения лечения.</p>
        </div>
            </div>
        </div>

            <div class="v2-col-sm-12 v2-col-lg-4 v2-plus__right">
                <div class="v2-plus__card v2-plus__card--featured">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/khan-bg.png" alt="Имплантация за 1 день" class="v2-plus__card-image" loading="lazy">
                    <div class="v2-plus__card-content">
                        <h3 class="v2-plus__card-title v2-plus__card--featured-title">Имплантация за 1 день</h3>
                        <p class="v2-plus__card-text v2-plus__card--featured-text">Без боли, с временной коронкой сразу. Благодаря нашей цифровой лаборатории вы уходите домой уже с зубом.</p>
                        <button type="button" class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Хочу зубы за один день">Хочу зубы за один день</button>
        </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок доверия -->
<section class="v2-trust v2-section" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-12 v2-trust__header">
                <h2 class="v2-trust__title">
                    Нам доверяют<br>
                    <span class="v2-trust__title-span">потому что <span class="v2-trust__highlight">у нас безопасно</span></span>
            </h2>
            </div>
        </div>
        
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-4 v2-trust__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="1">
                <div class="v2-trust__icon">
                    <div class="v2-trust__icon-main"></div>
                    <div class="v2-trust__icon-arrow"></div>
                                    </div>
                <h3 class="v2-trust__card-title" itemprop="name">Абсолютная стерильность</h3>
                <p class="v2-trust__card-text">Ваше здоровье под полной защитой — каждый инструмент проходит централизованную стерилизацию и строгий контроль.</p>
                                </div>
                                
            <div class="v2-col-sm-12 v2-col-lg-4 v2-trust__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="2">
                <div class="v2-trust__icon">
                    <div class="v2-trust__icon-main"></div>
                    <div class="v2-trust__icon-arrow"></div>
                                    </div>
                <h3 class="v2-trust__card-title" itemprop="name">Гарантированная приживаемость 99,8%</h3>
                <p class="v2-trust__card-text">Импланты надежно приживаются благодаря опыту врачей и проверенным методикам — вы можете быть спокойны за результат.</p>
                    </div>
                    
            <div class="v2-col-sm-12 v2-col-lg-4 v2-trust__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="3">
                <div class="v2-trust__icon">
                    <div class="v2-trust__icon-main"></div>
                    <div class="v2-trust__icon-arrow"></div>
                </div>
                <h3 class="v2-trust__card-title" itemprop="name">Биотехнология APRF</h3>
                <p class="v2-trust__card-text">Ваше заживление проходит быстрее и комфортнее: снижается риск отторжения и ускоряется восстановление тканей.</p>
            </div>
        </div>
    </div>
</section>

<!-- Блок гарантий -->
<section class="v2-guarantees v2-section" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-guarantees__left">
                <div class="v2-guarantees__header">
                    <h2 class="v2-guarantees__title">Мы отвечаем за свою работу и даём официальные гарантии</h2>
                    <p class="v2-guarantees__subtitle">Все гарантии прописаны в договоре — вы защищены документально.</p>
            </div>
            
                <div class="v2-row">
                    <div class="v2-col-sm-12 v2-col-lg-6 v2-guarantees__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="1">
                        <svg class="v2-guarantees__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                        </svg>
                        <p class="v2-guarantees__text" itemprop="name"><strong>Работа врача</strong> — гарантия 1 год</p>
                    </div>

                    <div class="v2-col-sm-12 v2-col-lg-6 v2-guarantees__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="2">
                        <svg class="v2-guarantees__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                        </svg>
                        <p class="v2-guarantees__text" itemprop="name"><strong>Импланты Implantium (Корея)</strong> — 5 лет гарантии</p>
                    </div>
                </div>

                <div class="v2-row">
                    <div class="v2-col-sm-12 v2-col-lg-6 v2-guarantees__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="3">
                        <svg class="v2-guarantees__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                        </svg>
                        <p class="v2-guarantees__text" itemprop="name"><strong>Импланты Nobel (Швейцария)</strong> — пожизненная гарантия</p>
                    </div>

                    <div class="v2-col-sm-12 v2-col-lg-6 v2-guarantees__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="4">
                        <svg class="v2-guarantees__icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                        </svg>
                        <p class="v2-guarantees__text" itemprop="name"><strong>Импланты Impro (Германия)</strong> — пожизненная гарантия</p>
                    </div>
                </div>

                <div class="v2-guarantees__additional">
                    <h4 class="v2-guarantees__additional-title">Дополнительно</h4>
                    <div class="v2-guarantees__additional-items">
                        <div class="v2-guarantees__additional-item">
                            <p class="v2-guarantees__additional-text">Только сертифицированные импланты.</p>
        </div>
                        <div class="v2-guarantees__additional-item">
                            <p class="v2-guarantees__additional-text">Честная цена с первой консультации.</p>
        </div>
                        <div class="v2-guarantees__additional-item">
                            <p class="v2-guarantees__additional-text">Налоговый вычет</p>
        </div>
        </div>
        </div>
        </div>
        
            <div class="v2-col-sm-12 v2-col-lg-4 v2-guarantees__right">
                <h3 class="v2-guarantees__right-title">Почему гарантия на работу врача — 1 год?</h3>
                <p class="v2-guarantees__right-text">Год — это объективный срок, в течение которого можно оценить результат лечения.</p>
                <p class="v2-guarantees__right-text">Далее многое зависит от самого пациента: здоровье, гигиена, хронические болезни и соблюдение рекомендаций.</p>
                <p class="v2-guarantees__right-text">Бессрочная гарантия — это миф. Мы даём честную и обоснованную гарантию. И даже когда срок заканчивается, мы всегда остаёмся рядом, открыты к вашим вопросам и готовы помочь в любой ситуации.</p>
            </div>
        </div>
    </div>
</section>

<section class="v2-section v2-reviews" aria-labelledby="v2-reviews-title" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-6 v2-reviews__left">
                <h2 id="v2-reviews-title" class="v2-reviews__title" itemprop="name">
                    Что говорят пациенты<br>
                    после лечения
                </h2>
                
                <div class="v2-reviews__stats">
                    <div class="v2-reviews__circles">
                        <div class="v2-reviews__circle">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-06.jpg" alt="Довольная пациентка" loading="lazy">
                        </div>
                        <div class="v2-reviews__circle">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-03.jpg" alt="Довольная пациентка" loading="lazy">
                        </div>
                    </div>
                    <p class="v2-reviews__stats-text">
                        +25000 улыбок мы подарили нашим пациентам за 26 лет работы
                    </p>
                </div>
            </div>
            
            <div class="v2-col-sm-12 v2-col-lg-6 v2-reviews__right">
                <div class="v2-reviews__slider-wrapper">
                    <div class="v2-reviews__slider" data-slider="reviews" aria-roledescription="carousel" aria-label="Отзывы пациентов">
                        <div class="v2-reviews__track">
                            <?php
                            $reviews = new WP_Query(array(
                                'post_type' => 'review',
                                'posts_per_page' => 6,
                                'post_status' => array('publish', 'draft'),
                                'orderby' => 'date',
                                'order' => 'DESC'
                            ));
                            
                            if ($reviews->have_posts()) :
                                $review_index = 0;
                                while ($reviews->have_posts()) : $reviews->the_post();
                                    $review_index++;
                                    $reviewer_name = get_post_meta(get_the_ID(), '_reviewer_name', true);
                                    $video_url = get_post_meta(get_the_ID(), '_review_video_url', true);
                            ?>
                                <article class="v2-reviews__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Review">
                                    <meta itemprop="position" content="<?php echo esc_attr($review_index); ?>">
                                    
                                    <div class="v2-reviews__header">
                                        <div class="v2-reviews__photo">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('thumbnail', array('itemprop' => 'image', 'loading' => 'lazy', 'alt' => $reviewer_name ? esc_attr($reviewer_name) : 'Фото пациента')); ?>
                                            <?php else : ?>
                                                <div class="v2-reviews__photo-placeholder" aria-hidden="true">👤</div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if ($video_url) : ?>
                                            <button 
                                                class="v2-reviews__video-btn" 
                                                type="button"
                                                data-video="<?php echo esc_url($video_url); ?>"
                                                aria-label="Смотреть видео отзыв <?php echo $reviewer_name ? esc_attr($reviewer_name) : 'пациента'; ?>"
                                            >
                                                <svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <g clip-path="url(#clip0_2402_132)">
                                                        <rect x="25.1797" y="25.1797" width="56.8345" height="52.518" fill="white"/>
                                                        <path d="M50 0C22.3861 0 0 22.3857 0 50C0 77.6143 22.3861 100 50 100C77.6139 100 100 77.6143 100 50C100 22.3857 77.6139 0 50 0ZM67.2813 52.6504L42.2812 68.2754C41.808 68.5708 41.2644 68.7342 40.7067 68.7487C40.1491 68.7632 39.5977 68.6283 39.1098 68.3578C38.6219 68.0875 38.2153 67.6915 37.9323 67.2109C37.6492 66.7303 37.4999 66.1827 37.5 65.625V34.375C37.5 33.2383 38.1164 32.193 39.1098 31.6422C39.5974 31.3707 40.1489 31.2352 40.7068 31.2497C41.2647 31.2641 41.8084 31.4282 42.2812 31.7246L67.2813 47.3496C68.1945 47.9219 68.75 48.9229 68.75 50C68.75 51.0771 68.1945 52.0783 67.2813 52.6504Z" fill="#23BFCF"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2402_132">
                                                            <rect width="100" height="100" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="v2-reviews__content">
                                        <div class="v2-reviews__text" itemprop="reviewBody">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="v2-reviews__author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                            <span class="v2-reviews__name" itemprop="name">
                                                <?php 
                                                if ($reviewer_name) {
                                                    echo esc_html($reviewer_name);
                                                } else {
                                                    echo 'Анонимный пациент';
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                            ?>
                                <article class="v2-reviews__card">
                                    <div class="v2-reviews__header">
                                        <div class="v2-reviews__photo">
                                            <div class="v2-reviews__photo-placeholder" aria-hidden="true">👤</div>
                                        </div>
                                    </div>
                                    <div class="v2-reviews__content">
                                        <div class="v2-reviews__text">
                                            Отзывы загружаются...
                                        </div>
                                        <div class="v2-reviews__author">
                                            <span class="v2-reviews__name">Загрузка</span>
                                        </div>
                                    </div>
                                </article>
                            <?php endif; ?>
                        </div>
                        
                        <div class="v2-reviews__pagination" aria-label="Пагинация слайдера отзывов"></div>
                    </div>
                    
                    <div class="v2-reviews__nav">
                        <button 
                            class="v2-reviews__nav-btn v2-reviews__nav-btn--prev" 
                            type="button"
                            data-slider-nav="prev"
                            aria-label="Предыдущий отзыв"
                        >
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M19 12H5M11 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button 
                            class="v2-reviews__nav-btn v2-reviews__nav-btn--next" 
                            type="button"
                            data-slider-nav="next"
                            aria-label="Следующий отзыв"
                        >
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="v2-section v2-ratings" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row v2-ratings__list">
            <div class="v2-col-sm-6 v2-col-lg-3 v2-ratings__col">
                <article class="v2-ratings__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/AggregateRating">
                    <meta itemprop="position" content="1">
                    <div class="v2-ratings__icon v2-ratings__icon--ya"></div>
                    <div class="v2-ratings__info">
                        <div class="v2-ratings__number" itemprop="ratingValue">4.9</div>
                        <div class="v2-ratings__stars" itemprop="ratingCount" content="1">
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="v2-col-sm-6 v2-col-lg-3 v2-ratings__col">
                <article class="v2-ratings__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/AggregateRating">
                    <meta itemprop="position" content="2">
                    <div class="v2-ratings__icon v2-ratings__icon--google"></div>
                    <div class="v2-ratings__info">
                        <div class="v2-ratings__number" itemprop="ratingValue">4.5</div>
                        <div class="v2-ratings__stars" itemprop="ratingCount" content="1">
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--half" aria-label="Половина звезды" aria-hidden="true">★</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="v2-col-sm-6 v2-col-lg-3 v2-ratings__col">
                <article class="v2-ratings__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/AggregateRating">
                    <meta itemprop="position" content="3">
                    <div class="v2-ratings__icon v2-ratings__icon--2gis"></div>
                    <div class="v2-ratings__info">
                        <div class="v2-ratings__number" itemprop="ratingValue">4.8</div>
                        <div class="v2-ratings__stars" itemprop="ratingCount" content="1">
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="v2-col-sm-6 v2-col-lg-3 v2-ratings__col">
                <article class="v2-ratings__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/AggregateRating">
                    <meta itemprop="position" content="4">
                    <div class="v2-ratings__icon v2-ratings__icon--prodoctorov"></div>
                    <div class="v2-ratings__info">
                        <div class="v2-ratings__number" itemprop="ratingValue">4.9</div>
                        <div class="v2-ratings__stars" itemprop="ratingCount" content="1">
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                            <span class="v2-ratings__star v2-ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<section class="v2-section v2-doctors" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row v2-doctors__info">
            <div class="v2-col-sm-12 v2-col-lg-6 v2-doctors__title-col">
                <h2 class="v2-doctors__title" itemprop="name">
                    Мы собрали лучших<br>
                    специалистов<br>
                    Камчатки в одной<br>
                    клинике
                </h2>
            </div>

            <div class="v2-col-sm-12 v2-col-lg-6 v2-doctors__features-col">
                <div class="v2-doctors__features-grid">
                    <div class="v2-doctors__feature-card">
                        <div class="v2-doctors__feature-icon">
                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.26316 6.375C5.26316 2.85418 8.09083 -7.07323e-07 11.5789 -1.01226e-06L18.9474 -1.65643e-06C19.5287 -1.70726e-06 20 0.475696 20 1.0625C20 1.6493 19.5287 2.125 18.9474 2.125L11.5789 2.125C9.25354 2.125 7.36842 4.02779 7.36842 6.375L7.36842 14.875C7.36842 15.4618 6.89714 15.9375 6.31579 15.9375C5.73444 15.9375 5.26316 15.4618 5.26316 14.875L5.26316 6.375Z" fill="#23BFCF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3233 9.8737C12.7344 10.2886 12.7344 10.9614 12.3233 11.3763L7.06013 16.6888L5.57148 15.1862L10.8346 9.8737C11.2457 9.45877 11.9122 9.45877 12.3233 9.8737Z" fill="#23BFCF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.06013 16.6888C7.47121 16.2739 7.47119 15.6011 7.06011 15.1862L1.79696 9.8737C1.38588 9.45877 0.719388 9.45877 0.30831 9.8737C-0.102769 10.2886 -0.102769 10.9614 0.30831 11.3763L5.57147 16.6888C5.98255 17.1037 6.64905 17.1037 7.06013 16.6888Z" fill="#23BFCF"/>
                            </svg>
                        </div>
                        <p class="v2-doctors__feature-text">
                            Каждый врач – специалист с опытом от 7 до 22 лет.
                        </p>
                    </div>

                    <div class="v2-doctors__feature-card">
                        <div class="v2-doctors__feature-icon">
                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.26316 6.375C5.26316 2.85418 8.09083 -7.07323e-07 11.5789 -1.01226e-06L18.9474 -1.65643e-06C19.5287 -1.70726e-06 20 0.475696 20 1.0625C20 1.6493 19.5287 2.125 18.9474 2.125L11.5789 2.125C9.25354 2.125 7.36842 4.02779 7.36842 6.375L7.36842 14.875C7.36842 15.4618 6.89714 15.9375 6.31579 15.9375C5.73444 15.9375 5.26316 15.4618 5.26316 14.875L5.26316 6.375Z" fill="#23BFCF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3233 9.8737C12.7344 10.2886 12.7344 10.9614 12.3233 11.3763L7.06013 16.6888L5.57148 15.1862L10.8346 9.8737C11.2457 9.45877 11.9122 9.45877 12.3233 9.8737Z" fill="#23BFCF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.06013 16.6888C7.47121 16.2739 7.47119 15.6011 7.06011 15.1862L1.79696 9.8737C1.38588 9.45877 0.719388 9.45877 0.30831 9.8737C-0.102769 10.2886 -0.102769 10.9614 0.30831 11.3763L5.57147 16.6888C5.98255 17.1037 6.64905 17.1037 7.06013 16.6888Z" fill="#23BFCF"/>
                            </svg>
                        </div>
                        <p class="v2-doctors__feature-text">
                            70+ наград и сертификатов – от Германии до Кореи
                        </p>
                    </div>

                    <div class="v2-doctors__feature-card">
                        <div class="v2-doctors__feature-icon">
                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.26316 6.375C5.26316 2.85418 8.09083 -7.07323e-07 11.5789 -1.01226e-06L18.9474 -1.65643e-06C19.5287 -1.70726e-06 20 0.475696 20 1.0625C20 1.6493 19.5287 2.125 18.9474 2.125L11.5789 2.125C9.25354 2.125 7.36842 4.02779 7.36842 6.375L7.36842 14.875C7.36842 15.4618 6.89714 15.9375 6.31579 15.9375C5.73444 15.9375 5.26316 15.4618 5.26316 14.875L5.26316 6.375Z" fill="#23BFCF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3233 9.8737C12.7344 10.2886 12.7344 10.9614 12.3233 11.3763L7.06013 16.6888L5.57148 15.1862L10.8346 9.8737C11.2457 9.45877 11.9122 9.45877 12.3233 9.8737Z" fill="#23BFCF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.06013 16.6888C7.47121 16.2739 7.47119 15.6011 7.06011 15.1862L1.79696 9.8737C1.38588 9.45877 0.719388 9.45877 0.30831 9.8737C-0.102769 10.2886 -0.102769 10.9614 0.30831 11.3763L5.57147 16.6888C5.98255 17.1037 6.64905 17.1037 7.06013 16.6888Z" fill="#23BFCF"/>
                            </svg>
                        </div>
                        <p class="v2-doctors__feature-text">
                            Врачи, обученные у основателей имплантологии в Европе и Москве
                        </p>
                    </div>

                    <div class="v2-doctors__feature-card">
                        <div class="v2-doctors__feature-icon">
                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.26316 6.375C5.26316 2.85418 8.09083 -7.07323e-07 11.5789 -1.01226e-06L18.9474 -1.65643e-06C19.5287 -1.70726e-06 20 0.475696 20 1.0625C20 1.6493 19.5287 2.125 18.9474 2.125L11.5789 2.125C9.25354 2.125 7.36842 4.02779 7.36842 6.375L7.36842 14.875C7.36842 15.4618 6.89714 15.9375 6.31579 15.9375C5.73444 15.9375 5.26316 15.4618 5.26316 14.875L5.26316 6.375Z" fill="#23BFCF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3233 9.8737C12.7344 10.2886 12.7344 10.9614 12.3233 11.3763L7.06013 16.6888L5.57148 15.1862L10.8346 9.8737C11.2457 9.45877 11.9122 9.45877 12.3233 9.8737Z" fill="#23BFCF"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.06013 16.6888C7.47121 16.2739 7.47119 15.6011 7.06011 15.1862L1.79696 9.8737C1.38588 9.45877 0.719388 9.45877 0.30831 9.8737C-0.102769 10.2886 -0.102769 10.9614 0.30831 11.3763L5.57147 16.6888C5.98255 17.1037 6.64905 17.1037 7.06013 16.6888Z" fill="#23BFCF"/>
                            </svg>
                        </div>
                        <p class="v2-doctors__feature-text">
                            С вами работают сразу несколько специалистов – хирург, ортопед и куратор, а не один врач на всё
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="v2-row v2-doctors__slider-row">
            <div class="v2-col-sm-12 v2-col-lg-12">
                <div class="v2-doctors__slider" data-slider="doctors" aria-roledescription="carousel" aria-label="Наши врачи">
                    <div class="v2-doctors__slider-track">
                        <?php
                        $doctors = new WP_Query(array(
                            'post_type' => 'doctor',
                            'posts_per_page' => 6,
                            'post_status' => 'publish',
                            'meta_query' => array(
                                array(
                                    'key' => '_doctor_show_in_slider',
                                    'value' => '1',
                                    'compare' => '='
                                )
                            ),
                            'orderby' => 'menu_order',
                            'order' => 'ASC'
                        ));

                        if (!$doctors->have_posts()) {
                            $doctors = new WP_Query(array(
                                'post_type' => 'doctor',
                                'posts_per_page' => 6,
                                'post_status' => 'publish',
                                'orderby' => 'menu_order',
                                'order' => 'ASC'
                            ));
                        }

                        if ($doctors->have_posts()) :
                            $doctor_index = 0;
                            while ($doctors->have_posts()) : $doctors->the_post();
                                $doctor_index++;
                                $doctor_fio = get_post_meta(get_the_ID(), '_doctor_full_name', true);
                                $doctor_position = get_post_meta(get_the_ID(), '_doctor_position', true);
                                $doctor_experience = get_post_meta(get_the_ID(), '_doctor_experience', true);
                                $doctor_preview = get_post_meta(get_the_ID(), '_doctor_short_preview', true);
                                $doctor_video = get_post_meta(get_the_ID(), '_doctor_video_url', true);
                        ?>
                            <article class="v2-doctors__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Person">
                                <meta itemprop="position" content="<?php echo esc_attr($doctor_index); ?>">
                                
                                <div class="v2-doctors__photo">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('doctor-medium', array('itemprop' => 'image', 'loading' => 'lazy', 'alt' => $doctor_fio ? esc_attr($doctor_fio) : 'Фото врача')); ?>
                                    <?php else : ?>
                                        <div class="v2-doctors__photo-placeholder" aria-hidden="true">👨‍⚕️</div>
                                    <?php endif; ?>
                                </div>

                                <div class="v2-doctors__card-info">
                                    <h3 class="v2-doctors__name" itemprop="name">
                                        <?php echo esc_html($doctor_fio ?: get_the_title()); ?>
                                    </h3>
                                    <div class="v2-doctors__position" itemprop="jobTitle">
                                        <?php echo esc_html($doctor_position); ?>
                                    </div>
                                    <div class="v2-doctors__experience">
                                        Опыт работы: <?php echo esc_html($doctor_experience); ?> лет
                                    </div>
                                    <?php if ($doctor_video) : ?>
                                        <button 
                                            class="v2-doctors__video-btn" 
                                            type="button"
                                            data-video="<?php echo esc_url($doctor_video); ?>"
                                            aria-label="Смотреть видео о враче <?php echo $doctor_fio ? esc_attr($doctor_fio) : 'враче'; ?>"
                                        >
                                            <svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <g clip-path="url(#clip0_2402_132)">
                                                    <rect x="25.1797" y="25.1797" width="56.8345" height="52.518" fill="white"/>
                                                    <path d="M50 0C22.3861 0 0 22.3857 0 50C0 77.6143 22.3861 100 50 100C77.6139 100 100 77.6143 100 50C100 22.3857 77.6139 0 50 0ZM67.2813 52.6504L42.2812 68.2754C41.808 68.5708 41.2644 68.7342 40.7067 68.7487C40.1491 68.7632 39.5977 68.6283 39.1098 68.3578C38.6219 68.0875 38.2153 67.6915 37.9323 67.2109C37.6492 66.7303 37.4999 66.1827 37.5 65.625V34.375C37.5 33.2383 38.1164 32.193 39.1098 31.6422C39.5974 31.3707 40.1489 31.2352 40.7068 31.2497C41.2647 31.2641 41.8084 31.4282 42.2812 31.7246L67.2813 47.3496C68.1945 47.9219 68.75 48.9229 68.75 50C68.75 51.0771 68.1945 52.0783 67.2813 52.6504Z" fill="#23BFCF"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2402_132">
                                                        <rect width="100" height="100" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                    <?php endif; ?>
                                </div>

                                <div class="v2-doctors__preview">
                                    <p><?php echo esc_html($doctor_preview); ?></p>
                                </div>
                            </article>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <article class="v2-doctors__card">
                                <div class="v2-doctors__photo">
                                    <div class="v2-doctors__photo-placeholder" aria-hidden="true">👨‍⚕️</div>
                                </div>
                                <div class="v2-doctors__card-info">
                                    <h3 class="v2-doctors__name">Загрузка...</h3>
                                    <div class="v2-doctors__position">Должность</div>
                                    <div class="v2-doctors__experience">Опыт работы</div>
                                </div>
                                <div class="v2-doctors__preview">
                                    <p>Информация о враче загружается...</p>
                                </div>
                            </article>
                        <?php endif; ?>
                    </div>

                    <div class="v2-doctors__nav">
                        <button 
                            id="v2-doctors-prev" 
                            class="v2-doctors__nav-btn v2-doctors__nav-btn--prev" 
                            type="button"
                            data-slider-nav="prev"
                            aria-label="Предыдущий врач"
                        >
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M19 12H5M11 19l-7-7 7-7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <button 
                            id="v2-doctors-next" 
                            class="v2-doctors__nav-btn v2-doctors__nav-btn--next" 
                            type="button"
                            data-slider-nav="next"
                            aria-label="Следующий врач"
                        >
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>

                    <div class="v2-doctors__pagination" aria-label="Пагинация слайдера врачей"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="v2-section v2-doctor-selection" itemscope itemtype="https://schema.org/Service">
    <div class="v2-container">
        <div class="v2-row v2-doctor-selection__container">
            <div class="v2-col-sm-12 v2-col-lg-6 v2-doctor-selection__left">
                <div class="v2-doctor-selection__circles">
                    <div class="v2-doctor-selection__circle">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-05.jpg" alt="Довольный пациент" loading="lazy">
                    </div>
                    <div class="v2-doctor-selection__circle">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/circle-question.svg" alt="Вопрос" loading="lazy">
                    </div>
                </div>
                <h2 class="v2-doctor-selection__title" itemprop="name">
                    Сомневаетесь, к<br>
                    кому записаться?
                </h2>
            </div>

            <div class="v2-col-sm-12 v2-col-lg-6 v2-doctor-selection__right">
                <p class="v2-doctor-selection__text" itemprop="description">
                    Неправильный выбор врача может стоить вам времени, денег — и повторного лечения.
                </p>
                <p class="v2-doctor-selection__text">
                    Расскажите о своей ситуации — мы подберём проверенного специалиста и покажем похожие успешные кейсы.
                </p>
                <button type="button" class="v2-btn v2-btn--primary v2-doctor-selection__button" onclick="openPopup()">Подобрать врача</button>
            </div>
        </div>
    </div>
</section>

<section class="v2-section v2-implant-types" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-implant-types__title-col">
                <h2 class="v2-implant-types__title">Подберём подходящий метод имплантации именно для вас</h2>
            </div>
            <div class="v2-col-sm-12 v2-col-lg-4 v2-implant-types__desc-col">
                <p class="v2-implant-types__description">Мы не используем один протокол для всех. Мы подбираем подход в зависимости от вашей анатомии, целей и бюджета:</p>
            </div>
        </div>

        <div class="v2-row">
            <div class="v2-col-12 v2-implant-types__tabs-container">
                <div class="v2-implant-types__tabs" id="v2-tabs-underline">
                    <div class="v2-implant-types__tablist" role="tablist" aria-label="Виды имплантации">
                        <button class="v2-implant-types__tab v2-implant-types__tab--active" role="tab" aria-selected="true" aria-controls="v2-p1" id="v2-t1">Одномоментная</button>
                        <button class="v2-implant-types__tab" role="tab" aria-selected="false" aria-controls="v2-p2" id="v2-t2">Классическая</button>
                        <button class="v2-implant-types__tab" role="tab" aria-selected="false" aria-controls="v2-p3" id="v2-t3">All-on-4</button>
                        <button class="v2-implant-types__tab" role="tab" aria-selected="false" aria-controls="v2-p4" id="v2-t4">All-on-6</button>
                        <span class="v2-implant-types__slider" aria-hidden="true"></span>
                    </div>

                    <section id="v2-p1" class="v2-implant-types__panel v2-implant-types__panel--active" role="tabpanel" aria-labelledby="v2-t1" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="1">
                        <div class="v2-implant-types__photo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/odnomoment.jpg" alt="Одномоментная имплантация" loading="lazy">
                        </div>
                        <div class="v2-implant-types__content">
                            <div class="v2-implant-types__text-block">
                                <h3 class="v2-implant-types__panel-title" itemprop="name">Одномоментная имплантация</h3>
                                <p itemprop="description">Это самый быстрый способ восстановления зуба: удаление и установка импланта выполняются за один визит. В некоторых случаях врач сразу фиксирует временную коронку, чтобы вы могли улыбаться и общаться без ограничений. Метод подходит не всем, но когда условия позволяют — результат особенно удобен для пациента.</p>
                            </div>
                            <div class="v2-implant-types__items">
                                <div class="v2-implant-types__item">
                                    <div class="v2-implant-types__item-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip_implant_p1_i1)">
                                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip_implant_p1_i1">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Удаление зуба и установка импланта за один визит</p>
                                </div>
                                <div class="v2-implant-types__item">
                                    <div class="v2-implant-types__item-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip_implant_p1_i2)">
                                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip_implant_p1_i2">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Возможна временная коронка в день операции</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="v2-p2" class="v2-implant-types__panel" role="tabpanel" aria-labelledby="v2-t2" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="2">
                        <div class="v2-implant-types__photo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/classik.jpg" alt="Классическая имплантация" loading="lazy">
                        </div>
                        <div class="v2-implant-types__content">
                            <div class="v2-implant-types__text-block">
                                <h3 class="v2-implant-types__panel-title" itemprop="name">Классическая имплантация</h3>
                                <p itemprop="description">Проверенный и максимально предсказуемый метод, при котором имплант устанавливается в несколько этапов. На приживление отводится 3–6 месяцев, благодаря чему результат стабилен и долгосрочен. Чаще всего этот вариант выбирают при сложных случаях, когда нужен максимально надёжный подход.</p>
                            </div>
                            <div class="v2-implant-types__items">
                                <div class="v2-implant-types__item">
                                    <div class="v2-implant-types__item-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip_implant_p2_i1)">
                                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip_implant_p2_i1">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Высокая предсказуемость и приживаемость</p>
                                </div>
                                <div class="v2-implant-types__item">
                                    <div class="v2-implant-types__item-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip_implant_p2_i2)">
                                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip_implant_p2_i2">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Оптимальный выбор при атрофии кости или хронических заболеваниях</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="v2-p3" class="v2-implant-types__panel" role="tabpanel" aria-labelledby="v2-t3" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="3">
                        <div class="v2-implant-types__photo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/four.jpg" alt="All-on-4 имплантация" loading="lazy">
                        </div>
                        <div class="v2-implant-types__content">
                            <div class="v2-implant-types__text-block">
                                <h3 class="v2-implant-types__panel-title" itemprop="name">All-on-4</h3>
                                <p itemprop="description">Современная методика восстановления целого зубного ряда на четырёх имплантах. Два из них устанавливаются под углом, что позволяет обойтись без костной пластики в большинстве случаев. Временный несъёмный протез фиксируется уже через несколько дней, возвращая улыбку и возможность нормально жевать.</p>
                            </div>
                            <div class="v2-implant-types__items">
                                <div class="v2-implant-types__item">
                                    <div class="v2-implant-types__item-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip_implant_p3_i1)">
                                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip_implant_p3_i1">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Восстановление зубного ряда всего на 4 имплантах</p>
                                </div>
                                <div class="v2-implant-types__item">
                                    <div class="v2-implant-types__item-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip_implant_p3_i2)">
                                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip_implant_p3_i2">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Несъёмный протез фиксируется примерно за 3 дня</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="v2-p4" class="v2-implant-types__panel" role="tabpanel" aria-labelledby="v2-t4" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="4">
                        <div class="v2-implant-types__photo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/six.jpg" alt="All-on-6 имплантация" loading="lazy">
                        </div>
                        <div class="v2-implant-types__content">
                            <div class="v2-implant-types__text-block">
                                <h3 class="v2-implant-types__panel-title" itemprop="name">All-on-6</h3>
                                <p itemprop="description">Усиленный вариант методики: шесть имплантов распределяют нагрузку равномернее, обеспечивая ещё большую надёжность. Такой подход используется при выраженных жевательных нагрузках и сложных клинических ситуациях. Методика считается «золотым стандартом» для пациентов, которым важно максимально долгосрочное решение.</p>
                            </div>
                            <div class="v2-implant-types__items">
                                <div class="v2-implant-types__item">
                                    <div class="v2-implant-types__item-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip_implant_p4_i1)">
                                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip_implant_p4_i1">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Шесть имплантов равномерно распределяют нагрузку</p>
                                </div>
                                <div class="v2-implant-types__item">
                                    <div class="v2-implant-types__item-icon" aria-hidden="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip_implant_p4_i2)">
                                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip_implant_p4_i2">
                                                    <rect width="24" height="24" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <p>Повышенная стабильность и длительный срок службы</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="v2-section v2-implants" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row v2-implants__head">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-implants__title-col">
                <h2 class="v2-implants__title">Выберите подходящий пакет без скрытых платежей:</h2>
            </div>
            <div class="v2-col-sm-12 v2-col-lg-4 v2-implants__desc-col">
                <div class="v2-implants__circles">
                    <div class="v2-implants__circle">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/imp-type-01.jpg" alt="Тип импланта 1" loading="lazy">
                    </div>
                    <div class="v2-implants__circle">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/imp-type-02.jpg" alt="Тип импланта 2" loading="lazy">
                    </div>
                </div>
                <p class="v2-implants__subtitle">Мы используем только проверенные импланты от ведущих производителей с гарантией качества и приживаемости.</p>
            </div>
        </div>

        <div class="v2-row">
            <div class="v2-col-12 v2-implants__slider-wrapper">
                <div class="v2-implants__slider" data-slider="implants">
            <div class="v2-col-sm-12 v2-col-lg-4 v2-implants__col" itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer">
                <meta itemprop="position" content="1">
                <article class="v2-implants__card">
                    <div class="v2-implants__card-header">
                        <div class="v2-implants__brand-info">
                            <div class="v2-implants__tariff-name">Стандарт</div>
                            <div class="v2-implants__brand-name" itemprop="name">Implantium</div>
                            <div class="v2-implants__brand-origin">Южная Корея</div>
                        </div>
                        <div class="v2-implants__price-box">
                            <div class="v2-implants__old-price">91 800 ₽</div>
                            <div class="v2-implants__current-price" itemprop="price" content="76200">76 200 ₽</div>
                            <meta itemprop="priceCurrency" content="RUB">
                        </div>
                    </div>

                    <div class="v2-implants__card-details">
                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">В стоимость включено:</h4>
                            <ul class="v2-implants__details-list" role="list">
                                <li>Имплант Implantium (Южная Корея)</li>
                                <li>Циркониевая коронка</li>
                                <li>Хирургический этап + анестезия</li>
                                <li>Ортопедический этап (через 3-4 месяца)</li>
                                <li>Бесплатные контрольные осмотры</li>
                                <li>Персональный куратор</li>
                            </ul>
                        </div>

                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">Оплата:</h4>
                            <p class="v2-implants__details-text">1 этап (хирургия) ~ <strong>45 200 ₽</strong><br>2 этап (ортопедия) ~ <strong>31 000 ₽</strong></p>
                        </div>

                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">Гарантии:</h4>
                            <p class="v2-implants__details-text">На имплант 5 лет<br>На работу доктора 1 год</p>
                        </div>

                        <div class="v2-implants__details-section">
                            <p class="v2-implants__details-note">* КТ оплачивается отдельно</p>
                        </div>
                    </div>

                    <button type="button" class="v2-btn v2-btn--primary v2-implants__card-button" onclick="openPopup()">Выбрать комфорт</button>
                    <div class="v2-implants__savings-text">Экономия 15 600 ₽ при записи сегодня</div>
                </article>
            </div>

            <div class="v2-col-sm-12 v2-col-lg-4 v2-implants__col" itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer">
                <meta itemprop="position" content="2">
                <article class="v2-implants__card">
                    <div class="v2-implants__card-header">
                        <div class="v2-implants__brand-info">
                            <div class="v2-implants__tariff-name">Оптимальный</div>
                            <div class="v2-implants__brand-name" itemprop="name">Impro</div>
                            <div class="v2-implants__brand-origin">Германия</div>
                        </div>
                        <div class="v2-implants__price-box">
                            <div class="v2-implants__old-price">105 200 ₽</div>
                            <div class="v2-implants__current-price" itemprop="price" content="85200">85 200 ₽</div>
                            <meta itemprop="priceCurrency" content="RUB">
                        </div>
                    </div>

                    <div class="v2-implants__recommendation-badge">
                        <span class="v2-implants__heart-icon" aria-hidden="true">❤</span>
                        ЦЭСИ РЕКОМЕНДУЕТ
                    </div>

                    <div class="v2-implants__card-details">
                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">В стоимость включено:</h4>
                            <ul class="v2-implants__details-list" role="list">
                                <li>Пожизненная гарантия на имплант</li>
                                <li>Циркониевая коронка</li>
                                <li>Хирургический этап: установка импланта + анестезия</li>
                                <li>Ортопедический этап: коронка на импланте (через 3–4 месяца)+ сканирование</li>
                                <li>Бесплатные контрольные осмотры</li>
                                <li>Персональный куратор</li>
                            </ul>
                        </div>

                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">Оплата:</h4>
                            <p class="v2-implants__details-text">1 этап (хирургия) ~ <strong>54 200 ₽</strong><br>2 этап (ортопедия) ~ <strong>31 000 ₽</strong></p>
                        </div>

                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">Гарантии:</h4>
                            <p class="v2-implants__details-text">На имплант пожизненная<br>На работу доктора 1 год</p>
                        </div>

                        <div class="v2-implants__details-section">
                            <p class="v2-implants__details-note">* КТ оплачивается отдельно</p>
                        </div>
                    </div>

                    <button type="button" class="v2-btn v2-btn--primary v2-implants__card-button" onclick="openPopup()">Выбрать оптимальный</button>
                    <div class="v2-implants__savings-text">Экономия до 20 000 ₽ при записи сегодня</div>
                </article>
            </div>

            <div class="v2-col-sm-12 v2-col-lg-4 v2-implants__col" itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer">
                <meta itemprop="position" content="3">
                <article class="v2-implants__card">
                    <div class="v2-implants__card-header">
                        <div class="v2-implants__brand-info">
                            <div class="v2-implants__tariff-name">Премиум</div>
                            <div class="v2-implants__brand-name" itemprop="name">Nobel Biocare</div>
                            <div class="v2-implants__brand-origin">Швейцария</div>
                        </div>
                        <div class="v2-implants__price-box">
                            <div class="v2-implants__old-price">117 000 ₽</div>
                            <div class="v2-implants__current-price" itemprop="price" content="101200">101 200 ₽</div>
                            <meta itemprop="priceCurrency" content="RUB">
                        </div>
                    </div>

                    <div class="v2-implants__card-details">
                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">В стоимость включено:</h4>
                            <ul class="v2-implants__details-list" role="list">
                                <li>Имплант Nobel Biocare — №1 в мире</li>
                                <li>Коронка из диоксида циркония</li>
                                <li>Хирургический этап: установка импланта + анестезия</li>
                                <li>Ортопедический этап: коронка на импланте (через 3–4 месяца)+ сканирование</li>
                                <li>Бесплатные контрольные осмотры</li>
                                <li>Персональный куратор</li>
                            </ul>
                        </div>

                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">Оплата:</h4>
                            <p class="v2-implants__details-text">1 этап (хирургия) ~ <strong>70 200 ₽</strong><br>2 этап (ортопедия) ~ <strong>31 000 ₽</strong></p>
                        </div>

                        <div class="v2-implants__details-section">
                            <h4 class="v2-implants__details-title">Гарантии:</h4>
                            <p class="v2-implants__details-text">На имплант пожизненная<br>На работу доктора 1 год</p>
                        </div>

                        <div class="v2-implants__details-section">
                            <p class="v2-implants__details-note">* КТ оплачивается отдельно</p>
                        </div>
                    </div>

                    <button type="button" class="v2-btn v2-btn--primary v2-implants__card-button" onclick="openPopup()">Выбрать премиум</button>
                    <div class="v2-implants__savings-text">Экономия до 16 000 ₽ при записи сегодня</div>
                </article>
            </div>
                </div>
            </div>
        </div>

        <div class="v2-row v2-implants__pagination-row">
            <div class="v2-col-12">
                <div class="v2-implants__pagination" role="tablist" aria-label="Пагинация имплантов">
                    <button type="button" class="v2-implants__dot" data-slider-dot aria-label="Слайд 1" aria-current="true"></button>
                    <button type="button" class="v2-implants__dot" data-slider-dot aria-label="Слайд 2"></button>
                    <button type="button" class="v2-implants__dot" data-slider-dot aria-label="Слайд 3"></button>
                </div>
            </div>
        </div>

        <div class="v2-row v2-implants__bonus">
            <div class="v2-col-sm-12 v2-col-lg-4 v2-implants__bonus-left">
                <h3 class="v2-implants__bonus-title">Дополнительные бонусы для всех пакетов</h3>
            </div>
            <div class="v2-col-sm-12 v2-col-lg-8 v2-implants__bonus-right">
                <div class="v2-implants__bonus-cards">
                    <div class="v2-implants__bonus-card">
                        <h4 class="v2-implants__bonus-card-title">Бесплатная консультация</h4>
                    </div>
                    <div class="v2-implants__bonus-card">
                        <h4 class="v2-implants__bonus-card-title">Налоговый вычет</h4>
                    </div>
                    <div class="v2-implants__bonus-card">
                        <h4 class="v2-implants__bonus-card-title">Полное сопровождение до результата</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок с ценами -->
<section class="v2-section v2-prices" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-4">
                <div class="v2-prices__content">
                    <div class="v2-prices__header">
                        <h2>Нашли дешевле?</h2>
                        <h3 class="v2-prices__subtitle">Не спешите – разберитесь, за что вы платите</h3>
                    </div>
                    
                    <div class="v2-prices__description">
                        <div class="v2-prices__circles">
                            <div class="v2-prices__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-07.jpg" alt="Лицо">
                            </div>
                            <div class="v2-prices__circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/circle-ex.svg" alt="Вопрос" aria-hidden="true">
                            </div>
                        </div>
                        <p>Многие клиники занижают цену на старте и добавляют скрытые платежи позже. В ЦЭСИ стоимость лечения прозрачна с самого начала и не меняется по ходу работы.</p>
                    </div>
                </div>
            </div>
            
            <div class="v2-col-sm-12 v2-col-lg-4">
                <div class="v2-prices__image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/price-bg.jpg" alt="Цены на имплантацию" loading="lazy">
                </div>
            </div>
            
            <div class="v2-col-sm-12 v2-col-lg-4">
                <div class="v2-prices__cards">
                    <article class="v2-prices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="1">
                        <svg class="v2-prices__icon" width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_prices_1)">
                                <path d="M7.5 15.5L0 8L2.5 5.5L7.5 10.5L17.5 0.5L20 3" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_prices_1">
                                    <rect width="20" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <h3 itemprop="name">Качество важнее скидок</h3>
                        <p>Мы не используем дешёвые аналоги и «одноразовые» материалы. В работе только сертифицированные импланты и современное оборудование.</p>
                    </article>
                    
                    <article class="v2-prices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="2">
                        <svg class="v2-prices__icon" width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_prices_2)">
                                <path d="M7.5 15.5L0 8L2.5 5.5L7.5 10.5L17.5 0.5L20 3" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_prices_2">
                                    <rect width="20" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <h3 itemprop="name">Прозрачность с первой консультации</h3>
                        <p>Вы сразу получаете план лечения с точными цифрами. Стоимость фиксируется в договоре и не меняется в процессе.</p>
                    </article>
                    
                    <article class="v2-prices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="3">
                        <svg class="v2-prices__icon" width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_prices_3)">
                                <path d="M7.5 15.5L0 8L2.5 5.5L7.5 10.5L17.5 0.5L20 3" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_prices_3">
                                    <rect width="20" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <h3 itemprop="name">Дополнительная выгода</h3>
                        <p>Часть суммы можно вернуть через налоговый вычет (13%). Оплата возможна поэтапно, без скрытых переплат.</p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок технологий -->
<section class="v2-section v2-technologies" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-4">
                <div class="v2-technologies__header">
                    <h2>Самые современные технологии</h2>
                    <p class="v2-technologies__subtitle">Для достижения точного и быстрого результата на Европейском уровне</p>
                </div>
            </div>
            
            <div class="v2-col-sm-12 v2-col-lg-4">
                <div class="v2-technologies__cards">
                    <article class="v2-technologies__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="1">
                        <h3 itemprop="name">3D-моделирование</h3>
                        <div class="v2-technologies__benefits">
                            <div class="v2-technologies__benefit">
                                <svg class="v2-technologies__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                </svg>
                                <span>Врач заранее создаёт точную цифровую модель вашей улыбки.</span>
                            </div>
                            <div class="v2-technologies__benefit">
                                <svg class="v2-technologies__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                </svg>
                                <span>Вы видите, каким будет результат ещё до начала лечения.</span>
                            </div>
                        </div>
                    </article>
                    
                    <article class="v2-technologies__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="2">
                        <h3 itemprop="name">Компьютерная диагностика</h3>
                        <div class="v2-technologies__benefits">
                            <div class="v2-technologies__benefit">
                                <svg class="v2-technologies__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                </svg>
                                <span>Высокоточный анализ снимка по каждому зубу, с помощью специальных программ.</span>
                            </div>
                            <div class="v2-technologies__benefit">
                                <svg class="v2-technologies__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                                </svg>
                                <span>План лечения составляется максимально точно и без ошибок.</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            
            <div class="v2-col-sm-12 v2-col-lg-4">
                <article class="v2-technologies__card v2-technologies__card--featured" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <meta itemprop="position" content="3">
                    <h3 itemprop="name">Своя цифровая лаборатория</h3>
                    <div class="v2-technologies__benefits">
                        <div class="v2-technologies__benefit">
                            <svg class="v2-technologies__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                            </svg>
                            <span>Коронки и протезы изготавливаются прямо в клинике.</span>
                        </div>
                        <div class="v2-technologies__benefit">
                            <svg class="v2-technologies__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M10.1333 13.8667L7.26667 11C7.02222 10.7556 6.71111 10.6333 6.33333 10.6333C5.95555 10.6333 5.64444 10.7556 5.4 11C5.15556 11.2444 5.03333 11.5556 5.03333 11.9333C5.03333 12.3111 5.15556 12.6222 5.4 12.8667L9.2 16.6667C9.46666 16.9333 9.77778 17.0667 10.1333 17.0667C10.4889 17.0667 10.8 16.9333 11.0667 16.6667L18.6 9.13333C18.8444 8.88889 18.9667 8.57778 18.9667 8.2C18.9667 7.82222 18.8444 7.51111 18.6 7.26667C18.3556 7.02222 18.0444 6.9 17.6667 6.9C17.2889 6.9 16.9778 7.02222 16.7333 7.26667L10.1333 13.8667ZM2.66667 24C1.93333 24 1.30578 23.7391 0.784 23.2173C0.262222 22.6956 0.000888889 22.0676 0 21.3333V2.66667C0 1.93333 0.261333 1.30578 0.784 0.784C1.30667 0.262222 1.93422 0.000888889 2.66667 0H21.3333C22.0667 0 22.6947 0.261333 23.2173 0.784C23.74 1.30667 24.0009 1.93422 24 2.66667V21.3333C24 22.0667 23.7391 22.6947 23.2173 23.2173C22.6956 23.74 22.0676 24.0009 21.3333 24H2.66667Z" fill="#23BFCF"/>
                            </svg>
                            <span>Уже через 1 день вы можете уйти с новым зубом.</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Блок рисков лечения в Китае -->
<section class="v2-section v2-china-risks" itemscope itemtype="https://schema.org/ItemList">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-8">
                <div class="v2-china-risks__left">
                    <div class="v2-china-risks__header">
                        <h2>Собирались лететь в Китай на протезирование?</h2>
                        <div class="v2-china-risks__subtitle">
                            <p>Сомнительные китайские аналоги имплантов — двойная плата: деньги и здоровье.</p>
                        </div>
                    </div>
                    
                    <div class="v2-row">
                        <div class="v2-col-sm-12 v2-col-lg-6">
                            <article class="v2-china-risks__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <meta itemprop="position" content="1">
                                <div class="v2-china-risks__number">.01</div>
                                <h3 itemprop="name">Языковой барьер</h3>
                                <p>Вы не объясните врачу, что чувствуете. Ошибка на этапе имплантации – это не возврат товара.</p>
                            </article>
                        </div>
                        
                        <div class="v2-col-sm-12 v2-col-lg-6">
                            <article class="v2-china-risks__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <meta itemprop="position" content="2">
                                <div class="v2-china-risks__number">.02</div>
                                <h3 itemprop="name">Выбор клиники вслепую</h3>
                                <p>По факту, вы доверяете здоровье и деньги неизвестной системе.</p>
                            </article>
                        </div>
                        
                        <div class="v2-col-sm-12 v2-col-lg-6">
                            <article class="v2-china-risks__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <meta itemprop="position" content="3">
                                <div class="v2-china-risks__number">.03</div>
                                <h3 itemprop="name">Скрытые доплаты</h3>
                                <p>Один счёт за операцию, другой – за «мелочи» на месте, а через неделю ещё за «коронки».</p>
                            </article>
                        </div>
                        
                        <div class="v2-col-sm-12 v2-col-lg-6">
                            <article class="v2-china-risks__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                <meta itemprop="position" content="4">
                                <div class="v2-china-risks__number">.04</div>
                                <h3 itemprop="name">Гарантия?</h3>
                                <p>Только пока вы в стране. А если что – останетесь с проблемой один на один.</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="v2-col-sm-12 v2-col-lg-4">
                <article class="v2-china-risks__card v2-china-risks__card--featured" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <meta itemprop="position" content="5">
                    <div class="v2-china-risks__circles">
                        <div class="v2-china-risks__circle"></div>
                        <div class="v2-china-risks__circle"></div>
                        <div class="v2-china-risks__circle"></div>
                    </div>
                    <h3 itemprop="name">В ЦЭСИ – всё прозрачно и безопасно:</h3>
                    <p>Мы работаем по договору и с гарантией. И главное – мы рядом, когда вы нас действительно нуждаетесь</p>
                    <button class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Записаться на консультацию">Записаться на консультацию</button>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Блок контактов -->
<section class="v2-section v2-contacts" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-12 v2-col-lg-6">
                <div class="v2-contacts__info">
                    <h2>Найти нас легко</h2>
                    
                    <div class="v2-contacts__details" itemscope itemprop="address" itemtype="https://schema.org/PostalAddress">
                        <div class="v2-contacts__item">
                            <div class="v2-contacts__icon" aria-hidden="true">📍</div>
                            <div class="v2-contacts__text" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</div>
                        </div>
                        
                        <div class="v2-contacts__item">
                            <div class="v2-contacts__icon" aria-hidden="true">🕒</div>
                            <div class="v2-contacts__text">
                                <meta itemprop="openingHours" content="Mo-Fr 08:00-20:00">
                                <meta itemprop="openingHours" content="Sa 08:00-14:00">
                                Пн-Пт: 8:00 - 20:00, Сб 8:00 – 14:00
                            </div>
                        </div>
                        
                        <div class="v2-contacts__item">
                            <div class="v2-contacts__icon" aria-hidden="true">📞</div>
                            <div class="v2-contacts__text">
                                <a href="tel:+74152500129" itemprop="telephone">+7(4152) 50-01-29</a>
                            </div>
                        </div>
                    </div>
                    
                    <p class="v2-contacts__description">Мы расположены в современном бизнес-центре с охраняемой парковкой. В клинике действует IP телефония, не одно обращение не останется без внимания.</p>
                    
                    <button class="v2-btn v2-btn--primary" onclick="openPopup()" aria-label="Заказать обратный звонок">ЗАКАЗАТЬ ОБРАТНЫЙ ЗВОНОК</button>
                </div>
            </div>
            
            <div class="v2-col-sm-12 v2-col-lg-6">
                <div class="v2-contacts__photo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map-pin.jpg" alt="Здание клиники" class="v2-contacts__image" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="v2-footer" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="v2-container">
        <div class="v2-row v2-footer__content">
            <div class="v2-col-sm-12 v2-col-lg-6 v2-footer__section">
                <div class="v2-footer__logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="ЦЭСИ" class="v2-footer__logo-img" itemprop="logo">
                </div>
                <p class="v2-footer__name" itemprop="name">Центр Эстетической стоматологии и имплантации</p>
            </div>

            <div class="v2-col-sm-12 v2-col-lg-6 v2-footer__section v2-footer__contacts">
                <h3 class="v2-footer__contacts-title">Контакты</h3>
                <ul class="v2-footer__contacts-list" itemscope itemprop="address" itemtype="https://schema.org/PostalAddress">
                    <li class="v2-footer__contacts-item" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</li>
                    <li class="v2-footer__contacts-item">
                        <a href="tel:+74152500129" class="v2-footer__contacts-link" itemprop="telephone">+7(4152) 50-01-29</a>
                    </li>
                    <li class="v2-footer__contacts-item">
                        <meta itemprop="openingHours" content="Mo-Fr 08:00-20:00">
                        Пн-Пт: 8:00 - 20:00
                    </li>
                    <li class="v2-footer__contacts-item">
                        <meta itemprop="openingHours" content="Sa 08:00-14:00">
                        Сб: 8:00 – 14:00
                    </li>
                </ul>
            </div>
        </div>

        <div class="v2-row v2-footer__bottom">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-footer__legal">
                <p class="v2-footer__legal-text">ООО «Дента» ИНН 4105000950 КПП 410501001 ОГРН 1024101222408</p>
                <p class="v2-footer__legal-text">Имеются противопоказания. Необходима консультация специалиста</p>
            </div>
            <div class="v2-col-sm-12 v2-col-lg-4 v2-footer__links">
                <a href="<?php echo home_url('/privacy.pdf'); ?>" target="_blank" rel="noopener" class="v2-footer__link">Политика конфиденциальности</a>
                <a href="#" onclick="showCookieSettings(); return false;" class="v2-footer__link">Настройки cookies</a>
            </div>
        </div>

        <div class="v2-row v2-footer__recaptcha">
            <div class="v2-col-sm-12 v2-col-lg-12">
                <div class="v2-footer__recaptcha-notice">
                    <p class="v2-footer__recaptcha-text">
                        This site is protected by reCAPTCHA and the Google
                        <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" class="v2-footer__recaptcha-link">Privacy Policy</a>
                        and
                        <a href="https://policies.google.com/terms" target="_blank" rel="noopener" class="v2-footer__recaptcha-link">Terms of Service</a>
                        apply.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<?php 
// Временно отключено для разработки
// include get_stylesheet_directory() . '/popup.php'; 
// include 'cookie-banner.php'; 
?>

</body>
</html>
