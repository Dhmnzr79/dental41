<?php
/**
 * Template Name: Информация о клинике v2
 * Страницы: О организации, Реквизиты, Лицензии, Юридическая информация
 */
get_header('v2'); 
?>

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
            <a href="<?php echo home_url('/o-klinike'); ?>" itemprop="item">
                <span itemprop="name">О клинике</span>
            </a>
        </span>
        <span class="v2-breadcrumbs__separator">/</span>
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <meta itemprop="position" content="3">
            <span itemprop="name"><?php the_title(); ?></span>
        </span>
    </div>
</nav>

<!-- Основной контент -->
<main class="v2-section v2-clinic-info">
    <div class="v2-container">
        <div class="v2-row">
            <!-- Левая колонка с контентом -->
            <div class="v2-col-sm-12 v2-col-lg-8">
                <article class="v2-clinic-info__content" itemscope itemtype="https://schema.org/Article">
                    <header class="v2-clinic-info__header">
                        <h1 class="v2-clinic-info__title" itemprop="headline"><?php the_title(); ?></h1>
                    </header>
                    
                    <div class="v2-clinic-info__text" itemprop="articleBody">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
                </article>
            </div>
            
            <!-- Форма обратной связи -->
            <aside class="v2-col-sm-12 v2-col-lg-4">
                <div class="v2-sidebar-form">
                    <div class="v2-sidebar-form__wrapper">
                        <h3 class="v2-sidebar-form__title">Остались вопросы?</h3>
                        <p class="v2-sidebar-form__description">Запишитесь на консультацию, и мы ответим на все ваши вопросы</p>
                        
                        <div class="v2-sidebar-form__form">
                            <?php echo do_shortcode('[contact-form-7 id="adc9765" title="Заявка вопрос"]'); ?>
                        </div>
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const form = document.querySelector('.v2-sidebar-form__form .wpcf7-form');
                            if (form) {
                                const submitBtn = form.querySelector('.wpcf7-submit');
                                if (submitBtn) {
                                    submitBtn.classList.add('v2-form-btn');
                                }
                            }
                        });
                        </script>
                        
                        <label class="v2-form-consent">
                            <input type="checkbox" class="v2-form-consent__checkbox" checked required>
                            <span class="v2-form-consent__text">
                                Нажимая кнопку, вы даете согласие на обработку <span><a href="<?php echo home_url('/privacy.pdf'); ?>" target="_blank" rel="noopener">персональных данных</a></span>
                            </span>
                        </label>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php get_footer('v2'); ?>
