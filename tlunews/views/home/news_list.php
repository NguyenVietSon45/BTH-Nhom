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
