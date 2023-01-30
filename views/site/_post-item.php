<?php

/**
 * @var $this View
 * @var $model Post
 */

use app\entities\Post;
use yii\web\View;

?>
<div class="card card-default">
    <div class="card-body">
        <h5 class="card-title"><?= $model->getAuthor() ?></h5>
        <p><?= $model->getMessage() ?></p>
        <p>
            <small class="text-muted"><?= $model->getFormattedDate() ?> | <?= $model->getDisplayedIP() ?></small>
        </p>
    </div>
</div>
