# WP структура и шаблон: 12-колоночная сетка

Цель: быстрый старт темы/чайлд-темы с 12-колоночной флюидной сеткой.
Брейки: **768 / 1280 / 1400**. Gap на десктопе: **30px**. Типографика: **h2 = 44px**, **h3 = 22px**.

## Структура папок (минимум)

```
/assets/css/v2/
  base.css
  layout.css
  components.css
  utilities.css
  pages/
    home.css
    blog.css
```

## Подключение стилей (фрагмент `functions.php`)

```php
<?php
add_action('wp_enqueue_scripts', function () {
  $ver = wp_get_theme()->get('Version');
  $uri = get_stylesheet_directory_uri() . '/assets/css/v2/';

  wp_enqueue_style('v2-base',       $uri.'base.css',       [], $ver);
  wp_enqueue_style('v2-layout',     $uri.'layout.css',     ['v2-base'], $ver);
  wp_enqueue_style('v2-components', $uri.'components.css', ['v2-layout'], $ver);
  wp_enqueue_style('v2-utilities',  $uri.'utilities.css',  ['v2-components'], $ver);
});
```

## `base.css` (переменные, reset, типографика)

```css
:root {
    --brk-sm: 768px;
    --brk-lg: 1280px;
    --brk-xl: 1400px;

    --container-max: 1400px;
    --gutter-mob: 16px;
    --gutter-desk: 24px;

    --col-gap-mob: 16px;
    --col-gap-desk: 30px; /* десктопный gap */
}

html {
    box-sizing: border-box;
}
*,
*::before,
*::after {
    box-sizing: inherit;
}

body {
    margin: 0;
    font-family:
        system-ui,
        -apple-system,
        Segoe UI,
        Roboto,
        Inter,
        Arial,
        sans-serif;
    line-height: 1.5;
    color: #111;
}

/* Заголовки (десктопные размеры обязательны) */
h2 {
    font-size: clamp(28px, 4vw, 44px);
    line-height: 1.2;
}
h3 {
    font-size: clamp(18px, 2.4vw, 22px);
    line-height: 1.3;
}
```

## `layout.css` (контейнер + 12 колонок)

```css
/* Контейнер */
.v2-site .v2-container {
    width: min(var(--container-max), 100% - 2 * var(--gutter-mob));
    margin-inline: auto;
    padding-inline: var(--gutter-mob);
}

@media (min-width: var(--brk-lg)) {
    .v2-site .v2-container {
        width: min(var(--container-max), 100% - 2 * var(--gutter-desk));
        padding-inline: var(--gutter-desk);
    }
}

/* 12-колоночная grid-сетка */
.v2-site .v2-row {
    display: grid;
    grid-template-columns: repeat(12, minmax(0, 1fr));
    gap: var(--col-gap-mob);
}

@media (min-width: var(--brk-lg)) {
    .v2-site .v2-row {
        gap: var(--col-gap-desk);
    } /* 30px */
}

/* Колонки: синтаксис .v2-col-<n>, .v2-col-sm-<n>, .v2-col-lg-<n>, .v2-col-xl-<n> */
.v2-site [class^='v2-col-'],
.v2-site [class*=' v2-col-'] {
    min-width: 0;
}

/* Мобилка (по умолчанию — на всю ширину) */
.v2-site .v2-col-1,
.v2-site .v2-col-2,
.v2-site .v2-col-3,
.v2-site .v2-col-4,
.v2-site .v2-col-5,
.v2-site .v2-col-6,
.v2-site .v2-col-7,
.v2-site .v2-col-8,
.v2-site .v2-col-9,
.v2-site .v2-col-10,
.v2-site .v2-col-11,
.v2-site .v2-col-12 {
    grid-column: span 12;
}

/* ≥768 */
@media (min-width: var(--brk-sm)) {
    .v2-site .v2-col-sm-1 {
        grid-column: span 1;
    }
    .v2-site .v2-col-sm-2 {
        grid-column: span 2;
    }
    .v2-site .v2-col-sm-3 {
        grid-column: span 3;
    }
    .v2-site .v2-col-sm-4 {
        grid-column: span 4;
    }
    .v2-site .v2-col-sm-5 {
        grid-column: span 5;
    }
    .v2-site .v2-col-sm-6 {
        grid-column: span 6;
    }
    .v2-site .v2-col-sm-7 {
        grid-column: span 7;
    }
    .v2-site .v2-col-sm-8 {
        grid-column: span 8;
    }
    .v2-site .v2-col-sm-9 {
        grid-column: span 9;
    }
    .v2-site .v2-col-sm-10 {
        grid-column: span 10;
    }
    .v2-site .v2-col-sm-11 {
        grid-column: span 11;
    }
    .v2-site .v2-col-sm-12 {
        grid-column: span 12;
    }
}

/* ≥1280 */
@media (min-width: var(--brk-lg)) {
    .v2-site .v2-col-lg-1 {
        grid-column: span 1;
    }
    .v2-site .v2-col-lg-2 {
        grid-column: span 2;
    }
    .v2-site .v2-col-lg-3 {
        grid-column: span 3;
    }
    .v2-site .v2-col-lg-4 {
        grid-column: span 4;
    }
    .v2-site .v2-col-lg-5 {
        grid-column: span 5;
    }
    .v2-site .v2-col-lg-6 {
        grid-column: span 6;
    }
    .v2-site .v2-col-lg-7 {
        grid-column: span 7;
    }
    .v2-site .v2-col-lg-8 {
        grid-column: span 8;
    }
    .v2-site .v2-col-lg-9 {
        grid-column: span 9;
    }
    .v2-site .v2-col-lg-10 {
        grid-column: span 10;
    }
    .v2-site .v2-col-lg-11 {
        grid-column: span 11;
    }
    .v2-site .v2-col-lg-12 {
        grid-column: span 12;
    }
}

/* ≥1400 — опциональные уточнения для xl */
@media (min-width: var(--brk-xl)) {
    .v2-site .v2-row--tight-xl {
        gap: 20px;
    } /* пример модификатора строки для ultra-wide */
}
```

## Пример разметки (12 колонок)

```html
<section class="v2-section v2-block">
    <div class="v2-container">
        <div class="v2-row">
            <div class="v2-col-sm-6 v2-col-lg-4">
                <!-- карточка -->
            </div>
            <div class="v2-col-sm-6 v2-col-lg-8">
                <!-- контент -->
            </div>
        </div>
    </div>
</section>
```

## Утилиты (минимум)

```css
.v2-site .v2-section {
    padding-block: 48px;
}
@media (min-width: var(--brk-lg)) {
    .v2-site .v2-section {
        padding-block: 72px;
    }
}

.v2-site .v2-text-center {
    text-align: center;
}
.v2-site .v2-hidden {
    display: none;
}
.v2-site .v2-visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    margin: -1px;
    border: 0;
    padding: 0;
    clip: rect(0 0 0 0);
    overflow: hidden;
}
```

## Рекомендации по использованию

- Для карточек/галерей используйте классы `.v2-row` + `.v2-col-*/.v2-col-sm-*/.v2-col-lg-*`.
- Межколоночные отступы контролируются **переменными** (`--col-gap-*`), не задавайте `margin` на колонках.
- Заголовки `h2`/`h3` соблюдают указанные размеры на десктопе; допускается плавная адаптация на мобиле через `clamp()`.
- Все классы должны быть обернуты в `.v2-site` для изоляции от старых стилей.
