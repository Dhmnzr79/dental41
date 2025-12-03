<?php
/**
 * Archive template for doctors (V2)
 */

get_header('v2'); ?>

<!-- Хлебные крошки -->
<nav class="v2-breadcrumbs" aria-label="Хлебные крошки" itemscope itemtype="https://schema.org/BreadcrumbList">
    <div class="v2-container">
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="1">
            <a href="<?php echo home_url(); ?>" itemprop="item">
                <span itemprop="name">Главная</span>
            </a>
        </span>
        <span class="v2-breadcrumbs__separator">/</span>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="2">
            <span itemprop="name">Врачи</span>
        </span>
    </div>
</nav>

<!-- Секция врачей -->
<section class="v2-doctors-archive">
    <div class="v2-container">
        <header class="v2-doctors-archive__header">
            <h1>Наши врачи</h1>
            <p>Профессиональная команда стоматологов с многолетним опытом работы</p>
        </header>
        
        <div class="v2-doctors-archive__grid" itemscope itemtype="https://schema.org/ItemList">
            <?php if (have_posts()) : 
                $doctor_index = 0;
                while (have_posts()) : the_post();
                    $doctor_index++;
                    $doctor_fio = get_post_meta(get_the_ID(), '_doctor_full_name', true) ?: get_the_title();
                    $doctor_position = get_post_meta(get_the_ID(), '_doctor_position', true);
                    $doctor_experience = get_post_meta(get_the_ID(), '_doctor_experience', true);
                    $doctor_preview = get_post_meta(get_the_ID(), '_doctor_short_preview', true);
                    $doctor_video = get_post_meta(get_the_ID(), '_doctor_video_url', true);
            ?>
                <article class="v2-doctor-card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Person">
                    <meta itemprop="position" content="<?php echo esc_attr($doctor_index); ?>">
                    
                    <div class="v2-doctor-card__photo">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'v2-doctor-card__img', 'itemprop' => 'image', 'loading' => 'lazy', 'alt' => esc_attr($doctor_fio))); ?>
                        <?php else : ?>
                            <div class="v2-doctor-card__placeholder" aria-hidden="true">👨‍⚕️</div>
                        <?php endif; ?>
                        
                        <?php if ($doctor_video) : ?>
                            <button class="v2-doctor-card__video-btn" data-video="<?php echo esc_url($doctor_video); ?>" aria-label="Смотреть видео о враче">
                                <svg width="60" height="60" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <g clip-path="url(#clip0_doctor_video)">
                                        <rect x="25.1797" y="25.1797" width="56.8345" height="52.518" fill="white"/>
                                        <path d="M50 0C22.3861 0 0 22.3857 0 50C0 77.6143 22.3861 100 50 100C77.6139 100 100 77.6143 100 50C100 22.3857 77.6139 0 50 0ZM67.2813 52.6504L42.2812 68.2754C41.808 68.5708 41.2644 68.7342 40.7067 68.7487C40.1491 68.7632 39.5977 68.6283 39.1098 68.3578C38.6219 68.0875 38.2153 67.6915 37.9323 67.2109C37.6492 66.7303 37.4999 66.1827 37.5 65.625V34.375C37.5 33.2383 38.1164 32.193 39.1098 31.6422C39.5974 31.3707 40.1489 31.2352 40.7068 31.2497C41.2647 31.2641 41.8084 31.4282 42.2812 31.7246L67.2813 47.3496C68.1945 47.9219 68.75 48.9229 68.75 50C68.75 51.0771 68.1945 52.0783 67.2813 52.6504Z" fill="#23BFCF"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_doctor_video">
                                            <rect width="100" height="100" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        <?php endif; ?>
                    </div>
                    
                    <div class="v2-doctor-card__info">
                        <h2 class="v2-doctor-card__name" itemprop="name">
                            <a href="<?php the_permalink(); ?>" itemprop="url"><?php echo esc_html($doctor_fio); ?></a>
                        </h2>
                        <div class="v2-doctor-card__position" itemprop="jobTitle"><?php echo esc_html($doctor_position); ?></div>
                        <?php if ($doctor_experience) : ?>
                            <div class="v2-doctor-card__experience">Опыт работы: <?php echo esc_html($doctor_experience); ?> лет</div>
                        <?php endif; ?>
                        <?php if ($doctor_preview) : ?>
                            <p class="v2-doctor-card__preview" itemprop="description"><?php echo esc_html($doctor_preview); ?></p>
                        <?php endif; ?>
                        
                        <div class="v2-doctor-card__actions">
                            <a href="<?php the_permalink(); ?>" class="v2-doctor-card__btn" aria-label="Подробнее о враче: <?php echo esc_attr($doctor_fio); ?>">
                                <span class="v2-doctor-card__btn-text">Подробнее о враче</span>
                                <svg class="v2-doctor-card__btn-arrow" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M10 1L15 6L10 11M15 6H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            <?php 
                endwhile; 
            ?>
            
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <div class="v2-col-12">
                    <p>Врачи не найдены.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Попап для видео -->
<div id="v2-doctor-video-modal" class="v2-doctor-video-modal" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="v2-doctor-video-title">
    <div class="v2-doctor-video-modal__content">
        <button class="v2-doctor-video-modal__close" aria-label="Закрыть видео">&times;</button>
        <div class="v2-doctor-video-modal__video">
            <iframe id="v2-doctor-video-iframe" src="" frameborder="0" allowfullscreen title="Видео о враче"></iframe>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('v2-doctor-video-modal');
    const iframe = document.getElementById('v2-doctor-video-iframe');
    const closeBtn = document.querySelector('.v2-doctor-video-modal__close');
    
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
    
    document.querySelectorAll('.v2-doctor-card__video-btn').forEach(btn => {
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

<?php get_footer('v2'); ?>
