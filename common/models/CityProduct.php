<?php

namespace common\models;

use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "{{%city_product}}".
 *
 * @property int $id
 * @property int|null $city_id
 * @property int|null $product_id
 * @property string|null $name
 * @property string|null $slug
 * @property int|null $price
 * @property string|null $description
 */
class CityProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%city_product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city_id', 'product_id', 'price'], 'integer'],
            [['description'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'city_id' => 'Город',
            'product_id' => 'Продукт',
            'name' => 'Название',
            'slug' => 'Линк',
            'price' => 'Цена',
            'description' => 'Описание',
        ];
    }

    public function behaviors()
    {
        return [
            'SluggableBehavior' => [
                'class' => SluggableBehavior::class,
                'attribute' => 'name',
                'immutable' => true,
                'ensureUnique' => true,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     * @return CityProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CityProductQuery(get_called_class());
    }
}
