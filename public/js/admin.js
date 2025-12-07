/**
 * Admin Panel JavaScript
 * Функциональность для админ-панели (VS Code Style)
 */

document.addEventListener('DOMContentLoaded', function() {
    // Инициализация всех компонентов
    initMobileMenu();
    initConfirmDialogs();
    initDataTables();
    initStatCards();
});

/**
 * Инициализация мобильного меню
 */
function initMobileMenu() {
    // Для мобильных устройств - кнопка открытия сайдбара
    const sidebar = document.querySelector('.admin-sidebar');
    const topbar = document.querySelector('.admin-topbar');
    
    if (window.innerWidth <= 768) {
        // Создаем кнопку меню для мобильных
        if (!document.querySelector('.mobile-menu-btn')) {
            const menuBtn = document.createElement('button');
            menuBtn.className = 'mobile-menu-btn admin-btn';
            menuBtn.innerHTML = '<i class="bi bi-list"></i>';
            menuBtn.style.marginRight = '1rem';
            menuBtn.onclick = function() {
                sidebar.classList.toggle('open');
            };
            topbar.insertBefore(menuBtn, topbar.firstChild);
        }
    }
}

/**
 * Инициализация диалогов подтверждения
 */
function initConfirmDialogs() {
    document.querySelectorAll('[data-confirm]').forEach(element => {
        element.addEventListener('click', function(e) {
            const message = this.getAttribute('data-confirm') || 'Вы уверены?';
            if (!confirm(message)) {
                e.preventDefault();
                return false;
            }
        });
    });
}

/**
 * Инициализация DataTables (если используется)
 */
function initDataTables() {
    // TODO: Добавить DataTables для таблиц когда понадобится
    // if (typeof $ !== 'undefined' && $.fn.DataTable) {
    //     $('.data-table').DataTable({
    //         language: {
    //             url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/ru.json'
    //         }
    //     });
    // }
}

/**
 * Показать уведомление
 */
function showNotification(message, type = 'info') {
    // Используем встроенные уведомления AdminLTE
    if (typeof toastr !== 'undefined') {
        toastr[type](message);
    } else {
        alert(message);
    }
}

/**
 * Форматирование валюты
 */
function formatCurrency(amount) {
    return new Intl.NumberFormat('ru-RU', {
        style: 'currency',
        currency: 'RUB'
    }).format(amount);
}

/**
 * Форматирование даты
 */
function formatDate(dateString) {
    const date = new Date(dateString);
    return new Intl.DateTimeFormat('ru-RU', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }).format(date);
}

/**
 * Инициализация статистических карточек
 */
function initStatCards() {
    const statCards = document.querySelectorAll('.admin-stat-card');
    
    statCards.forEach(card => {
        card.addEventListener('click', function() {
            // Можно добавить переход на соответствующую страницу
            const link = this.querySelector('a');
            if (link) {
                window.location.href = link.href;
            }
        });
    });
}

