<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\CityProduct $model */

$this->title = 'Create City Product';
$this->params['breadcrumbs'][] = ['label' => 'City Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
