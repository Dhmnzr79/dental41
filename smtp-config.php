<?php
/**
 * Настройки SMTP для отправки email
 * Скопируйте этот файл и переименуйте в smtp-config-local.php
 * Заполните своими данными
 */

// Настройки SMTP для разных провайдеров
$smtp_configs = array(
    
    // Яндекс.Почта (рекомендуется для РФ)
    'yandex' => array(
        'host' => 'smtp.yandex.ru',
        'port' => 587,
        'encryption' => 'tls',
        'username' => 'denis.today@yandex.ru',
        'password' => 'your-app-password', // Используйте пароль приложения
        'from_email' => 'denis.today@yandex.ru',
        'from_name' => 'Сайт стоматологии'
    ),
    
    // Mail.ru
    'mailru' => array(
        'host' => 'smtp.mail.ru',
        'port' => 587,
        'encryption' => 'tls',
        'username' => 'your-email@mail.ru',
        'password' => 'your-password',
        'from_email' => 'your-email@mail.ru',
        'from_name' => 'Сайт стоматологии'
    ),
    
    // Gmail (может не работать в РФ)
    'gmail' => array(
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'encryption' => 'tls',
        'username' => 'your-email@gmail.com',
        'password' => 'your-app-password', // Используйте пароль приложения
        'from_email' => 'your-email@gmail.com',
        'from_name' => 'Сайт стоматологии'
    ),
    
    // Outlook/Hotmail
    'outlook' => array(
        'host' => 'smtp-mail.outlook.com',
        'port' => 587,
        'encryption' => 'tls',
        'username' => 'your-email@outlook.com',
        'password' => 'your-password',
        'from_email' => 'your-email@outlook.com',
        'from_name' => 'Сайт стоматологии'
    ),
    
    // SMTP хостинга (уточните у хостинг-провайдера)
    'hosting' => array(
        'host' => 'mail.your-hosting.com', // или smtp.your-hosting.com
        'port' => 587, // или 465, 25
        'encryption' => 'tls', // или 'ssl', 'none'
        'username' => 'your-email@your-domain.com',
        'password' => 'your-password',
        'from_email' => 'your-email@your-domain.com',
        'from_name' => 'Сайт стоматологии'
    )
);

// Выберите конфигурацию (по умолчанию Яндекс)
$active_config = 'yandex';

// Email для получения заявок
$to_email = 'info@dental41.ru'; // замените на нужный email

// Дополнительные настройки
$settings = array(
    'log_emails' => true, // Логировать отправку email
    'backup_email' => 'backup@dental41.ru', // Резервный email
    'max_attempts' => 3, // Максимум попыток отправки
    'timeout' => 30 // Таймаут в секундах
);

// Если есть локальный файл с настройками, подключаем его
if (file_exists(__DIR__ . '/smtp-config-local.php')) {
    include __DIR__ . '/smtp-config-local.php';
}
?>
