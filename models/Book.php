<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Books".
 *
 * @property int $id
 * @property string $title
 * @property double $price
 * @property int $author_id
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'author_id'], 'required'],
            [['price'], 'number'],
            [['author_id'], 'integer'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'title' => 'Название',
            'price' => 'Цена',
            'author_id' => 'Автор',
        ];
    }
}
