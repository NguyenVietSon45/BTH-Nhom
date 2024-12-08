<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Trang Quản Trị</h1>
    <div class="text-end">
        <a href="index.php?controller=admin&action=logout" class="btn btn-danger">Đăng Xuất</a>
    </div>
    <div class="mt-4">
        <h2>Quản Lý Tin Tức</h2>
        <a href="news/index.php" class="btn btn-primary">Xem Tất Cả Tin Tức</a>
        <a href="news/add.php" class="btn btn-success">Thêm Tin Tức Mới</a>
    </div>
</div>
</body>
</html>