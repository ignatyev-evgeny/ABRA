# ABRA Shop - E-commerce Platform

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net/)
[![Livewire](https://img.shields.io/badge/Livewire-2.x-purple.svg)](https://laravel-livewire.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.0-blue.svg)](https://getbootstrap.com/)

**Примечание**: Проект создан в качестве тестового задания и демонстрирует современные подходы к разработке веб-приложений на Laravel.

## 📋 Описание проекта

ABRA Shop - это современная торговая платформа, построенная на Laravel с использованием Livewire для реактивного пользовательского интерфейса. Проект представляет собой полнофункциональный интернет-магазин с системой управления продуктами и корзинами покупок.

## 🎯 Цель проекта

Разработать торговую платформу, состоящую из двух основных страниц:

- **Главная страница** - отображение 6 продуктов с названием, изображением, ценой и кнопкой "Добавить в корзину"
- **Корзина** - показ продуктов, добавленных пользователем в корзину

Дополнительно реализована система авторизации и административная панель для управления продуктами.

## ✨ Реализованный функционал

### 🔐 Система авторизации
- **Регистрация пользователей** - с полями Username и Email
- **Авторизация** - вход по логину и паролю
- **Автоматическая генерация паролей** при регистрации

### 👤 Пользовательская часть
- **Главная страница** - каталог продуктов с возможностью добавления в корзину
- **Корзина покупок** - просмотр добавленных товаров с подсчетом общей стоимости
- **Динамическое обновление** счетчика товаров в навигации (без перезагрузки страницы)

### ⚙️ Административная панель
- **Управление продуктами** - просмотр, добавление и удаление товаров
- **Управление корзинами** - просмотр и удаление корзин пользователей
- **Загрузка изображений** для продуктов

### 💾 Техническая реализация
- **Сохранение корзин** как для авторизованных пользователей, так и для гостей (по session_id)
- **Реактивный интерфейс** с использованием Livewire
- **Responsive дизайн** на Bootstrap 5
- **Soft Delete** для продуктов
- **Система логирования** для отслеживания ошибок

## 🛠 Технический стек

- **Backend**: Laravel 10.x, PHP 8.1+
- **Frontend**: Livewire 2.x, Bootstrap 5.3.0, Vite
- **База данных**: MySQL 8.0
- **Контейнеризация**: Docker (Laravel Sail)
- **Иконки**: Bootstrap Icons
- **Стили**: CSS, Bootstrap

## 📁 Структура проекта

```
├── app/
│   ├── Http/
│   │   ├── Controllers/         # Контроллеры
│   │   └── Livewire/           # Livewire компоненты
│   ├── Models/                 # Модели данных
│   └── View/Components/        # Blade компоненты
├── database/
│   └── migrations/             # Миграции БД
├── resources/
│   ├── views/                  # Blade шаблоны
│   ├── css/                    # Стили
│   └── js/                     # JavaScript
├── routes/
│   └── web.php                 # Веб-маршруты
└── docker-compose.yml          # Docker конфигурация
```

## 🚀 Установка и запуск

### Предварительные требования
- Docker и Docker Compose
- Git

### Шаги установки

1. **Клонирование репозитория**
```bash
git clone <repository-url>
cd abra-shop
```

2. **Настройка окружения**
```bash
cp .env.example .env
```

3. **Запуск через Docker Sail**
```bash
# Установка зависимостей
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

# Запуск контейнеров
./vendor/bin/sail up -d

# Генерация ключа приложения
./vendor/bin/sail artisan key:generate

# Выполнение миграций
./vendor/bin/sail artisan migrate

# Создание символической ссылки для storage
./vendor/bin/sail artisan storage:link

# Установка frontend зависимостей
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

### Альтернативная установка (без Docker)

1. **Установка зависимостей**
```bash
composer install
npm install
```

2. **Настройка базы данных**
```bash
# Настроить подключение к БД в .env
php artisan key:generate
php artisan migrate
php artisan storage:link
```

3. **Запуск сервера**
```bash
php artisan serve
npm run dev
```

## 🎨 Структура базы данных

### Таблицы

- **users** - пользователи системы
- **products** - каталог продуктов
- **baskets** - корзины покупок
- **sessions** - сессии пользователей

### Ключевые поля

```sql
-- products
id, name, price, image, deleted_at, created_at, updated_at

-- baskets  
id, user_id, session_id, goods (JSON), created_at, updated_at

-- users
id, name, email, password, created_at, updated_at
```

## 🔧 Конфигурация

### Переменные окружения (.env)
```env
APP_NAME=Laravel
APP_ENV=local
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_DATABASE=abra
# ... другие настройки
```

### Vite конфигурация
```javascript
// Настроена для сборки CSS и JS ресурсов
// Поддержка Bootstrap и пользовательских стилей
```

## 📱 Использование

### Для пользователей
1. Перейдите на главную страницу
2. Просмотрите доступные продукты
3. Добавьте товары в корзину
4. Перейдите в корзину для просмотра заказа

### Для администраторов
1. Зарегистрируйтесь или войдите в систему
2. Используйте административную панель для:
   - Добавления новых продуктов
   - Управления существующими товарами
   - Просмотра корзин пользователей

## 🧪 Тестирование

```bash
# Запуск тестов
./vendor/bin/sail artisan test
# или
php artisan test
```

## 📝 API и маршруты

### Основные маршруты
- `GET /` - Главная страница
- `GET /signin` - Страница входа
- `GET /signup` - Страница регистрации
- `GET /basket` - Корзина покупок
- `GET /cabinet/product/list` - Управление продуктами (требует авторизации)
- `GET /cabinet/baskets/list` - Управление корзинами (требует авторизации)

