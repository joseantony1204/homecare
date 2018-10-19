<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\GenerosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TIGE_ID') ?>

    <?= $form->field($model, 'TIGE_NOMBRE') ?>

    <?= $form->field($model, 'TIGE_DETALLE') ?>

    <?= $form->field($model, 'TIGE_CREATEBY') ?>

    <?= $form->field($model, 'TIGE_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
