<?php get_header(); ?>

<section class="doctor-single">
    <div class="container-grid">
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
                        <?php 
                        $video_url = get_post_meta(get_the_ID(), '_doctor_video_url', true);
                        if ($video_url) : ?>
                            <button class="doctor-video-btn-single" data-video="<?php echo esc_url($video_url); ?>">
                                <svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_2402_132)">
                                        <rect x="25.1797" y="25.1797" width="56.8345" height="52.518" fill="white"/>
                                        <path d="M50 0C22.3861 0 0 22.3857 0 50C0 77.6143 22.3861 100 50 100C77.6139 100 100 77.6143 100 50C100 22.3857 77.6139 0 50 0ZM67.2813 52.6504L42.2812 68.2754C41.808 68.5708 41.2644 68.7342 40.7067 68.7487C40.1491 68.7632 39.5977 68.6283 39.1098 68.3578C38.6219 68.0875 38.2153 67.6915 37.9323 67.2109C37.6492 66.7303 37.4999 66.1827 37.5 65.625V34.375C37.5 33.2383 38.1164 32.193 39.1098 31.6422C39.5974 31.3707 40.1489 31.2352 40.7068 31.2497C41.2647 31.2641 41.8084 31.4282 42.2812 31.7246L67.2813 47.3496C68.1945 47.9219 68.75 48.9229 68.75 50C68.75 51.0771 68.1945 52.0783 67.2813 52.6504Z" fill="#23BFCF"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_2402_132">
                                            <rect width="100" height="100" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        <?php endif; ?>
                    </div>
                    
                    <div class="doctor-basic-info">
                        <h1 class="doctor-name-single"><?php echo get_post_meta(get_the_ID(), '_doctor_full_name', true) ?: get_the_title(); ?></h1>
                        <div class="doctor-position-single"><?php echo get_post_meta(get_the_ID(), '_doctor_position', true); ?></div>
                        <div class="doctor-experience-single">Опыт работы: <?php echo get_post_meta(get_the_ID(), '_doctor_experience', true); ?> лет</div>
                        
                        
                        <button class="btn-1" onclick="openPopup()">
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
/* Стили .doctor-single перенесены в style.css */

/* Стили .container-grid перенесены в style.css */

.doctor-profile {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 60px;
}

.doctor-profile-left {
    text-align: center;
}

.doctor-photo-single {
    width: 100%;
    height: 420px;
    overflow: hidden;
    background: linear-gradient(135deg, #dff7f4 40%, #8fe0db 100%);
    border-radius: 20px;
    position: relative;
}

.doctor-photo-single img {
    width: 80%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
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
    font-size: 24px;
}

.doctor-position-single {
    font-size: 18px;
    margin-bottom: 10px;
}

.doctor-experience-single {
    font-size: 16px;
    color: #888;
    margin-bottom: 30px;
}

.doctor-video-btn-single {
    background: none;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-block;
    position: absolute;
    bottom: 20px;
    right: 20px;
}

/* Стили .doctor-appointment-btn перенесены в style.css */

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
        height: 350px;
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
        height: 300px;
    }
    
    .doctor-name-single {
        font-size: 24px;
    }
    
    .doctor-details h2 {
        font-size: 24px;
    }
}

/* Функция openAppointmentModal удалена - используется основной попап openPopup() */
</style>

<script>
/* Функция openAppointmentModal удалена - используется основной попап openPopup() */
</script>

<?php get_footer(); ?>
