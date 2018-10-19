<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Generalidades */

$this->title = $model->ATGE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Generalidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generalidades-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATGE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATGE_ID], [
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
            'ATGE_ID',
            'ATGE_FECHA',
            'ATGE_MOTIVO:ntext',
            'ATGE_ENFERMEDAD:ntext',
            'CAEX_ID',
            'AGEN_ID',
            'ATGE_CREATEBY',
            'ATGE_UPDATEAT',
        ],
    ]) ?>

</div>
