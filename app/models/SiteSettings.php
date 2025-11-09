<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Site Settings Model
 */
class SiteSettings extends Model {
    protected $table = 'site_settings';
    
    public function getSetting($key, $default = '') {
        $setting = $this->whereFirst('setting_key', $key);
        return $setting ? $setting['setting_value'] : $default;
    }
    
    public function updateSetting($key, $value) {
        $setting = $this->whereFirst('setting_key', $key);
        
        if ($setting) {
            return $this->update($setting['id'], ['setting_value' => $value]);
        } else {
            return $this->create([
                'setting_key' => $key,
                'setting_value' => $value
            ]);
        }
    }
    
    public function getAllSettings() {
        $settings = $this->all();
        $result = [];
        
        foreach ($settings as $setting) {
            $result[$setting['setting_key']] = $setting['setting_value'];
        }
        
        return $result;
    }
}
