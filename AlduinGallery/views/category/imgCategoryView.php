<p>category: </p>
<h2><?php echo $categories[0]['CatName']; ?></h2>
<?php var_dump($albums); ?>
<?php foreach ($albums as $album): ?>
    <li><a href="#"><?= $album['AlbumName'] ?></a>
        <div class="vote-container">
            <span class="likes"></span>
            <span class="glyphicon glyphicon-thumbs-up"></span>
            <span class="glyphicon glyphicon-thumbs-down"></span>
            <span class="unlikes"></span>
        </div>
        <p id="alb-comment"><?= $album['AlbumComment'] ?></p>
    </li>

<?php endforeach; ?>