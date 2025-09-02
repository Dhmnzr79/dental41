<?php
/**
 * Functions for Dental Clinic Child Theme
 * 
 * Основные функции для детской темы стоматологической клиники
 */

// Подключение стилей
function dental_clinic_enqueue_styles() {
    wp_enqueue_style('local-fonts', get_stylesheet_directory_uri() . '/assets/fonts.css', array(), wp_get_theme()->get('Version'));
    
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style', 'local-fonts'), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_styles');

// Настройка темы
function dental_clinic_setup() {
    register_nav_menus(array(
        'primary' => 'Главное меню',
        'footer' => 'Меню в футере'
    ));
}
add_action('after_setup_theme', 'dental_clinic_setup');

// Подключение Adobe Fonts
function dental_clinic_enqueue_adobe_fonts() {
    wp_enqueue_style(
        'adobe-fonts',
        'https://use.typekit.net/pog7tgf.css',
        array(),
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_adobe_fonts');
