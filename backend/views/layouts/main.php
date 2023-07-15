<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

\hail812\adminlte3\assets\FontAwesomeAsset::register($this);
\hail812\adminlte3\assets\AdminLteAsset::register($this);
$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback');

$assetDir = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

$publishedRes = Yii::$app->assetManager->publish('@vendor/hail812/yii2-adminlte3/src/web/js');
$this->registerJsFile($publishedRes[1].'/control_sidebar.js', ['depends' => '\hail812\adminlte3\assets\AdminLteAsset']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>
<?php
$js = <<< JS
$(function(){
    // краткое левое меню
    if (localStorage.getItem('short-sidebar') === 'true') {
        $('body').addClass('sidebar-collapse');
    }
    // скрываем полностью широкий левый сайдбар (делаем левый сайдбар узким меню только с иконками)
    $('a[data-widget="pushmenu"]').click(function(){
        // сохраняем положение состояния левой колонки
        if ($('body').hasClass('sidebar-collapse')) {
            localStorage.setItem('short-sidebar', false);
        } else {
            localStorage.setItem('short-sidebar', true);
        }
    });
})
JS;
$this->registerJs($js);
?>
<div class="wrapper">
    <!-- Navbar -->
    <?= $this->render('navbar', ['assetDir' => $assetDir]) ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->render('sidebar', ['assetDir' => $assetDir]) ?>

    <!-- Content Wrapper. Contains page content -->
    <?= $this->render('content', ['content' => $content, 'assetDir' => $assetDir]) ?>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <?= $this->render('control-sidebar') ?>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <?= $this->render('footer') ?>
</div>

<?php $this->endBody() ?>
</body>
<div id="overlay">
    <img id="spinner" src="/img/loader.gif"/>
</div>
<?php
$js = <<<JS
    $(document).ajaxStart(function() {
        $('#overlay').show();
    });
    $(document).ajaxStop(function() {
        $('#overlay').hide();
    });
JS;
$this->registerJs($js);
?>
<style>
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
        display: none;
    }

    #spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
</html>
<?php $this->endPage() ?>
