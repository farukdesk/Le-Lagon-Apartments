<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Footer Content Model
 */
class FooterContent extends Model {
    protected $table = 'footer_content';
    
    public function getActiveFooter() {
        return $this->allActive('section_order', 'ASC');
    }
}
