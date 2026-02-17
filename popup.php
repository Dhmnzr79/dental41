<?php
/**
 * Попапы для стоматологической клиники
 * Интегрированные в WordPress
 */
?>

<!-- Попап 1: Простая форма заявки -->
<div id="popup-1" class="popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-title">
    <div class="popup__overlay"></div>
    <div class="popup__content" role="document">
        <button class="popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="popup__title" id="popup-title">Оставьте заявку</h2>
        <p class="popup__subtitle">
            Мы перезвоним вам в ближайшее время, разберём вашу ситуацию,
            подскажем подходящие варианты имплантации и запишем на консультацию, если захотите.
        </p>

        <div class="popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2a35edb" title="Заявка общая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<!-- Попап 2: Расширенная форма с деталями -->
<div id="popup-2" class="popup popup--extended" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-2-title">
    <div class="popup__overlay"></div>
    <div class="popup__content popup__content--extended" role="document">
        <div class="popup__header">
            <button class="popup__close" aria-label="Закрыть" onclick="closePopup()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        <!-- Табы (только мобилка) -->
        <div class="popup__tabs" id="popup-tabs" aria-hidden="true">
            <button class="popup__tab popup__tab--active" data-target="#popup-info-pane">Информация</button>
            <button class="popup__tab" data-target="#popup-form-pane">Заявка</button>
        </div>

        <div class="popup__body">
            <!-- Информационная панель об импланте -->
            <div id="popup-info-pane" class="popup__pane popup__pane--info popup__pane--active">
                <h3 class="popup__pane-title">Impro</h3>
                
                <div class="popup__price-grid">
                    <div class="popup__price-section">
                        <div class="popup__price-item">
                            <span class="popup__price-name">Вживление импланта Implantium</span>
                            <span class="popup__price-value">30 000 р.</span>
                        </div>
                        <div class="popup__price-item">
                            <span class="popup__price-name">Абатмент</span>
                            <span class="popup__price-value">13 000 р.</span>
                        </div>
                        <div class="popup__price-item">
                            <span class="popup__price-name">Анестезия</span>
                            <span class="popup__price-value">800 р.</span>
                        </div>
                        <div class="popup__price-item">
                            <span class="popup__price-name">Оптрагейт</span>
                            <span class="popup__price-value">800 р.</span>
                        </div>
                    </div>
                    
                    <div class="popup__price-section">
                        <h4 class="popup__price-section-title">Через 4 месяца</h4>
                        <div class="popup__price-item">
                            <span class="popup__price-name">Коронка на импланте</span>
                            <span class="popup__price-value">20 000 р.</span>
                        </div>
                        <div class="popup__price-item">
                            <span class="popup__price-name">Интраоральное сканирование</span>
                            <span class="popup__price-value">3 600 р.</span>
                        </div>
                        <div class="popup__price-item">
                            <span class="popup__price-name">Анестезия</span>
                            <span class="popup__price-value">800 р.</span>
                        </div>
                        <div class="popup__price-item">
                            <span class="popup__price-name">Оптрагейт</span>
                            <span class="popup__price-value">800 р.</span>
                        </div>
                    </div>
                    
                    <div class="popup__price-total">
                        <span class="popup__price-total-label">69 800 р.</span>
                    </div>
                </div>
            </div>

            <!-- Форма заявки -->
            <div id="popup-form-pane" class="popup__pane">
                <h3 class="popup__pane-title" id="popup-2-title">Оставьте заявку</h3>
                <p class="popup__pane-subtitle">
                    Мы перезвоним вам в ближайшее время, разберём вашу ситуацию, подскажем подходящие варианты имплантации и запишем на консультацию, если захотите.
                </p>
                
                <div class="popup__form">
                    <?php echo do_shortcode('[contact-form-7 id="2a35edb" title="Заявка общая"]'); ?>

                    <?php dental_clinic_v2_privacy_notice(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Попапы услуг: подробное описание каждой услуги + короткая заявка -->

<div id="popup-service-1" class="popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-1-title">
    <div class="popup__overlay"></div>
    <div class="popup__content" role="document">
        <button class="popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="popup__title" id="popup-service-1-title">Бережная имплантация</h2>
        <p class="popup__subtitle">
            Бережная имплантация подходит тем, кто хочет восстановить зубы с максимальным комфортом, без стресса и лишних посещений.
            Мы заранее планируем каждый этап лечения по КТ‑диагностике, используем современные системы имплантов и анестезии,
            чтобы операция проходила быстро, предсказуемо и с минимальной травматичностью для тканей.
        </p>

        <div class="popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-2" class="popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-2-title">
    <div class="popup__overlay"></div>
    <div class="popup__content" role="document">
        <button class="popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="popup__title" id="popup-service-2-title">Коронки</h2>
        <p class="popup__subtitle">
            Коронки помогают восстановить форму, цвет и функцию сильно разрушенных зубов.
            В собственной лаборатории изготавливаем конструкции под ваш прикус и улыбку,
            используя импортные материалы с проверенной прочностью и долговечностью.
            Чаще всего готовую коронку можно установить уже в течение одного дня после подготовки зуба.
        </p>

        <div class="popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-3" class="popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-3-title">
    <div class="popup__overlay"></div>
    <div class="popup__content" role="document">
        <button class="popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="popup__title" id="popup-service-3-title">Виниры</h2>
        <p class="popup__subtitle">
            Виниры позволяют создать гармоничную, «кинематографичную» улыбку без грубого обтачивания живых зубов.
            Мы работаем по технологиям ведущих мировых экспертов, тщательно согласуем форму и оттенок,
            чтобы реставрации выглядели естественно и аккуратно в жизни, а не только на фотографиях.
        </p>

        <div class="popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-4" class="popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-4-title">
    <div class="popup__overlay"></div>
    <div class="popup__content" role="document">
        <button class="popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="popup__title" id="popup-service-4-title">Все виды лечения</h2>
        <p class="popup__subtitle">
            В одном месте вы можете пройти полный путь лечения: от диагностики и терапии до сложной хирургии и ортопедии.
            Мы используем современную анестезию, подбираем схемы лечения под ваш график и бюджет
            и обязательно объясняем каждый шаг заранее, чтобы не было сюрпризов по времени и стоимости.
        </p>

        <div class="popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-5" class="popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-5-title">
    <div class="popup__overlay"></div>
    <div class="popup__content" role="document">
        <button class="popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="popup__title" id="popup-service-5-title">Отбеливание</h2>
        <p class="popup__subtitle">
            Профессиональное отбеливание в ЦЭСИ позволяет осветлить зубы на несколько тонов без вреда для эмали.
            Мы подбираем систему и режим процедуры с учётом исходного оттенка, чувствительности зубов и ваших ожиданий,
            а также даём понятные рекомендации по поддержанию результата в течение нескольких лет.
        </p>

        <div class="popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-6" class="popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-6-title">
    <div class="popup__overlay"></div>
    <div class="popup__content" role="document">
        <button class="popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="popup__title" id="popup-service-6-title">Миорелаксация жевательных мышц</h2>
        <p class="popup__subtitle">
            Миорелаксация жевательных мышц с помощью TENS‑терапии помогает снять хроническое напряжение,
            головные боли и дискомфорт в области челюстей. Мягкие импульсы расслабляют мышцы,
            улучшают кровоток и восстанавливают более физиологичное положение нижней челюсти,
            что особенно важно при бруксизме и перегрузке суставов.
        </p>

        <div class="popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>
