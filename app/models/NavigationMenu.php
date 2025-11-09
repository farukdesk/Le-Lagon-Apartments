<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Navigation Menu Model
 */
class NavigationMenu extends Model {
    protected $table = 'navigation_menu';
    
    public function getActiveMenu() {
        return $this->allActive('menu_order', 'ASC');
    }
}
