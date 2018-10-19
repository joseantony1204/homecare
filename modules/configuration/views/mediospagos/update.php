<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Mediospagos */

$this->title = 'Actualizacion de Mediospagos: ' . $model->MEPA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Mediospagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MEPA_ID, 'url' => ['view', 'id' => $model->MEPA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mediospagos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
