<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="alert <?= h($class) ?>" role="alert"><?= h($message) ?></div>
    </div>
</div>