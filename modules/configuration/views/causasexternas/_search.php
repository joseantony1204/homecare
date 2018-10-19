<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\CausasexternasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="causasexternas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CAEX_ID') ?>

    <?= $form->field($model, 'CAEX_NOMBRE') ?>

    <?= $form->field($model, 'CAEX_CODIGO') ?>

    <?= $form->field($model, 'CAEX_CREATEBY') ?>

    <?= $form->field($model, 'CAEX_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
