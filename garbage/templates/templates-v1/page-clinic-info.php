<?php
/**
 * Template Name: Информация о клинике
 * 
 * Шаблон для страниц с информацией о клинике (О организации, Реквизиты, Лицензии, Юридическая информация)
 */

get_header(); ?>

<!-- Хлебные крошки -->
<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo home_url(); ?>">Главная</a>
        <span class="separator">/</span>
        <a href="<?php echo home_url('/o-klinike'); ?>">О клинике</a>
        <span class="separator">/</span>
        <span><?php the_title(); ?></span>
    </div>
</div>

<!-- Основной контент -->
<main class="clinic-info-page">
    <div class="container">
        <div class="content-layout">
            <!-- Левая колонка с контентом -->
            <div class="content-main">
                <!-- Заголовок страницы -->
                <header class="page-header">
                    <h1><?php the_title(); ?></h1>
                </header>
                
                <!-- Контент страницы -->
                <div class="clinic-page-content">
                    <?php while (have_posts()) : the_post(); ?>
                        <article class="clinic-info-article">
                            <?php the_content(); ?>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
            
            <!-- Форма обратной связи -->
            <aside class="content-sidebar">
                <div class="contact-form-sticky">
                    <h3>Остались вопросы?</h3>
                    <p>Запишитесь на консультацию, и мы ответим на все ваши вопросы</p>
                    
                    <?php echo do_shortcode('[contact-form-7 id="adc9765" title="Заявка вопрос"]'); ?>
                    
                    <p style="font-size: 14px; color: #666; margin-top: 15px;">
                        * Нажимая кнопку, вы даете согласие на обработку <a href="<?php echo home_url('/privacy.pdf'); ?>" target="_blank" rel="noopener">персональных данных</a>
                    </p>
                    
                </div>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>
