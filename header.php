<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
    /**
     * SEO Meta-теги
     */
    // Title
    $seo_title = dental_clinic_get_seo_title();
    echo '<title>' . esc_html($seo_title) . '</title>' . "\n";
    
    // Meta Description
    $meta_description = dental_clinic_get_meta_description();
    if (!empty($meta_description)) {
        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    }
    
    // Canonical URL (не выводим для 404)
    $canonical_url = dental_clinic_get_canonical_url();
    if (!empty($canonical_url) && !is_404()) {
        echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">' . "\n";
    }
    
    // Robots meta (noindex для 404 страницы)
    if (is_404()) {
        echo '<meta name="robots" content="noindex, nofollow">' . "\n";
    }
    
    // Open Graph (базовые теги для соцсетей, не для 404)
    if (!is_404()) {
        echo '<meta property="og:title" content="' . esc_attr($seo_title) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($meta_description) . '">' . "\n";
        if (!empty($canonical_url)) {
            echo '<meta property="og:url" content="' . esc_url($canonical_url) . '">' . "\n";
        }
        echo '<meta property="og:type" content="' . (is_single() ? 'article' : 'website') . '">' . "\n";
    }
    
    if (is_singular() && has_post_thumbnail()) {
        $og_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
        if ($og_image) {
            echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
        }
    }
    ?>
    <?php
    // Preconnect для оптимизации загрузки ресурсов
    echo '<link rel="preconnect" href="' . get_stylesheet_directory_uri() . '" crossorigin>' . "\n";
    echo '<link rel="dns-prefetch" href="https://mc.yandex.ru">' . "\n";
    echo '<link rel="dns-prefetch" href="https://mod.calltouch.ru">' . "\n";
    
    // Preload для hero-изображений (LCP оптимизация)
    if (is_front_page()) {
        // Mobile LCP candidate
        echo '<link rel="preload" as="image" href="' . get_stylesheet_directory_uri() . '/assets/images/khan-mob-1.png" media="(max-width: 1279px)">' . "\n";
        // Desktop LCP candidate
        echo '<link rel="preload" as="image" href="' . get_stylesheet_directory_uri() . '/assets/images/moiseev-hero.png" media="(min-width: 1280px)">' . "\n";
        // Other first-screen assets (keep as-is)
        echo '<link rel="preload" as="image" href="' . get_stylesheet_directory_uri() . '/assets/images/bg-action.png">' . "\n";
    }
    // Preload для локального шрифта Inter (оптимизация)
    echo '<link rel="preload" as="font" href="' . get_stylesheet_directory_uri() . '/assets/fonts/Inter-Regular.woff2" type="font/woff2" crossorigin>' . "\n";
    // Preload для заголовочного шрифта NTSomic (уменьшаем рефлоу заголовков на первом экране)
    echo '<link rel="preload" as="font" href="' . get_stylesheet_directory_uri() . '/assets/fonts/NTSomic-Semibold.woff2" type="font/woff2" crossorigin>' . "\n";
    ?>
    <style id="critical-css">
        /* Critical CSS - минимальные стили для первого экрана */
        @font-face{font-family:'Inter';src:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Inter-Regular.woff2') format('woff2');font-weight:400;font-style:normal;font-display:swap}
        @font-face{font-family:'NTSomic';src:url('<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/NTSomic-Semibold.woff2') format('woff2');font-weight:600;font-style:normal;font-display:swap}
        :root{--brk-sm:768px;--brk-lg:1280px;--brk-xl:1400px;--container-max:1400px;--gutter-mob:16px;--gutter-desk:24px;--col-gap-mob:16px;--col-gap-desk:30px;--text-color:#050315;--heading-color:#050315;--bg:#fbfbfe;--primary:#23bfcf;--bg-primary-1:#7ddee7;--bg-primary-2:#7de8cd;--bg-primary-main:#23bfcf;--button-color:#ffba28;--button-color-hover:#ff8d28;--heading-font:'Inter',sans-serif;--body-font:'Inter',sans-serif;--white:#ffffff;--header-topbar-offset:88px}
        html{box-sizing:border-box;background-color:var(--bg)}
        /* Reserve space for fixed mobile topbar to avoid layout shift on first paint.
           Important: base.css contains a mobile rule `body{padding-top:64px}` which would otherwise override and cause a jump. */
        body{margin:0;font-family:var(--body-font);font-weight:400;font-size:17px;line-height:1.6;color:var(--text-color);background-color:var(--bg);padding-top:var(--header-topbar-offset)!important}
        *,*::before,*::after{box-sizing:inherit}
        /* Base typography (matches assets/css/v2/base.css) to prevent first-paint -> styled reflow */
        p{font-size:17px;line-height:1.6;margin:0}
        h1,h2,h3,h4,h5,h6{margin:0}
        h1{font-family:var(--heading-font);font-weight:600;font-size:54px;line-height:1.15;color:var(--heading-color)}
        h2{font-family:var(--heading-font);font-weight:600;font-size:48px;line-height:1.15;color:var(--heading-color)}
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
        .hero-mobile__text{background:#ffffffc7;padding:25px 15px;border-radius:13px;border-left:1px solid #fff;border-top:1px solid #fff}
        .hero-mobile__subtitle{text-align:left;padding:0}
        .hero-mobile__description{margin:0;padding-top:10px;display:flex;flex-direction:column;gap:15px}
        .hero-mobile__benefit{display:flex;align-items:center;gap:15px}
        .hero-mobile__icon{flex-shrink:0;width:24px;height:24px}
        .hero-mobile__actions{display:flex;flex-direction:column;gap:15px;width:100%;box-sizing:border-box;padding:0;margin:0}
        .hero-mobile__actions .btn{width:100%;max-width:100%;box-sizing:border-box;word-wrap:break-word;white-space:normal;min-width:0}
        .btn{display:inline-block;padding:16px 32px;font-size:17px;font-weight:600;text-align:center;text-decoration:none;border-radius:10px;border:none;cursor:pointer;transition:background-color 0.3s ease;box-sizing:border-box}
        .btn--primary{color:var(--text-color);background-color:var(--button-color);transition:background-color 0.3s ease}
        .btn--primary:hover{background-color:var(--button-color-hover)}
        /* Mobile CTA styling needs to be critical to avoid unstyled button -> styled jump */
        .hero{display:none;padding:0;background-color:var(--bg-primary-1);margin-left:auto;margin-right:auto}
        .hero__left{padding:80px 0}
        .hero__title-highlight{color:var(--white)}
        .hero__subtitle{font-family:var(--body-font);font-weight:400;font-size:24px;line-height:1.4;color:var(--heading-color);margin-top:10px}
        .hero__description{display:flex;flex-direction:column;gap:15px}
        .hero__benefits-row{display:flex;flex-direction:row;gap:20px;padding:40px 0 20px}
        .hero__benefit{display:flex;flex-direction:column;gap:10px;align-items:flex-start;position:relative}
        /* Help prevent CLS: keep hero image predictable even before non-critical CSS loads */
        .hero__doctor-photo{display:block;max-width:100%;height:auto}
        @media (max-width:1279px){
            .hero-mobile{display:block}
            /* Fix first-screen geometry on mobile: hero shouldn't start under fixed header */
            .hero-mobile{min-height:calc(100svh - var(--header-topbar-offset))}
        }
        @media (max-width:767px){
            body{font-size:16px;line-height:1.5}
            p{font-size:16px;line-height:1.5}
            h1{font-size:30px;line-height:1.15}
            h2{font-size:26px;line-height:1.2}
        }
        @media (min-width:1280px){
            /* Desktop: mobile topbar is hidden, and body should not keep its reserved offset */
            body{padding-top:0!important}
            .header__topbar{display:none}
            .header__content{display:block}
            /* Desktop grid sizes used in header + hero to avoid "stacked then side-by-side" shift */
            .container{width:90%;max-width:var(--container-max);margin-inline:auto;padding-inline:var(--gutter-desk)}
            .row{gap:var(--col-gap-desk)}
            .col-lg-2{grid-column:span 2}
            .col-lg-4{grid-column:span 4}
            .col-lg-6{grid-column:span 6}
            .col-lg-8{grid-column:span 8}
            .col-lg-10{grid-column:span 10}
            .hero{display:block}
            .hero{min-height:640px}
            /* Desktop hero geometry: without this, right side reflows heavily when components.css loads */
            .hero .row{overflow:visible}
            .hero [class*='col-'].hero__right{overflow:visible}
            .hero__right{position:relative;overflow:visible;padding:80px 0}
            .hero__photo{position:absolute;bottom:0;left:-130px;width:96%;height:96%}
            .hero__doctor-photo{width:100%;height:100%;object-fit:contain}
            .hero__stats{position:relative;width:35%;margin-left:auto;height:100%;display:flex;flex-direction:column;justify-content:space-between}
            .hero__stat{display:flex;flex-direction:column;gap:0;background:#ffffff70;padding:40px 10px 80px;border-radius:10px 10px 150px 150px;align-items:center;border-left:1px solid #fff;border-top:1px solid #fff}
            .hero__stat-number{font-family:var(--heading-font);font-size:40px;line-height:1.2;text-align:center;padding-top:30px}
            .hero__conclusion{font-size:20px;padding:30px 35px}
            .hero__actions{display:flex;flex-direction:row;align-items:center;gap:20px;margin-top:30px}
        }
    </style>
    <?php wp_head(); ?>
    
    <?php
    /**
     * Schema.org разметка (JSON-LD)
     */
    $schemas = dental_clinic_get_schema_markup();
    foreach ($schemas as $schema) {
        echo '<script type="application/ld+json">' . "\n";
        echo wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        echo "\n" . '</script>' . "\n";
    }
    ?>
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
