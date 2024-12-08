<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tin Tức</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Danh Sách Tin Tức</h1>
    <div class="text-end mb-3">
        <a href="../dashboard.php" class="btn btn-secondary">Quay Lại Dashboard</a>
        <a href="add.php" class="btn btn-success">Thêm Tin Tức</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tiêu Đề</th>
            <th>Ngày Tạo</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Lấy danh sách tin tức từ cơ sở dữ liệu
        require_once '../../db.php';
        require_once '../models/News.php';

        $newsModel = new News($db);
        $newsList = $newsModel->getAllNews();

        foreach ($newsList as $news) {
            echo "<tr>
                    <td>{$news['id']}</td>
                    <td>{$news['title']}</td>
                    <td>{$news['created_at']}</td>
                    <td>
                        <a href='edit.php?id={$news['id']}' class='btn btn-warning btn-sm'>Sửa</a>
                        <a href='delete.php?id={$news['id']}' class='btn btn-danger btn-sm'>Xóa</a>
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>