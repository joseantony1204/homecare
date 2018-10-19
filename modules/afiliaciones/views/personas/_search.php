<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\PersonasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PERS_ID') ?>

    <?= $form->field($model, 'PERS_IDENTIFICACION') ?>

    <?= $form->field($model, 'PERS_FECHANACIMIENTO') ?>

    <?= $form->field($model, 'PERS_DIRECCION') ?>

    <?= $form->field($model, 'PERS_TELEFONO') ?>

    <?php // echo $form->field($model, 'PERS_SENDSMS') ?>

    <?php // echo $form->field($model, 'PERS_EMAIL') ?>

    <?php // echo $form->field($model, 'PERS_SENDMAIL') ?>

    <?php // echo $form->field($model, 'PERS_PATHIMG') ?>

    <?php // echo $form->field($model, 'ESCI_ID') ?>

    <?php // echo $form->field($model, 'TIID_ID') ?>

    <?php // echo $form->field($model, 'TIGE_ID') ?>

    <?php // echo $form->field($model, 'PAIS_ID') ?>

    <?php // echo $form->field($model, 'DEPA_ID') ?>

    <?php // echo $form->field($model, 'MUNI_ID') ?>

    <?php // echo $form->field($model, 'PERS_CREATEBY') ?>

    <?php // echo $form->field($model, 'PERS_UPDATEAT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
