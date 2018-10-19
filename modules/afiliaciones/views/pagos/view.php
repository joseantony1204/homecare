<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\afiliaciones\models\Pagos */

$this->title = $model->PAGO_ID;
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PAGO_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PAGO_ID], [
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
            'PAGO_ID',
            'PAGO_FECHA',
            'PAGO_PERIODO',
            'PAGO_MES',
            'PAGO_ANIO',
            'AFIL_ID',
            'PAGO_CREATEBY',
            'PAGO_UPDATEAT',
        ],
    ]) ?>

</div>
