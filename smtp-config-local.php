<?php
/**
 * Локальный файл с настройками SMTP для XAMPP
 */

// Переопределяем настройки SMTP
$smtp_configs['yandex'] = array(
    'host' => 'smtp.yandex.ru',
    'port' => 587,
    'encryption' => 'tls',
    'username' => 'denis.today@yandex.ru',
    'password' => 'yckweckkiymfxhwq', // Пароль приложения
    'from_email' => 'denis.today@yandex.ru',
    'from_name' => 'Стоматология Dental41'
);

// Выбираем активную конфигурацию
$active_config = 'yandex';

// Email для получения заявок
$to_email = 'denis.today@yandex.ru'; // Email для заявок

// Дополнительные настройки
$settings = array(
    'log_emails' => true,
    'backup_email' => 'denis.today@yandex.ru',
    'max_attempts' => 3,
    'timeout' => 30
);
?>
