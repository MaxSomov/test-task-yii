<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Books}}`.
 */
class m190205_071911_create_Books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Books}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100)->notNull(),
            'price' => $this->double()->notNull(),
            'author_id' => $this->integer()->notNull()
        ]);
        $this->createIndex(
            'idx-books-author_id',
            'Books',
            'author_id'
        );
        $this->addForeignKey(
            'fk-books-author_id',
            'Books',
            'author_id',
            'Authors',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-books-author_id',
            'Books'
        );
        $this->dropIndex(
            'idx-books-author_id',
            'Books'
        );
        $this->dropTable('{{%Books}}');
    }
}
