<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Author */
/* @var $books app\models\Book[] */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="author-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest) : ?>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить автора?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php endif; ?>
    <hr>

    <p><b>Количество книг: <?= $model->books_count; ?></b></p>

    <div class="row">
    <?php foreach ($books as $book): ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?= Html::a($book->title, Url::to(['book/view', 'id' => $book->id])); ?></div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

</div>
