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

   
}

// Example of creating a new category
$newCategory = new Category(null, 'Technology');
?>