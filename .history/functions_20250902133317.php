

/**
 * Обработчик формы CTA
 */
function handle_cta_form_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['phone'])) {
        
        // Проверяем nonce для безопасности
        if (!wp_verify_nonce($_POST['_wpnonce'], 'cta_form_nonce')) {
            wp_die('Ошибка безопасности');
        }
        
        $name = sanitize_text_field($_POST['name']);
        $phone = sanitize_text_field($_POST['phone']);
        
        // Проверяем, что поля не пустые
        if (empty($name) || empty($phone)) {
            wp_redirect(add_query_arg('cta_error', 'empty_fields', wp_get_referer()));
            exit;
        }
        
        // Настройки email
        $to = get_option('admin_email');
        $subject = 'Новая заявка на консультацию с сайта';
        $message = "Получена новая заявка на консультацию:\n\n";
        $message .= "Имя: " . $name . "\n";
        $message .= "Телефон: " . $phone . "\n";
        $message .= "Дата: " . date('d.m.Y H:i:s') . "\n";
        $message .= "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
        
        $headers = array('Content-Type: text/plain; charset=UTF-8');
        
        // Отправляем email
        $mail_sent = wp_mail($to, $subject, $message, $headers);
        
        if ($mail_sent) {
            // Сохраняем заявку в базе данных (опционально)
            $post_data = array(
                'post_title'    => 'Заявка от ' . $name,
                'post_content'  => "Имя: " . $name . "\nТелефон: " . $phone,
                'post_status'   => 'private',
                'post_type'     => 'post',
                'post_author'   => 1
            );
            
            $post_id = wp_insert_post($post_data);
            
            if ($post_id) {
                update_post_meta($post_id, '_cta_name', $name);
                update_post_meta($post_id, '_cta_phone', $phone);
                update_post_meta($post_id, '_cta_date', current_time('mysql'));
            }
            
            wp_redirect(add_query_arg('cta_success', '1', wp_get_referer()));
        } else {
            wp_redirect(add_query_arg('cta_error', 'mail_failed', wp_get_referer()));
        }
        exit;
    }
}
add_action('init', 'handle_cta_form_submission');

/**
 * Добавляем nonce в форму CTA
 */
function add_cta_form_nonce() {
    wp_nonce_field('cta_form_nonce', '_wpnonce');
}

/**
 * Показываем сообщения об успехе/ошибке
 */
function show_cta_form_messages() {
    if (isset($_GET['cta_success'])) {
        echo '<div class="cta-success-message" style="background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 10px 0; text-align: center;">';
        echo 'Спасибо! Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.';
        echo '</div>';
    }
    
    if (isset($_GET['cta_error'])) {
        $error_message = '';
        switch ($_GET['cta_error']) {
            case 'empty_fields':
                $error_message = 'Пожалуйста, заполните все поля.';
                break;
            case 'mail_failed':
                $error_message = 'Произошла ошибка при отправке. Попробуйте позже.';
                break;
            default:
                $error_message = 'Произошла ошибка. Попробуйте еще раз.';
        }
        
        echo '<div class="cta-error-message" style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 10px 0; text-align: center;">';
        echo $error_message;
        echo '</div>';
    }
}

// Подключение overrides.css для переопределения стилей
add_action('wp_enqueue_scripts', function () {
    // Наши оверрайды - ЗАВИСЯТ от child-style, грузятся ПОТОМ
    wp_enqueue_style(
        'custom-overrides',
        get_stylesheet_directory_uri() . '/overrides.css',
        ['child-style'],
        '1.0'
    );
}, 20); // приоритет повыше, чтобы точно было последним
