<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $books app\models\Book[] */
/* @var $authors */

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest) : ?>
    <p>
        <?= Html::a('Добавить книгу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif; ?>
    <hr>

    <div class="row">
        <?php foreach ($books as $book): ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3><?= Html::a($book->title, Url::to(['book/view', 'id' => $book->id])) ?></h3>
                    </div>
                    <div class="panel-body">
                        <h4><?= $authors[$book->author_id]; ?></h4>
                        Цена: <?= $book->price; ?> руб.
                    </div>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                    <div class="panel-footer">
                        <?= Html::a('Редактировать', Url::to(['book/update', 'id' => $book->id]), ['class' => 'btn btn-info']) ?>
                        <?= Html::a('Удалить', ['delete', 'id' => $book->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите удалить книгу?',
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
    ])
    ?>

</div>
