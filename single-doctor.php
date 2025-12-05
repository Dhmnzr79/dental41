<?php
/**
 * Single doctor template (V2)
 */

get_header(); ?>

<!-- Хлебные крошки -->
<nav class="breadcrumbs" aria-label="Хлебные крошки" itemscope itemtype="https://schema.org/BreadcrumbList">
    <div class="container">
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="1">
            <a href="<?php echo home_url(); ?>" itemprop="item">
                <span itemprop="name">Главная</span>
            </a>
        </span>
        <span class="breadcrumbs__separator">/</span>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="2">
            <a href="<?php echo get_post_type_archive_link('doctor'); ?>" itemprop="item">
                <span itemprop="name">Врачи</span>
            </a>
        </span>
        <span class="breadcrumbs__separator">/</span>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="3">
            <span itemprop="name"><?php the_title(); ?></span>
        </span>
    </div>
</nav>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $doctor_fio = get_post_meta(get_the_ID(), '_doctor_full_name', true) ?: get_the_title();
    $doctor_position = get_post_meta(get_the_ID(), '_doctor_position', true);
    $doctor_experience = get_post_meta(get_the_ID(), '_doctor_experience', true);
    $doctor_preview = get_post_meta(get_the_ID(), '_doctor_short_preview', true);
    $doctor_description = get_post_meta(get_the_ID(), '_doctor_full_description', true);
    $doctor_education = get_post_meta(get_the_ID(), '_doctor_education', true);
    $doctor_video = get_post_meta(get_the_ID(), '_doctor_video_url', true);
    
    // Получаем сертификаты (массив ID изображений)
    $certificate_ids = get_post_meta(get_the_ID(), '_doctor_certificates', true);
    if (!is_array($certificate_ids)) {
        $certificate_ids = array();
    }
    
    // Получаем 3 индекса
    $doctor_index1 = get_post_meta(get_the_ID(), '_doctor_index1', true);
    $doctor_index2 = get_post_meta(get_the_ID(), '_doctor_index2', true);
    $doctor_index3 = get_post_meta(get_the_ID(), '_doctor_index3', true);
    
    // Получаем цитату
    $doctor_quote = get_post_meta(get_the_ID(), '_doctor_quote', true);
?>

<!-- Страница врача -->
<article class="doctor-single" itemscope itemtype="https://schema.org/Person">
    <meta itemprop="url" content="<?php echo esc_url(get_permalink()); ?>">
    <div class="container">
        <div class="row">
            <!-- Левая колонка - фото и основная информация -->
            <div class="col-12 col-sm-6 col-lg-4 doctor-single__left">
                <div class="doctor-single__photo">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('class' => 'doctor-single__img', 'itemprop' => 'image', 'loading' => 'lazy', 'alt' => esc_attr($doctor_fio))); ?>
                    <?php else : ?>
                        <div class="doctor-single__placeholder" aria-hidden="true">👨‍⚕️</div>
                    <?php endif; ?>
                    
                    <?php if ($doctor_video) : ?>
                        <button class="doctor-single__video-btn" data-video="<?php echo esc_url($doctor_video); ?>" aria-label="Смотреть видео о враче">
                            <svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <g clip-path="url(#clip0_doctor_single_video)">
                                    <rect x="25.1797" y="25.1797" width="56.8345" height="52.518" fill="white"/>
                                    <path d="M50 0C22.3861 0 0 22.3857 0 50C0 77.6143 22.3861 100 50 100C77.6139 100 100 77.6143 100 50C100 22.3857 77.6139 0 50 0ZM67.2813 52.6504L42.2812 68.2754C41.808 68.5708 41.2644 68.7342 40.7067 68.7487C40.1491 68.7632 39.5977 68.6283 39.1098 68.3578C38.6219 68.0875 38.2153 67.6915 37.9323 67.2109C37.6492 66.7303 37.4999 66.1827 37.5 65.625V34.375C37.5 33.2383 38.1164 32.193 39.1098 31.6422C39.5974 31.3707 40.1489 31.2352 40.7068 31.2497C41.2647 31.2641 41.8084 31.4282 42.2812 31.7246L67.2813 47.3496C68.1945 47.9219 68.75 48.9229 68.75 50C68.75 51.0771 68.1945 52.0783 67.2813 52.6504Z" fill="#23BFCF"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_doctor_single_video">
                                        <rect width="100" height="100" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </button>
                    <?php endif; ?>
                </div>
                
                <div class="doctor-single__basic">
                    <h1 class="doctor-single__name" itemprop="name"><?php echo esc_html($doctor_fio); ?></h1>
                    <?php if ($doctor_position) : ?>
                        <div class="doctor-single__position" itemprop="jobTitle"><?php echo esc_html($doctor_position); ?></div>
                    <?php endif; ?>
                    <?php if ($doctor_experience) : ?>
                        <div class="doctor-single__experience">Опыт работы: <?php echo esc_html($doctor_experience); ?> лет</div>
                    <?php endif; ?>
                    
                    <button type="button" class="btn btn--primary" onclick="openPopup()" aria-label="Записаться к врачу">
                        Записаться к врачу
                    </button>
                </div>
            </div>
            
            <!-- Правая колонка - подробная информация -->
            <div class="col-12 col-sm-6 col-lg-8 doctor-single__content">
                <div class="doctor-single__details">
                    <!-- 3 Индекса -->
                    <?php if ($doctor_index1 || $doctor_index2 || $doctor_index3) : ?>
                        <section class="doctor-single__section doctor-single__indices">
                            <div class="doctor-single__indices-grid">
                                <?php if ($doctor_index1) : ?>
                                    <div class="doctor-single__index-item">
                                        <div class="doctor-single__index-icon">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/index-icon-01.svg" alt="" aria-hidden="true">
                                        </div>
                                        <div class="doctor-single__index-value"><?php echo esc_html($doctor_index1); ?></div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($doctor_index2) : ?>
                                    <div class="doctor-single__index-item">
                                        <div class="doctor-single__index-icon">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/index-icon-02.svg" alt="" aria-hidden="true">
                                        </div>
                                        <div class="doctor-single__index-value"><?php echo esc_html($doctor_index2); ?></div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($doctor_index3) : ?>
                                    <div class="doctor-single__index-item">
                                        <div class="doctor-single__index-icon">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/index-icon-03.svg" alt="" aria-hidden="true">
                                        </div>
                                        <div class="doctor-single__index-value"><?php echo esc_html($doctor_index3); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                    
                    <!-- Полное описание -->
                    <?php if ($doctor_description) : ?>
                        <section class="doctor-single__section">
                            <div class="doctor-single__text">
                                <?php echo wp_kses_post($doctor_description); ?>
                            </div>
                        </section>
                    <?php endif; ?>
                    
                    <!-- Цитата -->
                    <?php if ($doctor_quote) : ?>
                        <section class="doctor-single__section doctor-single__quote-section">
                            <blockquote class="doctor-single__quote" itemprop="description">
                                <?php echo esc_html($doctor_quote); ?>
                            </blockquote>
                        </section>
                    <?php endif; ?>
                    
                    <!-- Образование -->
                    <?php if ($doctor_education) : ?>
                        <section class="doctor-single__section">
                            <h3>Образование</h3>
                            <ul class="doctor-single__education-list" itemprop="alumniOf">
                                <?php 
                                // Разбиваем текст по переносам строк и выводим как список
                                $education_lines = explode("\n", $doctor_education);
                                foreach ($education_lines as $line) {
                                    $line = trim($line);
                                    if (!empty($line)) {
                                        echo '<li>' . esc_html($line) . '</li>';
                                    }
                                }
                                ?>
                            </ul>
                        </section>
                    <?php endif; ?>
                    
                    <!-- Сертификаты и награды -->
                    <?php if (!empty($certificate_ids)) : ?>
                        <section class="doctor-single__section">
                            <h3>Сертификаты и награды</h3>
                            <div class="doctor-single__certificates" itemprop="award">
                                <?php foreach ($certificate_ids as $cert_id) : 
                                    $cert_image = wp_get_attachment_image($cert_id, 'large', false, array('class' => 'doctor-single__certificate-img', 'loading' => 'lazy'));
                                    if ($cert_image) : ?>
                                        <div class="doctor-single__certificate-item">
                                            <?php echo $cert_image; ?>
                                        </div>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</article>

<!-- Попап для видео -->
<div id="doctor-video-modal" class="doctor-video-modal" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="doctor-video-title">
    <div class="doctor-video-modal__content">
        <button class="doctor-video-modal__close" aria-label="Закрыть видео">&times;</button>
        <div class="doctor-video-modal__video">
            <iframe id="doctor-video-iframe" src="" frameborder="0" allowfullscreen title="Видео о враче"></iframe>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('doctor-video-modal');
    const iframe = document.getElementById('doctor-video-iframe');
    const closeBtn = document.querySelector('.doctor-video-modal__close');
    
    function openVideoModal(videoUrl) {
        let embedUrl = videoUrl;
        
        if (videoUrl.includes('vimeo.com/')) {
            const videoId = videoUrl.split('vimeo.com/')[1];
            embedUrl = `https://player.vimeo.com/video/${videoId}?autoplay=1`;
        } else if (videoUrl.includes('youtube.com/watch') || videoUrl.includes('youtu.be/')) {
            let videoId = '';
            if (videoUrl.includes('youtube.com/watch')) {
                videoId = videoUrl.split('v=')[1]?.split('&')[0];
            } else if (videoUrl.includes('youtu.be/')) {
                videoId = videoUrl.split('youtu.be/')[1]?.split('?')[0];
            }
            if (videoId) {
                embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1`;
            }
        } else if (videoUrl.includes('rutube.ru/video/')) {
            const videoId = videoUrl.split('rutube.ru/video/')[1]?.split('/')[0];
            if (videoId) {
                embedUrl = `https://rutube.ru/play/embed/${videoId}?autoplay=1`;
            }
        }
        
        iframe.src = embedUrl;
        modal.setAttribute('aria-hidden', 'false');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
    
    function closeVideoModal() {
        modal.setAttribute('aria-hidden', 'true');
        modal.style.display = 'none';
        iframe.src = '';
        document.body.style.overflow = '';
    }
    
    document.querySelectorAll('.doctor-single__video-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const videoUrl = this.getAttribute('data-video');
            if (videoUrl) {
                openVideoModal(videoUrl);
            }
        });
    });
    
    closeBtn?.addEventListener('click', closeVideoModal);
    
    modal?.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeVideoModal();
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.getAttribute('aria-hidden') === 'false') {
            closeVideoModal();
        }
    });
});
</script>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
