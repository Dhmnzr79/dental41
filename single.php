<?php get_header(); ?>

<!-- Хлебные крошки -->
<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo home_url(); ?>">Главная</a>
        <span class="separator">/</span>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Блог</a>
        <span class="separator">/</span>
        <span><?php the_title(); ?></span>
    </div>
</div>

<!-- Статья -->
<article class="single-article">
    <div class="container">
        <div class="article-layout">
            <!-- Контент статьи -->
            <div class="article-content-wrapper">
                <header class="article-header">
                    <h1><?php the_title(); ?></h1>
                    <div class="article-meta">
                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                    </div>
                </header>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="article-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <div class="article-content">
                    <?php the_content(); ?>
                </div>
                
                <div class="article-footer">
                    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="back-to-blog">← Вернуться к блогу</a>
                </div>
            </div>
            
            <!-- Форма обратной связи -->
            <div class="article-sidebar">
                <div class="contact-form-sticky">
                    <h3>Остались вопросы?</h3>
                    <p>Запишитесь на консультацию, и мы ответим на все ваши вопросы</p>
                    
                    <form class="article-contact-form" method="post" action="">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Ваше имя" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Телефон" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Ваш вопрос (необязательно)" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn-1">Записаться на консультацию</button>
                    </form>
                    
                    <div class="contact-info">
                        <div class="contact-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                            </svg>
                            <span>г. Петропавловск-Камчатский</span>
                        </div>
                        <div class="contact-item">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <span>+7 (900) 000-00-00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<?php get_footer(); ?>
