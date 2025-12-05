<?php get_header(); ?>

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
            <a href="<?php echo home_url('/blog/'); ?>" itemprop="item">
                <span itemprop="name">Блог</span>
            </a>
        </span>
        <span class="breadcrumbs__separator">/</span>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="3">
            <span itemprop="name"><?php the_title(); ?></span>
        </span>
    </div>
</nav>

<!-- Статья -->
<article class="single-post" itemscope itemtype="https://schema.org/BlogPosting">
    <?php 
    $post_date = get_the_date('c');
    $post_modified = get_the_modified_date('c');
    $post_url = get_permalink();
    ?>
    <meta itemprop="datePublished" content="<?php echo esc_attr($post_date); ?>">
    <meta itemprop="dateModified" content="<?php echo esc_attr($post_modified); ?>">
    <meta itemprop="mainEntityOfPage" itemscope itemtype="https://schema.org/WebPage" itemid="<?php echo esc_url($post_url); ?>">
    <div class="container">
        <div class="single-post__layout">
            <!-- Контент статьи -->
            <div class="col-12 col-lg-8 single-post__content">
                <header class="single-post__header">
                    <h1 itemprop="headline"><?php the_title(); ?></h1>
                </header>
                
                <?php if (has_post_thumbnail()) : ?>
                    <div class="single-post__image">
                        <?php the_post_thumbnail('large', array('class' => 'single-post__img', 'itemprop' => 'image', 'loading' => 'lazy', 'alt' => get_the_title())); ?>
                    </div>
                <?php endif; ?>
                
                <?php if (!is_featured_article()) : ?>
                    <!-- Дисклеймер -->
                    <div class="single-post__disclaimer">
                        <p><strong>Уважаемый пациент!</strong> Клиника «ЦЭСИ» уведомляет Вас, что тщательное соблюдение данных рекомендаций очень важно и является обязательным условием обеспечения высокой вероятности положительного результата проведенного лечения, безопасного пользования результатами оказанной медицинской услуги, отсутствия осложнений.</p>
                    </div>
                    
                    <!-- Бирюзовая полоска -->
                    <div class="single-post__brand-stripe"></div>
                <?php endif; ?>
                
                <div class="single-post__text" itemprop="articleBody">
                    <?php the_content(); ?>
                </div>
                
                <?php 
                // Похожие статьи
                $related_posts = get_post_meta(get_the_ID(), '_related_posts', true);
                if (!empty($related_posts) && is_array($related_posts)) {
                    $related_posts = array_filter(array_map('intval', $related_posts));
                    if (!empty($related_posts)) {
                        $related_query = new WP_Query(array(
                            'post_type' => 'post',
                            'post__in' => $related_posts,
                            'posts_per_page' => 2,
                            'orderby' => 'post__in'
                        ));
                        
                        if ($related_query->have_posts()) : ?>
                            <section class="single-post__related">
                                <h2 class="single-post__related-title">Похожие статьи</h2>
                                <div class="single-post__related-grid">
                                    <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                                        <article class="single-post__related-item" itemscope itemtype="https://schema.org/BlogPosting">
                                            <a href="<?php the_permalink(); ?>" class="single-post__related-link" itemprop="url">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="single-post__related-image">
                                                        <?php the_post_thumbnail('medium', array('class' => 'single-post__related-img', 'itemprop' => 'image', 'loading' => 'lazy', 'alt' => get_the_title())); ?>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="single-post__related-image">
                                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-placeholder.jpg" alt="<?php the_title_attribute(); ?>" class="single-post__related-img" itemprop="image" loading="lazy">
                                                    </div>
                                                <?php endif; ?>
                                                <h3 class="single-post__related-item-title" itemprop="headline"><?php the_title(); ?></h3>
                                            </a>
                                        </article>
                                    <?php endwhile; ?>
                                </div>
                            </section>
                        <?php 
                        wp_reset_postdata();
                        endif;
                    }
                }
                ?>
                
                <footer class="single-post__footer">
                    <a href="<?php echo home_url('/blog/'); ?>" class="single-post__back-link">← Вернуться к блогу</a>
                </footer>
            </div>
            
            <!-- Форма обратной связи -->
            <aside class="sidebar-form">
                <div class="sidebar-form__wrapper">
                    <h3 class="sidebar-form__title">Остались вопросы?</h3>
                    <p class="sidebar-form__description">Запишитесь на консультацию, и мы ответим на все ваши вопросы</p>
                    
                    <div class="sidebar-form__form">
                        <?php echo do_shortcode('[contact-form-7 id="adc9765" title="Заявка вопрос"]'); ?>
                    </div>
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const form = document.querySelector('.sidebar-form__form .wpcf7-form');
                        if (form) {
                            const submitBtn = form.querySelector('.wpcf7-submit');
                            if (submitBtn) {
                                submitBtn.classList.add('form-btn');
                            }
                        }
                    });
                    </script>
                    
                    <label class="form-consent">
                        <input type="checkbox" class="form-consent__checkbox" checked required>
                        <span class="form-consent__text">
                            Нажимая кнопку, вы даете согласие на обработку <span><a href="<?php echo home_url('/privacy.pdf'); ?>" target="_blank" rel="noopener">персональных данных</a></span>
                        </span>
                    </label>
                </div>
            </aside>
        </div>
    </div>
</article>

<?php get_footer(); ?>
