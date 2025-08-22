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
            
            <p class="popup-policy">
                Нажимая кнопку, вы соглашаетесь с <a href="/privacy-policy">политикой конфиденциальности</a>
            </p>
        </form>
    </div>
</div>

<!-- Попап 2: Расширенная форма с деталями -->
<div id="popup-2" class="popup-overlay" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="popup-modal" role="document">
        <div class="popup-header">
            <h2 class="popup-title">Оставьте заявку</h2>
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
                <h3>Имплантация за 1 день</h3>
                <p>Установим имплант и временную коронку уже на первом визите. 99,8% приживаемость.</p>
                
                <ul class="popup-features">
                    <li>Осмотр и диагностика</li>
                    <li>План лечения</li>
                    <li>Расчёт стоимости</li>
                    <li>Ответы на вопросы</li>
                </ul>
                
                <div class="popup-price">
                    <div class="price-item">
                        <span>Консультация</span>
                        <span>Бесплатно</span>
                    </div>
                    <div class="price-item">
                        <span>Диагностика</span>
                        <span>Бесплатно</span>
                    </div>
                    <div class="price-item">
                        <span>План лечения</span>
                        <span>Бесплатно</span>
                    </div>
                    <div class="price-total">
                        <span>Итого:</span>
                        <span>Бесплатно</span>
                    </div>
                </div>
            </div>

            <!-- Форма заявки -->
            <div id="popup-form-pane" class="popup-pane">
                <form class="popup-form" method="post">
                    <input type="text" name="name" class="popup-field" placeholder="Ваше имя" autocomplete="name" required>
                    <input type="tel" name="phone" class="popup-field" placeholder="+7 (___) ___-__-__" inputmode="numeric" autocomplete="tel" required>
                    
                    <button type="submit" class="popup-cta">Отправить заявку</button>
                    
                    <p class="popup-policy">
                        Нажимая кнопку, вы соглашаетесь с <a href="/privacy-policy">политикой конфиденциальности</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
