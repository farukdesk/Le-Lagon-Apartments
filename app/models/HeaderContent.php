<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Header Content Model
 */
class HeaderContent extends Model {
    protected $table = 'header_content';
    
    public function getActiveHeader() {
        return $this->whereFirst('is_active', 1);
    }
}
