document.addEventListener('DOMContentLoaded', function () {
    var slider = document.querySelector('[data-slider="works"]');
    if (!slider) return;

    var list = slider.querySelector('.works__list');
    if (!list) return;

    var cols = Array.prototype.slice.call(list.querySelectorAll('.works__col'));
    var dots = Array.prototype.slice.call(slider.querySelectorAll('[data-slider-dot]'));
    if (!cols.length || !dots.length) return;

    var currentIndex = 0;

    function isSliderMode() {
        return window.innerWidth < 1280;
    }

    function updateSlides(index) {
        currentIndex = index;

        // Используем requestAnimationFrame для избежания forced reflow
        requestAnimationFrame(function() {
            if (isSliderMode()) {
                // В режиме слайдера используем transform для плавного скролла
                var firstCol = cols[0];
                if (!firstCol) return;
                
                // Измерения DOM в одном кадре для избежания layout thrashing
                var sliderWidth = slider.offsetWidth;
                var colWidth = firstCol.offsetWidth;
                var computedStyle = window.getComputedStyle(list);
                var gap = parseFloat(computedStyle.gap) || 0;
                var cardWidthWithGap = colWidth + gap;
                
                var offset = -currentIndex * cardWidthWithGap;
                list.style.transform = 'translateX(' + offset + 'px)';
                list.style.transition = 'transform 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                
                // Все карточки видимы для плавного скролла
                cols.forEach(function (col) {
                    col.classList.remove('works__col--hidden');
                });
            } else {
                // На десктопе показываем все карточки без transform
                list.style.transform = 'translateX(0)';
                list.style.transition = 'none';
                cols.forEach(function (col) {
                    col.classList.remove('works__col--hidden');
                });
            }
        });

        dots.forEach(function (dot, i) {
            if (i === currentIndex) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }
        });
    }

    function goTo(index) {
        var maxIndex = cols.length - 1;
        if (index < 0) index = maxIndex;
        if (index > maxIndex) index = 0;
        updateSlides(index);
    }

    dots.forEach(function (dot, index) {
        dot.addEventListener('click', function () {
            goTo(index);
        });
    });

    var startX = 0;
    var isDragging = false;

    function onPointerDown(event) {
        if (!isSliderMode()) return;
        isDragging = true;
        startX = event.type === 'touchstart' ? event.touches[0].clientX : event.clientX;
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

        if (Math.abs(diffX) > threshold) {
            event.preventDefault();
            event.stopPropagation();
            if (diffX < 0) {
                // Свайп влево - следующий слайд
                goTo(currentIndex + 1);
            } else {
                // Свайп вправо - предыдущий слайд
                goTo(currentIndex - 1);
            }
        }
    }

    slider.addEventListener('touchstart', onPointerDown, { passive: true });
    slider.addEventListener('touchmove', onPointerMove, { passive: false });
    slider.addEventListener('touchend', onPointerUp);

    slider.addEventListener('mousedown', onPointerDown);
    slider.addEventListener('mousemove', onPointerMove);
    slider.addEventListener('mouseup', onPointerUp);
    slider.addEventListener('mouseleave', onPointerUp);

    window.addEventListener('resize', function () {
        // При изменении размера окна проверяем, нужно ли переключить режим
        if (!isSliderMode()) {
            // На десктопе показываем все карточки
            list.style.transform = 'translateX(0)';
            list.style.transition = 'none';
            cols.forEach(function (col) {
                col.classList.remove('works__col--hidden');
            });
        } else {
            // В режиме слайдера обновляем отображение
            updateSlides(currentIndex);
        }
    });

    // Инициализация
    if (isSliderMode()) {
        updateSlides(0);
    } else {
        list.style.transform = 'translateX(0)';
        list.style.transition = 'none';
        cols.forEach(function (col) {
            col.classList.remove('works__col--hidden');
        });
    }

    // Лайтбокс для изображений работ
    var mediaImages = slider.querySelectorAll('.works__media img');
    var overlay = null;

    function openLightbox(src, alt) {
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'works-lightbox';
            overlay.innerHTML = '\
<div class=\"works-lightbox__backdrop\"></div>\
<div class=\"works-lightbox__inner\">\
  <button class=\"works-lightbox__close\" aria-label=\"Закрыть просмотр\">×</button>\
  <img class=\"works-lightbox__image\" alt=\"\" loading=\"eager\">\
</div>';
            document.body.appendChild(overlay);

            overlay.querySelector('.works-lightbox__backdrop').addEventListener('click', closeLightbox);
            overlay.querySelector('.works-lightbox__close').addEventListener('click', closeLightbox);
            
            // Закрытие по Escape
            document.addEventListener('keydown', function handleEscape(e) {
                if (e.key === 'Escape' && overlay && overlay.classList.contains('works-lightbox--visible')) {
                    closeLightbox();
                }
            });
        }

        var img = overlay.querySelector('.works-lightbox__image');
        var inner = overlay.querySelector('.works-lightbox__inner');
        
        // Показываем лайтбокс сразу
        overlay.classList.add('works-lightbox--visible');
        document.body.classList.add('popup-open');
        
        // Показываем индикатор загрузки
        img.style.opacity = '0';
        
        // Загружаем изображение
        var newImg = new Image();
        newImg.onload = function() {
            img.src = src;
            img.alt = alt || '';
            img.style.opacity = '1';
        };
        newImg.onerror = function() {
            img.style.opacity = '1';
        };
        newImg.src = src;
    }

    function closeLightbox() {
        if (!overlay) return;
        overlay.classList.remove('works-lightbox--visible');
        document.body.classList.remove('popup-open');
    }

    mediaImages.forEach(function (img) {
        img.style.cursor = 'zoom-in';
        img.addEventListener('click', function () {
            openLightbox(img.src, img.alt);
        });
    });
});


