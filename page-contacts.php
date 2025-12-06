<?php
/**
 * Template Name: Контакты
 * Страница контактов клиники
 */
get_header(); 
?>

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
            <span itemprop="name"><?php the_title(); ?></span>
        </span>
    </div>
</nav>

<!-- Блок контактов -->
<section class="section contacts" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="contacts__info">
                    <h2>Найти нас легко</h2>
                    
                    <div class="contacts__details" itemscope itemprop="address" itemtype="https://schema.org/PostalAddress">
                        <div class="contacts__item">
                            <div class="contacts__icon" aria-hidden="true">📍</div>
                            <div class="contacts__text" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</div>
                        </div>
                        
                        <div class="contacts__item">
                            <div class="contacts__icon" aria-hidden="true">🕒</div>
                            <div class="contacts__text">
                                <meta itemprop="openingHours" content="Mo-Fr 08:00-20:00">
                                <meta itemprop="openingHours" content="Sa 08:00-14:00">
                                Пн-Пт: 8:00 - 20:00, Сб 8:00 – 14:00
                            </div>
                        </div>
                        
                        <div class="contacts__item">
                            <div class="contacts__icon" aria-hidden="true">📞</div>
                            <div class="contacts__text">
                                <a href="tel:+74152500129" itemprop="telephone">+7(4152) 50-01-29</a>
                            </div>
                        </div>
                    </div>
                    
                    <p class="contacts__description">Мы расположены в современном бизнес-центре с охраняемой парковкой. В клинике действует IP телефония, не одно обращение не останется без внимания.</p>
                    
                    <button class="btn btn--primary" onclick="openPopup()" aria-label="Заказать обратный звонок">Заказать обратный звонок</button>
                </div>
            </div>
            
            <div class="col-sm-12 col-lg-6">
                <div class="contacts__photo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map-pin.jpg" alt="Здание клиники" class="contacts__image" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>


