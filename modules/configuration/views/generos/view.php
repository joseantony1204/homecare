<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Generos */

$this->title = $model->TIGE_ID;
$this->params['breadcrumbs'][] = ['label' => 'Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->TIGE_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->TIGE_ID], [
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
            'TIGE_ID',
            'TIGE_NOMBRE',
            'TIGE_DETALLE',
            'TIGE_CREATEBY',
            'TIGE_UPDATEAT',
        ],
    ]) ?>

</div>
