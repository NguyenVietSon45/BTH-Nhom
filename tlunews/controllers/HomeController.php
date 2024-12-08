<?php
require_once 'models/News.php';
require_once 'models/Category.php';

class HomeController {
    public function index() {
        require_once 'db.php';
    
        $newsModel = new News($db);
        $categoryModel = new Category($db);
    
        $categories = $categoryModel->getAllCategories();
    
        $currentPage = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
        $itemsPerPage = 10;
        $offset = ($currentPage - 1) * $itemsPerPage;
    
        if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $news = $newsModel->searchNews($keyword);
            $totalNews = count($news);
        } elseif (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            $news = $newsModel->getNewsByCategory($categoryId);
            $totalNews = count($news);
        } else {
            $news = $newsModel->getPaginatedNews($itemsPerPage, $offset);
            $totalNews = $newsModel->getTotalNewsCount();
        }
    
        $totalPages = ceil($totalNews / $itemsPerPage);
    
        require_once 'views/home/index.php';
    }        
}
?>
