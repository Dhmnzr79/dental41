<?php
/**
 * Desktop Header - Default Variant
 * Используется на всех остальных страницах
 * Сетка 8/4 (левая колонка шире)
 */
?>
<div class="header__content header__content--default">
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
                </button>
            </div>
        </div>
    </div>
</div>






