<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="header__topbar" aria-label="Верхняя панель сайта">
        <div class="container">
            <div class="header__topbar-inner">
                <a class="header__logo" href="<?php echo home_url(); ?>" aria-label="На главную" itemprop="url">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="ЦЭСИ" class="header__logo-img" width="40" height="40" itemprop="logo">
                </a>

                <div class="header__actions">
                    <a class="header__icon-btn" href="tel:+74152500129" aria-label="Позвонить" itemprop="telephone">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M22 17.5v2a2 2 0 0 1-2.18 2 19.77 19.77 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.77 19.77 0 0 1 2.5 3.18 2 2 0 0 1 4.5 1h2a2 2 0 0 1 2 1.72c.12.93.32 1.84.59 2.72a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l1.36-1.36a2 2 0 0 1 2.11-.45c.88.27 1.79.47 2.72.59A2 2 0 0 1 22 17.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>

                    <button class="header__icon-btn" id="menu-open" aria-label="Открыть меню" aria-haspopup="dialog" aria-controls="menu-dialog">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="header__overlay" id="menu-dialog" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="menu-title">
        <div class="header__overlay-head">
            <span class="header__overlay-title" id="menu-title">Меню</span>
            <button class="header__overlay-close" id="menu-close" aria-label="Закрыть меню">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M18 6 6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        <div class="header__overlay-body">
            <button type="button" class="btn btn--primary header__overlay-cta" onclick="openPopup()">Записаться на консультацию</button>

            <nav class="header__nav" role="navigation" aria-label="Основная навигация">
                <ul class="header__nav-list" role="list">
                    <li class="header__nav-item"><a href="<?php echo home_url(); ?>" class="header__nav-link">Главная <span class="header__nav-desc">о клинике</span></a></li>
                    <li class="header__nav-item"><a href="<?php echo home_url('/implantatsiya'); ?>" class="header__nav-link">Имплантация <span class="header__nav-desc">восстановление зубов</span></a></li>
                    <li class="header__nav-item"><a href="<?php echo home_url('/doctor'); ?>" class="header__nav-link">Врачи <span class="header__nav-desc">опыт, дипломы</span></a></li>
                    <li class="header__nav-item header__nav-item--dropdown">
                        <a href="<?php echo home_url('/o-klinike'); ?>" class="header__nav-link header__nav-link--toggle">О клинике <span class="header__nav-desc">информация</span></a>
                        <ul class="header__dropdown">
                            <li class="header__dropdown-item"><a href="<?php echo home_url('/o-klinike'); ?>" class="header__dropdown-link">Информация</a></li>
                            <li class="header__dropdown-item"><a href="<?php echo home_url('/rekvizity'); ?>" class="header__dropdown-link">Реквизиты</a></li>
                            <li class="header__dropdown-item"><a href="<?php echo home_url('/litsenzii'); ?>" class="header__dropdown-link">Лицензии</a></li>
                        </ul>
                    </li>
                    <li class="header__nav-item"><a href="<?php echo home_url('/blog'); ?>" class="header__nav-link">Блог</a></li>
                    <li class="header__nav-item"><a href="<?php echo home_url('/kontakty'); ?>" class="header__nav-link">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="header__content">
        <div class="container">
            <div class="row header__top">
                <div class="col-sm-12 col-lg-8 header__left">
                    <a class="header__brand" href="<?php echo home_url(); ?>" itemprop="url">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="Логотип ЦЭСИ" class="header__brand-img" itemprop="logo">
                    </a>
                    <div class="header__info" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <div class="header__name" itemprop="name">Центр эстетической стоматологии и имплантации</div>
                        <div class="header__address" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</div>
                    </div>
                </div>

                <div class="col-sm-12 col-lg-4 header__right">
                    <div class="header__contacts">
                        <div class="header__phone-block">
                            <a href="tel:+74152500129" class="header__phone" itemprop="telephone">+7(4152) 50-01-29</a>
                        </div>
                        <div class="header__hours" itemprop="openingHours">Звоните 8:00-20:00, сб. 08:00-14:00</div>
                    </div>
                </div>
            </div>

            <div class="row header__bottom">
                <div class="col-sm-12 col-lg-10 header__menu-col">
                    <nav class="header__menu" role="navigation" aria-label="Основное меню">
                        <?php
                        if (has_nav_menu('primary')) {
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'container' => false,
                                'menu_class' => 'header__menu-list',
                                'walker' => new Dental_Clinic_Walker_Nav_Menu(),
                                'fallback_cb' => 'dental_clinic_v2_fallback_menu'
                            ));
                        } else {
                            dental_clinic_v2_fallback_menu();
                        }
                        ?>
                    </nav>
                </div>

                <div class="col-sm-12 col-lg-2 header__button-col">
                    <button type="button" class="header__cta-btn" onclick="openPopup()">
                        Заказать звонок
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/arrow-phone.svg" alt="" class="header__cta-icon" aria-hidden="true">
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>


