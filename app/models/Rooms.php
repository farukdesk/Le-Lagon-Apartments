<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Rooms Model
 */
class Rooms extends Model {
    protected $table = 'rooms';
    
    public function getActiveRooms() {
        return $this->allActive('room_order', 'ASC');
    }
    
    public function getRoomWithAmenities($roomId) {
        try {
            $room = $this->find($roomId);
            
            if ($room) {
                $sql = "SELECT * FROM room_amenities WHERE room_id = :roomId";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':roomId', $roomId);
                $stmt->execute();
                $room['amenities'] = $stmt->fetchAll();
            }
            
            return $room;
        } catch (PDOException $e) {
            error_log("Database error in Rooms::getRoomWithAmenities() - " . $e->getMessage());
            return null;
        }
    }
}
