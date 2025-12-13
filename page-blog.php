<?php
/**
 * Template Name: Блог
 * 
 * Шаблон страницы для отображения блога (V2)
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
            <span itemprop="name">Блог</span>
        </span>
    </div>
</nav>

<!-- Блог секция -->
<section class="blog">
    <div class="container">
        <header class="blog__header">
            <h1>Рассказываем просто о сложном<br>в стоматологии</h1>
        </header>
        
        <div class="blog__grid">
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
                    <article class="blog-card" itemscope itemtype="https://schema.org/BlogPosting">
                        <div class="blog-card__image">
                            <?php if (has_post_thumbnail($post->ID)) : ?>
                                <?php echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'blog-card__img', 'itemprop' => 'image', 'loading' => 'lazy')); ?>
                            <?php else : ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-placeholder.jpg" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" class="blog-card__img" itemprop="image" loading="lazy">
                            <?php endif; ?>
                        </div>
                        
                        <div class="blog-card__content">
                            <div class="blog-card__text">
                                <h2 class="blog-card__title">
                                    <a href="<?php echo get_permalink($post->ID); ?>" itemprop="url">
                                        <span itemprop="headline"><?php echo get_the_title($post->ID); ?></span>
                                    </a>
                                </h2>
                                
                                <div class="blog-card__excerpt" itemprop="description">
                                    <?php echo wp_trim_words(get_the_excerpt($post->ID), 20, '...'); ?>
                                </div>
                            </div>
                            
                            <a href="<?php echo get_permalink($post->ID); ?>" class="blog-card__btn link-underline" aria-label="Читать статью: <?php echo esc_attr(get_the_title($post->ID)); ?>">Читать далее</a>
                        </div>
                    </article>
                <?php endforeach; 
                wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="col-12">
                    <p>Статьи не найдены.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
