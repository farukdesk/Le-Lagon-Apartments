<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Text Sections Model
 */
class TextSections extends Model {
    protected $table = 'text_sections';
    
    public function getActiveSection($sectionKey) {
        return $this->query(
            "SELECT * FROM text_sections WHERE section_key = :key AND is_active = 1 LIMIT 1",
            [':key' => $sectionKey]
        )[0] ?? null;
    }
}
