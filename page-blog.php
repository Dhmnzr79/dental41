<?php
/**
 * Template Name: Блог
 * 
 * Шаблон страницы для отображения блога (V2)
 */

get_header('v2'); ?>

<!-- Хлебные крошки -->
<nav class="v2-breadcrumbs" aria-label="Хлебные крошки" itemscope itemtype="https://schema.org/BreadcrumbList">
    <div class="v2-container">
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="1">
            <a href="<?php echo home_url(); ?>" itemprop="item">
                <span itemprop="name">Главная</span>
            </a>
        </span>
        <span class="v2-breadcrumbs__separator">/</span>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="2">
            <span itemprop="name">Блог</span>
        </span>
    </div>
</nav>

<!-- Блог секция -->
<section class="v2-blog">
    <div class="v2-container">
        <header class="v2-blog__header">
            <h1><?php the_title(); ?></h1>
            <p>Полезные статьи о стоматологии и имплантации</p>
        </header>
        
        <div class="v2-blog__grid">
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
                    <article class="v2-blog-card" itemscope itemtype="https://schema.org/BlogPosting">
                        <div class="v2-blog-card__image">
                            <?php if (has_post_thumbnail($post->ID)) : ?>
                                <?php echo get_the_post_thumbnail($post->ID, 'medium', array('class' => 'v2-blog-card__img', 'itemprop' => 'image', 'loading' => 'lazy')); ?>
                            <?php else : ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-placeholder.jpg" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" class="v2-blog-card__img" itemprop="image" loading="lazy">
                            <?php endif; ?>
                        </div>
                        
                        <div class="v2-blog-card__content">
                            <div class="v2-blog-card__text">
                                <h2 class="v2-blog-card__title">
                                    <a href="<?php echo get_permalink($post->ID); ?>" itemprop="url">
                                        <span itemprop="headline"><?php echo get_the_title($post->ID); ?></span>
                                    </a>
                                </h2>
                                
                                <div class="v2-blog-card__excerpt" itemprop="description">
                                    <?php echo wp_trim_words(get_the_excerpt($post->ID), 20, '...'); ?>
                                </div>
                            </div>
                            
                            <a href="<?php echo get_permalink($post->ID); ?>" class="v2-blog-card__btn" aria-label="Читать статью: <?php echo esc_attr(get_the_title($post->ID)); ?>">Читать далее</a>
                        </div>
                    </article>
                <?php endforeach; 
                wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="v2-col-12">
                    <p>Статьи не найдены.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer('v2'); ?>
