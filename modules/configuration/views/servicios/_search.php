<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\ServiciosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="servicios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'FINA_ID') ?>

    <?= $form->field($model, 'FINA_NOMBRE') ?>

    <?= $form->field($model, 'TIFI_ID') ?>

    <?= $form->field($model, 'FINA_CREATEBY') ?>

    <?= $form->field($model, 'FINA_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
