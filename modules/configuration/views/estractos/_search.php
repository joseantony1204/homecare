<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\EstractosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estractos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ESTR_ID') ?>

    <?= $form->field($model, 'ESTR_NOMBRE') ?>

    <?= $form->field($model, 'ESTR_CREATEBY') ?>

    <?= $form->field($model, 'ESTR_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
