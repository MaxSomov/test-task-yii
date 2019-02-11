<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 11.02.2019
 * Time: 14:43
 */

namespace app\commands;


use app\models\Book;
use yii\console\Controller;

class BookController extends Controller
{
    public function actionRemoveOld(){
        $currentTime = time();
        $count = Book::find()->where(['<', 'created_at', $currentTime-60])->count();
        Book::deleteAll(['<', 'created_at', $currentTime-60*60*24*365]);
        $this->stdout("Removed ".$count." books!");
        return 0;
    }
}