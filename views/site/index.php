<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $books integer */
/* @var $authors integer */

$this->title = 'Maxim Somov';
?>
<div class="site-index">
    <p><?= Html::a('Авторы (' . $authors . ')', Url::to(['author/index']), ['class' => 'btn btn-default']) ?></p>
    <p><?= Html::a('Книги (' . $books . ')', Url::to(['book/index']), ['class' => 'btn btn-default']) ?></p>
</div>
