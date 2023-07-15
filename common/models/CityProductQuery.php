<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CityProduct]].
 *
 * @see CityProduct
 */
class CityProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CityProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CityProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
