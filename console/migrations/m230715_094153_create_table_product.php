<?php

use yii\db\Migration;

/**
 * Class m230715_094153_create_table_product
 */
class m230715_094153_create_table_product extends Migration
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

        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'slug' => $this->string(),
            'price' => $this->integer(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx-product_name', '{{%product}}', 'name');
        $this->createIndex('idx-product_slug', '{{%product}}', 'slug');
        $this->createIndex('idx-product_price', '{{%product}}', 'price');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }

}
