<?php

use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\CityProduct $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты по городам', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="city-product-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'city_id',
            'product_id',
            'name',
            'slug',
            'price',
            'description:ntext',
        ],
    ]) ?>

</div>
