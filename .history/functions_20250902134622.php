<?php
/**
 * Основные функции для детской темы стоматологической клиники
 */

// Подключение Adobe Fonts
function dental_clinic_enqueue_adobe_fonts() {
    wp_enqueue_style('dental-clinic-adobe-fonts', 'https://use.typekit.net/your-kit-id.css');
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_adobe_fonts');

// Подключение скриптов анимации скролла
function dental_clinic_enqueue_scroll_animations() {
    wp_enqueue_script('dental-clinic-scroll-animations', get_stylesheet_directory_uri() . '/scroll-animations.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('dental-clinic-phone-mask', get_stylesheet_directory_uri() . '/phone-mask.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('dental-clinic-popup', get_stylesheet_directory_uri() . '/popup.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_scroll_animations');

// Кастомная навигация для мобильного меню
class Dental_Clinic_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }
    
    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';
        
        $output .= $indent . '<li' . $id . $class_names .'>';
        
        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
        
        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes . '>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

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
    error_log("Doctor post type registered");
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
    error_log("Review post type registered");
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
    
    error_log("Meta boxes added for post types: doctor, review");
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

// Дублирование записей
function dental_clinic_duplicate_post_link($actions, $post) {
    if (current_user_can('edit_posts')) {
        $actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?action=dental_clinic_duplicate_post&post=' . $post->ID, 'duplicate_post_' . $post->ID) . '" title="Дублировать эту запись" rel="permalink">Дублировать</a>';
    }
    return $actions;
}
add_filter('post_row_actions', 'dental_clinic_duplicate_post_link', 10, 2);
add_filter('page_row_actions', 'dental_clinic_duplicate_post_link', 10, 2);

function dental_clinic_duplicate_post() {
    global $wpdb;
    if (! (isset($_GET['post']) || isset($_POST['post']) || (isset($_REQUEST['action']) && 'dental_clinic_duplicate_post' == $_REQUEST['action']))) {
        wp_die('Нет записи для дублирования!');
    }
    
    if (!isset($_GET['duplicate_nonce']) || !wp_verify_nonce($_GET['duplicate_nonce'], 'duplicate_post_' . $_GET['post'])) {
        return;
    }
    
    $post_id = (isset($_GET['post']) ? absint($_GET['post']) : absint($_POST['post']));
    $post = get_post($post_id);
    
    $current_user = wp_get_current_user();
    $new_post_author = $current_user->ID;
    
    if (isset($post) && $post != null) {
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
        
        $new_post_id = wp_insert_post($args);
        
        $taxonomies = get_object_taxonomies($post->post_type);
        foreach ($taxonomies as $taxonomy) {
            $post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
            wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
        }
        
        $post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
        if (count($post_meta_infos)!=0) {
            $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
            foreach ($post_meta_infos as $meta_info) {
                $meta_key = $meta_info->meta_key;
                if($meta_key == '_wp_old_slug') continue;
                $meta_value = addslashes($meta_info->meta_value);
                $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
            }
            $sql_query.= implode(" UNION ALL ", $sql_query_sel);
            $wpdb->query($sql_query);
        }
        
        wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
        exit;
    } else {
        wp_die('Ошибка при дублировании записи, не удалось найти оригинальную запись: ' . $post_id);
    }
}
add_action('admin_action_dental_clinic_duplicate_post', 'dental_clinic_duplicate_post');

// CTA форма
function dental_clinic_cta_form_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Записаться на консультацию',
        'subtitle' => 'Оставьте заявку и мы свяжемся с вами в течение 15 минут'
    ), $atts);
    
    ob_start();
    ?>
    <div class="cta-form-container">
        <div class="cta-form-content">
            <h3><?php echo esc_html($atts['title']); ?></h3>
            <p><?php echo esc_html($atts['subtitle']); ?></p>
            <form class="cta-form" method="post">
                <input type="text" name="name" placeholder="Ваше имя" required>
                <input type="tel" name="phone" placeholder="Ваш телефон" required>
                <textarea name="message" placeholder="Сообщение (необязательно)"></textarea>
                <button type="submit">Записаться</button>
            </form>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('cta_form', 'dental_clinic_cta_form_shortcode');

// Обработка CTA формы
function dental_clinic_handle_cta_form() {
    if ($_POST && isset($_POST['name']) && isset($_POST['phone'])) {
        $name = sanitize_text_field($_POST['name']);
        $phone = sanitize_text_field($_POST['phone']);
        $message = sanitize_textarea_field($_POST['message']);
        
        $to = get_option('admin_email');
        $subject = 'Новая заявка с сайта';
        $body = "Имя: $name\nТелефон: $phone\nСообщение: $message";
        
        wp_mail($to, $subject, $body);
        
        wp_redirect(add_query_arg('cta_sent', '1', $_SERVER['REQUEST_URI']));
        exit;
    }
}
add_action('init', 'dental_clinic_handle_cta_form');

// Функции для блога
function dental_clinic_setup_blog_features() {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'dental_clinic_setup_blog_features');

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

// Очистка URL от лишних параметров
function dental_clinic_clean_query_vars($query_vars) {
    if (!is_admin() && $query_vars) {
        unset($query_vars['cta_sent']);
    }
    return $query_vars;
}
add_filter('query_vars', 'dental_clinic_clean_query_vars');

?>
