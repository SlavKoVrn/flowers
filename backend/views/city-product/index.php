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
            [
                'attribute'=>'id',
                'sortLinkOptions' => [
                    'class' => ($searchModel->order == 'id')?'fa fa-sort-down':(($searchModel->order == '-id')?'fa fa-sort-up':'fa fa-sort'),
                ],
            ],
            [
                'attribute'=>'city_id',
                'filter'=>City::getCities(),
                'sortLinkOptions' => [
                    'class' => ($searchModel->order == 'city_id')?'fa fa-sort-down':(($searchModel->order == '-city_id')?'fa fa-sort-up':'fa fa-sort'),
                ],
                'content'=>function($model){
                    return $model->city->name;
                }
            ],
            [
                'attribute'=>'product_id',
                'sortLinkOptions' => [
                    'class' => ($searchModel->order == 'product_id')?'fa fa-sort-down':(($searchModel->order == '-product_id')?'fa fa-sort-up':'fa fa-sort'),
                ],
                'content'=>function($model){
                    return $model->product->name;
                }
            ],
            [
                'attribute'=>'name',
                'sortLinkOptions' => [
                    'class' => ($searchModel->order == 'name')?'fa fa-sort-down':(($searchModel->order == '-name')?'fa fa-sort-up':'fa fa-sort'),
                ],
            ],
            [
                'attribute'=>'slug',
                'sortLinkOptions' => [
                    'class' => ($searchModel->order == 'slug')?'fa fa-sort-down':(($searchModel->order == '-slug')?'fa fa-sort-up':'fa fa-sort'),
                ],
            ],
            [
                'attribute'=>'price',
                'contentOptions' => ['style' => 'text-align:right;'],
                'sortLinkOptions' => [
                    'class' => ($searchModel->order == 'price')?'fa fa-sort-down':(($searchModel->order == '-price')?'fa fa-sort-up':'fa fa-sort'),
                ],

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
