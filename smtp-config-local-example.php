<?php
/**
 * Пример локального файла с настройками SMTP
 * Скопируйте этот файл в smtp-config-local.php и заполните своими данными
 */

// Переопределяем настройки SMTP
$smtp_configs['yandex'] = array(
    'host' => 'smtp.yandex.ru',
    'port' => 587,
    'encryption' => 'tls',
    'username' => 'denis.today@yandex.ru', // Ваш email
    'password' => 'your-app-password-here', // Пароль приложения
    'from_email' => 'denis.today@yandex.ru',
    'from_name' => 'Стоматология Dental41'
);

// Выбираем активную конфигурацию
$active_config = 'yandex';

// Email для получения заявок
$to_email = 'info@dental41.ru'; // Замените на ваш email

// Дополнительные настройки
$settings = array(
    'log_emails' => true,
    'backup_email' => 'admin@dental41.ru',
    'max_attempts' => 3,
    'timeout' => 30
);
?>
