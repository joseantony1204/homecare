<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\ProcedimientosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="procedimientos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATPR_ID') ?>

    <?= $form->field($model, 'ATPR_OBSERVACIONES') ?>

    <?= $form->field($model, 'ATPR_FECHASOLICITUD') ?>

    <?= $form->field($model, 'ATPR_RESULTADOS') ?>

    <?= $form->field($model, 'ATPR_FECHAPROCESO') ?>

    <?php // echo $form->field($model, 'ATPR_ESTADO') ?>

    <?php // echo $form->field($model, 'PROC_ID') ?>

    <?php // echo $form->field($model, 'AGEN_ID') ?>

    <?php // echo $form->field($model, 'ATPR_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATPR_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
