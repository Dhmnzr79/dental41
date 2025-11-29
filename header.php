<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <!-- Мобильная шапка -->
    <header class="site-topbar" aria-label="Верхняя панель сайта">
        <div class="site-topbar__inner">
            <a class="brand" href="<?php echo home_url(); ?>" aria-label="На главную">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="ЦЭСИ" class="brand__logo" width="40" height="40">
            </a>

            <div class="actions">
                <!-- Кнопка звонка -->
                <a class="icon-btn" href="tel:+74152500129" aria-label="Позвонить">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 17.5v2a2 2 0 0 1-2.18 2 19.77 19.77 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.77 19.77 0 0 1 2.5 3.18 2 2 0 0 1 4.5 1h2a2 2 0 0 1 2 1.72c.12.93.32 1.84.59 2.72a2 2 0 0 1-.45 2.11L7.91 8.91a16 16 0 0 0 6 6l1.36-1.36a2 2 0 0 1 2.11-.45c.88.27 1.79.47 2.72.59A2 2 0 0 1 22 17.5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
                <!-- Бургер -->
                <button class="icon-btn" id="menuOpen" aria-label="Открыть меню" aria-haspopup="dialog" aria-controls="menuDialog">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Fullscreen overlay menu -->
    <div class="nav-overlay" id="menuDialog" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="nav-head">
            <span style="font-weight:800">Меню</span>
            <button class="nav-close" id="menuClose" aria-label="Закрыть меню">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 6 6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            </button>
        </div>

        <div class="nav-body">
            <!-- CTA — первым пунктом -->
            <button type="button" class="btn-1" onclick="openPopup()">Записаться на консультацию</button>

            <!-- Навигация сайта -->
            <ul class="nav" role="list">
                <li><a href="<?php echo home_url(); ?>">Главная <span>о клинике</span></a></li>
                <li><a href="<?php echo home_url('/implantatsiya'); ?>">Имплантация <span>восстановление зубов</span></a></li>
                <li><a href="<?php echo home_url('/doctor'); ?>">Врачи <span>опыт, дипломы</span></a></li>
                <li class="dropdown">
                    <a href="<?php echo home_url('/o-klinike'); ?>" class="dropdown-toggle">О клинике <span>информация</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo home_url('/o-klinike'); ?>">Информация</a></li>
                        <li><a href="<?php echo home_url('/rekvizity'); ?>">Реквизиты</a></li>
                        <li><a href="<?php echo home_url('/litsenzii'); ?>">Лицензии</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo home_url('/blog'); ?>">Блог</a></li>
                <li><a href="<?php echo home_url('/kontakty'); ?>">Контакты</a></li>
            </ul>

        </div>
    </div>

    <!-- Десктопная шапка -->
    <div class="header-content">
        <!-- Первый ряд: Лого, расшифровка, адрес, телефон, режим работы -->
        <div class="header-top">
            <div class="header-left">
                <div class="logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="Логотип" class="logo-svg">
                    </a>
                </div>
                <div class="clinic-info">
                    <div class="clinic-name">Центр эстетической стоматологии и имплантации</div>
                    <div class="clinic-address">г. Елизово, ул. Ленина 15-а</div>
                </div>
            </div>
            
            <div class="header-right">
                <div class="header-contacts">
                    <div class="phone-block">
                        <a href="tel:+74152500129" class="phone-number">+7(4152) 50-01-29</a>
                        <a href="https://wa.me/79084952424" class="whatsapp-link" target="_blank" rel="noopener" title="Написать в WhatsApp">
                            <svg class="whatsapp-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                            </svg>
                        </a>
                    </div>
                    <div class="working-hours">Звоните 8:00-20:00, сб. 08:00-14:00</div>
                </div>
            </div>
        </div>
        
        <!-- Второй ряд: Меню и кнопка заказать звонок -->
        <div class="header-bottom">
            <nav class="nav-menu">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'nav-menu',
                        'walker' => new Dental_Clinic_Walker_Nav_Menu(),
                        'fallback_cb' => 'dental_clinic_fallback_menu'
                    ));
                } else {
                    dental_clinic_fallback_menu();
                }
                ?>
            </nav>
            
            <div class="header-button-wrapper">
                <button type="button" class="btn-secondary" onclick="openPopup()">
                    <span class="btn-text">Заказать звонок</span>
                    <svg class="btn-arrow" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.7347 6.6483C15.9046 6.47928 16 6.25007 16 6.01108C16 5.77208 15.9046 5.54287 15.7347 5.37385L10.6085 0.275158C10.5249 0.189074 10.4249 0.120411 10.3144 0.073174C10.2038 0.0259374 10.0849 0.00107371 9.96458 3.37663e-05C9.84426 -0.00100618 9.72493 0.0217987 9.61357 0.0671172C9.5022 0.112436 9.40103 0.179361 9.31595 0.263987C9.23086 0.348613 9.16358 0.449245 9.11802 0.560012C9.07245 0.67078 9.04952 0.789464 9.05057 0.909139C9.05162 1.02881 9.07661 1.14708 9.1241 1.25705C9.1716 1.36701 9.24063 1.46646 9.32718 1.54961L12.9065 5.10977L0.906168 5.10977C0.665837 5.10977 0.435349 5.20473 0.26541 5.37376C0.0954706 5.54278 3.39719e-07 5.77203 3.2927e-07 6.01108C3.18821e-07 6.25012 0.0954705 6.47937 0.26541 6.6484C0.435349 6.81742 0.665837 6.91238 0.906167 6.91238L12.9065 6.91238L9.32718 10.4725C9.16211 10.6425 9.07078 10.8702 9.07284 11.1065C9.07491 11.3428 9.17021 11.5689 9.33822 11.736C9.50623 11.9031 9.73351 11.9979 9.9711 12C10.2087 12.002 10.4376 11.9112 10.6085 11.747L15.7347 6.6483Z" fill="#23BFCF"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
</header>

<script>
const openBtn = document.getElementById('menuOpen');
const closeBtn = document.getElementById('menuClose');
const dialog = document.getElementById('menuDialog');
const DUR = 280;

function openMenu() {
    dialog.classList.add('is-open');
    dialog.setAttribute('aria-hidden', 'false');
    document.body.classList.add('menu-open');
    // фокус на первую ссылку меню
    setTimeout(() => {
        const first = dialog.querySelector('.cta, .nav a, button, [href]');
        first && first.focus && first.focus();
    }, DUR);
}

function closeMenu() {
    dialog.setAttribute('aria-hidden', 'true');
    dialog.classList.remove('is-open');
    document.body.classList.remove('menu-open');
    openBtn.focus();
}

openBtn.addEventListener('click', openMenu);
closeBtn.addEventListener('click', closeMenu);
dialog.addEventListener('click', (e) => {
    // клик по пустому месту не закрывает, чтобы не мешать
});
window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && dialog.classList.contains('is-open')) closeMenu();
});

// Блокируем переход по клику на родительские ссылки с подпунктами в десктопном меню
document.addEventListener('DOMContentLoaded', function() {
    var parentLinks = document.querySelectorAll('.header-bottom .dropdown > a.dropdown-toggle');
    parentLinks.forEach(function(link){
        link.addEventListener('click', function(e){
            var submenu = link.parentElement.querySelector('.dropdown-menu');
            if (submenu) {
                e.preventDefault();
                // Блокируем переход и явно показываем, что это раскрывающийся пункт
                link.setAttribute('href', '#');
                link.setAttribute('aria-haspopup', 'true');
                link.setAttribute('aria-expanded', 'true');
            }
        });
        // На всякий случай сразу заменим href, если у пункта есть подменю
        var submenu = link.parentElement.querySelector('.dropdown-menu');
        if (submenu) {
            link.setAttribute('href', '#');
            link.setAttribute('aria-haspopup', 'true');
        }
    });
});
</script>

<?php
// Fallback меню если не создано
function dental_clinic_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . home_url() . '">Главная</a></li>';
    echo '<li><a href="' . home_url('/implantatsiya') . '">Имплантация</a></li>';
    echo '<li><a href="' . home_url('/doctor') . '">Врачи</a></li>';
    echo '<li class="dropdown">';
    echo '<a href="#" class="dropdown-toggle">О клинике</a>';
    echo '<ul class="dropdown-menu">';
    echo '<li><a href="' . home_url('/o-klinike') . '">О клинике</a></li>';
    echo '<li><a href="' . home_url('/rekvizity') . '">Реквизиты</a></li>';
    echo '<li><a href="' . home_url('/litsenzii') . '">Лицензии</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . home_url('/kontakty') . '">Контакты</a></li>';
    echo '</ul>';
}
?>
