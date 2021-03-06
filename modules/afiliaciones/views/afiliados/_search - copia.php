<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\AfiliadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="afiliados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'AFIL_ID') ?>

    <?php // echo $form->field($model, 'AFIL_FECHAINGRESO') ?>

    <?php // echo $form->field($model, 'PERS_ID') ?>

    <?php // echo $form->field($model, 'MEPA_ID') ?>

    <?php // echo $form->field($model, 'ESAF_ID') ?>

    <?php // echo $form->field($model, 'AFIL_CREATEBY') ?>

    <?php // echo $form->field($model, 'AFIL_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
