<?php

use common\models\City;
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
            [
                'attribute'=>'city_id',
                'filter'=>City::getCities(),
                'content'=>function($model){
                    return $model->city->name;
                }
            ],
            [
                'attribute'=>'product_id',
                'content'=>function($model){
                    return $model->product->name;
                }
            ],
            'name',
            'slug',
            [
                'attribute'=>'price',
                'contentOptions' => ['style' => 'text-align:right;'],
            ],
            //'description:ntext',
            /*
            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<span class="mdi mdi-eye"></span>',
                            $url, ['class' => 'btn btn-success', 'title' => 'Просмотр']
                        );
                    },
                ],
            ],
            */
        ],
    ]); ?>

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
