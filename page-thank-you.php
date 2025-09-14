<?php
/*
Template Name: Спасибо за заявку
*/
get_header(); ?>

<div class="page-content">
    <div class="container">
        
        <div class="page-article">
            <div class="thank-you-content">
                <div class="thank-you-icon">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#23BFCF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                
                <h2>Спасибо за заявку!</h2>
                <p>Мы получили вашу заявку и свяжемся с вами в ближайшее время.</p>
                
                <div class="thank-you-info">
                    <h3>Что происходит дальше:</h3>
                    <ul>
                        <li>Наш менеджер перезвонит вам в ближайшее время</li>
                        <li>Мы разберем вашу ситуацию и подберем подходящие варианты</li>
                        <li>Запишем вас на консультацию, если захотите</li>
                    </ul>
                </div>
                
                <div class="thank-you-actions">
                    <a href="<?php echo home_url(); ?>" class="btn-1">Вернуться на главную</a>
                    <a href="tel:+74152215499" class="btn-secondary">
                        <span class="btn-text">Позвонить нам</span>
                        <svg class="btn-arrow" width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.7347 6.6483C15.9046 6.47928 16 6.25007 16 6.01108C16 5.77208 15.9046 5.54287 15.7347 5.37385L10.6085 0.275158C10.5249 0.189074 10.4249 0.120411 10.3144 0.073174C10.2038 0.0259374 10.0849 0.00107371 9.96458 3.37663e-05C9.84426 -0.00100618 9.72493 0.0217987 9.61357 0.0671172C9.5022 0.112436 9.40103 0.179361 9.31595 0.263987C9.23086 0.348613 9.16358 0.449245 9.11802 0.560012C9.07245 0.67078 9.04952 0.789464 9.05057 0.909139C9.05162 1.02881 9.07661 1.14708 9.1241 1.25705C9.1716 1.36701 9.24063 1.46646 9.32718 1.54961L12.9065 5.10977L0.906168 5.10977C0.665837 5.10977 0.435349 5.20473 0.26541 5.37376C0.0954706 5.54278 3.39719e-07 5.77203 3.2927e-07 6.01108C3.18821e-07 6.25012 0.0954705 6.47937 0.26541 6.6484C0.435349 6.81742 0.665837 6.91238 0.906167 6.91238L12.9065 6.91238L9.32718 10.4725C9.16211 10.6425 9.07078 10.8702 9.07284 11.1065C9.07491 11.3428 9.17021 11.5689 9.33822 11.736C9.50623 11.9031 9.73351 11.9979 9.9711 12C10.2087 12.002 10.4376 11.9112 10.6085 11.7361L15.7347 6.6483Z" fill="currentColor"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.thank-you-content {
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
    padding: 40px 20px;
}

.thank-you-icon {
    margin-bottom: 30px;
}

.thank-you-content h1 {
    color: var(--brand-color);
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.thank-you-content h2 {
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: #333;
}

.thank-you-content p {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 30px;
    line-height: 1.6;
}

.thank-you-info {
    background: #f8f9fa;
    padding: 30px;
    border-radius: 15px;
    margin: 30px 0;
    text-align: center;
}

.thank-you-info h3 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.thank-you-info ul {
    list-style: none;
    padding: 0;
    text-align: left;
    display: inline-block;
    max-width: 400px;
}

.thank-you-info li {
    padding: 10px 0;
    border-bottom: 1px solid #e9ecef;
    position: relative;
    padding-left: 30px;
}

.thank-you-info li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: var(--brand-color);
    font-weight: bold;
    font-size: 1.2rem;
}

.thank-you-info li:last-child {
    border-bottom: none;
}

.thank-you-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 40px;
}

.thank-you-actions .btn-1 {
    text-decoration: none;
}

.thank-you-actions .btn-1:hover {
    text-decoration: none;
}

@media (max-width: 767px) {
    .thank-you-content {
        padding: 0;
    }
    
    .thank-you-content p {
        text-align: center;
    }
    
    .thank-you-content h1 {
        font-size: 2rem;
    }
    
    .thank-you-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .thank-you-actions .btn-1,
    .thank-you-actions .btn-secondary {
        width: 100%;
        max-width: 300px;
    }
}
</style>

<?php get_footer(); ?>
