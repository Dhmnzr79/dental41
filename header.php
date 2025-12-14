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
    
    // Canonical URL
    $canonical_url = dental_clinic_get_canonical_url();
    echo '<link rel="canonical" href="' . esc_url($canonical_url) . '">' . "\n";
    
    // Open Graph (базовые теги для соцсетей)
    echo '<meta property="og:title" content="' . esc_attr($seo_title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($meta_description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($canonical_url) . '">' . "\n";
    echo '<meta property="og:type" content="' . (is_single() ? 'article' : 'website') . '">' . "\n";
    
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
        :root{--brk-sm:768px;--brk-lg:1280px;--brk-xl:1400px;--container-max:1400px;--gutter-mob:16px;--gutter-desk:24px;--col-gap-mob:16px;--col-gap-desk:30px;--text-color:#050315;--heading-color:#050315;--bg:#fbfbfe;--primary:#23bfcf;--bg-primary-1:#7ddee7;--bg-primary-2:#7de8cd;--bg-primary-main:#23bfcf;--button-color:#ffba28;--button-color-hover:#ff8d28;--heading-font:'NTSomic',sans-serif;--body-font:'Inter',sans-serif;--white:#ffffff}
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
        .hero{display:none;padding:0;background-color:var(--bg-primary-1);margin-left:auto;margin-right:auto}
        .hero__left{padding:80px 0}
        .hero__title-highlight{color:var(--white)}
        .hero__subtitle{font-family:var(--body-font);font-weight:400;font-size:24px;line-height:1.4;color:var(--heading-color);margin-top:10px}
        .hero__description{display:flex;flex-direction:column;gap:15px}
        .hero__benefits-row{display:flex;flex-direction:row;gap:20px;padding:40px 0 20px}
        .hero__benefit{display:flex;flex-direction:column;gap:10px;align-items:flex-start;position:relative}
        @media (max-width:1279px){.hero-mobile{display:block}}
        @media (min-width:1280px){.hero{display:block}}
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
