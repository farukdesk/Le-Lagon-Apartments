<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Social Links Model
 */
class SocialLinks extends Model {
    protected $table = 'social_links';
    
    public function getActiveLinks() {
        return $this->allActive('link_order', 'ASC');
    }
}
