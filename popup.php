<?php
/**
 * Попапы для стоматологической клиники
 * Интегрированные в WordPress
 */
?>

<!-- Попап 1: Простая форма заявки -->
<div id="popup-1" class="popup-overlay" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="popup-sheet" role="document">
        <button class="popup-close" aria-label="Закрыть" onclick="closePopup()">✕</button>

        <h2>Оставьте заявку</h2>
        <p class="popup-subtitle">
            Мы перезвоним вам в ближайшее время, разберём вашу ситуацию,
            подскажем подходящие варианты имплантации и запишем на консультацию, если захотите.
        </p>

        <form class="popup-form" method="post">
            <input type="text" name="name" class="popup-field" placeholder="Ваше имя" autocomplete="name" required>
            <input type="tel" name="phone" class="popup-field" placeholder="+7 (___) ___-__-__" inputmode="numeric" autocomplete="tel" required>
            
            <button type="submit" class="popup-cta">Отправить заявку</button>
            
            <a href="https://wa.me/79000000000" class="popup-whatsapp" target="_blank" rel="noopener">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                </svg>
                Написать в WhatsApp
            </a>
            
            <p class="popup-policy">
                Нажимая кнопку, вы соглашаетесь с <a href="https://dental41.ru/privacy.pdf" target="_blank" rel="noopener">политикой конфиденциальности</a>
            </p>
        </form>
    </div>
</div>

<!-- Попап 2: Расширенная форма с деталями -->
<div id="popup-2" class="popup-overlay" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="popup-modal" role="document">
        <div class="popup-header">
            <button class="popup-close" aria-label="Закрыть" onclick="closePopup()">✕</button>
        </div>

        <!-- Табы (только мобилка) -->
        <div class="popup-tabs" id="popup-tabs" aria-hidden="true">
            <button class="popup-tab is-active" data-target="#popup-info-pane">Информация</button>
            <button class="popup-tab" data-target="#popup-form-pane">Заявка</button>
        </div>

        <div class="popup-body">
            <!-- Информационная панель об импланте -->
            <div id="popup-info-pane" class="popup-pane popup-pane--info is-active">
                <h3>Impro</h3>
                
                <div class="popup-price-grid">
                    <div class="price-section">
                        <div class="price-item">
                            <span class="service-name">Вживление импланта Implantium</span>
                            <span class="service-price">30 000 р.</span>
                        </div>
                        <div class="price-item">
                            <span class="service-name">Абатмент</span>
                            <span class="service-price">13 000 р.</span>
                        </div>
                        <div class="price-item">
                            <span class="service-name">Анестезия</span>
                            <span class="service-price">800 р.</span>
                        </div>
                        <div class="price-item">
                            <span class="service-name">Оптрагейт</span>
                            <span class="service-price">800 р.</span>
                        </div>
                    </div>
                    
                    <div class="price-section">
                        <h4 class="section-title">Через 4 месяца</h4>
                        <div class="price-item">
                            <span class="service-name">Коронка на импланте</span>
                            <span class="service-price">20 000 р.</span>
                        </div>
                        <div class="price-item">
                            <span class="service-name">Интраоральное сканирование</span>
                            <span class="service-price">3 600 р.</span>
                        </div>
                        <div class="price-item">
                            <span class="service-name">Анестезия</span>
                            <span class="service-price">800 р.</span>
                        </div>
                        <div class="price-item">
                            <span class="service-name">Оптрагейт</span>
                            <span class="service-price">800 р.</span>
                        </div>
                    </div>
                    
                    <div class="price-total">
                        <span class="total-label">69 800 р.</span>
                    </div>
                </div>
            </div>

            <!-- Форма заявки -->
            <div id="popup-form-pane" class="popup-pane">
                <h3>Оставьте заявку</h3>
                <p class="popup-form-subtitle">
                    Мы перезвоним вам в ближайшее время, разберём вашу ситуацию, подскажем подходящие варианты имплантации и запишем на консультацию, если захотите.
                </p>
                
                <form class="popup-form" method="post">
                    <input type="text" name="name" class="popup-field" placeholder="Ваше имя" autocomplete="name" required>
                    <input type="tel" name="phone" class="popup-field" placeholder="+7 (___) ___-__-__" inputmode="numeric" autocomplete="tel" required>
                    
                    <button type="submit" class="popup-cta">Отправить заявку</button>
                    
                    <a href="https://wa.me/79000000000" class="popup-whatsapp" target="_blank" rel="noopener">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                        </svg>
                        Написать в WhatsApp
                    </a>
                    
                    <p class="popup-policy">
                        Нажимая кнопку, вы соглашаетесь с <a href="https://dental41.ru/privacy.pdf" target="_blank" rel="noopener">политикой конфиденциальности</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
