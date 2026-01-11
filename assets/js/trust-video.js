/**
 * Автозапуск видео в блоке trust__video при появлении в поле зрения
 * Запускается через 0.5 секунды после того, как блок попадает в viewport
 * Видео без повтора (loop)
 */
document.addEventListener('DOMContentLoaded', function () {
    var trustVideo = document.querySelector('.trust__video');
    if (!trustVideo) return;

    var hasPlayed = false;

    // Создаем Intersection Observer для отслеживания видимости
    var observer = new IntersectionObserver(
        function (entries) {
            entries.forEach(function (entry) {
                // Если элемент виден и видео еще не запускалось
                if (entry.isIntersecting && !hasPlayed) {
                    hasPlayed = true;
                    
                    // Задержка 0.5 секунды перед запуском
                    setTimeout(function () {
                        trustVideo.play().catch(function (error) {
                            console.log('Видео не может быть воспроизведено:', error);
                        });
                    }, 500);
                    
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
    var videoWrapper = trustVideo.closest('.trust__video-wrapper');
    if (videoWrapper) {
        observer.observe(videoWrapper);
    }
});


















