<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * About Section Model
 */
class AboutSection extends Model {
    protected $table = 'about_section';
    
    public function getActiveAbout() {
        return $this->whereFirst('is_active', 1);
    }
}
