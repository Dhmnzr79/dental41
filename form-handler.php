<?php
/**
 * Обработчик формы заявки с поддержкой SMTP
 */

// Подключаем WordPress функции
require_once('../../../wp-config.php');

// Проверяем, что форма отправлена
if ($_POST && isset($_POST['name']) && isset($_POST['phone'])) {
    
    // Получаем данные из формы
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $message_text = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';
    $form_type = isset($_POST['form_type']) ? sanitize_text_field($_POST['form_type']) : 'Заявка с сайта';
    
    // Валидация
    if (empty($name) || empty($phone)) {
        wp_redirect(home_url('/?error=empty_fields'));
        exit;
    }
    
    // Загружаем настройки SMTP
    $smtp_config_file = __DIR__ . '/smtp-config.php';
    if (file_exists($smtp_config_file)) {
        include $smtp_config_file;
        $smtp_config = $smtp_configs[$active_config];
    } else {
        // Fallback настройки
        $smtp_config = array(
            'host' => 'smtp.yandex.ru',
            'port' => 587,
            'username' => 'denis.today@yandex.ru',
            'password' => 'your-password',
            'encryption' => 'tls',
            'from_email' => 'denis.today@yandex.ru',
            'from_name' => 'Сайт стоматологии'
        );
        $to_email = 'denis.today@yandex.ru';
    }
    
    // Формируем сообщение
    $subject = "Новая заявка: $form_type";
    $message = "
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>Новая заявка с сайта</title>
    </head>
    <body>
        <h2>Новая заявка с сайта</h2>
        <p><strong>Тип заявки:</strong> $form_type</p>
        <p><strong>Имя:</strong> $name</p>
        <p><strong>Телефон:</strong> $phone</p>";
    
    if (!empty($email)) {
        $message .= "<p><strong>Email:</strong> $email</p>";
    }
    
    if (!empty($message_text)) {
        $message .= "<p><strong>Сообщение:</strong> $message_text</p>";
    }
    
    $message .= "
        <p><strong>Время отправки:</strong> " . date('d.m.Y H:i:s') . "</p>
        <p><strong>IP адрес:</strong> " . $_SERVER['REMOTE_ADDR'] . "</p>
        <p><strong>User Agent:</strong> " . $_SERVER['HTTP_USER_AGENT'] . "</p>
    </body>
    </html>";
    
    // Отправляем email
    $email_sent = send_smtp_email($to_email, $subject, $message, $smtp_config);
    
    // Логируем результат
    error_log("Form submission: Name=$name, Phone=$phone, Email sent=" . ($email_sent ? 'YES' : 'NO'));
    
    // Переадресация на страницу благодарности
    wp_redirect(home_url('/spasibo-za-zayavku/'));
    exit;
    
} else {
    // Если форма не отправлена, перенаправляем на главную
    wp_redirect(home_url());
    exit;
}

/**
 * Функция отправки email через SMTP
 */
function send_smtp_email($to, $subject, $message, $config) {
    try {
        // Пытаемся отправить через SMTP
        if (function_exists('wp_mail')) {
            // Настраиваем SMTP для wp_mail
            add_action('phpmailer_init', function($phpmailer) use ($config) {
                $phpmailer->isSMTP();
                $phpmailer->Host = $config['host'];
                $phpmailer->SMTPAuth = true;
                $phpmailer->Port = $config['port'];
                $phpmailer->Username = $config['username'];
                $phpmailer->Password = $config['password'];
                $phpmailer->SMTPSecure = $config['encryption'];
                $phpmailer->From = $config['from_email'];
                $phpmailer->FromName = $config['from_name'];
                $phpmailer->CharSet = 'UTF-8';
            });
            
            $headers = array('Content-Type: text/html; charset=UTF-8');
            return wp_mail($to, $subject, $message, $headers);
        }
        
        // Если wp_mail недоступен, используем прямую отправку через SMTP
        return send_direct_smtp($to, $subject, $message, $config);
        
    } catch (Exception $e) {
        error_log("SMTP Error: " . $e->getMessage());
        return false;
    }
}

/**
 * Прямая отправка через SMTP (fallback)
 */
function send_direct_smtp($to, $subject, $message, $config) {
    $headers = "From: {$config['from_name']} <{$config['from_email']}>\r\n";
    $headers .= "Reply-To: {$config['from_email']}\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    // Простая отправка через mail() (может не работать на всех хостингах)
    return mail($to, $subject, $message, $headers);
}
?>
