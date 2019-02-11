<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 11.02.2019
 * Time: 11:29
 */

namespace app\modules\api\modules\v1\controllers;


use app\modules\api\modules\v1\models\Book;
use yii\rest\ActiveController;
use Yii;

class BookController extends ActiveController
{
    public $modelClass = 'app\modules\api\modules\v1\models\Book';

    protected function verbs()
    {
        return [
            'update' => ['POST']
        ];
    }

    public function actionList()
    {
        $query = "select Books.id as id, Books.title as title, Books.price as price, Authors.name as author from Books inner join Authors on Books.author_id = Authors.id";
        $books = Yii::$app->db->createCommand($query)->queryAll();
        return $books;
    }

    public function actionFind($id)
    {
        $query = "select Books.id as id, Books.title as title, Books.price as price, Authors.name as author from Books inner join Authors on Books.author_id = Authors.id where Books.id = $id";
        $books = Yii::$app->db->createCommand($query)->queryAll();
        return $books;
    }

    public function actionUpdate($id)
    {
        $model = Book::findOne($id);
        $model->title = "test";
        $model->save();
        return true;
    }
}