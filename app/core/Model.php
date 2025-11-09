<?php
/**
 * Base Model Class
 * All models extend this class
 */
class Model {
    protected $db;
    protected $table;
    
    public function __construct() {
        require_once __DIR__ . '/../../config/database.php';
        $this->db = Database::getInstance()->getConnection();
    }
    
    /**
     * Get all records from a table
     * @param string $orderBy
     * @param string $order
     * @return array
     */
    public function all($orderBy = 'id', $order = 'ASC') {
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY {$orderBy} {$order}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Database error in Model::all() - " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Get active records only
     * @param string $orderBy
     * @param string $order
     * @return array
     */
    public function allActive($orderBy = 'id', $order = 'ASC') {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE is_active = 1 ORDER BY {$orderBy} {$order}";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Database error in Model::allActive() - " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Find a record by ID
     * @param int $id
     * @return array|null
     */
    public function find($id) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Database error in Model::find() - " . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Find records by a specific field
     * @param string $field
     * @param mixed $value
     * @return array
     */
    public function where($field, $value) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE {$field} = :value";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Database error in Model::where() - " . $e->getMessage());
            return [];
        }
    }
    
    /**
     * Find first record by a specific field
     * @param string $field
     * @param mixed $value
     * @return array|null
     */
    public function whereFirst($field, $value) {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE {$field} = :value LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':value', $value);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Database error in Model::whereFirst() - " . $e->getMessage());
            return null;
        }
    }
    
    /**
     * Create a new record
     * @param array $data
     * @return int|bool Last insert ID or false
     */
    public function create($data) {
        try {
            $fields = array_keys($data);
            $values = array_values($data);
            
            $fieldString = implode(', ', $fields);
            $placeholders = ':' . implode(', :', $fields);
            
            $sql = "INSERT INTO {$this->table} ({$fieldString}) VALUES ({$placeholders})";
            $stmt = $this->db->prepare($sql);
            
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            
            if ($stmt->execute()) {
                return $this->db->lastInsertId();
            }
            return false;
        } catch (PDOException $e) {
            error_log("Database error in Model::create() - " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Update a record
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data) {
        try {
            $fields = [];
            foreach (array_keys($data) as $field) {
                $fields[] = "{$field} = :{$field}";
            }
            $fieldString = implode(', ', $fields);
            
            $sql = "UPDATE {$this->table} SET {$fieldString} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            
            $stmt->bindParam(':id', $id);
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error in Model::update() - " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Delete a record
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database error in Model::delete() - " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Execute a custom query
     * @param string $sql
     * @param array $params
     * @return array|bool
     */
    public function query($sql, $params = []) {
        try {
            $stmt = $this->db->prepare($sql);
            
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }
            
            $stmt->execute();
            
            // If it's a SELECT query, return results
            if (stripos(trim($sql), 'SELECT') === 0) {
                return $stmt->fetchAll();
            }
            
            return true;
        } catch (PDOException $e) {
            error_log("Database error in Model::query() - " . $e->getMessage());
            return false;
        }
    }
}
