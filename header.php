<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
/**
 * Main Header Router
 * Рендерит все версии header, CSS-медиа-запросы показывают нужную
 */
$is_implant_page = 
    is_page_template('page-implantatsiya.php') || 
    (is_page() && get_post_field('post_name') == 'implantatsiya');
?>

<header class="header" itemscope itemtype="https://schema.org/MedicalBusiness">
    <?php
    // Мобильная версия - видна только на мобилках и планшетах (до 1280px)
    get_template_part('template-parts/header/header', 'mobile');
    
    // Десктопная версия для главной и имплантации - видна только на десктопе (от 1280px)
    if (is_front_page() || $is_implant_page) :
        get_template_part('template-parts/header/header', 'desktop-main');
    
    // Десктопная версия для остальных страниц - видна только на десктопе (от 1280px)
    else :
        get_template_part('template-parts/header/header', 'desktop-default');
    
    endif;
    ?>
</header>
