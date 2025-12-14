document.addEventListener('DOMContentLoaded', function () {
    var slider = document.querySelector('[data-slider="doctors"]');
    if (!slider) return;

    var track = slider.querySelector('.doctors__slider-track');
    var cards = Array.prototype.slice.call(track.querySelectorAll('.doctors__card'));
    if (!cards.length) return;

    var pagination = slider.querySelector('.doctors__pagination');
    var prevBtn = slider.querySelector('[data-slider-nav="prev"]');
    var nextBtn = slider.querySelector('[data-slider-nav="next"]');

    var currentIndex = 0;

    function getSlidesToShow() {
        if (window.innerWidth >= 1280) return 3;
        if (window.innerWidth >= 768) return 2;
        return 1;
    }

    var slidesToShow = getSlidesToShow();

    function createPagination() {
        if (!pagination || cards.length <= slidesToShow) return;

        pagination.innerHTML = '';
        var totalPages = cards.length - slidesToShow + 1;

        for (var i = 0; i < totalPages; i++) {
            var dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'doctors__dot';
            dot.setAttribute('aria-label', 'Перейти к врачам ' + (i + 1));
            dot.setAttribute('data-slider-dot', i);
            if (i === currentIndex) {
                dot.setAttribute('aria-current', 'true');
            }
            dot.addEventListener('click', function () {
                var index = parseInt(this.getAttribute('data-slider-dot'), 10);
                goTo(index);
            });
            pagination.appendChild(dot);
        }
    }

    function updateSlides(index) {
        currentIndex = index;

        if (cards.length === 0) return;

        // Используем requestAnimationFrame для избежания forced reflow
        requestAnimationFrame(function() {
            // Используем реальную ширину первой карточки + gap для правильного расчета
            var firstCard = cards[0];
            if (!firstCard) return;
            
            // Измерения DOM в одном кадре для избежания layout thrashing
            var cardWidth = firstCard.offsetWidth;
            var gap = 30; // gap из CSS
            
            if (cardWidth > 0) {
                // Правильный расчет: ширина карточки + gap между карточками
                var translateX = -(currentIndex * (cardWidth + gap));
                track.style.transform = 'translateX(' + translateX + 'px)';
            }
        });

        var dots = pagination ? pagination.querySelectorAll('.doctors__dot') : [];
        dots.forEach(function (dot, i) {
            if (i === currentIndex) {
                dot.setAttribute('aria-current', 'true');
            } else {
                dot.removeAttribute('aria-current');
            }
        });

        if (prevBtn) {
            prevBtn.disabled = currentIndex === 0;
        }
        if (nextBtn) {
            var maxIndex = cards.length - slidesToShow;
            nextBtn.disabled = currentIndex >= maxIndex;
        }
    }

    function goTo(index) {
        var maxIndex = cards.length - slidesToShow;
        if (index < 0) index = 0;
        if (index > maxIndex) index = maxIndex;
        updateSlides(index);
    }

    function goPrev() {
        if (currentIndex > 0) {
            goTo(currentIndex - 1);
        }
    }

    function goNext() {
        var maxIndex = cards.length - slidesToShow;
        if (currentIndex < maxIndex) {
            goTo(currentIndex + 1);
        }
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', goPrev);
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', goNext);
    }

    var startX = 0;
    var isDragging = false;

    function onPointerDown(event) {
        isDragging = true;
        startX = event.type === 'touchstart' ? event.touches[0].clientX : event.clientX;
    }

    function onPointerMove(event) {
        if (!isDragging) return;
        var currentX = event.type === 'touchmove' ? event.touches[0].clientX : event.clientX;
        var diffX = currentX - startX;

        if (Math.abs(diffX) > 50) {
            isDragging = false;
            if (diffX < 0) {
                goNext();
            } else {
                goPrev();
            }
        }
    }

    function onPointerUp() {
        isDragging = false;
    }

    slider.addEventListener('touchstart', onPointerDown, { passive: true });
    slider.addEventListener('touchmove', onPointerMove, { passive: true });
    slider.addEventListener('touchend', onPointerUp);

    slider.addEventListener('mousedown', onPointerDown);
    slider.addEventListener('mousemove', onPointerMove);
    slider.addEventListener('mouseup', onPointerUp);
    slider.addEventListener('mouseleave', onPointerUp);

    window.addEventListener('resize', function () {
        slidesToShow = getSlidesToShow();
        currentIndex = 0;
        createPagination();
        // Небольшая задержка для правильного расчета после resize
        setTimeout(function() {
            updateSlides(0);
        }, 100);
    });

    // Инициализация с задержкой для правильного расчета размеров после defer загрузки
    // Используем requestAnimationFrame для гарантии, что DOM готов
    requestAnimationFrame(function() {
        setTimeout(function() {
            createPagination();
            updateSlides(0);
        }, 50);
    });
});






