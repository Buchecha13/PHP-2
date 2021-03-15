<h1><?=$product->name?></h1>

<div class="product-item">
    <img src="/product_images/<?= $product->img ?>" alt="">
    <p>Описание: <?= $product->description ?></p>
    <p>Цена: <span><?= $product->price ?></span></p>
    <button>Купить</button>
</div>