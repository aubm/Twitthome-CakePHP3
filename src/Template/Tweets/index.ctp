<?php

use \App\Model\Entity\Tweet;

$user = $this->Session->read('Auth.User');
$this->Html->script('new_tweet_form.js', ['block' => true]);
?>

<?php $this->start('col-left'); ?>
<?= $this->cell('PopularHashtags'); ?>
<?php $this->end(); ?>

<?php if (!empty($user)): ?>
    <div id="new_tweet">
        <?= $this->Form->create(new Tweet(), [
            'url' => ['_name' => 'tweet_create'],
            'type' => 'file'
        ]); ?>
        <?= $this->Form->input('content', [
            'label' => false,
            'class' => 'form-control',
            'placeholder' => __('What\'s up ?')
        ]); ?>
        <div class="blur-hidden">
            <?= $this->Form->button('<i class="fa fa-pencil"></i> ' . __('Tweeter'), [
                'class' => 'btn btn-primary pull-right',
                'disabled' => true
            ]); ?>
            <div id="chars-left-counter" class="pull-right">140</div>
        </div>
        <?= $this->Form->end(); ?>
        <div class="clearfix"></div>
    </div>
<?php endif; ?>

<ul class="tweets-list">
    <?php foreach ($tweets as $tweet): ?>
        <?= $this->Tweet->render($tweet) ?>
    <?php endforeach; ?>
    <?= $this->TweetInfiniteScroll->render() ?>
</ul>