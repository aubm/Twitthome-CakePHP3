<?php
$user = $this->Session->read('Auth.User');
$cakeDescription = 'Home made twitter with CakePHP !';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <?= $this->Html->css('app.min.css') ?>
    <?= $this->Html->script('../bower_components/jquery/dist/jquery.min.js') ?>
    <?= $this->Html->script('../bower_components/jscroll/jquery.jscroll.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<header class="page-header">
    <div class="container">
        <div class="logo-container pull-left">
            <a href="<?= $this->Url->build(['_name' => 'homepage']) ?>">
                <img src="/img/logo.png" alt="Twitthome"/>
            </a>
        </div>
        <div class="login-box-container pull-right">
            <?php if (empty($user)): ?>
                <a class="btn btn-default"
                   href="<?= $this->Url->build(['_name' => 'login']) ?>"><?= __('Sign in') ?></a>
            <?php else: ?>
                <p><?= __('Hi') ?>
                    <strong>
                        <a href="<?= $this->Url->build(['_name' => 'user_details', 'username' => $user['username']]) ?>">
                            <?= $user['username'] ?>
                        </a>
                    </strong> !
                    <a class="edit-profile-link"
                       href="<?= $this->Url->build(['_name' => 'account_parameters_edit']) ?>">
                        <?= __('Edit your profile') ?></a>&nbsp;
                </p>
                <p class="sign-out-link"><a
                        href="<?= $this->Url->build(['_name' => 'logout']) ?>"><i
                            class="fa fa-sign-out"></i> <?= __('Sign out') ?></a></p>

            <?php endif; ?>
        </div>
    </div>
</header>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-left">
                <?= $this->fetch('col-left') ?>
            </div>
            <div class="col-md-6 col-center">
                <div class="content-box">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
            <div class="col-md-3 col-right">
                <?= $this->fetch('col-right') ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
