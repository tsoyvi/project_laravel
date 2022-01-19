<h2>Категория - <?= $category['title'] ?></h2>

<h3>Список новостей</h3>

<div>
    <div>
        <?php foreach ($category['news'] as $news) : ?>
            <div>
                <h4><a href="<?= route('news.show', [ 'id' => $category['id'], 'idNews' => $news['id']  ]) ?>"> <?= $news['title'] ?></a></h4>
                <p><?= $news['description'] ?></p>
                <p>автор <?= $news['author'] ?> добавлено: <?= $news['created_at'] ?></p>
            </div>
            <hr>

        <?php endforeach; ?>
    </div>
</div>
<hr>