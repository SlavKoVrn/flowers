<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => 'Продукты по городу '.$model->city->name,
    'url' => Url::to(['city-product/index', 'city_id' => $model->city->id]),
];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'slug',
            'price',
            'description:ntext',
            'city.name',
            [
                'attribute' =>'product.id',
                'label'=>'Основной продукт Ид'
            ],
            [
                'attribute' =>'product.slug',
                'label'=>'Основной продукт Ссылка',
                'format'=>'raw',
                'value'=>function($model){
                    return Html::a(Html::encode($model->name), ['product/view',
                        'slug' => $model->product->slug,
                    ]);
                }
            ],
            'product.name',
            'product.price',
            'product.description:ntext',
        ],
    ]) ?>

</div>
