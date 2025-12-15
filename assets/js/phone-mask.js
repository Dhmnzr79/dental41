// Маска для телефона во всех формах
(function() {
    'use strict';
    
    // Функция для применения маски к полю телефона
    function applyPhoneMask(phoneInput) {
        if (!phoneInput || phoneInput.dataset.maskApplied) {
            return; // Уже применена маска или элемент не найден
        }
        
        phoneInput.dataset.maskApplied = 'true';
        
        phoneInput.addEventListener('input', function() {
            let d = this.value.replace(/\D/g, ''); // только цифры
            
            // нормализуем старт: 8 → 7, если нет 7 – добавим
            if (d.startsWith('8')) {
                d = '7' + d.slice(1);
            }
            if (!d.startsWith('7') && d.length > 0) {
                d = '7' + d;
            }
            
            d = d.slice(0, 11); // максимум 11 цифр (+7XXXXXXXXXX)
            
            let res = '+7';
            if (d.length > 1) {
                res += ' (' + d.slice(1, 4);
            }
            if (d.length >= 4) {
                res += ') ' + d.slice(4, 7);
            }
            if (d.length >= 7) {
                res += '-' + d.slice(7, 9);
            }
            if (d.length >= 9) {
                res += '-' + d.slice(9, 11);
            }
            
            this.value = res;
        });
        
        phoneInput.addEventListener('blur', function() {
            if (this.value.length < 6) {
                this.value = ''; // если ничего толком не ввели – очищаем
            }
        });
    }
    
    // Функция инициализации маски
    function initPhoneMask() {
        // Ищем все поля телефона
        const phoneFields = document.querySelectorAll('input[type="tel"], input[name="phone"], input[name="tel"], input[name="telephone"]');
        
        phoneFields.forEach(function(phoneField) {
            applyPhoneMask(phoneField);
        });
    }
    
    // Применяем маску при загрузке DOM
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initPhoneMask);
    } else {
        initPhoneMask();
    }
    
    // Также применяем при полной загрузке страницы
    window.addEventListener('load', initPhoneMask);
    
    // Для форм Contact Form 7, которые загружаются динамически
    // Используем MutationObserver для отслеживания новых форм
    if (typeof MutationObserver !== 'undefined') {
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                mutation.addedNodes.forEach(function(node) {
                    if (node.nodeType === 1) { // Element node
                        // Проверяем, является ли добавленный узел полем телефона
                        if (node.tagName === 'INPUT' && (node.type === 'tel' || node.name === 'phone' || node.name === 'tel' || node.name === 'telephone')) {
                            applyPhoneMask(node);
                        }
                        // Ищем поля телефона внутри добавленного элемента
                        const phoneInputs = node.querySelectorAll ? node.querySelectorAll('input[type="tel"], input[name="phone"], input[name="tel"], input[name="telephone"]') : [];
                        phoneInputs.forEach(function(phoneInput) {
                            applyPhoneMask(phoneInput);
                        });
                    }
                });
            });
        });
        
        // Наблюдаем за изменениями в body
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }
    
    // Также перехватываем события Contact Form 7
    if (typeof jQuery !== 'undefined') {
        jQuery(document).on('wpcf7mailsent wpcf7invalid wpcf7spam wpcf7mailfailed wpcf7submit', function() {
            setTimeout(initPhoneMask, 100);
        });
    }
    
    // Дополнительная проверка через небольшую задержку для динамически загруженных форм
    setTimeout(initPhoneMask, 500);
    setTimeout(initPhoneMask, 1000);
    setTimeout(initPhoneMask, 2000);
})();

