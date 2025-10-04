<?php
// Подключаем WordPress
require_once('../../../wp-config.php');

// Создаем страницу имплантации
$page_data = array(
    'post_title' => 'Имплантация',
    'post_content' => 'Содержимое страницы имплантации',
    'post_status' => 'publish',
    'post_type' => 'page',
    'post_name' => 'implantatsiya',
    'post_author' => 1
);

$page_id = wp_insert_post($page_data);

if ($page_id) {
    echo "Страница имплантации создана с ID: " . $page_id . "\n";
    echo "URL: " . get_permalink($page_id) . "\n";
} else {
    echo "Ошибка создания страницы\n";
}

// Проверяем, существует ли страница
$existing_page = get_page_by_path('implantatsiya');
if ($existing_page) {
    echo "Страница существует: " . $existing_page->post_title . " (ID: " . $existing_page->ID . ")\n";
} else {
    echo "Страница не найдена\n";
}
?>
