<?php
require_once __DIR__ . '/../core/Controller.php';

/**
 * Admin Controller
 * Handles admin panel functionality
 */
class AdminController extends Controller {
    
    public function index() {
        $this->redirect('/admin/login');
    }
    
    public function login() {
        // If already logged in, redirect to dashboard
        if ($this->isLoggedIn()) {
            $this->redirect('/admin/dashboard');
        }
        
        $data = [
            'pageTitle' => 'Admin Login',
            'error' => ''
        ];
        
        $this->view('admin/login', $data);
    }
    
    public function loginProcess() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/login');
        }
        
        $username = $this->post('username');
        $password = $this->post('password');
        
        if (empty($username) || empty($password)) {
            $data = [
                'pageTitle' => 'Admin Login',
                'error' => 'Please enter both username and password'
            ];
            $this->view('admin/login', $data);
            return;
        }
        
        $adminModel = $this->model('AdminUsers');
        $user = $adminModel->authenticate($username, $password);
        
        if ($user) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_username'] = $user['username'];
            $_SESSION['admin_name'] = $user['full_name'];
            
            $this->redirect('/admin/dashboard');
        } else {
            $data = [
                'pageTitle' => 'Admin Login',
                'error' => 'Invalid username or password'
            ];
            $this->view('admin/login', $data);
        }
    }
    
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        $this->redirect('/admin/login');
    }
    
    public function dashboard() {
        $this->requireAuth();
        
        $data = [
            'pageTitle' => 'Dashboard - Admin Panel',
            'adminName' => $_SESSION['admin_name'] ?? 'Admin'
        ];
        
        $this->view('admin/dashboard', $data);
    }
    
    public function slider() {
        $this->requireAuth();
        
        $heroSliderModel = $this->model('HeroSlider');
        
        $data = [
            'pageTitle' => 'Manage Hero Slider - Admin Panel',
            'slides' => $heroSliderModel->all('slider_order', 'ASC')
        ];
        
        $this->view('admin/slider', $data);
    }
    
    public function about() {
        $this->requireAuth();
        
        $aboutModel = $this->model('AboutSection');
        
        $data = [
            'pageTitle' => 'Manage About Section - Admin Panel',
            'aboutSection' => $aboutModel->all()
        ];
        
        $this->view('admin/about', $data);
    }
    
    public function services() {
        $this->requireAuth();
        
        $servicesModel = $this->model('Services');
        
        $data = [
            'pageTitle' => 'Manage Services - Admin Panel',
            'services' => $servicesModel->getAllWithFeatures()
        ];
        
        $this->view('admin/services', $data);
    }
    
    public function rooms() {
        $this->requireAuth();
        
        $roomsModel = $this->model('Rooms');
        
        $data = [
            'pageTitle' => 'Manage Rooms - Admin Panel',
            'rooms' => $roomsModel->all('room_order', 'ASC')
        ];
        
        $this->view('admin/rooms', $data);
    }
    
    public function footer() {
        $this->requireAuth();
        
        $footerModel = $this->model('FooterContent');
        $socialModel = $this->model('SocialLinks');
        
        $data = [
            'pageTitle' => 'Manage Footer - Admin Panel',
            'footerSections' => $footerModel->all('section_order', 'ASC'),
            'socialLinks' => $socialModel->all('link_order', 'ASC')
        ];
        
        $this->view('admin/footer', $data);
    }
    
    public function settings() {
        $this->requireAuth();
        
        $settingsModel = $this->model('SiteSettings');
        
        $data = [
            'pageTitle' => 'Site Settings - Admin Panel',
            'settings' => $settingsModel->getAllSettings()
        ];
        
        $this->view('admin/settings', $data);
    }
}
