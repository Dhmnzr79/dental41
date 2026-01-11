<?php
/**
 * 404 Error Page Template
 * Страница ошибки 404 - страница не найдена
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
            <span itemprop="name">Страница не найдена</span>
        </span>
    </div>
</nav>

<!-- 404 Error Section -->
<section class="section error-404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="error-404__content">
                    <h1 class="error-404__title">404</h1>
                    <h2 class="error-404__subtitle">Страница не найдена</h2>
                    <p class="error-404__description">
                        К сожалению, запрашиваемая страница не существует или была перемещена. 
                        Возможно, вы ввели неправильный адрес или перешли по устаревшей ссылке.
                    </p>
                    
                    <div class="error-404__actions">
                        <a href="<?php echo home_url(); ?>" class="btn btn--primary">
                            На главную
                        </a>
                        <a href="<?php echo home_url('/implantatsiya'); ?>" class="btn btn--primary">
                            Имплантация
                        </a>
                        <a href="<?php echo get_post_type_archive_link('doctor'); ?>" class="btn btn--primary">
                            Врачи
                        </a>
                        <?php
                        // Получаем страницу контактов
                        $contacts_page = get_page_by_path('kontakty');
                        if (!$contacts_page) {
                            $contacts_page = get_page_by_path('contacts');
                        }
                        if ($contacts_page) {
                            $contacts_url = get_permalink($contacts_page->ID);
                        } else {
                            $contacts_url = home_url('/kontakty');
                        }
                        ?>
                        <a href="<?php echo esc_url($contacts_url); ?>" class="btn btn--primary">
                            Контакты
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>

