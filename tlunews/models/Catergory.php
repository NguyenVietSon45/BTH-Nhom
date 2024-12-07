<?php

class Category {
    private $id;
    private $name;

    // Constructor to initialize the Category object
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    // Method to save the category to the database
    public function save($conn) {
        if ($this->id === null) {
            // Insert new category
            $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (:name)");
            $stmt->bindParam(':name', $this->name);
            $stmt->execute();
            $this->id = $conn->lastInsertId(); // Get the last inserted ID
        } else {
            // Update existing category
            $stmt = $conn->prepare("UPDATE categories SET name = :name WHERE id = :id");
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        }
    }

    // Method to delete the category from the database
    public function delete($conn) {
        if ($this->id !== null) {
            $stmt = $conn->prepare("DELETE FROM categories WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $this->id = null; // Reset ID after deletion
        }
    }
}

// Example of creating a new category
$newCategory = new Category(null, 'Technology');
?>