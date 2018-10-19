<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasprocedimientos */

$this->title = $model->PROC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Clasprocedimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasprocedimientos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->PROC_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->PROC_ID], [
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
            'PROC_ID',
            'PROC_NOMBRE:ntext',
            'PROC_DESCRIPCION:ntext',
            'PROC_CUPS',
            'PROC_SOAT',
            'PROC_VALOR',
            'PROC_REFERENCIA:ntext',
            'PROC_UNIDAD',
            'TIPR_ID',
            'ARLA_ID',
            'NILA_ID',
            'PROC_CREATEBY',
            'PROC_UPDATEAT',
        ],
    ]) ?>

</div>
