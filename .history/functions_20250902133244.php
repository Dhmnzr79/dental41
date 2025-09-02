

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
