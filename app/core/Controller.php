<?php
/**
 * Base Controller Class
 * All controllers extend this class
 */
class Controller {
    protected $db;
    
    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $this->db = Database::getInstance()->getConnection();
    }
    
    /**
     * Load a view file
     * @param string $view View file name (without .php extension)
     * @param array $data Data to pass to the view
     */
    protected function view($view, $data = []) {
        // Extract data array to variables
        extract($data);
        
        // Check if view file exists
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("View not found: " . $view);
        }
    }
    
    /**
     * Load a model
     * @param string $model Model name
     * @return object Model instance
     */
    protected function model($model) {
        $modelPath = __DIR__ . '/../models/' . $model . '.php';
        
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model();
        } else {
            die("Model not found: " . $model);
        }
    }
    
    /**
     * Redirect to a different page
     * @param string $url URL to redirect to
     */
    protected function redirect($url) {
        header("Location: " . $url);
        exit();
    }
    
    /**
     * Check if user is logged in (for admin)
     * @return bool
     */
    protected function isLoggedIn() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }
    
    /**
     * Require admin authentication
     */
    protected function requireAuth() {
        if (!$this->isLoggedIn()) {
            $this->redirect('/admin/login');
        }
    }
    
    /**
     * Get POST data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function post($key, $default = null) {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }
    
    /**
     * Get GET data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    protected function get($key, $default = null) {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }
    
    /**
     * Return JSON response
     * @param mixed $data
     * @param int $statusCode
     */
    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }
}
