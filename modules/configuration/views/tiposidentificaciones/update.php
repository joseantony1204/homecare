<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Tiposidentificaciones */

$this->title = 'Actualizacion de Tiposidentificaciones: ' . $model->TIID_ID;
$this->params['breadcrumbs'][] = ['label' => 'Tiposidentificaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TIID_ID, 'url' => ['view', 'id' => $model->TIID_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tiposidentificaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
