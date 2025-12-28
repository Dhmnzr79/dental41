<?php
/**
 * Template Name: Спасибо за заявку v2
 * Страница благодарности после отправки формы
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Спасибо за заявку</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Основной контент -->
<section class="thank-you">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 thank-you__wrapper">
                <div class="thank-you__content">
                    <div class="thank-you__icon">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="var(--primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    
                    <h1 class="thank-you__title">Спасибо за заявку!</h1>
                    
                    <div class="thank-you__info">
                   
                        <ul class="thank-you__info-list">
                            <li class="thank-you__info-item">Наш менеджер перезвонит вам в ближайшее время</li>
                            <li class="thank-you__info-item">Мы разберем вашу ситуацию и подберем подходящие варианты</li>
                            <li class="thank-you__info-item">Запишем вас на консультацию, если захотите</li>
                        </ul>
                    </div>
                    
                    <a href="<?php echo home_url(); ?>" class="btn btn--primary">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php wp_footer(); ?>
</body>
</html>

