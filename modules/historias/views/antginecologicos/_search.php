<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\AntginecologicosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antginecologicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATAG_ID') ?>

    <?= $form->field($model, 'ATAG_MENARGUIA') ?>

    <?= $form->field($model, 'ATAG_CICLOS') ?>

    <?= $form->field($model, 'ATAG_FUM') ?>

    <?= $form->field($model, 'ATAG_GRAVIDA') ?>

    <?php // echo $form->field($model, 'ATAG_PARTOS') ?>

    <?php // echo $form->field($model, 'ATAG_ABORTO') ?>

    <?php // echo $form->field($model, 'ATAG_CESARIA') ?>

    <?php // echo $form->field($model, 'ATAG_LACTANDO') ?>

    <?php // echo $form->field($model, 'ATAG_DISMINORREA') ?>

    <?php // echo $form->field($model, 'ATAG_EPI') ?>

    <?php // echo $form->field($model, 'ATAG_COMPANEROS') ?>

    <?php // echo $form->field($model, 'ATAG_MASHIJOS') ?>

    <?php // echo $form->field($model, 'ATAG_ENFESEXU') ?>

    <?php // echo $form->field($model, 'ATAG_OTROS') ?>

    <?php // echo $form->field($model, 'PERS_ID') ?>

    <?php // echo $form->field($model, 'ATAG_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATAG_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
