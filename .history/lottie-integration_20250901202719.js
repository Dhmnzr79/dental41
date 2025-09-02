/**
 * Lottie Animations Integration for Dental Clinic WordPress Theme
 * 
 * Этот файл добавляет поддержку Lottie анимаций на сайт
 * Использует библиотеку lottie-web для воспроизведения JSON анимаций
 */

// Проверяем, что библиотека Lottie загружена
function checkLottieLibrary() {
    return new Promise((resolve, reject) => {
        if (window.lottie) {
            console.log('Lottie уже загружена');
            resolve(window.lottie);
            return;
        }

        console.log('Ожидаем загрузку библиотеки Lottie...');
        // Ждем немного, возможно библиотека еще загружается
        setTimeout(() => {
            if (window.lottie) {
                console.log('Lottie загружена после ожидания');
                resolve(window.lottie);
            } else {
                console.error('Библиотека Lottie не найдена');
                reject(new Error('Lottie library not found'));
            }
        }, 1000);
    });
}

// Класс для управления Lottie анимациями
class LottieManager {
    constructor() {
        this.animations = new Map();
        this.init();
    }

    async init() {
        try {
            await checkLottieLibrary();
            this.initAnimations();
        } catch (error) {
            console.error('Ошибка инициализации Lottie:', error);
        }
    }

    // Инициализация всех анимаций на странице
    initAnimations() {
        console.log('Инициализация анимаций...');
        const lottieElements = document.querySelectorAll('[data-lottie]');
        console.log('Найдено элементов с data-lottie:', lottieElements.length);
        
        lottieElements.forEach((element, index) => {
            console.log(`Обрабатываем элемент ${index}:`, element);
            const animationId = `lottie-${index}`;
            element.dataset.lottieId = animationId;
            
            const config = this.parseLottieConfig(element);
            console.log('Конфигурация анимации:', config);
            
            try {
                const animation = lottie.loadAnimation({
                    container: element,
                    ...config
                });

                this.animations.set(animationId, animation);
                console.log(`Анимация ${animationId} создана`);

                // Добавляем события
                animation.addEventListener('DOMLoaded', () => {
                    console.log(`Анимация ${animationId} загружена`);
                    element.classList.add('lottie-loaded');
                });

                animation.addEventListener('error', (error) => {
                    console.error(`Ошибка анимации ${animationId}:`, error);
                    element.classList.add('lottie-error');
                });

                animation.addEventListener('data_ready', () => {
                    console.log(`Данные анимации ${animationId} готовы`);
                });

            } catch (error) {
                console.error(`Ошибка создания анимации ${animationId}:`, error);
            }
        });
    }

    // Парсинг конфигурации из data-атрибутов
    parseLottieConfig(element) {
        const config = {
            renderer: 'svg',
            loop: true,
            autoplay: false
        };

        // Базовые настройки
        if (element.dataset.lottie) {
            config.path = element.dataset.lottie;
            console.log('Путь к анимации:', config.path);
        }

        // Дополнительные настройки
        if (element.dataset.lottieLoop !== undefined) {
            config.loop = element.dataset.lottieLoop === 'true';
        }

        if (element.dataset.lottieAutoplay !== undefined) {
            config.autoplay = element.dataset.lottieAutoplay === 'true';
        }

        if (element.dataset.lottieSpeed) {
            config.speed = parseFloat(element.dataset.lottieSpeed);
        }

        if (element.dataset.lottieRenderer) {
            config.renderer = element.dataset.lottieRenderer;
        }

        return config;
    }

    // Публичные методы для управления анимациями
    play(animationId) {
        const animation = this.animations.get(animationId);
        if (animation) {
            animation.play();
        }
    }

    pause(animationId) {
        const animation = this.animations.get(animationId);
        if (animation) {
            animation.pause();
        }
    }

    stop(animationId) {
        const animation = this.animations.get(animationId);
        if (animation) {
            animation.stop();
        }
    }

    // Получение анимации по ID
    getAnimation(animationId) {
        return this.animations.get(animationId);
    }

    // Уничтожение анимации
    destroy(animationId) {
        const animation = this.animations.get(animationId);
        if (animation) {
            animation.destroy();
            this.animations.delete(animationId);
        }
    }
}

// Специальные анимации для стоматологической клиники
class DentalLottieAnimations {
    constructor(lottieManager) {
        this.manager = lottieManager;
        this.initDentalAnimations();
    }

    initDentalAnimations() {
        // Анимация зубной щетки для hero секции
        this.setupHeroAnimation();
        
        // Анимация сердца для отзывов
        this.setupHeartAnimation();
        
        // Анимация прогресс-бара для статистики
        this.setupProgressAnimation();
        
        // Анимация улыбки для результатов
        this.setupSmileAnimation();
    }

    // Анимация зубной щетки в hero секции
    setupHeroAnimation() {
        const heroAnimation = document.querySelector('.hero-lottie-animation');
        if (heroAnimation) {
            // Можно добавить специальную логику для hero анимации
            heroAnimation.addEventListener('click', () => {
                const animationId = heroAnimation.dataset.lottieId;
                this.manager.play(animationId);
            });
        }
    }

    // Анимация сердца для отзывов
    setupHeartAnimation() {
        const heartAnimations = document.querySelectorAll('.heart-lottie-animation');
        heartAnimations.forEach(element => {
            element.addEventListener('click', () => {
                const animationId = element.dataset.lottieId;
                const animation = this.manager.getAnimation(animationId);
                if (animation) {
                    animation.setDirection(1);
                    animation.play();
                }
            });
        });
    }

    // Анимация прогресс-бара
    setupProgressAnimation() {
        const progressAnimations = document.querySelectorAll('.progress-lottie-animation');
        progressAnimations.forEach(element => {
            const animationId = element.dataset.lottieId;
            const animation = this.manager.getAnimation(animationId);
            if (animation) {
                // Анимация прогресса при скролле
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animation.play();
                        }
                    });
                }, { threshold: 0.5 });
                
                observer.observe(element);
            }
        });
    }

    // Анимация улыбки для результатов
    setupSmileAnimation() {
        const smileAnimations = document.querySelectorAll('.smile-lottie-animation');
        smileAnimations.forEach(element => {
            element.addEventListener('mouseenter', () => {
                const animationId = element.dataset.lottieId;
                this.manager.play(animationId);
            });
        });
    }
}

// Инициализация при загрузке DOM
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM загружен, инициализируем Lottie...');
    // Создаем глобальный экземпляр менеджера
    window.lottieManager = new LottieManager();
    
    // Создаем экземпляр для стоматологических анимаций
    window.dentalLottie = new DentalLottieAnimations(window.lottieManager);
});

// Экспорт для использования в других модулях
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { LottieManager };
}
