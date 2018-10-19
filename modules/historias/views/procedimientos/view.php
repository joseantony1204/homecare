<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Procedimientos */

$this->title = $model->ATPR_ID;
$this->params['breadcrumbs'][] = ['label' => 'Procedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="procedimientos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATPR_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATPR_ID], [
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
            'ATPR_ID',
            'ATPR_OBSERVACIONES:ntext',
            'ATPR_FECHASOLICITUD',
            'ATPR_RESULTADOS:ntext',
            'ATPR_FECHAPROCESO',
            'ATPR_ESTADO',
            'PROC_ID',
            'AGEN_ID',
            'ATPR_CREATEBY',
            'ATPR_UPDATEAT',
        ],
    ]) ?>

</div>
