<div class="artifacts-container">
    <?php foreach ((new \App\Shop)->getGoods() as $item) : ?>
        <?php renderCard($item); ?>
    <?php endforeach; ?>
</div>