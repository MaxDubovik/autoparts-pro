/**
 * Admin Panel JavaScript
 * Функциональность для админ-панели
 */

document.addEventListener('DOMContentLoaded', function() {
    // Инициализация всех компонентов
    initTooltips();
    initConfirmDialogs();
    initDataTables();
});

/**
 * Инициализация tooltips
 */
function initTooltips() {
    // Bootstrap tooltips будут инициализированы через AdminLTE
    if (typeof $ !== 'undefined') {
        $('[data-toggle="tooltip"]').tooltip();
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

