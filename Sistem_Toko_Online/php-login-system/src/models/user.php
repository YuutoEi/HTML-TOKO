<?php
class User {
    private $connection;
    
    public function __construct($db) {
        $this->connection = $db;
    }
    
    public function findByUsername($username) {
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function validatePassword($inputPassword, $storedPassword) {
        return password_verify($inputPassword, $storedPassword);
    }
}
?>