<?php
use common\models\City;
use common\models\Product;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CityProduct $model */
/** @var yii\widgets\ActiveForm $form */

$city = City::findOne($model->city_id);
$product = Product::findOne($model->product_id);
?>

<div class="city-product-form">

    <?php $form = ActiveForm::begin([
        'id'=>'city_product_form',
    ]); ?>

    <?= $form->field($model, 'city_id')->dropDownList([$city->id =>$city->name]) ?>

    <?= $form->field($model, 'product_id')->dropDownList([$product->id=>$product->name]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php ActiveForm::end(); ?>

    <div class="form-group">
        <?= Html::button('Сохранить', [
            'id'=>'save_city_product',
            'class' => 'btn btn-success'])
        ?>
    </div>

</div>
<?php
$js=<<<JS
$(document).on('click','#save_city_product', function(e){
    e.preventDefault();
    e.stopImmediatePropagation();
    let form = document.getElementById('city_product_form');
    let formData = new FormData(form);
    $.ajax({
        url: '/admin/city-product/create',
        type: 'post',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function (data) {
            if(data.success){
                $('button.close').click();
                iziToast.success({
                    title: 'Успешно',
                    message: 'без ошибок',
                    timeout: 2000
                });
            }else{
                $('.help-block').remove();
                $.each(data, function(key, val) {
                    $("#"+key).after("<div class=\"help-block\" style=\"color:red\">"+val+"</div>");
                });
                iziToast.error({
                    title: 'Ошибка',
                    message: 'внимательнее',
                    timeout: 2000
                });
            }
        },
        error: function () {
            console.log("Something went wrong");
        }
    });
});
JS;
$this->registerJS($js);
