<?php
require_once __DIR__ . '/../core/Model.php';

/**
 * Admin Users Model
 */
class AdminUsers extends Model {
    protected $table = 'admin_users';
    
    public function authenticate($username, $password) {
        $user = $this->whereFirst('username', $username);
        
        if ($user && $user['is_active'] && password_verify($password, $user['password'])) {
            // Update last login
            $this->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);
            return $user;
        }
        
        return false;
    }
    
    public function createUser($data) {
        // Hash password before creating
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        
        return $this->create($data);
    }
    
    public function updatePassword($userId, $newPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        return $this->update($userId, ['password' => $hashedPassword]);
    }
}
