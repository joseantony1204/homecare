<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\PagosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PAGO_ID') ?>

    <?= $form->field($model, 'PAGO_FECHA') ?>

    <?= $form->field($model, 'PAGO_PERIODO') ?>

    <?= $form->field($model, 'PAGO_MES') ?>

    <?= $form->field($model, 'PAGO_ANIO') ?>

    <?php // echo $form->field($model, 'AFIL_ID') ?>

    <?php // echo $form->field($model, 'PAGO_CREATEBY') ?>

    <?php // echo $form->field($model, 'PAGO_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
