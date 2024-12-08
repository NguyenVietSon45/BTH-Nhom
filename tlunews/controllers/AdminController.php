<?php
require_once 'models/User.php';

class AdminController {
    public function addNews() {
        require_once 'views/admin/news/add.php';
    }
    
    public function saveNews() {
        require_once 'db.php';
        $stmt = $db->prepare("INSERT INTO news (title, content, image, category_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$_POST['title'], $_POST['content'], $_POST['image'], $_POST['category_id']]);
        header('Location: index.php?controller=admin&action=manageNews');
    }    
}
?>