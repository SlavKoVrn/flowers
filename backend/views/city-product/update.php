<?php

/** @var yii\web\View $this */
/** @var common\models\CityProduct $model */

$this->title = 'Изменить продукт по городу: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'City Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="city-product-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
