<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Planes */

$this->title = $model->PLAN_ID;
$this->params['breadcrumbs'][] = ['label' => 'Planes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PLAN_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PLAN_ID], [
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
            'PLAN_ID',
            'PLAN_NOMBRE',
            'PLAN_DESCRIPCION',
            'PLAN_VALORMENSUAL',
            'PLAN_VALORSEMESTRAL',
            'PLAN_VALORANUAL',
            'PLAN_CREATEBY',
            'PLAN_UPDATEAT',
        ],
    ]) ?>

</div>
