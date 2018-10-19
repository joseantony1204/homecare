<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\agendation\models\Citas */

$this->title = $model->CITA_ID;
$this->params['breadcrumbs'][] = ['label' => 'Citas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="citas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->CITA_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->CITA_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CITA_ID',
            'CITA_FECHA',
            'CITA_FECHAREGISTRO',
            'CITA_LLEGADA',
            'CIES_ID',
            'CIFI_ID',
            'CICE_ID',
            'PEPA_ID',
            'EMHO_ID',
            'CIDI_ID',
            'CICS_ID',
            'CITA_FECHACAMBIO',
            'CITA_REGISTRADOPOR',
        ],
    ]) ?>

</div>
