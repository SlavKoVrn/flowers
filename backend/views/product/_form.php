<?php
use common\models\City;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;

/** @var yii\web\View $this */
/** @var common\models\Product $model */
/** @var yii\widgets\ActiveForm $form */

\common\assets\IziToastAsset::register($this);
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php if (!$model->isNewRecord) : ?>
    <?php $cities = City::getCities() ?>
        <table>
        <?php foreach ($cities as $key => $name) :?>
            <tr>
                <td>
                    <?= Html::button($name,[
                        'class' => 'btn btn-primary city',
                        'city_id' => $key,
                        'product_id' => $model->id,
                         'data-toggle'=>'modal',
                         'data-target'=>'#edit_city_product'
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    <style>
        #edit_city_product .modal-lg {
            width: auto;
            max-width: 90%;
        }
    </style>
<?php
Modal::begin([
    'id' => 'edit_city_product',
    'size' => Modal::SIZE_LARGE,
    'clientEvents' => [
        'show.bs.modal' => 'function(e) {
            var button = $(e.relatedTarget),
            modal = $(this);
            $.ajax({
                type:"get",
                url: "/admin/city-product/create",
                data: {
                    city_id:button.attr("city_id"),
                    product_id:button.attr("product_id")
                },
                success: function (data) {
                    modal.find(".modal-body").html(data);
                },
                error: function () {
                },
            });
        }',
        'hidden.bs.modal' => 'function(e) {
            $(this).find(".modal-body").html("");
        }',
    ]
]);
Modal::end();
?>