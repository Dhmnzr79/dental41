/**
 * V2 Implant Types Tabs
 * Функциональность табов для блока видов имплантации
 */

document.addEventListener('DOMContentLoaded', function () {
    const tabsContainer = document.getElementById('v2-tabs-underline');
    if (!tabsContainer) return;

    const tablist = tabsContainer.querySelector('.v2-implant-types__tablist');
    const tabs = [...tabsContainer.querySelectorAll('.v2-implant-types__tab')];
    const panels = [...tabsContainer.querySelectorAll('.v2-implant-types__panel')];
    const slider = tabsContainer.querySelector('.v2-implant-types__slider');

    if (!tablist || tabs.length === 0 || panels.length === 0) return;

    function moveSlider(i) {
        if (!slider) return;
        const el = tabs[i];
        if (!el) return;
        // учитываем горизонтальный скролл на мобилке
        const x = el.offsetLeft - tablist.scrollLeft;
        slider.style.width = el.offsetWidth + 'px';
        slider.style.transform = `translateX(${x}px)`;
    }

    function activate(i, scrollIntoView = false) {
        if (i < 0 || i >= tabs.length) return;

        tabs.forEach((t, k) => {
            const active = k === i;
            t.classList.toggle('v2-implant-types__tab--active', active);
            t.setAttribute('aria-selected', active ? 'true' : 'false');
        });

        panels.forEach((p, k) => {
            p.classList.toggle('v2-implant-types__panel--active', k === i);
        });

        if (scrollIntoView && tabs[i]) {
            tabs[i].scrollIntoView({ inline: 'center', behavior: 'smooth', block: 'nearest' });
        }

        moveSlider(i);
        activeIndex = i;
    }

    let activeIndex = Math.max(
        0,
        tabs.findIndex(t => t.classList.contains('v2-implant-types__tab--active'))
    );
    activate(activeIndex);

    tabs.forEach((t, i) => {
        t.addEventListener('click', () => activate(i, true));
    });

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






