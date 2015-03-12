<?php $this->start('col-left'); ?>
<?= $this->cell('PopularHashtags'); ?>
<?php $this->end(); ?>

<h1><?= __('Edit your profile') ?></h1>

<div>
    <?= $this->Form->create($account_parameters, [
        'type' => 'file'
    ]) ?>
    <?= $this->Form->input('avatar_image', [
        'type' => 'file'
    ]) ?>
    <div style="width:50%;">
        <?= $this->Avatar->render($account_parameters->get('avatar_file_name')) ?>
    </div>
    <?= $this->Form->input('biography', [
        'class' => 'form-control'
    ]) ?>
    <?= $this->Form->input('locality', [
        'class' => 'form-control'
    ]) ?>
    <?= $this->Form->input('website', [
        'class' => 'form-control'
    ]) ?>
    <?= $this->Form->button(__('Edit'), [
        'class' => 'btn btn-primary'
    ]); ?>
    <?= $this->Form->end() ?>
</div>