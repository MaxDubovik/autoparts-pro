# Design System - AutoParts Pro

## Обзор

Единая система дизайна для создания футуристического, но удобного интерфейса интернет-магазина автозапчастей.

## Цветовая палитра

### Основные цвета

```css
--primary-dark: #0a0e27    /* Темный фон */
--primary: #1a1a2e          /* Основной цвет */
--primary-light: #16213e    /* Светлый вариант */
--primary-lighter: #0f3460  /* Еще светлее */
```

### Акцентные цвета

```css
--accent: #00d4ff           /* Голубой акцент (основной) */
--accent-hover: #00b8e6    /* При наведении */
--secondary: #ff6b35       /* Оранжевый акцент */
--secondary-hover: #e55a2b /* При наведении */
```

### Статусные цвета

```css
--success: #00ff88         /* Успех */
--warning: #ffd700        /* Предупреждение */
--danger: #ff3366         /* Ошибка */
--info: #00d4ff           /* Информация */
```

## Градиенты

### Основные градиенты

```css
/* Фон страницы */
--gradient-primary: linear-gradient(135deg, #0a0e27 0%, #1a1a2e 50%, #16213e 100%);

/* Hero секция */
--gradient-hero: linear-gradient(135deg, #0a0e27 0%, #1a1a2e 30%, #16213e 60%, #0f3460 100%);

/* Акцентный градиент */
--accent-gradient: linear-gradient(135deg, #00d4ff 0%, #0099cc 100%);

/* Вторичный градиент */
--secondary-gradient: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
```

## Glassmorphism (Стеклянный эффект)

```css
--glass-bg: rgba(255, 255, 255, 0.05);
--glass-border: rgba(255, 255, 255, 0.1);
--glass-blur: blur(10px);
```

**Использование:**
```html
<div class="card" style="background: var(--glass-bg); backdrop-filter: var(--glass-blur); border: 1px solid var(--glass-border);">
```

## Тени и эффекты свечения

```css
--shadow-sm: 0 2px 8px rgba(0, 212, 255, 0.1);
--shadow-md: 0 4px 16px rgba(0, 212, 255, 0.15);
--shadow-lg: 0 8px 32px rgba(0, 212, 255, 0.2);
--shadow-glow: 0 0 20px rgba(0, 212, 255, 0.3);
--glow-accent: 0 0 20px rgba(0, 212, 255, 0.5);
```

## Типографика

### Шрифты

```css
--font-primary: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
--font-heading: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
```

### Размеры

- Используйте Bootstrap классы: `display-1` до `display-6`, `h1`-`h6`, `lead`
- Для акцентов используйте градиентный текст:

```html
<h1 style="background: var(--accent-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
```

## Отступы и радиусы

```css
--spacing-xs: 0.5rem;
--spacing-sm: 1rem;
--spacing-md: 2rem;
--spacing-lg: 4rem;
--spacing-xl: 6rem;

--radius-sm: 8px;
--radius-md: 16px;
--radius-lg: 24px;
--radius-xl: 32px;
--radius-full: 9999px;
```

## Анимации

```css
--transition-fast: 0.2s ease;
--transition-base: 0.3s ease;
--transition-slow: 0.5s ease;
```

### Доступные анимации

1. **fadeInUp** - Появление снизу вверх
2. **float** - Плавающий эффект для фона
3. **rotate** - Вращение (для иконок)

## Компоненты

### Кнопки

**Основная кнопка:**
```html
<a class="btn btn-lg px-5 py-3" style="background: var(--accent-gradient); border: none; border-radius: var(--radius-full); box-shadow: var(--shadow-glow);">
    Текст кнопки
</a>
```

**Вторичная кнопка:**
```html
<a class="btn btn-lg btn-outline-light px-5 py-3" style="border-radius: var(--radius-full); border-width: 2px;">
    Текст кнопки
</a>
```

### Карточки

**Стандартная карточка:**
```html
<div class="card border-0 h-100" style="background: var(--glass-bg); backdrop-filter: var(--glass-blur); border: 1px solid var(--glass-border) !important; border-radius: var(--radius-lg);">
    <div class="card-body p-4">
        <!-- Контент -->
    </div>
</div>
```

### Badge

```html
<span class="badge px-3 py-2" style="background: var(--glass-bg); border: 1px solid var(--glass-border); backdrop-filter: var(--glass-blur); color: var(--accent);">
    <i class="bi bi-icon me-2"></i>Текст
</span>
```

## Утилитарные классы

### Glass Effect
```html
<div class="glass-effect">
```

### Glow Effect
```html
<div class="glow-effect">
```

### Text Gradient
```html
<span class="text-gradient">Текст</span>
```

## Принципы дизайна

1. **Темная тема** - Основной фон всегда темный
2. **Glassmorphism** - Прозрачные элементы с размытием
3. **Градиенты** - Активное использование градиентов для акцентов
4. **Свечение** - Эффекты свечения для интерактивных элементов
5. **Плавные анимации** - Все переходы плавные (0.2-0.5s)
6. **Скругления** - Большие радиусы скругления (16-32px)
7. **Контраст** - Хороший контраст для читаемости

## Адаптивность

- Используйте Bootstrap grid систему
- Все компоненты адаптивны по умолчанию
- Мобильная версия оптимизирована

## Доступность

- Минимальный контраст 4.5:1 для текста
- Фокус-состояния для всех интерактивных элементов
- Семантический HTML

## Примеры использования

### Hero секция
```html
<section class="position-relative overflow-hidden" style="min-height: 100vh; background: var(--gradient-hero);">
    <!-- Контент -->
</section>
```

### Секция с карточками
```html
<section class="py-5" style="background: var(--primary-dark);">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <!-- Карточка -->
            </div>
        </div>
    </div>
</section>
```

## Будущие улучшения

- [ ] Темная/светлая тема переключатель
- [ ] Дополнительные компоненты
- [ ] Расширенная библиотека иконок
- [ ] Микро-анимации
- [ ] 3D эффекты

