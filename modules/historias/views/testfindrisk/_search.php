<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\TestfindriskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="testfindrisk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ATTF_ID') ?>

    <?= $form->field($model, 'ATTF_EDAD') ?>

    <?= $form->field($model, 'ATTF_EDADPNTS') ?>

    <?= $form->field($model, 'ATTF_PESO') ?>

    <?= $form->field($model, 'ATTF_TALLA') ?>

    <?php // echo $form->field($model, 'ATTF_IMC') ?>

    <?php // echo $form->field($model, 'ATTF_IMCTOTAL') ?>

    <?php // echo $form->field($model, 'ATTF_IMCPNTS') ?>

    <?php // echo $form->field($model, 'ATTF_PC') ?>

    <?php // echo $form->field($model, 'ATTF_PCMUJERES') ?>

    <?php // echo $form->field($model, 'ATTF_PCPNTS') ?>

    <?php // echo $form->field($model, 'ATTF_ACTIVIDADFISICA') ?>

    <?php // echo $form->field($model, 'ATTF_ACTIVIDADFISICAPNTS') ?>

    <?php // echo $form->field($model, 'ATTF_CONSUMEVERDURAS') ?>

    <?php // echo $form->field($model, 'ATTF_CONSUMEVERDURASPNTS') ?>

    <?php // echo $form->field($model, 'ATTF_TOMAMEDICAMENTOS') ?>

    <?php // echo $form->field($model, 'ATTF_TOMAMEDICAMENTOSPNTS') ?>

    <?php // echo $form->field($model, 'ATTF_GLUCOSA') ?>

    <?php // echo $form->field($model, 'ATTF_GLUCOSAPNTS') ?>

    <?php // echo $form->field($model, 'ATTF_DIABETESPARIENTES') ?>

    <?php // echo $form->field($model, 'ATTF_DIABETESPARIENTESPNTS') ?>

    <?php // echo $form->field($model, 'ATTF_TOTALPNTS') ?>

    <?php // echo $form->field($model, 'AGEN_ID') ?>

    <?php // echo $form->field($model, 'ATTF_CREATEBY') ?>

    <?php // echo $form->field($model, 'ATTF_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
