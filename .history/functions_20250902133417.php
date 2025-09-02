

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
