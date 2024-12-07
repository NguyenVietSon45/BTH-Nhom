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

    
}

// Example of creating a new news article
$newNews = new News(null, 'Sample News Title', 'This is the content of the news.', 'image.jpg', null, 1);
?>