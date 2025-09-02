

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
