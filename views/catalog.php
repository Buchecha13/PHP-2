<h1>Каталог</h1>

<div class="products">
    <?php foreach ($products as $product): ?>
        <div class="product-item">
            <h3><a href="/catalog/card/?id=<?= $product->id ?>"><?= $product->name ?></a></h3>
            <img height="100px" src="/product_images/<?= $product->img ?>" alt="<?= $product->name ?>">
            <p>Цена: <span><?= $product->price ?></span></p>
            <button>Купить</button>
        </div>
    <?php endforeach ?>
</div>