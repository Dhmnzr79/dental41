<?php
/**
 * Header Menu Block
 * Основная навигация сайта
 */
?>
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












