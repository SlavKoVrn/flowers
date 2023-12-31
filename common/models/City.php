<?php

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%city}}".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $name
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%city}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ид',
            'code' => 'Код',
            'name' => 'Город',
        ];
    }

    public static function getCities()
    {
        $cities = self::find()->all();
        return ArrayHelper::map($cities,'id','name');
    }

}
