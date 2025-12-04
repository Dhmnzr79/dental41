// Маска для телефона
function initPhoneMask() {
    console.log('Phone mask script loaded');
    
    // Функция для применения маски к полю телефона
    function applyPhoneMask(phoneInput) {
        console.log('Applying mask to:', phoneInput);
        
        phoneInput.addEventListener('input', function() {
            let d = this.value.replace(/\D/g,''); // только цифры
            
            // нормализуем старт: 8 → 7, если нет 7 – добавим
            if (d.startsWith('8')) d = '7' + d.slice(1);
            if (!d.startsWith('7')) d = '7' + d;
            
            d = d.slice(0, 11); // максимум 11 цифр (+7XXXXXXXXXX)
            
            let res = '+7 (';
            if (d.length > 1) res += d.slice(1, 4);
            if (d.length >= 4) res += ') ' + d.slice(4, 7);
            if (d.length >= 7) res += '-' + d.slice(7, 9);
            if (d.length >= 9) res += '-' + d.slice(9, 11);
            
            this.value = res;
        });
        
        phoneInput.addEventListener('blur', function() {
            if (this.value.length < 6) this.value = ''; // если ничего толком не ввели – очищаем
        });
    }
    
    // Применяем маску ко всем полям телефона
    const phoneFields = document.querySelectorAll('input[type="tel"], input[name="phone"], #cta-phone');
    console.log('Found phone fields:', phoneFields.length);
    
    phoneFields.forEach(function(phoneField) {
        applyPhoneMask(phoneField);
    });
    
    // Дополнительно проверим CTA форму
    const ctaForm = document.querySelector('.cta-form');
    if (ctaForm) {
        const ctaPhone = ctaForm.querySelector('input[name="phone"]');
        if (ctaPhone) {
            console.log('CTA phone field found');
            applyPhoneMask(ctaPhone);
        } else {
            console.log('CTA phone field not found');
        }
    } else {
        console.log('CTA form not found');
    }
    
    // Проверим по ID
    const ctaPhoneById = document.getElementById('cta-phone');
    if (ctaPhoneById) {
        console.log('CTA phone field found by ID');
        applyPhoneMask(ctaPhoneById);
    } else {
        console.log('CTA phone field not found by ID');
    }
}

// Запускаем инициализацию при загрузке DOM
document.addEventListener('DOMContentLoaded', initPhoneMask);

// Также запускаем при полной загрузке страницы
window.addEventListener('load', initPhoneMask);
