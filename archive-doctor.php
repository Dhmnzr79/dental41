<?php get_header(); ?>

<section class="doctors-archive">
    <div class="container">
        <h1 class="archive-title">Наши врачи</h1>
        <p class="archive-description">Профессиональная команда стоматологов с многолетним опытом работы</p>
        
        <div class="doctors-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="doctor-card-large">
                        <div class="doctor-photo-large">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <div class="doctor-placeholder-large">👨‍⚕️</div>
                            <?php endif; ?>
                            <?php 
                            $video_url = get_post_meta(get_the_ID(), '_doctor_video_url', true);
                            if ($video_url) : ?>
                                <button class="doctor-video-btn-archive" data-video="<?php echo esc_url($video_url); ?>">
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
                        
                        <div class="doctor-info-large">
                            <h2 class="doctor-name-large"><?php echo get_post_meta(get_the_ID(), '_doctor_full_name', true) ?: get_the_title(); ?></h2>
                            <div class="doctor-position-large"><?php echo get_post_meta(get_the_ID(), '_doctor_position', true); ?></div>
                            <div class="doctor-experience-large">Опыт работы: <?php echo get_post_meta(get_the_ID(), '_doctor_experience', true); ?> лет</div>
                            <p class="doctor-preview-large"><?php echo get_post_meta(get_the_ID(), '_doctor_short_preview', true); ?></p>
                            
                            <div class="doctor-actions-large">
                                <a href="<?php the_permalink(); ?>" class="btn-secondary btn-doctor-card">
                                    <span class="btn-text">Подробнее о враче</span>
                                    <svg class="btn-arrow" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 1L15 6L10 11M15 6H1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <p>Врачи не найдены.</p>
            <?php endif; ?>
        </div>
    </div>
</section>



<script>
document.addEventListener('DOMContentLoaded', function() {
    // Попап для видео врачей
    const doctorVideoModal = document.getElementById('doctorVideoModal');
    const doctorVideoIframe = document.getElementById('doctorVideoIframe');
    const doctorModalClose = document.querySelector('.doctor-video-modal-close');
    
    function openDoctorVideoModal(videoUrl) {
        // Конвертируем URL в embed URL
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
        
        doctorVideoIframe.src = embedUrl;
        doctorVideoModal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    
    function closeDoctorVideoModal() {
        doctorVideoModal.style.display = 'none';
        doctorVideoIframe.src = '';
        document.body.style.overflow = '';
    }
    
    // Обработчик для кнопок видео врачей
    document.querySelectorAll('.doctor-video-btn-archive').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const videoUrl = this.getAttribute('data-video');
            if (videoUrl) {
                openDoctorVideoModal(videoUrl);
            }
        });
    });
    
    // Закрытие попапа
    doctorModalClose?.addEventListener('click', closeDoctorVideoModal);
    
    // Закрытие по клику вне попапа
    doctorVideoModal?.addEventListener('click', function(e) {
        if (e.target === doctorVideoModal) {
            closeDoctorVideoModal();
        }
    });
    
    // Закрытие по Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (doctorVideoModal.style.display === 'block') {
                closeDoctorVideoModal();
            }
        }
    });
});
</script>

<!-- Попап для видео врачей -->
<div id="doctorVideoModal" class="doctor-video-modal">
    <div class="doctor-video-modal-content">
        <span class="doctor-video-modal-close">&times;</span>
        <div class="doctor-video-modal-video">
            <iframe id="doctorVideoIframe" src="" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>

<style>
/* Попап для видео врачей */
.doctor-video-modal {
    display: none;
    position: fixed;
    z-index: 10000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(5px);
}

.doctor-video-modal-content {
    position: relative;
    margin: 5% auto;
    width: 90%;
    max-width: 800px;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.doctor-video-modal-close {
    position: absolute;
    top: 15px;
    right: 20px;
    color: #fff;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10001;
    background: rgba(0, 0, 0, 0.5);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
}

.doctor-video-modal-close:hover {
    background: rgba(0, 0, 0, 0.8);
}

.doctor-video-modal-video {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    height: 0;
    overflow: hidden;
}

.doctor-video-modal-video iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

/* Стили .doctor-video-btn-archive перенесены в style.css */
</style>

<?php get_footer(); ?>
