<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\RecetariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recetarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATRE_ID') ?>

    <?= $form->field($model, 'ATRE_CANTIDAD') ?>

    <?= $form->field($model, 'ATRE_TOMACADA') ?>

    <?= $form->field($model, 'ATRE_TOMACADADESCRIPCION') ?>

    <?= $form->field($model, 'ATRE_DURACION') ?>

    <?php // echo $form->field($model, 'ATRE_DURACIONDESCRIPCION') ?>

    <?php // echo $form->field($model, 'ATRE_DETALLES') ?>

    <?php // echo $form->field($model, 'ATRE_VIASUMINISTRO') ?>

    <?php // echo $form->field($model, 'ATRE_FECHAINICIO') ?>

    <?php // echo $form->field($model, 'ATRE_FORMULA') ?>

    <?php // echo $form->field($model, 'MEDI_ID') ?>

    <?php // echo $form->field($model, 'AGEN_ID') ?>

    <?php // echo $form->field($model, 'ATRE_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATRE_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
