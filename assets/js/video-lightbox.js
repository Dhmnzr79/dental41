/**
 * Универсальный лайтбокс для видео
 * Поддерживает VK, Vimeo, YouTube, RuTube
 */
document.addEventListener('DOMContentLoaded', function () {
    var videoButtons = document.querySelectorAll('.reviews__video-btn, .doctors__video-btn');
    if (!videoButtons.length) return;

    var overlay = null;

    /**
     * Проверяет, является ли строка iframe кодом
     */
    function isIframeCode(str) {
        if (!str) return false;
        var trimmed = str.trim();
        // Проверяем на iframe тег (может быть с HTML entities)
        var hasIframeStart = trimmed.indexOf('<iframe') !== -1 || trimmed.indexOf('&lt;iframe') !== -1;
        var hasIframeEnd = trimmed.indexOf('</iframe>') !== -1 || trimmed.indexOf('&lt;/iframe&gt;') !== -1;
        return hasIframeStart && hasIframeEnd;
    }

    /**
     * Извлекает iframe из HTML строки
     * Также обрабатывает HTML entities
     */
    function extractIframe(html) {
        // Сначала пробуем найти обычный iframe
        var match = html.match(/<iframe[^>]*>[\s\S]*?<\/iframe>/i);
        if (match) return match[0];
        
        // Если не нашли, пробуем найти с HTML entities
        // Декодируем HTML entities
        var tempDiv = document.createElement('div');
        tempDiv.innerHTML = html;
        var decoded = tempDiv.textContent || tempDiv.innerText || '';
        
        // Пробуем найти iframe в декодированном тексте
        match = decoded.match(/<iframe[^>]*>[\s\S]*?<\/iframe>/i);
        if (match) return match[0];
        
        // Если ничего не нашли, возвращаем исходную строку
        return html.trim();
    }

    /**
     * Парсит URL видео и возвращает embed URL для iframe
     * Или возвращает готовый iframe код, если передан iframe
     */
    function getVideoEmbedUrl(videoData) {
        if (!videoData) return null;

        var trimmed = videoData.trim();

        // Если это iframe код - возвращаем его как есть
        if (isIframeCode(trimmed)) {
            return {
                type: 'iframe',
                html: extractIframe(trimmed) || trimmed
            };
        }

        // Иначе парсим как URL
        var url = trimmed;

        // Сначала проверяем, если это уже embed URL VK
        if (url.indexOf('vk.com/video_ext.php') !== -1) {
            return {
                type: 'url',
                url: url
            };
        }

        // VK видео - парсим обычные ссылки
        // Форматы: https://vk.com/video-123456_78901234 (oid отрицательный)
        //          https://vk.com/video123456_78901234 (oid положительный)
        //          https://vk.com/video?z=video-123456_78901234
        var vkMatch = url.match(/vk\.com\/video(?:-|\?z=video-)?(-?\d+)_(\d+)/);
        if (vkMatch) {
            var oid = vkMatch[1];
            var id = vkMatch[2];
            // Для VK embed нужен формат: https://vk.com/video_ext.php?oid=...&id=...
            // oid оставляем как есть из исходной ссылки
            return {
                type: 'url',
                url: 'https://vk.com/video_ext.php?oid=' + oid + '&id=' + id
            };
        }

        // YouTube
        // Форматы: https://www.youtube.com/watch?v=VIDEO_ID
        //          https://youtu.be/VIDEO_ID
        //          https://www.youtube.com/embed/VIDEO_ID
        var youtubeMatch = url.match(/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([^&\n?#]+)/);
        if (youtubeMatch) {
            return {
                type: 'url',
                url: 'https://www.youtube.com/embed/' + youtubeMatch[1]
            };
        }

        // Vimeo
        // Форматы: https://vimeo.com/VIDEO_ID
        //          https://player.vimeo.com/video/VIDEO_ID
        var vimeoMatch = url.match(/(?:vimeo\.com\/|player\.vimeo\.com\/video\/)(\d+)/);
        if (vimeoMatch) {
            return {
                type: 'url',
                url: 'https://player.vimeo.com/video/' + vimeoMatch[1]
            };
        }

        // RuTube
        // Форматы: https://rutube.ru/video/VIDEO_ID/
        var rutubeMatch = url.match(/rutube\.ru\/video\/([^\/\n?#]+)/);
        if (rutubeMatch) {
            return {
                type: 'url',
                url: 'https://rutube.ru/play/embed/' + rutubeMatch[1]
            };
        }

        // Если не распознан формат, возвращаем исходный URL (может быть уже embed URL)
        return {
            type: 'url',
            url: url
        };
    }

    /**
     * Открывает лайтбокс с видео
     */
    function openVideoLightbox(videoData) {
        if (!videoData) {
            console.error('videoData пусто');
            return;
        }

        var embedData = getVideoEmbedUrl(videoData);
        if (!embedData) {
            console.error('Не удалось определить формат видео:', videoData);
            return;
        }
        
        console.log('embedData:', embedData);

        // Создаем overlay, если его еще нет
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.className = 'video-lightbox';
            overlay.innerHTML = '\
<div class="video-lightbox__backdrop"></div>\
<div class="video-lightbox__inner">\
  <button class="video-lightbox__close" aria-label="Закрыть видео">×</button>\
  <div class="video-lightbox__video-wrapper"></div>\
</div>';
            document.body.appendChild(overlay);

            // Обработчики закрытия
            overlay.querySelector('.video-lightbox__backdrop').addEventListener('click', closeVideoLightbox);
            overlay.querySelector('.video-lightbox__close').addEventListener('click', closeVideoLightbox);

            // Закрытие по Escape
            document.addEventListener('keydown', function handleEscape(e) {
                if (e.key === 'Escape' && overlay && overlay.classList.contains('video-lightbox--visible')) {
                    closeVideoLightbox();
                }
            });
        }

        var wrapper = overlay.querySelector('.video-lightbox__video-wrapper');
        
        // Очищаем предыдущее содержимое
        wrapper.innerHTML = '';

        if (embedData.type === 'iframe') {
            // Если это готовый iframe код - вставляем его как есть
            wrapper.innerHTML = embedData.html;
            
            // Масштабируем iframe после вставки
            var iframe = wrapper.querySelector('iframe');
            if (iframe) {
                // Пробуем сразу, если iframe уже в DOM
                scaleIframe(iframe);
                
                // Также пробуем после небольшой задержки на случай, если iframe еще загружается
                setTimeout(function() {
                    scaleIframe(iframe);
                }, 50);
            }
        } else {
            // Если это URL - создаем iframe
            var iframe = document.createElement('iframe');
            iframe.className = 'video-lightbox__iframe';
            iframe.src = embedData.url;
            iframe.setAttribute('frameborder', '0');
            iframe.setAttribute('allow', 'autoplay; fullscreen; picture-in-picture; encrypted-media; screen-wake-lock');
            iframe.setAttribute('allowfullscreen', '');
            wrapper.appendChild(iframe);
        }

        // Показываем лайтбокс
        overlay.classList.add('video-lightbox--visible');
        document.body.classList.add('popup-open');
    }

    /**
     * Масштабирует iframe с сохранением пропорций
     */
    function scaleIframe(iframe) {
        var originalWidth = parseInt(iframe.getAttribute('width')) || iframe.offsetWidth;
        var originalHeight = parseInt(iframe.getAttribute('height')) || iframe.offsetHeight;
        
        if (!originalWidth || !originalHeight) {
            // Если размеры не указаны, используем стандартные пропорции
            iframe.style.width = '90vw';
            iframe.style.maxWidth = '1200px';
            iframe.style.height = 'auto';
            return;
        }
        
        var aspectRatio = originalWidth / originalHeight;
        var maxWidth = Math.min(window.innerWidth * 0.9, 1200);
        var maxHeight = window.innerHeight * 0.9;
        
        var finalWidth, finalHeight;
        
        // Определяем, вертикальное или горизонтальное видео
        if (originalHeight > originalWidth) {
            // Вертикальное видео - масштабируем по высоте
            finalHeight = Math.min(maxHeight, originalHeight);
            finalWidth = finalHeight * aspectRatio;
            
            // Если ширина превышает максимум, пересчитываем
            if (finalWidth > maxWidth) {
                finalWidth = maxWidth;
                finalHeight = finalWidth / aspectRatio;
            }
        } else {
            // Горизонтальное видео - масштабируем по ширине
            finalWidth = Math.min(maxWidth, originalWidth);
            finalHeight = finalWidth / aspectRatio;
            
            // Если высота превышает максимум, пересчитываем
            if (finalHeight > maxHeight) {
                finalHeight = maxHeight;
                finalWidth = finalHeight * aspectRatio;
            }
        }
        
        iframe.style.width = finalWidth + 'px';
        iframe.style.height = finalHeight + 'px';
        iframe.style.maxWidth = '100%';
        iframe.style.maxHeight = '90vh';
    }

    /**
     * Закрывает лайтбокс
     */
    function closeVideoLightbox() {
        if (!overlay) return;

        overlay.classList.remove('video-lightbox--visible');
        document.body.classList.remove('popup-open');

        // Останавливаем видео, очищая содержимое wrapper
        var wrapper = overlay.querySelector('.video-lightbox__video-wrapper');
        if (wrapper) {
            // Останавливаем все iframe внутри
            var iframes = wrapper.querySelectorAll('iframe');
            iframes.forEach(function(iframe) {
                iframe.src = '';
            });
            wrapper.innerHTML = '';
        }
    }

    // Обработчики кликов по кнопкам видео
    videoButtons.forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            var videoData = button.getAttribute('data-video');
            if (videoData) {
                // Декодируем HTML entities, если они есть (WordPress может экранировать)
                var tempDiv = document.createElement('div');
                tempDiv.innerHTML = videoData;
                var decoded = tempDiv.textContent || tempDiv.innerText || videoData;
                // Используем декодированное значение, если оно отличается от исходного
                openVideoLightbox(decoded !== videoData ? decoded : videoData);
            }
        });
    });
});

