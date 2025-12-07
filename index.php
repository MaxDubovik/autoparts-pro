<?php
/**
 * Main entry point for AutoParts Pro application
 * MVC Architecture - Router and Controller dispatcher
 */

// Define base paths
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/app');
define('VIEWS_PATH', BASE_PATH . '/views');
define('CONTROLLERS_PATH', APP_PATH . '/controllers');
define('MODELS_PATH', APP_PATH . '/models');
define('PUBLIC_PATH', BASE_PATH . '/public');

// Load configuration
require_once APP_PATH . '/config/config.php';

// Autoload base classes
require_once CONTROLLERS_PATH . '/BaseController.php';
require_once MODELS_PATH . '/BaseModel.php';

// Simple router for future implementation
class Router {
    private $routes = [];
    
    public function addRoute($method, $path, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }
    
    public function dispatch($uri, $method = 'GET') {
        // Remove query string
        $uri = strtok($uri, '?');
        
        // Remove leading slash
        $uri = ltrim($uri, '/');
        
        // Default route - show index view
        if (empty($uri) || $uri === 'index.php') {
            $this->renderView('index');
            return;
        }
        
        // Find matching route
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                $controllerName = $route['controller'];
                $actionName = $route['action'];
                
                // Load controller
                $controllerFile = CONTROLLERS_PATH . '/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $controller = new $controllerName();
                    if (method_exists($controller, $actionName)) {
                        $controller->$actionName();
                        return;
                    }
                }
            }
        }
        
        // 404 - Not found
        http_response_code(404);
        echo "404 - Page not found";
    }
    
    private function renderView($viewName, $data = []) {
        $viewFile = VIEWS_PATH . '/' . $viewName . '.html';
        if (file_exists($viewFile)) {
            // Extract data for view
            extract($data);
            // Start output buffering
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
            echo $content;
        } else {
            http_response_code(404);
            echo "View not found: " . $viewName;
        }
    }
}

// Initialize router
$router = new Router();

// Example routes (uncomment when controllers are created)
// $router->addRoute('GET', 'products', 'ProductController', 'index');
// $router->addRoute('GET', 'products/show', 'ProductController', 'show');
// $router->addRoute('GET', 'categories', 'CategoryController', 'index');

// Get current URI and method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Dispatch request
$router->dispatch($uri, $method);

