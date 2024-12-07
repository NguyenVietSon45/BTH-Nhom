<?php

class News {
    private $id;
    private $title;
    private $content;
    private $image;
    private $created_at;
    private $category_id;

    // Constructor to initialize the News object
    public function __construct($id, $title, $content, $image, $created_at, $category_id) {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->image = $image;
        $this->created_at = $created_at ?: date('Y-m-d H:i:s'); // Set to current time if null
        $this->category_id = $category_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getImage() {
        return $this->image;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    // Setters
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    // Method to save the news article to the database
    public function save($conn) {
        if ($this->id === null) {
            // Insert new news article
            $stmt = $conn->prepare("INSERT INTO news (title, content, image, created_at, category_id) VALUES (:title, :content, :image, :created_at, :category_id)");
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':content', $this->content);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':created_at', $this->created_at);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->execute();
            $this->id = $conn->lastInsertId(); // Get the last inserted ID
        } else {
            // Update existing news article
            $stmt = $conn->prepare("UPDATE news SET title = :title, content = :content, image = :image, created_at = :created_at, category_id = :category_id WHERE id = :id");
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':content', $this->content);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':created_at', $this->created_at);
            $stmt->bindParam(':category_id', $this->category_id);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        }
    }

    // Method to delete the news article from the database
    public function delete($conn) {
        if ($this->id !== null) {
            $stmt = $conn->prepare("DELETE FROM news WHERE id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $this->id = null; // Reset ID after deletion
        }
    }
}

// Example of creating a new news article
$newNews = new News(null, 'Sample News Title', 'This is the content of the news.', 'image.jpg', null, 1);
?>