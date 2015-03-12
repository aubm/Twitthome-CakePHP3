<h1><?= __('Sign up') ?></h1>
<p><?= __('Already have an account ?') ?> <a
        href="<?= $this->Url->build(['_name' => 'login']) ?>"><?= __('Sign in') ?></a></p>
<div>
    <?= $this->Form->create($user) ?>
    <?= $this->Form->input('username', ['class' => 'form-control']) ?>
    <?= $this->Form->input('email', ['class' => 'form-control']) ?>
    <?= $this->Form->input('first_name', ['class' => 'form-control']) ?>
    <?= $this->Form->input('last_name', ['class' => 'form-control']) ?>
    <?= $this->Form->input('password', ['class' => 'form-control']) ?>
    <?= $this->Form->button(__('Go !'), ['class' => 'btn btn-primary']); ?>
    <?= $this->Form->end() ?>
</div>