<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\CuentasbancariasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentasbancarias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'FOPA_ID') ?>

    <?= $form->field($model, 'FOPA_NUMEROCUENTA') ?>

    <?= $form->field($model, 'FOPA_NUMEROSEGURIDAD') ?>

    <?= $form->field($model, 'FOPA_FECHAVENCIMIENTO') ?>

    <?= $form->field($model, 'FOPA_ACTUAL') ?>

    <?php // echo $form->field($model, 'BANC_ID') ?>

    <?php // echo $form->field($model, 'TICU_ID') ?>

    <?php // echo $form->field($model, 'PEPA_ID') ?>

    <?php // echo $form->field($model, 'AFIL_ID') ?>

    <?php // echo $form->field($model, 'FOPA_CREATEBY') ?>

    <?php // echo $form->field($model, 'FOMA_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
