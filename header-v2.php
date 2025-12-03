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
                    <button type="button" class="v2-header__cta-btn" onclick="openPopup()">
                        Заказать звонок
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/arrow-phone.svg" alt="" class="v2-header__cta-icon" aria-hidden="true">
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>

