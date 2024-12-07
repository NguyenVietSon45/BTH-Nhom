<?php

class User {
    private $id;
    private $username;
    private $password;
    private $role;

    // Constructor to initialize the User object
    public function __construct($id, $username, $password, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hashing password
        $this->role = $role;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password; // Return hashed password
    }

    public function getRole() {
        return $this->role;
    }

    // Setters
    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hashing new password
    }

    public function setRole($role) {
        $this->role = $role;
    }

    // Method to check if the user is an admin
    public function isAdmin() {
        return $this->role === 1;
    }
}

// Example of creating a new user
$newUser = new User(null, 'exampleUser', 'securePassword123', 0);
?>