<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CityProduct $model */

$this->title = 'Update City Product: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'City Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="city-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
