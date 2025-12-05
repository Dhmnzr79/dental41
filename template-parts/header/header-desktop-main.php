<?php
/**
 * Desktop Header - Main Variant
 * Используется на главной странице и странице имплантации
 * Сетка 209 (6/6, 50/50), правая колонка с бирюзовым фоном
 */
?>
<div class="header__content header__content--brand">
    <div class="container">
        <div class="row header__top">
            <div class="col-sm-12 col-lg-6 header__left">
                <div class="header__branding-wrapper">
                    <?php get_template_part('template-parts/header/blocks/branding'); ?>
                </div>
                <?php get_template_part('template-parts/header/blocks/menu'); ?>
            </div>
            <div class="col-sm-12 col-lg-6 header__right header__right--brand">
                <?php get_template_part('template-parts/header/blocks/contacts'); ?>
                <button type="button" class="header__cta-btn" onclick="openPopup()">
                    Заказать звонок
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/arrow-phone.svg" alt="" class="header__cta-icon" aria-hidden="true">
                </button>
            </div>
        </div>
    </div>
</div>

