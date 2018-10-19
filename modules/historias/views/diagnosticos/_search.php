<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\DiagnosticosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnosticos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATDI_ID') ?>

    <?= $form->field($model, 'ATDI_RIESGOVICTIMA') ?>

    <?= $form->field($model, 'ATDI_RIESGOVICTIMAVIO') ?>

    <?= $form->field($model, 'DIAG_ID') ?>

    <?= $form->field($model, 'CLDI_ID') ?>

    <?php // echo $form->field($model, 'TIDI_ID') ?>

    <?php // echo $form->field($model, 'AGEN_ID') ?>

    <?php // echo $form->field($model, 'ATDI_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATDI_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
