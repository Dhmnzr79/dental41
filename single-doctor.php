<?php get_header(); ?>

<section class="doctor-single">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="doctor-profile">
                <!-- Левая колонка - фото и основная информация -->
                <div class="doctor-profile-left">
                    <div class="doctor-photo-single">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else : ?>
                            <div class="doctor-placeholder-single">👨‍⚕️</div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="doctor-basic-info">
                        <h1 class="doctor-name-single"><?php echo get_post_meta(get_the_ID(), '_doctor_full_name', true) ?: get_the_title(); ?></h1>
                        <div class="doctor-position-single"><?php echo get_post_meta(get_the_ID(), '_doctor_position', true); ?></div>
                        <div class="doctor-experience-single">Опыт работы: <?php echo get_post_meta(get_the_ID(), '_doctor_experience', true); ?> лет</div>
                        
                        <?php 
                        $video_url = get_post_meta(get_the_ID(), '_doctor_video_url', true);
                        if ($video_url) : ?>
                            <a href="<?php echo esc_url($video_url); ?>" target="_blank" class="doctor-video-btn-single">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="12" r="12" fill="#ff6b6b"/>
                                    <path d="M10 8L16 12L10 16V8Z" fill="white"/>
                                </svg>
                                Смотреть видео
                            </a>
                        <?php endif; ?>
                        
                        <button class="doctor-appointment-btn" onclick="openAppointmentModal()">
                            Записаться к врачу
                        </button>
                    </div>
                </div>
                
                <!-- Правая колонка - подробная информация -->
                <div class="doctor-profile-right">
                    <div class="doctor-details">
                        <h2>О враче</h2>
                        
                        <?php 
                        $short_preview = get_post_meta(get_the_ID(), '_doctor_short_preview', true);
                        if ($short_preview) : ?>
                            <div class="doctor-preview-section">
                                <h3>Краткое превью</h3>
                                <p><?php echo esc_html($short_preview); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php 
                        $full_description = get_post_meta(get_the_ID(), '_doctor_full_description', true);
                        if ($full_description) : ?>
                            <div class="doctor-description-section">
                                <h3>Полное описание</h3>
                                <div class="doctor-description">
                                    <?php echo wp_kses_post($full_description); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php 
                        $education = get_post_meta(get_the_ID(), '_doctor_education', true);
                        if ($education) : ?>
                            <div class="doctor-education-section">
                                <h3>Образование</h3>
                                <div class="doctor-education">
                                    <?php echo wp_kses_post($education); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <?php 
                        $certificates = get_post_meta(get_the_ID(), '_doctor_certificates', true);
                        if ($certificates) : ?>
                            <div class="doctor-certificates-section">
                                <h3>Сертификаты и награды</h3>
                                <div class="doctor-certificates">
                                    <?php echo wp_kses_post($certificates); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
</section>

<style>
.doctor-single {
    padding: 80px 0;
    background: #f8f9fa;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.doctor-profile {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 60px;
    background: white;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.doctor-profile-left {
    text-align: center;
}

.doctor-photo-single {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 30px;
    border: 6px solid #ff6b6b;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.doctor-photo-single img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.doctor-placeholder-single {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 120px;
    background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
}

.doctor-name-single {
    font-size: 32px;
    font-weight: 700;
    color: #2A2A2A;
    margin: 0 0 15px 0;
    font-family: 'NTSomic', sans-serif;
}

.doctor-position-single {
    font-size: 20px;
    font-weight: 600;
    color: #666;
    margin-bottom: 10px;
}

.doctor-experience-single {
    font-size: 16px;
    color: #888;
    margin-bottom: 30px;
}

.doctor-video-btn-single {
    display: flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #ff6b6b 0%, #ff8e8e 100%);
    color: white;
    text-decoration: none;
    padding: 15px 25px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin: 0 auto;
}

.doctor-video-btn-single:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(255, 107, 107, 0.3);
    color: white;
    text-decoration: none;
}

.doctor-appointment-btn {
    display: block;
    background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin: 20px auto 0 auto;
}

.doctor-appointment-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(78, 205, 196, 0.3);
}

.doctor-profile-right {
    padding-left: 20px;
}

.doctor-details h2 {
    font-size: 28px;
    font-weight: 700;
    color: #2A2A2A;
    margin: 0 0 30px 0;
    font-family: 'NTSomic', sans-serif;
}

.doctor-details h3 {
    font-size: 20px;
    font-weight: 600;
    color: #333;
    margin: 25px 0 15px 0;
}

.doctor-preview-section,
.doctor-description-section,
.doctor-education-section,
.doctor-certificates-section {
    margin-bottom: 30px;
}

.doctor-preview-section p {
    font-size: 18px;
    line-height: 1.6;
    color: #555;
    font-style: italic;
}

.doctor-description,
.doctor-education,
.doctor-certificates {
    font-size: 16px;
    line-height: 1.7;
    color: #444;
}

/* Адаптивность */
@media (max-width: 1023px) {
    .doctor-profile {
        grid-template-columns: 1fr;
        gap: 40px;
        padding: 30px;
    }
    
    .doctor-photo-single {
        width: 250px;
        height: 250px;
    }
    
    .doctor-name-single {
        font-size: 28px;
    }
}

@media (max-width: 767px) {
    .doctor-single {
        padding: 60px 0;
    }
    
    .doctor-profile {
        padding: 20px;
        border-radius: 15px;
    }
    
    .doctor-photo-single {
        width: 200px;
        height: 200px;
    }
    
    .doctor-name-single {
        font-size: 24px;
    }
    
    .doctor-details h2 {
        font-size: 24px;
    }
}

// Функция для открытия попапа записи к врачу
function openAppointmentModal() {
    // Здесь можно использовать существующий попап на сайте
    // Или создать новый попап с формой
    alert('Функция записи к врачу будет добавлена позже');
}
</style>

<script>
function openAppointmentModal() {
    // Здесь можно использовать существующий попап на сайте
    // Или создать новый попап с формой
    alert('Функция записи к врачу будет добавлена позже');
}
</script>

<?php get_footer(); ?>
