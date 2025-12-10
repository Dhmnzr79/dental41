<?php
/**
 * Header Branding Block
 * Логотип и информация о клинике
 */
?>
<a class="header__brand" href="<?php echo home_url(); ?>" itemprop="url">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="Логотип ЦЭСИ" class="header__brand-img" itemprop="logo">
</a>
<div class="header__info" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
    <div class="header__name" itemprop="name">Центр эстетической стоматологии и имплантации</div>
    <div class="header__address" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</div>
</div>






