<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\RemisionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="remisiones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATRM_ID') ?>

    <?= $form->field($model, 'ATRM_REMITIDOA') ?>

    <?= $form->field($model, 'ATRM_OBSERVACIONES') ?>

    <?= $form->field($model, 'AGEN_ID') ?>

    <?= $form->field($model, 'ATRM_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATRM_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
