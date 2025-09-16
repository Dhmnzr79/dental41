<?php get_header(); ?>

<!-- Хлебные крошки -->
<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo home_url(); ?>">Главная</a>
        <span class="separator">/</span>
        <a href="<?php echo home_url('/blog/'); ?>">Блог</a>
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
                </header>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="article-image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!is_featured_article()) : ?>
                    <!-- Дисклеймер -->
                    <div class="article-disclaimer">
                        <p><strong>Уважаемый пациент!</strong> Клиника «ЦЭСИ» уведомляет Вас, что тщательное соблюдение данных рекомендаций очень важно и является обязательным условием обеспечения высокой вероятности положительного результата проведенного лечения, безопасного пользования результатами оказанной медицинской услуги, отсутствия осложнений.</p>
                    </div>
                    
                    <!-- Бирюзовая полоска -->
                    <div class="article-brand-stripe"></div>
                <?php endif; ?>
                
                <div class="article-content">
                    <?php the_content(); ?>
                </div>
                
                <div class="article-footer">
                    <a href="<?php echo home_url('/blog/'); ?>" class="back-to-blog">← Вернуться к блогу</a>
                </div>
            </div>
            
            <!-- Форма обратной связи -->
            <div class="article-sidebar">
                <div class="contact-form-sticky">
                    <h3>Остались вопросы?</h3>
                    <p>Запишитесь на консультацию, и мы ответим на все ваши вопросы</p>
                    
                    <?php echo do_shortcode('[contact-form-7 id="adc9765" title="Заявка вопрос"]'); ?>
                    
                    <p style="font-size: 14px; color: #666; margin-top: 15px;">
                        * Нажимая кнопку, вы даете согласие на обработку <a href="<?php echo home_url('/privacy.pdf'); ?>" target="_blank" rel="noopener">персональных данных</a>
                    </p>
                    
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
