<?php

use yii\db\Migration;

/**
 * Class m230715_082310_create_table_city
 */
class m230715_082310_create_table_city extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%city}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'name' => $this->string(),
        ], $tableOptions);

        $this->createIndex('idx-city_code', '{{%city}}', 'code');

        $this->batchInsert('{{%city}}', ['code','name'], [
            ['chita','Чита'],
            ['vrn','Воронеж'],
            ['msk','Москва'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city}}');
    }

}
