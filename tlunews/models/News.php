<?php
class News {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllNews() {
        $stmt = $this->db->prepare("SELECT * FROM news");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id) {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getNewsByCategory($category_id) {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE category_id = ?");
        $stmt->execute([$category_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function searchNews($keyword) {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE title LIKE ? OR content LIKE ?");
        $likeKeyword = '%' . $keyword . '%';
        $stmt->execute([$likeKeyword, $likeKeyword]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getPaginatedNews($limit, $offset) {
        $stmt = $this->db->prepare("SELECT * FROM news LIMIT ? OFFSET ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->bindValue(2, $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getTotalNewsCount() {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM news");
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    
}
?>
