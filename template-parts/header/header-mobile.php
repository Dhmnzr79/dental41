<?php
/**
 * Mobile Header
 * Используется на мобильных устройствах и планшетах
 */
?>
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


