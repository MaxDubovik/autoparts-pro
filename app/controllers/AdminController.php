<?php
/**
 * Admin Controller
 * Контроллер для админ-панели
 */

require_once 'BaseController.php';

class AdminController extends BaseController {
    
    /**
     * Главная страница админ-панели (Dashboard)
     */
    public function index() {
        // TODO: Добавить проверку авторизации
        // $this->checkAuth();
        
        // Получаем контент страницы
        ob_start();
        include $this->viewsPath . '/admin/dashboard.html';
        $content = ob_get_clean();
        
        // Рендерим с layout
        $this->renderView('admin/layout', [
            'pageTitle' => 'Главная',
            'currentPage' => 'dashboard',
            'content' => $content
        ]);
    }
    
    /**
     * Страница товаров
     */
    public function products() {
        // TODO: Получить товары из модели
        ob_start();
        echo '<div class="card"><div class="card-body"><h3>Товары</h3><p>Страница в разработке</p></div></div>';
        $content = ob_get_clean();
        
        $this->renderView('admin/layout', [
            'pageTitle' => 'Товары',
            'currentPage' => 'products',
            'content' => $content,
            'breadcrumbs' => [
                ['title' => 'Товары', 'active' => true]
            ]
        ]);
    }
    
    /**
     * Страница категорий
     */
    public function categories() {
        ob_start();
        echo '<div class="card"><div class="card-body"><h3>Категории</h3><p>Страница в разработке</p></div></div>';
        $content = ob_get_clean();
        
        $this->renderView('admin/layout', [
            'pageTitle' => 'Категории',
            'currentPage' => 'categories',
            'content' => $content,
            'breadcrumbs' => [
                ['title' => 'Категории', 'active' => true]
            ]
        ]);
    }
    
    /**
     * Страница заказов
     */
    public function orders() {
        ob_start();
        echo '<div class="card"><div class="card-body"><h3>Заказы</h3><p>Страница в разработке</p></div></div>';
        $content = ob_get_clean();
        
        $this->renderView('admin/layout', [
            'pageTitle' => 'Заказы',
            'currentPage' => 'orders',
            'content' => $content,
            'breadcrumbs' => [
                ['title' => 'Заказы', 'active' => true]
            ]
        ]);
    }
    
    /**
     * Страница пользователей
     */
    public function users() {
        ob_start();
        echo '<div class="card"><div class="card-body"><h3>Пользователи</h3><p>Страница в разработке</p></div></div>';
        $content = ob_get_clean();
        
        $this->renderView('admin/layout', [
            'pageTitle' => 'Пользователи',
            'currentPage' => 'users',
            'content' => $content,
            'breadcrumbs' => [
                ['title' => 'Пользователи', 'active' => true]
            ]
        ]);
    }
    
    /**
     * Страница настроек
     */
    public function settings() {
        ob_start();
        echo '<div class="card"><div class="card-body"><h3>Настройки</h3><p>Страница в разработке</p></div></div>';
        $content = ob_get_clean();
        
        $this->renderView('admin/layout', [
            'pageTitle' => 'Настройки',
            'currentPage' => 'settings',
            'content' => $content,
            'breadcrumbs' => [
                ['title' => 'Настройки', 'active' => true]
            ]
        ]);
    }
    
    /**
     * Выход из админ-панели
     */
    public function logout() {
        // TODO: Реализовать выход
        session_destroy();
        header('Location: /');
        exit;
    }
    
    /**
     * Проверка авторизации (для будущей реализации)
     */
    private function checkAuth() {
        // TODO: Реализовать проверку авторизации
        // if (!isset($_SESSION['admin_logged_in'])) {
        //     header('Location: /admin/login');
        //     exit;
        // }
    }
}

