<?php

use yii\db\Migration;

/**
 * Class m230715_105422_create_table_city_product
 */
class m230715_105422_create_table_city_product extends Migration
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

        $this->createTable('{{%city_product}}', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'slug' => $this->string(),
            'price' => $this->integer(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx-city_product-city_id', '{{%city_product}}', 'city_id');
        $this->createIndex('idx-city_product-product_id', '{{%city_product}}', 'product_id');
        $this->createIndex('idx-city_product-name', '{{%city_product}}', 'name');
        $this->createIndex('idx-city_product-slug', '{{%city_product}}', 'slug');
        $this->createIndex('idx-city_product-price', '{{%city_product}}', 'price');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city_product}}');
    }
}
