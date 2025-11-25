<?php
/**
 * Template Name: Блог
 * 
 * Шаблон страницы для отображения блога
 */

get_header(); ?>

<!-- Хлебные крошки -->
<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo home_url(); ?>">Главная</a>
        <span class="separator">/</span>
        <span>Блог</span>
    </div>
</div>

<!-- Блог секция -->
<section class="blog-section">
    <div class="container">
        <div class="blog-header">
            <h1><?php the_title(); ?></h1>
            <p>Полезные статьи о стоматологии и имплантации</p>
        </div>
        
        <div class="blog-grid">
            <?php 
            // Получаем все опубликованные статьи
            $posts = get_posts(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'numberposts' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($posts) : ?>
                <?php foreach ($posts as $post) : 
                    setup_postdata($post); ?>
                    <article class="blog-card">
                        <div class="blog-card-image">
                            <?php if (has_post_thumbnail($post->ID)) : ?>
                                <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-placeholder.jpg" alt="<?php echo get_the_title($post->ID); ?>">
                            <?php endif; ?>
                        </div>
                        
                        <div class="blog-card-content">
                            <div class="blog-card-text">
                                <h2 class="blog-card-title">
                                    <a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                                </h2>
                                
                                <div class="blog-card-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt($post->ID), 20, '...'); ?>
                                </div>
                            </div>
                            
                            <a href="<?php echo get_permalink($post->ID); ?>" class="blog-card-btn">Читать далее</a>
                        </div>
                    </article>
                <?php endforeach; 
                wp_reset_postdata(); ?>
            <?php else : ?>
                <p>Статьи не найдены.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
