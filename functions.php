<?php
/**
 * Functions for Dental Clinic Child Theme
 * 
 * Добавляет поддержку Lottie анимаций и другие функции
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

// Подключение Lottie анимаций
function dental_clinic_enqueue_lottie_scripts() {
    // Подключаем основную библиотеку Lottie с CDN
    wp_enqueue_script(
        'lottie-web',
        'https://unpkg.com/lottie-web@5.12.2/build/player/lottie.min.js',
        array(),
        time(), // Используем временную метку для избежания кэширования
        true
    );
    
    // Подключаем CSS для Lottie
    wp_enqueue_style(
        'dental-clinic-lottie-styles',
        get_stylesheet_directory_uri() . '/lottie-styles.css',
        array(),
        '1.0.1'
    );
    
    // Подключаем JS для Lottie
    wp_enqueue_script(
        'dental-clinic-lottie-integration',
        get_stylesheet_directory_uri() . '/lottie-integration.js',
        array('lottie-web'),
        '1.0.1',
        true
    );
    
    // Добавляем отладочную информацию
    wp_add_inline_script('dental-clinic-lottie-integration', '
        console.log("Lottie скрипт подключен");
        console.log("Путь к теме:", "' . get_stylesheet_directory_uri() . '");
        console.log("Lottie библиотека загружена:", typeof lottie !== "undefined");
    ');
    
    // Подключаем скрипт для анимаций при скролле
    wp_enqueue_script(
        'dental-clinic-scroll-animations',
        get_stylesheet_directory_uri() . '/scroll-animations.js',
        array(),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_lottie_scripts');

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

// Шорткод для Lottie анимаций
function dental_lottie_shortcode($atts) {
    $atts = shortcode_atts(array(
        'path' => '',
        'class' => '',
        'autoplay' => 'false',
        'loop' => 'true',
        'speed' => '1.0',
        'width' => '100',
        'height' => '100',
        'renderer' => 'svg'
    ), $atts);
    
    if (empty($atts['path'])) {
        return '<p>Ошибка: не указан путь к Lottie анимации</p>';
    }
    
    $style = "width: {$atts['width']}px; height: {$atts['height']}px;";
    
    return sprintf(
        '<div class="lottie-container %s" style="%s" data-lottie="%s" data-lottie-autoplay="%s" data-lottie-loop="%s" data-lottie-speed="%s" data-lottie-renderer="%s"></div>',
        esc_attr($atts['class']),
        esc_attr($style),
        esc_url($atts['path']),
        esc_attr($atts['autoplay']),
        esc_attr($atts['loop']),
        esc_attr($atts['speed']),
        esc_attr($atts['renderer'])
    );
}
add_shortcode('lottie', 'dental_lottie_shortcode');

// Виджет для Lottie анимаций
class Dental_Lottie_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'dental_lottie_widget',
            'Lottie Анимация',
            array('description' => 'Виджет для отображения Lottie анимаций')
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        if (!empty($instance['lottie_path'])) {
            echo sprintf(
                '<div class="lottie-container" style="width: %spx; height: %spx;" data-lottie="%s" data-lottie-autoplay="%s" data-lottie-loop="%s"></div>',
                esc_attr($instance['width']),
                esc_attr($instance['height']),
                esc_url($instance['lottie_path']),
                esc_attr($instance['autoplay']),
                esc_attr($instance['loop'])
            );
        }
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $lottie_path = !empty($instance['lottie_path']) ? $instance['lottie_path'] : '';
        $width = !empty($instance['width']) ? $instance['width'] : '100';
        $height = !empty($instance['height']) ? $instance['height'] : '100';
        $autoplay = !empty($instance['autoplay']) ? $instance['autoplay'] : 'false';
        $loop = !empty($instance['loop']) ? $instance['loop'] : 'true';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Заголовок:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('lottie_path'); ?>">Путь к Lottie JSON:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('lottie_path'); ?>" name="<?php echo $this->get_field_name('lottie_path'); ?>" type="url" value="<?php echo esc_attr($lottie_path); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('width'); ?>">Ширина (px):</label>
            <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="number" value="<?php echo esc_attr($width); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('height'); ?>">Высота (px):</label>
            <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="number" value="<?php echo esc_attr($height); ?>">
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('autoplay'); ?>" name="<?php echo $this->get_field_name('autoplay'); ?>" type="checkbox" value="true" <?php checked($autoplay, 'true'); ?>>
            <label for="<?php echo $this->get_field_id('autoplay'); ?>">Автозапуск</label>
        </p>
        <p>
            <input id="<?php echo $this->get_field_id('loop'); ?>" name="<?php echo $this->get_field_name('loop'); ?>" type="checkbox" value="true" <?php checked($loop, 'true'); ?>>
            <label for="<?php echo $this->get_field_id('loop'); ?>">Зацикливание</label>
        </p>
        <?php
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['lottie_path'] = (!empty($new_instance['lottie_path'])) ? esc_url_raw($new_instance['lottie_path']) : '';
        $instance['width'] = (!empty($new_instance['width'])) ? intval($new_instance['width']) : 100;
        $instance['height'] = (!empty($new_instance['height'])) ? intval($new_instance['height']) : 100;
        $instance['autoplay'] = (!empty($new_instance['autoplay'])) ? 'true' : 'false';
        $instance['loop'] = (!empty($new_instance['loop'])) ? 'true' : 'false';
        return $instance;
    }
}

// Регистрация виджета
function dental_register_lottie_widget() {
    register_widget('Dental_Lottie_Widget');
}
add_action('widgets_init', 'dental_register_lottie_widget');

// Добавление поддержки загрузки Lottie файлов
function dental_add_lottie_mime_types($mimes) {
    $mimes['json'] = 'application/json';
    return $mimes;
}
add_filter('upload_mimes', 'dental_add_lottie_mime_types');

// Функция для получения Lottie анимации по ID
function dental_get_lottie_animation($animation_id, $args = array()) {
    $defaults = array(
        'class' => '',
        'autoplay' => 'false',
        'loop' => 'true',
        'speed' => '1.0',
        'width' => '100',
        'height' => '100'
    );
    
    $args = wp_parse_args($args, $defaults);
    
    // Получаем URL файла по ID
    $file_url = wp_get_attachment_url($animation_id);
    
    if (!$file_url) {
        return '<p>Ошибка: файл анимации не найден</p>';
    }
    
    $style = "width: {$args['width']}px; height: {$args['height']}px;";
    
    return sprintf(
        '<div class="lottie-container %s" style="%s" data-lottie="%s" data-lottie-autoplay="%s" data-lottie-loop="%s" data-lottie-speed="%s"></div>',
        esc_attr($args['class']),
        esc_attr($style),
        esc_url($file_url),
        esc_attr($args['autoplay']),
        esc_attr($args['loop']),
        esc_attr($args['speed'])
    );
}

// Хелпер функция для вывода Lottie анимации
function dental_lottie($animation_id, $args = array()) {
    echo dental_get_lottie_animation($animation_id, $args);
}

function dental_clinic_enqueue_styles() {
    wp_enqueue_style('local-fonts', get_stylesheet_directory_uri() . '/assets/fonts.css', array(), wp_get_theme()->get('Version'));
    
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style', 'local-fonts'), wp_get_theme()->get('Version'));
}
add_action('wp_enqueue_scripts', 'dental_clinic_enqueue_styles');

function dental_clinic_setup() {
    register_nav_menus(array(
        'primary' => 'Главное меню',
        'footer' => 'Меню в футере'
    ));
}
add_action('after_setup_theme', 'dental_clinic_setup');

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
    
    echo '<tr><th><label for="review_video_url">Ссылка на видео отзыв (Vimeo):</label></th>';
    echo '<td><input type="url" id="review_video_url" name="review_video_url" value="' . esc_url($video_url) . '" class="regular-text" placeholder="https://vimeo.com/..." /></td></tr>';
    
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
        $value = sanitize_text_field($_POST['review_video_url']);
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

// Создаем страницы при активации темы
function dental_clinic_create_pages() {
    // Проверяем, существуют ли уже страницы
    $pages = array(
        'implantatsiya' => array(
            'title' => 'Имплантация',
            'content' => '<h1>Имплантация</h1><p>Страница в разработке</p>'
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
            wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => $slug
            ));
        }
    }
}
add_action('after_switch_theme', 'dental_clinic_create_pages');

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
            'video_url' => 'https://vimeo.com/123456789'
        ),
        array(
            'title' => 'Отзыв Михаила Иванова',
            'content' => 'Очень доволен результатом лечения. Врачи настоящие профессионалы, используют современное оборудование. Рекомендую всем!',
            'reviewer_name' => 'Михаил Иванов',
            'video_url' => 'https://vimeo.com/987654321'
        ),
        array(
            'title' => 'Отзыв Елены Сидоровой',
            'content' => 'Прошла полное лечение зубов. Все прошло безболезненно и качественно. Спасибо за мою новую улыбку!',
            'reviewer_name' => 'Елена Сидорова',
            'video_url' => 'https://vimeo.com/456789123'
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

?>
