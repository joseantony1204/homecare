<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\CargosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CARG_ID') ?>

    <?= $form->field($model, 'CARG_NOMBRE') ?>

    <?= $form->field($model, 'CARG_FECHACAMBIO') ?>

    <?= $form->field($model, 'CARG_REGISTRADOPOR') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
