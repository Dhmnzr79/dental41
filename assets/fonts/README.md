# Шрифты для темы Dental Clinic

## 📁 Структура папки
```
assets/fonts/
├── Inter-Regular.woff2    ✅ (400 weight)
├── Inter-Bold.woff2       ✅ (700 weight)
├── NTSomic-Medium.woff2   ✅ (500 weight)
├── NTSomic-Semibold.woff2 ✅ (600 weight)
├── NTSomic-Bold.woff2     ✅ (700 weight)
└── README.md
```

## 🎯 Текущие шрифты

### Inter (для основного текста)
- **Inter-Regular.woff2** - 400 weight ✅
- **Inter-Bold.woff2** - 700 weight ✅

### NTSomic (для заголовков)
- **NTSomic-Medium.woff2** - 500 weight ✅
- **NTSomic-Semibold.woff2** - 600 weight ✅
- **NTSomic-Bold.woff2** - 700 weight ✅

## 🎨 Текущие настройки

### Основной текст
- **Шрифт**: Inter
- **Размер**: 18px
- **Высота строки**: 1.5
- **Цвет**: #2A2A2A
- **Вес**: 400 (Regular)

### Заголовки
- **Шрифт**: NTSomic
- **Вес**: 600 (Semibold) по умолчанию
- **Цвет**: #2A2A2A
- **Высота строки**: 1.3

## ✅ Статус системы

### ✅ Готово к работе:
- **Inter** подключен для основного текста
- **NTSomic** подключен для заголовков
- **CSS переменные** настроены
- **Локальная загрузка** работает
- **Fallback шрифты** настроены

### 🎯 Результат:
- **Основной текст**: Inter 400, 18px, line-height 1.5, #2A2A2A
- **Заголовки**: NTSomic 600, #2A2A2A

## 🔧 Как изменить шрифт заголовков

### Способ 1: Через CSS переменную
В файле `fonts.css` измените переменную `--heading-font`:

```css
:root {
    --heading-font: 'NTSomic', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
}
```

### Способ 2: Через DevTools (быстрое тестирование)
1. Откройте DevTools (F12)
2. В консоли выполните:
```javascript
document.documentElement.style.setProperty('--heading-font', "'NTSomic', sans-serif");
```

## ✅ Проверка
После загрузки шрифтов:
1. Очистите кэш WordPress
2. Проверьте в DevTools (F12) → Network → Fonts
3. Убедитесь, что шрифты загружаются локально

## 🚀 Преимущества локальных шрифтов
- ✅ Быстрая загрузка
- ✅ Нет зависимости от внешних сервисов
- ✅ Лучший контроль над производительностью
- ✅ Работает офлайн
