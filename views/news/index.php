<?php foreach ($newsList as $newsItem): ?>
    <div>
        <h3><?= $newsItem['title']; ?></h3>
        <p><?= $newsItem['date']; ?></p>
        <p><?= $newsItem['short_content']; ?></p>
    </div>
<?php endforeach; ?>