<footer class="v2-footer" itemscope itemtype="https://schema.org/MedicalBusiness">
    <div class="v2-container">
        <div class="v2-row v2-footer__content">
            <div class="v2-col-sm-12 v2-col-lg-6 v2-footer__section">
                <div class="v2-footer__logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="ЦЭСИ" class="v2-footer__logo-img" itemprop="logo">
                </div>
                <p class="v2-footer__name" itemprop="name">Центр Эстетической стоматологии и имплантации</p>
            </div>

            <div class="v2-col-sm-12 v2-col-lg-6 v2-footer__section v2-footer__contacts">
                <h3 class="v2-footer__contacts-title">Контакты</h3>
                <ul class="v2-footer__contacts-list" itemscope itemprop="address" itemtype="https://schema.org/PostalAddress">
                    <li class="v2-footer__contacts-item" itemprop="streetAddress">г. Елизово, ул. Ленина 15-а</li>
                    <li class="v2-footer__contacts-item">
                        <a href="tel:+74152500129" class="v2-footer__contacts-link" itemprop="telephone">+7(4152) 50-01-29</a>
                    </li>
                    <li class="v2-footer__contacts-item">
                        <meta itemprop="openingHours" content="Mo-Fr 08:00-20:00">
                        Пн-Пт: 8:00 - 20:00
                    </li>
                    <li class="v2-footer__contacts-item">
                        <meta itemprop="openingHours" content="Sa 08:00-14:00">
                        Сб: 8:00 – 14:00
                    </li>
                </ul>
            </div>
        </div>

        <div class="v2-row v2-footer__bottom">
            <div class="v2-col-sm-12 v2-col-lg-8 v2-footer__legal">
                <p class="v2-footer__legal-text">ООО «Дента» ИНН 4105000950 КПП 410501001 ОГРН 1024101222408</p>
                <p class="v2-footer__legal-text">Имеются противопоказания. Необходима консультация специалиста</p>
            </div>
            <div class="v2-col-sm-12 v2-col-lg-4 v2-footer__links">
                <a href="<?php echo home_url('/privacy.pdf'); ?>" target="_blank" rel="noopener" class="v2-footer__link">Политика конфиденциальности</a>
                <a href="#" onclick="showCookieSettings(); return false;" class="v2-footer__link">Настройки cookies</a>
            </div>
        </div>

        <div class="v2-row v2-footer__recaptcha">
            <div class="v2-col-sm-12 v2-col-lg-12">
                <div class="v2-footer__recaptcha-notice">
                    <p class="v2-footer__recaptcha-text">
                        This site is protected by reCAPTCHA and the Google
                        <a href="https://policies.google.com/privacy" target="_blank" rel="noopener" class="v2-footer__recaptcha-link">Privacy Policy</a>
                        and
                        <a href="https://policies.google.com/terms" target="_blank" rel="noopener" class="v2-footer__recaptcha-link">Terms of Service</a>
                        apply.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php 
include get_stylesheet_directory() . '/popup.php'; 
// include 'cookie-banner.php'; 
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

</body>
</html>

