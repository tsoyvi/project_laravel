<h2>Категории новостей</h2>
<?php foreach ($categoryList as $categories) : ?>

    <div>
        <h4><a href="<?= route('category.show', ['id' => $categories['id']]) ?>"> <?= $categories['title'] ?></a></h4>

        <p><?= $categories['description'] ?></p>

    </div>
    <hr>

<?php endforeach; ?>