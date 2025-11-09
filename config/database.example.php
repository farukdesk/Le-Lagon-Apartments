<?php
/**
 * Database Configuration Template
 * 
 * INSTRUCTIONS:
 * 1. Rename this file from config.example.php to database.php
 * 2. Update the values below with your actual database credentials
 * 3. Save the file
 * 4. Delete this comment block
 */

// Database Host (usually 'localhost' for shared hosting)
define('DB_HOST', 'localhost');

// Database Name (create this in your hosting control panel first)
define('DB_NAME', 'le_lagon_apartments');

// Database Username (your MySQL username)
define('DB_USER', 'root');

// Database Password (your MySQL password)
define('DB_PASS', '');

// Database Character Set (leave as is)
define('DB_CHARSET', 'utf8mb4');

/**
 * Database connection class
 * DO NOT MODIFY BELOW THIS LINE
 */
class Database {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    // Prevent cloning
    private function __clone() {}
    
    // Prevent unserializing
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
}
