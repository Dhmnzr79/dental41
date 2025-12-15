<?php
/**
 * Главная страница v2
 * Блоки добавляются по одному по схеме этапов
 */

get_header();
?>

<section class="section hero-mobile">
    <div class="container">
        <div class="hero-mobile__wrapper">
            <div class="hero-mobile__content">
                <h1 class="hero-mobile__title">Стоматология <span class="hero__title-highlight">нового поколения</span> на Камчатке</h1>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/khan-mob-1.png" alt="Александр Хан" class="hero-mobile__image"<?php echo dental_clinic_get_image_dimensions('assets/images/khan-mob-1.png'); ?>>
            </div>
            
            <div class="hero-mobile__text">
                <h2 class="hero-mobile__subtitle">Все виды лечения. Бережная имплантация. С максимальным комфортом, без боли и переплат.</h2>
                
                <div class="hero-mobile__description">
                    <div class="hero-mobile__benefit">
                        <svg class="hero-mobile__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
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
            
                    <div class="hero-mobile__benefit">
                        <svg class="hero-mobile__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
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
            
                    <div class="hero-mobile__benefit">
                        <svg class="hero-mobile__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
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
                    
                    <div class="hero-mobile__conclusion">Ешьте любимую еду. Выглядите на 10 лет моложе.</div>
                </div>
            </div>
        </div>
        
        <div class="hero-mobile__index">
            <div class="hero-mobile__index-item">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/25-1.svg" alt="25 000 имплантов" loading="lazy">
                <span>25 000 имплантов установили мы за 26 лет работы</span>
            </div>
        </div>
        
        <div class="hero-mobile__actions">
            <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Вернуть улыбку">Вернуть улыбку</button>
            <button type="button" class="btn btn--whatsapp" onclick="window.open('https://wa.me/79084952424', '_blank')" aria-label="Рассчитать стоимость в WhatsApp">Рассчитать стоимость в WhatsApp</button>
        </div>
    </div>
</section>

<section class="hero section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6 hero__left">
                <h1 class="hero__title">
                Стоматология <span class="hero__title-highlight">нового поколения</span> на Камчатке
                </h1>
        
                <h2 class="hero__subtitle">
                Все виды лечения. Бережная имплантация. С максимальным комфортом, без боли и переплат.
                </h2>
                
                <div class="hero__description">
                    <div class="hero__benefits-row">
                        <div class="hero__benefit">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/chk-2.svg" alt="" class="hero__icon" aria-hidden="true">
                            <span>Без переплат — прозрачные цены</span>
                        </div>
                        
                        <div class="hero__benefit">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/chk-2.svg" alt="" class="hero__icon" aria-hidden="true">
                            <span>99,8% приживаемость + пожизненная гарантия на импланты</span>
                        </div>
                </div>
                    
                    <div class="hero__conclusion">
                    Ешьте любимую еду. Выглядите на 10 лет моложе.
                </div>
            </div>
            
                <div class="hero__actions">
                    <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на консультацию">Вернуть улыбку</button>
                    <button type="button" class="hero__whatsapp-btn" onclick="window.open('https://wa.me/79084952424', '_blank')" aria-label="Связаться через WhatsApp">
                        <span>Рассчитать стоимость в WhatsApp</span>
                    </button>
            </div>
        </div>
        
            <div class="col-sm-12 col-lg-6 hero__right">
                <div class="hero__photo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/moiseev-hero.png" alt="Хирург-имплантолог Александр Хан — главный врач стоматологической клиники" class="hero__doctor-photo"<?php echo dental_clinic_get_image_dimensions('assets/images/moiseev-hero.png'); ?>>
            </div>
            
                <div class="hero__stats">
                    <div class="hero__stat">
                        
                        <div class="hero__stat-images">
                            <div class="circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-01.jpg" alt="" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-01.jpg'); ?>>
                            </div>
                            <div class="circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-02.jpg" alt="" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-02.jpg'); ?>>
                            </div>
                            <div class="circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-03.jpg" alt="" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-03.jpg'); ?>>
                            </div>
                        </div>
                        <span class="hero__stat-number">25 000</span>
                        <p itemprop="name">имплантаций за 26 лет<br>работы на Камчатке</p>
                    </div>
                    
                    <div class="hero__doctor-info">
                        <p class="hero__doctor-name">Александр Хан</p>
                        <p class="hero__doctor-position">Главный врач, хирург-имплантолог</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="indices section" itemscope itemtype="https://schema.org/ItemList">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 indices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="1">

                <div class="indices__content">
                <div class="indices__icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/index-icon-01.svg" alt="" class="indices__icon-image" aria-hidden="true">
            </div>
                    <p itemprop="name">Точная диагностика на оборудовании нового поколения — уровень клиник Москвы и Европы</p>
            </div>
        </div>

            <div class="col-sm-6 col-lg-3 indices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="2">
                <div class="indices__content">
                    <div class="indices__icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/index-icon-02.svg" alt="" class="indices__icon-image" aria-hidden="true">
                    </div>
                    <p itemprop="name">Помогаем в сложных случаях, когда другие бессильны</p>
            </div>
        </div>

            <div class="col-sm-6 col-lg-3 indices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="3">
                <div class="indices__content">
                    <div class="indices__icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/index-icon-03.svg" alt="" class="indices__icon-image" aria-hidden="true">
                    </div>
                    <p itemprop="name">Изготавливаем протезы у себя - это быстрее, точнее и надёжнее.</p>
            </div>
        </div>

            <div class="col-sm-6 col-lg-3 indices__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <meta itemprop="position" content="4">
                <div class="indices__content">
                    <div class="indices__icon">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/index-icon-04.svg" alt="" class="indices__icon-image" aria-hidden="true">
                    </div>
                    <p itemprop="name">Входим в ТОП рейтинга Яндекса, ПроДокторов и Google</p>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Блок консультации -->
<section class="consultation section" itemscope itemtype="https://schema.org/Offer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-6 consultation__left">
                <div class="consultation__promo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/calendar-icon.svg" alt="" class="consultation__calendar-icon" aria-hidden="true">
                    <p class="consultation__promo-text">
                        Акция <span class="consultation__promo-date">до 30 ноября</span>
                    </p>
            </div>
            
                <h2 class="consultation__title" itemprop="name">
                    <span class="consultation__highlight">Бесплатная</span>
                    консультация<br>
                    по имплантации
            </h2>
            
                <div itemprop="description">
                    <ul class="consultation__benefits">
                        <li>Составим для вас понятный план: 3 варианта по бюджету, этапы, сроки</li>
                        <li>При необходимости проведём КТ с высокоточной диагностикой. Это позволит составить точный план и рекомендации по каждому зубу. КТ оплачивается отдельно.</li>
                        <li>Осмотр врачом с 20-ти летним стажем, который провел более 20 000 имплантации.</li>
                    </ul>
                </div>
                <meta itemprop="price" content="0">
                <meta itemprop="priceCurrency" content="RUB">
                </div>
        
            <div class="col-sm-6 col-lg-6 consultation__right">
                <div class="consultation__content">
                <div class="consultation__quote">
                    <div class="consultation__quote-photo">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/moiseev-small.png" alt="Врач-имплантолог стоматологической клиники" class="consultation__quote-img" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/moiseev-small.png'); ?>>
                </div>
                    <div class="consultation__quote-text" itemscope itemtype="https://schema.org/Person">
                        <meta itemprop="name" content="Врач-имплантолог">
                        <meta itemprop="jobTitle" content="Имплантолог">
                        <p class="consultation__quote-content">
                    "Чем дольше ждёте — тем сложнее и дороже будет лечение"
                </p>
                </div>
            </div>
            
                <div class="consultation__form">
                    <h3 class="consultation__form-title">Оставьте заявку</h3>
                    <p class="consultation__form-description">Мы перезвоним вам в ближайшее время, разберём вашу ситуацию, подскажем подходящие варианты имплантации и запишем на консультацию, если захотите.</p>
                    
                    <?php
                    // Contact Form 7 форма
                        echo do_shortcode('[contact-form-7 id="4b1ef9d" title="Заявка консультация"]');
                    ?>
                    
                        <?php dental_clinic_v2_privacy_notice(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок "Наши услуги" -->
<section class="services section" itemscope itemtype="https://schema.org/ItemList">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 services__title-col">
                <h2 class="services__title"><span class="services__title-highlight">Все виды</span> стоматологических услуг в одном месте</h2>
        </div>
            <div class="col-sm-12 col-lg-4 services__description-col">
                <div class="services__description">
                    <div class="services__description-avatars">
                    <div class="services__circles circle-group">
                        <div class="services__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-06.jpg" alt="Довольная пациентка" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-06.jpg'); ?>>
                            </div>
                        <div class="services__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-03.jpg" alt="Довольная пациентка" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-03.jpg'); ?>>
                            </div>
                        <div class="services__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-05.jpg" alt="Довольный пациент" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-05.jpg'); ?>>
                            </div>
                        </div>
                    </div>
                    <div class="services__description-content">
                        <div class="services__rating" aria-hidden="true">
                            <svg class="services__rating-stars" width="98" height="17" viewBox="0 0 98 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z" fill="#FF6A09"/>
                                <path d="M28.6835 13.7L24.5335 16.2C24.3502 16.3167 24.1585 16.3667 23.9585 16.35C23.7585 16.3333 23.5835 16.2667 23.4335 16.15C23.2835 16.0333 23.1668 15.8877 23.0835 15.713C23.0002 15.5383 22.9835 15.3423 23.0335 15.125L24.1335 10.4L20.4585 7.225C20.2918 7.075 20.1878 6.904 20.1465 6.712C20.1052 6.52 20.1175 6.33267 20.1835 6.15C20.2495 5.96733 20.3495 5.81733 20.4835 5.7C20.6175 5.58267 20.8008 5.50767 21.0335 5.475L25.8835 5.05L27.7585 0.6C27.8418 0.4 27.9712 0.25 28.1465 0.15C28.3218 0.0499999 28.5008 0 28.6835 0C28.8662 0 29.0452 0.0499999 29.2205 0.15C29.3958 0.25 29.5252 0.4 29.6085 0.6L31.4835 5.05L36.3335 5.475C36.5668 5.50833 36.7502 5.58333 36.8835 5.7C37.0168 5.81667 37.1168 5.96667 37.1835 6.15C37.2502 6.33333 37.2628 6.521 37.2215 6.713C37.1802 6.905 37.0758 7.07567 36.9085 7.225L33.2335 10.4L34.3335 15.125C34.3835 15.3417 34.3668 15.5377 34.2835 15.713C34.2002 15.8883 34.0835 16.034 33.9335 16.15C33.7835 16.266 33.6085 16.3327 33.4085 16.35C33.2085 16.3673 33.0168 16.3173 32.8335 16.2L28.6835 13.7Z" fill="#FF6A09"/>
                                <path d="M48.8061 13.7L44.6561 16.2C44.4727 16.3167 44.2811 16.3667 44.0811 16.35C43.8811 16.3333 43.7061 16.2667 43.5561 16.15C43.4061 16.0333 43.2894 15.8877 43.2061 15.713C43.1227 15.5383 43.1061 15.3423 43.1561 15.125L44.2561 10.4L40.5811 7.225C40.4144 7.075 40.3104 6.904 40.2691 6.712C40.2277 6.52 40.2401 6.33267 40.3061 6.15C40.3721 5.96733 40.4721 5.81733 40.6061 5.7C40.7401 5.58267 40.9234 5.50767 41.1561 5.475L46.0061 5.05L47.8811 0.6C47.9644 0.4 48.0937 0.25 48.2691 0.15C48.4444 0.0499999 48.6234 0 48.8061 0C48.9887 0 49.1677 0.0499999 49.3431 0.15C49.5184 0.25 49.6477 0.4 49.7311 0.6L51.6061 5.05L56.4561 5.475C56.6894 5.50833 56.8727 5.58333 57.0061 5.7C57.1394 5.81667 57.2394 5.96667 57.3061 6.15C57.3727 6.33333 57.3854 6.521 57.3441 6.713C57.3027 6.905 57.1984 7.07567 57.0311 7.225L53.3561 10.4L54.4561 15.125C54.5061 15.3417 54.4894 15.5377 54.4061 15.713C54.3227 15.8883 54.2061 16.034 54.0561 16.15C53.9061 16.266 53.7311 16.3327 53.5311 16.35C53.3311 16.3673 53.1394 16.3173 52.9561 16.2L48.8061 13.7Z" fill="#FF6A09"/>
                                <path d="M68.9287 13.7L64.7787 16.2C64.5953 16.3167 64.4037 16.3667 64.2037 16.35C64.0037 16.3333 63.8287 16.2667 63.6787 16.15C63.5287 16.0333 63.412 15.8877 63.3287 15.713C63.2453 15.5383 63.2287 15.3423 63.2787 15.125L64.3787 10.4L60.7037 7.225C60.537 7.075 60.433 6.904 60.3917 6.712C60.3503 6.52 60.3627 6.33267 60.4287 6.15C60.4947 5.96733 60.5947 5.81733 60.7287 5.7C60.8627 5.58267 61.046 5.50767 61.2787 5.475L66.1287 5.05L68.0037 0.6C68.087 0.4 68.2163 0.25 68.3917 0.15C68.567 0.0499999 68.746 0 68.9287 0C69.1113 0 69.2903 0.0499999 69.4657 0.15C69.641 0.25 69.7703 0.4 69.8537 0.6L71.7287 5.05L76.5787 5.475C76.812 5.50833 76.9953 5.58333 77.1287 5.7C77.262 5.81667 77.362 5.96667 77.4287 6.15C77.4953 6.33333 77.508 6.521 77.4667 6.713C77.4253 6.905 77.321 7.07567 77.1537 7.225L73.4787 10.4L74.5787 15.125C74.6287 15.3417 74.612 15.5377 74.5287 15.713C74.4453 15.8883 74.3287 16.034 74.1787 16.15C74.0287 16.266 73.8537 16.3327 73.6537 16.35C73.4537 16.3673 73.262 16.3173 73.0787 16.2L68.9287 13.7Z" fill="#FF6A09"/>
                                <path d="M89.0513 13.7L84.9013 16.2C84.718 16.3167 84.5263 16.3667 84.3263 16.35C84.1263 16.3333 83.9513 16.2667 83.8013 16.15C83.6513 16.0333 83.5346 15.8877 83.4513 15.713C83.368 15.5383 83.3513 15.3423 83.4013 15.125L84.5013 10.4L80.8263 7.225C80.6596 7.075 80.5556 6.904 80.5143 6.712C80.473 6.52 80.4853 6.33267 80.5513 6.15C80.6173 5.96733 80.7173 5.81733 80.8513 5.7C80.9853 5.58267 81.1686 5.50767 81.4013 5.475L86.2513 5.05L88.1263 0.6C88.2096 0.4 88.339 0.25 88.5143 0.15C88.6896 0.0499999 88.8686 0 89.0513 0C89.234 0 89.413 0.0499999 89.5883 0.15C89.7636 0.25 89.893 0.4 89.9763 0.6L91.8513 5.05L96.7013 5.475C96.9346 5.50833 97.118 5.58333 97.2513 5.7C97.3846 5.81667 97.4846 5.96667 97.5513 6.15C97.618 6.33333 97.6306 6.521 97.5893 6.713C97.548 6.905 97.4436 7.07567 97.2763 7.225L93.6013 10.4L94.7013 15.125C94.7513 15.3417 94.7346 15.5377 94.6513 15.713C94.568 15.8883 94.4513 16.034 94.3013 16.15C94.1513 16.266 93.9763 16.3327 93.7763 16.35C93.5763 16.3673 93.3846 16.3173 93.2013 16.2L89.0513 13.7Z" fill="#FF6A09"/>
                    </svg>
                        </div>
                        <p class="services__description-caption">
                            Более 20 000 улыбок мы подарили нашим клиентам за 26 лет работы
                        </p>
                    </div>
            </div>
        </div>
    </div>

        <div class="services__cards">
            <div class="row">
                <div class="col-sm-12 col-lg-6 services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="1">
                    <div class="services__card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 services__card-header">
                                <div class="services__card-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-06.svg" alt="" loading="lazy" aria-hidden="true">
                    </div>
                        <h3 class="services__card-title" itemprop="name">Бережная имплантация</h3>
                        <p class="services__card-price">От 76 200 тыс.</p>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div>
                </div>
                            <div class="col-sm-12 col-lg-6 services__card-description">
                                <p class="services__card-text">Используем только проверенные имплантаты зубов от ведущих мировых производителей. Возможна установка за одно посещение. Пожизненная гарантия на модели имплантов Nobel (Швейцария) и Impro (Германия). Опытные имплантологи, прошедшие обучение за границей.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на бережную имплантацию">Записаться</button>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--secondary" onclick="openPopup('popup-service-1')" aria-label="Узнать подробнее о бережной имплантации">Подробнее</button>
                            </div>
                        </div>
                    </div>
            </div>

                <div class="col-sm-12 col-lg-6 services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="2">
                    <div class="services__card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 services__card-header">
                                <div class="services__card-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-05.svg" alt="" loading="lazy" aria-hidden="true">
                    </div>
                        <h3 class="services__card-title" itemprop="name">Коронки</h3>
                        <p class="services__card-price">От 25 000 тыс.</p>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div>
                </div>
                            <div class="col-sm-12 col-lg-6 services__card-description">
                                <p class="services__card-text">Коронки изготавливаются из импортных материалов в собственной лаборатории. Быстрое изготовление конструкции — в большинстве случаев всего за 1 день! Мы предлагаем все виды коронок с гарантией до 5 лет.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на коронки">Записаться</button>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--secondary" onclick="openPopup('popup-service-2')" aria-label="Узнать подробнее о коронках">Подробнее</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

            <div class="row">
                <div class="col-sm-12 col-lg-6 services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="3">
                    <div class="services__card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 services__card-header">
                                <div class="services__card-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-01.svg" alt="" loading="lazy" aria-hidden="true">
                        </div>
                        <h3 class="services__card-title" itemprop="name">Виниры</h3>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 services__card-description">
                        <p class="services__card-text">Только у нас виниры, созданные по технологии ведущего мирового специалиста в области реставрации Назария Махайлюка. Полная реставрация всего за 1–2 визита, без дискомфорта.</p>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на виниры">Записаться</button>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--secondary" onclick="openPopup('popup-service-3')" aria-label="Узнать подробнее о винирах">Подробнее</button>
                            </div>
                        </div>
                    </div>
                    </div>

                <div class="col-sm-12 col-lg-6 services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="4">
                    <div class="services__card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 services__card-header">
                                <div class="services__card-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-04.svg" alt="" loading="lazy" aria-hidden="true">
        </div>
                        <h3 class="services__card-title" itemprop="name">Все виды лечения</h3>
                        <p class="services__card-price">От 8 500 тыс.</p>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div>
                        </div>
                            <div class="col-sm-12 col-lg-6 services__card-description">
                                <p class="services__card-text">Все виды лечения зубов без боли с гарантией результата. Мы используем самую современную анестезию, в том числе электронную. Применяем надёжные пломбировочные материалы.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на все виды лечения">Записаться</button>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--secondary" onclick="openPopup('popup-service-4')" aria-label="Узнать подробнее о всех видах лечения">Подробнее</button>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>

            <div class="row">
                <div class="col-sm-12 col-lg-6 services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="5">
                    <div class="services__card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 services__card-header">
                                <div class="services__card-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-03.svg" alt="" loading="lazy" aria-hidden="true">
                        </div>
                        <h3 class="services__card-title" itemprop="name">Отбеливание</h3>
                        <p class="services__card-price">От 18 000 тыс.</p>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div>
                        </div>
                            <div class="col-sm-12 col-lg-6 services__card-description">
                                <p class="services__card-text">Красивые белые зубы без вреда для эмали! Зубы светлее на 7–10 тонов всего за 1 посещение. Эффект сохраняется на 3–5 лет.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на отбеливание">Записаться</button>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--secondary" onclick="openPopup('popup-service-5')" aria-label="Узнать подробнее об отбеливании">Подробнее</button>
                            </div>
                        </div>
                    </div>
    </div>

                <div class="col-sm-12 col-lg-6 services__card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Service">
                    <meta itemprop="position" content="6">
                    <div class="services__card-body">
                        <div class="row">
                            <div class="col-sm-12 col-lg-6 services__card-header">
                                <div class="services__card-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-02.svg" alt="" loading="lazy" aria-hidden="true">
            </div>
                        <h3 class="services__card-title" itemprop="name">Миорелаксация жевательных мышц (TENS-терапия)</h3>
                        <div itemprop="provider" itemscope itemtype="https://schema.org/Organization">
                            <meta itemprop="name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </div>
                            </div>
                            <div class="col-sm-12 col-lg-6 services__card-description">
                        <p class="services__card-text">Безболезненная процедура, которая расслабляет жевательные мышцы и восстанавливает правильное положение челюсти. Подходит при бруксизме, болях, щелчках и напряжении в лице. За 40 минут мягкие импульсы улучшают кровоток, снимают спазмы и восстанавливают симметрию лица.</p>
                </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на миорелаксацию жевательных мышц">Записаться</button>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <button type="button" class="btn btn--secondary" onclick="openPopup('popup-service-6')" aria-label="Узнать подробнее о миорелаксации жевательных мышц">Подробнее</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<!-- Блок плюсов -->
<section class="plus section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 plus__left">
                <div class="plus__header">
                    <div class="plus__title-wrapper">
                        <h2 class="plus__title">Премиум-лечение<br>по адекватной цене</h2>
                    </div>
                </div>

                <div class="plus__cards-grid">
                    <div class="plus__card">
                        <div class="plus__icon">
                            <svg width="74" height="66" viewBox="0 0 74 66" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.7817 4.3284C30.9138 4.3284 30.1197 1.13263 24.2968 1.00245C17.7524 0.856267 12.0546 7.27922 12.0546 14.253C12.0546 17.8715 13.2935 21.1851 15.3459 23.7455C15.6881 24.1724 16.0127 24.5911 16.3185 25.0108C22.5901 27.7338 29.5087 29.2465 36.7817 29.2465C44.0547 29.2465 50.9734 27.7337 57.2449 25.0108C57.5509 24.5911 57.8755 24.1725 58.2177 23.7455C60.2701 21.1851 61.509 17.8716 61.509 14.253C61.509 7.27922 55.8113 0.856267 49.2668 1.00245C43.444 1.13263 42.6496 4.3284 36.7817 4.3284Z" stroke="black" stroke-width="2" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M42.3098 9.51733C40.5866 9.93697 38.8004 10.1467 36.7818 10.1467C34.7632 10.1467 32.977 9.93697 31.2538 9.51733M48.8427 28.2793L44.7021 57.0797C44.0823 61.3911 41.1377 65 36.782 65C32.2905 65 29.4566 61.2183 28.8617 57.0797L24.7211 28.2794M24.4335 35.6699H49.1301M25.4616 42.8206H48.1021M26.4896 49.9713H47.074M27.5443 57.1219H46.0191M12.4487 18.5006C9.65378 17.1202 3.9725 18.1096 1 21.0821M61.1149 18.5006C63.9098 17.1202 69.591 18.1096 72.5636 21.0821" stroke="black" stroke-width="2" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
                        <h3 class="plus__card-title">Оригинальные импланты с пожизненной гарантией</h3>
                        <p class="plus__card-text">Nobel (Швейцария) и Impro (Германия) — никаких подделок и дешёвых аналогов.</p>
        </div>
        
                    <div class="plus__card">
                        <div class="plus__icon">
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
                        <h3 class="plus__card-title">Опытные врачи</h3>
                        <p class="plus__card-text">Более 20 000 установленных имплантов, регулярное обучение в Европе и Москве.</p>
        </div>
        
                    <div class="plus__card">
                        <div class="plus__icon">
                            <svg width="74" height="66" viewBox="0 0 74 66" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.7817 4.3284C30.9138 4.3284 30.1197 1.13263 24.2968 1.00245C17.7524 0.856267 12.0546 7.27922 12.0546 14.253C12.0546 17.8715 13.2935 21.1851 15.3459 23.7455C15.6881 24.1724 16.0127 24.5911 16.3185 25.0108C22.5901 27.7338 29.5087 29.2465 36.7817 29.2465C44.0547 29.2465 50.9734 27.7337 57.2449 25.0108C57.5509 24.5911 57.8755 24.1725 58.2177 23.7455C60.2701 21.1851 61.509 17.8716 61.509 14.253C61.509 7.27922 55.8113 0.856267 49.2668 1.00245C43.444 1.13263 42.6496 4.3284 36.7817 4.3284Z" stroke="black" stroke-width="2" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M42.3098 9.51733C40.5866 9.93697 38.8004 10.1467 36.7818 10.1467C34.7632 10.1467 32.977 9.93697 31.2538 9.51733M48.8427 28.2793L44.7021 57.0797C44.0823 61.3911 41.1377 65 36.782 65C32.2905 65 29.4566 61.2183 28.8617 57.0797L24.7211 28.2794M24.4335 35.6699H49.1301M25.4616 42.8206H48.1021M26.4896 49.9713H47.074M27.5443 57.1219H46.0191M12.4487 18.5006C9.65378 17.1202 3.9725 18.1096 1 21.0821M61.1149 18.5006C63.9098 17.1202 69.591 18.1096 72.5636 21.0821" stroke="black" stroke-width="2" stroke-miterlimit="22.9256" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
                        <h3 class="plus__card-title">Оригинальные импланты с пожизненной гарантией</h3>
                        <p class="plus__card-text">Nobel (Швейцария) и Impro (Германия) — никаких подделок и дешёвых аналогов.</p>
        </div>
        
                    <div class="plus__card">
                        <div class="plus__icon">
                            <svg width="66" height="66" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M57.8829 34.365V16.1256C57.8829 14.6744 58.4714 13.3596 59.423 12.4093C60.3747 11.4576 61.6881 10.8691 63.1394 10.8691C64.167 10.8691 65.0002 11.7023 65.0002 12.7299V37.4646C65.0002 38.4548 64.7091 39.4232 64.1644 40.2486L62.9514 42.0862M49.5951 65C49.7911 62.9403 50.4898 60.9603 51.6297 59.2336L60.4674 45.8477" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M35.3201 65C35.2649 63.4151 34.8823 61.8588 34.1964 60.4289C33.409 58.7872 33.0002 56.9897 33.0003 55.169C33.0003 53.5632 33.3182 51.9734 33.9359 50.4911C34.5535 49.0089 35.4586 47.6636 36.5988 46.533L51.5359 31.7218C52.9857 30.2843 55.3224 30.2818 56.7753 31.7159C58.2025 33.1247 58.2581 35.4105 56.9011 36.887L46.4131 48.2996M1.00012 25.3934V37.4646C1.00012 38.4548 1.29115 39.4232 1.83586 40.2486L10.2125 52.9353M1.00012 20.8864V12.7299C1.00012 11.7023 1.83328 10.8691 2.86089 10.8691C4.31216 10.8691 5.62564 11.4576 6.57727 12.4093C7.5289 13.3596 8.11739 14.6744 8.11739 16.1256V34.365M12.6965 56.6981L14.3706 59.2336C15.5105 60.9603 16.2091 62.9403 16.4052 65" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M30.6801 65C30.7354 63.4151 31.1179 61.8587 31.8038 60.4288C32.5912 58.7872 33 56.9897 32.9999 55.169C33 53.5632 32.682 51.9733 32.0643 50.4911C31.4467 49.0088 30.5417 47.6636 29.4014 46.533L14.4643 31.7219C13.0146 30.2844 10.6779 30.2819 9.22491 31.716C7.79772 33.1248 7.74209 35.4106 9.0991 36.8871L19.5871 48.2997" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M44.6914 27.4435V21.6294C44.6914 19.0758 42.8628 16.8893 40.3505 16.436L35.9155 15.6363C35.412 16.9858 34.2054 17.6593 33.0001 17.6593C31.7948 17.6593 30.5882 16.9858 30.0847 15.6363L25.6498 16.436C23.1374 16.8893 21.3088 19.0758 21.3088 21.6294V37.5451C21.3088 38.8225 22.3444 39.8581 23.6219 39.8581C24.8993 39.8581 25.9349 38.8225 25.9349 37.5449L25.9347 24.4715M44.6914 38.3686V31.9505M33.0001 38.3679V55.1691M35.9157 15.6357L35.5726 12.8347M30.0846 15.6358L30.4191 12.904M31.576 13.408C32.0201 13.627 32.5085 13.7411 33.0037 13.7413C33.4988 13.7416 33.9874 13.628 34.4317 13.4094C36.4655 12.4087 37.8385 10.4273 38.0629 8.16878L38.203 6.75859C38.5094 3.67693 36.0909 1.00155 32.9975 1C29.9042 0.998455 27.4885 3.67126 27.7978 6.75318L27.9393 8.16363C28.0508 9.27452 28.4431 10.3388 29.0793 11.2562C29.7155 12.1737 30.5747 12.9142 31.576 13.408Z" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21.3088 27.4429V37.545C21.3088 38.8224 22.3444 39.858 23.6219 39.858C24.8993 39.858 25.9349 38.8224 25.9349 37.5448L25.9347 24.4714M44.6914 31.9506L44.6915 37.5451C44.6915 38.8225 43.6559 39.8581 42.3785 39.8581C41.1011 39.8581 40.0655 38.8225 40.0655 37.545L40.0656 24.4716" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
                        <h3 class="plus__card-title">Куратор рядом</h3>
                        <p class="plus__card-text">Вы не одни: вас сопровождает специалист, который отвечает на все вопросы - до полного завершения лечения.</p>
        </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 plus__right">
                <div class="plus__card plus__card--featured">
                    <div class="plus__card-content">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/implant-plus-bg.png" alt="" class="plus__card-featured-bg" aria-hidden="true" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/implant-plus-bg.png'); ?>>
                        <h3 class="plus__card-title plus__card--featured-title">Имплантация<br>за 1 день</h3>
                        <p class="plus__card-text plus__card--featured-text">Без боли, с временной коронкой сразу. Благодаря нашей цифровой лаборатории вы уходите домой уже с зубом.</p>
                    </div>
                    <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Хочу зубы за один день">Хочу зубы за один день</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок доверия -->
<section class="trust section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-4 trust__left">
                <div class="trust__icon">
                    <div class="trust__icon-main"></div>
                    <div class="trust__icon-arrow"></div>
                </div>
                <h2 class="trust__title">
                    Нам доверяют<br>
                    <span class="trust__title-span">потому что <span class="trust__highlight">у нас безопасно</span></span>
                </h2>
            </div>

            <div class="col-sm-12 col-lg-4 trust__center">
                <div class="trust__video-wrapper">
                    <video 
                        class="trust__video" 
                        playsinline
                        muted
                        preload="auto"
                        aria-hidden="true"
                    >
                        <source src="<?php echo get_stylesheet_directory_uri(); ?>/assets/videos/implantaciya-video-01.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

            <div class="col-sm-12 col-lg-4 trust__right">
                <div class="trust__card">
                    <h3 class="trust__card-title">Абсолютная стерильность</h3>
                    <p class="trust__card-text">Ваше здоровье под полной защитой — каждый инструмент проходит централизованную стерилизацию и строгий контроль.</p>
                </div>
                <div class="trust__card">
                    <h3 class="trust__card-title">Биотехнология APRF</h3>
                    <p class="trust__card-text">Ваше заживление проходит быстрее и комфортнее: снижается риск отторжения и ускоряется восстановление тканей.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок гарантий -->
<section class="guarantees section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 guarantees__left">
                <div class="guarantees__row">
                    <div class="guarantees__header">
                        <h2 class="guarantees__title">Мы отвечаем за свою работу и даём официальные гарантии</h2>
                        <p class="guarantees__subtitle">Все гарантии прописаны в договоре — вы защищены документально.</p>
                    </div>
                    <div class="guarantees__items-list">
                            <div class="guarantees__item">
                                <p class="guarantees__text"><strong>Работа врача</strong><span>— гарантия 1 год</span></p>
                            </div>

                            <div class="guarantees__item">
                                <p class="guarantees__text"><strong>Импланты Implantium (Корея)</strong><span>— 5 лет гарантии</span></p>
                            </div>

                            <div class="guarantees__item">
                                <p class="guarantees__text"><strong>Импланты Nobel (Швейцария)</strong><span>— пожизненная гарантия</span></p>
                            </div>

                            <div class="guarantees__item">
                                <p class="guarantees__text"><strong>Импланты Impro (Германия)</strong><span>— пожизненная гарантия</span></p>
                            </div>
                    </div>
                </div>

                <div class="guarantees__row">
                    <div class="guarantees__additional-title">
                        <h4>Дополнительно</h4>
                        <div class="services__circles circle-group">
                            <div class="services__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-plus.jpg" alt="Довольная пациентка" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-plus.jpg'); ?>>
                            </div>
                            <div class="services__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-09.jpg" alt="Довольная пациентка" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-09.jpg'); ?>>
                            </div>
                        </div>
                    </div>
                    <div class="guarantees__additional-items">
                            <div class="guarantees__additional-item">
                                <div class="guarantees__additional-icon" aria-hidden="true">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/chk-3.svg" alt="" loading="lazy">
                                </div>
                                <p class="guarantees__additional-text">Только сертифицированные импланты.</p>
                            </div>
                            <div class="guarantees__additional-item">
                                <div class="guarantees__additional-icon" aria-hidden="true">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/chk-3.svg" alt="" loading="lazy">
                                </div>
                                <p class="guarantees__additional-text">Честная цена с первой консультации.</p>
                            </div>
                            <div class="guarantees__additional-item">
                                <div class="guarantees__additional-icon" aria-hidden="true">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/chk-3.svg" alt="" loading="lazy">
                                </div>
                                <p class="guarantees__additional-text">Налоговый вычет</p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-4 guarantees__right">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/question.svg" alt="" class="guarantees__right-icon" aria-hidden="true" loading="lazy">
                <h3 class="guarantees__right-title">Почему гарантия на работу врача — 1 год?</h3>
                <p class="guarantees__right-text">Год — это объективный срок, в течение которого можно оценить результат лечения.</p>
                <p class="guarantees__right-text">Далее многое зависит от самого пациента: здоровье, гигиена, хронические болезни и соблюдение рекомендаций.</p>
                <p class="guarantees__right-text">Бессрочная гарантия — это миф. Мы даём честную и обоснованную гарантию. И даже когда срок заканчивается, мы всегда остаёмся рядом, открыты к вашим вопросам и готовы помочь в любой ситуации.</p>
                <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на консультацию">Записаться на консультацию</button>
            </div>
        </div>
    </div>
</section>

<section class="section works" aria-labelledby="works-title">
    <div class="container">
        <div class="row works__head">
            <div class="col-sm-12 col-lg-8 works__head-main">
                <h2 id="works-title" class="works__title">
                    Посмотрите, как мы
                    возвращаем людям улыбку и
                уверенность
                </h2>
            </div>
            <div class="col-sm-12 col-lg-4 works__head-aside">
                    <div class="services__circles circle-group">
                        <div class="services__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-02.jpg" alt="Довольная пациентка" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-02.jpg'); ?>>
                            </div>
                        <div class="services__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-04.jpg" alt="Довольная пациентка" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-04.jpg'); ?>>
                            </div>
                        <div class="services__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-10.jpg" alt="Довольный пациент" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-10.jpg'); ?>>
                            </div>
                        </div>
                <p class="works__subtitle">
                    Настоящие истории наших пациентов. Эти результаты достигнуты у нас, в клинике ЦЭСИ.
                </p>
            </div>
        </div>

        <div class="works__slider" data-slider="works" aria-roledescription="carousel" aria-label="Наши работы">
            <div class="row works__list">
                <div class="col-sm-12 col-lg-4 works__col">
                    <article class="works__card">
                        <div class="works__media">
                            <img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/be-after01.jpg"
                                alt="Улыбка для свадьбы - результат"
                                loading="lazy"
                            >
                        </div>
                        <div class="works__content">
                            <h3 class="works__card-title">Улыбка для свадьбы</h3>
                            <p class="works__card-text">
                                Виктория, 32 года, п. Палана. Перед свадьбой прилетела к нам, чтобы быть безупречной в важный день. В ЦЭСИ выполнили: костную пластику верхней челюсти; установку имплантов Impro (Германия); полное лечение своих зубов; протезирование коронками из диоксида циркония.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-sm-12 col-lg-4 works__col">
                    <article class="works__card">
                        <div class="works__media">
                            <img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/be-after02.jpg"
                                alt="Перерождение улыбки - результат"
                                loading="lazy"
                            >
                        </div>
                        <div class="works__content">
                            <h3 class="works__card-title">Перерождение улыбки</h3>
                            <p class="works__card-text">
                                Комплексное лечение: импланты, виниры и коронки. Работали Моисеев К.Н. и Ларин К.Е. Результат — естественная и надёжная улыбка.
                            </p>
                        </div>
                    </article>
                </div>

                <div class="col-sm-12 col-lg-4 works__col">
                    <article class="works__card">
                        <div class="works__media">
                            <img
                                src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/be-after03.jpg"
                                alt="Новая улыбка — новая уверенность - результат"
                                loading="lazy"
                            >
                        </div>
                        <div class="works__content">
                            <h3 class="works__card-title">Новая улыбка — новая уверенность</h3>
                            <p class="works__card-text">
                                Зубы пролечены под микроскопом. Установлены импланты. Установлены коронки из циркония. Результат — восстановлены здоровье и эстетика, пациент снова улыбается без стеснения.
                            </p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="row works__pagination-row">
                <div class="col-sm-12 col-lg-12">
                    <div class="works__pagination" aria-label="Пагинация слайдера по работам">
                        <button class="works__dot" type="button" aria-label="Слайд 1" aria-current="true" data-slider-dot="1"></button>
                        <button class="works__dot" type="button" aria-label="Слайд 2" data-slider-dot="2"></button>
                        <button class="works__dot" type="button" aria-label="Слайд 3" data-slider-dot="3"></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row works__cta-row">
            <div class="col-sm-12 col-lg-12">
                <button
                    type="button"
                    class="btn btn--primary works__cta-button"
                    onclick="openPopup()"
                >
                    Я хочу также
                </button>
            </div>
        </div>
    </div>
</section>

<section class="section reviews" aria-labelledby="reviews-title">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 reviews__left">
                <div class="reviews__header">
                    <h2 id="reviews-title" class="reviews__title">
                        Что говорят пациенты<br>
                        после лечения
                    </h2>
                    <p class="reviews__caption">Более 20 000 улыбок мы подарили нашим клиентам за 26 лет работы</p>
                </div>
                
                <div class="ratings__list">
                    <div class="ratings__col">
                        <article class="ratings__card">
                            <div class="ratings__icon ratings__icon--ya"></div>
                            <div class="ratings__info">
                                <div class="ratings__number">4.9</div>
                                <div class="ratings__stars">
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="ratings__col">
                        <article class="ratings__card">
                            <div class="ratings__icon ratings__icon--google"></div>
                            <div class="ratings__info">
                                <div class="ratings__number">4.5</div>
                                <div class="ratings__stars">
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--half" aria-label="Половина звезды" aria-hidden="true">★</span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="ratings__col">
                        <article class="ratings__card">
                            <div class="ratings__icon ratings__icon--2gis"></div>
                            <div class="ratings__info">
                                <div class="ratings__number">4.8</div>
                                <div class="ratings__stars">
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="ratings__col">
                        <article class="ratings__card">
                            <div class="ratings__icon ratings__icon--prodoctorov"></div>
                            <div class="ratings__info">
                                <div class="ratings__number">4.9</div>
                                <div class="ratings__stars">
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                    <span class="ratings__star ratings__star--filled" aria-label="Звезда" aria-hidden="true">★</span>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-4 reviews__right">
                <div class="reviews__slider-wrapper">
                    <div class="reviews__slider" data-slider="reviews" aria-roledescription="carousel" aria-label="Отзывы пациентов">
                        <div class="reviews__track">
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
                                <article class="reviews__card" itemscope itemtype="https://schema.org/Review">
                                    <div class="reviews__header">
                                        <div class="reviews__photo">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('thumbnail', array('itemprop' => 'image', 'loading' => 'lazy', 'alt' => $reviewer_name ? esc_attr($reviewer_name) : '')); ?>
                                            <?php else : ?>
                                                <div class="reviews__photo-placeholder" aria-hidden="true">👤</div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <?php if ($video_url) : ?>
                                            <button 
                                                class="reviews__video-btn" 
                                                type="button"
                                                data-video="<?php echo esc_attr($video_url); ?>"
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
                                    
                                    <div class="reviews__content">
                                        <div class="reviews__text" itemprop="reviewBody">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="reviews__author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                            <span class="reviews__name" itemprop="name">
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
                                <article class="reviews__card">
                                    <div class="reviews__header">
                                        <div class="reviews__photo">
                                            <div class="reviews__photo-placeholder" aria-hidden="true">👤</div>
                                        </div>
                                    </div>
                                    <div class="reviews__content">
                                        <div class="reviews__text">
                                            Отзывы загружаются...
                                        </div>
                                        <div class="reviews__author">
                                            <span class="reviews__name">Загрузка</span>
                                        </div>
                                    </div>
                                </article>
                            <?php endif; ?>
                        </div>
                        
                        <div class="reviews__pagination" aria-label="Пагинация слайдера отзывов"></div>
                    </div>
                    
                    <div class="reviews__nav slider-nav">
                        <button 
                            class="slider-arrow left" 
                            type="button"
                            data-slider-nav="prev"
                            aria-label="Предыдущий отзыв"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M19 12H5M11 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button 
                            class="slider-arrow right" 
                            type="button"
                            data-slider-nav="next"
                            aria-label="Следующий отзыв"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M5 12h14M13 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section doctors">
    <div class="container">
        <div class="row doctors__info">
            <div class="col-sm-12 col-lg-4 doctors__title-col">
                <h2 class="doctors__title">
                    Лучшие
                специалисты
                    Камчатки в одной
                    клинике
                </h2>
            </div>

            <div class="col-sm-12 col-lg-4 doctors__info-col">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-05.svg" alt="" class="doctors__info-icon" aria-hidden="true">
                <p class="doctors__info-text">Каждый врач клиники — специалист с опытом от 7 до 22 лет, прошедший обучение у основателей современной имплантологии в Европе и Москве. За годы практики команда получила более 70 наград и сертификатов — от Германии до Кореи</p>
            </div>

            <div class="col-sm-12 col-lg-4 doctors__info-col">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-06.svg" alt="" class="doctors__info-icon" aria-hidden="true">
                <p class="doctors__info-text">С вами работают сразу несколько специалистов — хирург, ортопед и куратор, а не один врач на всё, чтобы каждое решение было более точным и взвешенным.</p>
            </div>
        </div>

        <div class="row doctors__slider-row">
            <div class="col-sm-12 col-lg-12">
                <div class="doctors__slider-wrapper">
                    <div class="doctors__slider" data-slider="doctors" aria-roledescription="carousel" aria-label="Наши врачи">
                        <div class="doctors__slider-track">
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
                            <article class="doctors__card" itemscope itemtype="https://schema.org/Person">
                                <div class="doctors__photo">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('doctor-medium', array('itemprop' => 'image', 'loading' => 'lazy', 'alt' => $doctor_fio ? esc_attr($doctor_fio) : 'Фото врача')); ?>
                                    <?php else : ?>
                                        <div class="doctors__photo-placeholder" aria-hidden="true">👨‍⚕️</div>
                                    <?php endif; ?>
                                </div>

                                <div class="doctors__card-info">
                                    <h3 class="doctors__name" itemprop="name">
                                        <?php echo esc_html($doctor_fio ?: get_the_title()); ?>
                                    </h3>
                                    <div class="doctors__position" itemprop="jobTitle">
                                        <?php echo esc_html($doctor_position); ?>
                                    </div>
                                    <div class="doctors__experience">
                                        <span>Опыт работы: <?php echo esc_html($doctor_experience); ?> лет</span>
                                    </div>
                                </div>
                                <?php if ($doctor_video) : ?>
                                    <button 
                                        class="doctors__video-btn" 
                                        type="button"
                                        data-video="<?php echo esc_attr($doctor_video); ?>"
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
                            </article>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        else :
                        ?>
                            <article class="doctors__card">
                                <div class="doctors__photo">
                                    <div class="doctors__photo-placeholder" aria-hidden="true">👨‍⚕️</div>
                                </div>
                                <div class="doctors__card-info">
                                    <h3 class="doctors__name">Загрузка...</h3>
                                    <div class="doctors__position">Должность</div>
                                    <div class="doctors__experience"><span>Опыт работы</span></div>
                                </div>
                            </article>
                        <?php endif; ?>
                        </div>

                        <div class="doctors__pagination" aria-label="Пагинация слайдера врачей"></div>
                    </div>

                    <div class="doctors__nav slider-nav">
                        <button 
                            id="doctors-prev" 
                            class="slider-arrow left" 
                            type="button"
                            data-slider-nav="prev"
                            aria-label="Предыдущий врач"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M19 12H5M11 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <button 
                            id="doctors-next" 
                            class="slider-arrow right" 
                            type="button"
                            data-slider-nav="next"
                            aria-label="Следующий врач"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M5 12h14M13 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section doctor-selection">
    <div class="container">
        <div class="row doctor-selection__container">
            <div class="col-sm-12 col-lg-4 doctor-selection__left">
                <h2 class="doctor-selection__title">Важно помнить:</h2>
            </div>

            <div class="col-sm-12 col-lg-8 doctor-selection__right">
                <p class="doctor-selection__text">Неправильный выбор врача может стоить вам времени, денег — и повторного лечения. Расскажите о своей ситуации — мы подберём проверенного специалиста и покажем похожие успешные кейсы.</p>
                <button type="button" class="btn btn--primary doctor-selection__button" onclick="openPopup()">Подобрать врача</button>
            </div>
        </div>
    </div>
</section>

<section class="section implant-types" itemscope itemtype="https://schema.org/ItemList">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 implant-types__title-col">
                <h2 class="implant-types__title">Подберём подходящий метод имплантации именно для вас</h2>
            </div>
            <div class="col-sm-12 col-lg-4 implant-types__desc-col">
                <p class="implant-types__description">Мы не используем один протокол для всех. Мы подбираем подход в зависимости от вашей анатомии, целей и бюджета:</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 implant-types__tabs-container">
                <div class="implant-types__tabs" id="tabs-underline">
                    <div class="implant-types__tablist" role="tablist" aria-label="Виды имплантации">
                        <button class="implant-types__tab implant-types__tab--active" role="tab" aria-selected="true" aria-controls="p1" id="t1">Одномоментная</button>
                        <button class="implant-types__tab" role="tab" aria-selected="false" aria-controls="p2" id="t2">Классическая</button>
                        <button class="implant-types__tab" role="tab" aria-selected="false" aria-controls="p3" id="t3">All-on-4</button>
                        <button class="implant-types__tab" role="tab" aria-selected="false" aria-controls="p4" id="t4">All-on-6</button>
                        <span class="implant-types__slider" aria-hidden="true"></span>
                    </div>

                    <section id="p1" class="implant-types__panel implant-types__panel--active" role="tabpanel" aria-labelledby="t1" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="1">
                        <div class="implant-types__photo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/odnomoment.jpg" alt="Одномоментная имплантация" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/odnomoment.jpg'); ?>>
                        </div>
                        <div class="implant-types__content">
                            <div class="implant-types__text-block">
                                <h3 class="implant-types__panel-title" itemprop="name">Одномоментная имплантация</h3>
                                <p itemprop="description">Это самый быстрый способ восстановления зуба: удаление и установка импланта выполняются за один визит. В некоторых случаях врач сразу фиксирует временную коронку, чтобы вы могли улыбаться и общаться без ограничений. Метод подходит не всем, но когда условия позволяют — результат особенно удобен для пациента.</p>
                            </div>
                            <div class="implant-types__items">
                                <div class="implant-types__item">
                                    <div class="implant-types__item-icon" aria-hidden="true">
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
                                <div class="implant-types__item">
                                    <div class="implant-types__item-icon" aria-hidden="true">
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

                    <section id="p2" class="implant-types__panel" role="tabpanel" aria-labelledby="t2" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="2">
                        <div class="implant-types__photo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/classik.jpg" alt="Классическая имплантация" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/classik.jpg'); ?>>
                        </div>
                        <div class="implant-types__content">
                            <div class="implant-types__text-block">
                                <h3 class="implant-types__panel-title" itemprop="name">Классическая имплантация</h3>
                                <p itemprop="description">Проверенный и максимально предсказуемый метод, при котором имплант устанавливается в несколько этапов. На приживление отводится 3–6 месяцев, благодаря чему результат стабилен и долгосрочен. Чаще всего этот вариант выбирают при сложных случаях, когда нужен максимально надёжный подход.</p>
                            </div>
                            <div class="implant-types__items">
                                <div class="implant-types__item">
                                    <div class="implant-types__item-icon" aria-hidden="true">
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
                                <div class="implant-types__item">
                                    <div class="implant-types__item-icon" aria-hidden="true">
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

                    <section id="p3" class="implant-types__panel" role="tabpanel" aria-labelledby="t3" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="3">
                        <div class="implant-types__photo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/four.jpg" alt="All-on-4 имплантация" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/four.jpg'); ?>>
                        </div>
                        <div class="implant-types__content">
                            <div class="implant-types__text-block">
                                <h3 class="implant-types__panel-title" itemprop="name">All-on-4</h3>
                                <p itemprop="description">Современная методика восстановления целого зубного ряда на четырёх имплантах. Два из них устанавливаются под углом, что позволяет обойтись без костной пластики в большинстве случаев. Временный несъёмный протез фиксируется уже через несколько дней, возвращая улыбку и возможность нормально жевать.</p>
                            </div>
                            <div class="implant-types__items">
                                <div class="implant-types__item">
                                    <div class="implant-types__item-icon" aria-hidden="true">
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
                                <div class="implant-types__item">
                                    <div class="implant-types__item-icon" aria-hidden="true">
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

                    <section id="p4" class="implant-types__panel" role="tabpanel" aria-labelledby="t4" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <meta itemprop="position" content="4">
                        <div class="implant-types__photo">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/six.jpg" alt="All-on-6 имплантация" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/six.jpg'); ?>>
                        </div>
                        <div class="implant-types__content">
                            <div class="implant-types__text-block">
                                <h3 class="implant-types__panel-title" itemprop="name">All-on-6</h3>
                                <p itemprop="description">Усиленный вариант методики: шесть имплантов распределяют нагрузку равномернее, обеспечивая ещё большую надёжность. Такой подход используется при выраженных жевательных нагрузках и сложных клинических ситуациях. Методика считается «золотым стандартом» для пациентов, которым важно максимально долгосрочное решение.</p>
                            </div>
                            <div class="implant-types__items">
                                <div class="implant-types__item">
                                    <div class="implant-types__item-icon" aria-hidden="true">
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
                                <div class="implant-types__item">
                                    <div class="implant-types__item-icon" aria-hidden="true">
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

<section class="section implants" itemscope itemtype="https://schema.org/ItemList">
    <div class="container">
        <div class="row implants__head">
            <div class="col-sm-12 col-lg-8 implants__title-col">
                <h2 class="implants__title">Выберите подходящий пакет без скрытых платежей:</h2>
            </div>
            <div class="col-sm-12 col-lg-4 implants__desc-col">
                <div class="implants__circles circle-group">
                    <div class="implants__circle circle">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/imp-type-01.jpg" alt="Тип импланта 1" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/imp-type-01.jpg'); ?>>
                    </div>
                    <div class="implants__circle circle">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/imp-type-02.jpg" alt="Тип импланта 2" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/imp-type-02.jpg'); ?>>
                    </div>
                </div>
                <p class="implants__subtitle">Мы используем только проверенные импланты от ведущих производителей с гарантией качества и приживаемости.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 implants__slider-wrapper">
                <div class="implants__slider" data-slider="implants">
            <div class="col-sm-12 col-lg-4 implants__col" itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer">
                <meta itemprop="position" content="1">
                <article class="implants__card">
                    <div class="implants__card-header">
                        <div class="implants__brand-info">
                            <h3 class="implants__tariff-name">Стандарт</h3>
                            <div class="implants__brand-name" itemprop="name">Implantium</div>
                            <div class="implants__brand-origin">Южная Корея</div>
                        </div>
                        <div class="implants__price-box">
                            <div class="implants__old-price">91 800 ₽</div>
                            <div class="implants__current-price" itemprop="price" content="76200">76 200 ₽</div>
                            <meta itemprop="priceCurrency" content="RUB">
                        </div>
                    </div>

                    <div class="implants__card-details">
                        <div class="implants__details-section">
                            <h4 class="implants__details-title">В стоимость включено:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>Имплант Implantium (Южная Корея)</li>
                                <li>Циркониевая коронка</li>
                                <li>Хирургический этап + анестезия</li>
                                <li>Ортопедический этап (через 3-4 месяца)</li>
                                <li>Бесплатные контрольные осмотры</li>
                                <li>Персональный куратор</li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <h4 class="implants__details-title">Оплата:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>1 этап (хирургия) ~ <strong>45 200 ₽</strong></li>
                                <li>2 этап (ортопедия) ~ <strong>31 000 ₽</strong></li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <h4 class="implants__details-title">Гарантии:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>На имплант 5 лет</li>
                                <li>На работу доктора 1 год</li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <p class="implants__details-note">* КТ оплачивается отдельно</p>
                        </div>
                    </div>

                    <button type="button" class="btn btn--primary implants__card-button" onclick="openPopup()">Выбрать комфорт</button>
                    <div class="implants__savings-text">Экономия 15 600 ₽ при записи сегодня</div>
                </article>
            </div>

            <div class="col-sm-12 col-lg-4 implants__col" itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer">
                <meta itemprop="position" content="2">
                <article class="implants__card">
                    <div class="implants__card-header">
                        <div class="implants__brand-info">
                            <h3 class="implants__tariff-name">Оптимальный</h3>
                            <div class="implants__brand-name" itemprop="name">Impro</div>
                            <div class="implants__brand-origin">Германия</div>
                        </div>
                        <div class="implants__price-box">
                            <div class="implants__old-price">105 200 ₽</div>
                            <div class="implants__current-price" itemprop="price" content="85200">85 200 ₽</div>
                            <meta itemprop="priceCurrency" content="RUB">
                        </div>
                    </div>

                    <div class="implants__recommendation-badge">
                        <span class="implants__heart-icon" aria-hidden="true">❤</span>
                        ЦЭСИ РЕКОМЕНДУЕТ
                    </div>

                    <div class="implants__card-details">
                        <div class="implants__details-section">
                            <h4 class="implants__details-title">В стоимость включено:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>Пожизненная гарантия на имплант</li>
                                <li>Циркониевая коронка</li>
                                <li>Хирургический этап: установка импланта + анестезия</li>
                                <li>Ортопедический этап: коронка на импланте (через 3–4 месяца)+ сканирование</li>
                                <li>Бесплатные контрольные осмотры</li>
                                <li>Персональный куратор</li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <h4 class="implants__details-title">Оплата:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>1 этап (хирургия) ~ <strong>54 200 ₽</strong></li>
                                <li>2 этап (ортопедия) ~ <strong>31 000 ₽</strong></li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <h4 class="implants__details-title">Гарантии:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>На имплант пожизненная</li>
                                <li>На работу доктора 1 год</li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <p class="implants__details-note">* КТ оплачивается отдельно</p>
                        </div>
                    </div>

                    <button type="button" class="btn btn--primary implants__card-button" onclick="openPopup()">Выбрать оптимальный</button>
                    <div class="implants__savings-text">Экономия до 20 000 ₽ при записи сегодня</div>
                </article>
            </div>

            <div class="col-sm-12 col-lg-4 implants__col" itemprop="itemListElement" itemscope itemtype="https://schema.org/Offer">
                <meta itemprop="position" content="3">
                <article class="implants__card">
                    <div class="implants__card-header">
                        <div class="implants__brand-info">
                            <h3 class="implants__tariff-name">Премиум</h3>
                            <div class="implants__brand-name" itemprop="name">Nobel Biocare</div>
                            <div class="implants__brand-origin">Швейцария</div>
                        </div>
                        <div class="implants__price-box">
                            <div class="implants__old-price">117 000 ₽</div>
                            <div class="implants__current-price" itemprop="price" content="101200">101 200 ₽</div>
                            <meta itemprop="priceCurrency" content="RUB">
                        </div>
                    </div>

                    <div class="implants__card-details">
                        <div class="implants__details-section">
                            <h4 class="implants__details-title">В стоимость включено:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>Имплант Nobel Biocare — №1 в мире</li>
                                <li>Коронка из диоксида циркония</li>
                                <li>Хирургический этап: установка импланта + анестезия</li>
                                <li>Ортопедический этап: коронка на импланте (через 3–4 месяца)+ сканирование</li>
                                <li>Бесплатные контрольные осмотры</li>
                                <li>Персональный куратор</li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <h4 class="implants__details-title">Оплата:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>1 этап (хирургия) ~ <strong>70 200 ₽</strong></li>
                                <li>2 этап (ортопедия) ~ <strong>31 000 ₽</strong></li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <h4 class="implants__details-title">Гарантии:</h4>
                            <ul class="implants__details-list" role="list">
                                <li>На имплант пожизненная</li>
                                <li>На работу доктора 1 год</li>
                            </ul>
                        </div>

                        <div class="implants__details-section">
                            <p class="implants__details-note">* КТ оплачивается отдельно</p>
                        </div>
                    </div>

                    <button type="button" class="btn btn--primary implants__card-button" onclick="openPopup()">Выбрать премиум</button>
                    <div class="implants__savings-text">Экономия до 16 000 ₽ при записи сегодня</div>
                </article>
            </div>
                </div>
            </div>
        </div>

        <div class="row implants__pagination-row">
            <div class="col-12">
                <div class="implants__pagination" role="tablist" aria-label="Пагинация имплантов">
                    <button type="button" class="implants__dot" data-slider-dot aria-label="Слайд 1" aria-current="true"></button>
                    <button type="button" class="implants__dot" data-slider-dot aria-label="Слайд 2"></button>
                    <button type="button" class="implants__dot" data-slider-dot aria-label="Слайд 3"></button>
                </div>
            </div>
        </div>

        <div class="row implants__bonus">
            <div class="col-sm-12 col-lg-4 implants__bonus-left">
                <h3 class="implants__bonus-title">Дополнительные бонусы для всех пакетов</h3>
            </div>
            <div class="col-sm-12 col-lg-8 implants__bonus-right">
                <div class="implants__bonus-cards">
                    <div class="implants__bonus-card">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/white-chk.svg" alt="" class="implants__bonus-check" aria-hidden="true">
                        <h4 class="implants__bonus-card-title">Бесплатная консультация</h4>
                    </div>
                    <div class="implants__bonus-card">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/white-chk.svg" alt="" class="implants__bonus-check" aria-hidden="true">
                        <h4 class="implants__bonus-card-title">Налоговый вычет</h4>
                    </div>
                    <div class="implants__bonus-card">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/white-chk.svg" alt="" class="implants__bonus-check" aria-hidden="true">
                        <h4 class="implants__bonus-card-title">Полное сопровождение до результата</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок с ценами -->
<section class="section prices">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="prices__content">
                    <div class="prices__header">
                        <h2>Нашли дешевле?</h2>
                        <p class="prices__subtitle">Не спешите – разберитесь, за что вы платите</p>
                    </div>
                    
                    <div class="prices__description">
                        <div class="prices__circles circle-group">
                            <div class="prices__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-07.jpg" alt="Лицо"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-07.jpg'); ?>>
                            </div>
                            <div class="prices__circle circle">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/circle-ex.svg" alt="" aria-hidden="true">
                            </div>
                        </div>
                        <p>Многие клиники занижают цену на старте и добавляют скрытые платежи позже. В ЦЭСИ стоимость лечения прозрачна с самого начала и не меняется по ходу работы.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-4">
                <div class="prices__image">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/price-bg.jpg" alt="Цены на имплантацию" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/price-bg.jpg'); ?>>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-4">
                <div class="prices__cards">
                    <article class="prices__card">
                        <svg class="prices__icon" width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_prices_1)">
                                <path d="M7.5 15.5L0 8L2.5 5.5L7.5 10.5L17.5 0.5L20 3" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_prices_1">
                                    <rect width="20" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <h3>Качество важнее скидок</h3>
                        <p>Мы не используем дешёвые аналоги и «одноразовые» материалы. В работе только сертифицированные импланты и современное оборудование.</p>
                    </article>
                    
                    <article class="prices__card">
                        <svg class="prices__icon" width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_prices_2)">
                                <path d="M7.5 15.5L0 8L2.5 5.5L7.5 10.5L17.5 0.5L20 3" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_prices_2">
                                    <rect width="20" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <h3>Прозрачность с первой консультации</h3>
                        <p>Вы сразу получаете план лечения с точными цифрами. Стоимость фиксируется в договоре и не меняется в процессе.</p>
                    </article>
                    
                    <article class="prices__card">
                        <svg class="prices__icon" width="16" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <g clip-path="url(#clip0_prices_3)">
                                <path d="M7.5 15.5L0 8L2.5 5.5L7.5 10.5L17.5 0.5L20 3" fill="#23BFCF"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_prices_3">
                                    <rect width="20" height="16" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <h3>Дополнительная выгода</h3>
                        <p>Часть суммы можно вернуть через налоговый вычет (13%). Оплата возможна поэтапно, без скрытых переплат.</p>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Блок технологий -->
<section class="section technologies">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                <div class="technologies__grid">
                    <article class="technologies__card">
                        <div class="technologies__card-header">
                            <h2>Самые современные технологии</h2>
                            <p class="technologies__subtitle">Для достижения точного и быстрого результата на Европейском уровне</p>
                        </div>
                    </article>
                    
                    <article class="technologies__card">
                        <div class="technologies__card-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-01.svg" alt="" aria-hidden="true">
                        </div>
                        <h3>3D-моделирование</h3>
                        <div class="technologies__card-text">
                            <p>Врач заранее создаёт точную цифровую модель вашей улыбки.</p>
                            <p>Вы видите, каким будет результат ещё до начала лечения.</p>
                        </div>
                    </article>
                    
                    <article class="technologies__card">
                        <div class="technologies__card-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-01.svg" alt="" aria-hidden="true">
                        </div>
                        <h3>Компьютерная диагностика</h3>
                        <div class="technologies__card-text">
                            <p>Высокоточный анализ снимка по каждому зубу, с помощью специальных программ.</p>
                            <p>План лечения составляется максимально точно и без ошибок.</p>
                        </div>
                    </article>
                    
                    <article class="technologies__card">
                        <div class="technologies__card-icon">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/service-icon-01.svg" alt="" aria-hidden="true">
                        </div>
                        <h3>ИИ-диагностика по снимкам</h3>
                        <div class="technologies__card-text">
                            <p>Анализируем 2D и 3D снимки с помощью ИИ, чтобы быстрее собрать полную картину.</p>
                            <p>Наглядно объясняем пациенту план лечения.</p>
                        </div>
                    </article>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-4">
                <article class="technologies__card technologies__card--featured">
                    <h3>Своя цифровая лаборатория</h3>
                    <div class="technologies__card-text">
                        <p>Коронки и протезы изготавливаются прямо в клинике.</p>
                        <p>Уже через 1 день вы можете уйти с новым зубом.</p>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Блок рисков лечения в Китае -->
<section class="section china-risks">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                <div class="china-risks__left">
                    <div class="china-risks__header">
                        <h2>Собирались лететь в Китай на протезирование?</h2>
                        <div class="china-risks__subtitle">
                            <p>Сомнительные китайские аналоги имплантов — двойная плата: деньги и здоровье.</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <article class="china-risks__card">
                                <div class="china-risks__number">.01</div>
                                <h3>Языковой барьер</h3>
                                <p>Вы не объясните врачу, что чувствуете. Ошибка на этапе имплантации – это не возврат товара.</p>
                            </article>
                        </div>
                        
                        <div class="col-sm-12 col-lg-6">
                            <article class="china-risks__card">
                                <div class="china-risks__number">.02</div>
                                <h3>Выбор клиники вслепую</h3>
                                <p>По факту, вы доверяете здоровье и деньги неизвестной системе.</p>
                            </article>
                        </div>
                        
                        <div class="col-sm-12 col-lg-6">
                            <article class="china-risks__card">
                                <div class="china-risks__number">.03</div>
                                <h3>Скрытые доплаты</h3>
                                <p>Один счёт за операцию, другой – за «мелочи» на месте, а через неделю ещё за «коронки».</p>
                            </article>
                        </div>
                        
                        <div class="col-sm-12 col-lg-6">
                            <article class="china-risks__card">
                                <div class="china-risks__number">.04</div>
                                <h3>Гарантия?</h3>
                                <p>Только пока вы в стране. А если что – останетесь с проблемой один на один.</p>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-4">
                <article class="china-risks__card china-risks__card--featured">
                    <div class="china-risks__faces-container">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-01.jpg" alt="" class="china-risks__face china-risks__face--1" loading="lazy" aria-hidden="true"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-01.jpg'); ?>>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-02.jpg" alt="" class="china-risks__face china-risks__face--2" loading="lazy" aria-hidden="true"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-02.jpg'); ?>>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-07.jpg" alt="" class="china-risks__face china-risks__face--3" loading="lazy" aria-hidden="true"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-07.jpg'); ?>>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-08.jpg" alt="" class="china-risks__face china-risks__face--4" loading="lazy" aria-hidden="true"<?php echo dental_clinic_get_image_dimensions('assets/images/circle-face-08.jpg'); ?>>
                    </div>
                    <h3>В ЦЭСИ – всё прозрачно и безопасно:</h3>
                    <p>Мы работаем по договору и с гарантией. И главное – мы рядом, когда вы нас действительно нуждаетесь</p>
                    <button class="btn btn--primary" onclick="openPopup()" aria-label="Записаться на консультацию">Записаться на консультацию</button>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Блок контактов -->
<section class="section contacts" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="contacts__info">
                    <h2>Найти нас легко</h2>
                    
                    <div class="contacts__details" itemscope itemprop="address" itemtype="https://schema.org/PostalAddress">
                        <div class="contacts__item">
                            <div class="contacts__icon" aria-hidden="true">📍</div>
                            <div class="contacts__text" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</div>
                        </div>
                        
                        <div class="contacts__item">
                            <div class="contacts__icon" aria-hidden="true">🕒</div>
                            <div class="contacts__text">
                                <meta itemprop="openingHours" content="Mo-Fr 08:00-20:00">
                                <meta itemprop="openingHours" content="Sa 08:00-14:00">
                                Пн-Пт: 8:00 - 20:00, Сб 8:00 – 14:00
                            </div>
                        </div>
                        
                        <div class="contacts__item">
                            <div class="contacts__icon" aria-hidden="true">📞</div>
                            <div class="contacts__text">
                                <a href="tel:+74152500129" itemprop="telephone">+7(4152) 50-01-29</a>
                            </div>
                        </div>
                    </div>
                    
                    <p class="contacts__description">Мы расположены в современном бизнес-центре с охраняемой парковкой. В клинике действует IP телефония, не одно обращение не останется без внимания.</p>
                    
                    <button class="btn btn--primary" onclick="openPopup()" aria-label="Заказать обратный звонок">Заказать обратный звонок</button>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-6">
                <div class="contacts__photo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map-pin.jpg" alt="Здание клиники" class="contacts__image" loading="lazy"<?php echo dental_clinic_get_image_dimensions('assets/images/map-pin.jpg'); ?>>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

