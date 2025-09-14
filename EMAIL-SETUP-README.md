# Настройка отправки email заявок

## 🚀 Быстрый старт

1. **Скопируйте файл настроек:**

    ```bash
    cp smtp-config-local-example.php smtp-config-local.php
    ```

2. **Отредактируйте `smtp-config-local.php`:**
    - Замените `your-email@yandex.ru` на ваш email
    - Замените `your-app-password-here` на пароль приложения
    - Замените `info@dental41.ru` на email для получения заявок

3. **Готово!** Заявки будут отправляться автоматически.

## 📧 Настройка для разных провайдеров

### Яндекс.Почта (рекомендуется для РФ)

```php
$smtp_configs['yandex'] = array(
    'host' => 'smtp.yandex.ru',
    'port' => 587,
    'encryption' => 'tls',
    'username' => 'your-email@yandex.ru',
    'password' => 'your-app-password', // Пароль приложения!
    'from_email' => 'your-email@yandex.ru',
    'from_name' => 'Стоматология Dental41'
);
```

**Важно:** Используйте пароль приложения, а не основной пароль!

### Mail.ru

```php
$smtp_configs['mailru'] = array(
    'host' => 'smtp.mail.ru',
    'port' => 587,
    'encryption' => 'tls',
    'username' => 'your-email@mail.ru',
    'password' => 'your-password',
    'from_email' => 'your-email@mail.ru',
    'from_name' => 'Стоматология Dental41'
);
```

### Gmail (может не работать в РФ)

```php
$smtp_configs['gmail'] = array(
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'encryption' => 'tls',
    'username' => 'your-email@gmail.com',
    'password' => 'your-app-password', // Пароль приложения!
    'from_email' => 'your-email@gmail.com',
    'from_name' => 'Стоматология Dental41'
);
```

### SMTP хостинга

```php
$smtp_configs['hosting'] = array(
    'host' => 'mail.your-hosting.com', // Уточните у хостинга
    'port' => 587, // или 465, 25
    'encryption' => 'tls', // или 'ssl', 'none'
    'username' => 'your-email@your-domain.com',
    'password' => 'your-password',
    'from_email' => 'your-email@your-domain.com',
    'from_name' => 'Стоматология Dental41'
);
```

## 🔧 Как получить пароль приложения

### Яндекс.Почта:

1. Зайдите в настройки аккаунта
2. Безопасность → Пароли приложений
3. Создайте новый пароль для "Почтовый клиент"
4. Используйте этот пароль в настройках

### Gmail:

1. Настройки аккаунта → Безопасность
2. Двухэтапная аутентификация → Пароли приложений
3. Создайте пароль для "Почта"
4. Используйте этот пароль в настройках

## 🐛 Отладка

### Проверка логов:

```bash
tail -f /path/to/wordpress/wp-content/debug.log
```

### Тестовая отправка:

Создайте тестовую форму и проверьте:

1. Приходят ли заявки на email
2. Есть ли ошибки в логах
3. Правильно ли настроен SMTP

### Частые проблемы:

**"Authentication failed"**

- Проверьте username/password
- Используйте пароль приложения для Gmail/Яндекс

**"Connection refused"**

- Проверьте host/port
- Убедитесь, что хостинг не блокирует SMTP

**"SSL/TLS error"**

- Попробуйте изменить encryption на 'tls' или 'ssl'
- Проверьте порт (587 для TLS, 465 для SSL)

## 📋 Что включено в заявку

Каждая заявка содержит:

- ✅ Имя клиента
- ✅ Телефон
- ✅ Email (если указан)
- ✅ Сообщение (если указано)
- ✅ Тип формы
- ✅ Время отправки
- ✅ IP адрес
- ✅ User Agent

## 🔒 Безопасность

- Все данные проходят валидацию
- Пароли хранятся в отдельном файле
- Логирование всех отправок
- Защита от спама

## 📞 Поддержка

Если возникли проблемы:

1. Проверьте логи WordPress
2. Убедитесь в правильности настроек SMTP
3. Протестируйте с простой формой
4. Обратитесь к хостинг-провайдеру за настройками SMTP
