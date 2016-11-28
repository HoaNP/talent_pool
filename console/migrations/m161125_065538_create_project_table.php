<?php

use yii\db\Migration;

/**
 * Handles the creation of table `project`.
 */
class m161125_065538_create_project_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('project', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'summary' => $this->text(),
            ''

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('project');
    }
}
