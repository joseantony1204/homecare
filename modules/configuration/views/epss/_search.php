<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\EpssSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="epss-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'EPSS_ID') ?>

    <?= $form->field($model, 'EPSS_NOMBRE') ?>

    <?= $form->field($model, 'EPSS_CODIGO') ?>

    <?= $form->field($model, 'EPSS_DIRECCION') ?>

    <?= $form->field($model, 'EPSS_TELEFONO') ?>

    <?php // echo $form->field($model, 'EPSS_CREATEBY') ?>

    <?php // echo $form->field($model, 'EPSS_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
