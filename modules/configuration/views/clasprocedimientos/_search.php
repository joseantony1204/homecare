<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\ClasprocedimientosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasprocedimientos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PROC_ID') ?>

    <?= $form->field($model, 'PROC_NOMBRE') ?>

    <?= $form->field($model, 'PROC_DESCRIPCION') ?>

    <?= $form->field($model, 'PROC_CUPS') ?>

    <?= $form->field($model, 'PROC_SOAT') ?>

    <?php // echo $form->field($model, 'PROC_VALOR') ?>

    <?php // echo $form->field($model, 'PROC_REFERENCIA') ?>

    <?php // echo $form->field($model, 'PROC_UNIDAD') ?>

    <?php // echo $form->field($model, 'TIPR_ID') ?>

    <?php // echo $form->field($model, 'ARLA_ID') ?>

    <?php // echo $form->field($model, 'NILA_ID') ?>

    <?php // echo $form->field($model, 'PROC_CREATEBY') ?>

    <?php // echo $form->field($model, 'PROC_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
