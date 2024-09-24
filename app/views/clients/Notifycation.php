<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tin Tức</title>
    <link rel="stylesheet" href="base.css">
</head>

<body>
    <!-- <?php
    $data = $input["data"];
    $products = $data["products"];
    ?> -->
    <div class="news-container grid wide">
        <div class="row">
            <!-- Phần Tin Nổi Bật -->
            <div class="col-6 news-highlight">
                <h2>Tin Nổi Bật</h2>
                <div class="news-highlight-item">
                    <img src="<?= htmlspecialchars($data['highlightedArticle']->image_url) ?>" alt="<?= htmlspecialchars($data['highlightedArticle']->title) ?>">
                    <div class="news-content">
                        <h3><a href="article_detail.php?id=<?= $data['highlightedArticle']->id ?>"><?= htmlspecialchars($data['highlightedArticle']->title) ?></a></h3>
                        <p><?= substr(htmlspecialchars($data['highlightedArticle']->content), 0, 100) ?>...</p>
                    </div>
                </div>
            </div>

            <!-- Phần Tin Chính -->
            <div class="col-6 news-main">
                <h2>Tin Chính</h2>
                <?php foreach ($data['mainArticles'] as $mainArticle): ?>
                    <div class="news-main-item">
                        <img src="<?= htmlspecialchars($mainArticle->image_url) ?>" alt="<?= htmlspecialchars($mainArticle->title) ?>">
                        <div class="news-content">
                            <h3><a href="article_detail.php?id=<?= $mainArticle->id ?>"><?= htmlspecialchars($mainArticle->title) ?></a></h3>
                            <p><?= substr(htmlspecialchars($mainArticle->content), 0, 100) ?>...</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Phần Các Danh Mục Tin Khác -->
        <div class="row news-categories">
            <h2>Danh Mục Tin Khác</h2>

            <div class="col-3 news-category-item">
                <h3>Chuyên mục A</h3>
                <?php foreach ($data['categoryAArticles'] as $article): ?>
                    <div class="news-item">
                        <img src="<?= htmlspecialchars($article->image_url) ?>" alt="<?= htmlspecialchars($article->title) ?>">
                        <p><a href="article_detail.php?id=<?= $article->id ?>"><?= htmlspecialchars($article->title) ?></a></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-3 news-category-item">
                <h3>Chuyên mục B</h3>
                <?php foreach ($data['categoryBArticles'] as $article): ?>
                    <div class="news-item">
                        <img src="<?= htmlspecialchars($article->image_url) ?>" alt="<?= htmlspecialchars($article->title) ?>">
                        <p><a href="article_detail.php?id=<?= $article->id ?>"><?= htmlspecialchars($article->title) ?></a></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-3 news-category-item">
                <h3>Chuyên mục C</h3>
                <?php foreach ($data['categoryCArticles'] as $article): ?>
                    <div class="news-item">
                        <img src="<?= htmlspecialchars($article->image_url) ?>" alt="<?= htmlspecialchars($article->title) ?>">
                        <p><a href="article_detail.php?id=<?= $article->id ?>"><?= htmlspecialchars($article->title) ?></a></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-3 news-category-item">
                <h3>Chuyên mục D</h3>
                <?php foreach ($data['categoryDArticles'] as $article): ?>
                    <div class="news-item">
                        <img src="<?= htmlspecialchars($article->image_url) ?>" alt="<?= htmlspecialchars($article->title) ?>">
                        <p><a href="article_detail.php?id=<?= $article->id ?>"><?= htmlspecialchars($article->title) ?></a></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>