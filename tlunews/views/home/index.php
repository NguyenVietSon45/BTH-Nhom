<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .categories { margin-bottom: 20px; }
        .categories a { margin-right: 10px; text-decoration: none; }
        .categories a.active { font-weight: bold; color: red; }
        .news-item { display: flex; margin-bottom: 15px; }
        .news-item img { width: 100px; height: 100px; object-fit: cover; margin-right: 15px; }
        .search-form { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1><a href="index.php?controller=home&action=index">Trang tin tức</a></h1>
        
        <!-- Form Tìm kiếm -->
        <div class="search-form">
            <form method="GET" action="">
                <input type="hidden" name="controller" value="home">
                <input type="hidden" name="action" value="index">
                <input 
                    type="text" 
                    name="keyword" 
                    placeholder="Tìm kiếm tin tức" 
                    value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>" 
                    required>
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form>
        </div>

        <!-- Thanh Category -->
        <div class="categories">
            <strong>Danh mục:</strong>
            <?php foreach ($categories as $category): ?>
                <a 
                    href="?controller=home&action=index&category_id=<?= $category['id'] ?>" 
                    class="<?= isset($_GET['category_id']) && $_GET['category_id'] == $category['id'] ? 'active' : '' ?>">
                    <?= $category['name'] ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Danh sách Tin tức -->
        <div class="news-list">
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                    <div class="news-item">
                        <img src="<?= $item['image'] ?>" alt="Ảnh">
                        <div>
                            <h2>
                                <a href="?controller=news&action=detail&id=<?= $item['id'] ?>">
                                    <?= $item['title'] ?>
                                </a>
                            </h2>
                            <p><?= substr($item['content'], 0, 100) ?>...</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Không tìm thấy tin tức nào!</p>
            <?php endif; ?>
        </div>

        <!-- Phân Trang -->
        <nav>
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                        <a class="page-link" href="?controller=home&action=index&page=<?= $i ?>">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</body>
</html>
