<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\configuration\models\Epss */

$this->title = $model->EPSS_ID;
$this->params['breadcrumbs'][] = ['label' => 'Epsses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="epss-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->EPSS_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->EPSS_ID], [
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
            'EPSS_ID',
            'EPSS_NOMBRE',
            'EPSS_CODIGO',
            'EPSS_DIRECCION',
            'EPSS_TELEFONO',
            'EPSS_CREATEBY',
            'EPSS_UPDATEAT',
        ],
    ]) ?>

</div>
