<h1>Profile of <?= h($user->username) ?></h1>

<?php $this->start('col-left'); ?>
<div class="content-box">
    <div class="user-details">
        <div class="avatar">
            <?= $this->Avatar->render($user->account_parameter->avatar_file_name) ?>
        </div>
        <h3 class="real-name"><?= h($user->first_name) ?> <?= h($user->last_name) ?></h3>

        <p class="username">@<?= h($user->username) ?></p>

        <?php if ($user->account_parameter->biography): ?>
            <p class="bio"><?= $user->account_parameter->biography ?></p>
        <?php endif; ?>

        <?php if ($user->account_parameter->locality): ?>
            <p class="locality"><i class="fa fa-map-marker"></i> <?= h($user->account_parameter->locality) ?></p>
        <?php endif; ?>

        <?php if ($user->account_parameter->website): ?>
            <p class="website">
                <i class="fa fa-link"></i>
                <a target="_blank" href="http://<?= h($user->account_parameter->website) ?>">
                    <?= h($user->account_parameter->website) ?>
                </a>
            </p>
        <?php endif; ?>
    </div>
</div>

<?= $this->cell('PopularHashtags'); ?>
<?php $this->end(); ?>

<ul class="tweets-list">
    <?php foreach ($tweets as $tweet): ?>
        <?= $this->Tweet->render($tweet) ?>
    <?php endforeach; ?>
    <?= $this->TweetInfiniteScroll->render([
        'what' => 'user',
        'options[username]' => $user->username
    ]) ?>
</ul>