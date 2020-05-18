<section class="news-preview-bloc">
    <section class="row">
        <?php
            foreach($news as $showNews)
        { ?>
            <div class="col-md-6">
                <a href="index.php?action=showNewsNumber&id=<?= $showNews->newsId()?>">
                    <article class="news-preview">
                        <div class="news-preview-marge">
                            <h1 class="news-title-preview"><?= $showNews->title()?></h1>
                            <p class="news-content-preview"><?= substr($showNews->content(), 0, 250).'...'?></p>
                        </div>
                    </article>
                </a>
            </div>
        <?php } ?>
    </section>
</section>