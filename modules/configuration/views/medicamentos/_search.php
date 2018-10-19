<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\MedicamentosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicamentos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MEDI_ID') ?>

    <?= $form->field($model, 'MEDI_CODIGOATC') ?>

    <?= $form->field($model, 'MEDI_DESCRIPCIONATC') ?>

    <?= $form->field($model, 'MEDI_PRINCIPIOACTIVO') ?>

    <?= $form->field($model, 'MEDI_CONCENTRACION') ?>

    <?php // echo $form->field($model, 'MEDI_FORMAFARMACEUTICA') ?>

    <?php // echo $form->field($model, 'MEDI_ACLARACION') ?>

    <?php // echo $form->field($model, 'MEDI_LISTA') ?>

    <?php // echo $form->field($model, 'MEDI_VALOR') ?>

    <?php // echo $form->field($model, 'MEDI_CREATEBY') ?>

    <?php // echo $form->field($model, 'MEDI_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
