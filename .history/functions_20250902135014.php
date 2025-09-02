<?php
/**
 * Functions for Dental Clinic Child Theme
 * 
 * Основные функции для детской темы стоматологической клиники
 */

// Подключение Adobe Fonts
function dental_clinic_enqueue_adobe_fonts() {
    wp_enqueue_style(
        'adobe-fonts',
        'https://use.typekit.net/pog7tgf.css',
        array(),
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_adobe_fonts');

// Подключение скрипта для анимаций при скролле
function dental_clinic_enqueue_scroll_animations() {
    wp_enqueue_script(
        'dental-clinic-scroll-animations',
        get_stylesheet_directory_uri() . '/scroll-animations.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_scroll_animations');

// Подключение скрипта для маски телефона
function dental_clinic_enqueue_phone_mask() {
    wp_enqueue_script(
        'dental-clinic-phone-mask',
        get_stylesheet_directory_uri() . '/phone-mask.js',
        array('jquery'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_phone_mask');

function dental_clinic_enqueue_popup() {
    wp_enqueue_script(
        'dental-clinic-popup',
        get_stylesheet_directory_uri() . '/popup.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_popup');

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

// Поддержка выпадающих меню
function dental_clinic_nav_menu_link_attributes($atts, $item, $args) {
    if ($args->theme_location == 'primary') {
        // Добавляем атрибуты для выпадающих меню
        if (in_array('menu-item-has-children', $item->classes)) {
            $atts['data-toggle'] = 'dropdown';
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'dental_clinic_nav_menu_link_attributes', 10, 3);

// Регистрация пользовательского типа записи "Врачи"
function dental_clinic_register_doctor_post_type() {
    $labels = array(
        'name'                  => 'Врачи',
        'singular_name'         => 'Врач',
        'menu_name'             => 'Врачи',
        'name_admin_bar'        => 'Врач',
        'archives'              => 'Архив врачей',
        'attributes'            => 'Атрибуты врача',
        'parent_item_colon'     => 'Родительский врач:',
        'all_items'             => 'Все врачи',
        'add_new_item'          => 'Добавить нового врача',
        'add_new'               => 'Добавить врача',
        'new_item'              => 'Новый врач',
        'edit_item'             => 'Редактировать врача',
        'update_item'           => 'Обновить врача',
        'view_item'             => 'Просмотреть врача',
        'view_items'            => 'Просмотреть врачей',
        'search_items'          => 'Поиск врачей',
        'not_found'             => 'Врачи не найдены',
        'not_found_in_trash'    => 'Врачи не найдены в корзине',
        'featured_image'        => 'Фото врача',
        'set_featured_image'    => 'Установить фото врача',
        'remove_featured_image' => 'Удалить фото врача',
        'use_featured_image'    => 'Использовать как фото врача',
        'insert_into_item'      => 'Вставить в описание врача',
        'uploaded_to_this_item' => 'Загружено для этого врача',
        'items_list'            => 'Список врачей',
        'items_list_navigation' => 'Навигация по врачам',
        'filter_items_list'     => 'Фильтр врачей',
    );
    
    $args = array(
        'label'                 => 'Врач',
        'description'           => 'Врачи клиники',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-users',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'doctors',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'doctor'),
    );
    
    register_post_type('doctor', $args);
}
add_action('init', 'dental_clinic_register_doctor_post_type', 0);

// Регистрация пользовательского типа записи "Отзывы"
function dental_clinic_register_review_post_type() {
    $labels = array(
        'name'                  => 'Отзывы',
        'singular_name'         => 'Отзыв',
        'menu_name'             => 'Отзывы',
        'name_admin_bar'        => 'Отзыв',
        'archives'              => 'Архив отзывов',
        'attributes'            => 'Атрибуты отзыва',
        'parent_item_colon'     => 'Родительский отзыв:',
        'all_items'             => 'Все отзывы',
        'add_new_item'          => 'Добавить новый отзыв',
        'add_new'               => 'Добавить отзыв',
        'new_item'              => 'Новый отзыв',
        'edit_item'             => 'Редактировать отзыв',
        'update_item'           => 'Обновить отзыв',
        'view_item'             => 'Просмотреть отзыв',
        'view_items'            => 'Просмотреть отзывы',
        'search_items'          => 'Поиск отзывов',
        'not_found'             => 'Отзывы не найдены',
        'not_found_in_trash'    => 'Отзывы не найдены в корзине',
        'featured_image'        => 'Фото пациента',
        'set_featured_image'    => 'Установить фото пациента',
        'remove_featured_image' => 'Удалить фото пациента',
        'use_featured_image'    => 'Использовать как фото пациента',
        'insert_into_item'      => 'Вставить в отзыв',
        'uploaded_to_this_item' => 'Загружено для этого отзыва',
        'items_list'            => 'Список отзывов',
        'items_list_navigation' => 'Навигация по отзывам',
        'filter_items_list'     => 'Фильтр отзывов',
    );
    
    $args = array(
        'label'                 => 'Отзыв',
        'description'           => 'Отзывы пациентов',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-testimonial',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'reviews',
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array('slug' => 'review'),
    );
    
    register_post_type('review', $args);
}
add_action('init', 'dental_clinic_register_review_post_type', 0);

// Добавление размеров изображений
function dental_clinic_add_image_sizes() {
    add_image_size('doctor-card', 300, 400, true);
    add_image_size('review-photo', 80, 80, true);
    add_image_size('blog-thumbnail', 400, 250, true);
}
add_action('after_setup_theme', 'dental_clinic_add_image_sizes');

// Мета-боксы
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
}
add_action('add_meta_boxes', 'dental_clinic_add_meta_boxes');

// Мета-поля для врачей
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
    
    echo '<table class="form-table">';
    
    echo '<tr><th><label for="doctor_full_name">ФИО:</label></th>';
    echo '<td><input type="text" id="doctor_full_name" name="doctor_full_name" value="' . esc_attr($full_name) . '" class="regular-text" placeholder="например: Иванов Иван Иванович" /></td></tr>';
    
    echo '<tr><th><label for="doctor_position">Должность:</label></th>';
    echo '<td><input type="text" id="doctor_position" name="doctor_position" value="' . esc_attr($position) . '" class="regular-text" placeholder="например: Главный врач, Стоматолог-ортопед" /></td></tr>';
    
    echo '<tr><th><label for="doctor_experience">Опыт работы:</label></th>';
    echo '<td><input type="text" id="doctor_experience" name="doctor_experience" value="' . esc_attr($experience) . '" class="regular-text" placeholder="например: 15 лет" /></td></tr>';
    
    echo '<tr><th><label for="doctor_education">Образование:</label></th>';
    echo '<td><textarea id="doctor_education" name="doctor_education" rows="3" class="large-text" placeholder="Укажите образование врача">' . esc_textarea($education) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="doctor_video_url">Ссылка на видео (Vimeo):</label></th>';
    echo '<td><input type="url" id="doctor_video_url" name="doctor_video_url" value="' . esc_url($video_url) . '" class="regular-text" placeholder="https://vimeo.com/..." /></td></tr>';
    
    echo '<tr><th><label for="doctor_short_preview">Краткое превью (1-2 предложения):</label></th>';
    echo '<td><textarea id="doctor_short_preview" name="doctor_short_preview" rows="2" class="large-text" placeholder="Краткое описание для карточек">' . esc_textarea($short_preview) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="doctor_full_description">Полное описание:</label></th>';
    echo '<td><textarea id="doctor_full_description" name="doctor_full_description" rows="8" class="large-text" placeholder="Подробное описание врача, опыт, специализация">' . esc_textarea($full_description) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="doctor_certificates">Галерея сертификатов:</label></th>';
    echo '<td><textarea id="doctor_certificates" name="doctor_certificates" rows="5" class="large-text" placeholder="Вставьте HTML код галереи сертификатов">' . esc_textarea($certificates) . '</textarea></td></tr>';
    
    echo '<tr><th><label for="doctor_show_in_slider">Отображать в слайдере:</label></th>';
    echo '<td><input type="checkbox" id="doctor_show_in_slider" name="doctor_show_in_slider" value="1" ' . checked($show_in_slider, '1', false) . ' /> <span>Показывать этого врача в слайдере на главной странице</span></td></tr>';
    
    echo '</table>';
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
    
    $fields = ['full_name', 'position', 'experience', 'education', 'video_url', 'short_preview', 'full_description', 'certificates', 'show_in_slider'];
    
    foreach ($fields as $field) {
        if (isset($_POST['doctor_' . $field])) {
            if ($field === 'certificates') {
                // Разрешаем HTML для сертификатов
                update_post_meta($post_id, '_doctor_' . $field, wp_kses_post($_POST['doctor_' . $field]));
            } else {
                update_post_meta($post_id, '_doctor_' . $field, sanitize_text_field($_POST['doctor_' . $field]));
            }
        }
    }
}
add_action('save_post', 'dental_clinic_save_doctor_meta');

// Мета-поля для отзывов
function dental_clinic_review_meta_box_callback($post) {
    wp_nonce_field('dental_clinic_save_review_meta', 'dental_clinic_review_meta_nonce');
    
    $reviewer_name = get_post_meta($post->ID, '_reviewer_name', true);
    $video_url = get_post_meta($post->ID, '_review_video_url', true);
    
    echo '<table class="form-table">';
    
    echo '<tr><th><label for="reviewer_name">Имя пациента:</label></th>';
    echo '<td><input type="text" id="reviewer_name" name="reviewer_name" value="' . esc_attr($reviewer_name) . '" class="regular-text" placeholder="например: Анна Петрова" /></td></tr>';
    
    echo '<tr><th><label for="review_video_url">Ссылка на видео отзыв (Vimeo):</label></th>';
    echo '<td><input type="url" id="review_video_url" name="review_video_url" value="' . esc_url($video_url) . '" class="regular-text" placeholder="https://vimeo.com/..." /></td></tr>';
    
    echo '<tr><th><label>Фото пациента:</label></th>';
    echo '<td><p>Используйте "Изображение записи" (Featured Image) для загрузки фото пациента</p></td></tr>';
    
    echo '<tr><th><label>Текст отзыва:</label></th>';
    echo '<td><p>Используйте основное поле "Текст записи" для текста отзыва</p></td></tr>';
    
    echo '</table>';
}

function dental_clinic_save_review_meta($post_id) {
    if (get_post_type($post_id) !== 'review') {
        return;
    }
    
    if (!isset($_POST['dental_clinic_review_meta_nonce']) || !wp_verify_nonce($_POST['dental_clinic_review_meta_nonce'], 'dental_clinic_save_review_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = ['reviewer_name', 'video_url'];
    
    foreach ($fields as $field) {
        $field_name = 'review_' . $field;
        if (isset($_POST[$field_name])) {
            $value = sanitize_text_field($_POST[$field_name]);
            $meta_key = '_review_' . $field;
            update_post_meta($post_id, $meta_key, $value);
        }
    }
}
add_action('save_post', 'dental_clinic_save_review_meta');

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
            $output .= '<button class="doctor-video-btn" data-video="' . esc_url($video_url) . '">🎥 Видео</button>';
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

// Функции для блога
function dental_clinic_setup_blog_features() {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'dental_clinic_setup_blog_features');

?>
