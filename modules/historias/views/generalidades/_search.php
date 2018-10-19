<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\GeneralidadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generalidades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATGE_ID') ?>

    <?= $form->field($model, 'ATGE_FECHA') ?>

    <?= $form->field($model, 'ATGE_MOTIVO') ?>

    <?= $form->field($model, 'ATGE_ENFERMEDAD') ?>

    <?= $form->field($model, 'CAEX_ID') ?>

    <?php // echo $form->field($model, 'AGEN_ID') ?>

    <?php // echo $form->field($model, 'ATGE_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATGE_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
