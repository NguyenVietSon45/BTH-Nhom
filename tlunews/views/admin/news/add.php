<!DOCTYPE html>
<html>
<head>
    <title>Thêm tin tức</title>
</head>
<body>
    <h1>Thêm tin tức</h1>
    <form method="POST" action="?controller=admin&action=saveNews">
        <label>Tiêu đề:</label>
        <input type="text" name="title" required><br>

        <label>Nội dung:</label>
        <textarea name="content" required></textarea><br>

        <label>Ảnh:</label>
        <input type="text" name="image" required placeholder="Đường dẫn ảnh"><br>

        <label>Danh mục:</label>
        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Lưu</button>
    </form>
</body>
</html>
