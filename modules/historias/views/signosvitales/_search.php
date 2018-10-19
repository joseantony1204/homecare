<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\SignosvitalesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="signosvitales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATSV_ID') ?>

    <?= $form->field($model, 'ATSV_PRESIONHH') ?>

    <?= $form->field($model, 'ATSV_PRESIONMM') ?>

    <?= $form->field($model, 'ATSV_PESO') ?>

    <?= $form->field($model, 'ATSV_TALLA') ?>

    <?php // echo $form->field($model, 'ATSV_IMC') ?>

    <?php // echo $form->field($model, 'ATSV_FRECUENCIAC') ?>

    <?php // echo $form->field($model, 'ATSV_FRECUENCIAR') ?>

    <?php // echo $form->field($model, 'ATSV_PERIMETROA') ?>

    <?php // echo $form->field($model, 'ATSV_PERIMETROC') ?>

    <?php // echo $form->field($model, 'ATSV_PERIMETROB') ?>

    <?php // echo $form->field($model, 'ATSV_TEMPERATURA') ?>

    <?php // echo $form->field($model, 'AGEN_ID') ?>

    <?php // echo $form->field($model, 'ATSV_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATSV_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
