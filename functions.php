<?php
/**
 * Functions for Dental Clinic Child Theme
 * 
 * Основные функции для детской темы стоматологической клиники
 */

// ВРЕМЕННЫЙ жёсткий бан IP 128.70/128.71
// Причина: новогодние каникулы, стабильный спам, нет рекламного трафика
// СНЯТЬ после праздников
define('TEMP_HARD_SPAM_BLOCK', true);

/**
 * Функция логирования блокировок
 */
function dental_clinic_log_block($ip, $reason, $user_agent = '') {
    $log_message = sprintf(
        '[%s] Blocked IP %s — %s | User-Agent: %s',
        date('Y-m-d H:i:s'),
        $ip,
        $reason,
        $user_agent ?: 'Unknown'
    );
    error_log($log_message);
}

/**
 * Инициализация глобального флага блокировки заявки
 * Используется только для логирования, НЕ для блокировки почтового пайплайна
 * Антиспам работает ТОЛЬКО через wpcf7_validate (invalidate)
 */
add_action('wpcf7_before_send_mail', function() {
    $GLOBALS['CF7_BLOCK_SUBMISSION'] = false;
    $GLOBALS['CF7_BLOCK_REASON'] = '';
}, 0, 0); // Приоритет 0 - самый ранний

/**
 * КРИТИЧНО: УБРАНЫ все фильтры wpcf7_skip_mail и wpcf7_abort_send_mail
 * Антиспам работает ТОЛЬКО через wpcf7_validate (invalidate)
 * Это гарантирует, что почтовый пайплайн CF7 НЕ нарушается для нормальных заявок
 */

/**
 * ВРЕМЕННЫЙ жёсткий бан IP 128.70/128.71 (через валидацию)
 * Причина: новогодние каникулы, стабильный спам, нет рекламного трафика
 * СНЯТЬ после праздников
 * Блокировка тихая (без сообщения пользователю) через invalidate скрытого поля
 */
add_filter('wpcf7_validate', function ($result, $tags) {
    if (!TEMP_HARD_SPAM_BLOCK) {
        return $result; // Временный режим отключен
    }
    
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    
    // Проверяем IP-диапазоны 128.70.0.0/16 и 128.71.0.0/16
    if ((strpos($ip, '128.70.') === 0) || (strpos($ip, '128.71.') === 0)) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'TEMP_HARD_IP_BLOCK';
        
        // Логируем блокировку
        dental_clinic_log_block($ip, 'TEMP_HARD_IP_BLOCK', $user_agent);
        
        // Invalidate через скрытое поле (тихая блокировка, без сообщения)
        $fake_tag = new WPCF7_FormTag(array(
            'type' => 'text',
            'name' => 'website-url',
            'basetype' => 'text'
        ));
        $result->invalidate($fake_tag, ''); // Пустое сообщение - тихая блокировка
    }
    
    return $result;
}, 0, 2); // Приоритет 0 - самый ранний

// Cookie Management Functions
function get_cookie_consent() {
    if (isset($_COOKIE['cookie_consent'])) {
        return json_decode(stripslashes($_COOKIE['cookie_consent']), true);
    }
    return null;
}

function set_cookie_consent($consent) {
    $consent_json = json_encode($consent);
    setcookie('cookie_consent', $consent_json, time() + (365 * 24 * 60 * 60), '/', '', false, true);
}

function has_cookie_consent($type = 'all') {
    $consent = get_cookie_consent();
    if (!$consent) return false;
    
    switch ($type) {
        case 'analytics':
            return $consent['analytics'] ?? false;
        case 'marketing':
            return $consent['marketing'] ?? false;
        case 'essential':
            return $consent['essential'] ?? true;
        case 'all':
        default:
            return ($consent['analytics'] ?? false) && ($consent['marketing'] ?? false);
    }
}


// Подключение скрипта для анимаций при скролле
// Старые скрипты перемещены в garbage/
// function dental_clinic_enqueue_scroll_animations() - удален
// function dental_clinic_enqueue_phone_mask() - удален
// function dental_clinic_enqueue_popup() - удален

function dental_clinic_enqueue_v2_works_slider() {
    if (!is_front_page() && !is_page_template('page-implantatsiya.php')) {
        return;
    }
    wp_enqueue_script(
        'dental-clinic-works-slider',
        get_stylesheet_directory_uri() . '/assets/js/works-slider.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_works_slider');

function dental_clinic_enqueue_v2_reviews_slider() {
    if (!is_front_page() && !is_page_template('page-implantatsiya.php')) {
        return;
    }
    wp_enqueue_script(
        'dental-clinic-reviews-slider',
        get_stylesheet_directory_uri() . '/assets/js/reviews-slider.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_reviews_slider');

function dental_clinic_enqueue_v2_header_menu() {
    // Загружаем скрипт на всех страницах, так как мобильное меню используется везде
    wp_enqueue_script(
        'dental-clinic-header-menu',
        get_stylesheet_directory_uri() . '/assets/js/header-menu.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_header_menu');

function dental_clinic_enqueue_v2_doctors_slider() {
    if (!is_front_page() && !is_page_template('page-implantatsiya.php')) {
        return;
    }
    wp_enqueue_script(
        'dental-clinic-doctors-slider',
        get_stylesheet_directory_uri() . '/assets/js/doctors-slider.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_doctors_slider');

function dental_clinic_enqueue_v2_implant_types() {
    if (!is_front_page() && !is_page_template('page-implantatsiya.php')) {
        return;
    }
    wp_enqueue_script(
        'dental-clinic-implant-types',
        get_stylesheet_directory_uri() . '/assets/js/implant-types.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_implant_types');

function dental_clinic_enqueue_v2_implants_slider() {
    if (!is_front_page() && !is_page_template('page-implantatsiya.php')) {
        return;
    }
    wp_enqueue_script(
        'dental-clinic-implants-slider',
        get_stylesheet_directory_uri() . '/assets/js/implants-slider.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_implants_slider');

function dental_clinic_enqueue_v2_plus_video() {
    if (is_front_page()) {
        wp_enqueue_script(
            'dental-clinic-plus-video',
            get_stylesheet_directory_uri() . '/assets/js/plus-video.js',
            array(),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_plus_video');

function dental_clinic_enqueue_v2_faq() {
    if (!is_page_template('page-implantatsiya.php')) {
        return;
    }
    wp_enqueue_script(
        'dental-clinic-faq',
        get_stylesheet_directory_uri() . '/assets/js/faq.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_faq');

function dental_clinic_enqueue_phone_mask() {
    // Подключаем маску телефона на всех страницах для всех форм
    wp_enqueue_script(
        'dental-clinic-phone-mask',
        get_stylesheet_directory_uri() . '/assets/js/phone-mask.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_phone_mask');

function dental_clinic_enqueue_v2_trust_video() {
    if (!is_front_page() && !is_page_template('page-implantatsiya.php')) {
        return;
    }
    wp_enqueue_script(
        'dental-clinic-trust-video',
        get_stylesheet_directory_uri() . '/assets/js/trust-video.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_v2_trust_video');

function dental_clinic_enqueue_video_lightbox() {
    // Подключаем на всех страницах, скрипт сам проверит наличие кнопок видео
    wp_enqueue_script(
        'dental-clinic-video-lightbox',
        get_stylesheet_directory_uri() . '/assets/js/video-lightbox.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_video_lightbox');

function dental_clinic_enqueue_popup() {
    // Подключаем скрипт попапов на всех страницах
    wp_enqueue_script(
        'dental-clinic-popup',
        get_stylesheet_directory_uri() . '/assets/js/popup.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_popup');

/**
 * Добавляем defer для всех наших JS скриптов для оптимизации PageSpeed
 */
function dental_clinic_add_defer_to_scripts($tag, $handle, $src) {
    // Список наших скриптов, которым нужен defer
    $defer_scripts = array(
        'dental-clinic-works-slider',
        'dental-clinic-reviews-slider',
        'dental-clinic-header-menu',
        'dental-clinic-doctors-slider',
        'dental-clinic-implant-types',
        'dental-clinic-implants-slider',
        'dental-clinic-plus-video',
        'dental-clinic-faq',
        'dental-clinic-phone-mask',
        'dental-clinic-trust-video',
        'dental-clinic-video-lightbox',
        'dental-clinic-popup'
    );
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'dental_clinic_add_defer_to_scripts', 10, 3);

/**
 * Отключение лишних функций WordPress для оптимизации PageSpeed
 */
// Отключаем emoji скрипты и стили
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

// Отключаем embed скрипты
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('rest_api_init', 'wp_oembed_register_route');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

// Отключаем XML-RPC (если не используется)
add_filter('xmlrpc_enabled', '__return_false');

// Отключаем jQuery migrate (если jQuery не используется)
function dental_clinic_remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}
add_action('wp_default_scripts', 'dental_clinic_remove_jquery_migrate');

// Отключаем лишние CSS ядра WordPress на фронте
function dental_clinic_remove_wp_block_library() {
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-block-style');
        wp_dequeue_style('global-styles');
        wp_dequeue_style('classic-theme-styles');
    }
}
add_action('wp_enqueue_scripts', 'dental_clinic_remove_wp_block_library', 100);

// Отключаем dashicons на фронте (если не нужны)
function dental_clinic_remove_dashicons() {
    if (!is_admin()) {
        wp_deregister_style('dashicons');
    }
}
add_action('wp_enqueue_scripts', 'dental_clinic_remove_dashicons');

// Отключаем admin bar CSS на фронте
add_filter('show_admin_bar', '__return_false');

/**
 * Асинхронная загрузка CSS для оптимизации PageSpeed
 */
function dental_clinic_async_load_css($tag, $handle, $href) {
    // Список CSS файлов для асинхронной загрузки (кроме critical)
    $async_styles = array(
        'base',
        'layout',
        'ui',
        'components',
        'pages-blog',
        'pages-doctors',
        'pages'
    );
    
    /**
     * IMPORTANT (FOUC protection on hard refresh):
     * `media="print"` async CSS can cause a flash of unstyled content (white screen / unstyled HTML)
     * on hard refresh (Ctrl+F5). To keep the first render stable on the homepage, we keep the core
     * CSS render-blocking there.
     *
     * Note: this exception is intentionally limited to the homepage so the optimization stays active elsewhere.
     */
    if (is_front_page() && in_array($handle, array('base', 'layout', 'ui', 'components'), true)) {
        return $tag;
    }

    if (in_array($handle, $async_styles)) {
        // Заменяем обычную загрузку на асинхронную через media="print" trick
        // Обрабатываем оба варианта кавычек
        if (strpos($tag, "rel='stylesheet'") !== false) {
            return str_replace(
                "rel='stylesheet'",
                "rel='stylesheet' media='print' onload=\"this.media='all'\"",
                $tag
            ) . '<noscript>' . $tag . '</noscript>';
        } elseif (strpos($tag, 'rel="stylesheet"') !== false) {
            return str_replace(
                'rel="stylesheet"',
                'rel="stylesheet" media="print" onload="this.media=\'all\'"',
                $tag
            ) . '<noscript>' . $tag . '</noscript>';
        }
    }
    
    return $tag;
}
add_filter('style_loader_tag', 'dental_clinic_async_load_css', 10, 3);

/**
 * Полное отключение Swiper (он не используется в теме)
 * Все слайдеры написаны на чистом JS без Swiper
 */
function dental_clinic_disable_swiper() {
    if (!is_admin()) {
        // Отключаем Swiper CSS и JS если они подключены родительской темой или плагином
        wp_deregister_style('swiper');
        wp_deregister_style('swiper-bundle');
        wp_deregister_style('swiper-css');
        wp_dequeue_style('swiper');
        wp_dequeue_style('swiper-bundle');
        wp_dequeue_style('swiper-css');
        
        wp_deregister_script('swiper');
        wp_deregister_script('swiper-bundle');
        wp_deregister_script('swiper-js');
        wp_dequeue_script('swiper');
        wp_dequeue_script('swiper-bundle');
        wp_dequeue_script('swiper-js');
    }
}
add_action('wp_enqueue_scripts', 'dental_clinic_disable_swiper', 999);

/**
 * Удаление Swiper из HTML через output buffering (если подключен inline)
 */
function dental_clinic_remove_swiper_output_buffer() {
    ob_start(function($buffer) {
        // Удаляем любые inline подключения Swiper
        $buffer = preg_replace('/<script[^>]*swiper[^>]*>.*?<\/script>/is', '', $buffer);
        $buffer = preg_replace('/<link[^>]*swiper[^>]*>/i', '', $buffer);
        return $buffer;
    });
}
add_action('template_redirect', 'dental_clinic_remove_swiper_output_buffer', 1);
add_action('shutdown', function() {
    if (ob_get_level() > 0) {
        ob_end_flush();
    }
}, 999);

/**
 * Полное отключение CF7 и reCAPTCHA
 * КРИТИЧНО: reCAPTCHA блокирует LCP (~700 KB JS) - это приоритет №1
 */
// Полностью запрещаем CF7 и reCAPTCHA грузиться
// ❌ УБРАНО: отключение всего JS/CSS CF7 ломает AJAX и time-based защиту
// add_filter('wpcf7_load_js', '__return_false');
// add_filter('wpcf7_load_css', '__return_false');

// ✅ ПРАВКА №2: Отключаем ТОЛЬКО reCAPTCHA CF7 (не весь JS)
add_filter('wpcf7_load_recaptcha', '__return_false');
add_filter('wpcf7_use_recaptcha', '__return_false');

add_action('wp_enqueue_scripts', function () {
    wp_dequeue_script('google-recaptcha');
    wp_deregister_script('google-recaptcha');

    wp_dequeue_script('wpcf7-recaptcha');
    wp_deregister_script('wpcf7-recaptcha');
}, 100);

/**
 * ПРАВКА №1: Гарантированно скрыть honeypot через inline CSS
 * Работает всегда, не зависит от темы и кэша
 */
add_action('wp_head', function () {
    echo '<style>
        .hidden-fields-container {
            display: none !important;
            visibility: hidden !important;
            height: 0 !important;
            overflow: hidden !important;
        }
    </style>';
}, 999);

/**
 * 1️⃣ Honeypot защита от спама для всех форм Contact Form 7
 * Автоматически добавляет скрытое поле ко всем формам
 * Поле имеет правдоподобное имя, чтобы не привлекать внимание ботов
 */
// 1. Добавляем honeypot поле программно ко всем формам CF7
add_filter('wpcf7_form_elements', function ($content) {
    $honeypot = '<span class="hidden-fields-container">
        <input type="text" name="website-url" value="" tabindex="-1" autocomplete="off">
    </span>';

    return $content . $honeypot;
});

// 2. Серверная проверка honeypot поля (молча отклоняем через валидацию)
add_filter('wpcf7_validate', function ($result, $tags) {
    if (!empty($_POST['website-url'])) {
        // Honeypot заполнен - блокируем через валидацию (тихо, без сообщения)
        // Используем honeypot поле для invalidate, чтобы не показывать ошибку пользователю
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'HONEYPOT_FILLED';
        
        // Логируем блокировку
        $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
        dental_clinic_log_block($ip, 'HONEYPOT_FILLED', $user_agent);
        
        // Invalidate через скрытое поле (пользователь не увидит ошибку)
        $fake_tag = new WPCF7_FormTag(array(
            'type' => 'text',
            'name' => 'website-url',
            'basetype' => 'text'
        ));
        $result->invalidate($fake_tag, ''); // Пустое сообщение - тихая блокировка
    }
    return $result;
}, 1, 2); // Приоритет 1 - проверяем первым

/**
 * 2️⃣ Одноразовый server-token формы (ключевой слой защиты)
 * Генерируется при рендере формы, привязан к IP, TTL 15 минут
 * После использования инвалидируется
 */
// Генерация и добавление токена в форму
add_filter('wpcf7_form_elements', function ($content) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $token = wp_generate_password(32, false);
    $token_key = 'cf7_token_' . md5($ip . $token);
    
    // Сохраняем токен в transient на 15 минут (900 секунд)
    set_transient($token_key, array(
        'ip' => $ip,
        'created' => time(),
        'used' => false
    ), 900);
    
    $token_field = '<input type="hidden" name="form_token" value="' . esc_attr($token) . '">';
    return $content . $token_field;
});

// Проверка токена при отправке формы (через валидацию)
add_filter('wpcf7_validate', function ($result, $tags) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $submitted_token = $_POST['form_token'] ?? '';
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    
    if (empty($submitted_token)) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'MISSING_TOKEN';
        dental_clinic_log_block($ip, 'MISSING_TOKEN', $user_agent);
        $fake_tag = new WPCF7_FormTag(array('type' => 'text', 'name' => 'form_token', 'basetype' => 'text'));
        $result->invalidate($fake_tag, '');
        return $result;
    }
    
    $token_key = 'cf7_token_' . md5($ip . $submitted_token);
    $token_data = get_transient($token_key);
    
    if (!$token_data) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'INVALID_TOKEN';
        dental_clinic_log_block($ip, 'INVALID_TOKEN', $user_agent);
        $fake_tag = new WPCF7_FormTag(array('type' => 'text', 'name' => 'form_token', 'basetype' => 'text'));
        $result->invalidate($fake_tag, '');
        return $result;
    }
    
    if ($token_data['used'] === true) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'TOKEN_REUSED';
        dental_clinic_log_block($ip, 'TOKEN_REUSED', $user_agent);
        $fake_tag = new WPCF7_FormTag(array('type' => 'text', 'name' => 'form_token', 'basetype' => 'text'));
        $result->invalidate($fake_tag, '');
        return $result;
    }
    
    if ($token_data['ip'] !== $ip) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'TOKEN_IP_MISMATCH';
        dental_clinic_log_block($ip, 'TOKEN_IP_MISMATCH', $user_agent);
        $fake_tag = new WPCF7_FormTag(array('type' => 'text', 'name' => 'form_token', 'basetype' => 'text'));
        $result->invalidate($fake_tag, '');
        return $result;
    }
    
    // Токен валиден - помечаем как использованный
    $token_data['used'] = true;
    set_transient($token_key, $token_data, 900);
    
    return $result;
}, 2, 2); // Приоритет 2 - проверяем после honeypot

/**
 * 3️⃣ Time-based защита от спама (мягкая)
 * Фиксирует момент появления формы, проверяет скорость заполнения
 * < 4-5 сек → +1 к spam-score (не используется как единственный блок)
 */
// Добавляем скрытое поле времени загрузки формы
add_filter('wpcf7_form_elements', function ($content) {
    $time_field = '<input type="hidden" name="form_loaded_time" value="">';
    return $content . $time_field;
});

// Инициализация spam-score для текущей заявки
// Используем глобальную переменную, так как static не работает в контексте WordPress hooks
function dental_clinic_get_spam_score() {
    global $dental_clinic_spam_score;
    return isset($dental_clinic_spam_score) ? $dental_clinic_spam_score : 0;
}

function dental_clinic_add_spam_score($points = 1) {
    global $dental_clinic_spam_score;
    if (!isset($dental_clinic_spam_score)) {
        $dental_clinic_spam_score = 0;
    }
    $dental_clinic_spam_score += $points;
    return $dental_clinic_spam_score;
}

function dental_clinic_reset_spam_score() {
    global $dental_clinic_spam_score;
    $dental_clinic_spam_score = 0;
}

// Серверная проверка времени заполнения формы (мягкая)
add_action('wpcf7_before_send_mail', function ($contact_form) {
    $submitted = intval($_POST['form_loaded_time'] ?? 0);
    if ($submitted) {
        $time_diff = (time() * 1000) - $submitted;
        // Если форма заполнена менее чем за 4 секунды - добавляем к score
        if ($time_diff < 4000) {
            dental_clinic_add_spam_score(1);
        }
    }
}, 10, 1);

/**
 * Нормализация номера телефона в формат +7XXXXXXXXXX
 */
function dental_clinic_normalize_phone($phone) {
    if (empty($phone)) {
        return '';
    }
    
    // Удаляем все нецифровые символы
    $digits = preg_replace('/\D/', '', $phone);
    
    // Нормализуем: если начинается с 8, заменяем на 7
    if (substr($digits, 0, 1) === '8') {
        $digits = '7' . substr($digits, 1);
    }
    
    // Если не начинается с 7, добавляем 7
    if (substr($digits, 0, 1) !== '7' && !empty($digits)) {
        $digits = '7' . $digits;
    }
    
    // Ограничиваем длину до 11 цифр (7 + 10 цифр)
    $digits = substr($digits, 0, 11);
    
    // Проверяем минимальную длину (7 + минимум 10 цифр)
    if (strlen($digits) < 11) {
        return '';
    }
    
    return '+' . $digits;
}

/**
 * 4️⃣ Антидубликат по телефону (ключевой бизнес-слой)
 * Проверяет, не отправлял ли этот телефон заявку ранее
 * Если телефон уже есть → показываем сообщение, новый лид НЕ создаётся
 */
add_filter('wpcf7_validate', function ($result, $tags) {
    // Получаем телефон из разных возможных полей
    $phone = '';
    $phone_fields = array('your-phone', 'tel', 'phone', 'telephone', 'your-tel');
    $phone_field_name = '';
    
    foreach ($phone_fields as $field) {
        if (!empty($_POST[$field])) {
            $phone = $_POST[$field];
            $phone_field_name = $field;
            break;
        }
    }
    
    if (empty($phone)) {
        return $result; // Телефон не указан, пропускаем проверку
    }
    
    // Нормализуем телефон
    $normalized_phone = dental_clinic_normalize_phone($phone);
    
    if (empty($normalized_phone)) {
        return $result; // Не удалось нормализовать, пропускаем
    }
    
    // Проверяем, есть ли этот телефон в базе отправленных заявок
    $submitted_phones = get_option('dental_clinic_submitted_phones', array());
    
    if (in_array($normalized_phone, $submitted_phones)) {
        // Телефон уже есть - показываем сообщение и не создаём лид
        // Устанавливаем флаг блокировки (чтобы письмо не отправлялось)
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'DUPLICATE_PHONE';
        
        // Ищем тег телефона для добавления ошибки
        foreach ($tags as $tag) {
            if ($tag->name === $phone_field_name || 
                (empty($phone_field_name) && in_array($tag->type, array('tel', 'text*')))) {
                $result->invalidate($tag, 'Вы уже отправляли заявку. Мы скоро свяжемся с вами.');
                break;
            }
        }
        
        // Если не нашли тег, добавляем общую ошибку
        if ($result->is_valid()) {
            // Создаём фиктивный тег для ошибки
            $fake_tag = new WPCF7_FormTag(array(
                'type' => 'tel',
                'name' => $phone_field_name ?: 'your-phone',
                'basetype' => 'tel'
            ));
            $result->invalidate($fake_tag, 'Вы уже отправляли заявку. Мы скоро свяжемся с вами.');
        }
        
        return $result;
    }
    
    // Телефон новый - добавляем в список (сохраняем последние 1000 телефонов)
    $submitted_phones[] = $normalized_phone;
    if (count($submitted_phones) > 1000) {
        // Оставляем только последние 1000
        $submitted_phones = array_slice($submitted_phones, -1000);
    }
    update_option('dental_clinic_submitted_phones', $submitted_phones);
    
    return $result;
}, 10, 2);

/**
 * 5️⃣ IP + телефон (жёсткий дубль)
 * Если IP + телефон совпадают и интервал < 60 сек → отклонение через валидацию (тихо)
 */
add_filter('wpcf7_validate', function ($result, $tags) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    
    // Получаем телефон
    $phone = '';
    $phone_fields = array('your-phone', 'tel', 'phone', 'telephone', 'your-tel');
    
    foreach ($phone_fields as $field) {
        if (!empty($_POST[$field])) {
            $phone = $_POST[$field];
            break;
        }
    }
    
    if (empty($phone)) {
        return $result; // Телефон не указан, пропускаем
    }
    
    // Нормализуем телефон
    $normalized_phone = dental_clinic_normalize_phone($phone);
    
    if (empty($normalized_phone)) {
        return $result; // Не удалось нормализовать, пропускаем
    }
    
    // Создаём ключ для комбинации IP + телефон
    $combo_key = 'cf7_ip_phone_' . md5($ip . $normalized_phone);
    $last_submission = get_transient($combo_key);
    
    if ($last_submission !== false) {
        // Уже была отправка с этого IP + телефона
        $time_diff = time() - $last_submission;
        
        if ($time_diff < 60) {
            // Менее 60 секунд - блокируем через валидацию (тихо)
            $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
            $GLOBALS['CF7_BLOCK_REASON'] = 'IP_PHONE_DUPLICATE';
            
            $fake_tag = new WPCF7_FormTag(array(
                'type' => 'text',
                'name' => 'website-url',
                'basetype' => 'text'
            ));
            $result->invalidate($fake_tag, ''); // Пустое сообщение - тихая блокировка
            return $result;
        }
    }
    
    // Сохраняем время текущей отправки (TTL 60 секунд)
    set_transient($combo_key, time(), 60);
    
    return $result;
}, 4, 2); // Приоритет 4 - после антидубликата

/**
 * 6️⃣ Rate limiting (Камчатка) - через валидацию
 * Лимиты:
 * - 1 заявка / 3 мин / IP
 * - 2 заявки / 30 мин / IP
 */
add_filter('wpcf7_validate', function ($result, $tags) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    
    // Проверка 1: 1 заявка за 3 минуты
    $key_3min = 'cf7_rate_3min_' . md5($ip);
    $count_3min = get_transient($key_3min) ?: 0;
    
    if ($count_3min >= 1) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'RATE_LIMIT_3MIN';
        
        // Показываем сообщение пользователю
        $fake_tag = new WPCF7_FormTag(array(
            'type' => 'text',
            'name' => 'your-name',
            'basetype' => 'text'
        ));
        $result->invalidate($fake_tag, 'Слишком много запросов. Пожалуйста, попробуйте позже.');
        return $result;
    }
    
    // Проверка 2: 2 заявки за 30 минут
    $key_30min = 'cf7_rate_30min_' . md5($ip);
    $count_30min = get_transient($key_30min) ?: 0;
    
    if ($count_30min >= 2) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'RATE_LIMIT_30MIN';
        
        // Показываем сообщение пользователю
        $fake_tag = new WPCF7_FormTag(array(
            'type' => 'text',
            'name' => 'your-name',
            'basetype' => 'text'
        ));
        $result->invalidate($fake_tag, 'Слишком много запросов. Пожалуйста, попробуйте позже.');
        return $result;
    }
    
    // Увеличиваем счётчики только если валидация прошла
    if ($result->is_valid()) {
        set_transient($key_3min, $count_3min + 1, 180); // 3 минуты = 180 секунд
        set_transient($key_30min, $count_30min + 1, 1800); // 30 минут = 1800 секунд
    }
    
    return $result;
}, 5, 2); // Приоритет 5, чтобы выполнялось раньше других проверок

/**
 * Получение DEF-кода из нормализованного телефона
 * Формат: +7XXXXXXXXXX -> DEF = XXX (первые 3 цифры после 7)
 */
function dental_clinic_get_def_code($normalized_phone) {
    if (empty($normalized_phone) || strlen($normalized_phone) < 5) {
        return '';
    }
    
    // Убираем +7 и берём первые 3 цифры
    $digits = substr($normalized_phone, 2); // Убираем +7
    $def = substr($digits, 0, 3);
    
    // Также проверяем 4-значный DEF (первые 4 цифры)
    $def_4 = substr($digits, 0, 4);
    
    return array('def3' => $def, 'def4' => $def_4);
}

/**
 * 7️⃣ DEF-коды (мягкий региональный сигнал)
 * Белый список камчатских DEF-кодов
 * DEF ∈ Камчатка → 0 (не добавляем к score)
 * DEF ∉ Камчатка → +1 к spam-score
 * ❌ Никогда не блокировать только по DEF
 */
add_action('wpcf7_before_send_mail', function ($contact_form) {
    // Получаем телефон
    $phone = '';
    $phone_fields = array('your-phone', 'tel', 'phone', 'telephone', 'your-tel');
    
    foreach ($phone_fields as $field) {
        if (!empty($_POST[$field])) {
            $phone = $_POST[$field];
            break;
        }
    }
    
    if (empty($phone)) {
        return; // Телефон не указан, пропускаем
    }
    
    // Нормализуем телефон
    $normalized_phone = dental_clinic_normalize_phone($phone);
    
    if (empty($normalized_phone)) {
        return; // Не удалось нормализовать, пропускаем
    }
    
    // Получаем DEF-код
    $def_data = dental_clinic_get_def_code($normalized_phone);
    
    if (empty($def_data['def3']) && empty($def_data['def4'])) {
        return; // Не удалось извлечь DEF
    }
    
    // Белый список камчатских мобильных DEF-кодов (3-значные)
    // Проверено на повторы, оставлены только уникальные
    $kamchatka_def_codes = array(
        '900', // МТС
        '901', // МТС
        '902', // МТС
        '908', // МТС
        '909', // МТС
        '914', // МТС
        '924', // МТС
        '951', // МТС
        '958', // МТС
        '961', // МТС
        '962', // МТС
        '963', // МТС
        '967', // МТС
        '984', // МТС
        '991', // МТС
        '993', // МТС
        '994', // МТС
        '995', // МТС
        '996', // МТС
        '999', // МТС
    );
    
    // Проверяем 4-значный DEF сначала (более специфичный)
    $is_kamchatka = false;
    if (!empty($def_data['def4']) && in_array($def_data['def4'], $kamchatka_def_codes)) {
        $is_kamchatka = true;
    } elseif (!empty($def_data['def3']) && in_array($def_data['def3'], $kamchatka_def_codes)) {
        $is_kamchatka = true;
    }
    
    // Если DEF не из Камчатки - добавляем к spam-score
    if (!$is_kamchatka) {
        dental_clinic_add_spam_score(1);
    }
}, 10, 1);

/**
 * Проверка, входит ли IP в подозрительный диапазон
 */
function dental_clinic_is_suspicious_ip($ip) {
    // Подозрительные диапазоны: 128.70.x.x и 128.71.x.x
    $suspicious_ranges = array(
        '128.70.',
        '128.71.',
    );
    
    foreach ($suspicious_ranges as $range) {
        if (strpos($ip, $range) === 0) {
            return true;
        }
    }
    
    return false;
}

/**
 * 8️⃣ Подозрительные IP-диапазоны (128.70 / 128.71) - через валидацию
 * IP ∈ диапазон → лимит 1 заявка / 12 часов
 * Лучше ограничение, чем полный бан
 */
add_filter('wpcf7_validate', function ($result, $tags) {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    
    if (!dental_clinic_is_suspicious_ip($ip)) {
        return $result; // IP не в подозрительном диапазоне
    }
    
    // Для подозрительных IP - жёсткий лимит: 1 заявка / 12 часов
    $key_suspicious = 'cf7_suspicious_' . md5($ip);
    $count_suspicious = get_transient($key_suspicious) ?: 0;
    
    if ($count_suspicious >= 1) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'SUSPICIOUS_IP_LIMIT';
        
        // Показываем сообщение пользователю
        $fake_tag = new WPCF7_FormTag(array(
            'type' => 'text',
            'name' => 'your-name',
            'basetype' => 'text'
        ));
        $result->invalidate($fake_tag, 'Слишком много запросов. Пожалуйста, попробуйте позже.');
        return $result;
    }
    
    // Увеличиваем счётчик только если валидация прошла
    if ($result->is_valid()) {
        set_transient($key_suspicious, $count_suspicious + 1, 43200); // 12 часов = 43200 секунд
        // Также добавляем к spam-score для дополнительной проверки
        dental_clinic_add_spam_score(2);
    }
    
    return $result;
}, 6, 2); // Приоритет 6 - после rate limiting

/**
 * Нормализация User-Agent для fingerprint
 */
function dental_clinic_normalize_user_agent($user_agent) {
    if (empty($user_agent)) {
        return '';
    }
    
    // Убираем версии браузеров для более стабильного fingerprint
    $normalized = preg_replace('/\d+\.\d+\.\d+/', 'X.X.X', $user_agent);
    $normalized = preg_replace('/\d+\.\d+/', 'X.X', $normalized);
    
    return $normalized;
}

/**
 * Получение IP /24 (первые 3 октета)
 */
function dental_clinic_get_ip_24($ip) {
    if (empty($ip) || $ip === '0.0.0.0') {
        return '';
    }
    
    // Для IPv4 берём первые 3 октета
    $parts = explode('.', $ip);
    if (count($parts) >= 3) {
        return $parts[0] . '.' . $parts[1] . '.' . $parts[2];
    }
    
    return $ip;
}

/**
 * Генерация server-side fingerprint
 */
function dental_clinic_generate_fingerprint() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $accept_language = $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '';
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    
    $normalized_ua = dental_clinic_normalize_user_agent($user_agent);
    $ip_24 = dental_clinic_get_ip_24($ip);
    
    // Создаём fingerprint из нормализованных данных
    $fingerprint_data = array(
        'ua' => $normalized_ua,
        'lang' => substr($accept_language, 0, 10), // Первые 10 символов языка
        'ip24' => $ip_24
    );
    
    return md5(serialize($fingerprint_data));
}

/**
 * 9️⃣ Server-side fingerprint (без JS)
 * Использует: User-Agent (нормализованный), Accept-Language, IP /24
 * Логика: одинаковый fingerprint + разные телефоны → усиление ограничений
 */
add_action('wpcf7_before_send_mail', function ($contact_form) {
    // Получаем телефон
    $phone = '';
    $phone_fields = array('your-phone', 'tel', 'phone', 'telephone', 'your-tel');
    
    foreach ($phone_fields as $field) {
        if (!empty($_POST[$field])) {
            $phone = $_POST[$field];
            break;
        }
    }
    
    if (empty($phone)) {
        return; // Телефон не указан, пропускаем
    }
    
    // Нормализуем телефон
    $normalized_phone = dental_clinic_normalize_phone($phone);
    
    if (empty($normalized_phone)) {
        return; // Не удалось нормализовать, пропускаем
    }
    
    // Генерируем fingerprint
    $fingerprint = dental_clinic_generate_fingerprint();
    
    if (empty($fingerprint)) {
        return; // Не удалось создать fingerprint
    }
    
    // Получаем историю fingerprint
    $fingerprint_key = 'cf7_fingerprint_' . $fingerprint;
    $fingerprint_data = get_transient($fingerprint_key);
    
    if ($fingerprint_data !== false && is_array($fingerprint_data)) {
        // Fingerprint уже встречался
        $phones = $fingerprint_data['phones'] ?? array();
        
        if (!in_array($normalized_phone, $phones)) {
            // Одинаковый fingerprint, но другой телефон - подозрительно
            dental_clinic_add_spam_score(2);
            
            // Если уже было 2+ разных телефона с этим fingerprint - усиленное ограничение
            if (count($phones) >= 2) {
                dental_clinic_add_spam_score(3); // Дополнительные очки
            }
        }
        
        // Добавляем текущий телефон в список (если его ещё нет)
        if (!in_array($normalized_phone, $phones)) {
            $phones[] = $normalized_phone;
        }
        
        $fingerprint_data['phones'] = $phones;
        $fingerprint_data['count'] = ($fingerprint_data['count'] ?? 0) + 1;
    } else {
        // Первое появление этого fingerprint
        $fingerprint_data = array(
            'phones' => array($normalized_phone),
            'count' => 1,
            'first_seen' => time()
        );
    }
    
    // Сохраняем fingerprint (TTL 7 дней для отслеживания паттернов)
    set_transient($fingerprint_key, $fingerprint_data, 604800); // 7 дней
}, 10, 1);

/**
 * 🔟 Серверная валидация (обязательная) - через валидацию
 * User-Agent обязателен
 * Имя: 2–100 символов, URL → ❌ блок
 * Email: кириллица → ❌ блок
 * Сообщение: ограничение длины
 */
add_filter('wpcf7_validate', function ($result, $tags) {
    $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    
    // Проверка User-Agent (обязателен)
    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'MISSING_USER_AGENT';
        $fake_tag = new WPCF7_FormTag(array('type' => 'text', 'name' => 'website-url', 'basetype' => 'text'));
        $result->invalidate($fake_tag, ''); // Тихая блокировка
        return $result;
    }

    // Проверка имени
    if (!empty($_POST['your-name'])) {
        $name = trim($_POST['your-name']);
        $name_length = strlen($name);
        
        // Длина: 2–100 символов
        if ($name_length < 2 || $name_length > 100) {
            $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
            $GLOBALS['CF7_BLOCK_REASON'] = 'INVALID_NAME_LENGTH';
            $fake_tag = new WPCF7_FormTag(array('type' => 'text', 'name' => 'your-name', 'basetype' => 'text'));
            $result->invalidate($fake_tag, ''); // Тихая блокировка
            return $result;
        }
        
        // URL в имени → блок
        if (preg_match('/https?:\/\//i', $name)) {
            $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
            $GLOBALS['CF7_BLOCK_REASON'] = 'URL_IN_NAME';
            $fake_tag = new WPCF7_FormTag(array('type' => 'text', 'name' => 'your-name', 'basetype' => 'text'));
            $result->invalidate($fake_tag, ''); // Тихая блокировка
            return $result;
        }
    }

    // Проверка email
    if (!empty($_POST['your-email'])) {
        $email = trim($_POST['your-email']);
        
        // Кириллица в email → блок
        if (preg_match('/[а-яё]/iu', $email)) {
            $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
            $GLOBALS['CF7_BLOCK_REASON'] = 'CYRILLIC_IN_EMAIL';
            $fake_tag = new WPCF7_FormTag(array('type' => 'email', 'name' => 'your-email', 'basetype' => 'email'));
            $result->invalidate($fake_tag, ''); // Тихая блокировка
            return $result;
        }
    }

    // Проверка длины сообщения
    if (!empty($_POST['your-message'])) {
        $message = trim($_POST['your-message']);
        $message_length = strlen($message);
        
        // Ограничение длины (5000 символов)
        if ($message_length > 5000) {
            $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
            $GLOBALS['CF7_BLOCK_REASON'] = 'MESSAGE_TOO_LONG';
            $fake_tag = new WPCF7_FormTag(array('type' => 'textarea', 'name' => 'your-message', 'basetype' => 'textarea'));
            $result->invalidate($fake_tag, ''); // Тихая блокировка
            return $result;
        }
    }
    
    return $result;
}, 10, 2);

/**
 * Финальная проверка spam-score - через валидацию
 * Если score превышает порог - блокируем заявку
 */
add_filter('wpcf7_validate', function ($result, $tags) {
    $spam_score = dental_clinic_get_spam_score();
    
    // Порог блокировки: 5 очков
    // Это означает несколько подозрительных сигналов одновременно
    if ($spam_score >= 5) {
        $GLOBALS['CF7_BLOCK_SUBMISSION'] = true;
        $GLOBALS['CF7_BLOCK_REASON'] = 'HIGH_SPAM_SCORE';
        
        // Тихая блокировка через валидацию
        $fake_tag = new WPCF7_FormTag(array(
            'type' => 'text',
            'name' => 'website-url',
            'basetype' => 'text'
        ));
        $result->invalidate($fake_tag, ''); // Пустое сообщение - тихая блокировка
        return $result;
    }
    
    // Сбрасываем score после проверки
    dental_clinic_reset_spam_score();
    
    return $result;
}, 999, 2); // Приоритет 999 - проверяем последним, после всех других проверок

// Инициализируем score в начале обработки формы
add_action('wpcf7_before_send_mail', function () {
    dental_clinic_reset_spam_score();
}, 0, 0); // Приоритет 0 - самый первый

/**
 * Блокировка Inter-Variable шрифта (подключается родительской темой или плагином)
 * КРИТИЧНО: Inter-Variable блокирует FCP
 */
add_action('wp_enqueue_scripts', function () {
    // Удаляем все стили, связанные с Inter-Variable
    global $wp_styles;
    if (isset($wp_styles->registered)) {
        foreach ($wp_styles->registered as $handle => $style) {
            if (isset($style->src) && (strpos($style->src, 'Inter-Var') !== false || 
                strpos($style->src, 'inter-var') !== false ||
                strpos($style->src, 'VariableFont') !== false)) {
                wp_dequeue_style($handle);
                wp_deregister_style($handle);
            }
        }
    }
}, 999);

// Блокируем вывод Inter-Variable через фильтр
add_filter('style_loader_tag', function($tag, $handle, $href) {
    if ($href && (strpos($href, 'Inter-Var') !== false || 
        strpos($href, 'inter-var') !== false ||
        strpos($href, 'VariableFont') !== false ||
        strpos($href, 'variable') !== false && strpos($href, 'inter') !== false)) {
        return ''; // Удаляем тег полностью
    }
    return $tag;
}, 10, 3);

// Блокируем через output buffering (на случай если подключается inline или родительской темой)
// Убеждаемся, что 404 страница отдает правильный HTTP статус
// POTENTIAL REDIRECT / URL LOGIC
add_action('template_redirect', function() {
    if (is_404()) {
        status_header(404);
        nocache_headers();
    }
}, 1);

/**
 * ========================================
 * SEO: НОРМАЛИЗАЦИЯ URL И РЕДИРЕКТЫ
 * ========================================
 */

/**
 * Защита от цепочек редиректов
 * Отслеживает количество редиректов в сессии
 */
// POTENTIAL REDIRECT / URL LOGIC
function dental_clinic_check_redirect_chain($redirect_url) {
    // Пропускаем на локальном сервере
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $is_local = (
        strpos($host, 'localhost') !== false ||
        strpos($host, '127.0.0.1') !== false ||
        strpos($host, '.local') !== false ||
        strpos($host, '.test') !== false
    );
    
    if ($is_local) {
        return true; // На локальном сервере пропускаем проверку
    }
    
    // Проверяем количество редиректов в сессии
    if (!isset($_SESSION['redirect_count'])) {
        $_SESSION['redirect_count'] = 0;
    }
    
    $_SESSION['redirect_count']++;
    
    // Если больше 2 редиректов подряд - это цепочка, останавливаем
    if ($_SESSION['redirect_count'] > 2) {
        // Сбрасываем счетчик и показываем 404
        unset($_SESSION['redirect_count']);
        status_header(404);
        nocache_headers();
        return false;
    }
    
    return true;
}

/**
 * Финальный аудит сайта
 * Проверяет битые ссылки, странные URL, страницы без смысла для индексации
 */
// POTENTIAL REDIRECT / URL LOGIC
function dental_clinic_seo_audit() {
    // Проверяем только в админке для безопасности
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }
    
    global $wpdb;
    
    $issues = array();
    
    // 1. Проверка битых ссылок в контенте страниц
    $pages = get_pages(array('post_status' => 'publish'));
    foreach ($pages as $page) {
        $content = $page->post_content;
        
        // Ищем все ссылки в контенте
        preg_match_all('/href=["\']([^"\']+)["\']/', $content, $matches);
        
        if (!empty($matches[1])) {
            foreach ($matches[1] as $url) {
                // Пропускаем внешние ссылки и якоря
                if (strpos($url, 'http') === 0 && strpos($url, home_url()) === false) {
                    continue;
                }
                if (strpos($url, '#') === 0) {
                    continue;
                }
                
                // Проверяем внутренние ссылки
                $url_path = str_replace(home_url(), '', $url);
                $url_path = trim($url_path, '/');
                
                // Проверяем, существует ли страница
                $post_id = url_to_postid(home_url($url_path));
                if ($post_id === 0 && $url_path !== '') {
                    $issues[] = array(
                        'type' => 'broken_link',
                        'page' => $page->post_title . ' (ID: ' . $page->ID . ')',
                        'url' => $url,
                        'suggestion' => 'Проверьте ссылку или добавьте редирект'
                    );
                }
            }
        }
    }
    
    // 2. Проверка странных URL (с параметрами, дублями)
    $all_posts = $wpdb->get_results("
        SELECT ID, post_name, post_type, post_status 
        FROM {$wpdb->posts} 
        WHERE post_status = 'publish'
        AND post_type IN ('page', 'post', 'doctor')
    ");
    
    foreach ($all_posts as $post) {
        $permalink = get_permalink($post->ID);
        
        // Проверяем наличие параметров в URL
        if (strpos($permalink, '?') !== false) {
            $issues[] = array(
                'type' => 'url_with_params',
                'page' => get_the_title($post->ID) . ' (ID: ' . $post->ID . ')',
                'url' => $permalink,
                'suggestion' => 'URL содержит параметры, убедитесь что canonical правильный'
            );
        }
        
        // Проверяем странные символы в slug
        if (preg_match('/[^a-z0-9\-_]/i', $post->post_name)) {
            $issues[] = array(
                'type' => 'strange_slug',
                'page' => get_the_title($post->ID) . ' (ID: ' . $post->ID . ')',
                'url' => $permalink,
                'suggestion' => 'Slug содержит нестандартные символы'
            );
        }
    }
    
    // 3. Проверка страниц без смысла для индексации (пустые, без контента)
    foreach ($all_posts as $post) {
        $content = get_post_field('post_content', $post->ID);
        $title = get_post_field('post_title', $post->ID);
        
        // Проверяем пустые страницы
        if (empty(trim($content)) && empty(trim($title))) {
            $issues[] = array(
                'type' => 'empty_page',
                'page' => 'ID: ' . $post->ID,
                'url' => get_permalink($post->ID),
                'suggestion' => 'Страница пустая, рассмотрите удаление или добавление контента'
            );
        }
    }
    
    // 4. Проверка дублей canonical
    $canonicals = array();
    foreach ($all_posts as $post) {
        setup_postdata($post);
        $canonical = dental_clinic_get_canonical_url();
        if (!empty($canonical)) {
            if (isset($canonicals[$canonical])) {
                $issues[] = array(
                    'type' => 'duplicate_canonical',
                    'page' => get_the_title($post->ID) . ' (ID: ' . $post->ID . ')',
                    'url' => $canonical,
                    'suggestion' => 'Canonical дублируется с ' . $canonicals[$canonical]
                );
            } else {
                $canonicals[$canonical] = get_the_title($post->ID) . ' (ID: ' . $post->ID . ')';
            }
        }
    }
    wp_reset_postdata();
    
    // Логируем найденные проблемы
    if (!empty($issues)) {
        error_log('SEO AUDIT: Найдены проблемы: ' . print_r($issues, true));
    }
    
    return $issues;
}

// Запускаем аудит при сохранении поста (только в админке)
add_action('save_post', function($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    dental_clinic_seo_audit();
}, 999);

/**
 * Нормализация URL: убирает index.php, нормализует слеши
 */
// POTENTIAL REDIRECT / URL LOGIC
function dental_clinic_normalize_url($url) {
    // Убираем index.php из URL
    $url = str_replace('/index.php', '', $url);
    $url = str_replace('index.php/', '', $url);
    
    // Нормализуем слеши: убираем двойные слеши, кроме http://
    $url = preg_replace('#([^:])//+#', '$1/', $url);
    
    // Убираем слеш в конце для всех URL кроме главной
    $parsed = parse_url($url);
    if (isset($parsed['path']) && $parsed['path'] !== '/' && substr($parsed['path'], -1) === '/') {
        $url = rtrim($url, '/');
    }
    
    return $url;
}

/**
 * Редирект для нормализации URL (убирает index.php, нормализует слеши)
 * И редиректы для единой версии сайта (www/non-www, http/https)
 * 
 * ⚠️ ВРЕМЕННО ОТКЛЮЧЕНО - редиректы должны быть только в .htaccess
 */
// POTENTIAL REDIRECT / URL LOGIC
/*
add_action('template_redirect', function() {
    // Пропускаем админку, AJAX, cron
    if (is_admin() || wp_doing_ajax() || wp_doing_cron() || is_feed()) {
        return;
    }
    
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    $request_uri = urldecode($request_uri);
    
    // Определяем, локальный ли это сервер
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $is_local = (
        strpos($host, 'localhost') !== false ||
        strpos($host, '127.0.0.1') !== false ||
        strpos($host, '.local') !== false ||
        strpos($host, '.test') !== false ||
        strpos($host, '192.168.') !== false ||
        strpos($host, '10.0.') !== false
    );
    
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $host . $request_uri;
    $parsed_url = parse_url($current_url);
    
    // Определяем каноническую версию домена (без www)
    // ВАЖНО: Если нужна версия с www, измените эту настройку
    $canonical_domain = str_replace('www.', '', $parsed_url['host']);
    $needs_www_redirect = false; // Установите true, если нужна версия с www
    
    // Определяем протокол (http для локального, https для продакшена)
    $protocol = ($is_local || (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on')) ? 'http' : 'https';
    
    // Защита от цепочек редиректов
    // ВАЖНО: Используем cookies вместо сессий для более надежной работы
    $redirect_count = isset($_COOKIE['redirect_count']) ? intval($_COOKIE['redirect_count']) : 0;
    
    // Если больше 2 редиректов подряд - останавливаем цепочку
    if ($redirect_count > 2) {
        // Сбрасываем счетчик
        setcookie('redirect_count', '0', time() - 3600, '/');
        // Не делаем редирект, просто продолжаем работу
        return;
    }
    
    // Редирект www -> non-www (или наоборот)
    // ВАЖНО: Если редирект WWW->non-WWW настроен в .htaccess, закомментируйте этот блок
    // ОТКЛЮЧЕНО: Редирект WWW->non-WWW должен быть в .htaccess, чтобы избежать циклов
    // Раскомментируйте только если .htaccess редиректы не работают
    // ВРЕМЕННО ЗАКОММЕНТИРОВАНО
    // if (!$is_local) {
    //     if ($needs_www_redirect && strpos($parsed_url['host'], 'www.') === false) {
    //         $redirect_url = $protocol . '://www.' . $canonical_domain . $request_uri;
    //         if ($redirect_url !== $current_url) {
    //             $_SESSION['redirect_count']++;
    //             wp_redirect($redirect_url, 301);
    //             exit;
    //         }
    //     } elseif (!$needs_www_redirect && strpos($parsed_url['host'], 'www.') === 0) {
    //         $redirect_url = $protocol . '://' . $canonical_domain . $request_uri;
    //         if ($redirect_url !== $current_url) {
    //             $_SESSION['redirect_count']++;
    //             wp_redirect($redirect_url, 301);
    //             exit;
    //         }
    //     }
    // }
    
    // Редирект http -> https
    // ВАЖНО: Пропускаем на локальном сервере (localhost, 127.0.0.1, .local, .test)
    // ВАЖНО: Если редирект HTTP->HTTPS настроен в .htaccess, закомментируйте этот блок
    // Проверяем HTTPS более надежным способом (для разных хостингов)
    // ВРЕМЕННО ЗАКОММЕНТИРОВАНО
    // $is_https = (
    //     (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ||
    //     (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    //     (isset($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on') ||
    //     (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
    // );
    
    // ОТКЛЮЧЕНО: Редирект HTTP->HTTPS должен быть в .htaccess, чтобы избежать циклов
    // Раскомментируйте только если .htaccess редиректы не работают
    // ВРЕМЕННО ЗАКОММЕНТИРОВАНО
    // if (!$is_local && !$is_https) {
    //     $redirect_url = 'https://' . $parsed_url['host'] . $request_uri;
    //     if ($redirect_url !== $current_url) {
    //         $_SESSION['redirect_count']++;
    //         wp_redirect($redirect_url, 301);
    //         exit;
    //     }
    // }
    
    // Проверяем наличие index.php в URL
    // ВРЕМЕННО ЗАКОММЕНТИРОВАНО
    // if (strpos($request_uri, '/index.php') !== false || strpos($request_uri, 'index.php/') !== false) {
    //     $clean_uri = dental_clinic_normalize_url($request_uri);
    //     $redirect_url = home_url($clean_uri);
    //     $current_path = parse_url($current_url, PHP_URL_PATH);
    //     $redirect_path = parse_url($redirect_url, PHP_URL_PATH);
    //     if ($redirect_path && $current_path && $redirect_path !== $current_path) {
    //         setcookie('redirect_count', strval($redirect_count + 1), time() + 60, '/');
    //         wp_redirect($redirect_url, 301);
    //         exit;
    //     }
    // }
    
    // Нормализация слешей (убираем двойные слеши, кроме http://)
    // ВРЕМЕННО ЗАКОММЕНТИРОВАНО
    // $normalized_uri = preg_replace('#([^:])//+#', '$1/', $request_uri);
    // if ($normalized_uri !== $request_uri) {
    //     $redirect_url = home_url($normalized_uri);
    //     $current_path = parse_url($current_url, PHP_URL_PATH);
    //     $redirect_path = parse_url($redirect_url, PHP_URL_PATH);
    //     if ($redirect_path && $current_path && $redirect_path !== $current_path) {
    //         setcookie('redirect_count', strval($redirect_count + 1), time() + 60, '/');
    //         wp_redirect($redirect_url, 301);
    //         exit;
    //     }
    // }
    
    // Убираем слеш в конце для всех URL кроме главной и файлов
    // ВРЕМЕННО ЗАКОММЕНТИРОВАНО
    // if (!$is_local && 
    //     $request_uri !== '/' && 
    //     substr($request_uri, -1) === '/' && 
    //     !preg_match('#\.(html|php|css|js|jpg|jpeg|png|gif|svg|pdf|xml|woff|woff2|ttf|eot)$#i', $request_uri) &&
    //     strpos($request_uri, '/wp-') !== 0 &&
    //     strpos($request_uri, '/wp-admin') !== 0 &&
    //     strpos($request_uri, '/wp-content') !== 0 &&
    //     strpos($request_uri, '/wp-includes') !== 0) {
    //     $clean_uri = rtrim($request_uri, '/');
    //     if ($clean_uri !== $request_uri) {
    //         $redirect_url = home_url($clean_uri);
    //         $current_path = parse_url($current_url, PHP_URL_PATH);
    //         $redirect_path = parse_url($redirect_url, PHP_URL_PATH);
    //         if ($redirect_path && $current_path && $redirect_path !== $current_path) {
    //             setcookie('redirect_count', strval($redirect_count + 1), time() + 60, '/');
    //             wp_redirect($redirect_url, 301);
    //             exit;
    //         }
    //     }
    // }
    
    // Сбрасываем счетчик редиректов при успешной загрузке страницы
    // ВРЕМЕННО ЗАКОММЕНТИРОВАНО
    // if ($redirect_count > 0) {
    //     setcookie('redirect_count', '0', time() - 3600, '/');
    // }
    // }, 2);
*/

/**
 * Изменение структуры permalink для постов блога
 * Формат: /blog/post-name/ вместо /YYYY/MM/DD/post-name/
 */
// POTENTIAL REDIRECT / URL LOGIC
add_filter('post_link', function($permalink, $post) {
    // Только для постов (не для кастомных типов)
    if ($post->post_type === 'post') {
        // Получаем slug поста
        $post_slug = $post->post_name;
        
        // Формируем новый URL: /blog/post-name/
        $blog_base = '/blog/';
        $new_permalink = home_url($blog_base . $post_slug . '/');
        
        return $new_permalink;
    }
    
    return $permalink;
}, 10, 2);

// POTENTIAL REDIRECT / URL LOGIC
add_filter('post_type_link', function($post_link, $post) {
    // Только для постов
    if ($post->post_type === 'post') {
        $post_slug = $post->post_name;
        $blog_base = '/blog/';
        $new_permalink = home_url($blog_base . $post_slug . '/');
        return $new_permalink;
    }
    
    return $post_link;
}, 10, 2);

/**
 * Добавляем rewrite rules для обработки URL формата /blog/post-name/
 */
// POTENTIAL REDIRECT / URL LOGIC
add_action('init', function() {
    // Добавляем правило для /blog/post-name/
    add_rewrite_rule(
        '^blog/([^/]+)/?$',
        'index.php?name=$matches[1]&post_type=post',
        'top'
    );
    
    // Пересоздаем rewrite rules при активации темы (только один раз)
    if (get_option('dental_clinic_flush_rewrite_rules') !== '1') {
        flush_rewrite_rules();
        update_option('dental_clinic_flush_rewrite_rules', '1');
    }
}, 10);

/**
 * Функция для поиска поста по slug (более надежная)
 */
function dental_clinic_get_post_by_slug($slug, $post_type = 'post') {
    $posts = get_posts(array(
        'name' => $slug,
        'post_type' => $post_type,
        'post_status' => 'publish',
        'numberposts' => 1
    ));
    
    if (!empty($posts)) {
        return $posts[0];
    }
    
    return null;
}

/**
 * Редиректы для старых URL с датами (формат /YYYY/MM/DD/post-name/)
 * Редирект на /blog/post-name/
 * 
 * ⚠️ ВРЕМЕННО ОТКЛЮЧЕНО - вернём после того, как сайт заработает
 */
// POTENTIAL REDIRECT / URL LOGIC
/*
add_action('parse_request', function($wp) {
    if (is_admin() || wp_doing_ajax() || wp_doing_cron() || is_feed()) {
        return;
    }
    
    $request_uri = $_SERVER['REQUEST_URI'] ?? '';
    
    // Убираем параметры запроса
    $request_uri = strtok($request_uri, '?');
    $request_uri = trim($request_uri, '/');
    
    // Проверяем формат /YYYY/MM/DD/post-name/ или /YYYY/MM/DD/post-name
    if (preg_match('#^(\d{4})/(\d{2})/(\d{2})/([^/]+)/?$#', $request_uri, $matches)) {
        $year = $matches[1];
        $month = $matches[2];
        $day = $matches[3];
        $post_slug = $matches[4];
        
        // Используем более надежную функцию поиска поста
        $post = dental_clinic_get_post_by_slug($post_slug, 'post');
        
        if ($post && $post->post_status === 'publish') {
            // Редирект на новый формат /blog/post-name/
            $new_url = home_url('/blog/' . $post_slug . '/');
            wp_redirect($new_url, 301);
            exit;
        }
    }
}, 1); // Приоритет 1 - самый ранний
*/

// Дублируем на template_redirect для надежности
// ⚠️ ВРЕМЕННО ОТКЛЮЧЕНО
// POTENTIAL REDIRECT / URL LOGIC
/*
add_action('template_redirect', function() {
    if (is_admin() || wp_doing_ajax() || wp_doing_cron() || is_feed()) {
        return;
    }
    
    // Если это уже 404, проверяем, не старый ли это URL с датами
    if (is_404()) {
        $request_uri = $_SERVER['REQUEST_URI'] ?? '';
        $request_uri = strtok($request_uri, '?');
        $request_uri = trim($request_uri, '/');
        
        if (preg_match('#^(\d{4})/(\d{2})/(\d{2})/([^/]+)/?$#', $request_uri, $matches)) {
            $post_slug = $matches[4];
            $post = dental_clinic_get_post_by_slug($post_slug, 'post');
            
            if ($post && $post->post_status === 'publish') {
                $new_url = home_url('/blog/' . $post_slug . '/');
                wp_redirect($new_url, 301);
                exit;
            }
        }
    }
}, 1);
*/

/**
 * Универсальные редиректы для старых несуществующих страниц
 * Можно добавить конкретные редиректы здесь
 * 
 * ⚠️ ВРЕМЕННО ОТКЛЮЧЕНО - вернём после того, как сайт заработает
 */
// POTENTIAL REDIRECT / URL LOGIC
/*
add_action('template_redirect', function() {
    if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
        return;
    }
    
    // Если это 404, проверяем возможные редиректы
    if (is_404()) {
        $request_uri = $_SERVER['REQUEST_URI'] ?? '';
        
        // Массив старых URL -> новых URL
        $redirects = array(
            // Примеры (замените на реальные старые URL):
            // '/old-page/' => '/new-page/',
            // '/старая-страница/' => '/новая-страница/',
        );
        
        // Проверяем точные совпадения
        if (isset($redirects[$request_uri])) {
            wp_redirect(home_url($redirects[$request_uri]), 301);
            exit;
        }
        
        // Проверяем частичные совпадения (для старых URL с параметрами)
        foreach ($redirects as $old_path => $new_path) {
            if (strpos($request_uri, $old_path) === 0) {
                wp_redirect(home_url($new_path), 301);
                exit;
            }
        }
    }
}, 4);

add_action('template_redirect', function() {
    ob_start(function($buffer) {
        // Удаляем любые ссылки на Inter-Variable из любых источников
        $buffer = preg_replace('/<link[^>]*Inter-Var[^>]*>/i', '', $buffer);
        $buffer = preg_replace('/<link[^>]*inter-var[^>]*>/i', '', $buffer);
        $buffer = preg_replace('/<link[^>]*VariableFont[^>]*>/i', '', $buffer);
        $buffer = preg_replace('/<link[^>]*variable[^>]*inter[^>]*>/i', '', $buffer);
        $buffer = preg_replace('/<link[^>]*inter[^>]*variable[^>]*>/i', '', $buffer);
        // Удаляем @font-face для Inter-Variable
        $buffer = preg_replace('/@font-face[^{]*\{[^}]*Inter-Var[^}]*\}/is', '', $buffer);
        $buffer = preg_replace('/@font-face[^{]*\{[^}]*inter-var[^}]*\}/is', '', $buffer);
        $buffer = preg_replace('/@font-face[^{]*\{[^}]*VariableFont[^}]*\}/is', '', $buffer);
        // Удаляем preload для Inter-Variable
        $buffer = preg_replace('/<link[^>]*rel=["\']preload["\'][^>]*Inter-Var[^>]*>/i', '', $buffer);
        $buffer = preg_replace('/<link[^>]*rel=["\']preload["\'][^>]*inter-var[^>]*>/i', '', $buffer);
        return $buffer;
    });
}, 2);

add_action('shutdown', function() {
    if (ob_get_level() > 0) {
        ob_end_flush();
    }
}, 999);

/**
 * Получает размеры изображения и возвращает атрибуты width и height для оптимизации CLS
 * @param string $image_path Путь к изображению относительно темы
 * @return string Атрибуты width и height или пустая строка, если файл не найден
 */
function dental_clinic_get_image_dimensions($image_path) {
    $full_path = get_stylesheet_directory() . '/' . $image_path;
    
    if (!file_exists($full_path)) {
        return '';
    }
    
    $image_size = @getimagesize($full_path);
    
    if ($image_size === false) {
        return '';
    }
    
    return ' width="' . esc_attr($image_size[0]) . '" height="' . esc_attr($image_size[1]) . '"';
}

/**
 * Единый блок согласия на обработку персональных данных для всех форм v2
 */
function dental_clinic_v2_privacy_notice() {
    ?>
    <label class="form-consent">
        <input type="checkbox" class="form-consent__checkbox" checked required>
        <span class="form-consent__text">
            Нажимая кнопку, вы даете согласие на обработку
            <span><a href="<?php echo esc_url( home_url('/privacy.pdf') ); ?>" target="_blank" rel="noopener">персональных данных</a></span>
        </span>
    </label>
    <?php
}

function dental_clinic_v2_fallback_menu() {
    echo '<ul class="header__menu-list">';
    echo '<li><a href="' . home_url() . '">Главная</a></li>';
    echo '<li><a href="' . home_url('/implantatsiya') . '">Имплантация</a></li>';
    echo '<li><a href="' . home_url('/doctor') . '">Врачи</a></li>';
    echo '<li class="dropdown">';
    echo '<a href="' . home_url('/o-klinike') . '" class="dropdown-toggle">О клинике</a>';
    echo '<ul class="dropdown-menu">';
    echo '<li><a href="' . home_url('/o-klinike') . '">Информация</a></li>';
    echo '<li><a href="' . home_url('/rekvizity') . '">Реквизиты</a></li>';
    echo '<li><a href="' . home_url('/litsenzii') . '">Лицензии</a></li>';
    echo '</ul>';
    echo '</li>';
    echo '<li><a href="' . home_url('/blog') . '">Блог</a></li>';
    echo '<li><a href="' . home_url('/kontakty') . '">Контакты</a></li>';
    echo '</ul>';
}

// Поддержка выпадающих меню
function dental_clinic_nav_menu_css_class($classes, $item, $args) {
    if ($args->theme_location == 'primary') {
        // Добавляем класс dropdown для элементов с дочерними элементами
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown';
        }
        // Добавляем класс dropdown-toggle для ссылок с дочерними элементами
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown-toggle';
        }
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'dental_clinic_nav_menu_css_class', 10, 3);

// Кастомный walker для выпадающих меню
class Dental_Clinic_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output .= "\n$indent<ul class=\"dropdown-menu$submenu\">\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $li_attributes = '';
        $class_names = $value = '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        if ($args->walker->has_children) {
            $classes[] = 'dropdown';
        }
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        if ($args->walker->has_children) {
            $attributes .= ' class="dropdown-toggle"';
        }
        
        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}





// Убираем классы блога с главной страницы
function dental_clinic_remove_blog_classes_from_front_page($classes) {
    if (is_front_page()) {
        // Убираем все классы, связанные с блогом и страницами
        $remove_classes = array('home', 'blog', 'page-template-front-page');
        $classes = array_diff($classes, $remove_classes);
        // Добавляем только нужный класс для главной страницы
        if (!in_array('front-page', $classes)) {
            $classes[] = 'front-page';
        }
    }
    return $classes;
}
add_filter('body_class', 'dental_clinic_remove_blog_classes_from_front_page', 20);

// Подключение стилей для всех страниц
function dental_clinic_enqueue_styles_main() {
    $is_v2_page = false;
    
    if (is_front_page()) {
        $is_v2_page = true;
    }
    
    // Страницы блога: список статей и отдельная статья (но НЕ главная страница)
    if ((is_home() && !is_front_page()) || is_page_template('page-blog.php') || (is_single() && get_post_type() == 'post')) {
        $is_v2_page = true;
    }
    
    // Страницы врачей: архив и отдельный врач
    if (is_post_type_archive('doctor') || (is_single() && get_post_type() == 'doctor')) {
        $is_v2_page = true;
    }
    
    // Страница "История моей улыбки"
    if (is_page_template('page-istoriya-moei-ulybki.php') || (is_page() && get_post_field('post_name') == 'istoriya-moei-ulybki')) {
        $is_v2_page = true;
    }
    
    // Страницы клиники (Реквизиты, Лицензии, Информация)
    if (is_page_template('page-clinic-info.php') || (is_page() && in_array(get_post_field('post_name'), array('rekvizity', 'litsenzii', 'o-organizatsii')))) {
        $is_v2_page = true;
    }
    
    // Страница благодарности
    if (is_page_template('page-spasibo-za-zayavku.php')) {
        $is_v2_page = true;
    }
    
    // 404 страница
    if (is_404()) {
        $is_v2_page = true;
    }
    
    // Стандартные шаблоны WordPress (index.php, single.php, page.php, archive.php)
    // Теперь все используют header.php и footer.php
    // Исключаем главную страницу, так как она уже обработана выше
    if ((is_single() || is_page() || is_archive() || (is_home() && !is_front_page()) || is_search()) && !is_front_page()) {
        $is_v2_page = true;
    }
    
    if ($is_v2_page) {
        $ver = wp_get_theme()->get('Version');
        $uri = get_stylesheet_directory_uri() . '/assets/css/v2/';
        
        wp_enqueue_style('base', $uri . 'base.css', array(), $ver);
        wp_enqueue_style('layout', $uri . 'layout.css', array('base'), $ver);
        wp_enqueue_style('ui', $uri . 'ui.css', array('layout'), $ver);
        wp_enqueue_style('components', $uri . 'components.css', array('ui'), $ver);
        
        // Подключаем стили блога для страниц блога (но НЕ для главной страницы)
        if ((is_home() && !is_front_page()) || is_page_template('page-blog.php') || (is_single() && get_post_type() == 'post')) {
            wp_enqueue_style('pages-blog', $uri . 'pages/blog.css', array('components'), $ver);
        }
        
        // Подключаем стили врачей для страниц врачей
        if (is_post_type_archive('doctor') || (is_single() && get_post_type() == 'doctor')) {
            wp_enqueue_style('pages-doctors', $uri . 'pages/doctors.css', array('components'), $ver);
        }
        
        // Подключаем общие стили для страниц
        if (is_page_template('page-istoriya-moei-ulybki.php') || (is_page() && get_post_field('post_name') == 'istoriya-moei-ulybki')) {
            wp_enqueue_style('pages', $uri . 'pages/pages.css', array('components'), $ver);
        }
        
        // Подключаем общие стили для страниц клиники
        if (is_page_template('page-clinic-info.php') || (is_page() && in_array(get_post_field('post_name'), array('rekvizity', 'litsenzii', 'o-organizatsii')))) {
            wp_enqueue_style('pages', $uri . 'pages/pages.css', array('components'), $ver);
        }
        
        // Подключаем общие стили для страницы благодарности
        if (is_page_template('page-spasibo-za-zayavku.php')) {
            wp_enqueue_style('pages', $uri . 'pages/pages.css', array('components'), $ver);
        }
        
        // Подключаем общие стили для 404 страницы (хлебные крошки и другие элементы)
        if (is_404()) {
            wp_enqueue_style('pages', $uri . 'pages/pages.css', array('components'), $ver);
        }
        
    }
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_styles_main', 15);

function dental_clinic_setup() {
    register_nav_menus(array(
        'primary' => 'Главное меню',
        'footer' => 'Меню в футере'
    ));
}
add_action('after_setup_theme', 'dental_clinic_setup');



// Удалено: временное подключение шрифта Manrope

/**
 * Редирект на страницу благодарности
 * Реализован ТОЛЬКО через JavaScript событие wpcf7mailsent
 * Серверный редирект убран, чтобы не мешать AJAX-логике CF7
 */

/**
 * Редирект на страницу благодарности через событие wpcf7mailsent
 * Работает ТОЛЬКО при успешной отправке формы (mail_sent)
 */
// POTENTIAL REDIRECT / URL LOGIC
function dental_clinic_cf7_redirect_script() {
    ?>
    <script>
    (function() {
        'use strict';
        var thankYouUrl = '<?php echo esc_js(home_url('/spasibo-za-zayavku/')); ?>';
        
        // Единственный обработчик редиректа - через событие wpcf7mailsent
        // Это событие срабатывает ТОЛЬКО при успешной отправке (mail_sent)
        document.addEventListener('wpcf7mailsent', function(event) {
            window.location.href = thankYouUrl;
        }, false);
        
        // Дублирующий обработчик через jQuery (на случай если CF7 использует jQuery события)
        if (typeof jQuery !== 'undefined') {
            jQuery(document).on('wpcf7mailsent', function(event) {
                window.location.href = thankYouUrl;
            });
        }
    })();
    </script>
    <?php
}
add_action('wp_footer', 'dental_clinic_cf7_redirect_script');


// POTENTIAL REDIRECT / URL LOGIC
function dental_clinic_register_post_types() {
    register_post_type('doctor', array(
        'labels' => array(
            'name' => 'Врачи',
            'singular_name' => 'Врач',
            'add_new' => 'Добавить врача',
            'add_new_item' => 'Добавить нового врача',
            'edit_item' => 'Редактировать врача',
            'new_item' => 'Новый врач',
            'view_item' => 'Просмотреть врача',
            'search_items' => 'Искать врачей',
            'not_found' => 'Врачи не найдены',
            'not_found_in_trash' => 'В корзине врачи не найдены'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'doctor'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-users',
        'show_in_rest' => true
    ));
    
    register_post_type('review', array(
        'labels' => array(
            'name' => 'Отзывы',
            'singular_name' => 'Отзыв',
            'add_new' => 'Добавить отзыв',
            'add_new_item' => 'Добавить новый отзыв',
            'edit_item' => 'Редактировать отзыв',
            'new_item' => 'Новый отзыв',
            'view_item' => 'Просмотреть отзыв',
            'search_items' => 'Искать отзывы',
            'not_found' => 'Отзывы не найдены',
            'not_found_in_trash' => 'В корзине отзывы не найдены'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'review'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'show_in_rest' => true
    ));
}
add_action('init', 'dental_clinic_register_post_types');

// Регистрируем размеры изображений для врачей
function dental_clinic_add_image_sizes() {
    add_image_size('doctor-thumbnail', 120, 120, true); // Квадратное фото для карточек
    add_image_size('doctor-medium', 300, 300, true); // Среднее фото для слайдера
    add_image_size('doctor-large', 400, 400, true); // Большое фото для страниц врачей
}
add_action('after_setup_theme', 'dental_clinic_add_image_sizes');

// Принудительно генерируем размеры изображений при сохранении врача
function dental_clinic_generate_doctor_image_sizes($post_id) {
    if (get_post_type($post_id) === 'doctor' && has_post_thumbnail($post_id)) {
        $attachment_id = get_post_thumbnail_id($post_id);
        
        // Генерируем все размеры изображений
        $sizes = array('doctor-thumbnail', 'doctor-medium', 'doctor-large');
        
        foreach ($sizes as $size) {
            $image = wp_get_attachment_image_src($attachment_id, $size);
            if (!$image) {
                // Принудительно генерируем размер
                $file = get_attached_file($attachment_id);
                if ($file) {
                    $editor = wp_get_image_editor($file);
                    if (!is_wp_error($editor)) {
                        $editor->resize(300, 300, true);
                        $editor->save();
                    }
                }
            }
        }
    }
}
add_action('save_post', 'dental_clinic_generate_doctor_image_sizes');

// Функция для принудительной регенерации изображений врачей (выполнить один раз)
function dental_clinic_regenerate_doctor_images() {
    if (!current_user_can('administrator')) {
        return;
    }
    
    $doctors = new WP_Query(array(
        'post_type' => 'doctor',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ));
    
    if ($doctors->have_posts()) {
        while ($doctors->have_posts()) {
            $doctors->the_post();
            if (has_post_thumbnail()) {
                $attachment_id = get_post_thumbnail_id();
                $file = get_attached_file($attachment_id);
                
                if ($file && file_exists($file)) {
                    $editor = wp_get_image_editor($file);
                    if (!is_wp_error($editor)) {
                        // Генерируем размеры
                        $editor->resize(120, 120, true);
                        $editor->save();
                        
                        $editor = wp_get_image_editor($file);
                        $editor->resize(300, 300, true);
                        $editor->save();
                        
                        $editor = wp_get_image_editor($file);
                        $editor->resize(400, 400, true);
                        $editor->save();
                    }
                }
            }
        }
        wp_reset_postdata();
    }
}

// Добавляем кнопку в админку для регенерации изображений
function dental_clinic_add_regenerate_images_button() {
    if (get_post_type() === 'doctor') {
        echo '<div style="margin: 10px 0; padding: 10px; background: #f0f0f0; border-left: 4px solid #0073aa;">';
        echo '<p><strong>Если фото врача не отображается в слайдере:</strong></p>';
        echo '<a href="' . admin_url('admin-post.php?action=regenerate_doctor_images') . '" class="button button-primary">Регенерировать изображения врачей</a>';
        echo '</div>';
    }
}
add_action('edit_form_after_title', 'dental_clinic_add_regenerate_images_button');

// Обработчик для регенерации изображений
// POTENTIAL REDIRECT / URL LOGIC
function dental_clinic_handle_regenerate_images() {
    if (current_user_can('administrator')) {
        dental_clinic_regenerate_doctor_images();
        wp_redirect(admin_url('edit.php?post_type=doctor&images_regenerated=1'));
        exit;
    }
}
add_action('admin-post_regenerate_doctor_images', 'dental_clinic_handle_regenerate_images');

function dental_clinic_add_meta_boxes() {
    add_meta_box(
        'doctor_info',
        'Информация о враче',
        'dental_clinic_doctor_meta_box_callback',
        'doctor',
        'normal',
        'high'
    );
    
    add_meta_box(
        'review_info',
        'Информация об отзыве',
        'dental_clinic_review_meta_box_callback',
        'review',
        'normal',
        'high'
    );
    
    error_log("Meta boxes added for post types: doctor, review");
}

function dental_clinic_force_add_review_meta_boxes() {
    global $post_type;
    if ($post_type === 'review') {
        add_meta_box(
            'review_info',
            'Информация об отзыве',
            'dental_clinic_review_meta_box_callback',
            'review',
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes_review', 'dental_clinic_force_add_review_meta_boxes');
add_action('add_meta_boxes', 'dental_clinic_add_meta_boxes');

// Подключаем медиабиблиотеку WordPress для загрузки сертификатов
function dental_clinic_enqueue_media_uploader() {
    if (get_post_type() === 'doctor') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'dental_clinic_enqueue_media_uploader');

function dental_clinic_doctor_meta_box_callback($post) {
    wp_nonce_field('dental_clinic_save_doctor_meta', 'dental_clinic_doctor_meta_nonce');
    
    $full_name = get_post_meta($post->ID, '_doctor_full_name', true);
    $position = get_post_meta($post->ID, '_doctor_position', true);
    $experience = get_post_meta($post->ID, '_doctor_experience', true);
    $education = get_post_meta($post->ID, '_doctor_education', true);
    $video_url = get_post_meta($post->ID, '_doctor_video_url', true);
    $short_preview = get_post_meta($post->ID, '_doctor_short_preview', true);
    $full_description = get_post_meta($post->ID, '_doctor_full_description', true);
    $certificates = get_post_meta($post->ID, '_doctor_certificates', true);
    $show_in_slider = get_post_meta($post->ID, '_doctor_show_in_slider', true);
    
    // Получаем 3 индекса
    $index1 = get_post_meta($post->ID, '_doctor_index1', true);
    $index2 = get_post_meta($post->ID, '_doctor_index2', true);
    $index3 = get_post_meta($post->ID, '_doctor_index3', true);
    
    // Получаем цитату
    $quote = get_post_meta($post->ID, '_doctor_quote', true);
    
    echo '<table class="form-table">';
    
    echo '<tr><th><label for="doctor_full_name">ФИО:</label></th>';
    echo '<td><input type="text" id="doctor_full_name" name="doctor_full_name" value="' . esc_attr($full_name) . '" class="regular-text" placeholder="например: Иванов Иван Иванович" /></td></tr>';
    
    echo '<tr><th><label for="doctor_position">Должность:</label></th>';
    echo '<td><input type="text" id="doctor_position" name="doctor_position" value="' . esc_attr($position) . '" class="regular-text" placeholder="например: Главный врач, Стоматолог-ортопед" /></td></tr>';
    
    echo '<tr><th><label for="doctor_experience">Опыт работы:</label></th>';
    echo '<td><input type="text" id="doctor_experience" name="doctor_experience" value="' . esc_attr($experience) . '" class="regular-text" placeholder="например: 15 лет" /></td></tr>';
    
    echo '<tr><th><label for="doctor_education">Образование:</label></th>';
    echo '<td><textarea id="doctor_education" name="doctor_education" rows="3" class="large-text" placeholder="Укажите образование врача">' . esc_textarea($education) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="doctor_video_url">Ссылка на видео или iframe код:</label></th>';
    echo '<td><textarea id="doctor_video_url" name="doctor_video_url" rows="3" class="large-text" placeholder="Ссылка: https://vk.com/video... или https://youtube.com/...&#10;Или iframe код: &lt;iframe src=&quot;https://vk.com/video_ext.php?oid=...&quot;&gt;&lt;/iframe&gt;">' . esc_textarea($video_url) . '</textarea>';
    echo '<p class="description">Можно вставить ссылку на видео или готовый iframe код (для VK используйте код из кнопки "Поделиться" → "Экспортировать")</p></td></tr>';
    
    echo '<tr><th><label for="doctor_short_preview">Краткое превью (1-2 предложения):</label></th>';
    echo '<td><textarea id="doctor_short_preview" name="doctor_short_preview" rows="2" class="large-text" placeholder="Краткое описание для карточек">' . esc_textarea($short_preview) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="doctor_full_description">Полное описание:</label></th>';
    echo '<td><textarea id="doctor_full_description" name="doctor_full_description" rows="8" class="large-text" placeholder="Подробное описание врача, опыт, специализация">' . esc_textarea($full_description) . '</textarea></td></tr>';
    
    // 3 индекса
    echo '<tr><th colspan="2"><h3 style="margin: 20px 0 10px 0;">3 Индекса</h3></th></tr>';
    
    echo '<tr><th><label for="doctor_index1">Индекс 1:</label></th>';
    echo '<td><input type="text" id="doctor_index1" name="doctor_index1" value="' . esc_attr($index1) . '" class="regular-text" placeholder="например: 15 лет опыта" /></td></tr>';
    
    echo '<tr><th><label for="doctor_index2">Индекс 2:</label></th>';
    echo '<td><input type="text" id="doctor_index2" name="doctor_index2" value="' . esc_attr($index2) . '" class="regular-text" placeholder="например: 5000+ пациентов" /></td></tr>';
    
    echo '<tr><th><label for="doctor_index3">Индекс 3:</label></th>';
    echo '<td><input type="text" id="doctor_index3" name="doctor_index3" value="' . esc_attr($index3) . '" class="regular-text" placeholder="например: 10000+ процедур" /></td></tr>';
    
    // Цитата
    echo '<tr><th><label for="doctor_quote">Цитата врача:</label></th>';
    echo '<td><textarea id="doctor_quote" name="doctor_quote" rows="3" class="large-text" placeholder="Краткая цитата врача">' . esc_textarea($quote) . '</textarea></td></tr>';
    
    // Получаем сертификаты (массив ID изображений)
    $certificate_ids = get_post_meta($post->ID, '_doctor_certificates', true);
    if (!is_array($certificate_ids)) {
        $certificate_ids = array();
    }
    
    echo '<tr><th><label>Галерея сертификатов:</label></th>';
    echo '<td>';
    echo '<input type="hidden" id="doctor_certificates" name="doctor_certificates" value="' . esc_attr(implode(',', $certificate_ids)) . '">';
    echo '<div id="certificates-gallery" style="margin-bottom: 15px;">';
    if (!empty($certificate_ids)) {
        foreach ($certificate_ids as $cert_id) {
            $image_url = wp_get_attachment_image_url($cert_id, 'thumbnail');
            if ($image_url) {
                echo '<div class="certificate-item" data-id="' . esc_attr($cert_id) . '" style="display: inline-block; margin: 5px; position: relative;">';
                echo '<img src="' . esc_url($image_url) . '" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #ddd; border-radius: 4px;">';
                echo '<button type="button" class="remove-certificate" style="position: absolute; top: -5px; right: -5px; background: #dc3232; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 14px; line-height: 1;">×</button>';
                echo '</div>';
            }
        }
    }
    echo '</div>';
    echo '<button type="button" id="upload-certificates" class="button">Добавить сертификаты</button>';
    echo '</td></tr>';
    
    echo '<tr><th><label for="doctor_show_in_slider">Отображать в слайдере:</label></th>';
    echo '<td><input type="checkbox" id="doctor_show_in_slider" name="doctor_show_in_slider" value="1" ' . checked($show_in_slider, '1', false) . ' /> <span>Показывать этого врача в слайдере на главной странице</span></td></tr>';
    
    echo '</table>';
    ?>
    <script>
    jQuery(document).ready(function($) {
        var certificatesFrame;
        var certificatesIds = [];
        
        // Загружаем существующие ID
        var hiddenField = $('#doctor_certificates');
        if (hiddenField.val()) {
            certificatesIds = hiddenField.val().split(',').filter(function(id) {
                return id.length > 0;
            });
        }
        
        // Кнопка загрузки изображений
        $('#upload-certificates').on('click', function(e) {
            e.preventDefault();
            
            if (certificatesFrame) {
                certificatesFrame.open();
                return;
            }
            
            certificatesFrame = wp.media({
                title: 'Выберите сертификаты',
                button: {
                    text: 'Добавить сертификаты'
                },
                multiple: true,
                library: {
                    type: 'image'
                }
            });
            
            certificatesFrame.on('select', function() {
                var selection = certificatesFrame.state().get('selection');
                var gallery = $('#certificates-gallery');
                
                selection.map(function(attachment) {
                    attachment = attachment.toJSON();
                    if ($.inArray(attachment.id.toString(), certificatesIds) === -1) {
                        certificatesIds.push(attachment.id.toString());
                        
                        var item = $('<div class="certificate-item" data-id="' + attachment.id + '" style="display: inline-block; margin: 5px; position: relative;">' +
                            '<img src="' + attachment.sizes.thumbnail.url + '" style="width: 100px; height: 100px; object-fit: cover; border: 2px solid #ddd; border-radius: 4px;">' +
                            '<button type="button" class="remove-certificate" style="position: absolute; top: -5px; right: -5px; background: #dc3232; color: white; border: none; border-radius: 50%; width: 20px; height: 20px; cursor: pointer; font-size: 14px; line-height: 1;">×</button>' +
                            '</div>');
                        gallery.append(item);
                    }
                });
                
                hiddenField.val(certificatesIds.join(','));
            });
            
            certificatesFrame.open();
        });
        
        // Удаление сертификата
        $(document).on('click', '.remove-certificate', function() {
            var item = $(this).closest('.certificate-item');
            var id = item.data('id').toString();
            
            certificatesIds = certificatesIds.filter(function(certId) {
                return certId !== id;
            });
            
            hiddenField.val(certificatesIds.join(','));
            item.remove();
        });
    });
    </script>
    <?php
}

function dental_clinic_save_doctor_meta($post_id) {
    if (!isset($_POST['dental_clinic_doctor_meta_nonce']) || !wp_verify_nonce($_POST['dental_clinic_doctor_meta_nonce'], 'dental_clinic_save_doctor_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Специальная обработка сертификатов (массив ID изображений)
    if (isset($_POST['doctor_certificates'])) {
        $certificates_value = sanitize_text_field($_POST['doctor_certificates']);
        if (!empty($certificates_value)) {
            $certificate_ids = array_map('intval', explode(',', $certificates_value));
            $certificate_ids = array_filter($certificate_ids);
            update_post_meta($post_id, '_doctor_certificates', array_values($certificate_ids));
        } else {
            delete_post_meta($post_id, '_doctor_certificates');
        }
    }
    
    // Поля, которые разрешают HTML (включая iframe для видео)
    $html_fields = ['full_description', 'education', 'quote', 'video_url'];
    
    // Обработка текстовых полей
    $text_fields = ['full_name', 'position', 'experience', 'education', 'video_url', 'short_preview', 'full_description', 'quote', 'index1', 'index2', 'index3'];
    
    foreach ($text_fields as $field) {
        if (isset($_POST['doctor_' . $field])) {
            $value = $_POST['doctor_' . $field];
            if (in_array($field, $html_fields)) {
                // Разрешаем HTML для определенных полей
                if ($field === 'video_url') {
                    // Для video_url разрешаем iframe теги
                    $allowed_tags = wp_kses_allowed_html('post');
                    $allowed_tags['iframe'] = array(
                        'src' => true,
                        'width' => true,
                        'height' => true,
                        'frameborder' => true,
                        'allow' => true,
                        'allowfullscreen' => true,
                        'style' => true,
                        'class' => true,
                        'id' => true
                    );
                    update_post_meta($post_id, '_doctor_' . $field, wp_kses($value, $allowed_tags));
                } else {
                    update_post_meta($post_id, '_doctor_' . $field, wp_kses_post($value));
                }
            } else {
                update_post_meta($post_id, '_doctor_' . $field, sanitize_text_field($value));
            }
        }
    }
    
    // Обработка чекбокса show_in_slider
    if (isset($_POST['doctor_show_in_slider'])) {
        update_post_meta($post_id, '_doctor_show_in_slider', '1');
    } else {
        delete_post_meta($post_id, '_doctor_show_in_slider');
    }
}
add_action('save_post', 'dental_clinic_save_doctor_meta');

// Мета-поля для отзывов
function dental_clinic_review_meta_box_callback($post) {
    wp_nonce_field('dental_clinic_save_review_meta', 'dental_clinic_review_meta_nonce');
    
    $reviewer_name = get_post_meta($post->ID, '_reviewer_name', true);
    $video_url = get_post_meta($post->ID, '_review_video_url', true);
    
    // Отладочная информация
    if (current_user_can('administrator')) {
        echo '<div style="background: #f0f0f0; padding: 10px; margin-bottom: 15px; border-left: 4px solid #0073aa;">';
        echo '<strong>Отладка (только для администраторов):</strong><br>';
        echo 'Post ID: ' . $post->ID . '<br>';
        echo 'Post Type: ' . get_post_type($post->ID) . '<br>';
        echo 'Reviewer Name (raw): "' . $reviewer_name . '"<br>';
        echo 'Video URL (raw): "' . $video_url . '"<br>';
        echo '</div>';
    }
    
    echo '<table class="form-table">';
    
    echo '<tr><th><label for="reviewer_name">Имя пациента:</label></th>';
    echo '<td><input type="text" id="reviewer_name" name="reviewer_name" value="' . esc_attr($reviewer_name) . '" class="regular-text" placeholder="например: Анна Петрова" /></td></tr>';
    
    echo '<tr><th><label for="review_video_url">Ссылка на видео или iframe код:</label></th>';
    echo '<td><textarea id="review_video_url" name="review_video_url" rows="3" class="large-text" placeholder="Ссылка: https://vk.com/video... или https://youtube.com/...&#10;Или iframe код: &lt;iframe src=&quot;https://vk.com/video_ext.php?oid=...&quot;&gt;&lt;/iframe&gt;">' . esc_textarea($video_url) . '</textarea>';
    echo '<p class="description">Можно вставить ссылку на видео или готовый iframe код (для VK используйте код из кнопки "Поделиться" → "Экспортировать")</p></td></tr>';
    
    echo '<tr><th><label>Фото пациента:</label></th>';
    echo '<td><p>Используйте "Изображение записи" (Featured Image) для загрузки фото пациента</p></td></tr>';
    
    echo '<tr><th><label>Текст отзыва:</label></th>';
    echo '<td><p>Используйте основное поле "Текст записи" для текста отзыва</p></td></tr>';
    
    echo '</table>';
}

function dental_clinic_save_review_meta($post_id) {
    // Проверяем, что это отзыв
    if (get_post_type($post_id) !== 'review') {
        return;
    }
    
    // Логируем все POST данные для отладки
    error_log("=== REVIEW SAVE DEBUG ===");
    error_log("Post ID: " . $post_id);
    error_log("POST data: " . print_r($_POST, true));
    
    if (!isset($_POST['dental_clinic_review_meta_nonce'])) {
        error_log("ERROR: Nonce not found!");
        return;
    }
    
    if (!wp_verify_nonce($_POST['dental_clinic_review_meta_nonce'], 'dental_clinic_save_review_meta')) {
        error_log("ERROR: Nonce verification failed!");
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        error_log("ERROR: Autosave detected!");
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        error_log("ERROR: User cannot edit post!");
        return;
    }
    
    $fields = ['reviewer_name', 'video_url'];
    
    foreach ($fields as $field) {
        $field_name = 'review_' . $field;
        if (isset($_POST[$field_name])) {
            $value = sanitize_text_field($_POST[$field_name]);
            $meta_key = '_review_' . $field;
            
            $result = update_post_meta($post_id, $meta_key, $value);
            error_log("Saving {$meta_key} = '{$value}' for post {$post_id}. Result: " . ($result ? 'SUCCESS' : 'FAILED'));
        } else {
            error_log("Field {$field_name} not found in POST data");
        }
    }
    
    error_log("=== END REVIEW SAVE DEBUG ===");
}
add_action('save_post', 'dental_clinic_save_review_meta');

// Принудительное сохранение мета-полей для отзывов
function dental_clinic_force_save_review_meta($post_id) {
    if (get_post_type($post_id) !== 'review') {
        return;
    }
    
    error_log("=== FORCE SAVE REVIEW META ===");
    error_log("Post ID: " . $post_id);
    error_log("POST data: " . print_r($_POST, true));
    
    // Принудительно сохраняем мета-поля
    if (isset($_POST['reviewer_name'])) {
        $value = sanitize_text_field($_POST['reviewer_name']);
        update_post_meta($post_id, '_reviewer_name', $value);
        error_log("FORCE SAVED reviewer_name: " . $value);
    }
    
    if (isset($_POST['review_video_url'])) {
        $value = $_POST['review_video_url'];
        // Разрешаем iframe теги для video_url
        $allowed_tags = wp_kses_allowed_html('post');
        $allowed_tags['iframe'] = array(
            'src' => true,
            'width' => true,
            'height' => true,
            'frameborder' => true,
            'allow' => true,
            'allowfullscreen' => true,
            'style' => true,
            'class' => true,
            'id' => true
        );
        $value = wp_kses($value, $allowed_tags);
        update_post_meta($post_id, '_review_video_url', $value);
        error_log("FORCE SAVED review_video_url: " . $value);
    }
    
    error_log("=== END FORCE SAVE ===");
}
add_action('save_post', 'dental_clinic_force_save_review_meta', 20);

// Дополнительная отладка для сохранения отзывов
function dental_clinic_debug_save_review($post_id) {
    if (get_post_type($post_id) === 'review') {
        error_log("Review save triggered for post ID: {$post_id}");
        error_log("POST data: " . print_r($_POST, true));
    }
}
add_action('save_post', 'dental_clinic_debug_save_review', 5);

// Тестовая функция для проверки мета-полей
function dental_clinic_test_meta_save() {
    if (isset($_GET['test_meta_save']) && current_user_can('administrator')) {
        // Найдем первый отзыв
        $reviews = get_posts(array(
            'post_type' => 'review',
            'posts_per_page' => 1,
            'post_status' => 'any'
        ));
        
        if (!empty($reviews)) {
            $test_post_id = $reviews[0]->ID;
            $result = update_post_meta($test_post_id, '_reviewer_name', 'Тестовое имя от ' . date('H:i:s'));
            echo "Test result: " . ($result ? 'SUCCESS' : 'FAILED') . " for post ID: " . $test_post_id;
            echo "<br>Post title: " . $reviews[0]->post_title;
            echo "<br>Post status: " . $reviews[0]->post_status;
        } else {
            echo "No reviews found!";
        }
        exit;
    }
}
add_action('init', 'dental_clinic_test_meta_save');

// Функция для проверки всех отзывов
function dental_clinic_check_reviews() {
    if (isset($_GET['check_reviews']) && current_user_can('administrator')) {
        $reviews = get_posts(array(
            'post_type' => 'review',
            'posts_per_page' => -1,
            'post_status' => 'any'
        ));
        
        echo "<h2>Все отзывы:</h2>";
        if (!empty($reviews)) {
            foreach ($reviews as $review) {
                $reviewer_name = get_post_meta($review->ID, '_reviewer_name', true);
                $video_url = get_post_meta($review->ID, '_review_video_url', true);
                
                echo "<div style='border: 1px solid #ccc; margin: 10px; padding: 10px;'>";
                echo "<strong>ID:</strong> " . $review->ID . "<br>";
                echo "<strong>Заголовок:</strong> " . $review->post_title . "<br>";
                echo "<strong>Статус:</strong> " . $review->post_status . "<br>";
                echo "<strong>Имя пациента:</strong> '" . $reviewer_name . "'<br>";
                echo "<strong>Видео URL:</strong> '" . $video_url . "'<br>";
                echo "</div>";
            }
        } else {
            echo "Отзывы не найдены!";
        }
        exit;
    }
}
add_action('init', 'dental_clinic_check_reviews');

// Шорткод для слайдера врачей
function dental_clinic_doctors_slider_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 6
    ), $atts);
    
    $doctors = new WP_Query(array(
        'post_type' => 'doctor',
        'posts_per_page' => $atts['count'],
        'post_status' => 'publish'
    ));
    
    if (!$doctors->have_posts()) {
        return '<p>Врачи не найдены</p>';
    }
    
    $output = '<div class="slider-container">';
    
    while ($doctors->have_posts()) {
        $doctors->the_post();
        $full_name = get_post_meta(get_the_ID(), '_doctor_full_name', true);
        $position = get_post_meta(get_the_ID(), '_doctor_position', true);
        $experience = get_post_meta(get_the_ID(), '_doctor_experience', true);
        $short_preview = get_post_meta(get_the_ID(), '_doctor_short_preview', true);
        $video_url = get_post_meta(get_the_ID(), '_doctor_video_url', true);
        
        $output .= '<div class="slider-slide">';
        $output .= '<div class="doctor-card">';
        
        if (has_post_thumbnail()) {
            $output .= '<div class="doctor-photo">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</div>';
        } else {
            $output .= '<div class="doctor-photo">👨‍⚕️</div>';
        }
        
        $output .= '<h3 class="shortcode-doctor-name">' . ($full_name ?: get_the_title()) . '</h3>';
        if ($position) {
            $output .= '<p class="shortcode-doctor-position">' . esc_html($position) . '</p>';
        }
        if ($experience) {
            $output .= '<p class="shortcode-doctor-experience">' . esc_html($experience) . '</p>';
        }
        if ($short_preview) {
            $output .= '<p class="shortcode-doctor-preview">' . esc_html($short_preview) . '</p>';
        }
        
        $output .= '<div class="doctor-actions">';
        $output .= '<a href="' . get_permalink() . '" class="doctor-btn">Подробнее</a>';
        if ($video_url) {
            $output .= '<button class="doctor-video-btn-shortcode" data-video="' . esc_url($video_url) . '">🎥 Видео</button>';
        }
        $output .= '</div>';
        
        $output .= '</div>';
        $output .= '</div>';
    }
    
    wp_reset_postdata();
    
    $output .= '</div>';
    return $output;
}
add_shortcode('doctors_slider', 'dental_clinic_doctors_slider_shortcode');

// Шорткод для отзывов
function dental_clinic_reviews_shortcode($atts) {
    $atts = shortcode_atts(array(
        'count' => 3
    ), $atts);
    
    $reviews = new WP_Query(array(
        'post_type' => 'review',
        'posts_per_page' => $atts['count'],
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    ));
    
    if (!$reviews->have_posts()) {
        return '<p>Отзывы не найдены</p>';
    }
    
    $output = '<div class="reviews-container">';
    
    while ($reviews->have_posts()) {
        $reviews->the_post();
        $reviewer_name = get_post_meta(get_the_ID(), '_reviewer_name', true);
        $video_url = get_post_meta(get_the_ID(), '_review_video_url', true);
        
        $output .= '<div class="review-card">';
        
        if (has_post_thumbnail()) {
            $output .= '<div class="reviewer-photo">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</div>';
        } else {
            $output .= '<div class="reviewer-photo">👤</div>';
        }
        
        $output .= '<div class="review-content">';
        $output .= '<div class="review-text">' . get_the_content() . '</div>';
        $output .= '<div class="reviewer-name">' . ($reviewer_name ?: 'Анонимный пациент') . '</div>';
        $output .= '</div>';
        
        if ($video_url) {
            $output .= '<button class="review-video-btn" data-video="' . esc_url($video_url) . '">▶</button>';
        }
        
        $output .= '</div>';
    }
    
    wp_reset_postdata();
    
    $output .= '</div>';
    return $output;
}
add_shortcode('reviews', 'dental_clinic_reviews_shortcode');

// Создаем страницы при активации темы
function dental_clinic_create_pages() {
    // Проверяем, существуют ли уже страницы
    $pages = array(
        'implantatsiya' => array(
            'title' => 'Имплантация',
            'content' => '<h1>Имплантация зубов</h1><p>Восстановите зубы навсегда с помощью имплантации</p>'
        ),
        'sovety-kitay' => array(
            'title' => 'Советы для тех, кто решил делать имплантацию в Китае',
            'content' => '<h1>Советы для имплантации в Китае</h1><p>Важная информация для безопасного и качественного лечения</p>',
            'template' => 'page-sovety-kitay.php'
        ),
        'o-organizatsii' => array(
            'title' => 'О организации',
            'content' => '<h1>О организации</h1><p>Страница в разработке</p>'
        ),
        'rekvizity' => array(
            'title' => 'Реквизиты',
            'content' => '<h1>Реквизиты</h1><p>Страница в разработке</p>'
        ),
        'litsenzii' => array(
            'title' => 'Лицензии',
            'content' => '<h1>Лицензии</h1><p>Страница в разработке</p>'
        ),
        'yuridicheskaya-informatsiya' => array(
            'title' => 'Юридическая информация',
            'content' => '<h1>Юридическая информация</h1><p>Страница в разработке</p>'
        ),
        'blog' => array(
            'title' => 'Блог',
            'content' => '<h1>Блог</h1><p>Страница в разработке</p>'
        ),
        'kontakty' => array(
            'title' => 'Контакты',
            'content' => '<h1>Контакты</h1><p>Страница в разработке</p>'
        ),
        'spasibo' => array(
            'title' => 'Спасибо',
            'content' => '<h1>Спасибо!</h1><p>Ваша заявка отправлена. Мы свяжемся с вами в ближайшее время.</p>'
        )
    );
    
    foreach ($pages as $slug => $page_data) {
        $existing_page = get_page_by_path($slug);
        if (!$existing_page) {
            $page_args = array(
                'post_title' => $page_data['title'],
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => $slug
            );
            
            $page_id = wp_insert_post($page_args);
            
            // Если указан шаблон, устанавливаем его
            if ($page_id && isset($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }
        }
    }
}
add_action('after_switch_theme', 'dental_clinic_create_pages');

// Создаем страницу имплантации при каждом запуске, если её нет
function dental_clinic_ensure_implant_page() {
    $implant_page = get_page_by_path('implantatsiya');
    if (!$implant_page) {
        wp_insert_post(array(
            'post_title' => 'Имплантация',
            'post_content' => '<h1>Имплантация зубов</h1><p>Восстановите зубы навсегда с помощью имплантации</p>',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'implantatsiya'
        ));
    }
}
add_action('init', 'dental_clinic_ensure_implant_page');

// Создаем страницу советов по Китаю при каждом запуске, если её нет
function dental_clinic_ensure_china_advice_page() {
    $china_page = get_page_by_path('sovety-kitay');
    if (!$china_page) {
        $page_id = wp_insert_post(array(
            'post_title' => 'Советы для тех, кто решил делать имплантацию в Китае',
            'post_content' => '<h1>Советы для имплантации в Китае</h1><p>Важная информация для безопасного и качественного лечения</p>',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_name' => 'sovety-kitay'
        ));
        
        if ($page_id) {
            update_post_meta($page_id, '_wp_page_template', 'page-sovety-kitay.php');
        }
    }
}
add_action('init', 'dental_clinic_ensure_china_advice_page');

// Создаем меню при активации темы
function dental_clinic_create_menu() {
    // Проверяем, существует ли уже меню
    $menu_name = 'Главное меню';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        // Создаем меню
        $menu_id = wp_create_nav_menu($menu_name);
        
        if ($menu_id) {
            // Получаем ID страниц
            $home_page = get_option('page_on_front');
            $doctor_page = get_post_type_archive_link('doctor');
            $about_page = get_page_by_path('o-klinike');
            $contacts_page = get_page_by_path('kontakty');
            $implant_page = get_page_by_path('implantatsiya');
            
            // Добавляем пункты меню
            $menu_items = array();
            
            // Главная страница
            $menu_items[] = array(
                'title' => 'Главная',
                'url' => home_url(),
                'menu_order' => 1
            );
            
            if ($implant_page) {
                $menu_items[] = array(
                    'title' => 'Имплантация',
                    'url' => get_permalink($implant_page->ID),
                    'menu_order' => 2
                );
            }
            
            // Врачи (архив)
            $menu_items[] = array(
                'title' => 'Врачи',
                'url' => get_post_type_archive_link('doctor'),
                'menu_order' => 3
            );
            
            if ($about_page) {
                // Добавляем родительский пункт "О клинике"
                $about_parent_item_id = wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => 'О клинике',
                    'menu-item-url' => get_permalink($about_page->ID),
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 4
                ));

                // Дочерние пункты: Информация, Реквизиты, Лицензии
                if ($about_parent_item_id && !is_wp_error($about_parent_item_id)) {
                    // Информация → та же страница o-klinike
                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' => 'Информация',
                        'menu-item-url' => get_permalink($about_page->ID),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $about_parent_item_id
                    ));

                    $rekvizity_page = get_page_by_path('rekvizity');
                    if ($rekvizity_page) {
                        wp_update_nav_menu_item($menu_id, 0, array(
                            'menu-item-title' => 'Реквизиты',
                            'menu-item-url' => get_permalink($rekvizity_page->ID),
                            'menu-item-status' => 'publish',
                            'menu-item-parent-id' => $about_parent_item_id
                        ));
                    }

                    $litsenzii_page = get_page_by_path('litsenzii');
                    if ($litsenzii_page) {
                        wp_update_nav_menu_item($menu_id, 0, array(
                            'menu-item-title' => 'Лицензии',
                            'menu-item-url' => get_permalink($litsenzii_page->ID),
                            'menu-item-status' => 'publish',
                            'menu-item-parent-id' => $about_parent_item_id
                        ));
                    }
                }
            }
            
            // Блог
            $blog_page = get_page_by_path('blog');
            if ($blog_page) {
                $menu_items[] = array(
                    'title' => 'Блог',
                    'url' => get_permalink($blog_page->ID),
                    'menu_order' => 5
                );
            }
            
            if ($contacts_page) {
                $menu_items[] = array(
                    'title' => 'Контакты',
                    'url' => get_permalink($contacts_page->ID),
                    'menu_order' => 6
                );
            }
            
            // Добавляем пункты в меню
            foreach ($menu_items as $item) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $item['title'],
                    'menu-item-url' => $item['url'],
                    'menu-item-status' => 'publish',
                    'menu-item-position' => $item['menu_order']
                ));
            }
            
            // Привязываем меню к локации
            $locations = get_theme_mod('nav_menu_locations');
            $locations['primary'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);
        }
    } else {
        // Если меню уже существует, проверяем, есть ли в нем ссылка на имплантацию
        $menu_items = wp_get_nav_menu_items($menu_exists->term_id);
        $has_implant_link = false;
        $about_parent_item = null;
        $has_about_children = array(
            'Информация' => false,
            'Реквизиты' => false,
            'Лицензии' => false,
        );
        
        foreach ($menu_items as $item) {
            if (strpos($item->url, 'implantatsiya') !== false) {
                $has_implant_link = true;
            }
            // Ищем родительский пункт "О клинике"
            if (!$about_parent_item && $item->title === 'О клинике') {
                $about_parent_item = $item;
            }
            // Отмечаем дочерние пункты, если они уже есть
            if ($item->menu_item_parent) {
                if (isset($has_about_children[$item->title])) {
                    $has_about_children[$item->title] = true;
                }
            }
        }
        
        // Если ссылки на имплантацию нет, добавляем её
        if (!$has_implant_link) {
            $implant_page = get_page_by_path('implantatsiya');
            if ($implant_page) {
                wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                    'menu-item-title' => 'Имплантация',
                    'menu-item-url' => get_permalink($implant_page->ID),
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 2
                ));
            }
        }

        // Если есть родитель "О клинике", убеждаемся, что у него есть нужные подпункты
        if ($about_parent_item) {
            $parent_id = $about_parent_item->ID;
            // Реквизиты
            if (!$has_about_children['Реквизиты']) {
                $rekvizity_page = get_page_by_path('rekvizity');
                if ($rekvizity_page) {
                    wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                        'menu-item-title' => 'Реквизиты',
                        'menu-item-url' => get_permalink($rekvizity_page->ID),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $parent_id
                    ));
                }
            }
            // Лицензии
            if (!$has_about_children['Лицензии']) {
                $litsenzii_page = get_page_by_path('litsenzii');
                if ($litsenzii_page) {
                    wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                        'menu-item-title' => 'Лицензии',
                        'menu-item-url' => get_permalink($litsenzii_page->ID),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $parent_id
                    ));
                }
            }
        } else {
            // Если родителя "О клинике" нет вообще — создаём его и дочерние пункты
            $about_page = get_page_by_path('o-klinike');
            if ($about_page) {
                $about_parent_item_id = wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                    'menu-item-title' => 'О клинике',
                    'menu-item-url' => get_permalink($about_page->ID),
                    'menu-item-status' => 'publish',
                ));
                if ($about_parent_item_id && !is_wp_error($about_parent_item_id)) {
                    // Информация
                    wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                        'menu-item-title' => 'Информация',
                        'menu-item-url' => get_permalink($about_page->ID),
                        'menu-item-status' => 'publish',
                        'menu-item-parent-id' => $about_parent_item_id
                    ));
                    // Реквизиты
                    $rekvizity_page = get_page_by_path('rekvizity');
                    if ($rekvizity_page) {
                        wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                            'menu-item-title' => 'Реквизиты',
                            'menu-item-url' => get_permalink($rekvizity_page->ID),
                            'menu-item-status' => 'publish',
                            'menu-item-parent-id' => $about_parent_item_id
                        ));
                    }
                    // Лицензии
                    $litsenzii_page = get_page_by_path('litsenzii');
                    if ($litsenzii_page) {
                        wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                            'menu-item-title' => 'Лицензии',
                            'menu-item-url' => get_permalink($litsenzii_page->ID),
                            'menu-item-status' => 'publish',
                            'menu-item-parent-id' => $about_parent_item_id
                        ));
                    }
                }
            }
        }
    }
}
add_action('after_switch_theme', 'dental_clinic_create_menu');

// Проверяем и создаем меню при каждом запуске
function dental_clinic_ensure_menu() {
    $menu_name = 'Главное меню';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        dental_clinic_create_menu();
    } else {
        // Проверяем, есть ли ссылка на имплантацию в существующем меню
        $menu_items = wp_get_nav_menu_items($menu_exists->term_id);
        $has_implant_link = false;
        $has_blog_link = false;
        $has_contacts_link = false;
        
        if ($menu_items) {
            foreach ($menu_items as $item) {
                if (strpos($item->url, 'implantatsiya') !== false) {
                    $has_implant_link = true;
                }
                if (strpos($item->url, 'blog') !== false) {
                    $has_blog_link = true;
                }
                if (strpos($item->url, 'kontakty') !== false) {
                    $has_contacts_link = true;
                }
            }
        }
        
        // Если ссылки на имплантацию нет, добавляем её
        if (!$has_implant_link) {
            $implant_page = get_page_by_path('implantatsiya');
            if ($implant_page) {
                wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                    'menu-item-title' => 'Имплантация',
                    'menu-item-url' => get_permalink($implant_page->ID),
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 2
                ));
            }
        }
        
        // Если ссылки на блог нет, добавляем её
        if (!$has_blog_link) {
            $blog_page = get_page_by_path('blog');
            if ($blog_page) {
                wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                    'menu-item-title' => 'Блог',
                    'menu-item-url' => get_permalink($blog_page->ID),
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 5
                ));
            }
        }
        
        // Если ссылки на контакты нет, добавляем её
        if (!$has_contacts_link) {
            $contacts_page = get_page_by_path('kontakty');
            if ($contacts_page) {
                wp_update_nav_menu_item($menu_exists->term_id, 0, array(
                    'menu-item-title' => 'Контакты',
                    'menu-item-url' => get_permalink($contacts_page->ID),
                    'menu-item-status' => 'publish',
                    'menu-item-position' => 6
                ));
            }
        }
        
    }
}
add_action('init', 'dental_clinic_ensure_menu');

// Принудительное пересоздание меню с правильным порядком
// POTENTIAL REDIRECT / URL LOGIC
function dental_clinic_recreate_menu() {
    if (isset($_GET['recreate_menu']) && current_user_can('administrator')) {
        // Удаляем старое меню
        $menu_name = 'Главное меню';
        $menu_exists = wp_get_nav_menu_object($menu_name);
        
        if ($menu_exists) {
            wp_delete_nav_menu($menu_exists->term_id);
        }
        
        // Создаем новое меню с правильным порядком
        dental_clinic_create_menu();
        
        wp_redirect(admin_url('nav-menus.php?menu_created=1'));
        exit;
    }
}
add_action('admin_init', 'dental_clinic_recreate_menu');

// Принудительное обновление меню (выполнить один раз)
function dental_clinic_force_update_menu() {
    if (isset($_GET['force_update_menu']) && current_user_can('administrator')) {
        // Удаляем старое меню
        $menu_name = 'Главное меню';
        $menu_exists = wp_get_nav_menu_object($menu_name);
        if ($menu_exists) {
            wp_delete_nav_menu($menu_exists->term_id);
        }
        
        // Создаем новое меню
        dental_clinic_create_menu();
        
        echo "Меню обновлено!";
        exit;
    }
}
add_action('init', 'dental_clinic_force_update_menu');

// Одноразовый триггер: принудительно добавить подпункты под «О клинике» в существующее меню
function dental_clinic_add_about_children_manual() {
    if (!is_user_logged_in() || !current_user_can('administrator')) {
        return;
    }
    if (!isset($_GET['add_about_children']) || $_GET['add_about_children'] != '1') {
        return;
    }

    $menu_name = 'Главное меню';
    $menu = wp_get_nav_menu_object($menu_name);
    if (!$menu) {
        echo 'Меню не найдено';
        exit;
    }

    $items = wp_get_nav_menu_items($menu->term_id);
    $about_parent = null;
    if ($items) {
        foreach ($items as $item) {
            if ($item->title === 'О клинике' || (strpos($item->url, 'o-klinike') !== false)) {
                $about_parent = $item;
                break;
            }
        }
    }

    if (!$about_parent) {
        $about_page = get_page_by_path('o-klinike');
        if ($about_page) {
            $parent_id = wp_update_nav_menu_item($menu->term_id, 0, array(
                'menu-item-title' => 'О клинике',
                'menu-item-url' => get_permalink($about_page->ID),
                'menu-item-status' => 'publish',
            ));
            if (!is_wp_error($parent_id)) {
                $about_parent = (object) array('ID' => $parent_id);
            }
        }
    }

    if ($about_parent) {
        $parent_id = $about_parent->ID;

        // Список уже существующих дочерних по заголовкам
        $existing_children = array();
        $items = wp_get_nav_menu_items($menu->term_id);
        if ($items) {
            foreach ($items as $item) {
                if ((int)$item->menu_item_parent === (int)$parent_id) {
                    $existing_children[$item->title] = true;
                }
            }
        }


        // Реквизиты
        if (empty($existing_children['Реквизиты'])) {
            $rekvizity_page = get_page_by_path('rekvizity');
            if ($rekvizity_page) {
                wp_update_nav_menu_item($menu->term_id, 0, array(
                    'menu-item-title' => 'Реквизиты',
                    'menu-item-url' => get_permalink($rekvizity_page->ID),
                    'menu-item-status' => 'publish',
                    'menu-item-parent-id' => $parent_id
                ));
            }
        }

        // Лицензии
        if (empty($existing_children['Лицензии'])) {
            $litsenzii_page = get_page_by_path('litsenzii');
            if ($litsenzii_page) {
                wp_update_nav_menu_item($menu->term_id, 0, array(
                    'menu-item-title' => 'Лицензии',
                    'menu-item-url' => get_permalink($litsenzii_page->ID),
                    'menu-item-status' => 'publish',
                    'menu-item-parent-id' => $parent_id
                ));
            }
        }

        echo 'Подпункты добавлены';
    } else {
        echo 'Не удалось найти/создать пункт «О клинике»';
    }
    exit;
}
add_action('init', 'dental_clinic_add_about_children_manual');

// Гарантируем подпункты под «О клинике» в меню, привязанном к локации primary
function dental_clinic_ensure_about_children_in_primary_menu() {
    // Выполняем только на фронтенде
    if (is_admin()) return;

    $locations = get_nav_menu_locations();
    if (empty($locations['primary'])) return;

    $menu_id = (int) $locations['primary'];
    if (!$menu_id) return;

    $items = wp_get_nav_menu_items($menu_id);
    if (!$items) return;

    // Ищем родителя «О клинике» — по заголовку или по ссылке /o-klinike
    $about_parent = null;
    foreach ($items as $itm) {
        $title = trim(wp_strip_all_tags($itm->title));
        if ($title === 'О клинике' || strpos($itm->url, '/o-klinike') !== false) {
            $about_parent = $itm;
            break;
        }
    }

    // Если нет — выходим, не вмешиваемся в чужую структуру
    if (!$about_parent) return;

    // Собираем существующие дочерние
    $existing_children = array();
    foreach ($items as $itm) {
        if ((int)$itm->menu_item_parent === (int)$about_parent->ID) {
            $existing_children[trim(wp_strip_all_tags($itm->title))] = true;
        }
    }

    // Страницы-источники
    $about_page     = get_page_by_path('o-klinike');
    $rekvizity_page = get_page_by_path('rekvizity');
    $litsenzii_page = get_page_by_path('litsenzii');

    // Добавляем недостающие
    if ($rekvizity_page && empty($existing_children['Реквизиты'])) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Реквизиты',
            'menu-item-url' => get_permalink($rekvizity_page->ID),
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => (int)$about_parent->ID,
        ));
    }
    if ($litsenzii_page && empty($existing_children['Лицензии'])) {
        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' => 'Лицензии',
            'menu-item-url' => get_permalink($litsenzii_page->ID),
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => (int)$about_parent->ID,
        ));
    }
}
add_action('init', 'dental_clinic_ensure_about_children_in_primary_menu');

// Создаем тестовые отзывы при активации темы
function dental_clinic_create_sample_reviews() {
    // Проверяем, есть ли уже отзывы
    $existing_reviews = get_posts(array(
        'post_type' => 'review',
        'posts_per_page' => 1,
        'post_status' => 'publish'
    ));
    
    if (!empty($existing_reviews)) {
        return; // Отзывы уже есть
    }
    
    $sample_reviews = array(
        array(
            'title' => 'Отзыв Анны Петровой',
            'content' => 'Каждый врач – специалист с опытом от 7 до 22 лет. Профессионализм наших врачей проверен временем и подтверждён тысячами довольных пациентов.',
            'reviewer_name' => 'Анна Петрова',
            'video_url' => 'https://rutube.ru/video/123456789/'
        ),
        array(
            'title' => 'Отзыв Михаила Иванова',
            'content' => 'Очень доволен результатом лечения. Врачи настоящие профессионалы, используют современное оборудование. Рекомендую всем!',
            'reviewer_name' => 'Михаил Иванов',
            'video_url' => 'https://rutube.ru/video/987654321/'
        ),
        array(
            'title' => 'Отзыв Елены Сидоровой',
            'content' => 'Прошла полное лечение зубов. Все прошло безболезненно и качественно. Спасибо за мою новую улыбку!',
            'reviewer_name' => 'Елена Сидорова',
            'video_url' => 'https://rutube.ru/video/456789123/'
        )
    );
    
    foreach ($sample_reviews as $review_data) {
        $post_id = wp_insert_post(array(
            'post_title' => $review_data['title'],
            'post_content' => $review_data['content'],
            'post_status' => 'publish',
            'post_type' => 'review'
        ));
        
        if ($post_id) {
            update_post_meta($post_id, '_reviewer_name', $review_data['reviewer_name']);
            update_post_meta($post_id, '_review_video_url', $review_data['video_url']);
        }
    }
}
add_action('after_switch_theme', 'dental_clinic_create_sample_reviews');

/**
 * Функция дублирования постов
 */
// POTENTIAL REDIRECT / URL LOGIC
function duplicate_post_as_draft() {
    global $wpdb;
    
    if (!(isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'duplicate_post_as_draft' == $_REQUEST['action']))) {
        wp_die('Нет поста для дублирования!');
    }
    
    // Получаем ID поста
    $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
    $post = get_post($post_id);
    
    // Проверяем права доступа
    if (isset($post) && $post != null) {
        $current_user = wp_get_current_user();
        $new_post_author = $current_user->ID;
        
        // Создаем массив для нового поста
        $args = array(
            'comment_status' => $post->comment_status,
            'ping_status'    => $post->ping_status,
            'post_author'    => $new_post_author,
            'post_content'   => $post->post_content,
            'post_excerpt'   => $post->post_excerpt,
            'post_name'      => $post->post_name,
            'post_parent'    => $post->post_parent,
            'post_password'  => $post->post_password,
            'post_status'    => 'draft',
            'post_title'     => $post->post_title . ' (Копия)',
            'post_type'      => $post->post_type,
            'to_ping'        => $post->to_ping,
            'menu_order'     => $post->menu_order
        );
        
        // Вставляем новый пост
        $new_post_id = wp_insert_post($args);
        
        // Дублируем таксономии
        $taxonomies = get_object_taxonomies($post->post_type);
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }
        
        // Дублируем мета-поля
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos) != 0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if ($meta_key == '_wp_old_slug') continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[] = "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query .= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }
        
        // Перенаправляем на новый пост
        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Ошибка дублирования: пост не найден!');
    }
}
add_action('admin_action_duplicate_post_as_draft', 'duplicate_post_as_draft');

/**
 * Добавляем кнопку дублирования в админке
 */
function duplicate_post_link($actions, $post) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Дублировать этот пост" rel="permalink">Дублировать</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'duplicate_post_link', 10, 2);

/**
 * Добавляем кнопку дублирования для кастомных типов постов
 */
function duplicate_custom_post_link($actions, $post) {
    if (current_user_can('edit_posts') && in_array($post->post_type, array('doctor', 'review'))) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce') . '" title="Дублировать этот пост" rel="permalink">Дублировать</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'duplicate_custom_post_link', 10, 2);

/**
 * Добавляем кнопку дублирования в мета-бокс
 */
function duplicate_post_button() {
    global $post;
    
    if (isset($_GET['post'])) {
        $notpost = $_GET['post'];
    } elseif (isset($_POST['post_ID'])) {
        $notpost = $_POST['post_ID'];
    } else {
        $notpost = '';
    }
    
    if ($notpost) {
        if (current_user_can('edit_posts')) {
            echo '<div id="duplicate-action">';
            echo '<a class="submitduplicate duplication" href="' . wp_nonce_url('admin.php?action=duplicate_post_as_draft&post=' . $notpost, basename(__FILE__), 'duplicate_nonce') . '">Дублировать этот пост</a>';
            echo '</div>';
        }
    }
}
add_action('post_submitbox_misc_actions', 'duplicate_post_button');

/**
 * Стили для кнопки дублирования
 */
function duplicate_post_admin_styles() {
    echo '<style>
        .duplication {
            background: #0073aa;
            color: #fff;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 3px;
            display: inline-block;
            margin: 10px 0;
        }
        .duplication:hover {
            background: #005177;
            color: #fff;
        }
    </style>';
}
add_action('admin_head', 'duplicate_post_admin_styles');

/**
 * Удалено: самописная логика CTA-формы. Используем Contact Form 7.
 */

// overrides.css перемещен в garbage/

/**
 * Функции для блога
 */

/**
 * Проверяет, является ли статья топ-статьей
 */
function is_featured_article($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    // Проверяем мета-поле для топ-статьи
    return get_post_meta($post_id, '_is_featured_article', true) === '1';
}

/**
 * Получает изображения для топ-статьи
 */
function get_featured_article_images($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $images = get_post_meta($post_id, '_featured_article_images', true);
    return $images ? $images : array();
}

/**
 * Получает позиции изображений для топ-статьи
 */
function get_featured_article_image_positions($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    
    $positions = get_post_meta($post_id, '_featured_article_image_positions', true);
    return $positions ? $positions : array();
}

/**
 * Обрабатывает контент топ-статьи, вставляя изображения в нужные места
 */
function process_featured_article_content($content) {
    if (!is_single() || !is_featured_article()) {
        return $content;
    }
    
    $images = get_featured_article_images();
    $positions = get_featured_article_image_positions();
    
    if (empty($images) || empty($positions)) {
        return $content;
    }
    
    // Разбиваем контент на параграфы
    $paragraphs = explode('</p>', $content);
    $processed_paragraphs = array();
    $image_index = 0;
    
    foreach ($paragraphs as $index => $paragraph) {
        $processed_paragraphs[] = $paragraph;
        
        // Проверяем, нужно ли вставить изображение после этого параграфа
        foreach ($positions as $position) {
            if (isset($position['paragraph_number']) && 
                $position['paragraph_number'] == ($index + 1) && 
                isset($position['image_index']) && 
                isset($images[$position['image_index']])) {
                
                $image_url = $images[$position['image_index']];
                $image_html = '<div class="article-inline-image">';
                $image_html .= '<img src="' . esc_url($image_url) . '" alt="Изображение в статье" class="article-image-inline">';
                $image_html .= '</div>';
                
                $processed_paragraphs[] = $image_html;
            }
        }
    }
    
    return implode('</p>', $processed_paragraphs);
}

// Применяем фильтр к контенту
add_filter('the_content', 'process_featured_article_content');

/**
 * Удалено: самописный AJAX обработчик заявок. Используем Contact Form 7.
 */

/**
 * Добавляем мета-боксы для топ-статьи
 */
function add_featured_article_meta_boxes() {
    add_meta_box(
        'featured_article_settings',
        'Настройки топ-статьи',
        'render_featured_article_meta_box',
        'post',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'add_featured_article_meta_boxes');

/**
 * Рендерим мета-бокс для топ-статьи
 */
function render_featured_article_meta_box($post) {
    wp_nonce_field('featured_article_meta_box', 'featured_article_meta_box_nonce');
    
    $is_featured = get_post_meta($post->ID, '_is_featured_article', true);
    $images = get_post_meta($post->ID, '_featured_article_images', true);
    $positions = get_post_meta($post->ID, '_featured_article_image_positions', true);
    
    if (!is_array($images)) $images = array();
    if (!is_array($positions)) $positions = array();
    
    ?>
    <p>
        <label>
            <input type="checkbox" name="is_featured_article" value="1" <?php checked($is_featured, '1'); ?>>
            Это топ-статья (с встроенными изображениями)
        </label>
    </p>
    
    <div id="featured-article-images" style="<?php echo $is_featured ? '' : 'display: none;'; ?>">
        <h4>Изображения для вставки в текст:</h4>
        <div id="images-container">
            <?php foreach ($images as $index => $image_url): ?>
            <div class="image-item">
                <input type="text" name="featured_images[]" value="<?php echo esc_attr($image_url); ?>" placeholder="URL изображения" style="width: 100%; margin-bottom: 5px;">
                <button type="button" class="button remove-image">Удалить</button>
            </div>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button add-image">Добавить изображение</button>
        
        <h4>Позиции изображений:</h4>
        <div id="positions-container">
            <?php foreach ($positions as $index => $position): ?>
            <div class="position-item">
                <label>Изображение #<input type="number" name="image_indices[]" value="<?php echo esc_attr($position['image_index']); ?>" min="0" style="width: 50px;"> после параграфа #<input type="number" name="paragraph_numbers[]" value="<?php echo esc_attr($position['paragraph_number']); ?>" min="1" style="width: 50px;"></label>
                <button type="button" class="button remove-position">Удалить</button>
            </div>
            <?php endforeach; ?>
        </div>
        <button type="button" class="button add-position">Добавить позицию</button>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        $('input[name="is_featured_article"]').change(function() {
            if ($(this).is(':checked')) {
                $('#featured-article-images').show();
            } else {
                $('#featured-article-images').hide();
            }
        });
        
        $('.add-image').click(function() {
            var html = '<div class="image-item">' +
                      '<input type="text" name="featured_images[]" value="" placeholder="URL изображения" style="width: 100%; margin-bottom: 5px;">' +
                      '<button type="button" class="button remove-image">Удалить</button>' +
                      '</div>';
            $('#images-container').append(html);
        });
        
        $(document).on('click', '.remove-image', function() {
            $(this).parent().remove();
        });
        
        $('.add-position').click(function() {
            var html = '<div class="position-item">' +
                      '<label>Изображение #<input type="number" name="image_indices[]" value="0" min="0" style="width: 50px;"> после параграфа #<input type="number" name="paragraph_numbers[]" value="1" min="1" style="width: 50px;"></label>' +
                      '<button type="button" class="button remove-position">Удалить</button>' +
                      '</div>';
            $('#positions-container').append(html);
        });
        
        $(document).on('click', '.remove-position', function() {
            $(this).parent().remove();
        });
    });
    </script>
    <?php
}

/**
 * Сохраняем мета-данные топ-статьи
 */
function save_featured_article_meta($post_id) {
    if (!isset($_POST['featured_article_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['featured_article_meta_box_nonce'], 'featured_article_meta_box')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Сохраняем флаг топ-статьи
    $is_featured = isset($_POST['is_featured_article']) ? '1' : '0';
    update_post_meta($post_id, '_is_featured_article', $is_featured);
    
    // Сохраняем изображения
    if (isset($_POST['featured_images'])) {
        $images = array_filter($_POST['featured_images']);
        update_post_meta($post_id, '_featured_article_images', $images);
    }
    
    // Сохраняем позиции
    if (isset($_POST['image_indices']) && isset($_POST['paragraph_numbers'])) {
        $positions = array();
        $image_indices = $_POST['image_indices'];
        $paragraph_numbers = $_POST['paragraph_numbers'];
        
        for ($i = 0; $i < count($image_indices); $i++) {
            if (!empty($image_indices[$i]) && !empty($paragraph_numbers[$i])) {
                $positions[] = array(
                    'image_index' => intval($image_indices[$i]),
                    'paragraph_number' => intval($paragraph_numbers[$i])
                );
            }
        }
        
        update_post_meta($post_id, '_featured_article_image_positions', $positions);
    }
}
add_action('save_post', 'save_featured_article_meta');

/**
 * Добавляем мета-бокс для похожих статей
 */
function add_related_posts_meta_box() {
    add_meta_box(
        'related_posts',
        'Похожие статьи',
        'render_related_posts_meta_box',
        'post',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_related_posts_meta_box');

/**
 * Рендерим мета-бокс для похожих статей
 */
function render_related_posts_meta_box($post) {
    wp_nonce_field('related_posts_meta_box', 'related_posts_meta_box_nonce');
    
    $related_posts = get_post_meta($post->ID, '_related_posts', true);
    if (!is_array($related_posts)) {
        $related_posts = array();
    }
    
    // Получаем все опубликованные статьи
    $all_posts = get_posts(array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'numberposts' => -1,
        'exclude' => array($post->ID),
        'orderby' => 'title',
        'order' => 'ASC'
    ));
    
    ?>
    <p>
        <label for="related_post_1">Похожая статья 1:</label><br>
        <select name="related_posts[]" id="related_post_1" style="width: 100%;">
            <option value="">— Не выбрано —</option>
            <?php foreach ($all_posts as $item) : ?>
                <option value="<?php echo $item->ID; ?>" <?php selected(isset($related_posts[0]) ? $related_posts[0] : '', $item->ID); ?>>
                    <?php echo esc_html($item->post_title); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    
    <p>
        <label for="related_post_2">Похожая статья 2:</label><br>
        <select name="related_posts[]" id="related_post_2" style="width: 100%;">
            <option value="">— Не выбрано —</option>
            <?php foreach ($all_posts as $item) : ?>
                <option value="<?php echo $item->ID; ?>" <?php selected(isset($related_posts[1]) ? $related_posts[1] : '', $item->ID); ?>>
                    <?php echo esc_html($item->post_title); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    
    <p style="color: #666; font-size: 12px;">
        Выберите до 2 похожих статей, которые будут отображаться внизу этой статьи.
    </p>
    <?php
}

/**
 * Сохраняем похожие статьи
 */
function save_related_posts_meta($post_id) {
    // Проверяем, что это пост
    if (get_post_type($post_id) !== 'post') {
        return;
    }
    
    // Проверяем nonce
    if (!isset($_POST['related_posts_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['related_posts_meta_box_nonce'], 'related_posts_meta_box')) {
        return;
    }
    
    // Проверяем права
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Сохраняем похожие статьи
    if (isset($_POST['related_posts']) && is_array($_POST['related_posts'])) {
        $related_posts = array_filter(array_map('intval', $_POST['related_posts']));
        update_post_meta($post_id, '_related_posts', $related_posts);
    } else {
        delete_post_meta($post_id, '_related_posts');
    }
}
add_action('save_post', 'save_related_posts_meta');

/**
 * ========================================
 * SEO: ПРОВЕРКА ДУБЛЕЙ КОНТЕНТА И АУДИТ
 * ========================================
 */

/**
 * Проверка дублей canonical URL
 * Убеждаемся, что каждый URL имеет уникальный canonical
 */
// POTENTIAL REDIRECT / URL LOGIC
add_action('wp_head', function() {
    if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
        return;
    }
    
    // Получаем canonical URL текущей страницы
    $canonical = dental_clinic_get_canonical_url();
    
    if (empty($canonical)) {
        return; // 404 страница, canonical не нужен
    }
    
    // Проверяем, что canonical не дублируется с текущим URL
    $current_url = home_url($_SERVER['REQUEST_URI'] ?? '/');
    $current_url_clean = dental_clinic_normalize_url($current_url);
    $canonical_clean = dental_clinic_normalize_url($canonical);
    
    // Если canonical отличается от текущего URL, это нормально (редирект)
    // Но если они одинаковы, canonical должен быть правильным
    // Логируем предупреждение в режиме отладки
    if (defined('WP_DEBUG') && WP_DEBUG && $canonical_clean !== $current_url_clean) {
        // Это нормально - canonical может отличаться при редиректах
    }
}, 999);

/**
 * Проверка дублей страниц с одинаковым контентом
 * Проверяет, нет ли нескольких страниц с одинаковым title или slug
 */
function dental_clinic_check_duplicate_content() {
    // Проверяем только в админке для безопасности
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }
    
    global $wpdb;
    
    // Проверяем дубли slug для страниц
    $duplicate_slugs = $wpdb->get_results("
        SELECT post_name, COUNT(*) as count 
        FROM {$wpdb->posts} 
        WHERE post_type = 'page' 
        AND post_status = 'publish'
        GROUP BY post_name 
        HAVING count > 1
    ");
    
    if (!empty($duplicate_slugs)) {
        error_log('SEO WARNING: Найдены дубли slug для страниц: ' . print_r($duplicate_slugs, true));
    }
    
    // Проверяем дубли slug для врачей
    $duplicate_doctors = $wpdb->get_results("
        SELECT post_name, COUNT(*) as count 
        FROM {$wpdb->posts} 
        WHERE post_type = 'doctor' 
        AND post_status = 'publish'
        GROUP BY post_name 
        HAVING count > 1
    ");
    
    if (!empty($duplicate_doctors)) {
        error_log('SEO WARNING: Найдены дубли slug для врачей: ' . print_r($duplicate_doctors, true));
    }
}

// Запускаем проверку при сохранении поста
add_action('save_post', 'dental_clinic_check_duplicate_content', 20);

/**
 * Проверка пустых страниц (200 на пустых страницах)
 * Убеждаемся, что пустые страницы не отдают 200
 */
// POTENTIAL REDIRECT / URL LOGIC
add_action('template_redirect', function() {
    if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
        return;
    }
    
    // Проверяем только для страниц и постов
    if (is_singular()) {
        global $post;
        
        // Если контент пустой и это не черновик
        if (empty($post->post_content) && $post->post_status === 'publish') {
            // Проверяем, есть ли хотя бы заголовок
            if (empty($post->post_title)) {
                // Полностью пустая страница - отдаем 404
                status_header(404);
                nocache_headers();
            }
        }
    }
}, 999);

/**
 * ========================================
 * SEO-РАЗМЕТКА ДЛЯ МЕДИЦИНСКОГО САЙТА
 * ========================================
 */

/**
 * Получает название клиники (используется в title и Schema)
 */
function dental_clinic_get_clinic_name() {
    return 'Центр Эстетической стоматологии и имплантации';
}

/**
 * Генерирует SEO title для разных типов страниц
 */
function dental_clinic_get_seo_title() {
    $clinic_name = dental_clinic_get_clinic_name();
    
    // Главная страница
    if (is_front_page()) {
        return 'Стоматология в Елизово — имплантация зубов, протезирование | ' . $clinic_name;
    }
    
    // Страница врача
    if (is_singular('doctor')) {
        $doctor_name = get_the_title();
        $specialization = get_post_meta(get_the_ID(), 'doctor_specialization', true);
        if (empty($specialization)) {
            $specialization = 'Стоматолог';
        }
        return $doctor_name . ' — ' . $specialization . ' | ' . $clinic_name;
    }
    
    // Страница услуги (имплантация)
    if (is_page_template('page-implantatsiya.php')) {
        return 'Имплантация зубов в Камчатке — цены, врачи, гарантии | ' . $clinic_name;
    }
    
    // Статья блога
    if (is_single() && get_post_type() == 'post') {
        $post_title = get_the_title();
        return $post_title . ' | ' . $clinic_name;
    }
    
    // Страница контактов
    if (is_page_template('page-contacts.php')) {
        return 'Контакты стоматологической клиники в Елизово | ' . $clinic_name;
    }
    
    // Обычная страница
    if (is_page()) {
        $page_title = get_the_title();
        return $page_title . ' | ' . $clinic_name;
    }
    
    // Архив врачей
    if (is_post_type_archive('doctor')) {
        return 'Врачи стоматологической клиники в Елизово | ' . $clinic_name;
    }
    
    // 404 страница
    if (is_404()) {
        return 'Страница не найдена (404) | ' . $clinic_name;
    }
    
    // Дефолтный title
    return wp_get_document_title();
}

/**
 * Генерирует meta description
 * Приоритет: кастомное поле meta_description > дефолтные значения
 */
function dental_clinic_get_meta_description() {
    // Проверяем кастомное поле meta_description
    $custom_description = '';
    
    if (is_singular()) {
        $custom_description = get_post_meta(get_the_ID(), 'meta_description', true);
    }
    
    // Если кастомное поле заполнено - используем его
    if (!empty($custom_description)) {
        return wp_strip_all_tags($custom_description);
    }
    
    // Дефолтные описания для разных типов страниц
    if (is_front_page()) {
        return 'Стоматологическая клиника в Елизово. Имплантация зубов, протезирование, лечение. Опытные врачи, современное оборудование, гарантии. Запись на консультацию.';
    }
    
    if (is_singular('doctor')) {
        $doctor_name = get_the_title();
        $specialization = get_post_meta(get_the_ID(), 'doctor_specialization', true);
        if (empty($specialization)) {
            $specialization = 'стоматолог';
        }
        $experience = get_post_meta(get_the_ID(), 'doctor_experience', true);
        $exp_text = !empty($experience) ? ', стаж ' . $experience . ' лет' : '';
        return $doctor_name . ' — ' . $specialization . $exp_text . '. Приём в стоматологической клинике в Елизово. Запись на консультацию.';
    }
    
    if (is_page_template('page-implantatsiya.php')) {
        return 'Имплантация зубов в Елизово. Современные импланты, опытные врачи, гарантия. Цены, виды имплантации, отзывы пациентов. Запись на консультацию.';
    }
    
    if (is_single() && get_post_type() == 'post') {
        $excerpt = get_the_excerpt();
        if (!empty($excerpt)) {
            return wp_strip_all_tags($excerpt);
        }
        return 'Статья о стоматологии и здоровье зубов от специалистов клиники ' . dental_clinic_get_clinic_name();
    }
    
    if (is_page_template('page-contacts.php')) {
        return 'Контакты стоматологической клиники в Елизово. Адрес: ул. Ленина 15-а. Телефон: +7(4152) 50-01-29. Режим работы: Пн-Пт 8:00-20:00, Сб 8:00-14:00.';
    }
    
    if (is_page()) {
        $excerpt = get_the_excerpt();
        if (!empty($excerpt)) {
            return wp_strip_all_tags($excerpt);
        }
    }
    
    // 404 страница
    if (is_404()) {
        return 'Запрашиваемая страница не найдена. Возможно, страница была перемещена или удалена.';
    }
    
    // Безопасное дефолтное значение
    return 'Стоматологическая клиника в Елизово. Профессиональное лечение зубов, имплантация, протезирование.';
}

/**
 * Генерирует canonical URL
 * Убирает параметры, нормализует URL
 * 
 * ВАЖНО: Для статей блога canonical всегда указывает на канонический URL поста
 * (get_permalink()), который зависит от настроек permalink в WordPress
 */
// POTENTIAL REDIRECT / URL LOGIC
function dental_clinic_get_canonical_url() {
    // 404 страница - не должна иметь canonical
    if (is_404()) {
        return '';
    }
    
    $canonical = '';
    
    if (is_singular()) {
        // Для всех постов (включая статьи блога) используем get_permalink()
        // WordPress автоматически вернет правильный URL в зависимости от настроек permalink
        $canonical = get_permalink();
    } elseif (is_post_type_archive('doctor')) {
        $canonical = get_post_type_archive_link('doctor');
    } elseif (is_home() && !is_front_page()) {
        // Страница блога (список статей)
        $blog_page_id = get_option('page_for_posts');
        if ($blog_page_id) {
            $canonical = get_permalink($blog_page_id);
        } else {
            $canonical = home_url('/blog/');
        }
    } elseif (is_front_page()) {
        $canonical = home_url('/');
    } else {
        $canonical = home_url('/');
    }
    
    // Убираем параметры из URL (utm, ref, etc)
    $parsed = parse_url($canonical);
    if (isset($parsed['query'])) {
        // Оставляем только важные параметры, если они есть
        $canonical = $parsed['scheme'] . '://' . $parsed['host'] . (isset($parsed['port']) ? ':' . $parsed['port'] : '') . (isset($parsed['path']) ? $parsed['path'] : '/');
    }
    
    // Нормализуем URL
    $canonical = dental_clinic_normalize_url($canonical);
    
    return $canonical;
}

/**
 * Генерирует Schema.org разметку в формате JSON-LD
 */
function dental_clinic_get_schema_markup() {
    $schemas = array();
    
    // 1. Organization / MedicalClinic для сайта (на всех страницах)
    $clinic_schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'MedicalClinic',
        'name' => dental_clinic_get_clinic_name(),
        'alternateName' => 'ЦЭСИ',
        'url' => home_url('/'),
        'address' => array(
            '@type' => 'PostalAddress',
            'streetAddress' => 'ул. Ленина 15-а',
            'addressLocality' => 'Елизово',
            'addressRegion' => 'Камчатский край',
            'addressCountry' => 'RU'
        ),
        'telephone' => '+74152500129',
        'priceRange' => '$$',
        'medicalSpecialty' => array(
            'Dentistry',
            'OralSurgery',
            'Prosthodontics'
        ),
        'openingHoursSpecification' => array(
            array(
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
                'opens' => '08:00',
                'closes' => '20:00'
            ),
            array(
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => 'Saturday',
                'opens' => '08:00',
                'closes' => '14:00'
            )
        )
    );
    $schemas[] = $clinic_schema;
    
    // 2. Специфичные схемы для разных типов страниц
    if (is_singular('doctor')) {
        // Physician для страницы врача
        $doctor_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Physician',
            'name' => get_the_title(),
            'url' => get_permalink(),
            'medicalSpecialty' => get_post_meta(get_the_ID(), 'doctor_specialization', true) ?: 'Dentistry',
            'worksFor' => array(
                '@type' => 'MedicalClinic',
                'name' => dental_clinic_get_clinic_name()
            )
        );
        
        // Добавляем образование и опыт, если есть
        $education = get_post_meta(get_the_ID(), 'doctor_education', true);
        if (!empty($education)) {
            $doctor_schema['hasCredential'] = $education;
        }
        
        $schemas[] = $doctor_schema;
    }
    
    if (is_single() && get_post_type() == 'post') {
        // BlogPosting для статьи
        $post_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => get_the_title(),
            'url' => get_permalink(),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'author' => array(
                '@type' => 'Organization',
                'name' => dental_clinic_get_clinic_name()
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => dental_clinic_get_clinic_name(),
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => get_stylesheet_directory_uri() . '/assets/svg/logo.svg'
                )
            )
        );
        
        $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ($thumbnail) {
            $post_schema['image'] = $thumbnail;
        }
        
        $excerpt = get_the_excerpt();
        if (!empty($excerpt)) {
            $post_schema['description'] = wp_strip_all_tags($excerpt);
        }
        
        $schemas[] = $post_schema;
    }
    
    if (is_page_template('page-implantatsiya.php')) {
        // MedicalProcedure для страницы имплантации
        $procedure_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'MedicalProcedure',
            'name' => 'Имплантация зубов',
            'description' => dental_clinic_get_meta_description(),
            'url' => get_permalink(),
            'medicalSpecialty' => 'Dentistry',
            'procedureType' => 'DentalImplant',
            'provider' => array(
                '@type' => 'MedicalClinic',
                'name' => dental_clinic_get_clinic_name()
            )
        );
        $schemas[] = $procedure_schema;
    }
    
    if (is_page_template('page-contacts.php')) {
        // ContactPage / LocalBusiness для страницы контактов
        $contact_schema = array(
            '@context' => 'https://schema.org',
            '@type' => array('ContactPage', 'LocalBusiness'),
            'name' => dental_clinic_get_clinic_name(),
            'url' => get_permalink(),
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => 'ул. Ленина 15-а',
                'addressLocality' => 'Елизово',
                'addressRegion' => 'Камчатский край',
                'addressCountry' => 'RU'
            ),
            'telephone' => '+74152500129',
            'openingHours' => array(
                'Mo-Fr 08:00-20:00',
                'Sa 08:00-14:00'
            )
        );
        $schemas[] = $contact_schema;
    }
    
    // Возвращаем массив схем для вывода
    return $schemas;
}

/**
 * ========================================
 * SITEMAP: CLEANUP (ONLY wp-sitemap.xml)
 * ========================================
 * Требования:
 * - убрать users из sitemap
 * - убрать category из sitemap
 * - убрать post type "review" из sitemap
 * - НЕ добавлять редиректы
 * - НЕ использовать wp_redirect
 * - НЕ трогать template_redirect
 * - НЕ вмешиваться в URL
 */

add_filter('wp_sitemaps_add_provider', function ($provider, $name) {
    // POTENTIAL REDIRECT / URL LOGIC
    // (URL output logic) — affects ONLY sitemap providers
    if ($name === 'users') {
        return false; // disables users sitemap
    }
    return $provider;
}, 10, 2);

add_filter('wp_sitemaps_taxonomies', function (array $taxonomies) {
    // POTENTIAL REDIRECT / URL LOGIC
    // (URL output logic) — affects ONLY sitemap taxonomies
    unset($taxonomies['category']);
    return $taxonomies;
});

add_filter('wp_sitemaps_post_types', function (array $post_types) {
    // POTENTIAL REDIRECT / URL LOGIC
    // (URL output logic) — affects ONLY sitemap post types
    unset($post_types['review']);
    return $post_types;
});

/**
 * Calltouch скрипт в head
 */
function dental_clinic_add_calltouch_head() {
    ?>
    <!-- calltouch -->
    <script>
    (function(w,d,n,c){w.CalltouchDataObject=n;w[n]=function(){w[n]["callbacks"].push(arguments)};if(!w[n]["callbacks"]){w[n]["callbacks"]=[]}w[n]["loaded"]=false;if(typeof c!=="object"){c=[c]}w[n]["counters"]=c;for(var i=0;i<c.length;i+=1){p(c[i])}function p(cId){var a=d.getElementsByTagName("script")[0],s=d.createElement("script"),i=function(){a.parentNode.insertBefore(s,a)},m=typeof Array.prototype.find === 'function',n=m?"init-min.js":"init.js";s.async=true;s.src="https://mod.calltouch.ru/"+n+"?id="+cId;if(w.opera=="[object Opera]"){d.addEventListener("DOMContentLoaded",i,false)}else{i()}}})(window,document,"ct","za1zrghd");
    </script>
    <!-- calltouch -->
    <?php
}
add_action('wp_head', 'dental_clinic_add_calltouch_head', 5);

/**
 * Яндекс Метрика — асинхронная загрузка после DOMContentLoaded (не блокирует LCP)
 */
function dental_clinic_add_yandex_metrika() {
    ?>
    <!-- Yandex.Metrika counter (async) -->
    <script type="text/javascript">
        window.ym=window.ym||function(){(ym.a=ym.a||[]).push(arguments)};ym.l=1*new Date();
        function dental_clinic_load_metrika(){var s=document.createElement('script');s.async=1;s.src='https://mc.yandex.ru/metrika/tag.js';var f=document.getElementsByTagName('script')[0];f.parentNode.insertBefore(s,f);ym(98616842,'init',{webvisor:true,clickmap:true,accurateTrackBounce:true,trackLinks:true});}
        if (document.readyState==='loading') document.addEventListener('DOMContentLoaded',dental_clinic_load_metrika); else dental_clinic_load_metrika();
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/98616842" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <?php
}
add_action('wp_head', 'dental_clinic_add_yandex_metrika', 10);

/**
 * Calltouch requests скрипт в footer
 */
function dental_clinic_add_calltouch_footer() {
    ?>
    <!-- calltouch requests -->
    <script>
    Element.prototype.matches||(Element.prototype.matches=Element.prototype.matchesSelector||Element.prototype.webkitMatchesSelector||Element.prototype.mozMatchesSelector||Element.prototype.msMatchesSelector),Element.prototype.closest||(Element.prototype.closest=function(e){for(var t=this;t;){if(t.matches(e))return t;t=t.parentElement}return null});
    var ct_get_val=function(form,selector){if(!!form.querySelector(selector)){return form.querySelector(selector).value;}else{return '';}}
    document.addEventListener('click', function(e) {                                           
        var t_el = e.target;
        if (t_el.closest('form [type="submit"]')){ try {
            var f = t_el.closest('form'); 
            var fio = ct_get_val(f,'input[name="your-name"]');
            var phone = ct_get_val(f,'input[name="your-phone"]');
            var email = ct_get_val(f,'input[name="email"]');
            var comment = ct_get_val(f,'textarea[placeholder="Дополнительная информация"]');
            var sub = 'Заявка с ' + location.hostname;
            var ct_data = {            
                fio: fio,
                phoneNumber: phone,
                email: email,
                subject: sub,
                requestUrl: location.href,
                comment: comment,
                sessionId: window.call_value
            };
            var post_data = Object.keys(ct_data).reduce(function(a,k){if(!!ct_data[k]){a.push(k+'='+encodeURIComponent(ct_data[k]));}return a},[]).join('&');
            var site_id = '71606';
            var CT_URL = 'https://api.calltouch.ru/calls-service/RestAPI/requests/'+site_id+'/register/';
            var ct_valid = !!phone && !!fio;
            console.log(ct_data,ct_valid);
            if (ct_valid && !window.ct_snd_flag){
                window.ct_snd_flag = 1; setTimeout(function(){ window.ct_snd_flag = 0; }, 20000);
                var request = window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest();
                request.open("POST", CT_URL, true); request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                request.send(post_data);
            }
        } catch (e) { console.log(e); } }
    });
    </script>
    <!-- calltouch requests -->
    <?php
}
add_action('wp_footer', 'dental_clinic_add_calltouch_footer', 20);

?>
