<?php
/**
 * Functions for Dental Clinic Child Theme
 * 
 * Основные функции для детской темы стоматологической клиники
 */

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

// Подключение скрипта для анимаций при скролле
function dental_clinic_enqueue_scroll_animations() {
    wp_enqueue_script(
        'dental-clinic-scroll-animations',
        get_stylesheet_directory_uri() . '/scroll-animations.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_scroll_animations');

// Подключение скрипта для маски телефона
function dental_clinic_enqueue_phone_mask() {
    wp_enqueue_script(
        'dental-clinic-phone-mask',
        get_stylesheet_directory_uri() . '/phone-mask.js',
        array('jquery'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_phone_mask');

function dental_clinic_enqueue_popup() {
    wp_enqueue_script(
        'dental-clinic-popup',
        get_stylesheet_directory_uri() . '/popup.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_popup');

// Поддержка выпадающих меню
function dental_clinic_nav_menu_css_class($classes, $item, $args) {
    if ($args->theme_location == 'primary') {
        // Добавляем класс dropdown для элементов с дочерними элементами
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown';
        }
        // Добавляем класс dropdown-toggle для ссылок с дочерними элементами
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown-toggle';
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'dental_clinic_nav_menu_css_class', 10, 3);

// Кастомный walker для выпадающих меню
class Dental_Clinic_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu\">\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $li_attributes = '';
        $class_names = $value = '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        if ($args->walker->has_children) {
            $classes[] = 'dropdown';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        if ($args->walker->has_children) {
            $attributes .= ' class="dropdown-toggle"';
        }
        
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
