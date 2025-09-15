<?php
/**
 * Тест отправки email через SMTP
 */

// Настройки SMTP
$smtp_config = array(
    'host' => 'smtp.yandex.ru',
    'port' => 587,
    'username' => 'denis.today@yandex.ru',
    'password' => 'yckweckkiymfxhwq',
    'encryption' => 'tls',
    'from_email' => 'denis.today@yandex.ru',
    'from_name' => 'Тест SMTP'
);

$to_email = 'denis.today@yandex.ru';
$subject = 'Тест отправки с XAMPP';
$message = 'Это тестовое письмо для проверки SMTP настроек.';

echo "<h2>Тест SMTP отправки</h2>";
echo "<p>Отправляем письмо на: $to_email</p>";

// Проверяем, есть ли WordPress функции
if (function_exists('wp_mail')) {
    echo "<p>WordPress функции доступны</p>";
    
    // Настраиваем SMTP для wp_mail
    add_action('phpmailer_init', function($phpmailer) use ($smtp_config) {
        $phpmailer->isSMTP();
        $phpmailer->Host = $smtp_config['host'];
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = $smtp_config['port'];
        $phpmailer->Username = $smtp_config['username'];
        $phpmailer->Password = $smtp_config['password'];
        $phpmailer->SMTPSecure = $smtp_config['encryption'];
        $phpmailer->From = $smtp_config['from_email'];
        $phpmailer->FromName = $smtp_config['from_name'];
        $phpmailer->CharSet = 'UTF-8';
    });
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $result = wp_mail($to_email, $subject, $message, $headers);
    
    if ($result) {
        echo "<p style='color: green;'>✅ Письмо отправлено успешно!</p>";
    } else {
        echo "<p style='color: red;'>❌ Ошибка отправки письма</p>";
    }
} else {
    echo "<p style='color: orange;'>⚠️ WordPress функции недоступны. Подключаем WordPress...</p>";
    
    // Подключаем WordPress
    require_once('../../../wp-config.php');
    
    if (function_exists('wp_mail')) {
        echo "<p>WordPress подключен успешно</p>";
        
        // Повторяем попытку отправки
        add_action('phpmailer_init', function($phpmailer) use ($smtp_config) {
            $phpmailer->isSMTP();
            $phpmailer->Host = $smtp_config['host'];
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = $smtp_config['port'];
            $phpmailer->Username = $smtp_config['username'];
            $phpmailer->Password = $smtp_config['password'];
            $phpmailer->SMTPSecure = $smtp_config['encryption'];
            $phpmailer->From = $smtp_config['from_email'];
            $phpmailer->FromName = $smtp_config['from_name'];
            $phpmailer->CharSet = 'UTF-8';
        });
        
        $headers = array('Content-Type: text/html; charset=UTF-8');
        $result = wp_mail($to_email, $subject, $message, $headers);
        
        if ($result) {
            echo "<p style='color: green;'>✅ Письмо отправлено успешно!</p>";
        } else {
            echo "<p style='color: red;'>❌ Ошибка отправки письма</p>";
        }
    } else {
        echo "<p style='color: red;'>❌ Не удалось подключить WordPress</p>";
    }
}

echo "<hr>";
echo "<p><strong>Настройки SMTP:</strong></p>";
echo "<ul>";
echo "<li>Host: " . $smtp_config['host'] . "</li>";
echo "<li>Port: " . $smtp_config['port'] . "</li>";
echo "<li>Username: " . $smtp_config['username'] . "</li>";
echo "<li>Encryption: " . $smtp_config['encryption'] . "</li>";
echo "</ul>";
?>
