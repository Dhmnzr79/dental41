/**
 * Управление попапами для стоматологической клиники
 */

// Глобальные переменные
let currentPopup = null;
let isClosing = false;

/**
 * Открытие попапа
 * @param {string} popupId - ID попапа для открытия
 */
function openPopup(popupId = 'popup-1') {
    if (isClosing) return;

    const popup = document.getElementById(popupId);
    if (!popup) {
        console.error('Popup not found:', popupId);
        return;
    }

    currentPopup = popup;

    // Блокируем скролл
    document.body.classList.add('v2-popup-open');

    // Показываем попап
    popup.classList.add('show');

    // Фокус на первое поле
    setTimeout(() => {
        const firstField = popup.querySelector('input');
        if (firstField) firstField.focus();
    }, 300);

    // Обработчики событий
    setupPopupEvents(popup);
}

/**
 * Закрытие попапа
 */
function closePopup() {
    if (!currentPopup || isClosing) return;

    isClosing = true;

    // Анимация закрытия
    currentPopup.classList.add('closing');

    setTimeout(() => {
        currentPopup.classList.remove('show', 'closing');
        document.body.classList.remove('v2-popup-open');
        currentPopup = null;
        isClosing = false;
    }, 280);
}

// Экспортируем функции в window сразу после определения
window.openPopup = openPopup;
window.closePopup = closePopup;

/**
 * Настройка обработчиков событий для попапа
 * @param {HTMLElement} popup - Элемент попапа
 */
function setupPopupEvents(popup) {
    // Закрытие по клику на overlay
    const overlay = popup.querySelector('.v2-popup__overlay');
    if (overlay) {
        overlay.addEventListener('click', () => {
            closePopup();
        });
    }

    // Закрытие по Escape
    document.addEventListener('keydown', handleEscape);

    // Закрытие по клику на кнопку закрытия
    const closeBtn = popup.querySelector('.v2-popup__close');
    if (closeBtn) {
        closeBtn.addEventListener('click', closePopup);
    }

    // Обработка табов (для мобильной версии)
    setupTabs(popup);
}

/**
 * Обработка нажатия Escape
 * @param {KeyboardEvent} e - Событие клавиатуры
 */
function handleEscape(e) {
    if (e.key === 'Escape' && currentPopup) {
        closePopup();
    }
}

// Удалено: перехват и самописная отправка формы

/**
 * Валидация формы
 * @param {FormData} formData - Данные формы
 * @returns {boolean} - Результат валидации
 */
function validateForm(formData) {
    const name = formData.get('name');
    const phone = formData.get('phone');

    // Проверка имени
    if (!name || name.trim().length < 2) {
        showError('Введите корректное имя');
        return false;
    }

    // Проверка телефона
    const phoneRegex = /^\+7\s?\(?(\d{3})\)?\s?(\d{3})-?(\d{2})-?(\d{2})$/;
    if (!phone || !phoneRegex.test(phone.replace(/\s/g, ''))) {
        showError('Введите корректный номер телефона');
        return false;
    }

    return true;
}

// Удалено: самописная AJAX-отправка. CF7 обрабатывает сабмит самостоятельно.

/**
 * Показать ошибку
 * @param {string} message - Сообщение об ошибке
 */
function showError(message) {
    // Удаляем предыдущие ошибки
    const existingError = currentPopup.querySelector('.popup-error');
    if (existingError) {
        existingError.remove();
    }

    // Создаем элемент ошибки
    const error = document.createElement('div');
    error.className = 'popup-error';
    error.textContent = message;
    error.style.cssText = `
        color: #dc2626;
        font-size: 14px;
        margin-top: 8px;
        text-align: center;
        padding: 8px;
        background: #fef2f2;
        border-radius: 6px;
        border: 1px solid #fecaca;
    `;

    // Вставляем ошибку после формы
    const form = currentPopup.querySelector('.popup-form');
    form.appendChild(error);

    // Удаляем ошибку через 5 секунд
    setTimeout(() => {
        if (error.parentNode) {
            error.remove();
        }
    }, 5000);
}

/**
 * Настройка табов для мобильной версии
 * @param {HTMLElement} popup - Элемент попапа
 */
function setupTabs(popup) {
    const tabs = popup.querySelectorAll('.v2-popup__tab');
    const panes = popup.querySelectorAll('.v2-popup__pane');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-target');
            const targetPane = popup.querySelector(target);

            if (!targetPane) return;

            // Убираем активный класс со всех табов и панелей
            tabs.forEach(t => t.classList.remove('v2-popup__tab--active'));
            panes.forEach(p => p.classList.remove('v2-popup__pane--active'));

            // Добавляем активный класс к выбранному табу и панели
            tab.classList.add('v2-popup__tab--active');
            targetPane.classList.add('v2-popup__pane--active');
        });
    });
}

/**
 * Маска для телефона
 */
function setupPhoneMask() {
    const phoneInputs = document.querySelectorAll('input[type="tel"]');

    phoneInputs.forEach(input => {
        input.addEventListener('input', e => {
            let value = e.target.value.replace(/\D/g, '');

            if (value.length === 0) {
                e.target.value = '';
                return;
            }

            if (value.length === 1 && value[0] !== '7') {
                value = '7' + value;
            }

            if (value.length > 11) {
                value = value.slice(0, 11);
            }

            // Форматирование
            let formatted = '+7';
            if (value.length > 1) {
                formatted += ' (' + value.slice(1, 4);
                if (value.length > 4) {
                    formatted += ') ' + value.slice(4, 7);
                    if (value.length > 7) {
                        formatted += '-' + value.slice(7, 9);
                        if (value.length > 9) {
                            formatted += '-' + value.slice(9, 11);
                        }
                    }
                }
            }

            e.target.value = formatted;
        });
    });
}

// Анимация для cta-warning
document.addEventListener('DOMContentLoaded', function () {
    const ctaWarning = document.querySelector('.cta-warning');
    if (!ctaWarning) return;

    const observer = new IntersectionObserver(
        entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    observer.unobserve(entry.target); // Анимация срабатывает только один раз
                }
            });
        },
        {
            threshold: 0.3, // Анимация запускается когда 30% элемента видно
            rootMargin: '0px 0px -50px 0px', // Небольшой отступ снизу
        }
    );

    observer.observe(ctaWarning);
});

// Инициализация табов для implant-tabs-container
document.addEventListener('DOMContentLoaded', function () {
    const tabsContainer = document.getElementById('tabs-underline');
    if (!tabsContainer) return;

    const tablist = tabsContainer.querySelector('.tablist');
    const tabs = [...tabsContainer.querySelectorAll('.tab')];
    const panels = [...tabsContainer.querySelectorAll('.panel')];
    const slider = tabsContainer.querySelector('.slider');

    function moveSlider(i) {
        if (!slider) return;
        const el = tabs[i];
        // учитываем горизонтальный скролл на мобилке
        const x = el.offsetLeft - tablist.scrollLeft;
        slider.style.width = el.offsetWidth + 'px';
        slider.style.transform = `translateX(${x}px)`;
    }

    function activate(i, scrollIntoView = false) {
        tabs.forEach((t, k) => {
            const active = k === i;
            t.classList.toggle('is-active', active);
            t.setAttribute('aria-selected', active);
        });
        panels.forEach((p, k) => p.classList.toggle('is-active', k === i));
        if (scrollIntoView)
            tabs[i].scrollIntoView({ inline: 'center', behavior: 'smooth', block: 'nearest' });
        moveSlider(i);
        activeIndex = i;
    }

    let activeIndex = Math.max(
        0,
        tabs.findIndex(t => t.classList.contains('is-active'))
    );
    activate(activeIndex);

    tabs.forEach((t, i) => t.addEventListener('click', () => activate(i, true)));

    // клавиатурная навигация
    tabsContainer.addEventListener('keydown', e => {
        if (!['ArrowRight', 'ArrowLeft', 'Home', 'End'].includes(e.key)) return;
        e.preventDefault();
        let i = activeIndex;
        if (e.key === 'ArrowRight') i = (i + 1) % tabs.length;
        if (e.key === 'ArrowLeft') i = (i - 1 + tabs.length) % tabs.length;
        if (e.key === 'Home') i = 0;
        if (e.key === 'End') i = tabs.length - 1;
        activate(i, true);
    });

    // держим слайдер в правильном месте при ресайзе и прокрутке списка табов
    window.addEventListener('resize', () => moveSlider(activeIndex));
    tablist.addEventListener('scroll', () => moveSlider(activeIndex), { passive: true });
});

// Перевод сообщений валидации HTML5 на русский
function setupValidationMessages() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        // Переопределяем сообщения валидации для всех полей формы
        const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
        
        inputs.forEach(input => {
            // Устанавливаем кастомное сообщение для required полей
            input.addEventListener('invalid', function(e) {
                if (!e.target.validity.valid) {
                    if (e.target.validity.valueMissing) {
                        e.target.setCustomValidity('Пожалуйста, заполните это поле');
                    } else if (e.target.validity.typeMismatch) {
                        if (e.target.type === 'email') {
                            e.target.setCustomValidity('Пожалуйста, введите корректный email адрес');
                        } else if (e.target.type === 'tel') {
                            e.target.setCustomValidity('Пожалуйста, введите корректный номер телефона');
                        } else {
                            e.target.setCustomValidity('Пожалуйста, введите корректное значение');
                        }
                    } else if (e.target.validity.tooShort) {
                        e.target.setCustomValidity('Значение слишком короткое');
                    } else if (e.target.validity.tooLong) {
                        e.target.setCustomValidity('Значение слишком длинное');
                    } else if (e.target.validity.patternMismatch) {
                        e.target.setCustomValidity('Пожалуйста, введите значение в правильном формате');
                    } else {
                        e.target.setCustomValidity('Пожалуйста, заполните это поле');
                    }
                }
            });
            
            // Сбрасываем кастомное сообщение при вводе
            input.addEventListener('input', function() {
                if (this.validity.valid) {
                    this.setCustomValidity('');
                }
            });
            
            // Устанавливаем title для тултипа
            if (input.hasAttribute('required')) {
                input.setAttribute('title', 'Пожалуйста, заполните это поле');
            }
        });
    });
}

function applyPrimaryButtonStyles() {
    const submits = document.querySelectorAll('.v2-site .wpcf7-submit');
    submits.forEach(btn => {
        btn.classList.add('v2-btn', 'v2-btn--primary');
    });
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', () => {
    setupPhoneMask();
    setupValidationMessages();
    applyPrimaryButtonStyles();
    
    // Также обрабатываем формы, добавленные динамически (например, через CF7)
    setTimeout(() => {
        setupValidationMessages();
        applyPrimaryButtonStyles();
    }, 500);
    
    // Обработка форм CF7, которые могут загружаться асинхронно
    if (typeof wpcf7 !== 'undefined') {
        document.addEventListener('wpcf7mailsent', () => {
            setTimeout(() => {
                setupValidationMessages();
                applyPrimaryButtonStyles();
            }, 100);
        });
    }
    
    // Перехватываем отправку формы для переопределения сообщений
    document.addEventListener('invalid', function(e) {
        if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA' || e.target.tagName === 'SELECT') {
            const input = e.target;
            if (input.validity.valueMissing) {
                input.setCustomValidity('Пожалуйста, заполните это поле');
            } else if (input.validity.typeMismatch) {
                if (input.type === 'email') {
                    input.setCustomValidity('Пожалуйста, введите корректный email адрес');
                } else if (input.type === 'tel') {
                    input.setCustomValidity('Пожалуйста, введите корректный номер телефона');
                }
            } else {
                input.setCustomValidity('Пожалуйста, заполните это поле');
            }
        }
    }, true);
});
