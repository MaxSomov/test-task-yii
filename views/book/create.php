<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $authors app\models\Author */

$this->title = 'Новая книга';
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
        'authors' => $authors,
    ]) ?>

</div>
