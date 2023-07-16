<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var frontend\models\CityProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукты по городу '.$city_model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(['timeout' => 0]); ?>
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->name), ['product/view','city' => $model->city->code, 'slug' => $model->slug]);
        },
    ]) ?>

    <?php Pjax::end(); ?>

</div>
<style>
    ul.pagination > li {
        padding:12px;
    }
    ul.pagination > li.active {
        color:white;
        background-color:lightgrey;
    }
</style>
