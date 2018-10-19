<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\PlanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATPL_ID') ?>

    <?= $form->field($model, 'ATPL_DESCRIPCION') ?>

    <?= $form->field($model, 'ATPL_OBSERVACIONES') ?>

    <?= $form->field($model, 'AGEN_ID') ?>

    <?= $form->field($model, 'ATPL_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATPL_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
