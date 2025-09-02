

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
