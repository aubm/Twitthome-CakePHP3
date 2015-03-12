<?php $this->start('col-left'); ?>
<?= $this->cell('PopularHashtags'); ?>
<?php $this->end(); ?>

<h1><?= __('Tweets about') ?> #<?= h($hashtag_name) ?></h1>

<ul class="tweets-list">
    <?php foreach ($tweets as $tweet): ?>
        <?= $this->Tweet->render($tweet) ?>
    <?php endforeach; ?>
    <?= $this->TweetInfiniteScroll->render([
        'what' => 'tagged',
        'options[tag_name]' => $hashtag_name
    ]) ?>
</ul>