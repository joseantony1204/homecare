<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\BancosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bancos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'BANC_ID') ?>

    <?= $form->field($model, 'BANC_NIT') ?>

    <?= $form->field($model, 'BANC_NOMBRE') ?>

    <?= $form->field($model, 'BANC_DIRECCION') ?>

    <?= $form->field($model, 'BANC_TELEFONO') ?>

    <?php // echo $form->field($model, 'BANC_CREATEBY') ?>

    <?php // echo $form->field($model, 'BANC_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
