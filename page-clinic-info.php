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
                    
                    <form class="article-contact-form" method="post" action="<?php echo get_template_directory_uri(); ?>/form-handler.php">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Ваше имя" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Телефон" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Ваш вопрос (необязательно)" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn-1" onclick="openPopup()">Записаться на консультацию</button>
                    </form>
                    
                </div>
            </aside>
        </div>
    </div>
</main>

<?php get_footer(); ?>
