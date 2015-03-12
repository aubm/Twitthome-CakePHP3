<h1><?= __('Sign in') ?></h1>
<p><?= __('No account ?') ?> <a href="<?= $this->Url->build(['_name' => 'register']) ?>"><?= __('Sign up') ?></a></p>
<div>
    <?= $this->Form->create() ?>
    <?= $this->Form->input('username', ['class' => 'form-control']) ?>
    <?= $this->Form->input('password', ['class' => 'form-control']) ?>
    <?= $this->Form->button(__('Sign in'), ['class' => 'btn btn-primary']); ?>
    <?= $this->Form->end() ?>
</div>