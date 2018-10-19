<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\ClasdiagnosticosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasdiagnosticos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DIAG_ID') ?>

    <?= $form->field($model, 'DIAG_NOMBRE') ?>

    <?= $form->field($model, 'DIAG_CODIGO') ?>

    <?= $form->field($model, 'DIAG_CREATEBY') ?>

    <?= $form->field($model, 'DIAG_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
