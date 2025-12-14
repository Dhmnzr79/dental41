document.addEventListener('DOMContentLoaded', function () {
    var slider = document.querySelector('[data-slider="reviews"]');
    if (!slider) return;

    var track = slider.querySelector('.reviews__track');
    var cards = Array.prototype.slice.call(track.querySelectorAll('.reviews__card'));
    if (!cards.length) return;

    var pagination = slider.querySelector('.reviews__pagination');
    var wrapper = slider.closest('.reviews__slider-wrapper');
    var prevBtn = wrapper ? wrapper.querySelector('[data-slider-nav="prev"]') : null;
    var nextBtn = wrapper ? wrapper.querySelector('[data-slider-nav="next"]') : null;

    var currentIndex = 0;
    var totalSlides = cards.length;

    function initSlider() {
        // Используем requestAnimationFrame для избежания forced reflow
        requestAnimationFrame(function() {
            var sliderWidth = slider.offsetWidth;
            if (sliderWidth > 0 && totalSlides > 0) {
                var cardWidth = sliderWidth;
                var trackWidth = cardWidth * totalSlides;
                track.style.width = trackWidth + 'px';
                cards.forEach(function (card) {
                    card.style.width = cardWidth + 'px';
                    card.style.flexShrink = '0';
                });
            }
        });
    }

    function createPagination() {
        if (!pagination || totalSlides <= 1) return;

        pagination.innerHTML = '';
        for (var i = 0; i < totalSlides; i++) {
            var dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'reviews__dot';
            dot.setAttribute('aria-label', 'Перейти к отзыву ' + (i + 1));
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

        // Используем requestAnimationFrame для избежания forced reflow
        requestAnimationFrame(function() {
            var sliderWidth = slider.offsetWidth;
            if (sliderWidth > 0) {
                var translateX = -(index * sliderWidth);
                track.style.transform = 'translateX(' + translateX + 'px)';
            }
        });

        var dots = pagination ? pagination.querySelectorAll('.reviews__dot') : [];
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
            nextBtn.disabled = currentIndex === totalSlides - 1;
        }
    }

    function goTo(index) {
        if (index < 0) index = 0;
        if (index >= totalSlides) index = totalSlides - 1;
        updateSlides(index);
    }

    function goPrev() {
        if (currentIndex > 0) {
            goTo(currentIndex - 1);
        }
    }

    function goNext() {
        if (currentIndex < totalSlides - 1) {
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
        initSlider();
        updateSlides(currentIndex);
    });

    initSlider();
    createPagination();
    updateSlides(0);
});

