<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Hero Slider Model
 */
class HeroSlider extends Model {
    protected $table = 'hero_slider';
    
    public function getActiveSlides() {
        return $this->allActive('slider_order', 'ASC');
    }
}
