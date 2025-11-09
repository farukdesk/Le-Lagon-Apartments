<?php
require_once __DIR__ . '/../core/Controller.php';

/**
 * Home Controller
 * Handles all frontend pages
 */
class HomeController extends Controller {
    
    public function index() {
        // Load all necessary models
        $heroSliderModel = $this->model('HeroSlider');
        $aboutModel = $this->model('AboutSection');
        $servicesModel = $this->model('Services');
        $roomsModel = $this->model('Rooms');
        $textSectionsModel = $this->model('TextSections');
        $settingsModel = $this->model('SiteSettings');
        
        // Get data
        $data = [
            'pageTitle' => 'Home - Le Lagon Apartments',
            'heroSlides' => $heroSliderModel->getActiveSlides(),
            'aboutSection' => $aboutModel->getActiveAbout(),
            'services' => $servicesModel->getAllWithFeatures(),
            'rooms' => $roomsModel->getActiveRooms(),
            'introText' => $textSectionsModel->getActiveSection('intro_text'),
            'settings' => $settingsModel->getAllSettings()
        ];
        
        // Load view
        $this->view('frontend/index', $data);
    }
    
    public function about() {
        $settingsModel = $this->model('SiteSettings');
        $aboutModel = $this->model('AboutSection');
        
        $data = [
            'pageTitle' => 'About Us - Le Lagon Apartments',
            'aboutSection' => $aboutModel->getActiveAbout(),
            'settings' => $settingsModel->getAllSettings()
        ];
        
        $this->view('frontend/about', $data);
    }
    
    public function rooms() {
        $settingsModel = $this->model('SiteSettings');
        $roomsModel = $this->model('Rooms');
        
        $data = [
            'pageTitle' => 'Our Rooms - Le Lagon Apartments',
            'rooms' => $roomsModel->getActiveRooms(),
            'settings' => $settingsModel->getAllSettings()
        ];
        
        $this->view('frontend/rooms', $data);
    }
    
    public function contact() {
        $settingsModel = $this->model('SiteSettings');
        
        $data = [
            'pageTitle' => 'Contact Us - Le Lagon Apartments',
            'settings' => $settingsModel->getAllSettings()
        ];
        
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process contact form
            $data['success'] = true;
            $data['message'] = 'Thank you for contacting us. We will get back to you soon!';
        }
        
        $this->view('frontend/contact', $data);
    }
}
