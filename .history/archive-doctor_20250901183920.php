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
                        </div>
                        
                        <div class="doctor-info-large">
                            <h2 class="doctor-name-large"><?php echo get_post_meta(get_the_ID(), '_doctor_full_name', true) ?: get_the_title(); ?></h2>
                            <div class="doctor-position-large"><?php echo get_post_meta(get_the_ID(), '_doctor_position', true); ?></div>
                            <div class="doctor-experience-large">Опыт работы: <?php echo get_post_meta(get_the_ID(), '_doctor_experience', true); ?> лет</div>
                            <p class="doctor-preview-large"><?php echo get_post_meta(get_the_ID(), '_doctor_short_preview', true); ?></p>
                            
                            <div class="doctor-actions-large">
                                <a href="<?php the_permalink(); ?>" class="doctor-btn">Подробнее о враче</a>
                                <?php 
                                $video_url = get_post_meta(get_the_ID(), '_doctor_video_url', true);
                                if ($video_url) : ?>
                                    <button class="doctor-video-btn" data-video="<?php echo esc_url($video_url); ?>">🎥 Видео</button>
                                <?php endif; ?>
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
    git push

    function openDoctorVideoModal(videoUrl) {
        // Конвертируем Vimeo URL в embed URL
        let embedUrl = videoUrl;
        if (videoUrl.includes('vimeo.com/')) {
            const videoId = videoUrl.split('vimeo.com/')[1];
            embedUrl = `https://player.vimeo.com/video/${videoId}?autoplay=1`;
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
    document.querySelectorAll('.doctor-video-btn').forEach(btn => {
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

.doctor-video-btn {
    background: linear-gradient(135deg, #4ecdc4 0%, #44a08d 100%);
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.doctor-video-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(78, 205, 196, 0.3);
}
</style>

<?php get_footer(); ?>
