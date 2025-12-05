<?php get_header(); ?>

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
            <h1>Блог</h1>
            <p>Полезные статьи о стоматологии и имплантации</p>
        </div>
        
        <div class="blog-grid">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article class="blog-card">
                        <div class="blog-card-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else : ?>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-placeholder.jpg" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        
                        <div class="blog-card-content">
                            <div class="blog-card-text">
                                <h2 class="blog-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <div class="blog-card-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </div>
                            </div>
                            
                            <a href="<?php the_permalink(); ?>" class="blog-card-btn">Читать далее</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Статьи не найдены.</p>
            <?php endif; ?>
        </div>
        
        <!-- Пагинация -->
        <?php if (get_next_posts_link() || get_previous_posts_link()) : ?>
            <div class="blog-pagination">
                <?php echo get_previous_posts_link('← Предыдущие'); ?>
                <?php echo get_next_posts_link('Следующие →'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>

