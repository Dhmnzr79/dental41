

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
