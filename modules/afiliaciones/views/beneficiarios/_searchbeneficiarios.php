<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\BeneficiariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="beneficiarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'BENE_ID') ?>

    <?= $form->field($model, 'BENE_PRIMERNOMBRE') ?>

    <?= $form->field($model, 'BENE_SEGUNDONOMBRE') ?>

    <?= $form->field($model, 'BENE_PRIMERAPELLIDO') ?>

    <?= $form->field($model, 'BENE_SEGUNDOAPELLIDO') ?>

    <?php // echo $form->field($model, 'BENE_FECHAINGRESO') ?>

    <?php // echo $form->field($model, 'PERS_ID') ?>

    <?php // echo $form->field($model, 'AFIL_ID') ?>

    <?php // echo $form->field($model, 'BENE_CREATEBY') ?>

    <?php // echo $form->field($model, 'BENE_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
