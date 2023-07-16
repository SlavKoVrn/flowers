<?php

use common\models\Product;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
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
