<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\MediospagosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mediospagos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MEPA_ID') ?>

    <?= $form->field($model, 'MEPA_NOMBRE') ?>

    <?= $form->field($model, 'MEPA_CREATEBY') ?>

    <?= $form->field($model, 'MEPA_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
