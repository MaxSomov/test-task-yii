<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 11.02.2019
 * Time: 11:02
 */

namespace app\modules\api\modules\v1\controllers;


use yii\rest\ActiveController;

class AuthorController extends ActiveController
{
    public $modelClass = 'app\modules\api\modules\v1\models\Author';
}