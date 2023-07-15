<?php

/** @var yii\web\View $this */
/** @var common\models\CityProduct $model */

$this->title = 'Добавить продукт по городу';
$this->params['breadcrumbs'][] = ['label' => 'Продукты по городам', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-product-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
