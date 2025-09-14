<?php
/**
 * Cookie Banner для сайта
 * Соответствует требованиям ФЗ-152 и GDPR
 */
?>

<!-- Cookie Banner -->
<div id="cookie-banner" class="cookie-banner" style="display: none;">
    <div class="cookie-banner-content">
        <div class="cookie-banner-text">
            <h3>🍪 Мы используем cookies</h3>
            <p>Наш сайт использует файлы cookies для улучшения работы и анализа посещаемости. Продолжая использовать сайт, вы соглашаетесь с нашей <a href="<?php echo home_url('/politika-konfidentsialnosti/'); ?>" target="_blank">Политикой конфиденциальности</a>.</p>
        </div>
        <div class="cookie-banner-actions">
            <button id="cookie-accept" class="cookie-btn cookie-btn-accept">Принять все</button>
            <button id="cookie-settings" class="cookie-btn cookie-btn-settings">Настройки</button>
            <button id="cookie-reject" class="cookie-btn cookie-btn-reject">Отклонить</button>
        </div>
    </div>
</div>

<!-- Cookie Settings Modal -->
<div id="cookie-settings-modal" class="cookie-modal" style="display: none;">
    <div class="cookie-modal-content">
        <div class="cookie-modal-header">
            <h3>Настройки cookies</h3>
            <button id="cookie-modal-close" class="cookie-modal-close">&times;</button>
        </div>
        <div class="cookie-modal-body">
            <div class="cookie-category">
                <div class="cookie-category-header">
                    <label class="cookie-switch">
                        <input type="checkbox" id="essential-cookies" checked disabled>
                        <span class="cookie-slider"></span>
                    </label>
                    <div class="cookie-category-info">
                        <h4>Необходимые cookies</h4>
                        <p>Эти cookies необходимы для работы сайта и не могут быть отключены.</p>
                    </div>
                </div>
            </div>
            
            <div class="cookie-category">
                <div class="cookie-category-header">
                    <label class="cookie-switch">
                        <input type="checkbox" id="analytics-cookies">
                        <span class="cookie-slider"></span>
                    </label>
                    <div class="cookie-category-info">
                        <h4>Аналитические cookies</h4>
                        <p>Помогают нам понять, как посетители взаимодействуют с сайтом.</p>
                    </div>
                </div>
            </div>
            
            <div class="cookie-category">
                <div class="cookie-category-header">
                    <label class="cookie-switch">
                        <input type="checkbox" id="marketing-cookies">
                        <span class="cookie-slider"></span>
                    </label>
                    <div class="cookie-category-info">
                        <h4>Маркетинговые cookies</h4>
                        <p>Используются для показа релевантной рекламы и отслеживания эффективности кампаний.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="cookie-modal-footer">
            <button id="cookie-save-settings" class="cookie-btn cookie-btn-accept">Сохранить настройки</button>
            <button id="cookie-accept-all" class="cookie-btn cookie-btn-accept">Принять все</button>
        </div>
    </div>
</div>

<style>
/* Cookie Banner Styles */
.cookie-banner {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    background: #fff;
    border-top: 3px solid var(--brand-color);
    box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
    z-index: 10000;
    padding: 20px;
}

.cookie-banner-content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    gap: 20px;
}

.cookie-banner-text h3 {
    margin: 0 0 10px 0;
    color: var(--brand-color);
    font-size: 1.2rem;
}

.cookie-banner-text p {
    margin: 0;
    color: #333;
    line-height: 1.4;
}

.cookie-banner-text a {
    color: var(--brand-color);
    text-decoration: underline;
}

.cookie-banner-actions {
    display: flex;
    gap: 10px;
    flex-shrink: 0;
}

.cookie-btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.cookie-btn-accept {
    background: var(--brand-color);
    color: white;
}

.cookie-btn-accept:hover {
    background: #1ea8b8;
}

.cookie-btn-settings {
    background: #f8f9fa;
    color: #333;
    border: 1px solid #ddd;
}

.cookie-btn-settings:hover {
    background: #e9ecef;
}

.cookie-btn-reject {
    background: #dc3545;
    color: white;
}

.cookie-btn-reject:hover {
    background: #c82333;
}

/* Cookie Modal Styles */
.cookie-modal {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.5);
    z-index: 10001;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.cookie-modal-content {
    background: white;
    border-radius: 10px;
    max-width: 600px;
    width: 100%;
    max-height: 80vh;
    overflow-y: auto;
}

.cookie-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    border-bottom: 1px solid #eee;
}

.cookie-modal-header h3 {
    margin: 0;
    color: var(--brand-color);
}

.cookie-modal-close {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #999;
}

.cookie-modal-body {
    padding: 20px;
}

.cookie-category {
    margin-bottom: 20px;
    padding: 15px;
    border: 1px solid #eee;
    border-radius: 8px;
}

.cookie-category-header {
    display: flex;
    align-items: flex-start;
    gap: 15px;
}

.cookie-switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
    flex-shrink: 0;
}

.cookie-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.cookie-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 24px;
}

.cookie-slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .cookie-slider {
    background-color: var(--brand-color);
}

input:checked + .cookie-slider:before {
    transform: translateX(26px);
}

input:disabled + .cookie-slider {
    background-color: #999;
    cursor: not-allowed;
}

.cookie-category-info h4 {
    margin: 0 0 5px 0;
    color: #333;
}

.cookie-category-info p {
    margin: 0;
    color: #666;
    font-size: 14px;
    line-height: 1.4;
}

.cookie-modal-footer {
    padding: 20px;
    border-top: 1px solid #eee;
    display: flex;
    gap: 10px;
    justify-content: flex-end;
}

/* Mobile Styles */
@media (max-width: 767px) {
    .cookie-banner-content {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .cookie-banner-actions {
        width: 100%;
        justify-content: center;
    }
    
    .cookie-btn {
        flex: 1;
        min-width: 100px;
    }
    
    .cookie-modal-content {
        margin: 10px;
        max-height: 90vh;
    }
    
    .cookie-category-header {
        flex-direction: column;
        gap: 10px;
    }
    
    .cookie-switch {
        align-self: flex-start;
    }
    
    .cookie-modal-footer {
        flex-direction: column;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Проверяем, есть ли уже согласие на cookies
    if (!localStorage.getItem('cookieConsent')) {
        showCookieBanner();
    }
    
    // Обработчики кнопок
    document.getElementById('cookie-accept')?.addEventListener('click', function() {
        acceptAllCookies();
    });
    
    document.getElementById('cookie-reject')?.addEventListener('click', function() {
        rejectAllCookies();
    });
    
    document.getElementById('cookie-settings')?.addEventListener('click', function() {
        showCookieSettings();
    });
    
    document.getElementById('cookie-modal-close')?.addEventListener('click', function() {
        hideCookieSettings();
    });
    
    document.getElementById('cookie-save-settings')?.addEventListener('click', function() {
        saveCookieSettings();
    });
    
    document.getElementById('cookie-accept-all')?.addEventListener('click', function() {
        acceptAllCookies();
    });
    
    // Функции
    function showCookieBanner() {
        document.getElementById('cookie-banner').style.display = 'block';
    }
    
    function hideCookieBanner() {
        document.getElementById('cookie-banner').style.display = 'none';
    }
    
    function showCookieSettings() {
        document.getElementById('cookie-settings-modal').style.display = 'flex';
    }
    
    function hideCookieSettings() {
        document.getElementById('cookie-settings-modal').style.display = 'none';
    }
    
    function acceptAllCookies() {
        const consent = {
            essential: true,
            analytics: true,
            marketing: true,
            timestamp: new Date().toISOString()
        };
        localStorage.setItem('cookieConsent', JSON.stringify(consent));
        hideCookieBanner();
        hideCookieSettings();
        loadAnalytics();
    }
    
    function rejectAllCookies() {
        const consent = {
            essential: true,
            analytics: false,
            marketing: false,
            timestamp: new Date().toISOString()
        };
        localStorage.setItem('cookieConsent', JSON.stringify(consent));
        hideCookieBanner();
        hideCookieSettings();
    }
    
    function saveCookieSettings() {
        const consent = {
            essential: true,
            analytics: document.getElementById('analytics-cookies').checked,
            marketing: document.getElementById('marketing-cookies').checked,
            timestamp: new Date().toISOString()
        };
        localStorage.setItem('cookieConsent', JSON.stringify(consent));
        hideCookieBanner();
        hideCookieSettings();
        
        if (consent.analytics) {
            loadAnalytics();
        }
    }
    
    function loadAnalytics() {
        // Здесь можно загрузить Google Analytics или другие аналитические скрипты
        console.log('Analytics loaded');
    }
    
    // Загружаем аналитику если уже есть согласие
    const existingConsent = localStorage.getItem('cookieConsent');
    if (existingConsent) {
        const consent = JSON.parse(existingConsent);
        if (consent.analytics) {
            loadAnalytics();
        }
    }
});
</script>
