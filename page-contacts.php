<?php
/**
 * Template Name: Контакты
 * Wrapper для старого шаблона из templates-v1/
 */

$template_path = get_stylesheet_directory() . '/templates-v1/page-contacts.php';
if (file_exists($template_path)) {
    include $template_path;
} else {
    get_header();
    echo '<div class="container"><h1>Шаблон не найден</h1></div>';
    get_footer();
}

