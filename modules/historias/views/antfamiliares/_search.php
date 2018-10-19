<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\AntfamiliaresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antfamiliares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATAF_ID') ?>

    <?= $form->field($model, 'ATAF_HIPERTENSION') ?>

    <?= $form->field($model, 'ATAF_DIABETES') ?>

    <?= $form->field($model, 'ATAF_CONVULSIVO') ?>

    <?= $form->field($model, 'ATAF_MALFORMACIONES') ?>

    <?php // echo $form->field($model, 'ATAF_CANCER') ?>

    <?php // echo $form->field($model, 'ATAF_OTROS') ?>

    <?php // echo $form->field($model, 'PERS_ID') ?>

    <?php // echo $form->field($model, 'ATAF_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATAF_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
