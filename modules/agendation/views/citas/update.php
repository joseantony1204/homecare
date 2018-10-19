<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Citas */

$this->title = 'Actualizacion de Citas: ' . $model->CITA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Citas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CITA_ID, 'url' => ['view', 'id' => $model->CITA_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="citas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
