<?php
/**
 * Wrapper для старого шаблона из templates-v1/
 * WordPress ищет шаблоны по имени файла в корне
 */

$template_path = get_stylesheet_directory() . '/templates-v1/page-implantatsiya.php';
if (file_exists($template_path)) {
    include $template_path;
} else {
    // Fallback на стандартный шаблон страницы
    get_header();
    echo '<div class="container"><h1>Шаблон не найден</h1></div>';
    get_footer();
}

