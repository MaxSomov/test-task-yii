<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Authors}}`.
 */
class m190205_071628_create_Authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Authors}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'books_count' => $this->integer()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Authors}}');
    }
}
