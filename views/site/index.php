<?php include(ROOT . '/views/layouts/header.php'); ?>
    <h1>Главная страница</h1>
    <div class="wrapp">
        <div class="mainpage">
            <h3>Категории товаров: </h3>
            <? foreach ($categories as $categoryItem): ?>
                <h4 style="display: inline-block"><a
                            href="/category/<?= $categoryItem['id']; ?>"><?= $categoryItem['name']; ?></a></span></h4>
            <? endforeach; ?>
        </div>
        <div class="mainpage">
            <h3>Товары: </h3>
            <? foreach ($latestProducts as $product): ?>
                <a href="/product/<?= $product['id']; ?>">
                    <div style="display: inline-block;border: 4px solid #00FF37FF;">
                        <h5><?= $product['name']; ?></h5>
                        <img src="<?= $product['image']; ?>" alt="">
                        <h4>Цена: <?= $product['price']; ?> $</h4>
                    </div>
                </a>


            <? endforeach; ?>
        </div>
    </div>
<?php include(ROOT . '/views/layouts/footer.php'); ?>