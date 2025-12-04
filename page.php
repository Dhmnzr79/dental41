<?php
/**
 * Шаблон для всех страниц
 */

get_header('v2'); ?>

<!-- Хлебные крошки -->
<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo home_url(); ?>">Главная</a>
        <span class="separator">/</span>
        <span><?php the_title(); ?></span>
    </div>
</div>

<!-- Основной контент -->
<main class="page-content">
    <div class="container">
        <div class="content-wrapper">
            <!-- Заголовок страницы -->
            <header class="page-header">
                <h1><?php the_title(); ?></h1>
            </header>
            
            <!-- Контент страницы -->
            <div class="page-content-inner">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="page-article">
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer('v2'); ?>
