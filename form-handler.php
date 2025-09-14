<?php
/**
 * Обработчик формы заявки
 */

// Проверяем, что форма отправлена
if ($_POST && isset($_POST['name']) && isset($_POST['phone'])) {
    
    // Получаем данные из формы
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    
    // Валидация
    if (empty($name) || empty($phone)) {
        wp_redirect(home_url('/?error=empty_fields'));
        exit;
    }
    
    // Здесь можно добавить отправку email или сохранение в базу данных
    // Например:
    /*
    $to = 'info@dental41.ru';
    $subject = 'Новая заявка с сайта';
    $message = "Имя: $name\nТелефон: $phone\nВремя: " . date('Y-m-d H:i:s');
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    wp_mail($to, $subject, $message, $headers);
    */
    
    // Переадресация на страницу благодарности
    wp_redirect(home_url('/spasibo-za-zayavku/'));
    exit;
    
} else {
    // Если форма не отправлена, перенаправляем на главную
    wp_redirect(home_url());
    exit;
}
?>
