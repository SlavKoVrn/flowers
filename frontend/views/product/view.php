<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Product $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
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
        ],
    ]) ?>

    <table>
        <?php foreach ($model->cityProducts as $city_product) : ?>
            <tr><td>
            <?= Html::a(Html::encode($city_product->name.' - '.$city_product->city->name), ['product/view',
                'slug' => $city_product->slug,
                'city' => $city_product->city->code,
            ]) ?>
            </td></tr>
        <?php endforeach; ?>
    </table>

</div>
