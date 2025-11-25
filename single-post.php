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
                    
                </div>
            </div>
        </div>
    </div>
</article>

<?php get_footer(); ?>
