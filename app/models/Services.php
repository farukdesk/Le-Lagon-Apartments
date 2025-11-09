<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Services Model
 */
class Services extends Model {
    protected $table = 'services';
    
    public function getActiveServices() {
        return $this->allActive('service_order', 'ASC');
    }
    
    public function getServiceWithFeatures($serviceId) {
        try {
            $sql = "SELECT s.*, 
                    (SELECT JSON_ARRAYAGG(
                        JSON_OBJECT(
                            'feature_text', sf.feature_text,
                            'is_included', sf.is_included
                        )
                    ) 
                    FROM service_features sf 
                    WHERE sf.service_id = s.id 
                    ORDER BY sf.feature_order ASC
                    ) as features
                    FROM services s 
                    WHERE s.id = :serviceId";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':serviceId', $serviceId);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Database error in Services::getServiceWithFeatures() - " . $e->getMessage());
            return null;
        }
    }
    
    public function getAllWithFeatures() {
        try {
            $services = $this->getActiveServices();
            
            foreach ($services as &$service) {
                $sql = "SELECT * FROM service_features WHERE service_id = :serviceId ORDER BY feature_order ASC";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':serviceId', $service['id']);
                $stmt->execute();
                $service['features'] = $stmt->fetchAll();
            }
            
            return $services;
        } catch (PDOException $e) {
            error_log("Database error in Services::getAllWithFeatures() - " . $e->getMessage());
            return [];
        }
    }
}
