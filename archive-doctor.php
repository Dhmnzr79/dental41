<?php
/**
 * Archive template for doctors (V2)
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
            <span itemprop="name">Врачи</span>
        </span>
    </div>
</nav>

<!-- Секция врачей -->
<section class="doctors-archive">
    <div class="container">
        <header class="doctors-archive__header">
            <div class="row">
                <div class="col-sm-12 col-lg-8">
                    <h1>Наши врачи</h1>
                    <p>Профессиональная команда стоматологов с многолетним опытом работы</p>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="services__description">
                        <div class="services__description-avatars">
                            <div class="services__circles circle-group">
                                <div class="services__circle circle">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-06.jpg" alt="Довольная пациентка" loading="lazy">
                                </div>
                                <div class="services__circle circle">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-03.jpg" alt="Довольная пациентка" loading="lazy">
                                </div>
                                <div class="services__circle circle">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-face-05.jpg" alt="Довольный пациент" loading="lazy">
                                </div>
                            </div>
                        </div>
                        <div class="services__description-content">
                            <div class="services__rating" aria-hidden="true">
                                <svg class="services__rating-stars" width="98" height="17" viewBox="0 0 98 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.56088 13.7L4.41088 16.2C4.22754 16.3167 4.03588 16.3667 3.83588 16.35C3.63588 16.3333 3.46088 16.2667 3.31088 16.15C3.16088 16.0333 3.04421 15.8877 2.96088 15.713C2.87754 15.5383 2.86088 15.3423 2.91088 15.125L4.01088 10.4L0.335876 7.225C0.169209 7.075 0.0652091 6.904 0.0238758 6.712C-0.0174575 6.52 -0.00512426 6.33267 0.0608757 6.15C0.126876 5.96733 0.226876 5.81733 0.360876 5.7C0.494876 5.58267 0.678209 5.50767 0.910876 5.475L5.76088 5.05L7.63588 0.6C7.71921 0.4 7.84854 0.25 8.02388 0.15C8.19921 0.0499999 8.37821 0 8.56088 0C8.74354 0 8.92254 0.0499999 9.09788 0.15C9.27321 0.25 9.40254 0.4 9.48588 0.6L11.3609 5.05L16.2109 5.475C16.4442 5.50833 16.6275 5.58333 16.7609 5.7C16.8942 5.81667 16.9942 5.96667 17.0609 6.15C17.1275 6.33333 17.1402 6.521 17.0989 6.713C17.0575 6.905 16.9532 7.07567 16.7859 7.225L13.1109 10.4L14.2109 15.125C14.2609 15.3417 14.2442 15.5377 14.1609 15.713C14.0775 15.8883 13.9609 16.034 13.8109 16.15C13.6609 16.266 13.4859 16.3327 13.2859 16.35C13.0859 16.3673 12.8942 16.3173 12.7109 16.2L8.56088 13.7Z" fill="#FF6A09"/>
                                    <path d="M28.6835 13.7L24.5335 16.2C24.3502 16.3167 24.1585 16.3667 23.9585 16.35C23.7585 16.3333 23.5835 16.2667 23.4335 16.15C23.2835 16.0333 23.1668 15.8877 23.0835 15.713C23.0002 15.5383 22.9835 15.3423 23.0335 15.125L24.1335 10.4L20.4585 7.225C20.2918 7.075 20.1878 6.904 20.1465 6.712C20.1052 6.52 20.1175 6.33267 20.1835 6.15C20.2495 5.96733 20.3495 5.81733 20.4835 5.7C20.6175 5.58267 20.8008 5.50767 21.0335 5.475L25.8835 5.05L27.7585 0.6C27.8418 0.4 27.9712 0.25 28.1465 0.15C28.3218 0.0499999 28.5008 0 28.6835 0C28.8662 0 29.0452 0.0499999 29.2205 0.15C29.3958 0.25 29.5252 0.4 29.6085 0.6L31.4835 5.05L36.3335 5.475C36.5668 5.50833 36.7502 5.58333 36.8835 5.7C37.0168 5.81667 37.1168 5.96667 37.1835 6.15C37.2502 6.33333 37.2628 6.521 37.2215 6.713C37.1802 6.905 37.0758 7.07567 36.9085 7.225L33.2335 10.4L34.3335 15.125C34.3835 15.3417 34.3668 15.5377 34.2835 15.713C34.2002 15.8883 34.0835 16.034 33.9335 16.15C33.7835 16.266 33.6085 16.3327 33.4085 16.35C33.2085 16.3673 33.0168 16.3173 32.8335 16.2L28.6835 13.7Z" fill="#FF6A09"/>
                                    <path d="M48.8061 13.7L44.6561 16.2C44.4727 16.3167 44.2811 16.3667 44.0811 16.35C43.8811 16.3333 43.7061 16.2667 43.5561 16.15C43.4061 16.0333 43.2894 15.8877 43.2061 15.713C43.1227 15.5383 43.1061 15.3423 43.1561 15.125L44.2561 10.4L40.5811 7.225C40.4144 7.075 40.3104 6.904 40.2691 6.712C40.2277 6.52 40.2401 6.33267 40.3061 6.15C40.3721 5.96733 40.4721 5.81733 40.6061 5.7C40.7401 5.58267 40.9234 5.50767 41.1561 5.475L46.0061 5.05L47.8811 0.6C47.9644 0.4 48.0937 0.25 48.2691 0.15C48.4444 0.0499999 48.6234 0 48.8061 0C48.9887 0 49.1677 0.0499999 49.3431 0.15C49.5184 0.25 49.6477 0.4 49.7311 0.6L51.6061 5.05L56.4561 5.475C56.6894 5.50833 56.8727 5.58333 57.0061 5.7C57.1394 5.81667 57.2394 5.96667 57.3061 6.15C57.3727 6.33333 57.3854 6.521 57.3441 6.713C57.3027 6.905 57.1984 7.07567 57.0311 7.225L53.3561 10.4L54.4561 15.125C54.5061 15.3417 54.4894 15.5377 54.4061 15.713C54.3227 15.8883 54.2061 16.034 54.0561 16.15C53.9061 16.266 53.7311 16.3327 53.5311 16.35C53.3311 16.3673 53.1394 16.3173 52.9561 16.2L48.8061 13.7Z" fill="#FF6A09"/>
                                    <path d="M68.9287 13.7L64.7787 16.2C64.5953 16.3167 64.4037 16.3667 64.2037 16.35C64.0037 16.3333 63.8287 16.2667 63.6787 16.15C63.5287 16.0333 63.412 15.8877 63.3287 15.713C63.2453 15.5383 63.2287 15.3423 63.2787 15.125L64.3787 10.4L60.7037 7.225C60.537 7.075 60.433 6.904 60.3917 6.712C60.3503 6.52 60.3627 6.33267 60.4287 6.15C60.4947 5.96733 60.5947 5.81733 60.7287 5.7C60.8627 5.58267 61.046 5.50767 61.2787 5.475L66.1287 5.05L68.0037 0.6C68.087 0.4 68.2163 0.25 68.3917 0.15C68.567 0.0499999 68.746 0 68.9287 0C69.1113 0 69.2903 0.0499999 69.4657 0.15C69.641 0.25 69.7703 0.4 69.8537 0.6L71.7287 5.05L76.5787 5.475C76.812 5.50833 76.9953 5.58333 77.1287 5.7C77.262 5.81667 77.362 5.96667 77.4287 6.15C77.4953 6.33333 77.508 6.521 77.4667 6.713C77.4253 6.905 77.321 7.07567 77.1537 7.225L73.4787 10.4L74.5787 15.125C74.6287 15.3417 74.612 15.5377 74.5287 15.713C74.4453 15.8883 74.3287 16.034 74.1787 16.15C74.0287 16.266 73.8537 16.3327 73.6537 16.35C73.4537 16.3673 73.262 16.3173 73.0787 16.2L68.9287 13.7Z" fill="#FF6A09"/>
                                    <path d="M89.0513 13.7L84.9013 16.2C84.718 16.3167 84.5263 16.3667 84.3263 16.35C84.1263 16.3333 83.9513 16.2667 83.8013 16.15C83.6513 16.0333 83.5346 15.8877 83.4513 15.713C83.368 15.5383 83.3513 15.3423 83.4013 15.125L84.5013 10.4L80.8263 7.225C80.6596 7.075 80.5556 6.904 80.5143 6.712C80.473 6.52 80.4853 6.33267 80.5513 6.15C80.6173 5.96733 80.7173 5.81733 80.8513 5.7C80.9853 5.58267 81.1686 5.50767 81.4013 5.475L86.2513 5.05L88.1263 0.6C88.2096 0.4 88.339 0.25 88.5143 0.15C88.6896 0.0499999 88.8686 0 89.0513 0C89.234 0 89.413 0.0499999 89.5883 0.15C89.7636 0.25 89.893 0.4 89.9763 0.6L91.8513 5.05L96.7013 5.475C96.9346 5.50833 97.118 5.58333 97.2513 5.7C97.3846 5.81667 97.4846 5.96667 97.5513 6.15C97.618 6.33333 97.6306 6.521 97.5893 6.713C97.548 6.905 97.4436 7.07567 97.2763 7.225L93.6013 10.4L94.7013 15.125C94.7513 15.3417 94.7346 15.5377 94.6513 15.713C94.568 15.8883 94.4513 16.034 94.3013 16.15C94.1513 16.266 93.9763 16.3327 93.7763 16.35C93.5763 16.3673 93.3846 16.3173 93.2013 16.2L89.0513 13.7Z" fill="#FF6A09"/>
                                </svg>
                            </div>
                            <p class="services__description-caption">
                                Более 20 000 улыбок мы подарили нашим клиентам за 26 лет работы
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="doctors-archive__pd-notice">
            <p>ПДн опубликованы на сайте с согласия на обработку персональных данных, разрешенных субъектом персональных данных для распространения, полученного в соответствии со ст. 10.1 152-ФЗ. Субъектами установлены запреты на обработку неограниченным кругом лиц, опубликованных персональных данных</p>
        </div>
        
        <div class="doctors-archive__grid" itemscope itemtype="https://schema.org/ItemList">
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
                <article class="doctor-card" itemprop="itemListElement" itemscope itemtype="https://schema.org/Person">
                    <meta itemprop="position" content="<?php echo esc_attr($doctor_index); ?>">
                    
                    <a href="<?php the_permalink(); ?>" class="doctor-card__photo-link">
                        <div class="doctor-card__photo">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('class' => 'doctor-card__img', 'itemprop' => 'image', 'loading' => 'lazy', 'alt' => esc_attr($doctor_fio))); ?>
                            <?php else : ?>
                                <div class="doctor-card__placeholder" aria-hidden="true">👨‍⚕️</div>
                            <?php endif; ?>
                            
                            <?php if ($doctor_video) : ?>
                                <button type="button" class="doctor-card__video-btn" data-video="<?php echo esc_url($doctor_video); ?>" aria-label="Смотреть видео о враче">
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
                    </a>
                    
                    <div class="doctor-card__info">
                        <h2 class="doctor-card__name" itemprop="name">
                            <a href="<?php the_permalink(); ?>" itemprop="url"><?php echo esc_html($doctor_fio); ?></a>
                        </h2>
                        <div class="doctor-card__position" itemprop="jobTitle"><?php echo esc_html($doctor_position); ?></div>
                        <?php if ($doctor_experience) : ?>
                            <div class="doctor-card__experience">Опыт работы: <?php echo esc_html($doctor_experience); ?> лет</div>
                        <?php endif; ?>
                        
                        <a href="<?php the_permalink(); ?>" class="doctor-card__btn link-underline" aria-label="Подробнее о враче: <?php echo esc_attr($doctor_fio); ?>">
                                Подробнее о враче
                            </a>
                    </div>
                </article>
            <?php 
                endwhile; 
            ?>
            
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <div class="col-12">
                    <p>Врачи не найдены.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

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
    
    document.querySelectorAll('.doctor-card__video-btn').forEach(btn => {
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

<?php get_footer(); ?>
