

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
