<?php

use yii\db\Migration;

/**
 * Handles adding created_at to table `{{%Books}}`.
 */
class m190211_104255_add_created_at_column_to_Books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Books', 'created_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('Books', 'created_at');
    }
}
