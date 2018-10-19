<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\historias\models\Remisiones */

$this->title = $model->ATRM_ID;
$this->params['breadcrumbs'][] = ['label' => 'Remisiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remisiones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ATRM_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ATRM_ID], [
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
            'ATRM_ID',
            'ATRM_REMITIDOA:ntext',
            'ATRM_OBSERVACIONES:ntext',
            'AGEN_ID',
            'ATRM_CREATEBY',
            'ATRM_UPDATEAT',
        ],
    ]) ?>

</div>
