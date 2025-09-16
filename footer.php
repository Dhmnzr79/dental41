<footer class="site-footer">
    <div class="footer-content">
        <!-- Информация о клинике -->
        <div class="footer-section">
            <div class="footer-logo">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/svg/logo.svg" alt="ЦЭСИ" class="footer-logo-img">
            </div>
            <p>Центр Эстетической стоматологии и имплантации</p>
        </div>
        
        <!-- Контакты -->
        <div class="footer-section footer-contacts">
            <h3>Контакты</h3>
            <ul>
                <li>г. Елизово, ул. Ленина 15-а</li>
                <li><a href="tel:+74152500129">+7(4152) 50-01-29</a></li>
                <li>Пн-Пт: 8:00 - 20:00</li>
                <li>Сб: 8:00 – 14:00</li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="footer-legal">
            <p>ООО «Дента» ИНН 4105000950 КПП 410501001 ОГРН 1024101222408</p>
            <p>Имеются противопоказания. Необходима консультация специалиста</p>
        </div>
        <a href="<?php echo home_url('/privacy.pdf'); ?>" target="_blank" rel="noopener" class="privacy-link">Политика конфиденциальности</a>
        <a href="#" onclick="showCookieSettings(); return false;" class="privacy-link">Настройки cookies</a>
        
        <!-- Обязательный текст для reCAPTCHA v3 (скрытый badge) -->
        <p class="recaptcha-notice" style="font-size: 12px; color: #666; margin: 10px 0 0 0;">
            This site is protected by reCAPTCHA and the Google
            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Privacy Policy</a>
            and
            <a href="https://policies.google.com/terms" target="_blank" rel="noopener">Terms of Service</a>
            apply.
        </p>
    </div>
</footer>

<?php wp_footer(); ?>

<?php include 'cookie-banner.php'; ?>

</body>
</html>



















