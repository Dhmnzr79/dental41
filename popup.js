// Функция для открытия попапа
function openPopup() {
    // Здесь будет логика открытия попапа
    console.log('Открытие попапа');
    
    // Пока что просто показываем alert
    alert('Попап будет добавлен позже');
}

// Закрытие попапа по клику вне его
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('popup-overlay')) {
        closePopup();
    }
});

// Закрытие попапа по Escape
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closePopup();
    }
});

function closePopup() {
    const popup = document.querySelector('.popup-overlay');
    if (popup) {
        popup.style.display = 'none';
    }
}

// Инициализация новых табов
document.addEventListener('DOMContentLoaded', function() {
    const root = document.getElementById('tabs-underline');
    if (!root) return;
    
    const tablist = root.querySelector('.tablist');
    const tabs = [...root.querySelectorAll('.tab')];
    const panels = [...root.querySelectorAll('.panel')];
    const slider = root.querySelector('.slider');

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
        if (scrollIntoView) tabs[i].scrollIntoView({ inline: 'center', behavior: 'smooth', block: 'nearest' });
        moveSlider(i);
        activeIndex = i;
    }

    let activeIndex = Math.max(0, tabs.findIndex(t => t.classList.contains('is-active')));
    activate(activeIndex);

    tabs.forEach((t, i) => t.addEventListener('click', () => activate(i, true)));

    // клавиатурная навигация
    root.addEventListener('keydown', e => {
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

// Анимация для cta-warning
document.addEventListener('DOMContentLoaded', function() {
    const ctaWarning = document.querySelector('.cta-warning');
    if (!ctaWarning) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target); // Анимация срабатывает только один раз
            }
        });
    }, {
        threshold: 0.3, // Анимация запускается когда 30% элемента видно
        rootMargin: '0px 0px -50px 0px' // Небольшой отступ снизу
    });

    observer.observe(ctaWarning);
});

// Анимация для reveal элементов
document.addEventListener('DOMContentLoaded', function() {
    const revealElements = document.querySelectorAll('.reveal');
    
    // Сначала запускаем анимацию для элементов НЕ в trust-section (как "ЗА 1 ДЕНЬ") через 2 секунды
    revealElements.forEach(element => {
        const isInTrustSection = element.closest('.trust-section');
        if (!isInTrustSection) {
            // Для элементов НЕ в trust-section - анимация через 2 секунды после загрузки
            setTimeout(() => {
                element.classList.add('animate');
            }, 2000);
        }
    });
    
    // Затем настраиваем observer для h2 в trust-section
    const trustH2 = document.querySelector('.trust-section h2');
    
    if (trustH2) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Когда h2 в trust-section попадает в зону видимости, запускаем анимацию для reveal
                    const trustRevealElement = document.querySelector('.trust-section .reveal');
                    if (trustRevealElement) {
                        trustRevealElement.classList.add('animate-trust');
                    }
                    
                    observer.unobserve(entry.target); // Анимация срабатывает только один раз
                }
            });
        }, {
            threshold: 0.1, // Анимация запускается когда 10% элемента видно
            rootMargin: '0px 0px -30% 0px' // Анимация срабатывает когда элемент еще не полностью виден
        });

        observer.observe(trustH2);
    }
});


