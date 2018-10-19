<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\HabitosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="habitos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATHA_ID') ?>

    <?= $form->field($model, 'ATHA_ALCOHOL') ?>

    <?= $form->field($model, 'ATHA_CIGARRILLO') ?>

    <?= $form->field($model, 'ATHA_DROGAS') ?>

    <?= $form->field($model, 'ATHA_OTROS') ?>

    <?php // echo $form->field($model, 'PERS_ID') ?>

    <?php // echo $form->field($model, 'ATHA_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATHA_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
