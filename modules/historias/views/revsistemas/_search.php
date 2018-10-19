<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\RevsistemasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revsistemas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATRS_ID') ?>

    <?= $form->field($model, 'ATRS_GENERAL') ?>

    <?= $form->field($model, 'ATRS_RESPIRATORIO') ?>

    <?= $form->field($model, 'ATRS_CARDIOVASCULAR') ?>

    <?= $form->field($model, 'ATRS_GASTROINTESTINAL') ?>

    <?php // echo $form->field($model, 'ATRS_GENITOURINARIO') ?>

    <?php // echo $form->field($model, 'ATRS_ENDOCRINO') ?>

    <?php // echo $form->field($model, 'ATRS_NEUROLOGICO') ?>

    <?php // echo $form->field($model, 'AGEN_ID') ?>

    <?php // echo $form->field($model, 'ATRS_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATRS_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
