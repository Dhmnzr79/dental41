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
    document.body.classList.add('popup-open');

    // Показываем попап
    popup.classList.add('show');
    popup.setAttribute('aria-hidden', 'false');

    // Фокус на первое поле
    setTimeout(() => {
        const firstField = popup.querySelector('input, textarea, button');
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
    currentPopup.setAttribute('aria-hidden', 'true');

    setTimeout(() => {
        currentPopup.classList.remove('show', 'closing');
        document.body.classList.remove('popup-open');
        currentPopup = null;
        isClosing = false;
    }, 280);
}

// Экспортируем функции в window
window.openPopup = openPopup;
window.closePopup = closePopup;

/**
 * Настройка обработчиков событий для попапа
 * @param {HTMLElement} popup - Элемент попапа
 */
function setupPopupEvents(popup) {
    // Закрытие по клику на overlay
    const overlay = popup.querySelector('.popup__overlay');
    if (overlay) {
        overlay.addEventListener('click', () => {
            closePopup();
        });
    }

    // Закрытие по Escape
    const escapeHandler = (e) => {
        if (e.key === 'Escape' && currentPopup) {
            closePopup();
            document.removeEventListener('keydown', escapeHandler);
        }
    };
    document.addEventListener('keydown', escapeHandler);

    // Закрытие по клику на кнопку закрытия
    const closeBtn = popup.querySelector('.popup__close');
    if (closeBtn) {
        closeBtn.addEventListener('click', closePopup);
    }

    // Обработка табов (для мобильной версии)
    setupTabs(popup);
}

/**
 * Настройка табов для мобильной версии
 * @param {HTMLElement} popup - Элемент попапа
 */
function setupTabs(popup) {
    const tabs = popup.querySelectorAll('.popup__tab');
    const panes = popup.querySelectorAll('.popup__pane');

    if (!tabs.length || !panes.length) return;

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-target');
            const targetPane = popup.querySelector(target);

            if (!targetPane) return;

            // Убираем активный класс со всех табов и панелей
            tabs.forEach(t => t.classList.remove('popup__tab--active'));
            panes.forEach(p => p.classList.remove('popup__pane--active'));

            // Добавляем активный класс к выбранному табу и панели
            tab.classList.add('popup__tab--active');
            targetPane.classList.add('popup__pane--active');
        });
    });
}

// Инициализация при загрузке DOM
document.addEventListener('DOMContentLoaded', function() {
    // Обработка всех кнопок закрытия попапов
    const closeButtons = document.querySelectorAll('.popup__close');
    closeButtons.forEach(btn => {
        btn.addEventListener('click', closePopup);
    });

    // Обработка всех overlay
    const overlays = document.querySelectorAll('.popup__overlay');
    overlays.forEach(overlay => {
        overlay.addEventListener('click', closePopup);
    });
});




















