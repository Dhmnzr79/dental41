<footer class="footer" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="container">
        <div class="row footer__content">
            <div class="col-sm-12 col-lg-6 footer__section">
                <div class="footer__logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="ЦЭСИ" class="footer__logo-img" itemprop="logo">
                </div>
                <p class="footer__name" itemprop="name">Центр Эстетической стоматологии и имплантации</p>
            </div>

            <div class="col-sm-12 col-lg-6 footer__section footer__contacts">
                <h3 class="footer__contacts-title">Контакты</h3>
                <ul class="footer__contacts-list" itemscope itemprop="address" itemtype="https://schema.org/PostalAddress">
                    <li class="footer__contacts-item" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</li>
                    <li class="footer__contacts-item">
                        <a href="tel:+74152500129" class="footer__contacts-link" itemprop="telephone">+7(4152) 50-01-29</a>
                    </li>
                    <li class="footer__contacts-item">
                        <meta itemprop="openingHours" content="Mo-Fr 08:00-20:00">
                        Пн-Пт: 8:00 - 20:00
                    </li>
                    <li class="footer__contacts-item">
                        <meta itemprop="openingHours" content="Sa 08:00-14:00">
                        Сб: 8:00 – 14:00
                    </li>
                </ul>
            </div>
        </div>

        <div class="row footer__bottom">
            <div class="col-sm-12 col-lg-8 footer__legal">
                <p class="footer__legal-text">ООО «Дента» ИНН 4105000950 КПП 410501001 ОГРН 1024101222408</p>
                <p class="footer__legal-text">Имеются противопоказания. Необходима консультация специалиста</p>
            </div>
            <div class="col-sm-12 col-lg-4 footer__links">
                <a href="<?php echo home_url('/privacy.pdf'); ?>" target="_blank" rel="noopener" class="footer__link">Политика конфиденциальности</a>
                <a href="#" onclick="showCookieSettings(); return false;" class="footer__link">Настройки cookies</a>
            </div>
        </div>
    </div>
</footer>

<?php 
include get_stylesheet_directory() . '/popup.php'; 
include get_stylesheet_directory() . '/cookie-banner.php'; 
?>


<?php wp_footer(); ?>

<script>
// Переопределение стандартных сообщений валидации HTML5 на русский
(function() {
    'use strict';
    
    function setupRussianValidation() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(function(form) {
            const inputs = form.querySelectorAll('input, textarea, select');
            
            inputs.forEach(function(input) {
                // Устанавливаем title для русских сообщений
                if (input.hasAttribute('required')) {
                    input.setAttribute('title', 'Пожалуйста, заполните это поле');
                }
                
                // Переопределяем сообщения при валидации
                input.addEventListener('invalid', function(e) {
                    const field = e.target;
                    
                    if (field.validity.valueMissing) {
                        field.setCustomValidity('Пожалуйста, заполните это поле');
                    } else if (field.validity.typeMismatch) {
                        if (field.type === 'email') {
                            field.setCustomValidity('Пожалуйста, введите корректный email адрес');
                        } else if (field.type === 'tel') {
                            field.setCustomValidity('Пожалуйста, введите корректный номер телефона');
                        } else {
                            field.setCustomValidity('Пожалуйста, введите корректное значение');
                        }
                    } else {
                        field.setCustomValidity('Пожалуйста, заполните это поле');
                    }
                });
                
                // Сбрасываем сообщение при вводе
                input.addEventListener('input', function() {
                    if (this.validity.valid) {
                        this.setCustomValidity('');
                    }
                });
            });
        });
    }
    
    // Применяем при загрузке DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupRussianValidation);
    } else {
        setupRussianValidation();
    }
    
    // Также применяем для форм, загруженных через CF7
    setTimeout(setupRussianValidation, 1000);
    
    // Перехватываем события загрузки форм CF7
    if (typeof jQuery !== 'undefined') {
        jQuery(document).on('wpcf7mailsent', setupRussianValidation);
    }
})();
</script>

<script>
/**
 * 3️⃣ Time-based защита от спама
 * Фиксирует момент появления формы для проверки скорости заполнения
 */
(function() {
    'use strict';
    
    function setFormLoadedTime() {
        const timeFields = document.querySelectorAll('input[name="form_loaded_time"]');
        const timestamp = Date.now();
        
        timeFields.forEach(function(field) {
            if (!field.value) {
                field.value = timestamp;
            }
        });
    }
    
    // При загрузке DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setFormLoadedTime);
    } else {
        setFormLoadedTime();
    }
    
    // Для динамически загруженных форм CF7
    if (typeof jQuery !== 'undefined') {
        jQuery(document).on('wpcf7formcreated', function(event) {
            const form = event.detail ? event.detail.container : jQuery(event.target);
            const timeField = form.find('input[name="form_loaded_time"]');
            if (timeField.length && !timeField.val()) {
                timeField.val(Date.now());
            }
        });
        
        // Также для стандартных событий CF7
        jQuery(document).on('DOMContentLoaded', setFormLoadedTime);
    }
    
    // Дополнительная проверка через небольшую задержку для динамических форм
    setTimeout(setFormLoadedTime, 500);
    setTimeout(setFormLoadedTime, 1000);
})();
</script>

</body>
</html>


