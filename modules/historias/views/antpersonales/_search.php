<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\AntpersonalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antpersonales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATAP_ID') ?>

    <?= $form->field($model, 'ATAP_HIPERTENSION') ?>

    <?= $form->field($model, 'ATAP_DIABETES') ?>

    <?= $form->field($model, 'ATAP_ENETOMBOTICA') ?>

    <?= $form->field($model, 'ATAP_CONVULSIONES') ?>

    <?php // echo $form->field($model, 'ATAP_VALVULOPATIAS') ?>

    <?php // echo $form->field($model, 'ATAP_HEPATICA') ?>

    <?php // echo $form->field($model, 'ATAP_CEFALEA') ?>

    <?php // echo $form->field($model, 'ATAP_MAMARIA') ?>

    <?php // echo $form->field($model, 'ATAP_OTROS') ?>

    <?php // echo $form->field($model, 'PERS_ID') ?>

    <?php // echo $form->field($model, 'ATAP_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATAP_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
