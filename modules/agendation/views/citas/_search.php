<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\CitasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="citas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CITA_ID') ?>

    <?= $form->field($model, 'CITA_FECHA') ?>

    <?= $form->field($model, 'CITA_FECHAREGISTRO') ?>

    <?= $form->field($model, 'CITA_LLEGADA') ?>

    <?= $form->field($model, 'CIES_ID') ?>

    <?php // echo $form->field($model, 'CIFI_ID') ?>

    <?php // echo $form->field($model, 'CICE_ID') ?>

    <?php // echo $form->field($model, 'PEPA_ID') ?>

    <?php // echo $form->field($model, 'EMHO_ID') ?>

    <?php // echo $form->field($model, 'CIDI_ID') ?>

    <?php // echo $form->field($model, 'CICS_ID') ?>

    <?php // echo $form->field($model, 'CITA_FECHACAMBIO') ?>

    <?php // echo $form->field($model, 'CITA_REGISTRADOPOR') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
