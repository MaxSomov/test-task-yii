<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $authors app\models\Author[] */
/* @var \yii\data\Pagination $pages */


$this->title = 'Авторы';
$this->params['breadcrubs'][] = $this->title;
?>
<div class="author-index">

    <h1><?= $this->title; ?></h1>

    <?php if (!Yii::$app->user->isGuest) : ?>
    <p>
        <?= Html::a('Добавить автора', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif; ?>
    <hr>

    <div class="row">
        <?php foreach ($authors as $author): ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><?= Html::a($author->name, Url::to(['author/view', 'id' => $author->id])) ?></h3>
                    </div>
                    <div class="panel-body">
                        Количесто книг: <?= $author->books_count; ?>
                    </div>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                    <div class="panel-footer">
                        <?= Html::a('Редактировать', Url::to(['author/update', 'id' => $author->id]), ['class' => 'btn btn-info']) ?>
                        <?= Html::a('Удалить', ['delete', 'id' => $author->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить автора?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
</div>
