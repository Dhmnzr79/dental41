<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php
    // Preload для hero-изображений (LCP оптимизация)
    if (is_front_page()) {
        echo '<link rel="preload" as="image" href="' . get_stylesheet_directory_uri() . '/assets/images/khan-mob-1.png">' . "\n";
        echo '<link rel="preload" as="image" href="' . get_stylesheet_directory_uri() . '/assets/images/bg-action.png">' . "\n";
    }
    // Preload для локального шрифта Inter (оптимизация)
    echo '<link rel="preload" as="font" href="' . get_stylesheet_directory_uri() . '/assets/fonts/Inter-Regular.woff2" type="font/woff2" crossorigin>' . "\n";
    ?>
    <style id="critical-css">
        /* Critical CSS - минимальные стили для первого экрана */
        @font-face{font-family:'Inter';src:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Inter-Regular.woff2') format('woff2');font-weight:400;font-style:normal;font-display:swap}
        @font-face{font-family:'NTSomic';src:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/NTSomic-Semibold.woff2') format('woff2');font-weight:600;font-style:normal;font-display:swap}
        :root{--brk-sm:768px;--brk-lg:1280px;--brk-xl:1400px;--container-max:1400px;--gutter-mob:16px;--gutter-desk:24px;--col-gap-mob:16px;--col-gap-desk:30px;--text-color:#050315;--heading-color:#050315;--bg:#fbfbfe;--primary:#23bfcf;--bg-primary-1:#7ddee7;--bg-primary-2:#7de8cd;--bg-primary-main:#23bfcf;--heading-font:'NTSomic',sans-serif;--body-font:'Inter',sans-serif;--white:#ffffff}
        html{box-sizing:border-box;background-color:var(--bg)}
        body{margin:0;font-family:var(--body-font);font-weight:400;font-size:17px;line-height:1.6;color:var(--text-color);background-color:var(--bg)}
        *,*::before,*::after{box-sizing:inherit}
        .container{width:100%;margin-inline:auto;padding-inline:var(--gutter-mob);box-sizing:border-box}
        .row{display:grid;grid-template-columns:repeat(12,minmax(0,1fr));gap:var(--col-gap-mob)}
        [class^='col-'],[class*=' col-']{min-width:0;grid-column:span 12;box-sizing:border-box}
        .section{padding-block:48px}
        .header{position:relative;z-index:1000}
        .header__topbar{display:block;position:fixed;top:0;left:0;right:0;width:100%;background-color:var(--white);border-bottom:1px solid rgba(0,0,0,0.1);z-index:1001}
        .header__topbar-inner{display:flex;align-items:center;justify-content:space-between;padding:12px 0;min-height:64px}
        .header__logo{display:flex;align-items:center;text-decoration:none}
        .header__logo-img{display:block;width:40px;height:40px}
        .hero-mobile{display:none;overflow-x:hidden;width:100%;max-width:100%;box-sizing:border-box;padding-block:0;padding-inline:0;margin-inline:0}
        .hero-mobile__wrapper{background:linear-gradient(-59.68deg,#ffd7ef 9.01%,#9ce8f4 54.01%,#8fc0e4 93.18%);border-radius:0;padding:10px;box-sizing:border-box;width:100%}
        .hero-mobile__content{position:relative;padding:15px}
        .hero-mobile__title{padding-right:30%;color:#fff;font-family:var(--heading-font);font-weight:600;font-size:28px;line-height:1.3;margin:0}
        .hero-mobile__image{position:absolute;bottom:0;right:5px;height:auto;z-index:1;width:140px}
        .hero{display:none;padding:0;background-color:var(--bg-primary-1);margin-left:auto;margin-right:auto}
        @media (max-width:1279px){.hero-mobile{display:block}}
        @media (min-width:1280px){.hero{display:block}}
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
/**
 * Main Header Router
 * Рендерит мобильную и десктопную версии header, CSS-медиа-запросы показывают нужную
 */
?>

<header class="header" itemscope itemtype="https://schema.org/MedicalBusiness">
    <?php
    // Мобильная версия - видна только на мобилках и планшетах (до 1280px)
    get_template_part('template-parts/header/header', 'mobile');
    
    // Десктопная версия - видна только на десктопе (от 1280px)
    // Вариант 1 (default): главная страница и страница имплантации
    // Вариант 2 (alt): остальные страницы
    if (is_front_page() || is_page_template('page-implantatsiya.php')) {
        get_template_part('template-parts/header/header', 'desktop-default');
    } else {
        get_template_part('template-parts/header/header', 'desktop-alt');
    }
    ?>
</header>
