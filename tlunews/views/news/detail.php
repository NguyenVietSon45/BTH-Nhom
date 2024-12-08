<!DOCTYPE html>
<html>
<head>
    <title><?= $news['title'] ?></title>
    <style>
        .news-detail img { max-width: 100%; height: auto; }
    </style>
</head>
<body>
    <h1><?= $news['title'] ?></h1>
    <div class="news-detail">
        <img src="<?= $news['image'] ?>" alt="Ảnh">
        <p><?= $news['content'] ?></p>
    </div>
    <a href="index.php">Quay lại</a>
</body>
</html>
