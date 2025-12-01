<?php
/**
 * Попапы для стоматологической клиники
 * Интегрированные в WordPress
 */
?>

<!-- Попап 1: Простая форма заявки -->
<div id="popup-1" class="v2-popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="v2-popup-title">
    <div class="v2-popup__overlay"></div>
    <div class="v2-popup__content" role="document">
        <button class="v2-popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="v2-popup__title" id="v2-popup-title">Оставьте заявку</h2>
        <p class="v2-popup__subtitle">
            Мы перезвоним вам в ближайшее время, разберём вашу ситуацию,
            подскажем подходящие варианты имплантации и запишем на консультацию, если захотите.
        </p>

        <div class="v2-popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2a35edb" title="Заявка общая"]'); ?>

            <a href="https://wa.me/79084952424" class="v2-popup__whatsapp" target="_blank" rel="noopener" aria-label="Написать в WhatsApp">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                </svg>
                Написать в WhatsApp
            </a>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<!-- Попап 2: Расширенная форма с деталями -->
<div id="popup-2" class="v2-popup v2-popup--extended" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="v2-popup-2-title">
    <div class="v2-popup__overlay"></div>
    <div class="v2-popup__content v2-popup__content--extended" role="document">
        <div class="v2-popup__header">
            <button class="v2-popup__close" aria-label="Закрыть" onclick="closePopup()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        <!-- Табы (только мобилка) -->
        <div class="v2-popup__tabs" id="popup-tabs" aria-hidden="true">
            <button class="v2-popup__tab v2-popup__tab--active" data-target="#popup-info-pane">Информация</button>
            <button class="v2-popup__tab" data-target="#popup-form-pane">Заявка</button>
        </div>

        <div class="v2-popup__body">
            <!-- Информационная панель об импланте -->
            <div id="popup-info-pane" class="v2-popup__pane v2-popup__pane--info v2-popup__pane--active">
                <h3 class="v2-popup__pane-title">Impro</h3>
                
                <div class="v2-popup__price-grid">
                    <div class="v2-popup__price-section">
                        <div class="v2-popup__price-item">
                            <span class="v2-popup__price-name">Вживление импланта Implantium</span>
                            <span class="v2-popup__price-value">30 000 р.</span>
                        </div>
                        <div class="v2-popup__price-item">
                            <span class="v2-popup__price-name">Абатмент</span>
                            <span class="v2-popup__price-value">13 000 р.</span>
                        </div>
                        <div class="v2-popup__price-item">
                            <span class="v2-popup__price-name">Анестезия</span>
                            <span class="v2-popup__price-value">800 р.</span>
                        </div>
                        <div class="v2-popup__price-item">
                            <span class="v2-popup__price-name">Оптрагейт</span>
                            <span class="v2-popup__price-value">800 р.</span>
                        </div>
                    </div>
                    
                    <div class="v2-popup__price-section">
                        <h4 class="v2-popup__price-section-title">Через 4 месяца</h4>
                        <div class="v2-popup__price-item">
                            <span class="v2-popup__price-name">Коронка на импланте</span>
                            <span class="v2-popup__price-value">20 000 р.</span>
                        </div>
                        <div class="v2-popup__price-item">
                            <span class="v2-popup__price-name">Интраоральное сканирование</span>
                            <span class="v2-popup__price-value">3 600 р.</span>
                        </div>
                        <div class="v2-popup__price-item">
                            <span class="v2-popup__price-name">Анестезия</span>
                            <span class="v2-popup__price-value">800 р.</span>
                        </div>
                        <div class="v2-popup__price-item">
                            <span class="v2-popup__price-name">Оптрагейт</span>
                            <span class="v2-popup__price-value">800 р.</span>
                        </div>
                    </div>
                    
                    <div class="v2-popup__price-total">
                        <span class="v2-popup__price-total-label">69 800 р.</span>
                    </div>
                </div>
            </div>

            <!-- Форма заявки -->
            <div id="popup-form-pane" class="v2-popup__pane">
                <h3 class="v2-popup__pane-title" id="v2-popup-2-title">Оставьте заявку</h3>
                <p class="v2-popup__pane-subtitle">
                    Мы перезвоним вам в ближайшее время, разберём вашу ситуацию, подскажем подходящие варианты имплантации и запишем на консультацию, если захотите.
                </p>
                
                <div class="v2-popup__form">
                    <?php echo do_shortcode('[contact-form-7 id="2a35edb" title="Заявка общая"]'); ?>

                    <a href="https://wa.me/79084952424" class="v2-popup__whatsapp" target="_blank" rel="noopener" aria-label="Написать в WhatsApp">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                        Написать в WhatsApp
                    </a>

                    <?php dental_clinic_v2_privacy_notice(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Попапы услуг: подробное описание каждой услуги + короткая заявка -->

<div id="popup-service-1" class="v2-popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-1-title">
    <div class="v2-popup__overlay"></div>
    <div class="v2-popup__content" role="document">
        <button class="v2-popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="v2-popup__title" id="popup-service-1-title">Бережная имплантация</h2>
        <p class="v2-popup__subtitle">
            Бережная имплантация подходит тем, кто хочет восстановить зубы с максимальным комфортом, без стресса и лишних посещений.
            Мы заранее планируем каждый этап лечения по КТ‑диагностике, используем современные системы имплантов и анестезии,
            чтобы операция проходила быстро, предсказуемо и с минимальной травматичностью для тканей.
        </p>

        <div class="v2-popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-2" class="v2-popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-2-title">
    <div class="v2-popup__overlay"></div>
    <div class="v2-popup__content" role="document">
        <button class="v2-popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="v2-popup__title" id="popup-service-2-title">Коронки</h2>
        <p class="v2-popup__subtitle">
            Коронки помогают восстановить форму, цвет и функцию сильно разрушенных зубов.
            В собственной лаборатории изготавливаем конструкции под ваш прикус и улыбку,
            используя импортные материалы с проверенной прочностью и долговечностью.
            Чаще всего готовую коронку можно установить уже в течение одного дня после подготовки зуба.
        </p>

        <div class="v2-popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-3" class="v2-popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-3-title">
    <div class="v2-popup__overlay"></div>
    <div class="v2-popup__content" role="document">
        <button class="v2-popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="v2-popup__title" id="popup-service-3-title">Виниры</h2>
        <p class="v2-popup__subtitle">
            Виниры позволяют создать гармоничную, «кинематографичную» улыбку без грубого обтачивания живых зубов.
            Мы работаем по технологиям ведущих мировых экспертов, тщательно согласуем форму и оттенок,
            чтобы реставрации выглядели естественно и аккуратно в жизни, а не только на фотографиях.
        </p>

        <div class="v2-popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-4" class="v2-popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-4-title">
    <div class="v2-popup__overlay"></div>
    <div class="v2-popup__content" role="document">
        <button class="v2-popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="v2-popup__title" id="popup-service-4-title">Все виды лечения</h2>
        <p class="v2-popup__subtitle">
            В одном месте вы можете пройти полный путь лечения: от диагностики и терапии до сложной хирургии и ортопедии.
            Мы используем современную анестезию, подбираем схемы лечения под ваш график и бюджет
            и обязательно объясняем каждый шаг заранее, чтобы не было сюрпризов по времени и стоимости.
        </p>

        <div class="v2-popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-5" class="v2-popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-5-title">
    <div class="v2-popup__overlay"></div>
    <div class="v2-popup__content" role="document">
        <button class="v2-popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="v2-popup__title" id="popup-service-5-title">Отбеливание</h2>
        <p class="v2-popup__subtitle">
            Профессиональное отбеливание в ЦЭСИ позволяет осветлить зубы на несколько тонов без вреда для эмали.
            Мы подбираем систему и режим процедуры с учётом исходного оттенка, чувствительности зубов и ваших ожиданий,
            а также даём понятные рекомендации по поддержанию результата в течение нескольких лет.
        </p>

        <div class="v2-popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>

<div id="popup-service-6" class="v2-popup" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="popup-service-6-title">
    <div class="v2-popup__overlay"></div>
    <div class="v2-popup__content" role="document">
        <button class="v2-popup__close" aria-label="Закрыть" onclick="closePopup()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>

        <h2 class="v2-popup__title" id="popup-service-6-title">Миорелаксация жевательных мышц</h2>
        <p class="v2-popup__subtitle">
            Миорелаксация жевательных мышц с помощью TENS‑терапии помогает снять хроническое напряжение,
            головные боли и дискомфорт в области челюстей. Мягкие импульсы расслабляют мышцы,
            улучшают кровоток и восстанавливают более физиологичное положение нижней челюсти,
            что особенно важно при бруксизме и перегрузке суставов.
        </p>

        <div class="v2-popup__form">
            <?php echo do_shortcode('[contact-form-7 id="2b8f7ea" title="Заявка короткая"]'); ?>

            <?php dental_clinic_v2_privacy_notice(); ?>
        </div>
    </div>
</div>
