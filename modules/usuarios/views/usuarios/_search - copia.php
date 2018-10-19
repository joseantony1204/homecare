<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\usuarios\models\UsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'USUA_ID') ?>

    <?= $form->field($model, 'USUA_USUARIO') ?>

    <?= $form->field($model, 'USUA_CLAVE') ?>

    <?= $form->field($model, 'USUA_SESSION') ?>

    <?= $form->field($model, 'USUA_FECHAALTA') ?>

    <?php // echo $form->field($model, 'USUA_FECHABAJA') ?>

    <?php // echo $form->field($model, 'USUA_ULTIMOACCESO') ?>

    <?php // echo $form->field($model, 'USUA_NUMINTENTOS') ?>

    <?php // echo $form->field($model, 'USES_ID') ?>

    <?php // echo $form->field($model, 'PERS_ID') ?>

    <?php // echo $form->field($model, 'USPE_ID') ?>

    <?php // echo $form->field($model, 'USUA_FECHACAMBIO') ?>

    <?php // echo $form->field($model, 'USUA_REGISTRADOPOR') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
