<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Authors".
 *
 * @property int $id
 * @property string $name
 * @property int $books_count
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['books_count'], 'integer'],
            [['books_count'], 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'name' => 'ФИО',
            'books_count' => 'Количество книг',
        ];
    }
}
