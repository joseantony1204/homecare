<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\HistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'AGEN_ID') ?>

    <?= $form->field($model, 'AGEN_FECHAPROCESO') ?>

    <?= $form->field($model, 'AGEN_FECHA') ?>

    <?= $form->field($model, 'AGEN_HORAINICIO') ?>

    <?= $form->field($model, 'AGEN_HORAFINAL') ?>

    <?php // echo $form->field($model, 'FINA_ID') ?>

    <?php // echo $form->field($model, 'PERS_ID') ?>

    <?php // echo $form->field($model, 'PEEM_ID') ?>

    <?php // echo $form->field($model, 'ESCI_ID') ?>

    <?php // echo $form->field($model, 'AGEN_CREATEBY') ?>

    <?php // echo $form->field($model, 'AGEN_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
