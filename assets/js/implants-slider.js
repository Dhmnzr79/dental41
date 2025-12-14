/**
 * V2 Implants Slider
 * Слайдер для блока имплантов:
 * - Декстоп: 3 статичные карточки
 * - Планшет: 2 карточки + пагинация + свайп
 * - Мобилка: 1 карточка + пагинация + свайп
 */

document.addEventListener('DOMContentLoaded', function () {
    var slider = document.querySelector('[data-slider="implants"]');
    if (!slider) return;
    
    var sliderWrapper = slider.closest('.implants__slider-wrapper');
    if (!sliderWrapper) return;

    var cols = Array.prototype.slice.call(slider.querySelectorAll('.implants__col'));
    if (!cols.length) return;

    // Ищем точки пагинации в документе, так как они находятся вне слайдера
    var paginationContainer = document.querySelector('.implants__pagination');
    var dots = paginationContainer ? Array.prototype.slice.call(paginationContainer.querySelectorAll('[data-slider-dot]')) : [];

    var currentIndex = 0;

    function isTabletMode() {
        return window.innerWidth >= 768 && window.innerWidth < 1280;
    }

    function isMobileMode() {
        return window.innerWidth < 768;
    }

    function isSliderMode() {
        return isTabletMode() || isMobileMode();
    }

    function getCardsPerView() {
        if (isMobileMode()) return 1;
        if (isTabletMode()) return 2;
        return 3;
    }

    function getMaxIndex() {
        var cardsPerView = getCardsPerView();
        // Если карточек меньше или равно cardsPerView, можно показывать только с индекса 0
        if (cols.length <= cardsPerView) {
            return 0;
        }
        // Для планшета с 3 карточками и показом по 2: можно показывать до последней карточки (index = 2)
        // Логика offset в updateSlides скорректирует отображение
        return cols.length - 1;
    }

    function updateSlides(index) {
        currentIndex = index;
        var maxIndex = getMaxIndex();
        if (currentIndex > maxIndex) currentIndex = maxIndex;
        if (currentIndex < 0) currentIndex = 0;

        var cardsPerView = getCardsPerView();
        var sliderActive = isSliderMode();

        // Используем requestAnimationFrame для избежания forced reflow
        requestAnimationFrame(function() {
            if (sliderActive) {
                // В режиме слайдера используем transform для плавного скролла
                var firstCol = cols[0];
                if (!firstCol) return;
                
                // Измерения DOM в одном кадре для избежания layout thrashing
                var wrapperWidth = sliderWrapper.offsetWidth;
                var colWidth = firstCol.offsetWidth;
                var computedStyle = window.getComputedStyle(slider);
                var gap = parseFloat(computedStyle.gap) || 0;
                var cardWidthWithGap = colWidth + gap;
                
                // Вычисляем offset для плавного перехода
                var offset = -currentIndex * cardWidthWithGap;
                
                // Для последней страницы на планшете (когда осталась 1 карточка)
                var remainingCards = cols.length - currentIndex;
                if (remainingCards < cardsPerView && remainingCards > 0 && isTabletMode()) {
                    // На планшете при показе последней карточки выравниваем по правому краю
                    var totalCardsWidth = remainingCards * cardWidthWithGap - gap;
                    offset = -(wrapperWidth - totalCardsWidth);
                }
                
                slider.style.transform = 'translateX(' + offset + 'px)';
                slider.style.transition = 'transform 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                
                // Все карточки видимы для плавного скролла
                cols.forEach(function (col) {
                    col.classList.remove('implants__col--hidden');
                });
            } else {
                // На десктопе показываем все карточки без transform
                slider.style.transform = 'translateX(0)';
                slider.style.transition = 'none';
                cols.forEach(function (col) {
                    col.classList.remove('implants__col--hidden');
                });
            }
        });

        // Обновляем пагинацию
        if (dots.length > 0) {
            if (isTabletMode()) {
                // На планшете 2 карточки: точки для страниц
                // Страница 0: index 0 (карточки 0-1)
                // Страница 1: index 2 (карточка 2)
                var currentPage = Math.floor(currentIndex / 2);
                dots.forEach(function (dot, i) {
                    if (i < 2) {
                        if (i === currentPage) {
                            dot.setAttribute('aria-current', 'true');
                        } else {
                            dot.setAttribute('aria-current', 'false');
                        }
                    }
                });
            } else if (isMobileMode()) {
                // На мобилке 1 карточка: каждая точка = одна карточка
                dots.forEach(function (dot, i) {
                    if (i === currentIndex) {
                        dot.setAttribute('aria-current', 'true');
                    } else {
                        dot.setAttribute('aria-current', 'false');
                    }
                });
            }
        }
    }

    function goTo(index) {
        var maxIndex = getMaxIndex();
        if (index < 0) index = 0;
        if (index > maxIndex) index = maxIndex;
        updateSlides(index);
    }

    if (dots.length > 0) {
        dots.forEach(function (dot, index) {
            dot.addEventListener('click', function (e) {
                e.preventDefault();
                if (isTabletMode()) {
                    // На планшете: точка 0 = index 0 (карточки 0-1), точка 1 = index 2 (карточка 2)
                    goTo(index * 2);
                } else if (isMobileMode()) {
                    // На мобилке каждая точка = 1 карточка
                    goTo(index);
                }
            });
        });
    }

    var startX = 0;
    var isDragging = false;
    var startIndex = 0;

    function onPointerDown(event) {
        if (!isSliderMode()) return;
        isDragging = true;
        startX = event.type === 'touchstart' ? event.touches[0].clientX : event.clientX;
        startIndex = currentIndex;
        event.stopPropagation();
    }

    function onPointerMove(event) {
        if (!isDragging || !isSliderMode()) return;
        event.preventDefault();
        event.stopPropagation();
        // При свайпе не перемещаем визуально, только определяем направление в onPointerUp
    }

    function onPointerUp(event) {
        if (!isDragging) return;
        isDragging = false;

        var currentX = event.type === 'touchend' ? (event.changedTouches ? event.changedTouches[0].clientX : startX) : event.clientX;
        var diffX = currentX - startX;
        var threshold = 50;
        
        var cardsPerView = getCardsPerView();

        if (Math.abs(diffX) > threshold) {
            event.preventDefault();
            event.stopPropagation();
            if (diffX < 0) {
                // Свайп влево - следующий слайд
                goTo(startIndex + cardsPerView);
            } else {
                // Свайп вправо - предыдущий слайд
                goTo(startIndex - cardsPerView);
            }
        } else {
            updateSlides(startIndex);
        }
    }

    sliderWrapper.addEventListener('touchstart', onPointerDown, { passive: true });
    sliderWrapper.addEventListener('touchmove', onPointerMove, { passive: false });
    sliderWrapper.addEventListener('touchend', onPointerUp);

    sliderWrapper.addEventListener('mousedown', onPointerDown);
    sliderWrapper.addEventListener('mousemove', onPointerMove);
    sliderWrapper.addEventListener('mouseup', onPointerUp);
    sliderWrapper.addEventListener('mouseleave', onPointerUp);

    window.addEventListener('resize', function () {
        // При изменении размера окна проверяем, нужно ли переключить режим
        if (!isSliderMode()) {
            // На десктопе показываем все карточки
            cols.forEach(function (col) {
                col.classList.remove('implants__col--hidden');
            });
        } else {
            // В режиме слайдера обновляем отображение
            updateSlides(currentIndex);
        }
    });

    // Инициализация - проверяем режим при загрузке
    if (isSliderMode()) {
        updateSlides(0);
    } else {
        // На десктопе показываем все карточки
        slider.style.transform = 'translateX(0)';
        slider.style.transition = 'none';
        cols.forEach(function (col) {
            col.classList.remove('implants__col--hidden');
        });
    }
});

