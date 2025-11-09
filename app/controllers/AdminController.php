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
    
    // CMS Management Methods
    public function cms() {
        $this->requireAuth();
        
        $data = [
            'pageTitle' => 'CMS Management - Admin Panel',
            'adminName' => $_SESSION['admin_name'] ?? 'Admin'
        ];
        
        $this->view('admin/cms', $data);
    }
    
    public function cmsLogo() {
        $this->requireAuth();
        
        $headerModel = $this->model('HeaderContent');
        $settingsModel = $this->model('SiteSettings');
        
        $data = [
            'pageTitle' => 'Manage Logo & Favicon - Admin Panel',
            'header' => $headerModel->getActiveHeader(),
            'favicon' => $settingsModel->getSetting('favicon_path', ''),
            'success' => $_SESSION['success_message'] ?? '',
            'error' => $_SESSION['error_message'] ?? ''
        ];
        
        unset($_SESSION['success_message'], $_SESSION['error_message']);
        
        $this->view('admin/cms-logo', $data);
    }
    
    public function cmsLogoUpdate() {
        $this->requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/cms/logo');
        }
        
        $headerModel = $this->model('HeaderContent');
        $settingsModel = $this->model('SiteSettings');
        
        // Handle logo upload
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $logoPath = $this->handleFileUpload($_FILES['logo'], 'logo');
            if ($logoPath) {
                $header = $headerModel->getActiveHeader();
                if ($header) {
                    $headerModel->update($header['id'], ['logo_path' => $logoPath]);
                } else {
                    $headerModel->create(['logo_path' => $logoPath, 'is_active' => 1]);
                }
                $_SESSION['success_message'] = 'Logo updated successfully!';
            } else {
                $_SESSION['error_message'] = 'Failed to upload logo.';
            }
        }
        
        // Handle favicon upload
        if (isset($_FILES['favicon']) && $_FILES['favicon']['error'] === UPLOAD_ERR_OK) {
            $faviconPath = $this->handleFileUpload($_FILES['favicon'], 'favicon');
            if ($faviconPath) {
                $settingsModel->updateSetting('favicon_path', $faviconPath);
                $_SESSION['success_message'] = 'Favicon updated successfully!';
            } else {
                $_SESSION['error_message'] = 'Failed to upload favicon.';
            }
        }
        
        // Update logo alt text
        if (!empty($_POST['logo_alt'])) {
            $header = $headerModel->getActiveHeader();
            if ($header) {
                $headerModel->update($header['id'], ['logo_alt' => $_POST['logo_alt']]);
            }
        }
        
        $this->redirect('/admin/cms/logo');
    }
    
    public function cmsMenu() {
        $this->requireAuth();
        
        $menuModel = $this->model('NavigationMenu');
        
        $data = [
            'pageTitle' => 'Manage Navigation Menu - Admin Panel',
            'menus' => $menuModel->all('menu_order', 'ASC'),
            'success' => $_SESSION['success_message'] ?? '',
            'error' => $_SESSION['error_message'] ?? ''
        ];
        
        unset($_SESSION['success_message'], $_SESSION['error_message']);
        
        $this->view('admin/cms-menu', $data);
    }
    
    public function cmsMenuCreate() {
        $this->requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/cms/menu');
        }
        
        $menuModel = $this->model('NavigationMenu');
        
        $data = [
            'menu_title' => $_POST['menu_title'] ?? '',
            'menu_url' => $_POST['menu_url'] ?? '',
            'menu_order' => $_POST['menu_order'] ?? 0,
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];
        
        if (empty($data['menu_title']) || empty($data['menu_url'])) {
            $_SESSION['error_message'] = 'Menu title and URL are required.';
            $this->redirect('/admin/cms/menu');
        }
        
        if ($menuModel->create($data)) {
            $_SESSION['success_message'] = 'Menu item created successfully!';
        } else {
            $_SESSION['error_message'] = 'Failed to create menu item.';
        }
        
        $this->redirect('/admin/cms/menu');
    }
    
    public function cmsMenuUpdate() {
        $this->requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/cms/menu');
        }
        
        $menuModel = $this->model('NavigationMenu');
        $id = $_POST['id'] ?? 0;
        
        if (!$id) {
            $_SESSION['error_message'] = 'Invalid menu item ID.';
            $this->redirect('/admin/cms/menu');
        }
        
        $data = [
            'menu_title' => $_POST['menu_title'] ?? '',
            'menu_url' => $_POST['menu_url'] ?? '',
            'menu_order' => $_POST['menu_order'] ?? 0,
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];
        
        if (empty($data['menu_title']) || empty($data['menu_url'])) {
            $_SESSION['error_message'] = 'Menu title and URL are required.';
            $this->redirect('/admin/cms/menu');
        }
        
        if ($menuModel->update($id, $data)) {
            $_SESSION['success_message'] = 'Menu item updated successfully!';
        } else {
            $_SESSION['error_message'] = 'Failed to update menu item.';
        }
        
        $this->redirect('/admin/cms/menu');
    }
    
    public function cmsMenuDelete() {
        $this->requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/cms/menu');
        }
        
        $menuModel = $this->model('NavigationMenu');
        $id = $_POST['id'] ?? 0;
        
        if ($id && $menuModel->delete($id)) {
            $_SESSION['success_message'] = 'Menu item deleted successfully!';
        } else {
            $_SESSION['error_message'] = 'Failed to delete menu item.';
        }
        
        $this->redirect('/admin/cms/menu');
    }
    
    public function cmsHero() {
        $this->requireAuth();
        
        $heroModel = $this->model('HeroSlider');
        
        $data = [
            'pageTitle' => 'Manage Hero Section - Admin Panel',
            'slides' => $heroModel->all('slider_order', 'ASC'),
            'success' => $_SESSION['success_message'] ?? '',
            'error' => $_SESSION['error_message'] ?? ''
        ];
        
        unset($_SESSION['success_message'], $_SESSION['error_message']);
        
        $this->view('admin/cms-hero', $data);
    }
    
    public function cmsHeroCreate() {
        $this->requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/cms/hero');
        }
        
        $heroModel = $this->model('HeroSlider');
        
        // Handle image upload
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = $this->handleFileUpload($_FILES['image'], 'hero');
            if (!$imagePath) {
                $_SESSION['error_message'] = 'Failed to upload image.';
                $this->redirect('/admin/cms/hero');
            }
        } else {
            $_SESSION['error_message'] = 'Hero image is required.';
            $this->redirect('/admin/cms/hero');
        }
        
        $data = [
            'title' => $_POST['title'] ?? '',
            'subtitle' => $_POST['subtitle'] ?? '',
            'description' => $_POST['description'] ?? '',
            'image_path' => $imagePath,
            'button_text' => $_POST['button_text'] ?? '',
            'button_link' => $_POST['button_link'] ?? '',
            'slider_order' => $_POST['slider_order'] ?? 0,
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];
        
        if (empty($data['title'])) {
            $_SESSION['error_message'] = 'Title is required.';
            $this->redirect('/admin/cms/hero');
        }
        
        if ($heroModel->create($data)) {
            $_SESSION['success_message'] = 'Hero slide created successfully!';
        } else {
            $_SESSION['error_message'] = 'Failed to create hero slide.';
        }
        
        $this->redirect('/admin/cms/hero');
    }
    
    public function cmsHeroUpdate() {
        $this->requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/cms/hero');
        }
        
        $heroModel = $this->model('HeroSlider');
        $id = $_POST['id'] ?? 0;
        
        if (!$id) {
            $_SESSION['error_message'] = 'Invalid hero slide ID.';
            $this->redirect('/admin/cms/hero');
        }
        
        $data = [
            'title' => $_POST['title'] ?? '',
            'subtitle' => $_POST['subtitle'] ?? '',
            'description' => $_POST['description'] ?? '',
            'button_text' => $_POST['button_text'] ?? '',
            'button_link' => $_POST['button_link'] ?? '',
            'slider_order' => $_POST['slider_order'] ?? 0,
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];
        
        // Handle image upload if new image provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imagePath = $this->handleFileUpload($_FILES['image'], 'hero');
            if ($imagePath) {
                $data['image_path'] = $imagePath;
            }
        }
        
        if (empty($data['title'])) {
            $_SESSION['error_message'] = 'Title is required.';
            $this->redirect('/admin/cms/hero');
        }
        
        if ($heroModel->update($id, $data)) {
            $_SESSION['success_message'] = 'Hero slide updated successfully!';
        } else {
            $_SESSION['error_message'] = 'Failed to update hero slide.';
        }
        
        $this->redirect('/admin/cms/hero');
    }
    
    public function cmsHeroDelete() {
        $this->requireAuth();
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/admin/cms/hero');
        }
        
        $heroModel = $this->model('HeroSlider');
        $id = $_POST['id'] ?? 0;
        
        if ($id && $heroModel->delete($id)) {
            $_SESSION['success_message'] = 'Hero slide deleted successfully!';
        } else {
            $_SESSION['error_message'] = 'Failed to delete hero slide.';
        }
        
        $this->redirect('/admin/cms/hero');
    }
    
    private function handleFileUpload($file, $type = 'image') {
        // Create uploads directory if it doesn't exist
        $uploadDir = __DIR__ . '/../../uploads/' . $type . '/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Validate file type
        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp'];
        if ($type === 'favicon') {
            $allowedTypes[] = 'image/x-icon';
            $allowedTypes[] = 'image/vnd.microsoft.icon';
        }
        
        if (!in_array($file['type'], $allowedTypes)) {
            return false;
        }
        
        // Generate unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $destination = $uploadDir . $filename;
        
        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return 'uploads/' . $type . '/' . $filename;
        }
        
        return false;
    }
}
