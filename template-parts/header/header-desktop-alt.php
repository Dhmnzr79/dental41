<?php
/**
 * Desktop Header - Alternative Variant
 * Используется на остальных страницах (кроме главной и имплантации)
 * Вторая версия десктопной шапки
 */
?>
<div class="header__content header__content--alt">
    <div class="container">
        <div class="row header__top">
            <div class="col-sm-12 col-lg-8 header__left">
                <?php get_template_part('template-parts/header/blocks/branding'); ?>
            </div>
            <div class="col-sm-12 col-lg-4 header__right">
                <?php get_template_part('template-parts/header/blocks/contacts'); ?>
            </div>
        </div>
        <div class="row header__bottom">
            <div class="col-sm-12 col-lg-10 header__menu-col">
                <?php get_template_part('template-parts/header/blocks/menu'); ?>
            </div>
            <div class="col-sm-12 col-lg-2 header__button-col">
                <button type="button" class="header__cta-btn" onclick="openPopup()">
                    Заказать звонок
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/arrow-phone.svg" alt="" class="header__cta-icon" aria-hidden="true">
                </button>
            </div>
        </div>
    </div>
</div>


