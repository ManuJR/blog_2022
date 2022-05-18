<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?= $article->getImage() ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"><?= $article->title ?></h5>
        <p class="card-text"><?= $article->shortDescription() ?></p>
        <a href="<?= FOLDER ?>/article/<?= $article->id ?>" class="btn btn-primary">Ver</a>
    </div>
</div>


