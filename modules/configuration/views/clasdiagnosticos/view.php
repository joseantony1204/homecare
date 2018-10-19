<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Clasdiagnosticos */

$this->title = $model->DIAG_ID;
$this->params['breadcrumbs'][] = ['label' => 'Clasdiagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasdiagnosticos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->DIAG_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->DIAG_ID], [
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
            'DIAG_ID',
            'DIAG_NOMBRE',
            'DIAG_CODIGO',
            'DIAG_CREATEBY',
            'DIAG_UPDATEAT',
        ],
    ]) ?>

</div>
