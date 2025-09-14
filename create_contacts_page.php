<?php
// Простой скрипт для создания страницы "Контакты"
require_once('wp-config.php');
require_once('wp-load.php');

echo "Создаем страницу 'Контакты'...\n";

// Создаем страницу "Контакты"
$page_data = array(
    'post_title' => 'Контакты',
    'post_name' => 'kontakty',
    'post_content' => '<h2>Как нас найти</h2>
<p>Мы всегда рады видеть вас в нашей клинике. Если у вас есть вопросы или вы хотите записаться на прием, свяжитесь с нами любым удобным способом.</p>

<h3>Наши контакты</h3>
<p>ООО «ДЕНТА» - ваша надежная стоматологическая клиника в Елизово.</p>',
    'post_status' => 'publish',
    'post_type' => 'page',
    'post_author' => 1
);

// Проверяем, существует ли страница
$existing_page = get_page_by_path('kontakty');

if ($existing_page) {
    // Обновляем существующую страницу
    $page_data['ID'] = $existing_page->ID;
    $result = wp_update_post($page_data);
    echo "✅ Страница 'Контакты' обновлена! ID: " . $existing_page->ID . "\n";
} else {
    // Создаем новую страницу
    $result = wp_insert_post($page_data);
    echo "✅ Страница 'Контакты' создана! ID: " . $result . "\n";
}

if (is_wp_error($result)) {
    echo "❌ Ошибка: " . $result->get_error_message() . "\n";
} else {
    echo "🎉 Успешно! Страница доступна по адресу: " . get_permalink($result) . "\n";
    echo "📝 Не забудьте назначить шаблон 'Контакты' в админке WordPress!\n";
}
?>
