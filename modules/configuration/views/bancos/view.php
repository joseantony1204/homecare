<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Bancos */

$this->title = $model->BANC_ID;
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bancos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->BANC_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->BANC_ID], [
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
            'BANC_ID',
            'BANC_NIT',
            'BANC_NOMBRE',
            'BANC_DIRECCION',
            'BANC_TELEFONO',
            'BANC_CREATEBY',
            'BANC_UPDATEAT',
        ],
    ]) ?>

</div>
