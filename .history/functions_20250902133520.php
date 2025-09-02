

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
