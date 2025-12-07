<?php
/**
 * Base Controller class
 * All controllers should extend this class
 */

class BaseController {
    protected $viewsPath;
    protected $modelsPath;
    
    public function __construct() {
        $this->viewsPath = BASE_PATH . '/views';
        $this->modelsPath = BASE_PATH . '/app/models';
    }
    
    /**
     * Render a view
     * @param string $viewName Name of the view file (without .html extension)
     * @param array $data Data to pass to the view
     */
    protected function renderView($viewName, $data = []) {
        $viewFile = $this->viewsPath . '/' . $viewName . '.html';
        
        if (file_exists($viewFile)) {
            // Extract data array to variables
            extract($data);
            
            // Start output buffering
            ob_start();
            require_once $viewFile;
            $content = ob_get_clean();
            
            // Output the view
            echo $content;
        } else {
            throw new Exception("View not found: " . $viewName);
        }
    }
    
    /**
     * Load a model
     * @param string $modelName Name of the model class
     * @return object Instance of the model
     */
    protected function loadModel($modelName) {
        $modelFile = $this->modelsPath . '/' . $modelName . '.php';
        
        if (file_exists($modelFile)) {
            require_once $modelFile;
            return new $modelName();
        } else {
            throw new Exception("Model not found: " . $modelName);
        }
    }
    
    /**
     * Return JSON response
     * @param mixed $data Data to encode as JSON
     * @param int $statusCode HTTP status code
     */
    protected function jsonResponse($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    /**
     * Redirect to a URL
     * @param string $url URL to redirect to
     */
    protected function redirect($url) {
        header('Location: ' . $url);
        exit;
    }
}

