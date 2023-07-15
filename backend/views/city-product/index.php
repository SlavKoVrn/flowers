<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\CityProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукты по городам';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-product-index">

    <?php Pjax::begin(['timeout'=>0]); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'city_id',
            'product_id',
            'name',
            'slug',
            'price',
            //'description:ntext',
            /*
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CityProduct $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            */
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
