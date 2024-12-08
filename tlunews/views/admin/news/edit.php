<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Sửa Tin Tức</h1>
    <div class="text-end mb-3">
        <a href="../dashboard.php" class="btn btn-secondary">Quay Lại Dashboard</a>
        <a href="index.php" class="btn btn-info">Danh Sách Tin Tức</a>
    </div>
    <?php
    require_once '../../config.php';
    require_once '../models/News.php';

    $newsModel = new News($pdo);
    $news = $newsModel->getNewsById($_GET['id']);
    ?>
    <form action="update.php?id=<?php echo $news['id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu Đề</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $news['title']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội Dung</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?php echo $news['content']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="<?php echo $news['image']; ?>" alt="Current Image" style="max-width: 200px; margin-top: 10px;">
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
</div>
</body>
</html>