

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
