<?php
/**
 * Template Name: Контакты
 * 
 * Шаблон страницы контактов
 */

get_header(); ?>

<!-- Хлебные крошки -->
<div class="breadcrumbs">
    <div class="container">
        <a href="<?php echo home_url(); ?>">Главная</a>
        <span class="separator">/</span>
        <span>Контакты</span>
    </div>
</div>


<!-- Блок контактов -->
<section class="contacts-section">
    <div class="contacts-container grid-system">
        <div class="contacts-info grid-6">
            <h2>
                Найти нас легко
            </h2>
            
            <div class="contacts-details">
                <div class="contact-item">
                    <div class="contact-icon">
                        📍
                    </div>
                    <div class="contact-text">
                        г. Елизово, ул. Ленина 15-а
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        🕒
                    </div>
                    <div class="contact-text">
                        Пн-Пт: 8:00 - 20:00, Сб 8:00 – 14:00
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        📞
                    </div>
                    <div class="contact-text">
                        +7(4152) 21-55-82
                    </div>
                </div>
                
                <div class="contact-item">
                    <div class="contact-icon">
                        📞
                    </div>
                    <div class="contact-text">
                        +7(908) 495-24-24
                    </div>
                </div>
            </div>
            
            <div class="contacts-description">
                <p>Мы расположены в современном бизнес-центре с охраняемой парковкой. В клинике действует IP телефония, не одно обращение не останется без внимания.</p>
            </div>
            
            <div class="contacts-button">
                <button class="btn-1">ЗАКАЗАТЬ ОБРАТНЫЙ ЗВОНОК</button>
            </div>
        </div>
        
        <div class="contacts-photo grid-6">
            <div class="building-photo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map-pin.jpg" alt="Карта" class="building-placeholder">
            </div>
        </div>
    </div>
</section>

<!-- Яндекс карта на всю ширину -->
<section class="yandex-map-section">
    <div class="map-container-full">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aef5b352e1ed87e09c6a8ebff9278e02db5e2a26a9372aa3e5f7c866fa9fb2287&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
</section>

<div id="mapModal" class="map-modal">
    <div class="map-modal-content">
        <span class="map-modal-close">&times;</span>
        <div class="map-container">
            <div id="yandexMap" style="width: 100%; height: 400px;"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
