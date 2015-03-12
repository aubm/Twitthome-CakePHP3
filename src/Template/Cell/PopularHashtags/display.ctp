<div class="content-box">
    <div class="trends">
        <h3><?= __('Trends') ?></h3>
        <ul>
            <?php foreach ($hashtags as $hashtag): ?>
                <li>
                    <a href="<?= $this->Url->build([
                        '_name' => 'hashtag_details',
                        'name' => $hashtag->name
                    ]) ?>">
                        #<?= h($hashtag->name) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>