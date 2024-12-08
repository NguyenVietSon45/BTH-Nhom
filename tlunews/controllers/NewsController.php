<?php
require_once 'models/News.php';

class NewsController {
    public function detail() {
        require_once 'db.php';
        $id = $_GET['id'];
        $newsModel = new News($db);
        $news = $newsModel->getNewsById($id);
        require_once 'views/news/detail.php';
    }
}
?>