<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Plan */

$this->title = 'Actualizacion de Plan: ' . $model->ATPL_ID;
$this->params['breadcrumbs'][] = ['label' => 'Plans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ATPL_ID, 'url' => ['view', 'id' => $model->ATPL_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
