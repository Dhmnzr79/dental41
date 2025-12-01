/**
 * Автозапуск видео в блоке v2-plus__card--bg при появлении в поле зрения
 * Запускается через 1 секунду после того, как блок попадает в viewport
 */
document.addEventListener('DOMContentLoaded', function () {
    var videoCard = document.querySelector('.v2-plus__card--bg .v2-plus__card-video');
    if (!videoCard) return;

    var hasPlayed = false;

    // Создаем Intersection Observer для отслеживания видимости
    var observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                // Если элемент виден и видео еще не запускалось
                if (entry.isIntersecting && !hasPlayed) {
                    hasPlayed = true;
                    
                    // Задержка 1 секунда перед запуском
                    setTimeout(function () {
                        videoCard.play().catch(function (error) {
                            console.log('Видео не может быть воспроизведено:', error);
                        });
                    }, 1000);
                    
                    // Отключаем observer после первого запуска
                    observer.disconnect();
                }
            });
        },
        {
            threshold: 0.5, // Запускаем, когда 50% элемента видно
            rootMargin: '0px'
        }
    );

    // Начинаем наблюдать за элементом
    var cardContainer = videoCard.closest('.v2-plus__card--bg');
    if (cardContainer) {
        observer.observe(cardContainer);
    }
});

