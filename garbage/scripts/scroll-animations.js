// Анимации при скролле
document.addEventListener('DOMContentLoaded', function() {
    
    // Функция для проверки видимости элемента
    function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    
    // Анимация для years-badge
    function animateYearsBadge() {
        const yearsBadge = document.querySelector('.years-badge');
        const visualRight = document.querySelector('.visual-right');
        
        if (yearsBadge && visualRight && !yearsBadge.classList.contains('fade-in')) {
            if (isElementInViewport(visualRight)) {
                setTimeout(() => {
                    yearsBadge.classList.add('fade-in');
                }, 500); // Задержка 500ms для эффекта
            }
        }
    }
    
    // Обработчик скролла
    function handleScroll() {
        animateYearsBadge();
    }
    
    // Добавляем обработчик скролла
    window.addEventListener('scroll', handleScroll);
    
    // Запускаем проверку при загрузке страницы
    handleScroll();
});
