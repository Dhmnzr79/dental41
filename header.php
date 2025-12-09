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
 * Рендерит мобильную и десктопную версии header, CSS-медиа-запросы показывают нужную
 */
?>

<header class="header" itemscope itemtype="https://schema.org/MedicalBusiness">
    <?php
    // Мобильная версия - видна только на мобилках и планшетах (до 1280px)
    get_template_part('template-parts/header/header', 'mobile');
    
    // Десктопная версия - видна только на десктопе (от 1280px)
    // Этот контент также будет дублирован в wrapper для градиента
    echo '<div class="header__desktop-content">';
    get_template_part('template-parts/header/header', 'desktop-default');
    echo '</div>';
    ?>
</header>

<div class="header-hero-wrapper">
    <div class="header__desktop-duplicate">
        <?php get_template_part('template-parts/header/header', 'desktop-duplicate'); ?>
    </div>
