<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\ExafisicosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exafisicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATEF_ID') ?>

    <?= $form->field($model, 'ATEF_ASPECTO') ?>

    <?= $form->field($model, 'ATEF_ESTADO') ?>

    <?= $form->field($model, 'ATEF_CABEZA') ?>

    <?= $form->field($model, 'ATEF_VISUAL') ?>

    <?php // echo $form->field($model, 'ATEF_CUELLO') ?>

    <?php // echo $form->field($model, 'ATEF_TORAX') ?>

    <?php // echo $form->field($model, 'ATEF_ABDOMEN') ?>

    <?php // echo $form->field($model, 'ATEF_GENITOURINARIO') ?>

    <?php // echo $form->field($model, 'ATEF_OSTEOMUSCULAR') ?>

    <?php // echo $form->field($model, 'ATEF_PIELYFANERAZ') ?>

    <?php // echo $form->field($model, 'ATEF_NEUROLOGICO') ?>

    <?php // echo $form->field($model, 'AGEN_ID') ?>

    <?php // echo $form->field($model, 'ATEF_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATEF_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
