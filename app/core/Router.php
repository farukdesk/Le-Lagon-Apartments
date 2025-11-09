<?php
/**
 * Router Class
 * Handles URL routing for the application
 */
class Router {
    private $routes = [];
    private $namedRoutes = [];
    
    public function __construct() {
        // Default routes
        $this->addRoute('GET', '/', 'HomeController', 'index');
        $this->addRoute('GET', '/index', 'HomeController', 'index');
        $this->addRoute('GET', '/about', 'HomeController', 'about');
        $this->addRoute('GET', '/rooms', 'HomeController', 'rooms');
        $this->addRoute('GET', '/contact', 'HomeController', 'contact');
        
        // Admin routes
        $this->addRoute('GET', '/admin', 'AdminController', 'index');
        $this->addRoute('GET', '/admin/login', 'AdminController', 'login');
        $this->addRoute('POST', '/admin/login', 'AdminController', 'loginProcess');
        $this->addRoute('GET', '/admin/logout', 'AdminController', 'logout');
        $this->addRoute('GET', '/admin/dashboard', 'AdminController', 'dashboard');
        
        // Admin content management routes
        $this->addRoute('GET', '/admin/slider', 'AdminController', 'slider');
        $this->addRoute('GET', '/admin/about', 'AdminController', 'about');
        $this->addRoute('GET', '/admin/services', 'AdminController', 'services');
        $this->addRoute('GET', '/admin/rooms', 'AdminController', 'rooms');
        $this->addRoute('GET', '/admin/footer', 'AdminController', 'footer');
        $this->addRoute('GET', '/admin/settings', 'AdminController', 'settings');
        
        // CMS Management routes
        $this->addRoute('GET', '/admin/cms', 'AdminController', 'cms');
        $this->addRoute('GET', '/admin/cms/logo', 'AdminController', 'cmsLogo');
        $this->addRoute('POST', '/admin/cms/logo/update', 'AdminController', 'cmsLogoUpdate');
        $this->addRoute('GET', '/admin/cms/menu', 'AdminController', 'cmsMenu');
        $this->addRoute('POST', '/admin/cms/menu/create', 'AdminController', 'cmsMenuCreate');
        $this->addRoute('POST', '/admin/cms/menu/update', 'AdminController', 'cmsMenuUpdate');
        $this->addRoute('POST', '/admin/cms/menu/delete', 'AdminController', 'cmsMenuDelete');
        $this->addRoute('GET', '/admin/cms/hero', 'AdminController', 'cmsHero');
        $this->addRoute('POST', '/admin/cms/hero/create', 'AdminController', 'cmsHeroCreate');
        $this->addRoute('POST', '/admin/cms/hero/update', 'AdminController', 'cmsHeroUpdate');
        $this->addRoute('POST', '/admin/cms/hero/delete', 'AdminController', 'cmsHeroDelete');
    }
    
    public function addRoute($method, $path, $controller, $action, $name = null) {
        $this->routes[$method][$path] = [
            'controller' => $controller,
            'action' => $action
        ];
        
        if ($name) {
            $this->namedRoutes[$name] = $path;
        }
    }
    
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Remove base path if application is in subdirectory
        $basePath = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
        if ($basePath !== '/' && strpos($path, $basePath) === 0) {
            $path = substr($path, strlen($basePath));
        }
        
        // Remove trailing slash except for root
        if ($path !== '/' && substr($path, -1) === '/') {
            $path = rtrim($path, '/');
        }
        
        // Default to index if empty
        if (empty($path) || $path === '/') {
            $path = '/';
        }
        
        // Check if route exists
        if (isset($this->routes[$method][$path])) {
            $route = $this->routes[$method][$path];
            $this->callController($route['controller'], $route['action']);
        } else {
            // Try to find a matching route with parameters
            $this->handle404();
        }
    }
    
    private function callController($controllerName, $action) {
        require_once __DIR__ . '/../controllers/' . $controllerName . '.php';
        
        $controller = new $controllerName();
        
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            $this->handle404();
        }
    }
    
    private function handle404() {
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
        echo "<p>The page you are looking for does not exist.</p>";
        echo '<a href="/">Return to Home</a>';
        exit();
    }
    
    public function url($name, $params = []) {
        if (isset($this->namedRoutes[$name])) {
            $path = $this->namedRoutes[$name];
            
            foreach ($params as $key => $value) {
                $path = str_replace(':' . $key, $value, $path);
            }
            
            return $path;
        }
        
        return '/';
    }
}
