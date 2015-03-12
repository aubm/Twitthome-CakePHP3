<?php foreach ($tweets as $tweet): ?>
    <?= $this->Tweet->render($tweet) ?>
<?php endforeach; ?>
<?php if (count($tweets) && (count($tweets) >= $limit)): ?>
    <?php
    $href = $this->Url->build([
        '_name' => 'tweet_load',
        'what' => $what,
        'offset' => $offset,
        'limit' => $limit,
        'options[username]' => $username,
        'options[tag_name]' => $tag_name
    ]);
    ?>
    <a class="jscroll-next" href="<?= $href ?>"></a>
<?php endif; ?>