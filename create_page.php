<?php
define('WP_USE_THEMES', false);
require_once('wp-config.php');
require_once('wp-load.php');

// Создаем страницу 'О клинике'
$page_data = array(
    'post_title' => 'О клинике',
    'post_name' => 'o-klinike',
    'post_content' => '<h1>Информация о медицинской организации</h1>

<h2>Общие сведения</h2>
<p><strong>Полное наименование:</strong> Общество с ограниченной ответственностью «ДЕНТА»</p>

<p>ООО «ДЕНТА» образована в 1998 году для вида деятельности — Стоматологическая практика. Руководителем является: <strong>Моисеев Кирилл Николаевич</strong>.</p>

<h2>Реквизиты организации</h2>
<ul>
    <li><strong>ИНН:</strong> 4105000950</li>
    <li><strong>ОГРН:</strong> 1024101222408</li>
    <li><strong>ОКПО:</strong> 26187243</li>
    <li><strong>Дата регистрации:</strong> 23.10.1998</li>
    <li><strong>Статус:</strong> Действующее с 23.10.1998</li>
</ul>

<h2>Основной вид деятельности</h2>
<p>ООО «ДЕНТА» — Стоматологическая практика.</p>

<h2>Налоговый учет</h2>
<p>Состоит на учете в налоговом органе <strong>Управление Федеральной налоговой службы по Камчатскому краю</strong> с 14 декабря 2020 г., присвоен <strong>КПП 410501001</strong>.</p>

<ul>
    <li><strong>Регистрационный номер ПФР:</strong> 051002019075</li>
    <li><strong>ФСС:</strong> 410000869141001</li>
</ul>

<h2>Контактная информация</h2>
<ul>
    <li><strong>Адрес электронной почты:</strong> <a href="mailto:denta.kamchatka@gmail.com">denta.kamchatka@gmail.com</a></li>
    <li><strong>Адрес официального сайта:</strong> <a href="https://dental41.ru" target="_blank">https://dental41.ru</a></li>
</ul>

<h2>Место нахождения</h2>
<ul>
    <li><strong>Юридический адрес:</strong> 684000, Камчатский кр, г. Елизово, р-н Елизовский, ул. Виталия Кручины, д.26А</li>
    <li><strong>Почтовый адрес:</strong> 684000, Камчатский кр, г. Елизово, р-н Елизовский, ул. Ленина, д.15А</li>
    <li><strong>Фактический адрес:</strong> 684000, Камчатский кр, г. Елизово, р-н Елизовский, ул. Ленина, д.15А</li>
</ul>

<h2>Структура и органы управления</h2>
<p><strong>Единоличный исполнительный орган</strong> – Генеральный директор, <strong>Моисеев Кирилл Николаевич</strong></p>

<h2>Время работы</h2>
<ul>
    <li><strong>Понедельник-пятница:</strong> с 08:00 до 20:00 (без перерыва)</li>
    <li><strong>Суббота:</strong> с 10:00 до 14:00</li>
    <li><strong>Воскресенье:</strong> выходной</li>
</ul>',
    'post_status' => 'publish',
    'post_type' => 'page',
    'post_author' => 1
);

// Проверяем, существует ли страница
$existing_page = get_page_by_path('o-klinike');

if ($existing_page) {
    // Обновляем существующую страницу
    $page_data['ID'] = $existing_page->ID;
    $result = wp_update_post($page_data);
    echo "Страница 'О клинике' обновлена! ID: " . $existing_page->ID . "\n";
} else {
    // Создаем новую страницу
    $result = wp_insert_post($page_data);
    echo "Страница 'О клинике' создана! ID: " . $result . "\n";
}

if (is_wp_error($result)) {
    echo "Ошибка: " . $result->get_error_message() . "\n";
} else {
    echo "Успешно! Страница доступна по адресу: " . get_permalink($result) . "\n";
}
?>
