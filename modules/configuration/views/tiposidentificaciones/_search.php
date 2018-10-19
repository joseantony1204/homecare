<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\TiposidentificacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tiposidentificaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TIID_ID') ?>

    <?= $form->field($model, 'TIID_NOMBRE') ?>

    <?= $form->field($model, 'TIID_DETALLE') ?>

    <?= $form->field($model, 'TIID_CREATEBY') ?>

    <?= $form->field($model, 'TIID_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
